<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php       
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);      



/*
if($_SESSION[mid]==""){echo"<script language='JavaScript'>top.document.location='http://www.laosoccerlottery.com/login.php';</script>";}
*/

#require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ok_block.php');
require("../lang/la.php");
//require('../lang/leak_la.php');
//require('../lang/team_la.php');
require('../lang/leak_x.php');
require('../lang/team_x.php');




#################################################
#$del_time=$time_stam-60;
#$sql="delete from pha_tb_ball_list_live_bb where b_time<'$del_time' ";
#sql_query($sql);
/*
$a_bb=array();
$sql="select * from pha_tb_ball_list_live_bb";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$a_bb[$rs[b_id]][$rs[b_add]][$rs[b_type]]=$rs[b_updown];
}
*/
$a_bb=array();
$url_file="live.json";		
$live_dd=file_get_contents($url_file);
$live_ok = json_decode($live_dd, true);
foreach($live_ok  as $rs){
	$a_bb[$rs[b_id]][$rs[b_add]][$rs[b_type]]=$rs[b_updown];
}



function _mix($hdc){
	if($hdc<-0.000){
		$hdc=-$hdc;
		$txt9=1-$hdc;
		$txt=2+$txt9;
		
		}else{$txt=$hdc+1;}
		if($hdc>0){
			return number_format($hdc,2);
		}
	}
	

function _mk($sum8){
	if($u==""){$u=0;}
if($sum8>0){return '<span style="color:#000;">'.number_format($sum8,$u).'</span>';}
elseif($sum8==0){return '<span style="color:#000;">'.number_format($sum8,$u).'</span>';}
else{return '<span style="color:#f00;">'.number_format($sum8,$u).'</span>';}
	}	
	
function _my($sum8){
	
if($sum8<0.00){return 'cr';}
	}	
	
$ar = $_REQUEST['ball'];
//echo $Arball[0];
for($i=0;$i<count($ar);$i++){
	$Arball[$i] = explode("," , $ar[$i]);
}



if(count($Arball)>0){
$myLeage = array();
$myTime = array();
for($i=0;$i<count($Arball);$i++){
#####################################
       $ds2=_cv($Arball[$i][7]);
	   if($ds2>$time_stam){
			$myid4 = $Arball[$i][4];
	      $myTime[$myid4][] = 1;
		   }		
#####################################		   
	if(!(in_array($Arball[$i][4] , $myLeage))){
		$myLeage[] = $Arball[$i][4];
	}
}



?>

    <script>

$("document").ready(function(){
   // $(".xxt").css("background" , "url('images/bom.gif')");
});


    </script>

<table width="100%" border="0" cellpadding="0" cellspacing="1"   class="ball">
        <tbody>
  <tr align="center" class="txt_white11ntitle" height="25">
    <td width="14%" align="center" bgcolor="#666666">ບ້ານ</td>
    <td width="10%" align="center" bgcolor="#666666">ຢາມ</td>
    <td width="3%" align="center" bgcolor="#666666">%</td>
    <td width="4%" align="center" bgcolor="#666666">ແຕ້ມຕໍ່</td>
    <td width="4%" align="center" bgcolor="#666666">ລາຄາບ້ານ</td>
    <td width="4%" align="center" bgcolor="#666666">ລາຄາຢາມ</td>
    <td width="11%" align="center" bgcolor="#666666">ບ້ານ-ຢາມ</td>
    <td width="7%" align="center" bgcolor="#666666">ສະຫຼຸບ</td>
    <td width="5%" align="center" bgcolor="#666666">ສູງ</td>
    <td width="5%" align="center" bgcolor="#666666">ຕໍ່າ</td>
    <td width="3%" align="center" bgcolor="#666666">%</td>
    <td width="4%" align="center" bgcolor="#666666">ປະຕູ</td>
    <td width="4%" align="center" bgcolor="#666666">ລາຄາສູງ</td>
      <td width="4%" align="center" bgcolor="#666666">ລາຄາຕໍ່າ</td>
    <td width="11%" align="center" bgcolor="#666666">ສູງ-ຕໍ່າ</td>
    <td width="7%" align="center" bgcolor="#666666">ສະຫຼຸບ</td>
  </tr>
              <? 
			   $os = array();
  	$os = $_SESSION["ppp"];
  //print_r($os);
  if(count($os)>0){
		$le = 1;
	}else{
		$le = 0;	
	}
		   for($i=0;$i<count($myLeage);$i++){ 
		   		$leage = $myLeage[$i];
				if($le==1){
					if(in_array($leage , $os)){
						$show = 1;
					}else{
						$show = 0;	
					}
					//$show = 1;
				}else{
					$show = 1;	
				}
				
		   		if($show==1){
$leage_v=$leage;
if (_in_ar($leage_v , $leage_c)==1)
  {			
				
			#	if(count($myTime[$leage])>0){ $dpd2='style=""';}
			#	else{$dpd2='style="display:none;"';}
				
$leage=trim($leage);
$txt_za=$xz[la][md5("$leage")];
$zone_a=dd("$leage","$txt_za");
				
		   ?>
           
           <tr id="leaguetoday_<?=$i?>" <?=$dpd2;?>  >
<td colspan="16" bgcolor="#0085cc" class="txt_white11ntitle" style="padding-left:50px;"><span class="txt_white11ntitle" style="padding-left:50px;"><?=$zone_a;?> </span></td>
		 </tr>
             <? 
			 $rball = "";
			 $bg = "#f9f9f9";
			$nl = 0;
		  for($y=0;$y<count($Arball);$y++){ 
		  	if($Arball[$y][4]==$leage){
				
//print_r($Arball[$y]);
//echo'<br>';
				$idball = $Arball[$y][0];
				$add = $Arball[$y][1];
				$team_1 = $Arball[$y][5];
				$team_2 = $Arball[$y][6];
				$time_date = $Arball[$y][8];
				$time_date2 = $Arball[$y][7];
				$ball1 = $Arball[$y][15];
				$hdp1_1 = $Arball[$y][16];
				$hdp1_2 = $Arball[$y][17];
				$ball2 = $Arball[$y][20];
				$hdp2_1 = $Arball[$y][21];
				$hdp2_2 = $Arball[$y][22];
				$ball3 = $Arball[$y][28];
				$hdp3_1 = $Arball[$y][29];
				$hdp3_2 = $Arball[$y][30];
				$ball4 = $Arball[$y][33];
				$hdp4_1 = $Arball[$y][34];
				$hdp4_2 = $Arball[$y][35];
				$tor = $Arball[$y][18];
				$fkoo = $Arball[$y][41];
				$fkee = $Arball[$y][42];
				
				$score = "0-0";
				$n_code = $Arball[$y][43];
				$ecode=@explode("+",$n_code);
				
					$percent = $Arball[$y][44];
					$percent_goal = $Arball[$y][45];
					$sum_1 = $Arball[$y][46];
					$sum_2 = $Arball[$y][47];
					$sum_11 = $Arball[$y][48];
					$sum_12 = $Arball[$y][49];
				
				if($rball == $idball){
					$bg = $bg;		
				}else if($rball==""){
					$bg = "#f9f9f9";		
				}else{
					if($bg=="#f5f5f5"){
						$bg = "#f9f9f9";	
					}else{
						$bg = "#f5f5f5";	
					}
				}
				$rball = $idball;

		    	$team_1=trim($team_1);
			    $team_2=trim($team_2);
				$la1=$xt[la][md5("$team_1")];
				$la2=$xt[la][md5("$team_2")];
				
				$team_1a=dd("$team_1","$la1");
				$team_2a=dd("$team_2","$la2");
				
			$ds=_cv($time_date2);

				$ball1 = $Arball[$y][15];
				$hdp1_1a = price_ball($hdp1_1 , 3);
				$hdp1_2a = price_ball($hdp1_2 , 3);
				
				$hdp2_1a = price_ball($hdp2_1 , 3);
				$hdp2_2a = price_ball($hdp2_2 , 3);
				
				
				
       #  	if($ds<$time_stam){$dpd='style="display:none;"';}	
		#	else{$dpd='style=""';}
			
		#	if($ball1!=""){    	$bet1=_hdc($hdp1_1,$hdp1_2,$tor,$_SESSION[mhdc]);   }else{  $bet1=array("hdc1"=>"","hdc2"=>"");}
		#	if($ball2!=""){		$bet2=_hdc($hdp2_1,$hdp2_2,$tor,$_SESSION[mhdc]);   }else{  $bet2=array("hdc1"=>"","hdc2"=>"");}
$o_id1=$a_bb[$idball][$add][1];
if($o_id1>0){
	$bink1=" url('newY.gif')";
	$photobb1='style="background:url('.$o_id1.'.gif) left no-repeat;"';
	}else{
	$bink1=" ";	
	$photobb1='';
		}
		
$o_id2=$a_bb[$idball][$add][2];
if($o_id2>0){
	$bink2=" url('newY.gif')";
	$photobb2='style="background:url('.$o_id2.'.gif) left no-repeat;"';
	}else{
	$bink2=" ";	
	$photobb2='';
		}
		
		$timestemp=_cv($time_date2);
		if($timestemp>$time_stam){
			$sbg1='CEE7FF';
			$sbg2='CEE7FF';
			$sbg3='FFFFC6';
			$sbg4='B0FFCA';
			$sbg5='B0FFCA';
			$sbg6='B0FFCA';
			$sbg7='FFFFA8';
	  		$sbg8='FFFFFF';
			$sbg9='CEE7FF';
			$sbg10='CEE7FF';
			$sbg11='FFFFC6';
			$sbg12='B0FFCA';
			$sbg13='B0FFCA';
			$sbg14='B0FFCA';
			$sbg15='FFFFA8';
			$sbg16='FFFFFF';
			}else{
			$sbg1='999999';
			$sbg2='999999';
			$sbg3='999999';
			$sbg4='999999';
			$sbg5='999999';
			$sbg6='999999';
			$sbg7='999999';
	  		$sbg8='999999';
			$sbg9='999999';
			$sbg10='999999';
			$sbg11='999999';
			$sbg12='999999';
			$sbg13='999999';
			$sbg14='999999';
			$sbg15='999999';
			$sbg16='999999';
			$bink1=" ";	
			$bink2=" ";	
				}
				
if($_SESSION[hit][$idball][$add]==1){	
		  ?>    
 <tr height="34" align="center" <?=$dpd;?> class="row_ball_today tr<?=$idball?>" id="<?=$idball?><?=$add?>" >
     <td align="center"   style="background:#<?=$sbg1;?>;">
     <input type="checkbox"   style="float:left;"  onclick="_hit('<?=$idball?>','<?=$add?>',this.value);" value="0"  <? if($_SESSION[hit][$idball][$add]==1){echo'checked="checked"';}?>/>
    <span style="float:left;"  class="b10"> <?=date("H:i",$timestemp);?></span>
     <a class="txt_<? if($tor=="h"){ echo "tor"; }else{ echo "long"; } ?>01b dbox"  href="javascript:_view(1 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');"><?=$team_1a?></a> <span class="b10">[<?=$ecode[0];?>]</span></td>
  
    <td align="center"  style="background:#<?=$sbg2;?>;" >
    <a class="txt_<? if($tor=="a"){ echo "tor"; }else{ echo "long"; } ?>01b dbox" href="javascript:_view(2 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');"><?=$team_2a?> </a> <span class="b10">[<?=$ecode[1];?>]</span></td>
   
   <td align="center"   style="background:#<?=$sbg3;?>;" >
    <input type="text" class="txt_none acenter" onClick="c_percen_hdc=1;" onKeyDown="return numberonly(event,this,'%','<?=$add?>','<?=$idball?>','<?=$percent?>','<?=$percent?>')" id="percen1_<?=$idball?><?=$add?>" value="<?=$percent;?>"></td>

    <td align="left"  style="background:#<?=$sbg4;?><?=$bink1;?>;">
    <input type="text" class="txt_none hdcgoal" onClick="c_hdc=1;" onKeyDown="return numberonly(event,this,'hdc','<?=$add?>','<?=$idball?>','<?=$percent?>','<?=$ball1?>')" id="ball1_<?=$idball?><?=$add?>" value="<?=$ball1?>" ></td>
    
    <td   style="background:#<?=$sbg5;?><?=$bink1;?>;">
    <input type="text" class="txt_none bb acenter <?=_my($hdp1_1);?>" onClick="c_price_hdc=1;" onKeyDown="return numberonly(event,this,'price1','<?=$add?>','<?=$idball?>','<?=$percent?>','<?=$hdp1_1a?>')" id="price1_<?=$idball?><?=$add?>" value="<?=($hdp1_1a)?>"   <?=$photobb1;?>></td>
   
     <td align="center"   style="background:#<?=$sbg6;?><?=$bink1;?>;">
     <input type="text" class="txt_none bb acenter <?=_my($hdp1_2);?>" onClick="c_price_hdc2=1;" onKeyDown="return numberonly(event,this,'price3','<?=$add?>','<?=$idball?>','<?=$percent?>','<?=$hdp1_2a?>')" id="price3_<?=$idball?><?=$add?>" value="<?=($hdp1_2a)?>"></td>
     
    <td align="center"  style="background:#<?=$sbg7;?>;"><a href="javascript:_view(3 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');">
	<?=number_format($sum_1/1000);?> - <?=number_format($sum_2/1000);?></a></td>
    <?
    if($tor=="a"){ 
	$sum_3=$sum_1-$sum_2;
	$sum_13=$sum_11-$sum_12;
	 }else{ 
	 $sum_3=$sum_2-$sum_1;
	 $sum_13=$sum_12-$sum_11;
	  }
	  

	?>
   
   <td align="right"  style="background:#<?=$sbg8;?>;" >
   <a href="javascript:_view(4 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');"><?=_mk($sum_3/1000);?></a>&nbsp;</td>
  
    <td align="center"  style="background:#<?=$sbg9;?>;">
    <a href="javascript:_view(11 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');" class="txt_tor01b">ສູງ</a> <span class="b10">[<?=$ecode[2];?>]</span></td>
  
    <td align="center"  style="background:#<?=$sbg10;?>;">
    <a href="javascript:_view(12 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');" class="txt_long01b">ຕໍ່າ</a> <span class="b10">[<?=$ecode[3];?>]</span></td>
   
    <td align="center"   style="background:#<?=$sbg11;?>;">
    <input type="text" class="txt_none acenter" onClick="c_percen_goal=1;" onKeyDown="return numberonly(event,this,'%%','<?=$add?>','<?=$idball?>','<?=$percent_goal?>','<?=$percent_goal?>')" id="percen2_<?=$idball?><?=$add?>" value="<?=$percent_goal;?>"></td>
   
    <td align="left" style="background:#<?=$sbg12;?><?=$bink2;?>;">
    <input type="text" class="txt_none hdcgoal" onClick="c_goal=1;" onKeyDown="return numberonly(event,this,'goal','<?=$add?>','<?=$idball?>','<?=$percent_goal?>','<?=$ball2?>')" id="ball2_<?=$idball?><?=$add?>" value="<?=$ball2?>"></td>
  
    <td align="center" style="background:#<?=$sbg13;?><?=$bink2;?>;">
    <input type="text" class="txt_none bb acenter  <?=_my($hdp2_1);?>" onClick="c_price_goal=1;" onKeyDown="return numberonly(event,this,'price2','<?=$add?>','<?=$idball?>','<?=$percent_goal?>','<?=$hdp2_1a?>')" id="price2_<?=$idball?><?=$add?>" value="<?=($hdp2_1a)?>" <?=$photobb2;?>></td>
       
        <td align="center" style="background:#<?=$sbg14;?><?=$bink2;?>;">
        <input type="text" class="txt_none bb acenter  <?=_my($hdp2_2);?>" onClick="c_price_goal2=1;" onKeyDown="return numberonly(event,this,'price4','<?=$add?>','<?=$idball?>','<?=$percent_goal?>','<?=$hdp2_2a?>')" id="price4_<?=$idball?><?=$add?>" value="<?=($hdp2_2a)?>"></td>
    
     <td align="center"   style="background:#<?=$sbg15;?>;">
     <a href="javascript:_view(13 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');">
     <?=number_format($sum_11/1000);?> - <?=number_format($sum_12/1000);?></a></td>
   
    <td align="right"   style="background:#<?=$sbg16;?>;">
    <a href="javascript:_view(14 ,  '<?=$idball;?>' , '<?=$add;?>','<?=$team_1a?>','<?=$team_2a?>');"><?=_mk($sum_13/1000);?></a>&nbsp;</td>
          </tr>
          <? $nl++; } } } if($nl<=0){ echo "<script>$('#leaguetoday_".$i."').css('display' , 'none');</script>"; }  } }} ?>
        </tbody>
      </table>
<? }  ?>

