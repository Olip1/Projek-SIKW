@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')
    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-700">
            Tambah Banner
        </h1>

        <a href="{{ route('admin.banner.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm">
            ← Kembali
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-xl shadow p-6 max-w-2xl">
        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- JUDUL BANNER -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Judul Banner
                </label>
                <input type="text" name="title"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-pink-300"
                    placeholder="Masukkan judul banner"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- GAMBAR BANNER -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Gambar Banner
                </label>
                <input type="file" name="image"
                    class="w-full border rounded-lg px-3 py-2">
                <p class="text-xs text-gray-400 mt-1">
                    Format: JPG, PNG | Maksimal 2MB
                </p>
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- STATUS -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Status Banner
                </label>
                <select name="status"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-pink-300">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end space-x-3">
                <button type="reset"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm">
                    Reset
                </button>

                <button type="submit"
                    class="bg-pink-400 hover:bg-pink-500 text-white px-6 py-2 rounded-lg text-sm">
                    Simpan Banner
                </button>
            </div>
        </form>
    </div>
@endsection
