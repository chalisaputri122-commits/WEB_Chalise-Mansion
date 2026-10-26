<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    // ==========================================
    // 1. HALAMAN RIWAYAT PENJUALAN
    // ==========================================
    public function index()
    {
        $sales = Sale::with('items.product')->latest()->get();

        return view('sales.index', compact('sales'));
    }

    // ==========================================
    // 2. HALAMAN KASIR (Keranjang Belanja)
    // ==========================================
    public function create()
    {
        $products = Product::orderBy('nama')->get();

        return view('sales.create', compact('products'));
    }

    // ==========================================
    // 3. PROSES SIMPAN TRANSAKSI
    // ==========================================
    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|distinct|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'paid' => 'required|numeric|min:0',
        ]);

        $sale = DB::transaction(function () use ($data) {
            $total = 0;
            $items = [];

            // Memeriksa produk dan stok
            foreach ($data['items'] as $item) {
                $product = Product::whereKey($item['product_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                $quantity = (int) $item['quantity'];

                if ($product->stock < $quantity) {
                    throw ValidationException::withMessages([
                        'items' => 'Stok sepatu ' . $product->nama
                            . ' tidak mencukupi.',
                    ]);
                }

                $price = (float) $product->selling_price;
                $subtotal = $price * $quantity;
                $total += $subtotal;

                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                ];
            }

            // Mengambil uang pembayaran
            $paid = (float) $data['paid'];

            // Memastikan uang cukup
            if ($paid < $total) {
                throw ValidationException::withMessages([
                    'paid' => 'Uang pembayaran kurang dari total belanja.',
                ]);
            }

            // Membuat transaksi
            $sale = Sale::create([
                'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
                'total' => $total,
                'paid' => $paid,
                'change' => $paid - $total,
            ]);

            // Menyimpan detail transaksi dan mengurangi stok
            foreach ($items as $item) {
                $sale->items()->create([
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                ]);

                $item['product']->decrement(
                    'stock',
                    $item['quantity']
                );
            }

            return $sale;
        });

        return redirect()
            ->route('sales.show', $sale->id)
            ->with('success', 'Transaksi berhasil disimpan!');
    }

    // ==========================================
    // 4. HALAMAN NOTA (Detail Transaksi)
    // ==========================================
    public function show($id)
    {
        // Ambil data penjualan berdasarkan ID
        $sale = Sale::with('items.product')->findOrFail($id);

        // ✅ FIX: Arahkan ke 'sales.show' dan bawa variabel 'sale'
        return view('sales.show', compact('sale'));
    }
}