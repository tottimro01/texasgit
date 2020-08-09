<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('inc/conn.php');
  require('inc/function.php');
  require('lang/ag_lang.php');

if($_POST["ac"] == "config")
{

	$r_mes_logo = str_replace("," , "" , $_POST["tlogo"]);
 	$r_mes_name = str_replace("," , "" , $_POST["tname"]);
 	$r_mes_bin = str_replace("," , "" , $_POST["ttxt"]);

	$sql = "update IGNORE bom_tb_agent set r_mes_logo = '$r_mes_logo' , r_mes_name = '$r_mes_name' , r_mes_bin = '$r_mes_bin' where r_id='".$_SESSION['r_id']."'";
	$sql_update = sql_query($sql);

	

}else{
	$r_phone1 = str_replace("," , "" , $_POST["phone1"]);
 	$r_phone2 = str_replace("," , "" , $_POST["phone2"]);
 	$r_lineid = str_replace("," , "" , $_POST["lind_id"]);

 	$sql = "update IGNORE bom_tb_agent set r_phone1 = '$r_phone1' , r_phone2 = '$r_phone2' , r_lineid = '$r_lineid' where r_id='".$_SESSION['r_id']."'";
	$sql_update = sql_query($sql);
}


if($sql_update)
{
	$data = array(
		"msg"  => $lang_ag[3] ,
		"status"  => true ,
	);
}else{
	$data = array(
		"msg"  => $lang_ag[4] ,
		"status"  => false ,
	);
}


echo json_encode($data);

?>