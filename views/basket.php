<div class="wrapper arrivalsProduct">
	<div class="productDetails">
		<span>Product Details</span>
		<div class="prodCategor">
			<span class="categor1">unite price</span>
			<span class="categor2">Quantity(Edit)</span>
			<span class="categor3">shipping</span>
			<span class="categor4">Subtotal</span>
			<span class="categor5">Action</span>
		</div>
	</div>
	
	<?php 
	foreach($basket as $item): ?>

		<section class="productCart">
			<div class="peopleCart">
				<img src="/img/<?= $item['image_file']?>" alt="<?= $item['image_alt']?>">
				<div class="peopleTxt">
					<h4><?= $item['name'] ?></h4>
					<span class="peopleSpanOne">Color: </span><span class="peopleSpanTwo"></span><br>
					<span class="peopleSpanOne">Size:</span><span class="peopleSpanTwo"></span>
				</div>
			</div>
			<div class="shirtCart">
				<div class="uni"><span>Р <?= $item['price'] ?></span></div>

				<form action="?action=change" method="post">
					<div class="qua"><input type="text" name="quantity" value="<?= $item['quantity'] ?>">
						<button name="id_product" value="<?=$item['id_product']?>"><i class="fas fa-times-circle"></i></button>
					</div>
				</form>

				<div class="ship"><span>FREE</span></div>
				<div class="sub"><span>P <?= $item['price'] * $item['quantity']?></span></div>

				<a href="?action=delete&id=<?= $item['id'] ?>" class="act">
					<span><i class="color fas fa-times-circle"></i></span></a>

			</div>
		</section>

	<?php endforeach; ?>

	<div class="shopCart">
		<div class="clearShop">

			<span>ОФОРМИТЕ ЗАКАЗ</span>
		</div>
		<div class="contShop">
			<span>CONTINUE SHOPPING</span>
		</div>
	</div>
	<div class="containerForm">
		<div class="adress">
			<p><?=$message?></p>
			<form class="adressOne" action="?action=order" method="post">
				<h4>Ваше имя и телефон</h4>
				<input type="text" placeholder="Имя" name="name">
				<input type="text" placeholder="Телефон" name="phone">
				<button>Оформить</button>
			</form>
		</div>
		<div class="discount">
			<form class="discountOne" action="#">
				<h4>coupon  discount</h4>
				<label for="state">Enter your coupon code if you have one</label>
				<input type="text" id="state" placeholder="State">
				<button>Apply coupon</button>
			</form>
		</div>
		<div class="total">
			<!--<div class="subTtl">

				<?php foreach($sum as $item): ?>

				<span class="sub-total">Sub total P<?= $item['sum']?></span><br>
				<span class="grand">GRAND TOTAL<span class="grdTtl">P <?= $item['sum']?></span></span>

				<?php endforeach; ?>

			</div>-->
			<button>proceed to checkout</button>
		</div>
	</div>	
</div>	
	