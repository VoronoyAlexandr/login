<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<?php
require_once('controller.php');
if ($_SESSION['auth'] !== 1) {
    ?>
    <section class="container">
        <div class="login">
            <h1>Форма авторизации</h1>

            <form method="post" action="">
                <p><input type="text" name="login" value="" placeholder="Имя"></p>

                <p><input type="password" name="password" value="" placeholder="пароль"></p>

                <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Запомнить меня
                    </label>
                </p>

                <p class="submit"><input type="submit" name="commit" value="Войти"></p>
            </form>
        </div>

        <div class="login-help">
            <p>Забыли пароль? <a href="index.html">Так Вам и надо!</a>.</p>
        </div>
    </section>
<?php } else { ?>
    <section class="container">
        <div class="login">
            <h1>Форма авторизации</h1>

            <form method="post" action="">
                <p align="center">
                    Здравствуйте, <?php echo $_SESSION['name']; ?>
                </p>
                <input type="hidden" name="logout" value=""/>

                <p class="submit"><input type="submit" name="commit" value="Выйти"></p>
            </form>
        </div>


    </section>
<?php } ?>

</body>
</html>