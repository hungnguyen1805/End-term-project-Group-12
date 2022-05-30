<?php 
	if(isset($_POST['username'])):
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query="select * from users where username='$username' and password='$password' ";
		$result=$con->query($query);
		if(mysqli_num_rows($result)==0):
			$alert = "Tên đăng nhập hoặc mật khẩu không đúng";
		else:
			$user= mysqli_fetch_array($result);
			if($user['status']==0):
				$alert ="Tài khoản của bạn đã bị khóa";
			else:
				$_SESSION['user'] = $username;
				if (isset($_GET['order'])) {
					header("location: ?option=order");
				}else{
				header("location: ?option=home");
			    }
			endif;
		endif;
	endif;
?>

<section style="margin-left: 20px">
	<h1 >Đăng nhập tài khoản</h1>
	<section><?=isset($alert)?$alert:"";?></section>
	<section >
		<form method="post">
			<section>
				<label>Username</label><input type="text" name="username">
			</section>
			<section>
				<label>Password</label><input type="password" name="password">
			</section>
			<section>
				<input type="submit" value="Login">
			</section>
		</form>
	</section>
</section>