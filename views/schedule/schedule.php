<?php
use Core\Session\SessionManager;
use Core\AdminCheck;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <title>Дворец Расписание</title>
</head>
<body class="schedule">

<?php if ( SessionManager::create()->isAuthorized() && (AdminCheck::Check()['Admin'] != null) ) { ?>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name')?></a>
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
<?php } else if  (SessionManager::create()->isAuthorized() ) { ?>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Контакты</a>
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
<?php } else { ?>
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
                    <li class="nav-item active">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<?php } ?>
                <p>About</p>
                <p>'</p>
                <h1>Расписание занятий</h1>
                <iframe class="schedule" src="https://docs.google.com/spreadsheets/d/1P6OmyRRR_Qbq2RlCSQ20Y-JjpsH0PV6YV0A08U1QaVM/edit?usp=sharing">1</iframe>

</body>
</html>