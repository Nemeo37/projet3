<?php 
session_start();
//connexion à la base de données 
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} 
	catch(Exception $e)
	{
		die('Erreur' . $e->getMessage());
	}

	if(isset($_POST['Passeword']) AND !empty($_POST['Passeword'])) 
	{
      	$Passeword_hashed =  hash('sha256', $_POST['Passeword']);
      	if(isset ( $_POST['Passeword'])) 
      	{
      		$insertmdp = $bdd->prepare("UPDATE utilisateurs SET Passeword = ? WHERE id_user = ?");
      		$insertmdp->execute(array($Passeword_hashed, $_SESSION['id_user']));		
			header ( 'Location:deconnexion.php' );
		}
	}
?>
