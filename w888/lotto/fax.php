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

		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_center12n"; }

		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; }

	}else{

		document.getElementById(bcopy+'money').disabled = true;

		document.getElementById(bcopy+'money').className = "btn_dis";

		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_disabled"; }

		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; }

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
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div  class="countdown" style="margin: 3px 0px 0px 23px;"> 
        <script type="application/javascript">
var myCountdown1 = new Countdown({
								 	time: 86400 , // 86400 seconds = 1 day
									//time: 86400,
									width:250, 
									height:40,  
									rangeHi:"day",
									style:"flip"	// <- no comma on last item!
									});

</script> 
      </div>
      <div style="clear:both;"></div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top" width="305"><form method="post" id="InputForm" name="InputForm" action="save_data.php" target="ifdb" style="display:inline">
    <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td height="335" id="vdata">  
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
          <tbody><tr>
            <!-- <td height="25" align="center" class="tb_title_lotto"><?=$lang[185];?></td> -->
            <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[1432];?></td>
          </tr>
          <tr class="txt_back12btitle">
            <td height="275" align="center" bgcolor="#FFFFFF">
            <span class="cr">* <?=$lang_member[599];?></span><br><br>
              <input type="file" name="tfile" id="tfile" class="txt_center12n input" /></td>
            </tr>

          <tr>
            <td height="33" align="center" class="bg_td"><span style="float:left; text-align:left; display:block; padding-left:5px; padding-top:5px;"><?=$lang_member[600];?> 1,000 <?=$lang_member[325]?> / <?=$lang_member[381]?></span>
  <div style="padding-top:5px;">
    <input type="hidden" id="func" name="func">
    <input type="hidden" id="cnt" name="cnt" value="<?=$tab-1?>">
    <input type="hidden" id="maintype" name="maintype" value="numberrunning">
    <input name="btsave" type="button" class="btn_le" id="btsave" value="<?=$lang_member[121];?>" onClick="save_lotto()" <?=$disabled?> style="width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:5px; line-height:10px;">
    <input name="btreset" type="reset" class="btn_le" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> style="width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:5px; line-height:10px; background:#F00;"></div>
              </td>
          </tr>
        </tbody></table>
         
</td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td>
          <table width="300" border="0" cellspacing="1" cellpadding="0" class="bg_table">
            <tbody><tr>
              <td align="center" bgcolor="#FFFFFF"><table width="280" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td height="5" align="left"></td>
                  </tr>
                <tr>
                  <td height="46" align="left" class="txt_blue12n" id="statussave" style="text-align:left; padding:5px;" valign="top"></td>
                  </tr>
                <tr>
                  <td height="5" align="left"></td>
                  </tr>
                </tbody></table>
                </td>
              </tr>
            </tbody></table></td>
      </tr>
      </tbody></table>
    </form></td>
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
//save_data.php
function save_lotto(){
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
		if(l3up!="" || l3tod!=""){
				lotto[alot] = num+","+l3up+","+l3tod;
				alot++;
		}
	}
	/*console.log(lotto);
	return false;*/
	if(lotto.length<=0){
		alert("<?=$lang_member[439];?>");
	}else{
		//var rcc = confirm("<?=$lang_member[1042];?>");
		var rcc = true;
		if (rcc == true) {	
			$.ajax({
				type: "POST",
				url: "lotto/upload_lotto.php",
				data: { "lotto": lotto , "tlot": 4 , "zone": 1 , "rob": 1 },
				dataType:"json",
				timeout: 30000,
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
					load_list(6);
				}
			});	
		}else{
			$("#btsave").removeAttr('disabled');
		}
	}
}
</script>