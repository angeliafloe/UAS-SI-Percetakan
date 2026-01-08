<?php
session_start();
require 'connect.php';

$username = $_POST['username_admin'];
$password = $_POST['password_admin'];

$stmt = mysqli_prepare($conn, "SELECT id_admin, username_admin, password_admin FROM admins WHERE username_admin = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$admin  = mysqli_fetch_assoc($result);

if ($admin && password_verify($password, $admin['password_admin'])) {

    $_SESSION['admin_logged_in'] = true;
    $_SESSION['id_admin'] = $admin['id_admin'];
    $_SESSION['username_admin'] = $admin['username_admin'];

    header("Location: admin-index.php");
    exit;
} else {
    header("Location: admin-login.php?error=1");
    exit;
}
