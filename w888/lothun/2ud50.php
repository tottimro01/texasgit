<script>
var types=[];

types[1]=[1,5,9,13,17];

types[2]=[2,6,10,14,18];

types[3]=[3,7,11,15,19];



types[4]=[0,3,6,9,12,15,18];

types[5]=[<? $it1=1; for($it=0;$it<50;$it++){ echo $it1; $it1=$it1+3; if($it<49){ echo ","; } } ?>];

types[6]=[<? $it1=2; for($it=0;$it<50;$it++){ echo $it1; $it1=$it1+3; if($it<49){ echo ","; } } ?>];

types[7]=[<? $it1=3; for($it=0;$it<50;$it++){ echo $it1; $it1=$it1+4; if($it<49){ echo ","; } } ?>];

types[8]=[1,3,5,7,9,11,13,15,17,19];





function fcopymoney(ty,fnumber){
//alert(fnumber);
	var fnum=document.getElementById(fnumber).value;

	if(fnum!=""){ for(i=1;i<50;i++){ document.getElementById('tab'+types[ty][i]).value = fnum; } }	

}



function fdisabled(ty,bcopy){

	if(document.getElementById(bcopy+'c').checked==true){

		document.getElementById(bcopy+'money').disabled = false;

		document.getElementById(bcopy+'money').className = "btn_le";

		for(i=0;i<50;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_center12n"; }

		for(i=0;i<50;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; }

	}else{

		document.getElementById(bcopy+'money').disabled = true;

		document.getElementById(bcopy+'money').className = "btn_dis";

		for(i=0;i<50;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_disabled"; }

		for(i=0;i<50;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; }

	}

}

function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			     
	//0-9 (numpad,keyboard)
//	alert(keyCode);
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
      for(var i=nex_txt;i<=150;i++){
        if(i==150){
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
                  <?
                      # if(($time_end<$time_stam and $dw==0 and $dw==6 and $_SESSION["zone_hun"]!=3)){ 
			         if(($_SESSION["zone_hun"]==1 and $time_end<$time_stam)){
				
				      }elseif(($_SESSION["zone_hun"]==2 and $time_end<$time_stam)){
					
					  }elseif(($_SESSION["zone_hun"]==3 and $time_end<$time_stam)){
					
                     }else{
                        ?>
                                                      onComplete: countdownComplete ,
                    <? } ?>
									style:"flip"	// <- no comma on last item!
									});


</script>
<?}?> 
      </div>
      <div style="clear:both;"></div></td>
      <td>
      <!-- <div style="background: url(images/home/<?=$arr_zone_pic[$_SESSION[zone_hun]]?>); background-size: contain; background-repeat: no-repeat; width: 40px; height: 40px; float: left;"></div> -->
      <div style="height: 40px; line-height: 40px;, float: left; font-weight: bold; padding: 0 4px; float: left;"><?=$_SESSION["name_hun"];?></div>
      
      <input name="col2money" type="button" class="btn_le" id="col2money" value="<?=$lang_member[525];?>" onClick="window.location.href='main_lothun.php?tlot=2ud&zone_send=<?=$_SESSION["zone_hun"];?>&rob_send=<?=$_SESSION["rob_hun"];?>&name_send=<?=$_SESSION["name_hun"];?>&vvw='+fw" style="width:100px;height:20px;cursor:pointer; margin-top:2px; margin-bottom:2px; line-height:10px; background:#f7c63c; float: left; margin-left: 10px; margin-top: 10px;">
      <input name="col2money" type="button" class="btn_le" id="col2money" value="<?=$lang_member[487];?>" onClick="window.location.href='main_lothun.php?tlot=2ud100&zone_send=<?=$_SESSION["zone_hun"];?>&rob_send=<?=$_SESSION["rob_hun"];?>&name_send=<?=$_SESSION["name_hun"];?>&vvw='+fw" style="width:100px;height:20px;cursor:pointer; margin-top:2px; margin-bottom:2px; line-height:10px; background:#f7c63c; float: left; margin-left: 10px; margin-top: 10px;">
      </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top" width="305">
                                     <?
                      if($time_end<=$time_stam){
          
				      echo"<center><h2 class='cr'>$lang_member[317]</h1></center>";

					  }else{
					  ?>   
            <form method="post" id="InputForm" name="InputForm" action="save_data.php" target="ifdb" style="display:inline">
                <table width="300" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td height="335" id="vdata">
                      <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
                      
                
                            <tr>
                              <td height="25" colspan="3" align="center" class="tb_title_lotto"><?=$lang_member[483];?></td>
                            </tr>
                            <tr>
                              <td align="center">&nbsp;</td>
                              <td align="center"><? if($lot_pay_big5[4]>0){ ?><input name="col1money" type="button" class="btn_le btn_small yellow w50px" id="col1money" value="<?=$lang_member[371];?>" onClick="fcopymoney(5,'tab1')" ><? }?></td>
                              <td align="center"><? if($lot_pay_big5[5]>0){ ?><input name="col2money" type="button" class="btn_le btn_small yellow w50px" id="col2money" value="<?=$lang_member[371];?>" onClick="fcopymoney(6,'tab2')" ><? }?></td>
                         
                            </tr>
                            <tr class="txt_back12btitle">
                              <td width="65" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
                              <td width="75" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
                                  <tbody>
                                    <tr>
                                      <td><? if($lot_pay_big5[4]>0){ ?><input name="col1c" type="checkbox" id="col1c" checked="checked" onClick="fdisabled(5,'col1')"><? }?></td>
                                      <td><?=$lang_member[448];?><?#=$lang_member[390];?></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                              <td width="75" align="center" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" class="txt_back12btitle no_cell_border">
                                  <tbody>
                                    <tr>
                                      <td><? if($lot_pay_big5[5]>0){ ?><input name="col2c" type="checkbox" id="col2c" checked="checked" onClick="fdisabled(6,'col2')"><? }?></td>
                                      <td><?=$lang_member[450];?><?#=$lang_member[393];?></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                      
                            </tr>
                            <? 
							$tab = 0;
							for($i=0;$i<50;$i++){ 
							?>
                            <tr>
                              <td height="22" align="center" class="bg_td"><input name="num<?=$i?>" type="text" class="txt_center12b input" id="tab<?=$tab?>" size="7" maxlength="3" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);"></td>
                               <td align="center" class="bg_td"><? $tab=$tab+1?><? if($lot_pay_big5[4]>0){ ?><input name="col1<?=$i?>" type="text" class="txt_center12n input" id="tab<?=$tab?>" size="10" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);"><? }?></td>
                              <td align="center" class="bg_td"><? $tab=$tab+1?><? if($lot_pay_big5[5]>0){ ?><input name="col2<?=$i?>" type="text" class="txt_center12n input" id="tab<?=$tab?>" size="10" maxlength="6" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);"><? }?></td>
                        
                            </tr>
                            <? $tab=$tab+1; } ?>
                 
                            <tbody>
                            <tr>
                              <td height="33" colspan="3" align="center" class="bg_td">
                              <br>
                              <span style="float:left; text-align:left; display:block; padding-left:5px; font-size: 12px;">
                              <?=$lang_member[379];?> <?=$_SESSION['m_currency'];?> 10 <br>
<?=$lang_member[380];?> <?=$_SESSION['m_currency'];?> 10,000 </span>
<div style="padding-top:5px;"><input type="hidden" id="func" name="func">
                                <input type="hidden" id="cnt" name="cnt" value="<?=$tab-1?>">
                                <input type="hidden" id="maintype" name="maintype" value="number2">
                                <input name="btsave" type="button" class="btn_le btn_small w60px" id="btsave" value="<?=$lang_member[121];?>" onClick="save_lotto()" <?=$disabled?> >
                                <input name="btreset" type="reset" onClick="load_19h(1)" class="btn_le btn_small danger w60px" id="btreset" value="<?=$lang_member[374];?>" <?=$disabled?> ></div><br></td>
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
            <td align="center" valign="top">
            <? if($_SESSION["zone_hun"] ==19){ ?>
            
<?
$w="455";
$h="300";
#$url="rtmp://202.162.78.180/live/xxx";
?>
<script src="https://jwpsrv.com/library/4+R8PsscEeO69iIACooLPQ.js"></script>
<div id="my-video"></div>
<script>
  jwplayer.key = '65FhM7BdiMpzpZJn1yW+KBxXwba2FH8HUJ3xu4ubdBQ=';
  jwplayer.jwpsrv.setSampleFrequency(0.0001);
</script>
<script type="text/javascript">
    jwplayer("my-video").setup({
        autostart: false,
        file: "<?=$streaming;?>",
        // image: "https://website-7.kxcdn.com/img/keycdn-promo.png",
        width: <?=$w;?>,
        height: <?=$h;?>,
        primary: "html",
        autostart: true,
    });
</script>
<!-- <script src="js/jwscript.js?x=1.4.48"></script>
<script>
	jwplayer.key = '65FhM7BdiMpzpZJn1yW+KBxXwba2FH8HUJ3xu4ubdBQ=';
	jwplayer.jwpsrv.setSampleFrequency(0.0001);
</script>
<center>
<div id="myElement_wrapper" style="position: relative; display: block;width:<?=$w;?>px;height:<?=$h;?>px;z-index:999; margin-top:0px;">
<object type="application/x-shockwave-flash" style="z-index:999;" data="js/jwplayer.flash.swf" width="<?=$w;?>px" height="<?=$h;?>px" bgcolor="#000000" id="myElement" name="myElement" tabindex="0">
<param name="allowfullscreen" value="true">
<param name="allowscriptaccess" value="always">
<param name="seamlesstabbing" value="true">
<param name="wmode" value="opaque">
</object>
<div id="myElement_aspect" style="display: none;"></div>
<div id="myElement_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div>
</div>
</center>
<script type="text/javascript">
jwplayer('myElement').setup({
file: '<?=$streaming;?>',
 controls : true,
width: <?=$w;?>,
height: <?=$h;?>,
autostart: 'true',
repeat: 'true'

});

</script> -->


            	<? } ?>
				<div id="vdata2"></div>
            </td>
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
	for(var cc=0;cc<50;cc++){
		var num = $.trim($("#tab"+nlot).val());
		nlot=nlot+1;
		if($("#tab"+nlot).attr('disabled')){
			var l3up=  "";
		}else{
			var l3up=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;
		if($("#tab"+nlot).attr('disabled')){
			var l3down=  "";
		}else{
			var l3down=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;
		/*if($("#tab"+nlot).attr('disabled')){
			var l3tod=  "";
		}else{
			var l3tod=  $.trim($("#tab"+nlot).val());
		}
		nlot=nlot+1;*/
		if(num!="" && (l3up!="" || l3down!="")){
				if(num.length==1 || num.length==2  || num.length==3){
				lotto[alot] = num+","+l3up+","+l3down+",";
				alot++;
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
		var rcc = true;
		if (rcc == true) {	
			$.ajax({
				type: "POST",
				url: "lothun/save_lotto.php",
				data: { "lotto": lotto , "tlot": 1 , "zone": <?=$_SESSION["zone_hun"];?> , "rob": <?=$_SESSION["rob_hun"];?> },
				dataType:"json",
			/*	timeout: 30000,*/
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
					load_list(3);
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

}
</script>