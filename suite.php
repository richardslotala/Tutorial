

<?php
require_once 'config/bdd.inc.php';
$select_compter = "SELECT COUNT(*) as nbrearticles FROM articles WHERE publie=1";
/* on a créé une requete et on l'envoi dans mysql */
$request = mysql_query($select_compter);
$resultat = mysql_fetch_array($request); /* on pousse le résultat dans un tableau */
/* print_r($resultat); */
$articles = $resultat['nbrearticles'];

$articlespage = 2;
$page = (isset($_GET['page']) ? $_GET['page'] : 1);

$calcul = ceil($articles / $articlespage); /* ceil arrondi par exces le calcul */
/* echo $calcul; echo va afficher mon resultat ici 7/2 : page 4 */

$debut = ($page - 1) * $articlespage; /* debut de page. si rien on arrive à la page courante */

$select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE publie = 1 LIMIT $debut,$articlespage";
/* copier-coller de select dans index. On rajoute limit (depart, nbr messag par page) */

echo $select_all_post;
?>
