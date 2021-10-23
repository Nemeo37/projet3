<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="style1.css">
		<title>Inscription</title>
	</head>
	<body>
		<form method="POST" action="inscription_traitement.php">
			<fieldset>
				<legend>Inscription</legend>
					<p>
						<label for="Nom"> Nom</label>
						<input type="text" name="Nom" id="Nom" maxlength="255" placeholder="Dupont" autofocus required /><br>
						<label for="Prenom"> Prénom </label>
						<input type="text" name="Prenom" id="Prenom" maxlength="255" placeholder="Robert" required><br>
						<label for="UserName"> Pseudo</label>
						<input type="text" name="UserName" id="UserName" maxlength="255" placeholder="DupontR" required> <br>
						<label for="Passeword"> Mot de passe</label>
						<input type="password" name="Passeword" id="Passeword" maxlength="255" placeholder="Votre mot de passe" required> <br>
						<label for="Question"> Votre question secrète</label>
						<input type="text" name="Question" id="Question" placeholder="Quel est le nom de mon école primaire ?" required> <br>
						<label for="Reponse"> Votre réponse secrète </label>
						<input type="text" name="Reponse" id="Reponse" placeholder="Jean Moulin" required><br>
					</p>
					<p>
						<input type="submit" value="Valider">
					</p>
			</fieldset>
		</form>
		<?php include("footer.php"); ?>
	</body>
</html>