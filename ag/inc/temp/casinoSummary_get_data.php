<?php 
require('inc_head_bySession.php');

$view_date=_bdate();


if(empty($_POST["sdate"]))
{
  $_d=$view_date;
}else{
  $_d = $_POST["sdate"];
}


$date=date_create($_d);
$_d = date_format($date,"Y-m-d");
$mid = $_POST["stype"];
$zone =  $_POST["zone"];
// $zone =2;
$rid =  $_SESSION["rid"];
$sdd=@explode("-",$_d); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 
$date="and (play_datenow like '%$_d%' )";

$q = "";
$search = trim($_POST['q']);



if($search!=""){
    $m_user=array();
    $m_id=array();
    $sql="select m_id , m_user from bom_tb_member where m_agent_id like '%*$rid*%' and (m_name like '%$search%' or m_user like '%$search%')";
    $sql_a = $sql;
    $re=sql_query($sql);
    while($rs=sql_fetch($re)){
     $m_id[$rs['m_id']]=$rs['m_id'];
     $m_user[$rs['m_id']]=$rs['m_user'];
    } 
    $q = "and `m_id` IN (".implode(',',$m_id).")";

}else{
  $sql="select m_id , m_user from bom_tb_member where m_agent_id like '%*$rid*%'";
   $sql_a = $sql;
  $re=sql_query($sql);
  while($rs=sql_fetch($re)){
   $m_user[$rs['m_id']]=$rs['m_user'];
  } 
}

$sql = "SELECT * from bom_tb_casino_bill_play_live where 1 $q and r_id = $rid and b_accept=1 $date  and casino_zone = $zone";
$re = sql_query($sql);

$l = 0;
while ($rs = sql_fetch_as($re)) {
    $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
    $sum_total = $sum_total+$rs["b_total"];
    $sum_bonus = $sum_bonus+floatval(str_replace(array( '(', ')' ), '', $bo["count"]));

    $data_table .= "
   <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
          <td>".$rs["bet_id"]."</td>
          <td >".date("d/m/Y H:i:s",$rs["play_timestam"])."</td>
          <td align=\"center\">".$m_user[$rs['m_id']]."</td>
          <td align=\"center\">".$rs["casino_table"]."</td>
          <td align=\"center\">".$lang_g["casino_share"][$rs["casino_zone"]]."</td>
          <td align=\"center\">".number_format($rs["b_total"])."</td>
          <td align=\"center\" class=\"".$bo["color"]."\">".$bo["count"]."</td>
          <td class=\"".$casino_status_color[$rs["play_status"]]."\">".$casino_status[$rs["play_status"]]."</td>
          
        
     </tr>";
     $l++;
}

$sql = "SELECT * from bom_tb_casino_bill_play where 1 $q and r_id = $rid  and b_accept=1 $date  and casino_zone = $zone";
$re = sql_query($sql);

while ($rs = sql_fetch_as($re)) {
    $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
    $sum_total = $sum_total+$rs["b_total"];
    $sum_bonus = $sum_bonus+floatval(str_replace(array( '(', ')' ), '', $bo["count"]));

    $data_table .= "
    <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
          <td>".$rs["bet_id"]."</td>
          <td >".date("d/m/Y H:i:s",$rs["play_timestam"])."</td>
          <td align=\"center\">".$m_user[$rs['m_id']]."</td>
          <td align=\"center\">".$rs["casino_table"]."</td>
          <td align=\"center\">".$lang_g["casino_share"][$rs["casino_zone"]]."</td>
          <td align=\"center\">".number_format($rs["b_total"])."</td>
          <td align=\"center\" class=\"".$bo["color"]."\">".$bo["count"]."</td>
          <td class=\"".$casino_status_color[$rs["play_status"]]."\">".$casino_status[$rs["play_status"]]."</td>
          
        
     </tr>";
     $l++;
}


if($l == 0)
{
  $data_table .= "
  <tr align=\"center\" class=\"tr_lot\">
      <td colspan='100%'>".$lang_ag[1]."</td>
  </tr>";
}else{

   $data_footer .=" <tr>
                        <td align=\"center\"><strong><?=$lang_ag[174];?></strong></td>
                          <td colspan=\"4\" align=\"center\"></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_total,2)."</font></strong></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_bonus)."</font></strong></td>
                          <td></td>
                      </tr>";

}

$arry["data"]["data_table"] = $data_table;
$arry["data"]["data_footer"] = $data_footer;
$arry["data"]["sql_a"] = $sql_a;
$arry["data"]["sql"] = $sql;
echo json_encode($arry);


 ?>