<?php

//соединение с базой, класс с публичной статичной ф-ией
class Connection{
	public static function make($config){
	return new PDO("{$config['connection']}; dbname={$config['database']}; charset={$config['charset']};", "{$config['username']}", "{$config['password']}");
	return $pdo;
}
}

?>