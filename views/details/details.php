<?php

use Core\Session\SessionManager;
use Core\Image\imagesContorller;
use Core\Database\Connect;
use Core\AdminCheck;

$id= $_GET['id'];
$pdo = new Connect();
$hobby = $pdo->execute('SELECT `name`, `mini_description`, `description` FROM pictures WHERE `id`=:id',
    ['id'=>$id]);
$childs = $pdo->executeAll('SELECT `id`, `name` FROM childs WHERE `user_id` =:id',
    [':id' => SessionManager::create()->user('user_id')])
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
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
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item active">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item active">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item active">
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

    <div align="right">
        <a href="index.php"><img height="30" src="../../images/close.png "></a>
    </div>

    <table class="details" cellpadding="5"  align="center" width="500px">
        <thead>
            <td>
                <?= $hobby['name']?>
            </td>
        </thead>

        <tbody>
        <tr>
            <td>
                <?php imagesContorller::ShowOne($id); ?>
            </td>
        </tr>
        <?php if (SessionManager::create()->isAuthorized()){ ?>
        <tr>
            <td>
                <a class="popup_link" href="#popup">
                    <p align="center"><button>Записаться</button></p>
                </a>
            </td>
        </tr>
        <?php } ?>
        <?php if (!SessionManager::create()->isAuthorized()){ ?>
            <tr>
                <td>
                    <a class="popup_link" href="/register">
                        <p align="center"><button>Записаться</button></p>
                    </a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td>
                <?= $hobby['description']?>
            </td>
        </tr>
        </tbody>
        <br>
    </table>
    <div id="popup" class="popup">
        <div class="popup_body">
            <div class="popup_content">
                <a href="#" class="popup_close">X</a>
                <div class="popup_title">ОФОРМЛЕНИЕ ЗАЯВКИ</div>
                <div class="popup_text">
                    <p>
                        <?php if (SessionManager::create()->errors() != null)
                        {
                            echo SessionManager::create()->errors()['sub'];
                            SessionManager::create()->delete('errors');
                        }?>
                    </p>
                    Выберите детей, для которых необходимо создать заявку:<br>
                    <form action="/subscribe?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <p>
                            <select name="id">
                                <?php foreach ($childs as $child){ ?>
                                    <option value="<?= $child['id'] ?>"><?= $child['name'] ?></option>
                                <?php } ?>
                                <input type="submit">
                            </select>
                        </p>
                    </form>
                    Если ребенка нет в списке, пожалуйста, перейдите в <a class="popup_link" href="/profile?id=<?= SessionManager::create()->user('user_id')?>">личный кабинет</a> и добавьте ребенка.
                </div>
            </div>
        </div>
    </div>
</body>

</html>

