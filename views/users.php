<h1>Форма регистрации</h1>
<h3><?=$message?></h3>
<form class="contact" action="/registration/user" method="post">
    <p>Ваше имя:</p>
    <input class="users name" type="text" placeholder="Имя" name="name" value="<?=$info['name']?>">
    <p>Ваша фамилия:</p>
    <input class="users last_name" type="text" placeholder="Фамилия" name="last_name" value="<?=$info['last_name']?>">
    <p>E-mail:</p>
    <input class="user email" type="text" placeholder="Почта" name="email" value="<?=$info['email']?>">
    <p>Контактный телефон:</p>
    <input class="user tel" type="text" placeholder="Номер" name="tel" value="<?=$info['tel']?>">
    <p>Логин:</p>
    <input class="user" type="text" placeholder="Логин" name="login" value="<?=$info['login']?>">
    <p>Пароль:</p>
    <input class="user" type="password" placeholder="Пароль" name="pass" value="<?=$info['pass']?>">
    <input class="sub" type="submit" name="send">
    <input type="reset" value="Очистить">   
</form>
			
