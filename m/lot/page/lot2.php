<div class="modal fade" id="lot3success" tabindex="-1" role="dialog" aria-labelledby="lot3successLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-height:80vh; overflow-y:scroll;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:goldenrod">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title thaisan" id="lot3successLabel"><!-- บันทึกเสร็จสิ้น --><?=$lang_saveMessage;?></h4>
      </div>
      <div class="modal-body" style="color:#333333">
      <div class="row">
        	<div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px"><!-- ประเภท --><?=$lang_type;?></span></div>
          <div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px"><!-- เลข --><?=$lang_number;?></span></div>
          <div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px"><!-- สถานะ --><?=$lang_status;?></span></div>
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
types[5]=[1,5,9,13,17,21,25,29,33,37];
types[6]=[2,6,10,14,18,22,26,30,34,38];
types[7]=[3,7,11,15,19,23,27,31,35,39];
types[8]=[1,3,5,7,9,11,13,15,17,19];

function fcopymoney(ty,fnumber){
	var fnum=document.getElementById(fnumber).value;
	if(fnum!=""){ for(i=1;i<10;i++){ document.getElementById('tab'+types[ty][i]).value = fnum; } }	
}

 function fdisabled(ty,bcopy){
	if(document.getElementById(bcopy+'c').checked==true){
		document.getElementById(bcopy+'money').disabled = false;
		for(i=0;i<10;i++){ $("#tab"+types[ty][i]).removeClass("txt_disabled"); }
		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; }
	}else{
		document.getElementById(bcopy+'money').disabled = true;
		for(i=0;i<10;i++){ $("#tab"+types[ty][i]).addClass("txt_disabled"); }
		for(i=0;i<10;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; }
	}
}
function clear_txt(){
	$("input[type='tel']").val("");
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
			var l2tod=  "";
		}else{
			var l2tod=  $.trim($("#tab"+nlot).val());
		}
		
		nlot=nlot+1;
		if(num!="" && (l3up!="" || l3tod!="" || l2tod!="")){
			if(num.length==2){
				lotto[alot] = num+","+TrimComma(l3up)+","+TrimComma(l3tod)+","+TrimComma(l2tod);
				alot++;
			}
		}
	}
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
				data: { "lotto": lotto , "tlot": 3 , "zone": 1 , "rob": 1 },
				dataType:"json",
				/*timeout: 30000,*/
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
  		<? include "new-menu.php"; ?>
		
	<div class="panel-heading">
		<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong><!-- 2 ตัว บน-ล่าง --><?=$lang_l2tuaTopBot;?></strong></h1>
    </div>
	
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-3ths">
        &nbsp;
        </div>
        <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan"  onClick="fcopymoney(5,'tab1')" style="margin-bottom:5px" name="col1money" id="col1money"><strong><i class="fa fa-files-o"></i> <!-- คัดลอก --><?=$lang_copy;?></strong></button>
        </div>
        <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan" onClick="fcopymoney(6,'tab2')" style="margin-bottom:5px" name="col2money" id="col2money" <?     if($profile["user_stabdown"]==0){echo' disabled="disabled"'; }?>><strong><i class="fa fa-files-o"></i> <!-- คัดลอก --><?=$lang_copy;?></strong></button>
        </div>
          <div class="col-xs-3ths">
          <button class="btn btn-default btn-block thaisan"  onClick="fcopymoney(7,'tab3')" style="margin-bottom:5px" name="col3money" id="col3money"><strong><i class="fa fa-files-o"></i> <!-- คัดลอก --><?=$lang_copy;?></strong></button>
        </div>
        
        
        <form name="lot2" method="post" action="main.php?cmd=lot2&subcmd=save" id="lot2" onSubmit="return save_lotto();">
        
       <div class="col-xs-3ths thaisan" align="center" style="background-color:#333333; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px"><!-- เลข --><?=$lang_number;?></div>
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">
            <input name="col1c" type="checkbox" id="col1c" checked="checked" onClick="fdisabled(5,'col1')" style="margin:0px; padding:0px">
            <!-- 2 ตัวบน --><?=$lang_l2tuaTop;?></div>
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">
            <input name="col2c" type="checkbox" id="col2c"  onClick="fdisabled(6,'col2')" style="margin:0px; padding:0px"  <?     if($profile["user_stabdown"]==0){echo' disabled="disabled"'; }else{ echo 'checked="checked"'; }?>>
             <!-- 2 ตัวล่าง --> <?=$lang_l2tuaBot;?></div>
          <div class="col-xs-3ths thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; margin-bottom:5px">
            <input name="col3c" type="checkbox" id="col3c" onClick="fdisabled(7,'col3')" style="margin:0px; padding:0px" checked="checked">
         <!-- 2 ตัวโต๊ดบน --><?=$lang_l2TuaTodTop;?></div>
        
        
     
          <? 
		  $tab = 0;
		  for($i=0;$i<10;$i++){ ?>
          <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="num<?=$i?>" type="tel" class="form-control" id="tab<?=$tab?>" maxlength="2" onKeyPress="checknumber()">
          </div>
          <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="col1<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);">
          </div>
         <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="col2<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);" <?     if($profile["user_stabdown"]==0){echo' placeholder="<?=$lang_close;?>" disabled="disabled"'; }?>>
          </div>
        <div class="col-xs-3ths" style="margin-bottom:5px">
          <input name="col3<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);">
          </div>
          <? $tab=$tab+1; } ?>
          <div class="col-xs-8ths">
            <button class="btn btn-warning btn-block thaisan" type="submit"  id="btsave"><strong><i class="fa fa-floppy-o"></i> <!-- บันทึกข้อมูล --><?=$lang_save;?></strong></button>
          </div>
          <div class="col-xs-4ths">
            <button class="btn btn-danger btn-block thaisan" type="button" onClick="clear_txt();"  id="btreset" ><strong><!-- ยกเลิก --><?=$lang_cancel;?></strong></button>
          </div>
        </form>
      </div>
	</div>

    </div>
</div>

<br />
