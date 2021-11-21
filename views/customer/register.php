<div class="container">
	<div class="row">
		<div class="col-3">
			<?php
				include_once("views/home/filter.php");
			?>
		</div>
		<div class="col-9">
			<br>
		<br>
		<br>
			<div class="register_show">
				<div class="register_show_content">
					<div style="text-align:center;"><h3>Đăng ký tài khoản </h3></div> 
					<form action="" method="post">
						<label for="name">Họ và tên</label><span class="error" id="fullname-error"></span>
						<input type="text" id="fullname" name="name" placeholder="Họ và tên">
						<br>
						<label for="username">Tên đăng nhập</label><span class="error" id="username-error"></span>
						<input type="text" id="username" name="username" placeholder="Tên đăng nhập">
						<br>
						<label for="password">Mật khẩu</label><span class="error" id="password-error"></span>
						<input type="password" id="password" name="password" placeholder="Mật khẩu">
						<br>
						<label for="password">Nhập lại mật khẩu</label><span class="error" id="repassword-error"></span>
						<input type="password" id="repassword" name="password" placeholder="Nhập lại mật khẩu">
						<br>
						<label for="number">Điện thoại</label><span class="error" id="number-error"></span>
						<input type="text" id="number" name="number" placeholder="Điện thoại">
						<br>
						<label for="address">Địa chỉ</label><span class="error" id="address-error"></span>
						<textarea type="text" rows="2" id="address" name="address" placeholder="Địa chỉ"></textarea>
						<br>
							<label for="email">Email</label><span class="error" id="email-error"></span>
						<input type="text" id="email" name="email" placeholder="email">
						<a href="index.php?controller=customers&action=login" class="btn__register mb-3">Đăng nhập</a>
						<input type="button" name="submit" onclick="save()" id="btn_login" value="Đăng ký" style="width:100%">
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
		if(isset($_POST['submit'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$name = $_POST["name"];
			$dienthoai = $_POST["number"];
			$add = $_POST["address"];
			$email = $_POST["email"];


			if(customer::dangnhap($username, $password) == null) {
				if(customer::dangky($username,$name,$password,$dienthoai,$add,$email)){
				?>
				<div style="margin-top:50px; text-align:center">
					<h4>Đăng ký thành công đăng nhập để tiếp tục</h4>
					<a href="index.php?controller=customers&action=manage" id="btn_login">Đăng nhập</a>
					</div>
				<?php
			}else{
				echo "Đăng ký thất bại";
			}
			} else {
				echo '<p style="color:red; text-align:center; margin-top:50px;">Đã tồn tại tài khoản </p>';
			}

			
		}
		?>

	