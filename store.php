<?php

$db = include "database/start.php";
$db->create('orders', 
	['order name' => $_POST['order_name'],
	'price' => $_POST['price'],
	'description' => $_POST['description'],
	'contacts' => $_POST['contacts']]);

header('Location: /index.php');

?>