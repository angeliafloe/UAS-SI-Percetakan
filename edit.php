<?php
require 'connect.php';

$table  = $_POST['table'];
$column = $_POST['column'];
$id     = $_POST['id'];

$allowed_tables = ['admins', 'customer', 'produk'];

if (!in_array($table, $allowed_tables)) {
    die('Akses ditolak');
}

$fields = [];
$values = [];

// ADMIN
if ($table === 'admins') {
    $fields[] = "username_admin = ?";
    $values[] = $_POST['username_admin'];

    $fields[] = "nama_admin = ?";
    $values[] = $_POST['nama_admin'];

    if (!empty($_POST['password_admin'])) {
        $fields[] = "password_admin = ?";
        $values[] = password_hash($_POST['password_admin'], PASSWORD_DEFAULT);
    }
}

// CUSTOMER
if ($table === 'customer') {
    $fields[] = "nama_lengkap = ?";
    $values[] = $_POST['nama_lengkap'];

    $fields[] = "email = ?";
    $values[] = $_POST['email'];

    $fields[] = "no_hp = ?";
    $values[] = $_POST['no_hp'];

    if (!empty($_POST['password'])) {
        $fields[] = "password = ?";
        $values[] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
}

// PRODUK
if ($table === 'produk') {
    $fields[] = "nama_produk = ?";
    $values[] = $_POST['nama_produk'];

    $fields[] = "harga_produk = ?";
    $values[] = $_POST['harga_produk'];
}

$sql = "UPDATE $table SET " . implode(', ', $fields) . " WHERE $column = ?";
$values[] = $id;

$stmt = mysqli_prepare($conn, $sql);

$types = str_repeat('s', count($values));
mysqli_stmt_bind_param($stmt, $types, ...$values);
mysqli_stmt_execute($stmt);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
