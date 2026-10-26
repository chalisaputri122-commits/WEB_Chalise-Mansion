<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi - Chalise-Mansion</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px 15px;
        }

        .nota {
            background: white;
            max-width: 650px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 12px #ddd;
        }

        h1, .tengah {
            text-align: center;
        }

        h1 {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 10px 5px;
            text-align: left;
        }

        .angka {
            text-align: right;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .aksi {
            text-align: center;
            margin-top: 25px;
        }

        button, .kembali {
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
        }

        button {
            background: #222;
            color: white;
        }

        .kembali {
            background: #ddd;
            color: #222;
            display: inline-block;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .nota {
                box-shadow: none;
                max-width: none;
            }

            .aksi {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="nota">
    <h1>CHALISE-MANSION</h1>
    <p class="tengah">Nota Penjualan Sepatu</p>

    <hr>

    <p>
        <strong>No. Transaksi:</strong>
        {{ $sale->invoice_number }}
    </p>

    <p>
        <strong>Tanggal:</strong>
        {{ $sale->created_at->format('d-m-Y H:i') }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Nama Sepatu</th>
                <th>Qty</th>
                <th class="angka">Harga</th>
                <th class="angka">Subtotal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($sale->items as $item)
                <tr>
                    <td>{{ $item->product->nama ?? 'Produk' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="angka">
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </td>
                    <td class="angka">
                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <tr>
            <td>Total Belanja</td>
            <td class="angka total">
                Rp {{ number_format($sale->total, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Uang Dibayar</td>
            <td class="angka">
                Rp {{ number_format($sale->paid, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Kembalian</td>
            <td class="angka">
                Rp {{ number_format($sale->change, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    <p class="tengah">
        Terima kasih telah berbelanja di Chalise-Mansion!
    </p>

    <div class="aksi">
        <button onclick="window.print()">Cetak Nota</button>

        <a href="{{ route('sales.index') }}" class="kembali">
            Kembali ke Transaksi
        </a>
    </div>
</div>

</body>
</html>