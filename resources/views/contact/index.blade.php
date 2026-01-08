<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Contact Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white min-h-screen relative overflow-hidden">

    <!-- HEADER -->
    <div class="w-full bg-sky-300 h-14 flex items-center justify-between px-4">
        <!-- Back -->
        <div class="flex items-center gap-4">
            <a href="{{ url()->previous() }}" class="text-pink-600 text-2xl font-bold"></a>
            <a href="{{ route('home') }}" class="text-3xl">⬅️</a>
        </div>

        <!-- Icons -->
        <div class="flex gap-3">
            <div class="flex gap-4 text-xl">
                <a href="/keranjang" class="hover:opacity-50">🛒</a>
                <a href="/profile" class="hover:opacity-50">👤</a>
            </div>
        </div>
    </div>

    <!-- BACKGROUND SHAPES -->
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-sky-200 rounded-full opacity-60 -z-10"></div>
    <div class="absolute top-10 right-0 w-48 h-48 bg-sky-200 rounded-full opacity-60 -z-10"></div>

    <!-- CONTENT -->
    <div class="flex flex-col items-center justify-center mt-32 gap-6">

        <!-- PINK CARD -->
        <div class="bg-pink-300 text-white px-10 py-4 rounded-xl shadow-lg text-center font-semibold">
            Silahkan hubungi kami dibawah sini :
        </div>

        <!-- BUTTON -->
        <button
            class="flex items-center gap-3 bg-sky-300 px-8 py-3 rounded-xl shadow-lg text-white font-semibold hover:bg-sky-400 transition">
            <img src="https://cdn-icons-png.flaticon.com/512/4712/4712027.png" alt="bot" class="w-8 h-8">
            Click Here
        </button>

    </div>

</body>

</html>