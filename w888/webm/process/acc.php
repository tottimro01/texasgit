<?php

	session_start();

	if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
		exit();
	}

    $sql="select m_count , m_bet_date from bom_tb_member where m_id='".$_SESSION['m_id']."'";
	$re_m=sql_array($sql);
	
	if($re_m['m_count']<=0){$re_m['m_count']=0;}
	$_SESSION['m_count'] = $re_m['m_count'];
	
	$sql="select sum(b_sum) as btotal from bom_tb_football_bill_live where m_id='".$_SESSION['m_id']."'  and b_status=5 and b_accept=1  ";
	$reb1=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7 and b_accept=1  ";
	$reb2=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_games_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7";
	$reb3=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_casino_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7";
	#$reb4=sql_array($sql);
	$mnot=$reb1['btotal']+$reb2['btotal']+$reb3['btotal']+$reb4['btotal'];
	$_SESSION['mnot']=$mnot;

	$cc = number_format($_SESSION['m_count_de'],2);
	$cre = number_format($re_m['m_count'],2);
	$wincre = number_format(($re_m['m_count']-$_SESSION['m_count_de'])+$mnot,2);
	$incre = number_format(-($_SESSION['mnot']),2);

	$arr = array(
	"UserName" => "<span>".$_SESSION['m_user']."</span>",
	"Credit" => "<span>".$cre."</span>",
	"Currency" => "<span>".$_SESSION['m_currency']."</span>",
	"WinCredit" => "<span>".$wincre."</span>",
	"InCredit" => "<span>".$incre."</span>",
	"ReCredit" => "<span>".$cc."</span>",
	);
	$data = array($arr);	
// $data = 
	// [
	//     {
	//         "UserName":"ufa16y10001": null,
	//         "Credit":"<span class='Positive'>0.00</span>": null,
	//         "Currency":"THB": null,
	//         "MinBet":"<span class='Positive'>10</span> / <span class='Positive'>50": null,
	//         "000</span>": null,
	//         "TotalGivenCredit":"<span class='Positive'>101": null,
	//         "TotalBalance":"<span class='Negative'>-101": null,
	//         "000.00</span>": null,
	//         "Balance":"<span class='Negative'>-101": null,
	//         "TotalOutstanding":"<span class='Positive'>0</span> (0 bets)": null
	//     }
	// ];
	$data = json_encode($data);
	echo json_encode($data);
?>