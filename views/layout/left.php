<style type="text/css">
	nav.menu-left>a{
		float: left;
		width: 100%;
		margin-top: 3px;
		background: white;
		padding: 3px;
		color: black;
		text-decoration: none;
		border-bottom: 1px solid black;
		text-align: center;
		font-size: 17px;
	}
</style>
<?php
$query = "select * from brands where brandStatus=1";
$result = $con->query($query);
?>
<nav class="menu-left">
<?php foreach ($result as $item):?>
<a href="?option=search&brandID=<?=$item['id']?>"><?=$item['brandName']?></a>
<?php endforeach;?>
</nav>