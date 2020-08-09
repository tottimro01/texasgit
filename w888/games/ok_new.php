<?
##################################

		
/*	
$url_filet="json/bet_time.txt";
$bet_time=time();
$js1=array();
$js1[]=array("timex"=>"$bet_time");
$txt11=json_encode($js1);
write($url_filet ,$txt11,"w+"); 
*/



$ok_id=date("ymdHi");
/*
$url_filei="json/bet_id.txt";
$js1=array();
$js1[]=array("id"=>"$ok_id");
$txt11=json_encode($js1);
write($url_filei ,$txt11,"w+"); 
*/
$sql="update bom_tb_config set con_time_games='$time_stam', con_id_games='$ok_id' where con_id=1";
sql_query($sql);

$view_date=date("d-m-Y");

######################################
$sql="INSERT IGNORE INTO  bom_tb_games_bill_play  select * from bom_tb_games_bill_play_live";
sql_query($sql);

$sql="INSERT IGNORE INTO  bom_tb_games_bet  select * from bom_tb_games_bet_live";
sql_query($sql);


$sql="select max(play_id+1) as mm from bom_tb_games_bill_play";
$remax=sql_array($sql);

$sql="TRUNCATE TABLE  bom_tb_games_bill_play_live";
sql_query($sql);
$sql="TRUNCATE TABLE  bom_tb_games_bet_live";
sql_query($sql);


$sql="ALTER TABLE  bom_tb_games_bill_play_live  AUTO_INCREMENT =$remax[mm]";
sql_query($sql);

for($xx=1;$xx<=5;$xx++){
$sql="INSERT IGNORE INTO  bom_tb_games_bet_live  (bet_id,game_zone,b_date) values ('$ok_id','$xx','$view_date')";
sql_query($sql);
}

########################################ยอดแทง
$url_file="2hit/json/count_bet.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="dragon/json/count_bet.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="bacarat/json/count_bet.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="hilo/json/count_bet.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0","8"=>"0","9"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="fish/json/count_bet.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 


########################################ปลอม
$url_file="2hit/json/count_fake.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="dragon/json/count_fake.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="bacarat/json/count_fake.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="hilo/json/count_fake.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0","8"=>"0","9"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="fish/json/count_fake.json";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 


######################################

	
	##################################

#######################################################STATS
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
$sql=sql_query("select * from bom_tb_games_bet  where game_zone = 3 and b_date='$dnow ' order by bet_id desc limit 60");
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
$sql=sql_query("select * from bom_tb_games_bet  where game_zone = 4 and b_date='$dnow ' order by bet_id desc limit 10");
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
#######################################################STATS

?>