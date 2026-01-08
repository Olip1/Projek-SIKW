<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $product->name }}</title>
</head>

<body class="bg-[#b2dbff]">

    <!-- Back Button -->
    
<nav class="w-full bg-blue-300 px-6 py-4 flex justify-between items-center shadow-md">
    <a href="{{ route('home') }}" class="text-3xl">⬅️</a>
    <a href="{{ route('keranjang.index') }}" class="text-xl hover:opacity-70">🛒</a>
</nav>
        
    

    <!-- PRODUCT NAME TITLE -->
    <div class="text-center mt-2">
        <span class="bg-[#8ed1ff] text-lg font-semibold px-8 py-2 rounded-full shadow">
            {{ $product->name }}
        </span>
    </div>

    <!-- MAIN CARD -->
    <div class="max-w-4xl mx-auto bg-white rounded-3xl p-8 mt-6 shadow-md">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- LEFT SIDE (Image + Price + Buttons) -->
            <div class="flex flex-col items-center">

                <!-- IMAGE -->
                <img src="{{ asset('products/' . $product->thumbnail) }}"
                    class="w-52 h-52 rounded-xl shadow object-cover">

                <!-- PRICE -->
                <div class="bg-[#ffa4b2] text-white text-lg font-semibold px-6 py-2 rounded-full mt-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <!-- ADD TO CART BUTTON -->
                    <form action="{{ route('keranjang', $product->id) }}" method="GET">
                        @csrf
                        <button type="submit"
                            class="bg-[#ff9fb8] text-white px-6 py-2 rounded-full mt-4 shadow hover:bg-pink-500 transition">
                            Masukkan Keranjang 🛒
                        </button>
                    </form>



                <!-- ORDER BUTTON -->
                <button class="bg-[#8ed1ff] text-white px-6 py-2 rounded-full mt-3 shadow">
                    Pesan Disini 📩
                </button>

            </div>

            <!-- RIGHT SIDE (Description) -->
            <div>
                <div class="bg-[#ff9fb8] text-white p-6 rounded-2xl shadow text-justify leading-relaxed">
                    {{ $product->description }}
                </div>
            </div>

        </div>
    </div>

</body>

</html>