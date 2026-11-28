<?php
    require_once('../vendor/connect.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['id_user'])) {
        header('Location: ../index.php');
        exit();
    }

    $login = $_SESSION['login'];
    $stmt = $connect->prepare("SELECT id_user, password, role FROM users WHERE login = ?");
    $stmt->bind_param('s', $login);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    ?>

    <div class="container mt-5">
        <h1>Личный кабинет</h1>
        <div class="card">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Логин:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($user['login']); ?></dd>

                    <dt class="col-sm-3">ФИО:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($user['fio']); ?></dd>

                    <dt class="col-sm-3">Почта:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($user['mail']); ?></dd>

                    <dt class="col-sm-3">Телефон:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($user['phone']); ?></dd>
                </dl>

                <div class="mt-4">
                    <button onclick="change_data_user()">Изменить данные</button>
                    <form action="../vendor/delete_profile.php" method="POST" onsubmit="return confirm('Вы действительно хотите удалить свой аккаунт?');">
                        <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                        <button type="submit" class="btn btn-danger">Удалить аккаунт</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src='../script/bootstrap.bundle.js'></script>
</body>
</html>