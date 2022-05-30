<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $product=$con->query("select*from products where brandid=$id");
        if(mysqli_num_rows($product)!=0){
          $con->query("update brands set brandStatus=0 where id=$id");
        
        }else{
          $con->query("delete from brands where id=$id");
        }        
    }
?>

<?php
  $query = "select*from brands";
  $result = $con->query($query); 
?>
<section style="text-align: center;">
	<h1>CÁC THƯƠNG HIỆU</h1>
	<a href="?option=addbrand" class="btn btn-successes">Thêm thương hiệu</a>
	<table class="table table-bodered">
		<thead>
		  <tr>
		   <thead>
			  <th>ID</th>
			  <th>Tên Hãng</th>
			  <th>Trạng thái</th>
			  <th>Hành động</th>
			 </thead>
			 <tbody>
				<?php $count=1;?>
		<?php foreach ($result as $item):?>
					<tr>
						<td><?=$count++?></td>
            <td><?=$item['brandName']?></td>
            <td><?=$item['brandStatus']==1?'Active':'Unactive'?></td>
            <td><a class="btn btn-sm btn-info" href="?option=brandupdate&id=<?=$item['id']?>">Cập nhật</a><a class="btn btn-sm btn-danger" href="?option=showbrands&id=<?=$item['id']?>" onclick="return confirm('Are you sure?')">Xóa</a></td>
        </tr>
	            <?php endforeach;?>
			 </tbody>
		  </tr>
		</thead>
	</table>	
</section>