@extends('admin.layouts.app')
@section('title', 'Dashboard Status Kamar')
@section('content')


    <div>
        <div class="container mx-auto px-4 py-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Pie Chart Section -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-700">Distribusi Status Kamar</h2>
                    </div>
                    <div class="p-6">
                        <canvas id="roomStatusChart" height="250"></canvas>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-700">Ringkasan</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-center text-gray-600 font-medium">Total Kamar</h3>
                                <p class="text-center text-3xl font-bold text-blue-600 mt-2">50</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-center text-gray-600 font-medium">Terisi Hari Ini</h3>
                                <p class="text-center text-3xl font-bold text-green-600 mt-2">32</p>
                            </div>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-5 mb-6">
                            <div class="bg-green-500 h-5 rounded-l-full" style="width: 64%"></div>
                            <div class="bg-red-500 h-5 rounded-r-full -ml-1" style="width: 36%"></div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Tersedia</span>
                                <span class="ml-2 text-gray-700">18 Kamar</span>
                            </div>
                            <div class="flex items-center">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Tidak
                                    Tersedia</span>
                                <span class="ml-2 text-gray-700">32 Kamar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-700">Aktivitas Terkini</h2>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No. Kamar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Terakhir Diubah</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Penanggung Jawab</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">101</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Tidak
                                            Tersedia</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5 menit lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin 1</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">205</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Tersedia</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 menit lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin 2</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">312</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Tidak
                                            Tersedia</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30 menit lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin 1</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">107</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Tersedia</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 jam lalu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin 3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 overflow-hidden">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Diagram Pendapatan & Biaya</h1>

            <div class="w-full h-96">
                <canvas id="revenueCostChart"></canvas>
            </div>

            <div class="mt-4 flex justify-between text-sm text-gray-600">
                <div>Periode: Januari - Desember 2023</div>
                <div>Satuan: Juta Rupiah</div>
            </div>
        </div>
    </div>
@endsection

<script>
    // Pie Chart Data
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('roomStatusChart').getContext('2d');
        const roomStatusChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tersedia', 'Tidak Tersedia'],
                datasets: [{
                    data: [18, 32],
                    backgroundColor: [
                        '#10B981', // green-500
                        '#EF4444' // red-500
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} kamar (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });


    //diagram garis
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueCostChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov',
                    'Des'
                ],
                datasets: [{
                        label: 'Pendapatan',
                        data: [15, 18, 22, 25, 28, 30, 32, 35, 38, 40, 42, 45],
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Biaya',
                        data: [10, 12, 15, 18, 20, 22, 25, 23, 20, 22, 25, 28],
                        borderColor: 'rgb(239, 68, 68)',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + ' JT';
                            }
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    });
</script>
</body>

</html>
