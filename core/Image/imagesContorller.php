<?php

namespace Core\Image;

use Core\Database\Connect;
use Core\Session\SessionManager;

?>
    <head>
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    </head>
    <?php

class imagesContorller extends Connect
{
    protected static string $dir = '../../uploaded';
    protected static string $queryAll = 'SELECT * FROM `pictures`';
    protected static string $sqlAll = 'SELECT `user_id`, `user_login` FROM `users`';

    protected static string $select_where = 'SELECT `user_login` FROM `users` WHERE `user_id` = :id';

    protected static string $queryMy = 'SELECT * FROM `pictures` WHERE `id` = :id';

    protected static string $queryOne = 'SELECT `img_name`,`views` FROM `pictures` WHERE `id` = :id';
    protected static string $queryOneUpdate = 'UPDATE `pictures` SET `views` = `views`+1 WHERE `id` = :id';


    public static function ShowOne($id)
    {
        $pdo = new Connect();
        $options = [':id' => $id];
        $pdo->update(self::$queryOneUpdate, $options);
        $allViewsData = $pdo->execute(self::$queryOne, $options); ?>

        <img src="../uploaded<?= DIRECTORY_SEPARATOR . $allViewsData['img_name'] ?>" title="<?= $id ?>"/>
        <p align="center">Просмотров: <?= $allViewsData['views'] ?></p>
    <?php }

    public static function ShowMy( $id )
    {
        $pdo = new Connect();
        $PicData = $pdo->execute(self::$queryMy, [':id' => $id]); ?>
                    <table class="card" width="530px" align="center" bgcolor="black" >
                        <thead>
                        <td><?= $PicData['name']?></td>
                        </thead>
                <tbody width="530px" id="card" align="center">
            <tr>
                <td>
                <a href="/details?id=<?= $PicData['id'] ?>">
                    <div class="blok_img">
                        <img width="300px" src="../../uploaded/<?= $PicData['img_name'] ?>" class="img"
                             title="<?= $PicData['img_name']; ?>"/>
                    </div>
                </a>
                        <p id="views" style="color: white">Просмотров: <?= $PicData['views'] ?></p>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Описание</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $PicData['mini_description'] ?>
                            </td>
                        </tr>
                        </tbody>
                        </table><br/>
                    <?php }

    public static function ShowUser()
    {
        $pdo = new Connect();
        $options = [':id' => $_GET['id']];
        $PicData = $pdo->executeAll(self::$queryMy, $options);
        $UserData = $pdo->select(self::$sqlAll);

        if (!empty(self::$dir)) {
            foreach ($UserData as $rowUserData) {
                foreach ($PicData as $rowPicData) {
                    if ($_GET['id'] === $rowUserData['user_id']) { ?>
                        <table align="center" id="uploaded_image" border="2" width="650px" height="650px">
                            <thead bgcolor="#2F4F4F" style="color: #FFFFFF ">
                            <td>
                                <?= $rowUserData['user_login']; ?>
                            </td>
                            </thead>
                            <tbody align="center" bgcolor="black">
                            <tr>
                                <td>
                                    <a href="/details?id=<?= $rowPicData['img_name'] ?>">
                                        <div id="uploaded_image" class="blok_img">
                                            <img src="../uploaded/<?= $rowPicData['img_name'] ?>" height="550px"
                                                 class="pimg" title="<?= $rowPicData['img_name'] ?>"/>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table><br>
                        <?php
                    }
                }
            }
        }
    }

    public static function ShowMyNotAuth()
    {
        $pdo = new Connect();
        $options = [':id' => SessionManager::create()->user('user_id')];
        $PicData = $pdo->executeAll(self::$queryMy, $options);

        if (!empty(self::$dir)) {
            foreach ($PicData as $rowPicData) { ?>
                <table align="center" id="uploaded_image" border="2" width="650px" height="650px">
                    <thead bgcolor="#2F4F4F" style="color: #FFFFFF ">
                    <td>
                        <?php
                        if (SessionManager::create()->user('user_id') === $rowPicData['user_id']) {
                            echo SessionManager::create()->user('user_login');
                        } ?>
                    </td>
                    </thead>
                    <tbody align="center" bgcolor="black">
                    <tr>
                        <td>
                            <a href="/details?id=<?= $rowPicData['img_name'] ?>">
                                <div id="uploaded_image" class="blok_img">
                                    <img src="<?= $rowPicData['img_name'] ?>" height="550px" class="pimg"
                                         title="<?= $rowPicData['img_name'] ?>"/>
                                </div>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table><br>
                <?php
            }
        }
    }

    public static function ShowAll()
    {
        $pdo = new Connect();

        $allPicturesData = $pdo->select(self::$queryAll);
        $allUsersData = $pdo->select(self::$sqlAll);

        if (!empty(self::$dir)) { ?>
            <?php
            foreach ($allPicturesData as $PicData) {
                foreach ($allUsersData as $rowUsersData) { ?>
                    <table class="card" width="530px" align="center" bgcolor="black" >
                    <thead>
                    <?php if ($PicData['user_id'] === $rowUsersData['user_id']) { ?>
                        <td>
                            <a href="/profile?id=<?= $rowUsersData['user_id'] ?>">
                                <?= $PicData['name'] ?>
                            </a>
                        </td>
                    <?php }
                } ?>
                </thead>
                <tbody width="530px" id="card" align="center">
            <tr>
                <td>
                <a href="/details?id=<?= $PicData['id'] ?>">
                    <div class="blok_img">
                        <img width="300px" src="../uploaded/<?= $PicData['img_name'] ?>" class="img"
                             title="<?= $PicData['img_name']; ?>"/>
                    </div>
                </a>
                <?php foreach ($allPicturesData as $rowPicData) {
                    if ($rowPicData['img_name'] == $PicData['img_name']) { ?>
                        <p id="views" style="color: white">Просмотров: <?= $rowPicData['views'] ?></p>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Описание</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $rowPicData['mini_description'] ?>
                            </td>
                        </tr>
                        </tbody>
                        </table><br/>
                    <?php }
                }
            }
        }
    }

    public static function AdmShowUser()
    {
        $pdo = new Connect();
        $options = [':id' => $_GET['id']];
        $PicData = $pdo->executeAll(self::$queryMy, $options);
        $UsersData = $pdo->selectOne(self::$select_where, $options); ?>

        <!--        <table align="center">-->
        <!--            <td>-->
        <!--                <a href="/deleteProfile?id=--><?//= $_GET['id']
        ?><!--">Удалить профиль</a>-->
        <!--            </td>-->
        <!--        </table>-->
        <p align="center">Секции</p>
        <?php if (!empty(self::$dir)) {
        foreach ($PicData as $rowPicData) { ?>
            <table align="center" id="uploaded_image" border="2" width="650px" height="650px">
                <thead bgcolor="#2F4F4F" style="color: #FFFFFF ">
                <td>
                    <?php
                    echo $UsersData['user_login']; ?>
                    <a href="/delete?id=<?= $rowPicData['img_name'] ?>"><font color="red">Удалить</font><a>
                </td>
                </thead>
                <tbody align="center" bgcolor="black">
                <tr>
                    <td>
                        <a href="/details?id=<?= $rowPicData['img_name'] ?>">
                            <img src="../uploaded/<?= $rowPicData['img_name'] ?>" height="550px" class="pimg"
                                 title="<?= $rowPicData['img_name'] ?>"/>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table><br>
            <?php
        }
    }
    }

    public static function AdmShowAll()
    {
        $pdo = new Connect();

        $allPicturesData = $pdo->select(self::$queryAll);
        $allUsersData = $pdo->select(self::$sqlAll);

        if (!empty(self::$dir)) { ?>
            <?php
            foreach ($allPicturesData as $PicData) {
                foreach ($allUsersData as $rowUsersData) { ?>
                    <table class="card" width="530px" align="center" bgcolor="black" >
                    <thead>
                    <?php if ($PicData['user_id'] === $rowUsersData['user_id']) { ?>
                        <td>
                            <a href="/profile?id=<?= $rowUsersData['user_id'] ?>">
                                <?= $PicData['name'] ?>
                            </a>
                        </td>
                        <td>
                            <a href="/delete?id=<?= $PicData['img_name'] ?>">
                                <font id="a" color="red">Удалить</font>
                            </a>
                        </td>
                    <?php }
                } ?>
                </thead>
                <tbody width="530px" id="card" align="center">
            <tr>
                <td>
                <a href="/details?id=<?= $PicData['id'] ?>">
                    <div class="blok_img">
                        <img width="300px" src="../uploaded/<?= $PicData['img_name'] ?>" class="img"
                             title="<?= $PicData['img_name']; ?>"/>
                    </div>
                </a>
                <?php foreach ($allPicturesData as $rowPicData) {
                    if ($rowPicData['img_name'] == $PicData['img_name']) { ?>
                        <p id="views" style="color: white">Просмотров: <?= $rowPicData['views'] ?></p>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Описание</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $rowPicData['mini_description'] ?>
                            </td>
                        </tr>
                        </tbody>
                        </table><br/>
                    <?php }
                }
            }
        }
    }
}