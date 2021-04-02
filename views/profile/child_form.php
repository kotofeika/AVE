<?php

use Core\Session\SessionManager;
use Core\AdminCheck;
use Core\Image\imagesContorller;

$userData = SessionManager::create()->user();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8"/>
    <title>Добавить ребенка</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/child.css">
</head>

<body>
<?php if (SessionManager::create()->isAuthorized() && (AdminCheck::Check()['Admin'] != null)) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name') ?></a>
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
<?php } else if (SessionManager::create()->isAuthorized()) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name') ?></a>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout"><img src="images/logout.jpg" height="20" alt="error"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<?php } ?>
<p>Profile</p>

<h3>Добавить ребенка</h3>

<form action="/child" method="POST" enctype="multipart/form-data">
    <p>Фио Ребенка</p>
    <input placeholder="Иванов Иван Иванович" name="name" type="text" required><br>
    <p>Возраст</p>
    <input placeholder="Количество полных лет" name="age" type="text" required><br>
    <p>Пол</p>
    <p>
        <select name="sex">
            <option disabled>Выберите пол</option>
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
        </select>
    </p>
    <input name="submit" type="submit" value="Добавить"><br>
</form>
</body>
</html>

