<h1>Отзывы</h1>
<?=$message?>
<form action="?action=<?=$action?>" method="post">
	<input hidden type="text" name="id" value="<?=$row['id']?>">
	<input class="inputTexts" type="text" placeholder="Ваше имя" name="name" value="<?=$row['name']?>"><br>
	<input class="inputTexts" type="text" placeholder="Ваш отзыв" name="texts" value="<?=$row['texts']?>"><br>
	<input class="inputTexts" type="submit" value="<?=$buttonText?>">
</form>
<?php foreach ($result as $item): ?>

	<?if (isAdmin()):?>
		<b><?=$item['name']?>:</b>
		<?=$item['texts']?>
		<b><a href="?action=EDIT&id=<?=$item['id']?>"> [edit]</a></b> 
		<b><a href="?action=DELETE&id=<?=$item['id']?>"> [x]</a></b><br>

	<?else:?>
		<b><?=$item['name']?>:</b>
		<?=$item['texts']?><br>
	<?endif;?>

<?php endforeach;?>
		
	




