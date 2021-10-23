<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Mot de passe oublié</title>
	</head>
	<body>
		<form method="POST" action="oubliemdp_traitement.php">
			<legend>Mot de passe oublié</legend>
			<p>
				<label for="UserName"></label>
				<input type="text" name="UserName" id="UserName" maxlength="255" placeholder="DupontR" required> <br>
				<input type="submit" value="Valider">
			</p>
		</form>
		<?php include("footer.php"); ?>
	</body>
</html>