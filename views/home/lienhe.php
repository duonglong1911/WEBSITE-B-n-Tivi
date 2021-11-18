<div class="container">
		<div class="row">
			<div class="title__link mt-3">
				<span><a class="action__link" href="index.php">Trang chủ</a></span>
				<span>> Liên hệ</span>
			</div>
		</div>
	</div>
<center><p class="product_show_title">Liên hệ </p></center>
<div class="lienhe">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?php
					session_start();
						if(isset($_SESSION["user"])){
					?>
							<br>
							<br>
							<div class="contact_form">
								
								<form action="index.php?controller=home&action=lienhe" method="POST">
									<label for="name">Họ tên</label>
									<input type="text" id="name" name="name" placeholder="Họ tên" value="<?=$_SESSION["user"]["name"]?>" readonly="true">

									<input type="text" style="display: none" id="id" name="id" placeholder="Họ tên" value="<?=$_SESSION["user"]["id"]?>" readonly="true">

									<label for="number">Số điện thoại</label>
									<input type="text" id="number" name="number" placeholder="Số điện thoại" value="<?=$_SESSION["user"]["sodienthoai"]?>" readonly="true">

									<label for="number">Email</label>
									<input type="text" id="email" name="email" placeholder="Email" value="<?=$_SESSION["user"]["email"]?>" readonly="true">

									<label for="content">Nội dung</label>
									<textarea id="content" name="content" rows="10" placeholder="Nội dung"></textarea>
								
									<button type="submit" name="ok" id="btn" class="contact__btn-send">Gửi</button>
								</form>
								<?php
									if(isset($_POST["ok"])){
										$id = $_POST["id"];
										$content = $_POST["content"];
										$abc = lienhe::lienhesubmit($id,$content);
										if($abc == true){
											?>
												<br>
												<h4 class="contact__notice-success">Gửi thành công, cảm ơn bạn liên hệ với chúng tôi!</h4>
											<?php
										}else{
											?>
												<h4 class="contact__notice-error">Đã xảy ra lỗi</h4>
											<?php
										}
									}

								?>
							</div>

							<?php   }else{
								?>
															<br>
									<br>
						<div class="login_show col-6">
							<div class="login_show_content login_show_content-contact">
								<center><h3>Đăng nhập </h3></center>
								<form action="" method="POST">
									<label for="username">Tên đăng nhập</label>
									<input type="text" id="username" name="username" placeholder="Tên đăng nhập">

									<label for="password">Mật khẩu</label>
									<input type="text" id="password" name="password" placeholder="Mật khẩu">
									<button type="submit" name="submit" id="btn_login">Đăng nhập</button>
								</form>
							</div>
						</div>
								<?php
							}
							?>
						</div>
						<?php
							if(isset($_POST["submit"])){
										$name = $_POST["username"];
										$pass = $_POST["password"];
										$login = khachhang::dangnhap($name,$pass);
										foreach ($login as $key => $value) {
											// print_r($login);
										}
										if($login==true){
											// session_start();
												$user = array();
												$user = array(
														'id' => $value["makh"],
														'tendangnhap' =>$value["tendangnhap"],
														'name' => $value["tenkh"],
														'sodienthoai' => $value["dienthoai"],
														'diachi' => $value["diachi"],
														'email' => $value["email"]
												);
											$_SESSION["user"] = $user;
											// print_r($_SESSION["user"]);
											if(isset($_SESSION["user"])){
												header("location:index.php?controller=home&action=lienhe");
											}
											
										}else{
											echo "Không đúng thông tin đăng nhập";
										}
									}
						?>
				<div class="col-6">
					<div class="contact__right">
						<p class="contact__name">Cửa hàng bán Tivi Thiên Phú</p>
						<p class="contact__info"><i class="fas fa-phone"></i> Mua hàng Online:<span class="contact__info-number"> 0366.369.782</span></p>
						<p class="contact__info"><i class="fas fa-map-marker-alt"></i> Địa chỉ: QL5 - Kim Thành - Hải Dương</p>
						<iframe class="contact__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7451.480580495277!2d106.51092762671773!3d20.96294226287099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313580be3dcc5b61%3A0x2ac2d24f4d018ab0!2zdHQuIFBow7ogVGjDoWksIEtpbSBUaMOgbmgsIEjhuqNpIETGsMahbmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1637194934261!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>