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
	$usermain = "@".$_SESSION["r_user"];

	if($usermain != $_POST["usermain"])
	{
		$data = array(
			'msg' 		=> 	$lang_message[23],
			'status'	=>	false
		);
	}
	else
	{
		$u_user 	= $_POST["username"].$usermain;
		$u_name 	= $_POST["name"];
		$u_pass 	= $_POST["password"];
		$u_active	= $_POST["status"];

		$u_mm = "mm";

		for($mm=1;$mm<=11;$mm++){
			if($_POST["ckOpen_".$mm]=="Y"){
				$u_mm .= ",1";
			}else{
				$u_mm .= ",0";
			}
		}

		if($u_user == "" || $u_name == "" || $u_pass == "")
		{
			$data = array(
				'msg' 		=>	$lang_message[7],
				'status'	=>	false
			);
		}
		else
		{
			$sql="SELECT u_user FROM `bom_tb_agent_use` where u_user = '".$u_user."'";    
			$num_user =sql_num($sql);

			if($num_user > 0)
			{
				$data = array(
					'msg' 		=> 	$lang_message[20],
					'status'	=>	false
				);
			}
			else
			{
				$sql="INSERT IGNORE INTO  bom_tb_agent_use (u_name,	u_user,	u_pass, u_regis , u_menu, u_active,r_id) values ('$u_name','$u_user','$u_pass',now() , '$u_mm',$u_active,'".$_SESSION["r_id"]."')";
				$rs = sql_query($sql);
	
				if($rs)
				{
					$data = array(
						'msg' 		=>	$lang_message[5],
						'status'	=> 	true
					);
				}
				else
				{
					$data = array(
						'msg'     =>  $lang_message[4],
						'status'  =>  false
					);
				}		
			}
		}
	}
}
else if($_POST["bt"] == "edit")
{
	$u_id = $_POST["sub_id"];
	// $u_user 	= $usermain.$_POST[username];
	$u_name 	= $_POST["name"];
	$u_pass 	= $_POST["password"];
	$u_active	= $_POST["status"];

	$u_mm = "mm";

	for($mm=1;$mm<=11;$mm++){
		if($_POST["ckOpen_".$mm]=="Y"){
			$u_mm .= ",1";
		}else{
			$u_mm .= ",0";
		}
	}



	if($u_pass != "")
	{
		$update_pass = ",`u_pass`='$u_pass'";
	}

	$sql = "UPDATE `bom_tb_agent_use` SET `u_name`= '".$_POST["name"]."' $update_pass ,`u_active`= $u_active ,`u_menu`= '$u_mm' ,`r_id`='".$_SESSION["r_id"]."' WHERE u_id = $u_id";
	$rs = sql_query($sql);
	
	if($rs)
	{
		$data = array(
			'msg'			=> 	$lang_message[5],
			'status' 	=> 	true
		);
	}
	else
	{
		$data = array(
			'msg'     =>  $lang_message[4],
			'status'  =>  false
		);
	}	
}
else if($_POST["bt"] == "del")
{
	if(isset($_POST["sub_id"]))
	{
		$u_id = $_POST["sub_id"];

		
		
		$sql ="DELETE FROM `bom_tb_agent_use`  WHERE u_id = $u_id";
		$rs = sql_query($sql);

		if($rs)
		{
			$sql ="DELETE FROM `bom_tb_login_ag` WHERE r_use = $u_id";  // ลบประวัติการ login
			$rs = sql_query($sql);

			$data = array(
				'msg'			=>	$lang_message[24],
				'status'	=> 	true
			);
		}
		else
		{
			$data = array(
				'msg'     =>  $lang_message[4],
				'status'  =>  false
			);
		}

	
	}
}
else
{
	$data = array(
		'msg'			=>	$lang_message[4],
		'status'	=> 	"error"
	);
}

echo json_encode($data);

?>