<?php 
    session_start(); // Démarrage de la session
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet3;', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    // Patch XSS
    $UserName = htmlspecialchars($_POST['Username']); 
    $Passeword = htmlspecialchars($_POST['Passeword']);
       
    // On regarde si l'utilisateur est inscrit dans la table compte
    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE UserName = ?');
    $check->execute(array($UserName));
    $data = $check->fetch();
    $row = $check->rowCount();
        

    // Si > à 0 alors l'utilisateur existe
    // Si le mot de passe est le bon
    if($Passeword == $data['Passeword']) 
    {
        // On créer la session et on redirige sur acceuil.php
        $_SESSION['user'] = $data['UserName'];
        header('Location: pagegenerale.php');
    }
    else { 
        header('Location: erreur.php'); // header('Location: page_connexion.php?login_err=mot_de_passe'); die();
    }
?>