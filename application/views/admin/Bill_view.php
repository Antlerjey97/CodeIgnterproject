<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý đơn hàng</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php if (!count($data)) {?>
	<div class="alert alert-info text-center billEmpty">
	<div class="title">Không có đơn hàng nào</div>
	</div>
	<?php }else{ ?>
	<div class="add"></div>
	<div class="bill">
		<div class="container">
			<div class="row">
				<div class="location">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/shop/admin/Thongke">Home</a></li>
							<li class="active"> Quản lý đơn hàng</li>
					    </ol>
					</div>
				</div>
			</div>
			<div class="row title">Danh sách đơn hàng</div>
		    <div class="row">
		    	<div class="listBill">
		    		<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Mã đơn hàng</th>
							<th class="inforCustomer">Thông tin khách hàng</th>
							<th>Trạng thái</th>
							<th>Ngày đặt</th>
							<th>Chi tiết đơn hàng</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($customer as $key => $value): ?>
						<tr>
							<td>#176<?php echo $value['id_order'] ?></td>
							<td class="inforCustomer"><?php echo $value['fullname'] ?><br>
											  <?php echo $value['phone'] ?><br>
											  <?php echo $value['email'] ?><br>
											  <?php echo $value['address'] ?>
							</td>
							<?php $status=($value['status']==0)?'Chờ xử lý':($value['status']==1?'Hoàn thành':'Từ chối đơn hàng') ?>
							<td>
							 <div class="status"><?php echo $status ?></div>
							 <div class="change_status kHThi">
							 	<select class="form-control contentStatus">
							 		<option value="0">Chờ xử lý</option>
							 		<option value="1">Hoàn thành</option>
							 		<option value="2">Từ chối đơn hàng</option>
							 	</select>
							 	<i class="btn btn-success btn-sm glyphicon glyphicon-ok done"></i>
							 	<input type="hidden" value="<?php echo $value['id_order'] ?>" class="idOrder">
							 </div>	
							</td>
							<td><?php echo date('d/m/Y',$value['create_date']) ?></td>
							<td>
								<a href="/shop/admin/Product/billProduct/<?php echo $value['id_order'] ?>">Xem chi tiết</a>
							</td>
							<td>
								<i class="change glyphicon glyphicon-pencil btn-primary sua"></i>
								<i id="removeBill" class="glyphicon glyphicon-remove btn-danger xoa"></i>
								<input type="hidden" value="<?php echo $value['id_order'] ?>">
							</td>
						</tr>
                     <?php endforeach ?>
					</tbody>
				</table>
		    	</div>
		    </div>
	</div>
</div>
<?php } ?>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
      //change status bill 
		$('body').on('click','.change',function () {   
			$(this).parent().prev().prev().prev().find('.change_status').removeClass('kHThi');
			$(this).parent().prev().prev().prev().find('.status').addClass('kHThi');

		});
		$('body').on('click','.done',function () {   
			$(this).parent().addClass('kHThi');
			$(this).parent().prev().removeClass('kHThi');
			status=$(this).prev().val();
			id=$(this).next().val();
			nd=(status==0)?'Chờ xử lý':(status==1)?'Hoàn thành':'Từ chối đơn hàng';
			$(this).parent().prev('.status').html(nd);
			$.ajax({
				url: '/shop/admin/Product/updateStatusBill',
				type: 'POST',
				data: {status: status,id:id}
			})
			.done(function() {
			})
			.fail(function() {
			})
			.always(function() {
			});
		});
		// removeBill
		$('body').on('click','#removeBill',function () {
		var ndXoa=$(this).parent().parent();
		id=$(this).next().val(); 
		bill=$('.bill');
		add=$('.add');
		 $.ajax({
				url: '/shop/admin/Product/deleteBill',
				type: 'POST',
				data: {id:id}
			})
			.done(function() {
			})
			.fail(function() {
			})
			.always(function(data) {
				ndXoa.remove();
				if (data=='empty') {
				bill.remove();
				nd='<div class="alert alert-info text-center billEmpty">';
				nd+='<div class="title">Không có đơn hàng nào</div>';
				nd+='</div>';
				add.append(nd);
				}
			});
		});

		},false);
		
	</script>
</body>
</html>
