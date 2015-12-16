$smarty->assign('connect',$_session['connect']);

$smarty->debugging = true;

$smarty->display('test.tpl');