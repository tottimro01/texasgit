<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");
$bid = $_GET["bid"];
$mid = $_GET["mid"];
$sql="select * from bom_tb_football_bill where bill_id='$bid' and m_id='$mid'";
$ree=sql_array($sql);
$arr = array();
$i = 0;
$ball_tt= array(1 =>"ได้เต็ม","ได้ครึ่ง","คืนทุน", "เสียเต็ม", "เสียครึ่ง", "ยกเลิก", "รอผล"); 
$ball_tc= array(1 =>"cg","cg","cbu", "cr", "cr", "cr", "cb"); 

$sql="select *,a.b_big as ab_big from bom_tb_football_bill_play a left join bom_tb_ball_list b on a.b_id=b.b_id and a.b_rob=b.b_rob   and a.b_add=b.b_add where a.bill_id='$ree[bill_id]' and a.m_id='$mid' group by play_id order by play_id asc";

  $re=sql_query($sql);
 $x=1;
 while($rs=sql_fetch($re)){
	 
	 $k3=_type_ball($rs[play_type],$rs[play_bet],$rs[b_score_full],$rs[b_half_score_half]);
	 
			$w1='';
			$w2="0";
			$w3="0";

		    if($rs[ab_big]==1 and $rs[play_type]==1){
			$w1='ต่อ ';
			$w2="1";
			}elseif($rs[ab_big]==2 and $rs[play_type]==2){
			$w1='ต่อ ';
			$w2="1";
			}else{
			$w1='รอง ';
			$w2="0";
				}	
			if($rs[play_type]==1){$tn="$w1$rs[b_name_1]";}
			elseif($rs[play_type]==2){$tn="$w1$rs[b_name_2]";} 
			elseif($rs[play_type]==3){$tn="สกอร์สูงกว่า - $rs[b_name_1]";} 
			elseif($rs[play_type]==4){$tn="สกอร์ต่ำกว่า  - $rs[b_name_1]";} 
	 
	 if($rs[play_pay]>=0.000){$w3="0";}else{$w3="1";}
	 
	$arr[$i]["No"] = $x;
	$arr[$i]["TvT"] = $rs[b_name_1]." -vs- ".$rs[b_name_2];
	$arr[$i]["Code"] =  $rs[play_code];
	$arr[$i]["Select"] = $tn;
	$arr[$i]["Selects"] = $w2;
	$arr[$i]["Price"] = _cg($rs[play_bet]);
	$arr[$i]["Odd"] = "@".number_format($rs[play_pay],2);
	$arr[$i]["Odds"] = $w3;
	$arr[$i]["Play"] = "เตะ[ ".date("H:i",$rs[b_date_play])." ]";
	$arr[$i]["Score"] = "ผล[ ".$k3[3]." ]";
	$arr[$i]["Status"] = $ball_tt[$rs[play_status]];
	$arr[$i]["Statuss"] = $ball_tc[$rs[play_status]];
	$i++;
	 $x++;
}

echo json_encode($arr);
?>