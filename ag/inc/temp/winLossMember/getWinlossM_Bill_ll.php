<?php 

$muser = $_GET["muser"];
$mlevel = $_GET["mlevel"];

$e = $_GET["begin"];
$d = $_GET["end"];


$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 



$zone = "and lot_zone = 3 and  lot_type = 31 ";
$date = "and  STR_TO_DATE(b_date,'%d-%m-%Y') between '$edate' and '$ddate'";


$sql = "SELECT m_id FROM `bom_tb_member`  where m_user = '$muser' and m_level =  '$mlevel' ";
$rs = sql_array($sql);
$m_id = $rs["m_id"];

$sql = "SELECT * FROM `bom_tb_lotto_bill_play_live` where m_id = $m_id and b_accept=1 $zone $date order by bill_id DESC";
$re = sql_query($sql);

$sql = "SELECT * FROM `bom_tb_lotto_bill_play` where m_id = $m_id and b_accept=1 $zone $date order by bill_id DESC";
$re2 = sql_query($sql);

 $template = "
      <thead>
        <tr>
  <th align=\"center\">$lang_ag[2078] </th>
  <th align=\"center\">$lang_ag[1401]-$lang_ag[239]</th>
  <th align=\"center\">$lang_ag[205]</th>
  <th align=\"center\">$lang_ag[227]</th>
  <th align=\"center\">$lang_ag[2079]</th>
  <th align=\"center\">$lang_ag[191]</th>
  <th align=\"center\">$lang_ag[2080]</th>
  <th align=\"center\">$lang_ag[197]</th>
</tr>
      </thead>
      <tbody>
    ";
    $data_table = "";

    $sum1 = 0;
    $sum2 = 0;
    $sum3 = 0;
    $sum4 = 0;
    while ($rs = sql_fetch_as($re)) {

      $b_total  = $rs['b_total'];
      $b_dis    = floatval($rs['b_total'])-floatval($rs['b_pay']);
      $b_bonus  = $rs['b_bonus'];
      $b_rs     =  floatval($rs['b_bonus'])-floatval($rs['b_pay']);

      $sum1 +=  $b_total;
      $sum2 +=  $b_dis;
      $sum3 +=  $b_bonus;
      $sum4 +=  $b_rs;

      $data_table .= "
      <tr align=\"center\" class=\"tr_lot\">
          <td>".$rs["play_id"]."</td>
          <td>".$rs["play_datenow"]."</td>
          <td>".$lot_type["th"][$rs['lot_zone']][$rs['lot_type']]." </td>
          <td>".$rs["play_number"]."</td>
          <td align=\"right\"><span> "._cbn($b_total)." </span></td>
          <td align=\"right\"><span> "._cbn($b_dis)." </span></td>
          <td align=\"right\"><span class=\"cb\">"._cbn($b_bonus)." </span></td>
          <td align=\"right\"><span class=\"cr\">"._cbn($b_rs)."</span></td>
      </tr>";
    }

    $l = 0;
    while ($rs = sql_fetch_as($re2)) {

      $b_total  = $rs['b_total'];
      $b_dis    = floatval($rs['b_total'])-floatval($rs['b_pay']);
      $b_bonus  = $rs['b_bonus'];
      $b_rs     =  floatval($rs['b_bonus'])-floatval($rs['b_pay']);

      $sum1 +=  $b_total;
      $sum2 +=  $b_dis;
      $sum3 +=  $b_bonus;
      $sum4 +=  $b_rs;

      $data_table .= "
      <tr align=\"center\" class=\"tr_lot\">
          <td>".$rs["play_id"]."</td>
          <td>".$rs["play_datenow"]."</td>
          <td>".$lot_type["th"][$rs['lot_zone']][$rs['lot_type']]." </td>
          <td>".$rs["play_number"]."</td>
          <td align=\"right\"><span> "._cbn($b_total)." </span></td>
          <td align=\"right\"><span> "._cbn($b_dis)." </span></td>
          <td align=\"right\"><span class=\"cb\">"._cbn($b_bonus)." </span></td>
          <td align=\"right\"><span class=\"cr\">"._cbn($b_rs)."</span></td>
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
                          <td colspan=\"4\" align=\"center\"><strong>{$lang_ag[197]}</strong></td>
                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum1,2)."</font></strong></td>
                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum2,2)."</font></strong></td>
                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum3,2)."</font></strong></td>
                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum4,2)."</font></strong></td>
                      </tr>
                  </tfoot>";

    $full= $template.$data_table."</tbody>";







 ?>