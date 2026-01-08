@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">Edit Banner</h1>

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.update', $banner->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Judul Banner --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Judul Banner
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $banner->title) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
        </div>

        {{-- Gambar Saat Ini --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Gambar Saat Ini
            </label>
            <img src="{{ asset('storage/' . $banner->image) }}"
                 class="w-64 rounded border mb-2">
        </div>

        {{-- Upload Gambar Baru --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Ganti Gambar (Opsional)
            </label>
            <input type="file"
                   name="image"
                   class="w-full border rounded px-3 py-2">
            <small class="text-gray-500">
                Kosongkan jika tidak ingin mengganti gambar
            </small>
        </div>

        {{-- Status --}}
        <div class="mb-6">
            <label class="block font-semibold mb-1">
                Status Banner
            </label>
            <select name="is_active"
                    class="w-full border rounded px-3 py-2">
                <option value="1" {{ $banner->is_active ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="0" {{ !$banner->is_active ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.banners.index') }}"
               class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                Update Banner
            </button>
        </div>

    </form>
</div>
@endsection
