<?php

class QueryBuilder{

	protected $pdo1;

	public function __construct($pdo1)
	{
		//создаём внутреннюю переменную,присваем ей то,что нам прилетает в pdo1
		$this->pdo = $pdo1;
	}

	public function getClientsOrders(){

		$sql = 'SELECT
		`clients`.`name` AS `Клиент`, 
		`orders`.`order_name` AS `Заказ`,
		`clients_orders`.`id_client` AS `id клиента`, 
		`clients_orders`.`id_order` AS `id заказа`, 
		`clients`.`total amount` AS `Заказано на сумму`,
		`clients`.`paid` AS `Оплачено`,
		`clients`.`not paid` AS `Не Оплачено`


		FROM `clients_orders` 
		LEFT JOIN `clients` ON `clients`.`id` = `clients_orders`.`id_client` 
		LEFT JOIN `orders` ON `orders`.`id` = `clients_orders`.`id_order`;';
						    
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}


	public function getOneOrder($table, $id){

		$sql = 'SELECT * FROM orders WHERE id=:id';
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(':id', $id);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;

	}

	public function getOneClient($table, $id){

		$sql = 'SELECT * FROM clients WHERE id=:id';
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(':id', $id);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;

	}


	public function get_all($table){
		
	$sql = "SELECT * FROM {$table}";
	$statement = $this->pdo->prepare($sql);
	$statement->execute();

	return $statement->fetchAll(PDO::FETCH_ASSOC);
	
	}

	public function create($table, $data){

		$keys = implode(",", array_keys($data));
		$tags = ":" . implode(", :", array_keys($data));
		$order_name = $_POST['order_name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$contacts = $_POST['contacts'];
		$sql = "INSERT INTO orders (order_name,price,description,contacts) VALUES ('$order_name', '$price', '$description', '$contacts')";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();

	}

	public function delete($table, $id){

		$sql = "DELETE FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute([
			'id' => $id
		]);

	}

}
?>