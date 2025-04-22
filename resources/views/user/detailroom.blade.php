<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar Kos - Alifia Kost</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .room-gallery img {
            cursor: pointer;
            transition: transform 0.3s;
        }

        .room-gallery img:hover {
            transform: scale(1.02);
        }

        .facility-icon {
            width: 24px;
            text-align: center;
            margin-right: 10px;
            color: #0d6efd;
        }

        .booking-card {
            position: sticky;
            top: 20px;
        }

        .main-image {
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .main-image {
                height: 300px;
            }

            .booking-card {
                position: static;
                margin-top: 30px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-home text-primary me-2"></i>Alifia Kost
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-search me-1"></i> Cari Kos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-heart me-1"></i> Favorit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-1"></i> Akun Saya</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Kosan Putri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kamar 101</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Left Column - Room Details -->
            <div class="col-lg-8">
                <!-- Room Title -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fw-bold">Kamar 101 - Kosan Putri</h1>
                    <span class="badge bg-success fs-6 py-2 px-3">
                        <i class="fas fa-check-circle me-1"></i> Tersedia
                    </span>
                </div>

                <!-- Location -->
                <div class="d-flex align-items-center mb-4">
                    <i class="fas fa-map-marker-alt text-danger me-2 fs-5"></i>
                    <span>Jl. Melati No. 15, Karang Nanas, Sokaraja, Banyumas</span>
                </div>

                <!-- Main Image -->
                <div class="mb-4">
                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80"
                        class="img-fluid main-image w-100 shadow" alt="Kamar 101">
                </div>

                <!-- Image Gallery -->
                <h5 class="fw-bold mb-3">Galeri Kamar</h5>
                <div class="row room-gallery mb-5">
                    <div class="col-4 col-md-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1583845112203-454375aa0a5e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="img-fluid rounded shadow-sm" alt="Interior Kamar">
                    </div>
                    <div class="col-4 col-md-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="img-fluid rounded shadow-sm" alt="Kamar Mandi">
                    </div>
                    <div class="col-4 col-md-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="img-fluid rounded shadow-sm" alt="Dapur Bersama">
                    </div>
                    <div class="col-4 col-md-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="img-fluid rounded shadow-sm" alt="Area Parkir">
                    </div>
                </div>

                <!-- Room Details -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-4">Detail Kamar</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <span class="fw-bold me-2">Tipe Kos:</span>
                                        <span>Putri</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fw-bold me-2">Ukuran Kamar:</span>
                                        <span>4m x 5m</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fw-bold me-2">Lantai:</span>
                                        <span>1</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <span class="fw-bold me-2">Kamar Mandi:</span>
                                        <span>Dalam</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fw-bold me-2">Arah Kamar:</span>
                                        <span>Timur</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fw-bold me-2">Tersedia Sejak:</span>
                                        <span>15 Juni 2023</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facilities -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-4">Fasilitas</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="facility-icon"><i class="fas fa-snowflake"></i></div>
                                    <span>AC</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="facility-icon"><i class="fas fa-bed"></i></div>
                                    <span>Kasur + Springbed</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="facility-icon"><i class="fas fa-bath"></i></div>
                                    <span>Kamar Mandi Dalam</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="facility-icon"><i class="fas fa-wifi"></i></div>
                                    <span>WiFi 50Mbps</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="facility-icon"><i class="fas fa-tshirt"></i></div>
                                    <span>Laundry</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="facility-icon"><i class="fas fa-utensils"></i></div>
                                    <span>Dapur Bersama</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-4">Deskripsi</h3>
                        <p>
                            Kamar nyaman dengan AC dan kamar mandi dalam yang bersih. Lokasi strategis dekat dengan
                            kampus
                            Universitas Jenderal Soedirman (UNSOED) dan berbagai fasilitas umum. Lingkungan yang aman
                            dan
                            nyaman khusus untuk mahasiswi. Sudah termasuk biaya listrik dan air.
                        </p>
                        <p class="mb-0">
                            Kosan ini memiliki security 24 jam, area parkir luas, dan CCTV di area umum. Bebas tamu
                            sampai
                            pukul 21.00 WIB. Tidak menerima penghuni yang merokok.
                        </p>
                    </div>
                </div>

                <!-- Map -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-4">Lokasi</h3>
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.123456789012!2d109.12345678901234!3d-7.123456789012345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDcnMjQuNCJTIDEwOcKwMDcnMjQuNCJF!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Booking Card -->
            <div class="col-lg-4">
                <div class="card booking-card shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-3">Rp 1.200.000<span
                                class="text-muted fs-6 fw-normal">/bulan</span></h3>

                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            <span class="small">Sudah termasuk listrik dan air</span>
                        </div>

                        <hr>

                        <h5 class="fw-bold mb-3">Pilih Tanggal Masuk</h5>
                        <div class="mb-4">
                            <input type="date" class="form-control" id="checkinDate">
                        </div>

                        <h5 class="fw-bold mb-3">Durasi Sewa</h5>
                        <div class="mb-4">
                            <select class="form-select" id="duration">
                                <option value="3">3 Bulan</option>
                                <option value="6" selected>6 Bulan</option>
                                <option value="12">12 Bulan</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-primary btn-lg" type="button">
                                <i class="fas fa-calendar-check me-2"></i>Booking Sekarang
                            </button>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-phone-alt me-2"></i>Hubungi Pemilik
                            </button>
                        </div>

                        <hr>

                        <div class="text-center">
                            <p class="small text-muted mb-2">
                                <i class="fas fa-shield-alt me-1"></i> Pembayaran aman melalui sistem kami
                            </p>
                            <div class="d-flex justify-content-center">
                                <img src="https://via.placeholder.com/40" alt="Payment Method" class="mx-2">
                                <img src="https://via.placeholder.com/40" alt="Payment Method" class="mx-2">
                                <img src="https://via.placeholder.com/40" alt="Payment Method" class="mx-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Alifia Kost</h5>
                    <p>Menyediakan kamar kos nyaman dengan harga terjangkau untuk mahasiswa dan pekerja.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Tautan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">Beranda</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Cari Kos</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Tentang Kami</a></li>
                        <li><a href="#" class="text-white">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (0281) 123456</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@alifiakost.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Melati No. 15, Banyumas</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                    <div>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="small mb-0">&copy; 2023 Alifia Kost. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
