<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('inc_head_bySession.php');
// require('conn.php');
// require('function.php');
// require('ag_function.php');
// require('../lang/sa_lang.php');


$zone = sql_escape_str($_POST['l_zone']);
$rob = sql_escape_str($_POST['l_rob']);
$rob = ($rob =="") ? 1 : $rob;
$_rob = ($rob!="") ? "and lot_rob = '$rob'" : "";

$array_item = array();
if($zone != "")
{ 

    if(isset($_POST["type"]))
    {

        $sql = "SELECT * FROM bom_tb_nothit WHERE 1  and `lot_zone` = $zone and  `lot_rob` = $rob ORDER BY `lot_type` ASC , `nothit_num` ASC ";    
        $re = sql_query($sql);
        $c =0;
        while ($rs = sql_fetch_as($re)) {
          


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
              'nothit_num' => _dt($rs["nothit_num"]) , 
              '_nothit_num' => $rs["nothit_num"] , 
              'lot_type' => $lotHun_typeArry[$rs["lot_type"]]." ".$_rob_text , 
              '_lot_type' => $rs["lot_type"] , 
              'lot_rob' => $rs["lot_rob"] , 
            );
        }
    }

}else{

}

if(count($array_item["list"]) == 0)
{
  $array_item["list"] = "";
  
}

echo json_encode($array_item);


 ?>