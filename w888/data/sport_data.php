<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

unset($_SESSION["league_today"]);

require('../inc/conn.php');
require('../inc/function.php');
//if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


if($_GET[sc]=="al"){
$data=file_get_contents3($json_sport."json/sport/today/all_live.html");
}elseif($_GET[sc]=="alr"){
$data=file_get_contents3($json_sport."json/sport/refresh/all_live_refresh.html");
}elseif($_GET[sc]=="at"){
$data=file_get_contents3($json_sport."json/sport/today/all_today.html");
}elseif($_GET[sc]=="atr"){
$data=file_get_contents3($json_sport."json/sport/refresh/all_today_refresh.html");

}elseif($_GET[sc]=="btl"){
$data=file_get_contents3($json_sport."json/sport/today/badminton_live.html");
}elseif($_GET[sc]=="btlr"){
$data=file_get_contents3($json_sport."json/sport/refresh/badminton_live_refresh.html");
	}elseif($_GET[sc]=="btt"){
$data=file_get_contents3($json_sport."json/sport/today/badminton_today.html");
	}elseif($_GET[sc]=="bttr"){
$data=file_get_contents3($json_sport."json/sport/refresh/badminton_today_refresh.html");

	}elseif($_GET[sc]=="bbl"){
$data=file_get_contents3($json_sport."json/sport/today/baseball_live.html");
	}elseif($_GET[sc]=="bblr"){
$data=file_get_contents3($json_sport."json/sport/refresh/baseball_live_refresh.html");
	}elseif($_GET[sc]=="bbt"){
$data=file_get_contents3($json_sport."json/sport/today/baseball_today.html");
	}elseif($_GET[sc]=="bbtr"){
$data=file_get_contents3($json_sport."json/sport/refresh/baseball_today_refresh.html");


	}elseif($_GET[sc]=="bkl"){
$data=file_get_contents3($json_sport."json/sport/today/basketball_live.html");
	}elseif($_GET[sc]=="bklr"){
$data=file_get_contents3($json_sport."json/sport/refresh/basketball_live_refresh.html");
	}elseif($_GET[sc]=="bkt"){
$data=file_get_contents3($json_sport."json/sport/today/basketball_today.html");
	}elseif($_GET[sc]=="bktr"){
$data=file_get_contents3($json_sport."json/sport/refresh/basketball_today_refresh.html");

 
	}elseif($_GET[sc]=="bol"){
$data=file_get_contents3($json_sport."json/sport/today/boat_live.html");
	}elseif($_GET[sc]=="bolr"){
$data=file_get_contents3($json_sport."json/sport/refresh/boat_live_refresh.html");
	}elseif($_GET[sc]=="bot"){
$data=file_get_contents3($json_sport."json/sport/today/boat_today.html");
	}elseif($_GET[sc]=="botr"){
$data=file_get_contents3($json_sport."json/sport/refresh/boat_today_refresh.html");

	}elseif($_GET[sc]=="cal"){
 $data=file_get_contents3($json_sport."json/sport/today/car_live.html");
	}elseif($_GET[sc]=="calr"){
$data=file_get_contents3($json_sport."json/sport/refresh/car_live_refresh.html");
	}elseif($_GET[sc]=="cat"){
$data=file_get_contents3($json_sport."json/sport/today/car_today.html");
	}elseif($_GET[sc]=="catr"){
$data=file_get_contents3($json_sport."json/sport/refresh/car_today_refresh.html");
 
	}elseif($_GET[sc]=="col"){
$data=file_get_contents3($json_sport."json/sport/today/cock_live.html");
	}elseif($_GET[sc]=="colr"){
$data=file_get_contents3($json_sport."json/sport/refresh/cock_live_refresh.html");
	}elseif($_GET[sc]=="cot"){
 $data=file_get_contents3($json_sport."json/sport/today/cock_today.html");
	}elseif($_GET[sc]=="cotr"){
$data=file_get_contents3($json_sport."json/sport/refresh/cock_today_refresh.html");


	}elseif($_GET[sc]=="fbs"){
$data=file_get_contents3($json_sport."json/sport/today/football_step.html");
	}elseif($_GET[sc]=="fbl"){
$data=file_get_contents3($json_sport."json/sport/today/football_live.html");
	}elseif($_GET[sc]=="fblr"){
$data=file_get_contents3($json_sport."json/sport/refresh/football_live_refresh.html");
	}elseif($_GET[sc]=="fbt"){
$data=file_get_contents3($json_sport."json/sport/today/football_today.html");
	}elseif($_GET[sc]=="fbtr"){
$data=file_get_contents3($json_sport."json/sport/refresh/football_today_refresh.html");

	}elseif($_GET[sc]=="hkl"){
$data=file_get_contents3($json_sport."json/sport/today/hocky_live.html");
	}elseif($_GET[sc]=="hklr"){
$data=file_get_contents3($json_sport."json/sport/refresh/hocky_live_refresh.html");
	}elseif($_GET[sc]=="hkt"){
$data=file_get_contents3($json_sport."json/sport/today/hocky_today.html");
	}elseif($_GET[sc]=="hktr"){
$data=file_get_contents3($json_sport."json/sport/refresh/hocky_today_refresh.html");

	}elseif($_GET[sc]=="hol"){
$data=file_get_contents3($json_sport."json/sport/today/horse_live.html");
	}elseif($_GET[sc]=="holr"){
$data=file_get_contents3($json_sport."json/sport/refresh/horse_live_refresh.html");
	}elseif($_GET[sc]=="hot"){
$data=file_get_contents3($json_sport."json/sport/today/horse_today.html");
	}elseif($_GET[sc]=="hotr"){
$data=file_get_contents3($json_sport."json/sport/refresh/horse_today_refresh.html");

	}elseif($_GET[sc]=="mtl"){
$data=file_get_contents3($json_sport."json/sport/today/muaythai_live.html");
	}elseif($_GET[sc]=="mtlr"){
$data=file_get_contents3($json_sport."json/sport/refresh/muaythai_live_refresh.html");
	}elseif($_GET[sc]=="mtt"){
$data=file_get_contents3($json_sport."json/sport/today/muaythai_today.html");
	}elseif($_GET[sc]=="mttr"){
$data=file_get_contents3($json_sport."json/sport/refresh/muaythai_today_refresh.html");

	}elseif($_GET[sc]=="skl"){
$data=file_get_contents3($json_sport."json/sport/today/snooker_live.html");
	}elseif($_GET[sc]=="sklr"){
$data=file_get_contents3($json_sport."json/sport/refresh/snooker_live_refresh.html");
	}elseif($_GET[sc]=="skt"){
$data=file_get_contents3($json_sport."json/sport/today/snooker_today.html");
	}elseif($_GET[sc]=="sktr"){
$data=file_get_contents3($json_sport."json/sport/refresh/snooker_today_refresh.html");

	}elseif($_GET[sc]=="tnl"){
$data=file_get_contents3($json_sport."json/sport/today/tennis_live.html");
	}elseif($_GET[sc]=="tnlr"){
$data=file_get_contents3($json_sport."json/sport/refresh/tennis_live_refresh.html");
	}elseif($_GET[sc]=="tnt"){
$data=file_get_contents3($json_sport."json/sport/today/tennis_today.html");
	}elseif($_GET[sc]=="tntr"){
$data=file_get_contents3($json_sport."json/sport/refresh/tennis_today_refresh.html");

	}elseif($_GET[sc]=="vbl"){
$data=file_get_contents3($json_sport."json/sport/today/volleyball_live.html");
	}elseif($_GET[sc]=="vblr"){
$data=file_get_contents3($json_sport."json/sport/refresh/volleyball_live_refresh.html");
	}elseif($_GET[sc]=="vbt"){
$data=file_get_contents3($json_sport."json/sport/today/volleyball_today.html");
	}elseif($_GET[sc]=="vbtr"){
$data=file_get_contents3($json_sport."json/sport/refresh/volleyball_today_refresh.html");

	}elseif($_GET[sc]=="usl"){
$data=file_get_contents3($json_sport."json/sport/today/usa_ball_live.html");
	}elseif($_GET[sc]=="uslr"){
$data=file_get_contents3($json_sport."json/sport/refresh/usa_ball_live_refresh.html");
	}elseif($_GET[sc]=="ust"){
 $data=file_get_contents3($json_sport."json/sport/today/usa_ball_today.html");
	}elseif($_GET[sc]=="ustr"){
$data=file_get_contents3($json_sport."json/sport/refresh/usa_ball_today_refresh.html");
	}elseif($_GET[sc]=="xx"){
	}elseif($_GET[sc]=="xx"){
	
}else{
	
	}

echo $data;
?>