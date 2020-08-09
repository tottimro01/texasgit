<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../inc/conn.php');
require('../inc/function.php');

//$in_put=0;


function write($path, $content, $mode="w+"){
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}

############################################################### สเต็ป
if($_GET[rob]!=""){$new_rob=$_GET[rob];
}else{$new_rob=_rob();}

if($_GET[d]!=""){$vd=$_GET[d];}
else{$vd=_bdate();}


if($new_rob==1){
	if($_GET[rob]==1 and date("Hi",$time_stam)<=1210){
$id_bill=date("y",$time_stam).sprintf("%03d",_asd()).sprintf("%05d",1);

$sql="ALTER TABLE  pha_tb_football_bill AUTO_INCREMENT =$id_bill";
sql_query($sql);

$sql="update pha_tb_member set m_count=m_de_count  where m_shop=2";
sql_query($sql);

	}

$sql="update pha_tb_ball_list set   b_numcode=''   where b_date='$vd'     ";
sql_query($sql);
	}


$nn='
';





$txt1='<script language="JavaScript" type="text/javascript">
var Nt =[];';

$txt5='<? 
';

$txt2='<? 
$c_data=array();
';
$txt8='var code = [];'.$nn;
$txt18='var code_bid = [];'.$nn;
$step;
echo $sql="select * from pha_tb_ball_list where    	b_active='1' and b_step='2' and b_date='$vd'   and b_rob='$new_rob'    order by  b_active desc,b_top asc,b_asc asc, b_top_team asc, b_date_play asc, 	b_id asc, b_add asc";	
$ree=sql_query($sql);

if($new_rob==1){
$xcode=1;	
	}else{
$sqlqq="select c_number from  pha_tb_config   where con_id=1";
$rerob=sql_array($sqlqq);
$xcode=$rerob[c_number]+1;	
	}
//$xcode=1;	



$x=0; while($rss=sql_fetch($ree)){
	$step++;
	if($rss[b_big]==1){$hh='h';}
	else{$hh='a';}
	
	
if($rss[b_numcode]=="" or $new_rob==1){
	
if($rss[b_hdc]!=""){
$vc1=$xcode++;	
$txt8 .= 'code['.$vc1.'] = '.$vc1.';'.$nn;
$vc2=$xcode++;	
$txt8 .= 'code['.$vc2.'] = '.$vc2.';'.$nn;

$txt18 .= 'code_bid['.$vc1.'] = '.$rss[b_id].';'.$nn;
$txt18 .= 'code_bid['.$vc2.'] = '.$rss[b_id].';'.$nn;

	}else{
$vc1='';	$vc2='';	
		}
		
if($rss[b_goal]!=""){
$vc3=$xcode++;	
$txt8 .= 'code['.$vc3.'] = '.$vc3.';'.$nn;
$vc4=$xcode++;	
$txt8 .= 'code['.$vc4.'] = '.$vc4.';'.$nn;

$txt18 .= 'code_bid['.$vc3.'] = '.$rss[b_id].';'.$nn;
$txt18 .= 'code_bid['.$vc4.'] = '.$rss[b_id].';'.$nn;


	}else{
$vc3='';	$vc4='';	
		}
		
	
$code=$vc1.'+'.$vc2.'+'.$vc3.'+'.$vc4;




}else{
	

$code=$rss[b_numcode];
$exc=@explode("+",$code);

$vc1=$exc[0];	
$vc2=$exc[1];	
$vc3=$exc[2];	
$vc4=$exc[3];	

if($vc1>0){$txt8 .= 'code['.$vc1.'] = '.$vc1.';'.$nn;}
if($vc2>0){$txt8 .= 'code['.$vc2.'] = '.$vc2.';'.$nn;}
if($vc3>0){$txt8 .= 'code['.$vc3.'] = '.$vc3.';'.$nn;}
if($vc4>0){$txt8 .= 'code['.$vc4.'] = '.$vc4.';'.$nn;}

if($vc1>0){$txt18 .= 'code_bid['.$vc1.'] = '.$rss[b_id].';'.$nn;}
if($vc2>0){$txt18 .= 'code_bid['.$vc2.'] = '.$rss[b_id].';'.$nn;}
if($vc3>0){$txt18 .= 'code_bid['.$vc3.'] = '.$rss[b_id].';'.$nn;}
if($vc4>0){$txt18 .= 'code_bid['.$vc4.'] = '.$rss[b_id].';'.$nn;}



}
	

	
echo '<br>'.$sql="update pha_tb_ball_list set   b_numcode='$code'   where b_id='$rss[b_id]'  and b_date='$vd'  and b_add='$rss[b_add]'   and b_rob>='$new_rob'   ";
sql_query($sql);
echo '<br>'.$sql="update pha_tb_ball_list_live set   b_numcode='$code'   where b_id='$rss[b_id]'  and b_date='$vd'  and b_add='$rss[b_add]'    ";
sql_query($sql);


	$mt1=mktime(date("H",$rss[b_date_play]),date("i",$rss[b_date_play])-1,date("s",$rss[b_date_play]),date("m",$rss[b_date_play]),date("d",$rss[b_date_play]),date("Y",$rss[b_date_play]));
	$mt2=mktime(date("H",$rss[b_date_play])+1,date("i",$rss[b_date_play]),date("s",$rss[b_date_play]),date("m",$rss[b_date_play]),date("d",$rss[b_date_play]),date("Y",$rss[b_date_play]));

	$dtime=date("YmdHi",$mt1);
	$live="LIVE ".date("h:iA",$mt2);

$txt1.='	Nt['.$x.']=["'.$rss[b_id].'","'.$rss[b_add].'","","'.$rss[b_asc].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$dtime.'","'.$live.'","False","0","0","0","0","11","'.$rss[b_hdc].'","'.$rss[b_hdc_1].'","'.$rss[b_hdc_2].'","'.$hh.'","22","'.$rss[b_goal].'","'.$rss[b_goal_1].'","'.$rss[b_goal_2].'","","","","","33","'.$rss[b_h_hdc].'","'.$rss[b_h_hdc_1].'","'.$rss[b_h_hdc_2].'","'.$hh.'","44","'.$rss[b_h_goal].'","'.$rss[b_h_goal_1].'","'.$rss[b_h_goal_2].'","","","","","55","'.$rss[b_koo].'","'.$rss[b_kee].'","'.$code.'"];
';

$txt5.='	$St['.$rss[b_id].']['.$rss[b_add].']=array("'.$rss[b_id].'","'.$rss[b_add].'","","'.$rss[b_asc].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$dtime.'","'.$live.'","False","0","0","0","0","11","'.$rss[b_hdc].'","'.$rss[b_hdc_1].'","'.$rss[b_hdc_2].'","'.$hh.'","22","'.$rss[b_goal].'","'.$rss[b_goal_1].'","'.$rss[b_goal_2].'","","","","","33","'.$rss[b_h_hdc].'","'.$rss[b_h_hdc_1].'","'.$rss[b_h_hdc_2].'","'.$hh.'","44","'.$rss[b_h_goal].'","'.$rss[b_h_goal_1].'","'.$rss[b_h_goal_2].'","","","","","55","'.$rss[b_koo].'","'.$rss[b_kee].'","'.$code.'");
';
	echo "<hr>";
########################################################################################################
########################################################################################################
$cv5=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 5);
$cv10=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 10);
$cv20=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 20);
$cv30=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 30);

$cn5=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 5);
$cn10=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 10);
$cn20=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 20);
$cn30=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 30);


if($vc1!=""){$txt2.='$c_data['.$vc1.']=array("1","'.$rss[b_hdc_1].'","'.$rss[b_hdc].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'" ,"h5"=>"'.$cv5[hdc1].'","h10"=>"'.$cv10[hdc1].'","h20"=>"'.$cv20[hdc1].'","h30"=>"'.$cv30[hdc1].'");
';}
if($vc2!=""){$txt2.='$c_data['.$vc2.']=array("2","'.$rss[b_hdc_2].'","'.$rss[b_hdc].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'"  ,"h5"=>"'.$cv5[hdc2].'","h10"=>"'.$cv10[hdc2].'","h20"=>"'.$cv20[hdc2].'","h30"=>"'.$cv30[hdc2].'");
';}
if($vc3!=""){$txt2.='$c_data['.$vc3.']=array("3","'.$rss[b_goal_1].'","'.$rss[b_goal].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'"  ,"h5"=>"'.$cn5[hdc1].'","h10"=>"'.$cn10[hdc1].'","h20"=>"'.$cn20[hdc1].'","h30"=>"'.$cn30[hdc1].'");
';}
if($vc4!=""){$txt2.='$c_data['.$vc4.']=array("4","'.$rss[b_goal_2].'","'.$rss[b_goal].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'"  ,"h5"=>"'.$cn5[hdc2].'","h10"=>"'.$cn10[hdc2].'","h20"=>"'.$cn20[hdc2].'","h30"=>"'.$cn30[hdc2].'");
';}




$x++;}



	
	
$sql="update pha_tb_config set   c_number=$xcode   where con_id=1";
sql_query($sql);
	
	
$txt1.='	parent.ShowBetListStep(Nt);
</script>';
$txt5.='
	?>';
$txt2.='
?>';
//sleep(1);

#@unlink("last/".$vd."_".$new_rob.".php");
#@unlink("php/data_".$vd."_".$new_rob.".php");


#write("soccer_datastep.php",$txt1,"w+"); 
#write("last/".$vd."_".$new_rob.".php",$txt1,"w+"); 
#write("soccer_datastep2.php",$txt5,"w+"); 
#write("php/data_".$vd."_".$new_rob.".php",$txt2,"w+"); 
#write("../txt/_data_step.txt",$step,"w+"); 	
#write("code.js",$txt8,"w+"); 
#write("code_bid.js",$txt18,"w+"); 


/*
######################################FTP######################################################
     $txt_file="../data/last/".$vd."_".$new_rob.".php";
     $local_file = "../data/last/".$vd."_".$new_rob.".php"; // Defines Name of Local File to be Uploaded
    $destination_file = "last/".basename($txt_file);  // Path for File Upload (relative to your login dir)

	
    // Global Connection Settings
    $ftp_server = "ftp.laolot.com";      // FTP Server Address (exlucde ftp://)
    $ftp_user_name = "laolot@bom9.com";     // FTP Server Username
    $ftp_user_pass = "963214785";      // Password
    // Connect to FTP Server
    $conn_id = ftp_connect($ftp_server);
    // Login to FTP Server
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    // Verify Log In Status
    if ((!$conn_id) || (!$login_result)) {
        exit;
    } 

    $upload = ftp_put($conn_id, $destination_file, $local_file, FTP_BINARY);  // Upload the File
    ftp_close($conn_id); // Close the FTP Connection
######################################FTP######################################################	
*/
?>