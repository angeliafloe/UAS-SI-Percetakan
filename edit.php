<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['admin_logged_in'])) {
    die('Akses ditolak.');
}

if (!isset($_POST['table'], $_POST['id'])) {
    die('Akses ditolak.');
}

$table = $_POST['table'];
$id    = (int) $_POST['id'];

$allowedTables = [
    'admins'   => 'id_admin',
    'customer' => 'id_customer',
    'produk'   => 'id_produk',
    'orders'   => 'id_order'
];

if (!isset($allowedTables[$table])) {
    die('Akses ditolak.');
}

$primaryKey = $allowedTables[$table];

unset($_POST['table'], $_POST['id']);

$set    = [];
$values = [];
$types  = '';

foreach ($_POST as $key => $value) {

    // password kosong = gak diubah
    if ($key === 'password_admin') {
        if (empty($value)) continue;

        $value = password_hash($value, PASSWORD_DEFAULT);
    }

    $set[]    = "$key = ?";
    $values[] = $value;
    $types   .= 's';
}

$sql = "UPDATE $table SET " . implode(', ', $set) . " WHERE $primaryKey = ?";
$values[] = $id;
$types   .= 'i';

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, $types, ...$values);
mysqli_stmt_execute($stmt);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
