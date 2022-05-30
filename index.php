<!DOCTYPE html>
<?php 
	session_start();
	$con= new MYSQLi("localhost","root","","db_cntt210");
	mysqli_set_charset($con,"utf8");
?>
<html>
<head>
	<meta charset="utf-8">
	<title>SHOPDIENTHOAI</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<style type="text/css">
		body{
			/*background: #D70018;*/
		}
	</style>
</head>
<body>
	<section id="wrapper"></section>
	<header><?php include"views/layout/header.php";?></header>
	<nav class="menu-top">
		<?php include"views/layout/menu-top.php";?>
	</nav>
	<aside><?php include"views/layout/left.php";?></aside>
	<article><?php include"routes.php";?></article>
	<aside><?php include"views/layout/right.php";?></aside>
	<footer><?php include"views/layout/footer.php";?></footer>

</body>
</html>