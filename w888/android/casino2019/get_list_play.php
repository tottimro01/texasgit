<?php
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$lang = $_POST['lang'];
		$mid = $_POST['mid'];
		$index = 0;
		$arr = array();

		$arrBet = array(1 => "มังกร","เสือ","เสมอกัน");
		for ($i=0; $i < 20; $i++) {
			$typeWin = rand(1,3);
			$arr[$index]["id_bill"] = "000000".$i;
			$arr[$index]["type_game"] = 1;//เกมส์ไพ่มังกรปะทะเสือ
			$arr[$index]["type_win"] = $typeWin;//1 มังกร , 2 เสือชนะ , 3 เสมอกัน
			$arr[$index]["amount"] = 10000;
			$arr[$index]["number_game"] = "DT-999";
			$arr[$index]["bet"] = $arrBet[$typeWin];
			$arr[$index]["date"] = "18/06/2019 13:00:00";
			$arr[$index]["win_lose"] = (($typeWin != 1) ? 20000 : -10000);
			$arr[$index]["result"] = (($typeWin != 1) ? $arrBet[$typeWin] : "เสือ");
			$index++;
		}

		$arrBet = array(1 => "ผู้เล่น","เจ้ามือ","เสมอกัน","ต่ำ","ผู้เล่นไพ่คู่","เจ้ามือไพ่คู่","สูง");
		for ($i=0; $i < 20; $i++) {
			$typeWin = rand(1,7);
			$arr[$index]["id_bill"] = "000000".$i;
			$arr[$index]["type_game"] = 2;//เกมส์บาคาร่า
			$arr[$index]["type_win"] = $typeWin;//1 ผู้เล่น , 2 เจ้ามือ , 3 เสมอกัน ,4 ต่ำ, 5 ผู้เล่นไพ่คู่ , 6 เจ้ามือไพ่คู่ , 7 สูง
			$arr[$index]["amount"] = 10000;
			$arr[$index]["number_game"] = "BAC-888";
			$arr[$index]["bet"] = $arrBet[$typeWin];
			$arr[$index]["date"] = "18/06/2019 12:00:00";
			$arr[$index]["win_lose"] = (($typeWin != 3) ? 20000 : -10000);
			$arr[$index]["result"] = (($typeWin != 3) ? $arrBet[$typeWin] : "ผู้เล่น");
			$index++;
		}

		$arrBet = array(1 => "เต็ง1","เต็ง2","เต็ง3","เต็ง4","เต็ง5","เต็ง6","ต่ำ","สูง","5ต่ำ","6ต่ำ",
		"11ไฮโล","โต๊ด1*5","โต๊ด1*6","โต๊ด2*5","โต๊ด4*5*6","โต๊ด3*6","โต๊ด2*4","โต๊ด3*5",
		"โต๊ด4*1","โต๊ด1*2*3","โต๊ด5*2","โต๊ด6*1","โต๊ด6*2");
		$arrResult = array(1 => "1,1,1","2,2,2","3,3,3","4,4,4","5,5,5","6,6,6","1,2,3","4,5,6","1,2,5","1,2,6",
		"1,4,6","1,5,6","1,2,6","1,2,5","4,5,6","1,3,6","2,3,4","3,4,5",
		"4,3,1","1,2,3","5,3,2","6,5,1","6,5,2");
		for ($i=0; $i < 20; $i++) {
			$typeWin = rand(1,23);
			$arr[$index]["id_bill"] = "000000".$i;
			$arr[$index]["type_game"] = 3;//เกมส์ไฮโล
			$arr[$index]["type_win"] = $typeWin;
			$arr[$index]["amount"] = 10000;
			$arr[$index]["number_game"] = "SIC-777";
			$arr[$index]["bet"] = $arrBet[$typeWin];
			$arr[$index]["date"] = "17/06/2019 12:00:00";
			$arr[$index]["win_lose"] = ((($typeWin != 1) && ($typeWin != 4) && ($typeWin != 6)) ? 20000 : -10000);
			$arr[$index]["result"] = ((($typeWin != 1) && ($typeWin != 4) && ($typeWin != 6)) ? $arrResult[$typeWin] : "5,5,5");//Type Win
			$index++;
		}

		$arrBet = array(1 => "1","2","3","4","5","6","7","8","9","10",
										"11","12","13","14","15","16","17","18","19","20",
										"21","22","23","24","25","26","27","28","29","30",
										"31","32","33","34","35","36","1*2","2*3","4*5","5*6",
										"7*8","8*9","10*11","11*12","13*14","14*15","16*17","17*18","19*20","20*21",
										"22*23","23*24","25*26","26*24","28*29","29*30","31*32","32*33","34*35","35*36",
										"1*4","2*5","3*6","4*7","5*8","6*9","7*10","8*11","9*12","10*13",
										"11*14","12*15","13*16","14*17","15*18","16*19","17*20","18*21","19*22","20*23",
										"21*24","22*25","23*26","24*27","25*28","26*29","27*30","28*31","29*32","30*33",
										"31*34","32*35","33*36","1*2*3","4*5*6","7*8*9","10*11*12","13*14*15","16*17*18","19*20*21",
										"22*23*24","25*26*27","28*29*30","31*32*33","34*35*36","1*2*4*5","2*3*5*6","4*5*7*8","5*6*8*9","7*8*10*11",
										"8*9*11*12","10*11*13*14","11*12*14*15","13*14*16*17","14*15*17*18","16*17*19*20","17*18*20*21","19*20*22*23","20*21*23*24","22*23*25*26",
										"23*24*26*27","25*26*28*29","26*27*29*30","28*29*31*32","29*30*32*33","31*32*34*35","32*33*35*36","1*2*3*4*5*6","4*5*6*7*8*9","7*8*9*10*11*12",
										"10*11*12*13*14*15","13*14*15*16*17*18","16*17*18*19*20*21","19*20*21*22*23*24","22*23*24*25*26*27","25*26*27*28*29*30","28*29*23*31*32*33","31*32*33*34*35*36","00","0",
										"00*2*3","0*1*2","0*1*2*3","แดง","ดำ","คี่","คู่","1ถึง18","19ถึง36","1ถึง12",
										"13ถึง24","25ถึง36","2ถึง1 แถว1","2ถึง1 แถว2","2ถึง1 แถว3");
		for ($i=0; $i < 100; $i++) {
			$typeWin = rand(1,155);
			$arr[$index]["id_bill"] = "000000".$i;
			$arr[$index]["type_game"] = 4;//เกมส์รูเล็ต
			$arr[$index]["type_win"] = $typeWin;
			$arr[$index]["amount"] = 10000;
			$arr[$index]["number_game"] = "ROU-666";
			$arr[$index]["bet"] = $arrBet[$typeWin];
			$arr[$index]["date"] = "17/06/2019 12:00:00";
			$arr[$index]["win_lose"] = ((($typeWin != 1) && ($typeWin != 4) && ($typeWin != 6)) ? 20000 : -10000);
			$arr[$index]["result"] = ((($typeWin != 1) && ($typeWin != 4) && ($typeWin != 6)) ? $typeWin : "0");
			$index++;
		}


		$arrBet = array(1 => "น้ำเต้า","ปู","ปลา","เสือ","กุ้ง","ไก่");
		$arrResult = array(1 => "1,2,3","2,3,4","3,4,5","4,5,6","5,5,6","6,6,6");
		for ($i=0; $i < 20; $i++) {
			$typeWin = rand(1,6);
			$arr[$index]["id_bill"] = "000000".$i;
			$arr[$index]["type_game"] = 5;//เกมส์น้ำเต้าปูปลา
			$arr[$index]["type_win"] = $typeWin;
			$arr[$index]["amount"] = 10000;
			$arr[$index]["number_game"] = "YU-555";
			$arr[$index]["bet"] = $arrBet[$typeWin];
			$arr[$index]["date"] = "19/06/2019 13:00:00";
			$arr[$index]["win_lose"] = (($typeWin != 1) ? 20000 : -10000);
			$arr[$index]["result"] = (($typeWin != 1) ? $arrResult[$typeWin] : "2,2,2");//Type Win
			$index++;
		}
	echo json_encode($arr);

?>