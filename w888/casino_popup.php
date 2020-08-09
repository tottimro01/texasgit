<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");



######################ระงับ
  if(intval($_SESSION['m1']['m_active'])!=1){ 
					 	 @session_start(); 
						 @session_destroy();
						exit();
 }
 
 ###############ปิดไม่ให้เล่น
 $exe1=@explode(",",$_SESSION['m1']['m_open']);
  if(intval($exe1[12])!=1){ 
						exit();
 }
 
 ########################Agent
foreach($_SESSION['arid'] as $rid){
					######################ระงับ
					  if(intval($_SESSION['ardata'][$rid]['r_active'])!=1){ 
					 	 @session_start(); 
						 @session_destroy();
						exit();
					 }
}

 ###############ปิดไม่ให้เล่น
foreach($_SESSION['arid'] as $rid){
					######################ระงับ
					$exe2=@explode(",",$_SESSION['ardata'][$rid]['r_open']);
					  if(intval($exe2[12])!=1){ 
						exit();
					 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Casino</title>
	<link rel="stylesheet" href="http://abc.wan1991.com/assets/lib/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
	<style>
.main_container
	{
		width: 100%;
		margin-left: 1100px;
		margin: 0 auto;
		/*height: 500px;*/
		background: #e7ca74;
    position: relative;
	}

	.message
	{
		color: red;
  		font-size: 30px;
  		text-align: center;
  		width: 100%;
  		height: 110px;
  		line-height: 110px;
	}
	
	.logo
	{
		width: 100%;
		height: 200px;
		background: red;
	}	

	.topbar-bg {
    background: #0b5dea;
    background: -moz-linear-gradient(left, #003289 0%,  #0b5dea 100%);
    background: -webkit-linear-gradient(left, #003289 0%,#0b5dea 100%);
     background: linear-gradient(to right, #003289 0%,#0b5dea 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#003289', endColorstr='#0b5dea',GradientType=1 );
    min-height: 180px;
  }

  .logo-box
  {
    border: 1px solid #111929;
    margin-top: 20px;
    border-bottom: 0;
    background: #2d6bd6;
  }
  .messageBox
  {
    position: absolute;
    top: 105px;
    margin: 0 auto;
    left: 0;
    right: 0;
    margin-left: auto;
    margin-right: auto;
    width: 500px;
    box-shadow: 0 1px 5px #2d6bd680;
  }

	</style>

	<div class="main_container">

		<div class="pt-2 topbar-bg">
  		  <div class="container">
  		    <div class="row">
  		      <div class="mx-auto col-md-8 col-lg-6">
  		        <div class="position-relative">
  		          <div class="w-100 text-center mt-3">
  		            <img src="img/logo_white2.png?v=2" class="img-logo" style="width: 130px;">
  		          </div>
  		        </div>
  		      </div>
  		    </div>

          <div class="bg-light px-4 py-4 messageBox">
              <div class="w-100 text-center logo-box">
                  <img src="img/casino/LOGO_<?=$_GET['id'];?>.png?v=1114" class="img-logo" style="width: auto; height: 195px;">
              </div>
              <div class="pt-3">
                  <div class="message">
<?
$id = $_GET['id'];
if($id == 13 || $id == 14 || $id == 15 || $id == 16){
	?>
		<h1 class="text-center"><?=$lang_member[2386];?></h1>
	<?
}
$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_casino"]==0){ 
  include 'sa_close12.php'; 
 exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[12]==0){ 
   include 'ag_close12.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[12]==0){ 
  include 'ag_close12.php'; 
  exit(); 
} 

##############################Login
	  #################API####################
	  if($_GET['id']==1){
		  
$sql="select *  from bom_tb_config where con_id=1";
$re_c=sql_array($sql);
if($re_c['casino_serv1']==1){


		  
	  #SA
$casino_zone=1;
	###############หา user 
$reu = sql_array("select * from bom_tb_casino_user where m_id = '$_SESSION[m_id]'   and  casino_zone ='$casino_zone' ;");
if($reu['m_id']==""){
	
	  $url=$x_process.'api/sa/createMember.php?u='.$_SESSION['m_user'].'&c='.$_SESSION["m_currency"];
   $data2=file_get_contents2($url);
   $data2 = json_decode($data2);
	$status2=($data2->status);  
	  if($status2=="0000"){
            $sql="INSERT IGNORE INTO bom_tb_casino_user (m_id, casino_zone, casino_user, casino_create) values('$_SESSION[m_id]','$casino_zone','$_SESSION[m_user]' , now()) ";
            sql_query($sql);
	 }
	}
	  

			
  $url=$x_process.'api/sa/login_games.php?user='.$_SESSION['m_user'].'&lang='.$_SESSION['lang'].'&ip='._bIP().'&mobile='.$_SESSION['m_login_from'];
  $data=file_get_contents2($url);
   $data = json_decode($data);
#print_r( $data);

	  $status=($data->status);
	  $url=($data->url);
	  
	  if($status=="0000"){
		 ################มี user
echo'<script type="text/javascript" >
window.location.replace("'.$url.'&lang='.$_SESSION['lang'].'");
</script>';
/* 
	  ################มี user
echo'<script type="text/javascript" >
window.location.replace("'.$url.'&lang=en");
</script>';
*/

	  }else{
  include 'ag_close12.php'; 
  exit(); 
		  }

		  
}else{#if($re_c['casino_serv1']==1){
  include 'ag_close12.php'; 
  exit(); 
		  }#if($re_c['casino_serv1']==1){
		  
		  
	  }
	  
	  
	  
##############################Login
	  #################API####################
	  if($_GET['id']==2){
		  
$sql="select *  from bom_tb_config where con_id=1";
$re_c=sql_array($sql);
if($re_c['casino_serv2']==1){ 
		  
	  #Sexy
$casino_zone=2;
	###############หา user 
$reu = sql_array("select * from bom_tb_casino_user where m_id = '$_SESSION[m_id]'   and  casino_zone ='$casino_zone' ;");
if($reu['m_id']==""){
	
	  $url=$x_process.'api/sexy/createMember.php?u='.$_SESSION['m_user'].'&c='.$_SESSION["m_currency"];
	  file_get_contents2($url);
	  
            $sql="INSERT IGNORE INTO bom_tb_casino_user (m_id, casino_zone, casino_user, casino_create) values('$_SESSION[m_id]','$casino_zone','$_SESSION[m_user]' , now()) ";
            sql_query($sql);
	}
	  
  $url=$x_process.'api/sexy/login_games.php?user='.$_SESSION['m_user'].'&lang='.$_SESSION['lang'].'&ip='._bIP().'&mobile='.$_SESSION['m_login_from'];
  $data=file_get_contents2($url);
   $data = json_decode($data);
#print_r( $data);

	  $status=($data->status);
	  $url=($data->url);
	  if($status=="0000"){
		  ################มี user
echo'<script type="text/javascript" >
window.location.replace("'.$url.'");
</script>';

	  }else{
  include 'ag_close12.php'; 
  exit(); 
		  }
		  
}else{#if($re_c['casino_serv2']==1){
  include 'ag_close12.php'; 
  exit(); 
		  }#if($re_c['casino_serv2']==1){  
		  
	  }
	  
	  
	  
	  
	  
	  
	  
	  
	    #################API####################
	  if($_GET['id']==11){
		  
$sql="select *  from bom_tb_config where con_id=1";
$re_c=sql_array($sql);
if($re_c['casino_serv3']==1){  
		  
		  
	  #Joker
$casino_zone=3;
	###############หา user 
$reu = sql_array("select * from bom_tb_casino_user where m_id = '$_SESSION[m_id]'   and  casino_zone ='$casino_zone' ;");
if($reu['m_id']==""){
	
	  $url=$x_process.'api/joker/createMember.php?u='.$_SESSION['m_user'].'&c='.$_SESSION["m_currency"];
	  file_get_contents2($url);
	  
            $sql="INSERT IGNORE INTO bom_tb_casino_user (m_id, casino_zone, casino_user, casino_create) values('$_SESSION[m_id]','$casino_zone','$_SESSION[m_user]' , now()) ";
            sql_query($sql);
	}


  $url=$x_process.'api/joker/login_games.php?user='.$_SESSION['m_user'].'&lang='.$_SESSION['lang'].'&ip='._bIP();
  $data=file_get_contents2($url);
   $data = json_decode($data);
#print_r( $data);

	  $status=($data->status);
	  $url=($data->url);
	   $token=($data->token);
	  if($status=="0000"){
		  ################มี user
echo'<script src="js/jquery-1.9.1.min.js" language="javascript"></script>
<script language="javascript">
$(document).ready(function($){
	$("#submit_form").submit();
});
</script>
<form id="submit_form" action="'.$url.'" method="post">
<input name="token" type="hidden" id="token" value="'.$token.'"/>
</form>
';

	  }else{
  include 'ag_close12.php'; 
  exit(); 
		  }
		  
		  
}else{#if($re_c['casino_serv3']==1){
  include 'ag_close12.php'; 
  exit(); 
		  }#if($re_c['casino_serv3']==1){ 

	  }




	  #################API####################
	  if($_GET['id']==12){
		  
$sql="select *  from bom_tb_config where con_id=1";
$re_c=sql_array($sql);
if($re_c['casino_serv4']==1){
		  
		  
$casino_zone=4;
	###############หา user 
$reu = sql_array("select * from bom_tb_casino_user where m_id = '$_SESSION[m_id]'   and  casino_zone ='$casino_zone' ;");
if($reu['m_id']==""){
	
	  $url=$x_process.'api/xo/createMember.php?u='.$_SESSION['m_user'].'&c='.$_SESSION["m_currency"];
	  file_get_contents2($url);
	  
            $sql="INSERT IGNORE INTO bom_tb_casino_user (m_id, casino_zone, casino_user, casino_create) values('$_SESSION[m_id]','$casino_zone','$_SESSION[m_user]' , now()) ";
            sql_query($sql);
	}
	
	
	  $url=$x_process.'api/xo/login_games.php?user='.$_SESSION['m_user'].'&lang='.$_SESSION['lang'].'&ip='._bIP();
  $data=file_get_contents2($url);
   $data = json_decode($data);
#print_r( $data);

	  $status=($data->status);
	  $url=($data->url);
	   $pw=($data->pw);
	     $user=($data->user);
	   
	  if($status=="0000"){
		  ################มี user
echo'<script src="js/jquery-1.9.1.min.js" language="javascript"></script>
<script language="javascript">
$(document).ready(function($){
	$("#submit_form").submit();
});
</script>
<form id="submit_form" action="'.$url.'" method="post">
<input name="Username" type="hidden" id="token" value="'.$user.'"/>
<input name="Password" type="hidden" id="token" value="'.$pw.'"/>
<input name="Action" type="hidden" id="token" value="GameIndex"/>
<input name="GameCode" type="hidden" id="token" value=""/>
</form>
';
	  }else{
  include 'ag_close12.php'; 
  exit(); 
		  }
		  
}else{#if($re_c['casino_serv4']==1){
  include 'ag_close12.php'; 
  exit(); 
		  }#if($re_c['casino_serv4']==1){
		  
		  
	  }
	  
?>

                  
          
                   
                   </div>
              </div>
          </div>

  		    
  		  </div>
  		</div>

	</div>

	
</body>
</html>