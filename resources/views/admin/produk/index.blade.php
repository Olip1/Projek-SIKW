@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-700">Manajemen Produk</h1>

    <a href="{{ route('admin.products.create') }}"
       class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded text-sm">
        Tambah Produk
    </a>
</div>

<div class="bg-white rounded-xl shadow p-6 overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="py-3">No</th>
                <th>Thumbnail</th>
                <th>Nama</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3">{{ $index + 1 }}</td>
                <td>
                    <img src="{{ asset('products/'.$product->thumbnail) }}"
                         class="w-12 h-12 object-cover rounded">
                </td>
                <td>{{ $product->name }}</td>
                <td>Rp {{ number_format($product->price) }}</td>
                <td class="text-center space-x-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                          method="POST"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs"
                            onclick="return confirm('Hapus produk ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
