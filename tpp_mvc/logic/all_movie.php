<?php

include_once("../db/DbManage.php");
require_once("../systemconfig.php");
$db = new DbManage();
$sqlTxt = "select * from film_info WHERE time=1" ;
$result = $db->executeSqlTxt($sqlTxt);
$arrayList= array();
while($myrow = mysqli_fetch_array($result)){
    array_push($arrayList,$myrow);
    //echo "dgfsg<br>";
}
$db->closeConnection($result);
$smarty->assign("movie",$arrayList);
$smarty->display("movie/all_movie.html");

?>