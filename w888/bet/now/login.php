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
			
			$ndate = date("Y-m-d H:i:s");  
			$usr_id = $r_login['id_usr'];
			sql_query("UPDATE z_live_admin SET adate='$ndate' WHERE id_usr=$usr_id");
			
			$_SESSION[admin]=1;
			@header('Location: index.php');
		}
		else{
			echo "<script>
					alert('ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');
				</script>";
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
<style type="text/css">

@font-face {
    font-family: 'Saysettha';
    src: url('./viewer/fonts/saysettha_mx-webfont.eot');
    src: url('./viewer/fonts/saysettha_mx-webfont.eot?#iefix') format('embedded-opentype'),
         url('./viewer/fonts/saysettha_mx-webfont.woff') format('woff'),
         url('./viewer/fonts/saysettha_mx-webfont.ttf') format('truetype'),
         url('./viewer/fonts/saysettha_mx-webfont.svg#SaysetthaMXRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

html , input {
font-family: 'Saysettha';
	}
body {
	margin: 0;
	padding: 0;
	font-family: 'Saysettha';
	font-size: 13px;
	color: #fff;
	background:#000 url(../loaded/images/bg.jpg) no-repeat top center;
	background-size:100%;
	
}

	.bt{
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius: 5px;
color:#fff;
font-weight:bold;
background:#00F;

		}
.ff{
width:450px;
border:1px  solid #333;	
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius: 5px;

-moz-box-shadow: 5px 5px 5px #171717;
-webkit-box-shadow: 5px 5px 5px #171717;
box-shadow: 5px 5px 5px #171717;
padding:20px;
background:#169000 url(../loaded/images/key-30.png) no-repeat left bottom;
	}
h1{ color:#000;
text-shadow: 3px 3px 3px #FF0;
}	
img{ margin-top:1px; position:absolute;}	

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
	<!-- <div>
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
	</div> -->
	<div align="center" style="padding-top:190px;">			
<div class="ff">
<h1 style="float:left;">ເຂົ້າສູ່ລະບົບ LIVE SOCCER</h1>
	
            <form method="post" autocomplete="off">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tbody><tr>
    <td width="164" align="right"><strong>ຊື່ຜູ້ໃຊ້</strong></td>
    <td width="271" align="left">

         
            <input name="tuser" type="text" id="l_user" maxlength="20" placeholder="ຊື່ຜູ້ໃຊ້" autocomplete="off" required="required" />
            

    </td>
  </tr>
  <tr>
    <td align="right"><strong>ລະຫັດຜ່ານ</strong></td>
    <td align="left">    

          
            <input name="tpass" type="password" id="l_pass" maxlength="20" placeholder="ລະຫັດຜ່ານ" autocomplete="off" required="required" />
           </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="tsub" type="submit" value="ເຂົ້າສູ່ລະບົບ" class="bt"></td>
  </tr>
</tbody></table>


        
    </form> 
            

  </div>      
            </div>
 </body>
 </html>