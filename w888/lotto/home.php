<?
$url_file1=$json_file_main."json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$re_ok=$date_bet[0];
?>
<script>
$(document).ready(function() {
	//load_option_tang();
	$('#form1').submit();
});
var types=[];
types[1]=[<? $it1=1; for($it=0;$it<10;$it++){ echo $it1; $it1=$it1+3; if($it<9){ echo ","; } } ?>];
types[2]=[<? $it1=2; for($it=0;$it<10;$it++){ echo $it1; $it1=$it1+3; if($it<9){ echo ","; } } ?>];
types[3]=[<? $it1=3; for($it=0;$it<30;$it++){ echo $it1; $it1=$it1+4; if($it<29){ echo ","; } } ?>];
types[4]=[0,3,6,9,12,15,18,21,24,27];
types[5]=[1,4,7,10,13,16,19,22,25,28];
types[6]=[2,5,8,11,14,17,20,23,26,29];
types[7]=[0,2,4,6,8,10,12,14,16,18];
types[8]=[1,3,5,7,9,11,13,15,17,19];
function fnumcross(){
   	var fnum=document.getElementById('tab0').value;
	if(fnum.length==3){	
		for(i=1;i<30;i++){ document.getElementById('tab'+(i*4)).value = ''; }	
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

}
function fcopymoney(ty,fnumber){

	var fnum=document.getElementById(fnumber).value;

	if(fnum!=""){ for(i=1;i<$("#DropDownList1").val();i++){ document.getElementById('tab'+types[ty][i]).value = fnum; } }	
	chk_num();
}
function fshow(ty){
	$( "input[name='"+ty+"']" ).show();
}
function fdisabled(ty){
		$( "input[name='"+ty+"']" ).hide();
		$( "input[name='"+ty+"']" ).val("");
}
function clear_txt(){
	$("input[type='text']").val("");
	for(i=0;i<10;i++){ $("input[name='g"+i+"']").removeAttr("checked"); fshow("col2"+i); fshow("num"+i); }
}
function clear_txt2(i){
	$("input[name='num"+i+"']", "#form1").val("");
	$("input[name='col1"+i+"']", "#form1").val("");
	$("input[name='col2"+i+"']", "#form1").val("");
	$("input[name='g"+i+"']").removeAttr("checked"); 
	fshow("col2"+i);
	fshow("num"+i);
}
function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			
	//console.log(keyCode);     
	//0-9 (numpad,keyboard)
	if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
	//backspace,delete,left,right,home,end
	if (',8,46,37,39,36,35,9,'.indexOf(','+keyCode+',')!=-1){ return true; }          
	return false;
}
function load_option_tang(e){
	$.ajax({
				type: "POST",
				url: "lotto/load_option_tang.php",
				//data: { "lot": $("#DropDownList2").val() , "rows" : $("#DropDownList1").val()},
				data: new FormData( e ),
				processData: false,
				contentType: false,
				timeout: 30000,
				cache: false,	// Clear cache IE
				beforeSend: function(){
				},
				success: function(data){
					$("#box_tang").html(data);
					chk_num();
				}
			});	
			
			return false; 
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
									 <?
                     if($re_ok['o_limit_time']<$time_stam){ 
                          }else{
                        ?>
                                                      onComplete: countdownComplete ,
                                                      <? } ?>
									rangeHi:"day",
									style:"flip"	// <- no comma on last item!
									});

</script> 
      </div>
      <div style="clear:both;"></div></td>
      <td><?=$lang_member[489]?> : <? echo $lot_type[$_SESSION['lang']][1][1]; ?> , <? echo $lot_type[$_SESSION['lang']][1][2]; ?> , <? echo $lot_type[$_SESSION['lang']][1][3]; ?> , <? echo $lot_type[$_SESSION['lang']][1][4]; ?> , <? echo $lot_type[$_SESSION['lang']][1][5]; ?> , <? echo $lot_type[$_SESSION['lang']][1][24]; ?> , <? echo $lot_type[$_SESSION['lang']][1][6]; ?> , <? echo $lot_type[$_SESSION['lang']][1][7]; ?> , <? echo $lot_type[$_SESSION['lang']][1][21]; ?> , <? echo $lot_type[$_SESSION['lang']][1][22]; ?> , <? echo $lot_type[$_SESSION['lang']][1][23]; ?></td>
  </tr>
   <?
                      if($re_ok['o_limit_time']<$time_stam){ 
					  echo"<tr><td><center><h2 class='cr'>$lang_member[317]</h1></center></td></tr>";
					  }else{
					  ?>   
  <tr>
    <td colspan="2">
   
    <form role="form" onSubmit="return load_option_tang(this);" enctype="multipart/form-data" method="post"  id="form1" name="form1" autocomplete="off">
        <table width="100%" border="0" cellspacing="1" cellpadding="5" class="bg_table">
          <tbody>
            <tr>
              <td class="tb_title_lotto" width="50" height="20"><?=$lang_member[555]?> 1</td>
              <td class="bg_td"><input type="radio" checked>
                <label><?=$lang_member[602];?></label>
                <select name="lot" id="DropDownList2" onChange="$('#form1').submit();">
                  <option selected="selected" value="3">3<?=$lang_member[548]?></option>
                  <option value="2">2<?=$lang_member[548]?></option>
                  <option value="1"><?=$lang_member[528]?></option>
                </select></td>
            </tr>
            <tr>
              <td class="tb_title_lotto" height="20"><?=$lang_member[555]?> 2</td>
              <td class="bg_td txt_red12b"><?=_cvf($re_ok[o_limit_time] , 1)?></td>
            </tr>
            <tr>
              <td class="tb_title_lotto" height="20"><?=$lang_member[555]?> 3</td>
              <td class="bg_td"><select name="rows" id="DropDownList1" onChange="$('#form1').submit();">
                  <? for($lg6=1;$lg6<=10;$lg6++){ ?>
                  <option value="<?=$lg6?>"<? if($lg6==1){ ?> selected<? } ?>>
                  <?=$lg6?>
                  </option>
                  <? } ?>
                </select>
                <?=$lang_member[532]?></td>
            </tr>
            <tr>
              <td class="tb_title_lotto" height="20"><?=$lang_member[555]?> 4</td>
              <td class="bg_td" id="box_tang">&nbsp;</td>
            </tr>
            <tr>
              <td class="tb_title_lotto" height="20"><?=$lang_member[555]?> 5</td>
              <td class="bg_td" align="center"><input name="btsave" type="button" class="btn_le" id="btsave" value="<?=$lang_member[121];?>" onClick="save_lotto()" <?=$disabled?> style="width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;">
                <input name="btreset" type="button" class="btn_le" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> style="width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px; background:#F00;" onClick="clear_txt();"></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td class="bg_td" align="right"><?=$lang_member[559]?>
                <input name="sum_num" type="text" class="txt_center12n input" id="sum_num" value="" size="10" readonly>
                <?=$lang_member[561]?>
              <input name="sum_price" type="text" class="txt_center12n input" id="sum_price" value="" size="10" readonly></td>
            </tr>
          </tbody>
        </table>
      </form>
      
      
      
      </td>
  </tr>
  <tr>
                      <td height="10"></td>
                    </tr>
                
  <? } ?>
</table>
<script>
function chk_num(){
	var rows = $("#DropDownList1").val();
	var nnum = 0;
	var nprice = 0;
	//var nnum = parseInt($("#sum_num").val());
	//var nprice = parseInt($("#sum_price").val());
	for(var i=0;i<rows;i++){
		
		var lot_type = $("input[name='g"+i+"']:checked", "#form1").val();
		var num = $("input[name='num"+i+"']", "#form1").val();
		var lot_price1 = parseInt($("input[name='col1"+i+"']", "#form1").val());
		var lot_price2 = parseInt($("input[name='col2"+i+"']", "#form1").val());
		if(lot_type){
				if(lot_type=="3up" && num.length==3){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
					if(lot_price2!="" && lot_price2>0){
						nprice = nprice+lot_price2;
					}
				}else if(lot_type=="3down" && num.length==3){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="3tod" && num.length==3){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="6gup" && num.length==3){
					nnum = nnum+g6_chk(num);
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+(lot_price1*g6_chk(num));
					}
				}else if(lot_type=="6gdown" && num.length==3){
					nnum = nnum+g6_chk(num);
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+(lot_price1*g6_chk(num));
					}
				}else if(lot_type=="2up" && num.length==2){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
					if(lot_price2!="" && lot_price2>0){
						nprice = nprice+lot_price2;
					}
				}else if(lot_type=="2down" && num.length==2){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="2tod" && num.length==2){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="19up" && num.length==1){	
					nnum = nnum+19;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+(lot_price1*19);
					}
				}else if(lot_type=="19down" && num.length==1){
					nnum = nnum+19;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+(lot_price1*19);
					}
				}else if(lot_type=="1up" && num.length==1){
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="1down" && num.length==1){	
					nnum = nnum+1;	
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="1pug" && num.length==1){	
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="2pug" && num.length==1){	
					nnum = nnum+1;	
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}else if(lot_type=="3pug" && num.length==1){	
					nnum = nnum+1;
					if(lot_price1!="" && lot_price1>0){
						nprice = nprice+lot_price1;
					}
				}
		}
	
	}
	if(nnum>0){
		$("#sum_num").val(nnum);
	}else{
		$("#sum_num").val("");
	}
	if(nprice>0){
		$("#sum_price").val(nprice);
	}else{
		$("#sum_price").val("");
	}
}

var submitting = false;

function save_lotto(){
	if(submitting == false){
		submitting = true;
		
	$("#btsave").hide();
	$("#btreset").hide();
	
	var lotto = new Array();
	var nlot = 0;
	var alot = 0;
	var tlot = 0;
	
	var lot = $("#DropDownList2").val();
	var rows = $("#DropDownList1").val();
	
	if(lot==3){
		tlot = 1;
	}else if(lot==2){
		tlot = 3;
	}else if(lot==1){
		tlot = 5;
		alot = 8;
	}
	//if(lot==3){
		for(var i=0;i<rows;i++){
			var lot_type = $("input[name='g"+i+"']:checked", "#form1").val();
			var num = $("input[name='num"+i+"']", "#form1").val();
			var lot_price1 = $("input[name='col1"+i+"']", "#form1").val();
			var lot_price2 = $("input[name='col2"+i+"']", "#form1").val();
			if(lot_type){
				if(lot_type=="3up" && num.length==3 && (lot_price1!="" || lot_price2!="")){
					lotto[alot] = num+","+lot_price1+","+lot_price2+",";
					alot++;
				}else if(lot_type=="3down" && num.length==3 && (lot_price1!="")){
					lotto[alot] = num+",,,"+lot_price1;
					alot++;
				}else if(lot_type=="3tod" && num.length==3 && (lot_price1!="")){
					lotto[alot] = num+",,"+lot_price1+",";
					alot++;
				}else if(lot_type=="6gup" && num.length==3 && (lot_price1!="")){
					var fnum = num;
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
					for(ii=1;ii<6;ii++){
						var ck='Y';
						for(s=0;s<ii;s++){ if(vu[s]==org_vu[ii]){ ck='N'; } }
						if(ck=='Y'){ vu[x]=org_vu[ii]; x++; }
					}
					
					lotto[alot] = fnum+","+lot_price1+",,";
					alot++;
					
					for(ii=1;ii<6;ii++){ if(vu[ii]){ 
						lotto[alot] = vu[ii]+","+lot_price1+",,";
						alot++;
					} }
				}else if(lot_type=="6gdown" && num.length==3 && (lot_price1!="")){
					var fnum = num;
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
					for(ii=1;ii<6;ii++){
						var ck='Y';
						for(s=0;s<ii;s++){ if(vu[s]==org_vu[ii]){ ck='N'; } }
						if(ck=='Y'){ vu[x]=org_vu[ii]; x++; }
					}
					
					lotto[alot] = fnum+",,,"+lot_price1;
					alot++;
					
					for(ii=1;ii<6;ii++){ if(vu[ii]){ 
						lotto[alot] = vu[ii]+",,,"+lot_price1;
						alot++;
					} }
				}else if(lot_type=="2up" && num.length==2 && (lot_price1!="" || lot_price2!="")){
					lotto[alot] = num+","+lot_price1+",,"+lot_price2;
					alot++;
				}else if(lot_type=="p2up" && (lot_price1!="")){
					var ni1 = 0;
					var ni2 = 1;
					for(var ip2 = 1;ip2<=10;ip2++){
						if(ni2>9){
							ni2 = 0;	
						}
						var num_ip2_1 = ni1+""+ni2;
						lotto[alot] = num_ip2_1+","+lot_price1+",,";
						alot++;
						var num_ip2_2 = ni2+""+ni1;
						lotto[alot] = num_ip2_2+","+lot_price1+",,";
						ni1++;
						ni2++;
						alot++;
					}
				}else if(lot_type=="p2down" && (lot_price1!="")){
					var ni1 = 0;
					var ni2 = 1;
					for(var ip2 = 1;ip2<=10;ip2++){
						if(ni2>9){
							ni2 = 0;	
						}
						var num_ip2_1 = ni1+""+ni2;
						lotto[alot] = num_ip2_1+",,"+lot_price1+",";
						alot++;
						var num_ip2_2 = ni2+""+ni1;
						lotto[alot] = num_ip2_2+",,"+lot_price1+",";
						ni1++;
						ni2++;
						alot++;
					}
				}else if(lot_type=="b2up" && (lot_price1!="")){
					for(var ip2 = 0;ip2<10;ip2++){
						var num_ip2_1 = ip2+""+ip2;
						lotto[alot] = num_ip2_1+","+lot_price1+",,";
						alot++;
					}
				}else if(lot_type=="b2down" && (lot_price1!="")){
					for(var ip2 = 0;ip2<10;ip2++){
						var num_ip2_1 = ip2+""+ip2;
						lotto[alot] = num_ip2_1+",,"+lot_price1+",";
						alot++;
					}
				}else if(lot_type=="2down" && num.length==2 && (lot_price1!="")){
					lotto[alot] = num+",,"+lot_price1+",";
					alot++;
				}else if(lot_type=="2tod" && num.length==2 && (lot_price1!="")){	
					lotto[alot] = num+",,,"+lot_price1;
					alot++;
				}else if(lot_type=="19up" && num.length==1 && (lot_price1!="")){		
					var arr_li = [];
					var ali = 0;
					for(var li=0;li<10;li++){
						arr_li[ali] = li+""+num+","+lot_price1+",,";
						ali++;
						arr_li[ali] = num+""+li+","+lot_price1+",,";
						ali++;
					}
					var arr_li2 = [];
					arr_li2 = arr_li.filter(function (ei, ii, arri) {
						return arri.lastIndexOf(ei) === ii;
					});
					arr_li2.forEach(function(entry) {
						lotto[alot] = entry;
						alot++;
					});
				}else if(lot_type=="19down" && num.length==1 && (lot_price1!="")){		
					var arr_li = [];
					var ali = 0;
					for(var li=0;li<10;li++){
						arr_li[ali] = li+""+num+",,"+lot_price1+",";
						ali++;
						arr_li[ali] = num+""+li+",,"+lot_price1+",";
						ali++;
					}
					var arr_li2 = [];
					arr_li2 = arr_li.filter(function (ei, ii, arri) {
						return arri.lastIndexOf(ei) === ii;
					});
					arr_li2.forEach(function(entry) {
						lotto[alot] = entry;
						alot++;
					});
				}else if(lot_type=="1up" && num.length==1 && (lot_price1!="")){		
					lotto[alot] = num+","+lot_price1+",,,r";
					alot++;
				}else if(lot_type=="1down" && num.length==1 && (lot_price1!="")){		
					lotto[alot] = num+",,"+lot_price1+",,r";
					alot++;
				}else if(lot_type=="1pug" && num.length==1 && (lot_price1!="")){	
					lotto[alot] = num+","+lot_price1+",,,p";
					alot++;	
				}else if(lot_type=="2pug" && num.length==1 && (lot_price1!="")){		
					lotto[alot] = num+",,"+lot_price1+",,p";
					alot++;
				}else if(lot_type=="3pug" && num.length==1 && (lot_price1!="")){	
					lotto[alot] = num+",,,"+lot_price1+",p";
					alot++;	
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
				url: "lotto/save_lotto.php",
				data: { "lotto": lotto , "tlot": tlot , "zone": 1 , "rob": 1 },
				dataType:"json",
				cache: false,	// Clear cache IE
				beforeSend: function(){
					$("#statussave").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;'>");
				},
				success: function(data){
					//console.log(data.logs);
					if(data.res==1){
						$("#statussave").html(data.txt);
						$("#btsave").removeAttr('disabled');
						clear_txt();
						parent.leftx.get_credit();
						parent.leftx.result_save(data.txt);
					}else{
						parent.leftx.result_save(data.txt);
						$("#btsave").removeAttr('disabled');
					}
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
function g6_chk(num){
	var nnum = 0;
	var fnum = num;
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
					for(ii=1;ii<6;ii++){
						var ck='Y';
						for(s=0;s<ii;s++){ if(vu[s]==org_vu[ii]){ ck='N'; } }
						if(ck=='Y'){ vu[x]=org_vu[ii]; x++; }
					}
					
					nnum = 1;
					
					for(ii=1;ii<6;ii++){ if(vu[ii]){ 
						nnum++;
					} }
					
					return nnum;
}
</script>
