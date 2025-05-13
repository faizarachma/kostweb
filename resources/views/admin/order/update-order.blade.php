@foreach ($pemesanan as $item)
    <button type="button" class="bg-yellow-500 text-white p-2 rounded-full hover:bg-yellow-600"
        onclick="showUpdateModal({{ json_encode([
            'id' => $item->id,
            'penghuni_id' => $item->penghuni_id,
            'kamar_id' => $item->kamar_id,
            'tanggal_sewa' => optional($item->tanggal_sewa)->format('Y-m-d'),
            'status' => $item->status,
            'bukti_pembayaran' => $item->bukti_pembayaran,
        ]) }})">
        <svg viewBox="0
    0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M3.25 22C3.25 21.5858 3.58579 21.25 4 21.25H20C20.4142 21.25 20.75 21.5858 20.75 22C20.75 22.4142 20.4142 22.75 20 22.75H4C3.58579 22.75 3.25 22.4142 3.25 22Z"
                fill="#ffffff"></path>
            <path
                d="M11.5201 14.929L17.4368 9.01225C16.6315 8.6771 15.6777 8.12656 14.7757 7.22455C13.8736 6.32238 13.323 5.36846 12.9879 4.56312L7.07106 10.4799C6.60932 10.9417 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L8.38334 16.8676C9.00281 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0584 15.3907 11.5201 14.929Z"
                fill="#ffffff"></path>
            <path
                d="M19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142L13.9199 3.63105C13.9296 3.6604 13.9397 3.69015 13.9502 3.72028C14.2103 4.47 14.701 5.45281 15.6243 6.37602C16.5475 7.29923 17.5303 7.78999 18.28 8.05009C18.31 8.0605 18.3396 8.07054 18.3688 8.08021L19.0786 7.37044Z"
                fill="#ffffff"></path>
        </svg>
    </button>
@endforeach

<div id="updateOrderModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-full md:w-1/2 lg:w-1/3 relative">

        <h2 class="text-xl font-semibold mb-4">Update Order</h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-2 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form id="updateOrderForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Resident Selection -->
            <div class="mb-4">
                <label for="edit_penghuni_id" class="block text-sm font-medium text-gray-700">Nama Penghuni</label>
                <select name="penghuni_id" id="edit_penghuni_id" required class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Penghuni --</option>
                    @foreach ($penghuni as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama_lengkap ?? $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('penghuni_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Room Selection -->
            <div class="mb-4">
                <label for="edit_kamar_id" class="block text-sm font-medium text-gray-700">No Kamar</label>
                <select name="kamar_id" id="edit_kamar_id" required class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih No Kamar --</option>
                    @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id }}" data-status="{{ $kamar->status }}">
                            {{ $kamar->no_kamar }} ({{ $kamar->status }})
                        </option>
                    @endforeach
                </select>
                @error('kamar_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rental Date -->
            <div class="mb-4">
                <label for="edit_tanggal_sewa" class="block text-sm font-medium text-gray-700">Tanggal Sewa</label>
                <input type="date" name="tanggal_sewa" id="edit_tanggal_sewa" required min="{{ date('Y-m-d') }}"
                    class="w-full border rounded px-3 py-2">
                @error('tanggal_sewa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Payment Proof -->
            <div class="mb-4">
                <label for="edit_bukti_pembayaran" class="block text-sm font-medium text-gray-700">Bukti
                    Pembayaran</label>
                <input type="file" name="bukti_pembayaran" id="edit_bukti_pembayaran" accept="image/*,.pdf"
                    class="w-full border rounded px-3 py-2">
                <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG, PDF (Max: 10MB)</p>
                <div id="currentProofContainer" class="mt-2">
                    <span class="text-sm text-gray-600">Bukti saat ini: </span>
                    <a id="currentProofLink" href="#" target="_blank" class="text-blue-500 hover:underline"></a>
                </div>
                @error('bukti_pembayaran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Selection -->
            <div class="mb-4">
                <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="edit_status" required class="w-full border rounded px-3 py-2">
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" id="closeUpdateOrderModalBtn"
                    class="px-4 py-2 border rounded-full hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                    Update Pemesanan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update Modal Toggle
            const toggleUpdateModal = (show = true) => {
                const modal = document.getElementById('updateOrderModal');
                if (modal) {
                    modal.classList.toggle('hidden', !show);
                }
            };

            // Close Update Modal
            document.getElementById('closeUpdateOrderModalBtn')?.addEventListener('click', () => toggleUpdateModal(
                false));

            // Room Status Validation for Update
            document.getElementById('edit_kamar_id')?.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.dataset.status === 'booked') {
                    alert('Kamar ini sudah dipesan! Silakan pilih kamar lain.');
                    this.value = '';
                }
            });

            // Date Validation for Update
            document.getElementById('edit_tanggal_sewa')?.addEventListener('change', function() {
                if (new Date(this.value) < new Date()) {
                    alert('Tanggal sewa tidak boleh kurang dari hari ini!');
                    this.value = '';
                }
            });

            // Function to populate update modal with order data
            window.showUpdateModal = function(order) {
                // Set form action URL
                document.getElementById('updateOrderForm').action = `/pemesanan/${order.id}`;

                // Fill form fields
                document.getElementById('edit_penghuni_id').value = order.penghuni_id;
                document.getElementById('edit_kamar_id').value = order.kamar_id;
                document.getElementById('edit_tanggal_sewa').value = order.tanggal_sewa;
                document.getElementById('edit_status').value = order.status;

                // Show current payment proof
                const proofLink = document.getElementById('currentProofLink');
                if (order.bukti_pembayaran) {
                    proofLink.href = `/storage/${order.bukti_pembayaran}`;
                    proofLink.textContent = 'Lihat Bukti Pembayaran';
                    document.getElementById('currentProofContainer').classList.remove('hidden');
                } else {
                    document.getElementById('currentProofContainer').classList.add('hidden');
                }

                // Show modal
                toggleUpdateModal(true);
            };
        });
    </script>
@endpush
