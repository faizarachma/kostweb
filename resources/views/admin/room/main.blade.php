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
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left border-b">
                        <th class="p-4 border-r">No</th>
                        <th class="p-4 border-r">Tanggal</th>
                        <th class="p-4 border-r">No Kamar</th>
                        <th class="p-4 border-r">Harga</th>
                        <th class="p-4 border-r">Deskripsi</th>
                        <th class="p-4 border-r">Fasilitas</th>
                        <th class="p-4 border-r">Gambar</th>
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
                                <img src="{{ asset('storage/products' . $item->gambar) }}" alt="Gambar Kamar"
                                    class="w-20 h-20 object-cover rounded">
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
    </div>

    {{-- Pagination --}}
    {{-- <div class="mt-4">
        {{ $kamar->links('vendor.pagination.tailwind') }}
    </div> --}}
@endsection


<script>
    // Show the modal
    document.getElementById('addRoomBtn').addEventListener('click', function() {
        document.getElementById('tambahKamarModal').classList.remove('hidden');
    });


    // Close the modal
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('tambahKamarModal').classList.add('hidden');
    });

    // Handle form submission
    document.getElementById('tambahKamarForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform your AJAX request here
        const formData = new FormData(this);
        fetch(this.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Kamar berhasil ditambahkan!');
                    location.reload();
                } else {
                    alert('Terjadi kesalahan saat menambahkan kamar.');
                }
            })
            .catch(error => console.error('Error:', error));
    });
    // Show the edit modal
    function openEditModal(id) {
        document.getElementById('editKamarModal-' + id).classList.remove('hidden');
    }
    // Close the edit modal
    function closeEditModal(id) {
        document.getElementById('editKamarModal-' + id).classList.add('hidden');
    }
    // Show the delete modal
    function openDeleteModal(id) {
        document.getElementById('deleteModal-' + id).classList.remove('hidden');
    }

    // Close the delete modal
    function closeDeleteModal(id) {
        document.getElementById('deleteModal-' + id).classList.add('hidden');
    }
    // Handle form submission for delete
    document.querySelectorAll('.deleteForm').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform your AJAX request here
            const formData = new FormData(this);
            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Kamar berhasil dihapus!');
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat menghapus kamar.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
    // Handle form submission for edit
    document.querySelectorAll('.editForm').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform your AJAX request here
            const formData = new FormData(this);
            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Kamar berhasil diupdate!');
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat mengupdate kamar.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
    // Close the edit modal when clicking outside of it
    document.addEventListener('click', function(event) {
        if (event.target.matches('.modal-overlay')) {
            const id = event.target.getAttribute('data-id');
            closeEditModal(id);
        }
    });
    // Close the delete modal when clicking outside of it
    document.addEventListener('click', function(event) {
        if (event.target.matches('.modal-overlay')) {
            const id = event.target.getAttribute('data-id');
            closeDeleteModal(id);
        }
    });
    // Close the edit modal when clicking outside of it
    document.addEventListener('click', function(event) {
        if (event.target.matches('.modal-overlay')) {
            const id = event.target.getAttribute('data-id');
            closeEditModal(id);
        }
    });
</script>
