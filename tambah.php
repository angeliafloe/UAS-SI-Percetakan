<?php
require 'connect.php';

$table = $_POST['table'];
$allowedTables = ['admins', 'users'];

if (!in_array($table, $allowedTables)) {
    die('Akses ditolak.');
}

unset($_POST['table']);
if (isset($_POST['password_admin'])) {
    $_POST['password_admin'] = password_hash(
        $_POST['password_admin'],
        PASSWORD_DEFAULT
    );
}

$columns = array_keys($_POST);
$values  = array_values($_POST);

$placeholders = implode(',', array_fill(0, count($columns), '?'));
$columnsSQL   = implode(',', $columns);

$sql = "INSERT INTO $table ($columnsSQL) VALUES ($placeholders)";
$stmt = mysqli_prepare($conn, $sql);

$types = str_repeat('s', count($values));
mysqli_stmt_bind_param($stmt, $types, ...$values);
mysqli_stmt_execute($stmt);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
