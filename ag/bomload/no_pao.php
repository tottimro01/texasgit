<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?
require('../inc/conn.php');
require('../inc/function.php');


if(isset($_POST[b_add])){
	
	$_POST[tnumber]=trim($_POST[tnumber]);
	$_POST[tshare]=trim($_POST[tshare]);

if($_POST[ttype]==3){
#3ตัว+6กลับ
$run_up3=array(substr($_POST[tnumber], -3,1), substr($_POST[tnumber], -2,1),  substr($_POST[tnumber], -1,1));
$tod_3=array();
$tod_3[]=$run_up3[0].$run_up3[1].$run_up3[2];
$tod_3[]=$run_up3[0].$run_up3[2].$run_up3[1];
$tod_3[]=$run_up3[1].$run_up3[0].$run_up3[2];
$tod_3[]=$run_up3[1].$run_up3[2].$run_up3[0];
$tod_3[]=$run_up3[2].$run_up3[0].$run_up3[1];
$tod_3[]=$run_up3[2].$run_up3[1].$run_up3[0];
$tod_3 = array_unique( $tod_3 );		

foreach($tod_3 as $num_new){
	echo '<br>'.$sql="update bom_tb_lotto_bill_play_live set b_myshare_3=$_POST[tshare]  where 	r_agent_id like '%*10*%' and lot_type='$_POST[ttype]'  and play_number='$num_new'  and b_myshare_2=0  and b_share_m=0 ";
	sql_query($sql);
	
}
	
	}else{
	echo $sql="update bom_tb_lotto_bill_play_live set b_myshare_3=$_POST[tshare]  where 	r_agent_id like '%*10*%' and lot_type='$_POST[ttype]'  and play_number='$_POST[tnumber]'  and b_myshare_2=0  and b_share_m=0 ";
	sql_query($sql);
	}
}

?>
<form action="" method="post">

 <span style="background:#6C9;">ประเภท : 
       <input name="ttype" type="radio" value="1"  <? if($_POST[ttype]==1){echo'checked="checked"';}?>/>3บน&nbsp;
        <input name="ttype" type="radio" value="3"   <? if($_POST[ttype]==3){echo'checked="checked"';}?> />3โต๊ด&nbsp;
         <input name="ttype" type="radio" value="4"   <? if($_POST[ttype]==4){echo'checked="checked"';}?> />2บน&nbsp;
          <input name="ttype" type="radio" value="5"    <? if($_POST[ttype]==5){echo'checked="checked"';}?>/>2ล่าง&nbsp;
          <input name="ttype" type="radio" value="6"    <? if($_POST[ttype]==6){echo'checked="checked"';}?>/>วิ่งบน&nbsp;
          <input name="ttype" type="radio" value="7"    <? if($_POST[ttype]==7){echo'checked="checked"';}?>/>วิ่งล่าง&nbsp;
       </span>
       
เลข : 
<input name="tnumber" type="text"  id="tnumber" value="<?=$_POST[tnumber];?>"  size="8" maxlength="3"  />
หุ้น : 
<input name="tshare" type="text"  id="tshare" value="<?=$_POST[tshare];?>"  size="8" maxlength="3"  />

<input name="b_add" type="submit" id="b_add" value="บันทึก" />
</form>

