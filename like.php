<?php
  require_once  'config.php' ; // Sur inclu la connexion à la bdd
  //verifier si l'acteur n'a pas encore commenté
  $requeteCountlike= $bdd->query('select count(*) as nombre from vote where id_acteur='.$_POST['idb'].' and id_user='.$_POST['id_user'].' ');
  foreach ($requeteCountlike as $rowZ){
    if ($rowZ['nombre'] >=1 ) //efface le like si il existe
    {
      $req = $bdd->prepare('DELETE FROM vote WHERE id_user =:id_user AND id_acteur = :id_acteur ');
      $req->execute(array(
      'id_user' => $_POST['id_user'],  
      'id_acteur' => $_POST['idb']));
      header('location:page5.php?idb='.$_POST['idb']);
    }      
    else {// On insère dans la base de données
      $req = $bdd->prepare('INSERT INTO vote(id_user, id_acteur,vote) VALUES(:id_user, :id_acteur, :islike)');
      $req->execute(array(
      'id_user' => $_POST['id_user'], 
      'id_acteur' => $_POST['idb'],
      'islike' => $_POST['islike']));
      header('location:page5.php?idb='.$_POST['idb']);                 
    }
  }   
?>
 