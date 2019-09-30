<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập admin</title>
	<link rel="stylesheet" href="/shop/vendor/css/bootstrap.min.css">
	<link rel="stylesheet" href="/shop/vendor/admin.css">
</head>
<body>
	<?php if ($this->session->has_userdata('username')&&$this->session->has_userdata('password')) {
		header('location:/shop/admin/Thongke');
	} ?>
	<div class="login">
		<div class="container">
			<div class="title">
				<div class="logo"><img src="/shop/image/logo/logo.png" alt=""></div>
			</div>
			<div class="content">
				<form action="/shop/admin/Admin/confirm_account" method="POST" role="form">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sign In</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>