<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

include "inc/conn.php";
include "inc/function.php";
require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");

$sql="select m_count from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

$ar = array();
$step = $_SESSION["ttt"];
/*
Array ( [0] => 13710403 [1] => สวีเดน ดามออลสเวนคาน (หญิง) [2] => IK เฟรจ [3] => บรอมมาโพจคาร์น่า [4] => h [5] => 0-0.5 [6] => 0.900 [7] => T [8] => [9] => 1 [10] => 1 [11] => Tfhdp_1371040311_1 [12] => 201506232344 [13] => Tball_1371040311_1 [14] => [15] => 1 [16] => 1 [17] => 1435077900 [18] => 1 [19] => 1  [20] => 1 )
*/
	# [0] idball ,[1]  leage ,[2]  team1 ,[3]  team2 , [4] team_tor = h เจ้าบ้าน a ทีมเยือน , [5] HDP , [6] PAY , [7]  = T วันนี้ L กำลังเตะ , [8] score , [9] team = ตำแหน่งที่เลือก ,[10]  ty = ชนิดที่เลือก 
	# ,[11]  id = ตัวกระพริบ ,[12]   tdate = วันเวลาเตะ ,[13]  type_step ,
	# [14] time_p = เวลากำลังเตะ , [15]  tprice = 1 MY 2 HK 3 EU , [16] b_sport  = กีฬา ,[17]  b_date_play,[18]  badd, [19]  vrob, [20] Mix
	
#$ex=explode(',',$step[0]);
#print_r($ex);
#echo"$ex[10]=$ex[9]<br>";
#echo _zt($ex[10], $ex[9]);


$ex_max=explode(',',$_SESSION['m_max']);
$ex_min=explode(',',$_SESSION['m_min']);
$ex_step2=explode(',',$_SESSION['m_step2']);
$mix_min=$ex_step2[0];
$mix_max=$ex_step2[1];

$num_step = 0;
$hdp_step = 1; 
?>
<a name="toppage" id="toppage"></a>
<input name="man_count" type="hidden" id="man_count" value="<?=$re_m['m_count'];?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #000099">
  <tr>
    <td class="fontB"><?=$lang_menu[$_POST['sport_type']];?></td>
  </tr>
  <tr>
    <td bgcolor="#CFDCFF" align="right">@ <span class="p_all">0</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    <?
	$llb=0;
    	for($lb=0;$lb<count($step);$lb++){
			$Arball = explode("," , $step[$lb]);

			$idball = $Arball[0];
			if($idball!=""){
				$leage = $Arball[1];
				$team_1 = $Arball[2];
				$team_2 = $Arball[3];
				$tor = $Arball[4];
				$ball = $Arball[5];
				$hdp = $Arball[6];
				$rest = $Arball[7];
				$score = $Arball[8];
				$score2 = $Arball[8];
				if($score=="" || $score=="-"){
					$score = "-vs-";
					$score2 = "";
				}
				$team = $Arball[9];
				$type = $Arball[10];
				
               $new_type=_zt($type, $team);
	
				$id = $Arball[11];
				//$extim = explode("-+-" , $Arball[12]);
				$time_date = $Arball[12];
				
				
				$da = substr($time_date , 6 , 2);
				$mo = substr($time_date , 4 , 2);
				$ye = substr($time_date , 0 , 4);
				$ho = substr($time_date , 8 , 2);
				$min = substr($time_date , 10 , 2);
				$ds = mktime($ho+11, $min+1, 0, $mo, $da, $ye);
				
				
				$ex_td = explode(" " , $Arball[14]);
				
				$time_play = str_replace("'" , "" , $ex_td[1]);
				if($ex_td[0]=="2H"){
					$time_play = $time_play+45;
				}
				
				if($tor=="h"){
					$ttor = 1;
				}else{
					$ttor = 2;
				}
				
				if($rest=="T"){
					$rest=1;
				}else{
					$rest=2;
				}
				$live_view = $Arball[14];
				$tprice = $Arball[15];
				$b_sport = $Arball[16];
				$ball_play = $Arball[17];
				$add = $Arball[18];
				$rob = $Arball[19];
				$mix = $Arball[20];
				$main_step = $Arball[21];
				
if($_SESSION['lang']!='en'){
$fo2= _bdate()."_".$_SESSION['lang'].".json";
$data_lang=file_get_contents2("json/sport/lang/$b_sport/$fo2");
$sport_lang = json_decode2($data_lang, true);
}
 $team_1= _lg($team_1, $sport_lang['Team'][md5($team_1)]);
 $team_2= _lg($team_2, $sport_lang['Team'][md5($team_2)]);				
	#echo $m_price[$tprice];			
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="1" style="border:1px solid #666;" class="font11">
  <tr>
    <td colspan="2" height="20">
    
 <? if($mix==2){echo"<b>[".($lb+1).".] </b> ";}?>   
    <b class=<? if($ttor=="1"){ echo "red"; }else{ echo "blue"; } ?>>
        <?=$team_1?>
        <? if($type==3 || $type==4 || $type==6){ echo "(1H)";} ?>
        </b>
        <?=$score?>
        <b class=<? if($ttor=="2"){ echo "red"; }else{ echo "blue"; } ?>>
        <?=$team_2?>
        <? if($type==3 || $type==4 || $type==6){ echo "(1H)";} ?>
        </b></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#E3EBFF" height="15">
	<? 
	if($type==1 || $type==3){ 
		if($team==1 and $ttor=="1"){ 
			echo "<b class='red'>".$team_1; 
		#	$sm=1; 
			if($type==3){ 
				echo "(1H)"; 
		#		$sm=11;
			} echo "</b>"; 
		}else if($team==2 and $ttor=="2"){ 
			echo "<b class='red'>".$team_2; 
		#	$sm=2; 
			if($type==3){ 
				echo "(1H)"; 
		#		$sm=12; 
			} echo "</b>"; 
		}else if($team==1 and $ttor=="2"){ 
			echo "<b class='blue'>".$team_1; 
		#	$sm=1; 
			if($type==3){ 
				echo "(1H)"; 
		#		$sm=11; 
			} echo "</b>"; 
		}else if($team==2 and $ttor=="1"){ 
			echo "<b class='blue'>".$team_2;  
		#	$sm=2; 
			if($type==3){ 
				echo "(1H)"; 
		#		$sm=12; 
			} echo "</b>"; 
		} 
	}else if($type==2 || $type==4){ 
		if($team==1){ 
			echo "<b class='red'>".$lang_member[314]; 
		#	$sm=3; 
			if($type==4){ 
				echo "(1H)"; 
		#		$sm=13; 
			}echo "</b>"; 
		}else{ 
			echo "<b class='blue'>".$lang_member[314]; 
		#	$sm=4; 
			if($type==4){ 
				echo "(1H)"; 
		#		$sm=14; 
			}echo "</b>"; 
		} 
	}else if($type==5 || $type==6){ 
		if($team==1){ 
			echo "<b class='red'>".$lang_member[1386]; 
		#	$sm=7; 
			if($type==6){ 
				echo "(1H)"; 
		#		$sm=17; 
			}echo "</b>"; 
		}else if($team==2){ 
			echo "<b class='blue'>".$lang_member[1387]; 
		#	$sm=8; 
			if($type==6){ 
				echo "(1H)"; 
		#		$sm=18; 
			}echo "</b>"; 
		}else{ 
			echo "<b class='black'>".$lang_member[220]; 
		#	$sm=9; 
			if($type==6){ 
				echo "(1H)"; 
		#		$sm=19; 
			}echo "</b>"; 
		} 
	}else if($type==7 || $type==8){ 
		if($team==1){ 
			echo "<b class='red'>".$lang_member[453]; 
		#	$sm=5; 
			if($type==8){ 
				echo "(1H)"; 
		#		$sm=15; 
			}echo "</b>"; 
		}else if($team==2){ 
			echo "<b class='blue'>".$lang_member[459]; 
		#	$sm=6; 
			if($type==8){ 
				echo "(1H)"; 
			#	$sm=16; 
			}echo "</b>"; 
		} 
	} ?> <img src="img/delete.png" height="15" style="float:right; cursor:pointer;" onClick="removeRow1(<?=$idball?>,<?=$lb?>);"></td>
    </tr>
  <tr>
    <td width="55%" bgcolor="#E3EBFF" height="15" id="p_<?=$id?>" class="shdp<?=$llb?>"><b id="b_<?=$Arball[13]?>" class="sball<?=$llb?>"><?=$ball?></b>@<strong class="<?=_red($hdp)?>" id="pc_<?=$id?>"><?=$hdp?></strong> <?=$m_price[$tprice];?></td>
    <td width="45%" bgcolor="#E3EBFF" align="right" height="20"><?=$sport_man[$new_type];?></td>
  </tr>
</table>
<input name="send<?=$llb?>" id="send<?=$llb?>" type="hidden" value="<?=trim($Arball[16])?>,<?=trim($rest)?>,<?=trim($score2)?>,<?=trim($new_type)?>,<?=trim($tprice)?>,<?=trim($idball)?>,<?=trim($add)?>,<?=trim($rob)?>,<?=trim($ttor)?>,<?=trim($leage)?>,<?=trim($team_1)?>,<?=trim($team_2)?>,<?=trim($ball_play)?>,<?=trim($live_view)?>,<?=trim($mix)?>,<?=trim($main_step)?>">
	<?
	$num_step++;
	$hdp_step = $hdp_step*$hdp;
	$llb++;
			}
	 }

	  ?>

    </td>
  </tr>
  <? if(($num_step>0 and  $mix==1)  or ( $num_step>0 and $mix==2 and $num_step>=$mix_min)){ ?>
  <tr>
    <td class="fontB" bgcolor="#E2E2E2" style="border:1px dotted #cccccc; border-right:none; border-left:none; padding:10px 10px;"><?=$_SESSION['m_currency'];?>: <input type="text" name="mbet" id="mbet" size="10"  maxlength="8" class="txt_box"  onkeyup="cal_price(this.value,$('.p_all').html(),'<?=$num_step?>');" onKeyDown="return numberonly(event,this)" style="text-align:left;"/></td>
  </tr>
  <? } ?>
  <tr>
    <td bgcolor="#FFFFFF"><input type="hidden" id="nr" value="<?=$num_step?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="50%"><?=$lang_member[1029];?></td>
    <td width="50%" class="fontB" id="win">0</td>
  </tr>
  <tr>
    <td><?=$lang_member[1030];?></td>
    <td class="blue"><span id="bet_min"><?=number_format($ex_min[$num_step]);?></span> / <span id="bet_max"><?=number_format($ex_max[$num_step]);?></span></td>
  </tr>
</table>
    </td>
  </tr>
    <? if(($num_step>0 and  $mix==1)  or ( $num_step>0 and $mix==2 and $num_step>=$mix_min)){ ?>
  <tr>
    <td align="center"><input id="btn_conf" type="button" value="<?=$lang_member[300];?>" class="btn_le" onClick="send_bill();" style="width:80px;height:25px;cursor:pointer; <? if($num_step<=0){ echo "background:#ccc;"; }?>" <? if($num_step<=0){ echo "disabled"; }?>>
    <input type="button" value="<?=$lang_member[65];?>" class="btn_le" style="width:80px;height:25px;cursor:pointer; background:#F00;" onClick="clear_step();"></td>
  </tr>
  <? }?>
</table>
<?
/*
	if($num_step>1){
		$smix = 2;	
	}else{
		$smix = 1;	
	}
	*/
?>
<script>


$(".p_all").html(parseFloat(<?=$hdp_step?>).toFixed(2));
$("#mbet").focus();

function send_bill(){

	var c_min=parseInt(TrimComma($("#bet_min").html()));
	var c_max=parseInt(TrimComma($("#bet_max").html()));
    var c_bet=parseInt(TrimComma($("#mbet").val()));
    var c_count=parseInt(TrimComma($("#man_count").val()));
	if(c_count<=0){c_count=0;}

	if(c_bet==""){
		alert("<?=$lang_member[1041];?>")	;
		$("#mbet").focus();
		$("#btn_conf").removeAttr('disabled');
		$("#btn_conf").css('background' , '');
		
     }else if(c_bet > c_max){
		
		alert("<?=$lang_member[632];?> "+ addCommas(c_max))	;
		$("#mbet").val(c_max);
		$("#mbet").focus();
		$("#btn_conf").removeAttr('disabled');
		$("#btn_conf").css('background' , '');
		
	}else if(c_bet < c_min){
		
		alert("<?=$lang_member[631];?> "+ addCommas(c_min))	;
		$("#mbet").val(c_min);
		$("#mbet").focus();
		$("#btn_conf").removeAttr('disabled');
		$("#btn_conf").css('background' , '');
		
	  }else if(c_bet > c_count){
		 alert("<?=$lang_member[633];?> ")	;
		$("#mbet").val(c_count);
		$("#mbet").focus();
		$("#btn_conf").removeAttr('disabled');
		$("#btn_conf").css('background' , '');
		
	}else{
		var step = new Array();

		for(var cc=0;cc<<?=$num_step?>;cc++){
			step[cc] = $("#send"+cc).val()+","+$.trim($(".sball"+cc).html())+","+$.trim($(".shdp"+cc+" strong").html()+","+c_bet );
			/*################## ส่ง DATA
# 0=$sport_type # 1=$sport_zone # 2=ผลบอลตอนนั้น # 3=$sport_man # 4=ราคาเช่น MY , HK , EU # 5=ID # 6=ADD # 7=ROB # 8=ทีมต่อ # 9=ชื่อลีก # 10=ชื่อทีมบ้าน # 11=ชื่อทีมเยือน # 12=เวลาเตะ
# 13=ราคา คูณจ่าย # 14=HDC # 15= $sport_mix #  16= ยอดเล่น*/
		}

		var rcc = confirm("<?=$lang_member[1042];?>");
		if (rcc == true) {	
			$.ajax({
				type: "POST",
				url: "save_football.php",
				data: { "sum": c_bet , "step": step , "ood" : $(".p_all").html() },
				timeout: 15000,
				cache: false,	// Clear cache IE
				dataType:"json",
				beforeSend: function(){
					$("#sg").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
				},
				success: function(data){
			
				console.log(data.SQL);
					
					if(data.status==1){
						alert("<?=$lang_member[56];?>");
						clear_step();
						if(data.type_bet==1){
							menu_bet(1);
						}else{
							menu_bet(2);
						}
						get_credit();
					}else if(data.status==3){
						alert("<?=$lang_member[1038];?> : "+data.tmax);
						clear_step();
					}else{
					alert("<?=$lang_member[810];?>");
						$("#btn_conf").removeAttr('disabled');
						$("#btn_conf").css('background' , '');
					}
				}
			});	
		}else{
			$("#btn_conf").removeAttr('disabled');
			$("#btn_conf").css('background' , '');
		}
	} 
}


function addCommas(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1].substr(0,2) : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function TrimComma(currentTags) {  
	var currentTagTokens = currentTags.split(",");
	var existingTags = "";

	for ( var i = 0; i < currentTagTokens.length; i++ ) { 
		existingTags = existingTags + currentTagTokens[i];
	}
	return existingTags;
}
</script>
<script language="javascript">
var hv = 0;
var ha = 30;
var tmc;

chktime();
function chktime(){
	ha = ha-1;
	if(ha==0){
		if (tmc) { clearTimeout(tmc); }
		clear_step();
	}else{
		//console.log(ha);
		if (tmc) { clearTimeout(tmc); }
		tmc=setTimeout("chktime()",1000);
	}
}
$("#box_bet").hover(function(e) {
	//console.log(hv);
	if(hv==0){
		hv = 1;	
		ha = 60;	
	}else{
		hv = 0;	
		ha = 30;	
	}
});
</script>