<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách sản phẩm</title>
	<?php include 'link.php'; ?>
</head>
<body>
<?php include 'header_view.php'; ?>	
<!-- start show more product -->
<div class="showMore">
	<div class="container">
		<div class="row">
		<div class="products">
		<?php $i=0; ?>		
		<?php foreach ($products as $key => $value): ?>
		<?php if($i==8) break; ?>	
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			 <div class="product">
			 	<a href="/shop/Home/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id_product'] ?>"><img width="100%" src="/shop/image/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
			 	<a href="/shop/Home/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id_product'] ?>"><div class="name"><?php echo $value['name_product'] ?></div></a>
			 	<?php if($value['price_sales']){ ?>
			 	<div class="prices">
			 	<div class="span-group">
			 		<span class="price"><?php echo number_format($value['price'],0,".", "."); ?> ₫</span>
			 		<span class="priceSale"><?php echo number_format($value['price_sales'],0,".", "."); ?> ₫</span>
			 	</div>
			 	</div>
			 	<?php }else{ ?>
			 		<div class="price"><?php echo number_format($value['price'],0,".", "."); ?> ₫</div>	
			 	<?php } ?>	
			 	<div class="note"><?php echo $value['note_km'] ?></div>
			 	<div class="addToCart"><button class="btn btn-danger" value="<?php echo $value['id_product'] ?>">Thêm vào giỏ hàng</button></div>		
			 </div>		
			</div> <!-- end 1sp -->
		<?php $i++; ?>	
		<?php endforeach ?> 
		</div>
      </div>
      <input type="hidden" id="slsp" value="8" >
      <div class="row">
		<div class="viewMore">
			<b class="btn btn-danger">Xem thêm </b>
		</div>
	</div>
	</div>
</div> <!-- end showMore -->
<?php include 'footer.php'; ?>
<script>
	$(document).ready(function(){
		$('.viewMore').click(function() {
			var id_category='<?php echo $products[0]['id_category']; ?>';
					//lấy số lượng sản phẩm hiện tại
					var sl = $('#slsp').val();
					sl=parseInt(sl);
					$('#slsp').val(sl+8);
					$.ajax({
						url: '/shop/Home/loadMore',
						type: 'POST',
						data: {idCartegory:id_category,offset:sl}
					})
					.done(function() {
					})
					.fail(function() {
					})
					.always(function(data) {
						if (data!="NULL") {
							$('.products').append(data);
						}else{
							$('.viewMore').html('<b class="endProduct" >Đã hết sản phẩm</b>');
						}
					});
				});
	     });
</script>
</body>
</html>