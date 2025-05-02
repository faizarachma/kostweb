@extends('admin.layouts.app')

@section('title', 'Kelola Kamar')

@section('content')

    @include('admin.layouts.header')

    {{-- Modal Tambah Kamar --}}
    @include('admin.room.createroom')

    {{-- Tabel Data Kamar --}}

    <div class="bg-white p-4 rounded-lg shadow-md mt-10">
        <div class="overflow-x-auto">
            <table class="w-full bg-white rounded-lg shadow-md border-collapse">
                <thead class="sticky top-0 bg-gray-200 text-gray-700 text-left border-b">
                    <tr>
                        <th class="p-4 border-r">No</th>
                        <th class="p-4 border-r">Tanggal</th>
                        <th class="p-4 border-r">No Kamar</th>
                        <th class="p-4 border-r">Harga</th>
                        <th class="p-4 border-r">Deskripsi</th>
                        <th class="p-4 border-r">Fasilitas</th>
                        <th class="p-4 border-r">Gambar</th>
                        <th class="p-4 border-r">Status</th>
                        <th class="p-4">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($kamar as $item)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4">{{ $loop->iteration }}</td>
                            <td class="p-4">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="p-4">{{ $item->no_kamar }}</td>
                            <td class="p-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="p-4">{{ $item->deskripsi_kamar }}</td>
                            <td class="p-4">{{ $item->fasilitas }}</td>
                            <td class="p-4">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Kamar"
                                        class="w-20 h-20 object-cover rounded-lg">
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <!-- Apply conditional classes based on the status -->
                                <span
                                    class="px-3 py-2 rounded-full
                                        {{ $item->status == 'available' ? 'bg-green-500 text-white' : '' }}
                                        {{ $item->status == 'booked' ? 'bg-yellow-500 text-white' : '' }}">
                                    {{ $item->status }}
                                </span>
                            </td>

                            <td class="p-4 space-y-2">
                                {{-- Modal Edit Kamar --}}
                                @include('admin.room.updateroom')

                                {{-- Modal Hapus --}}
                                @include('admin.room.deleteroom')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="mt-4">
            {{ $kamar->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    <style>
        .overflow-x-auto {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>

    {{-- Pagination --}}
    {{-- <div class="mt-4">
        {{ $kamar->links('vendor.pagination.tailwind') }}
    </div> --}}
@endsection


<script></script>
