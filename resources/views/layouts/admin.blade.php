<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-sky-200 min-h-screen flex">

    <!-- SIDEBAR -->
   <aside class="w-64 bg-pink-300 min-h-screen p-6 text-white">

    <!-- LOGO -->
    <div class="text-3xl font-bold mb-10 flex items-center gap-2">
        <i class="fa-solid fa-layer-group"></i>
        <span>W</span>
    </div>

    <nav class="space-y-8 text-sm">

        <!-- DASHBOARD -->
        <div>
            <p class="font-semibold mb-3 text-pink-100 uppercase tracking-wide text-xs">
                Dashboard
            </p>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-solid fa-house"></i>
                <span>Menu Utama</span>
            </a>
        </div>

        <!-- MANAJEMEN KONTEN -->
        <div>
            <p class="font-semibold mb-3 text-pink-100 uppercase tracking-wide text-xs">
                Manajemen Konten
            </p>

            <a href="{{ route('admin.edukasi.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-solid fa-video"></i>
                <span>Video Edukasi</span>
            </a>

            <a href="{{ route('admin.artikel.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-regular fa-newspaper"></i>
                <span>Artikel</span>
            </a>
        </div>

        <!-- MANAJEMEN USER -->
        <div>
            <p class="font-semibold mb-3 text-pink-100 uppercase tracking-wide text-xs">
                Manajemen User
            </p>

            <a href="{{ route('admin.user') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-solid fa-users"></i>
                <span>Daftar User</span>
            </a>
        </div>

        <!-- MANAJEMEN PRODUK -->
        <div>
            <p class="font-semibold mb-3 text-pink-100 uppercase tracking-wide text-xs">
                Manajemen Produk
            </p>

            <a href="{{ route('admin.products.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-solid fa-box"></i>
                <span>Produk</span>
            </a>

            <a href="{{ route('admin.banner.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-regular fa-images"></i>
                <span>Banner Beranda</span>
            </a>
        </div>

        <!-- MANAJEMEN PESANAN -->
        <div>
            <p class="font-semibold mb-3 text-pink-100 uppercase tracking-wide text-xs">
                Pesanan
            </p>

            <a href="{{ route('admin.orders.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-pink-400 transition">
                <i class="fa-solid fa-receipt"></i>
                <span>Daftar Pesanan</span>
            </a>
        </div>

        <!-- LOGOUT -->
        <div class="pt-6 border-t border-pink-400">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-red-400 transition text-left">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </nav>
</aside>


    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>

</html>
