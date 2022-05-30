<?php 
  if(isset($_POST['content'])):
    $content=$_POST['content'];
    if(isset($_SESSION['user'])):
      $productid=$_GET['productid'];
      $userid=mysqli_fetch_array($con->query("select*from users where username='".$_SESSION['user']."'"));
      $userid=$userid['id'];
      $con->query("insert comments(userid,productid,date,content) value($userid,$productid,now(),'$content')");
      echo "<script>alert('Success !')</script>";
    else:
      $_SESSION['content']=$content;
      echo"<script>alert('Bạn cần đăng nhập!');
          location='?option=login&productid=$productid';</script>";
    endif;
  endif;  
?>
<?php
  if(isset($_GET['productid'])):
    $query = "select*from products where id=".$_GET['productid'];
    $result = $con->query($query);
    $item = mysqli_fetch_array($result);
  endif;
?>
<section>
    <section>             
        <img width="40%" src="image/<?=$item['productImage']?>" >
    </section>
    <section><?=$item['productName']?></section>
    <section><?=number_format($item['productPrice'],0,',','.')?> đ</section>
 <section><input type="button" value="Thêm vào giỏ hàng" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';" ></section>    </section>
    <hr>
    <section><?=$item['productDescription']?></section>
    <hr>
    <section>
        <h2>Comments:</h2>
        <form method="post">
            <section>
            <textarea name="content" style="width: 100%" rows="5" class="form-control" placeholder="Write comment here ..."></textarea>
            </section>
            <section><input type="submit" value="Submit" class="btn btn-primary"></section>
        </form>
    </section>
</section>