<div class="flex justify-between mb-4">
    <div class="flex items-center space-x-4">
        <div class="relative">
            <button id="filterButton"
                class="bg-gray-200 px-4 py-2 rounded-lg shadow hover:bg-gray-300 flex items-center space-x-2">
                <span>Filter</span>
            </button>
            <div id="filterPopup" class="hidden absolute top-12 left-0 bg-white p-4 rounded-lg shadow-lg z-20">
                <div class="flex items-center space-x-3">
                    <input type="date" id="popupStartDate"
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-gray-700">
                    <span class="text-gray-500 font-medium">sampai</span>
                    <input type="date" id="popupEndDate"
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-gray-700">
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <button id="applyFilterBtn"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Terapkan</button>
                    <button id="closeFilterBtn"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</button>
                </div>
            </div>
        </div>

        <script>
            const filterButton = document.getElementById('filterButton');
            const filterPopup = document.getElementById('filterPopup');
            const closeFilterBtn = document.getElementById('closeFilterBtn');
            const applyFilterBtn = document.getElementById('applyFilterBtn');

            filterButton.addEventListener('click', () => {
                filterPopup.classList.toggle('hidden');
            });

            closeFilterBtn.addEventListener('click', () => {
                filterPopup.classList.add('hidden');
            });

            applyFilterBtn.addEventListener('click', () => {
                const startDate = document.getElementById('popupStartDate').value;
                const endDate = document.getElementById('popupEndDate').value;

                if (startDate && endDate) {
                    console.log(`Filtering data from ${startDate} to ${endDate}`);
                    filterPopup.classList.add('hidden');
                } else {
                    alert('Silakan pilih tanggal awal dan akhir.');
                }
            });

            window.addEventListener('click', (e) => {
                if (!filterPopup.contains(e.target) && e.target !== filterButton) {
                    filterPopup.classList.add('hidden');
                }
            });
        </script>
        <div class="relative w-64">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <!-- Icon Search -->
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <input type="text"
                class="pl-10 pr-4 py-2 border rounded-full w-full focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Cari kamar...">
        </div>

    </div>
    @if (!request()->is('admin/notifikasi'))
        @if (request()->is('admin/kamar'))
            <button id="addRoomBtn"
                class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-full">Tambah</button>
        @elseif (request()->is('admin/penghuni'))
            <button id="addPenghuniBtn"
                class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-full">Tambah</button>
        @elseif (request()->is('admin/pemesanan'))
            <button id="addOrderBtn"
                class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-full">Tambah</button>
        @endif
    @endif
</div>

<script>
    document.getElementById('startDate').addEventListener('change', applyDateFilter);
    document.getElementById('endDate').addEventListener('change', applyDateFilter);

    function applyDateFilter() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (startDate && endDate) {
            // Perform the filtering logic here
            console.log(`Filtering data from ${startDate} to ${endDate}`);
        }
    }

    document.getElementById('addRoomBtn').addEventListener('click', function() {
        document.getElementById('tambahKamarModal').classList.remove('hidden');
    });
    document.getElementById('addPenghuniBtn').addEventListener('click', function() {
        document.getElementById('tambahPenghuniModal').classList.remove('hidden');
    });
    document.getElementById('addOrderBtn').addEventListener('click', function() {
        document.getElementById('tambahPemesananModal').classList.remove('hidden');
    });
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('tambahKamarModal').classList.add('hidden');
    });
</script>
