<!-- page de connexion -->
<?php   require_once  'config.php' ; // Sur inclu la connexion à la bdd ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Connexion</title>
		<div id="bloctete">
			<img src="image/logoGBAF.png" alt="Logo GBAF"  width="70px" height="70px">
		</div>
	</head>
	<body>
		<form action="connexion.php" method="POST">
			<p align="center">
				<label for="UserName">Username : </label></br>
				<input type="text" name="UserName" id="UserName" autofocus required /><br>
			
				<label for="Passeword">Votre mot de passe :</label><br>
				<input type="password" name="Passeword" id="Passeword" required />
			</p>
			<div align="center">
				<button type="submit"> Connexion </button>
			</div>
		</form>
		<p align="center">
			<button><a href="inscription.php">Inscription</a></button>
		</p>
		<p align="center">
			<button><a href="oubliemdp.php">Mot de passe oublié</a></button>
		</p>
	</body>
	<footer>
		<?php include("footer.php"); ?>
	</footer>
</html>




