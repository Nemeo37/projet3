<?php session_start() ?>
<!-- Header / comporte le logo, le nom prénom de la personne, le menu de navigation et le bouton de déconnexion -->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<?php   require_once  'config.php' ; // Sur inclu la connexion à la bdd ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="style1.css">
	</head>
	<body>
		<div id="bloctete">
			<img src="image/logoGBAF.png" alt="Logo GBAF"  width="140px" height="140px">
			<form action="deconnexion.php">
			<?php
			if(isset($_SESSION['first_name']))
			{ ?>
				<em> <?php echo  $_SESSION['first_name'] ?>  <?php echo $_SESSION['last_name'] ?> <br>
				<input type="submit" value="Déconnexion"></em>
				<a href="parametre.php"><br>Paramètre</a>
			<?php
			} 
			else { 
				header('location:index.php');
			} ?>
			</form>
		</div>
	</body>
</html>