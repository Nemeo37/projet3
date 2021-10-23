<?php 
   require_once 'config.php'; // On inclut la connexion à la base de données
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>page d'accueil</title>
		<?php include("header.php") ?>
	</head>
	<body> 
		<div align="center"><h1>Le GBAF </h1> </div>
		<h1 align="center">Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français </h1> <br />
		<img src="image/logoGBAF.png" alt="Logo GBAF"  style="height:5%; width: 20%; display: block; margin-left: 40%;">
		<h2 align="center" style="text-align: justify;">
			Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
			les axes de la réglementation financière française. Sa mission est de promouvoir
			l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
			pouvoirs publics.
		<h2/>
		
			
				
					<?php
                  $reqa = $bdd ->query("select * from acteur WHERE id_acteur !=100 ORDER BY id_acteur");
              		while ($desc = $reqa->fetch()) { ?>
              			<div id="acteur">
							<tr >     
                 			<div> <img src="<?php echo "image/".$desc['logo']; ?>" class="logo"  ></div>
                 			<div> <h3><?php echo $desc['acteur'];?></h3><br><p class="texte"><?php echo $desc['description'];?></p></div>
                 			<p class="blocvide"></p>
                 			<div> <button class="bouton"><a href="page5.php?idb=<?php echo $desc['id_acteur']; ?>"> Lire la suite</a></button></div>

                  	</tr>
                  	</div>
                  	

       				<?php } ?>   
				
			
      	<?php include("footer.php") ?>          	      
	</body>
</html>
