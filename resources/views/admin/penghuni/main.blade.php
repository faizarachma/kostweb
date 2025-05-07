@extends('admin.layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')

    @include('admin.layouts.header')

    {{-- Modal Tambah Kamar --}}
    @include('admin.penghuni.create')

    {{-- Tabel Data Kamar --}}
    <div class="bg-white rounded-lg shadow-md p-6 mt-10">
        <div class="overflow-x-auto">
            <table class="w-full bg-white rounded-lg overflow-hidden">
                <thead class="sticky top-0 bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No Hp</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($penghuni as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->no_hp }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->tanggal_lahir }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs">
                                <div class="line-clamp-1">{{ $user->alamat }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    @include('admin.penghuni.edit-penghuni')
                                    @include('admin.penghuni.hapus-penghuni')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @stack('scripts')

    {{-- Pagination --}}
    {{-- <div class="mt-4">
        {{ $kamar->links('vendor.pagination.tailwind') }}
    </div> --}}
@endsection
