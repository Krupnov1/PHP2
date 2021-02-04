<div class="catalogs">

	<?php foreach ($catalog as $item) : ?>

		<section class="product">
			<h3><?= $item['name'] ?></h3>
			<h4>(<?= $item['likes'] ?>)</h4>
			<a href="/product/card/?id=<?= $item['id'] ?>"><img src="/img/<?= $item['image_file'] ?>" alt="<?= $item['image_alt'] ?>" width='320' height='341'></a>

		</section>

	<?php endforeach; ?>

</div>
<a href="/?c=product&a=catalog&page=<?= $page ?>">Далее</a>