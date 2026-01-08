@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-700">
            Tambah Artikel
        </h1>

        <a href="{{ route('admin.artikel.index') }}"
           class="text-sm text-gray-500 hover:underline">
            Kembali
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-xl shadow p-6 max-w-3xl">

        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- JUDUL -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Judul Artikel
                </label>
                <input type="text" name="title"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-pink-400"
                       placeholder="Masukkan judul artikel"
                       required>
            </div>

            <!-- SLUG -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Slug
                </label>
                <input type="text" name="slug"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-pink-400"
                       placeholder="contoh-judul-artikel"
                       required>
            </div>

            <!-- THUMBNAIL -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Thumbnail
                </label>
                <input type="file" name="thumbnail"
                       class="w-full text-sm text-gray-600"
                       required>
            </div>

            <!-- EXCERPT -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Ringkasan Artikel
                </label>
                <textarea name="excerpt" rows="3"
                          class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-pink-400"
                          placeholder="Ringkasan singkat artikel"
                          required></textarea>
            </div>

            <!-- KONTEN -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Konten Artikel
                </label>
                <textarea name="content" rows="8"
                          class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-pink-400"
                          placeholder="Isi artikel lengkap"
                          required></textarea>
            </div>

            <!-- ACTION -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.artikel.index') }}"
                   class="px-5 py-2 rounded-lg text-sm bg-gray-100 hover:bg-gray-200">
                    Batal
                </a>

                <button type="submit"
                        class="px-5 py-2 rounded-lg text-sm bg-pink-400 hover:bg-pink-500 text-white">
                    Simpan Artikel
                </button>
            </div>

        </form>

    </div>

@endsection
