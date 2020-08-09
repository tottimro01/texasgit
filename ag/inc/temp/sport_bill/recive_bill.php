<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
		
	require('../../conn.php');
	require('../../function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../../../lang/ag_lang.php');
	require('../../../lang/function_array.php');

	$view_date=_bdate();

	function  _bet75($hdc){
	
$arr_p=array(1=>"0.00","0.25","0.50","0.75"
,"1.00","1.25","1.50","1.75"
,"2.00","2.25","2.50","2.75"
,"3.00","3.25","3.50","3.75"
,"4.00","4.25","4.50","4.75"
,"5.00","5.25","5.50","5.75"
,"6.00","6.25","6.50","6.75"
,"7.00","7.25","7.50","7.75"
,"8.00","8.25","8.50","8.75"
,"9.00","9.25","9.50","9.75"
,"10.00","10.25","10.50","10.75"
,"11.00","11.25","11.50","11.75"
,"12.00","12.25","12.50","12.75"
,"13.00","13.25","13.50","13.75"
,"14.00","14.25","14.50","14.75"
,"15.00","15.25","15.50","15.75"
,"16.00","16.25","16.50","16.75"
,"17.00","17.25","17.50","17.75"
,"18.00","18.25","18.50","18.75"
,"19.00","19.25","19.50","19.75"
,"20.00","20.25","20.50","20.75"
,"21.00","21.25","21.50","21.75"
,"22.00","22.25","22.50","22.75"
,"23.00","23.25","23.50","23.75"
,"24.00","24.25","24.50","24.75"
,"25.00","25.25","25.50","25.75"
,"26.00","26.25","26.50","26.75"
,"27.00","27.25","27.50","27.75"
,"28.00","28.25","28.50","28.75"
,"29.00","29.25","29.50","29.75"
,"30.00","30.25","30.50","30.75"
,"31.00","31.25","31.50","31.75"
,"32.00","32.25","32.50","32.75"
,"33.00","33.25","33.50","33.75"
,"34.00","34.25","34.50","34.75"
,"35.00","35.25","35.50","35.75"
,"36.00","36.25","36.50","36.75"
,"37.00","37.25","37.50","37.75"
,"38.00","38.25","38.50","38.75"
,"39.00","39.25","39.50","39.75"
,"40.00","40.25","40.50","40.75"
,"41.00","41.25","41.50","41.75"
,"42.00","42.25","42.50","42.75"
,"43.00","43.25","43.50","43.75"
,"44.00","44.25","44.50","44.75"
,"45.00","45.25","45.50","45.75"
,"46.00","46.25","46.50","46.75"
,"47.00","47.25","47.50","47.75"
,"48.00","48.25","48.50","48.75"
,"49.00","49.25","49.50","49.75"
,"50.00","50.25","50.50","50.75"
,"51.00","51.25","51.50","51.75"
,"52.00","52.25","52.50","52.75"
,"53.00","53.25","53.50","53.75"
,"54.00","54.25","54.50","54.75"
,"55.00","55.25","55.50","55.75"
,"56.00","56.25","56.50","56.75"
,"57.00","57.25","57.50","57.75"
,"58.00","58.25","58.50","58.75"
,"59.00","59.25","59.50","59.75"
,"60.00","60.25","60.50","60.75"
,"61.00","61.25","61.50","61.75"
,"62.00","62.25","62.50","62.75"
,"63.00","63.25","63.50","63.75"
,"64.00","64.25","64.50","64.75"
,"65.00","65.25","65.50","65.75"
,"66.00","66.25","66.50","66.75"
,"67.00","67.25","67.50","67.75"
,"68.00","68.25","68.50","68.75"
,"69.00","69.25","69.50","69.75"
,"70.00","70.25","70.50","70.75"
,"71.00","71.25","71.50","71.75"
,"72.00","72.25","72.50","72.75"
,"73.00","73.25","73.50","73.75"
,"74.00","74.25","74.50","74.75"
,"75.00","75.25","75.50","75.75"
,"76.00","76.25","76.50","76.75"
,"77.00","77.25","77.50","77.75"
,"78.00","78.25","78.50","78.75"
,"79.00","79.25","79.50","79.75"
,"80.00","80.25","80.50","80.75"
,"81.00","81.25","81.50","81.75"
,"82.00","82.25","82.50","82.75"
,"83.00","83.25","83.50","83.75"
,"84.00","84.25","84.50","84.75"
,"85.00","85.25","85.50","85.75"
,"86.00","86.25","86.50","86.75"
,"87.00","87.25","87.50","87.75"
,"88.00","88.25","88.50","88.75"
,"89.00","89.25","89.50","89.75"
,"90.00","90.25","90.50","90.75"
,"91.00","91.25","91.50","91.75"
,"92.00","92.25","92.50","92.75"
,"93.00","93.25","93.50","93.75"
,"94.00","94.25","94.50","94.75"
,"95.00","95.25","95.50","95.75"
,"96.00","96.25","96.50","96.75"
,"97.00","97.25","97.50","97.75"
,"98.00","98.25","98.50","98.75"
,"99.00","99.25","99.50","99.75"
,"100.00","100.25","100.50","100.75"
,"101.00","101.25","101.50","101.75"
,"102.00","102.25","102.50","102.75"
,"103.00","103.25","103.50","103.75"
,"104.00","104.25","104.50","104.75"
,"105.00","105.25","105.50","105.75"
,"106.00","106.25","106.50","106.75"
,"107.00","107.25","107.50","107.75"
,"108.00","108.25","108.50","108.75"
,"109.00","109.25","109.50","109.75"
,"110.00","110.25","110.50","110.75"
,"111.00","111.25","111.50","111.75"
,"112.00","112.25","112.50","112.75"
,"113.00","113.25","113.50","113.75"
,"114.00","114.25","114.50","114.75"
,"115.00","115.25","115.50","115.75"
,"116.00","116.25","116.50","116.75"
,"117.00","117.25","117.50","117.75"
,"118.00","118.25","118.50","118.75"
,"119.00","119.25","119.50","119.75"
,"120.00","120.25","120.50","120.75"
,"121.00","121.25","121.50","121.75"
,"122.00","122.25","122.50","122.75"
,"123.00","123.25","123.50","123.75"
,"124.00","124.25","124.50","124.75"
,"125.00","125.25","125.50","125.75"
,"126.00","126.25","126.50","126.75"
,"127.00","127.25","127.50","127.75"
,"128.00","128.25","128.50","128.75"
,"129.00","129.25","129.50","129.75"
,"130.00","130.25","130.50","130.75"
,"131.00","131.25","131.50","131.75"
,"132.00","132.25","132.50","132.75"
,"133.00","133.25","133.50","133.75"
,"134.00","134.25","134.50","134.75"
,"135.00","135.25","135.50","135.75"
,"136.00","136.25","136.50","136.75"
,"137.00","137.25","137.50","137.75"
,"138.00","138.25","138.50","138.75"
,"139.00","139.25","139.50","139.75"
,"140.00","140.25","140.50","140.75"
,"141.00","141.25","141.50","141.75"
,"142.00","142.25","142.50","142.75"
,"143.00","143.25","143.50","143.75"
,"144.00","144.25","144.50","144.75"
,"145.00","145.25","145.50","145.75"
,"146.00","146.25","146.50","146.75"
,"147.00","147.25","147.50","147.75"
,"148.00","148.25","148.50","148.75"
,"149.00","149.25","149.50","149.75"
,"150.00","150.25","150.50","150.75"
,"151.00","151.25","151.50","151.75"
,"152.00","152.25","152.50","152.75"
,"153.00","153.25","153.50","153.75"
,"154.00","154.25","154.50","154.75"
,"155.00","155.25","155.50","155.75"
,"156.00","156.25","156.50","156.75"
,"157.00","157.25","157.50","157.75"
,"158.00","158.25","158.50","158.75"
,"159.00","159.25","159.50","159.75"
,"160.00","160.25","160.50","160.75"
,"161.00","161.25","161.50","161.75"
,"162.00","162.25","162.50","162.75"
,"163.00","163.25","163.50","163.75"
,"164.00","164.25","164.50","164.75"
,"165.00","165.25","165.50","165.75"
,"166.00","166.25","166.50","166.75"
,"167.00","167.25","167.50","167.75"
,"168.00","168.25","168.50","168.75"
,"169.00","169.25","169.50","169.75"
,"170.00","170.25","170.50","170.75"
,"171.00","171.25","171.50","171.75"
,"172.00","172.25","172.50","172.75"
,"173.00","173.25","173.50","173.75"
,"174.00","174.25","174.50","174.75"
,"175.00","175.25","175.50","175.75"
,"176.00","176.25","176.50","176.75"
,"177.00","177.25","177.50","177.75"
,"178.00","178.25","178.50","178.75"
,"179.00","179.25","179.50","179.75"
,"180.00","180.25","180.50","180.75"
,"181.00","181.25","181.50","181.75"
,"182.00","182.25","182.50","182.75"
,"183.00","183.25","183.50","183.75"
,"184.00","184.25","184.50","184.75"
,"185.00","185.25","185.50","185.75"
,"186.00","186.25","186.50","186.75"
,"187.00","187.25","187.50","187.75"
,"188.00","188.25","188.50","188.75"
,"189.00","189.25","189.50","189.75"
,"190.00","190.25","190.50","190.75"
,"191.00","191.25","191.50","191.75"
,"192.00","192.25","192.50","192.75"
,"193.00","193.25","193.50","193.75"
,"194.00","194.25","194.50","194.75"
,"195.00","195.25","195.50","195.75"
,"196.00","196.25","196.50","196.75"
,"197.00","197.25","197.50","197.75"
,"198.00","198.25","198.50","198.75"
,"199.00","199.25","199.50","199.75"
,"200.00","200.25","200.50","200.75"
);

return $arr_p[$hdc];
}	

function _bigdel($type , $big){
	if($type==1 and $big==1){ $txt='-';}
	elseif($type==2 and $big==2){ $txt='-';}
	elseif($type==11 and $big==1){ $txt='-';}
	elseif($type==12 and $big==2){ $txt='-';}
	
	
return $txt;	
	}
	
	

function _bigcolor($type , $big){
	if($type==1 and $big==1){ $txt='red';}
	elseif($type==2 and $big==2){ $txt='red';}
	elseif($type==3){ $txt='red';}
	elseif($type==11 and $big==1){ $txt='red';}
	elseif($type==12 and $big==2){ $txt='red';}
	elseif($type==13){ $txt='red';}
	else{$txt='blue'; }
	
	
return $txt;	
	}

function _bigname($type , $big , $name1  , $name2){
	global $lg;
	if($type==1 and $big==1){ $txt='<font color=red>'.$name1.'</font>';}
	elseif($type==1 and $big==2){ $txt='<font color=blue>'.$name1.'</font>';}
	elseif($type==2 and $big==2){ $txt='<font color=red>'.$name2.'</font>';}
	elseif($type==2 and $big==1){ $txt='<font color=blue>'.$name2.'</font>';}
	elseif($type==3){  $txt='<font color=red>'.$lg[11].'</font>';}
	elseif($type==4){  $txt='<font color=blue>'.$lg[12].'</font>';}
	
	elseif($type==5){ $txt='<font color=red>'.$name1.'</font>';}
	elseif($type==6){ $txt='<font color=black>'.$lg[13].'</font>';}
	elseif($type==7){ $txt='<font color=blue>'.$name2.'</font>';}
	
	elseif($type==8){  $txt='<font color=blue>'.$lg[14].'</font>';}
	elseif($type==9){  $txt='<font color=red>'.$lg[15].'</font>';}
	
	elseif($type==11 and $big==1){ $txt='<font color=red>'.$name1.'</font>';}
	elseif($type==11 and $big==2){ $txt='<font color=blue>'.$name1.'</font>';}
	elseif($type==12 and $big==2){ $txt='<font color=red>'.$name2.'</font>';}
	elseif($type==12 and $big==1){ $txt='<font color=blue>'.$name2.'</font>';}
	elseif($type==13){  $txt='<font color=red>'.$lg[11].'</font>';}
	elseif($type==14){  $txt='<font color=blue>'.$lg[12].'</font>';}
	
	elseif($type==15){ $txt='<font color=red>'.$name1.'</font>';}
	elseif($type==16){ $txt='<font color=black>'.$lg[12].'</font>';}
	elseif($type==17){ $txt='<font color=blue>'.$name2.'</font>';}
	

	
	
return $txt;	
	}
	
	function _bignameps2($type , $big , $name1  , $name2){
	global $lg;
	if($type==1 and $big==1){ $txt='<font color=black>'.$name1.'</font>';}
	elseif($type==1 and $big==2){ $txt='<font color=black>'.$name1.'</font>';}
	elseif($type==2 and $big==2){ $txt='<font color=black>'.$name2.'</font>';}
	elseif($type==2 and $big==1){ $txt='<font color=black>'.$name2.'</font>';}
	elseif($type==3){  $txt='<font color=black>'.$lg[11].'</font>';}
	elseif($type==4){  $txt='<font color=black>'.$lg[12].'</font>';}
	
	elseif($type==5){ $txt='<font color=black>'.$name1.'</font>';}
	elseif($type==6){ $txt='<font color=black>'.$lg[13].'</font>';}
	elseif($type==7){ $txt='<font color=black>'.$name2.'</font>';}
	
	elseif($type==8){  $txt='<font color=black>'.$lg[14].'</font>';}
	elseif($type==9){  $txt='<font color=black>'.$lg[15].'</font>';}
	
	elseif($type==11 and $big==1){ $txt='<font color=black>'.$name1.'</font>';}
	elseif($type==11 and $big==2){ $txt='<font color=black>'.$name1.'</font>';}
	elseif($type==12 and $big==2){ $txt='<font color=black>'.$name2.'</font>';}
	elseif($type==12 and $big==1){ $txt='<font color=black>'.$name2.'</font>';}
	elseif($type==13){  $txt='<font color=black>'.$lg[11].'</font>';}
	elseif($type==14){  $txt='<font color=black>'.$lg[12].'</font>';}
	
	elseif($type==15){ $txt='<font color=black>'.$name1.'</font>';}
	elseif($type==16){ $txt='<font color=black>'.$lg[12].'</font>';}
	elseif($type==17){ $txt='<font color=black>'.$name2.'</font>';}
	

	
	
return $txt;	
	}


function _condate($day){
	$ex=@explode('-',$day);
	return "$ex[2]-$ex[1]-$ex[0]";
}



function _dayname($day){

	if($_SESSION[lang]=="TH"){
		$arr_day=array("วันอาทิตย์", "วันจันทร์", "วันอังคาร", "วันพุธ", "วันพฤหัสบดี", "วันศุกร์", "วันเสาร์");
	}elseif($_SESSION[lang]=="LA"){
		$arr_day=array("ວັນອາທິດ","ວັນຈັນ","ວັນອັງຄານ","ວັນພຸດ","ວັນພະຫັດ","ວັນສຸກ","ວັນເສົາ");
		}else{
		$arr_day=array("Sunday", "Monday", "Tuesday", "Wednesday", "Tuesday", "Friday", "Saturday");
		}	
	if($day=="Sun"){$txt=$arr_day[0];}
	elseif($day=="Mon"){$txt=$arr_day[1];}
	elseif($day=="Tue"){$txt=$arr_day[2];}
	elseif($day=="Wed"){$txt=$arr_day[3];}
	elseif($day=="Thu"){$txt=$arr_day[4];}
	elseif($day=="Fri"){$txt=$arr_day[5];}
	elseif($day=="Sat"){$txt=$arr_day[6];}
	
	


	return $txt;
}

$ex_sbill = explode("," , $_GET["numbill"]);

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">

html {
	font-family:Arial, "times New Roman", tahoma;
	font-size:14px;
	color:#000000;
}
body {
	font-family:Arial, "times New Roman", tahoma;
	font-size:14px;
	color:#000000;
}
.sbt{border-bottom:1px dashed #999999;}
.sb2{border-bottom:1px dashed #999999;}
.win{ text-decoration:underline; color:#F00;}


.red-line 
      {
         position: relative;
         text-decoration: line-through;
         text-decoration-color: red;
      }                                                        
  
      @keyframes flickerAnimation {
        0%   { opacity:1; }
        50%  { opacity:0; }
        100% { opacity:1; }
      }
      @-o-keyframes flickerAnimation{
        0%   { opacity:1; }
        50%  { opacity:0; }
        100% { opacity:1; }
      }
      @-moz-keyframes flickerAnimation{
        0%   { opacity:1; }
        50%  { opacity:0; }
        100% { opacity:1; }
      }
      @-webkit-keyframes flickerAnimation{
        0%   { opacity:1; }
        50%  { opacity:0; }
        100% { opacity:1; }
      }
      .txt_load {
         color:#ff8597;
         margin-left: 3px;
         display: block;
         width: 100%;
         text-align: center;

         -webkit-animation: flickerAnimation 1s infinite;
         -moz-animation: flickerAnimation 1s infinite;
         -o-animation: flickerAnimation 1s infinite;
          animation: flickerAnimation 1s infinite;
      }


._disable {
    background: #acacac;
    color: #686868;
    cursor: no-drop;
    border: 1px solid #000;
    background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.16, rgb(193, 193, 193)), color-stop(0.79, rgb(232, 232, 232)) );
    background-image: -moz-linear-gradient( center bottom, rgb(193,193,193) 16%, rgb(232,232,232) 79% );
}     

@media all
{
	.page-break	{ display:none; }
	.page-break-no{ display:none; }
}
@media screen
  {
.yes{ display:none;}
body{ font-size:14px;}
.txt10{ font-size:14px;}
  }
  
@media print
  {
.no{ display:none;}
body{ font-size:14px;
color:#000;}
.txt10{ font-size:14px;}
	.page-break	{ display:block;height:1px; page-break-before:always; }
	.page-break-no{ display:block;height:1px; page-break-after:avoid; }	
  }
  
@media screen,print
  {
.cr {color: #000000;}
.cbu {color: #000000;}
.cb {color: #000000;}
.cw {color: #000000;}

.ball td{border:1px  solid #000000;	}
.r12{ font-size:14px;}
.bb{ font-weight:bold;}
.tcr{ text-decoration:underline; color:#000000;}
.cd22{ border:1px  solid #000; text-align:center; font-weight:bold; background:#CCC; margin-right:5px; padding:1px 4px; float:left;}
  }


</style>
</head>
<!--  -->
<!-- <body onLoad="window.print();"> -->
<body onLoad="">	
<div align="center"  class="no">
<input type="button"  value="พิมพ์หน้านี้" id="print_btn"  onclick="javascript:window.print();window.close();"/>&nbsp;&nbsp;|&nbsp;&nbsp;
<input type="button"  value="ปิดหน้าต่าง"  onclick="javascript:window.close();"/>
</div>
<p>&nbsp;</p>


<?
$xb=0;
$no=1;
// $ex = explode("," , $_POST["send_pbill"]);
	//echo $_POST["numbill"]

$ex = $_POST["Checkrow"];

// print_r($_POST["CheckLive"]);
$user = array();
$sql = "SELECT `m_id`,`m_name`,`m_user` FROM `bom_tb_member` ";
$re = sql_query($sql);
while($rs=sql_fetch($re)){
 	$user[$rs['m_id']]['user'] = $rs['m_user'];
}



foreach ($ex as &$value) {
//for($chkr=0;$chkr<$_POST["numbill"];$chkr++){
	//$value = $_POST["Checkrow".$chkr];
	//echo $value."<br>";
	
$_GET[id]=$value;
$ss=1;
/*$sql="update IGNORE bom_tb_football_bill set b_accept=$ss  where  bill_id='$_GET[id]'   and r_id='$_SESSION[rid]'";
sql_query($sql);
$sql="update IGNORE bom_tb_football_bill_play set b_accept=$ss  where  bill_id='$_GET[id]'   and r_id='$_SESSION[rid]' and b_accept=0";
sql_query($sql);*/

		
$sql="select * from bom_tb_football_bill_live where bill_id='$_GET[id]' ";
$ree=sql_array($sql);
$sql="select * from bom_tb_agent where r_id='$ree[r_id]'";
$rem=sql_array($sql);
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_ag_".$sx_file.".php");
// $lang[0] = $lang_ag[0];
$lang=array();
	if($ree[b_lang]=="en"){
$lang[0]="No.";
$lang[1]="User";
$lang[2]="Number";
$lang[3]="Odds";
$lang[4]="Bet";
$lang[5]="Comm";
$lang[6]="Balance";
$lang[7]="Total";
$lang[8]="Check";
$lang[9]="xxx";
$lang[10]="Date";
$lang[11]="Step";
$lang[12]="Single";
$lang[13]="baht";
$lang[14]="Win";
$lang[15]="xxx";
$lang[16]="xxx";
$lang[17]="xxx";
$lang[18]="xxx";
$lang[19]="xxx";
$arr_hdc2=array(1=>"Per","", "Over","Under","Win Home","Draw","Win Away","Odd","Even");
	
	}elseif($ree[b_lang]=="la"){
$lang[0]="ເລກທີ";
$lang[1]="ຊື່ຜູ້ໃຊ້";
$lang[2]="ຄູ່";
$lang[3]="ຄາ​ຕໍ່​ຮອງ";
$lang[4]="ຍອດເງິນ";
$lang[5]="ສ່ວນລົດ";
$lang[6]="ຍັງເຫຼືອ";
$lang[7]="ລວມທັງ​ຫມົດ";
$lang[8]="ກວດສອບ";
$lang[9]="xxx";
$lang[10]="ວັນ​ທີ";
$lang[11]="ສະ​ເຕັບ";
$lang[12]="ດຽວ";
$lang[13]="ບາດ";
$lang[14]="ຈ່າຍ​ເຕັມ";
$lang[15]="xxx";
$lang[16]="xxx";
$lang[17]="xxx";
$lang[18]="xxx";
$lang[19]="xxx";
$arr_hdc2=array(1=>"ຕໍ່","ລອງ", "ສູງ","ຕ່ໍາ","ບ້ານຊະນະ","ສະເຫມີ","ຢາມຊະນະ","ຄີກ","ຄູ່");
		}else{
$lang[0]="เลขที่ตั๋ว";
$lang[1]="รหัสผู้ใช้";
$lang[2]="คู่";
$lang[3]="ราคา";
$lang[4]="ยอดเงิน";
$lang[5]="ส่วนลด";
$lang[6]="คงเหลือ";
$lang[7]="รวมทั้งหมด";
$lang[8]="ตรวจบิล";
$lang[9]="xxx";
$lang[10]="วันที่";
$lang[11]="รวมสเต็ป";
$lang[12]="รวมเต็ง";
$lang[13]="บาท";
$lang[14]="จ่ายเต็ม";
$lang[15]="xxx";
$lang[16]="xxx";
$lang[17]="xxx";
$lang[18]="xxx";
$lang[19]="xxx";
	$arr_hdc2=array(1=>"ต่อ","รอง", "สูง","ต่ำ","เจ้าบ้านชนะ","เสมอ","เยือนชนะ","คี่","คู่");
		}	
		

//if($ree[b_web_from]==2 or $ree[b_web_from]==4  or $ree[b_web_from]==5){
include("bill_ball2.php");	
	
/*}else{

include("bill_livezx.php");

}*/


$xb++;
$no++;
}
?>

 <script type="text/javascript" src="<?=$main_url;?>/assets/js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="<?=$main_url;?>/assets/js/bootstrap.min.js"></script>
<script>
	


jQuery(document).ready(function($) {
	chk_bill_running();
	setInterval(function(){ chk_bill_running(); }, 10000);
});




function chk_bill_running()
{
	var array_bill = <?=json_encode($_POST["CheckLive"]);?>;
	// var array_bill = <?=json_encode($_POST["Checkrow"]);?>;

	$.ajax({
		url: "<?=$main_url;?>/inc/temp/sport_bill/chk_bill_running.php",
		type: "POST",
		dataType:"json",
		data: {array_bill: array_bill},
	})
	.done(function(res) {
		var count_bill_running = 0;
		$.each(res, function( index, value ) {
	
		  	if(parseInt(value.b_running) == 1 || parseInt(value.b_running_step) >= 1 )
		  	{

		  		$("#w1_"+value.bill_id).show();
		  		
		  	}else{
		  		$("#w1_"+value.bill_id).hide();
		  	}

		  	if(parseInt(value.b_accept) == 2)
		  	{
		  		$("#w1_"+value.bill_id).hide();
		  		$('.bill_'+value.bill_id+' .red_line_p').addClass('red-line');
		  		$('.bill_'+value.bill_id+' #bill_status').text("").append(value.status)
		  	}else{
		  		$('.bill_'+value.bill_id+' .red_line_p').removeClass('red-line');
		  		$('.bill_'+value.bill_id+' #bill_status').text("").append(value.status)
		  	}


		  	if(parseInt(value.b_running) == 1 || parseInt(value.b_running_step) >= 1 )
		  	{
		  		if(parseInt(value.b_accept) != 2)
		  		{
		  			count_bill_running++;
		  		}
		  	}

		});

		if(count_bill_running == 0)
		{
			$("#print_btn").prop("disabled",false);
			$("#print_btn").removeClass('_disable');
		}else{
			$("#print_btn").prop("disabled",true);
			$("#print_btn").addClass('_disable');
		}

	})
	.fail(function() {
		// console.log("error");
	})
	.always(function() {
		// console.log("complete");
	});

}



</script>
</body>
</html>