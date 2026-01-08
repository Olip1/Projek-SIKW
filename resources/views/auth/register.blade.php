<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - SIKW</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-200 min-h-screen">

    <!-- HEADER -->
    <div class="w-full bg-blue-300 p-4 flex justify-between items-center shadow-md">
        <div class="text-2xl font-bold text-pink-700">💗 SIKW</div>

        <div class="flex gap-4">
            <button class="bg-pink-300 p-2 rounded-full shadow">
                <img src="https://cdn-icons-png.flaticon.com/512/854/854866.png" class="w-6">
            </button>
            <button class="bg-pink-300 p-2 rounded-full shadow">
                <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" class="w-6">
            </button>
        </div>
    </div>

    <!-- REGISTER CARD -->
    <div class="flex justify-center mt-10">
        <div class="bg-white w-[400px] shadow-xl rounded-xl p-8">

            <h1 class="text-center text-3xl font-bold text-pink-700 mb-6">
                Register Akun
            </h1>

            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="block font-medium mb-1 text-pink-700">Nama</label>
                    <input type="text" name="name"
                        class="w-full bg-blue-200 border border-blue-300 p-3 rounded focus:ring focus:ring-blue-400"
                        placeholder="Nama lengkap..." required>
                </div>

                <div class="mb-5">
                    <label class="block font-medium mb-1 text-pink-700">E-mail</label>
                    <input type="email" name="email"
                        class="w-full bg-blue-200 border border-blue-300 p-3 rounded focus:ring focus:ring-blue-400"
                        placeholder="Email aktif..." required>
                </div>

                <div class="mb-5">
                    <label class="block font-medium mb-1 text-pink-700">Password</label>
                    <input type="password" name="password"
                        class="w-full bg-blue-200 border border-blue-300 p-3 rounded focus:ring focus:ring-blue-400"
                        placeholder="Password..." required>
                </div>

                <button
                    class="w-full bg-pink-400 text-black p-3 rounded-lg font-semibold hover:bg-pink-500 transition">
                    Register
                </button>
            </form>

            <p class="mt-5 text-center text-sm text-gray-700">
                Sudah punya akun?
                <a href="/login" class="text-pink-700 font-semibold">Login</a>
            </p>

        </div>
    </div>

</body>
</html>
