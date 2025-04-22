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
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Room 1 -->
            <div class="col">
                <div class="card room-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="card-img-top room-img" alt="Kamar 101">
                        <span class="position-absolute top-0 end-0 badge badge-available m-2">
                            Tersedia
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0">Kamar 101</h5>
                            <h5 class="text-success mb-0">Rp 1.200.000</h5>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-center text-muted mb-2">
                                <i class="fas fa-home me-2"></i>
                                <span>Kosan Putri</span>
                            </div>

                            <div class="d-flex flex-wrap">
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-snowflake me-1"></i> AC
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-bath me-1"></i> Kamar Mandi Dalam
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-wifi me-1"></i> WiFi
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-utensils me-1"></i> Dapur Bersama
                                </span>
                            </div>
                        </div>

                        <a href="/kosan/1" class="btn btn-success mt-auto">
                            <i class="fas fa-eye me-2"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>

            <!-- Room 2 -->
            <div class="col">
                <div class="card room-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="card-img-top room-img" alt="Kamar 202">
                        <span class="position-absolute top-0 end-0 badge badge-occupied m-2">
                            Terisi
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0">Kamar 202</h5>
                            <h5 class="text-success mb-0">Rp 1.500.000</h5>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-center text-muted mb-2">
                                <i class="fas fa-home me-2"></i>
                                <span>Kosan Putri</span>
                            </div>

                            <div class="d-flex flex-wrap">
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-snowflake me-1"></i> AC
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-bath me-1"></i> Kamar Mandi Dalam
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-tshirt me-1"></i> Laundry
                                </span>
                            </div>
                        </div>

                        <a href="/kosan/2" class="btn btn-outline-secondary mt-auto disabled">
                            Kamar Terisi
                        </a>
                    </div>
                </div>
            </div>

            <!-- Room 3 -->
            <div class="col">
                <div class="card room-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="card-img-top room-img" alt="Kamar 305">
                        <span class="position-absolute top-0 end-0 badge badge-available m-2">
                            Tersedia
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0">Kamar 305</h5>
                            <h5 class="text-success mb-0">Rp 900.000</h5>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-center text-muted mb-2">
                                <i class="fas fa-home me-2"></i>
                                <span>Kosan Putra</span>
                            </div>

                            <div class="d-flex flex-wrap">
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-fan me-1"></i> Kipas Angin
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-shower me-1"></i> Kamar Mandi Luar
                                </span>
                                <span class="badge bg-primary-light text-primary facility-badge">
                                    <i class="fas fa-parking me-1"></i> Parkir Luas
                                </span>
                            </div>
                        </div>

                        <a href="/kosan/3" class="btn btn-success mt-auto">
                            <i class="fas fa-eye me-2"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
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
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
