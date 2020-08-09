<?
	session_start();
	header("Content-type: application/json");

	$postdata = 
	http_build_query(
   	array(
    		'mid' => $_SESSION["mid"],
   	)
	);

	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => $postdata
	    )
	);

	$context  = stream_context_create($opts);
	$result = file_get_contents($_SESSION["url"].'getCredit.php', false, $context);
	$result_enc = json_decode($result,true);

	$_SESSION["mcredit"] = $result_enc["MemberCradit"];
	$_SESSION["mcredit_acp"] = $result_enc["MemberCraditAcp"]; 
	$_SESSION["mcredit_old"] = $result_enc["MemberCraditOld"]; 

	$res = array('MemberCradit' => $_SESSION["mcredit"], 'MemberCraditAcp' => $_SESSION["mcredit_acp"], 'MemberCraditOld' => $_SESSION["mcredit_old"]);

	echo json_encode($res);
	die();



