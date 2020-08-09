<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
     include "../inc/conn.php";
	include "../inc/function.php";

	$postdata = http_build_query(
 		array(
      'id' => $_GET['id'],
 		  'futype' => $_GET['futype'],
 		  'edType' => $_GET['edType'],
 		  'oldCredit' => $_GET['oldCredit'],
 		  'session' => $_SESSION,
 		)
 	);
  $opts = array('http' =>
    array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $postdata,
    ),
  );
  $context  = stream_context_create($opts);

  if($_GET['futype'] == "A")
  {
  	$temp = file_get_contents($main_url.'/inc/temp/memberUserList/editCredit_A_temp.php', false, $context);
  }else if($_GET['futype'] == "M"){
	  
	  #################API
  $sql = "select * from bom_tb_member where  m_id='$_GET[id]' ";
  $rex = sql_array($sql);
  
 $url=$x_process.'api/getBalance2.php?user='.$rex['m_user'];
  file_get_contents8($url);

  
  	$temp = file_get_contents($main_url.'/inc/temp/memberUserList/editCredit_M_temp.php', false, $context);
  }else{
    $temp = "";
  }
	

	$data = array(
		'temp' => $temp,
	);
	echo json_encode($data);
	
?>
