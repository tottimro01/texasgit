<?php
ob_start(); if (!isset($_SESSION)) { session_start(); }

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}

require('inc/conn.php');
require('inc/function.php');
require('lang/ag_lang.php');

if($_POST["bt"] == "edit")
{
  $lang_id = $_POST["lang_id"];
  $en = $_POST["en"];
  $th = $_POST["th"];
  $jp = $_POST["jp"];
  $ko	= $_POST["ko"];
  $cn	= $_POST["cn"];
  $vn	= $_POST["vn"];
  $id	= $_POST["id"];
  $mm	= $_POST["mm"];
  $km	= $_POST["km"];
  $la	= $_POST["la"];

  if($en == "" || $th == "" || $jp == "" || $ko == "" || $cn == "" || $vn == "" || $id == "" || $mm == "" || $km == "" || $la == "")
  {
    $data = array(
      'msg' 		=>	$lang_message[7],
      'status'	=>	false
    );
  }
  else
  {
    $sql = "update IGNORE `bom_tb_lang_page` SET `en`= '".$en."', `th`= '".$th."', `jp`= '".$jp."', `ko`= '".$ko."', `cn`= '".$cn."', `vn`= '".$vn."', `id`= '".$id."', `mm`= '".$mm."', `km`= '".$km."', `la`= '".$la."' WHERE lang_id = $lang_id";
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
// else if($_POST["bt"] == "edit")
// {
// 	$u_id = $_POST["sub_id"];
// 	// $u_user 	= $usermain.$_POST[username];
// 	$u_name 	= $_POST["name"];
// 	$u_pass 	= $_POST["password"];
// 	$u_active	= $_POST["status"];

// 	$u_mm = "mm";

// 	for($mm=1;$mm<=11;$mm++){
// 		if($_POST["ckOpen_".$mm]=="Y"){
// 			$u_mm .= ",1";
// 		}else{
// 			$u_mm .= ",0";
// 		}
// 	}



// 	if($u_pass != "")
// 	{
// 		$update_pass = ",`u_pass`='$u_pass'";
// 	}

// 	$sql = "update IGNORE `bom_tb_agent_use` SET `u_name`= '".$_POST["name"]."' $update_pass ,`u_active`= $u_active ,`u_menu`= '$u_mm' ,`r_id`='".$_SESSION["r_id"]."' WHERE u_id = $u_id";
// 	$rs = sql_query($sql);
	
// 	if($rs)
// 	{
// 		$data = array(
// 			'msg'			=> 	$lang_message[5],
// 			'status' 	=> 	true
// 		);
// 	}
// 	else
// 	{
// 		$data = array(
// 			'msg'     =>  $lang_message[4],
// 			'status'  =>  false
// 		);
// 	}	
// }
// else if($_POST["bt"] == "del")
// {
// 	if(isset($_POST["sub_id"]))
// 	{
// 		$u_id = $_POST["sub_id"];

		
		
// 		$sql ="DELETE FROM `bom_tb_agent_use`  WHERE u_id = $u_id";
// 		$rs = sql_query($sql);

// 		if($rs)
// 		{
// 			$sql ="DELETE FROM `bom_tb_login_ag` WHERE r_use = $u_id";  // ลบประวัติการ login
// 			$rs = sql_query($sql);

// 			$data = array(
// 				'msg'			=>	$lang_message[24],
// 				'status'	=> 	true
// 			);
// 		}
// 		else
// 		{
// 			$data = array(
// 				'msg'     =>  $lang_message[4],
// 				'status'  =>  false
// 			);
// 		}

	
// 	}
// }
// else
// {
// 	$data = array(
// 		'msg'			=>	$lang_message[4],
// 		'status'	=> 	"error"
// 	);
// }

echo json_encode($data);

?>