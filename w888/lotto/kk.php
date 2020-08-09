
<script>
function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			     
	//0-9 (numpad,keyboard)
	if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
	//backspace,delete,left,right,home,end
	if (',8,46,37,39,36,35,9,'.indexOf(','+keyCode+',')!=-1){ return true; }          
	return false;
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
      <!-- <td><b><?=$lang_member[1431]?> : </b><u><?=$day_open?></u> <b><?=$lang_member[1432]?> : </b><u><?=$time_close1?></u> <b><?=$lang_member[1433]?> : </b><u><?=$time_close2?></u></td> -->
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
            if($re_ok['o_limit_time']<$time_stam || ($rec['con_open_lotto']==0)){ 
					     echo"<center><h2 class='cr'>$lang_member[317]</h1></center>";
               echo"<center>".parseTemplate($lang_member[591], array('{n}'=>$day_mid_open))."</center>";
               echo"<br><center>".parseTemplate($lang_member[592], array('{n}'=>$day_last_open))."</center>";
               echo"<br><center><strong>".parseTemplate($lang_member[595], array('{n}'=>$time_close1))."</strong></center><br>";
					  }else{
					  ?>   
                      <form method="post" id="InputForm" name="InputForm" action="save_data.php" target="ifdb" style="display:inline">
    <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td id="vdata">  
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table" style="border-bottom: hidden;">
          <tbody><tr>
            <td height="25" colspan="3" align="center" class="tb_title_lotto"><?=$lang_member[446];?></td>
          </tr>
          </tbody></table>
          <? if(($lot_pay_big5[4]>0) or ($lot_pay_big5[5]>0)){ ?>
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tr class="txt_white12btitle">
            <td height="20" align="center" class="bg_table" colspan="3"><?=$lang_member[604];?> <select name="DropDownList1" id="DropDownList1" onChange="load_19h(this.value);">
                                <? for($l19h=1;$l19h<=10;$l19h++){ ?>
                                <option value="<?=$l19h?>"<? if($l19h==1){ ?> selected<? } ?>><?=$l19h?></option>
                                <? } ?>
                                </select> <?=$lang_member[532]?></td>
          </tr>
          <tr class="txt_white12btitle">
            <td width="75" height="20" align="center" class="bg_table"><?=$lang_member[381]?></td>
            <td width="75" align="center" class="bg_table"><?=$lang_member[448]?></td>
            <td width="75" align="center" class="bg_table"><?=$lang_member[450]?></td>
          </tr>
          <tbody id="tb_19h"><tr>
          <td height="22" align="center" class="bg_td"><input name="num19h1" type="text" class="txt_center12b input" id="num19h1" size="6" maxlength="1" onKeyDown="return numberonly(event,this)"></td>
                               <td align="center" class="bg_td"><? if($lot_pay_big5[4]>0){ ?><input name="up19h1" type="text" class="txt_center12n input" id="up19h1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)"><? }?></td>
                              <td align="center" class="bg_td"><? if($lot_pay_big5[5]>0){ ?><input name="down19h1" type="text" class="txt_center12n input" id="down19h1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" <?     if($re_ok['o_limit_time_lang']<$time_stam){echo' placeholder="'.$lang_member[612].'" disabled="disabled"'; }?>><? }?></td>
          </tr></tbody>
          </table>
          <? } ?>
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tr class="txt_white12btitle">
            <td height="20" align="center" class="bg_table" colspan="4">6 <?=$lang_member[492]?> <select name="DropDownList2" id="DropDownList2" onChange="load_6g(this.value);">
                                <? for($lg6=1;$lg6<=10;$lg6++){ ?>
                                <option value="<?=$lg6?>"<? if($lg6==1){ ?> selected<? } ?>><?=$lg6?></option>
                                <? } ?>
                                </select> <?=$lang_member[532]?></td>
          </tr>
          <tr class="txt_white12btitle">
            <td width="75" height="20" align="center" class="bg_table"><?=$lang_member[381]?></td>
            <td width="75" align="center" class="bg_table"><?=$lang_member[448]?></td>
            <td width="75" align="center" class="bg_table"><?=$lang_member[450]?></td>
            <td width="75" align="center" class="bg_table"><?=$lang_member[533]?></td>
          </tr>
          <tbody id="tb_6g">
                            <tr>
                              <td height="22" align="center" class="bg_td"><input name="num6g1" type="text" class="txt_center12b input" id="num6g1" size="6" maxlength="3" onKeyDown="return numberonly(event,this)"></td>
                              <td align="center" class="bg_td"><input name="up6g1" type="text" class="txt_center12n input" id="up6g1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
                              <td align="center" class="bg_td"><input name="down6g1" type="text" class="txt_center12n input" id="down6g1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" <?     if($re_ok['o_limit_time_lang']<$time_stam){echo' placeholder="'.$lang_member[612].'" disabled="disabled"'; }?>></td>
                              <td align="center" class="bg_td"><? if($lot_pay_big5[16]>0){ ?><input name="upf6g1" type="text" class="txt_center12n input" id="upf6g1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)"><? } ?></td>
                            </tr>
                            </tbody>
          </table>
          
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tbody><tr>
          <? if($lot_pay_big5[8]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][8];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" id="1hl1" name="nn0" checked="" value="H"><?=$lang_member[314];?></td>
            <td align="center" class="bg_td"><input type="radio" id="1hl2" name="nn0" value="L"><?=$lang_member[312];?></td>
            <td align="center" class="bg_td"><input name="col20" type="text" class="txt_center12n" id="tab0" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[9]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][9];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" id="2hl1" name="nn1" checked="" value="H"><?=$lang_member[314];?></td>
            <td align="center" class="bg_td"><input type="radio" id="2hl2" name="nn1" value="L"><?=$lang_member[312];?></td>
            <td align="center" class="bg_td"><input name="col21" type="text" class="txt_center12n" id="tab1" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[10]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][10];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" id="3hl1" name="nn2" checked="" value="H"><?=$lang_member[314];?></td>
            <td align="center" class="bg_td"><input type="radio" id="3hl2" name="nn2" value="L"><?=$lang_member[312];?></td>
            <td align="center" class="bg_td"><input name="col22" type="text" class="txt_center12n" id="tab2" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[11]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][11];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" id="2uhl1" name="nn3" checked="" value="H"><?=$lang_member[314];?></td>
            <td align="center" class="bg_td"><input type="radio" id="2uhl2" name="nn3" value="L"><?=$lang_member[312];?></td>
            <td align="center" class="bg_td"><input name="col23" type="text" class="txt_center12n" id="tab3" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"   <?     if($re_ok['o_limit_time_lang']<$time_stam){echo'disabled="disabled" placeholder="'.$lang_member[612].'"'; }?>></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[12]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][12];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" name="nn4" id="1ek1" checked="" value="E"><?=$lang_member[453];?></td>
            <td align="center" class="bg_td"><input type="radio" name="nn4" id="1ek2" value="K"><?=$lang_member[459];?></td>
            <td align="center" class="bg_td"><input name="col24" type="text" class="txt_center12n" id="tab4" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[13]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][13];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td" colspan="2"><input name="num5" id="num5" type="text" class="txt_center12b" size="8" maxlength="2" onKeyDown="return numberonly(event,this)"></td>
            <td align="center" class="bg_td"><input name="col25" type="text" class="txt_center12n" id="tab5" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[14]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][14];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td" colspan="2"><input name="num6" id="num6" type="text" class="txt_center12b" size="8" maxlength="4" onKeyDown="return numberonly(event,this)"></td>
            <td align="center" class="bg_td"><input name="col26" type="text" class="txt_center12n" id="tab6" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[15]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][1][15];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td" colspan="2"><input name="num7" id="num7" type="text" class="txt_center12b" size="8" maxlength="5" onKeyDown="return numberonly(event,this)"></td>
            <td align="center" class="bg_td"><input name="col27" type="text" class="txt_center12n" id="tab7" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
          <tr>
                              <td height="33" colspan="3" align="center" class="bg_td">
                              <span style="width: 10%!important;"><?=$lang_member[495]?>:</span>
      	<input name="bill_cus_name"   type="text" class="txtq2" id="bill_cus_name" style="width: 40%!important;" />
      	<span style="width: 10%!important;"><?=$lang_member[496]?>:</span>
      	<input name="bill_no"  onkeydown="return numberonly(event);" type="tel" class="txtq2" id="bill_no" style="width: 20%!important;" />
                                </td>
                            </tr>
          <tr>
            <td height="33" colspan="3" align="center" class="bg_td"><span style="float:left; text-align:left; display:block; padding-left:5px;">
                              <?=$lang_member[379];?> <?=$_SESSION['m_currency'];?> <?=$emin[1];?> <br>
<?=$lang_member[380];?> <?=$_SESSION['m_currency'];?> <?=number_format($emax[1]);?> </span>
<div style="padding-top:5px;">
            	<input type="hidden" id="func" name="func">
                <input type="hidden" id="cnt" name="cnt" value="4">
                <input type="hidden" id="maintype" name="maintype" value="numberrunning">
            	<input name="btsave" type="button" class="btn_le" id="btsave" value="<?=$lang_member[121];?>" onClick="save_lotto()" <?=$disabled?> style="width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:5px; line-height:10px;">
                                <input name="btreset" type="reset" onClick="load_19h(1); load_6g(1);" class="btn_le" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> style="width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:5px; line-height:10px; background:#F00;"></div>
         	</td>
          </tr>
    
        </tbody></table>
</td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
  
      </tbody></table>
    </form><? }?></td>
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
	for(var cc=0;cc<8;cc++){
		if(cc<5){
			var num = $('input[name=nn'+cc+']:checked', '#InputForm').val();
			var sum=  $.trim($("#tab"+cc).val());
			if(sum!=""){
				lotto[cc] = num+","+sum;
			}
		}else{
			var num = $('#num'+cc).val();
			var sum=  $.trim($("#tab"+cc).val());
			if(sum!=""){
				lotto[cc] = num+","+sum;
			}
		}
		alot = cc;
	}
	alot=alot+1;
	for(var cc19h=1;cc19h<=$("#DropDownList1").val();cc19h++){
		var num19h = $.trim($("#num19h"+cc19h).val());
		var up19h = $.trim($("#up19h"+cc19h).val());
		if($("#down19h"+cc19h).attr('disabled')){
			var down19h=  "";
		}else{
			var down19h=  $.trim($("#down19h"+cc19h).val());
		}
		if(num19h!="" && (up19h!="" || down19h!="")){
			if(num19h.length==1){
				var arr_li = [];
				var ali = 0;
				for(var li=0;li<10;li++){
					arr_li[ali] = li+""+num19h+","+up19h+","+down19h+",";
					ali++;
					arr_li[ali] = num19h+""+li+","+up19h+","+down19h+",";
					ali++;
				}
				var arr_li2 = [];
				arr_li2 = arr_li.filter(function (e, i, arr) {
					return arr.lastIndexOf(e) === i;
				});
				arr_li2.forEach(function(entry) {
					//console.log(entry);
					lotto[alot] = entry;
					alot++;
				});
			}
		}
	}
	for(var cc6g=1;cc6g<=$("#DropDownList2").val();cc6g++){
		var num6g = $.trim($("#num6g"+cc6g).val());
		var up6g = $.trim($("#up6g"+cc6g).val());
		if($("#down6g"+cc6g).attr('disabled')){
			var down6g=  "";
		}else{
			var down6g=  $.trim($("#down6g"+cc6g).val());
		}
		var upf6g = $.trim($("#upf6g"+cc6g).val());
		if(num6g!="" && (up6g!="" || down6g!="" || upf6g!="")){
			if(num6g.length==3){
				var fnum = num6g;
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
				
				lotto[alot] = fnum+","+up6g+","+down6g+","+upf6g;
				alot++;
				
				for(i=1;i<6;i++){ if(vu[i]){ 
					lotto[alot] = vu[i]+","+up6g+","+down6g+","+upf6g;
					alot++;
				} }
			}
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
				data: { "lotto": lotto , "tlot": 5 , "zone": 1 , "rob": 1 , "bill_cus_name": $("#bill_cus_name").val() , "bill_no": $("#bill_no").val() },
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
					load_list(5);
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
function load_19h(num){
	$.ajax({
				type: "POST",
				url: "lotto/load_19h.php",
				data: { "num": num},
				/*timeout: 30000,*/
				cache: false,	// Clear cache IE
				beforeSend: function(){
				},
				success: function(data){
					$("#tb_19h").html(data);
				}
			});	
}
function load_6g(num){
	$.ajax({
				type: "POST",
				url: "lotto/load_6g.php",
				data: { "num": num},
				/*timeout: 30000,*/
				cache: false,	// Clear cache IE
				beforeSend: function(){
				},
				success: function(data){
					$("#tb_6g").html(data);
				}
			});	
}
</script>