<?
require('../inc/conn.php');
require('../inc/function.php');


if(isset($_POST['b_up'])){
	
	
$_POST["tbid"]=trim($_POST["tbid"]);

$acc=array();
	

$c_date=date("Hi",$time_stam);

$sql="select * from bom_tb_lotto_bill_play_live   where bill_id='".$_POST["tbid"]."'   and r_agent_id like '%*40*%' ";		
$re=sql_query($sql);
while($recan=sql_fetch($re)){
	
$ok_del=0;	
	

$url_file1="../json/lotto/ok/ok_".$recan['lot_zone']."_".$recan['lot_rob'].".json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode($date_js, true);
$re_ok=$date_bet[0];

if($re_ok['o_limit_time']>$time_stam){ 
$ok_del=1;
	}


if($ok_del==1){

$acc[]=1;	
$sql="update bom_tb_lotto_bill_play_live set b_accept=0, play_status=6, can_date=now() , can_by='am_can'  where play_status=7 and play_id='$recan[play_id]'";   
sql_query($sql);	

$sql="update bom_tb_lotto_bill_live set   br_pay_1=br_pay_1-$recan[br_pay_1] ,	br_pay_2=br_pay_2-$recan[br_pay_2] ,	br_pay_3=br_pay_3-$recan[br_pay_3] ,	br_pay_4=br_pay_4-$recan[br_pay_4] ,	
b_total=b_total-$recan[b_total] ,	b_pay=b_pay-$recan[b_pay]  where b_status=5 and bill_id='$recan[bill_id]'";   
sql_query($sql);

$sql="update bom_tb_member set m_count=m_count+$recan[b_pay]  where m_id='$recan[m_id]' ";
sql_query($sql);

$sql="select * from bom_tb_lotto_bill_live  where b_status=5 and bill_id='$recan[bill_id]'";   
$rex=sql_array($sql);
if($rex['b_total']<=0){
$sql="update bom_tb_lotto_bill_live set   b_accept=0,b_status=4 where b_status=5 and bill_id='$recan[bill_id]'";   
sql_query($sql);
	}

$sql="update bom_tb_lotto_lock_1 set   h_sum=h_sum+$recan[b_total]    where  h_num='$recan[play_number]' and  lot_type='$recan[lot_type]' ";   
sql_query($sql);


if($recan['play_id']>0){
	
           $q_num=$recan['play_number'];
		   $type_lot=$recan['lot_type'];
###################################



			$url_file_0="../json/lotto/lock/".$type_lot."_".$q_num."_.json";
			$sumck0=jrlot($url_file_0);
			if($type_lot!=3 and $type_lot!=20  and $type_lot!=24){
			jwlot($url_file_0,($sumck0+$recan['b_total']));	
			}
			###############3โต๊ด
			if($type_lot==3 or $type_lot==20){
$num_up=array(substr($q_num , -3,1), substr($q_num , -2,1),  substr($q_num , -1,1));
sort($num_up);
$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[2];	
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0].$num_up[2];	
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[0].$num_up[1];	

	foreach($arr_xnum as $newnum){
$url_file_00="../json/lotto/lock/".$type_lot."_".$newnum."_.json";
#jwlot($url_file_00,($sumck0+$recan[b_total]));	
	}
	###############3โต๊ด
	###############2โต๊ด
}elseif($type_lot==24){
$num_up=array(substr($q_num , -2,1),  substr($q_num , -1,1));
sort($num_up);
$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0];	

	foreach($arr_xnum as $newnum){
$url_file_00="../json/lotto/lock/".$type_lot."_".$newnum."_.json";
#jwlot($url_file_00,($sumck0+$recan[b_total]));	
	}
}
###############2โต๊ด


}
}
}
if(@count($acc)>0){
echo "<h2>ยกเลิกบิล : ".$_POST["tbid"]." สำเร็จ";
}else{
echo "<h2>ผิดพลาดบิล : ".$_POST["tbid"]." ";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>CAN :: Bill</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
</head>

<body>

<form action="" method="post">
<table width="300" border="0">
  <tr>
    <td width="58">รหัสบิล</td>
    <td width="132">
      <input type="text" name="tbid" id="tbid" value="<?=$_POST["tbid"];?>"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="b_up" id="b_up" value="บันทึก" /></td>
  </tr>
</table>

</form>
</body>

</html>

