<?php
if($re_m['r_id']==408 or $re_m['r_id']==409 or $re_m['r_id']==409 or $re_m['r_id']==409 or $re_m['r_id']==410 or $re_m['r_id']==411 or $re_m['r_id']==412 or $re_m['r_id']==413 or $re_m['r_id']==414 or $re_m['r_id']==415 or $re_m['r_id']==416 or $re_m['r_id']==417 or $re_m['r_id']==418 or $re_m['r_id']==419 or $re_m['r_id']==420){
	
$appid      = "atmbetpayment";
$secretkey      = "a04950d48b8cc8c31347347d9eec5e60";
$API_URL				= "https://atm.payduty.net/v1/payout/request";

#$timestamp = time();
$NowTime 	    		= date('Y-m-d H:i:s',$time_stam);

$arr_bank8=array(1=>"KBANK",2=>"SCB",3=>"BBL",4=>"KTB",5=>"TMB",6=>"BAY");

$m_b_bank 	       	=  $arr_bank8[$re_m['m_b_bank']]; 	// ช่ือธนาคารของผูร้ับเงนิ Kbank , SCB
$account_name 	       		= $re_m['m_user']; 		// ชื่อผู้รับเงิน
$username 	       		= $re_m['m_user']; 		// ชื่อผู้รับเงิน
$account_no 	       		= $re_m['m_b_code']; 		// เลขบัญชีผู้รับเงิน
$amount 	       	= $_POST['tcount']; 		// ยอด

/*
######################
$bank8 	       	=  "KBANK"; 	// ช่ือธนาคารของผูร้ับเงนิ Kbank , SCB
$account_name 	       		= "อัครเดช กันหาสี"; 		// ชื่อผู้รับเงิน
$username 	       		= "jtt555m02"; 		// ชื่อผู้รับเงิน
$account_no 	       		= "0503704005"; 		// เลขบัญชีผู้รับเงิน
$amount 	       	= 1.35; 		// ยอด
*/
#$signcode 	       	= md5($timestamp.$bank.$account_no.$amount ); 	// Ref
$signcode = strtoupper(md5($appid.$time_stam.$secretkey));
	
$dataValues = array(
			'bank' => $m_b_bank,
			'account_name' => $account_name,
			'account_no' => $account_no,
			'username' => $username,
			'amount' => $amount,
			'timestamp' => $time_stam,
			'appid' => $appid,
			'signcode' => $signcode
		);

		$curl = curl_init();
	
		curl_setopt($curl, CURLOPT_URL, $API_URL);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($dataValues));
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	  echo $result = curl_exec($curl);
      curl_close($curl);
	  
$data8 = json_decode($result);
$request_code=($data8->request_code);
$status8=($data8->status);

if($status8==true){
	
	/*
$from=$re_m['m_count']+$amount;
$log_sum=$re_m['m_count'];
$out=-($amount);

      $sql="select * from bom_tb_agent where r_id='$r_id'";
      $rex=sql_array($sql);
      $r_agent_id=$rex["r_agent_id"];
      ######################LOG ใหม่
      $sql="INSERT IGNORE INTO bom_tb_all_payment (
      bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
      bap_before, bap_out ,bap_after,bap_comment,
      bap_code,bap_by_type,bap_by_id) values(
      now(),'$ip', '8', '$m_id','$r_id','$m_agent_id','$r_agent_id',
      '$from' ,'$out','$log_sum','สมาชิก ถอนอัตโนมัติ x".substr($rem['m_b_code'] , -4,4)."',
      'AO2',3,'99999') ";
      sql_query($sql);  
      ######################LOG ใหม่ 
	*/  
	/*  
$pass_check=$_POST['tcode'];
$sql="select * from bom_tb_member  where  m_user ='$username' ";
$rem8=sql_array($sql);  

#r_id=408 or r_id=409 or r_id=409 or r_id=409 or r_id=410 or r_id=411 or r_id=412 or r_id=413 or r_id=414 or r_id=415 or r_id=416 or r_id=417 or r_id=418 or r_id=419 or r_id=420

$m_id=$rem8['m_id'];
$r_id=$rem8['r_id'];
$r_agent_id=$rem8['m_agent_id'];
$tbank=$rem8['m_b_bank'];
$txt="PASS:".$rem8['m_b_pass']."=".$pass_check."@".$rem8['m_b_code']."@".$rem8['m_b_name']."";


$sql="INSERT IGNORE INTO bom_tb_trans
  (t_bank, t_note, t_date_bet , t_date_accept ,t_date,t_count,t_type , t_status, t_active, t_noti ,m_id,r_id, t_ip,r_agent_id , t_ref )  values
   ('$tbank', '$txt', '$NowTime' , now() , '$NowTime' , '$amount'  , 2,3,0 ,1 , '$m_id' , '$r_id', '' ,'$r_agent_id' ,'$request_code')";
 sql_query($sql);
*/
}

}
?>