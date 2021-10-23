<?php
session_start();
require_once  'config.php' ; // Sur inclu la connexion à la bdd
 
if(isset($_SESSION['id_user'])) 
{
   $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_user = ?");
   $requser->execute(array($_SESSION['id_user']));
   $user = $requser->fetch();

   if(isset($_POST['nouveau_prenom']) AND !empty($_POST['nouveau_prenom']) AND $_POST['nouveau_prenom'] != $user['prenom']) 
   {
      $nouveau_prenom = htmlspecialchars($_POST['nouveau_prenom']);
      $insertprenom = $bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id_user = ?");
      $insertprenom->execute(array($nouveau_prenom, $_SESSION['id_user']));
      header('Location: deconnexion.php');
   }

   if(isset($_POST['nouveau_nom']) AND !empty($_POST['nouveau_nom']) AND $_POST['nouveau_nom'] != $user['nom']) 
   {
      $nouveau_nom = htmlspecialchars($_POST['nouveau_nom']);
      $insertnom = $bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id_user = ?");
      $insertnom->execute(array($nouveau_nom, $_SESSION['id_user']));
      header('Location: deconnexion.php');
   }

   if(isset($_POST['nouveau_nom_utilisateur']) AND !empty($_POST['nouveau_nom_utilisateur']) AND $_POST['nouveau_nom_utilisateur'] != $user['UserName']) 
   {
      $nouveau_nom_utilisateur = htmlspecialchars($_POST['nouveau_nom_utilisateur']);
      $insertnom_utilisateur = $bdd->prepare("UPDATE utilisateurs SET UserName = ? WHERE id_user = ?");
      $insertnom_utilisateur->execute(array($nouveau_nom_utilisateur, $_SESSION['id_user']));
      header('Location: deconnexion.php');;
   }

   if(isset($_POST['Passeword']) AND !empty($_POST['Passeword'])) 
   {
      $Passeword_hashed =  hash('sha256', $_POST['Passeword']);
      if(isset ( $_POST['Passeword'])) 
      {
         $insertmdp = $bdd->prepare("UPDATE utilisateurs SET Passeword = ? WHERE id_user = ?");
         $insertmdp->execute(array($Passeword_hashed, $_SESSION['id_user']));
         header('Location: deconnexion.php');
      } 
   }
   else 
   {
      header("Location: pagegenerale.php");
   }
}
?>