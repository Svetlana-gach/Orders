<DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<title>Список заказов</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class='container'>
	<div class = "row">
		<div class="col=md-8 offset-md-2">
			<div class="container"> 
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form action="/store.php" method="post">
          <div class='form-group'>
            <label for="">Название заказа</label>
            <input type="text" name="order_name" class="form-control">
            <label for="">Цена</label>
            <input type="text" name="price" class="form-control">
            <label for="">Опишите заказ</label>
            <input type="text" name="description" class="form-control">
            <label for="">Контакты</label>
            <input type="text" name="contacts" class="form-control"> 
          </div>
        <div class="form-group">
          <button class="btn btn-success">Добавить заказ</button>
        </div>
        </form>
      </div>
    </div>
  </div>

			<table class = "table">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Заказ</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
  		<?php foreach($posts as $post):?>
  	<tr>
      <th scope="row"><?php echo $post['id'];?></th>
      <td>
        <a href="/show.php?id=<?php echo $post['id'];?>"><?php echo $post['order_name'];?></a></td>
      <td>
      	<a href="/delete.php?id=<?php echo $post['id'];?>" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</a>
      </td>
    </tr>

  		<?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
</div>
</body>
</html>