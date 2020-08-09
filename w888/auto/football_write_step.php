<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');

############################################################### สเต็ป
if($_GET[rob]!=""){$new_rob=$_GET[rob];
}else{$new_rob=_rob();}

if($_GET[d]!=""){$view_date=$_GET[d];}
else{$view_date=_bdate();}


if($new_rob==1){
$sql="update bom_tb_config set   c_number=1   where con_id=1";
sql_query($sql);
$sql="update bom_tb_data_football_step set   b_numcode=''   where b_date='$view_date'     ";
sql_query($sql);
	}


$nn='
';





$txt1='<script type="text/javascript">
var Nt =[];';

$txt2='<? 
$c_data=array();
';

$txt5='<? 
';


$txt8='var code = [];'.$nn;
$txt18='var code_bid = [];'.$nn;

$step;

if($new_rob==1){
$xcode=1;	
	}else{
$sqlqq="select c_number from  bom_tb_config   where con_id=1";
$rerob=sql_array($sqlqq);
$xcode=$rerob[c_number]+1;	
	}

$x=0; 
echo '<br>'.$sql="select * from bom_tb_data_football_step  where    	b_x='1'  and b_date='$view_date'   and b_rob='$new_rob'  and b_date_play>'$time_stam'   order by b_sport desc,  b_top asc,b_zone_id asc, b_top_team asc, b_date_play asc, 	b_id asc, b_add asc";	

$ree=sql_query($sql);
   while($rss=sql_fetch($ree)){
	$step++;
	
	if($rss[b_big]==1){$hh='h';}
	else{$hh='a';}
	

if($rss[b_numcode]=="" or $new_rob==1){

	
if($rss[b_h_hdc]!="" and $rss[b_h_price]>0.00){
$vc1=$xcode++;	
$txt8 .= 'code['.$vc1.'] = 1;'.$nn;
$vc2=$xcode++;	
$txt8 .= 'code['.$vc2.'] = 1;'.$nn;

$txt18 .= 'code_bid['.$vc1.'] = '.$rss[b_id].';'.$nn;
$txt18 .= 'code_bid['.$vc2.'] = '.$rss[b_id].';'.$nn;

	}else{
$vc1='';	
$vc2='';	
		}
		
if($rss[b_g_hdc]!=""  and $rss[b_g_price]>0.00){
$vc3=$xcode++;	
$txt8 .= 'code['.$vc3.'] = 1;'.$nn;
$vc4=$xcode++;	
$txt8 .= 'code['.$vc4.'] =1;'.$nn;

$txt18 .= 'code_bid['.$vc3.'] = '.$rss[b_id].';'.$nn;
$txt18 .= 'code_bid['.$vc4.'] = '.$rss[b_id].';'.$nn;


	}else{
$vc3='';	
$vc4='';	
		}
		
	
$code=$vc1.'+'.$vc2.'+'.$vc3.'+'.$vc4;




}else{
	
#echo"5555<hr>";
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
	

	
echo '<br>'.$sql="update bom_tb_data_football_step set   b_numcode='$code'   where b_id='$rss[b_id]'  and b_date='$view_date'  and b_add='$rss[b_add]'   and b_rob>='$new_rob'   ";
sql_query($sql);


	$mt1=mktime(date("H",$rss[b_date_play]),date("i",$rss[b_date_play])-1,date("s",$rss[b_date_play]),date("m",$rss[b_date_play]),date("d",$rss[b_date_play]),date("Y",$rss[b_date_play]));
	$mt2=mktime(date("H",$rss[b_date_play])+1,date("i",$rss[b_date_play]),date("s",$rss[b_date_play]),date("m",$rss[b_date_play]),date("d",$rss[b_date_play]),date("Y",$rss[b_date_play]));

	$dtime=date("YmdHi",$mt1);
	$live="LIVE ".date("h:iA",$mt2);
	
	
	$b_h_price_2= number_format(_hdc_pay( $rss[b_h_price] , $rss[b_h_percent] ),2);
	$b_g_price_2= number_format(_hdc_pay( $rss[b_g_price] , $rss[b_g_percent] ),2);
	
	$b_1h_price_2= number_format(_hdc_pay( $rss[b_1h_price] , $rss[b_1h_percent] ),2);
	$b_1g_price_2= number_format(_hdc_pay( $rss[b_1g_price] , $rss[b_1g_percent] ),2);
	
	
if($rss[b_h_price]==0.00){
$rss[b_h_hdc]='';	
$rss[b_h_price]='';	
$b_h_price_2='';
}

if($rss[b_g_price]==0.00){
$rss[b_g_hdc]='';	
$rss[b_g_price]='';	
$b_g_price_2='';
}

if($rss[b_1h_price]==0.00){
$rss[b_1h_hdc]='';	
$rss[b_1h_price]='';	
$b_1h_price_2='';
}

if($rss[b_1g_price]==0.00){
$rss[b_1g_hdc]='';	
$rss[b_1g_price]='';	
$b_1g_price_2='';
}
if($rss[b_sport]==1){
$rss[b_statistics]=$rss[b_id];
}

$txt1.='	Nt['.$x.']=["'.$rss[b_id].'","'.$rss[b_add].'","","'.$rss[b_asc].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$dtime.'","'.$live.'","False","0","0","0","0","11","'.$rss[b_h_hdc].'","'.$rss[b_h_price].'","'.$b_h_price_2.'","'.$hh.'","22","'.$rss[b_g_hdc].'","'.$rss[b_g_price].'","'.$b_g_price_2.'","","","","","33","'.$rss[b_1h_hdc].'","'.$rss[b_1h_price].'","'.$b_1h_price_2.'","'.$hh.'","44","'.$rss[b_1g_hdc].'","'.$rss[b_1g_price].'","'.$b_1g_price_2.'","","","","","55","'.$rss[b_koo].'","'.$rss[b_kee].'","'.$code.'","'.$rss[b_sport].'","'.$rss[b_date_play].'","'.$rss[b_tv].'","'.$rss[b_livecenter].'","'.$rss[b_statistics].'"];
';

$txt5.='	$St['.$rss[b_id].']['.$rss[b_add].']=array("'.$rss[b_id].'","'.$rss[b_add].'","","'.$rss[b_asc].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$dtime.'","'.$live.'","False","0","0","0","0","11","'.$rss[b_h_hdc].'","'.$rss[b_h_price].'","'.$b_h_price_2.'","'.$hh.'","22","'.$rss[b_g_hdc].'","'.$rss[b_g_price].'","'.$b_g_price_2.'","","","","","33","'.$rss[b_1h_hdc].'","'.$rss[b_1h_price].'","'.$b_1h_price_2.'","'.$hh.'","44","'.$rss[b_1g_hdc].'","'.$rss[b_1g_price].'","'.$b_1g_price_2.'","","","","","55","'.$rss[b_koo].'","'.$rss[b_kee].'","'.$code.'","'.$rss[b_sport].'","'.$rss[b_date_play].'","'.$rss[b_tv].'","'.$rss[b_livecenter].'","'.$rss[b_statistics].'");
';
	echo "<hr>";
	
	
########################################################################################################

if($vc1!=""){$txt2.='$c_data['.$vc1.']=array("type"=>"1","price1"=>"'.$rss[b_h_price].'","hdc"=>"'.$rss[b_h_hdc].'","b_id"=>"'.$rss[b_id].'","b_add"=>"'.$rss[b_add].'","b_big"=>"'.$rss[b_big].'","b_zone"=>"'.$rss[b_zone].'","b_name_1"=>"'.$rss[b_name_1].'","b_name_2"=>"'.$rss[b_name_2].'","b_date_play"=>"'.$rss[b_date_play].'","b_sport"=>"'.$rss[b_sport].'" );
';}
if($vc2!=""){$txt2.='$c_data['.$vc2.']=array("type"=>"2","price1"=>"'.$b_h_price_2.'","hdc"=>"'.$rss[b_h_hdc].'","b_id"=>"'.$rss[b_id].'","b_add"=>"'.$rss[b_add].'","b_big"=>"'.$rss[b_big].'","b_zone"=>"'.$rss[b_zone].'","b_name_1"=>"'.$rss[b_name_1].'","b_name_2"=>"'.$rss[b_name_2].'","b_date_play"=>"'.$rss[b_date_play].'" ,"b_sport"=>"'.$rss[b_sport].'" );
';}
if($vc3!=""){$txt2.='$c_data['.$vc3.']=array("type"=>"3","price1"=>"'.$rss[b_g_price].'","hdc"=>"'.$rss[b_g_hdc].'","b_id"=>"'.$rss[b_id].'","b_add"=>"'.$rss[b_add].'","b_big"=>"'.$rss[b_big].'","b_zone"=>"'.$rss[b_zone].'","b_name_1"=>"'.$rss[b_name_1].'","b_name_2"=>"'.$rss[b_name_2].'","b_date_play"=>"'.$rss[b_date_play].'" ,"b_sport"=>"'.$rss[b_sport].'" );
';}
if($vc4!=""){$txt2.='$c_data['.$vc4.']=array("type"=>"4","price1"=>"'.$b_g_price_2.'","hdc"=>"'.$rss[b_g_hdc].'","b_id"=>"'.$rss[b_id].'","b_add"=>"'.$rss[b_add].'","b_big"=>"'.$rss[b_big].'","b_zone"=>"'.$rss[b_zone].'","b_name_1"=>"'.$rss[b_name_1].'","b_name_2"=>"'.$rss[b_name_2].'","b_date_play"=>"'.$rss[b_date_play].'" ,"b_sport"=>"'.$rss[b_sport].'");
';}

	




$x++;}


	
$txt1.='	parent.ShowBetListStep(Nt);
</script>';
$txt2.='
?>';
$txt5.='
?>';
	
#	echo $txt1;
	
	
#####################################################################
echo '<br>'.$sql="update bom_tb_config set   c_number=$xcode   where con_id=1";
sql_query($sql);

write("../json/sport/today/football_step_js.html",$txt1,"w+"); 
write("../json/sport/today/football_step_php.php",$txt5,"w+"); 

write("../json/sport/today/php/data_".$view_date."_".$new_rob.".php",$txt2,"w+"); 

write("../json/sport/today/code.js",$txt8,"w+"); 
write("../json/sport/today/code_bid.js",$txt18,"w+"); 



?>