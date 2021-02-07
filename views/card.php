<div class="catalogs">
	<div class="product">
		<img src="/img/<?= $good['image_file'] ?>" alt="<?= $good['image_alt'] ?>">
		<div class="like">(<?= $good['likes'] ?>)</div>
	</div>
	<div class="moschino">
		<h5>PRODUCT COLLECTION</h5>
		<div class="bordMosch brdMoschLeft"></div>
		<div class="activBord"></div>
		<div class="bordMosch brdMoschRight"></div>
		<h4><?= $good['name'] ?></h4>
		<p><?= $good['description'] ?>
		<div class="matMosch">
			<div class="matCott">MATERIAL:<span>COTTON</span></div> 
			<div class="desBin">DESIGNER: <span>BINBURHAN</span></div>
		</div>
		<div class="price"><?= $good['price'] ?><i class="fas fa-ruble-sign"></i></div> 
		<div class="matMoschBord"></div>
		<form class="contWomForm" action="#" method="post">
			<div>
				<h5>CHOOSE COLOR</h5>
				<div class="colorRedCh">
					<div class="redChoose"></div>
					<select class="redSel" name="#">
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="black">Black</option>
					</select>
				</div>
			</div>
			<div>
				<h5>CHOOSE SIZE</h5>
				<select name="#">
					<option value="XXL">XXL</option>
					<option value="XXL">XXL</option>
					<option value="XXL">XXL</option>
				</select>
			</div>
			<div>
				<h5>QUANTITY</h5>
				<input class="quant" type="text" placeholder="Введите количество" name="quantity" value="<?=$row['quantity']?>">
			</div>
			<button class="butSection" name="id_product" value="<?=$good['id']?>">Add to Cart</button>
		</form>
	</div>
</div>




		
	
