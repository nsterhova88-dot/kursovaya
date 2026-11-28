<?php
session_start();
require_once('vendor/connect.php');


if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php'); exit;
}

$login = $_POST['login']; 
$mail = $_POST['mail'];
   
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    
if (!preg_match('/^[a-zA-Z0-9]{6,}$/', $login) || mb_strlen($fio) < 3) {
    $_SESSION['message'] = "Проверьте формат введенных данных";
    header("Location: ../pages/auth_reg.php");
    exit();
} else {
    $stmt = $conn->prepare("INSERT INTO `users` (`login`, `password`, `mail`) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $login, $pass, $mail);
    if ($stmt->execute()) { 
        $_SESSION['message'] = "Успешная регистрация";
        header("Location: ../pages/auth_reg.php");
        exit(); 
    } else { 
        $_SESSION['message'] = "Проверьте формат введенных данных";
        header("Location: ../pages/auth_reg.php");
        exit();
    }
}
?>