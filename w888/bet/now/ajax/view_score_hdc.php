<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../../inc/conn.php');
require('../../inc/function.php');
require('../../process/function_ball.php');

$id = $_POST["id"];
$add = $_POST["add"];
$url_set = $_POST["url_set"];
$name1 = $_POST["name1"];
$name2 = $_POST["name2"];

if($url_set==1){
	$txt="ບ້ານ $name1";
	}elseif($url_set==2){
	$txt="ຢາມ $name2";	
	}elseif($url_set==3){	
	$txt="$name1 -  $name2";	
	}
	
	$sum_1=array();
	$sum_2=array();
	
$mo_array=array();
$bin_array=array();


$sql="select * from pha_tb_football_bill_play where b_id='$id' and b_add='$add' and b_numstep=1  and b_cancel=0 and (play_type=1 or play_type=2)   order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	if($rs[play_type]==1){
	$sum_1[]=$rs[b_total];
	}else{
	$sum_2[]=$rs[b_total];
	}
	
$mo_array[s3_0][]=	_process_test('3-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[s2_0][]=	_process_test('2-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[s1_0][]=	_process_test('1-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[s0_0][]=	_process_test('0-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[s0_1][]=	_process_test('0-1',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[s0_2][]=	_process_test('0-2',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[s0_3][]=	_process_test('0-3',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );

$bin_array[$rs[bill_id]]=$rs[bill_id];

/*
$mo_array[h0_0][]=	_process_test('0-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );		
$mo_array[h1_0][]=	_process_test('1-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[h2_0][]=	_process_test('2-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[h3_0][]=	_process_test('3-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );
$mo_array[h4_0][]=	_process_test('4-0',$rs[b_big],$rs[play_type],$rs[play_bet], $rs[b_total] ,$rs[b_pay], $rs[play_pay] );


$bin_array[$rs[bill_id]]=$rs[bill_id];

*/
	}

#print_r($mo_array);

function _mk($sum8){
	if($u==""){$u=0;}
if($sum8>0){return '<span style="color:#000;">'.number_format($sum8,$u).'</span>';}
elseif($sum8==0){return '<span style="color:#000;">'.number_format($sum8,$u).'</span>';}
else{return '<span style="color:#f00;">'.number_format($sum8,$u).'</span>';}
	}	
	
$hsum1=@array_sum($sum_1);
$hsum2=@array_sum($sum_2);
$hsum3=@array_sum($sum_1)+@array_sum($sum_2);

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>

.red {
	color:#F00;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
#viewset{
	position:fixed;
	width:100%;
	background-color:#FFF;
	}
	#in_top{
		padding-top:100px;
		}
</style>
</head>

<body>
<div id="viewset">
<input  type="button" value="ປິດ" onclick="_cc();"  style="float:right;"/>
    <table width="100%" border="1" cellspacing="1" cellpadding="5">
  <tr>
    <td width="14%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>ລວມ</strong></td>
    <td width="13%" align="center" bgcolor="#54BAFF" style="color: #FFF"><?=$name1;?></td>
    <td width="13%" align="center" bgcolor="#54BAFF" style="color: #FFF"><?=$name2;?></td>
      <td width="8%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>3 - 0</strong></td>
    <td width="8%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>2 - 0</strong></td>
    <td width="8%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>1 - 0</strong></td>
    <td width="9%" align="center" bgcolor="#66CC99" style="color: #FFF"><strong>0 - 0</strong></td>
    <td width="9%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>0 - 1</strong></td>
    <td width="9%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>0 - 2</strong></td>
     <td width="9%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>0 - 3</strong></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong><?=number_format($hsum3);?></strong></td>
    <td align="right" bgcolor="#FEFFA3"><?=number_format($hsum1);?></td>
    <td align="right" bgcolor="#FEFFA3"><?=number_format($hsum2);?></td>
      <td align="right" bgcolor="#FFFFFF">
       <?
    $sx1=@array_sum($mo_array[s3_0]);
	echo _mk($sx1);
	?></td>
         <td align="right" bgcolor="#FFFFFF">
       <?
    $sx2=@array_sum($mo_array[s2_0]);
	echo _mk($sx2);
	?></td>
        <td align="right" bgcolor="#FFFFFF">
       <?
    $sx3=@array_sum($mo_array[s1_0]);
	echo _mk($sx3);
	?></td>
          <td align="right" bgcolor="#FFFFFF">
       <?
    $sx4=@array_sum($mo_array[s0_0]);
	echo _mk($sx4);
	?></td>
             <td align="right" bgcolor="#FFFFFF">
       <?
    $sx5=@array_sum($mo_array[s0_1]);
	echo _mk($sx5);
	?></td>
              <td align="right" bgcolor="#FFFFFF">
       <?
    $sx6=@array_sum($mo_array[s0_2]);
	echo _mk($sx6);
	?></td>
              <td align="right" bgcolor="#FFFFFF">
       <?
    $sx7=@array_sum($mo_array[s0_3]);
	echo _mk($sx7);
	?></td>
  </tr>
</table>

  </div>
</body>
</html>