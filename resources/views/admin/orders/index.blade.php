@extends('layouts.admin')

@section('title', 'Manajemen Pesanan')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            📦 Manajemen Pesanan
        </h1>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">#</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Kode Pesanan</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Pelanggan</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Total</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-700">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 text-sm font-semibold text-gray-800">
                            #{{ $order->order_code ?? $order->id }}
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-700">
                            {{ $order->user->name ?? 'Guest' }}
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-700">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-3">
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
                        </td>

                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="px-3 py-1 text-sm bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">
                                    Detail
                                </a>

                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Tidak ada pesanan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
