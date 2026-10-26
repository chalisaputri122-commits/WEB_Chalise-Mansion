@extends('layouts.app')

@section('content')
    <style>
        /* CSS Katalog */
        .catalog-hero { background: linear-gradient(120deg, #26382e, #405443); color: white; padding: 40px; border-radius: 12px; margin-bottom: 30px; text-align: center; }
        .catalog-hero h1 { color: white; margin: 10px 0; }
        .search-form { display: flex; max-width: 500px; margin: 20px auto 0; gap: 10px; }
        .search-form input { margin: 0; }
        .search-form button { width: auto; margin: 0; padding: 0 20px; background: #c6a46b; color: #171714; }
        
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .product-card { background: white; border-radius: 10px; border: 1px solid #eee; overflow: hidden; display: flex; flex-direction: column; }
        .product-image { height: 200px; background: #f9f8f6; position: relative; display: flex; align-items: center; justify-content: center; }
        .image-placeholder span { font-size: 40px; font-weight: bold; color: #ddd; }
        .product-badge { position: absolute; top: 10px; right: 10px; background: #171714; color: #c6a46b; padding: 5px 10px; border-radius: 4px; font-size: 10px; }
        .product-info { padding: 20px; }
        .product-brand { color: #b99a5b; font-size: 11px; font-weight: bold; text-transform: uppercase; margin-bottom: 5px; }
        .product-info h3 { margin: 0 0 10px; font-size: 18px; color: #171714; }
        .product-bottom { display: flex; justify-content: space-between; align-items: center; margin-top: 15px; padding-top: 15px; border-top: 1px dashed #eee; }
        .product-bottom strong { font-size: 16px; color: #171714; display: block; }
        .stock-label { font-size: 12px; color: #777; }

        /* --- PENJINAK PAGINATION LARAVEL --- */
        .pagination-wrapper { margin-top: 30px; display: flex; justify-content: center; width: 100%; }
        .pagination-wrapper nav { display: flex; flex-direction: column; align-items: center; gap: 15px; width: 100%; }
        .pagination-wrapper nav > div:first-child { color: #666; font-size: 13px; text-align: center; }
        .pagination-wrapper nav > div:last-child { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; justify-content: center; }
        
        .pagination-wrapper a, .pagination-wrapper span[aria-current="page"] span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 38px; height: 38px; padding: 0 10px;
            border: 1px solid #ddd; border-radius: 6px; background: white;
            font-size: 13px; color: #333; text-decoration: none; box-sizing: border-box;
        }
        .pagination-wrapper a:hover { background: #f9f8f6; border-color: #b99a5b; color: #b99a5b; }
        .pagination-wrapper span[aria-current="page"] span { background: #171714 !important; color: #c9a96e !important; border-color: #171714 !important; font-weight: bold; }
        
        /* Sembunyikan teks bawaan & Kunci SVG panah agar tidak raksasa */
        .pagination-wrapper .flex.justify-between.flex-1 { display: none !important; }
        .pagination-wrapper svg { width: 16px !important; height: 16px !important; }
    </style>

    <div class="catalog-hero">
        <p style="color: #c6a46b; letter-spacing: 2px; font-size: 12px;">PREMIUM FOOTWEAR</p>
        <h1>Temukan Sepatu Favoritmu.</h1>
        <form action="{{ route('catalog.index') }}" method="GET" class="search-form">
            <input type="search" name="cari" value="{{ $cari }}" placeholder="Cari nama sepatu atau merek...">
            <button type="submit">Cari</button>
        </form>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Koleksi Sepatu</h2>
        <span style="color: #777;">{{ $products->total() }} produk ditemukan</span>
    </div>

    <div class="product-grid">
        @forelse ($products as $produk)
            <article class="product-card">
                <div class="product-image">
                    @if ($produk->image)
                        <img src="{{ asset($produk->image) }}" alt="{{ $produk->nama }}" style="width:100%; height:100%; object-fit:cover;">
                    @else
                        <div class="image-placeholder"><span>CM</span></div>
                    @endif
                    @if (($produk->stock ?? 0) <= 0)
                        <span class="product-badge" style="background:#b91c1c; color:white;">Stok Habis</span>
                    @else
                        <span class="product-badge">Premium</span>
                    @endif
                </div>
                                <div class="product-info">
                    <p class="product-brand">{{ $produk->brand ?: 'Chalise-Mansion' }}</p>
                    
                    <!-- Judul dibuat menjadi link ke halaman detail -->
                    <a href="{{ route('catalog.show', $produk->id) }}" style="text-decoration: none;">
                        <h3 style="color: #171714; transition: 0.2s;" onmouseover="this.style.color='#b99a5b'" onmouseout="this.style.color='#171714'">
                            {{ $produk->nama }}
                        </h3>
                    </a>

                    <p style="color: #777; font-size: 13px; margin: 0;">Ukuran {{ $produk->size }} • {{ $produk->color }}</p>
                    
                    <div class="product-bottom">
                        <div>
                            <small style="color: #777; font-size: 11px;">Harga</small>
                            <strong>Rp {{ number_format($produk->selling_price ?? 0, 0, ',', '.') }}</strong>
                        </div>
                        <span class="stock-label">Stok: {{ $produk->stock }}</span>
                    </div>

                    <!-- Tombol Lihat Detail -->
                    <a href="{{ route('catalog.show', $produk->id) }}" 
                       style="display: block; text-align: center; margin-top: 15px; padding: 10px; background: #171714; color: #c6a46b; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 13px; transition: 0.2s;"
                       onmouseover="this.style.background='#b99a5b'; this.style.color='#171714';" 
                       onmouseout="this.style.background='#171714'; this.style.color='#c6a46b';">
                        Lihat Detail Sepatu
                    </a>
                </div>
            </article>
        @empty
            <div class="card" style="grid-column: 1 / -1; text-align: center;">
                <p>Produk belum tersedia.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination dibungkus class khusus -->
    <div class="pagination-wrapper">
        {{ $products->links() }}
    </div>
@endsection