<!DOCTYPE html>
<?php 
    session_start();
	$con= new MYSQLi("127.0.0.1","root","","db_cntt210");
	mysqli_set_charset($con,"utf8");
?>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN</title>
	<script src="../public/ckeditor/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if(empty($_SESSION['admin'])):
	 include"loginadmin.php";
	else:
		include"controlpanel.php";
	endif;?>


</body>
</html>