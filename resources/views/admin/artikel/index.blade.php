@extends('layouts.admin')

@section('title', 'Manajemen Artikel')

@section('content')

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-700">
            Manajemen Artikel
        </h1>

        <a href="{{ route('admin.artikel.create') }}"
           class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded-lg text-sm shadow">
            + Tambah Artikel
        </a>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-pink-400 text-sm mb-4">
            Daftar Artikel
        </p>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="text-gray-600 border-b">
                        <th class="py-3 px-2 w-12">No</th>
                        <th class="py-3 px-2">Judul</th>
                        <th class="py-3 px-2">Thumbnail</th>
                        <th class="py-3 px-2">Tanggal</th>
                        <th class="py-3 px-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($articles as $index => $article)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-3 px-2">
                                {{ $index + 1 }}
                            </td>

                            <td class="py-3 px-2">
                                <p class="font-medium text-gray-700">
                                    {{ $article->title }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $article->slug }}
                                </p>
                            </td>

                            <td class="py-3 px-2">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                     class="w-20 h-12 object-cover rounded-lg shadow">
                            </td>

                            <td class="py-3 px-2 text-gray-600">
                                {{ $article->created_at->format('d M Y') }}
                            </td>

                            <td class="py-3 px-2 text-center">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.artikel.edit', $article->id) }}"
                                       class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.artikel.destroy', $article->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">
                                Belum ada artikel
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
