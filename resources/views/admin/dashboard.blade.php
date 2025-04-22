@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="grid grid-cols-3 gap-5">
        <!-- Status Kamar -->
        <div class="bg-white p-5 rounded shadow-md">
            <h2 class="font-bold text-lg">Status Kamar</h2>
            <p>Kamar Tersedia: X</p>
            <p>Kamar Dipesan: X</p>
            <p>Kamar Terisi: X</p>
        </div>

        <!-- Status Penghuni -->
        <div class="bg-white p-5 rounded shadow-md">
            <h2 class="font-bold text-lg">Status Penghuni</h2>
            <p>Aktif: X</p>
            <p>Keluar: X</p>
            <p>Menunggu Konfirmasi: X</p>
        </div>

        <!-- Pendapatan Bulanan -->
        <div class="bg-white p-5 rounded shadow-md">
            <h2 class="font-bold text-lg">Pendapatan Bulanan</h2>
            <p>Total Pendapatan: Rp xxx.xxx</p>
        </div>
    </div>
@endsection
