<?php
   require_once 'config.php'; // On inclut la connexion à la base de données
	//on compte le nombre de like et de dislike dans la table post
 	if(isset($_GET['idb'])) 
 	{
		$idb = $_GET['idb'];
  		$comments = $bdd->query('SELECT * FROM post  JOIN utilisateurs ON post.id_user=utilisateurs.id_user where id_acteur="' . $idb . '" order by date_add desc');
     	$countPost = $bdd->query('select count(*) as nombre from post where id_acteur="' . $idb . '"');

     	//on compt le nombre de like et de dislike dans la table vote
     	$countlike = $bdd->query('select count(*) as nombre from vote where vote=1 and id_acteur="' . $idb . '"');
      $countdislike = $bdd->query('select count(*) as nombre from vote where vote=0 and id_acteur="' . $idb . '" ');
     	$informationActeur = $bdd->query('select * from acteur where id_acteur="' . $idb . '"')->fetch();
 	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Page acteurs</title>
		<link rel="stylesheet" href="acteur.css">
		<?php include("header.php") ?>
	</head>
	<body>
		<div class="image" align="center">
			<img src="<?php echo "image/".$informationActeur['logo']; ?>" alt=logoacteur  style="height: 25%; width: 50%; display: block;">
		</div>	
		<div></div>
		<h2>
			<strong>Bienvenue  sur <?php echo $informationActeur['acteur'];?></strong>
		</h2>
		<p style="color:black; text-align: justify;">
			<?php echo $informationActeur['description'];?>
		</p>
		<br>
		<h2> Commentaires: </h2>
		<div id="comment">
			<?php 
			if(isset($_SESSION['comment_ko']))
			{
				echo $_SESSION['comment_ko'];
				unset($_SESSION['comment_ko']);
			} ?>
			<form action="commentaire.php" method="get">
				<fieldset>
					<input type="hidden" name="idb" value="<?php echo $idb;  ?>">
					<div>
						<label for="commentaires">Message</label> 
						<textarea type="text" name="commentaires" id="commentaires" required></textarea>
					</div>
					<div>
						<button type="submit"> Envoyer </button>
					</div>	
				</fieldset>	
					<?php // on affiche le nombre de commentaire dans la table post ?>
						<?php foreach ($countPost as $row1) {?>
						<?php  print $row1["nombre"]  ;?>  Message:
						<?php }?>
			</form>	
			<form action="like.php" method="post">	
				<fieldset>
					<input type="hidden" name="idb" value="<?php echo $idb;  ?>">
					<input type="hidden" name="islike" value="1">
					<input type="hidden" name="id_user" value="<?php if(isset($_SESSION['id_user'])){ echo $_SESSION['id_user'] ;}	 ?>">
					<div align="right">
						<button type="submit"><img src="image/likebis.png" title="like" width="30px" height="30px" /> </button>
						<?php foreach ($countlike as $row1) {?>
						<?php  print $row1["nombre"]  ;?> 
						<?php }?>
					</div>	
				</fieldset>				
			</form>	  
			<form action="like.php" method="post">		
				<fieldset>		
					<input type="hidden" name="idb" value="<?php echo $idb;  ?>">
					<input type="hidden" name="islike" value="0">
					<input type="hidden" name="id_user" value="<?php if(isset($_SESSION['id_user'])){ echo $_SESSION['id_user'] ;}	 ?>">
					
					<div align="right">
						<button type="submit"><img src="image/dislikebis.png" title="dislike" width="30px" height="30px" />  </button>
						<?php foreach ($countdislike as $row1) {?>
						<?php  print $row1["nombre"]  ;?> 
						<?php }?>
					</div>	
				</fieldset>			
			</form>
		</div>
		</br>
		<table border="1" width="100%">
			<tr>
				<?php foreach ($comments as $rowc) { ?>
				<td><?php  print $rowc["Prenom"]  ;?><br><?php  print $rowc["date_add"];  ?><br><?php  print $rowc["commentaire"] ; ?> </td>
			</tr>
		<?php } ?>
		</table>
			<?php include("footer.php") ?> 

	</body>
</html>








