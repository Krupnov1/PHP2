<header>
	<nav class="navigation">

		<?php foreach ($menu as $value) : ?>

			<a href="<?= $value['route'] ?>"> <?= $value['name'] ?> </a>

		<?php endforeach; ?>
		<a href="/basket/all">Корзина (<span id="count"><?= $count ?></span>) </a>

		<!--<?//if (isAdmin()):?>-->
		<a href="/admin">Страница админа</a>
		<!--<?//endif;?>-->

	</nav>
	<div class="logo">
		<a href="/"><span>BRAN</span><span class="headSp">D</span></a>
	</div>
</header>