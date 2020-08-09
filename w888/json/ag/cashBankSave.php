<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
}

require('inc/conn.php');
require('inc/function.php');
require('lang/ag_'.$_SESSION["AGlang"].'.php');



if($_POST["bt"] == "save")
{


	if($_POST["bank_account_number"] != "" && $_POST["bank_account_name"] != "" && $_POST["bank_province"] != "" && $_POST["bank_name_id"] != "")
	{

		$bank_name 			= $_POST["bank_name_id"];
		$bank_cname 		= $_POST["bank_account_name"];
		$bank_code 			= $_POST["bank_account_number"];
		$bank_province 		= $_POST["bank_province"];
		$bank_note 			= $_POST["bank_account_note"];

		$sql="INSERT IGNORE INTO  bom_tb_bank (`bank_name`, `bank_cname`, `bank_code`,  `bank_province`, `bank_note`, `r_id`) values ('$bank_name','$bank_cname','$bank_code','$bank_province','$bank_note','".$_SESSION["r_id"]."')";


		$rs = sql_query($sql);
		if($rs)
		{
			$data = array(
			'msg' => $lang_message[5],
			'status' => true
			);
		}else{
			$data = array(
		      'msg'     =>  $lang_message[4],
		      'status'  =>  false
		    );
		}		

	}else{
		$data = array(
				'msg' => $lang_message[7],
				'status' => false
			);
	}	


}
else if($_POST["bt"] == "edit")
{
	if($_POST["bank_account_number"] != "" && $_POST["bank_account_name"] != "" && $_POST["bank_province"] != "" && $_POST["bank_name_id"] != "" && $_POST["bank_id"] != "")
	{

		$bank_id 			= $_POST["bank_id"];
		$bank_name 			= $_POST["bank_name_id"];
		$bank_cname 		= $_POST["bank_account_name"];
		$bank_code 			= $_POST["bank_account_number"];
		$bank_province 		= $_POST["bank_province"];
		$bank_note 			= $_POST["bank_account_note"];


		$sql = "UPDATE `bom_tb_bank` SET `bank_name`= '$bank_name',`bank_cname`='$bank_cname ',`bank_code`='$bank_code',`bank_province`='$bank_province',`bank_note`= '$bank_note' WHERE bank_id = '$bank_id'";

		$rs = sql_query($sql);
		if($rs)
		{
			$data = array(
			'msg' => $lang_message[5],
			'status' => true
			);
		}else{
			$data = array(
		      'msg'     =>  $lang_message[4],
		      'status'  =>  false
		    );
		}		

	}else{

		$data = array(
				'msg' => $lang_message[7],
				'status' => false
			);

	}	

}
else if($_POST["bt"] == "del")
{

	

	if($_POST["bank_id"] != "")
	{
		$bank_id = trim($_POST["bank_id"]);
		$rs = sql_query("delete from bom_tb_bank where bank_id = '$bank_id'");
		
		if($rs)
		{
			$data = array(
				'msg' => $lang_message[6],
				'status' => true
			);
		}else{
			$data = array(
		      'msg'     =>  $lang_message[4],
		      'status'  =>  false
		    );
		}

		
	}else{
		$data = array(
				'msg' => $lang_message[7],
				'status' => false
			);
	}	
		

}else{

	$data = array(
		'msg' => $lang_message[7],
		'status' => false
	);
}



echo json_encode($data);



 ?>