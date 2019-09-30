<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách sản phẩm</title> 
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="showProduct">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active" id="where"> Tất cả sản phẩm</li>
					    </ol>
					</div>
				</div>
			</div>
			<div class="row title">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 nameTitle">Quản lý sản phẩm</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 addCategory">
						<a href="/shop/admin/Product/addProduct"><i class="fas fa-plus-square icon"></i>Thêm mới</a>
					</div>
			</div>
			<div class="row type_display">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 tieude">Hiển thị theo</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 typeProduct">
				 <form >
					<select class="form-control" id="myselect">
						<option value="0">Tất cả</option>
						<?php foreach ($danhmuc as $key => $value): ?>
							<option value="<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></option>
						<?php endforeach ?>
					</select>
				</form>
				</div>
			</div>
	<div class="show">
		<div class="row listProduct"> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm </th>
						<th>Ảnh đại diện</th>
						<th>Tên danh mục</th>
						<th>Số lượng</th>
						<th>Trạng thái</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($sanpham as $key => $value): ?>
						<?php
						 $status=$value['status'];
						$status=$status==0 ? "Không hiển thị" :$status==1 ? "Hiển thị":"New";
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $value['name_product'] ?></td>
							<td><img width="30px" src="/shop/image/product/<?php echo $value['image'] ?>"></td>
							<td><?php echo $value['name_category'] ?></td>
							<td><?php echo $value['quantity'] ?></td>
							<td><?php echo $status; ?></td>
							<td>
								<a href="/shop/admin/Product/edit/<?php echo $value['id_product']; ?>">
									<i class="glyphicon glyphicon-pencil btn-primary sua"></i>
								</a>
								<a href="/shop/admin/Product/delete/<?php echo $value['id_product']; ?>">
									<i class="glyphicon glyphicon-remove btn-danger xoa"></i>
								</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach ?>
				</tbody>
				</table>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
	</div>
	<script>
	document.addEventListener("DOMContentLoaded",function(){
	//set width sidebar
	x=parseInt($(window).width());
	if (x>992) {
		$(".sidebar").css("height",860);
	}

	// load product by ajax
    $('#myselect').change(function() {
	var nameDM;
	var id=$('#myselect').val();
	nameDM = id==0?'Tất cả':id==1?"Điện thoại":id==7?"Máy tính bảng":id==8?"Laptop":"Phụ kiện";
	console.log(nameDM);
	$.ajax({
		url: '/shop/admin/ProductByCategory/showProductByAjax',
		type: 'POST',
		data: {dl: id}
	})
	.always(function(data) {
		$('#where').html(nameDM);
		$('.show').html(data);

	}); 
});
},false);  
</script>
</body>
</html>