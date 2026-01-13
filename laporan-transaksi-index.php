<?php
require 'connect.php';
$no = 1;

$query = mysqli_query($conn, "
    SELECT 
        o.id_order,
        o.tgl_jam_pesan,
        c.nama_lengkap,
        o.total_biaya
    FROM `orders` o
    JOIN customer c 
        ON o.id_customer COLLATE utf8mb4_unicode_ci
       = c.id_customer COLLATE utf8mb4_unicode_ci
    ORDER BY o.tgl_jam_pesan DESC
");
$totalQuery = mysqli_query($conn, "
    SELECT SUM(o.total_biaya) AS total_uang
    FROM `orders` o
");
$totalData = mysqli_fetch_assoc($totalQuery);
$totalUang = $totalData['total_uang'] ?? 0;
?>

?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Laporan Transaksi</h4>
            <button onclick="window.print()" class="btn btn-primary btn-sm">🖨 Cetak</button>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>ID Order</th>
                    <th>Tanggal Pesanan</th>
                    <th>Nama Customer</th>
                    <th>Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['id_order']) ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tgl_jam_pesan'])) ?></td>
                        <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                        <td>Rp <?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

            <!-- TOTAL -->
            <tfoot>
                <tr class="table-success fw-bold">
                    <td colspan="4" class="text-end">TOTAL UANG MASUK</td>
                    <td>Rp <?= number_format($totalUang, 0, ',', '.') ?></td>
                </tr>
            </tfoot>
        </table>

    </div>

</body>

</html>