<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->
<script
    type="text/javascript"
    src="http://code.jquery.com/jquery-git2.js"
    ></script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]>
    <script src="http:://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<script>
    $(document).on('mousedown', function (e) {

        console.log('Top: ' + $(this).offset().top + ', Left: ' + $(this).offset().left);
    });
</script>
<?php

require_once('controller.php');

if ($_SESSION['auth'] !== 1) {
    ?>
    <section id="main" class="container">
        <div class="login">
            <h1>Форма авторизации</h1>

            <form action="">
                <p><span class="erLogin"></span><input type="text" name="login" value="" id="login" placeholder="Имя">
                </p>

                <p><span class="erPassword"></span><input type="password" name="password" value="" id="password"
                                                          placeholder="пароль"></p>


                <p></p>

                <p class="remember_me">
                    <label>
                        <center>
                            <img src="captcha.php">
                        </center>
                    </label>
                </p>

                <p><span class="erCaptcha"></span><input type="text" name="captcha" value="" id="captcha"
                                                         placeholder="Введите код сверху"></p>

                <p class="remember_me">
                    <label>
                        <input type="checkbox" checked="checked" name="remember_me" id="remember_me">
                        Запомнить меня
                    </label>
                </p>

                <p class="submit"><input type="button" name="commit" onclick="doSomething()" value="Мне повезет?"><span
                        class="erUser"></span></p>


            </form>
        </div>

        <div class="login-help">
            <p>Забыли пароль? <a href="#">Так Вам и надо!</a>.</p>
        </div>
    </section>
<?php } else { ?>
    <section id="success" class="container">
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
<?php
}



?>
<script>

    function doSomething() {
        if ($('#login').val() === "") {
            $('.erLogin').html("Пустой логин");
        }
        if ($('#password').val() === '') {
            $('.erPassword').html("Пустой пароль");
        }
        if ($('#captcha').val() === '') {
            $('.erCaptcha').html("Неверная каптча!");
        }

        $.ajax({

            type: "post",
            data: "login=" + $('#login').val() + "&password=" + $('#password').val() + "&captcha=" + $('#captcha').val(),
            success: function (resp) {
                if (resp === "") {
                    $('.erUser').html("Нет");
                } else {
                    location.reload();
                }
            },
            error: function () {
                alert("Error!");
            }
        });

    }


</script>
</body>
</html>