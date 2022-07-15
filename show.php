<title>Информация по заказу</title>
<?php

$id = $_GET['id'];

$db = include "database/start.php";
$post = $db->getOneOrder('orders', $id);
?>
<p>Информация по заказу:</p>
<?php
foreach($post as $info){
	echo $info;
	echo '</br>';
}

$result = $db->getClientsOrders();

function search($array, $key, $value)
{
    $results = array();

    if (is_array($array))
    {
        if (isset($array[$key]) && $array[$key] == $value)
            $results[] = $array;

        foreach ($array as $subarray)
            $results = array_merge($results, search($subarray, $key, $value));
    }

    return $results;
}

$clients = (search($result, 'Заказ', $post['order_name']));

?>

</br>
<p>Заказчики:</p>
  </tbody>
  <tbody>
  		<?php foreach($clients as $client):?>

  	<tr>
      <th scope="row"></th>
      <td><a href="/client.php?client=<?php echo $client['id клиента'];?>"><?php echo $client['Клиент'] . '</br>';?></a></td>

    </tr>

  		<?php endforeach; ?>

     
    
  </tbody>


<form action="index.php" target="_blank">
   <button onclick="document.location='index.php'">На главную</button>
</form>