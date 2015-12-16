<?php

require_once('libs/Smarty.class.php');



$smarty->setTemplateDir('template/');

$maVariable = "Hello Word Man!";

$smarty->assign('maVariableSmarty', $maVariable);

//** un-comment the following line to show the debug console
$smarty->debugging = true; // on vient d'enlever les commentaires au début, on va les remettre apres//

$smarty->display('test.tpl');



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
