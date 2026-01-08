<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-pink-200 min-h-screen">

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

<div class="grid grid-cols-4 p-10 gap-6">

    <!-- LEFT SIDE -->
    <div class="col-span-1 text-center">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">Profile</h1>

        <!-- Photo -->
        <div class="flex justify-center mb-4">
            <div class="w-40 h-40 rounded-full border bg-white flex items-center justify-center shadow">
                @if($user->photo)
                    <img src="{{ asset('profile_photos/' . $user->photo) }}"
                         class="w-full h-full rounded-full object-cover">
                @else
                    <i class="fa-solid fa-user text-6xl text-gray-300"></i>
                @endif
            </div>
        </div>

        <p class="text-sm font-semibold mb-4 text-gray-600">Upload Picture</p>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="photo" class="mb-5 w-full text-sm">

            <button type="button"
                class="bg-pink-400 px-5 py-2 rounded-full block w-full mb-3 hover:bg-pink-500 transition">
                Riwayat Pesanan
            </button>

            <button type="submit"
                class="bg-pink-400 px-5 py-2 rounded-full block w-full mb-3 hover:bg-pink-500 transition">
                Update Profile
            </button>

            <a href="{{ route('home') }}"
               class="bg-pink-400 px-5 py-2 rounded-full block w-full hover:bg-pink-500 transition">
                Belanja
            </a>
    </div>

    <!-- RIGHT SIDE -->
    <div class="col-span-3 pl-10">

        <!-- Username -->
        <div class="bg-blue-300 p-5 rounded-xl mb-5 w-3/4 shadow">
            <label class="font-semibold text-sm">Username</label>
            <input type="text" name="username" value="{{ $user->name }}"
                   class="w-full mt-2 p-2 rounded border focus:outline-none">
        </div>

        <!-- Email -->
        <div class="bg-blue-300 p-5 rounded-xl mb-5 w-3/4 shadow">
            <label class="font-semibold text-sm">E-mail</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full mt-2 p-2 rounded border focus:outline-none">
        </div>

        <!-- Password -->
        <div class="bg-blue-300 p-5 rounded-xl mb-5 w-3/4 shadow">
            <label class="font-semibold text-sm">Password</label>
            <input type="password" name="password"
                   class="w-full mt-2 p-2 rounded border focus:outline-none"
                   placeholder="Kosongkan jika tidak diubah">
        </div>

        <!-- Alamat -->
        <div class="bg-blue-300 p-5 rounded-xl mb-8 w-3/4 shadow">
            <label class="font-semibold text-sm">Alamat</label>
            <input type="text" name="alamat" value="{{ $user->alamat }}"
                   class="w-full mt-2 p-2 rounded border focus:outline-none">
        </div>

        <button type="submit"
            class="bg-pink-400 px-6 py-2 rounded-full hover:bg-pink-500 transition">
            Simpan Perubahan
        </button>

        </form>

        <!-- LOGOUT -->
      <form action="{{ route('logout') }}" method="POST" class="mt-8">
    @csrf
    <button type="submit"
        class="w-3/4 bg-white border border-pink-300 text-pink-500
               py-2 rounded-full shadow hover:bg-pink-400 hover:text-white
               transition flex items-center justify-center gap-2 mx-auto">
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
    </button>
</form>


    </div>

</div>

</body>
</html>
