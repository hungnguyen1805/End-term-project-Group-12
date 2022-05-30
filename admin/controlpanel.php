<?php
 $chuaXuLy=mysqli_num_rows($con->query("select*from orders where status=1"));
 $dangXuLy=mysqli_num_rows($con->query("select*from orders where status=2"));
 $daXuLy=mysqli_num_rows($con->query("select*from orders where status=3"));
 $huy=mysqli_num_rows($con->query("select*from orders where status=4"));
?>

<table width="100%" border="1" cellpadding="0" >
	<tbody>
		<tr>
			<td width="20%" height="50px">Xin chào: <?=$_SESSION['admin']?><a href="?option=logout">Logout</a></td>
			<td>Trang Quản Trị ADMIN</td>
		</tr>
		<tr>
			<td>
				<section><a href="?option=showbrands">Thương hiệu</a></section>
				<section><a href="?option=showproducts">Sản phẩm</a></section>
				<section>
				Đơn hàng
				<section><a href="?option=order&status=1">&nbsp;&nbsp;&nbsp; Đơn hàng chưa xử lý [<span style="color: red;"><?=$chuaXuLy?></span>]</a></section>
				<section><a href="?option=order&status=2">&nbsp;&nbsp;&nbsp; Đơn hàng đang xử lý [<span style="color: red;"><?=$dangXuLy?></span>]</a></section>
				<section><a href="?option=order&status=3">&nbsp;&nbsp;&nbsp; Đơn hàng đã xử lý [<span style="color: red;"><?=$daXuLy?></span>]</a></section>
				<section><a href="?option=order&status=4">&nbsp;&nbsp;&nbsp; Đơn hàng hủy [<span style="color: red;"><?=$huy?></span>]</a></section>
			    </section>
			</td>
			<td><?php include"routes-admin.php" ?></td>		
		</tr>
	</tbody>
</table>