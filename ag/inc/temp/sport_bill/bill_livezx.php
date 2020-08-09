<div class="page-break<?=($xb==0)?"-no":""?>">&nbsp;</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0"     style="font-size:12px;" >
  <tr>
    <td colspan="3" align="center" class="cb">
        <?
    if($rem[r_mes_logo]!=""){echo'<img src="'.$rem[r_mes_logo].'" height="80"><br>';}
	?>
     <b style="font-size:13px"><?=$rem[r_mes_name];?></b><br>
    <b><?=$lang[0];?>  <?=$ree[bill_id];?></b> [<?  if($ree[b_accept]==1){
		 echo $f_status[$ree[b_status]]; 
		 }else{
		 echo $f_accept[$ree[b_accept]]; 
		 } ?>]<br><b class="cr"><?=$lang[10];?></b> <span class="cr"><?=_cvf($ree[b_timestam],4);?></span></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="cbu"><?=$lang[4];?> <span class="cr"> <?=number_format($ree[b_total]);?></span> <?=$lang[13];?>


    <hr>


<?
$ee=explode("+",$ree[b_code]);
 //foreach($ee as $cc){echo'<div class="cd22">'.$cc.'</div>';}?>


   <div style="clear:both"></div> <hr>
    </td>
  </tr>

  <?
# $sql="select *,a.b_big as ab_big from bom_tb_football_bill_play a left join bom_tb_ball_list b on a.b_id=b.b_id and a.b_rob=b.b_rob   and a.b_add=b.b_add where a.bill_id='$ree[bill_id]' and a.r_id='$_SESSION[rid]' group by play_id order by play_timestam asc";
 $sql="select * from bom_tb_football_bill_play_live  where bill_id='$ree[bill_id]'    group by play_id order by play_id asc";
  $re3=sql_query($sql);
 $x=1;while($rs=sql_fetch($re3)){
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
			$w1='<u class="cr"><b>[ '.$arr_hdc2[1].' ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==2){
			$w1='<u class="cr"><b>[ '.$arr_hdc2[1].' ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==1){
			$w1='<span class="cb">[ '.$arr_hdc2[2].' ] ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==2){
			$w1='<span class="cb">[ '.$arr_hdc2[2].' ] ';
			$w2='</span>';
			
			}elseif($rs[b_big]==1 and $rs[play_type]==11){
			$w1='<u class="cr"><b>[ '.$arr_hdc2[1].' 1H ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==12){
			$w1='<u class="cr"><b>[ '.$arr_hdc2[1].' 1H  ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==11){
			$w1='<span class="cb">[ '.$arr_hdc2[2].' 1H ] ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==12){
			$w1='<span class="cb">[ '.$arr_hdc2[2].' 1H ] ';
			$w2='</span>';
			
			}else{
			$w1='<span class="cb">[ '.$arr_hdc2[2].' ] ';
			$w2='</span>';
				}

			$name1 = ($reb[b_name_1_th] != "") ? $reb[b_name_1_th] : $reb[b_name_1_en];
			$name2 = ($reb[b_name_2_th] != "") ? $reb[b_name_2_th] : $reb[b_name_2_en];		
			
						if($rs[play_type]==1){$tn="$w1$name1$w2";}
			elseif($rs[play_type]==2){$tn="$w1$name2$w2";} 
			elseif($rs[play_type]==3){$tn="<b>[ ".$arr_hdc2[3]." ] </b> $name1";}
			elseif($rs[play_type]==4){$tn="<b>[ ".$arr_hdc2[4]." ] </b>  $name1";} 
			
			elseif($rs[play_type]==5){$tn="<b>[ ".$arr_hdc2[5]." ] </b>  $name1";} 
			elseif($rs[play_type]==6){$tn="<b>[ ".$arr_hdc2[6]." ] </b>  $name1";} 
			elseif($rs[play_type]==7){$tn="<b>[ ".$arr_hdc2[7]." ] </b>  $name2";} 
			
			elseif($rs[play_type]==8){$tn="<b>[ ".$arr_hdc2[8]." ] </b>  $name1";} 
			elseif($rs[play_type]==9){$tn="<b>[ ".$arr_hdc2[9]." ] </b>  $name1";} 
			
			
			elseif($rs[play_type]==11){$tn="$w1$name1$w2";}
			elseif($rs[play_type]==12){$tn="$w1$name2$w2";} 
			elseif($rs[play_type]==13){$tn="<b>[ ".$arr_hdc2[3]." 1H ] </b> $name1";}
			elseif($rs[play_type]==14){$tn="<b>[ ".$arr_hdc2[4]." 1H ] </b>  $name1";} 
			
			elseif($rs[play_type]==15){$tn="<b>[ ".$arr_hdc2[5]." 1H ] </b>  $name1";} 
			elseif($rs[play_type]==16){$tn="<b>[ ".$arr_hdc2[6]." 1H ] </b>  $name1";} 
			elseif($rs[play_type]==17){$tn="<b>[ ".$arr_hdc2[7]." 1H ] </b>  $name2";} 
			
			elseif($rs[play_type]==18){$tn="<b>[ ".$arr_hdc2[8]." 1H ] </b>  $name1";} 
			elseif($rs[play_type]==19){$tn="<b>[ ".$arr_hdc2[9]." 1H ] </b>  $name1";} 
			
			if($rs[b_time_play]>0){ 
		$live="<b class='cb'>!Live</b>[".$rs[b_score_live]."]  เวลา.$rs[b_time_play] ";
		}else{
		$live="";
		}		
			
		
        $txt="$tn ";
		
		if($rs[play_status]==6){
			$cancel_bill = "text-decoration: line-through !important;";	
			$ree[b_sum_pay] = $ree[b_sum_pay]/$rs[play_pay];
			$ree[b_numstep] = $ree[b_numstep]-1;
		}else{
			$cancel_bill = "";	
		}
  ?>
 <tr <?  $bgc = ($bgc=="#fff") ? "#e3e3e3" : "#fff"; {echo"style=' height:25px; background:$bgc; $cancel_bill'";}?> class="cb txt10"  >
    <td class="sb2"><b>[ <?=$rs[play_code];?> ]</b> <?=$txt;?><span style="float:right; <?=$cancel_bill?>"> [ <b><?=_cg3($rs[play_bet]);?></b> ] [ <?=number_format($rs[play_pay],2);?> ]</span><br>[ <?=date("H:i",$reb[b_date_play]);?> ]<?=$live;?>
    
    
    <span style="float:right;"><?=$ball_type2[$rs[play_status]];?></span>
    <br>
    <?  if($rs[b_big]==1){ echo'<u>';}?>
	<?=$name1;?>
   <?  if($rs[b_big]==1){ echo'</u>';}?>
     -vs- 
   <?  if($rs[b_big]==2){ echo'<u>';}?>
	<?=$name2;?>
      <?  if($rs[b_big]==2){ echo'</u>';}?>
    <br>
    <?=$reb[b_zone];?>
    </td>
  </tr>
  <? $x++;}?>

    <tr>
    <td align="right" class="sb2"><br>
    <span style="float: left;"><? if($ree[b_numstep]>1){?> <?=$lang[11];?> <b><?=$ree[b_numstep];?></b><? }else{?><?=$lang[12];?><? }?></span>
    <strong><?=$lang[14];?>   :  <span class="cr"> <?=number_format($ree[b_total]*$ree[b_sum_pay]);?> </span> <?=$lang[13];?></strong></td>
  </tr>
</table>



<hr>
<div  style="color:#000000;" align="center">
<?
echo $rem[r_mes_bin];
$barcode=$ree[bill_id];
?>
</div>
<center><?=$lang[8];?> : 
               <?
               if($ree[b_web_from]==1){
				   echo'win.zusbet.com';
			   }else{
				  echo'abc.zusbet.com'; 
				   }
			   ?>
 <br>
<img src="../barcode.php?barcode=<?php echo $barcode.'&width=250&height=50';?>" /></center>
<br>
<center><?  if($ree[b_accept]==1){
		 echo $f_status[$ree[b_status]]; 
		 }else{
		 echo $f_accept[$ree[b_accept]]; 
		 } ?></center>
</table>



<hr>