<?php
    $query="select * from products where productStatus=1";
    if(isset($_GET['brandID'])):
        $query .=" and  brandID=".$_GET['brandID'];
    elseif(isset($_POST['keyword'])):
        $query .=" and  productName like '%".$_POST['keyword']."%'";
    elseif (isset($_GET['lowprice'])):
        $lowprice = $_GET['lowprice'];
        $highprice = $_GET['highprice'];
        $query .= " and productPrice>=$lowprice and productPrice<$highprice";
    endif;
    $page=1;
  if(isset($_GET['page'])):
    $page=$_GET['page'];
  endif;
  $productperpage=6;
  $from=($page-1)*$productperpage;
  $totalProduct = $con->query($query);
  $totalPage=ceil(mysqli_num_rows($totalProduct)/$productperpage);
  $query.=" limit $from,$productperpage";
  $result = $con->query($query);
?>
<section class="products">
    <?php if(mysqli_num_rows($result)==0):?>
        <section>Không tìm thấy sản phẩm!</section>
    <?php else:?>
        <?php foreach($result as $item):?>
        <section class="product">
            <section><a href="?option=productdetail&productid=<?=$item['id']?>"><img src="image/<?=$item['productImage']?>"><a></section>
            <section><?=$item['productName'];?></section>
            <section><?=number_format($item['productPrice'],0,',','.');?> đ</section>
            <section><input type="button" value="Thêm vào giỏ hàng" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';" ></section>
        </section>
    <?php endforeach;?>
<?php endif;?>
</section>
<section class="pages" style="width: 100%;float: left;text-align: center;margin-top: 20px">
  <?php for($i=1; $i<=$totalPage; $i++):?>
    <a href="?page=<?=$i?>"><?=$i?></a>
  <?php endfor;?>
</section>