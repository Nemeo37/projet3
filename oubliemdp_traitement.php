<?php 
    try
	{
    	$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
    	die('Erreurtest : ' . $e->getMessage());
	}

    $UserName = htmlspecialchars($_POST['UserName']);  //sécurité
    $Passeword = htmlspecialchars($_POST['Passeword']); //sécurité

	$result = $db->prepare('SELECT * FROM utilisateurs WHERE UserName = :UserName'); // récupération
	$result->execute(array('UserName' => $UserName));
	$content = $result->fetch(); 
	$Passeword_hashed = hash('sha256', $Passeword);
	$testpass = password_verify('test', $content['Passeword']); 
	if($content) //AND $testpass
    {
    	session_start();
    	$_SESSION['last_name'] = $content['Nom'];
    	$_SESSION['first_name'] = $content['Prenom'];
    	$_SESSION['UserName'] = $content['UserName'];
    	$_SESSION['id_user'] = $content['id_user'];
    	$_SESSION['Passeword'] = $content['Passeword'];
    	$_SESSION['Question'] = $content['Question'];
    	$_SESSION['Reponse'] = $content['Reponse'];
    	header('Location: oubliemdp1.php');
    }
    else {   
    // si erreur d'identifiant ou de mot de passe
    	session_start();
    	$_SESSION['wrong'] = true ;
    	header('Location: index.php');
    }
?>







    
			