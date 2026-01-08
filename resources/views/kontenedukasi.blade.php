<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Konten Edukasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#b2dbff] min-h-screen">

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
    <div class="max-w-6xl mx-auto px-6 mt-8">

        <!-- GRID VIDEO -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            @foreach ($videos as $video)
                <div class="bg-blue-200 rounded-2xl h-56 flex items-center justify-center shadow relative">

                    <a href="{{ $video->youtube_url }}" target="_blank"
                        class="w-full h-full flex items-center justify-center">

                        <img src="{{ asset('storage/' . $video->thumbnail) }}"
                            class="absolute inset-0 w-full h-full object-cover rounded-2xl opacity-80">

                        <div class="relative z-10 bg-white/70 p-4 rounded-full">
                            <i class="fa-solid fa-play text-xl text-gray-700"></i>
                        </div>
                    </a>

                </div>
            @endforeach

        </div>

        <!-- GARIS DESKRIPSI -->
        <div class="mt-10 space-y-3">
            @foreach ($videos as $video)
                <div class="h-3 bg-pink-300 rounded-full"></div>
            @endforeach
        </div>

    </div>

</body>

</html>
