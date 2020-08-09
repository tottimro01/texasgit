<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_'.$_SESSION["AGlang"].'.php');
  include "inc/function.php";


if($_POST["sport"] == "sc")
{
	$thead = [$lang_soccerResultSoccer[9],$lang_soccerResultSoccer[10],$lang_soccerResultSoccer[11],$lang_soccerResultSoccer[12]];
	$status = true;

	$rs['อังกฤษ พรีเมียร์ ลีก'][0] = array(

				"kickoff_time" 	=> "3/31/2019 09:05 AM",
				"re_league"	 	=> "อังกฤษ พรีเมียร์ ลีก",
				"team_home"	 	=> "คาร์ดิฟฟ์ ซิตี้",
				"team_away"	 	=> "เชลซี",
				"fh_score"	 	=> "0-0",
				"fn_score"	 	=> "1-2",
				"re_status"	 	=> "Completed",
				"re_date"		=> "2019-03-31",
				"re_sport"	 	=> "Soccer"
	);
	$rs['อังกฤษ พรีเมียร์ ลีก'][1] = array(
	
				"kickoff_time" 	=> "3/31/2019 11:30 AM",
				"re_league"	 	=> "อังกฤษ พรีเมียร์ ลีก",
				"team_home"	 	=> "ลิเวอร์พูล",
				"team_away"	 	=> "ท็อตแนม ฮ็อทสเปอร์",
				"fh_score"	 	=> "1-0",
				"fn_score"	 	=> "2-1",
				"re_status"	 	=> "Completed",
				"re_date"		=> "2019-03-31",
				"re_sport"	 	=> "Soccer"
	);

}else if($_POST["sport"] == "bk")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1Q", "2Q", "3Q", "4Q", "OT", $lang_soccerResultSoccer[11], $lang_soccerResultSoccer[12], $lang_soccerResultSoccer[13]];
	$status = true;

	$rs['New Zealand NBL'][0] = array(
		"a_score1"=> "42",
		"a_score2"=> "104",
		"as1"=> "23",
		"as2"=> "19",
		"as3"=> "27",
		"as4"=> "35",
		"as5"=> "-",
		"h_score1"=> "53",
		"h_score2"=> "97",
		"hs1"=> "27",
		"hs2"=> "26",
		"hs3"=> "30",
		"hs4"=> "14",
		"hs5"=> "-",
		"kickoff_time"=> "5/12/2019 03=>00 AM",
		"re_date"=> "2019-05-12",
		"re_league"=> "New Zealand NBL",
		"re_status"=> "Completed",
		"team_away"=> "เซาท์แลนด์ ชาร์ค",
		"team_home"=> "เซาท์เทิร์น ฮัสกี้",
	);
	$rs['ดับบิวเอ็นบีเอ - พรีซีซั่น'][0] = array(
		"a_score1"=> "45",
		"a_score2"=> "75",
		"as1"=> "23",
		"as2"=> "22",
		"as3"=> "18",
		"as4"=> "12",
		"as5"=> "-",
		"h_score1"=> "43",
		"h_score2"=> "82",
		"hs1"=> "21",
		"hs2"=> "22",
		"hs3"=> "18",
		"hs4"=> "21",
		"hs5"=> "-",
		"kickoff_time"=> "5/11/2019 10=>00 PM",
		"re_date"=> "2019-05-12",
		"re_league"=> "ดับบิวเอ็นบีเอ - พรีซีซั่น",
		"re_status"=> "Completed",
		"team_away"=> "ลอส แองเจลิส สปาร์ค",
		"team_home"=> "ฟินิกซ์ เมอร์คูรี่",
	);

}else if($_POST["sport"] == "af")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1Q", "2Q", "3Q", "4Q", "OT", $lang_soccerResultSoccer[11], $lang_soccerResultSoccer[12], $lang_soccerResultSoccer[13]];
	$status = false;
	$rs = [];
}else if($_POST["sport"] == "tn")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1Set", "2Set", "3Set", "4Set", "5Set", $lang_soccerResultSoccer[14], $lang_soccerResultSoccer[15], $lang_soccerResultSoccer[13]];
	$status = true;
	$rs['ATP - Internazionali BNL d-Italia'][0] = array(
		"a_score1"=> "16",
		"a_score2"=> "2",
		"as1"=> "6",
		"as2"=> "4",
		"as3"=> "6",
		"as4"=> "",
		"as5"=> "",
		"h_score1"=> "7",
		"h_score2"=> "1",
		"hs1"=> "0",
		"hs2"=> "6",
		"hs3"=> "1",
		"hs4"=> "",
		"hs5"=> "",
		"kickoff_time"=> "5/19/2019 10:00 AM",
		"re_date"=> "2019-05-19",
		"re_league"=> "ATP - Internazionali BNL d-Italia",
		"re_status"=> "Completed",
		"team_away"=> "ราฟาเอล นาดาล (สเปน)",
		"team_home"=> "โนวัค ยอโควิค (เซอร์เบีย)",
	);
}else if($_POST["sport"] == "ic")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1Set", "2Set", "3Set", "OT", $lang_soccerResultSoccer[12], $lang_soccerResultSoccer[13]];
	$status = false;
	$rs = [];
}else if($_POST["sport"] == "bb")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1", "2", "3", "4", "5", "6", "7", "8", "9", "E.I.",$lang_soccerResultSoccer[12],$lang_soccerResultSoccer[13]];
	$status = true;
	$status = false;
	$rs = [];
}else if($_POST["sport"] == "vb")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1Set", "2Set", "3Set", "4Set", "5Set", $lang_soccerResultSoccer[14], $lang_soccerResultSoccer[15], $lang_soccerResultSoccer[13]];
	$status = false;
	$rs = [];
}else if($_POST["sport"] == "bt")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "1Set", "2Set", "3Set", "4Set", "5Set", $lang_soccerResultSoccer[14], $lang_soccerResultSoccer[15], $lang_soccerResultSoccer[13]];
	$status = false;
	$rs = [];
}else if($_POST["sport"] == "my")
{
	$thead = [$lang_soccerResultSoccer[9], $lang_soccerResultSoccer[10], "Final", $lang_soccerResultSoccer[13]];
	$status = true;

	$rs['มวยไทย - เวทีมวย ช่อง7 (ช่อง 7)'][0] = array(
				"en_blue" => "ซุปเปอร์เจ๋ง ส.สมานการ์เม้นท์",
				"en_league" => "มวยไทย - เวทีมวย ช่อง7 (ช่อง 7) ",
				"en_red" => "จอมโหด หมูปิ้งอร่อยจุงเบย",
				"re_blue_wl" => "Lost",
				"re_red_wl" => "Won",
				"re_start" => "5/12/2019 04:49 AM",
				"re_status" => "<STRONG>Completed<BR> <DIV class=ipColor>5 Rounds Completed</DIV></STRONG>",
	);
	$rs['มวยไทย - เวทีมวย ช่อง7 (ช่อง 7)'][1] = array(
			"en_blue"=> "คูโบต้า ลูกมะขามหวาน",
			"en_league"=> "มวยไทย - เวทีมวย ช่อง7 (ช่อง 7) ",
			"en_red"=> "เพชรจริง ลูกบ้านใหม่",
			"re_blue_wl"=> "Won",
			"re_red_wl"=> "Lost",
			"re_start"=> "5/12/2019 03:25 AM",
			"re_status"=> "<STRONG>Completed<BR><DIV class=ipColor>5 Rounds Completed</DIV></STRONG>",
	);
}




$data = array(
    'status' => $status,
    'result' => $rs,
    'thead' => $thead
);


echo json_encode($data);

 ?>