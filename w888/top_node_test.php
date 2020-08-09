<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
require("lang/variable_lang.php");
require("lang/function_array.php");
setcookie('lang', $_SESSION['lang']);



if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
	@session_start(); 
	@session_destroy();

	echo"<script language='JavaScript'> top.document.location='login.php';</script>";
	exit();
}

$sql="select * from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re=sql_array($sql);
	
@session_start();
if($re['m_count']<=0){$re['m_count']=0;}

$_SESSION['m_id'] = $re['m_id'];
$_SESSION['cr_id'] = $re['r_id'];
$_SESSION['m_user'] = $re['m_user'];
$_SESSION['m_name'] = $re['m_user_set'];
$_SESSION['m_level'] = $re['m_level'];

$_SESSION['m_open'] = $re['m_open'];
$_SESSION['m_sport_step2'] = $re['m_sport_step2'];

$_SESSION['m_count'] = $re['m_count'];
$_SESSION['m_count_de'] = $re['m_count_de'];
$_SESSION['m_currency'] = $re['m_currency'];
$_SESSION['m_timezone'] = is_null($re['m_timezone']) ? 'GMT+07:00' : $re['m_timezone'];

#####################SET
$_SESSION['m_login'] = $re['m_login'];
$m_token = md5($re['m_id'].$re['m_user'].date("Y-m-d H:i:s"));
$_SESSION['m_token'] = $m_token;

############### NEW ARRAY


########################Member
$re0y=array("m_pass"=>"?");
$re1m = @array_merge( $re , $re0y);	
$_SESSION['m1'] = $re1m;

$arr_rid=array();
$arr_data=array();
########################Agent
$ex_rid=explode('*',$re['m_agent_id']);
$_SESSION['r_agent_id']= $re['m_agent_id'];

if($ex_rid[1]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[1]."'";
	$re1=sql_array($sql);
	$re1y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re1x = @array_merge( $re1 , $re1y);
	$_SESSION['crid1'] = $ex_rid[1];
	$_SESSION['r1'] = $re1x;
	$arr_rid[]=$ex_rid[1];
	$arr_data[$ex_rid[1]]=$re1x;
}
if($ex_rid[2]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[2]."'";
	$re2=sql_array($sql);
	$re2y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re2x = @array_merge( $re2 , $re2y);	
	$_SESSION['crid2'] = $ex_rid[2];
	$_SESSION['r2'] = $re2x;
	$arr_rid[]=$ex_rid[2];
	$arr_data[$ex_rid[2]]=$re2x;
}
if($ex_rid[3]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[3]."'";
	$re3=sql_array($sql);
	$re3y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re3x = @array_merge( $re3 , $re3y);
	$_SESSION['crid3'] = $ex_rid[3];
	$_SESSION['r3'] = $re3x;
	$arr_rid[]=$ex_rid[3];
	$arr_data[$ex_rid[3]]=$re3x;
}
if($ex_rid[4]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[4]."'";
	$re4=sql_array($sql);
	$re4y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re4x = @array_merge( $re4 , $re4y);	
	$_SESSION['crid4'] = $ex_rid[4];
	$_SESSION['r4'] = $re4x;
	$arr_rid[]=$ex_rid[4];
	$arr_data[$ex_rid[4]]=$re4x;
}
if($ex_rid[5]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[5]."'";
	$re5=sql_array($sql);
	$re5y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re5x = @array_merge( $re5 , $re5y);	
	$_SESSION['crid5'] = $ex_rid[5];
	$_SESSION['r5'] = $re5x;
	$arr_rid[]=$ex_rid[5];
	$arr_data[$ex_rid[5]]=$re5x;
}	
if($ex_rid[6]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[6]."'";
	$re6=sql_array($sql);
	$re6y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re6x = @array_merge( $re6 , $re6y);
	$_SESSION['crid6'] = $ex_rid[6];
	$_SESSION['r6'] = $re6x;
	$arr_rid[]=$ex_rid[6];
	$arr_data[$ex_rid[6]]=$re6x;
}
if($ex_rid[7]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[7]."'";
	$re7=sql_array($sql);
	$re7y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re7x = @array_merge( $re7 , $re7y);	
	$_SESSION['crid7'] = $ex_rid[7];
	$_SESSION['r7'] = $re7x;
	$arr_rid[]=$ex_rid[7];
	$arr_data[$ex_rid[7]]=$re7x;
}
if($ex_rid[8]>0){
	$sql="select * from bom_tb_agent where r_id='".$ex_rid[8]."'";
	$re8=sql_array($sql);
	$re8y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
	$re8x = @array_merge( $re8 , $re8y);	
	$_SESSION['crid8'] = $ex_rid[8];
	$_SESSION['r8'] = $re8x;
	$arr_rid[]=$ex_rid[8];
	$arr_data[$ex_rid[8]]=$re8x;
}

$_SESSION['arid'] = $arr_rid;
$_SESSION['ardata'] = $arr_data;


######################ระงับ Member
if(intval($_SESSION['m1']['m_active'])==3){ 
	@session_start(); 
	@session_destroy();

	echo"<script language='JavaScript'> top.document.location='login.php';</script>";
	exit();
}

########################ระงับ Agent
foreach($_SESSION['arid'] as $rid){
	######################ระงับ
	if(intval($_SESSION['ardata'][$rid]['r_active'])==3){ 
		@session_start(); 
		@session_destroy();
		echo"<script language='JavaScript'> top.document.location='login.php';</script>";
		exit();
	}			 
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_title;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=time()?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=2019" rel="stylesheet">

<style type="text/css">
	#memu_top
{
	display: block;
	height: 38px;
}
#memu_top ul
{
	display: block;
	float: left;
	list-style: none;
	margin: 0;
	padding: 0;
}
#memu_top ul li
{
	display: inline-block;
	margin: 0;
	padding: 0;
}
#memu_top ul li a
{
	color: #970215;
	display: block;
	font-size: 14px;
	height: 38px;
	line-height: 38px;
	padding: 0 15px;
	text-decoration: none;
	background: #f1f1f1;
	box-shadow: inset 0 0px 10px rgba(255, 155, 155, 0.2);
	border: 1px solid #7c090d;
	border-bottom: none;
	/*border-top-left-radius: 5px;
	border-top-right-radius: 5px;*/
	text-shadow: #fff 1px 1px 0;
}
#memu_top ul li a.active
{
	background-color: #b60912;
	color: #ffffff!important;
    text-shadow: 1px 1px #6d1208;
}
#memu_top ul li a.active:hover
{
	background-color: #b60912;
	color: #ffffff!important;
    text-shadow: 1px 1px #6d1208;
}
#memu_top ul li a:hover
{
	color: #252525!important;
    text-shadow: 1px 1px #f1f1f1;
    background: #eee;
    /*border: 1px solid #e5e5e5;
    border-bottom: none;*/
}
#mbutton li , #mtop li {
    margin-top: 0px;
}
#mbutton li a , .demoselect , #mtop li a {
	background-color: #f1f1f1;
	color: #970215;
	box-shadow: #000 1px 1px 1px;
    border-top-left-radius: 0px;
	border-top-right-radius: 0px;
}

</style>


<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui.js?v=2019"></script>
<script src="js/socket.io.js"></script>
	
<script language="JavaScript" type="text/javascript" src="commJS/M_Util.js?v=2019"></script>
<script language="JavaScript" type="text/javascript" src="commJS/M_TopFrame.js?v=2019"></script>
<script language="JavaScript" type="text/javascript">
	function setleftMenu_tooltip(){
		return;
		var d=document;
		d.getElementById('showhideleft').className = "hide_left";
		d.getElementById("showhideleftlink").title = "Click to collapse left menu.";
		parent.document.getElementById("frameset1").cols="198,*,0";
	}

 	var userTimezone = '<?=$_SESSION['m_timezone'];?>';
 	$(document).ready(function() {
 		$("#login_checkin").load('login_checkin.php');
   		var refreshId = setInterval(function() {
 			$("#login_checkin").load('login_checkin.php');
   		}, 10000);
   		$.ajaxSetup({ cache: false });
     });  	 

	$(() => {
	    var socket = io.connect('<?=$nodejs_ip_test;?>', { secure: true });
	    socket.on("connect", function(){
           $("#connect_ico").removeClass("oddsTableStatus-offline");
           $("#connect_ico").addClass("oddsTableStatus-connecting");
        });

        socket.on("disconnect", function(){
           $("#connect_ico").removeClass("oddsTableStatus-connecting");
           $("#connect_ico").addClass("oddsTableStatus-offline");
        });

	    

        socket.on("open_table" , function (data){
        	console.log(data , "open_table");
        });

        socket.on("no_match" , function (data){
        	//console.log(msg);
        });

        socket.on("data_update" , function (data){
        	console.log(data , "Update");
        });

        socket.on("data_insert" , function (data){
        	console.log(data , "Insert");
        });

        socket.on("data_delete" , function (data){
        	console.log(data , "Delete");
        });





	    socket.on('dataGamesLive', function (data) {
	        var GamesLiveStats = JSON.parse(data);
	        try {
	        	parent.rightx.DisplayGamesStat(GamesLiveStats)
	        } catch(e) {
	        }
	    });
		
	    $.post("ajax_check_token.php", {socketID: socket.id},function(data) {
	    	socket.emit('check_user', data , document);
	    	setInterval(() => {
	    		$.post("ajax_check_token.php", {socketID: socket.id},function(data) {
	    			socket.emit('check_user', data , document);
	    		}, "json");
	    	}, 30000);

	    }, "json");

	});

	function _w(url){
		window.location=url;
	}

	function _wp(url){
		parent.window.location=url;
	}

	function _o(url){
		window.open(url);
	}
	
	var file_msg = "message_football.php";
	$(function() {
    	$( ".se_lang" ).selectmenu();
  	});

	function SwitchShowHidLeft(){
		var d=document;
		if(d.getElementById("showhideleft").className == "hide_left")
		{
			d.getElementById("showhideleft").className = "show_left";
			d.getElementById("showhideleftlink").title = "Click to expand left menu.";
		}else{
			d.getElementById("showhideleft").className = "hide_left";
			d.getElementById("showhideleftlink").title = "Click to collapse left menu.";
		}
	}

	function set_file(f){
		file_msg = f;
	}

	var vv_w;

	function SwitchLefthideshow(ele){  
		parent.document.getElementById("frameset1").cols=parent.document.getElementById("frameset1").cols=="0,*,0" ? "205,*,0":"0,*,0";  
		if($(ele).attr('data-title')==0){
			//console.log($(ele).attr('data-title'));
			$(ele).attr('data-title' , 1);
			$(ele).css('background-image' , 'url(img/icon_l_open.png)');
			parent.rightx.to_width(1);
			vv_w = 1;
		}else{
			$(ele).attr('data-title' , 0);
			$(ele).css('background-image' , 'url(img/icon_l_close.png)');
			parent.rightx.to_width(0);
			vv_w = 0;
		}
	} 

	function SwitchTophideshow(ele){  
		parent.document.getElementById("frameset2").rows=parent.document.getElementById("frameset2").rows=="25,*,0" ? "99,*,0":"25,*,0";  
		if($(ele).attr('data-title')==1){
			$(ele).attr('data-title' , "");
			$("#shtop").show();
			$(ele).css('background-image' , 'url(img/icon_t_close.png)');
		}else{
			$("#shtop").hide();
			$(ele).css('background-image' , 'url(img/icon_t_open.png)');
			$(ele).attr('data-title' , 1);
		}
	}

	function print_dialog(){
		var page = file_msg;
		var IEWidth =  800 ;
		var IEHeight = 600 ;
		var NNWidth =  800 ;
		var NNHeight = 600 ;
		var MyBrowser = navigator.appName;
		
		if(MyBrowser == "Netscape"){
			var myWinWidth = (window.screen.width/2) - (NNWidth/2);
			var myWinHeight = (window.screen.height/2) - ((NNHeight/2) + 50);
			var myWin = window.open(page,"MainWin","width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
		}else{
			var myWinWidth = (window.screen.width/2) - (IEWidth/2);
			var myWinHeight = (window.screen.height/2) - ((IEHeight/2) + 50);
			var myWin = window.open(page,"MainWin","width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
		}
		myWin.focus();
	}	

	var rule_url = "main_rule_football.php";
	var result_url = "result.php?vx=1";
	var list_bet_url = "main_dun.php?vx=1";
	function goMain(goFile,ele,txt_new,fileNews){
		if(goFile=="main_lothun.php"){
			parent.leftx.location.href="left_hun.php?token=<?=$_SESSION['m_token'];?>"; 
			rule_url = "main_rule_hun.php?vx=1";
			result_url = "main_lothun.php?tlot=result";
			list_bet_url = "main_lothun.php?tlot=list";
			$("#link_result").html("<?=$lang_member[50];?>");
			$("#link_result").css("display" , "block");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "none");
			parent.rightx.location.href=goFile+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}else if(goFile=="main_all_new.php"){
			rule_url = "main_rule_football.php?vx=1";
			result_url = "result.php?vx=1";
			list_bet_url = "main_dun.php?vx=1";
			$("#link_result").html("<?=$lang_member[51];?>");
			$("#link_result").css("display" , "block");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "inline-block");
			parent.Loadframe();
			fFrame.LastSelectedSport = -1;
		}else if(goFile=="main_sport_new.php"){
			parent.leftx.location.href="left_sport2.php?token=<?=$_SESSION['m_token'];?>"; 
			rule_url = "main_rule_football.php?vx=1";
			result_url = "result.php?vx=1";
			list_bet_url = "main_dun.php?vx=1";
			$("#link_result").html("<?=$lang_member[51];?>");
			$("#link_result").css("display" , "block");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "inline-block");
		}else if(goFile=="main_lotto.php"){
			parent.leftx.location.href="left.php?token=<?=$_SESSION['m_token'];?>"; 
			rule_url = "main_rule_lotto.php?vx=1";
			result_url = "main_lotto.php?tlot=result";
			list_bet_url = "main_lotto.php?tlot=list";
			$("#link_result").html("<?=$lang_member[50];?>");
			$("#link_result").css("display" , "block");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "none");
			parent.rightx.location.href=goFile+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}else if(goFile=="main_game.php"){
			parent.leftx.location.href="left_game.php?token=<?=$_SESSION['m_token'];?>"; 
			rule_url = "main_rule_game.php?vx=1";
			result_url = "main_game.php?tlot=result";
			list_bet_url = "main_game.php?tlot=list";
			$("#link_result").html("<?=$lang_member[52];?>");
			$("#link_result").css("display" , "block");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "none");
			parent.rightx.location.href=goFile+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}else if(goFile=="main_casino.php"){
			parent.leftx.location.href="left_game.php?token=<?=$_SESSION['m_token'];?>"; 
			rule_url = "main_rule_casino.php?vx=1";
			result_url = "main_casino.php?tlot=result";
			list_bet_url = "list_bet_casino.php?vx=1";
			$("#link_result").html("<?=$lang_member[50];?>");
			$("#link_result").css("display" , "none");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "none");
			parent.rightx.location.href= 'casino/sexy/player/gamehall.php?dm=1&title=1&vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}else if(goFile=="main_casino_list.php"){
			parent.leftx.location.href="left_game.php?token=<?=$_SESSION['m_token'];?>"; 
			rule_url = "main_rule_casino.php?vx=1";
			result_url = "main_casino_list.php?tlot=result";
			list_bet_url = "list_bet_casino.php?vx=1";
			$("#link_result").html("<?=$lang_member[50];?>");
			$("#link_result").css("display" , "none");
			$("#link_bet").css("display" , "block");
			$("#link_list_bet").css("display" , "none");
			// parent.rightx.location.href= 'casino/sexy/player/gamehall.php?dm=1&title=1&vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
			parent.rightx.location.href=goFile+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}else if(goFile=="main_transfer.php"){
			parent.leftx.location.href="left_transfer.php?token=<?=$_SESSION['m_token'];?>"; 
			result_url = "";
			rule_url = "main_rule_transfer.php?vx=1";
			list_bet_url = "main_dun.php?vx=1";
			$("#link_result").css("display" , "none");
			$("#link_bet").css("display" , "none");
			$("#link_list_bet").css("display" , "none");
			parent.rightx.location.href=goFile+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}else if(goFile=="main_affiliate.php"){
			parent.leftx.location.href="left_affiliate.php?token=<?=$_SESSION['m_token'];?>"; 
			result_url = "";
			rule_url = "main_rule_affiliate.php?vx=1";
			list_bet_url = "main_dun.php?vx=1";
			$("#link_result").css("display" , "none");
			$("#link_bet").css("display" , "none");
			$("#link_list_bet").css("display" , "none");
			parent.rightx.location.href=goFile+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}
		
		$('#memu_top ul li a').removeClass('active'); 
		$('#memu_top ul li a img').hide(); 
		$(ele).addClass('active'); 
		$(ele).find( 'img' ).css( 'display', 'block' ); 
		$('#mar_new').text(txt_new); 
		set_file(fileNews);
	}

	function goMain2(goFile,ele,txt_new,fileNews){
		parent.rightx.location.href=goFile+'&vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		$('#memu_top ul li a').removeClass('active'); 
		$('#memu_top ul li a img').hide(); 
		$(ele).addClass('active'); 
		$(ele).find( 'img' ).css( 'display', 'block' ); 
		$('#mar_new').text(txt_new); 
		set_file("message_football.php");
	}

	function goMain3(goFile,ele,txt_new,fileNews){
		parent.rightx.location.href=goFile+'&vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		$('#memu_top ul li a').removeClass('active'); 
		$('#memu_top ul li a img').hide(); 
		$(ele).addClass('active'); 
		$(ele).find( 'img' ).css( 'display', 'block' ); 
		$('#mar_new').text(txt_new); 
		set_file("message_lotto.php");
	}

	<?
		$tz = new DateTimeZone($timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code']);
		$timestamp = time();
		$dt = new DateTime();
		$dt->setTimezone($tz);
		$dt->setTimestamp($timestamp);
		$stamp = $dt->getTimestamp();
		// $tsm = $dt->format('Y-m-d H:i:s');
		$dt = $dt->format('r');
	?>
	var timediff = new Date() - new Date('<?=$dt;?>');
	var userTimeNow = new Date(parseInt('<?=$stamp;?>')*1000);
	var userTimeDOM = document.getElementById("time");
	startTime();
	function startTime() {
		tmonth=new Array(<?="'".$lang_member[1230]."', '".$lang_member[1231]."', '".$lang_member[1232]."', '".$lang_member[1233]."', '".$lang_member[1234]."', '".$lang_member[1235]."', '".$lang_member[1236]."', '".$lang_member[1237]."', '".$lang_member[1238]."', '".$lang_member[1239]."', '".$lang_member[1240]."', '".$lang_member[1241]."'"?>);
        // var today = GetServerTime();
        var today = userTimeNow;
		var mon =today.getMonth();
        var wee = today.toDateString().split(' ')[0];
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        var tzs = (userTimezone).toUpperCase().split(':');
        var splitChar = tzs[0].indexOf("+")!=-1 ? "+" : "-";
        tzs = tzs[0].split(splitChar);
        var tm =today.getDate()+ " "+ tmonth[(mon)] + " " + today.getFullYear() + " " + h + ":" + m + ":" + s + " " + tzs[0] + splitChar + (parseInt(tzs[1]));
        var o = null;
        if (o = document.getElementById("time")) o.innerHTML = tm;
        userTimeNow.setSeconds(userTimeNow.getSeconds() + 1);
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

	function go_rule(){
		if(rule_url!=""){
			parent.rightx.location.href=rule_url+'?vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}
	}

	function go_result(){
		if(result_url!=""){
			parent.rightx.location.href=result_url+'&vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}
	}

	function go_list_bet(){
		if(list_bet_url!=""){
			parent.rightx.location.href=list_bet_url+'&vvw='+vv_w+"&token=<?=$_SESSION['m_token'];?>"; 
		}
	}
</script>

<style type="text/css">
.filter {
    float: left;
    border-radius: 3px;
    /*padding: 0.15em 0.5em;*/
    color: #545454;
    border: 1px solid #cdcdcd;
    background: #ececec;
    margin: 0px;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    box-shadow: #000 1px 1px 1px;
}
.filter.oddsTableStatus, .filter.oddsTableStatus-offline, .filter.oddsTableStatus-connecting {
  width: 44px;
  height: 23px;
  overflow: hidden;
  position: relative;
} 
.filter.oddsTableStatus::before, .filter.oddsTableStatus-offline::before, .filter.oddsTableStatus-connecting::before {
  background: url(img/connectIconx.png) no-repeat 0 0;
  content: "";
  position: absolute;
  /*top: -.05em;*/
  width: 897px;
  height: 22px;
  z-index: 1;
}

.filter.oddsTableStatus::before {
  transform: translateX(-819px);
  left: -.05em;
}

.filter.oddsTableStatus-offline {
  cursor: default;
}

.filter.oddsTableStatus-offline::before {
  transform: translateX(-857px);
  left: -.05em;
}

.filter.oddsTableStatus-offline:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting {
  cursor: default;
}

.filter.oddsTableStatus-connecting:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting::before {
  left: .35em;
  animation: playConnect 4s steps(21) infinite normal;
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translateZ(0);
}

@keyframes playConnect {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-819px);
  }
}

</style>
</head>
<body>  
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:73px; background:url(img/bg_top.png);" id="shtop">
		<tr>
			<td width="250" valign="top" onClick="_wp('index.php');" ><div id="logo" class="cu <? if($_SESSION['crid4']==373){?> _789 <?}?>"></div></td>
			<td valign="top">
    <nav>
 	<div id="connect_ico" class="filter"></div>
  	<ul id="mbutton">
  		<li><a href="#" onClick="go_rule();"><?=$lang_member[42];?></a></li>
  		<li><a href="#" onClick="go_result();" id="link_result"><?=$lang_member[51];?></a></li>
  		<li><a href="#" onClick="go_list_bet();" id="link_bet"><?=$lang_member[43];?></a></li>
	 	<li id="link_list_bet"><a href="#" onClick="parent.rightx.location.href='main_outstandng.php?vv='+vv_w;"><?=$lang_member[53];?></a></li>
    	<li><a href="#" onClick="parent.rightx.location.href='main_pass.php?vvw='+vv_w; $('#memu_top ul li a').removeClass('active'); $('#memu_top ul li a img').hide();$('#link_result').css('display' , 'none');$('#link_bet').css('display' , 'none');$('#link_list_bet').css('display' , 'none');"><?=$lang_member[45];?></a></li>
   		<li>
   			<select onChange="parent.location.href='index.php?lang='+this.value" class="demoselect">
   			<?php 
   				foreach ($m_lang as $key => $value) {
   			?>
   				<option value="<?=$arr_lang[$key];?>" <? if($_SESSION['lang']== $arr_lang[$key] ){echo'selected';}?> ><?=$value;?></option>
   			<?
   				}
   			?>
			</select>
		</li>
  	</ul>
</nav>
<div id="memu_top">
<?


  $sql = "SELECT * FROM bom_tb_news ORDER BY n_date DESC"; 
  $resNews = sql_query($sql);

$ok_bet = array();
foreach ($resNews as $nKey => $nValue){
			$nValue['n_note'] = htmlspecialchars($nValue['n_note']);
	switch ($nValue['b_zone']){
		case 1:
			$ok_bet[] = $nValue;
			break;
		case 2:
			$ok_bet2[] = $nValue;
			break;
		case 3:
			$ok_bet3[] = $nValue;
			break;
		case 4:
			$ok_bet4[] = $nValue;
			break;
		default:
			break;
	}
}


?>
	<ul>
        <li>
        	<a href="#" onClick="goMain('main_sport_new.php',this,'<?=$lang_member[35];?> : <?=$ok_bet[0]['n_note'];?>','message_football.php?s=6');" class="active"><?=$lang_member[35];?> <img src="img/bg_m.png" class="img_active" style="display:block;"></a>
        </li>
        <li>
        	<a href="#" onClick="goMain('main_lotto.php',this,'<?=$lang_member[36];?> : <?=$ok_bet2[0]['n_note'];?>','message_lotto.php'); parent.leftx.flbet(1);"  id="lotto_menu_btn"><?=$lang_member[36];?> <img src="img/bg_m.png" class="img_active"></a>
        </li>
		<li>
			<a href="#"  onClick="goMain('main_lothun.php',this,'<?=$lang_member[36];?> : <?=$ok_bet2[0]['n_note'];?>','message_lotto.php'); parent.leftx.flbet(1);"><?=$lang_member[48];?> <img src="img/bg_m.png" class="img_active"></a>
		</li>
        <li>
        	<a href="#" onClick="goMain('main_game.php',this,'<?=$lang_member[37];?> : <?=$ok_bet3[0]['n_note'];?>','message_game.php'); parent.leftx.flbet(1);"><?=$lang_member[37];?> <img src="img/bg_m.png" class="img_active"></a>
        </li>
        <li>
        	<!-- <a href="#" onClick="goMain('main_casino.php',this,'<?=$lang_member[38];?> : <?=$ok_bet4[0]['n_note'];?>','message_casino.php'); parent.leftx.flbet(1);"><?=$lang_member[38];?> <img src="img/bg_m.png" class="img_active"></a> -->
        	<a href="#" onClick="goMain('main_casino_list.php',this,'<?=$lang_member[38];?> : <?=$ok_bet4[0]['n_note'];?>','message_casino.php'); parent.leftx.flbet(1);"><?=$lang_member[38];?> <img src="img/bg_m.png" class="img_active"></a>
        </li>
        <li>
        	<a href="#" onClick="goMain('main_transfer.php',this,'<?=$lang_member[35];?> : <?=$ok_bet[0]['n_note'];?>','message_football.php?s=6');"><?=$lang_member[39];?> <img src="img/bg_m.png" class="img_active"></a>
        </li>
        <li>
        	<a href="#" onClick="goMain('main_affiliate.php',this,'<?=$lang_member[35];?> : <?=$ok_bet[0]['n_note'];?>','message_football.php?s=6');"><?=$lang_member[49];?><img src="img/bg_m.png" class="img_active"></a>
        </li>
    </ul>

    <a href="#" onClick=" parent.location.href='logout.php';" style="background:#E81B2C;color: #fff;text-shadow: none;position: absolute;left: 910px; top: 45px; box-shadow: #000 1px 1px 1px; padding: 5px 10px; text-decoration: none; height: 16px;border-radius: 2px;"><?=$lang_member[46];?></a>

</div>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:26px; background:url(img/bg_top2.png);">
  <tr>
    <td width="200" valign="top">
    <a href="#" id="time_bar" onclick="parent.rightx.openUserTimezone(event); return false;" style="cursor: pointer;">
    	<span id="time"></span>
    	<span id="timezone_setting"></span>
    </a>
    </td>
    <td valign="top">
    	<div class="ic_title3" data-title="0" style="margin-top:4px; cursor:pointer; background-image:url(img/icon_l_close.png);" onClick="SwitchLefthideshow(this);"></div><div class="ic_title3" style="margin-top:4px; cursor:pointer; background-image:url(img/icon_t_close.png);"  onClick="SwitchTophideshow(this);" data-title="<?=$_GET['h']?>"></div>
    	<div id="news"><marquee direction="left" height="16" scrollamount="2" scrolldelay="20" onmouseover="this.stop()" onmouseout="this.start()" id="mar_new"><?=$lang_member[35]." : ".$ok_bet[0]['n_note_en'];?></marquee></div>
    	<div id="ic_title2" style="margin-top:4px; cursor:pointer;" onClick="print_dialog();">+</div>
    </td>
  </tr>
</table>
<span id="login_checkin"></span>
</body>
</html>