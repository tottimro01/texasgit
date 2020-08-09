<?php 

$e = $_GET["d"];
$d = $_GET["e"];
$m_id = $_GET["id"];

$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

$date = "and play_datenow BETWEEN '$edate' and '$ddate'";

$sql = "SELECT * FROM `bom_tb_casino_bill_play` where m_id = $m_id  and b_accept=1 $date order by bet_id DESC";
$re = sql_query($sql);


 ?>

<table id="table_data" class="table table-striped table-bordered table-hover">
    <thead>
        
        <tr>
            <th class="aign_c">หมายเลข</th>
            <th class="aign_c">เวลา</th>
            <th class="aign_c">โต๊ะ </th>
            <th class="aign_c">ชื่อเกมส์  </th>
            <th class="aign_c">เจ้ามือ</th>
            <th class="aign_c">รอบ</th>
            <th class="aign_c">เดิมพัน</th>
            <th class="aign_c">จำนวน</th>
            <th class="aign_c">ยอดเดิมพันรวม ที่ถูกต้อง</th>
            <th class="aign_c">ชนะ/แพ้</th>
            <th class="aign_c">ผลลัพธ์</th>
        </tr>
    </thead>
    
    <?php 

    $sum_total = 0;
    $sum_bonus = 0;
    $l = 0;
    while ($rs = sql_fetch_as($re)) {

      $sum_total = $sum_total+($rs["b_total"]);
      $sum_bonus = $sum_bonus+($bo["count"]);

      // $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
      echo "
      <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
            <td align=\"center\">".$ca_id[$rs["casino_table"]]."-".$rs["play_id"]."</td>
            <td align=\"center\">".date("d/m/Y H:i:s",$rs["play_timestam"])."</td>
            <td align=\"center\">".$rs["casino_table"]."</td>
            <td align=\"center\">".$ca_type[$rs["casino_table"]]."</td>
            <td align=\"center\">".$rs["bet_id"]."</td>
            <td align=\"center\">".$rs["bet_round"]."</td>
            <td align=\"center\" class=\"".$ca_color[$rs["casino_table"]][$rs["play_bet"]]." bet\">".$ca_txt[$rs["casino_table"]][$rs["play_bet"]]."</td>
            <td align=\"right\">".number_format($rs["b_total"])."</td>
            <td align=\"right\">".number_format($rs["b_total"],2)."</td>
            <td align=\"right\" class=\"\"></td>
            <td align=\"center\" class=\"\">?</td>
       </tr>";
       $l++;


    }

     ?>

    <!-- <tbody>
        <tr id="transTemplate" style="" class="tb_ball">
        <td>BAC-164</td>
        <td>27/09/2019 10:14:04</td>
        <td>1</td>
        <td>บาคาร่า</td>
        <td>12345</td>
        <td>1</td>
        <td class="banker bet">เจ้ามือ</td>
        <td>50</td>
        <td>50.00</td>
            <td class=""></td>
        <td class="">?</td>
      </tr>

    </tbody> -->
  <tfoot>
      <tr>
        <td align="center"><strong><?=$lang_ag[174];?></strong></td>
          <td colspan="6" align="center"></td>
          <td align="right"><strong><font id="totalSoccerStake"><?=number_format($sum_total);?></font></strong></td>
          <td align="right"><strong><font id="totalSoccerStake"><?=number_format($sum_total,2);?></font></strong></td>
          <td align="right"><strong><font id="totalSoccerStake"><?=number_format($sum_bonus);?></font></strong></td>
          <td align="center"></td>
      </tr>
  </tfoot>
</table>