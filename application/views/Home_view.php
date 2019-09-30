<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include 'link.php'; ?>
	<title>Trang web mua bán online</title>
</head>
<body>
<?php include 'header_view.php'; ?>
<?php include 'slideBanner.php'; ?>
<!-- start productNew -->
<div class="productNew">
	<div class="container">
		<div class="row">
			<div class="title">
			 Sản phẩm mới
			</div>
		</div>
		<div class="row">
			<div class="products">
		<?php foreach ($new as $key => $value): ?>
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
			 	<div class="new"><img src="/shop/image/banner/New.png" alt=""></div>		
			 </div>		
			</div> <!-- end 1sp -->
		<?php endforeach ?>  
		</div>
      </div>
	</div>
</div> <!-- end ProductNew -->
<!-- start phone -->
<div class="phone">
	<div class="container">
		<div class="row">
			<div class="title">
			 Điện thoại
			</div>
		</div>
		<div class="row">
		<div class="products">
		<?php $i=0; ?>		
		<?php foreach ($phone as $key => $value): ?>
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
			 	<div class="addToCart">
			 		<button class="btn btn-danger" value="<?php echo $value['id_product'] ?>">Thêm vào giỏ hàng</button>
			 	</div>		
			 </div>		
			</div> <!-- end 1sp -->
		<?php $i++; ?>	 
		<?php endforeach ?> 
		</div>
      </div>
      <div class="row">
		<div class="viewMore">
			<a class="btn btn-danger" href="/shop/Home/showProduct/1">Xem thêm điện thoại</a>
		</div>
	</div>
	</div>
</div> <!-- end phone -->
<!-- start tablet -->
<div class="tablet">
	<div class="container">
		<div class="row">
			<div class="title">
			 Máy tính bảng
			</div>
		</div>
		<div class="row">
			<div class="products">
		<?php $i=0; ?>		
		<?php foreach ($tablet as $key => $value): ?>
		<?php if($i==4) break; ?>	
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
       <div class="row">
			<div class="viewMore">
				<a class="btn btn-danger" href="/shop/Home/showProduct/7">Xem thêm máy tính bảng</a>
			</div>
	   </div>
	</div>
</div> <!-- end tablet -->
<!-- start laptop -->
<div class="laptop">
	<div class="container">
		<div class="row">
			<div class="title">
			 Laptop
			</div>
		</div>
		<div class="row">
			<div class="products">
		<?php $i=0; ?>		
		<?php foreach ($laptop as $key => $value): ?>
		<?php if($i==4) break; ?>	
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
       <div class="row">
		<div class="viewMore">
			<a class="btn btn-danger" href="/shop/Home/showProduct/8">Xem thêm Laptop</a>
		</div>
	</div>
	</div>
</div> <!-- end laptop -->
<!-- start phụ kiện -->
<div class="accessories">
	<div class="container">
		<div class="row">
			<div class="title">
			 Phụ kiện
			</div>
		</div>
		<div class="row">
			<div class="products">
		<?php $i=0; ?>		
		<?php foreach ($phukien as $key => $value): ?>
		<?php if($i==4) break; ?>	
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
			 	<div class="addToCart">
			 		<button class="btn btn-danger" value="<?php echo $value['id_product'] ?>">Thêm vào giỏ hàng</button>
			 	</div>		
			 </div>		
			</div> <!-- end 1sp -->
		<?php $i++; ?>	
		<?php endforeach ?> 
		</div>
      </div>
       <div class="row">
		<div class="viewMore">
			<a class="btn btn-danger" href="/shop/Home/showProduct/9">Xem thêm phụ kiện</a>
		</div>
	</div>
	</div>
</div> <!-- end phone -->
<?php include 'footer.php'; ?>
</body>
<script>

</script>
</html>