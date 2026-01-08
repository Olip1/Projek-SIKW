@extends('layouts.admin')

@section('title', 'Manajemen Video Edukasi')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">
    <h1 class="text-xl font-semibold text-gray-700">
        Manajemen Video Edukasi
    </h1>

    <a href="{{ route('admin.edukasi.create') }}"
       class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded-lg text-sm">
        Tambah Video
    </a>
</div>

<!-- TABLE -->
<div class="bg-white rounded-xl shadow p-6">

    <p class="text-pink-400 text-sm mb-4">
        Daftar Video Edukasi
    </p>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border-collapse">
            <thead>
                <tr class="border-b text-gray-600">
                    <th class="py-3 px-2">No</th>
                    <th class="py-3 px-2">Thumbnail</th>
                    <th class="py-3 px-2">Judul</th>
                    <th class="py-3 px-2">Status</th>
                    <th class="py-3 px-2 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($videos as $index => $video)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-2">{{ $index + 1 }}</td>

                        <td class="py-3 px-2">
                            <img src="{{ asset('storage/' . $video->thumbnail) }}"
                                 class="w-20 h-12 object-cover rounded-lg">
                        </td>

                        <td class="py-3 px-2">
                            {{ $video->title }}
                        </td>

                        <td class="py-3 px-2">
                            @if($video->is_active)
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="py-3 px-2 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.edukasi.edit', $video->id) }}"
                               class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs">
                                Edit
                            </a>

                            <form action="{{ route('admin.edukasi.destroy', $video->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus video ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-gray-500">
                            Belum ada video edukasi
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
