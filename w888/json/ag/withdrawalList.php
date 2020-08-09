<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_'.$_SESSION["AGlang"].'.php');

	$optionPage["listCount"] = 0;
	$optionPage["page"] =1;

	$data = array(
		"list" => "<tr><td colspan=\"11\"><center>$lang_deposit[26]</center></td></tr>",
		"optionPage" => $optionPage,
		"status" => true
	);


	echo json_encode($data);

 ?>	