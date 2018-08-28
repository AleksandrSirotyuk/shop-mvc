<?php
require ROOT.'/libs/rb-mysql.php';

$paramsPath = ROOT.'/config/db_parameters.php';
$params = include($paramsPath);

R::setup( 'mysql:host=127.0.0.1;dbname='.$params['dbname'],
        $params['user'], $params['password'] ); 
if(!R::testConnection())
 	{
 		exit('Нет подключения к Базе Данных');
 	}
?>