<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff] min-h-screen">

<!-- NAVBAR -->
<nav class="w-full bg-blue-300 px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-2xl font-bold text-pink-600">𝓦</div>

    <a href="{{ route('keranjang.index') }}" class="text-xl hover:opacity-70">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
</nav>

<!-- CHECKOUT -->
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-md p-8 mt-8">

    <h2 class="text-2xl font-bold text-center mb-6 text-pink-600">
        Checkout Pesanan
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-600 p-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- RINGKASAN PESANAN -->
    <div class="mb-6">
        <h3 class="font-semibold text-gray-700 mb-3">
            Ringkasan Produk
        </h3>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-gray-600">
                    <th class="text-left py-2">Produk</th>
                    <th class="text-center py-2">Qty</th>
                    <th class="text-right py-2">Harga</th>
                    <th class="text-right py-2">Subtotal</th>
                </tr>
            </thead>

            <tbody>
            @foreach($keranjang as $item)
                <tr class="border-b">
                    <td class="py-2 font-semibold">
                        {{ $item->product->name }}
                    </td>
                    <td class="text-center py-2">
                        {{ $item->qty }}
                    </td>
                    <td class="text-right py-2">
                        Rp {{ number_format($item->product->price,0,',','.') }}
                    </td>
                    <td class="text-right py-2 font-semibold">
                        Rp {{ number_format($item->qty * $item->product->price,0,',','.') }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- TOTAL -->
    <div class="flex justify-between items-center mb-8">
        <div class="text-lg font-bold">
            Total Pembayaran
        </div>
        <div class="text-xl font-bold text-pink-600">
            Rp {{ number_format($total,0,',','.') }}
        </div>
    </div>

    <!-- FORM CHECKOUT -->
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <!-- METODE PEMBAYARAN -->
        <div class="mb-6">
            <label class="block font-semibold text-gray-700 mb-2">
                Metode Pembayaran
            </label>

            <select name="payment_method"
                    required
                    class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300">
                <option value="">Pilih metode</option>
                <option value="COD">COD</option>
                <option value="Transfer">Transfer</option>
            </select>
        </div>

        <!-- ACTION -->
        <div class="flex justify-between items-center">

            <a href="{{ route('keranjang.index') }}"
               class="text-gray-600 hover:underline">
                <i class="fa-solid fa-cart-shopping mr-1"></i>
                Kembali ke Keranjang
            </a>

            <button type="submit"
                    class="bg-pink-400 text-white px-8 py-3 rounded-full text-lg hover:bg-pink-500 transition">
                <i class="fa-solid fa-check mr-2"></i>
                Buat Pesanan
            </button>

        </div>

    </form>

</div>

</body>
</html>
