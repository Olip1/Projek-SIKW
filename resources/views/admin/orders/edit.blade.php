@extends('layouts.admin')

@section('title', 'Edit Pesanan')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            ✏️ Edit Pesanan
        </h1>

        <a href="{{ route('admin.orders.index') }}"
            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
            ← Kembali
        </a>
    </div>

    <!-- Error -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <!-- Order Info -->
            <div class="border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-4">Informasi Pesanan</h2>

                <div class="space-y-2 text-sm text-gray-700">
                    <p><strong>Kode Pesanan:</strong> #{{ $order->order_code ?? $order->id }}</p>
                    <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                    <p><strong>Total:</strong>
                        <span class="text-green-600 font-semibold">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </span>
                    </p>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-4">Data Pelanggan</h2>

                <div class="space-y-3 text-sm">
                    <div>
                        <label class="font-medium">Nama</label>
                        <input type="text" value="{{ $order->user->name ?? 'Guest' }}"
                            class="w-full border rounded-lg px-3 py-2 mt-1 bg-gray-100" disabled>
                    </div>

                    <div>
                        <label class="font-medium">Email</label>
                        <input type="text" value="{{ $order->user->email ?? '-' }}"
                            class="w-full border rounded-lg px-3 py-2 mt-1 bg-gray-100" disabled>
                    </div>
                </div>
            </div>

        </div>

        <!-- Shipping Info -->
        <div class="border rounded-lg p-4 mb-8">
            <h2 class="text-lg font-semibold mb-4">Informasi Pengiriman</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="font-medium text-sm">No. Telepon</label>
                    <input type="text" name="phone"
                        value="{{ old('phone', $order->phone) }}"
                        class="w-full border rounded-lg px-3 py-2 mt-1">
                </div>

                <div>
                    <label class="font-medium text-sm">Alamat</label>
                    <textarea name="address" rows="3"
                        class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('address', $order->address) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="border rounded-lg p-4 mb-8">
            <h2 class="text-lg font-semibold mb-4">Status Pesanan</h2>

            <select name="status"
                class="w-full md:w-1/3 border rounded-lg px-4 py-2 focus:ring focus:ring-indigo-200">
                <option value="pending" @selected($order->status == 'pending')>Pending</option>
                <option value="diproses" @selected($order->status == 'diproses')>Diproses</option>
                <option value="dikirim" @selected($order->status == 'dikirim')>Dikirim</option>
                <option value="selesai" @selected($order->status == 'selesai')>Selesai</option>
                <option value="dibatalkan" @selected($order->status == 'dibatalkan')>Dibatalkan</option>
            </select>
        </div>

        <!-- Action -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.orders.show', $order->id) }}"
                class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                Batal
            </a>

            <button type="submit"
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>
@endsection
