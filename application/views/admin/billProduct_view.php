<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết đơn hàng</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<!-- price of order -->
	<?php 
	$priceAll=0;
     foreach ($data as $key => $value) {
     	if ($value['price_sales']) {
     		$priceAll+=$value['price_sales']*$value['sl'];
     	}else{
     		$priceAll+=$value['price']*$value['sl'];
     	}
     }
     if ($priceAll>500000) {
     	$ship=0;
     }else $ship=30000;
	 ?>
	
	<div class="detailsOrder">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li><a href="/shop/admin/Product/Bill">Đơn hàng</a></li>
							<li class="active"> Chi tiết đơn hàng</li>
					    </ol>
					</div>
				</div>
			</div>
			<div class="row title">Đơn hàng <b>#BKA<?php echo $data[0]['id_order'] ?></b></div>
			<div class="row">
				<div class="detail">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Ảnh sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Đơn giá</th>
								<th>Khuyến mãi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $key => $value): ?>		
							<tr>
								<td><img width="70px"src="/shop/image/product/<?php echo $value['image'] ?>" alt=""></td>
								<td><?php echo $value['name_product'] ?></td>
								<td><?php echo $value['sl'] ?></td>
								<?php if ($value['price_sales']) { ?>
								<td><?php echo number_format($value['price_sales'],0,".", "."); ?> ₫</td>
								<?php }else{ ?>
								<td><?php echo number_format($value['price'],0,".", "."); ?> ₫</td>
							    <?php } ?>
							    <td><?php echo $value['note_km'] ?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="detailPrice">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Phí vận chuyển</th>
								<th>Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo number_format($ship,0,".", "."); ?> ₫</td>
								<td><?php echo number_format($ship+$priceAll,0,".", "."); ?> ₫</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
	</div>
</body>
</html>
