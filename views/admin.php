<h2>Заказы</h2>
<table>
<tr>
	<td>№</td>
	<td>Имя</td>
	<td>Телефон</td>
	<td>ID товара</td>
	<td>Количество товара</td>
	<td>Статус</td>
</tr>

<?php foreach($result as $item):?>

	<tr>
		<td><?=$item['number'] ?></td>
		<td><?= $item['name'] ?></td>
		<td><?= $item['phone'] ?></td>
		<td><?= $item['id_product'] ?></td>
		<td><?= $item['quantity'] ?></td>
		<td><?= $item['status'] ?></td>
	</tr>

<?php endforeach; ?>

</table>











