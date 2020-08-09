<div class="col-xs-12ths thaisan" style="background-color:#666666"><font color="#FFFF00" class="thaisan" style="font-weight:bold; margin-top:10px; margin-bottom:10px">วันนี้</font></div>
                
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

                
                <div class="row" style="background-color:#B5C4F9; margin:0px; padding:0px">
                
                <div class="col-xs-6ths thaisan" style="color:#333333" align="center">&nbsp;&nbsp;&nbsp;เต็ม-HDP</div><div class="col-xs-6ths thaisan" style="color:#333333" align="center">&nbsp;&nbsp;&nbsp;เต็ม-สูงต่ำ</div>
                
                
                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">บ้าน</div>
                
                <a data-toggle="modal" data-target="#playbetA<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome1"];?></button>
                    <? } ?>
                </div>
                
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome2"];?></button>
                    <? } ?>
                </div>
                
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdphome3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdphome3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdphome3"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
                
<div class="modal fade" id="playbetA<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetA<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC">1 คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลเต็ง</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> | 2.0 @<?=$objmatch2["mat_hdphome1"] = str_replace('<br>', ' ', $objmatch2["mat_hdphome1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC; background-color:#FFFFCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="background-color:#FFFFCC; color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC">
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
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathdphome<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr>
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	  	<td colspan="2" style="border-left:3px solid #CCCCCC;background-color:#CCCCCC">
                        <input type="text" class="form-control" name="txtPricemathdphome" id="txtPricemathdphome<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:50px"></td>
                	</tr>
                	<tr style="background-color:#CCCCCC">
                    	<td style="border-left:3px solid #CCCCCC;border-right:3px solid #CCCCCC; border-top:2px solid #CCCCCC;"><button class="btn btn-block btn-success thaisan" type="submit" id="btnmathdphome<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button></td>
    					<td><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button>                		</td>
                	</tr>
                </table>
            <input type="hidden" name="cmd" value="today" />
            <input type="hidden" name="subcmd" value="save" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdphome1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>  

<script>
document.getElementById("btnmathdphome<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathdphome<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathdphome<?=$objmatch2["mat_id"];?>');
txtPricemathdphome<?=$objmatch2["mat_id"];?>.onkeyup = btnmathdphome<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathdphome<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathdphome<?=$objmatch2["mat_id"];?>.value*<?=$objmatch2["mat_hdphome1"];?>;

	if (txtPricemathdphome<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathdphome<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathdphome<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathdphome<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>

                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">สูง</div>
                
                <a data-toggle="modal" data-target="#playbetB<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                 
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop1"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop2"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulltop3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulltop3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulltop3"];?></button>
                    <? } ?>
                </div>
                
                </a>
                
<div class="modal fade" id="playbetB<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetB<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC">1 คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลเต็ง</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">สูง</font> | 2.0 @<?=$objmatch2["mat_fulltop1"] = str_replace('<br>', ' ', $objmatch2["mat_fulltop1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC; background-color:#FFFFCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="background-color:#FFFFCC; color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC">
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
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulltop<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr>
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	  	<td colspan="2" style="border-left:3px solid #CCCCCC;background-color:#CCCCCC">
                        <input type="text" class="form-control" name="txtPricemathfulltop" id="txtPricemathfulltop<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น"  style="border:0px; height:50px">
                        </td>
                	</tr>
                	<tr style="background-color:#CCCCCC">
                    	<td style="border-left:3px solid #CCCCCC;border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; "><button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulltop<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button></td>
    					<td><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button>                		</td>
                	</tr>
                </table>
            <input type="hidden" name="cmd" value="today" />
            <input type="hidden" name="subcmd" value="save" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulltop1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>      


<script>
document.getElementById("btnmathfulltop<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulltop<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulltop<?=$objmatch2["mat_id"];?>');
txtPricemathfulltop<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulltop<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulltop<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulltop<?=$objmatch2["mat_id"];?>.value*<?=$objmatch2["mat_fulltop1"];?>;

	if (txtPricemathfulltop<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulltop<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulltop<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulltop<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>
          
               	<div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">เยือน</div>
                
                <a data-toggle="modal" data-target="#playbetC<?=$objmatch2["mat_id"];?>" style="cursor:pointer">
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway1"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway2"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_hdpaway3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_hdpaway3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_hdpaway3"];?></button>
                    <? } ?>
                </div>
                
                </a>
<div class="modal fade" id="playbetC<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetC<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC">1 คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลเต็ง</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font> | 2.0 @<?=$objmatch2["mat_hdpaway1"] = str_replace('<br>', ' ', $objmatch2["mat_hdpaway1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC; background-color:#FFFFCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="background-color:#FFFFCC; color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC">
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
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathhdpaway<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr>
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	  	<td colspan="2" style="border-left:3px solid #CCCCCC;background-color:#CCCCCC"><input type="text" class="form-control" name="txtPricemathhdpaway" id="txtPricemathhdpaway<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:50px"></td>
                	</tr>
                	<tr style="background-color:#CCCCCC">
                    	<td style="border-left:3px solid #CCCCCC;border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; "><button class="btn btn-block btn-success thaisan" type="submit" id="btnmathhdpaway<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button></td>
    					<td><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button>                		</td>
                	</tr>
                </table>
            <input type="hidden" name="cmd" value="today" />
            <input type="hidden" name="subcmd" value="save" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_hdpaway1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>


<script>
document.getElementById("btnmathhdpaway<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathhdpaway<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathhdpaway<?=$objmatch2["mat_id"];?>');
txtPricemathhdpaway<?=$objmatch2["mat_id"];?>.onkeyup = btnmathhdpaway<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathhdpaway<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathhdpaway<?=$objmatch2["mat_id"];?>.value*<?=$objmatch2["mat_hdpaway1"];?>;

	if (txtPricemathhdpaway<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathhdpaway<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathhdpaway<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathhdpaway<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>

                <div class="col-xs-1sths thaisan" style="padding-top:20px ; padding-bottom:20px; font-size:10px; color:#333333" align="center">ต่ำ</div>
                
                <a data-toggle="modal" data-target="#playbetD<?=$objmatch2["mat_id"];?>" style="cursor:pointer">

                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown1"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown1"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown1"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown2"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown2"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown2"];?></button>
                    <? } ?>
                </div>
                
                <div class="col-xs-2sths">
                	<? if(strlen($objmatch2["mat_fulldown3"]) > 4){ ?>
                	<button class="btn btn-default btn-block" style="margin-bottom:5px"><?=$objmatch2["mat_fulldown3"];?></button>
                    <? }else{ ?>
                    <button class="btn btn-default btn-block" style="margin-bottom:5px; padding-top:16px ; padding-bottom:16px"><?=$objmatch2["mat_fulldown3"];?></button>
                    <? } ?>
                </div>

				</a>
<div class="modal fade" id="playbetD<?=$objmatch2["mat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="playbetD<?=$objmatch2["mat_id"];?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="row">
            <div class="modal-header" style="background-color:#666666">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพัน เต็ม-HDP (บ้าน)</h4>
            </div>
            </div>
            
			<div class="row" style="background-color:#999999; color:#333333">
            	<div class="col-xs-4" align="center" style="background-color:#CCCCCC">1 คู่ | ลด 0%</div>
                <div class="col-xs-8 thaisan" align="center"><font color="#FF0000">บอลเต็ง</font></div>
			</div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
				<div class="col-xs-4" style="margin-top:20px" align="center">1</div>
                <div class="col-xs-8 thaisan" style="background-color:#CCCCCC"><strong>กระชับมิตรสโมสร</strong><br>
				<font color="#0066FF"><?=$objmatch2["mat_teamname1"];?></font> VS <font color="#FF0000"><?=$objmatch2["mat_teamname2"];?></font><br>
				เล่น : <font color="#0066FF">ต่ำ</font> | 2.0 @<?=$objmatch2["mat_fulldown1"] = str_replace('<br>', ' ', $objmatch2["mat_fulldown1"]);?></div>
            </div>
            
            <div class="row" style="background-color:#FFFFFF; color:#333333">
            <form method="post" action="">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:3px solid #CCCCCC; background-color:#FFFFCC">
                	<tr>
                	  	<td rowspan="2">
                      		<table cellpadding="0" cellspacing="0" width="100%" style="background-color:#FFFFCC; color:#333333">
                            	<tr style="border-bottom:3px solid #CCCCCC">
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
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;รับสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">
<span id="userMsgmathfulldown<?=$objmatch2["mat_id"];?>"></span></font> บาท</td>
                                </tr>
                                <tr style="border-bottom:3px solid #CCCCCC">
                                	<td align="right" class="thaisan">&nbsp;เล่นต่ำสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">50</font> บาท</td>
                                </tr>
                                <tr>
                                	<td align="right" class="thaisan">&nbsp;เล่นสูงสุด :</td>
                                    <td align="right">&nbsp;<font color="#0066FF">100,000</font> บาท</td>
                                </tr>
                          	</table>
                      	</td>
                	  	<td colspan="2" style="border-left:3px solid #CCCCCC;background-color:#CCCCCC"><input type="text" class="form-control" name="txtPricemathfulldown" id="txtPricemathfulldown<?=$objmatch2["mat_id"];?>" placeholder="กรอกยอดเล่น" style="border:0px; height:50px"></td>
                	</tr>
                	<tr style="background-color:#CCCCCC">
                    	<td style="border-left:3px solid #CCCCCC;border-right:3px solid #CCCCCC; border-top:3px solid #CCCCCC; "><button class="btn btn-block btn-success thaisan" type="submit" id="btnmathfulldown<?=$objmatch2["mat_id"];?>" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button></td>
    					<td><button class="btn btn-block btn-danger thaisan" type="button" data-dismiss="modal" style="margin-top:0px"><strong>ยกเลิก</strong></button>                		</td>
                	</tr>
                </table>
            <input type="hidden" name="cmd" value="today" />
            <input type="hidden" name="subcmd" value="save" />
            <input type="hidden" name="odd" value="<?=$objmatch2["mat_fulldown1"];?>" />
            <input type="hidden" name="date" value="<?=date("Y-m-d H:i:s");?>" />
			</form>
			</div>
     	</div>
   	</div>
</div>   

<script>
document.getElementById("btnmathfulldown<?=$objmatch2["mat_id"];?>").disabled = true;

var txtPricemathfulldown<?=$objmatch2["mat_id"];?> = document.getElementById('txtPricemathfulldown<?=$objmatch2["mat_id"];?>');
txtPricemathfulldown<?=$objmatch2["mat_id"];?>.onkeyup = btnmathfulldown<?=$objmatch2["mat_id"];?> = function() {

document.getElementById('userMsgmathfulldown<?=$objmatch2["mat_id"];?>').innerHTML = txtPricemathfulldown<?=$objmatch2["mat_id"];?>.value*<?=$objmatch2["mat_fulldown1"];?>;

	if (txtPricemathfulldown<?=$objmatch2["mat_id"];?>.value < 50){
	document.getElementById("btnmathfulldown<?=$objmatch2["mat_id"];?>").disabled = true;
	} else if (txtPricemathfulldown<?=$objmatch2["mat_id"];?>.value > 49){
	document.getElementById("btnmathfulldown<?=$objmatch2["mat_id"];?>").disabled = false;
	}
};		
</script>           
     			</div>
                <? } ?>
                
   <? } ?>                  
                
                
  


                
                </div>
				