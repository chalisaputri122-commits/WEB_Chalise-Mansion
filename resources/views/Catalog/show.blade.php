@extends('layouts.app')

@section('content')
    <style>
        .detail-card { background: white; border-radius: 15px; border: 1px solid #eee; display: flex; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .detail-image { width: 50%; background: #f9f8f6; display: flex; align-items: center; justify-content: center; min-height: 400px; }
        .detail-image img { width: 100%; height: 100%; object-fit: cover; }
        .detail-info { width: 50%; padding: 40px; display: flex; flex-direction: column; justify-content: center; }
        .detail-brand { color: #b99a5b; font-size: 13px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px; }
        .detail-title { font-size: 32px; color: #171714; margin: 0 0 15px 0; }
        .detail-price { font-size: 28px; font-weight: bold; color: #171714; margin: 20px 0; }
        .detail-meta { display: flex; gap: 20px; margin-bottom: 30px; color: #666; font-size: 14px; }
        .btn-back { display: inline-block; padding: 12px 25px; background: #171714; color: #c6a46b; text-decoration: none; border-radius: 8px; font-weight: bold; text-align: center; }
        
        @media (max-width: 768px) {
            .detail-card { flex-direction: column; }
            .detail-image, .detail-info { width: 100%; }
        }
    </style>

    <div class="detail-card">
        <div class="detail-image">
            @if ($produk->image)
                <img src="{{ asset($produk->image) }}" alt="{{ $produk->nama }}">
            @else
                <h1 style="color: #ddd; font-size: 80px;">CM</h1>
            @endif
        </div>
        
        <div class="detail-info">
            <p class="detail-brand">{{ $produk->brand ?: 'Chalise-Mansion' }}</p>
            <h1 class="detail-title">{{ $produk->nama }}</h1>
            
            <div class="detail-meta">
                <span>Ukuran: <strong>{{ $produk->size }}</strong></span>
                <span>Warna: <strong>{{ $produk->color }}</strong></span>
                <span>Stok: <strong>{{ $produk->stock }}</strong></span>
            </div>

            <p style="color: #777; line-height: 1.6;">
                Sepatu premium dari koleksi Chalise-Mansion. Dibuat dengan bahan berkualitas tinggi untuk kenyamanan maksimal sepanjang hari.
            </p>

            <div class="detail-price">
                Rp {{ number_format($produk->selling_price ?? 0, 0, ',', '.') }}
            </div>

            @if($produk->stock > 0)
                <a href="{{ route('sales.create') }}" class="btn-back" style="background: #b99a5b; color: #171714;">Beli Sekarang (Ke Kasir)</a>
            @else
                <button disabled style="padding: 12px 25px; background: #ddd; color: #888; border: none; border-radius: 8px; font-weight: bold; cursor: not-allowed;">Stok Habis</button>
            @endif
            
            <a href="{{ route('catalog.index') }}" class="btn-back" style="margin-top: 10px; background: transparent; color: #171714; border: 1px solid #ddd;">&larr; Kembali ke Katalog</a>
        </div>
    </div>
@endsection