<?

$rs_main = sql_array_sp("select * from bom_tb_ball_list_score where b_id = '".$rs_bill_play['b_id']."'"); 
if($rs_main['b_id']==""){
$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$rs_bill_play['b_id']."'"); 
	}

if($rs_bill_play['b_time_play']!=""){ 
	$live="Live @ ".$rs_bill_play['b_score_live']."  <img src='/assets/img/time.png'/>$rs_bill_play[b_time_play] ";
}else{
	$live="Live @ 0-0";
}

if($_SESSION['AGlang']!="th"){
        $rs_main["b_name_1_th"] = $rs_main["b_name_1_en"];
        $rs_main["b_name_2_th"] = $rs_main["b_name_2_en"];
        $rs_main["b_zone_th"] = $rs_main["b_zone_en"];
      }


 $leage= ($rs_main["b_zone_th"]!="" ? $rs_main["b_zone_th"] : $rs_main["b_zone_en"]);
 $team_1= ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
 $team_2= ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);


 if( ($rs_bill_play['b_big']==1 and $rs_bill_play['play_type']==1) or  ($rs_bill_play['b_big']==1 and $rs_bill_play['play_type']==11)  ){
			$w1="<u><font color=\"red\"><strong>";
			$w2="</strong></font></u>";
			$del='-';
			}elseif( ($rs_bill_play['b_big']==2 and $rs_bill_play['play_type']==2) or  ($rs_bill_play['b_big']==2 and $rs_bill_play['play_type']==12)   ){
			$w1="<u><font color=\"red\"><strong>";
			$w2="</strong></font></u>";
			$del='-';
			}else{
			$w1="<font color=\"blue\"><strong>";
			$w2="</strong></font>";
			$del='';
				}	
			if($rs_bill_play['play_type']==2 or $rs_bill_play['play_type']==12){$tn="$w1".$team_2."$w2 <br><strong>".$del.$rs_bill_play['play_bet']."</strong>";}
			else{$tn="$w1".$team_1."$w2 <br><strong>".$del.$rs_bill_play['play_bet']."</strong>";} 
			//echo $tn;




$data_table .= "
          <span class='text-primary'>".$sport_man[$rs_bill_play['play_type']]." </span>
          ".$tn."
          <span class='text-primary'>".$live."</span><br>
          <font color=\"".($rs_bill_play['b_big']==1 ? "red" : "")."\">".$team_1."</font> -vs-
		  <font color=\"".($rs_bill_play['b_big']==2 ? "red" : "")."\">".$team_2."</font><br>
          <span class='text-danger'>".$leage." </span><br>
     <strong>IP:</strong> <span>".$rs_bill['b_ip']." </span><br>
		 <strong> Kick : </strong> <span>".date("Y-m-d , H:i",$rs_main['b_date_play'])." </span> <strong>1H : </strong> <span>".$rs_main['b_score_half']." </span> , <strong>FT:</strong> <span>".$rs_main['b_score_full']." </span> <br>
        ";

?>