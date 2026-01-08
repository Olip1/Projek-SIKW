<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>

    <!-- Google Font untuk gaya tulisan -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .font-cantik {
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>

<body class="bg-pink-300 min-h-screen">

    <!-- NAVBAR -->
    <nav class="w-full bg-blue-300 px-6 py-3 flex justify-between items-center shadow-md">

        <!-- BACK + LOGO -->
        <div class="flex items-center gap-4">
            <a href="{{ url()->previous() }}" class="text-pink-600 text-2xl font-bold"></a>
            <a href="{{ route('home') }}" class="text-3xl">⬅️</a>
        </div>

        <!-- ICONS -->
        <div class="flex items-center gap-6 text-pink-600 text-xl">
            <a href="{{ route('keranjang') }}" class="hover:text-white transition">🛒</a>
            <a href="profile" class="hover:text-white">👤</a>
            <a href="#" class="hover:text-white">📍</a>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="flex justify-center items-start px-4 py-12">

        <div class="bg-blue-300 w-full max-w-5xl p-10 rounded-3xl shadow-xl">

            <p class="text-center text-white text-2xl md:text-3xl font-cantik leading-relaxed drop-shadow-lg">
                Selamat datang di Sistem Informasi Kesehatan Wanita — ruang digital yang hadir untuk menemani setiap perempuan dalam perjalanan menjaga dan memahami kesehatannya.
            </p>

            <p class="text-center text-white text-2xl md:text-3xl font-cantik leading-relaxed drop-shadow-lg mt-10">
                Kami percaya bahwa setiap wanita berhak merasa sehat, bahagia, dan berdaya.
                Melalui blog ini, kami berusaha menghadirkan informasi kesehatan yang terpercaya,
                mudah dipahami, dan relevan dengan kehidupan sehari-hari.
            </p>

        </div>

    </div>

</body>
</html>
