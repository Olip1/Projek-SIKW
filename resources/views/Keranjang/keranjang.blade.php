<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff] min-h-screen">

    <!-- NAVBAR -->
    <nav class="w-full bg-blue-300 px-6 py-3 flex justify-between items-center shadow-md">
        <a href="{{ url('/detail') }}" class="text-pink-600 text-2xl font-bold">⬅️</a>
        <h1 class="text-pink-600 text-xl font-bold">Keranjang</h1>
        <div></div>
    </nav>

    <div class="p-6">
        @foreach($carts as $cart)
        <div class="flex items-center justify-between bg-pink-100 p-4 rounded-xl mb-4 shadow">

            <div class="flex items-center gap-4">
                <img src="{{ $cart->product->image }}" class="w-20 h-20 rounded-lg">
                <div>
                    <h2 class="font-bold text-pink-600 text-lg">{{ $cart->product->name }}</h2>
                    <p class="text-gray-600">{{ $cart->quantity }} x Rp {{ number_format($cart->product->price) }}</p>
                </div>
            </div>

            <a href="{{ route('cart.delete', $cart->id) }}" 
               class="px-4 py-2 bg-red-400 text-white rounded-lg">
               Hapus
            </a>
        </div>
        @endforeach

        @if($carts->count() == 0)
            <p class="text-center text-gray-500 mt-10">Keranjang kosong...</p>
        @endif
    </div>

</body>
</html>
