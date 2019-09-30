<?php
$trangHtai=1;
$id_category=$DM;
$pre=$trangHtai-1;
$next=$trangHtai+1;
?>
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
			<?php for ($i=1; $i <=$sotrang ; $i++) { 
				?>	
				<?php if ($trangHtai==$i) {
					?>
					<li class="page-item active"><a class="page-link disabled" href="#"><?php echo $i; ?></a></li>

				<?php	}else{ ?>

					<li class="page-item"><a class="page-link" href="/shop/admin/ProductByCategory/getDataByPage/<?php echo $id_category ?>/<?php echo $i ?>"><?php echo $i; ?></a></li>
				<?php  }} ?>
				<!--  end loop for-->
				<?php 	if ($trangHtai==$sotrang) {
				}else if ($next>$sotrang) { 
					?>
					<li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
				<?php }else{ ?>		 
					<li class="page-item"><a class="page-link" href="/shop/admin/ProductByCategory/getDataByPage/<?php echo $id_category ?>/<?php echo $next; ?>">&raquo;</a></li>
				<?php 	}  ?>
			</ul>
		</div>
</div>
