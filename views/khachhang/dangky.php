<div>
<br>
<br>
<br>
		<div class="register_show">
			<div class="register_show_content">
				<div style="text-align:center;"><h3>Đăng ký tài khoản </h3></div> 
				<!-- <form action="" method="post"> -->
				 	<label for="name">Họ và tên</label><span class="error" id="fullname-error"></span>
				    <input type="text" id="name" name="name" placeholder="Họ và tên">
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
				    <label for="number">Điện thoại</label><span class="error" id="phone-error"></span>
				    <input type="text" id="number" name="number" placeholder="Điện thoại">
				    <br>
				    <label for="address">Địa chỉ</label><span class="error" id="address-error"></span>
				    <textarea type="text" rows="2" id="address" name="address" placeholder="Địa chỉ"></textarea>
				    <br>
				     <label for="email">Email</label><span class="error" id="email-error"></span>
				    <input type="text" id="email" name="email" placeholder="email">
				    <br>
				    <button onclick="save()" name="submit" id="btn_login">Đăng ký tài khoản</button>
				<!-- </form> -->
			</div>
		</div>
	</div>
	<!-- <?php
		if(isset($_POST['submit'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$name = $_POST["name"];
			$dienthoai = $_POST["number"];
			$add = $_POST["address"];
			$email = $_POST["email"];
			if(khachhang::dangky($username,$name,$password,$dienthoai,$add,$email)){

				// header("index.php?controller=khachhangs&action=dangnhap");
				?>
				<div style="max-width: 600px;margin: auto;">
					<h4>Đăng ký thành công đăng nhập để tiếp tục</h4><a href="index.php?controller=khachhangs&action=quanly" style="font-weight: bold;color:red;">Đăng nhập</a>
					<br>
					<a href="index.php?controller=khachhangs&action=dangnhap"><button id="btn_register">Đăng nhập</button></a>
					</div>
				<?php
			}else{
				echo "Đăng ký thất bại";
			}
		}
		?> -->