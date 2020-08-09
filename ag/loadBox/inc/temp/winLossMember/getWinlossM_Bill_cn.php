<?php 

$muser = $_GET["muser"];
$mlevel = $_GET["mlevel"];
$b_date = $_GET["begin"];
$e_date = $_GET["end"];


if($_GET["begin"]!=""){
  $edf=@explode('-',$b_date);
  $edt=@explode('-',$e_date);
}else{
  $edf=@explode('-',_bdate());
  $edt=@explode('-',_bdate());
}  
  
  $dbg=mktime(0,0,0,$edf[1],$edf[0],$edf[2]);
  $xc1=date("d/m/Y",$dbg);
  $xc1a=date("Y-m-d H:i:s",$dbg);
  
  
  $dbt=mktime(23,59,59,$edt[1],$edt[0],$edt[2]);
  $xc2=date("d/m/Y",$dbt);
  $xc2a=date("Y-m-d H:i:s",$dbt);


$date = "and play_datenow between '$xc1a' and '$xc2a'";


$sql = "SELECT m_id FROM `bom_tb_member`  where m_user = '$muser' and m_level =  '$mlevel' ";
$rs = sql_array($sql);
$m_id = $rs["m_id"];

$sql = "SELECT * FROM `bom_tb_casino_bill_play_live` where m_id = $m_id  $date order by bet_id DESC";
$re = sql_query($sql);


 $template = "
      <thead>
        <tr>
            <th align=\"center\">$lang_ag[241]</th>
            <th align=\"center\">$lang_ag[239]</th>
            <th align=\"center\">$lang_ag[1867] </th>
            <th align=\"center\">$lang_ag[477]  </th>
            <th align=\"center\">$lang_ag[1989]</th>
            <th align=\"center\">$lang_ag[1388]</th>
            <th align=\"center\">$lang_ag[2079]</th>
            <th align=\"center\">$lang_ag[1658]</th>
            <th align=\"center\">$lang_ag[2090] </th>
            <th align=\"center\">$lang_ag[429]</th>
            <th align=\"center\">$lang_ag[1675]</th>
        </tr>
      </thead>
      <tbody>
    ";
    $data_table = "";

    $sum_total = 0;
    $sum_bonus = 0;
    while ($rs = sql_fetch_as($re)) {

      $sum_total = $sum_total+$rs["b_total"];
      $sum_bonus = $sum_bonus+$bo["count"];

      // $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
      $data_table .= "
      <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
            <td>".$ca_id[$rs["casino_table"]]."-".$rs["play_id"]."</td>
            <td>".date("d/m/Y H:i:s",$rs["play_timestam"])."</td>
            <td>".$rs["casino_table"]."</td>
            <td>".$ca_type[$rs["casino_table"]]."</td>
            <td>".$rs["bet_id"]."</td>
            <td>".$rs["bet_round"]."</td>
            <td class=\"".$ca_color[$rs["casino_table"]][$rs["play_bet"]]." bet\">".$ca_txt[$rs["casino_table"]][$rs["play_bet"]]."</td>
            <td>".number_format($rs["b_total"])."</td>
            <td>".number_format($rs["b_total"],2)."</td>
            <td class=\"\"></td>
            <td class=\"\">?</td>
       </tr>";
    }



     $data_table .="<tfoot>
                      <tr>
                        <td align=\"center\"><strong>ทั้งหมด</strong></td>
                          <td colspan=\"6\" align=\"center\"></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_total)."</font></strong></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_total,2)."</font></strong></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum_bonus)."</font></strong></td>
                          <td align=\"center\"></td>
                      </tr>
                  </tfoot>";

    $full= $template.$data_table."</tbody>";







 ?>