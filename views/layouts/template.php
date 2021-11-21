<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Cửa hàng bán Tivi</title>
	<link rel="stylesheet" type="text/css" href="assets/library/bootstrap/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,800;1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/library/fontawesome/css/all.css">
    <script type="text/javascript" src="assets/library/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/library/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="/DuongVanLong-BTL/assets/css/template.css">
  	<link rel="stylesheet" href="../DuongVanLong-BTL/assets/css/content.css">
</head>
<body>
	<div class="header">
        <div class="container">
            <div class="logo__header">
                <div class="header__logo">
                   <a href="index.php?controller=home&action=index"><img src="assets/img/user/logo-thienphu.png" width="80%" alt="logo"/></a>
                    <div class="header-search">
                        <form action="index.php?controller=products&action=find" method="POST">
                            <input type="search" id="name" name="name" class="search__input" placeholder="Bạn cần tìm gì... ">
                            <button class="search__button" type="submit" name="ok" id="btn_find"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header__right">
                    <a href="index.php?controller=home&action=cart" ><button class="btn-giohang"><i class="fas fa-cart-arrow-down"></i></button></a>
                    <?php
                    	//session_start();
			            if(isset($_SESSION["user"])){   
                    ?>
                    <a href="index.php?controller=home&action=logout"><button class="btn-logout"><span>Đăng Xuất </span> <i class="fas fa-sign-out-alt"></i></button></a>
                    <?php } else {
                    ?>
                    <a href="index.php?controller=customers&action=manage"><button class="btn-logout"><span>Đăng Nhập </span> <i class="fas fa-sign-in-alt"></i></button></a>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <div class="menu__header">
            <div class="container">
                <div class="header__content">
                    <ul class="menu__header-menu">
                        <li class="menu__item">
                            <a href="index.php" class="menu__item-link">Trang chủ</a>
                        </li>
                        <li class="menu__item">
                            <a href="#" class="menu__item-link">Danh mục <i class="fas fa-chevron-down"></i></a>
                            <ul class="menu__item-child">
                                <li class="menu__subnav">
                                    <div class="menu__subnav-content">
                                        <p>Loại</p><i class="fas fa-chevron-right"></i>
                                    </div>
                                    <ul class="menu__subnav-item">
                                        <?php
											$danhmuc=Category::getAll();
												foreach ($danhmuc as $key => $value) {
										?>
											<li><a href="index.php?controller=products&action=list&id=<?=$value["madm"]?>"><?=$value["tendm"]?></a></li>
											<?php } ?>
                                    </ul>
                                </li>
                                <li class="menu__subnav">
                                    <div class="menu__subnav-content">
                                        <p>Hãng</p><i class="fas fa-chevron-right"></i>
                                    </div>
                                    <ul class="menu__subnav-item">
                                        <?php
											$danhmuc=Category::getTrademark();
												foreach ($danhmuc as $key => $value) {
										?>
											<li><a href="index.php?controller=products&action=listtrademark&id=<?=$value["mahangsx"]?>"><?=$value["tenhangsx"]?></a></li>
											<?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu__item">
                            <a href="index.php?controller=home&action=cart" class="menu__item-link">Giỏ hàng</a>
                        </li>
                        <li class="menu__item">
                            <a href="index.php?controller=home&action=contact" class="menu__item-link">Liên hệ</a>
                        </li>
						<li class="menu__item">
                            <a href="index.php?controller=customers&action=manage" class="menu__item-link">Tài khoản</a>
                        </li>
                    </ul>
                    <div class="header__username">
                        <?php
                            if(isset($_SESSION["user"])){
                        ?>
                            <p class="header__username-login"><?=$_SESSION["user"]["name"]?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height:400px;">
                <div class="carousel-item active">
                <img src="assets/img/user/banner4.png" class="d-block w-100" alt="banner">
                </div>
                <div class="carousel-item">
                <img src="assets/img/user/banner5.png" class="d-block w-100" alt="banner">
                </div>
                <div class="carousel-item">
                <img src="assets/img/user/banner6.png" class="d-block w-100" alt="banner">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
    </div> -->

<div class="container">
    <div class="row">
            <div class="slideshow-container" style="height:440px">
		  <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="../DuongVanLong-BTL/assets/img/banner1.jpg" style="width:100%">
                    <div id="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="../DuongVanLong-BTL/assets/img/banner2.jpg" style="width:100%">
                    <div id="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="../DuongVanLong-BTL/assets/img/banner4.jpg" style="width:100%">
                    <div id="text">Caption Three</div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
		var slideIndex = 1;
		showSlides(slideIndex);

		// Next/previous controls
		function plusSlides(n) {
		  	showSlides(slideIndex += n);
		}

		// Thumbnail image controls
		function currentSlide(n) {
		  	showSlides(slideIndex = n);
		}

		function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
			      dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active";
		}

		var slideIndex = 0;
		showSlides();

		function showSlides() {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  for (i = 0; i < slides.length; i++) {
			    slides[i].style.display = "none";
			  }
			  slideIndex++;
			  if (slideIndex > slides.length) {slideIndex = 1}
			  slides[slideIndex-1].style.display = "block";
			  setTimeout(showSlides, 2000);
		}
	</script>

  

	<div id="container">
		<?= @$content ?>
	</div>

	<footer>
     <div class="container">
         <div class="row">
             <div class="footer__info">
                <h2>Thông tin sinh viên</h2>
                <p>Họ tên: Dương Văn Long</p>
                <p>Lớp: DHTI12A1HN</p>
                <P>Mã SV: 18103100027</P>
                <P>Đề tài: Thiết kế Website bán Tivi</P>
         </div>
         </div>
     </div>
     
 </footer>
 <div class="footer__copyright">
    <span>@Copyright by DuongVanLong</span>
</div>
   <script>
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 1000,
        wrap: false
        })
    </script>
 <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
 <script src="assets/js/validate/index.js"></script>
</body>
</html>