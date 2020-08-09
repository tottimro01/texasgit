<?php 


$sql= "select m_id , m_agent_id , m_user , m_name ,m_level from bom_tb_member where  m_user='".$_GET[muser]."'";
$re_member=sql_array($sql);

$ex_ulist = explode("|", $_GET["ulist"]);

$arr_winloss_user = array();
$arr_winloss_user[0]["id"] = $re_member["m_id"];
$arr_winloss_user[0]["user"] = $re_member["m_user"];

$x=1;
$ar_rid = explode("*", $re_member["m_agent_id"]);
for($i=0;$i<(count($ex_ulist)-2);$i++){
  $ex_s = explode("_" , $ex_ulist[$i]);
  $ex_x = explode("^" , $ex_s[1]);

  $arr_winloss_user[$x]["id"] = $ar_rid[$ex_s[0]];
  $arr_winloss_user[$x]["user"] = $ex_x[0];

  $x++;
}


 $template = "
      <thead>
        <tr>
          <th rowspan='2' class='text-strong'> {$lang_ag[238]} </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[403]} </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[177]}
          <th rowspan='2' class='text-strong'> {$lang_ag[2088]} </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[255]} </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[184]} </th>
          ";
          foreach ($arr_winloss_user as $key => $value) {
            $template .= "<th class='text-strong'>".$value[user]."</th>";
          }
       $template .= "    <th rowspan='2' class='text-strong'>Company</th>
        </tr>
        <tr>
        ";
        foreach ($arr_winloss_user as $key => $value) {
          $template .= "<th>{$lang_ag[429]} <br> {$lang_ag[210]} </th>";

        }

        $template .= "</tr>
      </thead>
      <tbody>
    ";
    $data_table = "";
$no = 1;
$sum = 0;
$sql_bill = sql_query("select * from bom_tb_football_bill where m_id = '$re_member[m_id]' and b_accept=1 and b_numstep > 1 and b_status <> 5 and  STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' order by bill_id desc");

$sum1 = 0;
$sum2 = 0;
$sum_agent = array();
while($rs_bill = sql_fetch_as($sql_bill)){



  if($rs_bill['b_accept']==1){
              if($rs_bill['b_bonus']>0){
             $mbonus=$rs_bill['b_bonus']-$rs_bill['b_sum'];
              }else{
            $mbonus=-$rs_bill['b_sum'];    
                }
      }else{
       $mbonus=0;   
      }

$mcom=$rs_bill['b_pay'];

      $data_table .= "
      <tr class='text-right'>
        <td class='text-center text-middle'>{$no}</td>
        <td class='text-center'>
          <span>{$re_member[m_user]}</span><br>
          <strong>".$rs_bill["bill_id"]."</strong><br>
          <span>".$rs_bill["b_datenow"]."</span><br>
        </td><td>";

$sql_bill_play = sql_query("select * from bom_tb_football_bill_play where bill_id = '".$rs_bill["bill_id"]."'");
while($rs_bill_play = sql_fetch_as($sql_bill_play)){

require("list_bill_play.php");
$data_table .= "<button class='btn btn-sm btn-danger' style='padding: 0 2px; border-radius: 4px; margin-top: 4px;' 
          data-toggle='modal' data-target='#modal_livescore' 
          onclick='loadLiveScore({$rs_bill_play['b_id']});'>Live score</button>";
$data_table .= "<hr>";
}

        $sum1 +=  floatval($rs_bill["b_sum"]);  // ยอดเล่น
        $sum2 +=  floatval($mbonus);  

        $data_table .= "</td><td class='text-center'>
          <span class='num'>".number_format($rs_bill["b_sum_pay"] , 2)."</span><br></td>
        <td>
          <span class='num'>".number_format($rs_bill["b_sum"] , 2)."</span><br>
          <span class='num no-skin lossColor'>".number_format($rs_bill["b_pay"] , 2)."</span><br>
        </td>
        <td class='text-center'>
          <span class='text-primary'>"._sc_half( $rs_bill['b_sum'],$rs_bill['b_bonus'],$rs_bill['b_numstep'],$rs_bill['b_half'],$rs_bill['b_status'],$ball_bill)." </span>
        </td>
        <td>
          <span class='num'> "._cbn($mbonus,2)." </span><br>
          <span class='num no-skin lossColor'> ".number_format($mcom,2)." </span><br>
        </td>";

        $count_agent = 0;
        for($i=1;$i<(count($arr_winloss_user));$i++){
          $count_agent++;
          $ag_id = $arr_winloss_user[$i]["id"];

          $sum_agent[$i][] = floatval($mbonus);

          $data_table .= "<td> 
            <span class='num'>  ".number_format($mbonus , 2)."  </span><br>
            <span class='num no-skin lossColor'> 0.00 </span><br>
          </td>";
        }
        $data_table .= "<td> 
          <span class='num' >  ".number_format($mbonus , 2)."  </span>
        </td>
      </tr>";
    $no++;
  }

 $data_table .="<tfoot>
                     <tr>
                          <td colspan=\"4\" align=\"center\"><strong>{$lang_ag[197]}</strong></td>
                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum1,2)."</font></strong></td>
                          <td align=\"right\"> </td>";

                        for($i=1;$i<=$count_agent;$i++){
                          $_sum_array = array_sum($sum_agent[$i]);
                          $data_table .= "<td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($_sum_array,2)."</font></strong></td>";
                        }

          $data_table .= "<td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum2,2)."</font></strong></td>
                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum2,2)."</font></strong></td>
                  </tr>
                </tfoot>";


    $full= $template.$data_table."</tbody>";







 ?>