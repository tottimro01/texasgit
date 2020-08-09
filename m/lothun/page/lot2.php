<?
$_SESSION["zone_hun"] = $_GET["zone_send"];
if($_GET["zone_send"]==""){
?>
<style type="text/css">
	.blueDiv {
    width: 125px;
    height: 125px;
    background-color: #3399FF;
    margin: auto;
    cursor: pointer;
    margin-top: 10px;
}
.blueTitle {
width: 100%;
height: 30px;
text-align: center;
font-size: 20px;
font-weight: bold;
color: #FFFFFF;
margin-top: 60px;
}

</style>
<div style="display: block; position: fixed; width: 100%; height: 100%;     background: rgba(0,0,0,0.9); left: 0px; top: 0px; z-index: 99; overflow-y: scroll; padding-bottom: 60px;">

<div class="blueTitle"><?=$arr_zone[3]?></div>
	<div class="blueDiv" style="background: url(../img/home/<?=$arr_zone_pic[3]?>); background-size: contain; background-repeat: no-repeat;" onclick="$('#zone_send').val('3'); $('#form_send').submit();"></div>


<div class="blueTitle"><?=$arr_zone[1]?></div>
	<div class="blueDiv" style="background: url(../img/home/<?=$arr_zone_pic[1]?>); background-size: contain; background-repeat: no-repeat;" onclick="$('#zone_send').val('1'); $('#form_send').submit();"></div>

	<div class="blueTitle"><?=$arr_zone[2]?></div>
	<div class="blueDiv" style="background: url(../img/home/<?=$arr_zone_pic[2]?>); background-size: contain; background-repeat: no-repeat;" onclick="$('#zone_send').val('2'); $('#form_send').submit();"></div>

	<form action="main.php" method="get" id="form_send">
	<input type="hidden" id="cmd" name="cmd" value="lot2">
        <input type="hidden" id="zone_send" name="zone_send">
        </form>
</div>
<? } ?>

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
	<div class="panel-heading">
		<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong>แทงด่วน</strong></h1>
    </div>
	
    <div class="panel-body">
    <? if($_GET["zone_send"]==3){ ?>
		<div class="row">
			<div class="col-xs-12"><div style="height: 200px; background: #000000; display: block; margin-bottom: 5px;">dddd</div></div>
			
		</div>
     <? } ?>
      <div class="row">
        <div class="col-xs-3">
        &nbsp;
        </div>
        <div class="col-xs-3">
          <button class="btn btn-default btn-block thaisan"  onClick="fcopymoney(5,'tab1')" style="margin-bottom:5px" name="col1money" id="col1money"><strong><i class="fa fa-files-o"></i>คัดลอก</strong></button>
        </div>
        <div class="col-xs-3">
          <button class="btn btn-default btn-block thaisan" onClick="fcopymoney(6,'tab2')" style="margin-bottom:5px" name="col2money" id="col2money" <?     if($profile["user_stabdown"]==0){echo' disabled="disabled"'; }?>><strong><i class="fa fa-files-o"></i>คัดลอก</strong></button>
        </div>
          <div class="col-xs-3">
          <button class="btn btn-default btn-block thaisan"  onClick="fcopymoney(7,'tab3')" style="margin-bottom:5px" name="col3money" id="col3money"><strong><i class="fa fa-files-o"></i>คัดลอก</strong></button>
        </div>
        
        
        <form name="lot2" method="post" action="main.php?cmd=lot2&subcmd=save" id="lot2" onSubmit="return save_lotto();">
        
       <div class="col-xs-3 thaisan" align="center" style="background-color:#333333; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">เลข</div>
          <div class="col-xs-3 thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">
            <input name="col1c" type="checkbox" id="col1c" checked="checked" onClick="fdisabled(5,'col1')" style="margin:0px; padding:0px">
            บน</div>
          <div class="col-xs-3 thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; border-right:1px solid #FFFFFF; margin-bottom:5px">
            <input name="col2c" type="checkbox" id="col2c"  onClick="fdisabled(6,'col2')" style="margin:0px; padding:0px"  <?     if($profile["user_stabdown"]==0){echo' disabled="disabled"'; }else{ echo 'checked="checked"'; }?>>
             ล่าง </div>
          <div class="col-xs-3 thaisan" align="center" style="background-color:#666666; font-size:14px; padding-top:10px; padding-bottom:10px; margin-bottom:5px">
            <input name="col3c" type="checkbox" id="col3c" onClick="fdisabled(7,'col3')" style="margin:0px; padding:0px" checked="checked">
         โต๊ด</div>
        
        
     
          <? 
		  $tab = 0;
		  for($i=0;$i<6;$i++){ ?>
          <div class="col-xs-3" style="margin-bottom:5px">
          <input name="num<?=$i?>" type="tel" class="form-control" id="tab<?=$tab?>" maxlength="3" onKeyPress="checknumber()">
          </div>
          <div class="col-xs-3" style="margin-bottom:5px">
          <input name="col1<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);">
          </div>
         <div class="col-xs-3" style="margin-bottom:5px">
          <input name="col2<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);" <?     if($profile["user_stabdown"]==0){echo' placeholder="ปิด" disabled="disabled"'; }?>>
          </div>
        <div class="col-xs-3" style="margin-bottom:5px">
          <input name="col3<?=$i?>" type="tel" class="form-control" id="tab<?=$tab=$tab+1?>" maxlength="10" onKeyPress="checknumber()" onChange="dokeyup(this);" onKeyUp="dokeyup(this);">
          </div>
          <? $tab=$tab+1; } ?>
          <div style="clear: both;"></div>
          <div class="row" style="position: relative;">
<div class="col-xs-12" style="height:  150px; background-color: #F00; overflow: hidden; position: absolute; bottom: 0px; display: none;" id="box_seti"></div>

</div>
<div class="row tb_title_set" style="padding-top:10px; padding-bottom:10px;margin-bottom:5px; margin-left: 0px; margin-right: 0px;">
<div class="col-xs-3" align="center" style="font-size:14px;">
   <? if($lothun_set==1 or  $lothun_set==10 or $lothun_set==20){?>
                                  <input type="radio"<? if($_SESSION["lotset"]=="x1"){ ?> checked="checked"<? } ?> name="chk_set" id="chk_set1" onclick="set_seti(1,'all')"></input> <label for="chk_set1">i1</label>
                                     <? }?>
                      </div>
                   <div class="col-xs-3" align="center" style="font-size:14px;">
                        <? if($lothun_set==10 or $lothun_set==20){?>
                                <input type="radio"<? if($_SESSION["lotset"]=="x1,x2,x3,x4,x5,x6,x7,x8,x9,x10"){ ?> checked="checked"<? } ?> name="chk_set" id="chk_set10" onclick="set_seti(10,'all')"></input> <label for="chk_set10">i10</label>
                                   <? }?>
                    </div>
                           <div class="col-xs-3" align="center" style="font-size:14px;">
                               <? if($lothun_set==20){?>
                                 <input type="radio"<? if($_SESSION["lotset"]=="x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20"){ ?> checked="checked"<? } ?> name="chk_set" id="chk_set20" onclick="set_seti(20,'all')"></input> <label for="chk_set20">i20</label>
                                    <? }?>
                           </div>
                           <div class="col-xs-3" align="center" style="font-size:14px;">
                                  <input type="radio"<? if($_SESSION["lotset"]!="x1" and $_SESSION["lotset"]!="x1,x2,x3,x4,x5,x6,x7,x8,x9,x10" and $_SESSION["lotset"]!="x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20"){ ?> checked="checked"<? } ?> name="chk_set" id="chk_setx" onclick="set_seti('','box')"></input> <label for="chk_setx">iX</label>

            </div>
            </div>
          <div class="col-xs-8">
            <button class="btn btn-warning btn-block thaisan" type="submit"  id="btsave"><strong><i class="fa fa-floppy-o"></i> บันทึกข้อมูล</strong></button>
          </div>
          <div class="col-xs-4">
            <button class="btn btn-danger btn-block thaisan" type="button" onClick="clear_txt();"   id="btreset" ><strong>ยกเลิก</strong></button>
          </div>
        </form>
      </div>
	</div>

    </div>
</div>

<br />
