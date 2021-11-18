<div>
	<div class="container">
		<div class="row">
			<div class="title__link mt-3">
				<span><a class="action__link" href="index.php">Trang chủ</a></span>
				<span>> Giỏ hàng</span>
			</div>
		</div>
	</div>
		<center><p class="product_show_title">Giỏ hàng của bạn</p></center>
		<br>
		<div class="cart_show">
			<table class="table">
				<tr>
					<th>Tên sản phẩm</th>
					<th class="cart_img">Ảnh</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
					<th>Tùy chọn</th>
				</tr>
				<?php
						if(isset($_SESSION['cart'])){
							// session_destroy();
							$total=0;
							// echo count($_SESSION["cart"]);
							foreach ($_SESSION['cart'] as $key => $value2) {	
					?>
				<tr>
					<td><p><?=$value2['name']?></p></td>
					<td class="cart_img"><img src="../DuongVanLong-BTL/assets/img/user/<?=$value2['img']?>"></td>
					<td><span><?php echo number_format($value2['price'], 0, ',', '.').' đ';?></span></td>
					<td><input onchange="updatecart('<?=$value2['id']?>')" type="number" id="qua_<?=$value2["id"]?>" value="<?=$value2['soluong']?>" name="soluong" min="1" max="5"></td>
					<td>
						<span>
							<?php
										$total = $value2["price"]*$value2['soluong'];
										echo number_format($value2["price"]*$value2['soluong'], 0, ',', '.').' đ';
									?>
						</span>
					</td>
					<td>
						<a href="index.php?controller=home&action=deletecartitem&id=<?=$value2["id"]?>" id="delete-btn" class="btn btn-md">
										Xóa
						</a>
					</td>
				</tr>
				<?php  } } else{
					echo "Bạn chưa có sản phẩm nào trong giỏ";
					} ?>
			</table>
			<hr>
			<div style="text-align: right;margin-top: 20px;">
				<p>Tổng tiền hóa đơn: 
				<b>
					<?php
									if(isset($_SESSION["cart"])){
										$subtotal=0;
										foreach ($_SESSION["cart"] as $key => $value) {
											$sub = $value["price"]*$value["soluong"];
											$subtotal+=$sub;
										}
										echo number_format($subtotal, 0, ',', '.').' đ';
									}
								?>

				</b></p>
			</div>
		</div>
		<div class="cart_show2">
		<center><h4>Thông tin thanh toán</h4></center>
		<?php
			if(isset($_SESSION["user"])){
		?>
			
			<div class="cart_show2_left">
				<p>Thông tin khách hàng</p>
				<p>Họ tên <b><?=$_SESSION["user"]["name"]?></b></p>
				<p>Số điện thoại: <b><?=$_SESSION["user"]["sodienthoai"]?></b></p>
				<p>Địa chỉ: <b><?=$_SESSION["user"]["diachi"]?></b></p>
			</div>
			<div class="cart_show2_right">
				
				<div class="checkout">
						<a href="index.php?controller=home&action=thanhtoan"><button class="cart__btn-buy"  id="btn_checkout" type="button">Thanh toán</button></a>
				</div>
				<!-- <script type="text/javascript">
					function check(){
						alert("Xác nhận đặt hàng ?");
					}
				</script> -->
			</div>
			<?php
				 }else{
				 	?>
				 		<p>Bạn chưa đăng nhập</p>
						 <a href="index.php?controller=khachhangs&action=quanly"><button class="btn-logout" style="background-color:#0098DB; color:#fff;"><span>Đăng Nhập </span> <i class="fas fa-sign-in-alt"></i></button></a>
				 	<?php
				 }
			?>
			
		</div>
	</div>
	<script type="text/javascript">
		function updatecart(id){
				soluong = $("#qua_"+id).val();
				if(soluong >5){
				alert("Tối đa 5 sản phẩm");
				}else{
				$.post("index.php?controller=home&action=updatecart",{'id':id,'soluong':soluong}, function(data){
					window.location.href = "index.php?controller=home&action=giohang";	
					});
				}
				
			};
	</script>
