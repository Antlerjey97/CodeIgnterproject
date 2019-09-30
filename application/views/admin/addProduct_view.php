<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm sản phẩm</title>
</head>
<body>
	<?php include "header.php" ?>
	<div class="addProduct">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active">Thêm mới sản phẩm</li>
					    </ol>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="title">Thêm mới sản phẩm</div>
			</div>
			<div class="row">
				<div class="addMore">
					<form action="/shop/admin/Product/addNewProduct" method="POST" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" class="form-control" name="name_product" placeholder="Tên sản phẩm">
					</div>
					<div class="form-group">
						<label>Danh mục</label>
						<select name="id_category" class="form-control">
							<?php foreach ($danhmuc as $key => $value): ?>
								<option value="<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></option>
							<?php endforeach ?>
							
						</select>
					</div>
					<div class="form-group">
						<label>Hãng sản xuất</label>
						<input type="text" class="form-control" name="label" placeholder="Apple, Samsung, LG,...">
					</div>
					<div class="form-group">
						<label>Ảnh đại diện</label>
						<input type="file" class="form-control" name="image" placeholder="Tên sản phẩm">
					</div>
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" name="price" placeholder="Giá gốc">
					</div>
					<div class="form-group">
						<label >Giá khuyến mại</label>
						<input type="number" class="form-control" name="price_sales" placeholder="Giá khuyến mại">
					</div>
					<div class="form-group">
						<label>Thông tin chi tiết sản phẩm</label>
						<textarea name="description" id="description"></textarea>
					</div>
					<div class="form-group">
						<label>Số lượng</label>
						<input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm">
					</div>
					<div class="form-group">
						<label >Trạng thái</label>
						<select name="status" class="form-control" >
							<option value="1">Hiển thị</option>
							<option value="0">Không hiển thị</option>
							<option value="2">New</option>
						</select>
					</div>
					<div class="form-group">
						<label>Ghi chú khuyến mại</label>
						<input type="text" class="form-control" name="note_km" placeholder="Tặng...">
					</div>
					<button type="submit" class="btn btn-primary">Thêm mới</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/shop/ckeditor/ckeditor.js"></script> 
	<script type="text/javascript" src="/shop/vendor/js/jquery.min.js"></script> 
	<script type="text/javascript" >
		document.addEventListener("DOMContentLoaded",function(){
			// set width ckeditor
			CKEDITOR.replace( 'description');
			x=parseInt($(window).width());
			if (x>767) {
			CKEDITOR.config.width="75%";
			}else{
			CKEDITOR.config.width="100%";
			}
			// set height sidebar
			if (x>550) {
			$(".sidebar").css("height",1210);	
			}
			if(x>992){
			$(".sidebar").css("height",1150);		
			}
			
		},false);
	</script>
</body>
</html>