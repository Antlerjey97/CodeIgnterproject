<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa danh mục sản phẩm</title>
</head>
<body>
	<?php include "header.php" ;?>
	<div class="editCategory">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active"> Sửa danh mục sản phẩm</li>
					    </ol>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="title">Sửa danh mục</div>
			</div>
			<div class="row">
				<form action="/shop/admin/Category/editCategory/<?php echo $data['id_category'] ?>" method="POST" role="form">
					<div class="form-group">
						<input type="hidden" class="form-control" name="id_category" value="<?php echo $data['id_category'] ?>">
						<input type="text" class="form-control" name="name_category" value="<?php echo $data['name_category'] ?>">
					</div>			
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
	<script>
	</script>
</body>
</html>