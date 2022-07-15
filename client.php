<title>Информация по клиенту</title>
<?php

$client = $_GET['client'];
$db = include "database/start.php";
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

$client_info = $db->getOneClient('clients', $client); 
$orders = (search($result, 'Клиент', $client_info['name']));

?>

</br>

  	<p>Заказы:</p>
  	<?php foreach($orders as $order):?>

  	<tr>
      <th scope="row"></th>
      <td><a href="/show.php?id=<?php echo $order['id заказа'];?>"><?php echo $order['Заказ'] . '</br>';?></a></td>

    </tr>

  		<?php endforeach; ?>
</br>
<p>У клиента <?php echo $order['Клиент'];?>:</p>
    <td>
      <a class="btn btn-warning">Заказано на сумму <?php echo $order['Заказано на сумму'] . '</br>';?> </a>
      <a class="btn btn-warning">Оплачено <?php echo $order['Оплачено'] . '</br>';?> </a>
      <a class="btn btn-warning">Не оплачено <?php echo $order['Не Оплачено'] . '</br>';?> </a>
      	
    </td>
      
    
 <a href="javascript:history.back()">Вернуться назад</a>
 
  <form action="index.php" target="_blank">
   <button onclick="document.location='index.php'">На главную</button>
</form>