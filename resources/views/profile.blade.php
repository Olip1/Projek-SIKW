<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-200">

    <!-- NAVBAR -->
    <nav class="w-full bg-blue-300 px-6 py-3 flex justify-between items-center shadow-md">
        <a href="/home" class="text-2xl">⬅️</a>

        <div class="flex gap-4">
            <span class="cursor-pointer">📍</span>
            <span class="cursor-pointer">📞</span>
        </div>
    </nav>

    <div class="grid grid-cols-4 p-10">

        <!-- LEFT SIDE -->
        <div class="col-span-1 text-center">

            <h1 class="text-3xl font-bold mb-6">Profile</h1>

            <!-- Photo -->
            <div class="flex justify-center mb-4">
                <div class="w-40 h-40 rounded-full border flex items-center justify-center bg-white">
                    @if($user->photo)
                        <img src="{{ asset('profile_photos/' . $user->photo) }}" 
                             class="w-40 h-40 rounded-full object-cover">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                             class="w-24 opacity-60">
                    @endif
                </div>
            </div>

            <p class="text-lg font-semibold mb-3">Upload Picture</p>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="photo" class="mb-5">

                <button class="bg-pink-400 px-5 py-2 rounded-full block w-full mb-3">
                    Riwayat Pesanan
                </button>

                <button type="submit" class="bg-pink-400 px-5 py-2 rounded-full block w-full mb-3">
                    Update
                </button>

                <a href="/shop" class="bg-pink-400 px-5 py-2 rounded-full block w-full">
                    Belanja
                </a>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-span-3 pl-10">

            <!-- Username -->
            <div class="bg-blue-300 p-5 rounded-xl mb-5 w-3/4">
                <label class="font-semibold">Username</label>
                <input type="text" name="username" value="{{ $user->name }}"
                       class="w-full mt-2 p-2 border rounded">
            </div>

            <!-- Email -->
            <div class="bg-blue-300 p-5 rounded-xl mb-5 w-3/4">
                <label class="font-semibold">E-mail</label>
                <input type="email" name="email" value="{{ $user->email }}"
                       class="w-full mt-2 p-2 border rounded">
            </div>

            <!-- Password -->
            <div class="bg-blue-300 p-5 rounded-xl mb-5 w-3/4">
                <label class="font-semibold">Password</label>
                <input type="password" name="password"
                       class="w-full mt-2 p-2 border rounded" placeholder="Kosongkan jika tidak diubah">
            </div>

            <!-- Alamat -->
            <div class="bg-blue-300 p-5 rounded-xl mb-8 w-3/4">
                <label class="font-semibold">Alamat</label>
                <input type="text" name="alamat" value="{{ $user->alamat }}"
                       class="w-full mt-2 p-2 border rounded">
            </div>

            <button type="submit" class="bg-pink-400 px-6 py-2 rounded-full">
                Login
            </button>

            </form>
        </div>
    </div>

</body>
</html>
