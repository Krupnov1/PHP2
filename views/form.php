<?php if ($authorization): ?>
	<form class="rightForm" action="/auth/login" method="post">
		<p>Здравствуйте <?=$name?>! Добро пожаловать в интернет-магазин!
			<span>/</span><a href="/auth/logout/" id="logout">Выйти</a>/</p>
	</form>

<?php else:?>
	<form class="rightForm" action="/auth/login" method="post">
		<p>Пожалуйста, авторизуйтесь или зарегистрируйтесь!</p>
		<input id="login" type="text" name="login" placeholder="Логин">
		<input id="password" type="password" name="pass" placeholder="Пароль">
		<input id="send" type="submit" name="send" value="Войти"> 
	</form>

<?php endif; ?>
