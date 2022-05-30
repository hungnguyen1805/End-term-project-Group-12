<?php
	if(isset($_GET['brandID'])){
		$query="select*from products where productStatus=1 and brandID=".$_GET['brandID'];
		$result=$con->query($query);
	}
?><section class="products">
 	<?php foreach ($result as $item):?>
 		<section class="product">
 			<section>
 				<a href="?option=productdetail&id=<?=$item['id']?>">
 					<img src="Image/<?=$item['productImage']?>">
 				</a>
 			</section>
 			<section style="text-align: center;">
 				<section>
 				<?=$item['Name']?>
	 			</section>
	 			<section>
	 				<?=number_format($item['Price'], 0, '.', '.')?> Đ
	 			</section>
	 			<section>
	 				<input type="button" value="Add to Cart" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';">
	 			</section>
 			</section>
 		</section>
 	<?php endforeach; ?>
 </section>

 <style type="text/css">
 	.products img{
 		width: 100%;
        box-sizing: border-box;
 	}
    .product{
        width: 27%;
        float: left;
        margin-left: 7%;
        margin-top: 5%;
        margin-bottom: 5%;
        box-sizing: border-box;
        
    }
 </style>
<section class="products">
 	<?php foreach ($result as $item):?>
 		<section class="product">
 			<section>
 				<a href="?option=productdetail&id=<?=$item['id']?>">
 					<img src="Image/<?=$item['productImage']?>">
 				</a>
 			</section>
 			<section style="text-align: center;">
 				<section>
 				<?=$item['Name']?>
	 			</section>
	 			<section>
	 				<?=number_format($item['Price'], 0, '.', '.')?> Đ
	 			</section>
	 			<section>
	 				<input type="button" value="Add to cart" onclick="location='?option=cart&action=add&id=<??>';">
	 			</section>
 			</section>
 			
 		</section>
 	<?php endforeach; ?>
 </section>

 <style type="text/css">
 	.products img{
 		width: 100%;
        box-sizing: border-box;
 	}
    .product{
        width: 40%;
        float: left;
        margin-left: 7%;
        margin-top: 5%;
        margin-bottom: 5%;
        box-sizing: border-box;
    }
 </style>