<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $totalStok = Product::sum('stock');
        $totalTransaksi = Sale::count();

        $produkTerbaru = Product::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalStok',
            'totalTransaksi',
            'produkTerbaru'
        ));
    }
}