<?php
	//connexion à la base de données 
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} 
	catch(Exception $e)
	{
		die('Erreur' . $e->getMessage());
	}

	//sécurité
        $Nom = htmlspecialchars ( $_POST [ 'Nom' ]);
        $Prenom = htmlspecialchars ( $_POST [ 'Prenom' ]);
        $UserName = htmlspecialchars ( $_POST [ 'UserName' ]);
        $Passeword = htmlspecialchars ( $_POST [ 'Passeword' ]);
        $Question = htmlspecialchars ( $_POST [ 'Question' ]);
        $Reponse = htmlspecialchars ( $_POST [ 'Reponse' ]);

        // On hash le mot de passe 
        $Passeword_hashed = hash('sha256', $Passeword);

	// Insertion des champs dans la base de données
	$req = $bdd->prepare('INSERT INTO utilisateurs (Nom, Prenom, UserName, Passeword, Question, Reponse) VALUES(:Nom, :Prenom, :UserName, :Passeword, :Question, :Reponse)');
	$req->execute(array(
		'Nom'=> $Nom,
		'Prenom'=> $Prenom,
		'UserName'=> $UserName,
		'Passeword'=> $Passeword_hashed,
		'Question'=> $Question,
		'Reponse'=> $Reponse));

	header ( 'Location:index.php' );
?>

