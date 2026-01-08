<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jamu Herbal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff]">

    <!-- ================================ -->
    <!--             NAVBAR               -->
    <!-- ================================ -->
   <nav class="w-full bg-blue-300 px-4 py-3 flex justify-between items-center shadow-md">
    
    <!-- LOGO -->
    <div class="text-2xl font-bold text-pink-600">𝓦</div>

    <!-- ICON MENU -->
    <div class="flex gap-4 text-xl">
        <a href="/keranjang" class="hover:opacity-50">🛒</a>
        <a href="/profile" class="hover:opacity-50">👤</a>
        <a href="/contact" class="hover:opacity-50">📞</a>
    </div>

    </nav>



    <!-- ================================ -->
    <!--            CATEGORY               -->
    <!-- ================================ -->
    <div class="flex justify-center gap-4 mt-4">
        <button class="px-4 py-1 bg-white rounded-full text-sm shadow">Konten Edukasi</button>
        <a href="/about" class="hover:opacity-50">
    <button class="px-4 py-1 bg-white rounded-full text-sm shadow">
        Tentang Kami
    </button>
</a>

    </div>


    <!-- ================================ -->
    <!--        SLIDER / BANNER           -->
    <!-- ================================ -->
    <div class="relative mx-auto max-w-5xl bg-white px-6 py-6 mt-6 rounded-3xl shadow">

        <!-- LEFT ARROW -->
        <button class="absolute left-2 top-1/2 -translate-y-1/2 text-4xl text-pink-500">⬅️</button>

        <!-- IMAGE BANNER -->
      <!-- BANNER -->
    <div class="flex justify-center mt-8">
        <div class="w-10/12 shadow-lg rounded-xl overflow-hidden">
            <div class="bg-pink-300 p-8 flex justify-between items-center">
              <img src="{{ asset('asset\nyeri-haid.png') }}" class="rounded-2xl w-full object-cover">
            </div>
        </div>
    </div>

        <!-- RIGHT ARROW -->
        <button class="absolute right-2 top-1/2 -translate-y-1/2 text-4xl text-pink-500">➡️</button>
    </div>


    <!-- ================================ -->
    <!--       TITLE PRODUK SECTION       -->
    <!-- ================================ -->
    <div class="text-center">
        <div class="inline-block bg-[#8ed1ff] px-8 py-3 mt-6 mb-4 rounded-full shadow text-lg font-semibold">
            Berbagai Jenis Jamu Untuk Mengobati Beberapa Penyakit
        </div>
    </div>


    <!-- ================================ -->
    <!--         LIST PRODUK GRID         -->
    <!-- ================================ -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-6 max-w-5xl mx-auto p-6 bg-white rounded-3xl shadow">

        @foreach($products as $product)
        <div class="text-center">

       <!-- IMAGE (klik ke detail) -->
            <a href="{{ route('product.detail', $product->id) }}">
                <img 
                    src="{{ asset('products/' . $product->thumbnail) }}" 
                    alt="{{ $product->name }}"
                    class="w-32 h-32 mx-auto object-cover rounded-xl shadow hover:scale-105 transition"
                >
            </a>


            <!-- NAME -->
            <p class="mt-3 text-pink-600 font-semibold">{{ $product->name }}</p>
        </div>
        @endforeach

    </div>

</body>
</html>
