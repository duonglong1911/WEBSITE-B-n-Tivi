<?php
session_start();
?>

<div class="container">
	<div class="row">
		<div class="title__link mt-3">
			<span><a class="action__link" href="index.php">Trang chủ</a></span>
		</div>
		<h5 class="home__title">TRANG CHỦ</h5>
	</div>
	<div class="row">
		<div class="col-3">
			<?php
			include_once("filter.php");
			?>
		</div>
		<div class="col-9">
			<div class="product_show">
				<div style="text-align:center;">
					<p class="product_show_title">SẢN PHẨM</p>
				</div>
				<div class="home__products">
					<ul class="list-products">
						<?php
								$sanpham4 = sanpham::getSanPhamRandom();
								foreach ($sanpham4 as $key => $sanpham4) {
							?>

						<li class="product-item col-3 mb-2">
							<div class="product__content">
								<a href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham4['masp']?>">
									<div class="product__image">
										<img src="../DuongVanLong-BTL/assets/img/user/<?=$sanpham4['anhsp']?>"
											alt="photo" class="product-img">
									</div>
									<div class="product-info">
										<p class="mb-1 mt-1 box__product-name"><?=$sanpham4['tensp']?></p>
										<p class="mb-1"><span
												class="product-price"><?php  echo number_format($sanpham4['giasp'], 0, ',', '.').' đ';?><small>đ</small></span>
										</p>
										<p class="mb-1 product-origin"> Xuất xử:<?=$sanpham4['xuatsu']?></p>
										<p class="mb-1 product-trademark"> Hãng: <?=$sanpham4['hangsx']?></p>
									</div>

									<?php
											if($sanpham4['madm'] =="new") {
										?>
									<div class="product__label-new">
										<span>New</span>
									</div>
									<?php } ?>

									<?php
											if($sanpham4['madm'] =="hot") {
										?>
									<div class="product__label-hot">
										<span>Hot</span>
									</div>
									<?php } ?>

									<?php
											if($sanpham4['madm'] =="sale") {
										?>
									<div class="product__label-sale">
										<span>Sale</span>
									</div>
									<?php } ?>

									<div class="product__blur">
									</div>
									<div class="product__option">
										<a
											href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham4['masp']?>">
											<div class="product__option-item product__option-detail">
												<i class="far fa-eye"></i>
											</div>
										</a>
										<button class="button__addcart" type="button"
											onclick="addcart('<?=$sanpham4['masp']?>')">
											<div class="product__option-item product__option-buy">
												<i class="fas fa-cart-plus"></i>
											</div>
										</button>
									</div>


								</a>
							</div>
						</li>

						<?php
								}
							?>
					</ul>
					<div class="home__btn-viewmore mt-2" style="text-align:center;">
						<a style=" color:#0098DB;" href="/">Xem tất cả sản phẩm</a>
					</div>
				</div>
			</div>



			<div class="product_show">
				<div style="text-align:center;">
					<p class="product_show_title">Top sản phẩm mới nhất</p>
				</div>
				<div class="home__products">
					<ul class="list-products">
						<?php
						$sanpham = sanpham::getSanPhamMoi();
						foreach ($sanpham as $key => $sanpham) {
					?>

						<li class="product-item col-3 mb-2">
							<div class="product__content">
								<a href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham['masp']?>">
									<div class="product__image">
										<img src="../DuongVanLong-BTL/assets/img/user/<?=$sanpham['anhsp']?>"
											alt="photo" class="product-img">
									</div>
									<div class="product-info">
										<p class="mb-1 mt-1 box__product-name"><?=$sanpham['tensp']?></p>
										<p class="mb-1"><span
												class="product-price"><?php  echo number_format($sanpham['giasp'], 0, ',', '.').' đ';?><small>đ</small></span>
										</p>
										<p class="mb-1 product-origin"> Xuất xử:<?=$sanpham['xuatsu']?></p>
										<p class="mb-1 product-trademark"> Hãng: <?=$sanpham['hangsx']?></p>
									</div>

									<?php
									if($sanpham['madm'] =="new") {
								?>
									<div class="product__label-new">
										<span>New</span>
									</div>
									<?php } ?>

									<?php
									if($sanpham['madm'] =="hot") {
								?>
									<div class="product__label-hot">
										<span>Hot</span>
									</div>
									<?php } ?>

									<?php
									if($sanpham['madm'] =="sale") {
								?>
									<div class="product__label-sale">
										<span>Sale</span>
									</div>
									<?php } ?>

									<div class="product__blur">
									</div>
									<div class="product__option">
										<a href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham['masp']?>">
											<div class="product__option-item product__option-detail">
												<i class="far fa-eye"></i>
											</div>
										</a>
										<a
											href="./chucnang/giohang/themhang.php?id_sp=<?php echo $row['idsp']?>&dongia=<?php  echo $row['price']?>">
											<div class="product__option-item product__option-buy">
												<i class="fas fa-cart-plus"></i>
											</div>
										</a>
									</div>


								</a>
							</div>
						</li>

						<?php
						}
					?>
					</ul>
				</div>

			</div>
			<div class="product_show">
				<div style="text-align:center;">
					<p class="product_show_title">Top sản phẩm giảm giá</p>
				</div>
				<div class="home__products">
					<ul class="list-products">
						<?php
								$sanpham2 = sanpham::getSanPhamGiamgiaTop4();
								foreach ($sanpham2 as $key => $sanpham2) {
							?>

						<li class="product-item col-3 mb-2">
							<div class="product__content">
								<a href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham2['masp']?>">
									<div class="product__image">
										<img src="../DuongVanLong-BTL/assets/img/user/<?=$sanpham2['anhsp']?>"
											alt="photo" class="product-img">
									</div>
									<div class="product-info">
										<p class="mb-1 mt-1 box__product-name"><?=$sanpham2['tensp']?></p>
										<p class="mb-1"><span
												class="product-price"><?php  echo number_format($sanpham2['giasp'], 0, ',', '.').' đ';?><small>đ</small></span>
										</p>
										<p class="mb-1 product-origin"> Xuất xử:<?=$sanpham2['xuatsu']?></p>
										<p class="mb-1 product-trademark"> Hãng: <?=$sanpham2['hangsx']?></p>
									</div>
									<?php
													if($sanpham2['madm'] =="new") {
												?>
									<div class="product__label-new">
										<span>New</span>
									</div>
									<?php } ?>

									<?php
													if($sanpham2['madm'] =="hot") {
												?>
									<div class="product__label-hot">
										<span>Hot</span>
									</div>
									<?php } ?>

									<?php
													if($sanpham2['madm'] =="sale") {
												?>
									<div class="product__label-sale">
										<span>Sale</span>
									</div>
									<?php } ?>
									<div class="product__blur">
									</div>
									<div class="product__option">
										<a
											href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham2['masp']?>">
											<div class="product__option-item product__option-detail">
												<i class="far fa-eye"></i>
											</div>
										</a>
										<a
											href="./chucnang/giohang/themhang.php?id_sp=<?php echo $row['idsp']?>&dongia=<?php  echo $row['price']?>">
											<div class="product__option-item product__option-buy">
												<i class="fas fa-cart-plus"></i>
											</div>
										</a>
									</div>


								</a>
							</div>
						</li>

						<?php
								}
							?>
					</ul>
				</div>
			</div>
			<div class="product_show">
				<div style="text-align: center;">
					<p class="product_show_title">Top sản phẩm Hot</p>
				</div>
				<div class="home__products">
					<ul class="list-products">
						<?php
								$sanpham3 = sanpham::getSanPhamHot();
								foreach ($sanpham3 as $key => $sanpham3) {
							?>

						<li class="product-item col-3 mb-2">
							<div class="product__content">
								<a href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham3['masp']?>">
									<div class="product__image">
										<img src="../DuongVanLong-BTL/assets/img/user/<?=$sanpham3['anhsp']?>"
											alt="photo" class="product-img">
									</div>
									<div class="product-info">
										<p class="mb-1 mt-1 box__product-name"><?=$sanpham3['tensp']?></p>
										<p class="mb-1"><span
												class="product-price"><?php  echo number_format($sanpham3['giasp'], 0, ',', '.').' đ';?><small>đ</small></span>
										</p>
										<p class="mb-1 product-origin"> Xuất xử:<?=$sanpham3['xuatsu']?></p>
										<p class="mb-1 product-trademark"> Hãng: <?=$sanpham3['hangsx']?></p>
									</div>
									<?php
													if($sanpham3['madm'] =="new") {
												?>
									<div class="product__label-new">
										<span>New</span>
									</div>
									<?php } ?>

									<?php
													if($sanpham3['madm'] =="hot") {
												?>
									<div class="product__label-hot">
										<span>Hot</span>
									</div>
									<?php } ?>

									<?php
													if($sanpham3['madm'] =="sale") {
												?>
									<div class="product__label-sale">
										<span>Sale</span>
									</div>
									<?php } ?>

									<div class="product__blur">
									</div>
									<div class="product__option">
										<a
											href="index.php?controller=sanphams&action=chitiet&id=<?=$sanpham3['masp']?>">
											<div class="product__option-item product__option-detail">
												<i class="far fa-eye"></i>
											</div>
										</a>
										<a
											href="./chucnang/giohang/themhang.php?id_sp=<?php echo $row['idsp']?>&dongia=<?php  echo $row['price']?>">
											<div class="product__option-item product__option-buy">
												<i class="fas fa-cart-plus"></i>
											</div>
										</a>
									</div>


								</a>
							</div>
						</li>

						<?php
								}
							?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function addcart(id) {
		soluong = 1;
		$.post("index.php?controller=home&action=giohang", {
			'id': id,
			'soluong': soluong
		}, function (data) {
			alert("Đã thêm vào giỏ hàng");
			// window.location.href = "index.php?controller=home&action=giohang";
		});
	}
</script>