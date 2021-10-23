<?php
    session_start();
    require_once  'config.php' ; //  inclu la connexion à la bdd
    if(isset($_GET['idb'])) {
        $idb = $_GET['idb'];
        $commentaire = htmlspecialchars ( $_GET [ 'commentaires' ]); // sécurité
        $result = $bdd->prepare('SELECT count(*) as nombre FROM post WHERE id_acteur = :id_acteur AND id_user = :id_user'); // récupération
        $result->execute(array('id_acteur' => $_GET['idb'], 'id_user' =>$_SESSION['id_user']));
        $count = $result->fetchColumn();
            if ($count >=1 ) //si déjà commenté, reviens à la page
            {
                $_SESSION['comment_ko'] = "<strong> Vous avez déjà commenté ce partenaire</strong>";
                header('location:page5.php?idb='.$_GET['idb']);     
            } 
            else {// On insère dans la base de données
                $req = $bdd->prepare('INSERT INTO post(id_user, id_acteur, date_add, commentaire) VALUES(:id_user, :id_acteur, NOW(), :commentaire)');
                $req->execute(array(
                    'id_user' => $_SESSION['id_user'], 
                    'id_acteur' => $_GET['idb'],
                    'commentaire' => $_GET['commentaires']));
                header('location:page5.php?idb='.$_GET['idb']);
            }                                           
    }
 ?>