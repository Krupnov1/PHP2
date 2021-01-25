<?php if ($authorization): ?>
	<form class="rightForm" action="" method="post">
		<p>Здравствуйте <?=$name?>! Добро пожаловать в интернет-магазин!
			<span>/</span><input id="logout" type="submit" name="logout" value="Выйти">/</p>
	</form>

<?php else:?>
	<form class="rightForm" action="" method="post">
		<p><?=$errors?></p>
		<p>Пожалуйста, авторизуйтесь или зарегистрируйтесь!</p>
		<input id="login" type="text" name="login" placeholder="Логин">
		<input id="password" type="password" name="pass" placeholder="Пароль">
		<input id="send" type="submit" name="send" value="Войти"> 
	</form>

<?php endif; ?>
