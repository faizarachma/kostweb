{{-- Modal Tambah Kamar --}}

<div id="tambahKamarModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <h2 class="text-xl font-semibold mb-4">Tambah Kamar</h2>
        <form id="tambahKamarForm" action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            <div>
                <label for="no_kamar" class="block text-sm font-medium text-gray-700">No Kamar</label>
                <input type="text" name="no_kamar" id="no_kamar" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="text" name="harga" id="harga" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label for="deskripsi_kamar" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi_kamar" id="deskripsi_kamar" required class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <div>
                <label for="fasilitas" class="block text-sm font-medium text-gray-700">Fasilitas</label>
                <input type="text" name="fasilitas" id="fasilitas" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="w-full border rounded px-3 py-2">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModalBtn"
                    class="bg-gray-300 text-white px-4 py-2 rounded-full hover:bg-gray-600">Batal</button>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Show the modal
    document.getElementById('addRoomBtn').addEventListener('click', function() {
        document.getElementById('tambahKamarModal').classList.remove('hidden');
    });

    // Close the modal
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('tambahKamarModal').classList.add('hidden');
    });
    document.getElementById('closeEditModalBtn').addEventListener('click', function() {
        document.getElementById('editKamarModal').classList.add('hidden');
    });

    

    // Handle form submission
    document.getElementById('tambahKamarForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform your AJAX request here
        const formData = new FormData(this);
        fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Kamar berhasil ditambahkan!');
                    window.location.href = "{{ route('kamar') }}"; // Redirect to the table page
                } else {
                    alert('Terjadi kesalahan saat menambahkan kamar.');
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
