<?php 

$muser = $_GET["muser"];
$mlevel = $_GET["mlevel"];

$e = $_GET["begin"];
$d = $_GET["end"];


$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 


// $date = "and  b_date BETWEEN '$e' and '$d'";
$date = "and  STR_TO_DATE(b_date,'%d-%m-%Y') between '$edate' and '$ddate'";



$sql = "SELECT m_id FROM `bom_tb_member`  where m_user = '$muser' and m_level =  '$mlevel' ";
$rs = sql_array($sql);
$m_id = $rs["m_id"];



$sql = "SELECT * FROM `bom_tb_games_bill_play` where m_id = $m_id  and b_accept=1 $date order by bet_id DESC";
$re = sql_query($sql);



 $template = "
      <thead>
        <tr>
            <th align=\"center\">$lang_ag[2078] </th>
            <th align=\"center\">$lang_ag[1401]-$lang_ag[239]</th>
            <th align=\"center\">Bet ID </th>
            <th align=\"center\"> $lang_ag[2146]  </th>
            <th align=\"center\"> $lang_ag[477];  </th>
            <th align=\"center\"> $lang_ag[257]</th>
            <th align=\"center\"> $lang_ag[2079]</th>
            <th align=\"center\"> $lang_ag[184]</th>
        </tr>
      </thead>
      <tbody>
    ";
    $data_table = "";

    $l=0;

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


      $data_table .= "
      <tr align=\"center\" class=\"tr_lot\">
           <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
            <td>".$rs['play_id']."</td>
            <td>".$rs["play_datenow"]."</td>
            <td>".$rs["bet_id"]."</td>
            <td>".$img_win."</td>
            <td>".$lang_g['game_zone'][$rs["game_zone"]]."</td>
            <td>".$img_play."</td>
            <td>"._cbn($b_total)."</td>
            <td>".$games_type[$rs['play_status']]."</td>
       </tr>";
       $l++;
    }


    if($l == 0)
    {
      $data_table .= "
      <tr align=\"center\" class=\"tr_lot\">
          <td colspan='100%'>".$lang_ag[1]."</td>
      </tr>";
    }


    // for($i=1; $i<=8; $i++){
    //   $data_table .= "
    //   <tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
    //         <td>BAC-164</td>
    //         <td>27/09/2019 10:14:04</td>
    //         <td>1</td>
    //         <td>บาคาร่า</td>
    //         <td>12345</td>
    //         <td>1</td>
    //         <td class=\"banker bet\">เจ้ามือ</td>
    //         <td>50</td>
    //         <td>50.00</td>
    //                       <td class=\"\"></td>
    //         <td class=\"\">?</td>
    //    </tr>";
    // }


     $data_table .="<tfoot>
                      <tr>
                        <td align=\"center\"><strong><?=$lang_ag[174];?></strong></td>
                          <td colspan=\"4\" align=\"center\"></td>
                          <td align=\"center\"></td>
                          <td align=\"center\"><strong><font id=\"totalSoccerStake\">"._cbn($sum1,2)."</font></strong></td>
                          <td align=\"center\"></td>
                         
                      </tr>
                  </tfoot>";

    $full= $template.$data_table."</tbody>";







 ?>