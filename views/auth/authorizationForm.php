<?php
use Core\Session\SessionManager;
use Core\AdminCheck;
?>
<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8"/>
    <title>Страница авторизации</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/auth.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Контакты</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/authorization">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<h3>Авторизация</h3>
<a href="index.php">
    <button>Главная</button>
</a>
<!--<form action="/authorization" id="authorization" method="POST">-->
<!--    <p>Введите почту</p>-->
<!--    <input name="email" type="text" required><br>-->
<!--    --><?php //if (!empty($_SESSION['errors']['login'])) {?>
<!--        <span style="color: #ff0000">--><?php //var_dump($_SESSION['errors']);?><!--</span>-->
<!--    --><?php //} ?>
<!--    <p>Введите Пароль</p>-->
<!--    <input name="password" type="password" required><br>-->
<!--    <input form="authorization" name="submit" type="submit" value="Войти"><br>-->
<!--</form>-->

    <form action="/authorization" method="POST" enctype="multipart/form-data">

        <div class="group">
            <label for="">Введите адрес электронной почты</label>
            <input name="email" type="text">
        </div>
        <div class="group">
            <label for="">Введите пароль</label>
            <input name="password" type="password">
        </div>
        <table border="0">
            <td>
                <div class="group">
                    <button>Войти</button>
                </div>
            </td>
        </table>
    </form>

</body>