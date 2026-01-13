<?php
require 'connect.php';

$id_order = $_POST['id_order'] ?? null;
$status   = $_POST['status'] ?? null;

if (!$id_order || !$status) {
    die('Data tidak lengkap');
}

$stmt = mysqli_prepare($conn, "UPDATE orders SET status = ? WHERE id_order = ?");
mysqli_stmt_bind_param($stmt, "ss", $status, $id_order);
if (mysqli_stmt_execute($stmt)) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    die('Gagal update status order');
}
?>