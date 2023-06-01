<!DOCTYPE html>
<!--www.codingflicks.com--> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Transparent Login Form HTML CSS</title>
	<link href="login.css" rel="stylesheet">
</head>
<body>
	
	<div class="form-box">
		<div class="header-text">
		 Login
		</div>
		<?php
			if (isset($_SESSION['message'])) {
			?>
				<div class="alert">
					<strong>Hey! </strong><?= $_SESSION['message']; ?>.
					<button type="button" class="alert-close">&times;</button>
				</div>
			<?php
				unset($_SESSION['message']);
			}
		?>

		<form action="authentification.php" method="POST">
		  <input placeholder="Your Email Address" type="text" name="email"> 
		  <input placeholder="Your Password" type="password" name="password"> 
		  <input id="terms" type="checkbox"> 
		  <label for="terms"></label>
		  <span>Agree with <a href="#">Terms & Conditions</a></span> 
		  <button name="login_btn">login</button>
		  <div class="signup-link">Don't have an account? <a href="register.php">Sign up</a></div>
		</form>
	  </div>
	  
</body>
</html>
