<?php 
   require_once  'config.php' ; // Sur inclu la connexion à la bdd
?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width" />
      <title>Paramètre de compte</title>
      <?php include("header.php"); ?>
   </head>
   <body>
      <div align="center">
         <h2>Edition de mon profil</h2>
         <div align="center">
            <form method="POST" action="parametre_trait.php">
               <label>Prenom :.........</label>
               <input type="text" name="nouveau_prenom" placeholder="prenom" value="<?php echo $_SESSION['first_name'] ?>"  /><br /><br />
               <label>Nom :............</label>
               <input type="text" name="nouveau_nom" placeholder="nom" value="<?php echo $_SESSION['last_name'] ?>" /><br /><br />
               <label>Pseudo :.........</label>
               <input type="text" name="nouveau_nom_utilisateur" placeholder="nom_utilisateur" value="<?php echo $_SESSION['UserName'] ?>"  /><br /><br />
               <label>Mot de passe : </label>
               <input type="password" name="Passeword" placeholder="Nouveau mot de passe"/><br /><br />
               <input type="submit" value="Mettre à jour mon profil !" />
            </form>
            <p>Pour vérifier que les changements ont bien été pris en comptes,<br>veuillez vous déconnecter et vous reconnecter à votre session.</p>
            <?php  if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
