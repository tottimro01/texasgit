<?
##################################

		
		
$url_filet="json/bet_time.txt";
$bet_time=time();
$js1=array();
$js1[]=array("timex"=>"$bet_time");
$txt11=json_encode($js1);
write($url_filet ,$txt11,"w+"); 


$ok_id=date("ymdHi");
$url_filei="json/bet_id.txt";
$js1=array();
$js1[]=array("id"=>"$ok_id");
$txt11=json_encode($js1);
write($url_filei ,$txt11,"w+"); 

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
$url_file="2hit/json/count_bet.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="dragon/json/count_bet.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="bacarat/json/count_bet.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="hilo/json/count_bet.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0","8"=>"0","9"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="fish/json/count_bet.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 


########################################ปลอม
$url_file="2hit/json/count_fake.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="dragon/json/count_fake.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="bacarat/json/count_fake.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="hilo/json/count_fake.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0","8"=>"0","9"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

$url_file="fish/json/count_fake.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 


######################################

	
	##################################
?>