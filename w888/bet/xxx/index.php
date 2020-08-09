<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
if($_SESSION[mid]==""){@header('Location: login.php');exit();}

require('txt/active/'.$_SESSION[crid].'.php');
require('inc/conn.php');
require('inc/function.php');
require('txt/config.php');
require('process/data/data_'._rob().'.php');
require('process/data/rid_'.$_SESSION[crid].'_'._rob().'.php');




if($r_active!=1){
@session_start(); 
@session_destroy();
@header('Location: login.php');exit();
}

$mod_call=$_GET[p];
 if($mod_call=="logout"){
@session_start(); 
@session_destroy();
@header('Location: login.php');exit();
	 }
elseif($mod_call=="pass"){$PC='inc/_pass.php';}
elseif($mod_call=="ball"){$PC='inc/_ball.php';}
elseif($mod_call=="step"){$PC='inc/_step.php';}
elseif($mod_call=="bill"){$PC='inc/_bill.php';}
elseif($mod_call=="process"){$PC='inc/_process.php';}
elseif($mod_call=="one"){$PC='inc/_one.php';}
elseif($mod_call=="score"){$PC='inc/_score.php';}
elseif($mod_call=="app"){$PC='inc/_app.php';}
elseif($mod_call=="statement"){$PC='inc/_statement.php';}
elseif($mod_call=="leage"){$PC='inc/_leage.php';}
elseif($mod_call=="lastlogin"){$PC='inc/_lastlogin.php';}
else{$PC='inc/_main0.php';}
	 
	 
$view_date=viewdate();

$tstep=explode(",",$_SESSION[m_step2]);

#print_r($_SESSION[m_min]);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>โปรแกรมโต๊ะบอล</title>
<meta http-equiv="refresh" content="900 ;url=<?=$hostserver;?>?<?=$_SERVER['QUERY_STRING'];?>"/>
<link rel="shortcut icon" type="image/x-icon" href="http://img.step98.com/favicon.ico">
<link href="http://css.step98.com/style.css" rel="stylesheet" type="text/css" />
<link href="http://css.step98.com/ball.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Cache-Control" content="no-store">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">    
	<script type="text/javascript" src="http://js.step98.com/jquery-latest.js?v=2019"></script>
    <script type="text/javascript" src="http://js.step98.com/js_ball-168_<?=$tstep[1];?>.js?v=2019"></script>
    <script src="num_code.php?nocache=<?=date("Y-d-m H:i:s");?>"></script> 
<script type="text/javascript" >
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function _w(url){
	window.location=url;
	}
function _o(url){
	window.open(url);
	}
	
 $(document).ready(function() {

 	$("#token").load('token.php');
   var refreshId = setInterval(function() {
 	 $("#token").load('token.php?randval='+ Math.random());
   }, 10000);
   $.ajaxSetup({ cache: false });
   
   
   $(window).scroll(function(){  
//		เมื่อเลื่อน scroll bar หน้าเพจ ถึงตำแหน่งที่มากกว่าหรือเท่ากับตำแหน่งที่ต้องการ
//		เมื่อเลื่อน scroll bar หน้าเพจ ถึงตำแหน่ง ที่ทำให้ div
//		class ชื่อ my_float_div ชิดขอบบนพอดี หาจากคำสั่ง
		//$("#ssc").html($(document).scrollTop());
		//alert($(document).height());
         if($(document).scrollTop()>142){ 
		 	/*$("#pg_h").addClass("fix");*/
			$("#pg_h").css({ 
				/*'position':'fixed',*/
				'top':$(document).scrollTop()-110
			});
         }else{  // เลื่อนกลับมาอยู่ตำแหน่งเดิม ถ้าไม่อยู่ในเงื่อนไข
		 	/*$("#pg_h").removeClass("fix");*/
			$("#pg_h").css({
				/*'position':'absolute',*/
				'top':''
			});
         }  
     });  	 



  $(window).scroll(function(){  
         if($(document).scrollTop()>240){ 
		
		$("#bet_menu").css({ 
				'top':$(document).scrollTop()-240
			});
         }else{ 
			$("#bet_menu").css({
				'top':''
			});
         }  
     });  	 
});



function addCommas(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1].substr(0,2) : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function TrimComma(currentTags) {  
	var currentTagTokens = currentTags.split(",");
	var existingTags = "";

	for ( var i = 0; i < currentTagTokens.length; i++ ) { 
		existingTags = existingTags + currentTagTokens[i];
	}
	return existingTags;
}
var  x_code_last=[];

function chk_last(txt , lg, kk){
	var res = txt.split("+");
for ( var i = 0; i <lg ; i++ ) { 
var check=isNaN(x_code_last[res[i]]);
if(check==false){
	// console.log("เตะแล้ว "+x_code_last[res[i]]);   
	 alert("เตะแล้วคู่ "+res[i]); 
	 var kop=i+1;
	  $("#atxt2"+kop).val('');
	 $("#"+kk).focus();
	 
	}
}		 
}


function chk_code(kk, type){
	 var value = event.keyCode;
	 	 
	 if(value==107 || value==32  || value==13 || type==2){
		var val_cc=$("#"+kk).val();
	 var res = val_cc.split("+");
	 var lg=res.length;
	 var txt="คู่เดียวกัน ";
	  var txt2=" กับ  ";
	 
	 chk_last(val_cc, lg, kk);
	//  console.log("เตะแล้ว ="+res.length);   

if(lg==2){
	if(res[1]>0){
	if(x_code[res[0]]==x_code[res[1]]){ alert(txt+" "+res[0]+txt2+res[1]); $("#"+kk).focus();}
	}
}else if(lg==3){
		if(res[2]>0){
	        if(x_code[res[0]]==x_code[res[2]]){ alert(txt+" "+res[0]+txt2+res[2]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[2]]){ alert(txt+" "+res[1]+txt2+res[2]); $("#"+kk).focus();}
		}
}else if(lg==4){
		if(res[3]>0){
	        if(x_code[res[0]]==x_code[res[3]]){ alert(txt+" "+res[0]+txt2+res[3]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[3]]){ alert(txt+" "+res[1]+txt2+res[3]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[3]]){ alert(txt+" "+res[2]+txt2+res[3]); $("#"+kk).focus();}
		}
}else if(lg==5){
		if(res[4]>0){
	        if(x_code[res[0]]==x_code[res[4]]){ alert(txt+" "+res[0]+txt2+res[4]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[4]]){ alert(txt+" "+res[1]+txt2+res[4]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[4]]){ alert(txt+" "+res[2]+txt2+res[4]); $("#"+kk).focus();}
	else if(x_code[res[3]]==x_code[res[4]]){ alert(txt+" "+res[3]+txt2+res[4]); $("#"+kk).focus();}
		}
}else if(lg==6){
		if(res[5]>0){
	        if(x_code[res[0]]==x_code[res[5]]){ alert(txt+" "+res[0]+txt2+res[5]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[5]]){ alert(txt+" "+res[1]+txt2+res[5]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[5]]){ alert(txt+" "+res[2]+txt2+res[5]); $("#"+kk).focus();}
	else if(x_code[res[3]]==x_code[res[5]]){ alert(txt+" "+res[3]+txt2+res[5]); $("#"+kk).focus();}
	else if(x_code[res[4]]==x_code[res[5]]){ alert(txt+" "+res[4]+txt2+res[5]); $("#"+kk).focus();}
		}
}else if(lg==7){
		if(res[6]>0){
	        if(x_code[res[0]]==x_code[res[6]]){ alert(txt+" "+res[0]+txt2+res[6]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[6]]){ alert(txt+" "+res[1]+txt2+res[6]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[6]]){ alert(txt+" "+res[2]+txt2+res[6]); $("#"+kk).focus();}
	else if(x_code[res[3]]==x_code[res[6]]){ alert(txt+" "+res[3]+txt2+res[6]); $("#"+kk).focus();}
	else if(x_code[res[4]]==x_code[res[6]]){ alert(txt+" "+res[4]+txt2+res[6]); $("#"+kk).focus();}
	else if(x_code[res[5]]==x_code[res[6]]){ alert(txt+" "+res[5]+txt2+res[6]); $("#"+kk).focus();}
		}
}else if(lg==8){
		if(res[7]>0){
	        if(x_code[res[0]]==x_code[res[7]]){ alert(txt+" "+res[0]+txt2+res[7]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[7]]){ alert(txt+" "+res[1]+txt2+res[7]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[7]]){ alert(txt+" "+res[2]+txt2+res[7]); $("#"+kk).focus();}
	else if(x_code[res[3]]==x_code[res[7]]){ alert(txt+" "+res[3]+txt2+res[7]); $("#"+kk).focus();}
	else if(x_code[res[4]]==x_code[res[7]]){ alert(txt+" "+res[4]+txt2+res[7]); $("#"+kk).focus();}
	else if(x_code[res[5]]==x_code[res[7]]){ alert(txt+" "+res[5]+txt2+res[7]); $("#"+kk).focus();}
	else if(x_code[res[6]]==x_code[res[7]]){ alert(txt+" "+res[6]+txt2+res[7]); $("#"+kk).focus();}
		}
}else if(lg==9){
		if(res[8]>0){
	        if(x_code[res[0]]==x_code[res[8]]){ alert(txt+" "+res[0]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[8]]){ alert(txt+" "+res[1]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[8]]){ alert(txt+" "+res[2]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[3]]==x_code[res[8]]){ alert(txt+" "+res[3]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[4]]==x_code[res[8]]){ alert(txt+" "+res[4]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[5]]==x_code[res[8]]){ alert(txt+" "+res[5]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[6]]==x_code[res[8]]){ alert(txt+" "+res[6]+txt2+res[8]); $("#"+kk).focus();}
	else if(x_code[res[7]]==x_code[res[8]]){ alert(txt+" "+res[7]+txt2+res[8]); $("#"+kk).focus();}
		}
}else if(lg==10){
		if(res[9]>0){
	        if(x_code[res[0]]==x_code[res[9]]){ alert(txt+" "+res[0]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[1]]==x_code[res[9]]){ alert(txt+" "+res[1]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[2]]==x_code[res[9]]){ alert(txt+" "+res[2]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[3]]==x_code[res[9]]){ alert(txt+" "+res[3]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[4]]==x_code[res[9]]){ alert(txt+" "+res[4]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[5]]==x_code[res[9]]){ alert(txt+" "+res[5]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[6]]==x_code[res[9]]){ alert(txt+" "+res[6]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[7]]==x_code[res[9]]){ alert(txt+" "+res[7]+txt2+res[9]); $("#"+kk).focus();}
	else if(x_code[res[8]]==x_code[res[9]]){ alert(txt+" "+res[8]+txt2+res[9]); $("#"+kk).focus();}
		}
	}


	 }
} 

function re_mo(){
 $("#new_money").load('inc/inc_money.php?r='+ Math.random());
	}
	
</script>  
<script type="text/javascript">

  var timediff = new Date() - new Date('<?=date("r");?>');
  startTime();
     function startTime() {
			tmonth=new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
            var today = GetServerTime();
		     var mon =today.getMonth();
            var wee = today.toDateString().split(' ')[0];
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            var tm =today.getDate()+ " "+ tmonth[(mon)] + " " + today.getFullYear() + " " + h + ":" + m + ":" + s + " ";
            var o = null;
            if (o = document.getElementById("clock")) o.innerHTML = tm;
            t = setTimeout('startTime()', 1000);
        }
        function GetServerTime() {
            return new Date(new Date().getTime() - timediff);
        }
        function checkTime(i) {
            if (i < 10)
            { i = "0" + i }
            return i
        }
</script>
</head>

<body>

<div class="container">

<div id="clock">Loading...</div>


<div id="top_menu" class="box">
        <ul class="box">
            
         <li><a href="?p=bill&d=<?=$view_date;?>">บิลรายการ</a></li>
         <? if($_SESSION[m_shop]==1){?>   <li><a href="?p=statement&d=<?=$view_date;?>&e=<?=$view_date;?>">บัญชี</a></li><? }?>
           
           
           
      <li><a href="?p=pass">เปลี่ยนรหัสผ่าน</a></li>
       <? if($_SESSION[m_shop]==1){?> <li><a href="?p=lastlogin">ประวัติการเข้า</a></li><? }?>
      <li style="float:right; "><a href="?p=logout" style="color:#F00;" >ออกจากระบบ</a></li>
         </ul>
         </div>
         
<div id="bottom_menu" class="box">
        <ul class="box">
     					        <li  ><a href="index.php">แทงด่วน</a></li>
                            <li><a href="?p=step">บอลสเต็ป</a></li>
            <?
		if($_SESSION[m_shop]==1){$cone=$_SESSION[m_step1];}	  
		else{$cone=$_SESSION[r_step1];}
		  if($cone==1){?> 
          <li><a href="?p=one">บอลเต็ง</a></li>
		  <? }?>
	        <li  ><a href="?p=leage">เลือกลีก</a></li>
          <li><a href="?p=score&d=<?=$view_date;?>">ผลบอล</a></li>
         </ul>
         </div>


<div id="news">
<marquee behavior="scroll" direction="left" OnMouseOver="this.stop()" OnMouseOut="this.start()" scrollamount="2" scrolldelay="1" height="40">
<img src="http://img.step98.com/hotnews.gif"/> 
<?
echo $con_note;
?>
</marquee>
</div>

  <div class="header" ><a href="index.php" ><img src="http://img.step98.com/logo2015.png" alt="โปรแกรมโต๊ะบอล"  class="logo"/></a> 
    
  
  
    <!-- end .header -->
  </div>
  <div class="sidebar1">
    <ul class="nav">
    <li>คุณ : <?=$_SESSION[muser];?></li>
    <? if($_SESSION[m_shop]==1){?>
     <li>
     <table width="100%" border="0" cellspacing="0" cellpadding="2" class="ball" >
  <tr>
    <td width="44%" align="right">เครดิตที่เหลือ&nbsp;</td>
    <td width="56%" align="right"><img src="img/reload.png" class="cu" style="float:left;" alt="Reload" title="Reload" onClick="re_mo();"><b class="cbu" id="new_money"> <?=number_format($_SESSION[m_count])?></b> &nbsp;</td>
  </tr>
  <tr>
    <td align="right">ยอดบัญชี&nbsp;</td>
    <td align="right"><b class="cb"> <?=_cbn($_SESSION[m_count]-$_SESSION[m_count_de])?></b> &nbsp;</td>
  </tr>
  <tr>
    <td align="right">เครดิตทั้งหมด&nbsp;</td>
    <td align="right"><b class="cb"> <?=number_format($_SESSION[m_count_de])?></b> &nbsp;</td>
  </tr>
    <tr>

    <td align="right">ยอดการเล่นค้าง&nbsp;</td>
    <td align="right"><b class="cb"> <?=number_format($_SESSION[cnot])?></b> &nbsp;</td>
  </tr>
</table>

     </li>
     <? }?>

    </ul>

<div style="display:block; position: relative; width:100%;" id="bet_menu">
    <div id="showData3">
    	<div id="sh3"><div id="ds3"></div></div>
  </div>
</div>

    <!-- end .sidebar1 --></div>
  <div class="content">
  <div id="line"></div>
<? include($PC);?>
    <!-- end .content --></div>
  <div class="footer">
    <p>

    </p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
  <? 
  sql_free($re);  
  sql_free($ree);  
    sql_free($re[re]);  
	$_SESSION[tang] = array();
  ?>
<span id="token"></span>
</body>
</html>
