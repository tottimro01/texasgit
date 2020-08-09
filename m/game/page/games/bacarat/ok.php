<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
  

 

  $url_filec="json/bacarat_close.txt";
$date2_jsc=file_get_contents2($url_filec);
$date2_betc = json_decode($date2_jsc, true);
$bet_close=$date2_betc[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
	
	
$url_filet="json/bacarat_time.txt";
$date2_jst=file_get_contents2($url_filet);
$date2_bett = json_decode($date2_jst, true);
$bet_time=$date2_bett[0][timex];
$new_time=(90)-(time()-$bet_time);




if($new_time<=0){
	echo'หมดเวลา';
	}else{
	echo $new_time;	
}
		
		
		
	
####################เขียนเกมส์ใหม่	
if( $new_time==(-17)  or  $new_time==(-18)  or $new_time==(-19) or $new_time==(-20)){
	
if($_SESSION[process_new]==0){
	
$bet_time=time();
$js1=array();
$js1[]=array("timex"=>"$bet_time");
$txt11=json_encode($js1);
write($url_filet ,$txt11,"w+"); 

$ok_id=date("ymdHi");
_id($ok_id);
_new();
$_SESSION[process_ok]=0;
$_SESSION[process_new]=1;
}
}




function _id($ok_id){
#$ok_id=date("ymdHi");

$sql="INSERT IGNORE INTO   pha_tb_casino_bet (bet_id,bet_date ) values('$ok_id',now()) ";
sql_query($sql);

$url_filei="json/bacarat_id.txt";
$js1=array();
$js1[]=array("id"=>"$ok_id");
$txt11=json_encode($js1);
write($url_filei ,$txt11,"w+"); 

#$del_xx=time()-(60*60*5);
#$sql="delete from pha_tb_casino_bet where bet_date like '%'";
}



function _new(){
	
	
$url_filew="json/bacarat_win.txt";
$ok1='baca';
$ok2='baca';
$ok3='baca';
$ok4='baca';
$js1=array();
$js1[]=array("1"=>"$ok1","2"=>"$ok2");
$js1[]=array("3"=>"$ok3","4"=>"$ok4");
$txt11=json_encode($js1);
write($url_filew ,$txt11,"w+"); 

$url_fileu="json/bacarat_count.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0");
$txt11=json_encode($js1);
write($url_fileu ,$txt11,"w+"); 

$url_fileb="json/bacarat_bet.txt";
$js1=array();
$js1[]=array("1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0");
$txt11=json_encode($js1);
write($url_fileb ,$txt11,"w+"); 
	$sql="update pha_tb_config set  con_ba_bingo_1='',con_ba_bingo_2='',con_ba_bingo_3='',con_ba_bingo_4=''   where con_id=1 ";
	sql_query($sql);
}





##########################ออกผล
if($new_time==(-1) or $new_time==(-2) or $new_time==(-3)   or $new_time==(-4)){
	
if($_SESSION[process_ok]==0){
echo'<script>_process();</script>';
}

$_SESSION[process_new]=0;
$_SESSION[process_ok]=1;
}





?>