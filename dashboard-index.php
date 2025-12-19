<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --soft-shadow: 0 8px 24px rgba(0, 0, 0, .06);
            --radius: 16px;
        }

        body {
            background-color: #f5f7fb;
            font-size: 14px;
        }

        .card-soft {
            border-radius: var(--radius);
            box-shadow: var(--soft-shadow);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .card-soft:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, .08);
        }

        .icon-circle {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .icon-primary {
            background: rgba(13, 110, 253, .12);
            color: #0d6efd;
        }

        .icon-success {
            background: rgba(25, 135, 84, .12);
            color: #198754;
        }

        .icon-warning {
            background: rgba(255, 193, 7, .18);
            color: #ffc107;
        }

        .icon-danger {
            background: rgba(220, 53, 69, .12);
            color: #dc3545;
        }

        .rounded-box {
            border-radius: var(--radius);
            box-shadow: var(--soft-shadow);
        }

        .table thead th {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .03em;
        }

        .badge {
            border-radius: 50px;
            padding: .45em .8em;
            font-weight: 500;
        }

        .avatar {
            width: 42px;
            height: 42px;
            object-fit: cover;
        }

        .todo-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-4">

        <!-- STATS -->
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Menunggu Harga</p>
                        <h4 class="fw-bold mb-0">24 Order</h4>
                    </div>
                    <div class="icon-circle icon-warning"><i class="fa-solid fa-clock"></i></div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Menunggu Konfirmasi</p>
                        <h4 class="fw-bold mb-0">54 Customer</h4>
                    </div>
                    <div class="icon-circle icon-primary"><i class="fa-solid fa-user-check"></i></div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Siap Produksi</p>
                        <h4 class="fw-bold mb-0">31 Order</h4>
                    </div>
                    <div class="icon-circle icon-success"><i class="fa-solid fa-industry"></i></div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Order</p>
                        <h4 class="fw-bold mb-0">120 Order</h4>
                    </div>
                    <div class="icon-circle icon-danger"><i class="fa-solid fa-chart-line"></i></div>
                </div>
            </div>
        </div>

        <!-- RECENT SALES -->
        <div class="bg-white rounded-box p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">Penjualan Terbaru</h6>
                <a href="#" class="text-decoration-none">View all</a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>ID Order</th>
                            <th>Customer</th>
                            <th>Jenis Jasa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>01 Des 2025</td>
                            <td>Banner01-120-2025</td>
                            <td>Berlin</td>
                            <td>Cetak Banner</td>
                            <td><span class="badge bg-success">Lunas</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">Detail</button></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>05 Des 2025</td>
                            <td>Brosur02-158-2025</td>
                            <td>Angelia</td>
                            <td>Cetak Brosur</td>
                            <td><span class="badge bg-success">Lunas</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">Detail</button></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>06 Des 2025</td>
                            <td>Banner01-121-2025</td>
                            <td>Nabiel</td>
                            <td>Cetak Banner</td>
                            <td><span class="badge bg-success">Lunas</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">Detail</button></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>07 Des 2025</td>
                            <td>Brosur02-159-2025</td>
                            <td>Felix</td>
                            <td>Cetak Brosur</td>
                            <td><span class="badge bg-success">Lunas</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">Detail</button></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>10 Des 2025</td>
                            <td>KartuN03-20-2025</td>
                            <td>Karol</td>
                            <td>Cetak Kartu Nama</td>
                            <td><span class="badge bg-success">Lunas</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">Detail</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- WIDGETS -->
        <div class="row g-4">

            <!-- MESSAGES -->
            <div class="col-xl-4">
                <div class="bg-white rounded-box p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="fw-semibold mb-0">Notifikasi</h6>
                        <a href="#" class="text-decoration-none">All</a>
                    </div>

                    <div class="d-flex align-items-start gap-3 py-3 border-bottom">
                        <img src="https://i.pravatar.cc/100" class="rounded-circle avatar">
                        <div>
                            <h6 class="mb-1">Steven</h6>
                            <small class="text-muted">15 minutes ago</small>
                            <p class="mb-0">Mengajukan pemesanan percetakan produk</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CALENDAR -->
            <div class="col-xl-4">
                <div class="bg-white rounded-box p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="fw-semibold mb-0">Kalender</h6>
                        <i class="fa-regular fa-calendar"></i>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>

            <!-- TODO -->
            <div class="col-xl-4">
                <div class="bg-white rounded-box p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="fw-semibold mb-0">Antrian Status Produksi</h6>
                        <i class="fa-solid fa-list-check"></i>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="New task">
                        <button class="btn btn-primary">Add</button>
                    </div>

                    <div class="todo-item mb-2">
                        <input type="checkbox" class="form-check-input">
                        <span>Produksi 1</span>
                    </div>
                    <div class="todo-item mb-2">
                        <input type="checkbox" class="form-check-input">
                        <span>Produksi 2</span>
                    </div>
                    <div class="todo-item mb-2">
                        <input type="checkbox" class="form-check-input">
                        <span>Produksi 3</span>
                    </div>
                    <div class="todo-item mb-2">
                        <input type="checkbox" class="form-check-input">
                        <span>Produksi 4</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>