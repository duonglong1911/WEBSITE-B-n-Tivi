<div class="container">
	<span style="font-weight: 500; color: rgb(160, 160, 175);">
		<a style="font-weight: 300; color: black;"
		href="index.php">Trang chủ</a> > Chi tiết sản phẩm
		 <!-- > <?=$value["tensp"]?> -->
	</span>
	<div class="row">
		<div class="col-3">
			<?php
				include_once("filter.php");
			?>
		</div>
		<div class="col-9">
			<?php
				if (isset($_GET["id"])) {
					$product = Product::getDetailById($_GET["id"]);
					foreach ($product as $key => $value) {
						
					}
				}
			?>
				<div>
					<wrap>
						<div class="title__main mt-5">
							<h1 class="home__title">CHI TIẾT SẢN PHẨM</h1>
							<p class="tilte__main-small"></p>
						</div>
						<div class="container mt-5">
							<div class="row">
								<div class="col-4">
									<div class="detail-image">
										<img src="../DuongVanLong-BTL/assets/img/user/<?=$value["anhsp"]?>" alt="photo">
									</div>
								</div>
								<div class="col-8">
									<div class="detail__product">
										<h5 class="detail__product-name"><?=$value["tensp"]?></h5>
										<div class="detail__product-price">
											<h5>Giá: <span>
												<?php 
													$giasp = $value['giasp'] - ($value['giasp']* $value['giamgia']/100);
													if( $giasp == $value['giasp'] ) {
														echo number_format($value['giasp'], 0, ',', '.').' đ';
													} else {
												?>
													</span>
											</h5>
													<span>
														<?php
															echo number_format($giasp, 0, ',', '.').' đ';
															?> </span>
															<span style="color:#999; font-size:15px;text-decoration: line-through;">
															<?php
															echo number_format($value['giasp'], 0, ',', '.').' đ';
															?>
														<span>
															<?php
													}
												?>
											 
										</div>
										<div class="detail__product-info mt-3">
											<h5>Thông tin chi tiết</h5>
											<p>Thương hiệu:  <span><?= $value['hangsx']?></span></p>
											<p>Xuất sứ:  <span><?=$value["xuatsu"]?></span></p>
											<p>Kích thước:  <span><?=$value["kichthuoc"]?> Inch</span></p>
											<p>Độ phân giải:  <span><?=$value["dopg"]?></span></p>
											<p>Trạng thái: <span>Còn hàng</span></p>
											<p>Số lượng hàng:  <span><?=$value["soluong"]?></span></p>
										</div>
										<div class="detail__product-button mt-5">
											<div class="detail__product-btn detail__product-addbtn">
												<button id="btn_addcart" type="button" onclick="addcart('<?=$value['masp']?>')">Thêm vào giỏ hàng</button>
											</div>
											<div class="detail__product-btn detail__product-buybtn">
												<button class="detail__product-buynow" type="button" onclick="buynow('<?=$value['masp']?>')"><i class="fas fa-money-bill-wave"></i> Mua ngay</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="details-1">
									<h2>Mô tả sản phẩm</h2>
									<span>
										<?=$value["mota"]?>
									</span>
								</div>
							</div>
						</div>
					</wrap>


						<div class="product_show">
							<div style="text-align:center"><p class="product_show_title">Sản phẩm liên quan</p></div>
							<div class="home__products">
								<ul class="list-products">
									<?php
										$related = product::getRelated($value["madm"]);
										foreach ($related as $key => $value2) {
								
									?>
										
											<li class="product-item col-3 mb-2">
												<div class="product__content">
													<a href="index.php?controller=products&action=detail&id=<?=$value2['masp']?>">
														<div class="product__image">
															<img src="../DuongVanLong-BTL/assets/img/user/<?=$value2['anhsp']?>" alt="photo" class="product-img">
														</div>
														<div class="product-info">
															<p class="mb-1 mt-1 box__product-name"><?=$value2['tensp']?></p>
															<p class="mb-1"><span class="product-price"><?php  echo number_format($value2['giasp'], 0, ',', '.').' đ';?></span></p>
															<p class="mb-1 product-origin"> Xuất xử:<?=$value2['xuatsu']?></p>
															<p class="mb-1 product-trademark"> Hãng: <?=$value2['hangsx']?></p> 
														</div>
														<?php
															if($value2['madm'] =="new") {
														?>
														<div class="product__label-new">
															<span>New</span>
														</div>
														<?php } ?>

														<?php
															if($value2['madm'] =="hot") {
														?>
														<div class="product__label-hot">
															<span>Hot</span>
														</div>
														<?php } ?>
														
														<?php
															if($value2['madm'] =="sale") {
														?>
														<div class="product__label-sale">
															<span>Sale</span>
														</div>
														<?php } ?>
													<div class="product__blur">
													</div>
													<div class="product__option">
														<a href="index.php?controller=products&action=detail&id=<?=$value2['masp']?>">
															<div class="product__option-item product__option-detail">
																<i class="far fa-eye"></i>
															</div>
														</a>
														<button class="button__addcart" type="button"
															onclick="addcart('<?=$value['masp']?>')">
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
							</div>
						</div>
				</div>
		</div>
	</div>
</div>

<script type="text/javascript">
		function addcart(id) {
				soluong =1;
				$.post("index.php?controller=home&action=cart",{'id':id,'soluong':soluong}, function(data){
					alert("Đã thêm vào giỏ hàng");
					 
				});	
		}
		function buynow(id) {
				soluong =1;
				$.post("index.php?controller=home&action=cart",{'id':id,'soluong':soluong}, function(data){
					window.location.href = "index.php?controller=home&action=cart";
				});	
		}
</script>