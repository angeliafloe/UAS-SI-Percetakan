<?php
session_start();
require 'connect.php';

$produk_query = mysqli_query($conn, "SELECT * FROM produk ORDER BY nama_produk ASC");
$id_customer = $_SESSION['id_customer'] ?? 'CUS-000001';

if (!isset($_SESSION['id_customer'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $produk_id = $_POST['produk'];
    $size      = $_POST['size'];
    $qty       = $_POST['qty'];
    $design_option = $_POST['design_option'];
    $deskripsi    = $_POST['deskripsi'] ?? '';
    $file_name    = $_FILES['design_file']['name'] ?? '';
    $tgl_jam_pesan = date('Y-m-d H:i:s');

    $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga_produk FROM produk WHERE id_produk='$produk_id'"));
    $harga_produk = $p['harga_produk'] ?? 0;
    $total_biaya = $harga_produk * $qty;
    $id_order = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 8));

    $stmt = mysqli_prepare($conn, "INSERT INTO orders (id_order, id_customer, id_produk, tgl_jam_pesan, total_biaya, status, design_option, deskripsi, file_name, qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $status = 'pending';
    mysqli_stmt_bind_param($stmt, "ssssissssi", $id_order, $id_customer, $produk_id, $tgl_jam_pesan, $total_biaya, $status, $design_option, $deskripsi, $file_name, $qty);
    mysqli_stmt_execute($stmt);

    echo "<div class='alert alert-success mt-3'>Pesanan berhasil dikirim! ID Order: $id_order</div>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <style>
        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .hidden {
            display: none;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <div class="card card-soft bg-white p-4 p-sm-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-circle icon-primary me-3">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <h3 class="mb-0">Pemesanan Produk</h3>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="produk" class="form-label">Pilih Produk</label>
                        <select name="produk" id="produk" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            <?php while ($row = mysqli_fetch_assoc($produk_query)) : ?>
                                <option value="<?= $row['id_produk'] ?>">
                                    <?= htmlspecialchars($row['nama_produk']) ?> (Rp <?= number_format($row['harga_produk'], 0, ',', '.') ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="size" class="form-label">Ukuran</label>
                            <select name="size" id="size" class="form-select" required>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="qty" class="form-label">Jumlah (Qty)</label>
                            <input type="number" name="qty" id="qty" class="form-control" min="1" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Metode Desain</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="design_option" value="upload" id="opt_upload" onclick="toggleDesignFields()" required>
                            <label class="form-check-label" for="opt_upload">Upload Design</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="design_option" value="makeit" id="opt_makeit" onclick="toggleDesignFields()">
                            <label class="form-check-label" for="opt_makeit">Jasa Desain</label>
                        </div>
                    </div>

                    <div id="field_upload" class="mb-3 hidden">
                        <label for="file" class="form-label">Upload File Anda</label>
                        <input type="file" name="design_file" id="file" class="form-control">
                    </div>

                    <div id="field_makeit" class="mb-3 hidden">
                        <label for="deskripsi" class="form-label">Deskripsi Desain</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Contoh: Saya ingin gambar kucing warna biru..."></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary w-100">Kirim Pesanan</button>
                </form>

                <?php if (isset($_POST['submit'])): ?>
                    <div class="mt-4 p-3 bg-light rounded-box border-0">
                        <h5 class="text-primary">Ringkasan Pesanan:</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <tr>
                                    <td><strong>Produk</strong></td>
                                    <td>: <?php echo $_POST['produk']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ukuran</strong></td>
                                    <td>: <?php echo $_POST['size']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah</strong></td>
                                    <td>: <?php echo $_POST['qty']; ?> pcs</td>
                                </tr>
                                <tr>
                                    <td><strong>Metode</strong></td>
                                    <td>: <?php
                                            if ($_POST['design_option'] == 'upload') {
                                                echo "Upload (" . $_FILES['design_file']['name'] . ")";
                                            } else {
                                                echo "Jasa Desain<br><small class='text-muted'>" . $_POST['deskripsi'] . "</small>";
                                            }
                                            ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function toggleDesignFields() {
            const uploadField = document.getElementById('field_upload');
            const makeitField = document.getElementById('field_makeit');
            const isUpload = document.getElementById('opt_upload').checked;

            if (isUpload) {
                uploadField.classList.remove('hidden');
                makeitField.classList.add('hidden');
            } else {
                uploadField.classList.add('hidden');
                makeitField.classList.remove('hidden');
            }
        }
    </script>

</body>

</html>