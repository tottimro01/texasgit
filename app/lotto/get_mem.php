<?
$sql="select *   from bom_tb_member where m_id='$mid'";
$re=sql_array($sql);
$_SESSION['mid'] = $re[m_id];
$_SESSION['m_user'] = $re[m_user];
$_SESSION['m_name'] = $re[m_name];
$_SESSION['cr_id'] = $re[r_id];
#$_SESSION['m_bet_tou'] = $re[m_bet_tou];

$re0y=array("m_pass"=>"?");
$re1m = @array_merge( $re , $re0y);	
$_SESSION['m1'] = $re1m;

$ex_rid=explode('*',$re['m_agent_id']);

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
	$arr["Status"] = "3";
	$arr["Msg"] = $lang_member[1125]; /*"E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";*/
	$arr["Licen"] = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	echo json_encode($arr);
	exit();
}
$exe1=@explode(",",$re['m_open']);
if(intval($exe1[8])!=1){ 
	$arr["Status"] = "3";
	$arr["Msg"] = $lang_member[1125]; /*"E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";*/
	$arr["Licen"] = "SC";
    $arr["LastLot"]    = $re_ok["ok_date"];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	echo json_encode($arr);
	exit();
}

if($ex_rid[1]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[1]."'";
	$re1=sql_array($sql);
	$re1y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re1x = @array_merge( $re1 , $re1y);
	$_SESSION['crid1'] = $ex_rid[1];
	$_SESSION['r1'] = $re1x;
	$arr_rid[]=$ex_rid[1];
	$arr_data[$ex_rid[1]]=$re1x;
}
if($ex_rid[2]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[2]."'";
	$re2=sql_array($sql);
	$re2y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re2x = @array_merge( $re2 , $re2y);	
	$_SESSION['crid2'] = $ex_rid[2];
	$_SESSION['r2'] = $re2x;
	$arr_rid[]=$ex_rid[2];
	$arr_data[$ex_rid[2]]=$re2x;
}
if($ex_rid[3]>0){
    $sql="select * from bom_tb_agent where r_id='".$ex_rid[3]."'";
	$re3=sql_array($sql);
	$re3y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re3x = @array_merge( $re3 , $re3y);	
	$_SESSION['crid3'] = $ex_rid[3];
	$_SESSION['r3'] = $re3x;
	$arr_rid[]=$ex_rid[3];
	$arr_data[$ex_rid[3]]=$re3x;
}
if($ex_rid[4]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[4]."'";
	$re4=sql_array($sql);
	$re4y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re4x = @array_merge( $re4 , $re4y);	
	$_SESSION['crid4'] = $ex_rid[4];
	$_SESSION['r4'] = $re4x;
	$arr_rid[]=$ex_rid[4];
	$arr_data[$ex_rid[4]]=$re4x;
}
if($ex_rid[5]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[5]."'";
	$re5=sql_array($sql);
	$re5y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re5x = @array_merge( $re5 , $re5y);	
	$_SESSION['crid5'] = $ex_rid[5];
	$_SESSION['r5'] = $re5x;
	$arr_rid[]=$ex_rid[5];
	$arr_data[$ex_rid[5]]=$re5x;
}	
if($ex_rid[6]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[6]."'";
	$re6=sql_array($sql);
	$re6y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re6x = @array_merge( $re6 , $re6y);	
	$_SESSION['crid6'] = $ex_rid[6];
	$_SESSION['r6'] = $re6x;
	$arr_rid[]=$ex_rid[6];
	$arr_data[$ex_rid[6]]=$re6x;
}
if($ex_rid[7]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[7]."'";
	$re7=sql_array($sql);
	$re7y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re7x = @array_merge( $re7 , $re7y);	
	$_SESSION['crid7'] = $ex_rid[7];
	$_SESSION['r7'] = $re7x;
	$arr_rid[]=$ex_rid[7];
	$arr_data[$ex_rid[7]]=$re7x;
}
if($ex_rid[8]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[8]."'";
	$re8=sql_array($sql);
	$re8y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re8x = @array_merge( $re8 , $re8y);	
	$_SESSION['crid8'] = $ex_rid[8];
	$_SESSION['r8'] = $re8x;
	$arr_rid[]=$ex_rid[8];
	$arr_data[$ex_rid[8]]=$re8x;
}

$_SESSION['arid'] = $arr_rid;
$_SESSION['ardata'] = $arr_data;


foreach($_SESSION['arid'] as $rid){
	######################ระงับ
	if(intval($_SESSION['ardata'][$rid]['r_active'])!=1){ 

		$arr["Status"] = "3";
		$arr["Msg"] = $lang_member[1125]; /*"E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";*/
		$arr["Licen"] = "SC";
	    $arr["LastLot"]    = $re_ok[ok_date];
	    $arr["CloseBig"]   = $re_ok["o_limit_time"];
	    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
		echo json_encode($arr);


		/*$_SESSION['error'][1][]="<b class='cr'>E22-".$lang_member[555]."</b>";
		$arr["txt"] = $_SESSION['error'][1][0]."<br>";
		echo json_encode($arr);*/
		exit();
	}

	$exe2=@explode(",",$_SESSION['ardata'][$rid]['r_open']);
	if(intval($exe2[8])!=1){ 
		$arr["Status"] = "3";
		$arr["Msg"] = $lang_member[1125]; /*"E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";*/
		$arr["Licen"] = "SC";
	    $arr["LastLot"]    = $re_ok[ok_date];
	    $arr["CloseBig"]   = $re_ok["o_limit_time"];
	    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
		echo json_encode($arr);
		exit();
	}

	if($_SESSION['m1']['m_lotto_setbet']==1){
		$rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay1']); 
		$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis1']); 
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
		$rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay2']); 
		$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis2']); 
	}else{
		$rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay3']); 
		$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis3']); 
	}

	$rag[]=$rid; 
	$rmyshare[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_myshare']); 
	$mshare=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_share']); 
	$last_rid=$rid; 
}


if(substr($bf , 0 , 1)=="a"){
	$uuid = $_POST["uuid"];
	$uuid_mem = $re["m_uuid_android"];	
}else if(substr($bf , 0 , 1)=="i"){
	$uuid = $_POST["uuid"];
	$uuid_mem = $re["m_uuid_ios"];	
}else{
	if(substr($bf , 0 , 1)!="m"){
		$arr["Status"] = "2";
		$arr["Msg"] = $lang_member[1126];/*"เกิดข้อผิดพลาดที่ไม่รู้จัก";*/
		$arr["Licen"] = "SC";
		$arr["LastLot"] = $re_ok[ok_date];
		$arr["CloseBig"] = $re_ok["o_limit_time"];
		$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
		echo json_encode($arr);
		exit();
	}
}

$mnummax=@explode(',',$_SESSION['m1']['m_lotto_nummax']); 
$mmax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
$mmin=@explode(',',$_SESSION['m1']['m_lotto_min']); 

if($_SESSION['m1']['m_lotto_setbet']==1){
	$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 
	$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis1']); 
}elseif($_SESSION['m1']['m_lotto_setbet']==2){
	$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 
	$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis2']); 
}else{
	$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 
	$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis3']); 
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
$_SESSION['mcount'] = $re[m_count];
$_SESSION['mcredit'] = $re[m_count_de];
$_SESSION['m_currency'] = $re[m_currency];

######################LOTTO
$_SESSION['m_lotto_max'] = $re[m_lotto_max];
$_SESSION['m_lotto_min'] = $re[m_lotto_min];

$_SESSION['m_lotto_share'] = $re[m_lotto_myshare_agent];
$_SESSION['m_lotto_pay'] = $re[m_lotto_pay_member];
$_SESSION['m_lotto_dis'] = $re[m_lotto_dis_member];


$_SESSION['m_bet_tou'] = $re[m_bet_tou];
$_SESSION['m_del'] = $re[m_del];
$_SESSION['m_print_slip'] = $re[m_print_slip];
$_SESSION['m_lotto_convert'] = $re[m_lotto_convert];
$_SESSION['m_lotto_convert_pay'] = $re[m_lotto_convert_pay];
$_SESSION['m_lotto_hun_pay_member'] = $re[m_lotto_hun_pay_member];

/*
$sql="select lot_over from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$_SESSION['lot_over'] = $rec[lot_over];
*/
#####################SET
#$_SESSION['lang']=$arr_lang[$re[m_lang]];
$_SESSION['m_price'] = $m_price[$re[m_price]];
$_SESSION['m_row'] = $re[m_row];


$ex_rid=explode('*',$re[r_agent_id]);
$_SESSION[r_agent_id] = $re[r_agent_id];
$_SESSION['crid1'] = $ex_rid[1];
$_SESSION['crid2'] = $ex_rid[2];
$_SESSION['crid3'] = $ex_rid[3];
$_SESSION['crid4'] = $ex_rid[4];
$_SESSION['crid'] = $ex_rid[4];


$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
#$reb1=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill where m_id='$_SESSION[mid]'  and b_status=5";
#$reb2=sql_array($sql);
$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal];
?>