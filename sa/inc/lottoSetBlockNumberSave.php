<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

require('conn.php');
require('function.php');
require('ag_function.php');
require('../lang/sa_lang.php');

$zone = $_POST['l_zone'];
$rob = $_POST['l_rob'];
$rob = ($rob =="") ? 0 : $rob;


if($zone != "")
{ 
  if($_POST["deleted"] == "deleted")
  {
    $_rob = ($rob!="") ? "and lot_rob = '$rob'" : "";
    $tnumber = sql_escape_str($_POST["tnumber"]);
    $l_zone = sql_escape_str($_POST["l_zone"]);
    $l_rob = sql_escape_str($_POST["l_rob"]);
    $l_type = sql_escape_str($_POST["ttype"]);
    $tsum = sql_escape_str($_POST["tsum"]);

     $sql = "DELETE FROM `bom_tb_".$zone."_sa` WHERE `play_number` = '$tnumber' and `lot_type` = $l_type $_rob";
     $rs = sql_query_lot($sql);

     if($rs)
     {
       $data = array(
         'msg'     =>  "ลบสำเร็จ",
         'status'  =>  true,
         'sql' => $sql
       );
     }
     else
     {
       $data = array(
         'msg'     =>  "ผิดพลาด",
         'status'  =>  false,
         'sql' => $sql
       );
     }
     
     echo json_encode($data);

     exit();

    
  }else{

    if($_POST["tnumber"] !="")
    {

        $_rob = ($rob!="") ? "and lot_rob = '$rob'" : "";
        $tnumber = sql_escape_str($_POST["tnumber"]);
        $l_zone = sql_escape_str($_POST["l_zone"]);
        $l_rob = sql_escape_str($_POST["l_rob"]);
        $l_type = sql_escape_str($_POST["ttype"]);
        $tsum = sql_escape_str($_POST["tsum"]);
        $tsum = ($tsum =="") ? 0 : $tsum;

        $sql = "SELECT  COUNT(play_number) as num FROM `bom_tb_".$zone."_sa` WHERE play_number = $tnumber and `lot_type` = $l_type  $_rob";
        $rs = sql_array_lot($sql);
          
        if($rs["num"] == 0)
        {
        
          $sql = "INSERT INTO `bom_tb_".$zone."_sa`(`play_number`, `lot_type`, `lot_rob`, `s_sum`, `s_lock`) VALUES ('$tnumber','$l_type','$rob',$tsum,1)";
        }else{


          $sql = "UPDATE `bom_tb_".$zone."_sa` SET `lot_type`='$l_type',`lot_rob`='$rob',`s_sum`=$tsum,`s_lock`=1 WHERE play_number = $tnumber and `lot_type` = $l_type  $_rob";
        }
        
        
        $rs = sql_query_lot($sql);
        
        if($rs)
        {
          $data = array(
            'msg'     =>  "สำเร็จ",
            'status'  =>  true,
            // 'sql'  =>   $sql,
          );
        }
        else
        {
          $data = array(
            'msg'     =>  "ผิดพลาด",
            'status'  =>  false,
            // 'sql'  =>   $sql,
           
          );
        }
    }else{

        $data = array(
          'msg'     =>  "กรอกข้อมูลไม่ถูกต้อง",
          'status'  =>  false,
        );
    }

  } 

}else{

  $data = array(
      'msg'     =>  "ผิดพลาด",
      'status'  =>  false,
      // 'sql' => $sql
    );
} 

echo json_encode($data);

?>