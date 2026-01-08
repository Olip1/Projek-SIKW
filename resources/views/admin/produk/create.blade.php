@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<h1 class="text-xl font-semibold text-gray-700 mb-6">Tambah Produk</h1>

<div class="bg-white rounded-xl shadow p-6 max-w-xl">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="name"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Harga</label>
            <input type="number" name="price"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Thumbnail</label>
            <input type="file" name="thumbnail"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="description"
                      class="w-full border p-2 rounded"
                      rows="4"></textarea>
        </div>

        <button class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
