<?php
require_once("../systemconfig.php");
$data = array(1000,1001,1002);

$smarty->assign('custid',$data);
$smarty->display("demo.html");
?>