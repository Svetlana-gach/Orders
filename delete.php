<?php
//include "bach-functions.php";
$db = include "database/start.php";

$id = $_GET['id'];
$db->delete('orders', $id);

header('Location: /index.php');

?>
