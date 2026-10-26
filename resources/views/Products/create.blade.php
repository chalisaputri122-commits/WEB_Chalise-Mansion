@extends('layouts.app')

@section('content')
<h1>Tambah Produk Sepatu</h1>
<p>Masukkan data produk baru ke toko Chalise-Mansion.</p>

<div class="card">
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Kode Sepatu</label>
        <input type="text" name="code"
               placeholder="Contoh: CSP001"
               value="{{ old('code') }}" required>

        <label>Nama Sepatu</label>
        <input type="text" name="name"
               placeholder="Contoh: Sneakers Classic"
               value="{{ old('name') }}" required>

        <label>Kategori Sepatu</label>
        <select name="category_id" required>
            <option value="">-- Pilih Kategori --</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama ?? $category->name ?? 'Kategori' }}
                </option>
            @endforeach
        </select>

        <label>Merek</label>
        <input type="text" name="brand"
               placeholder="Contoh: Nike"
               value="{{ old('brand') }}">

        <label>Ukuran</label>
        <select name="size" required>
            <option value="">-- Pilih Ukuran --</option>

            @foreach(range(36, 45) as $ukuran)
                <option value="{{ $ukuran }}"
                    {{ old('size') == $ukuran ? 'selected' : '' }}>
                    {{ $ukuran }}
                </option>
            @endforeach
        </select>

        <label>Warna</label>
        <input type="text" name="color"
               placeholder="Contoh: Hitam"
               value="{{ old('color') }}" required>

        <label>Stok</label>
        <input type="number" name="stock"
               min="0"
               value="{{ old('stock', 0) }}" required>

        <label>Harga Modal (Rp)</label>
        <input type="number" name="purchase_price"
               min="0"
               value="{{ old('purchase_price') }}"
               placeholder="Contoh: 150000" required>

        <label>Harga Jual (Rp)</label>
        <input type="number" name="selling_price"
               min="0"
               value="{{ old('selling_price') }}"
               placeholder="Contoh: 250000" required>

        <button type="submit" class="gold">
            Simpan Produk
        </button>

        <a href="{{ route('products.index') }}" 
           style="display: inline-block; padding: 11px; text-align: center; text-decoration: none; color: #292722;">
            Batal
        </a>

        <button type="reset">
            Bersihkan Form
        </button>
    </form>
</div>
@endsection