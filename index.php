<?php

require_once __DIR__ . "/vendor/autoload.php";

$app = new \Core\App();

$app->setConfigPath('/config/config.php')
    ->setRoutesPath('/config/routes.php');

$app->run();