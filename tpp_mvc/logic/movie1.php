<?php

include_once("../db/DbManage.php");
require_once("../systemconfig.php");
$a = $_GET['new'];
$db = new DbManage();
$sqlTxt = "select * from film_info WHERE Film_id = '" . $a ."'" ;
$result = $db->executeSqlTxt($sqlTxt);
$arrayList= array();
while($myrow = mysqli_fetch_array($result)){
    array_push($arrayList,$myrow);

}

$sqlTxt1 = "select * from area_info" ;
$result1 = $db->executeSqlTxt($sqlTxt1);
$arrayList1= array();
while($myrow1 = mysqli_fetch_array($result1)){
    array_push($arrayList1,$myrow1);

}

$sqlTxt2 = "select * from dyy_info" ;
$result2 = $db->executeSqlTxt($sqlTxt2);
$arrayList2= array();
while($myrow2 = mysqli_fetch_array($result2)){
    array_push($arrayList2,$myrow2);

}

$sqlTxt3="select * from fyt_plan,fyt_info where fyt_plan.Fyt_id=fyt_info.Fyt_id";
$result3 = $db->executeSqlTxt($sqlTxt3);
$arrayList3=array();
while($myrow3 = mysqli_fetch_array($result3)){
    if ($myrow3["Dyy_id"] == 1 && $myrow3["data"] == date("Y")."-".date("m")."-".date("d") && $myrow3["Film_id"] == 1) {
        array_push($arrayList3, $myrow3);

    }
}

$db->closeConnection($result);
$smarty->assign("movie1",$arrayList);
$smarty->assign("area",$arrayList1);
$smarty->assign("dyy",$arrayList2);

$smarty->assign('tomorrow', strtotime('+1 day'));
$smarty->assign("plan",$arrayList3);
$smarty->display("movie/movie1.html");
?>