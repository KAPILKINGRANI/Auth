<?php

$app = __DIR__;
require_once("{$app}/../vendor/autoload.php");

require_once("{$app}/classes/AppConfig.class.php");
require_once("{$app}/classes/DatabaseConnection.class.php");

$config = AppConfig::getInstance();
$connection = new DatabaseConnection($config);
