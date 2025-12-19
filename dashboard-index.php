<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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