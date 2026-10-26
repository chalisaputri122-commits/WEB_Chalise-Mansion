@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div>
        <h1 style="margin: 0 0 10px 0;">Riwayat Penjualan</h1>
        <p style="margin: 0; color: #666;">Daftar seluruh transaksi yang pernah terjadi di Chalise-Mansion.</p>
    </div>
    
    <!-- Tombol pintas ke Kasir -->
    <a href="{{ route('sales.create') }}" class="gold" style="display: inline-block; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: bold;">
        + Transaksi Baru
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No. Invoice</th>
                    <th>Tanggal & Waktu</th>
                    <th>Total Belanja</th>
                    <th>Uang Dibayar</th>
                    <th>Kembalian</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td><strong>{{ $sale->invoice_number }}</strong></td>
                        <td>{{ $sale->created_at->format('d M Y, H:i') }}</td>
                        <td>Rp {{ number_format($sale->total, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($sale->paid, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($sale->change, 0, ',', '.') }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('sales.show', $sale->id) }}" 
                               style="display: inline-block; background: #24231f; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px;">
                               Lihat Nota
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 30px; color: #888;">
                            <strong>Belum ada transaksi.</strong><br>
                            Silakan lakukan transaksi pertama Anda di menu Kasir.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection