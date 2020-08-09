<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
		
	require('../../conn.php');
	require('../../function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../../../lang/ag_lang.php');
	require('../../../lang/function_array.php');


$sql="select * from bom_tb_football_bill_live where bill_id='$_GET[id]' and (r_id='$_SESSION[rid]' or  r_agent_id like '%*$_SESSION[rid]*%' )";
$ree=sql_array($sql);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รหัส:
<?=$ree[bill_id];?>
</title>
<style type="text/css">
.sbt{border-bottom:1px dashed #999999;}
.sb2{border-bottom:1px dashed #999999;}
.win{ text-decoration:underline; color:#F00;}
</style>


<style type="text/css">


@media screen
  {
.yes{ display:none;}
body{ font-size:12px;}
  }
  
@media print
  {
.no{ display:none;}
body{ font-size:8px;}
  }
  
@media screen,print
  {
.cr {color: #FF0000;}
.cbu {color: #0000FF;}
.cb {color: #000000;}
.cw {color: #FFFFFF;}

.ball td{border:1px  solid #262929;	}
.r12{ font-size:12px;}
.bb{ font-weight:bold;}
.tcr{ text-decoration:underline; color:#F00;}
.cd{ border:1px  solid #000; text-align:center; font-weight:bold; background:#CCC; margin-right:5px; padding:1px 4px; float:left;}
  }

</style>
</head>

<body>



<table width="100%" border="0" cellpadding="0" cellspacing="0"     style="font-size:12px;" >
  <tr>
    <td colspan="4" align="center" class="cb"><b><?=$lang_ag[2138];?>  <?=$ree[bill_id];?></b> <br><b class="cr"><?=$lang_ag[1401];?></b> <span class="cr"><?=_cvf($ree[b_timestam],6);?></span></td>
  </tr>
  <tr>
    <td colspan="4" align="center" class="cbu"><?=$lang_ag[2089];?> <span class="cr"> <?=number_format($ree[b_total]);?></span> <?=$lang_ag[264];?>
    <? if($ree[b_pay]>0){?> <?=$lang_ag[191];?> <span class="cr">  <?=number_format($ree[b_total]-$ree[b_pay]);?></span> <?=$lang_ag[264];?> <? }?>
 <? if($ree[b_bonus]>0){?>
     <?=$lang_ag[2141];?> <span class="cr"><?=number_format($ree[b_bonus]);?></span> <?=$lang_ag[264];?>
    <? }?> 

    <hr>


<?
$ee=explode("+",$ree[b_code]);
 //foreach($ee as $cc){echo'<div class="cd">'.$cc.'</div>';}?>


   <div style="clear:both"></div> <hr>
    </td>
  </tr>

  <?
# $sql="select *,a.b_big as ab_big from bom_tb_football_bill_play a left join bom_tb_ball_list b on a.b_id=b.b_id and a.b_rob=b.b_rob   and a.b_add=b.b_add where a.bill_id='$ree[bill_id]' and a.r_id='$_SESSION[rid]' group by play_id order by play_timestam asc";
 $sql="select * from bom_tb_football_bill_play_live  where bill_id='$ree[bill_id]' and ( r_id='$_SESSION[rid]'   or  r_agent_id like '%*$_SESSION[rid]*%' )  group by play_id order by play_id asc";
  $re=sql_query($sql);
 $x=1;while($rs=sql_fetch($re)){
#	$reb=$d_bet[$rs[b_id]]; 

// $url_file=$server_js."txt/json/score/".$rs[b_id].".json";	
// $d_js=file_get_contents($url_file);
// $reb = json_decode($d_js, true);

$sql_ball_list = "SELECT * FROM `bom_tb_ball_list` where b_id = '".$rs[b_id]."' ";
$reb = sql_array_sp($sql_ball_list);	
	if($reb['b_id']==""){
$sql_ball_list = "SELECT * FROM `bom_tb_ball_list_score` where b_id = '".$rs[b_id]."' ";
$reb = sql_array_sp($sql_ball_list);	
	}

$k3=_type_ball($rs[play_type],$rs[play_bet],$reb[b_score_full],$reb[b_score_half]);
	 
			$w1='';
			$w2='';

		    if($rs[b_big]==1 and $rs[play_type]==1){
			$w1='<u class="cr">'.$lang_ag[2130].' ';
			$w2='</u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==2){
			$w1='<u class="cr">'.$lang_ag[2130].' ';
			$w2='</u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==1){
			$w1='<span class="cb">'.$lang_ag[2131].' ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==2){
			$w1='<span class="cb">'.$lang_ag[2131].' ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==11){
			$w1='<u class="cr">'.$lang_ag[2130].' 1H ';
			$w2='</u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==12){
			$w1='<u class="cr">'.$lang_ag[2130].' 1H ';
			$w2='</u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==11){
			$w1='<span class="cb">'.$lang_ag[2131].' 1H ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==12){
			$w1='<span class="cb">'.$lang_ag[2131].' 1H ';
			$w2='</span>';
			}else{
			$w1='<span class="cb">'.$lang_ag[2131].' ';
			$w2='</span>';
				}

			$name1 = ($reb["b_name_1_".$_SESSION["AGlang"]] != "") ? $reb["b_name_1_".$_SESSION["AGlang"]] : $reb["b_name_1_en"];
			$name2 = ($reb["b_name_2_".$_SESSION["AGlang"]] != "") ? $reb["b_name_2_".$_SESSION["AGlang"]]  : $reb["b_name_2_en"];	
			
			 if($rs[b_big]==1){	
			 $tbet="<u  class='cr'>$name1</u> -vs- $name2<br>";
			 }else{
				$tbet="$name1 -vs- <u  class='cr'>$name2</u><br>";
			 }
			 
				if($rs[play_type]==1){$tn="$w1$name1$w2";}
			elseif($rs[play_type]==2){$tn="$w1$name2$w2";} 
			elseif($rs[play_type]==3){$tn="<b>[ $lang_ag[269] ] </b> $name1";}
			elseif($rs[play_type]==4){$tn="<b>[ $lang_ag[270] ] </b>  $name1";} 
			
			elseif($rs[play_type]==5){$tn="<b>[ $lang_ag[2132] ] </b>  $name1";} 
			elseif($rs[play_type]==6){$tn="<b>[ $lang_ag[1749] ] </b>  $name1";} 
			elseif($rs[play_type]==7){$tn="<b>[ $lang_ag[2133] ] </b>  $name2";} 
			
			elseif($rs[play_type]==8){$tn="<b>[ $lang_ag[271] ] </b>  $name1";} 
			elseif($rs[play_type]==9){$tn="<b>[ $lang_ag[272] ] </b>  $name1";} 
			
			
			elseif($rs[play_type]==11){$tn="$w1$name1$w2";}
			elseif($rs[play_type]==12){$tn="$w1$name2$w2";} 
			elseif($rs[play_type]==13){$tn="<b>[ $lang_ag[269] 1H ] </b> $name1";}
			elseif($rs[play_type]==14){$tn="<b>[ $lang_ag[270]1H ] </b>  $name1";} 
			
			elseif($rs[play_type]==15){$tn="<b>[ $lang_ag[2132] 1H ] </b>  $name1";} 
			elseif($rs[play_type]==16){$tn="<b>[ $lang_ag[1749] 1H ] </b>  $name1";} 
			elseif($rs[play_type]==17){$tn="<b>[ $lang_ag[2133] 1H ] </b>  $name2";} 
			
			elseif($rs[play_type]==18){$tn="<b>[ $lang_ag[271] 1H ] </b>  $name1";} 
			elseif($rs[play_type]==19){$tn="<b>[ $lang_ag[272] 1H ] </b>  $name1";} 
			
			if($rs[play_type]>10){
			$hf='<img src="../../../../assets/img/p1.png" />';
			}else{
			$hf='<img src="../../../../assets/img/p2.png" />';	
				}
		
		if($rs[b_time_play]>0){ 
		$live="<br><b class='cr'>!Live  </b>[".$rs[b_score_live]."]     <img src='../../../../assets/img/time.png'/>   $rs[b_time_play] ";
		}else{
		$live="";
		}	
		
        $txt="$tbet   <b>[ $rs[play_code] ]</b> $hf $tn $live<br><b>"._cg2($rs[play_bet], $rs[play_type])."  </b>";
		
		if($reb[b_score_full]==""){
			$reb[b_score_full]='?-?';
			}
		if($reb[b_score_half]==""){
			$reb[b_score_half]='?-?';
			}
 if($rs[b_accept]==2){
		 $last2='style="background:#ffb7b7;"';
 }else if($rs[b_accept]==0){
	  $last2='style="background:#e2ffe3;"';
 }else{
		$last2='';
 }
  ?>
  <tr <? # $bgc = ($bgc=="#fff") ? "#e3e3e3" : "#fff"; {echo"style='background:$bgc'";}?> <?=$last2;?> class="cb" >
    <td width="12%" align="center" class="sb2"><?=$x;?></td>
    <td width="69%" class="sb2">  <?=$txt;?>.
      <? if($rs[play_pay]>=0.000){echo'<b class="cb">';}else{echo'<b class="cr">';}?>
      @<?=number_format($rs[play_pay],2);?></b> 
      <?=$lang_ag[2134];?><b class="cbu">[ <?=date("d-m-Y , H:i",$reb[b_date_play]);?> ]</b><br> </td>
    
    <td width="19%" align="center" class="sb2"><?=$ball_type2[$rs[play_status]];?>
                <br><b class="cr">FT [ <?=$reb[b_score_full];?> ]</b>
        <br><b class="cr">1H [ <?=$reb[b_score_half];?> ]</b>
        </td>
  </tr>
  <? $x++;}?>
</table>



<hr>



<p>&nbsp;</p>
<div align="center"  class="no">
<input type="button"  value="พิมพ์หน้านี้"  onclick="javascript:window.print();window.close();"/>&nbsp;&nbsp;|&nbsp;&nbsp;
<input type="button"  value="ปิดหน้าต่าง"  onclick="javascript:window.close();"/>
</div>
</body>
</html>
