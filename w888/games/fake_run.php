<?
require('../inc/conn.php');
require('../inc/function.php');

  
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
	exit();
	}
	
$bet_time=$rec['con_time_games'];
$new_time=(40)-($time_stam-$bet_time);



if($new_time>0 and $new_time<38){	
	
	
$ex_bethit1 = array("10","20","30","40","0","10","20","0","10","30","0","10","0","10","40","30","0","50","60","70","0","20","10","0","10","0","80","90","100","0","40","30");
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);

$ex_bethit2 = array("0","0","0","0","0","10","20","0","0","0","0","30","40","50","0","0","0","0","20","70","0","0","0","0","0","80","20","0","0","0","0","100","0","0","0","0","0","0");
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);

$ex_bethit3 = array("0","0","0","0","0","0","0","10","20","0","0","0","0","0","0","0","0","0","0","0","0","10","40","10","0","0","0","0","0","0","0","0","0","0","20","10","0","0","0","0","0","20","10","20","0","0","0","0","0");
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);


 $url_file="2hit/json/count_fake.json";
$date3_js=file_get_contents2($url_file);
$date3_bet = json_decode($date3_js, true);

$rand1=$date3_bet[0][1]+$ex_bethit1[1];
$rand2=$date3_bet[0][2]+$ex_bethit1[2];

######################Write
$js1=array();
$js1[]=array("1"=>"$rand1","2"=>"$rand2");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 




$ex_bethit1 = array("10","20","30","40","0","10","20","0","0","30","0","0","0","10","0","0","0","50","60","70","0","0","10","0","0","0","80","90","100","0","40","0");
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);

$ex_bethit2 = array("0","0","0","0","0","10","20","0","0","0","0","30","40","50","0","0","0","0","20","70","0","0","0","0","0","80","20","0","0","0","0","100","0","0","0","0","0","0");
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);

$ex_bethit3 = array("0","0","0","0","0","0","0","10","20","0","0","0","0","0","0","0","0","0","0","0","0","10","40","10","0","0","0","0","0","0","0","0","0","0","20","10","0","0","0","0","0","20","10","20","0","0","0","0","0");
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);



 $url_file="dragon/json/count_fake.json";
$date3_js=file_get_contents2($url_file);
$date3_bet = json_decode($date3_js, true);

$rand1=$date3_bet[0][1]+$ex_bethit1[3];
$rand2=$date3_bet[0][2]+$ex_bethit1[4];
$rand3=$date3_bet[0][3]+$ex_bethit3[5];

######################Write
$js1=array();
$js1[]=array("1"=>"$rand1","2"=>"$rand2","3"=>"$rand3");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 



$ex_bethit1 = array("10","20","30","40","0","10","20","0","0","30","0","0","0","10","0","0","0","50","60","70","0","0","10","0","0","0","80","90","100","0","40","0");
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);

$ex_bethit2 = array("0","0","0","0","0","10","20","0","0","0","0","30","40","50","0","0","0","0","20","70","0","0","0","0","0","80","20","0","0","0","0","100","0","0","0","0","0","0");
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);

$ex_bethit3 = array("0","0","0","0","0","0","0","10","20","0","0","0","0","0","0","0","0","0","0","0","0","10","40","10","0","0","0","0","0","0","0","0","0","0","20","10","0","0","0","0","0","20","10","20","0","0","0","0","0");
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);


 $url_file="bacarat/json/count_fake.json";
$date3_js=file_get_contents2($url_file);
$date3_bet = json_decode($date3_js, true);

$rand1=$date3_bet[0][1]+$ex_bethit1[1];
$rand2=$date3_bet[0][2]+$ex_bethit1[2];
$rand3=$date3_bet[0][3]+$ex_bethit3[1];
$rand4=$date3_bet[0][4]+$ex_bethit1[3];
$rand5=$date3_bet[0][5]+$ex_bethit1[4];
$rand6=$date3_bet[0][6]+$ex_bethit3[2];
$rand7=$date3_bet[0][7]+$ex_bethit3[3];

######################Write
$js1=array();
$js1[]=array("1"=>"$rand1","2"=>"$rand2","3"=>"$rand3","4"=>"$rand4","5"=>"$rand5","6"=>"$rand6","7"=>"$rand7");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 






$ex_bethit1 = array("10","20","30","40","0","10","20","0","0","30","0","0","0","10","0","0","0","50","60","70","0","0","10","0","0","0","80","90","100","0","40","0");
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);

$ex_bethit2 = array("0","0","0","0","0","10","20","0","0","0","0","30","40","50","0","0","0","0","20","70","0","0","0","0","0","80","20","0","0","0","0","100","0","0","0","0","0","0");
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);

$ex_bethit3 = array("0","0","0","0","0","0","0","10","20","0","0","0","0","0","0","0","0","0","0","0","0","10","40","10","0","0","0","0","0","0","0","0","0","0","20","10","0","0","0","0","0","20","10","20","0","0","0","0","0");
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);


 $url_file="hilo/json/count_fake.json";
$date3_js=file_get_contents2($url_file);
$date3_bet = json_decode($date3_js, true);

$rand1=$date3_bet[0][1]+$ex_bethit2[1];
$rand2=$date3_bet[0][2]+$ex_bethit2[2];
$rand3=$date3_bet[0][3]+$ex_bethit2[3];
$rand4=$date3_bet[0][4]+$ex_bethit2[4];
$rand5=$date3_bet[0][5]+$ex_bethit2[5];
$rand6=$date3_bet[0][6]+$ex_bethit2[6];
$rand7=$date3_bet[0][7]+$ex_bethit1[7];
$rand8=$date3_bet[0][8]+$ex_bethit1[8];
$rand9=$date3_bet[0][9];

######################Write
$js1=array();
$js1[]=array("1"=>"$rand1","2"=>"$rand2","3"=>"$rand3","4"=>"$rand4","5"=>"$rand5","6"=>"$rand6","7"=>"$rand7","8"=>"$rand8","9"=>"$rand9");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 



$ex_bethit1 = array("10","20","30","40","0","10","20","0","0","30","0","0","0","10","0","0","0","50","60","70","0","0","10","0","0","0","80","90","100","0","40","0");
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);
shuffle($ex_bethit1);

$ex_bethit2 = array("0","0","0","0","0","10","20","0","0","0","0","30","40","50","0","0","0","0","20","70","0","0","0","0","0","80","20","0","0","0","0","100","0","0","0","0","0","0");
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);
shuffle($ex_bethit2);

$ex_bethit3 = array("0","0","0","0","0","0","0","10","20","0","0","0","0","0","0","0","0","0","0","0","0","10","40","10","0","0","0","0","0","0","0","0","0","0","20","10","0","0","0","0","0","20","10","20","0","0","0","0","0");
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);
shuffle($ex_bethit3);


 $url_file="fish/json/count_fake.json";
$date3_js=file_get_contents2($url_file);
$date3_bet = json_decode($date3_js, true);

$rand1=$date3_bet[0][1]+$ex_bethit2[1];
$rand2=$date3_bet[0][2]+$ex_bethit2[2];
$rand3=$date3_bet[0][3]+$ex_bethit2[3];
$rand4=$date3_bet[0][4]+$ex_bethit2[4];
$rand5=$date3_bet[0][5]+$ex_bethit2[5];
$rand6=$date3_bet[0][6]+$ex_bethit2[6];


######################Write
$js1=array();
$js1[]=array("1"=>"$rand1","2"=>"$rand2","3"=>"$rand3","4"=>"$rand4","5"=>"$rand5","6"=>"$rand6");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 


}



#########################ล้าง
/*
if($new_time<(-5)){	

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

}
*/
?>