<?php
session_start();

$isAdmin = isset($_SESSION['id_admin']);

session_unset();
session_destroy();

if ($isAdmin) {
    header("Location: admin-login.php");
} else {
    header("Location: login.php");
}
exit;
