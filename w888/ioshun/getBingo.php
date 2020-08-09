<?
	require('../inc/conn.php');
	require('../inc/function.php');
	$date = $_GET["d"];
	$arr = array();
	$i=0;

	$sql="select * from bom_tb_lotto_hun_ok where ok_date = '$date'";
	$red=sql_array($sql);

	$lot_is=json_decode($red["o_number"]);

	for($is=4;$is>=1;$is--){
		$arr[$i]["Trob"] = $lot_rob[$is];
		for($iy=1;$iy<=20;$iy++){

 			$n1 = $lot_is->{"z1_r".$is."_t2u".$iy."i"};
                   		$n2 = $lot_is->{"z1_r".$is."_t2d".$iy."i"};
                    		$n3 = $lot_is->{"z2_r".$is."_t2u".$iy."i"};
                    		$n4 = $lot_is->{"z2_r".$is."_t2d".$iy."i"};

			$arr[$i]["Ti".$iy] = $iy."i";
			$arr[$i]["T9i".$iy."up"] = (isset($n1)) ? $n1 : '';
			$arr[$i]["T9i".$iy."down"] = (isset($n2)) ? $n2 : '';
			$arr[$i]["TMCi".$iy."up"] = (isset($n3)) ? $n3 : '';
			$arr[$i]["TMCi".$iy."down"] = (isset($n4)) ? $n4 : '';
		}
		$i++;
	}
	
	/*$arr["N3up"] = "123";
	$arr["N2down"] = "12";
	for($i=1;$i<=20;$i++){
		$arr["Ni".$i."up"] = "111";
		$arr["Ni".$i."down"] = "22";
	}*/
	
	echo json_encode($arr);
	exit();
?>