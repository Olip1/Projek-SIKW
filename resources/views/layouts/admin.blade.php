<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-sky-200 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-pink-300 min-h-screen p-6 text-white">
        <div class="text-3xl font-semibold mb-10">
            W
        </div>

        <nav class="space-y-4 text-sm">
            <div>
                <p class="font-semibold mb-2">Dashboard</p>
                <a href="{{ route('admin.dashboard') }}" class="block ml-2 hover:text-pink-100">Menu Utama</a>
                <a href="#" class="block ml-2 hover:text-pink-100">Banner Beranda</a>
            </div>

            <div>
                <p class="font-semibold mb-2">Manajemen Konten</p>
                <a href="#" class="block ml-2 hover:text-pink-100">Video</a>
                <a href="#" class="block ml-2 hover:text-pink-100">Infografis</a>
                <a href="#" class="block ml-2 hover:text-pink-100">Artikel</a>
            </div>
            <div>
                <p class="font-semibold mb-2">Manajemen Akun User</p>
                <a href="{{ route('admin.user') }}" class="block ml-2 hover:text-pink-100">Daftar User</a>

            </div>

            <div>
                <p class="font-semibold mb-2">Manajemen Produk</p>
                <a href="{{ route('admin.products.index') }}" class="block ml-2 hover:text-pink-100">
                    Kelola Produk
                </a>

                <a href="#" class="block ml-2 hover:text-pink-100">Tambah Produk</a>
            </div>

            <div>
                <p class="font-semibold mb-2">Manajemen Pesanan</p>
                <a href="#" class="block ml-2 hover:text-pink-100">Pesanan</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
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
