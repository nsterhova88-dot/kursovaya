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
    <header>
        <h2>АО Элеконд</h2>
        <nav>
            <a href="index.php"><img src="../img/home.png" alt="icon1"></a>
            <a href="pages/catalog.php"><img src="../img/catalog.png" alt="icon2"></a>
            <a href="pages/profile.php"><img src="../img/profile.png" alt="icon3"></a>
        </nav>
    </header>
    <main>
        <div class="reg" id="reg">
            <h1>Регистрация</h1>
            <form action="../vendor/reg.php" method="POST" class="regForm">
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
            <?php 
                if(isset($_SESSION['message'])){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                } 
                unset($_SESSION['message']);
            ?>
        </div>


        <div class="auth" id="auth">
            <h1 style="margin-bottom: 3vh;">Авторизация</h1>
            <form action="../vendor/auth.php" method="POST" class="authForm">
                <input type="login_avto" name="login_avto" class="login_avto" placeholder="Логин">
                <div class="line"></div>

                <input type="password" name="password_avto" class="password_avto" placeholder="Пароль">
                <div class="line"></div>
                <button class="submit" type="submit" onclick="sign()">ВОЙТИ</button>
            </form>
            <div class="btn-change"><button class="change" onclick="changeR()" number="2">РЕГИСТРАЦИЯ</button></div>
            <?php 
            if(isset($_SESSION['message'])){
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            } 
            unset($_SESSION['message']);
        ?>
        </div>
    </main>
    <script src="../script/change_auth_reg.js"></script>
</body>
</html>