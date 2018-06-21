<?php

define("BASE_PATH",$_SERVER['DOCUMENT_ROOT']);
//echo BASE_PATH;
define('SMARTY_PATH','tpp_mvc/smarty/');
//echo SMARTY_PATH;
require BASE_PATH.SMARTY_PATH.'libs/Smarty.class.php';
$smarty=new Smarty;
$smarty->template_dir=BASE_PATH.SMARTY_PATH.'templates/';
$smarty->compile_dir=BASE_PATH.SMARTY_PATH.'templates_c';
$smarty->config_dir=BASE_PATH.SMARTY_PATH.'configs';
$smarty->cache_dir=BASE_PATH.SMARTY_PATH.'cache/';
?>