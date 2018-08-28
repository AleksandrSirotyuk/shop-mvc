<?php 
/*$string = '26-12-1996';
$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
$replacement = 'Day: $1 Month: $2 Year: $3';
echo preg_replace($pattern, $replacement, $string);*/
// FRONT CONTROLLER

// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once ROOT.'/components/Db.php';
require_once(ROOT.'/components/Router.php');

// 3. Вызов Router
$router = new Router();
$router->run();
 