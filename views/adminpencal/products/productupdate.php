<?php $product = mysqli_fetch_array($con->query("select*from products where id=".$_GET['id']));?>
<?php
    if(isset($_POST['productName'])):
		$productName=$_POST['productName'];
		$query="select * from products where productName='$productName' and id!=".$product['id'];
		$result = $con->query($query);
		if (mysqli_num_rows($result)!=0) :
			$alert="Đã có sản phẩm khác dùng tên này!";
	    else:
	    	$brandID =$_POST['brandID'];
	    	$productPrice =$_POST['productPrice'];
	    	$productDescription=$_POST['productDescription'];
	    	$productStatus=$_POST['productStatus'];
    	////Xử lý ảnh:
		    if(isset($_FILES['productImage'])):
		    	$store="../Image/";
		    	$productImageName=$_FILES['productImage']['name'];
		    	$productImageTemp=$_FILES['productImage']['tmp_name'];
		    	$exp3=substr($productImageName, strlen($productImageName)-3);
		    	$exp4=substr($productImageName, strlen($productImageName)-4);
		    	if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=='PNG'||$exp3=='JPG'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'):
		    		$productImageName=time().'_'.$productImageName;
		    		move_uploaded_file($productImageTemp, $store.$productImageName);
		    		unlink($store.$product['productImage']);
		    	else:
		    		$alert="File đã chọn không phải file ảnh!";
		    	endif;
		    	if (empty($productImageName)):
			    	$productImageName=$product['productImage'];
			    endif;
	    ////////////////
	        endif;
            $query = "update products set brandID='$brandID',productName='$productName',productPrice='$productPrice',productImage='$productImageName',productDescription='$productDescription',productStatus='$productStatus' where id=".$product['id'];
	    	$con->query($query);
	    	header("location: ?option=showproducts");
         endif;
     endif;
?>
<?php $brands =$con->query("select*from brands");?>

<h1>Cập nhật sản phẩm</h1>
<section style="text-align: center;color: red;font-weight: bold;"><?=isset($alert)?$alert:'';?></section>
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data">
		<section class="form-group">
			<label>Sản phẩm: </label>
			<select name="brandID" class="form-control">
				<option hidden>--Chọn sản phẩm--</option>
				<?php foreach($brands as $item):?>
					<option value="<?=$item['id']?>" <?=$item['id']==$product['brandID']?'selected':''?>><?=$item['brandName']?></option>
				<?php endforeach;?>
			</select>
		</section>
		<section class="form-group">
			<label>Tên sản phẩm: </label><input type="text" name="productName" class="form-control" required value="<?=$product['productName']?>">
		</section>
		<section class="form-group">
			<label>Giá: </label><input type="number" name="productPrice" min="1000000" value="<?=$product['productPrice']?>">
		</section>
		<section class="form-group">
			<label>Ảnh: </label><br>
			<img src="../Image/<?=$product['productImage']?>">
			<input type="file" name="productImage" class="form-control">
		</section>
		<section class="form-group">
			<label>Chú thích: </label>
			<textarea name="productDescription" id="productDescription"><?=$product['productDescription']?></textarea>
			<script>CKEDITOR.replace(productDescription);</script>
		</section>
		<section class="form-group">
			<label>Trạng thái : </label><input type="radio" name="productStatus" value="1" <?=$product['productStatus']==1?'checked':''?>> Còn hàng <input type="radio" name="productStatus" value="0" <?=$product['productStatus']==0?'checked':''?>> Hết hàng
		</section>
		<section><input type="submit" value="Update"><a href="?option=showproducts"> &lt;&lt; Back</a></section>
	</form>
</section>