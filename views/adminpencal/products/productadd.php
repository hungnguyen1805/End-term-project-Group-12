<?php
    if(isset($_POST['productName'])):
		$productName=$_POST['productName'];
		$query="select * from products where productName='$productName'";
		$result = $con->query($query);
		if (mysqli_num_rows($result)>0) :
			$alert="Đã tồn tại tên sản phẩm!";
    else:
    	$brandID =$_POST['brandID'];
    	$productPrice =$_POST['productPrice'];
    	$productDescription=$_POST['productDescription'];
    	$productStatus =$_POST['productStatus'];   	
    	$store="../Image/";
    	$productImageName =$_FILES['productImage']['name'];
    	$productImageTemp=$_FILES['productImage']['tmp_name'];
    	$exp3=substr($productImageName, strlen($productImageName)-3);
    	$exp4=substr($productImageName, strlen($productImageName)-4);
    	if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=='PNG'||$exp3=='JPG'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'):
    		$productImageName=time().'_'.$productImageName;
    		move_uploaded_file($productImageTemp, $store.$productImageName);
    		$query = "insert products(brandID,productName,productPrice,productImage,productDescription,productStatus)values('$brandID','$productName','$productPrice','$productImageName','$productDescription','$productStatus')";
    	  $con->query($query);
    	  header("location: ?option=showproducts");
    	else:
    		$alert="File đã chọn không phải file ảnh!";
    	endif;
    	////////
    endif;
  endif;
?>
<?php $brands =$con->query("select*from brands");?>

<h1>Thêm sản phẩm</h1>
<section style="text-align: center;color: red;font-weight: bold;"><?=isset($alert)?$alert:'';?></section>
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data">
		<section class="form-group">
			<label>Brand: </label>
			<select name="brandID" class="form-control">
				<option hidden>--Chọn sản phẩm--</option>
				<?php foreach($brands as $item):?>
					<option value="<?=$item['id']?>"><?=$item['brandName']?></option>
				<?php endforeach;?>
			</select>
		</section>
		<section class="form-group">
			<label>Tên sản phẩm: </label><input type="text" name="productName" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Giá: </label><input type="number" name="productPrice" min="100000">
		</section>
		<section class="form-group">
			<label>Ảnh: </label><input type="file" name="productImage" class="form-control" required>
		</section>
		<section class="form-group">
			<label>Ghi chú: </label>
			<textarea name="productDescription" id="productDescription"></textarea>
			<script>CKEDITOR.replace(productDescription);</script>
		</section>
		<section class="form-group">
			<label>Trạng thái : </label><input type="radio" name="productStatus" value="1"> Còn hàng <input type="radio" name="productStatus" value="0" checked> Không còn hàng
		</section>
		<section><input type="submit" value="ADD"><a href="?option=showproducts"> &lt;&lt; Quay lại</a></section>
	</form>
</section>