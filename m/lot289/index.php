<? 
	session_start(); 
	if(!isset($_SESSION["login"]) || $_SESSION["login"] != '1') {
		header("Location: ".$_SESSION["base_url"]."login.php"); /* Redirect to login if not logged in */
		die();
	}

	if(!isset($_COOKIE["lang"])) { setcookie("lang", "th", time() + (86400 * 365), "/"); }

	include 'function/checkLang.php'; 
	require '../../inc/conn.php'; 
	require '../../inc/function.php'; 
	include 'function/site-data.php'; 
	include 'function/function.php'; 

	$cache_v = time();
	// $cache_v = '10032';
	
	# active menu
	if(isset($_GET["page"])) {
		$am = 0; 
		switch ($_GET["page"]) {
			case 'lotto-zone':
				$am = 1;
				break;
			case 'pay-rate':
				$am = 2;
				break;
			case 'limit-number':
				$am = 3;
				break;
			case 'lotto-result':
				$am = 4;
				break;
			case 'news':
				$am = 5;
				break;
			case 'changepass':
				$am = 6;
				break;
			case 'changelang':
				$am = 7;
				break;
			case 'quick':
				$am = 8;
				break;
			case 'three':
				$am = 9;
				break;
			case 'two':
				$am = 10;
				break;
			case 'special':
				$am = 11;
				break;
			case 'playlist':
				$am = 12;
				break;
			
			default:
				break;
		}
	} else {
		$am = 4;
	}

	if(!isset($_SESSION["zone"]) || !isset($_SESSION["rob"])) {
		$_SESSION["zone"] = 1;
		$_SESSION["rob"] = 1;
	}

	if(isset($_POST["fzone"]) && isset($_POST["frob"])) {
		$_SESSION["zone"] = $_POST["fzone"];
		$_SESSION["rob"] = $_POST["frob"];
	}
	
	// prevent form resubmission
	if($_POST){	header("Location: ".$_SERVER['REQUEST_URI']); }

	$_SESSION["zone_name"] = getLottoName($_SESSION["zone"], $_SESSION["rob"]);

	if($_SESSION["zone_data"][0]!=$_SESSION["zone"] || $_SESSION["zone_data"][1]!=$_SESSION["rob"]) {
		/*$url = $_SESSION["url"]."getZone.php?mid=".$_SESSION["mid"]."&lang=".$_COOKIE["lang"];
		$lotzone = file_get_contents($url);
		$lotzone = json_decode($lotzone,true);*/
		

		$lang_post           = trim($_COOKIE["lang"]);
		if($lang_post==""){
			$lang_post = "th";
		}
		require("../../lang/".$lang_post.".php");

		$url_file="../../json/lotto_hun_new.json";	
		$op_js=file_get_contents2($url_file);
		$jsop = json_decode($op_js, true);
		$ex_jsop = explode("," , $jsop["open"]);

		$url_file="../../json/config/member/LottoConfig_".$_SESSION["mid"].".json";	
		$lot6_js=file_get_contents2($url_file);
		$lot_m = json_decode($lot6_js, true);

		$exn1 = explode("," , $lot_m["m_lotto_pay_super"]);
		$n1 = count($exn1);
		$exn2 = explode("," , $lot_m["m_lotto_pay_senior"]);
		$n2 = count($exn2);
		$exn3 = explode("," , $lot_m["m_lotto_pay_master"]);
		$n3 = count($exn3);
		$exn4 = explode("," , $lot_m["m_lotto_pay_agent"]);
		$n4 = count($exn4);
		$exn5 = explode("," , $lot_m["m_lotto_pay_member"]);
		$n5 = count($exn5);
		if($n1<26){
			$lot_m["m_lotto_pay_super"] = $lot_m["m_lotto_pay_super"].",0";	
		}
		if($n2<26){
			$lot_m["m_lotto_pay_senior"] = $lot_m["m_lotto_pay_senior"].",0";	
		}
		if($n3<26){
			$lot_m["m_lotto_pay_master"] = $lot_m["m_lotto_pay_master"].",0";	
		}
		if($n4<26){
			$lot_m["m_lotto_pay_agent"] = $lot_m["m_lotto_pay_agent"].",0";	
		}
		if($n5<26){
			$lot_m["m_lotto_pay_member"] = $lot_m["m_lotto_pay_member"].",0";	
		}


		$arrp1 = str_replace(',,',',0,',$lot_m["m_lotto_pay_super"]);
		$arrp2 = str_replace(',,',',0,',$lot_m["m_lotto_pay_senior"]);
		$arrp3 = str_replace(',,',',0,',$lot_m["m_lotto_pay_master"]);
		$arrp4 = str_replace(',,',',0,',$lot_m["m_lotto_pay_agent"]);
		$arrp5 = str_replace(',,',',0,',$lot_m["m_lotto_pay_member"]);

		$arrp1_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_super"]);
		$arrp2_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_senior"]);
		$arrp3_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_master"]);
		$arrp4_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_agent"]);
		$arrp5_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_member"]);



		$arr = array();
		$i=0;
		$arr[$i]["block_name"] = $lang_g['getZone'][1]; 
		$arr[$i]["block_show"] = 1;
		$arr[$i]["block_list"] = array();
		$zone_i = 1;
		$rob_i = 1;

		$url_file9="../../json/lotto/ok/ok_1_1.json";		
		$d_bet=file_get_contents2($url_file9);
		$rsx = json_decode2($d_bet, true);
		$rs = $rsx[0];

		$arr[$i]["block_list"][0]["z_name"] = $lang_g['lotZone'][$zone_i];
		$arr[$i]["block_list"][0]["z_status"] = "1";
		$arr[$i]["block_list"][0]["z_close"] = $rs["o_limit_time"];
		$arr[$i]["block_list"][0]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][0]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][0]["z_zone"] = $zone_i;
		$arr[$i]["block_list"][0]["z_rob"] = $rob_i;
		$arr[$i]["block_list"][0]["z_data"] = $rs;
		$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1);
		$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2);
		$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3);
		$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4);
		$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5);

		$zone_i = 18;
		$rob_i = 96;
		$rs = array();
		$arr[$i]["block_list"][1]["z_name"] = $lang_g['lotZone'][$zone_i]; //"จับยี่กี";
		$arr[$i]["block_list"][1]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : "24";
		$arr[$i]["block_list"][1]["z_close"] = 0;
		$arr[$i]["block_list"][1]["z_close_date"] = 0;
		$arr[$i]["block_list"][1]["z_close_time"] = 0;
		$arr[$i]["block_list"][1]["z_zone"] = $zone_i;
		$arr[$i]["block_list"][1]["z_rob"] = $rob_i;
		$rs["o_file"] = "getRob".$zone_i.".php";
		$arr[$i]["block_list"][1]["z_data"] = $rs;
		$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big1"] = "";
		$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big2"] = "";
		$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big3"] = "";
		$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big4"] = "";
		$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big5"] = "";


		$i=1;
		$arr[$i]["block_name"] = $lang_g['lotZone'][2];//"หวยหุ้นไทย";
		$arr[$i]["block_show"] = 1;
		$arr[$i]["block_list"] = array();
		$zone_i = 2;
		$rob_i = 1;
		for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

			$url_file9="../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
			$d_bet=file_get_contents2($url_file9);
			$rsx = json_decode2($d_bet, true);
			$rs = $rsx[0];
			$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lot_rob[$rob_i];
			$arr[$i]["block_list"][$y]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
			$arr[$i]["block_list"][$y]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
			$arr[$i]["block_list"][$y]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
			$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
			$arr[$i]["block_list"][$y]["z_data"] = $rs;
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5_hun);
			$rob_i++;
		}

		$i=2;
		$arr[$i]["block_name"] = $lang_g['_lotZone'][3]; //"หวยหุ้นต่างประเทศ";
		$arr[$i]["block_show"] = 1;
		$arr[$i]["block_list"] = array();
		$nr=0;
		for($x=3;$x<18;$x++){
			$zone_i = $x;
			$rob_i = 1;
			for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
				$url_file9="../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
				$d_bet=file_get_contents2($url_file9);
				$rsx = json_decode2($d_bet, true);
				$rs = $rsx[0];

				$arr[$i]["block_list"][$nr]["z_name"] = $lang_g['lotZone'][$zone_i].($lot_zone_nrob[$zone_i] > 1 ? $lot_rob[$rob_i] : '');
				$arr[$i]["block_list"][$nr]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
				$arr[$i]["block_list"][$nr]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
				$arr[$i]["block_list"][$nr]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
				$arr[$i]["block_list"][$nr]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
				$arr[$i]["block_list"][$nr]["z_zone"] = $zone_i;
				$arr[$i]["block_list"][$nr]["z_rob"] = $rob_i;
				$arr[$i]["block_list"][$nr]["z_data"] = $rs;
				$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1_hun);
				$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2_hun);
				$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3_hun);
				$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4_hun);
				$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5_hun);
				$rob_i++;
				$nr++;
			}
		}


		$i=3;
		$arr[$i]["block_name"] = $lang_g['lotZone'][19]; //"หวยรายวัน";
		$arr[$i]["block_show"] = 1;
		$arr[$i]["block_list"] = array();
		$zone_i = 19;
		$rob_i = 1;
		for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

			$url_file9="../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
			$d_bet=file_get_contents2($url_file9);
			$rsx = json_decode2($d_bet, true);
			$rs = $rsx[0];

			$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." รอบ ".$lot_robmun[$rob_i];
			$arr[$i]["block_list"][$y]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
			$arr[$i]["block_list"][$y]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
			$arr[$i]["block_list"][$y]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
			$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
			$arr[$i]["block_list"][$y]["z_data"] = $rs;
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4_hun);
			$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5_hun);
			$rob_i++;
		}



		$lotzone = json_encode($arr);
		$lotzone = json_decode($lotzone,true);
		
		
		
		
		$_24rob_file = array();
		$_zdata = false;
		$_rob = 0;
		foreach ($lotzone as $key => $value) {
			foreach ($value["block_list"] as $k => $v) {
				if($v["z_status"]==24) {
					$_24rob_file[] = $v["z_data"]["o_file"];
				}
				if($v["z_zone"]==$_SESSION["zone"] && $v["z_rob"]==$_SESSION["rob"]) {
					$_zdata = $v;
					break;
				}
			}
			if($_zdata!==false) { break; }
		}
	
		if($_zdata===false) {
			foreach ($_24rob_file as $k24 => $v24) {
			$_rob = 1;
	
				/*$url = $_SESSION["url"].$v24."?mid=".$_SESSION["mid"]."&lang=".$_COOKIE["lang"];
				$lotzone = file_get_contents($url);
				$lotzone = json_decode($lotzone,true);*/
				
				
				
				$lang_post           = trim($_COOKIE["lang"]);
				if($lang_post==""){
					$lang_post = "th";
				}
				require("../../lang/".$lang_post.".php");

				$url_file="../../json/config/member/LottoConfig_".$_SESSION["mid"].".json";	
				$lot6_js=file_get_contents2($url_file);
				$lot_m = json_decode($lot6_js, true);

				$arrp1_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_super"]);
				$arrp2_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_senior"]);
				$arrp3_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_master"]);
				$arrp4_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_agent"]);
				$arrp5_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_member"]);


				$arr = array();

				$i=0;
				$arr[$i]["block_name"] = $lang_g['lotZone'][18]; //"จับยี่กี"
				$arr[$i]["block_list"] = array();
				$zone_i = 18;
				$rob_i = 1;
				for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

					$url_file9="../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
					$d_bet=file_get_contents2($url_file9);
					$rsx = json_decode2($d_bet, true);
					$rs = $rsx[0];

					$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_g['_rob']." ".$rob_i;
					$arr[$i]["block_list"][$y]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
					$arr[$i]["block_list"][$y]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
					$arr[$i]["block_list"][$y]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
					$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
					$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
					$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
					$arr[$i]["block_list"][$y]["z_data"] = $rs;
					$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1_hun);
					$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2_hun);
					$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3_hun);
					$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4_hun);
					$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5_hun);
					$rob_i++;
				}
	
				
				
				
				$lotzone = json_encode($arr);
				$lotzone = json_decode($lotzone,true);
				
				
				
				foreach ($lotzone as $key => $value) {
					foreach ($value["block_list"] as $k => $v) {
						if($v["z_zone"]==$_SESSION["zone"] && $v["z_rob"]==$_SESSION["rob"]) {
							$_zdata = $v;
							break;
						}
					}
				}
				if($_zdata!==false) { break; }
			}
		}

		if($_zdata!==false) {
			$_SESSION["zone_data"] = array($_SESSION["zone"], $_SESSION["rob"], $_zdata);
		}
	}
?>

<!DOCTYPE html>
<html lang="<?=$_COOKIE['lang'];?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>:: OHO 99 ::</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>

	<link rel="stylesheet" href="library/css/index-style.css?v=<?=$cache_v;?>" />
	<link rel="stylesheet" href="library/css/style.css?v=<?=$cache_v;?>" />
	<link rel="stylesheet" href="library/css/page-style.css?v=<?=$cache_v;?>">
	<link rel="stylesheet" href="library/icomoon/style.css?v=<?=$cache_v;?>">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<script>
		const ur = "<?=$_SESSION["url"];?>";
		const lang_data = {
			"day": '<?=$lang_data["day"]?>',
			"close_bet": '<?=$lang_data["close_bet"]?>',
			"fail": '<?=$lang_data["fail"]?>',
			"enter_data_all": '<?=$lang_data["enter_data_all"]?>',
			"ok": '<?=$lang_data["ok"]?>',
			"success": '<?=$lang_data["success"]?>',
			"change_success": '<?=$lang_data["change_success"]?>',
			"menu_logout": '<?=$lang_data["menu_logout"]?>',
			"Confirm_logout": '<?=$lang_data["Confirm_logout"]?>',
			"cancel": '<?=$lang_data["cancel"]?>',
			"alert_input_data": '<?=$lang_data["alert_input_data"]?>',
			"detail_bill": '<?=$lang_data["detail_bill"]?>',
			"num": '<?=$lang_data["num"]?>',
			"price": '<?=$lang_data["price"]?>',
		};

		const lang_data_month = {
			"full" : {
				'1':  '<?=$lang_data["months_f1"]?>',
				'2':  '<?=$lang_data["months_f2"]?>',
				'3':  '<?=$lang_data["months_f3"]?>',
				'4':  '<?=$lang_data["months_f4"]?>',
				'5':  '<?=$lang_data["months_f5"]?>',
				'6':  '<?=$lang_data["months_f6"]?>',
				'7':  '<?=$lang_data["months_f7"]?>',
				'8':  '<?=$lang_data["months_f8"]?>',
				'9':  '<?=$lang_data["months_f9"]?>',
				'10': '<?=$lang_data["months_f10"]?>',
				'11': '<?=$lang_data["months_f11"]?>',
				'12': '<?=$lang_data["months_f12"]?>',
			},
			"short" : {
				'1':  '<?=$lang_data["months_s1"]?>',
				'2':  '<?=$lang_data["months_s2"]?>',
				'3':  '<?=$lang_data["months_s3"]?>',
				'4':  '<?=$lang_data["months_s4"]?>',
				'5':  '<?=$lang_data["months_s5"]?>',
				'6':  '<?=$lang_data["months_s6"]?>',
				'7':  '<?=$lang_data["months_s7"]?>',
				'8':  '<?=$lang_data["months_s8"]?>',
				'9':  '<?=$lang_data["months_s9"]?>',
				'10': '<?=$lang_data["months_s10"]?>',
				'11': '<?=$lang_data["months_s11"]?>',
				'12': '<?=$lang_data["months_s12"]?>',
			}
		}

		const lang_data_day = {
			"1": '<?=$lang_data["sunday"]?>',
			"2": '<?=$lang_data["monday"]?>',
			"3": '<?=$lang_data["tuesday"]?>',
			"4": '<?=$lang_data["wednesday"]?>',
			"5": '<?=$lang_data["thursday"]?>',
			"6": '<?=$lang_data["friday"]?>',
			"7": '<?=$lang_data["saturday"]?>',
		}
		const base_url = '<?=$_SESSION["base_url"];?>';
		const url = '<?=$_SESSION["url"];?>';
	</script>
	<script src="library/js/index.js?v=<?=$cache_v;?>"></script>
	<script src="library/js/modal.js?v=<?=$cache_v;?>"></script>
</head>
<body>
	<div id="side-menu" class="sidenav">
		<div class="sidenav-top-menu">
			<div><?=$lang_data["profile"];?></div>
			<img src="library/img/ico/icon_refresh_mem.png?v=1001" alt="" />
		</div>
		<div class="sidenav-uinfo-wrapper">
			<div id="user-credit" class="sidenav-uinfo" ">
				<div name="title"><?=$lang_data["credit_balance"];?></div>
				<div name="value"><?=number_format($_SESSION["mcredit"],2,'.',',');?></div>
				<div name="currency"><?=$lang_data["baht"];?></div>
			</div>
			<div id="user-play" class="sidenav-uinfo">
				<div name="title"><?=$lang_data["outstanding"];?></div>
				<div name="value"><?=number_format($_SESSION["mcredit_old"],2,'.',',');?></div>
				<div name="currency"><?=$lang_data["baht"];?></div>
			</div>
			<div id="user-get-credit" class="sidenav-uinfo">
				<div name="title"><?=$lang_data["credit_received"];?></div>
				<div name="value"><?=number_format($_SESSION["mcredit_acp"],2,'.',',');?></div>
				<div name="currency"><?=$lang_data["baht"];?></div>
			</div>
		</div>
		<ul>
			<li>
			<? if($am===1) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=lotto-zone";?> class="sidenav-menu-link">
  			<? } ?>
  					<img src="library/img/ico/ic_menu_zone.png?v=1001" alt="" />
  					<div><?=$lang_data["select_zone"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>

  			<li>
  			<? if($am===2) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=pay-rate";?> class="sidenav-menu-link">
  			<? } ?>
  					<img src="library/img/ico/ic_menu_payrate.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_payrate"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
  			<li>
  			<? if($am===3) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=limit-number";?> class="sidenav-menu-link">
			<? } ?>	
  					<img src="library/img/ico/ic_menu_lotfull.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_lotfull"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
  			<li>
  			<? if($am===4) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=lotto-result";?> class="sidenav-menu-link">
			<? } ?>	
  					<img src="library/img/ico/ic_menu_win.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_win"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
  			<li>
  			<? if($am===5) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=news";?> class="sidenav-menu-link">
			<? } ?>	
  					<img src="library/img/ico/ic_menu_news.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_news"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
  			<li>
  			<? if($am===6) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=changepass";?> class="sidenav-menu-link">
			<? } ?>	
  					<img src="library/img/ico/ic_menu_newpass.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_newpass"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
  			<li>
  			<? if($am===7) {?>
  				<a href="javascript:void(0);" class="sidenav-menu-link active" onclick="openSideNav('.hamburger');">
  			<? } else { ?>
  				<a href=<?=$_SESSION["base_url"]."index.php?page=changelang";?> class="sidenav-menu-link">
			<? } ?>	
  					<img src="library/img/ico/ic_menu_lang.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_language"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
  			<li>
  				<a href="javascript:void(0);" onclick="openSideNav('.hamburger'); checkLogout(); " class="sidenav-menu-link">
  					<img src="library/img/ico/ic_menu_logout.png?v=1001" alt="" />
  					<div><?=$lang_data["menu_logout"];?></div>
  					<span class="icon-chevron-right"></span>
  				</a>
  			</li>
		</ul>
	</div>

	<div id="main" class="main-content">
	<? # TOP MENU ?>
	<div id="top-menu" class="top-menu menu-background">
		<div class="hamburger"	data-active="y" onclick="openSideNav(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
		<div class="top-menu-title"><?=$_SESSION["mname"];?></div>
		<div class="home-icon"><a href="index.php?page=lotto-result"><img src=<?=$_SESSION["logo_home_img"];?> alt=""></a></div>
	</div>
	<? # END TOP MENU ?>
	<?	if(isset($_GET["page"])) {
			if($_GET["page"] == 'quick' || $_GET["page"] == 'three' || $_GET["page"] == 'two' || $_GET["page"] == 'special' || $_GET["page"] == 'unfinish-bet') 
			{
	?>
				<div id="unfinish-link" class="unfinish-bet">
					<a href="index.php?page=unfinish-bet">
						<?=$lang_data["history"];?>
						<img src="library/img/ico/new.gif?v=1001" alt="" style="height: 16px;" />
					</a>
				</div>
	<? } } ?>
	
	<div id="lotto-content" class="lotto-content">
		<div class="content-wrapper">
			<?
				if(isset($_GET["page"])) {
					if (file_exists($_GET["page"].'.php')) {
						include $_GET["page"].'.php';
					}
					else {
						include $_SESSION["base_url"].'404.php';
					}
				}else {
					include 'lotto-result.php';
				}
			?>
		</div>
	</div>

	<? #BOTTOM MENU ?>
<div id="bottom-menu" class="bottom-menu menu-background">
<a href=<?=$_SESSION["base_url"]."index.php?page=quick";?> id="quick" <?if($am===8){?> class="bottom-menu-btn active" <?}else{?> class="bottom-menu-btn" <?}?>>
	<img src=<?=$_SESSION["base_url"]."library/img/ico/lotthree_w.png?v=1001";?> alt="">
	<div><?=$lang_data["page_fast"];?></div>
</a>
<a href=<?=$_SESSION["base_url"]."index.php?page=three";?> id="three" <?if($am===9){?> class="bottom-menu-btn active" <?}else{?> class="bottom-menu-btn" <?}?>>
	<img src=<?=$_SESSION["base_url"]."library/img/ico/lotthree_i_w.png?v=1001";?> alt="">
	<div><?=$lang_data["page_3n"];?></div>
</a>
<a href=<?=$_SESSION["base_url"]."index.php?page=two";?> id="two" <?if($am===10){?> class="bottom-menu-btn active" <?}else{?> class="bottom-menu-btn" <?}?>>
	<img src=<?=$_SESSION["base_url"]."library/img/ico/lottwo_w.png?v=1001";?> alt="">
	<div><?=$lang_data["page_2"];?></div>
</a>
<a href=<?=$_SESSION["base_url"]."index.php?page=special";?> id="special" <?if($am===11){?> class="bottom-menu-btn active" <?}else{?> class="bottom-menu-btn" <?}?>>
	<img src=<?=$_SESSION["base_url"]."library/img/ico/lotspe_w.png?v=1001";?> alt="">
	<div><?=$lang_data["page_spec"];?></div>
</a>
<a href=<?=$_SESSION["base_url"]."index.php?page=playlist";?> id="playlist" <?if($am===12){?> class="bottom-menu-btn active" <?}else{?> class="bottom-menu-btn" <?}?>>
	<img src=<?=$_SESSION["base_url"]."library/img/ico/lotlistplay_w.png?v=1001";?> alt="">
	<div><?=$lang_data["page_list"];?></div>
</a>
</div>
	<? #END BOTTOM MENU ?>
	</div>
	<? include 'modal.php'; ?>
</body>
</html>
