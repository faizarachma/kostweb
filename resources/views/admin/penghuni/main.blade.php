@extends('admin.layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')

    @include('admin.layouts.header')

    {{-- Modal Tambah Kamar --}}
    @include('admin.penghuni.create')

    {{-- Tabel Data Kamar --}}

    <div class="bg-white p-4 rounded-lg shadow-md mt-10">
        <div class="overflow-x-auto">
            <table class="w-full bg-white rounded-lg shadow-md border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left border-b">
                        <th class="p-4 border-r">No</th>
                        <th class="p-4 border-r">Nama Lengkap</th>
                        <th class="p-4 border-r">No Hp</th>
                        <th class="p-4 border-r">Email</th>
                        <th class="p-4 border-r">Tanggal Lahir</th>
                        <th class="p-4 border-r">Alamat</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penghuni as $index => $user)
                        <tr class="border-b">
                            <td class="p-4 border-r">{{ $loop->iteration }}</td>
                            <td class="p-4 border-r">{{ $user->name }}</td>
                            <td class="p-4 border-r">{{ $user->no_hp }}</td>
                            <td class="p-4 border-r">{{ $user->email }}</td>
                            <td class="p-4 border-r">{{ $user->tanggal_lahir }}</td>
                            <td class="p-4 border-r">{{ $user->alamat }}</td>
                            <td class="p-4">
                                @include('admin.penghuni.edit-penghuni')
                                @include('admin.penghuni.hapus-penghuni')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    {{-- <div class="mt-4">
        {{ $kamar->links('vendor.pagination.tailwind') }}
    </div> --}}
@endsection


<script></script>
