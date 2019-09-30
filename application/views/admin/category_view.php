<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý danh mục sản phẩm</title>
</head>
<body>
	<?php include "header.php" ?>
	<div class="contentCategory">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active">Danh mục sản phẩm</li>
					    </ol>
					</div>
				</div>
			</div>
			<div class="row title">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 nameTitle">Quản lý danh mục</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 addCategory">
						<a href="/shop/admin/Category/addCategory"><i class="fas fa-plus-square icon"></i>Thêm mới</i></a>
					</div>
			</div>
			<div class="row">
				<div class="content">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên danh mục</th>
								<th>Số sản phẩm</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;$j=0; ?>
							<?php foreach ($data as $key => $value): ?>
								<tr> 
									<td><?php echo $i?></td>
									<td><?php echo $value['name_category'] ?></td>
									<td><?php echo $sl[$j] ?></td>
									<td><a href="/shop/admin/Category/sua/<?php echo $value['id_category']; ?>"><i class="glyphicon glyphicon-pencil btn-primary sua"></i></a><a href="/shop/admin/Category/delete/<?php echo $value['id_category']; ?>"><i class="glyphicon glyphicon-remove btn-danger xoa"></i></a></td>
								</tr>
								<?php $i++;$j++; ?>
							<?php endforeach ?>
						</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
	<script>
	</script>
</body>
</html>