<?php 

$muser = $_GET["muser"];
$mlevel = $_GET["mlevel"];

$e = $_GET["begin"];
$d = $_GET["end"];
$zone = $_GET["zone"];

$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

#$date = "and play_datenow BETWEEN '$edate' and '$ddate'";
$date = " and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";

$sql = "SELECT m_id FROM `bom_tb_member`  where m_user = '$muser' and m_level =  '$mlevel' ";
$rs = sql_array($sql);
$m_id = $rs["m_id"];

 $template = "
      <thead>
        <tr>
            <th align=\"center\">$lang_ag[241]</th>
            <th align=\"center\">$lang_ag[239]</th>
            <th align=\"center\">$lang_ag[1867] </th>
            <th align=\"center\">$lang_ag[477]  </th>
            <th align=\"center\">$lang_ag[1658]</th>
            <th align=\"center\">$lang_ag[429]</th>
            <th align=\"center\">$lang_ag[1675]</th>
           
        </tr>
      </thead>
      <tbody>
    ";
    $data_table = "";
    $sum_total = 0;
    $sum_bonus = 0;


    $sql = "SELECT * from bom_tb_casino_bill_play_live where m_id = $m_id and b_accept=1 and STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' and casino_zone = $zone order by bet_id DESC";
    $re = sql_query($sql);


    $l = 0;
    while ($rs = sql_fetch_as($re)) {
      $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
      $sum_total = $sum_total+$rs["b_total"];
      $sum_bonus = $sum_bonus+floatval(str_replace(array( '(', ')' ), '', $bo["count"]));

      $data_table .= "
      <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
            <td>".$rs["bet_id"]."</td>
            <td>".date("d/m/Y H:i:s",$rs["play_timestam"])."</td>
            <td>".$rs["casino_table"]."</td>
            <td>".$lang_g["casino_share"][$rs["casino_zone"]]."</td>
            <td>".number_format($rs["b_total"])."</td>
            <td class=\"".$bo["color"]."\">".$bo["count"]."</td>
            <td class=\"".$casino_status_color[$rs["play_status"]]."\">".$casino_status[$rs["play_status"]]."</td>
            
          
       </tr>";
       $l++;
    }



    $sql = "SELECT * from bom_tb_casino_bill_play where m_id = $m_id and b_accept=1 and STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' and casino_zone = $zone order by bet_id DESC";
    $re = sql_query($sql);

    while ($rs = sql_fetch_as($re)) {
      $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
      $sum_total = $sum_total+$rs["b_total"];
      $sum_bonus = $sum_bonus+floatval(str_replace(array( '(', ')' ), '', $bo["count"]));

      $data_table .= "
      <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
            <td>".$rs["bet_id"]."</td>
            <td>".date("d/m/Y H:i:s",$rs["play_timestam"])."</td>
            <td>".$rs["casino_table"]."</td>
            <td>".$lang_g["casino_share"][$rs["casino_zone"]]."</td>
            <td>".number_format($rs["b_total"])." </td>
            <td class=\"".$bo["color"]."\">".$bo["count"]."</td>
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
    }

     $data_table .="<tfoot>
                      <tr>
                        <td align=\"center\"><strong><?=$lang_ag[174];?></strong></td>
                          <td colspan=\"3\" align=\"center\"></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_total,2)."</font></strong></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_bonus,2)."</font></strong></td>
                          <td></td>
                      </tr>
                  </tfoot>";

    $full= $template.$data_table."</tbody>";







 ?>