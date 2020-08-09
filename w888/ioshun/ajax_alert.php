<?
	include "../inc/conn.php";
	include "../inc/function.php";
	include "function_alert.php";
	
$rob=$_POST["rob"];
if($_POST["stype"]==1){
$sql="select * from  bom_tb_lotto_hun_ok  where  o_active_".$rob."='1' and o_number!=''  order by ok_id desc limit 1 ";
$re=sql_array($sql);
$exn=explode(',',$re[o_number]);


$num1=$exn[0];
$num2=$exn[1];
$num31=$exn[2];
$num32=$exn[3];
$num33=$exn[4];
$num34=$exn[5];

$txt="ผลหวยหุ้น $re[ok_date] รอบ".$lot_rob[$rob]." ออกแล้ว";
	}elseif($_POST["stype"]==2){
$txt="เลขเต็ม";
	}elseif($_POST["stype"]==3){
		
$txt=trim($_POST["smsg"]);		

	}
	
	
$_POST["smsg"]=trim($txt);		


if($_POST["send_alert"]!=""){
	$arr_ios = array();
	$arr_andriod = array();
	$gcmRegIds = array();
	
	
	
	$sql=sql_query("select * from bom_tb_member where m_active = 1 and (m_uid_hun_ios!=''  ) group by m_uid_hun_ios");
	while($rs=sql_fetch($sql)){
		$arr_ios[] = $rs["m_uid_hun_ios"];
	}
	##########################IOS
	noti($arr_ios, $_POST["smsg"] , 1 , $_POST["stype"]);

		
		
	$sql=sql_query("select * from bom_tb_member where m_active = 1 and (m_uid_hun_android!='' ) group by m_uid_hun_android");
	while($rs=sql_fetch($sql)){
		array_push($gcmRegIds, $rs["m_uid_hun_android"]);
	}
		#########################Android
		sm($gcmRegIds , $_POST["smsg"] , 1 , $_POST["stype"]);

}
?>