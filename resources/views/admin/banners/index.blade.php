@extends('layouts.admin')

@section('title', 'Manajemen Banner')

@section('content')
    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-700">
            Manajemen Banner
        </h1>

        <a href="{{ route('admin.banner.create') }}"
            class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded-lg text-sm">
            Tambah Banner
        </a>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-pink-400 text-sm mb-4">
            Daftar Banner Website
        </p>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="text-gray-600 border-b">
                        <th class="py-3 px-2">No</th>
                        <th class="py-3 px-2">Judul Banner</th>
                        <th class="py-3 px-2">Gambar</th>
                        <th class="py-3 px-2">Status</th>
                        <th class="py-3 px-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($banners as $index => $banner)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-2">
                                {{ $index + 1 }}
                            </td>

                            <td class="py-3 px-2">
                                {{ $banner->title }}
                            </td>

                            <td class="py-3 px-2">
                                <img src="{{ asset('storage/' . $banner->image) }}"
                                    class="h-16 rounded-lg object-cover"
                                    alt="Banner">
                            </td>

                            <td class="py-3 px-2">
                                @if ($banner->status == 'aktif')
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                        Aktif
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="py-3 px-2 text-center space-x-2">
                                <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                                    Edit
                                </a>

                                <form action="{{ route('admin.banner.destroy', $banner->id) }}"
                                    method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
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
                                Belum ada banner
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
