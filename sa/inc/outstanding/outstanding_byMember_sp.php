

<table class="table table-striped table-bordered table-hover" id="table_data">
    <thead>                               
            <tr>
                <th class="text-strong text-center" > ลำดับ </th>
                <th class="text-strong text-center" > สมาชิก </th>
                <th class="text-strong text-center" > ข้อมูล </th>
                <th class="text-strong text-center" > รายการ </th>
                <th class="text-strong text-center" > ราคาน้ำ </th>
                <th class="text-strong text-center" > ยอดเดิมพัน </th>
                <th class="text-strong text-center" > แพ้/ชนะ  </th>
                <th class="text-strong text-center" > สถานะ </th>
            </tr>
        </thead>
    <tbody>
      <?php 

            $no         = 1;
            $sum        = 0;
            $sql_bill   = sql_query("select * from bom_tb_football_bill_live where m_id = '$re_member[m_id]' and b_confirm != 1  and b_accept=1 and b_zone <> 6 and b_zone <> 1 and b_numstep = 1 and b_status = 5 order by bill_id desc");


            $sum_agent = array();

            while ($rs_bill = sql_fetch_as($sql_bill)) {

                  $rs_bill_play = sql_array("select * from bom_tb_football_bill_play_live where bill_id = '" . $rs_bill["bill_id"] . "'");

                   if($rs['b_accept']==1){
                    $mbonus=-$rs['b_sum'];
                   }else{
                    $mbonus=0;   
                   }

              ?>
                <tr class="text-right">
                    <td class="text-center vaign_m">
                         <?=$no?>
                    </td>
                    <td class="text-center vaign_m">
                         <span>
                            <?=$re_member[m_user]?>
                        </span>
                    </td>
                    <td class="text-center vaign_m">
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
                            $sum2 +=  floatval($mbonus);  
                        ?>
                    </td>
                    <td class="text-center vaign_m">
                            <?=number_format($rs_bill["b_sum_pay"], 2)?>
                    </td>
                    <td class="text-center vaign_m">
                        <span class="num">
                            <?=number_format($rs_bill["b_total"], 2)?>
                        </span>
                    </td>
                   <td class="text-center vaign_m">

                      <?=_cbn($mbonus,2);?>

                    </td>
                     <td class="text-center vaign_m">

                          <span class="cb"><?=$ball_bill[$rs_bill['b_status']];?></span><br>
                          <span class="txtip"><?=$rs_bill["b_ip"];?></span>

                    </td>
                </tr>

              <?
              $no++;
              $sum = $sum+$rs_bill["b_total"];
            }

       ?>

    </tbody>
    <tfoot>
        <tr>
          <td align="center"><strong>ทั้งหมด</strong></td>
            <td colspan="4" align="center"></td>
            <td align="center"><strong><font id="totalSoccerStake"><?=_cbn($sum,2);?> </font></strong></td>
            <td align="center"><strong><font id="totalSoccerStake"><?=_cbn($sum2,2);?> </font></strong></td>
            <td colspan="2"></td>
        </tr>
    </tfoot>
</table>