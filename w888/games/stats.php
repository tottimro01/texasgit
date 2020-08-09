<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

$dnow = date("d-m-Y");
  
$arr_db = array();
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 1 and b_date='$dnow ' order by bet_id desc limit 60");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win"]);
	$arr_data[$i]["win"] = $exv[1];
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/2hit_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); 

###################################################################################################

$arr_db = array();
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 2 and b_date='$dnow ' order by bet_id desc limit 60");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win_score"]);
	if($exv[1]==$exv[2]){
		$arr_data[$i]["win"] = 3;
	}else if($exv[1]>$exv[2]){
		$arr_data[$i]["win"] = 1;
	}else if($exv[1]<$exv[2]){
		$arr_data[$i]["win"] = 2;
	}
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/dragon_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); 

###################################################################################################

$arr_db = array();
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 3 and b_date='$dnow ' order by bet_id desc limit 60");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win_score"]);
	if($exv[1]==$exv[2]){
		$arr_data[$i]["win"] = 3;
	}else if($exv[1]>$exv[2]){
		$arr_data[$i]["win"] = 1;
	}else if($exv[1]<$exv[2]){
		$arr_data[$i]["win"] = 2;
	}
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/bacarat_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); 

###################################################################################################

$arr_db = array();
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 4 and b_date='$dnow ' order by bet_id desc limit 10");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win"]);
	$exvx = explode("," , $value["bet_win_score"]);
	
	$arr_data[$i]["b1"] = $exv[1];
	$arr_data[$i]["b2"] = $exv[2];
	$arr_data[$i]["b3"] = $exv[3];
	
	$arr_data[$i]["win"] = $exvx[1];
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/hilo_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); 

###################################################################################################

$arr_db = array();
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 5 and b_date='$dnow ' order by bet_id desc limit 10");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win"]);
	$exvx = explode("," , $value["bet_win_score"]);
	
	$arr_data[$i]["b1"] = $exv[1];
	$arr_data[$i]["b2"] = $exv[2];
	$arr_data[$i]["b3"] = $exv[3];
	
	$arr_data[$i]["win"] = $exvx[1];
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/fish_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); 

###################################################################################################
?>