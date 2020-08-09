<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

// require("lang/th.php");
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

$check_url2="bum88.com";
$check_url3="beyourmoney.com";

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url2   ) and !strstr($_SERVER['HTTP_REFERER'],   $check_url3   )){ exit();}

$_SESSION['HTTP_REFERER'] =$_SERVER['HTTP_REFERER'];

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: OHOKING :::</TITLE>
</head>

<body>

<?
#$_POST[rid]=111;
$_POST[txt_phone]=trim($_POST[txt_phone]);
$_POST[txt_bank_number]=trim($_POST[txt_bank_number]);

 $sql="select * from  bom_tb_member where     (m_phone='$_POST[txt_phone]' or m_b_code='$_POST[txt_bank_number]')";
$rex=sql_array($sql);

if($rex[m_id]!=""){
echo"<script language='JavaScript'>alert('".$lang_member[85]."');</script>";	
 echo"<script language='JavaScript'> top.document.location='".$_SERVER['HTTP_REFERER']."';</script>";
     exit();
}


$sql="select * from  bom_tb_agent where     r_id='$_POST[rid]'";
$rer=sql_array($sql);


$r_agent_id=$rer[r_agent_id].$rer[r_id].'*';

$exopen=explode(",",$rer[r_open]);
$r_step_dis=explode(",",$rer[r_step_dis]);
$r_step2=explode(",",$rer[r_step2]);

$r_min=explode(",",$rer[r_min]);
$r_max=explode(",",$rer[r_max]);
$r_max_match=explode(",",$rer[r_max_match]);

$ball_share=explode(",",$rer[r_share]);
$ball_share_live=explode(",",$rer[r_share_live]);
$ball_force=explode(",",$rer[r_force]);
$ball_com=explode(",",$rer[r_com]);
$r_nam_tor=explode(",",$rer[r_nam_tor]);
$r_nam_rong=explode(",",$rer[r_nam_rong]);
$r_nam_tor_live=explode(",",$rer[r_nam_tor_live]);
$r_nam_rong_live=explode(",",$rer[r_nam_rong_live]);


$lot_pay=explode(",",$rer[r_lotto_pay_agent]);
$lot_dis=explode(",",$rer[r_lotto_dis_agent]);
$lot_share=explode(",",$rer[r_lotto_share]);
$r_lotto_force=explode(",",$rer[r_lotto_force_agent]);

$lot_min=explode(",",$rer[r_lotto_min]);
$lot_max=explode(",",$rer[r_lotto_max]);
$lot_nummax=explode(",",$rer[r_lotto_nummax]);

$lot_hun_pay=explode(",",$rer[r_lotto_hun_pay_agent]);
$lot_hun_dis=explode(",",$rer[r_lotto_hun_dis_agent]);
$lot_hun_share=explode(",",$rer[r_lotto_hun_share]);
$r_lotto_hun_force=explode(",",$rer[r_lotto_hun_force_agent]);

$lot_hun_min=explode(",",$rer[r_lotto_hun_min]);
$lot_hun_max=explode(",",$rer[r_lotto_hun_max]);
$lot_hun_nummax=explode(",",$rer[r_lotto_hun_nummax]);

$abig=explode("*",$r_agent_id);


################Config Agent
$lot_pay_big1=explode(",",$rer[r_lotto_pay_agent]);
$lot_hun_pay_big1=explode(",",$rer[r_lotto_hun_pay_agent]);




if($_POST[rid]!=""){

#$sql="select m_id from  bom_tb_member where r_agent_id like '%*$_POST[rid]*%'   order by m_id desc limit 1";
$sql="select m_id from  bom_tb_member where r_agent_id like '%*$_POST[rid]*%' ";
$num2=sql_num($sql);
	
#$user=$rer[r_user].($rem2[m_id]+1);
if($_POST[rid]==111){
$user='bum'.($num2+1);
}else{
$user='be'.($num2+1);
	}

$open='open,'.intval($_POST[tbet_ball]).','.intval($_POST[tbet_muay]).','.intval($_POST[tbet_step]).','.intval($_POST[tbet_sport]).','.intval($_POST[tbet_lot]).','.intval($_POST[tbet_games]).','.intval($_POST[tbet_casino]).','.intval($_POST[ttype]).','.intval($_POST[tbet_lothun]);
$_POST[txt_sms]=md5(trim($_POST[txt_sms]));
#$_POST[tcount]=intval(str_replace(",","",$_POST[tcount]));	

$tmaxmatch='max,'.intval(str_replace(",","",$_POST[tball_math])).','.intval(str_replace(",","",$_POST[tmuay_math])).','.intval(str_replace(",","",$_POST[tstep_math])).','.intval(str_replace(",","",$_POST[tsport_math]));
$tmax='max,'.intval(str_replace(",","",$_POST[tball_max])).','.intval(str_replace(",","",$_POST[tmuay_max])).','.intval(str_replace(",","",$_POST[tstep_max])).','.intval(str_replace(",","",$_POST[tsport_max]));
$tmin='min,'.intval(str_replace(",","",$_POST[tball_min])).','.intval(str_replace(",","",$_POST[tmuay_min])).','.intval(str_replace(",","",$_POST[tstep_min])).','.intval(str_replace(",","",$_POST[tsport_min]));

$tcom='com,'.(str_replace(",","",$_POST[tball_com])).','.(str_replace(",","",$_POST[tmuay_com])).','.(str_replace(",","",$_POST[tsport_com]));

$share='share,'.intval(str_replace(",","",$_POST[tball_share])).','.intval(str_replace(",","",$_POST[tmuay_share])).','.intval(str_replace(",","",$_POST[tstep_share])).','.intval(str_replace(",","",$_POST[tsport_share]));
$sharelive='share,'.intval(str_replace(",","",$_POST[tball_share_live])).','.intval(str_replace(",","",$_POST[tmuay_share_live])).','.intval(str_replace(",","",$_POST[tstep_share_live])).','.intval(str_replace(",","",$_POST[tsport_share_live]));

$tstepdis='dis,0,'.intval($_POST[tbet_dis2]).','.intval($_POST[tbet_dis3]).','.intval($_POST[tbet_dis4]).','.intval($_POST[tbet_dis5]).','.intval($_POST[tbet_dis6]).','.intval($_POST[tbet_dis7]).','.intval($_POST[tbet_dis7]).','.intval($_POST[tbet_dis7]).','.intval($_POST[tbet_dis7]);
#$step2=intval($_POST[tbet_ball]).','.intval($_POST[tbet_muay]);
$step2=$rer[r_step2];

$namtor='tor,'.intval($_POST[tball_tor]).','.intval($_POST[tmuay_tor]).','.intval($_POST[tsport_tor]);
$namrong='rong,'.intval($_POST[tball_rong]).','.intval($_POST[tmuay_rong]).','.intval($_POST[tsport_rong]);

####################LOTTO
$lotpay='pay,'.($_POST[lot_pay1]).','.($_POST[lot_pay2]).','.($_POST[lot_pay3]).','.($_POST[lot_pay4]).','.($_POST[lot_pay5]).','.($_POST[lot_pay6]).','.($_POST[lot_pay7]).','.($_POST[lot_pay8]).','.($_POST[lot_pay9]).','.($_POST[lot_pay10]).','.($_POST[lot_pay11]).','.($_POST[lot_pay12]).','.($_POST[lot_pay13]).','.($_POST[lot_pay14]).','.($_POST[lot_pay15]).','.($_POST[lot_pay16]).','.($_POST[lot_pay17]).','.($_POST[lot_pay18]).','.($_POST[lot_pay19]).','.($_POST[lot_pay20]).','.($_POST[lot_pay21]).','.($_POST[lot_pay22]).','.($_POST[lot_pay23]).','.($_POST[lot_pay24]).','.($_POST[lot_pay25]);

$lotdis='dis,'.($_POST[lot_dis1]).','.($_POST[lot_dis2]).','.($_POST[lot_dis3]).','.($_POST[lot_dis4]).','.($_POST[lot_dis5]).','.($_POST[lot_dis6]).','.($_POST[lot_dis7]).','.($_POST[lot_dis8]).','.($_POST[lot_dis9]).','.($_POST[lot_dis10]).','.($_POST[lot_dis11]).','.($_POST[lot_dis12]).','.($_POST[lot_dis13]).','.($_POST[lot_dis14]).','.($_POST[lot_dis15]).','.($_POST[lot_dis16]).','.($_POST[lot_dis17]).','.($_POST[lot_dis18]).','.($_POST[lot_dis19]).','.($_POST[lot_dis20]).','.($_POST[lot_dis21]).','.($_POST[lot_dis22]).','.($_POST[lot_dis23]).','.($_POST[lot_dis24]).','.($_POST[lot_dis25]);

$lotmin='min,'.intval(str_replace(',','',$_POST[tlot_min1])).','.intval(str_replace(',','',$_POST[tlot_min2])).','.intval(str_replace(',','',$_POST[tlot_min3])).','.intval(str_replace(',','',$_POST[tlot_min4])).','.intval(str_replace(',','',$_POST[tlot_min5])).','.intval(str_replace(',','',$_POST[tlot_min6])).','.intval(str_replace(',','',$_POST[tlot_min7])).','.intval(str_replace(',','',$_POST[tlot_min8])).','.intval(str_replace(',','',$_POST[tlot_min9])).','.intval(str_replace(',','',$_POST[tlot_min10])).','.intval(str_replace(',','',$_POST[tlot_min11])).','.intval(str_replace(',','',$_POST[tlot_min12])).','.intval(str_replace(',','',$_POST[tlot_min13])).','.intval(str_replace(',','',$_POST[tlot_min14])).','.intval(str_replace(',','',$_POST[tlot_min15])).','.intval(str_replace(',','',$_POST[tlot_min16])).','.intval(str_replace(',','',$_POST[tlot_min17])).','.intval(str_replace(',','',$_POST[tlot_min18])).','.intval(str_replace(',','',$_POST[tlot_min19])).','.intval(str_replace(',','',$_POST[tlot_min20])).','.intval(str_replace(',','',$_POST[tlot_min21])).','.intval(str_replace(',','',$_POST[tlot_min22])).','.intval(str_replace(',','',$_POST[tlot_min23])).','.intval(str_replace(',','',$_POST[tlot_min24])).','.intval(str_replace(',','',$_POST[tlot_min25]));

$lotmax='max,'.intval(str_replace(',','',$_POST[tlot_max1])).','.intval(str_replace(',','',$_POST[tlot_max2])).','.intval(str_replace(',','',$_POST[tlot_max3])).','.intval(str_replace(',','',$_POST[tlot_max4])).','.intval(str_replace(',','',$_POST[tlot_max5])).','.intval(str_replace(',','',$_POST[tlot_max6])).','.intval(str_replace(',','',$_POST[tlot_max7])).','.intval(str_replace(',','',$_POST[tlot_max8])).','.intval(str_replace(',','',$_POST[tlot_max9])).','.intval(str_replace(',','',$_POST[tlot_max10])).','.intval(str_replace(',','',$_POST[tlot_max11])).','.intval(str_replace(',','',$_POST[tlot_max12])).','.intval(str_replace(',','',$_POST[tlot_max13])).','.intval(str_replace(',','',$_POST[tlot_max14])).','.intval(str_replace(',','',$_POST[tlot_max15])).','.intval(str_replace(',','',$_POST[tlot_max16])).','.intval(str_replace(',','',$_POST[tlot_max17])).','.intval(str_replace(',','',$_POST[tlot_max18])).','.intval(str_replace(',','',$_POST[tlot_max19])).','.intval(str_replace(',','',$_POST[tlot_max20])).','.intval(str_replace(',','',$_POST[tlot_max21])).','.intval(str_replace(',','',$_POST[tlot_max22])).','.intval(str_replace(',','',$_POST[tlot_max23])).','.intval(str_replace(',','',$_POST[tlot_max24])).','.intval(str_replace(',','',$_POST[tlot_max25]));

$lotnummax='max,'.intval(str_replace(',','',$_POST[tlot_nummax1])).','.intval(str_replace(',','',$_POST[tlot_nummax2])).','.intval(str_replace(',','',$_POST[tlot_nummax3])).','.intval(str_replace(',','',$_POST[tlot_nummax4])).','.intval(str_replace(',','',$_POST[tlot_nummax5])).','.intval(str_replace(',','',$_POST[tlot_nummax6])).','.intval(str_replace(',','',$_POST[tlot_nummax7])).','.intval(str_replace(',','',$_POST[tlot_nummax8])).','.intval(str_replace(',','',$_POST[tlot_nummax9])).','.intval(str_replace(',','',$_POST[tlot_nummax10])).','.intval(str_replace(',','',$_POST[tlot_nummax11])).','.intval(str_replace(',','',$_POST[tlot_nummax12])).','.intval(str_replace(',','',$_POST[tlot_nummax13])).','.intval(str_replace(',','',$_POST[tlot_nummax14])).','.intval(str_replace(',','',$_POST[tlot_nummax15])).','.intval(str_replace(',','',$_POST[tlot_nummax16])).','.intval(str_replace(',','',$_POST[tlot_nummax17])).','.intval(str_replace(',','',$_POST[tlot_nummax18])).','.intval(str_replace(',','',$_POST[tlot_nummax19])).','.intval(str_replace(',','',$_POST[tlot_nummax20])).','.intval(str_replace(',','',$_POST[tlot_nummax21])).','.intval(str_replace(',','',$_POST[tlot_nummax22])).','.intval(str_replace(',','',$_POST[tlot_nummax23])).','.intval(str_replace(',','',$_POST[tlot_nummax24])).','.intval(str_replace(',','',$_POST[tlot_nummax25]));

$lotshare='share,'.($_POST[lot_share1]).','.($_POST[lot_share2]).','.($_POST[lot_share3]).','.($_POST[lot_share4]).','.($_POST[lot_share5]).','.($_POST[lot_share6]).','.($_POST[lot_share7]).','.($_POST[lot_share8]).','.($_POST[lot_share9]).','.($_POST[lot_share10]).','.($_POST[lot_share11]).','.($_POST[lot_share12]).','.($_POST[lot_share13]).','.($_POST[lot_share14]).','.($_POST[lot_share15]).','.($_POST[lot_share16]).','.($_POST[lot_share17]).','.($_POST[lot_share18]).','.($_POST[lot_share19]).','.($_POST[lot_share20]).','.($_POST[lot_share21]).','.($_POST[lot_share22]).','.($_POST[lot_share23]).','.($_POST[lot_share24]).','.($_POST[lot_share25]);

$lotsharef='share,'.($_POST[lot_sharef1]).','.($_POST[lot_sharef2]).','.($_POST[lot_sharef3]).','.($_POST[lot_sharef4]).','.($_POST[lot_sharef5]).','.($_POST[lot_sharef6]).','.($_POST[lot_sharef7]).','.($_POST[lot_sharef8]).','.($_POST[lot_sharef9]).','.($_POST[lot_sharef10]).','.($_POST[lot_sharef11]).','.($_POST[lot_sharef12]).','.($_POST[lot_sharef13]).','.($_POST[lot_sharef14]).','.($_POST[lot_sharef15]).','.($_POST[lot_sharef16]).','.($_POST[lot_sharef17]).','.($_POST[lot_sharef18]).','.($_POST[lot_sharef19]).','.($_POST[lot_sharef20]).','.($_POST[lot_sharef21]).','.($_POST[lot_sharef22]).','.($_POST[lot_sharef23]).','.($_POST[lot_sharef24]).','.($_POST[lot_sharef25]);

$lotmyshare='myshare,'.($_POST[lot_myshare1]).','.($_POST[lot_myshare2]).','.($_POST[lot_myshare3]).','.($_POST[lot_myshare4]).','.($_POST[lot_myshare5]).','.($_POST[lot_myshare6]).','.($_POST[lot_myshare7]).','.($_POST[lot_myshare8]).','.($_POST[lot_myshare9]).','.($_POST[lot_myshare10]).','.($_POST[lot_myshare11]).','.($_POST[lot_myshare12]).','.($_POST[lot_myshare13]).','.($_POST[lot_myshare14]).','.($_POST[lot_myshare15]).','.($_POST[lot_myshare16]).','.($_POST[lot_myshare17]).','.($_POST[lot_myshare18]).','.($_POST[lot_myshare19]).','.($_POST[lot_myshare20]).','.($_POST[lot_myshare21]).','.($_POST[lot_myshare22]).','.($_POST[lot_myshare23]).','.($_POST[lot_myshare24]).','.($_POST[lot_myshare25]);



####################LOTHUN
$lot_hunpay='pay,'.($_POST[lot_hun_pay1]).','.($_POST[lot_hun_pay2]).','.($_POST[lot_hun_pay3]).','.($_POST[lot_hun_pay4]).','.($_POST[lot_hun_pay5]).','.($_POST[lot_hun_pay6]).','.($_POST[lot_hun_pay7]).','.($_POST[lot_hun_pay8]).','.($_POST[lot_hun_pay9]).','.($_POST[lot_hun_pay10]).','.($_POST[lot_hun_pay11]).','.($_POST[lot_hun_pay12]).','.($_POST[lot_hun_pay13]).','.($_POST[lot_hun_pay14]).','.($_POST[lot_hun_pay15]).','.($_POST[lot_hun_pay16]).','.($_POST[lot_hun_pay17]).','.($_POST[lot_hun_pay18]).','.($_POST[lot_hun_pay19]).','.($_POST[lot_hun_pay20]).','.($_POST[lot_hun_pay21]).','.($_POST[lot_hun_pay22]).','.($_POST[lot_hun_pay23]).','.($_POST[lot_hun_pay24]).','.($_POST[lot_hun_pay25]);

$lot_hundis='dis,'.($_POST[lot_hun_dis1]).','.($_POST[lot_hun_dis2]).','.($_POST[lot_hun_dis3]).','.($_POST[lot_hun_dis4]).','.($_POST[lot_hun_dis5]).','.($_POST[lot_hun_dis6]).','.($_POST[lot_hun_dis7]).','.($_POST[lot_hun_dis8]).','.($_POST[lot_hun_dis9]).','.($_POST[lot_hun_dis10]).','.($_POST[lot_hun_dis11]).','.($_POST[lot_hun_dis12]).','.($_POST[lot_hun_dis13]).','.($_POST[lot_hun_dis14]).','.($_POST[lot_hun_dis15]).','.($_POST[lot_hun_dis16]).','.($_POST[lot_hun_dis17]).','.($_POST[lot_hun_dis18]).','.($_POST[lot_hun_dis19]).','.($_POST[lot_hun_dis20]).','.($_POST[lot_hun_dis21]).','.($_POST[lot_hun_dis22]).','.($_POST[lot_hun_dis23]).','.($_POST[lot_hun_dis24]).','.($_POST[lot_hun_dis25]);

$lot_hunmin='min,'.intval(str_replace(',','',$_POST[tlot_hun_min1])).','.intval(str_replace(',','',$_POST[tlot_hun_min2])).','.intval(str_replace(',','',$_POST[tlot_hun_min3])).','.intval(str_replace(',','',$_POST[tlot_hun_min4])).','.intval(str_replace(',','',$_POST[tlot_hun_min5])).','.intval(str_replace(',','',$_POST[tlot_hun_min6])).','.intval(str_replace(',','',$_POST[tlot_hun_min7])).','.intval(str_replace(',','',$_POST[tlot_hun_min8])).','.intval(str_replace(',','',$_POST[tlot_hun_min9])).','.intval(str_replace(',','',$_POST[tlot_hun_min10])).','.intval(str_replace(',','',$_POST[tlot_hun_min11])).','.intval(str_replace(',','',$_POST[tlot_hun_min12])).','.intval(str_replace(',','',$_POST[tlot_hun_min13])).','.intval(str_replace(',','',$_POST[tlot_hun_min14])).','.intval(str_replace(',','',$_POST[tlot_hun_min15])).','.intval(str_replace(',','',$_POST[tlot_hun_min16])).','.intval(str_replace(',','',$_POST[tlot_hun_min17])).','.intval(str_replace(',','',$_POST[tlot_hun_min18])).','.intval(str_replace(',','',$_POST[tlot_hun_min19])).','.intval(str_replace(',','',$_POST[tlot_hun_min20])).','.intval(str_replace(',','',$_POST[tlot_hun_min21])).','.intval(str_replace(',','',$_POST[tlot_hun_min22])).','.intval(str_replace(',','',$_POST[tlot_hun_min23])).','.intval(str_replace(',','',$_POST[tlot_hun_min24])).','.intval(str_replace(',','',$_POST[tlot_hun_min25]));

$lot_hunmax='max,'.intval(str_replace(',','',$_POST[tlot_hun_max1])).','.intval(str_replace(',','',$_POST[tlot_hun_max2])).','.intval(str_replace(',','',$_POST[tlot_hun_max3])).','.intval(str_replace(',','',$_POST[tlot_hun_max4])).','.intval(str_replace(',','',$_POST[tlot_hun_max5])).','.intval(str_replace(',','',$_POST[tlot_hun_max6])).','.intval(str_replace(',','',$_POST[tlot_hun_max7])).','.intval(str_replace(',','',$_POST[tlot_hun_max8])).','.intval(str_replace(',','',$_POST[tlot_hun_max9])).','.intval(str_replace(',','',$_POST[tlot_hun_max10])).','.intval(str_replace(',','',$_POST[tlot_hun_max11])).','.intval(str_replace(',','',$_POST[tlot_hun_max12])).','.intval(str_replace(',','',$_POST[tlot_hun_max13])).','.intval(str_replace(',','',$_POST[tlot_hun_max14])).','.intval(str_replace(',','',$_POST[tlot_hun_max15])).','.intval(str_replace(',','',$_POST[tlot_hun_max16])).','.intval(str_replace(',','',$_POST[tlot_hun_max17])).','.intval(str_replace(',','',$_POST[tlot_hun_max18])).','.intval(str_replace(',','',$_POST[tlot_hun_max19])).','.intval(str_replace(',','',$_POST[tlot_hun_max20])).','.intval(str_replace(',','',$_POST[tlot_hun_max21])).','.intval(str_replace(',','',$_POST[tlot_hun_max22])).','.intval(str_replace(',','',$_POST[tlot_hun_max23])).','.intval(str_replace(',','',$_POST[tlot_hun_max24])).','.intval(str_replace(',','',$_POST[tlot_hun_max25]));

$lot_hunnummax='max,'.intval(str_replace(',','',$_POST[tlot_hun_nummax1])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax2])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax3])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax4])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax5])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax6])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax7])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax8])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax9])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax10])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax11])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax12])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax13])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax14])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax15])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax16])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax17])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax18])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax19])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax20])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax21])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax22])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax23])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax24])).','.intval(str_replace(',','',$_POST[tlot_hun_nummax25]));

$lot_hunshare='share,'.($_POST[lot_hun_share1]).','.($_POST[lot_hun_share2]).','.($_POST[lot_hun_share3]).','.($_POST[lot_hun_share4]).','.($_POST[lot_hun_share5]).','.($_POST[lot_hun_share6]).','.($_POST[lot_hun_share7]).','.($_POST[lot_hun_share8]).','.($_POST[lot_hun_share9]).','.($_POST[lot_hun_share10]).','.($_POST[lot_hun_share11]).','.($_POST[lot_hun_share12]).','.($_POST[lot_hun_share13]).','.($_POST[lot_hun_share14]).','.($_POST[lot_hun_share15]).','.($_POST[lot_hun_share16]).','.($_POST[lot_hun_share17]).','.($_POST[lot_hun_share18]).','.($_POST[lot_hun_share19]).','.($_POST[lot_hun_share20]).','.($_POST[lot_hun_share21]).','.($_POST[lot_hun_share22]).','.($_POST[lot_hun_share23]).','.($_POST[lot_hun_share24]).','.($_POST[lot_hun_share25]);

$lot_hunsharef='share,'.($_POST[lot_hun_sharef1]).','.($_POST[lot_hun_sharef2]).','.($_POST[lot_hun_sharef3]).','.($_POST[lot_hun_sharef4]).','.($_POST[lot_hun_sharef5]).','.($_POST[lot_hun_sharef6]).','.($_POST[lot_hun_sharef7]).','.($_POST[lot_hun_sharef8]).','.($_POST[lot_hun_sharef9]).','.($_POST[lot_hun_sharef10]).','.($_POST[lot_hun_sharef11]).','.($_POST[lot_hun_sharef12]).','.($_POST[lot_hun_sharef13]).','.($_POST[lot_hun_sharef14]).','.($_POST[lot_hun_sharef15]).','.($_POST[lot_hun_sharef16]).','.($_POST[lot_hun_sharef17]).','.($_POST[lot_hun_sharef18]).','.($_POST[lot_hun_sharef19]).','.($_POST[lot_hun_sharef20]).','.($_POST[lot_hun_sharef21]).','.($_POST[lot_hun_sharef22]).','.($_POST[lot_hun_sharef23]).','.($_POST[lot_hun_sharef24]).','.($_POST[lot_hun_sharef25]);

$lot_hunmyshare='myshare,'.($_POST[lot_hun_myshare1]).','.($_POST[lot_hun_myshare2]).','.($_POST[lot_hun_myshare3]).','.($_POST[lot_hun_myshare4]).','.($_POST[lot_hun_myshare5]).','.($_POST[lot_hun_myshare6]).','.($_POST[lot_hun_myshare7]).','.($_POST[lot_hun_myshare8]).','.($_POST[lot_hun_myshare9]).','.($_POST[lot_hun_myshare10]).','.($_POST[lot_hun_myshare11]).','.($_POST[lot_hun_myshare12]).','.($_POST[lot_hun_myshare13]).','.($_POST[lot_hun_myshare14]).','.($_POST[lot_hun_myshare15]).','.($_POST[lot_hun_myshare16]).','.($_POST[lot_hun_myshare17]).','.($_POST[lot_hun_myshare18]).','.($_POST[lot_hun_myshare19]).','.($_POST[lot_hun_myshare20]).','.($_POST[lot_hun_myshare21]).','.($_POST[lot_hun_myshare22]).','.($_POST[lot_hun_myshare23]).','.($_POST[lot_hun_myshare24]).','.($_POST[lot_hun_myshare25]);



$_POST[tcount]=0;



$sql="INSERT IGNORE INTO bom_tb_member (m_open,	m_name,	m_phone,	m_user,	m_pass,	m_regis, m_count	,m_count_de, m_max,	m_min	,m_max_match,m_com,	m_share	,m_share_live	,m_step_dis,	m_step2	,m_type , m_nam_tor	,m_nam_rong ,m_nam_tor_live	,m_nam_rong_live ,m_b_pass	,m_b_bank,	m_b_code	,m_b_name ,m_lotto_nummax,m_lotto_max,	m_lotto_min ,m_lotto_hun_nummax,m_lotto_hun_max, m_lotto_hun_min , m_lotto_force_super, m_lotto_hun_force_super , m_lotto_myshare_super , m_lotto_hun_myshare_super , m_lotto_force_senior , m_lotto_hun_force_senior , m_lotto_myshare_senior , m_lotto_hun_myshare_senior , m_lotto_force_master , m_lotto_hun_force_master , m_lotto_myshare_master , m_lotto_hun_myshare_master , m_lotto_force_agent,	m_lotto_hun_force_agent , m_lotto_myshare_agent , m_lotto_hun_myshare_agent , m_lotto_pay_super , m_lotto_hun_pay_super , m_lotto_pay_senior , m_lotto_hun_pay_senior , m_lotto_pay_master , m_lotto_hun_pay_master , m_lotto_pay_agent , m_lotto_hun_pay_agent , m_lotto_pay_member , m_lotto_hun_pay_member , m_lotto_dis_super , m_lotto_hun_dis_super , m_lotto_dis_senior , m_lotto_hun_dis_senior , m_lotto_dis_master , m_lotto_hun_dis_master , m_lotto_dis_agent , m_lotto_hun_dis_agent , m_lotto_dis_member , m_lotto_hun_dis_member ,r_agent_id, bonus_m_id )
 values
  ('open,0,0,0,0,1,0,0,0,1','$_POST[txt_phone]','$_POST[txt_phone]','$user','$_POST[txt_sms]',now(),'0','0','$tmax','$tmin','$tmaxmatch','$tcom','$share','$sharelive','$tstepdis','$step2','0' 
,'$namtor','$namrong','$namtor','$namrong'
,'$_POST[txt_bank_code]','$_POST[txt_bank]','$_POST[txt_bank_number]','$_POST[txt_bank_name]' 
 ,'max,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,0','max,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,100000,0','min,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,0' 
,'max,0,0,0,100000,100000,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0','max,0,0,0,100000,100000,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0','min,0,0,0,10,10,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0' 

,'share,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'share,,,,0,0,,,,,,,,,,,,,,,,,,,,'
 ,'myshare,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'myshare,,,,0,0,,,,,,,,,,,,,,,,,,,,'
  ,'share,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'share,,,,0,0,,,,,,,,,,,,,,,,,,,,'
   ,'myshare,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'myshare,,,,0,0,,,,,,,,,,,,,,,,,,,,' 
   ,'share,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'share,,,,0,0,,,,,,,,,,,,,,,,,,,,' 
   ,'myshare,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'myshare,,,,0,0,,,,,,,,,,,,,,,,,,,,'
    ,'share,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'share,,,,0,0,,,,,,,,,,,,,,,,,,,,'
	 ,'share,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' , 'share,,,,0,0,,,,,,,,,,,,,,,,,,,,'

 ,'pay,750,250,120,90,90,3,4,1.95,1.95,1.95,1.95,1.95,12,24,12,750,250,90,3,120,8,8,8,12,' ,'pay,,,,90,90,,,,,,,,,,,,,,,,,,,,'
  ,'pay,750,250,120,90,90,3,4,1.95,1.95,1.95,1.95,1.95,12,24,12,750,250,90,3,120,8,8,8,12,' ,'pay,,,,90,90,,,,,,,,,,,,,,,,,,,,' 
  ,'pay,750,250,120,90,90,3,4,1.95,1.95,1.95,1.95,1.95,12,24,12,750,250,90,3,120,8,8,8,12,' ,'pay,,,,90,90,,,,,,,,,,,,,,,,,,,,'
   ,'pay,750,250,120,90,90,3,4,1.95,1.95,1.95,1.95,1.95,12,24,12,750,250,90,3,120,8,8,8,12,' ,'pay,,,,90,90,,,,,,,,,,,,,,,,,,,,'
    ,'pay,750,250,120,90,90,3,4,1.95,1.95,1.95,1.95,1.95,12,24,12,750,250,90,3,120,8,8,8,12,','pay,,,,90,90,,,,,,,,,,,,,,,,,,,,' 
	,'dis,15,35,35,5,5,12,12,2,2,2,2,2,28,20,20,15,35,5,12,35,12,12,12,28,' ,'dis,,,,5,5,,,,,,,,,,,,,,,,,,,,'
	 ,'dis,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'dis,,,,0,0,,,,,,,,,,,,,,,,,,,,' 
	 ,'dis,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'dis,,,,0,0,,,,,,,,,,,,,,,,,,,,' 
	 ,'dis,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,' ,'dis,,,,0,0,,,,,,,,,,,,,,,,,,,,'
	  ,'dis,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,','dis,,,,0,0,,,,,,,,,,,,,,,,,,,,'

,'$r_agent_id' ,'$_POST[fmid]' )
";
sql_query($sql);


##################JSON Lotto Config
$sql="select * from  bom_tb_member where   m_user='$user' limit 1";
$rsm_2=sql_array($sql);

#######################################################LOG	
     $log_sum=$_POST[tcount];
	 $sql="INSERT IGNORE INTO bom_tb_databet (d_date,	m_id	,	d_in	,d_sum	,d_by ) values(now() ,'$rsm_2[m_id]','$_POST[tcount]','$log_sum', 1)";
     sql_query($sql);
#######################################################LOG		 


$js1=array();
$js1["m_lotto_nummax"]="$lotnummax";
$js1["m_lotto_max"]="$lotmax";
$js1["m_lotto_min"]="$lotmin";

$js1["m_lotto_hun_nummax"]="$lot_hunnummax";
$js1["m_lotto_hun_max"]="$lot_hunmax";
$js1["m_lotto_hun_min"]="$lot_hunmin";

###########################หวย
$js1["m_lotto_myshare_super"]="$rsm_2[m_lotto_myshare_super]";
$js1["m_lotto_myshare_senior"]="$rsm_2[m_lotto_myshare_senior]";
$js1["m_lotto_myshare_master"]="$rsm_2[m_lotto_myshare_master]";
$js1["m_lotto_myshare_agent"]="$rsm_2[m_lotto_myshare_agent]";

$js1["m_lotto_force_super"]="$rsm_2[m_lotto_force_super]";
$js1["m_lotto_force_senior"]="$rsm_2[m_lotto_force_senior]";
$js1["m_lotto_force_master"]="$rsm_2[m_lotto_force_master]";
$js1["m_lotto_force_agent"]="$rsm_2[m_lotto_force_agent]";


$js1["m_lotto_pay_super"]="$rsm_2[m_lotto_pay_super]";
$js1["m_lotto_pay_senior"]="$rsm_2[m_lotto_pay_senior]";
$js1["m_lotto_pay_master"]="$rsm_2[m_lotto_pay_master]";
$js1["m_lotto_pay_agent"]="$rsm_2[m_lotto_pay_agent]";
$js1["m_lotto_pay_member"]="$rsm_2[m_lotto_pay_member]";

$js1["m_lotto_dis_super"]="$rsm_2[m_lotto_dis_super]";
$js1["m_lotto_dis_senior"]="$rsm_2[m_lotto_dis_senior]";
$js1["m_lotto_dis_master"]="$rsm_2[m_lotto_dis_master]";
$js1["m_lotto_dis_agent"]="$rsm_2[m_lotto_dis_agent]";
$js1["m_lotto_dis_member"]="$rsm_2[m_lotto_dis_member]";



###########################หุ้น
$js1["m_lotto_hun_myshare_super"]="$rsm_2[m_lotto_hun_myshare_super]";
$js1["m_lotto_hun_myshare_senior"]="$rsm_2[m_lotto_hun_myshare_senior]";
$js1["m_lotto_hun_myshare_master"]="$rsm_2[m_lotto_hun_myshare_master]";
$js1["m_lotto_hun_myshare_agent"]="$rsm_2[m_lotto_hun_myshare_agent]";

$js1["m_lotto_hun_force_super"]="$rsm_2[m_lotto_hun_force_super]";
$js1["m_lotto_hun_force_senior"]="$rsm_2[m_lotto_hun_force_senior]";
$js1["m_lotto_hun_force_master"]="$rsm_2[m_lotto_hun_force_master]";
$js1["m_lotto_hun_force_agent"]="$rsm_2[m_lotto_hun_force_agent]";


$js1["m_lotto_hun_pay_super"]="$rsm_2[m_lotto_hun_pay_super]";
$js1["m_lotto_hun_pay_senior"]="$rsm_2[m_lotto_hun_pay_senior]";
$js1["m_lotto_hun_pay_master"]="$rsm_2[m_lotto_hun_pay_master]";
$js1["m_lotto_hun_pay_agent"]="$rsm_2[m_lotto_hun_pay_agent]";
$js1["m_lotto_hun_pay_member"]="$rsm_2[m_lotto_hun_pay_member]";

$js1["m_lotto_hun_dis_super"]="$rsm_2[m_lotto_hun_dis_super]";
$js1["m_lotto_hun_dis_senior"]="$rsm_2[m_lotto_hun_dis_senior]";
$js1["m_lotto_hun_dis_master"]="$rsm_2[m_lotto_hun_dis_master]";
$js1["m_lotto_hun_dis_agent"]="$rsm_2[m_lotto_hun_dis_agent]";
$js1["m_lotto_hun_dis_member"]="$rsm_2[m_lotto_hun_dis_member]";

####################################################
$js1["m_min"]="$rsm_2[m_min]";
$js1["m_max"]="$rsm_2[m_max]";
$js1["m_max_match"]="$rsm_2[m_max_match]";

$js1["m_myshare_super"]="$rsm_2[m_myshare_super]";
$js1["m_myshare_senior"]="$rsm_2[m_myshare_senior]";
$js1["m_myshare_master"]="$rsm_2[m_myshare_master]";
$js1["m_myshare_agent"]="$rsm_2[m_myshare_agent]";

$js1["m_force_super"]="$rsm_2[m_force_super]";
$js1["m_force_senior"]="$rsm_2[m_force_senior]";
$js1["m_force_master"]="$rsm_2[m_force_master]";
$js1["m_force_agent"]="$rsm_2[m_force_agent]";



$js1["m_myshare_games"]="$rsm_2[m_myshare_games]";
$js1["m_force_games"]="$rsm_2[m_force_games]";
$js1["m_dis_games"]="$rsm_2[m_dis_games]";
$js1["m_max_games"]="$rsm_2[m_max_games]";
$js1["m_min_games"]="$rsm_2[m_min_games]";

$js1["m_active_bet"]="$rsm_2[m_active_bet]";

$txt=json_encode($js1);
$url_file="json/config/member/LottoConfig_".$rsm_2[m_id].".json";	
write($url_file ,$txt,"w+"); 
##################JSON LottoMaxReceive



#####################สร้าง Folder

$url_file="json/transfer/$rsm_2[m_id]/";
_mkdir($url_file);
/*
$url_file="json/sport/bet_date/$rem[m_id]/";
_mkdir($url_file);
$url_file="json/sport/bet_success/$rem[m_id]/";
_mkdir($url_file);
$url_file="json/sport/bet_wait/$rem[m_id]/";
_mkdir($url_file);
$url_file="json/sport/max_match/$rem[m_id]/";
_mkdir($url_file);
*/


$tdate=_bdate();

######################รายการเคลื่อนไหว
$by='BUM88';
$p_comment=$lang_member[87];
$from=0;	
$bet=0;
$pay=$_POST[tcount];
$bank=$_POST[tbank];
$sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from,	p_bet	,p_pay	,p_type,	r_id,	r_level,	r_agent_id, p_by,p_bank , p_comment) values(now(),'$from', '$bet', '$pay',1,'$rsm_2[m_id]',5,'$rsm_2[r_agent_id]','$by','$_POST[txt_bank]','$p_comment') ";
sql_query($sql);
######################รายการเคลื่อนไหว



$_SESSION[ac_ok]=$lang_member[88];
    
	  echo"<script language='JavaScript'>
         top.document.location='checky_login.php?u=".$user."&toke=".(trim($_POST[txt_sms]))."';
      </script>";
	  
exit();

	}
	

?>
</body>
</html>