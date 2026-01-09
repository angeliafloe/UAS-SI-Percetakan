<?php
session_start();
require 'connect.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email'");
$user  = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['id_customer']   = $user['id_customer'];
    $_SESSION['nama_customer'] = $user['nama_customer'];
    $_SESSION['email']         = $user['email'];

    header("Location: index.php");
    exit;

} else {
    echo "
    <script>
        alert('Email atau password salah.');
        window.location.href = 'login.php';
    </script>
    ";
}
