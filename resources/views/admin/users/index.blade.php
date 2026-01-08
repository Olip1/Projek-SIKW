@extends('layouts.admin')

@section('title', 'Manajemen Akun Pembeli')

@section('content')
    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-700">
            Manajemen Akun Pembeli
        </h1>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-pink-400 text-sm mb-4">
            Daftar Pembeli Aktif
        </p>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="text-gray-600 border-b">
                        <th class="py-3 px-2">No</th>
                        <th class="py-3 px-2">Nama</th>
                        <th class="py-3 px-2">Email</th>
                        <th class="py-3 px-2">Status</th>
                        <th class="py-3 px-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $index => $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-2">
                                {{ $index + 1 }}
                            </td>
                            <td class="py-3 px-2">
                                {{ $user->name }}
                            </td>
                            <td class="py-3 px-2">
                                {{ $user->email }}
                            </td>
                            <td class="py-3 px-2">
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                    Aktif
                                </span>
                            </td>
                            <td class="py-3 px-2 text-center">
                                <form action="/admin/users/{{ $user->id }}/disable" method="POST">
                                    @csrf
                                    <button
                                        class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs">
                                        Nonaktifkan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">
                                Tidak ada pembeli aktif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
