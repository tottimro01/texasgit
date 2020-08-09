<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
require("lang/function_array.php");

$sql="select * from bom_tb_football_bill_live where bill_id='$_GET[id]' and m_id='$_SESSION[m_id]'";
$ree=sql_array($sql);
$sql="select * from bom_tb_agent where r_id='$ree[r_id]'";
$rem=sql_array($sql);

$m_user[$_SESSION[m_id]]=$_SESSION[m1]["m_user"];
$m_name[$_SESSION[m_id]]=$_SESSION[m1]["m_name"];

/*
$m_user=array();
	$m_name=array();
$url_file=$server_js."txt/json/member.json";	
$d_js=file_get_contents($url_file);
$d_bet = json_decode($d_js, true);
foreach($d_bet as $rs){
	$m_user[$rs["m_id"]]=$rs["m_user"];
	$m_name[$rs["m_id"]]=$rs["m_name"];
}*/
/*
$url_file=$server_js."txt/json/ball/".$ree[b_date]."_.json";	
$d_js=file_get_contents($url_file);
$d_bet = json_decode($d_js, true);
*/
$lang=array();
	
$lang[0]=$lang_member[2070];
$lang[1]=$lang_member[2071];
$lang[2]=$lang_member[459];
$lang[3]=$lang_member[1655];
$lang[4]=$lang_member[969];
$lang[5]=$lang_member[610];
$lang[6]=$lang_member[445];
$lang[7]=$lang_member[1614];
$lang[8]=$lang_member[2072];
$lang[9]="xxx";
$lang[10]=$lang_member[106];
$lang[11]=$lang_member[2073];
$lang[12]=$lang_member[2074];
$lang[13]=$lang_member[325];
$lang[14]=$lang_member[2075];
$lang[15]="xxx";
$lang[16]="xxx";
$lang[17]="xxx";
$lang[18]="xxx";
$lang[19]="xxx";
$arr_hdc2=array(1=>$lang_member[2076],$lang_member[2077], $lang_member[314],$lang_member[312],$lang_member[453],$lang_member[459],$lang_member[1386],$lang_member[220],$lang_member[1324]);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$lang_member[706];?>:<?=$ree["bill_id"];?></title>
<style type="text/css">

html {
	font-family:Arial, "times New Roman", tahoma;
	font-size:14px;
	color:#000000;
}
body {
	font-family:Arial, "times New Roman", tahoma;
	font-size:14px;
	color:#000000;
}
.sbt{border-bottom:1px dashed #999999;}
.sb2{border-bottom:1px dashed #999999;}
.win{ text-decoration:underline; color:#F00;}

@media all
{
	.page-break	{ display:none; }
	.page-break-no{ display:none; }
}
@media screen
  {
.yes{ display:none;}
body{ font-size:14px;}
.txt10{ font-size:14px;}
  }
  
@media print
  {
.no{ display:none;}
body{ font-size:14px;
color:#000;}
.txt10{ font-size:14px;}
	.page-break	{ display:block;height:1px; page-break-before:always; }
	.page-break-no{ display:block;height:1px; page-break-after:avoid; }	
  }
  
@media screen,print
  {
.cr {color: #000000;}
.cbu {color: #000000;}
.cb {color: #000000;}
.cw {color: #000000;}

.ball td{border:1px  solid #000000;	}
.r12{ font-size:14px;}
.bb{ font-weight:bold;}
.tcr{ text-decoration:underline; color:#000000;}
.cd22{ border:1px  solid #000; text-align:center; font-weight:bold; background:#CCC; margin-right:5px; padding:1px 4px; float:left;}
  }

</style>
</head>

<body>
<div align="center"  class="no">
<input type="button"  value="<?=$lang_member[703];?>"  onclick="javascript:window.print();window.close();"/>&nbsp;&nbsp;|&nbsp;&nbsp;
<input type="button"  value="<?=$lang_member[704];?>"  onclick="javascript:window.close();"/>
</div>
<p>&nbsp;</p>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" id="slip" align="center">
            <tr>
               <td align="center" class="font12">
                 <?php
    if($rem["r_mes_logo"]!=""){echo'<img src="'.$rem["r_mes_logo"].'" height="80"><br>';}else{echo'<img src="img/logo_white2.png" height="50"><br>';}
	?>
               <b style="font-size:13px"><?=($rem["r_mes_name"]=="" ? " " : $rem["r_mes_name"]);?></b><br>
               <!--<b>www.<?=$check_url;?></b>--></td>
            </tr>
            <tr height="5px">
               <td align="center" class="font7">&nbsp;</td>
            </tr>
            <tr>
               <td>
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td width="44%" align="left">&nbsp;NO. <?=$xb+1;?></td>
                        <td width="56%" align="right"><?=$lang[0];?>  : <?=$ree["bill_id"];?>&nbsp;</td>
                     </tr>
                     <tr>
                        <td width="44%" align="left">&nbsp;<?=date("d/m H:i:s",$ree["b_timestam"]);?></td>
                        <td width="56%" align="right"><?=$lang[1];?> : <?=$m_user[$ree["m_id"]];?>&nbsp;</td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td align="center">-------------------------------------------------</td>
            </tr>
            <tr>
               <td>
                  <table width="100%"  border="0" cellpadding="0" cellspacing="0" id="slipchild">
                   
         <?php
                                        $sql="select * from bom_tb_football_bill_play_live where bill_id='$ree[bill_id]' order by play_id asc";
										$ree2=sql_query($sql);
										while($rss=sql_fetch($ree2)){
											
$reb = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$rss['b_id']."'"); 

$w1='';
			$w2='';

		    if($rss["b_big"]==1 and $rss["play_type"]==1){
			$w1='<u class="cb"><b> *  ';
			$w2='</b></u>';
			}elseif($rss["b_big"]==2 and $rss["play_type"]==2){
			$w1='<u class="cb"><b> *  ';
			$w2='</b></u>';
			}elseif($rss["b_big"]==2 and $rss["play_type"]==1){
			$w1='<span class="cb"> ';
			$w2='</span>';
			}elseif($rss["b_big"]==1 and $rss["play_type"]==2){
			$w1='<span class="cb"> ';
			$w2='</span>';
			
			}elseif($rss["b_big"]==1 and $rss["play_type"]==11){
			$w1='<u class="cb"><b>(1st) * ';
			$w2='</b></u>';
			}elseif($rss["b_big"]==2 and $rss["play_type"]==12){
			$w1='<u class="cb"><b>(1st)  * ';
			$w2='</b></u>';
			}elseif($rss["b_big"]==2 and $rss["play_type"]==11){
			$w1='<span class="cb"> (1st) ';
			$w2='</span>';
			}elseif($rss["b_big"]==1 and $rss["play_type"]==12){
			$w1='<span class="cb"> (1st) ';
			$w2='</span>';
			
			}else{
			$w1='<span class="cb"> ';
			$w2='</span>';
				}	

        $plang1=($reb["b_name_1_th"]!="" ? "b_name_1_th" : "b_name_1_en");
        $plang2=($reb["b_name_2_th"]!="" ? "b_name_2_th" : "b_name_2_en");

        if($_SESSION['lang']!="th"){
          $plang1='b_name_1_en';
          $plang2='b_name_2_en';
        }
			
						if($rss["play_type"]==1){$tn="$w1$reb[$plang1]$w2";}
			elseif($rss["play_type"]==2){$tn="$w1$reb[$plang2]$w2";} 
			elseif($rss["play_type"]==3){$tn="<b>  ".$arr_hdc2[3]." </b>";}
			elseif($rss["play_type"]==4){$tn="<b>  ".$arr_hdc2[4]." </b>";} 
			
			elseif($rss["play_type"]==5){$tn="<b> ".$arr_hdc2[5]." </b> ";} 
			elseif($rss["play_type"]==6){$tn="<b> ".$arr_hdc2[6]." </b>";} 
			elseif($rss["play_type"]==7){$tn="<b> ".$arr_hdc2[7]." </b> ";} 
			
			elseif($rss["play_type"]==8){$tn="<b> ".$arr_hdc2[8]." </b>";} 
			elseif($rss["play_type"]==9){$tn="<b> ".$arr_hdc2[9]." </b>";} 
			
			
			elseif($rss["play_type"]==11){$tn="$w1$reb[$plang1]$w2";}
			elseif($rss["play_type"]==12){$tn="$w1$reb[$plang2]$w2";} 
			elseif($rss["play_type"]==13){$tn="<b> ".$arr_hdc2[3]." </b> (1st) ";}
			elseif($rss["play_type"]==14){$tn="<b> ".$arr_hdc2[4]." </b> (1st) ";} 
			
			elseif($rss["play_type"]==15){$tn="<b> ".$arr_hdc2[5]."</b> (1st) ";} 
			elseif($rss["play_type"]==16){$tn="<b> ".$arr_hdc2[6]."</b> (1st) ";} 
			elseif($rss["play_type"]==17){$tn="<b> ".$arr_hdc2[7]."</b> (1st) ";} 
			
			elseif($rss["play_type"]==18){$tn="<b> ".$arr_hdc2[8]."</b> (1st) ";} 
			elseif($rss["play_type"]==19){$tn="<b> ".$arr_hdc2[9]."</b> (1st) ";} 
			
			
			if($rss["b_time_play"]>0){ 
		$live="<b class='cb'>!Live</b>[".$rss["b_score_live"]."]  เวลา.$rss[b_time_play] ";
		}else{
		$live="";
		}		
		
		
        $txt="$tn ";

if($rss["play_status"]==6){
			$cancel_bill = "text-decoration: line-through !important;";	
			$ree["b_sum_pay"] = $ree["b_sum_pay"]/$rss["play_pay"];
			$ree["b_numstep"] = $ree["b_numstep"]-1;
		}else{
			$cancel_bill = "";	
		}
#print_r($reb);
										?>
                     <tr>
                        <td>
                           <table width="100%" border="0" cellspacing="0" cellpadding="0" class="team" style=" <?=$cancel_bill?>">
                              <tr>
                                 <td align="left">&nbsp;
                                 <?php if($rss["b_big"]==1){echo'*';}?>
								 <?=$reb[$plang1];?>
                                  -vs-  
								 <?=$reb[$plang2];?>
                                 <?php if($rss["b_big"]==2){echo'*';}?> 
                                [ <?=date("H:i",$reb["b_date_play"]);?> ]<?=$live;?><span style="float:right;">[
                                <?php
									 if($ree["b_accept"]==3){
											     echo $lang_member[2119];
											 }else{
												 echo $ball_play[$rss["play_status"]];
											 }
									 ?>
                                ]</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td  align="right"><?=$txt;?>&nbsp;<?=$rss["play_bet"];?>&nbsp;@ <?=number_format($rss["play_pay"],2);?>&nbsp;</td>
                              </tr>
                           </table>
                        </td>
                     </tr>
<?php }?>
                     
                     
          
                  </table>
               </td>
            </tr>
            <tr>
               <td height="3"  >
                  <img src="images/dot1.jpg" height="1px" width="100%">
               </td>
            </tr>
            <tr>        
            <tr>
               <td  align="right" height="25px">
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td width="15%" align="center"><!--<?=$ree["b_numstep"];?> <?=$lang[2];?> --></td>
                        <td width="45%" align="center"><!--<?=$lang[3];?> : <?=number_format($ree["b_sum_pay"],2);?> --></td>
                        <td width="40%" align="right"><?=$lang[4];?>  : <?=number_format($ree["b_total"]);?>&nbsp;<?=$_SESSION["m_currency"];?></td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td  align="right" height="25px">
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td align="right"><?=$lang[5];?>  : <?=number_format(0);?>&nbsp;<?=$_SESSION["m_currency"];?></b></td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td  align="right" height="25px">
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td align="right"><?=$lang[6];?>  : <?=number_format($ree["b_total"]);?>&nbsp;<?=$_SESSION["m_currency"];?></b></td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td height="3"  align="center"  class="team" >===================================</td>
            </tr>
            <tr>
               <td  align="right" class="team"><?=$lang[7];?> : <?=number_format($ree["b_total"]);?>&nbsp;<?=$_SESSION["m_currency"];?></td>
            </tr>
            
            <tr>
               <td  align="right" class="team"><br>
<table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td width="30%" align="left"><?php if($ree["b_numstep"]>1){?> <?=$lang[11];?> <b><?=$ree["b_numstep"];?></b><?php }else{?><?=$lang[12];?><?php }?></td>
                        <td width="60%" align="right"><strong><?=$lang[14];?>   :  <span class="cr"> <?=number_format($ree["b_total"]*$ree["b_sum_pay"]);?> </span> <?=$_SESSION["m_currency"];?></strong></td>
                     </tr>
                  </table></td>
            </tr>
            
            <tr>
               <td  align="center" class="font12" ><b><?=$lang[8];?> : win.wan1991.com </b>
<hr>
<div  style="color:#000000;" align="center">
<?php
echo $rem["r_mes_bin"];
$barcode=$ree["bill_id"];
?>
</div>
               </td>
            </tr>
        
         </table>
</body>
</html>