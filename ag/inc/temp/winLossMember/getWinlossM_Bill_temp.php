<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
  if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  require('../../conn.php');
  require('../../function.php');
  require('../../ag_function.php');
  require('../../../lang/ag_lang.php');
  require('../../../lang/function_array.php');


   $e= $_GET["begin"];  // วันที่เริ่มต้น
   $d= $_GET["end"];  // วันที่สิ้นสุด

     #####################DATE
$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

if($_GET["zone"] != "" && $_GET["game"] == "cn")
{
  include "getWinlossM_Bill_cn_byZone.php";
}else{
  include "getWinlossM_Bill_".$_GET["game"].".php";
}

  

    $data = array(
      "status"    =>  true,
      "result"    =>  $full,
    );
    echo json_encode($data);
?> 