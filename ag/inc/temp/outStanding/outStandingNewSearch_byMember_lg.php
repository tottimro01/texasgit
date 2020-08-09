<?php 

 $_lv= $_POST["level"];
 $q =  $_POST['q'];
 $gametype =  $_POST['gametype'];
 $rowPerPage =  $_POST['rowPerPage'];
 $page =  $_POST['page'];
 $_id = sql_escape_str($_POST["_id"]);


$sql= "select m_id , m_agent_id , m_user , m_name ,m_level from bom_tb_member where m_agent_id like '%".$_SESSION['r_agent_id']."%' and m_level = '".$_lv."' and m_id='".$_id."'";
$re_member=sql_array($sql);


$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"".$re_member["m_level"]."\"  onclick=\"loadData('".$_POST["gametype"]."','".$re_member["m_id"]."','".$re_member["m_level"]."','M');\"><strong>".$re_member["m_user"]."</strong></span>";
$option = array(
  "headMemberList" =>  $headMemberList,
  "level" => $re_member["m_level"],
  "suser" => "",
  "usertype" =>  "M",
  "gametype" =>  $gametype,
  "_lv" =>  $_lv,
  "_id" =>  $_id,
);


// $pagi_data["chknum"]["sql_m"] = $sql;
$rowPerPage = intval($_POST["rowPerPage"]);
$page       = intval($_POST["page"]);
$start      = ($page-1)*$rowPerPage;

$num_row = 50;

$pagi_data["numrow"] =  $num_row;
$pagi_data["rowPerPage"] =  $rowPerPage;
$pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
$pagi_data["active_page"] = $page;
$pagi_data["start_page"]  = $start; 



$e = _bdate();
$d = _bdate();

$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 


$zone = "and lot_zone = 1 ";
// $date = "and  STR_TO_DATE(b_date,'%d-%m-%Y') between '$edate' and '$ddate'";

$sql = "SELECT * FROM `bom_tb_lotto_bill_play_live` where m_id = $_id $zone  and b_accept=1 order by bill_id DESC";
$re = sql_query($sql);


$list = "<tr>
        <td colspan=\"10\" class=\"tdNoHover\">
                  <div class=\"tabbable\">
                  <ul class=\"nav nav-tabs\" id=\"myTab\"> 
                    <li class=\"active\">
                          <a data-toggle=\"tab\" href=\"#\">
                              <i class=\"green ace-icon fa fa-futbol-o bigger-120\"></i>
                              ".$lang_g["bet_type"]["lg"]."   <span id=\"sum_panal\" class=\"badge badge-danger\">0.00</span>
                          </a>
                      </li>
                  </ul>
                  <div class=\"tab-content\">
                    <div id=\"Soccer\" class=\"tab-pane fade in active \">
                          <div class=\"table-responsive\">
                              <table id=\"tbSoccer\" class=\"table table-striped table-bordered table-hover\">
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
                                  <tbody>";

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
                        
                              $list .= "
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
    
                          $list  .=  "</tbody>
                                  <tfoot>
                                     <tr>
                                         <td colspan=\"4\" align=\"center\"><strong>{$lang_ag[197]}</strong></td>
                                         <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum1,2)."</font></strong></td>
                                         <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum2,2)."</font></strong></td>
                                         <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum3,2)."</font></strong></td>
                                         <td align=\"right\"><strong><font id=\"totalSoccerStake\">"._cbn($sum4,2)."</font></strong></td>
                                     </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </td>
      </tr>";

$option["sum"] = $sum1;

      $data = array(
        "status"  =>  true,
        "list"  =>  $list,
        "option" => $option,
        "footer" => $footer,
        "pagi_data" => $pagi_data,
      ); 

 ?>     