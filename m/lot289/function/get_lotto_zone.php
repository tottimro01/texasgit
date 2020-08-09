<?
	session_start();
	header("Content-type: text/html");

	require('../../../inc/conn.php');
	require('../../../inc/function.php');

	include 'checkLang.php'; 
	require 'compress_page.php';

	/*$url = $_SESSION["url"].base64_decode($_POST["url"])."?mid=".$_SESSION["mid"]."&lang=".$_COOKIE["lang"];

	$lotzone = file_get_contents($url);
	$lotzone = json_decode($lotzone,true);*/

	$lang_post = trim($_COOKIE["lang"]);
	if($lang_post==""){
		$lang_post = "th";
	}
	require("../../../lang/".$lang_post.".php");

	$url_file="../../../json/lotto_hun_new.json";	
	$op_js=file_get_contents2($url_file);
	$jsop = json_decode($op_js, true);
	$ex_jsop = explode("," , $jsop["open"]);

	if(base64_decode($_POST["url"])=="getZone.php"){

		$url_file="../../../json/config/member/LottoConfig_".$_SESSION["mid"].".json";	
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

		$url_file9="../../../json/lotto/ok/ok_1_1.json";		
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

			$url_file9="../../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
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
				$url_file9="../../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
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

			$url_file9="../../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
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



	}else{
		// $lang_post = trim($_COOKIE["lang"]);
		// if($lang_post==""){
		// 	$lang_post = "th";
		// }
		// require("../../../lang/".$lang_post.".php");

		$url_file="../../../json/config/member/LottoConfig_".$_SESSION["mid"].".json";	
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

			$url_file9="../../../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
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
	}

	//echo $arr["dddd"] = base64_decode($_POST["url"]);

	$lotzone = json_encode($arr);
	$lotzone = json_decode($lotzone,true);



	function CalRemainTime($end) {
   		$now = new DateTime();
   		$now->setTimestamp(strtotime('now'));
   		$future_date = new DateTime();
   		$future_date->setTimestamp($end);
   		$interval = $future_date->diff($now);
   		return array('d' => $interval->format("%a"), 'h' => $interval->format("%h"), 'm' => $interval->format("%i"), 's' => $interval->format("%s"));
 	}

 	function ConvTo2Digit($txt) {
   		if(strlen($txt) < 2) {
     		return "0".$txt;
   		}
   		return $txt;
 	}

?>

<? foreach ($lotzone as $key => $value) { ?>
	<div class="zone-group">
		<h1 class="zone-title"><span><?=$value["block_name"];?></span></h1>
	<?  foreach ($value["block_list"] as $k => $v) { 
			$s_cls = count($value["block_list"]) > 1 ? "" : "single";
	?>
	        <div class="zone-selector <?=$s_cls;?>">
	          <div id="<?=$key.$v["z_zone"]."_".$k;?>"
	            <?if(strtotime("now")>$v["z_close"] && $v["z_status"]==1){?> 
	            	class="selector-wrapper dis" 
	             	onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>');"
	            <?}else if($v["z_status"]==0){?>
	             	class="selector-wrapper close" 
	            <?}else if($v["z_status"]==24){?>
	             	class="selector-wrapper _24" 
	             	onclick="Select24HrZone('<?=$v["z_data"]["o_file"];?>');"
	            <?}else{?> 
	            	class="selector-wrapper" 
	             	onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>');"
	            <?}?>>

	            <h1 class="zone-name"><?=$v["z_name"];?></h1>
	            <hr>
	             		<p class="close-time">
	             	<?if($v["z_status"]==24){?> 
	             			<b><?=$lang_data["open_tang"];?></b>
	             			<br>
	             			<span><?=$v["z_rob"]." ".$lang_data["rob"];?></span>
	             	<?}else{?>
	            			<b><?=$lang_data["close_lesson"];?></b>
	            			<br>
	              			<span><?=$v["z_close_date"]." ".$v["z_close_time"];?></span>
	            	<?}?>
	            		</p>
	            <p class="close-count">
	                <?if(strtotime("now")>$v["z_close"] && $v["z_status"]==1){?> 
	                	<span style="color: #e01a1a;"><?=$lang_data["close_bet"];?></span>
	                <?}else if($v["z_status"]==0){?> 
	                	<span><?=$lang_data["close_bet"];?></span>
	                <?}else if($v["z_status"]==24){?> 
						<span class="icon-clock"></span>
	                	<span> <?=$lang_data["t24hr"];?></span>
	                <?}else{?> 
	                	<span id="<?=$key.$v["z_zone"]."_countdown_".$k;?>">
	                  		<script>
	                  			countdown_time('<?=$key.$v["z_zone"]."_".$k;?>', '<?=$key.$v["z_zone"]."_countdown_".$k;?>', '<?=strtotime("now");?>', '<?=$v["z_close"];?>');
	                  		</script> 
	                  		<?
	                      	$r = CalRemainTime($v["z_close"]);
	                     	$d = (intval($r["d"]) > 0) ? ConvTo2Digit($r["d"])." ".$lang_data["day"]." " : "";
	                      	echo $d.ConvTo2Digit($r["h"])." : ".ConvTo2Digit($r["m"])." : ".ConvTo2Digit($r["s"]);
	                  		?>
	                </span> 
	                <?}?>
	            </p>
	          </div>
	        </div>
	    <? }  ?>
	</div>
<? } ?>