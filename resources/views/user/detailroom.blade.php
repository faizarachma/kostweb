<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kost Putri Adi Laksmi - Room Booking</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #28a745;
            --accent-color: #FF6584;
            --light-color: #F8F9FA;
            --dark-color: #212529;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f7;
        }

        .navbar-brand {
            font-weight: 700;
            color: #28a745;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
            font-weight: 500;
        }

        .room-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            background-color: white;
        }

        .room-card:hover {
            transform: translateY(-5px);
        }

        .room-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .room-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .status-badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .available {
            background-color: #E8F5E9;
            color: #2E7D32;
        }

        .unavailable {
            background-color: #FFEBEE;
            color: #C62828;
        }

        .facility-item {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .btn-book {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-book:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 99, 255, 0.3);
        }

        .btn-secondary {
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 500;
        }

        .section-title {
            position: relative;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 3px;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>

<body>


    <!-- Main Content -->
    <div class="container my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active"><a href="#" class="text-decoration-none">Room</a></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Room Image -->
            <div class="col-lg-6 mb-4">
                <div class="room-card h-100">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        class="img-fluid rounded-top" alt="Room Image">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="room-number mb-0">Kamar No. 12</h2>
                            <h3 class="room-price mb-0">Rp.1.200.000</h3>
                        </div>
                        <p class="text-muted">Cozy room with all necessary facilities for comfortable living</p>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="col-lg-6">
                <div class="room-card p-4 h-100">
                    <!-- Status -->
                    <div class="mb-4">
                        <h5 class="section-title">Status Kamar</h5>
                        <div class="d-flex gap-3">
                            <span class="status-badge available">
                                <i class="fas fa-check-circle me-2"></i>Tersedia
                            </span>
                            <span class="status-badge unavailable">
                                <i class="fas fa-times-circle me-2"></i>Tidak Tersedia
                            </span>
                        </div>
                    </div>

                    <!-- Occupants -->
                    <div class="mb-4">
                        <h5 class="section-title">Jumlah Penghuni</h5>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="occupants" id="occupant1" autocomplete="off"
                                checked>
                            <label class="btn btn-outline-primary" for="occupant1">1 Orang</label>

                            <input type="radio" class="btn-check" name="occupants" id="occupant2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="occupant2">2 Orang</label>
                        </div>
                    </div>

                    <!-- Facilities -->
                    <div class="mb-4">
                        <h5 class="section-title">Fasilitas Kamar</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check facility-item">
                                    <input class="form-check-input" type="checkbox" id="bathroom" checked>
                                    <label class="form-check-label" for="bathroom">
                                        <i class="fas fa-bath me-2"></i>Kamar Mandi Dalam
                                    </label>
                                </div>
                                <div class="form-check facility-item">
                                    <input class="form-check-input" type="checkbox" id="bed" checked>
                                    <label class="form-check-label" for="bed">
                                        <i class="fas fa-bed me-2"></i>Kasur
                                    </label>
                                </div>
                                <div class="form-check facility-item">
                                    <input class="form-check-input" type="checkbox" id="wardrobe" checked>
                                    <label class="form-check-label" for="wardrobe">
                                        <i class="fas fa-tshirt me-2"></i>Lemari Pakaian
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check facility-item">
                                    <input class="form-check-input" type="checkbox" id="shoeRack" checked>
                                    <label class="form-check-label" for="shoeRack">
                                        <i class="fas fa-shoe-prints me-2"></i>Rak Sepatu
                                    </label>
                                </div>
                                <div class="form-check facility-item">
                                    <input class="form-check-input" type="checkbox" id="fan">
                                    <label class="form-check-label" for="fan">
                                        <i class="fas fa-fan me-2"></i>Kipas Angin
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Button -->
                    <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-secondary">
                            <i class="fas fa-door-open me-2"></i>Lihat Kamar Lainnya
                        </button>
                        <a href="{{ route('user.booking') }}" class="btn btn-book text-white">
                            <i class="fas fa-calendar-check me-2"></i> Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
