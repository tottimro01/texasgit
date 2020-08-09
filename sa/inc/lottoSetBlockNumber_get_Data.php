<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('inc_head_bySession.php');
// require('conn.php');
// require('function.php');
// require('ag_function.php');
// require('../lang/sa_lang.php');


$zone = $_POST['l_zone'];
$rob = $_POST['l_rob'];

$array_item = array();
if($zone != "")
{ 

    if(isset($_POST["type"]))
    {

        if($_POST["type"]!= "another")
        {
            $q_type = "and `lot_type` = $_POST[type]";
        }else{

          $another_key = array();

          foreach ($lotHun_typeArry as $key => $value) {
            if (!in_array($key, $lot_show)) {
              $another_key[] = $key;
            }
          }    

          $q_type = "and `lot_type` IN ( '" . implode( "', '" , $another_key ) . "' )"; 
             

        }


        $rob = ($rob!="") ? "and lot_rob = '$rob'" : "";
        $sql = "SELECT * FROM `bom_tb_".$zone."_sa` WHERE 1 $q_type $rob ORDER BY `lot_type` ASC , `play_number` ASC ";    
        $re = sql_query_lot($sql);
        $c =0;
        while ($rs = sql_fetch_as($re)) {
          $s_status = "";
          if($rs["s_sum"] == 0)
            {
              $s_status = "<span class=\"label label-danger\"> ปิดรับ </span>";
            } 


          $_rob_text = "";  
          if($lot_zone_bet[$zone] == 2 || $lot_zone_bet[$zone] == 4 )
          {

            $_rob_text = " - ".$lang_lotHun['rob'][$lot_zone_bet[$zone]][$rs["lot_rob"]];
          }else if($lot_zone_bet[$zone] == 11)
          {
            $_rob_text = " - ".$lot_robmun[$rs["lot_rob"]];
          } else if($lot_zone_bet[$zone] == 96)
          {
            $_rob_text =  " - ".$rs["lot_rob"]."<br>";
          }

            $array_item["list"][] = array(
              'play_number' => _dt($rs["play_number"]) , 
              '_play_number' => $rs["play_number"] , 
              'lot_type' => $lotHun_typeArry[$rs["lot_type"]]." ".$_rob_text , 
              '_lot_type' => $rs["lot_type"] , 
              'lot_rob' => $rs["lot_rob"] , 
              's_sum' =>  number_format( $rs["s_sum"]) , 
              's_status' => $s_status , 
            );
        }


    }





    

}else{

}

if(count($array_item["list"]) == 0)
{
  $array_item["list"] = "";
}
$array_item["sql"] = $sql;
echo json_encode($array_item);


 ?>