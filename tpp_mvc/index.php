<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2018/5/22
 * Time: 13:58
 */
    define("BASE_PATH",$_SERVER['DOCUMENT_ROOT']);
    //echo BASE_PATH;
    define('SMARTY_PATH','php_mvc/smarty/');
    //echo SMARTY_PATH;
    require BASE_PATH.SMARTY_PATH.'libs/Smarty.class.php';
    $smarty=new Smarty;
    $smarty->template_dir=BASE_PATH.SMARTY_PATH.'templates/';
    $smarty->compile_dir=BASE_PATH.SMARTY_PATH.'templates_c';
    $smarty->config_dir=BASE_PATH.SMARTY_PATH.'configs';
    $smarty->cache_dir=BASE_PATH.SMARTY_PATH.'cache/';
    $smarty->assign('title','第一个Smarty程序');
    $smarty->assign('content','hello word');
    $smarty->display('index.html');
?>
