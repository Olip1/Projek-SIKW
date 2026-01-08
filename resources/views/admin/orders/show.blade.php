@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            📄 Detail Pesanan
        </h1>

        <a href="{{ route('admin.orders.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
            ← Kembali
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Info Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- Order Info -->
        <div class="border rounded-lg p-5">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">
                Informasi Pesanan
            </h2>

            <div class="space-y-2 text-sm text-gray-700">
                <p>
                    <span class="font-medium">Kode Pesanan:</span>
                    #{{ $order->order_code ?? $order->id }}
                </p>

                <p>
                    <span class="font-medium">Tanggal:</span>
                    {{ $order->created_at->format('d M Y H:i') }}
                </p>

                <p class="flex items-center gap-2">
                    <span class="font-medium">Status:</span>

                    @php
                        $statusColor = match($order->status) {
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'diproses' => 'bg-blue-100 text-blue-700',
                            'dikirim' => 'bg-purple-100 text-purple-700',
                            'selesai' => 'bg-green-100 text-green-700',
                            'dibatalkan' => 'bg-red-100 text-red-700',
                            default => 'bg-gray-100 text-gray-700',
                        };
                    @endphp

                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusColor }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="border rounded-lg p-5">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">
                Data Pelanggan
            </h2>

            <div class="space-y-2 text-sm text-gray-700">
                <p>
                    <span class="font-medium">Nama:</span>
                    {{ $order->user->name ?? 'Guest' }}
                </p>

                <p>
                    <span class="font-medium">Email:</span>
                    {{ $order->user->email ?? '-' }}
                </p>

                <p>
                    <span class="font-medium">Telepon:</span>
                    {{ $order->phone ?? '-' }}
                </p>

                <p>
                    <span class="font-medium">Alamat:</span>
                    {{ $order->address ?? '-' }}
                </p>
            </div>
        </div>

    </div>

    <!-- Product List -->
    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">
            Daftar Produk
        </h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-sm text-gray-600 text-left">Produk</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-center">Harga</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-center">Qty</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-center">Subtotal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($order->items as $item)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-700">
                                {{ $item->product->name ?? '-' }}
                            </td>

                            <td class="px-4 py-3 text-sm text-center text-gray-700">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>

                            <td class="px-4 py-3 text-sm text-center text-gray-700">
                                {{ $item->qty }}
                            </td>

                            <td class="px-4 py-3 text-sm text-center font-medium text-gray-800">
                                Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Action -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">

        <div class="text-lg font-semibold text-gray-800">
            Total Pembayaran:
            <span class="text-green-600">
                Rp {{ number_format($order->total, 0, ',', '.') }}
            </span>
        </div>

        <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
              method="POST"
              class="flex items-center gap-2">
            @csrf
            @method('PUT')

            <select name="status"
                class="rounded-lg border-gray-300 text-sm focus:ring-pink-400 focus:border-pink-400">
                <option value="pending" @selected($order->status == 'pending')>Pending</option>
                <option value="paid" @selected($order->status == 'paid')>Paid</option>
               
            </select>

            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Update Status
            </button>
        </form>

    </div>

</div>
@endsection
