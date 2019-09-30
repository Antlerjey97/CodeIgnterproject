<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa thông tin sản phẩm</title>
</head>
<body>
	<?php include "header.php" ?>
	<div class="editProduct">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active"> Sửa sản phẩm</li>
					    </ol>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="title">Sửa thông tin sản phẩm</div>
			</div>
			<div class="row">
				<div class="contentEdit">
					<form action="/shop/admin/Product/editById/<?php echo $sanpham['id_product'] ?>" method="POST" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" class="form-control" name="name_product" value="<?php echo $sanpham['name_product'] ?>">
					</div>
					<div class="form-group">
						<label>Danh mục</label>

						<select name="id_category" class="form-control">
							<?php foreach ($danhmuc as $key => $value): ?>
								<?php if ($sanpham['id_category']==$value['id_category']) {
									?>
									<option selected value="<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></option>
								<?php	}else{ ?>
									<option value="<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></option>
								<?php } ?>
							<?php endforeach ?>
							
						</select>
					</div>
					<div class="form-group">
						<label>Hãng sản xuất</label>
						<input type="text" class="form-control" name="label" value="<?php echo $sanpham['label'] ?>">
					</div>
					<div class="form-group">
						<label>Ảnh đại diện</label><br>
						<img style="width: 100px" src="/shop/image/product/<?php echo $sanpham['image'] ?>" alt="">
						<input type="hidden" class="form-control" name="image_old" value="<?php echo $sanpham['image'] ?>" >
						<input type="file" class="form-control" name="image" >
					</div>
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" name="price" value="<?php echo $sanpham['price'] ?>">
					</div>
					<div class="form-group">
						<label >Giá khuyến mại</label>
						<input type="number" class="form-control" name="price_sales" value="<?php echo $sanpham['price_sales'] ?>">
					</div>
					<div class="form-group">
						<label>Thông tin chi tiết sản phẩm</label>
						<textarea id="description" name="description" style="height: 500px"> 
							<?php echo $sanpham['description'] ?>
						</textarea>
					</div>
					<div class="form-group">
						<label>Số lượng</label>
						<input type="number" class="form-control" name="quantity" value="<?php echo $sanpham['quantity'] ?>">
					</div>
					<div class="form-group">
						<label >Trạng thái</label>
						<select name="status" class="form-control" >
							
							<?php if ($sanpham['status']==1) {
								?>
								<option selected value="1">Hiển thị</option>
								<option value="0">Không hiển thị</option>
								<option value="2">New</option>
							<?php	}else if($sanpham['status']==0){ ?>	
								<option value="1">Hiển thị</option>
								<option selected  value="0">Không hiển thị</option>
								<option value="2">New</option>
							<?php }else{ ?>
								<option value="1">Hiển thị</option>
								<option value="0">Không hiển thị</option>
								<option selected  value="2">New</option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Ghi chú khuyến mại</label>
						<input type="text" class="form-control" name="note_km" value="<?php echo $sanpham['note_km'] ?>">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Lưu</button>
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
			CKEDITOR.config.width="72%";
			}else{
			CKEDITOR.config.width="100%";
			}
			// set height sidebar
			if (x>550) {
			$(".sidebar").css("height",1280);	
			}
			if(x>992){
			$(".sidebar").css("height",1260);		
			}
			
		},false);
	</script>
</body>
</html>