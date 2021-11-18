<?php
	if(isset($_SESSION["user"])){
		echo "Bạn đã đăng nhập";
	}else{
		?>
				<div>
				<br>
				<br>
	<div class="login_show">
		<div class="login_show_content">
			<div style="text-align:center;"><h3>Đăng nhập </h3></div>
			<form action="" method="GET">
				<label for="username">Tên đăng nhập</label>
				<input type="text" id="username" name="username" placeholder="Tên đăng nhập">

				<label for="password">Mật khẩu</label>
				<input type="text" id="password" name="password" placeholder="Mật khẩu">
				<input type="submit" value="Đăng nhập" name="submit" id="btn_login"/>
			</form>
		</div>
	</div>
</div>
		<?php
	}

?> 


