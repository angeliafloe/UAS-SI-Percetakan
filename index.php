<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['id_customer'])) {
    header("Location: login.php");
    exit;
}

$id_customer = $_SESSION['id_customer'];

$produk_query = mysqli_query($conn, "SELECT * FROM produk ORDER BY nama_produk ASC");

if (isset($_POST['submit'])) {
    $produk_id     = $_POST['produk'];
    $size          = $_POST['size'];
    $qty           = $_POST['qty'];
    $design_option = $_POST['design_option'];
    $deskripsi     = $_POST['deskripsi'] ?? '';
    $file_name     = $_FILES['design_file']['name'] ?? '';
    $tgl_jam_pesan = date('Y-m-d H:i:s');

    $p = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT harga_produk, ukuran FROM produk WHERE id_produk='$produk_id'"
    ));

    $harga_produk = $p['harga_produk'] ?? 0;
    $allowedSizes = json_decode($p['ukuran'], true) ?? [];

    // BACKEND VALIDATION (IMPORTANT)
    if (!in_array($size, $allowedSizes)) {
        die("Ukuran tidak valid untuk produk ini.");
    }

    $total_biaya = $harga_produk * $qty;
    $id_order = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 8));
    $status = 'pending';

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO orders 
        (id_order, id_customer, id_produk, ukuran, tgl_jam_pesan, total_biaya, status, metode_desain, deskripsi, nama_file, banyak)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sssssdssssi",
        $id_order,
        $id_customer,
        $produk_id,
        $size,
        $tgl_jam_pesan,
        $total_biaya,
        $status,
        $design_option,
        $deskripsi,
        $file_name,
        $qty
    );

    mysqli_stmt_execute($stmt);

    $success = true;
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

        .content {
            margin-left: 0 !important;
            width: 100% !important;
        }
    </style>
</head>

<body>
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <?php include 'navbar-customer.php'; ?>
        <!-- Navbar End -->
        <div class="container">
            <div class="form-container">
                <div class="card p-4">
                    <h4 class="mb-4">Pemesanan Produk</h4>

                    <form method="POST" enctype="multipart/form-data">

                        <!-- PRODUK -->
                        <div class="mb-3">
                            <label class="form-label">Pilih Produk</label>
                            <select name="produk" id="produk" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                <?php while ($row = mysqli_fetch_assoc($produk_query)) : ?>
                                    <option
                                        value="<?= $row['id_produk'] ?>"
                                        data-sizes='<?= htmlspecialchars($row["ukuran"]) ?>'>
                                        <?= htmlspecialchars($row['nama_produk']) ?>
                                        (Rp <?= number_format($row['harga_produk'], 0, ',', '.') ?>)
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Ukuran</label>
                                <select name="size" id="size" class="form-select" required>
                                    <option value="">-- Pilih Ukuran --</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="qty" class="form-control" min="1" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Metode Desain</label><br>
                            <input type="radio" name="design_option" value="upload" onclick="toggleDesign()" required> Upload Design
                            <input type="radio" name="design_option" value="makeit" onclick="toggleDesign()"> Jasa Desain
                        </div>

                        <div id="uploadField" class="mb-3 hidden">
                            <input type="file" name="design_file" class="form-control">
                        </div>

                        <div id="descField" class="mb-3 hidden">
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi desain"></textarea>
                        </div>

                        <button class="btn w-100" name="submit" style="background-color: #0a6ea2; color:white;">Pesan</button>
                    </form>

                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success mt-4">
                            Pesanan berhasil dibuat<br>
                            <strong>ID Order:</strong> <?= $id_order ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('produk').addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const sizes = selected.getAttribute('data-sizes');
                const sizeSelect = document.getElementById('size');

                sizeSelect.innerHTML = '<option value="">-- Pilih Ukuran --</option>';

                if (!sizes) return;

                JSON.parse(sizes).forEach(size => {
                    const opt = document.createElement('option');
                    opt.value = size;
                    opt.textContent = size;
                    sizeSelect.appendChild(opt);
                });
            });

            function toggleDesign() {
                document.getElementById('uploadField').classList.toggle('hidden');
                document.getElementById('descField').classList.toggle('hidden');
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>