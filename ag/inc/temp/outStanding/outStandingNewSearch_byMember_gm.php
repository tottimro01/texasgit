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

$sql = "SELECT * FROM `bom_tb_games_bill_play_live` where m_id = $_id  and b_accept=1  order by bet_id DESC";
$re = sql_query($sql);


$list = "<tr>
        <td colspan=\"10\" class=\"tdNoHover\">
                  <div class=\"tabbable\">
                  <ul class=\"nav nav-tabs\" id=\"myTab\"> 
                    <li class=\"active\">
                          <a data-toggle=\"tab\" href=\"#\">
                              <i class=\"green ace-icon fa fa-futbol-o bigger-120\"></i>
                              ".$lang_g["bet_type"]["gm"]."   <span id=\"sum_panal\" class=\"badge badge-danger\">0.00</span>
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
                                           <th align=\"center\">Bet ID </th>
                                           <th align=\"center\">$lang_ag[2146]  </th>
                                           <th align=\"center\">$lang_ag[477]  </th>
                                           <th align=\"center\">$lang_ag[257]</th>
                                           <th align=\"center\">$lang_ag[2079]</th>
                                           <th align=\"center\">$lang_ag[184]</th>
                                      </tr>
                                  </thead>
                                  <tbody>";
      $sum1 = 0;                             
      while ($rs = sql_fetch_as($re)) {

      $b_total  = $rs['b_total'];
      $sum1 +=  $b_total;
      $win=explode(',',$rs['bet_win']);

      $img_win = "";
      $img_play = "";
      if($rs["game_zone"] ==  1)
      {
        if($win[1]!=""){
            $img_win = '<img src="/assets/img/2hit/30/'.$win[1].'.png" height="30">';
        }else{
            $img_win  = $lang_ag[2147];
        }

        $img_play = '<img src="assets/img/2hit/30/'.$rs["play_bet"].'.png" height="30">';

      }else if($rs["game_zone"] ==  2)
      {
        if($win[1]!="" and $win[2]!=""){
            $img_win = '
            <img src="assets/img/bacarat/35/'.$win[1].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
                <b>-VS-</b>
            <img src="assets/img/bacarat/35/'.$win[2].'.jpg"  style="border: 1px solid #999; vertical-align: middle;"  /> 
            ';
        }else{
            $img_win  = $lang_ag[2147];
        }

        $img_play = '<img src="assets/img/dragon/22/'.$rs["play_bet"].'.png?v=1" height="22">';
      }else if($rs["game_zone"] ==  3)
      {
          if($win[1]!="" and $win[2]!="" and $win[3]!="" and $win[4]!=""){

               $img_win = '
                    <strong>P</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>B</strong> <br>
<img src="assets/img/bacarat/35/'.$win[1].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  <img src="assets/img/bacarat/35/'.$win[2].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
   <b>-VS-</b> 
  <img src="assets/img/bacarat/35/'.$win[3].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  <img src="assets/img/bacarat/35/'.$win[4].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
               ';

          }else{
            $img_win  = $lang_ag[2147];
          }

          $img_play =  ' <img src="assets/img/bacarat/b22/b'.$rs['play_bet'].'.png" height="22">';


      }else if($rs["game_zone"] ==  4)
      {
          $ex=explode("," , $rs["play_bet"]);
          if($win[1]!="" and $win[2]!="" and $win[3]!=""){
            $img_win = '<img src="assets/img/hilo/25/hilo'.$win[1].'.png" height="22"><img src="assets/img/hilo/25/hilo'.$win[2].'.png" height="22"><img src="assets/img/hilo/25/hilo'.$win[3].'.png" height="22">';
          }

          $img_play = '';
          foreach ($ex as &$value) {
             $img_play .=  ' <img src="assets/img/hilo/25/hilo'.$value.'.png" height="22">';
          }

          
      }elseif($rs['game_zone']==5){

          $ex=explode("," , $rs["play_bet"]);
          if($win[1]!="" and $win[2]!="" and $win[3]!=""){
            $img_win = '<img src="assets/img/fish/25/'.$win[1].'.png" height="22"><img src="assets/img/fish/25/'.$win[2].'.png" height="22"><img src="assets/img/fish/25/'.$win[3].'.png" height="22">';
          }

          $img_play = '';
          foreach ($ex as &$value) {
             $img_play .=  ' <img src="assets/img/fish/25/'.$value.'.png" height="22">';
          }
      }


      $list .= "
      <tr align=\"center\" class=\"tr_lot\">
           <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
            <td>".$rs['play_id']."</td>
            <td>".$rs["play_datenow"]."</td>
            <td>".$rs["bet_id"]."</td>
            <td>".$img_win."</td>
            <td>".$lang_g['game_zone'][$rs["game_zone"]]." </td>
            <td>".$img_play."</td>
            <td align=\"center\">"._cbn($b_total)."</td>
            <td>".$games_type[$rs['play_status']]."</td>
       </tr>";
  
    }


      
                  $list .= " </tbody>
                                  <tfoot>
                                       <tr>
                                          <td align=\"center\"><strong><?=$lang_ag[174];?></strong></td>
                                            <td colspan=\"4\" align=\"center\"></td>
                                            <td align=\"center\"></td>
                                            <td align=\"center\"><strong><font id=\"totalSoccerStake\">"._cbn($sum1,2)."</font></strong></td>
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

$option["sum"] = $sum1;

      $data = array(
        "status"  =>  true,
        "list"  =>  $list,
        "option" => $option,
        "footer" => $footer,
        "pagi_data" => $pagi_data,
      ); 

 ?>     