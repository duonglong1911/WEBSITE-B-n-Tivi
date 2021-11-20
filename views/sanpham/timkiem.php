<div class="container">
	<div class="row">
		<div class="col-3">
			<?php
				include_once("filter.php");
			?>
		</div>
		<div class="col-9">
			<div class="product_show">
			<center><p class="product_show_title">Tìm kiếm</p></center>
			<div class="home__products">
				<ul class="list-products">
			<?php
					if(isset($_POST["ok"])){
						$name = $_POST["name"];
						$sanpham = sanpham::getFilterName($name);
					
					
						foreach ($sanpham as $key => $value) {
				?>

			<li class="product-item col-3 mb-2">
				<div class="product__content">
					<a href="index.php?controller=sanphams&action=chitiet&id=<?=$value['masp']?>">
						<div class="product__image">
							<img src="../DuongVanLong-BTL/assets/img/user/<?=$value['anhsp']?>" alt="photo" class="product-img">
						</div>
						<div class="product-info">
							<p class="mb-1 mt-1 box__product-name"><?=$value['tensp']?></p>
							<p class="mb-1"><span class="product-price"><?php  echo number_format($value['giasp'], 0, ',', '.').' đ';?></span></p>
							 <p class="mb-1 product-origin"> Xuất xử:<?=$value['xuatsu']?></p>
							<p class="mb-1 product-trademark"> Hãng: <?=$value['hangsx']?></p> 
						</div>

						<?php
							if($value['madm'] =="new") {
						?>
						<div class="product__label-new">
							<span>New</span>
						</div>
						<?php } ?>

						<?php
							if($value['madm'] =="hot") {
						?>
						<div class="product__label-hot">
							<span>Hot</span>
						</div>
						<?php } ?>
						
						<?php
							if($value['madm'] =="sale") {
						?>
						<div class="product__label-sale">
							<span>Sale</span>
						</div>
						<?php } ?>
						
					<div class="product__blur">
					</div>
					<div class="product__option">
						<a href="index.php?controller=sanphams&action=chitiet&id=<?=$value['masp']?>">
							<div class="product__option-item product__option-detail">
								<i class="far fa-eye"></i>
							</div>
						</a>
						<button class="button__addcart" type="button" onclick="addcart('<?=$value['masp']?>')">
							<div class="product__option-item product__option-buy">
								<i class="fas fa-cart-plus"></i>
							</div>
						</button>
					</div> 
						
						
				</a>
				</div>
			</li>

			<?php
				}}
			?>
				</ul>
			</div>
			
		</div>

		</div>
	</div>
</div>