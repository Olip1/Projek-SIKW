<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#b2dbff] min-h-screen">

<!-- NAVBAR -->
<nav class="w-full bg-blue-300 px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-2xl font-bold text-pink-600">𝓦</div>
    <a href="{{ route('home') }}" class="text-xl hover:opacity-70">➡️</a>
</nav>

<!-- KERANJANG -->
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-md p-8 mt-8">

    <h2 class="text-2xl font-bold text-center mb-6 text-pink-600">
        Keranjang Belanja
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- LIST PRODUK -->
    <table class="w-full mb-6">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Produk</th>
                <th class="text-center p-2">Qty</th>
                <th class="text-right p-2">Harga</th>
                <th class="text-right p-2">Subtotal</th>
                <th class="text-center p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>

        @forelse($keranjang as $item)

            <tr class="border-b">
                <td class="p-2">
                    <p class="font-semibold">{{ $item->product->name }}</p>
                </td>

                <!-- QTY -->
                <td class="text-center p-2">
                    <div class="flex justify-center items-center gap-2">

                        <!-- KURANG -->
                        <form action="{{ route('keranjang.kurang', $item->id) }}" method="POST">
                            @csrf
                            <button class="px-2 py-1 bg-gray-200 rounded">−</button>
                        </form>

                        <span class="font-semibold">{{ $item->qty }}</span>

                        <!-- TAMBAH -->
                        <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST">
                            @csrf
                            <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                        </form>

                    </div>
                </td>

                <td class="text-right p-2">
                    Rp {{ number_format($item->product->price,0,',','.') }}
                </td>

                <td class="text-right p-2 font-semibold">
                    Rp {{ number_format($item->qty * $item->product->price,0,',','.') }}
                </td>

                <!-- HAPUS -->
                <td class="text-center p-2">
                    <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
      @empty
    <tr>
        <td colspan="5" class="text-center p-4 text-gray-500">
            Keranjang kosong
        </td>
    </tr>
    @endforelse


        </tbody>
    </table>

    <!-- TOTAL -->
    @if($keranjang->isNotEmpty())

        <div class="flex justify-between items-center mt-6">

            <div class="text-xl font-bold">
            Total:
            <span class="text-pink-600">
                Rp {{ number_format($total, 0, ',', '.') }}
            </span>
            </div>

            <a href="{{ route('checkout') }}"
               class="bg-pink-400 text-white px-6 py-3 rounded-full text-lg hover:bg-pink-500 transition">
                Checkout
            </a>

        </div>
    @endif

</div>

</body>
</html>
