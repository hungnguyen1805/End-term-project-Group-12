<a href="?option=home">Trang chủ</a> <a href="?option=news">Giới thiệu</a> <a href="?option=feedback">Đánh giá</a> <a href="?option=cart">Giỏ hàng</a> 
<?php if(empty($_SESSION['user'])): ?>
	<a href="?option=login">Đăng nhập</a> <a href="?option=signup">Đăng ký</a>
<?php else:?>
	<section><span style="color: white;font-size: 20px;">Hello: <?=$_SESSION['user']?> [<a href="?option=logout" style="color: white;text-decoration: none;font-size: 20px;">Đăng xuất</a>]</span>
	</section>
<?php endif;?>