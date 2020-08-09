<?
header("Content-type: text/json");

	$lang = $_GET['lang'];

	$host = "www.ohoking.com/android/casino2019/image/";
	//$host = "192.168.1.115/casino2019/image/";

	$nameGame = array(
	"ไพ่มังกรปะทะเสือ A", "ไพ่มังกรปะทะเสือ B", "ไพ่มังกรปะทะเสือ C", "ไพ่มังกรปะทะเสือ D", "ไพ่มังกรปะทะเสือ E"
	,"บาคาร่า A", "บาคาร่า B", "บาคาร่า C", "บาคาร่า D", "บาคาร่า E"
	,"ไฮโล A", "ไฮโล B", "ไฮโล C", "ไฮโล D", "ไฮโล E"
	,"รูเล็ต A", "รูเล็ต B", "รูเล็ต C", "รูเล็ต D", "รูเล็ต E"
	,"น้ำเต้าปูปลา A", "น้ำเต้าปูปลา B", "น้ำเต้าปูปลา C", "น้ำเต้าปูปลา D", "น้ำเต้าปูปลา E");

	$typeGame = array(
	"1", "1", "1", "1", "1"
	,"2", "2", "2", "2", "2"
	,"3", "3", "3", "3", "3"
	,"4", "4", "4", "4", "4"
	,"5", "5", "5", "5", "5");

	$roomGame = array(
	"1", "2", "3", "4", "5"
	,"1", "2", "3", "4", "5"
	,"1", "2", "3", "4", "5"
	,"1", "2", "3", "4", "5"
	,"1", "2", "3", "4", "5");

	$logoGame = array(
	"http://".$host."bg_img1.png",
	"http://".$host."bg_img1.png",
	"http://".$host."bg_img1.png",
	"http://".$host."bg_img1.png",
	"http://".$host."bg_img1.png",
	"http://".$host."bg_img2.png",
	"http://".$host."bg_img2.png",
	"http://".$host."bg_img2.png",
	"http://".$host."bg_img2.png",
	"http://".$host."bg_img2.png",
	"http://".$host."bg_img3.png",
	"http://".$host."bg_img3.png",
	"http://".$host."bg_img3.png",
	"http://".$host."bg_img3.png",
	"http://".$host."bg_img3.png",
	"http://".$host."bg_img4.png",
	"http://".$host."bg_img4.png",
	"http://".$host."bg_img4.png",
	"http://".$host."bg_img4.png",
	"http://".$host."bg_img4.png",
	"http://".$host."bg_img5.png",
	"http://".$host."bg_img5.png",
	"http://".$host."bg_img5.png",
	"http://".$host."bg_img5.png",
	"http://".$host."bg_img5.png");


	if ($_POST['user'] != '' && $_POST['pass'] != '') {
		$arrData["member_id"] = "1";
		$arrData["status"] = "1";
		$arrData["massage"] = "เข้าสู่ระบบสำเร็จ";
		$arrData["member_name"] = "ฟหกด่าสวฟหกด่าสว";
		$arrData["member_credit"] = rand(0,100000);

		//####### รายการเกมส์ ########
		for ($x = 0; $x < count($typeGame); $x++) {
			$arrData["list_game"][$x]["type"] = $typeGame[$x];
			$arrData["list_game"][$x]["name"] = $nameGame[$x];
			$arrData["list_game"][$x]["room"] = $roomGame[$x];
			$arrData["list_game"][$x]["logo"] = $logoGame[$x];
			//$arrData["list_game"][$x]["live1"] = "http://61.91.12.34:1935/live/smil:tv5adaptive.smil/playlist.m3u8";
			//$arrData["list_game"][$x]["live2"] = "http://61.91.12.34:1935/live/smil:tv5adaptive.smil/playlist.m3u8";
			//$arrData["list_game"][$x]["live2"] = "http://thaipbs-live.cdn.byteark.com/live/playlist.m3u8";

			if ($x % 4 == 0) {
				$arrData["list_game"][$x]["live1"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
				$arrData["list_game"][$x]["live2"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
			}elseif ($x % 4 == 1) {
				$arrData["list_game"][$x]["live1"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
				$arrData["list_game"][$x]["live2"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
			}elseif ($x % 4 == 2) {
				$arrData["list_game"][$x]["live1"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
				$arrData["list_game"][$x]["live2"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
			}elseif ($x % 4 == 3) {
				$arrData["list_game"][$x]["live1"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
				$arrData["list_game"][$x]["live2"] = "https://wowzaprod157-i.akamaihd.net/hls/live/595712/c0170fc9/c0170fc9_1_819000/chunklist.m3u8";
			}

		}

	}else {
		$arrData["status"] = "2";
		$arrData["massage"] = "ไม่พบชื่อผู้ใช้งาน";

	}


	echo json_encode($arrData);

?>
