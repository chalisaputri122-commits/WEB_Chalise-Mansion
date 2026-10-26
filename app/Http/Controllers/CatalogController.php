<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari', '');

        $products = Product::query()
            ->when($cari, function ($query, $cari) {
                $query->where(function ($q) use ($cari) {
                    // Hanya mencari di kolom 'nama' dan 'brand' saja
                    $q->where('nama', 'like', '%' . $cari . '%')
                      ->orWhere('brand', 'like', '%' . $cari . '%');
                });
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('catalog.index', compact('products', 'cari'));
    }

    // Fungsi untuk halaman detail sepatu
    public function show($id)
    {
        $produk = Product::findOrFail($id);
        return view('catalog.show', compact('produk'));
    }
}