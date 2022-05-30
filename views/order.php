<?php 
  $query="select*from users where username='".$_SESSION['user']."'";
  $user=mysqli_fetch_array($con->query($query));
?>
<?php 
  if(isset($_POST['name'])){
  	$name=$_POST['name'];
  	$mobile=$_POST['mobile'];
  	$address=$_POST['address'];
  	$email=$_POST['email'];
  	$note=$_POST['note'];
  	$ordermethodid=$_POST['ordermethodid'];
  	$userid=$user['id'];
  	$query="insert orders(ordermethodid,userid,name,address,mobile,email,note) value($ordermethodid,$userid,'$name','$address','$mobile','$email','$note')";
  	$con->query($query);
  	$query="select id from orders order by id desc limit 1";
  	$orderid=mysqli_fetch_array($con->query($query))['id'];
  	foreach($_SESSION['cart'] as $key=>$value){
  		$productid=$key;
  		$number=$value;
  		$query="select productPrice from products where id=$key";
  		$productPrice=mysqli_fetch_array($con->query($query))['productPrice'];
  		$query="insert orderdetail value($productid,$orderid,$number,$productPrice)";
  		$con->query($query);
  	}
  	unset($_SESSION['cart']);
  	header("location: ?option=ordersuccess");
  }
?>
<h1 style="font-size: 2.5em;text-align: center;">ĐẶT HÀNG</h1>
<h2 style="text-align: center;">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<form method="post">
	<section style="text-align: center;">
	  <section>
	  	<label>Họ tên: </label><input name="name" value="<?=$user['fullname']?>">
	  </section>
	  <section>
	  	<label>Điện thoại: </label><input type="tel" name="mobile" value="<?=$user['mobile']?>">
	  </section>
	  <section>
	  	<label>Địa chỉ: </label><textarea name="address" rows="3"><?=$user['address']?></textarea>
	  </section>
	  <section>
	  	<label>Email: </label><input type="email" name="email" value="<?=$user['email']?>">
	  </section>
	  <section>
	  	<label>Ghi chú: </label><textarea name="note" rows="3"></textarea>
	  </section>	
	</section>
	<h2>Chọn phương thức thanh toán</h2>
	<?php 
      $query="select*from ordermethod where status";
      $result=$con->query($query);
	?>
	<select name="ordermethodid">
		<?php foreach($result as $item):?>
		  <option value="<?=$item['id']?>"><?=$item['name']?></option>
		<?php endforeach;?>
	</select>
	<section>
		<input type="submit" value="Đặt hàng" style="margin-top: 20px">
	</section>
</form>