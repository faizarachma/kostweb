@extends('admin.layouts.app')

@section('title', 'Kelola Kamar')

@section('content')

    @include('admin.layouts.header')

    {{-- Modal Tambah Kamar --}}
    @include('admin.room.createroom')

    {{-- Tabel Data Kamar --}}
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="overflow-auto max-h-[70vh]">
            <table class="w-full bg-white rounded-lg overflow-hidden">
                <thead class="sticky top-0 bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">No Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Fasilitas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($kamar as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 align-top">{{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 align-top">
                                {{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 align-top">
                                {{ $item->no_kamar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 align-top">Rp
                                {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs align-top">
                                <div class="line-clamp-2">{{ $item->deskripsi_kamar }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs align-top">
                                <div class="line-clamp-2">{{ $item->fasilitas }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap align-top">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Kamar"
                                        class="w-16 h-16 object-cover rounded-md border border-gray-200">
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap align-top">
                                @if ($item->status == 'available')
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Available</span>
                                @elseif($item->status == 'booked')
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Booked</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap align-top">
                                <div class="flex items-center space-x-2">
                                    @include('admin.room.updateroom')
                                    @include('admin.room.deleteroom')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $kamar->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <style>
        .overflow-x-auto {
            max-height: 400px;
            overflow-y: auto;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    {{-- Pagination --}}
    {{-- <div class="mt-4">
        {{ $kamar->links('vendor.pagination.tailwind') }}
    </div> --}}
@endsection


<script></script>
