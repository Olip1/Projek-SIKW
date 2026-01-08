
@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-700">Dashboard Analitik</h1>

        <div class="w-10 h-10 bg-pink-300 rounded-full flex items-center justify-center text-white">
            👤
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow">
            <p class="text-pink-400 text-sm mb-1">Total Pendapatan</p>
            <p class="text-2xl font-semibold">Rp 0</p>
        </div>

        <div class="bg-white rounded-xl p-6 shadow">
            <p class="text-pink-400 text-sm mb-1">Total Pesanan</p>
            <p class="text-2xl font-semibold">0</p>
        </div>

        <div class="bg-white rounded-xl p-6 shadow">
            <p class="text-pink-400 text-sm mb-1">Total User Mendaftar</p>
            <p class="text-2xl font-semibold">0</p>
        </div>
    </div>

    <!-- GRAPH PLACEHOLDER -->
    <div class="bg-white rounded-xl p-6 shadow h-80">
        <p class="text-pink-400 text-sm mb-4">Grafik Pendapatan Bulanan</p>
    </div>
@endsection
