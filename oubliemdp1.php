<?php 
	session_start()
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>test</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['first_name']))
			{ ?>
				<p>Bonjour </p><?php echo  $_SESSION['first_name'] ?>  <?php echo $_SESSION['last_name'] ?> <br>
				<p>Votre question secrète est : <br> <?php echo $_SESSION['Question'] ?>  </p>
				<p>Pour changer votre mot de passe, veuillez donner votre réponse : <br></p>
				<form method="POST" action="oubliemdp_traitement1.php">
					<legend>Votre réponse </legend>
						<p>
							<label for="UserName"></label>
							<input type="text" name="Reponse" id="Reponse" maxlength="255" placeholder="Réponse secrète" required> <br>
							<input type="submit" value="Valider">
						</p>
				</form>
			<?php
			} 
			else { 
				header('location:index.php');
			} ?>
	</body>
</html>