<?php
session_start();
require_once('vendor/connect.php');


if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php'); 
    exit();
}

$login = $_POST['login'];
$pass = $_POST['password'];


$stmt = $conn->prepare("SELECT id_user, password, role FROM users WHERE login = ?");
$stmt->bind_param('s', $login);
$stmt->execute();
$res = $stmt->get_result()->fetch_assoc();

if ($res && password_verify($pass, $res['password'])) {
    $_SESSION['id'] = $res['id']; 
    $_SESSION['role'] = $res['role'];
    header('Location: ../index.php'); 
    exit();
} else {
    $_SESSION['message'] = "Неверный логин или пароль";
    header('Location: ../pages/auth_reg.php');
    exit();
}
