<?
$_SESSION["zone_hun"] = $_GET["zone_send"];
if($_GET["zone_send"]==""){
?>
<style type="text/css">
    .blueDiv {
    width: 150px;
    height: 150px;
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
<div style="display: block; position: fixed; width: 100%; height: 100%;     background: rgba(0,0,0,0.9); left: 0px; top: 0px; z-index: 99">
<div class="blueTitle"><?=$arr_zone[1]?></div>
    <div class="blueDiv" style="background: url(../img/home/<?=$arr_zone_pic[1]?>); background-size: contain; background-repeat: no-repeat;" onclick="$('#zone_send').val('1'); $('#form_send').submit();"></div>

    <div class="blueTitle"><?=$arr_zone[2]?></div>
    <div class="blueDiv" style="background: url(../img/home/<?=$arr_zone_pic[2]?>); background-size: contain; background-repeat: no-repeat;" onclick="$('#zone_send').val('2'); $('#form_send').submit();"></div>

    <form action="main.php?cmd=lotex" method="get" id="form_send">
    <input type="hidden" id="cmd" name="cmd" value="lotex">
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

<div class="row">
	<div class="panel panel-default">
    <div class="panel-heading">
		<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong>พิเศษ</strong></h1>
    </div>
    <div class="panel-body">
        <form name="lotex" method="post" action="main.php?cmd=lotex&subcmd=save" id="lotex" onSubmit="return save_lotto();">
			<div class="row">
            
            <div class="col-xs-12 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">19 หาง</div>
            <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">เลข</div>
            <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">บน</div>
            <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">ล่าง</div>
            <div class="col-xs-4" align="right"><input name="txtLot19h1" type="tel" class="form-control" id="txtLot19h1" style="margin-top:5px; margin-bottom:5px" onKeyPress="checknumber()" maxlength="1"></div>
            <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot19hup1" type="tel" class="form-control" id="txtLot19hup1" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
            <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot19hdown1" type="tel" class="form-control" id="txtLot19hdown1" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
            
            

            <div class="col-xs-6 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">เลขพี่น้อง</div>
            <div class="col-xs-6 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">เลขเบิ้ล</div>
            <div class="col-xs-3 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">บน</div>
            <div class="col-xs-3 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">ล่าง</div>
            <div class="col-xs-3 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">บน</div>
            <div class="col-xs-3 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">ล่าง</div>
            <div class="col-xs-3" style="margin-top:5px; margin-bottom:5px"><input name="txtLotpup1" type="tel" class="form-control" id="txtLotpup1" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
            <div class="col-xs-3" style="margin-top:5px; margin-bottom:5px"><input name="txtLotpdown1" type="tel" class="form-control" id="txtLotpdown1" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
            <div class="col-xs-3" style="margin-top:5px; margin-bottom:5px"><input name="txtLotbup1" type="tel" class="form-control" id="txtLotbup1" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
            <div class="col-xs-3" style="margin-top:5px; margin-bottom:5px"><input name="txtLotbdown1" type="tel" class="form-control" id="txtLotbdown1" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
            
            
            
            <? if($lot_pay_big5[8]>0){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">1 ตัวบน สูง-ต่ำ</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
                <div class="col-xs-2" align="right"><input name="txtLot1top" type="radio" class="form-control" value="H"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">สูง</div>
                <div class="col-xs-2" align="right"><input name="txtLot1top" type="radio" class="form-control" value="L"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">ต่ำ</div>
                <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot1topprice" type="tel" class="form-control" id="txtLot1topprice" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
                
                <? if($lot_pay_big5[9]>0){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">2 ตัวบน สูง-ต่ำ</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
                <div class="col-xs-2" align="right"><input name="txtLot2top" type="radio" class="form-control" value="H"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">สูง</div>
                <div class="col-xs-2" align="right"><input name="txtLot2top" type="radio" class="form-control" value="L"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">ต่ำ</div>
                <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot2topprice" type="tel" class="form-control" id="txtLot2topprice" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
             
                
				<? if($lot_pay_big5[11]>0){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">2 ตัวล่าง สูง-ต่ำ</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
                
                <div class="col-xs-2" align="right"><input name="txtLot2down" type="radio" class="form-control" value="H"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">สูง</div>
                <div class="col-xs-2" align="right"><input name="txtLot2down" type="radio" class="form-control" value="L"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">ต่ำ</div>
                <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot2downprice" type="tel" class="form-control" id="txtLot2downprice" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
                	<? if( $lot_pay_big5[12]>0){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">คี่-คู่</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
                <div class="col-xs-2" align="right"><input name="txtLottwin" type="radio" class="form-control" value="E"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">คี่</div>
                <div class="col-xs-2" align="right"><input name="txtLottwin" type="radio" class="form-control" value="K"></div>
                <div class="col-xs-2 thaisan" align="left" style="color:#333333; font-size:16px; margin-top:5px">คู่</div>
                <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLottwinprice" type="tel" class="form-control" id="txtLottwinprice" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
            
                
                <? if($lot_pay_big5[14]>0){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">3ใน4</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
                <div class="col-xs-8" align="right" style="margin-top:5px; margin-bottom:5px"><input name="txtLot3in4" type="tel" class="form-control" id="txtLot3in4" onKeyPress="checknumber()" maxlength="3" onKeyUp="chtype('txtLot3in4',3);"></div>
                <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot3in4price" type="tel" class="form-control" id="txtLot3in4price" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
                
                <? if($lot_pay_big5[15]>0){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">3ใน5</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
                <div class="col-xs-8" align="right" style="margin-top:5px; margin-bottom:5px"><input name="txtLot3in5" type="tel" class="form-control" id="txtLot3in5" onKeyPress="checknumber()" maxlength="3" onKeyUp="chtype('txtLot3in5',3);"></div>
                <div class="col-xs-4sths" style="margin-top:5px; margin-bottom:5px"><input name="txtLot3in5price" type="tel" class="form-control" id="txtLot3in5price" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
                
                <? if(($lot_pay_big5[21]>0) or ($lot_pay_big5[22]>0) or ($lot_pay_big5[23]>0)){ ?>
                <div class="col-xs-8 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="left">เลขปักหลัก</div>
                <div class="col-xs-4sths thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;" align="center">&nbsp;</div>
				<? if($lot_pay_big5[21]>0){ ?>
                <div class="col-xs-4sths thaisan" style="color:#333333; font-size:16px; margin-top:5px" align="right">หลักหน่วย : </div>
                <div class="col-xs-4sths" style="margin-top:5px">
                	<select class="form-control" id="txtDigit" name="txtDigit">
                    	<option value="">---</option>
                    	<? for($i=0;$i<10;$i++){ ?>
                    	<option value="<?=$i;?>"><?=$i;?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="col-xs-4sths" style="margin-top:5px"><input class="form-control" type="tel" id="txtDigitprice" name="txtDigitprice" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);"></div>
                <? } ?>
                <? if($lot_pay_big5[22]>0){ ?>
                <div class="col-xs-4sths thaisan" style="color:#333333; font-size:16px; margin-top:5px" align="right">หลักสิบ : </div>
                <div class="col-xs-4sths" style="margin-top:5px">
               		<select class="form-control" id="txtTens" name="txtTens">
                    	<option value="">---</option>
                    	<? for($j=0;$j<10;$j++){ ?>
                    	<option value="<?=$j;?>"><?=$j;?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="col-xs-4sths" style="margin-top:5px"><input name="txtTensprice" type="tel" class="form-control" id="txtTensprice" onChange="dokeyup(this);" onKeyPress="checknumber()" onKeyUp="dokeyup(this);" maxlength="10"></div>
                <? } ?>
            
                <? } ?>
                <div style="clear: both; "></div>
          <div class="row" style="position: relative;margin-top: 5px;">
<div class="col-xs-12" style="height:  150px; background-color: #F00; overflow: hidden; position: absolute; bottom: 0px; display: none;" id="box_seti"></div>

</div>
<div class="row tb_title_set" style="padding-top:10px; padding-bottom:10px;margin-bottom:5px;  margin-left: 0px; margin-right: 0px;">
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
                <div class="col-xs-8ths"><button class="btn btn-warning btn-block thaisan" type="submit" style="margin-top:10px"  id="btsave"><strong><i class="fa fa-floppy-o"></i> บันทึกข้อมูล</strong></button></div>
            	<div class="col-xs-4ths"><button class="btn btn-danger btn-block thaisan"  type="button" onClick="clear_txt();" style="margin-top:10px"   id="btreset" ><strong>ยกเลิก</strong></button></div>
<script>
function clear_txt(){
	$("#lotex").trigger("reset");
	
}

function chtype(i,n){
	var val = $("input[name='"+i+"']").val();
	if(val.length<n && val.length>0 && val!=""){
		if($("input[name='"+i+"price']").attr("class")!="form-control txt_disabled"){
			$("input[name='"+i+"price']").addClass("disRed");	
			$("input[name='"+i+"price']").attr("disabled" , "disabled");	
		}
	}else{
		if($("input[name='"+i+"price']").attr("class")!="form-control txt_disabled"){
			$("input[name='"+i+"price']").removeClass("disRed");
			$("input[name='"+i+"price']").removeAttr('disabled');
		}
	}
}





var submitting = false;

function save_lotto(){
	if(submitting == false){
		submitting = true;
		
	$("#btsave").hide();
	$("#btreset").hide();
	var lotto = new Array();
	var num = "";
	var sum = "";
	var cc=0;
	num = $('input[name=txtLot1top]:checked', '#lotex').val();
	sum=  $.trim($("#txtLot1topprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLot2top]:checked', '#lotex').val();
	sum=  $.trim($("#txtLot2topprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLot3top]:checked', '#lotex').val();
	sum=  $.trim($("#txtLot3topprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLot2down]:checked', '#lotex').val();
	sum=  $.trim($("#txtLot2downprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLottwin]:checked', '#lotex').val();
	sum=  $.trim($("#txtLottwinprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLot2in3]').val();
	sum=  $.trim($("#txtLot2in3price").val());
	if(num && sum!="" && !$("#txtLot2in3price").attr('disabled')){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLot3in4]').val();
	sum=  $.trim($("#txtLot3in4price").val());
	if(num && sum!="" && !$("#txtLot3in4price").attr('disabled')){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $('input[name=txtLot3in5]').val();
	sum=  $.trim($("#txtLot3in5price").val());
	if(num && sum!="" &&  !$("#txtLot3in5price").attr('disabled')){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $.trim($("#txtDigit").val());
	sum=  $.trim($("#txtDigitprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $.trim($("#txtTens").val());
	sum=  $.trim($("#txtTensprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	num = $.trim($("#txtHund").val());
	sum=  $.trim($("#txtHundprice").val());
	if(num && sum!=""){
		lotto[cc] = num+","+TrimComma(sum);
	}
	cc++;
	sum=  $.trim($("#txtLotpup1").val());
	if(sum!=""){
		var ni1 = 0;
		var ni2 = 1;
		for(var ip2 = 1;ip2<=10;ip2++){
			if(ni2>9){
				ni2 = 0;	
			}
			num = ni1+""+ni2;
			lotto[cc] = num+","+TrimComma(sum)+",,";
			cc++;
			num = ni2+""+ni1;
			lotto[cc] = num+","+TrimComma(sum)+",,";
			ni1++;
			ni2++;
			cc++;
		}
	}
	sum=  $.trim($("#txtLotpdown1").val());
	if(sum!=""){
		var ni1 = 0;
		var ni2 = 1;
		for(var ip2 = 1;ip2<=10;ip2++){
			if(ni2>9){
				ni2 = 0;	
			}
			num = ni1+""+ni2;
			lotto[cc] = num+",,"+TrimComma(sum)+",";
			cc++;
			num = ni2+""+ni1;
			lotto[cc] = num+",,"+TrimComma(sum)+",";
			ni1++;
			ni2++;
			cc++;
		}
	}
	sum=  $.trim($("#txtLotbup1").val());
	if(sum!=""){
		for(var ip2 = 0;ip2<10;ip2++){
			num = ip2+""+ip2;
			lotto[cc] = num+","+TrimComma(sum)+",,";
			cc++;
		}
	}
	sum=  $.trim($("#txtLotbdown1").val());
	if(sum!=""){
		for(var ip2 = 0;ip2<10;ip2++){
			num = ip2+""+ip2;
			lotto[cc] = num+",,"+TrimComma(sum)+",";
			cc++;
		}
	}
	var alot=cc;
	for(var cc19h=1;cc19h<=1;cc19h++){
		var num19h = $.trim($("#txtLot19h"+cc19h).val());
		var up19h = $.trim($("#txtLot19hup"+cc19h).val());
		if($("#txtLot19hdown"+cc19h).attr('disabled')){
			var down19h=  "";
		}else{
			var down19h=  $.trim($("#txtLot19hdown"+cc19h).val());
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
	for(var cc6g=1;cc6g<=1;cc6g++){
		var num6g = $.trim($("#txtLot6g"+cc6g).val());
		var up6g = $.trim($("#txtLot6gup"+cc6g).val());
		if($("#txtLot6gdown"+cc6g).attr('disabled')){
			var down6g=  "";
		}else{
			var down6g=  $.trim($("#txtLot6gdown"+cc6g).val());
		}
		var upf6g = $.trim($("#txtLot6gfdown"+cc6g).val());
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
				data: { "lotto": lotto , "tlot": 5 , "zone": 1 , "rob": 1 },
				dataType:"json",
			/*	timeout: 30000,*/
				cache: false,	// Clear cache IE
				beforeSend: function(){
					$(".loader").show();
				},
				success: function(data){
					//console.log(data.res);
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
            </div>
		</form>
	</div>
	</div>
</div> 
<br />

<? if($profile["user_stabdown"]=="0"){ ?>       
            <script>
				document.getElementById('txtLot2downprice').disabled = true;
				document.getElementById('txtLot19hdown').disabled = true;
				document.getElementById('txtLot6gdown').disabled = true;
			</script>
<? } ?>
   