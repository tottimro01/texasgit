<?php 

 $_lv= $_GET["level"];
 $q =  $_GET['q'];
 $gametype =  $_GET['b'];
 // $page =  $_GET['page'];
 $_id = sql_escape_str($_GET["id"]);


// $sql= "select m_id , m_agent_id , m_user , m_name ,m_level from bom_tb_member where m_agent_id like '%".$_SESSION['r_agent_id']."%' and m_level = '".$_lv."' and m_id='".$_id."'";
// $re_member=sql_array($sql);

// $e = _bdate();
// $d = _bdate();

// $sdd=@explode("-",$e); 
// $edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

// $edd=@explode("-",$d); 
// $ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

$zone = "and lot_zone = 1 ";
$sql = "SELECT * FROM `bom_tb_lotto_bill_play_live` where m_id = $_id $zone  and b_accept=1 order by bill_id DESC";
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
           $b_dis    = floatval($rs['b_total'])-floatval($rs['b_pay']);
           $b_bonus  = $rs['b_bonus'];
           $b_rs     =  floatval($rs['b_bonus'])-floatval($rs['b_pay']);

           $sum1 +=  $b_total;
           $sum2 +=  $b_dis;
           $sum3 +=  $b_bonus;
           $sum4 +=  $b_rs;

           echo  "
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
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4" align=\"center\"><strong> รวม </strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum1,2);?></font></strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum2,2);?></font></strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum3,2);?></font></strong></td>
            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum4,2);?></font></strong></td>
        </tr>
    </tfoot>
</table>