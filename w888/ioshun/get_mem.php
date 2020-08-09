<?
$sql="select *   from bom_tb_member where m_id='$mid'";
$re=sql_array($sql);
$_SESSION['m_id'] = $re[m_id];
$_SESSION['m_user'] = $re[m_user];
$_SESSION['m_name'] = $re[m_name];

/*
	###################ห้ามเข้าซ้อน
$url_file="../json/online/m/".$re[m_id].".json";
$log_js=file_get_contents2($url_file);
$log_bet = json_decode2($log_js, true);
$c_log=$log_bet[0][o_time];
if($c_log>0){
	$arr["Status"] = "2";
	$arr["Msg"] = "มีผู้ใช้งานอยู่ กรุณารอ 2 นาที";
	$arr["Licen"] = "SC";
	$arr["LastLot"] = $re_ok[ok_date];
	$arr["CloseBig"] = $re_ok["o_limit_time"];
	$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	echo json_encode($arr);
	exit();
	}
	###################ห้ามเข้าซ้อน	
*/

if($re[m_active]==0){
	$arr["Status"] = "4";
	$arr["Msg"] = "E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";
	$arr["Licen"] = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	echo json_encode($arr);
	exit();
}


if(substr($bf , 0 , 1)=="a"){
	$uuid = $_POST["uuid"];
	$uuid_mem = $re["m_uuid_android"];	
}else if(substr($bf , 0 , 1)=="i"){
	$uuid = base64_decode($_POST["uuid"]);
	$uuid_mem = md5($re["m_uuid_ios"]);	
}else if(substr($bf , 0 , 1)=="w"){
	$uuid = "";
	$uuid_mem = "";	
}else{
	$arr["Status"] = "2";
	$arr["Msg"] = "เกิดข้อผิดพลาดที่ไม่รู้จัก";
	$arr["Licen"] = "SC";
	$arr["LastLot"] = $re_ok[ok_date];
	$arr["CloseBig"] = $re_ok["o_limit_time"];
	$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	echo json_encode($arr);
	exit();
}

$exopen = @explode(",",$re[m_open]);
$_SESSION['open_sc'] = $exopen[1];#Soccer
$_SESSION['open_mu'] = $exopen[2];#Muay
$_SESSION['open_st'] = $exopen[3];#Step
$_SESSION['open_sp'] = $exopen[4];#Sport
$_SESSION['open_lo'] = $exopen[5];#lotto
$_SESSION['open_ga'] = $exopen[6];#Games
$_SESSION['open_ca'] = $exopen[7];#Casino
$_SESSION['open_tf'] = $exopen[8];#Tranfer


if($re[m_count]<=0){$re[m_count]=0;}
$_SESSION['m_count'] = $re[m_count];
$_SESSION['m_count_de'] = $re[m_count_de];
$_SESSION['m_currency'] = $re[m_currency];
###############BANK
$_SESSION['m_b_pass'] = $re[m_b_pass];
$_SESSION['m_b_bank'] = $re[m_b_bank];
$_SESSION['m_b_code'] = $re[m_b_code];
$_SESSION['m_b_name'] = $re[m_b_name];

$_SESSION['bonus_m_id'] = $re[bonus_m_id];

###################BALL######################
$_SESSION['m_max'] = $re[m_max];
$_SESSION['m_min'] = $re[m_min];
$_SESSION['m_max_match'] = $re[m_max_match];
$_SESSION['m_com'] = $re[m_com];
$_SESSION['m_share'] = $re[m_share];
$_SESSION['m_share_live'] = $re[m_share_live];
$_SESSION['m_step_dis'] = $re[m_step_dis];
$_SESSION['m_step2'] = $re[m_step2];
$_SESSION['m_type'] = $re[m_type];
$_SESSION['m_nam_tor'] = $re[m_nam_tor];
$_SESSION['m_nam_rong'] = $re[m_nam_rong];
$_SESSION['m_nam_tor_live'] = $re[m_nam_tor_live];
$_SESSION['m_nam_rong_live'] = $re[m_nam_rong_live];

######################LOTTO
$_SESSION['m_lotto_max'] = $re[m_lotto_max];
$_SESSION['m_lotto_min'] = $re[m_lotto_min];

$_SESSION['m_lotto_share'] = $re[m_lotto_hun_myshare_agent];
$_SESSION['m_lotto_pay'] = $re[m_lotto_hun_pay_member];
$_SESSION['m_lotto_dis'] = $re[m_lotto_hun_dis_member];

$_SESSION['m_bet_tou'] = $re[m_bet_tou];
$_SESSION['m_del'] = $re[m_del];
$_SESSION['m_print_slip'] = $re[m_print_slip];
$_SESSION['m_lotto_convert'] = $re[m_lotto_convert];
$_SESSION['m_lotto_convert_pay'] = $re[m_lotto_convert_pay];
$_SESSION['m_lotto_hun_pay_member'] = $re[m_lotto_hun_pay_member];


#####################SET
#$_SESSION['lang']=$arr_lang[$re[m_lang]];
$_SESSION['lang']=$_REQUEST['clang'];
$_SESSION['m_price'] = $m_price[$re[m_price]];
$_SESSION['m_row'] = $re[m_row];


$ex_rid=explode('*',$re[r_agent_id]);
$_SESSION[r_agent_id] = $re[r_agent_id];
$_SESSION['crid1'] = $ex_rid[1];
$_SESSION['crid2'] = $ex_rid[2];
$_SESSION['crid3'] = $ex_rid[3];
$_SESSION['crid4'] = $ex_rid[4];
$_SESSION['crid'] = $ex_rid[4];

?>