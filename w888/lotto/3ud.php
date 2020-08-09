<script>

var types=[];

types[1]=[<? $it1=1; for($it=0;$it<20;$it++){ echo $it1; $it1=$it1+4; if($it<19){ echo ","; } } ?>];

types[2]=[<? $it1=2; for($it=0;$it<20;$it++){ echo $it1; $it1=$it1+4; if($it<19){ echo ","; } } ?>];

types[3]=[<? $it1=3; for($it=0;$it<20;$it++){ echo $it1; $it1=$it1+4; if($it<19){ echo ","; } } ?>];



types[4]=[0,3,6,9,12,15,18];

types[5]=[1,4,7,10,13,16,19];

types[6]=[2,5,8,11,14,17,20];



types[7]=[0,2,4,6,8,10,12,14,16,18];

types[8]=[1,3,5,7,9,11,13,15,17,19];

function fnumcrossx(){
   	var fnum=document.getElementById('tab0').value;
	if(fnum.length==3){	
		for(i=1;i<20;i++){ document.getElementById('tab'+(i*4)).value = ''; }	
		var vu = [];
		var org_vu = [];	
		var txtv0=fnum.substr(0,1);	
		var txtv1=fnum.substr(1,1);
		var txtv2=fnum.substr(2,1);
		
		var val1 = txtv0+txtv2+txtv1;
		var val2 = txtv1+txtv2+txtv0;	
		var val3 = txtv1+txtv0+txtv2;
		var val4 = txtv2+txtv0+txtv1;
		var val5 = txtv2+txtv1+txtv0;
		
		vu[0] = fnum;
		org_vu[0] = fnum;
		org_vu[1] = val1;
		org_vu[2] = val2;
		org_vu[3] = val3;
		org_vu[4] = val4;
		org_vu[5] = val5;
		
		var x=1;
		for(i=1;i<6;i++){
			var ck='Y';
			for(s=0;s<i;s++){ if(vu[s]==org_vu[i]){ ck='N'; } }
			if(ck=='Y'){ vu[x]=org_vu[i]; x++; }
		}
		for(i=1;i<6;i++){ if(vu[i]){ document.getElementById('tab'+(i*4)).value = vu[i]; } }
	}	
for(i=0;i<20;i++){ chtype(i) }
}



function fcopymoney(ty,fnumber){

	var fnum=document.getElementById(fnumber).value;

	if(fnum!=""){ for(i=1;i<20;i++){ document.getElementById('tab'+types[ty][i]).value = fnum; } }	

}



function fdisabled(ty,bcopy){

	if(document.getElementById(bcopy+'c').checked==true){

		document.getElementById(bcopy+'money').disabled = false;

		document.getElementById(bcopy+'money').className = "btn_le";

    for(var i=0;i<20;i++){ 
        var e = document.getElementById('tab'+types[ty][i]);
        e.className = e.className.replace(/txt_disabled/g, 'txt_center12n'); 
        e.disabled = false; 
        chtype(i);
    }

		// for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_center12n"; }

		// for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; chtype(i) }

	}else{

		document.getElementById(bcopy+'money').disabled = true;

		document.getElementById(bcopy+'money').className = "btn_dis";

    for(var i=0;i<20;i++){ 
        var e = document.getElementById('tab'+types[ty][i]);
        e.className = e.className.replace(/txt_center12n/g, 'txt_disabled');
        e.disabled = true; 
        chtype(i); 
    }

		// for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_disabled"; }

		// for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; chtype(i) }

	}

}

/*function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			     
	//0-9 (numpad,keyboard)
	if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
	//backspace,delete,left,right,home,end
	if (',8,46,37,39,36,35,9,'.indexOf(','+keyCode+',')!=-1){ return true; }          
	return false;
}*/
function numberonly(event,el){
  var e=window.event?window.event:event;
  var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;              
  //0-9 (numpad,keyboard)
  //alert(keyCode);
  if ((keyCode>=96 && keyCode<=106)||(keyCode>=48 && keyCode<=57)){ return true; }
  //backspace,delete,left,right,home,end
  if (',8,46,37,39,36,35,9,'.indexOf(','+keyCode+',')!=-1){ return true; }          
  return false;
}
function next_enter(event,el){
	var e=window.event?window.event:event;
	  var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;              
	  if(keyCode==13){
	  	var nex_txt = el+1;
	  	for(var i=nex_txt;i<=80;i++){
	  		if(i==80){
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
    <td width="300"><div  class="countdown" style="margin: 3px 0px 0px 23px;"> 
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
	  <td><input type="button" class="btn_le btn_small" value="<?=$lang_member[487]?>" onClick="window.location.href='main_lotto.php?tlot=3ud100&vvw='+fw"></td>
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
    <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top" width="305">
                                     <?
				
				
				
            if($re_ok['o_limit_time']<$time_stam || ($rec["con_open_lotto"]==0)){ 
					     echo"<center><h2 class='cr'>$lang_member[317]</h1></center>";
						   echo"<center>".parseTemplate($lang_member[591], array('{n}'=>$day_mid_open))."</center>";
               echo"<br><center>".parseTemplate($lang_member[592], array('{n}'=>$day_last_open))."</center>";
               echo"<br><center><strong>".parseTemplate($lang_member[595], array('{n}'=>$time_close1))."</strong></center><br>";
					  }else{
					  ?>   
                      <form method="post" id="InputForm" name="InputForm" target="ifdb" style="display:inline">
                <table width="300" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td height="335" id="vdata"><table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
                            <tr>
                              <td height="25" colspan="5" align="center" class="tb_title_lotto"><?=$lang_member[483]?> [ <?=$lang_member[486]?> ]</td>
                            </tr>
                            <tr>
                              <td align="center"><input name="numcross" type="button" class="btn_le btn_small w50px yellow" id="numcross" value="<?=$lang_member[492];?>" onClick="fnumcrossx()" ></td>
                              <td align="center"><input name="col1money" type="button" class="btn_le btn_small w50px yellow" id="col1money" value="<?=$lang_member[371];?>" onClick="fcopymoney(1,'tab1')" ></td>
                              <td align="center"><input name="col2money" type="button" class="btn_le btn_small w50px yellow" id="col2money" value="<?=$lang_member[371];?>" onClick="fcopymoney(2,'tab2')" ></td>
                              <td align="center"><input name="col3money" type="button" class="btn_le btn_small w50px yellow" id="col3money" value="<?=$lang_member[371];?>" onClick="fcopymoney(3,'tab3')" ></td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr class="txt_back12btitle">
                              <td width="56" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
                              <td width="58" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
                                  <tbody>
                                    <tr>
                                      <td><input name="col1c" type="checkbox" id="col1c" checked="checked" onClick="fdisabled(1,'col1')"></td>
                                      <td><?=$lang_member[448]?></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                              <td width="58" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
                                  <tbody>
                                    <tr>
                                      <td><?     if($re_ok['o_limit_time_lang']>$time_stam){?><input name="col2c" type="checkbox" id="col2c" checked="checked" onClick="fdisabled(2,'col2')"><? }?></td>
                                      <td><?=$lang_member[450]?></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                              <td width="58" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
                                  <tbody>
                                    <tr>
                                      <td><input name="col3c" type="checkbox" id="col3c" checked="checked" onClick="fdisabled(3,'col3')"></td>
                                      <td><?=$lang_member[209]?></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                            </tr>
                            <? 
							$tab = 0;
							for($i=0;$i<20;$i++){ 
							?>
                            <tr>
                              <td height="22" align="center" class="bg_td"><input name="num<?=$i?>" type="text" class="txt_center12b input lotnum _<?=$i?>" data-lotbet-row="<?=$i?>" id="tab<?=$tab?>" size="6" maxlength="3" onKeyDown="return numberonly(event,this)" onKeyUp="chtype(<?=$i?>); next_enter(event,<?=$tab?>); csetfocus(1,<?=$i;?>,event);" style="width: 50px;"></td>
                              <td align="center" class="bg_td"><input name="col1<?=$i?>" type="text" class="txt_center12n input lotbet 1 _<?=$i?>" data-lotbet-col="1" data-lotbet-row="<?=$i?>" id="tab<?=$tab=$tab+1?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);" style="width: 50px;"></td>
                              <td align="center" class="bg_td"><input name="col2<?=$i?>" type="text" class="txt_center12n input lotbet 2 _<?=$i?>" data-lotbet-col="2" data-lotbet-row="<?=$i?>" id="tab<?=$tab=$tab+1?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" <?     if($re_ok['o_limit_time_lang']<$time_stam){echo' placeholder="'.$lang_member[612].'" disabled="disabled"'; }?> onKeyUp="next_enter(event,<?=$tab?>);" style="width: 50px;"></td>
                              <td align="center" class="bg_td"><input name="col3<?=$i?>" type="text" class="txt_center12n input lotbet 3 _<?=$i?>" data-lotbet-col="3" data-lotbet-row="<?=$i?>" id="tab<?=$tab=$tab+1?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);" style="width: 50px;"></td>
                              <td align="center" class="bg_td">
                                <input type="checkbox" name="chk6g<?=$i;?>" id="chk6g<?=$i;?>" value="1" style="width: 14px; height: 14px;" onClick="call_sum_check(<?=$i;?>);" class="lotbet_cross _<?=$i?>" data-lotbet-row="<?=$i?>" data-cross-value="6"> <label for="chk6g<?=$i;?>" id="lbl_chk6g<?=$i;?>">6 <?=$lang_member[492]?></label>
                                <input name="ngub<?=$i;?>"   type="hidden" class="txtq2" id="ngub<?=$i;?>" value="1" />
                            </td>
                            </tr>
                            <? $tab=$tab+1; } ?>
                        
            <tr>
              <td class="bg_td lotbet_sum_cell text-bold"><?=$lang_member[611];?></td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum 1">0</td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum 2">0</td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum 3">0</td>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum total">
                <span class="text-bold"><?=$lang_member[700];?>: </span><span class="tt">0</span>
              </td>
            </tr>
                            
                            <tbody>
                            <tr>
                              <td height="33" colspan="5" align="center" class="bg_td">
                              <span style="width: 10%!important;"><?=$lang_member[495]?>:</span>
      	<input name="bill_cus_name"   type="text" class="txtq2" id="bill_cus_name" style="width: 40%!important;" />
      	<span style="width: 10%!important;"><?=$lang_member[496]?>:</span>
      	<input name="bill_no"  onkeydown="return numberonly(event);" type="tel" class="txtq2" id="bill_no" style="width: 20%!important;" />
                                </td>
                            </tr>
                            <tr>
                              <td height="33" colspan="5" align="center" class="bg_td">
                              <br>
                              <span style="float:left; text-align:left; display:block; padding-left:5px;">
                              <?=$lang_member[379];?> <?=$_SESSION['m_currency'];?> <?=$emin[1];?> <br>
<?=$lang_member[380];?> <?=$_SESSION['m_currency'];?> <?=number_format($emax[1]);?> </span>
<div style="padding-top:5px;">
<input type="hidden" id="func" name="func">
                                <input type="hidden" id="cnt" name="cnt" value="<?=$tab-1?>">
                                <input type="hidden" id="maintype" name="maintype" value="number3">
                                <input name="btsave" type="button" class="btn_le btn_small w60px" id="btsave" value="<?=$lang_member[121];?>" onClick="save_lotto()" <?=$disabled?>  >
                                <input name="btreset" type="button" class="btn_le btn_small w60px danger" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> onClick="clear_txt();">
                                </div>
                                <br>
                                </td>
                            </tr>
               
                         
                          </tbody>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                  
                  </tbody>
                </table>
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
<style>
.disRed {
	background:red;
}
</style>
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
	for(var cc=0;cc<20;cc++){
		var num = $.trim($("#tab"+nlot).val());
		var _chk6 	= $('#chk6g'+cc).prop("checked");
		nlot=nlot+1;
		//console.log($("#tab"+nlot).attr('disabled'));
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
			var l3down=  "";
		}else{
			var l3down=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;
		
		if(num && _chk6 == true)
		{
			var arrCrossNum = fnumcross(num);
			//console.log(arrCrossNum);
			if(arrCrossNum.length > 1)
			{
				//_num = '';
				$.each(arrCrossNum, function(index, val) {
					if(val!="" && (l3up!="" || l3tod!="" || l3down!="")){
						if(val.length==3){
						  lotto[alot] = val+","+<? if($lot_pay_big5[1]>0){ ?>l3up+<? } ?>","+<? if($lot_pay_big5[3]>0){ ?>l3down+<? } ?>","<? if($lot_pay_big5[2]>0  or $lot_pay_big5[17]>0){ ?>+l3tod<? } ?>;
							alot++;		
						}else if(val.length==2){
					  lotto[alot] = val+","+<? if($lot_pay_big5[4]>0){ ?>l3up+<? } ?>","+<? if($lot_pay_big5[24]>0){ ?>l3down+<? } ?>","<? if($lot_pay_big5[5]>0){ ?>+l3tod<? } ?>;
							alot++;
						}else if(val.length==1){
						lotto[alot] = val+","+<? if($lot_pay_big5[6]>0){ ?>l3up+<? } ?>",,"<? if($lot_pay_big5[7]>0){ ?>+l3tod<? } ?>;
							alot++;
						}
					}
					

					if(index == arrCrossNum.length-1)
						return false;

					//_num += '+';
				});
			}
		}else{
			if(num!="" && (l3up!="" || l3tod!="" || l3down!="")){
			if(num.length==3){
			  lotto[alot] = num+","+<? if($lot_pay_big5[1]>0){ ?>l3up+<? } ?>","+<? if($lot_pay_big5[3]>0){ ?>l3down+<? } ?>","<? if($lot_pay_big5[2]>0  or $lot_pay_big5[17]>0){ ?>+l3tod<? } ?>;
				alot++;
			}else if(num.length==2){
		  lotto[alot] = num+","+<? if($lot_pay_big5[4]>0){ ?>l3up+<? } ?>","+<? if($lot_pay_big5[24]>0){ ?>l3down+<? } ?>","<? if($lot_pay_big5[5]>0){ ?>+l3tod<? } ?>;
				alot++;
			}else if(num.length==1){
			lotto[alot] = num+","+<? if($lot_pay_big5[6]>0){ ?>l3up+<? } ?>",,"<? if($lot_pay_big5[7]>0){ ?>+l3tod<? } ?>;
				alot++;
			}
		}
		}
	}
	
	/*console.log(lotto);
	return false;*/
	//console.log(lotto);
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
				data: { "lotto": lotto , "tlot": 1 , "zone": 1 , "rob": 1 , "bill_cus_name": $("#bill_cus_name").val() , "bill_no": $("#bill_no").val() },
				dataType:"json",
				cache: false,	// Clear cache IE
				beforeSend: function(){
					$("#statussave").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;'>");
				},
				success: function(data){
					console.log(data.logs);
					if(data.res==1){
						$("#statussave").html(data.txt);
						$("#btsave").removeAttr('disabled');
						$(".txt_center12b").val("");
						$(".txt_center12n").val("");
						$(".txt_disabled").val("");
						parent.leftx.get_credit();
						for(i=0;i<20;i++){ chtype(i);$("#chk6g"+i).prop("checked" , false); }
						parent.leftx.result_save(data.txt);
					}else{
						parent.leftx.result_save(data.txt);
						$("#btsave").removeAttr('disabled');
					}
					load_list(1);
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
function load_6g(num){

}
function chtype(i){
	var val = $("input[name='num"+i+"']").val();
	if(val.length==1){
		
		if($("input[name='col3"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col3"+i+"']").addClass("disRed");	
			$("input[name='col3"+i+"']").attr("disabled" , "disabled");	
		}
		
		<? if($lot_pay_big5[6]>0){ ?>
		if($("input[name='col1"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col1"+i+"']").removeClass("disRed");
			$("input[name='col1"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col1"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col1"+i+"']").addClass("disRed");	
			$("input[name='col1"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
		<? if($lot_pay_big5[7]>0){ ?>
		if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col2"+i+"']").removeClass("disRed");
			$("input[name='col2"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col2"+i+"']").addClass("disRed");	
			$("input[name='col2"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
	}else if(val.length==2){




		<? if($lot_pay_big5[4]>0){ ?>
		if($("input[name='col1"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col1"+i+"']").removeClass("disRed");
			$("input[name='col1"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col1"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col1"+i+"']").addClass("disRed");	
			$("input[name='col1"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
		<? if($lot_pay_big5[24]>0){ ?>
		if($("input[name='col3"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col3"+i+"']").removeClass("disRed");
			$("input[name='col3"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col3"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col3"+i+"']").addClass("disRed");	
			$("input[name='col3"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
		<? if($lot_pay_big5[5]>0){ ?>
		if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col2"+i+"']").removeClass("disRed");
			$("input[name='col2"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col2"+i+"']").addClass("disRed");	
			$("input[name='col2"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>

    var res = val.split("");
        //console.log(res);
        if(res[0]!="*" && res[1]=="*"){
          if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
            $("input[name='col2"+i+"']").addClass("disRed");  
            $("input[name='col2"+i+"']").attr("disabled" , "disabled"); 
          }
        }


	}else{
		<? if($lot_pay_big5[1]>0){ ?>
		if($("input[name='col1"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col1"+i+"']").removeClass("disRed");
			$("input[name='col1"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col1"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col1"+i+"']").addClass("disRed");	
			$("input[name='col1"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
		<? if($lot_pay_big5[3]>0){ ?>
		if($("input[name='col3"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col3"+i+"']").removeClass("disRed");
			$("input[name='col3"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col3"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col3"+i+"']").addClass("disRed");	
			$("input[name='col3"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
		<? if($lot_pay_big5[2]>0){ ?>
		if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col2"+i+"']").removeClass("disRed");
			$("input[name='col2"+i+"']").removeAttr('disabled');
		}
		<? }else{ ?>
		if($("input[name='col2"+i+"']").attr("class")!="txt_disabled"){
			$("input[name='col2"+i+"']").addClass("disRed");	
			$("input[name='col2"+i+"']").attr("disabled" , "disabled");	
		}
		<? } ?>
	}
		
}
function clear_txt(){
	$("input[type='text']").val("");
	for(i=0;i<20;i++){ chtype(i); $("#chk6g"+i).prop("checked" , false); }
	//load_6g(1);
}
function fnumcross(fnum) {
	fnum = fnum.toString();

    var org_vu  = [];  
    var u       = {};
    var a       = [];
    var txtv0   = fnum.substr(0,1);   
    var txtv1   = fnum.substr(1,1);
    var txtv2   = fnum.substr(2,1);
    var val1    = txtv0+txtv2+txtv1;
    var val2    = txtv1+txtv2+txtv0; 
    var val3    = txtv1+txtv0+txtv2;
    var val4    = txtv2+txtv0+txtv1;
    var val5    = txtv2+txtv1+txtv0;

    org_vu[0]   = fnum;
    org_vu[1]   = val1;
    org_vu[2]   = val2;
    org_vu[3]   = val3;
    org_vu[4]   = val4;
    org_vu[5]   = val5;
    
    for(var i = 0, l = org_vu.length; i < l; ++i){
        if(u.hasOwnProperty(org_vu[i])) {
          continue;
        }
        a.push(org_vu[i]);
        u[org_vu[i]] = 1;
    }
    return a;
}
</script>