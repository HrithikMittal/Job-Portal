<?php 
/* Author: Saujan Dulal*/

	$check = new Main;
	if(isset($_POST['email'],$_POST['password'])){
		@$username = $_POST['email'];
		@$password = $_POST['password'];
		
		if(empty($email) or empty($password)){
			echo "<div class='error'>Enter a email and Password</div>";
		} else{
			$password = md5($password);
  			$check->login($email,$password);
			}
		}

	
?>

<div class="right">
		<form action="" method="post"/>
			<div class="right-email">
				<ul>
					<li class="white">Email</li>
					<li><input type="text" name="email"/></li>
				</ul>
			</div>
			<div class="right-pass">
				<ul>
					<li><span class="white">Password</span></li>
					<li><input type="Password" name="password"/></li>
					<li><span>Forgot your Password?</span></li>
				</ul>
			</div>
			<div class="right-btn">
				<input class="btn" type="submit" value="Login" />
			</div>
			</form>
			 
</div>