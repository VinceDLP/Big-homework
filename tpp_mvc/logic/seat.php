<?php

include_once("../db/DbManage.php");
require_once("../systemconfig.php");
$db = new DbManage();
$sqlTxt = "select * from fyt_plan,fyt_info,film_info,dyy_info
where fyt_plan.Fyt_id=fyt_info.Fyt_id and fyt_plan.Film_id = film_info.Film_id and
 fyt_info.Dyy_id=dyy_info.dyy_id and fyt_plan_id=1" ;
$result = $db->executeSqlTxt($sqlTxt);
$arrayList= array();
while($myrow = mysqli_fetch_array($result)){
    array_push($arrayList,$myrow);
    //echo "dgfsg<br>";
}

$sqlTxt = "select Pos_x_y from sale_info where fyt_plan_id =1";
    $result = $db->executeSqlTxt($sqlTxt);
    $cannot = "";
    while($row = mysqli_fetch_array($result)){
        if($cannot == ""){
            $cannot = $cannot.$row["Pos_x_y"];
        }else{
            $cannot = $cannot.",".$row["Pos_x_y"];
        }
    }
$db->closeConnection($result);
$smarty->assign("seat",$arrayList);
$smarty->assign("cannot",json_encode($cannot));
$smarty->display("movie/seat.html");
?>
