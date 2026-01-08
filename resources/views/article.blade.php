<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel Edukasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff]">

    <!-- NAVBAR -->
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

    <!-- CONTENT -->
    <main class="max-w-6xl mx-auto px-6 py-10">

        <!-- TITLE -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                Bacaan Pilihan untuk Kamu
            </h2>
            <p class="text-gray-600 mt-1">
                Artikel seputar edukasi dan informasi terbaru
            </p>
        </div>

        <!-- ARTICLE GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($articles as $article)
                <a href="{{ route('artikel.detail', $article->slug) }}"
                   class="group bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition">

                    <!-- Thumbnail -->
                    <div class="h-40 overflow-hidden">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition">
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-gray-800 leading-snug mb-2 line-clamp-2">
                            {{ $article->title }}
                        </h3>

                        <p class="text-sm text-gray-600 line-clamp-3">
                            {{ $article->excerpt }}
                        </p>

                        <div class="mt-4 text-sm text-pink-500 font-medium">
                            Baca selengkapnya →
                        </div>
                    </div>

                </a>
            @endforeach

        </div>

        <!-- EMPTY STATE -->
        @if($articles->isEmpty())
            <div class="text-center text-gray-600 mt-20">
                Belum ada artikel tersedia
            </div>
        @endif

    </main>

    <!-- FOOTER -->
    <footer class="text-center text-sm text-gray-600 py-6">
        © {{ date('Y') }} Edukasi Kesehatan Wanita
    </footer>

</body>
</html>
