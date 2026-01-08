@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">Tambah Banner</h1>

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

    <form action="{{ route('admin.banners.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        {{-- Judul Banner --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Judul Banner
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                   placeholder="Masukkan judul banner">
        </div>

        {{-- Upload Gambar --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Gambar Banner
            </label>
            <input type="file"
                   name="image"
                   class="w-full border rounded px-3 py-2">
            <small class="text-gray-500">
                Format: JPG, PNG, maksimal 2MB
            </small>
        </div>

        {{-- Status --}}
        <div class="mb-6">
            <label class="block font-semibold mb-1">
                Status Banner
            </label>
            <select name="is_active"
                    class="w-full border rounded px-3 py-2">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
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
                Simpan Banner
            </button>
        </div>

    </form>
</div>
@endsection
