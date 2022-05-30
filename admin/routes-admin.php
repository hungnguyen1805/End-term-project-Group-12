<?php 
	if(isset($_GET['option'])):
		switch($_GET['option']):
			case 'cart':
				include"../views/adminpencal/brands/cart.php";
				break;
			case 'showbrands':
				include"../views/adminpencal/brands/showbrands.php";
				break;
			case 'addbrand':
				include"../views/adminpencal/brands/addbrand.php";
				break;
				case 'brandupdate':
				include"../views/adminpencal/brands/brandupdate.php";
				break;
			case 'logout':
				unset($_SESSION['admin']); header("location: .");
				break;
			case 'showproducts':
				include"../views/adminpencal/products/showproducts.php";
				break;
			case 'productadd':
				include"../views/adminpencal/products/productadd.php";
				break;
			case 'productupdate':
				include"../views/adminpencal/products/productupdate.php";
				break;
			case 'order':
				include"../views/adminpencal/orders/showorder.php";
				break;
			case 'orderdetail':
				include"../views/adminpencal/orders/orderdetail.php";
				break;
		endswitch;
	else:
		include"../views/adminpencal/home-admin.php";
	endif;
?>