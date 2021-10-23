<?php 
	session_start()
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="style1.css">
 		<title>Mot de passe oublié</title>
 	</head>
 	<body>
 		<p>Votre pseudo est : <br></p>
 		<?php echo $_SESSION['UserName']; ?>
 		<p>Veuillez entrer votre nouveau mot de passe : <br></p>
 		<form method="POST" action="oubliemdp_traitement2.php">
			<p>
				<label for="Passeword"> Mot de passe</label>
				<input type="password" name="Passeword" id="Passeword" maxlength="255" placeholder="Votre mot de passe" required> <br>
			</p>
			<p>
				<input type="submit" value="Valider">
			</p>
		</form>
 	</body>
 </html>