<?php
require 'connect.php';

$table  = $_POST['table'];
$column = $_POST['column'];
$id     = $_POST['id'];

$allowedTables = [
    'admins' => ['id_admin'],
    'customer'  => ['id_customer'],
    'produk'   => ['id_produk'],
    'orders'   => ['id_order']
];

if (!isset($allowedTables[$table]) || !in_array($column, $allowedTables[$table])) {
    die('Akses ditolak.');
}

$sql  = "DELETE FROM $table WHERE $column = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
