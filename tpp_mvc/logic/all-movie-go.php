<?php
include_once("../db/DbManage.php");
require_once("../systemconfig.php");
$stuName = $_POST['a'];
if($stuName == "now") {
        $db = new DbManage();
        $sqlTxt = "select * from film_info WHERE time=1" ;
        $result = $db->executeSqlTxt($sqlTxt);
        $arrayList= array();
        while($myrow = mysqli_fetch_array($result)){
            array_push($arrayList,$myrow);
            //echo "dgfsg<br>";
        }
        $arrayList1=array('a' =>'ppp','b' =>'ttt');
        $db->closeConnection($result);
        $smarty->assign("movie",$arrayList);
        $smarty->assign("movie1",$arrayList1);
        $smarty->display("movie/all-movie-go.html");
    }else{
    $db = new DbManage();
    $sqlTxt = "select * from film_info WHERE time=0" ;
    $result = $db->executeSqlTxt($sqlTxt);
    $arrayList= array();
    $arrayList1=array('a' =>'aaa','b' =>'bbb');
    while($myrow = mysqli_fetch_array($result)){
        array_push($arrayList,$myrow);
        //echo "dgfsg<br>";
    }
    $db->closeConnection($result);
    $smarty->assign("movie",$arrayList);
    $smarty->assign("movie1",$arrayList1);
    $smarty->display("movie/all-movie-go.html");
}
?>