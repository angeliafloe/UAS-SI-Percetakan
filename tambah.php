<?php
require 'connect.php';

$table = $_POST['table'] ?? '';
if (!$table) die('Tabel tidak ditentukan.');


$idColumn = '';
$newId = null;

switch ($table) {
    case 'produk':
        $idColumn = 'id_produk';
        $prefix = 'PDK-';

        $query = mysqli_query($conn, "SELECT $idColumn FROM $table ORDER BY $idColumn DESC LIMIT 1");
        $row = mysqli_fetch_assoc($query);

        if ($row) {
            $lastId = $row[$idColumn];
            $number = (int)substr($lastId, 4, 3);
            $letter = substr($lastId, 7, 1);
            $number++;
            if ($number > 999) $number = 1;
            $letter = $letter ? chr(ord($letter) + 1) : 'A';
        } else {
            $number = 1;
            $letter = 'A';
        }

        $newId = $prefix . str_pad($number, 3, '0', STR_PAD_LEFT) . $letter;
        break;

    case 'admins':
        $idColumn = 'id_admin';

        $query = mysqli_query($conn, "SELECT $idColumn FROM $table ORDER BY $idColumn DESC LIMIT 1");
        $row = mysqli_fetch_assoc($query);

        $newId = $row ? $row[$idColumn] + 1 : 1;
        break;
}
$data = $_POST;
unset($data['table']);

if ($table === 'admins' && isset($data['password_admin'])) {
    $data['password_admin'] = password_hash($data['password_admin'], PASSWORD_DEFAULT);
}

$data[$idColumn] = $newId;

$columns = array_keys($data);
$values  = array_values($data);
$placeholders = implode(',', array_fill(0, count($columns), '?'));
$columnsSQL   = implode(',', $columns);

$sql = "INSERT INTO $table ($columnsSQL) VALUES ($placeholders)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) die("Gagal prepare statement: " . mysqli_error($conn));

$types = str_repeat('s', count($values));
mysqli_stmt_bind_param($stmt, $types, ...$values);

if (mysqli_stmt_execute($stmt)) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    die("Gagal insert: " . mysqli_stmt_error($stmt));
}
