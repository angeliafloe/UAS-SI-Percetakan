<?php
require 'connect.php';

$q_wait_price = mysqli_query(
    $conn,
    "SELECT COUNT(*) total FROM orders WHERE status = 'pending'"
);
$pending = mysqli_fetch_assoc($q_wait_price)['total'] ?? 0;

$q_wait_confirm = mysqli_query(
    $conn,
    "SELECT COUNT(*) total FROM orders WHERE status = 'selesai'"
);
$selesai = mysqli_fetch_assoc($q_wait_confirm)['total'] ?? 0;

$q_ready = mysqli_query(
    $conn,
    "SELECT COUNT(*) total FROM orders WHERE status = 'diproses'"
);
$siap_produksi = mysqli_fetch_assoc($q_ready)['total'] ?? 0;

$q_total = mysqli_query(
    $conn,
    "SELECT COUNT(*) total FROM orders"
);
$total_order = mysqli_fetch_assoc($q_total)['total'] ?? 0;

$recent_sales = mysqli_query(
    $conn,
    "SELECT 
        o.id_order,
        o.tgl_jam_pesan,
        o.status,
        p.nama_produk as jenis_jasa,
        c.nama_lengkap
     FROM orders o
     JOIN customer c ON o.id_customer = c.id_customer COLLATE utf8mb4_unicode_ci
     JOIN produk p ON o.id_produk = p.id_produk COLLATE utf8mb4_unicode_ci
     ORDER BY o.tgl_jam_pesan DESC
     LIMIT 5"
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid p-4">

        <!-- STATS -->
        <div class="row g-4 mb-4">

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Pending</p>
                        <h4 class="fw-bold mb-0"><?= $pending ?> Order</h4>
                    </div>
                    <div class="icon-circle icon-warning">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Siap Produksi</p>
                        <h4 class="fw-bold mb-0"><?= $siap_produksi ?> Order</h4>
                    </div>
                    <div class="icon-circle icon-success">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                </div>
            </div>

                        <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Selesai</p>
                        <h4 class="fw-bold mb-0"><?= $selesai ?> Order</h4>
                    </div>
                    <div class="icon-circle icon-primary">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card-soft bg-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Order</p>
                        <h4 class="fw-bold mb-0"><?= $total_order ?> Order</h4>
                    </div>
                    <div class="icon-circle icon-danger">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- RECENT SALES -->
        <div class="bg-white rounded-box p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">Penjualan Terbaru</h6>
                <a href="data-order-index.php" class="text-decoration-none">View all</a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>ID Order</th>
                            <th>Customer</th>
                            <th>Jenis Jasa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (mysqli_num_rows($recent_sales) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($recent_sales)): ?>
                                <tr>
                                    <td><?= date('d M Y', strtotime($row['tgl_jam_pesan'])) ?></td>
                                    <td><?= htmlspecialchars($row['id_order']) ?></td>
                                    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                    <td><?= htmlspecialchars($row['jenis_jasa']) ?></td>
                                    <td>
                                        <?php
                                        $badge = match ($row['status']) {
                                            'pending' => 'warning',
                                            'diproses' => 'primary',
                                            'selesai' => 'success',
                                            'dibatalkan' => 'danger',
                                            default => 'dark'
                                        };
                                        ?>
                                        <span class="badge bg-<?= $badge ?>">
                                            <?= ucfirst(str_replace('_', ' ', $row['status'])) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>