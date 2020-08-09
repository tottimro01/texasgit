<?php 



	if($_GET[orderby]==1){  // ตามชนะ หรือ เวลา
			$sql_bill = "SELECT * FROM `bom_tb_football_bill_live` where 1  and b_confirm != 1 $c_date   $type $bet  $shop  $qq   $xmid $xbill  $b_out ORDER BY `bill_id` desc LIMIT {$start} , {$rowPerPage}";

	}else{
		  $sql_bill = "SELECT * FROM `bom_tb_football_bill_live` where 1  and b_confirm != 1 $c_date   $type $bet  $shop  $qq   $xmid $xbill  $b_out ORDER BY b_status asc,bill_id desc LIMIT {$start} , {$rowPerPage}";
	}


	
	$re22 = sql_query($sql_bill);

	// $array_item = array();
	while($rs=sql_fetch($re22)){

		$ee=explode("+",$rs["b_code"]);
		if($rs[b_accept]==2){
			$last='style="background:#ffb7b7;"';
		}else if($rs[b_accept]==0){
		  $last='style="background:#e2ffe3;"';
		}else{
			$last='';
		}

		?>
			<tr <? if($_GET[view]==""){?>class="cu" <? }?> height="30"<?=$last;?>  >
					<td align="center"><?=_bu($rs["bill_id"],$rs["bill_out"]);?></td>
					<td align="center">
						<? 
							if($_GET["shop"]==""){
								 echo $user[$rs["r_id"]]["user"]; 
							}else{
								echo $user[$rs["m_id"]]["user"];  
							}
						?>
					</td>
					<td  width="35%" >
						<? //foreach($ee as $cc){echo'<div class="cd">'.$cc.'</div>';}?>
							<div style="float:right;">
								IP: <?=$rs["b_ip"];?>
 							</div>

 							<? 
 								if($_GET[view]!="")
 								{
 							?> 
									<div>
											<div style="clear:both"></div> <hr>
											<?php 
													$sql="select * from bom_tb_football_bill_play_live  where bill_id='$rs[bill_id]'   group by play_id order by play_id asc";
  												$re2=sql_query($sql);

  												$x2=1;
  												while($rs2=sql_fetch($re2)){  // while

  														$sql_ball_list = "SELECT * FROM `bom_tb_ball_list_score` where b_id = '".$rs2[b_id]."' ";
  														$reb = sql_array_sp($sql_ball_list);
					if($reb['b_id']==""){
  														$sql_ball_list = "SELECT * FROM `bom_tb_ball_list` where b_id = '".$rs2[b_id]."' ";
  														$reb = sql_array_sp($sql_ball_list);
						}

  														// $reb = $ball_list[$rs2[b_id]];

  														$k3=_type_ball($rs2[play_type],$rs2[play_bet],$reb[b_score_full],$reb[b_score_half]);

  														$w1='';
															$w2='';

													    if($rs2[b_big]==1 and $rs2[play_type]==1){
																$w1='<u class="cr">ต่อ ';
																$w2='</u>';
															}elseif($rs2[b_big]==2 and $rs2[play_type]==2){
																$w1='<u class="cr">ต่อ ';
																$w2='</u>';
															}elseif($rs2[b_big]==2 and $rs2[play_type]==1){
																$w1='<span class="cb">รอง ';
																$w2='</span>';
															}elseif($rs2[b_big]==1 and $rs2[play_type]==2){
																$w1='<span class="cb">รอง ';
																$w2='</span>';
															}elseif($rs2[b_big]==1 and $rs2[play_type]==11){
																$w1='<u class="cr">ต่อ 1H ';
																$w2='</u>';
															}elseif($rs2[b_big]==2 and $rs2[play_type]==12){
																$w1='<u class="cr">ต่อ 1H ';
																$w2='</u>';
															}elseif($rs2[b_big]==2 and $rs2[play_type]==11){
																$w1='<span class="cb">รอง 1H ';
																$w2='</span>';
															}elseif($rs2[b_big]==1 and $rs2[play_type]==12){
																$w1='<span class="cb">รอง 1H ';
																$w2='</span>';
															}else{
																$w1='<span class="cb">รอง ';
																$w2='</span>';
															}

															$name1 = ($reb[b_name_1_th] != "") ? $reb[b_name_1_th] : $reb[b_name_1_en];
															$name2 = ($reb[b_name_2_th] != "") ? $reb[b_name_2_th] : $reb[b_name_2_en];

															if($rs2[b_big]==1){	
																$tbet="<u class='cr'>$name1</u> -vs- $name2<br>";
															}else{
																$tbet="$name1 -vs- <u  class='cr'>$name2</u><br>";
															}



															// if($rs2[play_type]==1){$tn="$w1$name1$w2";}
															// elseif($rs2[play_type]==2){$tn="$w1$name2$w2";} 
															// elseif($rs2[play_type]==3){$tn="<b>[ สูง ] </b> $name1";}
															// elseif($rs2[play_type]==4){$tn="<b>[ ต่ำ ] </b>  $name1";} 
															// elseif($rs2[play_type]==5){$tn="<b>[ เจ้าบ้านชนะ ] </b>  $name1";} 
															// elseif($rs2[play_type]==6){$tn="<b>[ เสมอ ] </b>  $name1";} 
															// elseif($rs2[play_type]==7){$tn="<b>[ เยือนชนะ ] </b>  $name2";} 
															// elseif($rs2[play_type]==8){$tn="<b>[ คี่ ] </b>  $name1";} 
															// elseif($rs2[play_type]==9){$tn="<b>[ คู่ ] </b>  $name1";} 
															// elseif($rs2[play_type]==11){$tn="$w1$name1$w2";}
															// elseif($rs2[play_type]==12){$tn="$w1$name2$w2";} 
															// elseif($rs2[play_type]==13){$tn="<b>[ สูง 1H ] </b> $name1";}
															// elseif($rs2[play_type]==14){$tn="<b>[ ต่ำ1H ] </b>  $name1";} 
															// elseif($rs2[play_type]==15){$tn="<b>[ เจ้าบ้านชนะ 1H ] </b>  $name1";} 
															// elseif($rs2[play_type]==16){$tn="<b>[ เสมอ 1H ] </b>  $name1";} 
															// elseif($rs2[play_type]==17){$tn="<b>[ เยือนชนะ 1H ] </b>  $name2";} 
															// elseif($rs2[play_type]==18){$tn="<b>[ คี่ 1H ] </b>  $name1";} 
															// elseif($rs2[play_type]==19){$tn="<b>[ คู่ 1H ] </b>  $name1";}

															if($rs2[play_type]==1){$tn="$w1$name1$w2";}
															elseif($rs2[play_type]==2){$tn="$w1$name2$w2";} 
															elseif($rs2[play_type]==3){$tn="<b>[ สูง ] </b> $name1";}
															elseif($rs2[play_type]==4){$tn="<b>[ ต่ำ ] </b>  $name1";} 
															elseif($rs2[play_type]==5){$tn="<b>[ คี่ ] </b>  $name1";} 
															elseif($rs2[play_type]==6){$tn="<b>[ คู่ ] </b>  $name1";} 
															elseif($rs2[play_type]==7){$tn="<b>[ เจ้าบ้านชนะ ] </b>  $name1";} 
															elseif($rs2[play_type]==8){$tn="<b>[ เสมอ ] </b>  $name1";} 
															elseif($rs2[play_type]==9){$tn="<b>[ เยือนชนะ ] </b>  $name2";} 
															elseif($rs2[play_type]==11){$tn="$w1$name1$w2";}
															elseif($rs2[play_type]==12){$tn="$w1$name2$w2";} 
															elseif($rs2[play_type]==13){$tn="<b>[ สูง 1H ] </b> $name1";}
															elseif($rs2[play_type]==14){$tn="<b>[ ต่ำ 1H ] </b>  $name1";} 
															elseif($rs2[play_type]==15){$tn="<b>[ คี่ 1H ] </b>  $name1";} 
															elseif($rs2[play_type]==16){$tn="<b>[ คู่ 1H ] </b>  $name1";} 
															elseif($rs2[play_type]==17){$tn="<b>[ เจ้าบ้านชนะ 1H ] </b>  $name1";} 
															elseif($rs2[play_type]==18){$tn="<b>[ เสมอ 1H ] </b>  $name1";} 
															elseif($rs2[play_type]==19){$tn="<b>[ เยือนชนะ 1H ] </b>  $name2";}


															if($rs2[play_type]>10){
																$hf='<img src="assests/img/p1.png" />';
															}else{
																$hf='<img src="assests/img/p2.png" />';	
															}

															if($rs2[b_time_play]>0){ 
																$live="<br>ADD=$rs2[b_add]<b class='cr'>!Live</b>[".$rs2[b_score_live]."]  <img src='assests/img/time.png'/>$rs2[b_time_play] ";
															}else{
																$live="";
															}

															$txt="$tbet   <b>[ $rs2[play_code] ]</b> $hf $tn $live<br><b>"._cg2($rs2[play_bet], $rs2[play_type])." </b>";

															if($reb[b_score_full]==""){
																$reb[b_score_half]='?-?';
																$reb[b_score_full]='?-?';
															}

															if($rs2[b_accept]==2){
																	$last2='style="background:#ffb7b7;"';
															}else if($rs2[b_accept]==1){
																  $last2='style="background:#ffffff;"'; 
															}else if($rs2[b_accept]==0){
																  $last2='style="background:#e2ffe3;"';
															}else{
																	$last2='';
															} 
															
															?>
																<table width="100%" border="0" cellpadding="0" cellspacing="0" class="bill_data table-bordered table-hover" >
   																<tr <?=$last2;?> class="cb" >
 																		  <td width="12%" align="center" class="sb2"><?=$x2;?></td>
 																		  <td width="69%" class="sb2" style="padding:5px;">  <?=$txt;?>.
      																	<? if($rs2[play_pay]>=0.000){echo'<b class="cb">';}else{echo'<b class="cr">';}?>
     																			 @<?=number_format($rs2[play_pay]+$rs2[play_nam],2);?></b> 
     																			 เตะ <b class="cbu">[ <?=date("d-m-Y , H:i",$reb[b_date_play]);?> ]

     																			 	<br>
     																			 	<font color="#dd4b39"><?=$arr_sp_zone[$reb[b_zone]]?></font>


       																		<?php if($reb["b_live_showtime"]>0 and $reb["b_live"]<>0 and $reb["b_live"]<>4){?>  
       																				<br> 
       																				<span style="background-color:#FEFF9D">
       																					<b><?=$reb["b_live_showtime"];?>'&nbsp;&nbsp;FT <?=str_replace('-',':',$reb["b_t_score_full"]);?></b><br/>
       																				</span>
       																		<?php }?>
       																		<button class="btn btn-sm btn-danger" style="padding: 0 2px;" data-toggle="modal" data-target="#modal_livescore" onclick="loadLiveScore('<?=$reb["b_id"];?>');">Live score</button>
       																</td>
       																
    																	<td width="19%" align="center" class="sb2"><?=$ball_type2[$rs2[play_status]];?>
            																	<br><b class="cr">FT [ <?=$reb[b_score_full];?> ]</b>
        																			<br><b class="cr">1H [ <?=$reb[b_score_half];?> ]</b>
        															</td>

  																</tr>
 															 	<? $x2++;?>
																</table>	
	
															<?
		
  												} // end while
											 ?>
									</div>
 							<?}?>
					</td>
					<td align="center"><?=number_format($rs[b_total]);?></td>

					<td align="center"><?=date("H:i",$rs[b_timestam]);?>
        			<? if($rs[b_map_lat]!=""){?>
      						<img src="assests/img/world.png" width="30" height="24"  style="float:right;" onclick="_o('https://www.google.co.th/?gws_rd=ssl#q=<?=$rs[b_map_lat];?>%2C<?=$rs[b_map_lon];?>');"/>
     				 <? }?>
    			</td>
					<td align="center">
						<?php 
								if($rs[b_accept]==1){
								 	echo $f_status[$rs[b_status]]; 
								}else if($rs[b_accept]==0){
									?>
										 <?=$f_accept[$rs[b_accept]];?>
										<a href="?p=<?=$_GET[p];?>&page=<?=$_GET[this_page];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&b=<?=$_GET[b];?>&mid=<?=$_GET[mid];?>&pg=<?=$_GET[pg];?>&d=<?=$_GET[d];?>&view=<?=$_GET[view];?>&q=<?=$_GET[q];?>&orderby=<?=$_GET[orderby];?>&amp;ac=accept&amp;act=1&amp;id=<?=$rs[bill_id];?>&amp;mid=<?=$rs[m_id];?>"  onclick="return confirm('ยืนยันยกเลิกรับตั๋ว');"><img src="assests/img/1.png" /></a>
									<?
								}else{
									echo $f_accept[$rs[b_accept]]; 
								}
						?>
    			</td>

    			<td align="center">&nbsp;<? if($rs[br_bonus_1]>0 ){echo number_format($rs[br_bonus_1]);?>
    					<? if($rs[b_admin]==0){?>
	 									<a href="?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&page=<?=$_GET[this_page];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&b=<?=$_GET[b];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&shop=<?=$_GET[shop];?>&mid=<?=$_GET[mid];?>&orderby=<?=$_GET[orderby];?>&amp;ac=pay&amp;id=<?=$rs[bill_id];?>&amp;ss=<?=$rs[b_admin];?>"  title="จ่ายเงิน" >
     					<? }?>
     							<img src="assests/img/<?=$rs[b_admin];?>.png" alt="จ่ายเงิน" /></a>
							<? }?>
					</td>

					<td align="center">

						 <?  if($rs[b_status]==5 and $rs[b_accept]==1){?>
  
    						<a href="?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&page=<?=$_GET[this_page];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=del&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>"  onclick="return confirm('ยืนยันการยกเลิก');">
    									<img src="assests/img/false.png" />
    						</a>
    				<? }?>

    
     				<?  if($rs[b_accept]==3){?>
         			<a href="?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&page=<?=$_GET[this_page];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=ac_last&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>"  onclick="return confirm('ยืนยันรับตั๋ว');">
         					<img src="assests/img/button100.png" />
         			</a>

          		&nbsp;&nbsp;

    					<a href="?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&page=<?=$_GET[this_page];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=not&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>"  onclick="return confirm('ยืนยันการยกเลิก');">
    							<img src="assests/img/cancel.png" />
    					</a>
     			<? }?>
					</td>
			</tr>
		<?


	}









 ?>