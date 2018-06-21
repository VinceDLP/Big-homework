<?php


include_once("../db/DbManage.php");
require_once("../systemconfig.php");

$db = new DbManage();
$key = trim($_POST["a"]);
$key_arr = explode("#",$key);
$cinema_name = "";
$class=array('a' =>'current','b'=>'');
if($key_arr[1] == "全部区域"){
    $sqlTxt1 = "select * from area_info" ;
    $result1 = $db->executeSqlTxt($sqlTxt1);
    $arrayList1= array();
    $class=array('a' =>'current');
    while($myrow1 = mysqli_fetch_array($result1)){
        array_push($arrayList1,$myrow1);

    }
$sqlTxt2 = "select * from dyy_info" ;
$result2 = $db->executeSqlTxt($sqlTxt2);
$arrayList2= array();
while($myrow2 = mysqli_fetch_array($result2)){
    array_push($arrayList2,$myrow2);}
}
else{
    $sqlTxt1 = "select * from area_info";
    $result1 = $db->executeSqlTxt($sqlTxt1);
    $arrayList1= array();
    while($myrow1 = mysqli_fetch_array($result1)){
        if($myrow1["Area_name"]==$key_arr[1]) {
            $Area_id = $myrow1["Area_id"];
            array_push($arrayList1,$myrow1);
    }else{
            array_push($arrayList1,$myrow1);
        }

}
    $sqlTxt2 = "select * from dyy_info WHERE Area_id ='".$Area_id."'";
    $result2 = $db->executeSqlTxt($sqlTxt2);
    $arrayList2= array();
    $myrow2 = mysqli_fetch_array($result2);
    $qer = $myrow2["dyy_id"];
    $cinema_name = $myrow2["dyy_name"];
    while ($myrow2 = mysqli_fetch_array($result2)) {
        array_push($arrayList2,$myrow2);
    }


}


$smarty->assign("area",$arrayList1);
$smarty->assign("class",$class);
$smarty->assign("dyy",$arrayList2);
$smarty->assign("cinema_name",$cinema_name);
$smarty->assign('tomorrow', strtotime('+1 day'));
$smarty->assign("key_ayy",$key_arr);
$smarty->display("movie/movie-area.html");
