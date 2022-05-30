<?php 
  if(isset($_GET['action'])){
  	$condition=" where orderid=".$_GET['orderid']." and productid=".$_GET['productid'];
  	if($_GET['type']=='asc'){
  		$query="update orderdetail set number=number+1".$condition;
  	}else{
  		$query="update orderdetail set number=number-1".$condition;
  	}
  	$con->query($query);
  	header("location: ?option=orderdetail&id=".$_GET['id']);
  }

  if(isset($_POST['status'])){
  	$con->query("update orders set status=".$_POST['status']." where id=".$_GET['id']);
  	header("Refresh:0");
  }
?>
<?php 
  $query="select a.fullname,a.mobile as 'mobileuser',a.address as 'addressuser',a.email as 'emailuser',b.*,c.name as 'nameordermethod' from users a join orders b on a.id=b.userid join ordermethod c on b.ordermethodid=c.id where b.id=".$_GET['id'];
  $order=mysqli_fetch_array($con->query($query));
?>
<h1>CHI TIẾT ĐƠN HÀNG<br>(Mã đơn hàng: <?=$order['id']?>)</h1>
<h2>NGÀY TẠO ĐƠN</h2>
<p><?=$order['orderdate']?></p>
<h2>THÔNG TIN NGƯỜI ĐẶT HÀNG</h2>
<table class="table">
	<tbody>
		<tr>
			<td>Họ tên: </td>
			<td><?=$order['fullname']?></td>
		</tr>
		<tr>
			<td>Điện thoại: </td>
			<td><?=$order['mobileuser']?></td>
		</tr>
		<tr>
			<td>Địa chỉ: </td>
			<td><?=$order['addressuser']?></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><?=$order['emailuser']?></td>
		</tr>
		<tr>
			<td>Ghi chú: </td>
			<td><?=$order['note']?></td>
		</tr>
	</tbody>
</table>
<h2>THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<table class="table">
	<tbody>
		<tr>
			<td>Họ tên: </td>
			<td><?=$order['name']?></td>
		</tr>
		<tr>
			<td>Điện thoại: </td>
			<td><?=$order['mobile']?></td>
		</tr>
		<tr>
			<td>Địa chỉ: </td>
			<td><?=$order['address']?></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><?=$order['email']?></td>
		</tr>
	</tbody>
</table>
<h2>PHƯƠNG THỨC THANH TOÁN</h2>
<section><?=$order['nameordermethod']?></section>
<?php 
  $query="select b.*,c.productName,c.productImage from orders a join orderdetail b on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
  $orderdetails=$con->query($query);
?>
<form method="post">
	<h2>CÁC SẢN PHẨM ĐẶT MUA</h2>
	<?php $count=1;?>
	<table class="table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh</th>
				<th>Giá</th>
				<th>Số lượng</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($orderdetails as $item):?>
				<tr style="text-align: center;">
					<td><?=$count++?></td>
					<td><?=$item['productName']?></td>
					<td width="50%"><img src="../Image/<?=$item['productImage']?>" width="20%"></td>
					<td><?=$item['price']?></td>
					<td><input <?=$item['number']==0?'disabled':''?> type="button" value="-" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=desc&orderid=<?=$item['orderid']?>&productid=<?=$item['productid']?>';"><?=$item['number']?><input type="button" value="+" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=asc&orderid=<?=$item['orderid']?>&productid=<?=$item['productid']?>';"></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<h2>TRẠNG THÁI ĐƠN HÀNG</h2>
	<p style="display: <?=$order['status']==2 || $order['status']==3?'none':'block'?>"><input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>> Chưa xử lý</p>
	<p style="display: <?=$order['status']==3?'none':''?>"><input type="radio" name="status" value="2" <?=$order['status']==2?'checked':''?>> Đang xử lý</p>
	<p><input type="radio" name="status" value="3" <?=$order['status']==3?'checked':''?>> Đã xử lý</p>
	<p style="display: <?=$order['status']==3?'none':''?>"><input type="radio" name="status" value="4" <?=$order['status']==4?'checked':''?>> Hủy</p>
	<section><input <?=$order['status']==3?'disabled':''?> type="submit" value="Update đơn hàng"><a href="?option=order&status=1">&lt;&lt; Back</a></section>
</form>