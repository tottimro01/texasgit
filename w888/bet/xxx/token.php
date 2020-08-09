<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');	


	####################################
$fo="json/login/$_SESSION[mid].php";
@require_once($fo);

if($_SESSION[mtoken]!=$m_token){

@session_start(); 
@session_destroy();
      echo"<script language='JavaScript'>
	  alert('มีผู้ใช้งานมากกว่า 1 คน');
      top.document.location='login.php';
      </script>";
	}elseif($_SESSION[mid]==""){
@session_start(); 
@session_destroy();
	echo"<script language='JavaScript'>
     top.document.location='login.php';
	</script>";
	}

?>