<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');
require('../lang/th.php');
require('../lang/function_th.php');



if($_GET[zone]==''){
	$_GET[zone] = "2";
}
if($_GET[rob]==''){
	$_GET[rob] = "1";
}

if($_GET[d]==""){
#################################
  if($_GET[zone] !=''){
    $hzz = 'and lot_zone="'.$_GET[zone].'"';
  }else{
    $hzz ='and lot_zone="2"';
  }
  
  if($_GET[rob] !='') {
    $hrb = 'and lot_rob="'.$_GET[rob].'"';
  }else{
     $hrb = 'and lot_rob="1"';
	# $_GET[rob]=1;
  } 
#################################
	
	
	$sql="select * from bom_tb_lotto_ok where  1 $hzz $hrb  group by ok_date   order by ok_id desc limit 1";
	$red=sql_array($sql);
    $_GET[d]=$red[ok_date];
}


if($_GET[zone]!=""){ $kzone="  and lot_zone='$_GET[zone]' ";}else{ $kzone="  and lot_zone='2' "; }
if($_GET[rob]!=""){ $krob="  and lot_rob='$_GET[rob]' ";}else{ $krob="  and lot_rob='1' "; }


if(isset($_POST[b_add])){
	
	$_POST[tnumber]=trim($_POST[tnumber]);
	$_POST[tsum]=trim($_POST[tsum]);
	
$set=0;

	if(strlen($_POST[tnumber])==3 and $_POST[ttype]==1){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==2){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==3){ $set=1; }
	elseif(strlen($_POST[tnumber])==2 and $_POST[ttype]==4){ $set=1; }
	elseif(strlen($_POST[tnumber])==2 and $_POST[ttype]==5){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==6){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==7){ $set=1; }
    elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==8){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==9){ $set=1; }
    elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==10){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==11){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==12){ $set=1; }
	elseif(strlen($_POST[tnumber])==2 and $_POST[ttype]==13){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==14){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==15){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==16){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==17){ $set=1; }
	elseif(strlen($_POST[tnumber])==2 and $_POST[ttype]==18){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==19){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==20){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==21){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==22){ $set=1; }
	elseif(strlen($_POST[tnumber])==1 and $_POST[ttype]==23){ $set=1; }
	elseif(strlen($_POST[tnumber])==2 and $_POST[ttype]==24){ $set=1; }
	elseif(strlen($_POST[tnumber])==4 and $_POST[ttype]==25){ $set=1; }
	elseif(strlen($_POST[tnumber])==4 and $_POST[ttype]==26){ $set=1; }
	elseif(strlen($_POST[tnumber])==4 and $_POST[ttype]==27){ $set=1; }
	elseif(strlen($_POST[tnumber])==2 and $_POST[ttype]==55){ $set=1; }
	elseif(strlen($_POST[tnumber])==3 and $_POST[ttype]==66){ $set=1; }
	

	
if($set==1){
	
	if($_POST[ttype]!=55 and $_POST[ttype]!=66){
		
	
if($_POST[ttype]==3 or $_POST[ttype]==20 ){
	
$num_up=array(substr($_POST[tnumber], -3,1), substr($_POST[tnumber], -2,1),  substr($_POST[tnumber], -1,1));
sort($num_up);
$_POST[tnumber]=$num_up[0].$num_up[1].$num_up[2];	

$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[2];	
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0].$num_up[2];	
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[0].$num_up[1];	


	
	
	

}elseif($_POST[ttype]==24){
$num_up=array(substr($_POST[tnumber], -2,1),  substr($_POST[tnumber], -1,1));
sort($num_up);
$_POST[tnumber]=$num_up[0].$num_up[1];	
$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0];	

	
}elseif($_POST[ttype]==26){
		
$num_up=array(substr($_POST[tnumber], -4,1),substr($_POST[tnumber], -3,1), substr($_POST[tnumber], -2,1),  substr($_POST[tnumber], -1,1));
sort($num_up);
$_POST[tnumber]=$num_up[0].$num_up[1].$num_up[2].$num_up[3];	

$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[2].$num_up[3];
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[3].$num_up[2];
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[1].$num_up[3];
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[3].$num_up[1];
$arr_xnum[]=$num_up[0].$num_up[3].$num_up[1].$num_up[2];
$arr_xnum[]=$num_up[0].$num_up[3].$num_up[2].$num_up[1];

$arr_xnum[]=$num_up[1].$num_up[0].$num_up[2].$num_up[3];
$arr_xnum[]=$num_up[1].$num_up[0].$num_up[3].$num_up[2];
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[0].$num_up[3];
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[3].$num_up[0];
$arr_xnum[]=$num_up[1].$num_up[3].$num_up[0].$num_up[2];
$arr_xnum[]=$num_up[1].$num_up[3].$num_up[2].$num_up[0];

$arr_xnum[]=$num_up[2].$num_up[0].$num_up[1].$num_up[3];
$arr_xnum[]=$num_up[2].$num_up[0].$num_up[3].$num_up[1];
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[0].$num_up[3];
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[3].$num_up[0];
$arr_xnum[]=$num_up[2].$num_up[3].$num_up[0].$num_up[1];
$arr_xnum[]=$num_up[2].$num_up[3].$num_up[1].$num_up[0];

$arr_xnum[]=$num_up[3].$num_up[0].$num_up[1].$num_up[2];
$arr_xnum[]=$num_up[3].$num_up[0].$num_up[2].$num_up[1];
$arr_xnum[]=$num_up[3].$num_up[1].$num_up[0].$num_up[2];
$arr_xnum[]=$num_up[3].$num_up[1].$num_up[2].$num_up[0];
$arr_xnum[]=$num_up[3].$num_up[2].$num_up[0].$num_up[1];
$arr_xnum[]=$num_up[3].$num_up[2].$num_up[1].$num_up[0];


	}
	
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$_POST[tnumber]' and lot_type='$_POST[ttype]'   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'  ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum , lot_zone ,  lot_rob ) values('$_POST[tnumber]','$_POST[ttype]', now(), '$_POST[tsum]' , '$_GET[zone]' , '$_GET[rob]')";
sql_query($sql);


################Config Admin
$url_file1="../json/lotto/ok/ok_".$_GET[zone]."_".$_GET[rob].".json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$re_ok=$date_bet[0];

$sql="select sum(b_total) as r1 from bom_tb_lotto_hun_bill_play_live where  ok_id='$re_ok[ok_id]' and lot_type='$_POST[ttype]' and play_number='$_POST[tnumber]'   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]' ";
#$reb=sql_array($sql);
$reb[r1]=0;

$sum_bet=($_POST[tsum])-($reb[r1]);
if($sum_bet<=0){
	$sum_bet=0;
	$sql="update bom_tb_lotto_hun_lock_1 set h_sum=$sum_bet where   h_num='$_POST[tnumber]' and lot_type='$_POST[ttype]'    and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]' ";
    sql_query($sql);
}
################Config Admin

if($_POST[ttype]==3 or $_POST[ttype]==20 ){
	
	foreach($arr_xnum as $newnum){
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/".$_POST[ttype]."_".$newnum."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$_POST[ttype]."_".$newnum."_.json";
write($url_file ,$txt11,"w+"); 
		
		}
	
}elseif($_POST[ttype]==24){
	
	foreach($arr_xnum as $newnum){
		
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/".$_POST[ttype]."_".$newnum."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$_POST[ttype]."_".$newnum."_.json";
write($url_file ,$txt11,"w+"); 
		
		}
		
}elseif($_POST[ttype]==26){
	
	foreach($arr_xnum as $newnum){
		
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/".$_POST[ttype]."_".$newnum."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$_POST[ttype]."_".$newnum."_.json";
write($url_file ,$txt11,"w+"); 
		
		}
			
}else{
	
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/".$_POST[ttype]."_".$_POST[tnumber]."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$_POST[ttype]."_".$_POST[tnumber]."_.json";
write($url_file ,$txt11,"w+"); 
	
	}
	
	
	
}elseif($_POST[ttype]==66){
		###############3 กลับ##############66666666666666666666666666666
$num_up=array(substr($_POST[tnumber], -3,1), substr($_POST[tnumber], -2,1),  substr($_POST[tnumber], -1,1));
sort($num_up);
$_POST[tnumber]=$num_up[0].$num_up[1].$num_up[2];	

$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[2];	
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0].$num_up[2];	
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[0].$num_up[1];	

	foreach($arr_xnum as $num_new){
		

	
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$num_new' and lot_type='1'    and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'  ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum , lot_zone , lot_rob ) values('$num_new','1', now(), '$_POST[tsum]' , '$_GET[zone]'  , '$_GET[rob]' )";
sql_query($sql);



################Config Admin
$url_file1="../json/lotto/ok/ok_".$_GET[zone]."_".$_GET[rob].".json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$re_ok=$date_bet[0];



$sum_bet=($_POST[tsum])-($reb[r1]);
if($sum_bet<=0){
	$sum_bet=0;
	$sql="update bom_tb_lotto_hun_lock_1 set h_sum=$sum_bet where   h_num='$num_new' and lot_type='1'   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
    sql_query($sql);
}
################Config Admin


	
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/1_".$num_new."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_1_".$num_new."_.json";
write($url_file ,$txt11,"w+"); 


			###############3 กลับ##############66666666666666666666666666666	
		
	}
		

	}else{
		
		
		
		#############################5555555555555555555555555
#บน+ล่าง+กลับ
$run_up2=array(substr($_POST[tnumber], -2,1), substr($_POST[tnumber], -1,1));
$tod_2=array();
$tod_2[]=$run_up2[0].$run_up2[1];
$tod_2[]=$run_up2[1].$run_up2[0];

	foreach($tod_2 as $num_new){
	
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$num_new' and lot_type='4'   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'  ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum , lot_zone , lot_rob  ) values('$num_new','4', now(), '$_POST[tsum]' , '$_GET[zone]'  , '$_GET[rob]' )";
sql_query($sql);

$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$num_new' and lot_type='5'   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'  ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum , lot_zone , lot_rob  ) values('$num_new','5', now(), '$_POST[tsum]' , '$_GET[zone]'  , '$_GET[rob]' )";
sql_query($sql);


################Config Admin
$url_file1="../json/lotto/ok/ok_".$_GET[zone]."_".$_GET[rob].".json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$re_ok=$date_bet[0];



$sum_bet=($_POST[tsum])-($reb[r1]);
if($sum_bet<=0){
	$sum_bet=0;
	$sql="update bom_tb_lotto_hun_lock_1 set h_sum=$sum_bet where   h_num='$num_new' and lot_type='4'   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'  ";
    sql_query($sql);
}
################Config Admin


	
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/4_".$num_new."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_4_".$num_new."_.json";
write($url_file ,$txt11,"w+"); 


$sum_bet=($_POST[tsum])-($reb[r1]);
if($sum_bet<=0){
	$sum_bet=0;
	$sql="update bom_tb_lotto_hun_lock_1 set h_sum=$sum_bet where   h_num='$num_new' and lot_type='5'    and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]' ";
    sql_query($sql);
}
################Config Admin


	
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum_bet");
$txt11=json_encode($js1);
#$url_file="../json/lotto/lock/5_".$num_new."_.json";	
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_5_".$num_new."_.json";
write($url_file ,$txt11,"w+"); 

	}
		#############################5555555555555555555555555
		}
		
		
		

################################TIME File
$jst1=array();
$sql = sql_query("select * from bom_tb_lotto_hun_lock_1 where   h_sum<10   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   order by lot_type asc, h_num asc");
while($rs=sql_fetch($sql)){ 
$jst1[$rs[lot_type]][]="$rs[h_num]";
}
$txt44=json_encode($jst1);
#$url_file="../json/lotto/limit.json";		
$url_file="../json/lotto/limit/limit_".$_GET[zone]."_".$_GET[rob].".json";		
write($url_file ,$txt44,"w+"); 





if($_POST[tsum]==0){
$xtype=$lot_type["th"][$_GET[zone]][$_POST[ttype]];
#$txt=urlencode("$xtype $_POST[tnumber] เต็ม");
@header('Location: count_hun.php');
exit();
}

}
}



	
?>
<meta charset="utf-8">
 <script type='text/javascript' src='../js/jquery-1.9.1.min.js'></script>
     <script type='text/javascript' >
     function _lot(type){
		 $("#lot_num").load("../sa/Page/1_hun/Lot_num_hit.php",{"type":type});
		 }
		 
		      function _w(url){
		window.location=url;
		 }
     </script>
     
     
<style type="text/css">
.num1{ float:left;
width:90px;
padding:10px;
margin:10px;
border:#666 solid 1px;
background:#6CF;
}
.num2{ float:left;
width:90px;
padding:10px;
margin:10px;
border:#666 solid 1px;
background:#F90;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><form action="" method="get">
     <input name="zone" type="hidden" id="zone" value="<?=$_GET[zone];?>" />
      <input name="rob" type="hidden" id="rob" value="<?=$_GET[rob];?>" />
    <input name="d" type="hidden" id="d" value="<?=$_GET[d];?>" />
ประเภท :
  <select  class="txt_back11n" id="l_zone" onchange="_w('?d=<?=$_GET[d];?>&rob=1&zone='+this.value);">
  <!-- <option value='' <? if($_GET[zone]==$key){echo'selected';}?>>ทั้งหมด</option> -->
  <?
    foreach ($lot_zone["th"] as $key => $value) {
      if($key!=1)
      {
  ?>
      <option value='<?=$key?>' <? if($_GET[zone]==$key){echo'selected';}?>><?=$value?></option>
  <?  } } ?>
 </select>

&nbsp;&nbsp;&nbsp;

 รอบ :
  <select  class="txt_back11n" onchange="_w('?zone=<?=$_GET[zone]?>&d=<?=$_GET[d];?>&rob='+this.value);">
    <option value='' <? if($_GET[rob]==''){echo'selected';}?>>ทั้งหมด</option>
  <?
    foreach ($lot_rob as $key => $value) {
  ?>
   <option value='<?=$key?>' <? if($_GET[rob]==$key){echo'selected';}?>><?=$value?></option>
  <? } ?>
 </select>
    
    &nbsp;&nbsp;&nbsp;
    
<input name="po" type="text" id="po" value="<?=$_GET[po];?>" size="20" />
<input type="submit" value="ค้นหา โควต้า คงเหลือ" />
</form></td>
    <td width="50%">
<form action="" method="post">

    
       <span style="background:#6C9;">
       <input name="ttype" type="radio" value="66"  onclick="_lot(this.value);" <? if($_POST[ttype]==66){echo'checked="checked"';}?>/>3+กลับ&nbsp;
       <input name="ttype" type="radio" value="1"  onclick="_lot(this.value);" <? if($_POST[ttype]==1){echo'checked="checked"';}?>/>3บน&nbsp;
        <input name="ttype" type="radio" value="3"  onclick="_lot(this.value);" <? if($_POST[ttype]==3){echo'checked="checked"';}?> />3โต๊ด&nbsp;
         <input name="ttype" type="radio" value="4"  onclick="_lot(this.value);" <? if($_POST[ttype]==4){echo'checked="checked"';}?> />2บน&nbsp;
      
         <input name="ttype" type="radio" value="5"  onclick="_lot(this.value);"  <? if($_POST[ttype]==5){echo'checked="checked"';}?>/>2ล่าง&nbsp; 
           <input name="ttype" type="radio" value="55"  onclick="_lot(this.value);"  <? if($_POST[ttype]==55){echo'checked="checked"';}?>/>2บน+ล่าง+กลับ&nbsp;

            <input name="ttype" type="radio" value="6"  onclick="_lot(this.value);"  <? if($_POST[ttype]==6){echo'checked="checked"';}?>/>วิ่งบน&nbsp;<br>
               <input name="ttype" type="radio" value="21"  onclick="_lot(this.value);"  <? if($_POST[ttype]==21){echo'checked="checked"';}?>/>ปักหน่วย&nbsp;
                  <input name="ttype" type="radio" value="22"  onclick="_lot(this.value);"  <? if($_POST[ttype]==22){echo'checked="checked"';}?>/>ปักสิบ&nbsp;
                     <input name="ttype" type="radio" value="23"  onclick="_lot(this.value);"  <? if($_POST[ttype]==23){echo'checked="checked"';}?>/>ปักร้อย&nbsp;
                      <input name="ttype" type="radio" value="25"  onclick="_lot(this.value);"  <? if($_POST[ttype]==25){echo'checked="checked"';}?>/>4ตรง&nbsp;
                       <input name="ttype" type="radio" value="26"  onclick="_lot(this.value);"  <? if($_POST[ttype]==26){echo'checked="checked"';}?>/>4โต๊ด&nbsp;
                        <input name="ttype" type="radio" value="27"  onclick="_lot(this.value);"  <? if($_POST[ttype]==27){echo'checked="checked"';}?>/>เลขชุด&nbsp;
       </span>
    
        <br>
         เลข
      <span id="lot_num"><input name="tnumber" type="text"  id="tnumber"  size="8" maxlength="3"  /></span>
    
        จำนวน 
          <input name="tsum" type="text" id="tsum"  size="8" maxlength="15"  value="<?=$_POST[tsum];?>" />
        <input type="submit" name="b_add" id="b_add" value="บันทึก" />
      </form>
    </td>
  </tr>
</table>


<?



#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	/*
$lot_type["th"][$_GET[zone]]= array(1 =>"3บน", 2 =>"3ล่างหลัง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหน้าบน", 17 =>"3ล่างหน้า", 18 =>"2ตัวหน้าบน", 19 =>"วิ่งหน้าบน", 20 =>"3 โต๊ดหน้าบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");
	*/
	
if($_GET[po]!=""){
$po=$_GET[po];	
}else{
$po=0;	
	}
	

$xx=1;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=999;$num++){
	$number=sprintf("%03d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
			echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=999;$num++){
	$number=sprintf("%03d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum   , lot_zone , lot_rob) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}	
				
			echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
$xx=3;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=999;$num++){
	$number=sprintf("%03d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  

	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=999;$num++){
	$number=sprintf("%03d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
				if($sumck0<=$po){
					
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}	
					
				echo"$number=<b>".number_format($sumck0)."</b><br>";
				}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
$xx=4;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=99;$num++){
	$number=sprintf("%02d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
			echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=99;$num++){
	$number=sprintf("%02d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
				if($sumck0<=$po){
					
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}	
					
			echo"$number=<b>".number_format($sumck0)."</b><br>";
				}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	

	$xx=5;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=99;$num++){
	$number=sprintf("%02d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=99;$num++){
	$number=sprintf("%02d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}
				
				echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	

	
		/*
$lot_type["th"][$_GET[zone]]= array(1 =>"3บน", 2 =>"3ล่างหลัง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหน้าบน", 17 =>"3ล่างหน้า", 18 =>"2ตัวหน้าบน", 19 =>"วิ่งหน้าบน", 20 =>"3 โต๊ดหน้าบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");
	*/
	
	
	
	#########################หุ้นลาว
	$xx=6;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
#	$number=sprintf("%02d",$num);
$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
	#$number=sprintf("%02d",$num);
	$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}
				
				echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	
		$xx=7;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
#	$number=sprintf("%02d",$num);
$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
	#$number=sprintf("%02d",$num);
	$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}
				
				echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	
	
	
		$xx=21;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
#	$number=sprintf("%02d",$num);
$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
	#$number=sprintf("%02d",$num);
	$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}
				
				echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	
	
		$xx=22;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
#	$number=sprintf("%02d",$num);
$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
	#$number=sprintf("%02d",$num);
	$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}
				
				echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
		$xx=23;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
#	$number=sprintf("%02d",$num);
$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
				echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9;$num++){
	#$number=sprintf("%02d",$num);
	$number=$num;
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum  , lot_zone , lot_rob ) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}
				
				echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
$xx=25;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9999;$num++){
	$number=sprintf("%04d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
			echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9999;$num++){
	$number=sprintf("%04d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum   , lot_zone , lot_rob) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}	
				
			echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=9999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	
	$xx=26;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9999;$num++){
	$number=sprintf("%04d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
			echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9999;$num++){
	$number=sprintf("%04d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum   , lot_zone , lot_rob) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}	
				
			echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=9999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
	
	
	$xx=27;
echo"<div class='num1'> <h4>".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9999;$num++){
	$number=sprintf("%04d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  
	  
			$sumck0=jrlot($file);
			echo"$number=<b>".number_format($sumck0)."</b><br>";
  }}
}#for($num=0;$num<=999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
echo"<div class='num2'> <h4>เต็ม=".$lot_type["th"][$_GET[zone]][$xx]."</h4>";
for($num=0;$num<=9999;$num++){
	$number=sprintf("%04d",$num);
#$url_file="../json/lotto/lock/".$xx."_".$number."_.json";		
$url_file="../json/lotto/lock/".$_GET[zone]."/".$_GET[rob]."_".$xx."_".$number."_.json";
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
			$sumck0=jrlot($file);
			if($sumck0<=$po){
				
if($sumck0<10){
$sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$number' and lot_type='$xx'  and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'   ";
sql_query($sql);
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime , h_sum   , lot_zone , lot_rob) values('$number','$xx', now(), '$sumck0' , '$_GET[zone]'  , '$_GET[rob]')";
sql_query($sql);
	}	
				
			echo"$number=<b>".number_format($sumck0)."</b><br>";
			}
  }}
}#for($num=0;$num<=9999;$num++){
#  }#for($xx=1;$xx<=count($lot_type["th"][$_GET[zone]]);$xx++){
	echo"</div>";  
	
	
$jst1=array();
$sql = sql_query("select * from bom_tb_lotto_hun_lock_1 where   h_sum<10   and lot_zone='$_GET[zone]'   and lot_rob='$_GET[rob]'    order by lot_type asc, h_num asc");
while($rs=sql_fetch($sql)){ 
$jst1[$rs[lot_type]][]="$rs[h_num]";
}
$txt44=json_encode($jst1);
#$url_file="../json/lotto/limit.json";		
$url_file="../json/lotto/limit/limit_".$_GET[zone]."_".$_GET[rob].".json";		
write($url_file ,$txt44,"w+"); 



?>
<title>โควต้า คงเหลือ</title>
