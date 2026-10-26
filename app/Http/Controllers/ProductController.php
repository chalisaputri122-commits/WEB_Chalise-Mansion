<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk (halaman "Data Sepatu")
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();

        return view('products.index', compact('categories', 'products'));
    }

    /**
     * Menampilkan form tambah produk (halaman "Tambah Data")
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:100|unique:products,code',
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'brand' => 'nullable|string|max:50',
            'size' => 'required|string|max:20',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
        ]);

        // Mapping: input form 'name' -> kolom DB 'nama'
        $data['nama'] = $data['name'];
        unset($data['name']);

        // category_id tetap disimpan sebagai category_id
        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }
}