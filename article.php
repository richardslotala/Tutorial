<?php

// debut du php
session_start(); //permet de faire circuler des infos d'une page à l'autre
require_once('libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('template/');

require_once 'config/bdd.inc.php'; //on appelle une fois le fichier config

if (isset($_POST['envoyer'])) { // je verifie si le bouton envoyé est posté sinon jaffiche le formulaire html
    $titre = addcslashes($_POST['titre'], "'_%"); //addclashes permet d'éviter les pb et va inserer nos caracteres ""
    $texte = addcslashes($_POST['texte'], "'_%"); // on place dans une variable texte la valeur de texte
    $publie = (!empty($_POST['publie']) ? $_POST['publie'] : 0);
    //on crée la variable publie. si sa valeur est différent de vide elle prend la valeur [] sinon elle valeur vaut 0
    $date = date("Y-m-d"); // on reprend la date du systeme américain
//echo $titre . ' & '. $texte . ' & ' . $publie . ' & ' . $date;

    $req_insertion = "INSERT INTO articles (titre, texte, date, publie) VALUES ('$titre', '$texte', '$date', $publie)";
//on rajoute dans la table articles () les valeurs ()


    $erreur_image = $_FILES['image']['error'];
//on cré une variable erreur_image. dans le fichier image error

    if ($erreur_image != 0) { //si erreur image est différente de 0 il va afficher la ligne suivante sinon on continu
        $_SESSION['mess_error'] = "Votre image ne correspond pas. Il faut la changer";
        header("location: article.php"); //c'est l'endroit où la page va être redirigée
    } else { //sinon il exécute la requete de la variable()
        mysql_query($req_insertion); //sert à executer une requête

        $id_article = mysql_insert_id(); //definition de id de l'article

        move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id_article.jpg");
        //déplacement et renommage de l'image
        $_SESSION['article_valide'] = "Insertion de l'article réussi avec succès! OK!"; //affichage du resultat
        header("location: index.php"); //c'est l'endroit où la page va être redigirée
    }
} else {

    /* ------HTML ----- */
    include_once 'include/header.inc.php';
    if (isset($_session['mess_error'])) {
        $smarty->assign('mess_error', $_session['mess_error']);
    }
    /* $smarty->debugging = true; */

    $smarty->display('article.tpl');

    unset($_SESSION['mess_error']);

    include_once 'include/menu.inc.php';
    include_once 'include/footer.inc.php';
}
?>   