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

    <!-- Order Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <div class="border rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-4">Informasi Pesanan</h2>

            <div class="space-y-2 text-sm text-gray-700">
                <p><strong>Kode Pesanan:</strong> #{{ $order->order_code ?? $order->id }}</p>
                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                <p><strong>Status:</strong>
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
        <div class="border rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-4">Data Pelanggan</h2>

            <div class="space-y-2 text-sm text-gray-700">
                <p><strong>Nama:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? '-' }}</p>
                <p><strong>No. Telepon:</strong> {{ $order->phone ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $order->address ?? '-' }}</p>
            </div>
        </div>

    </div>

    <!-- Order Items -->
    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-4">Daftar Produk</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium">Produk</th>
                        <th class="px-4 py-2 text-center text-sm font-medium">Harga</th>
                        <th class="px-4 py-2 text-center text-sm font-medium">Qty</th>
                        <th class="px-4 py-2 text-center text-sm font-medium">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($order->items as $item)
                        <tr>
                            <td class="px-4 py-2 text-sm">
                                {{ $item->product->name ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-center">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 text-sm text-center">
                                {{ $item->qty }}
                            </td>
                            <td class="px-4 py-2 text-sm text-center">
                                Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Total & Status Update -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">

        <div class="text-lg font-semibold text-gray-800">
            Total Pembayaran:
            <span class="text-green-600">
                Rp {{ number_format($order->total, 0, ',', '.') }}
            </span>
        </div>

        <!-- Update Status -->
        <form action="{{ route('admin.orders.status', $order->id) }}" method="POST"
              class="flex items-center gap-2">
            @csrf
            @method('PATCH')

            <select name="status"
                class="border rounded-lg px-4 py-2 text-sm focus:ring focus:ring-indigo-200">
                <option value="pending" @selected($order->status == 'pending')>Pending</option>
                <option value="diproses" @selected($order->status == 'diproses')>Diproses</option>
                <option value="dikirim" @selected($order->status == 'dikirim')>Dikirim</option>
                <option value="selesai" @selected($order->status == 'selesai')>Selesai</option>
                <option value="dibatalkan" @selected($order->status == 'dibatalkan')>Dibatalkan</option>
            </select>

            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Update Status
            </button>
        </form>

    </div>

</div>
@endsection
