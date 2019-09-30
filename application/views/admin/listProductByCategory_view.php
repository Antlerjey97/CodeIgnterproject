<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách sản phẩm</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php $url=($_SERVER['REQUEST_URI']);
	$string = explode('/', $url);
	$trangHtai=end($string);
	// id danh mục hiện tại
	$id_category=$DM;
	$pre=$trangHtai-1;
	$next=$trangHtai+1;
	?>
<div class="showProduct">
	<div class="container">
		<div class="row">
			<div class="location">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ol class="breadcrumb">
						<li><a href="/shop/admin/Thongke">Home</a></li>
						<li class="active where"><?php echo $sanpham[0]['name_category'] ?></li>
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
							<?php if ($value['id_category']==$id_category) {
							?>	
							<option selected value="<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></option>
							<?php }else{ ?>
							<option value="<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></option>
						<?php } ?>
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
			<div class="phantrang">
				<ul class="pagination">
					<?php 	if ($sotrang==1) {
					}else if ($pre<=0) { 
						?>
						<li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
					<?php }else{ ?>		 
						<li class="page-item"><a class="page-link" href="/shop/admin/ProductByCategory/getDataByPage/<?php echo $id_category ?>/<?php echo $pre; ?>">&laquo;</a></li>
					<?php 	}  ?>
					<?php for ($i=1; $i <=$sotrang ; $i++) { ?>	
					<?php if ($trangHtai==$i) {?>
						<li class="page-item active"><a class="page-link disabled" href="#"><?php echo $i; ?></a></li>
					<?php	}else{ ?>
						<li class="page-item"><a class="page-link" href="/shop/admin/ProductByCategory/getDataByPage/<?php echo $id_category ?>/<?php echo $i ?>"><?php echo $i; ?></a></li>
						<?php  } } ?>
						<?php 	if ($trangHtai==$sotrang) {
						}else if ($next>$sotrang) { 	?>
							<li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
						<?php }else{ ?>		 
							<li class="page-item"><a class="page-link" href="/shop/admin/ProductByCategory/getDataByPage/<?php echo $id_category ?>/<?php echo $next; ?>">&raquo;</a></li>
						<?php }  ?>
					</ul>
			</div> <!-- end pagination -->
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
	$.ajax({
		url: '/shop/admin/ProductByCategory/showProductByAjax',
		type: 'POST',
		data: {dl: id}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function(data) {
		$('.where').html(nameDM);
		$('.show').html(data);

	}); 
});
},false);  
</script>
</body>
</html>