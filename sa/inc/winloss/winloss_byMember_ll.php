<?php 

$e = $_GET["d"];
$d = $_GET["e"];
$m_id = $_GET["id"];

$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

$zone = "and lot_zone = 3 and  lot_type = 31 ";
$date = "and  STR_TO_DATE(b_date,'%d-%m-%Y') between '$edate' and '$ddate'";

$sql = "SELECT * FROM `bom_tb_lotto_bill_play` where m_id = $m_id $zone $date and b_accept=1 order by bill_id DESC";
$re = sql_query($sql);



 ?>
<table id="table_data" class="table table-striped table-bordered table-hover">
    <thead>
        
        <tr>
            <th class="aign_c" align="center">เลขบิล</th>
            <th class="aign_c" align="center">วันที่-เวลา</th>
            <th class="aign_c" align="center">ประเภท</th>
            <th class="aign_c" align="center">เลข</th>
            <th class="aign_r" align="center">เดิมพัน</th>
            <th class="aign_r" align="center">ส่วนลด</th>
            <th class="aign_r" align="center">ถูกรางวัล</th>
            <th class="aign_r" align="center">รวม</th>
        </tr>
    </thead>
    <tbody>
        <?php   

           $sum1 = 0;
           $sum2 = 0;
           $sum3 = 0;
           $sum4 = 0;
           while ($rs = sql_fetch_as($re)) {

             $b_total  = $rs['b_total'];
             $b_dis    = (floatval($rs['b_total'])-floatval($rs['b_pay']));
             $b_bonus  = $rs['b_bonus'];
             $b_rs     =  (floatval($rs['b_bonus'])-floatval($rs['b_pay']));

             $sum1 +=  $b_total;
             $sum2 +=  $b_dis;
             $sum3 +=  $b_bonus;
             $sum4 +=  $b_rs;

            echo "
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


         ?>
       <!--  <tr align="center" class="tr_lot">
            <td>49</td>
            <td>26/09/2019 17:08:17</td>
            <td>7</td>
            <td>3โต๊ด</td>
            <td>200</td>
            <td align="right"><span class="cr">-50.00</span></td>
            <td align="right"><span class="cb">17.50</span></td>
            <td align="right"><span class="cb">0</span></td>
            <td align="right"><span class="cr">-32.50</span></td>
         </tr> -->

    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" align="center"><strong>Total</strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum1,2);?></font></strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum2,2);?></font></strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum3,2);?></font></strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum4,2);?></font></strong></td>
        </tr>
    </tfoot>
</table>