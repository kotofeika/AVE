<?php

use Core\Session\SessionManager;
use Core\Image\imagesContorller;
use Core\AdminCheck;

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8"/>
    <title>Дом Творчества детей и молодежи</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body class="index">

<?php if ( SessionManager::create()->isAuthorized() && (AdminCheck::Check()['Admin'] != null) ) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Главная
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
                        <a class="nav-link" href="/loading"><?= SessionManager::create()->user('user_login')?></a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <font color="red">(Admin)</font>
                    </li>
                    <a class="nav-link" href="/logout"><img src="images/logout.jpg" height="20" alt="error"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <h3>Дом Творчества детей и молодежи</h3>
   <?php imagesContorller::AdmShowAll(); ?>
    <footer class="footer">
        <div class="footer-menu">
            <table>
                <tr><td class="footer-group"><a href="/">Главная</a></td></tr>
                <tr><td class="footer-group"><a href="/about">О нас</a></td></tr>
                <tr><td class="footer-group"><a href="/schedule">Расписание</a></td></tr>
                <tr><td class="footer-group"><a href="/contact">Контакты</a></td></tr>
            </table>
        </div>
        <div>
            <table>
                <td class="footer-contact"><a href="tel:+78422417925">+7 8422 41 79 25</a></td>
                <td class="footer-contact"><a href="mailto:cherdakly.dom73@mail.ru">cherdakly.dom73@mail.ru</a></td>
            </table>
        </div>
        <p>Copyright © 2021</p>
    </footer>
<?php } else if  (SessionManager::create()->isAuthorized() ) {?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Главная
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
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_login')?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name')?></a>
                    </li>
                    <li>
                    <a class="nav-link" href="/logout"><img src="images/logout.jpg" height="20" alt="error"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <h3>Дом Творчества детей и молодежи</h3>
    <?php
    imagesContorller::ShowAll();
?>
<footer class="footer">
    <div class="footer-menu">
        <table>
            <tr><td class="footer-group"><a href="/">Главная</a></td></tr>
            <tr><td class="footer-group"><a href="/about">О нас</a></td></tr>
            <tr><td class="footer-group"><a href="/schedule">Расписание</a></td></tr>
            <tr><td class="footer-group"><a href="/contact">Контакты</a></td></tr>
        </table>
    </div>
    <div>
        <table>
            <td class="footer-contact"><a href="tel:+78422417925">+7 8422 41 79 25</a></td>
            <td class="footer-contact"><a href="mailto:cherdakly.dom73@mail.ru">cherdakly.dom73@mail.ru</a></td>
        </table>
    </div>
    <p>Copyright © 2021</p>
</footer>
<?php } else { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Главная
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
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_login')?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/authorization">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <h3>Дом Творчества детей и молодежи</h3>
    <?php imagesContorller::ShowAll(); } ?>
<footer class="footer">
    <div class="footer-menu">
        <table>
            <tr><td class="footer-group"><a href="/">Главная</a></td></tr>
            <tr><td class="footer-group"><a href="/about">О нас</a></td></tr>
            <tr><td class="footer-group"><a href="/schedule">Расписание</a></td></tr>
            <tr><td class="footer-group"><a href="/contact">Контакты</a></td></tr>
        </table>
    </div>
    <div>
        <table>
            <td class="footer-contact"><a href="tel:+78422417925">+7 8422 41 79 25</a></td>
            <td class="footer-contact"><a href="mailto:cherdakly.dom73@mail.ru">cherdakly.dom73@mail.ru</a></td>
        </table>
    </div>
    <p>Copyright © 2021</p>
</footer>
</body>
</html>