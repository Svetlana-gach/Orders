<?php
$db = include 'database/start.php';

$posts = $db -> get_all('orders');
include 'view_orders.php';

?>