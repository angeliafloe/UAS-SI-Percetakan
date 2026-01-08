<?php
require 'connect.php';

$nama    = $_POST['nama_lengkap'];
$email   = $_POST['email'];
$no_hp   = $_POST['no_hp'];
$pass    = $_POST['password'];
$confirm = $_POST['confirm_password'];

if ($pass !== $confirm) {
    die('Password tidak cocok');
}

$password_hash = password_hash($pass, PASSWORD_DEFAULT);

function generateCustomerId($conn)
{
    do {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $id = 'USR-' . substr(str_shuffle($chars), 0, 6);

        $cek = mysqli_prepare(
            $conn,
            "SELECT id_customer FROM customer WHERE id_customer = ?"
        );
        mysqli_stmt_bind_param($cek, "s", $id);
        mysqli_stmt_execute($cek);
        $res = mysqli_stmt_get_result($cek);

    } while (mysqli_num_rows($res) > 0);

    return $id;
}

$id_customer = generateCustomerId($conn);

$stmt = mysqli_prepare($conn, "
    INSERT INTO customer (id_customer, nama_lengkap, email, no_hp, password)
    VALUES (?, ?, ?, ?, ?)
");

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $id_customer,
    $nama,
    $email,
    $no_hp,
    $password_hash
);

mysqli_stmt_execute($stmt);
header("Location: login.php?register=success");
exit;
