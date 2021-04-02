<?php

use Core\Session\SessionManager;
?>
<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8"/>
    <title>Страница Регистрации</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/register.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name')?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/authorization">Войти</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/register">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<h3>Регистрация</h3>
<div>
<!--    <span>--><?//= SessionManager::create()->errors()['login']; ?><!--</span><br>-->
<!--    <span>--><?//= SessionManager::create()->errors()['pass']; ?><!--</span>-->
    <form action="/register" method="POST" enctype="multipart/form-data">

        <div class="group">
            <label for="">Введите адрес электронной почты</label>
            <input name="email" type="text">
        </div>
        <div class="group">
            <label for="">Введите ваше ФИО</label>
            <input name="name" type="text">
        </div>
        <div class="group">
            <label for="">Придумайте пароль</label>
            <input name="password" type="password">
        </div>
        <div class="group">
            <label for="">Повторите пароль</label>
            <input name="password2" type="password">
        </div>

        <table border="0">
            <td>
                <div class="group">
                    <button>Зарегистрироваться</button>
                </div>
            </td>
            <td>
                <div class="group">
                    <form action="/authorization" target="_blank">
                        <button>Авторизироваться</button>
                    </form>
                </div>
            </td>
        </table>
    </form>
<!--        <p>Введите адрес электронной почты</p>-->
<!--        <input name="email" type="text" required><br>-->
<!--        <p>Введите ваше ФИО</p>-->
<!--        <input name="name" type="text" required><br>-->
<!--        <p>Придумайте пароль</p>-->
<!--        <input name="password" type="password" required><br>-->
<!--        <input name="submit" type="submit" value="Зарегистрироваться"><br>-->
<!--    </form>-->

</div>
</body>

</html>