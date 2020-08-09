
<div class="modal fade" id="lot3success" tabindex="-1" role="dialog" aria-labelledby="lot3successLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-height:80vh; overflow-y:scroll;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:goldenrod">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title thaisan" id="lot3successLabel">บันทึกเสร็จสิ้น</h4>
      </div>
      <div class="modal-body" style="color:#333333">
      <div class="row">
        	<div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px">ประเภท</span></div>
          <div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px">เลข</span></div>
          <div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px">สถานะ</span></div>
          </div>
          <div class="row" id="statussave">
          
          </div>
      </div>
    </div>
  </div>
</div>
 

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
function fnumcross(){
   	var fnum=document.getElementById('tab0').value;
	if(fnum.length==3){	
		for(i=1;i<10;i++){ document.getElementById('tab'+(i*4)).value = ''; }	
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
	for(i=0;i<10;i++){ chtype(i); }
}
function fcopymoney(ty,fnumber){
	var fnum=document.getElementById(fnumber).value;
	if(fnum!=""){ for(i=1;i<10;i++){ document.getElementById('tab'+types[ty][i]).value = fnum; } }	
}
 function fdisabled(ty,bcopy){
	if(document.getElementById(bcopy+'c').checked==true){
		document.getElementById(bcopy+'money').disabled = false;
		for(i=0;i<10;i++){ $("#tab"+types[ty][i]).removeClass("txt_disabled"); }
		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; chtype(i); }
	}else{
		document.getElementById(bcopy+'money').disabled = true;
		for(i=0;i<10;i++){ $("#tab"+types[ty][i]).addClass("txt_disabled"); }
		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; chtype(i); }
	}
}
function chtype(i){
	var val = $("input[name='num"+i+"']").val();
	var res = val.split("");
	if(val.length==1){
		if($("input[name='col3"+i+"']").attr("class")!="form-control txt_disabled"){
			$("input[name='col3"+i+"']").addClass("disRed");	
			$("input[name='col3"+i+"']").attr("disabled" , "disabled");	
		}

		if($("input[name='col2"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col2"+i+"']").removeClass("disRed");
					$("input[name='col2"+i+"']").removeAttr('disabled');
				}
	}else if(val.length==2 && res[0]!="*" && res[1]=="*"){
		 

		if($("input[name='col3"+i+"']").attr("class")!="form-control txt_disabled"){
			$("input[name='col3"+i+"']").addClass("disRed");	
			$("input[name='col3"+i+"']").attr("disabled" , "disabled");	
		}

		if($("input[name='col2"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col2"+i+"']").removeClass("disRed");
					$("input[name='col2"+i+"']").removeAttr('disabled');
				}

	}else{


if($("input[name='col2"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col2"+i+"']").removeClass("disRed");
					$("input[name='col2"+i+"']").removeAttr('disabled');
				}
		
		if(val.length==2){
			<? if($lot_pay_big5[13]<=0 || $lot_pay_big5[24]<=0){ ?>
				if($("input[name='col3"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col3"+i+"']").addClass("disRed");	
					$("input[name='col3"+i+"']").attr("disabled" , "disabled");	
				}
			<? }else{ ?>
				if($("input[name='col3"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col3"+i+"']").removeClass("disRed");
					$("input[name='col3"+i+"']").removeAttr('disabled');
				}
			<? } ?>

		}else{
			if($("input[name='col3"+i+"']").attr("class")!="form-control txt_disabled"){
				$("input[name='col3"+i+"']").removeClass("disRed");
				$("input[name='col3"+i+"']").removeAttr('disabled');
			}
		}

		if(val.length==3){
			<? if($lot_pay_big5[2]<=0){ ?>
				if($("input[name='col2"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col2"+i+"']").addClass("disRed");	
					$("input[name='col2"+i+"']").attr("disabled" , "disabled");	
				}
			<? }else{ ?>
				if($("input[name='col2"+i+"']").attr("class")!="form-control txt_disabled"){
					$("input[name='col2"+i+"']").removeClass("disRed");
					$("input[name='col2"+i+"']").removeAttr('disabled');
				}
			<? } ?>
		}
		
	}
}
function clear_txt(){
	$("input[type='tel']").val("");
	for(i=0;i<10;i++){ chtype(i) }
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
	for(var cc=0;cc<10;cc++){
		var num = $.trim($("#tab"+nlot).val());
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
		if(num!="" && (l3up!="" || l3tod!="" || l3down!="")){
			if(num.length==3){
				lotto[alot] = num+","+TrimComma(l3up)+","+TrimComma(l3down)+","+TrimComma(l3tod);
				alot++;
			}else if(num.length==2){
				lotto[alot] = num+","+TrimComma(l3up)+","+TrimComma(l3down)+","+TrimComma(l3tod);
				alot++;
			}else if(num.length==1){
				lotto[alot] = num+","+TrimComma(l3up)+","+TrimComma(l3tod);
				alot++;
			}
		}
	}
	//return false;
	//console.log(lotto);
	if(lotto.length<=0){
		alert("<?=$lang_lot[37];?>");
		$("#btsave").show();
		$("#btreset").show();
		submitting = false;
		return false;
	}else{
		var rcc = true;
		if (rcc == true) {	
			$.ajax({
				type: "POST",
				url: "../ajax/save_lotto.php",
				data: { "lotto": lotto , "tlot": 1 , "zone": 1 , "rob": 1 },
				dataType:"json",
			/*	timeout: 30000,*/
				cache: false,	// Clear cache IE
				beforeSend: function(){
					$(".loader").show();
				},
				success: function(data){
					//console.log(data.logs);
					if(data.res==1){
						$("#statussave").html(data.txt);
						$("#btsave").removeAttr('disabled');
						clear_txt();
					}else{
						$("#statussave").html(data.txt);
						$("#btsave").removeAttr('disabled');
					}
					$(".loader").hide();
					$('#lot3success').modal('show');
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
	return false;
}
 </script>

<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong>แทงด่วน</strong></h1>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan" onClick="fnumcross()" style="margin-bottom:5px"><strong><i class="fa fa-repeat"></i> กลับ</strong></button>
        </div>
        <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan"  onClick="fcopymoney(1,'tab1')" style="margin-bottom:5px" name="col1money" id="col1money"><strong><i class="fa fa-files-o"></i> คัดลอก</strong></button>
        </div>
        <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan" onClick="fcopymoney(2,'tab2')" style="margin-bottom:5px" name="col2money" id="col2money"><strong><i class="fa fa-files-o"></i> คัดลอก</strong></button>
        </div>
        <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan" onClick="fcopymoney(3,'tab3')" style="margin-bottom:5px" name="col3money" id="col3money" <?     if($profile["user_stabdown"]==0){echo' disabled="disabled"'; }?>><strong><i class="fa fa-files-o"></i> คัดลอก</strong></button>
        </div>
        <form name="lot3" method="post" action="main.php?cmd=lot3&subcmd=save" id="lot3" onSubmit="return save_lotto();">
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#333333; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">เลข</div>
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">
            <input name="col1c" type="checkbox" id="col1c" checked="checked" onClick="fdisabled(1,'col1')" style="margin:0px; padding:0px">
            บน</div>
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">
            <input name="col2c" type="checkbox" id="col2c"onClick="fdisabled(2,'col2')" style="margin:0px; padding:0px" <?     if($profile["user_stabdown"]==0){echo' disabled="disabled"'; }else{ echo 'checked="checked"'; }?>>
            ล่าง</div>
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; margin-bottom:5px">
            <input name="col3c" type="checkbox" id="col3c" onClick="fdisabled(3,'col3')" style="margin:0px; padding:0px" checked="checked" >
            โต๊ด</div>
            
          <? 
		  $tab = 0;
		  for($i=0;$i<10;$i++){ ?>
          <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="num<?=$i?>" type="tel" class="form-control" id="tab<?=$tab?>" maxlength="3" onKeyPress="checknumber()" onKeyUp="chtype(<?=$i?>);">
          </div>
          <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="col1<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);">
          </div>
          <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="col2<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);" <?     if($profile["user_stabdown"]==0){echo' placeholder="ปิด" disabled="disabled"'; }?>>
          </div> 
          <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="col3<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);" >
          </div>
          <? $tab=$tab+1; } ?>
          <div class="col-xs-8ths">
            <button class="btn btn-warning btn-block thaisan" type="submit" id="btsave"><strong><i class="fa fa-floppy-o"></i> บันทึกข้อมูล</strong></button>
          </div>
          <div class="col-xs-4ths">
            <button class="btn btn-danger btn-block thaisan" type="button" onClick="clear_txt();"   id="btreset" ><strong>ยกเลิก</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<br />
