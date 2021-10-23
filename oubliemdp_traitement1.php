<?php 
session_start();
	try
	{
    	$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
    	die('Erreurtest : ' . $e->getMessage());
	}

	$result = $db->prepare('SELECT * FROM utilisateurs WHERE UserName = :UserName'); // récupération
	$result->execute(array('UserName' => $_SESSION['UserName']));
	$content = $result->fetch();
	if($content['Reponse'] == $_POST['Reponse'])
	{
		header('location:oubliemdp2.php');
	}
	else {
		header('location:index.php');
	}
?>