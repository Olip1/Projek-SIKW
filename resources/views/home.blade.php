<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jamu Herbal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>


<body class="bg-[#b2dbff]">

    <!-- ================================ -->
    <!--             NAVBAR               -->
    <!-- ================================ -->
    <nav class="w-full bg-blue-300 px-4 py-3 flex justify-between items-center shadow-md">

        <!-- LOGO -->
        <div class="text-2xl font-bold text-pink-600">𝓦</div>

        <!-- ICON MENU -->
        <div class="flex gap-4 text-xl text-gray-700">
            <a href="/keranjang" class="hover:opacity-50">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a href="/profile" class="hover:opacity-50">
                <i class="fa-solid fa-user"></i>
            </a>
            <a href="/contact" class="hover:opacity-50">
                <i class="fa-solid fa-phone"></i>
            </a>
        </div>

    </nav>




    <!-- ================================ -->
    <!--            CATEGORY               -->
    <!-- ================================ -->
    <div class="flex justify-center gap-4 mt-4">
         <a href="/" class="hover:opacity-50">
            <button class="px-4 py-1 bg-white rounded-full text-sm shadow">
                Home
            </button>
        </a>
        <a href="/edukasi" class="hover:opacity-50">
            <button class="px-4 py-1 bg-white rounded-full text-sm shadow">
               Konten Edukasi
            </button>
        </a>
        <a href="/artikel" class="hover:opacity-50">
            <button class="px-4 py-1 bg-white rounded-full text-sm shadow">
               Artikel
            </button>
        </a>
        <a href="/about" class="hover:opacity-50">
            <button class="px-4 py-1 bg-white rounded-full text-sm shadow">
                Tentang Kami
            </button>
        </a>

    </div>


    <!-- ================================ -->
    <!--        SLIDER / BANNER           -->
    <!-- ================================ -->
    <div class="relative mx-auto max-w-6xl mt-8">

    <!-- SLIDER CARD -->
    <div class="relative bg-white rounded-3xl shadow-xl overflow-hidden">

        <!-- SLIDER -->
        <div id="bannerSlider" class="flex transition-transform duration-700 ease-out">

            @foreach ($banners as $banner)
                <div class="min-w-full relative">

                    <!-- IMAGE -->
                    <img src="{{ asset('storage/' . $banner->image) }}"
                        alt="{{ $banner->title }}"
                        class="w-full h-[360px] object-cover">

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

                    <!-- TEXT -->
                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-xl font-semibold">{{ $banner->title }}</h3>
                    </div>

                </div>
            @endforeach

        </div>

        <!-- LEFT ARROW -->
        <button onclick="prevSlide()"
            class="absolute left-4 top-1/2 -translate-y-1/2
                   bg-white/80 backdrop-blur hover:bg-white
                   p-3 rounded-full shadow-lg transition">
            <i class="fa-solid fa-chevron-left text-gray-700"></i>
        </button>

        <!-- RIGHT ARROW -->
        <button onclick="nextSlide()"
            class="absolute right-4 top-1/2 -translate-y-1/2
                   bg-white/80 backdrop-blur hover:bg-white
                   p-3 rounded-full shadow-lg transition">
            <i class="fa-solid fa-chevron-right text-gray-700"></i>
        </button>

        <!-- DOT INDICATOR -->
        <div class="absolute bottom-4 right-6 flex gap-2">
            @foreach ($banners as $index => $banner)
                <div class="w-2.5 h-2.5 rounded-full bg-white/50"></div>
            @endforeach
        </div>

    </div>

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

    @foreach ($products as $product)
        <div class="text-center">

            <!-- IMAGE (klik ke detail) -->
            <a href="{{ route('product.detail', $product->id) }}">
                <img src="{{ asset('products/' . $product->thumbnail) }}"
                     alt="{{ $product->name }}"
                     class="w-32 h-32 mx-auto object-cover rounded-xl shadow hover:scale-105 transition">
            </a>

            <!-- NAME -->
            <p class="mt-3 text-pink-600 font-semibold">
                {{ $product->name }}
            </p>

            <!-- ADD TO CART -->
            <form action="{{ route('keranjang.tambah', $product->id) }}" method="POST" class="mt-2">
                @csrf
                <button
                    type="submit"
                    class="bg-pink-400 hover:bg-pink-500 text-white text-sm px-4 py-1 rounded-full transition">
                    + Keranjang
                </button>
            </form>

        </div>
    @endforeach

</div>


</body>
<script>
    const slider = document.getElementById('bannerSlider');
    const totalSlides = {{ $banners->count() }};
    let index = 0;

    function updateSlide() {
        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextSlide() {
        index = (index + 1) % totalSlides;
        updateSlide();
    }

    function prevSlide() {
        index = (index - 1 + totalSlides) % totalSlides;
        updateSlide();
    }

    setInterval(nextSlide, 5000);
</script>

</html>
