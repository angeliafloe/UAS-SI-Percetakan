<?php
// require 'connect.php';
// session_start(); 

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $id_customer = $_SESSION['id_customer'] ?? 'CUS-000001';
//     $produk      = $_POST['produk'];
//     $size        = $_POST['size'];
//     $qty         = (int)$_POST['qty'];
//     $design_opt  = $_POST['design_option'];
//     $deskripsi   = $design_opt === 'makeit' ? $_POST['deskripsi'] : null;
//     $file_name   = null;

//     if ($design_opt === 'upload' && isset($_FILES['design_file']) && $_FILES['design_file']['error'] === 0) {
//         $ext = pathinfo($_FILES['design_file']['name'], PATHINFO_EXTENSION);
//         $file_name = 'design_' . time() . '.' . $ext;
//         move_uploaded_file($_FILES['design_file']['tmp_name'], 'uploads/' . $file_name);
//     }

//     $harga_per_unit = match($produk) {
//         'Kaos Polos' => 50000,
//         'Hoodie'     => 120000,
//         'Totebag'    => 30000,
//         default      => 0
//     };
//     $total_biaya = $harga_per_unit * $qty;

//     $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//     $id_order = 'ORD-' . substr(str_shuffle($chars), 0, 6);

//     $tgl_jam_pesan = date('Y-m-d H:i:s');
//     $status = 'pending';

//     $stmt = mysqli_prepare($conn, "INSERT INTO orders (id_order, id_customer, tgl_jam_pesan, produk, size, qty, metode_design, deskripsi, file_name, total_biaya, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//     mysqli_stmt_bind_param($stmt, "sssssisissi", $id_order, $id_customer, $tgl_jam_pesan, $produk, $size, $qty, $design_opt, $deskripsi, $file_name, $total_biaya, $status);

//     if (mysqli_stmt_execute($stmt)) {
//         header("Location: success_order.php?id=$id_order");
//         exit;
//     } else {
//         die('Gagal menyimpan order: ' . mysqli_error($conn));
//     }
// }

?>