<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
}

require('lang/ag_lang.php');

require('inc/conn.php');
require('inc/function.php');

if($_POST["current_password"] == "" || $_POST["new_password"] == "" || $_POST["confirm_new_password"] == "")
{
	$data = array(
		'msg' => $lang_ag[7],
		'status' => false
	);

}else if($_POST["new_password"] != $_POST["confirm_new_password"])
{
	$data = array(
		'msg' => $lang_ag[13],
		'status' => false
	);	
}
else{

	$c_pass 	= $_POST["current_password"];
	$n_pass 	= $_POST["new_password"];
	$conf_pass 	= $_POST["confirm_new_password"];


	if($_SESSION["uu_use"] == 0)  // agent
	{
		$sql="select r_pass from bom_tb_agent where  r_id='".$_SESSION["r_id"]."'";
   	    $rs = sql_array($sql); 

   	    if($c_pass != $rs["r_pass"])
   	    {
   	    	$data = array(
				'msg' => $lang_ag[14],
				'status' => false
			);
   	    }else{

   	    	$sql = "update IGNORE `bom_tb_agent` SET `r_pass` = '{$n_pass}' where  r_id='".$_SESSION["r_id"]."'";
   	    	$re=sql_query($sql);

   	    	$data = array(
				'msg' => $lang_ag[5],
				'status' => true,
				);
   	    }

   
	}else{  // sub agent

		$sql="select u_pass from bom_tb_agent_use where  u_id='".$_SESSION["u_id"]."'";
		$rs = sql_array($sql); 
		if($c_pass != $rs["u_pass"])
   	    {
   	    	$data = array(
				'msg' => $lang_ag[14],
				'status' => false
			);
   	    }else{

   	    	$sql = "update IGNORE `bom_tb_agent_use` SET `u_pass` = '{$n_pass}' where  u_id='".$_SESSION[u_id]."'";
   	    	$re=sql_query($sql);

   	    	$data = array(
				'msg' => $lang_ag[5],
				'status' => true
				);
   	    }

	}

}

echo json_encode($data);
 ?>