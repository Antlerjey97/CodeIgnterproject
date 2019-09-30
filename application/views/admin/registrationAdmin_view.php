<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký quản trị viên</title>
	<link rel="stylesheet" href="/shop/vendor/css/bootstrap.min.css">
	<link rel="stylesheet" href="/shop/vendor/admin.css">
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="container">
		<div class="dKyAdmin">
		<div class="title">Đăng ký quản trị viên</div>
			<form action="/shop/admin/Admin/confirmRegistration" method="POST" role="form">
				<div class="form-group">
					<label for="">Tên đăng nhập</label>
					<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required>
				</div>
				<div class="form-group">
					<label for="">Mật khẩu</label>
					<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
				</div>
				<div class="form-group">
					<label for="">Họ tên</label>
					<input type="text" class="form-control" name="fullname" placeholder="Họ tên" required>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label>Loại tài khoản</label>
					<select name="rank" class="form-control">
						<option value="0">Super Administrator</option>
						<option value="1">Administrator</option>
					</select>
				</div>
				<div class="form-group">
					<label>Trạng thái</label>
					<select name="status" class="form-control">
						<option value="1">Hoạt động</option>
						<option value="0">Tạm khóa</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-block" id="dky">Đăng ký</button>
			</form>
		</div>
	</div>
</body>
</html>