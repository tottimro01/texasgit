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


<?
$jsop = explode(",", $rec["con_open_lotto_hun_new"]);
if($jsop[$_SESSION["zone_hun"]]==0){ include 'sa_close.php'; exit(); }
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
     <td width="300">

    <div  class="countdown" style="margin: 3px 0px 0px 23px;"> 
              <?
      $time_end = $ok_data["o_limit_time"];
      $time_stam = $time_stam;

        if($time_end>$time_stam){

    ?>
        <script type="application/javascript">
var myCountdown1 = new Countdown({
                  time: <?=$time_end-$time_stam;?> , // 86400 seconds = 1 day
                  //time: 86400,
                  width:250, 
                  height:40,  
                  rangeHi:"day",
					onComplete: countdownComplete ,
                  style:"flip"  // <- no comma on last item!
                  });


</script> 
<? } ?>
      </div>
      <div style="clear:both;"></div></td>
      <td><table width="100%" cellspacing="2" cellpadding="0" class="lotto_open_table">
          <tr>
            <th width="50%">
            </th>
            <th width="25%"><?=$lang_member[1432]?></th>
            <th width="25%"><?=parseTemplate($lang_member[595], array('{n}'=>''))?></th>
          </tr>
          <tr>
            <td align="center"><div style="line-height: 20px; font-weight: bold; padding: 0 4px; float: right; font-size: 14px; margin-top: 2px;"><?=$_SESSION["name_hun"];?></div></td>
            <td align="center"> <?=date("d/m/Y",$ok_data['o_limit_time'])?></td>
            <td align="center"><?=date("H:i",$ok_data['o_limit_time'])?></td>
          </tr>
        </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top" width="305">
                                     <?
              $lotzone_open = explode(",", $rec["con_open_lotto_hun_new"]);

                       if($time_end<=$time_stam || $lotzone_open[$_SESSION["zone_hun"]]!="1"){
					  echo"<center><h2 class='cr'>$lang_member[317]</h1></center>";
					  }else{
					  ?>   
                      <form method="post" id="InputForm" name="InputForm" action="save_data.php" target="ifdb" style="display:inline">
    <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td id="vdata">  
        
          <? if(($lot_pay_big5[4]>0) or ($lot_pay_big5[5]>0)){ ?>
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tr class="txt_white12btitle">
            <td height="20" align="center" class="bg_table" colspan="3"><?=$lang_member[550];?> <select name="DropDownList1" id="DropDownList1" onChange="load_19h(this.value);">
                                <? for($l19h=1;$l19h<=10;$l19h++){ ?>
                                <option value="<?=$l19h?>"<? if($l19h==1){ ?> selected<? } ?>><?=$l19h?></option>
                                <? } ?>
                                </select> <?=$lang_member[532];?></td>
          </tr>
          <tr class="txt_white12btitle">
            <td width="60" height="20" align="center" class="bg_table"><?=$lang_member[381];?></td>
            <td width="120" align="center" class="bg_table"><?=$lang_member[448];?></td>
            <td width="120" align="center" class="bg_table"><?=$lang_member[450];?></td>
          </tr>
          <tbody id="tb_19h"><tr>
          <td height="22" align="center" class="bg_td"><input name="num19h1" type="text" class="txt_center12b input" id="num19h1" size="6" maxlength="1" onKeyDown="return numberonly(event,this)"></td>
                               <td align="center" class="bg_td"><? if($lot_pay_big5[4]>0){ ?><input name="up19h1" type="text" class="txt_center12n input" id="up19h1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" style="width: 93%;"><? }?></td>
                              <td align="center" class="bg_td"><? if($lot_pay_big5[5]>0){ ?><input name="down19h1" type="text" class="txt_center12n input" id="down19h1" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" style="width: 93%;"><? }?></td>
          </tr></tbody>
          </table>
          <? } ?>


          
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tbody>
          <? /*if($lot_pay_big5[8]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][3][8];?></td>
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
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][3][9];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" id="2hl1" name="nn1" checked="" value="H"><?=$lang_member[314];?></td>
            <td align="center" class="bg_td"><input type="radio" id="2hl2" name="nn1" value="L"><?=$lang_member[312];?></td>
            <td align="center" class="bg_td"><input name="col21" type="text" class="txt_center12n" id="tab1" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? } ?>
       
          <? if($lot_pay_big5[11]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][3][11];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" id="2uhl1" name="nn3" checked="" value="H"><?=$lang_member[314];?></td>
            <td align="center" class="bg_td"><input type="radio" id="2uhl2" name="nn3" value="L"><?=$lang_member[312];?></td>
            <td align="center" class="bg_td"><input name="col23" type="text" class="txt_center12n" id="tab3" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"   <?     if($re_ok[o_limit_time_lang]<$time_stam){echo'disabled="disabled" placeholder="'.$lang_member[612].'"'; }?>></td>
          </tr>
          <? } ?>
          <? if($lot_pay_big5[12]>0){ ?>
          <tr class="txt_white12btitle">
            <td width="76" height="20" align="center" class="bg_table" colspan="2"><?=$lot_type[$_SESSION['lang']][3][12];?></td>
            <td width="110" align="center" class="bg_table"><?=$lang_member[300];?></td>
          </tr>
          <tr>
            <td height="22" align="center" class="bg_td"><input type="radio" name="nn4" id="1ek1" checked="" value="E"><?=$lang_member[453];?></td>
            <td align="center" class="bg_td"><input type="radio" name="nn4" id="1ek2" value="K"><?=$lang_member[459];?></td>
            <td align="center" class="bg_td"><input name="col24" type="text" class="txt_center12n" id="tab4" size="15" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
          </tr>
          <? }*/ ?>
      	<tr>
                              <td height="33" colspan="4" align="center" class="bg_td">
                              <span style="width: 10%!important;"><?=$lang_member[495]?>:</span>
      	<input name="bill_cus_name"   type="text" class="txtq2" id="bill_cus_name" style="width: 40%!important;" />
      	<span style="width: 10%!important;"><?=$lang_member[496]?>:</span>
      	<input name="bill_no"  onkeydown="return numberonly(event);" type="tel" class="txtq2" id="bill_no" style="width: 20%!important;" />
                                </td>
                            </tr>
          <tr>
            <td height="33" colspan="3" align="center" class="bg_td"><span style="float:left; text-align:left; display:block; padding-left:5px;">
                              <?=$lang_member[379];?> <?=$_SESSION['m_currency'];?> <?=number_format($emin[1]);?> <br>
<?=$lang_member[380];?> <?=$_SESSION['m_currency'];?> <?=number_format($emax[1]);?> </span>
<div style="padding-top:5px;">
            	<input type="hidden" id="func" name="func">
                <input type="hidden" id="cnt" name="cnt" value="4">
                <input type="hidden" id="maintype" name="maintype" value="numberrunning">
            	<input name="btsave" type="button" class="btn_le btn_small w100px" id="btsave" value="<?=$lang_member[121];?> <?=$lang_member[643];?><?=$lot_rob[_rob_hun()];?>" onClick="save_lotto()" <?=$disabled?> >
                                <input name="btreset" type="reset" onClick="load_19h(1); load_6g(1);" class="btn_le btn_small danger w60px" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> ></div><br>
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
				url: "lothun/save_lotto.php",
				data: { "lotto": lotto , "tlot": 5 , "zone": <?=$_SESSION["zone_hun"];?> , "rob": <?=$_SESSION["rob_hun"];?> , "bill_cus_name": $("#bill_cus_name").val() , "bill_no": $("#bill_no").val()},
				dataType:"json",
				/*timeout: 30000,*/
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
						parent.leftx.load_lotfree();
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
				url: "lothun/load_19h.php",
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