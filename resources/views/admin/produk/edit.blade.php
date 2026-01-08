@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<h1 class="text-xl font-semibold text-gray-700 mb-6">Edit Produk</h1>

<div class="bg-white rounded-xl shadow p-6 max-w-xl">
    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="name"
                   value="{{ $product->name }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Harga</label>
            <input type="number" name="price"
                   value="{{ $product->price }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Thumbnail</label>
            <img src="{{ asset('products/'.$product->thumbnail) }}"
                 class="w-20 h-20 rounded mb-2">
            <input type="file" name="thumbnail"
                   class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="description"
                      class="w-full border p-2 rounded"
                      rows="4">{{ $product->description }}</textarea>
        </div>

        <button class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
