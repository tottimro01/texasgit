<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');

if(isset($_POST['tsub'])){
	$_user = $_POST['tuser'];
	$_pass = $_POST['tpass'];

		$sql_login = "SELECT * FROM z_live_admin WHERE user = '$_user' and pass ='$_pass'";
		$l_login = sql_query($sql_login);
		$num_r = mysql_num_rows($l_login);
		if($num_r != 0){
			
			$r_login = sql_fetch($l_login);
			$_SESSION['usr_id_live'] = $r_login['id_usr'];
			
			if($r_login['state'] == "a"){
				$_SESSION['admin_viewer'] = "av";
			}else{
				$_SESSION['admin_viewer'] = "mv";
			}
			
			$_SESSION[admin]=1;
			@header('Location: index.php');
		}
		
}

/* if(isset($_POST['tsub'])){
	if($_POST['tuser']=="9999" && $_POST['tpass']=="9999"){
		$_SESSION[admin]=1;
       @header('Location: index.php');
		}elseif($_POST['tuser2']=="5859"){
		$_SESSION[admin]=2;
       @header('Location: index.php');
		}
	} */


?>
<?php 
	/* require('../inc/conn.php'); */
	require('../inc/function.php');
 ?>
<html>
<head>
<meta charset="UTF-8">
<style>
body{
	background:url("./img/bg.png");
	background-size:100%;
}
#l_log{
	width: 250px;
	height: 30px;
	font-size: 18px;
}
#mb{
	margin-bottom:6px;
}
#box-a{
	width: 300px;
    /* text-align: center; */
    margin: auto;
    background-color: #F8F9FB;
    height: 200;
	padding-top: 1px;
	border-radius: 5px;
}
.btn {
	-moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
	background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
	background-color:#007dc1;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:18px;
	padding:8px 85px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
}
.btn:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0061a7), color-stop(1, #007dc1));
	background:-moz-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-webkit-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-o-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-ms-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0061a7', endColorstr='#007dc1',GradientType=0);
	background-color:#0061a7;
}
.btn:active {
	position:relative;
	top:1px;
}
</style>
</head>
<?php
	/* $_user = $_POST['tuser'];
	$_pass = $_POST['tpass'];
	if( $_POST['sub_log'] == "lok"){
		$sql_login = "SELECT * FROM z_live_admin WHERE user = '$_user' and pass ='$_pass'";
		$l_login = sql_query($sql_login);
		$num_r = mysql_num_rows($l_login);
		if($num_r != 0){
			$r_login = sql_fetch($l_login);
			$_SESSION['usr_id_live'] = $r_login['id_usr'];
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=./index.php'>";
		}
		else{
				echo "<script>
					alert('ok');
				</script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=./index2.php'>";
		}
	}
	else{
		
		
	} */
?>
<body>
	<div>
		<form action="" method='post'>
			<div style='text-align: center; margin-top: 200px;'>
				<div id='box-a'>
					<div><h2>ເຂົ້າສູ່ລະບົບ</h2></div>
					<div id='mb'><input id='l_log' type='text' name='tuser' placeholder='ຊື່ຜູ້ໃຊ້' /></div>
					<div id='mb'><input id='l_log' type='password' name='tpass' placeholder='ລະຫັດຜ່ານ' /></div>
					<div><input class='btn' type='submit' name='tsub' value='ເຂົ້າສູ່ລະບົບ' /></div>
				</div>
			</div>
		</form>
	</div>
 </body>
 </html>