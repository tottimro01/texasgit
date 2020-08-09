<?php 

 $_lv= $_GET["level"];
 $q =  $_GET['q'];
 $gametype =  $_GET['b'];
 $_id = sql_escape_str($_GET["id"]);

$sql = "SELECT * FROM `bom_tb_games_bill_play_live` where m_id = $_id  and b_accept=1 order by bet_id DESC";
$re = sql_query($sql);

?>

<table id="table_data" class="table table-striped table-bordered table-hover">
    <thead>
        
        <tr>
            <th class="aign_c">เลขบิล</th>
            <th class="aign_c">วันที่-เวลา</th>
            <th class="aign_c">Bet ID </th>
            <th class="aign_c">ผลรางวัล  </th>
            <th class="aign_c">เกมส์</th>
            <th class="aign_c">เลือก</th>
            <th class="aign_c">เดิมพัน</th>
            <th class="aign_c">สถานะ</th>
        </tr>
    </thead>
    <tbody>

    <?php 

      while ($rs = sql_fetch_as($re)) {
          $b_total  = $rs['b_total'];
      $sum1 +=  $b_total;
      $win=explode(',',$rs['bet_win']);

      $img_win = "";
      $img_play = "";
      if($rs["game_zone"] ==  1)
      {
        if($win[1]!=""){
            $img_win = '<img src="/assests/img/2hit/30/'.$win[1].'.png" height="30">';
        }else{
            $img_win  = $lang_ag[2147];
        }

        $img_play = '<img src="assests/img/2hit/30/'.$rs["play_bet"].'.png" height="30">';

      }else if($rs["game_zone"] ==  2)
      {
        if($win[1]!="" and $win[2]!=""){
            $img_win = '
            <img src="assests/img/bacarat/35/'.$win[1].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
                <b>-VS-</b>
            <img src="assests/img/bacarat/35/'.$win[2].'.jpg"  style="border: 1px solid #999; vertical-align: middle;"  /> 
            ';
        }else{
            $img_win  = $lang_ag[2147];
        }

        $img_play = '<img src="assests/img/dragon/22/'.$rs["play_bet"].'.png?v=1" height="22">';
      }else if($rs["game_zone"] ==  3)
      {
          if($win[1]!="" and $win[2]!="" and $win[3]!="" and $win[4]!=""){

               $img_win = '
                    <strong>P</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>B</strong> <br>
<img src="assests/img/bacarat/35/'.$win[1].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  <img src="assests/img/bacarat/35/'.$win[2].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
   <b>-VS-</b> 
  <img src="assests/img/bacarat/35/'.$win[3].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  <img src="assests/img/bacarat/35/'.$win[4].'.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
               ';

          }else{
            $img_win  = $lang_ag[2147];
          }

          $img_play =  ' <img src="assests/img/bacarat/b22/b'.$rs['play_bet'].'.png" height="22">';


      }else if($rs["game_zone"] ==  4)
      {
          $ex=explode("," , $rs["play_bet"]);
          if($win[1]!="" and $win[2]!="" and $win[3]!=""){
            $img_win = '<img src="assests/img/hilo/25/hilo'.$win[1].'.png" height="22"><img src="assests/img/hilo/25/hilo'.$win[2].'.png" height="22"><img src="assests/img/hilo/25/hilo'.$win[3].'.png" height="22">';
          }

          $img_play = '';
          foreach ($ex as &$value) {
             $img_play .=  ' <img src="assests/img/hilo/25/hilo'.$value.'.png" height="22">';
          }

          
      }elseif($rs['game_zone']==5){

          $ex=explode("," , $rs["play_bet"]);
          if($win[1]!="" and $win[2]!="" and $win[3]!=""){
            $img_win = '<img src="assests/img/fish/25/'.$win[1].'.png" height="22"><img src="assests/img/fish/25/'.$win[2].'.png" height="22"><img src="assests/img/fish/25/'.$win[3].'.png" height="22">';
          }

          $img_play = '';
          foreach ($ex as &$value) {
             $img_play .=  ' <img src="assests/img/fish/25/'.$value.'.png" height="22">';
          }
      }


      echo "
      <tr align=\"center\" class=\"tr_game\">
            <td>".$rs['play_id']."</td>
            <td>".$rs["play_datenow"]."</td>
            <td>".$rs["bet_id"]."</td>
            <td>".$img_win."</td>
            <td>".$lang_g['game_zone'][$rs["game_zone"]]."</td>
            <td>".$img_play."</td>
            <td align=\"center\">"._cbn($b_total)."</td>
            <td>".$games_type[$rs['play_status']]."</td>
       </tr>";

      }

     ?>
  </tbody>

    <tfoot>
         <tr>
            <td align="center"><strong>รวม</strong></td>
              <td colspan="4" align="center"></td>
              <td align="center"></td>
              <td align="center"><strong><font id="totalSoccerStake"><?=_cbn($sum1,2);?></font></strong></td>
              <td align="center"></td>
             
          </tr>
    </tfoot>
</table>