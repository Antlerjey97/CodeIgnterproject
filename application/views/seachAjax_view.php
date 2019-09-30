<ul>
<?php foreach ($data as $key => $value): ?>
<li>
  <a href="/shop/Home/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id_product'] ?>">
	<div class="image"><img src="/shop/image/product/<?php echo $value['image'] ?>" alt=""></div>
	<div class="name"><?php echo $value['name_product'] ?></div>
	<?php if ($value['price_sales']) {?>
		<div class="price"><?php echo number_format($value['price_sales'], 0, ".", "."); ?> ₫</div>
 	<?php } else {?>
 		<div class="price"><?php echo number_format($value['price'], 0, ".", "."); ?> ₫</div>
 	<?php }?>
  </a>
</li>
<?php endforeach?>
</ul>