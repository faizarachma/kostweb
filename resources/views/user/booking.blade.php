<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kamar No. X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2e7d32;
            --secondary-color: #1b5e20;
            --accent-color: #4caf50;
            --light-bg: #f8f9fa;
            --light-green: #e8f5e9;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }

        .room-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .room-number {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-outline-secondary {
            border-radius: 8px;
            padding: 10px 25px;
        }

        .payment-option {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
            cursor: pointer;
            background-color: var(--light-green);
        }

        .payment-option:hover {
            border-color: var(--accent-color);
            transform: translateY(-3px);
        }

        .payment-option.active {
            border-color: var(--primary-color);
            background-color: rgba(46, 125, 50, 0.1);
        }

        .bank-logo {
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-right: 10px;
        }

        .total-cost {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="room-number mb-0">Kamar No. X</h1>
                        <p class="mb-0">Kost Laimiya</p>
                    </div>

                    <!-- Added Room Image -->
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        class="room-image" alt="Kamar Kost">

                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-users me-3"
                                        style="color: var(--primary-color); font-size: 1.25rem;"></i>
                                    <div>
                                        <p class="mb-0 text-muted small">Jumlah Penghuni</p>
                                        <h5 class="mb-0">2 Orang</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-calendar-alt me-3"
                                        style="color: var(--primary-color); font-size: 1.25rem;"></i>
                                    <div>
                                        <p class="mb-0 text-muted small">Tanggal Mulai Sewa</p>
                                        <h5 class="mb-0">15 Januari 2024</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Durasi Sewa</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="duration" id="weekly"
                                        checked>
                                    <label class="form-check-label" for="weekly">Perminggu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="duration" id="monthly">
                                    <label class="form-check-label" for="monthly">Perbulan</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 p-4 bg-light rounded-3" style="background-color: var(--light-green);">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Total Biaya:</h5>
                                <div class="total-cost">Rp 1.500.000</div>
                            </div>
                        </div>



                        <div class="mb-4">
                            <label class="form-label fw-bold mb-3">Pilih Metode Pembayaran</label>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="payment-option active">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod"
                                                id="bankTransfer" checked>
                                            <label class="form-check-label fw-bold" for="bankTransfer">Transfer
                                                Bank</label>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex flex-wrap gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="bca"
                                                        checked>
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="bca">
                                                        <img src="https://logo.clearbit.com/bca.co.id" alt="BCA"
                                                            class="bank-logo">
                                                        BCA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="bri"
                                                        checked>
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="bri">
                                                        <img src="https://logo.clearbit.com/bri.co.id" alt="BRI"
                                                            class="bank-logo">
                                                        BRI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="mandiri"
                                                        checked>
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="mandiri">
                                                        <img src="https://logo.clearbit.com/bankmandiri.co.id"
                                                            alt="Mandiri" class="bank-logo">
                                                        Mandiri
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="bni"
                                                        checked>
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="bni">
                                                        <img src="https://logo.clearbit.com/bni.co.id" alt="BNI"
                                                            class="bank-logo">
                                                        BNI
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="payment-option">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod"
                                                id="eWallet">
                                            <label class="form-check-label fw-bold" for="eWallet">E-Wallet</label>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex flex-wrap gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gopay">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="gopay">
                                                        <img src="https://logo.clearbit.com/gojek.com" alt="Gopay"
                                                            class="bank-logo">
                                                        Gopay
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="dana">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="dana">
                                                        <img src="https://logo.clearbit.com/dana.id" alt="DANA"
                                                            class="bank-logo">
                                                        DANA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ovo">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="ovo">
                                                        <img src="https://logo.clearbit.com/ovo.id" alt="OVO"
                                                            class="bank-logo">
                                                        OVO
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="shopeepay">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="shopeepay">
                                                        <img src="https://logo.clearbit.com/shopee.co.id"
                                                            alt="Shopeepay" class="bank-logo">
                                                        Shopeepay
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Batalkan Pembayaran
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-credit-card me-2"></i> Bayar Kamar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aktifkan payment option saat diklik
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('active');
                });
                this.classList.add('active');
                const radioId = this.querySelector('input[type="radio"]').id;
                document.getElementById(radioId).checked = true;
            });
        });

        // Mencegah event bubbling dari checkbox ke parent
        document.querySelectorAll('.payment-option input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
</body>

</html>
