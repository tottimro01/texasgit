<?php
$arr = array();
for ($i=0; $i <= rand(20,200); $i++) {
	$scoreDra = rand(1,10);
	$scoreTig = rand(1,10);
	if ($scoreDra > $scoreTig) {
		$scoreWin = $scoreDra;
		$typeWin = 1;
	}else if ($scoreDra == $scoreTig) {
		$scoreWin = $scoreDra;
		$typeWin = 2;
	}else if ($scoreDra < $scoreTig) {
		$scoreWin = $scoreTig;
		$typeWin = 3;
	}
	$arr[$i]["score_dra"] = $scoreDra;
	$arr[$i]["score_tig"] = $scoreTig;
	$arr[$i]["score_win"] = $scoreWin;
	$arr[$i]["type_win"] = $typeWin;
}
echo json_encode($arr);
?>
