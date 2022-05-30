<?php 
if(isset($_GET['id'])):
  $id=$_GET['id'];
  $con->query("delete from products where id=".$id);
endif;
?>

			<th>Status</th>
			<th>Action</th>
		</thead>
<?php
	$query ="select * from products" ;
	$result = $con->query($query);
?>

<h1>DANH SÁCH SẢN PHẨM</h1>
<section style="text-align: center;"><a href="?option=productadd" class="btn btn-successes">Thêm sản phẩm</a></section>
<table class="table table-bodered">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Tên</th>
			<th>Giá</th>
			<th>ảnh</th>
			<th>Trạng thái</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $count=1;?>
		<?php foreach ($result as $item):?>
		  <tr>
		  	<td><?=$count++?></td>
		  	<td><?=$item['brandID']?></td>
		  	<td><?=$item['productName']?></td>
		  	<td><?=number_format($item['productPrice'],0,',','.')?></td>
		  	<td width="30%"><img src="../Image/<?=$item['productImage']?>" width="20%"></td>
		  	<td><?=$item['productStatus']==1?'Active':'Unactive'?></td>
			        <td><a class="btn btn-sm btn-info" href="?option=productupdate&id=<?=$item['id']?>">Update</a><a class="btn btn-sm btn-danger" href="?option=showproducts&id=<?=$item['id']?>" onclick="return confirm('Are you sure?')">Delete</a></td>
		  <tr>
		<?php endforeach;?>
	</tbody>
</table>