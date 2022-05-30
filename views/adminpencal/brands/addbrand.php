<?php 
	if(isset($_POST['brandName'])):
		$brandName=$_POST['brandName'];
		$query="select * from brands where brandName='$brandName'";
		$result = $con->query($query);
		if (mysqli_num_rows($result)>0) :
			$alert="Đã tồn tại tên hãng";
		else:
			$brandStatus=$_POST['brandStatus'];
			$query="insert brands(brandName,brandStatus) values('$brandName','$brandStatus')";
			$con->query($query);
			header("location: ?option=showbrand");
		endif;
	endif;
?>
<h1>Thêm thương hiệu</h1>
<section><?=isset($alert)?$alert:'';?></section>
<section>
	<form method="post">
		<section>
			<label>Tên thương hiệu</label><input type="text" name="brandName">
		</section>
		<section>
			<label>Trạng thái: </label><input type="radio" name="brandStatus" value="1">Còn hàng
			<input type="radio" name="brandStatus" value="0" checked=""> Không còn hàng
		</section>
		<section>
			<input type="submit" value="ADD">
		</section>
	</form>
</section>