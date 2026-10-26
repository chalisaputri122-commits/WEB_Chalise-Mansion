@extends('layouts.app')

@section('content')
<h1>Daftar Sepatu</h1>
<p>Semua produk sepatu yang terdaftar di Chalise-Mansion.</p>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h2 style="margin: 0;">Data Produk Sepatu</h2>
        <a href="{{ route('products.create') }}" class="gold" 
           style="display: inline-block; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: bold;">
            + Tambah Produk
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Sepatu</th>
                    <th>Kategori</th>
                    <th>Ukuran</th>
                    <th>Warna</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>
                            {{-- ✅ FIX: pakai ->nama (bukan ->name), sesuai model Category --}}
                            {{ $product->category?->nama ?? '-' }}
                        </td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">
                            Belum ada produk sepatu.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection