<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff] min-h-screen">

    <!-- NAVBAR -->
    <nav class="w-full bg-blue-300 px-4 py-3 flex justify-between items-center shadow-md">
        <div class="text-2xl font-bold text-pink-600">𝓦</div>

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

    <!-- CATEGORY -->
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
    <main class="max-w-4xl mx-auto px-6 py-10">

        <!-- BACK -->
        <a href="/artikel" class="inline-flex items-center text-sm text-gray-600 mb-6 hover:underline">
            ← Kembali ke daftar artikel
        </a>

        <!-- CARD -->
        <article class="bg-white rounded-3xl shadow p-6 md:p-8">

            <!-- THUMBNAIL -->
            <div class="mb-6">
                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-72 object-cover rounded-2xl shadow">
            </div>

            <!-- TITLE -->
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 leading-snug">
                {{ $article->title }}
            </h1>

            <!-- META -->
            <div class="text-sm text-gray-500 mb-6">
                Dipublikasikan {{ $article->created_at->format('d M Y') }}
            </div>

            <!-- CONTENT -->
            <div class="text-gray-700 leading-relaxed space-y-4">
                {!! nl2br(e($article->content)) !!}
            </div>

        </article>

    </main>

    <!-- FOOTER -->
    <footer class="text-center text-sm text-gray-600 py-6">
        © {{ date('Y') }} Edukasi Kesehatan Wanita
    </footer>

</body>
</html>
