<?
if($hack[0]==$hack[1] and $hack[0]==$hack[2] and $hack[0]==$hack[3] and $hack[0]==$hack[4] and $hack[0]==$hack[5] and $hack[0]==$hack[6] and $hack[0]==$hack[7]){

	$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
	$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
	$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	
}else{
	arsort($hack);
	$i=0;
	foreach ($hack as $key => $val) {
		if($i<3){
			if($val>0){
				$arr[] = $key;
			}
		}
		$i++;
	}
	print_r($arr);
	echo "<br><br>";

   if(($arr[0]!=8 and $arr[2]!=7) or ($arr[0]!=7 and $arr[2]!=8)){
		//1อะไรก็ได้ยกเว้นต่ำ/สูง
		//2อะไรก็ได้
		//3อะไรก็ได้ยกเว้นต่ำ/สูง
		//no_num($arr[0],$arr[2]);
		echo "ออกอะไรก็ได้โดยที่ไม่มีเลข $arr[0] และ $arr[2]<br>";
		$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
		unset($ex_sc1[$arr[0]]);
		unset($ex_sc1[$arr[2]]);
		$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
		unset($ex_sc2[$arr[0]]);
		unset($ex_sc2[$arr[2]]);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
		unset($ex_sc3[$arr[0]]);
		unset($ex_sc3[$arr[2]]);
	}else{
		$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
		$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	}
}

?>