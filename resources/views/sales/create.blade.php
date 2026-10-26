@extends('layouts.app')

@section('content')
<h1>Kasir Penjualan</h1>
<p>Transaksi pembelian langsung di toko.</p>

<div class="card">
    <form action="{{ route('sales.store') }}" method="POST" id="form-kasir">
        @csrf

        <label>Pilih Sepatu</label>
        <select id="product-select">
            <option value="">-- Pilih Sepatu --</option>
            @foreach($products as $product)
                <option
                    value="{{ $product->id }}"
                    data-name="{{ $product->nama }}" 
                    data-price="{{ $product->selling_price ?? 0 }}"
                    data-stock="{{ $product->stock }}"
                    data-size="{{ $product->size }}"
                    data-color="{{ $product->color }}"
                >
                    {{ $product->nama }} 
                    - {{ $product->size }}
                    / {{ $product->color }}
                    (Stok: {{ $product->stock }})
                </option>
            @endforeach
        </select>

        <button type="button" onclick="addProduct()">
            Tambah ke Keranjang
        </button>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Sepatu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="cart"></tbody>
            </table>
        </div>

        <h3>Total: Rp <span id="total">0</span></h3>

        <label>Uang Pembayaran (Rp)</label>
        <input
            type="number"
            name="paid"
            id="paid"
            min="0"
            step="1"
            required
            placeholder="Masukkan uang pelanggan"
            style="width: 100%; padding: 11px; margin: 5px 0; border: 1px solid #ddd; border-radius: 6px;"
        >

        <h3>Kembalian: Rp <span id="change">0</span></h3>

        <button type="submit" class="gold">
            Simpan Transaksi
        </button>
    </form>
</div>

<script>
let cart = [];
let numberFormat = new Intl.NumberFormat('id-ID');

function rupiah(value) {
    return numberFormat.format(value);
}

function addProduct() {
    const select = document.getElementById('product-select');
    const option = select.options[select.selectedIndex];

    if (!option.value) {
        alert('Pilih sepatu terlebih dahulu.');
        return;
    }

    const id = option.value;
    const stock = Number(option.dataset.stock);
    const existing = cart.find(item => item.id === id);

    if (stock < 1) {
        alert('Stok sepatu habis.');
        return;
    }

    if (existing) {
        if (existing.quantity >= stock) {
            alert('Jumlah melebihi stok yang tersedia.');
            return;
        }
        existing.quantity++;
    } else {
        cart.push({
            id: id,
            name: option.dataset.name + ' (' +
                option.dataset.size + '/' +
                option.dataset.color + ')',
            price: Number(option.dataset.price),
            stock: stock,
            quantity: 1
        });
    }

    renderCart();
    select.value = '';
}

function renderCart() {
    const tbody = document.getElementById('cart');
    tbody.innerHTML = '';

    cart.forEach((item, index) => {
        const row = document.createElement('tr');

        const name = document.createElement('td');
        name.textContent = item.name;

        const price = document.createElement('td');
        price.textContent = 'Rp ' + rupiah(item.price);

        const quantityCell = document.createElement('td');
        const quantity = document.createElement('input');
        quantity.type = 'number';
        quantity.min = '1';
        quantity.max = String(item.stock);
        quantity.value = item.quantity;
        quantity.required = true;
        quantity.name = `items[${index}][quantity]`;

        const productId = document.createElement('input');
        productId.type = 'hidden';
        productId.name = `items[${index}][product_id]`;
        productId.value = item.id;

        quantity.addEventListener('change', function () {
            let value = Number(this.value);

            if (!Number.isInteger(value) || value < 1) {
                value = 1;
            }

            if (value > item.stock) {
                alert('Stok hanya tersedia ' + item.stock);
                value = item.stock;
            }

            item.quantity = value;
            renderCart();
        });

        quantityCell.append(quantity, productId);

        const subtotal = document.createElement('td');
        subtotal.textContent = 'Rp ' + rupiah(item.price * item.quantity);

        const action = document.createElement('td');
        const remove = document.createElement('button');
        remove.type = 'button';
        remove.textContent = 'Hapus';
        remove.style.width = 'auto'; 
        remove.style.padding = '5px 10px';
        
        remove.addEventListener('click', function () {
            cart.splice(index, 1);
            renderCart();
        });
        action.appendChild(remove);

        row.append(name, price, quantityCell, subtotal, action);
        tbody.appendChild(row);
    });

    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    document.getElementById('total').textContent = rupiah(total);

    const paid = Number(document.getElementById('paid').value || 0);
    document.getElementById('change').textContent = rupiah(Math.max(0, paid - total));
}

document.getElementById('paid').addEventListener('input', renderCart);

document.getElementById('form-kasir').addEventListener('submit', function (event) {
    if (cart.length === 0) {
        event.preventDefault();
        alert('Keranjang masih kosong.');
        return;
    }
    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    const paid = Number(document.getElementById('paid').value);
    if (paid < total) {
        event.preventDefault();
        alert('Uang pembayaran masih kurang.');
    }
});
</script>
@endsection