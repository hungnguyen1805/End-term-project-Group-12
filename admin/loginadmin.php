<?php 
	if(isset($_POST['username'])):
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query="select * from admin where username='$username' and password='$password' ";
		$result=$con->query($query);
		if(mysqli_num_rows($result)==0):
			$alert = "Tên đăng nhập hoặc mật khẩu sai";
		else:
			$user= mysqli_fetch_array($result);
			if($user['adminStatus']==0):
				$alert ="Tài khoản của bạn đã bị khóa";
			else:
				$_SESSION['admin']=$username;
				header("location: .");
			endif;
		endif;
		// foreach($result as $user):
		// endforeach;	

	endif;
?>

<section>
	<h1>Đăng nhập tài khoản</h1>
	<section>
		<?=isset($alert)?$alert:"";?>
	</section>
	<section>
		<form method="post">
			<section>
				<label>Tài khoản</label><input type="text" name="username">
			</section>
			<section>
				<label>Mật khẩu</label><input type="password" name="password">
			</section>
			<section>
				<input type="submit" value="Login">
			</section>
		</form>
	</section>
</section>