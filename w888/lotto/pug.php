
<script>
var types=[];

types[1]=[1,5,9,13,17,21,25,29,33,37];

types[2]=[2,6,10,14,18,22,26,30,34,38];

types[3]=[3,7,11,15,19,23,27,31,35,39];



types[4]=[0,3,6,9,12,15,18,21,24,27];

types[5]=[1,4,7,10,13,16,19,22,25,28];

types[6]=[2,5,8,11,14,17,20,23,26,29];



types[7]=[0,2,4,6,8,10,12,14,16,18];

types[8]=[1,3,5,7,9,11,13,15,17,19];





function fcopymoney(ty,fnumber){

	var fnum=document.getElementById(fnumber).value;

	if(fnum!=""){ for(i=1;i<10;i++){ document.getElementById('tab'+types[ty][i]).value = fnum; } }	

}



function fdisabled(ty,bcopy){

	if(document.getElementById(bcopy+'c').checked==true){

		document.getElementById(bcopy+'money').disabled = false;

		document.getElementById(bcopy+'money').className = "btn_le";

		for(var i=0;i<10;i++){ 
   		    var e = document.getElementById('tab'+types[ty][i]);
   		    e.className = e.className.replace(/txt_disabled/g, 'txt_center12n'); 
   		    e.disabled = false; 
   		}
		// for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_center12n"; }

		// for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; }

	}else{

		document.getElementById(bcopy+'money').disabled = true;

		document.getElementById(bcopy+'money').className = "btn_dis";

		for(var i=0;i<10;i++){ 
        	var e = document.getElementById('tab'+types[ty][i]);
   			e.className = e.className.replace(/txt_center12n/g, 'txt_disabled');
   			e.disabled = true; 
   		}
		// for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_disabled"; }

		// for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; }

	}

}

function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			     
	//0-9 (numpad,keyboard)
	if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
	//backspace,delete,left,right,home,end
	if (',8,46,37,39,36,35,9,'.indexOf(','+keyCode+',')!=-1){ return true; }          
	return false;
}
function next_enter(event,el){
	var e=window.event?window.event:event;
	  var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;              
	  if(keyCode==13){
	  	var nex_txt = el+1;
	  	for(var i=nex_txt;i<=30;i++){
	  		if(i==30){
	  			i=0;
	  		}
	  		if($("#tab"+i).length)  {
	  			if($("#tab"+i).attr("disabled")){
	  			}else{
	  				$("#tab"+i).focus();
	  				break;
	  			}
	  		}
	  	}
	  }
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div  class="countdown" style="margin: 3px 0px 0px 23px;"> 
        <script type="application/javascript">
var myCountdown1 = new Countdown({
									time: <?=$re_ok['o_limit_time']-$time_stam;?> , // 86400 seconds = 1 day
									//time: 86400,
									width:250, 
									height:40,  
									rangeHi:"day",
                   <?
                     if($re_ok['o_limit_time']<$time_stam){ 
                          }else{
                        ?>
                                                      onComplete: countdownComplete ,
                                                      <? } ?>
									style:"flip"	// <- no comma on last item!
									});

</script> 
      </div>
      <div style="clear:both;"></div></td>

      <td>
      	<table width="100%" cellspacing="2" cellpadding="0" class="lotto_open_table">
          <tr>
            <th><?=$lang_member[1436]?></th>
            <th><?=$lang_member[1432]?></th>
            <th><?=$lang_member[1433]?></th>
          </tr>
          <tr>
            <td align="center"><?=date('d-m-Y',$re_ok['o_limit_time']);?></td>
            <td align="center"><?=date('H:i',$re_ok['o_limit_time']);?></td>
            <td align="center"><?=date('H:i',$re_ok['o_limit_time_lang']);?></td>
          </tr>
        </table>
      </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top" width="305">
            
                                     <?
                     if($re_ok['o_limit_time']<$time_stam || ($rec['con_open_lotto']==0 )){ 
					 		echo"<center><h2 class='cr'>$lang_member[317]</h1></center>";
						   	echo"<center>".parseTemplate($lang_member[591], array('{n}'=>$day_mid_open))."</center>";
               				echo"<br><center>".parseTemplate($lang_member[592], array('{n}'=>$day_last_open))."</center>";
               				echo"<br><center><strong>".parseTemplate($lang_member[595], array('{n}'=>$time_close1))."</strong></center><br>";
					  }else{
					  ?>   
                      
                      <form method="post" id="InputForm" name="InputForm" action="save_data.php" target="ifdb" style="display:inline">
    <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td height="335" id="vdata">  
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tbody><tr>
            <td height="25" colspan="4" align="center" class="tb_title_lotto"><?=$lang_member[484]?></td>
          </tr>
          <tr>
            <td></td>
            <td align="center"><? if($lot_pay_big5[21]>0){ ?><input name="col1money" type="button" class="btn_le btn_small w50px yellow" id="col1money" value="<?=$lang_member[371];?>" onClick="fcopymoney(4,'tab0')" ><? } ?></td>
            <td align="center"><? if($lot_pay_big5[22]>0){ ?><input name="col2money" type="button" class="btn_le btn_small w50px yellow" id="col2money" value="<?=$lang_member[371];?>" onClick="fcopymoney(5,'tab1')" ><? } ?></td>
            <td align="center"><? if($lot_pay_big5[23]>0){ ?><input name="col3money" type="button" class="btn_le btn_small w50px yellow" id="col3money" value="<?=$lang_member[371];?>" onClick="fcopymoney(6,'tab2')" s><? } ?></td>
          </tr>
          <tr class="txt_back12btitle">
            <td width="76" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
            <td width="110" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
              <tbody><tr>
                <td><? if($lot_pay_big5[21]>0){ ?><input name="col1c" type="checkbox" id="col1c" checked="checked" onClick="fdisabled(4,'col1')"><? } ?></td>
                <td><?=$lang_member[534]?></td>
              </tr>
            </tbody></table></td>
            <td width="110" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
              <tbody><tr>
                <td><? if($lot_pay_big5[22]>0){ ?><input name="col2c" type="checkbox" id="col2c" checked="checked" onClick="fdisabled(5,'col2')"><? } ?></td>
                <td><?=$lang_member[535]?></td>
              </tr>
            </tbody></table></td>
            <td width="110" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
              <tbody><tr>
                <td><? if($lot_pay_big5[23]>0){ ?><input name="col3c" type="checkbox" id="col3c" checked="checked" onClick="fdisabled(6,'col3')"><? } ?></td>
                <td><?=$lang_member[536]?></td>
              </tr>
            </tbody></table></td>
          </tr>
          <? 
							$tab = 0;
							for($i=0;$i<10;$i++){ 
							?>
          <tr>
            <td height="22" align="center" class="bg_td"><input name="num<?=$i?>" type="text" class="txt_center12br input lotnum _<?=$i?>" data-lotbet-row="<?=$i?>" value="<?=$i?>" size="5" readonly></td>
            <td align="center" class="bg_td"><? if($lot_pay_big5[21]>0){ ?><input name="col1<?=$i?>" type="text" class="txt_center12n input input lotbet 1 _<?=$i?>" data-lotbet-col="1" data-lotbet-row="<?=$i?>" id="tab<?=$tab?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);"><? } ?></td>
            <td align="center" class="bg_td"><? if($lot_pay_big5[22]>0){ ?><input name="col2<?=$i?>" type="text" class="txt_center12n input input lotbet 2 _<?=$i?>" data-lotbet-col="2" data-lotbet-row="<?=$i?>" id="tab<?=$tab=$tab+1?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);"><? } ?></td>
            <td align="center" class="bg_td"><? if($lot_pay_big5[23]>0){ ?><input name="col3<?=$i?>" type="text" class="txt_center12n input input lotbet 3 _<?=$i?>" data-lotbet-col="3" data-lotbet-row="<?=$i?>" id="tab<?=$tab=$tab+1?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);"><? } ?></td>
          </tr>
          <? $tab=$tab+1; } ?>

          	<tr>
              <td class="bg_td lotbet_sum_cell text-bold"><?=$lang_member[611];?></td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum 1">0</td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum 2">0</td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum 3">0</td>
            </tr>
			<tr>
              <td  colspan="4" class="bg_td lotbet_sum_cell text-right lotbet-col-sum total">
                  <span class="text-bold"><?=$lang_member[700];?>: </span><span class="tt">0</span>
              </td>
            </tr>
          <tr>
                              <td height="33" colspan="4" align="center" class="bg_td">
                              <span style="width: 10%!important;"><?=$lang_member[495]?>:</span>
      	<input name="bill_cus_name"   type="text" class="txtq2" id="bill_cus_name" style="width: 40%!important;" />
      	<span style="width: 10%!important;"><?=$lang_member[496]?>:</span>
      	<input name="bill_no"  onkeydown="return numberonly(event);" type="tel" class="txtq2" id="bill_no" style="width: 20%!important;" />
                                </td>
                            </tr>
          <tr>
            <td height="33" colspan="4" align="center" class="bg_td"><span style="float:left; text-align:left; display:block; padding-left:5px;">
                              <?=$lang_member[379];?> <?=$_SESSION['m_currency'];?> <?=$emin[1];?> <br>
<?=$lang_member[380];?> <?=$_SESSION['m_currency'];?> <?=number_format($emax[1]);?>  </span>
<div style="padding-top:5px;">
            	<input type="hidden" id="func" name="func">
                <input type="hidden" id="cnt" name="cnt" value="<?=$tab-1?>">
                <input type="hidden" id="maintype" name="maintype" value="numberrunning">
            	<input name="btsave" type="button" class="btn_le btn_small w60px" id="btsave" value="<?=$lang_member[121];?>" onClick="save_lotto()" <?=$disabled?> >
                <input name="btreset" type="reset" class="btn_le btn_small w60px danger" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> ></div>
                <br>
         	</td>
          </tr>
     
        </tbody></table>
         
</td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
     
      </tbody></table>
    </form>
    <? }?></td>
            <td></td>
            <td align="center" valign="top" id="vdata2"></td>
          </tr>
          <tr>
            <td valign="top" class="txt_red12n"></td>
            <td></td>
            <td align="center" valign="top"></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
</table>
<script>

var submitting = false;

function save_lotto(){
	if(submitting == false){
		submitting = true;
		
	$("#btsave").hide();
	$("#btreset").hide();
	
	var lotto = new Array();
	var nlot = 0;
	var alot = 0;
	for(var cc=0;cc<10;cc++){
		var num = cc;
		if($("#tab"+nlot).attr('disabled')){
			var l3up=  "";
		}else{
			var l3up=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;
		if($("#tab"+nlot).attr('disabled')){
			var l3tod=  "";
		}else{
			var l3tod=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;
		if($("#tab"+nlot).attr('disabled')){
			var l100=  "";
		}else{
			var l100=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;
		if(l3up!="" || l3tod!="" || l100!=""){
				lotto[alot] = num+","+l3up+","+l3tod+","+l100;
				alot++;
		}
	}
	/*console.log(lotto);
	return false;*/
	if(lotto.length<=0){
		alert("<?=$lang_member[439];?>");
		$("#btsave").show();
		$("#btreset").show();
		submitting = false;
	}else{
		//var rcc = confirm("<?=$lang_member[1042];?>");
		var rcc = true;
		if (rcc == true) {	
			$.ajax({
				type: "POST",
				url: "lotto/save_lotto.php",
				data: { "lotto": lotto , "tlot": 7 , "zone": 1 , "rob": 1 , "bill_cus_name": $("#bill_cus_name").val() , "bill_no": $("#bill_no").val() },
				dataType:"json",
				cache: false,	// Clear cache IE
				beforeSend: function(){
					$("#statussave").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;'>");
				},
				success: function(data){
					if(data.res==1){
						$("#statussave").html(data.txt);
						$("#btsave").removeAttr('disabled');
						$(".txt_center12b").val("");
						$(".txt_center12n").val("");
						$(".txt_disabled").val("");
						parent.leftx.get_credit();
						parent.leftx.result_save(data.txt);
					}else{
						parent.leftx.result_save(data.txt);
						$("#btsave").removeAttr('disabled');
					}
					load_list(7);
					$("#btsave").show();
					$("#btreset").show();
					submitting = false;
				}
			});	
		}else{
			$("#btsave").removeAttr('disabled');
		}
	}
	}//if(submitting == false){
}
</script>