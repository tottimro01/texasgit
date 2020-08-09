
<style>
      
      
 </style>

  <?php 
        $red_line = ($ree[b_accept] == 2) ? "red-line red_line_p": "red_line_p";
   ?> 
   <!-- <div class="<?=$red_line;?>">99999</div>  -->

<div class="page-break<?=($xb==0)?"-no":""?>">&nbsp;</div>
   <table width="100%"  border="0" cellpadding="0" cellspacing="0" id="slip" align="center" class="bill_<?=$_GET[id];?>">
      <tr>
         <td align="center" class="font12">
         <?
            if($rem[r_mes_logo]!=""){echo'<img src="'.$rem[r_mes_logo].'" height="80"><br>';}
         ?>
         <b style="font-size:13px"><?=$rem[r_mes_name];?></b><br>
         <!--<b>www.<?=$check_url;?></b>--></td>
      </tr>
      <tr height="5px">
         <td align="center" class="font7">&nbsp;</td>
      </tr>
      <tr>
         <td>
            <table width="100%" cellpadding="0" cellspacing="0" class="team">
               <tr>
                  <td width="44%" align="left">  <span class="<?=$red_line;?>"> &nbsp;NO. <?=$xb+1;?> </span>  </td>
                  <td width="56%" align="right"> 
                    <span class="<?=$red_line;?>">
                      <?=$lang[0];?>  : <?=$ree[bill_id];?> 
                      [
                          <?  
                            if($ree[b_accept]==1){
                              echo $f_status[$ree[b_status]]; 
                            }else{
                             echo $f_accept[$ree[b_accept]]; 
                            } 
                          ?>
                      ]&nbsp;
                     </span>
                  </td>
               </tr>
               <tr>
                  <td width="44%" align="left"> <span class="<?=$red_line;?>"> &nbsp;<?=date("d/m H:i:s",$ree[b_timestam]);?> </span></td>
                  <td width="56%" align="right"><span class="<?=$red_line;?>"><?=$lang_ag[1396];?> : <?=$user[$ree['m_id']]['user'];?> &nbsp; </span></td>
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
                   
         <?
                                        $sql="select * from bom_tb_football_bill_play_live where bill_id='$ree[bill_id]' order by play_id asc";
										$ree2=sql_query($sql);
										while($rss=sql_fetch($ree2)){
											
#$reb=$d_bet[$rss[b_id]]; 
// $url_file=$server_js."txt/json/score/".$rss[b_id].".json";	
// $d_js=file_get_contents2($url_file);
// $reb = json_decode($d_js, true);

$sql_ball_list = "SELECT * FROM `bom_tb_ball_list` where b_id = '".$rss[b_id]."' ";
$reb = sql_array_sp($sql_ball_list);
	if($reb['b_id']==""){
$sql_ball_list = "SELECT * FROM `bom_tb_ball_list_score` where b_id = '".$rss[b_id]."' ";
$reb = sql_array_sp($sql_ball_list);
	}


$k3=_type_ball($rss[play_type],$rss[play_bet],$reb[b_score_full],$reb[b_score_half]);


$w1='';
			$w2='';

		    if($rss[b_big]==1 and $rss[play_type]==1){
			$w1='<u class="cb"><b> *  ';
			$w2='</b></u>';
			}elseif($rss[b_big]==2 and $rss[play_type]==2){
			$w1='<u class="cb"><b> *  ';
			$w2='</b></u>';
			}elseif($rss[b_big]==2 and $rss[play_type]==1){
			$w1='<span class="cb"> ';
			$w2='</span>';
			}elseif($rss[b_big]==1 and $rss[play_type]==2){
			$w1='<span class="cb"> ';
			$w2='</span>';
			
			}elseif($rss[b_big]==1 and $rss[play_type]==11){
			$w1='<u class="cb"><b>(1st) * ';
			$w2='</b></u>';
			}elseif($rss[b_big]==2 and $rss[play_type]==12){
			$w1='<u class="cb"><b>(1st)  * ';
			$w2='</b></u>';
			}elseif($rss[b_big]==2 and $rss[play_type]==11){
			$w1='<span class="cb"> (1st) ';
			$w2='</span>';
			}elseif($rss[b_big]==1 and $rss[play_type]==12){
			$w1='<span class="cb"> (1st) ';
			$w2='</span>';
			
			}else{
			$w1='<span class="cb"> ';
			$w2='</span>';
				}

         $name1 = ($reb[b_name_1_th] != "") ? $reb[b_name_1_th] : $reb[b_name_1_en];
         $name2 = ($reb[b_name_2_th] != "") ? $reb[b_name_2_th] : $reb[b_name_2_en];         	
			
						if($rss[play_type]==1){$tn="$w1$name1$w2";}
			elseif($rss[play_type]==2){$tn="$w1$name2$w2";} 
			elseif($rss[play_type]==3){$tn="<b>  ".$arr_hdc2[3]." </b>";}
			elseif($rss[play_type]==4){$tn="<b>  ".$arr_hdc2[4]." </b>";} 
			
			elseif($rss[play_type]==5){$tn="<b> ".$arr_hdc2[5]." </b> ";} 
			elseif($rss[play_type]==6){$tn="<b> ".$arr_hdc2[6]." </b>";} 
			elseif($rss[play_type]==7){$tn="<b> ".$arr_hdc2[7]." </b> ";} 
			
			elseif($rss[play_type]==8){$tn="<b> ".$arr_hdc2[8]." </b>";} 
			elseif($rss[play_type]==9){$tn="<b> ".$arr_hdc2[9]." </b>";} 
			
			
			elseif($rss[play_type]==11){$tn="$w1$name1$w2";}
			elseif($rss[play_type]==12){$tn="$w1$name2$w2";} 
			elseif($rss[play_type]==13){$tn="<b> ".$arr_hdc2[3]." </b> (1st) ";}
			elseif($rss[play_type]==14){$tn="<b> ".$arr_hdc2[4]." </b> (1st) ";} 
			
			elseif($rss[play_type]==15){$tn="<b> ".$arr_hdc2[5]."</b> (1st) ";} 
			elseif($rss[play_type]==16){$tn="<b> ".$arr_hdc2[6]."</b> (1st) ";} 
			elseif($rss[play_type]==17){$tn="<b> ".$arr_hdc2[7]."</b> (1st) ";} 
			
			elseif($rss[play_type]==18){$tn="<b> ".$arr_hdc2[8]."</b> (1st) ";} 
			elseif($rss[play_type]==19){$tn="<b> ".$arr_hdc2[9]."</b> (1st) ";} 
			
			
			if($rss[b_time_play]>0){ 
		$live="<b class='cb'>!Live</b>[".$rss[b_score_live]."]  เวลา.$rss[b_time_play] ";
		}else{
		$live="";
		}		
		
		
        $txt="$tn ";
		
		if($rss[play_status]==6){
			$cancel_bill = "text-decoration: line-through !important;";	
			$ree[b_sum_pay] = $ree[b_sum_pay]/$rss[play_pay];
			$ree[b_numstep] = $ree[b_numstep]-1;
		}else{
			$cancel_bill = "";	
		}


#print_r($reb);
										?>
                     <tr>
                        <td>
                          <span class="<?=$red_line;?>">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="team" style=" <?=$cancel_bill?>">
                              <tr>                              
                                 <td align="left">&nbsp;
                                 <? if($rss[b_big]==1){echo'*';}?>
								 <?=$reb[b_name_1_.strtolower($ree[b_lang])];?>
                                  -vs-  
								 <?=$reb[b_name_2_.strtolower($ree[b_lang])];?>
                                 <? if($rss[b_big]==2){echo'*';}?> 
                                [ <?=date("H:i",$reb[b_date_play]);?> ]<?=$live;?><span class="<?=$red_line;?>" style="float:right;">[<?=$ball_type3[$rss[play_status]];?>]</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td  align="right"><?=$txt;?>&nbsp;<?=_cg3($rss[play_bet]);?>&nbsp;@ <?=number_format($rss[play_pay],2);?>&nbsp;</td>
                              </tr>
                           </table>
                          </span>
                        </td>
                     </tr>
<? }?>
                     
                     
          
                  </table>
               </td>
            </tr>
            <tr>
               <td height="3"  >
                  <img src="../images/dot1.jpg" height="1px" width="100%">
               </td>
            </tr>
            <tr>        
            <tr>
               <td  align="right" height="25px">
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td width="15%" align="center"><!--<?=$ree[b_numstep];?> <?=$lang[2];?> --></td>
                        <td width="45%" align="center"><!--<?=$lang[3];?> : <?=number_format($ree[b_sum_pay],2);?> --></td>
                        <td width="40%" align="right"><span class="<?=$red_line;?>"><?=$lang[4];?>  : <?=number_format($ree[b_total]);?>&nbsp;<?=$lang[13];?></span></td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td  align="right" height="25px">
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td style="width: 70%;">
                              <div id="w_<?=$_GET[id];?>" style="width: 60%; position: relative;">
                                 
                                 <?php 
                                    if($ree[b_running] == 1 || $ree[b_running_step] >= 1)
                                    {
                                       ?>
                                          <div id="w1_<?=$_GET[id];?>" style="position: absolute; width: 45%;top: -45px;left: 65px;">
                                              <img src="<?=$main_url;?>/assets/img/rcon1.gif" alt="" style="width: 100%;margin: 0 auto;">
                                              <div class="txt_load"> <?=$lang_ag[2320];?>... </div>
                                          </div>
                                       <?
                                    }
                                  ?>        
                              </div>
                        </td>

                        <td align="right"> <span class="<?=$red_line;?>"> <?=$lang[5];?>  : <?=number_format(0);?>&nbsp;<?=$lang[13];?></b></span></td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td  align="right" height="25px">
                  <table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td align="right"><span class="<?=$red_line;?>"><?=$lang[6];?>  : <?=number_format($ree[b_total]);?>&nbsp;<?=$lang[13];?></b></span></td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td height="3"  align="center"  class="team" >===================================</td>
            </tr>
            <tr>
               <td  align="right" class="team"><span class="<?=$red_line;?>"><?=$lang[7];?> : <?=number_format($ree[b_total]);?>&nbsp;<?=$lang[13];?></span></td>
            </tr>
            
            <tr>
               <td  align="right" class="team"><br>
<table width="100%" cellpadding="0" cellspacing="0" class="team">
                     <tr>
                        <td width="30%" align="left">
                          <span class="<?=$red_line;?>"><? if($ree[b_numstep]>1){?> <?=$lang[11];?> <b><?=$ree[b_numstep];?></b><? }else{?><?=$lang[12];?><? }?></span>
                        </td>
                        <td width="60%" align="right"><span class="<?=$red_line;?>"><strong><?=$lang[14];?>   :  <span class="cr"> <?=number_format($ree[b_total]*$ree[b_sum_pay]);?> </span> <?=$lang[13];?></strong></span></td>
                     </tr>
                  </table></td>
            </tr>
            
            <tr>
               <td  align="center" class="font12"><b>
                <span class="<?=$red_line;?>">

                
                  <?=$lang[8];?> : 
               <?
               if($ree[b_web_from]==2){
				   echo'win.zusbet.com';
			   }else{
				  echo'abc.zusbet.com'; 
				   }
			   ?>
         </span>
                </b>
               <br>
               <span class="<?=$red_line;?>" id="bill_status">
<center><?  if($ree[b_accept]==1){
		 echo $f_status[$ree[b_status]]; 
		 }else{
		 echo $f_accept[$ree[b_accept]]; 
		 } ?></center>
<hr>
<div  style="color:#000000;" align="center">
<?
echo $rem[r_mes_bin];
$barcode=$ree[bill_id];
?>
</div>
</span>

               </td>
            </tr>
        
         </table>
         <hr>