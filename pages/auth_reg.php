<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_up</title>
    <link rel="stylesheet" href="../style/auth_reg.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <main>
        <div class="img"></div>
        <div class="registration">
            <h1>Регистрация</h1>
            <form action="vendor/registration.php" method="POST" class="registrationForm">
                <input type="login" name="login_reg" class="login_reg" placeholder="Логин">
                <div class="line"></div>

                <input type="email" name="email_reg" class="email_reg" placeholder="Почта">
                <div class="line"></div>

                <input type="password" name="password_reg" class="password_reg" placeholder="Пароль">
                <div class="line"></div>

                <input type="password" name="conf_pass_reg" class="conf_pass_reg" placeholder="Подтверждение пароля">
                <div class="line"></div>
                <div class="sogl">
                    <div class="checkbox" active="false">
                        <div class="active_checkbox">
                            <div class="agree">✔</div>
                        </div>
                    </div>
                    Я согласен с условиями ресурса
                </div>
                <button class="submit" type="submit" onclick="create()">ЗАРЕГИСТРИРОВАТЬСЯ</button>
            </form>
            <div class="btn-change"><button class="change" onclick="changeA()" number="1">АВТОРИЗАЦИЯ</button></div>
        </div>
        <div class="avtorisation">
            <h1 style="margin-bottom: 3vh;">Авторизация</h1>
            <form action="vendor/avtorizaition.php" method="POST" class="avtorisationForm">
                <input type="login_avto" name="login_avto" class="login_avto" placeholder="Логин">
                <div class="line"></div>

                <input type="password" name="password_avto" class="password_avto" placeholder="Пароль">
                <div class="line"></div>
                <button class="submit" type="submit" onclick="sign()">ВОЙТИ</button>
            </form>
            <div class="btn-change"><button class="change" onclick="changeR()" number="2">РЕГИСТРАЦИЯ</button></div>
        </div>
    </main>
    <script src="script/script.js"></script>
</body>
</html>