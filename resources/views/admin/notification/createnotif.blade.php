@extends('admin.layouts.app')

@section('title', 'Notifikasi Pembayaran Kos')
@section('content')
    <div class="container mt-4">
        <div class="header d-flex justify-content-between align-items-center">
            <h2>Notifikasi Pembayaran Kos</h2>
            <div>
                <button class="btn btn-primary me-2">
                    <i class="fas fa-sync-alt me-1"></i> Refresh
                </button>
                <button class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> Tambah Data
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penghuni</th>
                                <th>No Kamar</th>
                                <th>Email</th>
                                <th>Tanggal Sewa</th>
                                <th>Jatuh Tempo</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Andi Wijaya</td>
                                <td>B-12</td>
                                <td>
                                    <a href="mailto:andi.wijaya@example.com" class="email-link">
                                        andi.wijaya@example.com
                                    </a>
                                </td>
                                <td>15 Jan 2023</td>
                                <td>15 Jul 2023</td>
                                <td><span class="status-badge status-overdue">Terlambat (5 hari)</span></td>
                                <td>
                                    <button class="btn btn-sm btn-reminder">
                                        <i class="fas fa-envelope me-1"></i> Kirim Reminder
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Budi Santoso</td>
                                <td>A-05</td>
                                <td>
                                    <a href="mailto:budi.santoso@example.com" class="email-link">
                                        budi.santoso@example.com
                                    </a>
                                </td>
                                <td>1 Mar 2023</td>
                                <td>1 Jul 2023</td>
                                <td><span class="status-badge status-due">Jatuh Tempo Hari Ini</span></td>
                                <td>
                                    <button class="btn btn-sm btn-reminder">
                                        <i class="fas fa-envelope me-1"></i> Kirim Reminder
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Citra Dewi</td>
                                <td>C-08</td>
                                <td>
                                    <a href="mailto:citra.dewi@example.com" class="email-link">
                                        citra.dewi@example.com
                                    </a>
                                </td>
                                <td>10 Feb 2023</td>
                                <td>10 Jul 2023</td>
                                <td><span class="status-badge status-due">Jatuh Tempo Besok</span></td>
                                <td>
                                    <button class="btn btn-sm btn-reminder">
                                        <i class="fas fa-envelope me-1"></i> Kirim Reminder
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Dian Permata</td>
                                <td>B-03</td>
                                <td>
                                    <a href="mailto:dian.permata@example.com" class="email-link">
                                        dian.permata@example.com
                                    </a>
                                </td>
                                <td>5 Jan 2023</td>
                                <td>5 Jul 2023</td>
                                <td><span class="status-badge status-paid">Lunas</span></td>
                                <td>
                                    <button class="btn btn-sm btn-secondary" disabled>
                                        <i class="fas fa-check me-1"></i> Sudah Bayar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Kirim Reminder -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Kirim Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mengirim reminder pembayaran kos kepada <strong id="residentName"></strong>?</p>
                    <p>Email akan dikirim ke: <span id="residentEmail" class="text-primary"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning" id="confirmSend">Kirim Reminder</button>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Inisialisasi modal konfirmasi
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));

    // Tangani klik tombol kirim reminder
    document.querySelectorAll('.btn-reminder').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const name = row.cells[1].textContent;
            const email = row.cells[3].querySelector('a').textContent;

            document.getElementById('residentName').textContent = name;
            document.getElementById('residentEmail').textContent = email;

            confirmModal.show();
        });
    });

    // Tangani konfirmasi pengiriman
    document.getElementById('confirmSend').addEventListener('click', function() {
        alert('Reminder telah dikirim ke ' + document.getElementById('residentEmail').textContent);
        confirmModal.hide();
    });
</script>
