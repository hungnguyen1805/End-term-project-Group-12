<?php 
   if(isset($_POST['username'])):
	   $username=$_POST['username'];
	   $query="select * from users where username='$username'";
	   $result=$con->query($query);
	   if(mysqli_num_rows($result)>0):
	   	$alert="Tên đã có người sử dụng";
	   else:
	   	$password=md5($_POST['password']);
	   	$fullname=$_POST['fullname'];
	   	$mobile=$_POST['mobile'];
	   	$address=$_POST['address'];
	   	$email=$_POST['email'];
	   	$query="insert users(username,password,fullname,mobile,address,email) value ('$username','$password','$fullname','$mobile','$address','$email')";
	   	$con->query($query);
	   	$alert="Đăng kí thành công";
	   endif;
   endif;
?>
<style>
        label{
            display: inline-block;
            min-width: 200px;
            margin-left: 20px;
        }
    </style>
<section class="signup">
	<h1>Đăng kí tài khoản</h1>

	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post" onsubmit="if(confirmpassword.value!=password.value){alert('Xác nhận mật khẩu sai'); confirmpassword.focus(); return false;}">
			<section>
				<label>Username: </label><input type="text" name="username" required>
			</section>
			<section>
				<label>Password: </label><input type="password" name="password" required>
			</section>
			<section>
				<label>Confirm Password: </label><input type="password" name="confirmpassword" required>
			</section>
			<section>
				<label>Fullname: </label><input type="text" name="fullname" required>
			</section>
			<section>
				<label>Mobile: </label><input type="number" name="mobile" required>
			</section>
			<section>
				<label>Address</label><textarea name="address" rows="3" required></textarea>
			</section>
			<section>
				<label>Email: </label><input type="email" name="email">
			</section>
			<section>
				<input type="submit" value="Đăng kí">
			</section>
		</form>
	</section>
</section>