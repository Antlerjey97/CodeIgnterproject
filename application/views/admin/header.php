<link rel="stylesheet" href="/shop/vendor/css/bootstrap.min.css">
<script type="text/javascript" src='/shop/vendor/js/jquery.min.js'></script>
<script type="text/javascript" src='/shop/vendor/js/bootstrap.min.js'></script>
<link rel="stylesheet" href="/shop/vendor/font/css/fontawesome-all.css">
<link rel="stylesheet" href="/shop/vendor/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
if ($this->session->has_userdata('username') && $this->session->has_userdata('password')) {
} else {
	header('location:/shop/admin/Admin/login');
}
?>
<!-- start menu -->
<div class="menu_admin">
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/shop/admin"><img width="80px" src="/shop/image/logo/logo.png" alt=""></a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào: 
					<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/shop/admin/Admin/registration">Thêm tài khoản</a></li>
						<li><a href="/shop/admin/Admin/logout">Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
</div>
<!-- start slidebar -->
<div class="sidebar">
	<ul>
		<li id="home"><i class="fas fa-home icon"></i><a href="/shop/admin/Thongke">Trang chủ</a></li>
		<li><i class="far fa-calendar-alt icon"></i><a href="/shop/admin/Category">Danh mục</a></li>
		<li><i class="fas fa-shopping-bag icon"></i><a href="/shop/admin/Product">Sản phẩm</a></li>
		<li><i class="fab fa-wpforms icon"></i><a href="/shop/admin/Product/Bill">Đơn hàng</a></li>
		<li><i class="fas fa-users icon"></i><a href="#">Thành viên</a></li>
		<li><i class="fas fa-user-alt icon"></i><a href="#">Admin</a></li>
		<li><i class="fab fa-asymmetrik icon"></i><a href="#">Phản hồi</a></li>
		<li><i class="fab fa-optin-monster icon"></i><a href="#">Quảng cáo</a></li>
		<li><i class="fas fa-info-circle icon"></i><a href="#">Thông tin shop</a></li>
	</ul>
</div>