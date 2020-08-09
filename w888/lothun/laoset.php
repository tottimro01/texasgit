<script>
var types=[];

types[1]=[1,5,9,13,17];

types[2]=[2,6,10,14,18];

types[3]=[3,7,11,15,19];



types[4]=[0,3,6,9,12,15,18];

types[5]=[<? $it1=1; for($it=0;$it<20;$it++){ echo $it1; $it1=$it1+3; if($it<19){ echo ","; } } ?>];

types[6]=[<? $it1=2; for($it=0;$it<20;$it++){ echo $it1; $it1=$it1+3; if($it<19){ echo ","; } } ?>];

types[7]=[<? $it1=3; for($it=0;$it<20;$it++){ echo $it1; $it1=$it1+4; if($it<19){ echo ","; } } ?>];

types[8]=[1,3,5,7,9,11,13,15,17,19];





function fcopymoney(ty,fnumber){
//alert(fnumber);
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
    }

    // for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_center12n"; }

    // for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).disabled = false; }

  }else{

    document.getElementById(bcopy+'money').disabled = true;

    document.getElementById(bcopy+'money').className = "btn_dis";

    for(var i=0;i<20;i++){ 
        var e = document.getElementById('tab'+types[ty][i]);
        e.className = e.className.replace(/txt_center12n/g, 'txt_disabled');
        e.disabled = true; 
    }

    // for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).className = "txt_disabled"; }

    // for(i=0;i<20;i++){ document.getElementById('tab'+types[ty][i]).disabled = true; }

  }

}

function numberonly(event,el){
  var e=window.event?window.event:event;
  var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;              
  //0-9 (numpad,keyboard)
//  alert(keyCode);
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
      for(var i=nex_txt;i<=60;i++){
        if(i==60){
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
<style>
  .color-black{
    color: #000!important;
  }
</style>
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
               if(($_SESSION["zone_hun"]==3 and $time_end<$time_stam)){
          
                     }else{
                        ?>
                                                      onComplete: countdownComplete ,
                    <? } ?>
                  style:"flip"  // <- no comma on last item!
                  });


</script> 
<? }?>


      </div>
      <div style="clear:both;"></div></td>
  <td>

    <table width="100%" cellspacing="2" cellpadding="0" class="lotto_open_table">
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
        </table>

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
                              <td height="25" colspan="4" align="center" class="tb_title_lotto"><?=$lang_member[640];?></td>
                            </tr>

                            <tr class="txt_back12btitle">
                              <td width="65" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
                              <td width="65" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
                              <td width="65" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
                              <td width="65" height="20" align="center" bgcolor="#FFFFFF"><?=$lang_member[381];?></td>
                              
                           
                            </tr>
                            <? 
              $tab = 0;
              for($i=0;$i<25;$i++){ 
              ?>
                            <tr>
                <td height="22" align="center" class="bg_td">
                  <div style="display: flex; padding-right: 2px;">
                  <label for="tab<?=$tab;?>" style="width: 22px;"><?=$i+1;?></label>
                  <input name="num<?=$i;?>" ty style="width: 50px; color: #f28e5b;"pe="text" class="txt_center12b input lotnum_laoset" id="tab<?=$tab;?>" size="7" maxlength="4" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);">
                  </div>
                </td>

                <td height="22" align="center" class="bg_td">
                  <div style="display: flex; padding-right: 2px;">
                  <label for="tab<?=$tab+25;?>" style="width: 22px;"><?=$i+25+1;?></label>
                  <input name="num<?=$i+25;?>" style="width: 50px; color: #f28e5b;" type="text" class="txt_center12b input lotnum_laoset" id="tab<?=$tab+25;?>" size="7" maxlength="4" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);">
                  </div>
                </td>

                <td height="22" align="center" class="bg_td">
                  <div style="display: flex; padding-right: 2px;">
                  <label for="tab<?=$tab+50;?>" style="width: 22px;"><?=$i+50+1;?></label>
                  <input name="num<?=$i+50;?>" style="width: 50px; color: #f28e5b;" type="text" class="txt_center12b input lotnum_laoset" id="tab<?=$tab+50;?>" size="7" maxlength="4" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);">
                  </div>
                </td>

                <td height="22" align="center" class="bg_td">
                  <div style="display: flex; padding-right: 2px;">
                  <label for="tab<?=$tab+75;?>" style="width: 22px;"><?=$i+75+1;?></label>
                  <input name="num<?=$i+75;?>" style="width: 50px; color: #f28e5b;" type="text" class="txt_center12b input lotnum_laoset" id="tab<?=$tab+75;?>" size="7" maxlength="4" onKeyDown="return numberonly(event,this)" onKeyUp="next_enter(event,<?=$tab?>);">
                  </div>
                </td>
              
                      
                            </tr>
                            <? $tab=$tab+1; } ?>

            <tr>
              <td class="bg_td lotbet_sum_cell text-right lotbet-col-sum total" data-laoset-price="<?=$eset[1];?>" colspan="4">
                <span class="text-bold"><?=$lang_member[700];?>: </span><span class="tt">0</span>
              </td>
            </tr>
                       
                            <tbody>
                            <tr>
                              <td height="33" colspan="4" align="center" class="bg_td">
                              <br>
                              <span style="float:left; text-align:left; display:block; padding-left:5px; font-size: 12px;">
             
<?=$lang_member[2150];?> <?=$_SESSION['m_currency'];?> <?=number_format($eset[1]);?> </span>
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
  
  // var lotto = new Array();
  // var nlot = 0;
  // var alot = 0;
  // for(var cc=0;cc<20;cc++){
  //   var num = $.trim($("#tab"+nlot).val());
  //   nlot=nlot+1;
  //   if($("#tab"+nlot).attr('disabled')){
  //     var l3up=  "";
  //   }else{
  //     var l3up=  $.trim($("#tab"+nlot).val());
  //   }
  //   nlot=nlot+1;
  //   if($("#tab"+nlot).attr('disabled')){
  //     var l3down=  "";
  //   }else{
  //     var l3down=  $.trim($("#tab"+nlot).val());
  //   }
  //   nlot=nlot+1;
    /*if($("#tab"+nlot).attr('disabled')){
      var l3tod=  "";
    }else{
      var l3tod=  $.trim($("#tab"+nlot).val());
    }
    nlot=nlot+1;*/
  //   if(num!="" && (l3up!="" || l3down!="")){
  //     if(num.length==1 || num.length==2  || num.length==3){
  //       lotto[alot] = num+","+l3up+","+l3down+",";
  //       alot++;
  //     }
  //   }
  // }
  var lotto = [];
  for (var cc = 0; cc < 100; cc++) {
    var vv = $.trim($("#tab"+cc).val());
    if(vv.length==4){
      lotto.push(vv);
    }
  }
  // console.log(lotto)
  // return
  /*console.log(lotto);
  return false;*/
  if(lotto.length<=0){
    alert("<?=$lang_member[439];?>");
    $("#btsave").show();
    $("#btreset").show();
    submitting = false;
  }else{

    // lotto = "" + lotto.join(",") + "";
    //var rcc = confirm("<?=$lang_member[1042];?>");
    var rcc = true;
    if (rcc == true) {  
      $.ajax({
        type: "POST",
        url: "lothun/save_lotto.php",
        data: { "lotto": lotto , "tlot": 10 , "zone": <?=$_SESSION["zone_hun"];?> , "rob": <?=$_SESSION["rob_hun"];?> },
        dataType:"json",
        cache: false, // Clear cache IE
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
          
          load_list(10);
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

  // jQuery(document).ready(function($) {
  //   $('input.txt_center12b').css('color', '#f28e5b');
  // });
  $(document).on('input', 'input.txt_center12b', function(event) {
    event.preventDefault();
    var v = $(this).val();
    if(v.length==4){
      $(this).addClass('color-black');
    }else{
      $(this).removeClass('color-black');
    }
  });
</script>