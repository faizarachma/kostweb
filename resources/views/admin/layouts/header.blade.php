<div class="flex justify-between mb-4">
    <div class="flex items-center space-x-4">
        <div class="relative">
            <button id="filterButton"
                class="bg-gray-200 px-4 py-2 rounded-full shadow hover:bg-gray-300 flex items-center space-x-2">
                <span>Filter</span>
            </button>
            <div id="filterPopup" class="hidden absolute top-12 left-0 bg-white p-4 rounded-lg shadow-lg z-20">
                <div class="flex items-center space-x-3">
                    <input type="date" id="popupStartDate"
                        class="border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-gray-700">
                    <span class="text-gray-500 font-medium">sampai</span>
                    <input type="date" id="popupEndDate"
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-gray-700">
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <button id="applyFilterBtn"
                        class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Terapkan</button>
                    <button id="closeFilterBtn"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-400">Batal</button>
                </div>
            </div>
        </div>
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
                placeholder="Cari Data">
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const filterButton = document.getElementById('filterButton');
            const filterPopup = document.getElementById('filterPopup');
            const closeFilterBtn = document.getElementById('closeFilterBtn');
            const applyFilterBtn = document.getElementById('applyFilterBtn');
            const popupStartDate = document.getElementById('popupStartDate');
            const popupEndDate = document.getElementById('popupEndDate');
            const searchInput = document.querySelector('.relative.w-64 input[type="text"]');

            // Set default dates (today)
            const today = new Date().toISOString().split('T')[0];
            popupStartDate.value = today;
            popupEndDate.value = today;

            // Toggle filter popup
            filterButton.addEventListener('click', function(e) {
                e.stopPropagation();
                filterPopup.classList.toggle('hidden');
            });

            // Close popup when clicking close button
            closeFilterBtn.addEventListener('click', function() {
                filterPopup.classList.add('hidden');
            });

            // Apply filter logic
            applyFilterBtn.addEventListener('click', function() {
                applyFilters();
            });

            // Search functionality
            if (searchInput) {
                let searchTimeout;

                searchInput.addEventListener('input', function(e) {
                    clearTimeout(searchTimeout);

                    searchTimeout = setTimeout(() => {
                        const searchTerm = e.target.value.trim();
                        if (searchTerm.length >= 2 || searchTerm.length === 0) {
                            applyFilters();
                        }
                    }, 500);
                });

                // Also trigger search on Enter key
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        applyFilters();
                    }
                });
            }

            // Close popup when clicking outside
            document.addEventListener('click', function(e) {
                if (!filterPopup.contains(e.target) && e.target !== filterButton) {
                    filterPopup.classList.add('hidden');
                }
            });

            // Main function to apply both filters and search
            function applyFilters() {
                const startDate = popupStartDate.value;
                const endDate = popupEndDate.value;
                const searchTerm = searchInput ? searchInput.value.trim() : '';

                // Validate dates
                if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
                    alert('Tanggal mulai tidak boleh lebih besar dari tanggal akhir');
                    return;
                }

                // Prepare filter data
                const filters = {
                    start_date: startDate,
                    end_date: endDate,
                    search: searchTerm
                };

                console.log('Applying filters:', filters);

                // Here you would typically:
                // 1. For AJAX implementation:
                fetchFilteredData(filters);

                // OR 2. For client-side filtering:
                // filterTableData(filters);
            }

            // Example AJAX implementation
            function fetchFilteredData(filters) {
                // Get current URL without query parameters
                const currentUrl = window.location.href.split('?')[0];

                // Build query string
                const queryParams = new URLSearchParams();

                if (filters.start_date) queryParams.append('start_date', filters.start_date);
                if (filters.end_date) queryParams.append('end_date', filters.end_date);
                if (filters.search) queryParams.append('search', filters.search);

                // Show loading indicator
                // document.getElementById('loadingIndicator').classList.remove('hidden');

                // Make AJAX request
                fetch(`${currentUrl}?${queryParams.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        // Update the table or relevant section
                        // Example: document.getElementById('dataTable').innerHTML = html;
                        console.log('Data fetched successfully');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Gagal memuat data');
                    })
                    .finally(() => {
                        // Hide loading indicator
                        // document.getElementById('loadingIndicator').classList.add('hidden');
                    });
            }

            // Example client-side filtering implementation
            function filterTableData(filters) {
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const rowDate = row.getAttribute(
                        'data-date'); // Assuming each row has data-date attribute
                    const rowText = row.textContent.toLowerCase();

                    // Check date filter
                    const datePassed = !filters.start_date || !filters.end_date ||
                        (rowDate >= filters.start_date && rowDate <= filters.end_date);

                    // Check search filter
                    const searchPassed = !filters.search ||
                        rowText.includes(filters.search.toLowerCase());

                    // Show/hide row based on filters
                    row.style.display = (datePassed && searchPassed) ? '' : 'none';
                });
            }
        });
    </script>
@endpush
