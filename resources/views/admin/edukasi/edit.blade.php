@extends('layouts.admin')

@section('title', 'Edit Video Edukasi')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-xl font-semibold text-gray-700">
        Edit Video Edukasi
    </h1>

    <a href="{{ route('admin.edukasi.index') }}"
       class="text-sm text-gray-500 hover:underline">
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">

    <form action="{{ route('admin.edukasi.update', $video->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Judul Video
            </label>
            <input type="text" name="title"
                   value="{{ $video->title }}"
                   class="w-full border rounded-lg px-4 py-2"
                   required>
        </div>

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-600 mb-2">
                URL YouTube
            </label>
            <input type="url" name="youtube_url"
                   value="{{ $video->youtube_url }}"
                   class="w-full border rounded-lg px-4 py-2"
                   required>
        </div>

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Thumbnail Saat Ini
            </label>
            <img src="{{ asset('storage/' . $video->thumbnail) }}"
                 class="w-32 h-20 object-cover rounded-lg mb-3">

            <input type="file" name="thumbnail">
        </div>

        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Status
            </label>
            <select name="is_active"
                    class="w-full border rounded-lg px-4 py-2">
                <option value="1" {{ $video->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$video->is_active ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.edukasi.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-100">
                Batal
            </a>

            <button type="submit"
                    class="px-5 py-2 rounded-lg bg-pink-400 text-white hover:bg-pink-500">
                Update
            </button>
        </div>

    </form>

</div>

@endsection
