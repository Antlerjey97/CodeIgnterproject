<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php include "header.php" ?>
	<div class="addCategory form_add">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active">Thêm mới danh mục</li>
					    </ol>
					</div>
				</div>
			</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="title">Thêm mới danh mục</div>
					</div>
				</div>
				<div class="row addCategoryform">
					<form action="/shop/admin/Category/add" method="POST" role="form">
						<div class="form-group">
							<input type="text" class="form-control"  name="name_category" placeholder="Tên danh mục">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Thêm danh mục</button>
					</form>
				</div>
		</div>
	</div>
	</body>
	</html>