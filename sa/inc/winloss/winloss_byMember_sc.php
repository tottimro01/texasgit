
<style type="text/css">
    .text-middle {
        vertical-align: middle !important;
    }
</style>
<br><br>
<table class="table table-striped table-bordered table-hover" id="table_data">
    <thead>
        <tr>
            <th class="text-strong text-center" rowspan="2">
                ลำดับ
            </th>
            <th class="text-strong text-center" rowspan="2">
                ข้อมูล
            </th>
            <th class="text-strong text-center" rowspan="2">
                รายการ
            </th>
            <th class="text-strong text-center" rowspan="2">
                ราคาน้ำ
            </th>
            <th class="text-strong text-center" rowspan="2">
                ยอดเล่น
            </th>
            <th class="text-strong text-center" rowspan="2">
                สถานะ
            </th>
            <? foreach ($arr_winloss_user as $key => $value) { ?>
            <th class="text-strong text-center">
                <?=$value[user]?>
            </th>
            <? } ?>
            <th class="text-strong text-center" rowspan="2">
                Company
            </th>
        </tr>
        <tr>
            <? foreach ($arr_winloss_user as $key => $value) { ?>
            <th class="text-strong text-center">
                แพ้/ชนะ
                <br>
                    ค่าคอม
            </th>
            <? } ?>
        </tr>
    </thead>
    <tbody>
        <?
        $no         = 1;
$sum        = 0;
$sql_bill   = sql_query("select * from bom_tb_football_bill where m_id = '$re_member[m_id]' and b_confirm != 1  and b_zone = 6 and b_numstep = 1 and b_status <> 5   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' order by bill_id desc");


$sum1 = 0;
$sum2 = 0;
$sum_agent = array();

while ($rs_bill = sql_fetch_as($sql_bill)) {

    $rs_bill_play = sql_array("select * from bom_tb_football_bill_play where bill_id = '" . $rs_bill["bill_id"] . "'");

    if ($rs_bill['b_accept'] == 1) {
        if ($rs_bill['b_bonus'] > 0) {
            $mbonus = ($rs_bill['b_bonus'] - $rs_bill['b_sum']);
        } else {
            $mbonus = -($rs_bill['b_sum']);
        }
    } else {
        $mbonus = 0;
    }

    $mcom = $rs_bill['b_pay'];
        ?>
        <tr class="text-right">
            <td class="text-center text-middle">
               <?=$no?>
            </td>
            <td class="text-center">
                <span>
                    <?=$re_member[m_user]?>
                </span>
                <br>
                    <strong>
                        <?=$rs_bill["bill_id"]?>
                    </strong>
                    <br>
                        <span>
                            <?=$sport_type[$rs_bill_play["b_zone"]]?>
                        </span>
                        <br>
                            <span>
                                <?=$rs_bill["b_datenow"]?>
                            </span>
            </td>
            <td>
                <?
                    require "list_bill_play.php"; 
                    $sum1 +=  floatval($rs_bill["b_sum"]);  // ยอดเล่น
                    $sum2 +=  floatval($mbonus);  
                ?>
            </td>
            <td class="text-center text-middle">
                <span class="num">
                    <?=number_format($rs_bill["b_sum_pay"], 2)?>
                </span>
                <br>
                    <span>
                        <?=$rs_bill_play["play_view"]?>
                    </span>
            </td>
            <td class=" text-middle">
                <span class="num">
                    <?=number_format($rs_bill["b_total"], 2)?>
                </span>
                <br>
                    <span class="num no-skin lossColor">
                        <?=number_format($rs_bill["b_pay"], 2)?>
                    </span>
            </td>
            <td class="text-center text-middle">
                <span class="text-primary">
                       <?=$ball_bill[$rs_bill['b_status']]?>
                </span>
            </td>
            <td class=" text-middle">
                <span class="num">
                    <?=_cbn($mbonus, 2)?>
                </span>
                <br>
                    <span class="num no-skin lossColor">
                        <?=number_format($mcom, 2)?>
                    </span>
            </td>
            <? 
            $count_agent = 0;
            for ($i = 1; $i < (count($arr_winloss_user)); $i++) {
                $count_agent++;
                $ag_id = $arr_winloss_user[$i]["id"]; 
                $sum_agent[$i][] = 0.00;
            ?>
            <td class=" text-middle">
                <span class="num">
                    0.00
                </span>
                <br>
                    <span class="num no-skin lossColor">
                        0.00
                    </span>
            </td>
            <? } ?>
            <td class=" text-middle">
                <span class="num" style="color: rgb(204, 0, 0);">
                    0
                </span>
            </td>
        </tr>
    <? $no++; } ?>
    </tbody>

    <tfoot>
           <tr>
                <td colspan="4" align="center"><strong>Total</strong></td>
                <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum1,2);?></font></strong></td>
                <td align="right"> </td>
                <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($sum2,2);?></font></strong></td>            
                <?php 

                    for($i=1;$i<=$count_agent;$i++){
                          $_sum_array = array_sum($sum_agent[$i]);
                          ?>
                            <td align="right"><strong><font id="totalSoccerStake"><?=_cbn($_sum_array,2);?></font></strong></td>
                          <?
                        }

                 ?>
                        
                
                <td align="right"><strong><font id="totalSoccerStake"><?=_cbn(0,2);?> </font></strong></td>
           </tr>
    </tfoot>

</table>
