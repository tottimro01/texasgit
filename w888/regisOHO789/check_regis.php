<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

//require("../lang/member_lang.php");


$tuser = trim($_REQUEST['tuser']);    
$tpass = trim($_REQUEST['tpass']);    
$tpassc = trim($_REQUEST['tpassc']);    
$tphone = trim($_REQUEST['tphone']);    
$tbank = trim($_REQUEST['tbank']);    
$tbcode = trim($_REQUEST['tbcode']);    
$tbname = trim($_REQUEST['tbname']);    
$tbpass = trim($_REQUEST['tbpass']);    
$rid = trim($_REQUEST['rid']);    
$fby = trim($_REQUEST['fby']);    

if($tpass!=$tpassc){
		$alert='<span class="cr">E1-ยืนยันรหัสผ่านไม่ตรงกัน</span>';
	}else{
	
	
	 $sql="select * from  bom_tb_member where     (m_phone='$tphone' or m_b_code='$tbcode' or m_user = '$tuser')";
$rex=sql_array($sql);

if($rex[m_id]!=""){
	$alert='<span class="cr">มีผู้ใช้งานนี้แล้วในระบบ</span>';
}else{
	
	//require('../lotto/arr_pay.php');
	
	
	$sql="select * from  bom_tb_agent where     r_id='$rid'";
	$rer=sql_array($sql);
	
	$r_agent_id=$rer[r_agent_id].$rer[r_id].'*';
	
	$rs_mem_use = sql_array("select * from  bom_tb_member where r_agent_id = '$r_agent_id' order by m_id asc limit 1");
	
	
	
	
	
	
	
	

	$smsto=$tphone;
	$text="www.oho789.com User:$tphone     Pass:$tpass";
  $pass_no_md5 = $tpass;
	$tpass = md5($tpass);



$exopen=explode(",",$rer[r_open]);
$r_step_dis=explode(",",$rer[r_step_dis]);
$r_step2=explode(",",$rer[r_step2]);

$r_min=explode(",",$rer[r_min]);
$r_max=explode(",",$rer[r_max]);
$r_max_match=explode(",",$rer[r_max_match]);

$ball_share=explode(",",$rer[r_share]);
$ball_share_live=explode(",",$rer[r_share_live]);
$ball_force=explode(",",$rer[r_force]);
$ball_com=explode(",",$rer[r_com]);
$r_nam_tor=explode(",",$rer[r_nam_tor]);
$r_nam_rong=explode(",",$rer[r_nam_rong]);
$r_nam_tor_live=explode(",",$rer[r_nam_tor_live]);
$r_nam_rong_live=explode(",",$rer[r_nam_rong_live]);


$lot_pay=explode(",",$rer[r_lotto_pay_agent]);
$lot_dis=explode(",",$rer[r_lotto_dis_agent]);
$lot_share=explode(",",$rer[r_lotto_share]);
$r_lotto_force=explode(",",$rer[r_lotto_force_agent]);

$lot_min=explode(",",$rer[r_lotto_min]);
$lot_max=explode(",",$rer[r_lotto_max]);
$lot_nummax=explode(",",$rer[r_lotto_nummax]);

$lot_hun_pay=explode(",",$rer[r_lotto_hun_pay_agent]);
$lot_hun_dis=explode(",",$rer[r_lotto_hun_dis_agent]);
$lot_hun_share=explode(",",$rer[r_lotto_hun_share]);
$r_lotto_hun_force=explode(",",$rer[r_lotto_hun_force_agent]);

$lot_hun_min=explode(",",$rer[r_lotto_hun_min]);
$lot_hun_max=explode(",",$rer[r_lotto_hun_max]);
$lot_hun_nummax=explode(",",$rer[r_lotto_hun_nummax]);

$abig=explode("*",$r_agent_id);


################Config Agent
$lot_pay_big1=explode(",",$rer[r_lotto_pay_agent]);
$lot_hun_pay_big1=explode(",",$rer[r_lotto_hun_pay_agent]);
	
	if($rer["r_id"]!=""){

$_POST[tcount]=0;

		
		$rs_bank = sql_array("select * from bom_tb_bank where bank_name = '$tbank' and r_id = '$rer[r_id]' order by bank_id desc limit 1");
		if($rs_bank[bank_id]==""){
			$rs_bank = sql_array("select * from bom_tb_bank where bank_name = '1' and r_id = '$rer[r_id]' order by bank_id desc limit 1");
			if($rs_bank[bank_id]==""){
				$rs_bank = sql_array("select * from bom_tb_bank where r_id = '$rer[r_id]' order by bank_id desc limit 1");
			}
		}

/*$pay_txt = "pay,";
$dis_txt_super = "dis,";
$dis_txt_senior = "dis,";
$dis_txt_master = "dis,";
$dis_txt_agent = "dis,";
$dis_txt_member = "dis,";
foreach($lot_type["th"] as $key => $value){
	if($arr_pay_select[$rer["r_id"]]["C"][$key]!=""){
		$pay_val = $arr_pay_select[$rer["r_id"]]["C"][$key];
	}else{
		$pay_val = 0;
	}
	$pay_txt .= $pay_val.",";
	
	$dis_txt_super .= ($arr_dis_super_select[$rer["r_id"]]["C"][$key]!="") ? $arr_dis_super_select[$rer["r_id"]]["C"][$key]."," : "0,";
	$dis_txt_senior .= ($arr_dis_senior_select[$rer["r_id"]]["C"][$key]!="") ? $arr_dis_senior_select[$rer["r_id"]]["C"][$key]."," : "0,";
	$dis_txt_master .= ($arr_dis_master_select[$rer["r_id"]]["C"][$key]!="") ? $arr_dis_master_select[$rer["r_id"]]["C"][$key]."," : "0,";
	$dis_txt_agent .= ($arr_dis_agent_select[$rer["r_id"]]["C"][$key]!="") ? $arr_dis_agent_select[$rer["r_id"]]["C"][$key]."," : "0,";
	$dis_txt_member .= ($arr_dis_member_select[$rer["r_id"]]["C"][$key]!="") ? $arr_dis_member_select[$rer["r_id"]]["C"][$key]."," : "0,";
}*/
		
		
$sql="INSERT IGNORE INTO bom_tb_member (m_open,	m_name,	m_phone,	m_user,	m_pass,	m_regis, m_count	,m_count_de ,m_b_pass	,m_b_bank,	m_b_code	,m_b_name 
,m_lotto_nummax,m_lotto_max,	m_lotto_min 
, m_lotto_force_super , m_lotto_myshare_super 
, m_lotto_force_senior , m_lotto_myshare_senior 
, m_lotto_force_master , m_lotto_myshare_master 
 , m_lotto_force_agent , m_lotto_myshare_agent 
 
 , m_lotto_pay_super , m_lotto_pay_senior , m_lotto_pay_master , m_lotto_pay_agent , m_lotto_pay_member 
 , m_lotto_dis_super , m_lotto_dis_senior , m_lotto_dis_master , m_lotto_dis_agent , m_lotto_dis_member 
 
 ,m_lotto_hun_nummax,m_lotto_hun_max,	m_lotto_hun_min 
, m_lotto_hun_force_super , m_lotto_hun_myshare_super 
, m_lotto_hun_force_senior , m_lotto_hun_myshare_senior 
, m_lotto_hun_force_master , m_lotto_hun_myshare_master 
 , m_lotto_hun_force_agent , m_lotto_hun_myshare_agent 
 
 , m_lotto_hun_pay_super , m_lotto_hun_pay_senior , m_lotto_hun_pay_master , m_lotto_hun_pay_agent , m_lotto_hun_pay_member 
 , m_lotto_hun_dis_super , m_lotto_hun_dis_senior , m_lotto_hun_dis_master , m_lotto_hun_dis_agent , m_lotto_hun_dis_member 
 
 ,m_games_dis_super,m_games_dis_senior,m_games_dis_master,m_games_dis_agent,m_games_dis_member
 ,m_myshare_games,m_force_games,m_dis_games,m_max_games,m_min_games
 
 ,r_agent_id, bonus_m_id ,m_ref,bank_id )
 values
  ('open,0,0,0,0,1,1,0,0,1','$tphone','$tphone','$tuser','$tpass',now(),'0','0','$tbpass','$tbank','$tbcode','$tbname' 
 ,'$rs_mem_use[m_lotto_nummax]','$rs_mem_use[m_lotto_max]','$rs_mem_use[m_lotto_min]' 
,'$rs_mem_use[m_lotto_force_super]' ,'$rs_mem_use[m_lotto_myshare_super]' 
  ,'$rs_mem_use[m_lotto_force_senior]' ,'$rs_mem_use[m_lotto_myshare_senior]'
   ,'$rs_mem_use[m_lotto_force_master]','$rs_mem_use[m_lotto_myshare_master]'
    ,'$rs_mem_use[m_lotto_force_agent]' ,'$rs_mem_use[m_lotto_myshare_agent]'

 ,'$rs_mem_use[m_lotto_pay_super]','$rs_mem_use[m_lotto_pay_senior]' ,'$rs_mem_use[m_lotto_pay_master]' ,'$rs_mem_use[m_lotto_pay_agent]' ,'$rs_mem_use[m_lotto_pay_member]' 
,'$rs_mem_use[m_lotto_dis_super]' ,'$rs_mem_use[m_lotto_dis_senior]' ,'$rs_mem_use[m_lotto_dis_master]' ,'$rs_mem_use[m_lotto_dis_agent]' ,'$rs_mem_use[m_lotto_dis_member]'

 ,'$rs_mem_use[m_lotto_hun_nummax]','$rs_mem_use[m_lotto_hun_max]','$rs_mem_use[m_lotto_hun_min]' 
,'$rs_mem_use[m_lotto_hun_force_super]' ,'$rs_mem_use[m_lotto_hun_myshare_super]' 
  ,'$rs_mem_use[m_lotto_hun_force_senior]' ,'$rs_mem_use[m_lotto_hun_myshare_senior]'
   ,'$rs_mem_use[m_lotto_hun_force_master]','$rs_mem_use[m_lotto_hun_myshare_master]'
    ,'$rs_mem_use[m_lotto_hun_force_agent]' ,'$rs_mem_use[m_lotto_hun_myshare_agent]'


 ,'$rs_mem_use[m_lotto_hun_pay_super]','$rs_mem_use[m_lotto_hun_pay_senior]' ,'$rs_mem_use[m_lotto_hun_pay_master]' ,'$rs_mem_use[m_lotto_hun_pay_agent]' ,'$rs_mem_use[m_lotto_hun_pay_member]' 
,'$rs_mem_use[m_lotto_hun_dis_super]' ,'$rs_mem_use[m_lotto_hun_dis_senior]' ,'$rs_mem_use[m_lotto_hun_dis_master]' ,'$rs_mem_use[m_lotto_hun_dis_agent]' ,'$rs_mem_use[m_lotto_hun_dis_member]'

 ,'$rs_mem_use[m_games_dis_super]','$rs_mem_use[m_games_dis_senior]' ,'$rs_mem_use[m_games_dis_master]' ,'$rs_mem_use[m_games_dis_agent]' ,'$rs_mem_use[m_games_dis_member]' 
,'$rs_mem_use[m_myshare_games]' ,'$rs_mem_use[m_force_games]' ,'$rs_mem_use[m_dis_games]' ,'$rs_mem_use[m_max_games]' ,'$rs_mem_use[m_min_games]'

,'$r_agent_id' ,'$fby' , '$_SESSION[HTTP_REFERER]','$rs_bank[bank_id]' )
";
sql_query($sql);


##################JSON Lotto Config
$sql="select * from  bom_tb_member where   m_user='$tuser' limit 1";
$rem=sql_array($sql);

#######################################################LOG	
     $log_sum=$_POST[tcount];
	 $sql="INSERT IGNORE INTO bom_tb_databet (d_date,	m_id	,	d_in	,d_sum	,d_by ) values(now() ,'$rem[m_id]','$_POST[tcount]','$log_sum', 1)";
     sql_query($sql);
#######################################################LOG		 


$js1=array();
$js1["m_lotto_nummax"]="$rem[m_lotto_nummax]";
$js1["m_lotto_max"]="$rem[m_lotto_max]";
$js1["m_lotto_min"]="$rem[m_lotto_min]";

$js1["m_lotto_hun_nummax"]="$rem[m_lotto_hun_nummax]";
$js1["m_lotto_hun_max"]="$rem[m_lotto_hun_max]";
$js1["m_lotto_hun_min"]="$rem[m_lotto_hun_min]";

###########################หวย
$js1["m_lotto_myshare_super"]="$rem[m_lotto_myshare_super]";
$js1["m_lotto_myshare_senior"]="$rem[m_lotto_myshare_senior]";
$js1["m_lotto_myshare_master"]="$rem[m_lotto_myshare_master]";
$js1["m_lotto_myshare_agent"]="$rem[m_lotto_myshare_agent]";

$js1["m_lotto_force_super"]="$rem[m_lotto_force_super]";
$js1["m_lotto_force_senior"]="$rem[m_lotto_force_senior]";
$js1["m_lotto_force_master"]="$rem[m_lotto_force_master]";
$js1["m_lotto_force_agent"]="$rem[m_lotto_force_agent]";


$js1["m_lotto_pay_super"]="$rem[m_lotto_pay_super]";
$js1["m_lotto_pay_senior"]="$rem[m_lotto_pay_senior]";
$js1["m_lotto_pay_master"]="$rem[m_lotto_pay_master]";
$js1["m_lotto_pay_agent"]="$rem[m_lotto_pay_agent]";
$js1["m_lotto_pay_member"]="$rem[m_lotto_pay_member]";

$js1["m_lotto_dis_super"]="$rem[m_lotto_dis_super]";
$js1["m_lotto_dis_senior"]="$rem[m_lotto_dis_senior]";
$js1["m_lotto_dis_master"]="$rem[m_lotto_dis_master]";
$js1["m_lotto_dis_agent"]="$rem[m_lotto_dis_agent]";
$js1["m_lotto_dis_member"]="$rem[m_lotto_dis_member]";



###########################หุ้น
$js1["m_lotto_hun_myshare_super"]="$rem[m_lotto_hun_myshare_super]";
$js1["m_lotto_hun_myshare_senior"]="$rem[m_lotto_hun_myshare_senior]";
$js1["m_lotto_hun_myshare_master"]="$rem[m_lotto_hun_myshare_master]";
$js1["m_lotto_hun_myshare_agent"]="$rem[m_lotto_hun_myshare_agent]";

$js1["m_lotto_hun_force_super"]="$rem[m_lotto_hun_force_super]";
$js1["m_lotto_hun_force_senior"]="$rem[m_lotto_hun_force_senior]";
$js1["m_lotto_hun_force_master"]="$rem[m_lotto_hun_force_master]";
$js1["m_lotto_hun_force_agent"]="$rem[m_lotto_hun_force_agent]";


$js1["m_lotto_hun_pay_super"]="$rem[m_lotto_hun_pay_super]";
$js1["m_lotto_hun_pay_senior"]="$rem[m_lotto_hun_pay_senior]";
$js1["m_lotto_hun_pay_master"]="$rem[m_lotto_hun_pay_master]";
$js1["m_lotto_hun_pay_agent"]="$rem[m_lotto_hun_pay_agent]";
$js1["m_lotto_hun_pay_member"]="$rem[m_lotto_hun_pay_member]";

$js1["m_lotto_hun_dis_super"]="$rem[m_lotto_hun_dis_super]";
$js1["m_lotto_hun_dis_senior"]="$rem[m_lotto_hun_dis_senior]";
$js1["m_lotto_hun_dis_master"]="$rem[m_lotto_hun_dis_master]";
$js1["m_lotto_hun_dis_agent"]="$rem[m_lotto_hun_dis_agent]";
$js1["m_lotto_hun_dis_member"]="$rem[m_lotto_hun_dis_member]";
		
###########################เกมส์
$js1["m_min"]="$rem[m_min]";
$js1["m_max"]="$rem[m_max]";
$js1["m_max_match"]="$rem[m_max_match]";
		
$js1["m_myshare_super"]="$rem[m_myshare_super]";
$js1["m_myshare_senior"]="$rem[m_myshare_senior]";
$js1["m_myshare_master"]="$rem[m_myshare_master]";
$js1["m_myshare_agent"]="$rem[m_myshare_agent]";

$js1["m_force_super"]="$rem[m_force_super]";
$js1["m_force_senior"]="$rem[m_force_senior]";
$js1["m_force_master"]="$rem[m_force_master]";
$js1["m_force_agent"]="$rem[m_force_agent]";
$js1["m_myshare_games"]="$rem[m_myshare_games]";

$js1["m_force_games"]="$rem[m_force_games]";
$js1["m_dis_games"]="$rem[m_dis_games]";
$js1["m_max_games"]="$rem[m_max_games]";
$js1["m_min_games"]="$rem[m_min_games]";


$js1["m_active_bet"]="$rem[m_active_bet]";
$txt=json_encode($js1);
$url_file="../json/config/member/LottoConfig_".$rem[m_id].".json";	
write($url_file ,$txt,"w+"); 
##################JSON LottoMaxReceive



#####################สร้าง Folder

$url_file="../json/transfer/$rem[m_id]/";
_mkdir($url_file);

$url_file="../json/sport/bet_date/$rem[m_id]/";
_mkdir($url_file);
$url_file="../json/sport/bet_success/$rem[m_id]/";
_mkdir($url_file);
$url_file="../json/sport/bet_wait/$rem[m_id]/";
_mkdir($url_file);
$url_file="../json/sport/max_match/$rem[m_id]/";
_mkdir($url_file);

send_sms($smsto,$text);

$_SESSION[ac_ok]='บันทึกสำเร็จ';
$_SESSION['HTTP_REFERER'] = "";	
		 echo"<script language='JavaScript'>
         top.document.location='http://www.lotzx.com/check_login_cross_789.php?cuser=".$tuser."&cpass=".$pass_no_md5."';
      </script>";
	  
exit();
		
		
	}else{
		
	}
	
	
}
	
}
  
echo "$alert";

class thsms
{
     var $api_url   = 'http://www.thsms.com/api/rest';
     var $username  = null;
     var $password  = null;
 
    public function getCredit()
    {
        $params['method']   = 'credit';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $result = $this->curl( $params);
 
        $xml = @simplexml_load_string( $result);
 
        if (!is_object($xml))
        {
         //   return array( FALSE, 'Respond error');
 
        } else {
 
            if ($xml->credit->status == 'success')
            {
            //   return array( TRUE, $xml->credit->status);
            } else {
              //  return array( FALSE, $xml->credit->message);
            }
        }
    }
 
    public function send( $from='0000', $to=null, $message=null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;
 
        if (is_null( $params['to']) || is_null( $params['message']))
        {
            return FALSE;
        }
 
        $result = $this->curl( $params);
        $xml = @simplexml_load_string( $result);
        if (!is_object($xml))
        {
            //    return array( FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success')
            {
            //    return array( TRUE, $xml->send->uuid);
            } else {
            //    return array( FALSE, $xml->send->message);
            }
        }
    }
     
    private function curl( $params=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);
 
      //  return $response;
    }
}
function send_sms($smsto,$text){
/*	
$sql="select con_sms from pha_tb_config where con_id='1'";
$rec=sql_array($sql);

if($rec[con_sms]>0){	*/
	
	
$sms = new thsms();
 
$sms->username   = 'nasood';
$sms->password   = 'ca9b79';
 
$a = $sms->getCredit();
#var_dump( $a);
 
$u1='SMS'; 
$u2='020000000'; 
$u3='0890000000'; 
 
$b = $sms->send( $u1,$smsto,$text);
#var_dump( $b);


/*
$sql="update  pha_tb_config set con_sms=con_sms-1  where con_id='1'";
sql_query($sql);	
}*/


}

?><br>
  <link rel="stylesheet" href="regis.css">

<!-- <input name="b_login" type="button" value="สมัครสมาชิก" class="bt" id="b_login" onclick="ConfirmRegis();"/> -->
<button name="b_login" id="b_login" class="bt red-bt" onclick="request_user();">สมัครสมาชิก</button>