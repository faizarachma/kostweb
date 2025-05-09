@extends('admin.layouts.app')

@section('title', 'Kelola Pemesanan')

@section('content')

    @include('admin.layouts.header')

    @include('admin.order.create-order')

    <div class="bg-white p-6 rounded-xl shadow-lg mt-10">
        <div class="overflow-auto max-h-[70vh] rounded-lg">
            <table class="min-w-full table-auto border-collapse text-sm text-gray-700">
                <thead class="sticky top-0 z-10 bg-gradient-to-r from-gray-100 to-gray-200 shadow-sm">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">No
                        </th>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">Nama
                            Penghuni</th>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">No
                            Kamar</th>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">
                            Tanggal Sewa</th>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">Bukti
                            Pembayaran</th>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">Status
                        </th>
                        <th class="px-6 py-3 text-left font-semibold tracking-wide uppercase border-b border-gray-300">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pemesanan as $index => $pesanan)
                        <tr class="border-b hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $pesanan->penghuni->nama_lengkap ?? $pesanan->penghuni->name }}</td>
                            <td class="px-6 py-4">{{ $pesanan->kamar->no_kamar ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $pesanan->tanggal_sewa }}</td>
                            <td class="px-6 py-4">
                                @if ($pesanan->bukti_pembayaran)
                                    <a href="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" target="_blank"
                                        class="text-blue-600 hover:underline">Lihat Bukti</a>
                                @else
                                    <span class="text-gray-400 text-sm">Belum ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $colors = [
                                        'Menunggu' => 'bg-yellow-100 text-yellow-800',
                                        'Diterima' => 'bg-green-100 text-green-700',
                                        'Ditolak' => 'bg-red-100 text-red-700',
                                    ];
                                @endphp
                                <span
                                    class="{{ $colors[$pesanan->status] ?? 'bg-gray-100 text-gray-600' }} px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $pesanan->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                @include('admin.order.update-order')
                                @include('admin.order.delete-order')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada data pemesanan.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>



@endsection
