<?php
session_start();
require_once 'config/bdd.inc.php';
/* require_once 'config/connect.inc.php'; */
require_once('libs/Smarty.class.php');
/* on lance le smarty */
$smarty = new Smarty();
$smarty->setTemplateDir('/template/');

include_once 'include/header.inc.php';

if (isset($_POST['connexion'])) {
    $Email = addcslashes($_POST['Email'], "'_%");
    $mot_de_passe = addcslashes($_POST['mot_de_passe'], "'_%");
} else {

    /*  if isset($connect)
      <div class="alert alert-error" id="notif">
      {connect}
      </div> */
    ?>
    <h1> Connexion SVP: </h1>
    <h2>saisir les identifiants de votre inscription</h2>
    <form action="connect.php" method="post" enctype="multipart/form-data" id="form_article" name="form_article">
        <div class="clearfix">
            <label for="Email"> Email : </label> 
            <div class="input">
                <input type="text"name="Email" id="Email" value=""/> 
            </div>
        </div>
        <div class="clearfix">
            <label for="mot_de_passe"> mot de passe : </label>
            <div class="input">
                <input type="text"name="mot_de_passe" id="mot_de_passe" value=""/> 
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="connexion" value="connexion" class="btn btn-large btn-primary"/>
        </div>
    </form>

    <?php
    include_once 'include/menu.inc.php';
    include_once 'include/footer.inc.php';
}
?>   