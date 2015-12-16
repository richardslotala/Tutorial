<?php

//début du php
session_start();
require_once 'config/bdd.inc.php'; //on appelle une fois le fichier config
include_once 'include/header.inc.php'; // insertion de la tete (head) HTML de la page
require_once('libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('template/');


require_once 'config/bdd.inc.php';
$select_compter = "SELECT COUNT(*) as nbrearticles FROM articles WHERE publie=1";
/* on a créé une requete et on l'envoi dans mysql */
$request = mysql_query($select_compter);
$resultat = mysql_fetch_array($request); /* on pousse le résultat dans un tableau */
/* print_r($resultat); */
$articles = $resultat['nbrearticles'];

$articlespage = 2;
$page = (isset($_GET['page']) ? $_GET['page'] : 1);

$calcul = ceil($articles / $articlespage); /* ceil arrondi par exces le calcul du nombre de page */
/* echo $calcul; echo va afficher mon resultat ici 7/2 : page 4 */

$debut = ($page - 1) * $articlespage; /* debut de page. si rien on arrive à la page courante */
$select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE publie = 1 LIMIT $debut,$articlespage";


//on place dans une variable : on selectionne dans la table post : id(le n°) titre texte dateformat que l'on appelle (as) date_fr de la table articles quand pul*blie=1
$request = mysql_query($select_all_post);
//on place dans une variable(request),  l'execution de la requete sql
/* faire une boulce while dans tpl */
while ($result_request = mysql_fetch_array($request)) {
    // on crée une nouvelle variable php($) et on y pousse les resultats dans un tableau retournés par une requete sql
    //
    $TableauArticleSmarty[] = $result_request;
}
unset($_SESSION['article_valide']); //on detruit le message une fois qu'il s'est affiché

$smarty->assign('TableauArticleSmarty', $TableauArticleSmarty);

$smarty->assign('page', $page);
$smarty->assign('calcul', $calcul);
/* $smarty->debugging = true; */

$smarty->display('index.tpl');


include_once 'include/menu.inc.php'; // insertion du menu HTML de la page
include_once 'include/footer.inc.php'; // insertion du footer(pied de page) HTML de la page
//fin du php
?>   