<?
require('../inc/conn.php');
require('../inc/function.php');
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lover2Lotto</title>
<meta http-equiv="Cache-Control" content="no-store">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">    
<script type="text/javascript" src="../js/jquery-latest.js"></script>

<script type="text/javascript" >

 $(document).ready(function() {

$("#token").load('ok.php');
   var refreshId = setInterval(function() {
$("#token").load('ok.php');
   }, 1000);
   $.ajaxSetup({ cache: false });
   
   var refreshId = setInterval(function() {
$("#fack_count").load('fack_count.php');
   }, 5000);
   $.ajaxSetup({ cache: false });

});

function _process(){
$(this).load('_process.php?t='+Math.random());
	}

</script>
<script type="text/javascript">
function GetClock(){
tmonth=new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
var tzOffset = 7;
var d=new Date();
var dx=d.toGMTString();
dx=dx.substr(0,dx.length -3);
d.setTime(Date.parse(dx))
d.setHours(d.getHours()+tzOffset);
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear(),nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

 /*    if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}
*/
if(nyear<1000) nyear+=1900;
if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;
document.getElementById('clock').innerHTML=""+ndate+" "+tmonth[(nmonth)]+" "+nyear+"  "+nhour+":"+nmin+":"+nsec+"";
}
window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}
</script>

</head>

<body>

<div id="clock">Loading...</div>
<hr>
<span id="token"></span>
<hr>
<span id="fack_count"></span>
<?
$url_file="json/bacarat_time.txt";
$bet_time=time();
$js1=array();
#####################################Lock LOTTO
$js1[]=array("timex"=>"$bet_time");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="json/bacarat_win.txt";
$ok1='baca';
$ok2='baca';
$ok3='baca';
$ok4='baca';
$js1=array();
$js1[]=array("1"=>"$ok1","2"=>"$ok2");
$js1[]=array("3"=>"$ok3","4"=>"$ok4");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 
?>
</body>
</html>
