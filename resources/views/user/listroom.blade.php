<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kamar Kos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .room-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .room-img {
            height: 200px;
            object-fit: cover;
        }

        .badge-available {
            background-color: #28a745;
        }

        .badge-occupied {
            background-color: #dc3545;
        }

        .facility-badge {
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Daftar Kamar Kos Alifia</h1>

        <!-- Filter Section -->
        <div class="card mb-5">
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="roomType" class="form-label">Ketersediaan</label>
                        <select class="form-select" id="roomType">
                            <option selected>Semua Kamar</option>
                            <option>Tersedia</option>
                            <option>Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="priceRange" class="form-label">Harga Maksimal</label>
                        <input type="number" class="form-control" id="priceRange" placeholder="Contoh: 1500000">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Room List -->
        <div class="row">
            @foreach ($rooms as $kamar)
                <div class="col-md-4 mb-4">
                    <div class="card room-card h-100">
                        <div class="position-relative">
                            @if ($kamar->gambar)
                                <img src="{{ asset('storage/' . $kamar->gambar) }}" class="card-img-top room-img"
                                    alt="Kamar {{ $kamar->no_kamar }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                    class="card-img-top room-img" alt="Kamar {{ $kamar->no_kamar }}">
                            @endif
                            <span
                                class="position-absolute top-0 end-0 mt-3 mr-2s badge
                                {{ $kamar->status == 'available' ? 'bg-success' : 'bg-danger' }}
                                text-white px-3 py-1 rounded-pill">
                                {{ $kamar->status == 'available' ? 'Tersedia' : 'Booked' }}
                            </span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">Kamar {{ $kamar->no_kamar }}</h5>
                                <h5 class="text-success mb-0">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</h5>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center text-muted mb-2">
                                    <i class="fas fa-home me-2"></i>
                                    <span>Kosan Putri</span>
                                </div>

                                <div class="d-flex flex-wrap">
                                    @foreach (explode(',', $kamar->fasilitas) as $fasilitas)
                                        <span class="badge bg-primary-light text-primary facility-badge me-1 mb-1">
                                            <i class="fas fa-check me-1"></i>{{ trim($fasilitas) }}

                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <a href="{{ $kamar->status == 'booked' ? '#' : '/kosan/' . $kamar->id }}"
                                class="btn mt-auto
                                {{ $kamar->status == 'available' ? 'btn-success' : 'btn-secondary' }}
                                {{ $kamar->status == 'booked' ? 'cursor-not-allowed opacity-50' : '' }}"
                                id="kamar-{{ $kamar->id }}"
                                {{ $kamar->status == 'booked' ? 'onclick="event.preventDefault();"' : '' }}>
                                <i class="fas fa-eye me-2"></i>Lihat Detail
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation example" class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Selanjutnya</a>
                </li>
            </ul>
        </nav>
        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="{{ route('user.home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil semua tombol kamar
            const kamarButton = document.querySelectorAll('.btn');

            kamarButton.forEach(button => {
                // Cek jika tombol memiliki class 'cursor-not-allowed'
                if (button.classList.contains('cursor-not-allowed')) {
                    // Cegah link di-click
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // Cegah aksi klik
                        alert('Kamar sudah dibooking!');
                    });
                }
            });
        });
    </script>
</body>

</html>
