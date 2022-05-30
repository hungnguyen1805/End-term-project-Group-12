<?php
if (empty($_SESSION['cart'])){
	$_SESSION['cart']=array();
}
if (isset($_GET['action'])){
	$id=isset($_GET['id'])?$_GET['id']:'';
	switch($_GET['action']){
		case'add':
			if(array_key_exists($id,array_keys($_SESSION['cart']))){
				$_SESSION['cart'][$id]++;
			}else{
				$_SESSION['cart'][$id]=1;
			}
			header("location: ?option=cart");
			break;
		case 'delete':
			unset($_SESSION['cart'][$id]);
			break;
		case 'deleteall':
			unset($_SESSION['cart']);
			break;
		case 'update':
		    if($_GET['type']=='asc')
			$_SESSION['cart'][$id]++;
		    else
		    if($_SESSION['cart'][$id]>1)
		    $_SESSION['cart'][$id]--;
			header("location: ?option=cart");
			break;
      case 'order':
        if(isset($_SESSION['user'])){
          header("location: ?option=order");
        }else{
          header("location: ?option=login&order=1");
        }
        break;
	}
}
?>
<section class="cart">
<?php
if (!empty($_SESSION['cart'])): 
	// $ids="0";
	// foreach(array_keys($_SESSION['cart']) as $key)
	// $ids.=",".$key; 
	$ids=implode(',', array_keys($_SESSION['cart']));
	$query="select*from products where id in($ids)";
	$result=$con->query($query);
	
?>
<table border="1" width="100%" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<td>Ảnh</td>
			<td>Tên</td>
			<td>Giá(Vnđ)</td>
			<td>Số Lượng</td>
			<td>Tổng tiền</td>
		</tr>
	</thead>
	<tbody>
<?php 	
  $toTal=0;
	foreach($result as $item):
?>
    <tr>
	   <td width="20%"><img width="100%" src="Image/<?=$item['productImage']?>"></td>
	   <td><?=$item['productName']?><br><input type="button" value="Xóa sản phẩm" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';"></td>
	   <td><?=number_format($item['productPrice'],0,',','.')?></td>
	   <td><?=$_SESSION['cart'][$item['id']]?><input type="button" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';"><input type="button" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';"></td>
	   <td><?=number_format($subTotal=$item['productPrice']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
    </tr>
    <?php $toTal+=$subTotal;?>
<?php
	endforeach;
?>
<tr>
	<td colspan="5">
	<section>Tổng tiền: <?=number_format($toTal,0,',','.')?>Vnđ</section>
	<section><input type="button" value="Xóa tất cả sản phẩm" onclick="if(confirm('Bạn có muốn xóa sản phẩm?'))location='?option=cart&action=deleteall';"><input type="button" value="Đặt hàng" onclick="location='?option=cart&action=order';"></section>

    </td>
</tr>
</tbody>
</table>
<?php
else:
?>
<section style="text-align: center;color: orange;font-weight:bold;font-size: 25px ">Giỏ hàng trống </section>
<?php
endif;	
?>
</section>