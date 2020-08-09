<?
	// session_start();
	// $_SESSION["close_big"] = "2513055938";
	// $_SESSION["close_small"] = "3413055938";

	// $p = "pay,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,";
	// $p = "pay,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,";

	// $_SESSION["lot_pay_num1"] = explode(",", $p);
	// $_SESSION["lot_pay_num2"] = explode(",", $p);
	// $_SESSION["lot_pay_num3"] = explode(",", $p);
	// $_SESSION["lot_pay_num4"] = explode(",", $p);
	// $_SESSION["lot_pay_num5"] = explode(",", $p);

	// $date = new DateTime();
	// $_time = $date->getTimestamp();
	// echo $_time;
	// echo " - ";

	// echo $_SESSION["close_big"];
	// echo " - ";

	// echo $_SESSION["close_small"];
	// echo " - ";

	// echo json_encode($_SESSION["lot_pay_num1"]);

	function convertDate($_date) {
		global $lang_data;
		$d = explode('-', $_date);
		$m = $lang_data["months_f".intval($d[1])];
		$y = $_COOKIE["lang"] == "en" ? 0 : 543;
		$y += $d[2];
		$result = $d[0]." ".$m." ".$y;
		return $result; 
	}

	function hpwd($pwd) {
		$options = [
    		'cost' => 11,
    		'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$r = password_hash($pwd, PASSWORD_DEFAULT, $options) ;
		return $r;
	}

	function getLottoName($zone, $rob) {
		global $lang_data;
		global $lot_zone_nrob;
		global $lot_rob;

		$exception_zone = [18, 19];

		if(!in_array($zone, $exception_zone)) {
			$total = $lot_zone_nrob[$zone];
			if($total>1){
				$zone_name = $lang_data["zone_".$zone].$lot_rob[$rob];
			} else {
				$zone_name = $lang_data["zone_".$zone];
			}
		}else {
			$zone_name = $lang_data["zone_".$zone].$lang_data["zone_".$zone."_".$rob];
		}

		return $zone_name;
	}
?>