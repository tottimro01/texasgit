<meta charset="utf-8">
<?php
include('Net/SSH2.php');
include('function.php');


for($xx=0;$xx<count($a_server);$xx++){
$web=str_replace('login.php','token_count.php',$a_web[$xx]);
$data=file_get_contents2($web);
$date_bet = json_decode($data, true);

if($date_bet["sum"] < $row){
header( "location: ".$a_web[$xx]."" );
exit();
}

#echo $date_bet[sum];
#echo "<hr>";
}

?>

