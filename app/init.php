<?php
session_start();
$app = __DIR__; //This line assigns the current directory path to the variable
//u can use ./ in place of app
require_once("{$app}/../vendor/autoload.php");

require_once("{$app}/helper/functions.inc.php");

require_once("{$app}/classes/AppConfig.class.php");
require_once("{$app}/classes/DatabaseConnection.class.php");
require_once("{$app}/classes/QueryBuilder.class.php");
require_once("{$app}/classes/ErrorHandler.class.php");
require_once("{$app}/classes/Validator.class.php");


require_once("{$app}/classes/User.class.php");
require_once("{$app}/classes/Auth.class.php");
require_once("{$app}/classes/Hash.class.php");
require_once("{$app}/classes/Token.class.php");
require_once("{$app}/classes/Mail.class.php");



$config = AppConfig::getInstance();
$connection = new DatabaseConnection($config);


$errorHandler = new ErrorHandler();
$validator = new Validator($connection, $config->APP_DEBUG, $errorHandler);

User::migrate($connection, $config->APP_DEBUG);
Token::migrate($connection, $config->APP_DEBUG);
