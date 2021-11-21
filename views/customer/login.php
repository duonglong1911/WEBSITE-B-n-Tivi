<?php
	if(isset($_SESSION["user"])){
		echo "Bạn đã đăng nhập";
	}else{
		?>
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
			<div class="login_show">
				<div class="login_show_content">
					<div style="text-align:center;"><h3>Đăng nhập</h3></div>
					<form action="" method="GET">
						<label for="username">Tên đăng nhập</label>
						<input type="text" id="username" name="username" placeholder="Tên đăng nhập">

						<label for="password">Mật khẩu</label>
						<input type="text" id="password" name="password" placeholder="Mật khẩu">
						<a href="index.php?controller=customers&action=register" class="btn__register">Đăng ký tài khoản</a>
						<input type="submit" value="Đăng nhập" name="submit" id="btn_login"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
	}

?> 


