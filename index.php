<?php


$routes = [
	"/homepage" => 'views/homepage.php',
	//можно добавить ещё роуты
];

$route = $_SERVER['REQUEST_URI'];

if(array_key_exists($route, $routes)){
	include $routes[$route]; exit;
}
// else{
//	var_dump(404);
//}


$db = include "database/start.php";


$post = $db->getOneOrder('orders', 1);


$posts = $db->get_all('orders');


//подключили сам вид
include "view_orders.php";
?>
