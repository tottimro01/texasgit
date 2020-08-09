<?php 

 $_lv= $_POST["level"];
 $q =  $_POST['q'];
 $gametype =  $_POST['gametype'];
 $rowPerPage =  $_POST['rowPerPage'];
 $page =  $_POST['page'];
 $_id = $_POST['_id'];


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
// $rowPerPage = intval($_POST["rowPerPage"]);
// $page       = intval($_POST["page"]);
// $start      = ($page-1)*$rowPerPage;

// $num_row = 50;

// $pagi_data["numrow"] =  $num_row;
// $pagi_data["rowPerPage"] =  $rowPerPage;
// $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
// $pagi_data["active_page"] = $page;
// $pagi_data["start_page"]  = $start; 



$sql = "SELECT * FROM `bom_tb_casino_bill_play_live` where m_id = $_id  and b_accept=1 $date order by bet_id DESC";
$re = sql_query($sql);

$list = "<tr>
        <td colspan=\"10\" class=\"tdNoHover\">
                  <div class=\"tabbable\">
                  <ul class=\"nav nav-tabs\" id=\"myTab\"> 
                    <li class=\"active\">
                          <a data-toggle=\"tab\" href=\"#\">
                              <i class=\"green ace-icon fa fa-futbol-o bigger-120\"></i>
                              ".$lang_g["bet_type"]["cn"]."  <span id=\"sum_panal\" class=\"badge badge-danger\">0.00</span>
                          </a>
                      </li>
                  </ul>
                  <div class=\"tab-content\">
                    <div id=\"Soccer\" class=\"tab-pane fade in active \">
                          <div class=\"table-responsive\">
                              <table id=\"tbSoccer\" class=\"table table-striped table-bordered table-hover\">
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
                                  <tbody>";

    $sum_total = 0;
    $sum_bonus = 0;
    $l = 0;
    while ($rs = sql_fetch_as($re)) {

      $sum_total = $sum_total+$rs["b_total"];
      $sum_bonus = $sum_bonus+$bo["count"];

      // $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
      $list .= "
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


            $list .=" </tbody>
                                  <tfoot>
                                      <tr>
                                        <td align=\"center\"><strong><?=$lang_ag[174];?></strong></td>
                                          <td colspan=\"6\" align=\"center\"></td>
                                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">".number_format($sum_total)."</font></strong></td>
                                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">".number_format($sum_total,2)."</font></strong></td>
                                          <td align=\"right\"><strong><font id=\"totalSoccerStake\">".number_format($sum_bonus)."</font></strong></td>
                                          <td align=\"center\"></td>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </td>
      </tr>";

$option["sum"] = $sum_total;

      $data = array(
        "status"  =>  true,
        "list"  =>  $list,
        "option" => $option,
        "footer" => $footer,
        "pagi_data" => $pagi_data,
      ); 

 ?>     