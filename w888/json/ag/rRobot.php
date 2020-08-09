<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_'.$_SESSION["AGlang"].'.php');
  include "inc/function.php";


	$optionPage["listCount"] = 0;
	$optionPage["page"] =1;

	$data = array(
		"list" => "<tr><td colspan=\"16\" align=\"center\" class=\"text-danger\">".$lang_message[1]."</td></tr>",
		"optionPage" => $optionPage,
		"status" => true
	);


	echo json_encode($data);

 ?>	