<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff] min-h-screen">

<!-- NAVBAR -->
<nav class="w-full bg-blue-300 px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-2xl font-bold text-pink-600">𝓦</div>
     <a href="{{ route('home') }}" class="text-xl hover:opacity-70">➡️</a>
</nav>

<!-- CHECKOUT CARD -->
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-md p-8 mt-8">

<h2 class="text-2xl font-bold text-center mb-6 text-pink-600">
    Checkout
</h2>

<!-- LIST PRODUK -->
<table class="w-full mb-6">
    <thead>
        <tr class="border-b">
            <th class="text-left p-2">Produk</th>
            <th class="text-center p-2">Qty</th>
            <th class="text-right p-2">Harga</th>
            <th class="text-right p-2">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr class="border-b">
            <td class="p-2">{{ $item->product->name }}</td>
            <td class="text-center p-2">{{ $item->qty }}</td>
            <td class="text-right p-2">
                Rp {{ number_format($item->product->price,0,',','.') }}
            </td>
            <td class="text-right p-2">
                Rp {{ number_format($item->qty * $item->product->price,0,',','.') }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center p-4 text-gray-500">
                Keranjang kosong
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- TOTAL -->
<div class="text-right text-xl font-bold mb-6">
    Total:
    <span class="text-pink-600">
        Rp {{ number_format($total,0,',','.') }}
    </span>
</div>

<!-- FORM CHECKOUT -->
<form action="{{ route('checkout.store') }}" method="POST">
    @csrf

    <label class="block mb-2 font-semibold">
        Metode Pembayaran
    </label>

    <select name="payment_method" required
        class="w-full border rounded-full px-4 py-2 mb-6">
        <option value="">-- Pilih Metode Pembayaran --</option>
        <option value="COD">COD</option>
        <option value="Transfer">Transfer</option>
    </select>

    <button type="submit"
        class="w-full bg-pink-400 text-white py-3 rounded-full text-lg font-semibold hover:bg-pink-500 transition">
        Buat Pesanan
    </button>
</form>

</div>
</body>
</html>
