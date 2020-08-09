<div class="col-xs-12ths thaisan" style="background-color:#666666"><font color="#FFFF00" class="thaisan" style="font-weight:bold; margin-top:10px; margin-bottom:10px">มิกซ์พาเลย์</font></div>
                
                <div class="row" style="margin:0px; padding:0px">

 
 <? $mainmatch = sql_query("SELECT DISTINCT(mat_topic) AS mat_topic FROM tb_match ORDER BY mat_time ASC"); ?>
 <? $row = mysql_num_rows($mainmatch); ?>
 <? while($objmainmath = sql_fetch($mainmatch)){ ?>

         
                
                  
                <? $sqlmate = sql_array("SELECT * FROM tb_match 
				INNER JOIN tb_league ON
				tb_match.mat_topic = tb_league.league_code 
				WHERE mat_topic = '$objmainmath[mat_topic]' ORDER BY mat_time ASC");?>

                <div class="col-xs-11 thaisan" align="center" style="background-color:#3b5998; padding-top:5px; padding-bottom:5px">&nbsp;&nbsp;&nbsp;&nbsp;<?=$sqlmate["league_name"];?></div>
                <div class="col-xs-1 thaisan" align="center" style="background-color:#3b5998; padding-top:5px; padding-bottom:5px"><a href="#"><i class="fa fa-spin fa-refresh" style="color:#FF6600"></i></a></div>
                
                
                
                
                <? $sqlmate = sql_query("SELECT * FROM tb_match WHERE mat_topic = '$objmainmath[mat_topic]' ORDER BY mat_time ASC");?>
                <? while($objmatch2 = sql_fetch($sqlmate)){ ?>
                
                <div class="col-xs-2" align="center" style="background-color:#222222; padding-top:5px; padding-bottom:5px"><?=substr($objmatch2["mat_time"], 0, 5);?></div>
                <div class="col-xs-10 thaisan" align="center" style="background-color:#333333; padding-top:5px; padding-bottom:5px"><font color="#B1E1F8"><?=$objmatch2["mat_teamname1"];?></font> <strong>-VS-</strong> <font color="#FF3333"><?=$objmatch2["mat_teamname2"];?></font></div>

                
                <? $blockbtn = sql_query("SELECT * FROM tb_step WHERE step_team = '".$objmatch2["mat_teamname1"]." vs ".$objmatch2["mat_teamname2"]."' AND step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
                <? $numblock = mysql_num_rows($blockbtn);?>
                <? if($numblock==0){ ?> 

                <div class="row" style="background-color:#B5C4F9; margin:0px; padding:0px">
                
                <div class="col-xs-6ths thaisan" style="color:#333333" align="center">&nbsp;&nbsp;&nbsp;เต็ม-HDP</div><div class="col-xs-6ths thaisan" style="color:#333333" align="center">&nbsp;&nbsp;&nbsp;เต็ม-สูงต่ำ</div>
                
                
                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">บ้าน</div>

                <a data-toggle="modal" data-target="#playbetE1<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome1"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetE2<?=$objmatch2["mat_id"];?>" style="cursor:pointer">                
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome2"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetE3<?=$objmatch2["mat_id"];?>" style="cursor:pointer">   
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome3"];?></button>
                    <? } ?>
                </div>
                
                </a>

<div class="modal fade" id="playbetE1<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetE1<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>


<form method="post" action="">         
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleE1<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleE1<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>

<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleE1<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong>
  </div>
</div>
</div>
<div class="col-xs-1">
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathdphome" id="txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathdphomemixE1<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepE1 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepE1["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathdphomemixE1<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />
</form>            
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>  
      
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> | 2.0 @<?=$objmatch2["mat_hdphome1"] = str_replace('<br>', ' ', $objmatch2["mat_hdphome1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_hdphome1"]) > 4){ 
                                    $mathdphome1 = explode(" ", $objmatch2["mat_hdphome1"]);
									$objmatch2["mat_hdphome1"] = $mathdphome1["1"];
									echo $mathdphome1["1"];
                                    }else{
									echo $objmatch2["mat_hdphome1"];
									} ?>
                                    </strong></font></td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                         </td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
            <input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="<?=$objmatch2["mat_teamname1"];?>" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdphome1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>  

<script>
document.getElementById("btnmathdphomemixE1<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?>');
txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?>.onkeyup = btnmathdphomemixE1<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathdphomemixE1<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepE1["step_odd"];?>;

	if (txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathdphomemixE1<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathdphomemixE1<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathdphomemixE1<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>


<div class="modal fade" id="playbetE2<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetE2<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>


<form method="post" action="">         
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleE2<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleE2<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>

<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleE2<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong>
  </div>
</div>
</div>
<div class="col-xs-1">
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathdphome" id="txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathdphomemixE2<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepE2 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepE2["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathdphomemixE2<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />
</form>            
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>  
      
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> | 2.0 @<?=$objmatch2["mat_hdphome2"] = str_replace('<br>', ' ', $objmatch2["mat_hdphome2"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_hdphome2"]) > 4){ 
                                    $mathdphome2 = explode(" ", $objmatch2["mat_hdphome2"]);
									$objmatch2["mat_hdphome2"] = $mathdphome2["1"];
									echo $mathdphome2["1"];
                                    }else{
									echo $objmatch2["mat_hdphome2"];
									} ?>
                                    </strong></font></td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                         </td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
            <input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="<?=$objmatch2["mat_teamname1"];?>" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdphome2"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>  

<script>
document.getElementById("btnmathdphomemixE2<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?>');
txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?>.onkeyup = btnmathdphomemixE2<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathdphomemixE2<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepE2["step_odd"];?>;

	if (txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathdphomemixE2<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathdphomemixE2<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathdphomemixE2<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>


<div class="modal fade" id="playbetE3<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetE3<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>


<form method="post" action="">         
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleE3<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleE3<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>

<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleE3<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong>
  </div>
</div>
</div>
<div class="col-xs-1">
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathdphome" id="txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathdphomemixE3<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepE3 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepE3["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathdphomemixE3<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />
</form>            
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>  
      
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> | 2.0 @<?=$objmatch2["mat_hdphome3"] = str_replace('<br>', ' ', $objmatch2["mat_hdphome3"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_hdphome3"]) > 4){ 
                                    $mathdphome3 = explode(" ", $objmatch2["mat_hdphome3"]);
									$objmatch2["mat_hdphome3"] = $mathdphome3["1"];
									echo $mathdphome3["1"];
                                    }else{
									echo $objmatch2["mat_hdphome3"];
									} ?>
                                    </strong></font></td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                         </td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
            <input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="<?=$objmatch2["mat_teamname1"];?>" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdphome3"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>  

<script>
document.getElementById("btnmathdphomemixE3<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?>');
txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?>.onkeyup = btnmathdphomemixE3<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathdphomemixE3<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepE3["step_odd"];?>;

	if (txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathdphomemixE3<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathdphomemixE3<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathdphomemixE3<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>

                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">สูง</div>
                
                <a data-toggle="modal" data-target="#playbetF1<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                 
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop1"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetF2<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop2"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetF3<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop3"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
<div class="modal fade" id="playbetF1<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetF1<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>

<form method="post" action="">            
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleF1<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleF1<?=$objmatch2["mat_id"];?><?=$i;?>>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleF1<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathfulltop" id="txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulltopmixF1<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepF1 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepF1["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathfulltopmixF1<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>          
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>    

       
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">สูง</font> | 2.0 @<?=$objmatch2["mat_fulltop1"] = str_replace('<br>', ' ', $objmatch2["mat_fulltop1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_fulltop1"]) > 4){ 
                                    $matfulltop1 = explode(" ", $objmatch2["mat_fulltop1"]);
									$objmatch2["mat_fulltop1"] = $matfulltop1["1"];
									echo $matfulltop1["1"];
                                    }else{
									echo $objmatch2["mat_fulltop1"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulltopmix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="สูง" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulltop1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>      


<script>
document.getElementById("btnmathfulltopmixF1<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?>');
txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulltopmixF1<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulltopmixF1<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepF1["step_odd"];?>;

	if (txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulltopmixF1<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulltopmixF1<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulltopmixF1<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>


<div class="modal fade" id="playbetF2<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetF2<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>

<form method="post" action="">            
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleF2<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleF2<?=$objmatch2["mat_id"];?><?=$i;?>>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleF2<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathfulltop" id="txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulltopmixF2<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepF2 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepF2["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathfulltopmixF2<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>          
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>    

       
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">สูง</font> | 2.0 @<?=$objmatch2["mat_fulltop2"] = str_replace('<br>', ' ', $objmatch2["mat_fulltop2"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_fulltop2"]) > 4){ 
                                    $matfulltop2 = explode(" ", $objmatch2["mat_fulltop2"]);
									$objmatch2["mat_fulltop2"] = $matfulltop2["1"];
									echo $matfulltop2["1"];
                                    }else{
									echo $objmatch2["mat_fulltop2"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulltopmix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="สูง" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulltop2"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>      


<script>
document.getElementById("btnmathfulltopmixF2<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?>');
txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulltopmixF2<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulltopmixF2<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepF2["step_odd"];?>;

	if (txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulltopmixF2<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulltopmixF2<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulltopmixF2<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>


<div class="modal fade" id="playbetF3<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetF3<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>

<form method="post" action="">            
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleF3<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleF3<?=$objmatch2["mat_id"];?><?=$i;?>>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleF3<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathfulltop" id="txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulltopmixF3<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepF3 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepF3["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathfulltopmixF3<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>          
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>    

       
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">สูง</font> | 2.0 @<?=$objmatch2["mat_fulltop3"] = str_replace('<br>', ' ', $objmatch2["mat_fulltop3"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_fulltop3"]) > 4){ 
                                    $matfulltop3 = explode(" ", $objmatch2["mat_fulltop3"]);
									$objmatch2["mat_fulltop3"] = $matfulltop3["1"];
									echo $matfulltop3["1"];
                                    }else{
									echo $objmatch2["mat_fulltop3"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulltopmix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="สูง" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulltop3"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>      


<script>
document.getElementById("btnmathfulltopmixF3<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?>');
txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulltopmixF3<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulltopmixF3<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepF3["step_odd"];?>;

	if (txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulltopmixF3<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulltopmixF3<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulltopmixF3<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>
          
               	<div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">เยือน</div>
                
                <a data-toggle="modal" data-target="#playbetG1<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway1"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetG2<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway2"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetG3<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway3"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
<div class="modal fade" id="playbetG1<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetG1<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>

<form method="post" action="">           
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleG1<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleG1<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleG1<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathhdpaway" id="txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathhdpawaymixG1<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepG1 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepG1["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathhdpawaymixG1<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>            
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>  

        
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font> | 2.0 @<?=$objmatch2["mat_hdpaway1"] = str_replace('<br>', ' ', $objmatch2["mat_hdpaway1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_hdpaway1"]) > 4){ 
                                    $mathhdpaway1 = explode(" ", $objmatch2["mat_hdpaway1"]);
									$objmatch2["mat_hdpaway1"] = $mathhdpaway1["1"];
									echo $mathhdpaway1["1"];
                                    }else{
									echo $objmatch2["mat_hdpaway1"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathhdpawaymix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="<?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdpaway1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>


<script>
document.getElementById("btnmathhdpawaymixG1<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?>');
txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?>.onkeyup = btnmathhdpawaymixG1<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathhdpawaymixG1<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepG1["step_odd"];?>;

	if (txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathhdpawaymixG1<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathhdpawaymixG1<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathhdpawaymixG1<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>


<div class="modal fade" id="playbetG2<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetG2<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>

<form method="post" action="">           
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleG2<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleG2<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleG2<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathhdpaway" id="txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathhdpawaymixG2<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepG2 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepG2["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathhdpawaymixG2<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>            
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>  

        
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font> | 2.0 @<?=$objmatch2["mat_hdpaway2"] = str_replace('<br>', ' ', $objmatch2["mat_hdpaway2"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_hdpaway2"]) > 4){ 
                                    $mathhdpaway2 = explode(" ", $objmatch2["mat_hdpaway2"]);
									$objmatch2["mat_hdpaway2"] = $mathhdpaway2["1"];
									echo $mathhdpaway2["1"];
                                    }else{
									echo $objmatch2["mat_hdpaway2"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathhdpawaymix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="<?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdpaway2"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>


<script>
document.getElementById("btnmathhdpawaymixG2<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?>');
txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?>.onkeyup = btnmathhdpawaymixG2<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathhdpawaymixG2<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepG2["step_odd"];?>;

	if (txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathhdpawaymixG2<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathhdpawaymixG2<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathhdpawaymixG2<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>


<div class="modal fade" id="playbetG3<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetG3<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>

<form method="post" action="">           
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleG3<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleG3<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleG3<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathhdpaway" id="txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathhdpawaymixG3<?=$objmatch2["mat_id"];?>"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepG3 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepG3["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathhdpawaymixG3<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>            
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>  

        
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); echo $rowstep+1; ?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font> | 2.0 @<?=$objmatch2["mat_hdpaway3"] = str_replace('<br>', ' ', $objmatch2["mat_hdpaway3"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_hdpaway3"]) > 4){ 
                                    $mathhdpaway3 = explode(" ", $objmatch2["mat_hdpaway3"]);
									$objmatch2["mat_hdpaway3"] = $mathhdpaway3["1"];
									echo $mathhdpaway3["1"];
                                    }else{
									echo $objmatch2["mat_hdpaway3"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathhdpawaymix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="<?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdpaway3"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>


<script>
document.getElementById("btnmathhdpawaymixG3<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?>');
txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?>.onkeyup = btnmathhdpawaymixG3<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathhdpawaymixG3<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepG3["step_odd"];?>;

	if (txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathhdpawaymixG3<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathhdpawaymixG3<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathhdpawaymixG3<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>

                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">ต่ำ</div>
                
                <a data-toggle="modal" data-target="#playbetH1<?=$objmatch2["mat_id"];?>" style="cursor:pointer">

                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown1"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetH2<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown2"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                <a data-toggle="modal" data-target="#playbetH3<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown3"];?></button>
                    <? } ?>
                </div>

				</a>
                
                
<div class="modal fade" id="playbetH1<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetH1<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
<form method="post" action="">            
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleH1<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleH1<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleH1<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathfulldown" id="txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulldownmixH1<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepH1 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepH1["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathfulldownmixH1<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>              
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>             
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><?=$rowstep+1;?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">ต่ำ</font> | 2.0 @<?=$objmatch2["mat_fulldown1"] = str_replace('<br>', ' ', $objmatch2["mat_fulldown1"]);?></div>
            </div>

            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_fulldown1"]) > 4){ 
                                    $mathfulldown1 = explode(" ", $objmatch2["mat_fulldown1"]);
									$objmatch2["mat_fulldown1"] = $mathfulldown1["1"];
									echo $mathfulldown1["1"];
                                    }else{
									echo $objmatch2["mat_fulldown1"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulldownmix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>                      	
                        </td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="ต่ำ" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulldown1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>   

<script>
document.getElementById("btnmathfulldownmixH1<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?>');
txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulldownmixH1<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulldownmixH1<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepH1["step_odd"];?>;

	if (txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulldownmixH1<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulldownmixH1<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulldownmixH1<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>   


<div class="modal fade" id="playbetH2<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetH2<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
<form method="post" action="">            
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleH2<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleH2<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleH2<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathfulldown" id="txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulldownmixH2<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepH2 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepH2["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathfulldownmixH2<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>              
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>             
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><?=$rowstep+1;?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">ต่ำ</font> | 2.0 @<?=$objmatch2["mat_fulldown2"] = str_replace('<br>', ' ', $objmatch2["mat_fulldown2"]);?></div>
            </div>

            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_fulldown2"]) > 4){ 
                                    $mathfulldown2 = explode(" ", $objmatch2["mat_fulldown2"]);
									$objmatch2["mat_fulldown2"] = $mathfulldown2["1"];
									echo $mathfulldown2["1"];
                                    }else{
									echo $objmatch2["mat_fulldown2"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulldownmix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>                      	
                        </td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="ต่ำ" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulldown2"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>   

<script>
document.getElementById("btnmathfulldownmixH2<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?>');
txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulldownmixH2<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulldownmixH2<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepH2["step_odd"];?>;

	if (txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulldownmixH2<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulldownmixH2<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulldownmixH2<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>  


<div class="modal fade" id="playbetH3<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetH3<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
<form method="post" action="">            
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-2">
<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleH3<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleH3<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>
<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleH3<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong><br />              
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></strong> 
  </div>
</div>
</div>
<a href="main.php?cmd=mixparlay&subcmd=delete&id=<?=$objselectbill["step_id"];?>"><i class="fa fa-times-circle" style="color:#FF0000"></i></a>
</div>
<? $i++; ?>
<? } ?>


<? $rowstep = sql_num("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<? if($rowstep > 1){ ?>
<div class="row" style="background-color:#FFFFFF">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
<tr><td>
<input type="text" class="form-control" name="txtPricemathfulldown" id="txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:32px">
</td><td>
<button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulldownmixH3<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>
</td></tr>
</table>
</div>
<div class="row" style="background-color:#FFFFCC; color:#333333">
<div class="col-xs-6ths">สเต็ป <font color="#0066FF">x<?=$rowstep;?></font> จ่าย : <font color="#FF0000"><strong>


<? $sqlselectbillstepH3 = sql_array("SELECT EXP(SUM(LOG(step_odd))) AS step_odd FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]'"); ?>
<?=$sqlselectbillstepH3["step_odd"];?>
</strong></font>
</div>
<div class="col-xs-6ths">รับสูงสุด : <font color="#0066FF">
<span id="userMsgmathfulldownmixH3<?=$objmatch2["mat_id"];?>"></span></font> บาท</div>
<div class="col-xs-6ths">เล่นต่ำสุด : <font color="#0066FF">50</font> บาท</div>
<div class="col-xs-6ths">เล่นสูงสุด : <font color="#0066FF">100,000</font> บาท</div>
</div>  
<input type="hidden" name="cmd" value="mixparlay" />
<input type="hidden" name="subcmd" value="save" />   
</form>              
<? }else{ ?>
<div class="row" style="background-color:#FFFFFF">
<font color="#FF0000">แทงขั้นต่ำ 2 ทีม</font>
</div>
<? }?>             
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC"><?=$rowstep+1;?> คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลสเต็ป</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">ต่ำ</font> | 2.0 @<?=$objmatch2["mat_fulldown3"] = str_replace('<br>', ' ', $objmatch2["mat_fulldown3"]);?></div>
            </div>

            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;สเต็ปจ่าย :</td>
                                    <td align="right">&nbsp;<font color="#FF0000"><strong>
                                    <? if(strlen($objmatch2["mat_fulldown3"]) > 4){ 
                                    $mathfulldown3 = explode(" ", $objmatch2["mat_fulldown3"]);
									$objmatch2["mat_fulldown3"] = $mathfulldown3["1"];
									echo $mathfulldown3["1"];
                                    }else{
									echo $objmatch2["mat_fulldown3"];
									} ?>
                                    </strong></font></td>
                                </tr>
<?php /*?>                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulldownmix<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr><?php */?>
                                <tr style="border-bottom:3px solid #CCCCCC;border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr style="border-right:3px solid #CCCCCC;">
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>                      	
                        </td>
                	</tr>
                	<tr style="border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; background-color:#CCCCCC">
                    	<td><button class="btn btn-block btn-primary thaisan" type="submit" style="margin-bottom:3px"><strong><i class="fa fa-plus-square"></i> สเต็ป <?=$rowstep+1; ?></strong></button><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button></td>
   					</tr>
                </table>
            <input type="hidden" name="cmd" value="mixparlay" />
			<input type="hidden" name="subcmd" value="select" />
            <input type="hidden" name="mathid" value="<?=$objmatch2["mat_id"];?>" />
            <input type="hidden" name="team" value="<?=$objmatch2["mat_teamname1"];?> vs <?=$objmatch2["mat_teamname2"];?>" />
            <input type="hidden" name="bet" value="ต่ำ" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulldown3"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>   

<script>
document.getElementById("btnmathfulldownmixH3<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?>');
txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulldownmixH3<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulldownmixH3<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?>.value*<?=$sqlselectbillstepH3["step_odd"];?>;

	if (txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulldownmixH3<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulldownmixH3<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulldownmixH3<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>  
                        

     			</div>
                
                
                
                        
                <? }else{ ?>
                <div class="row" style="background-color:#FFFFCC; margin:0px; padding:0px">
                
                <div class="col-xs-6ths thaisan" style="color:#CCCCCC" align="center">&nbsp;&nbsp;&nbsp;เต็ม-HDP</div><div class="col-xs-6ths thaisan" style="color:#CCCCCC" align="center">&nbsp;&nbsp;&nbsp;เต็ม-สูงต่ำ</div>
                
                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#CCCCCC" align="center">บ้าน</div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome1"];?></button>
                    <? } ?>
                </div>
                
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome2"];?></button>
                    <? } ?>
                </div>
                
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome3"];?></button>
                    <? } ?>
                </div>
                
                
                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#CCCCCC" align="center">สูง</div>
                
                 
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop1"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop2"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop3"];?></button>
                    <? } ?>
                </div>
                
                
                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#CCCCCC" align="center">เยือน</div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway1"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway2"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway3"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#CCCCCC" align="center">ต่ำ</div>
                

                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown1"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown2"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" disabled="disabled" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown3"];?></button>
                    <? } ?>
                </div>

				</div>
    
                <? } ?>
                
                
                
                <? } ?>
                
   <? } ?>                  
                
                
  


                
                </div>
				