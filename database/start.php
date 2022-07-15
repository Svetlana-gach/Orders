<?php
$config = include 'database/config.php';
//подключила два класса
include 'database/QueryBuilder.php';
include 'database/Connection.php';

//вытащила пдо с помощью ф-ии этого класса
//$pdo = Connection::make();

//запустила соединение с базой
return new QueryBuilder(
	Connection::make($config['database']));

?>