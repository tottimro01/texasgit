<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');
	
	
	
$_POST[l_user]=trim(strtolower($_POST[l_user]));
$_POST[l_pass]=trim($_POST[l_pass]);

$l_user5=trim(($_POST[l_user]));
$l_pass5=trim($_POST[l_pass]);


$strUsername = strtolower(trim($_POST["l_user"]));
	$strPassword = md5(trim($_POST["l_pass"]));
	
	$strUsername5 = (trim($_POST["l_user"]));
	$strPassword5 = (trim($_POST["l_pass"]));

#$_POST[l_user]=221;
#$_POST[l_pass]=221;


        //$sql="select * from bom_tb_member where (m_user='$_POST[l_user]' and m_pass='$_POST[l_pass]') or (md5(m_user)='$l_user5' and md5(m_pass)='$l_pass5')";
		//$re=sql_array($sql);


		$sql="select * from bom_tb_member where (md5(m_user)='$strUsername5' and md5(m_pass)='$strPassword5') or (m_user='$strUsername' and m_pass='$strPassword') or (m_phone='$strUsername' and m_phone!='' and m_pass='$strPassword')";
		$re=sql_array($sql);


if($re[m_id]!=""){
	
if($re[m_active]!=1){
		$arr["status"] = "0";
		$arr["msg"] = "E2-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";
			
		echo json_encode($arr);
		exit();
		
}else{
	
##################################



@session_start();
$_SESSION[mid]=$re[m_id];
$_SESSION[crid]=$re[r_id];
$_SESSION[muser]=$re[m_name];

		
		
	/*	
$url_file=$server_js."txt/json/agent.json";	
$d_js=file_get_contents2($url_file);
$jag = json_decode($d_js, true);
$exr=@explode("*",$re[r_agent_id]);
$stop=1;
for($xx=1; $xx < $re[m_level]; $xx++){
$ax=$jag[$exr[$xx]][r_active];
if($ax==0){
$stop=0;
	}
	}
*/
/*$exr=@explode("*",$re[r_agent_id]);
############1#############
$url_file=$server_js."txt/json/agent/".$exr[1].".json";	
$d_js = file_get_contents2($url_file);
$jag1 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[2].".json";	
$d_js = file_get_contents2($url_file);
$jag2 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[3].".json";	
$d_js = file_get_contents2($url_file);
$jag3 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[4].".json";	
$d_js = file_get_contents2($url_file);
$jag4 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[5].".json";	
$d_js = file_get_contents2($url_file);
$jag5 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[6].".json";	
$d_js = file_get_contents2($url_file);
$jag6 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[7].".json";	
$d_js = file_get_contents2($url_file);
$jag7 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[8].".json";	
$d_js = file_get_contents2($url_file);
$jag8 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[9].".json";	
$d_js = file_get_contents2($url_file);
$jag9 = json_decode($d_js, true);
############1#############	



if($exr[1]>0){
$ax[1]=$jag1[r_active];
}
if($exr[2]>0){
$ax[2]=$jag2[r_active];
}
if($exr[3]>0){
	//print_r($jag3);
$ax[3]=$jag3[r_active];
}
if($exr[4]>0){
$ax[4]=$jag4[r_active];
}
if($exr[5]>0){
$ax[5]=$jag5[r_active];
}
if($exr[6]>0){
$ax[6]=$jag6[r_active];
}
if($exr[7]>0){
$ax[7]=$jag7[r_active];
}
if($exr[8]>0){
$ax[8]=$jag8[r_active];
}
if($exr[9]>0){
$ax[9]=$jag9[r_active];
}
//print_r($ax);
*/
$stop=1;
/*for($xx=1; $xx < $re[m_level]; $xx++){
	//echo $xx."###".$ax[$xx]." <br>";
if($ax[$xx]==0){
$stop=0;
	}
	}*/
	
		
	if($stop==0){

		$arr["status"] = "0";
		$arr["msg"] = "E28-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";
			
		echo json_encode($arr);
		exit();
		}
		$arr["status"] = "1";
		$arr["mid"] = $re["m_id"];
		$arr["crid"] = $re["r_id"];
		$arr["muser"] = $re["m_user"];
		$arr["mname"] = $re["m_name"];
		$arr["mcount"] = $re["m_count"];
		#$arr["rob"] = 1;
		$arr["mdate"] = _bdate();
		#$arr["msg"] = "ยินดีต้อนรับ";
		$arr["refresh_live"] =10;
		$arr["refresh"] =30;
		
		

		
        $token = md5(uniqid(rand(),1));
        $arr["Token"] =$token;


$fo="../../../txt/login_ios/".$objResult["m_id"].".php";
@unlink($fo);
$fp = @fopen($fo, 'w');
@fwrite($fp, '<? $m_token="'.$token.'"; ?>');
@fclose($fp);
	

        $sql="update bom_tb_member set m_login=now() where m_id='$_SESSION[mid]'";
		sql_query($sql);
		
$sql="insert into bom_tb_login_mem  (h_date	,h_ip	,h_data,	m_id,	r_id	,r_agent_id) values(now(),'"._bIP()."','$_SERVER[HTTP_USER_AGENT]','$re[m_id]','$re[r_id]','$re[r_agent_id]')";
sql_query($sql);

#$_SESSION[mrob]=1;		
#$_SESSION[mstep]=1;
$arr["mstep"] = 1;



$arr["barcode"] = "1";
$exmax=@explode(',',$re["m_max"]);
$arr["yodmax"] = "$exmax[1]";
$arr["yodmax1"] = "$exmax[0]";
$exmin=@explode(',',$re["m_min"]);
$arr["yodmin"] = "$exmin[1]";
$arr["yodmin1"] = "$exmin[0]";
$arr["stepmaxmin"] = "".str_replace(',','-',$re["m_step2"])."";


	echo json_encode($arr);
   exit();
	
##################################
	}



}else{
	//$alert="E101 ชื่อเข้าใช้งานหรือรหัสผ่านผิด";
	$arr["status"] = "0";
	//$arr["MemberID"] = "0";
	$arr["msg"] = "E101 ชื่อเข้าใช้งานหรือรหัสผ่านผิด";
	//$arr["log"] = $sql;
		
	echo json_encode($arr);
	exit();
}
	


?>