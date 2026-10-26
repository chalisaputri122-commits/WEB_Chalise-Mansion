@extends('layouts.app')

@section('content')
<h1>Dashboard Admin</h1>
<p style="color: #666; margin-bottom: 30px;">Selamat datang di pengelolaan toko Chalise-Mansion.</p>

<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
    <div class="card" style="margin-bottom: 0;">
        <p style="color: #777; font-size: 14px; margin-bottom: 10px;">Total Produk</p>
        <h2 style="font-size: 32px; margin: 0;">{{ number_format($totalProduk) }}</h2>
    </div>
    <div class="card" style="margin-bottom: 0;">
        <p style="color: #777; font-size: 14px; margin-bottom: 10px;">Total Stok</p>
        <h2 style="font-size: 32px; margin: 0;">{{ number_format($totalStok) }}</h2>
    </div>
    <div class="card" style="margin-bottom: 0;">
        <p style="color: #777; font-size: 14px; margin-bottom: 10px;">Total Transaksi</p>
        <h2 style="font-size: 32px; margin: 0;">{{ number_format($totalTransaksi) }}</h2>
    </div>
</div>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; font-size: 20px;">Produk Terbaru</h2>
        <a href="{{ route('products.index') }}" style="color: #b99a5b; text-decoration: none; font-weight: bold;">Kelola Produk →</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nama Sepatu</th>
                    <th>Merek</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produkTerbaru as $produk)
                    <tr>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->brand }}</td>
                        <td>{{ $produk->stock }}</td>
                        <td>Rp {{ number_format($produk->selling_price ?? 0, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection