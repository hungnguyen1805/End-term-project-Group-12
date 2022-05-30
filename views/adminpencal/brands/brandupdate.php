<?php $brand=mysqli_fetch_array($con->query("select*from brands where id=".$_GET['id']));?>

<?php 
  if(isset($_POST['brandName'])):
  	$brandName = $_POST['brandName'];
  	$query = "select*from brands where brandName='$brandName' and id!=".$brand['id'];
  	$result = $con->query($query);
  	if(mysqli_num_rows($result)>0):
  		$alert = "Đã có hãng khác mang tên này!";
  	else:
  		$brandStatus = $_POST['brandStatus'];
  		$con->query("update brands set brandName='$brandName',brandStatus='$brandStatus' where id=".$brand['id']);
  		header("location: ?option=showbrands");
  	endif;
  endif;
 ?>
<h1>Cập nhật hãng</h1>
<section><?=isset($alert)?$alert:''?></section>
<section>
	<form method="post">
		<section>
			<label>Tên Hãng: </label><input value="<?=$brand['brandName']?>" name="brandName">
		</section>
		<section>
			<label>Trạng thái: </label><input type="radio" name="brandStatus" value="1" <?=$brand['brandStatus']==1?'checked':''?>>Còn hàng <input type="radio" name="brandStatus" value="0" <?=$brand['brandStatus']==0?'checked':''?>> Không còn hàng
		</section>
		<section><input type="submit" value="Update" style="background-color: #33FFCC"><a href="?option=showbrands">&lt;&lt; Back</a></section>
	</form>
</section>