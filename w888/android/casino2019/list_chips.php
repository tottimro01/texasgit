<?php

	$mid = $_GET['mid'];

	$arr = array();
		$i = 0;
		$arr[$i]["chips"] = "1";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c1.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c1_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "5";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c5.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c5_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "10";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c10.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c10_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "20";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c20.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c20_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "50";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c50.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c50_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "100";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c100.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c100_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "500";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c500.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c500_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "1000";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c1000.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c1000_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "5000";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c5000.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c5000_n.png";

		//=====================================================
		$i += 1;
		$arr[$i]["chips"] = "10000";
		$arr[$i]["url_sel"] = "http://www.ohoking.com/android/casino2019/image/c10000.png";
		$arr[$i]["url_un"] = "http://www.ohoking.com/android/casino2019/image/c10000_n.png";


	echo json_encode($arr);

?>
