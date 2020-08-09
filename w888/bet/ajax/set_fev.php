<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
if($_SESSION["fev_ball"]==""){
	$_SESSION["fev_ball"][] = $_POST["val"];
	echo "FEV";
}else{
	if (in_array($_POST["val"], $_SESSION["fev_ball"])) {
		$a = array();
		$a  = $_SESSION["fev_ball"];
		$_SESSION["fev_ball"] = array();
		foreach ($a as &$value) {
			if($value!=$_POST["val"]){
				$_SESSION["fev_ball"][] = $value;
			}
		}
		echo "NO";
	}else{
		$_SESSION["fev_ball"][] = $_POST["val"];
		echo "FEV";
	}
}
//print_r($_SESSION["fev_ball"]);
?>