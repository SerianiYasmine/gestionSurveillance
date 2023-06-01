<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="register.css">
</head>
<body>
	

	<main>
		<h1>Inscription</h1>
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
		<form action="authentification.php" method="post">
			<label for="nom">Nom :</label>
			<input type="text" id="nom" name="nom" required>

			<label for="prenom">Prénom :</label>
			<input type="text" id="prenom" name="prenom" required>

			<label for="email">Email :</label>
			<input type="email" id="email" name="email" required>
            <label for="phone">phone number :</label>
			<input type="phone" id="phone" name="phone" required>

			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password" required>

    
			<label for="confirm_password">Confirmer motpass :</label>
			<input type="password" id="cpassword" name="cpassword" required>
            <!--<label for="role">role ("1 pour admin , vide pour autre") :</label>
			<input type="number" id="role" name="role" required>-->
			<input type="submit" name="register_btn" value="S'inscrire">
		</form>
        <div class="signup-link">Already have an account? <a href="login.php">Sign in</a></div>
	</main>
   
	<footer>
		<p>&copy; </p>
	</footer>
</body>
</html>
