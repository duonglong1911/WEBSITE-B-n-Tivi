<div class="container">
		<div class="row">
			<div class="title__link mt-3">
				<span><a class="action__link" href="index.php">Trang chủ</a></span>
				<span>> Quản lý tài khoản</span>
			</div>
		</div>
	</div>
<div>
<div class="container">
	<div class="row">
		<div class="col-3">
			<?php
				include_once("views/home/filter.php");
			?>
		</div>
		<div class="col-9">
			<div style="text-align:center;"><p class="product_show_title">Quản lí tài khoản</p></div>
			<br>
			<?php
				session_start();
				if(isset($_SESSION["user"])){
					?>
					<div class="account_show" style="max-width: 1250px;margin: auto;">
						<table class="table">
							<tr>
								<th>Tên đăng nhập</th>
								<th>Họ tên</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
							</tr>
							<tr>
								<td><p><?=$_SESSION["user"]["tendangnhap"]?></p></td>
								<td><p><?=$_SESSION["user"]["name"]?></p></td>
								<td><p><?=$_SESSION["user"]["sodienthoai"]?></p></td>
								<td><p><?=$_SESSION["user"]["diachi"]?></p></td>
							</tr>
						</table>
						<hr>
					</div>
					<?php
				}else{
					?>
						<div class="login_show">
							<div class="login_show_content login__show-manage">
								<div class="text-align:center"><h3 style="text-align:center">Đăng nhập </h3></div>
								<form action="" method="POST">
									<label for="username">Tên đăng nhập</label>
									<input type="text" id="username" name="username" placeholder="Tên đăng nhập">

									<label for="password">Mật khẩu</label>
									<input type="text" id="password" name="password" placeholder="Mật khẩu">
									<button type="submit" name="submit" id="btn_login">Đăng nhập</button>
									<a href="index.php?controller=customers&action=register" class="btn__register">Đăng ký tài khoản</a>
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
						$login = customer::dangnhap($name,$pass);
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
								header("location:index.php?controller=customers&action=manage");
							}else{
								header("location:index.php?controller=customers&action=manage");
							}
							
						}else{
							echo '<p style="color:red; text-align:center">Tài khoản hoặc mật khẩu không đúng</p>';
						}
					}
		?>

		</div>
	</div>
</div>