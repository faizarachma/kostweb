@extends('admin.layouts.app')

@section('title', 'Kelola Notification')

@section('content')

    @include('admin.layouts.header')

    <div class="bg-white p-4 rounded-lg shadow-md mt-10">
        <div class="overflow-x-auto">
            <table class="w-full bg-white rounded-lg shadow-md border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left border-b">
                        <th class="p-4 border-r">No</th>
                        <th class="p-4 border-r">Nama Penghuni</th>
                        <th class="p-4 border-r">No Kamar</th>
                        <th class="p-4 border-r">Email</th>
                        <th class="p-4 border-r">Tanggal Mulai Sewa</th>
                        <th class="p-4 border-r">Jatuh Tempo pembayaran</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4 space-y-2">

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>



@endsection
