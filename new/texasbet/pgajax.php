<?php
	
		include 'inc/lang.php';
	include 'inc/rsc.php';
	include 'inc/conn.php';
	include 'inc/function.php';
	include 'inc/variable_lang.php';

	$data = null;
	$act = $_POST['ACT'];
	if(isset($_POST['JT'])){
		$jt = json_decode($_POST['JT'], true);
		// $jt = json_encode($jt);
	}

	switch ($act) {
		case 'CHKTT':
			$data = array(0,0);
			break;

		case 'STATEMENT':
			include 'process/statement.php';
			break;

		case 'ACC':
			include 'process/acc.php';
			break;

		case 'TRANSFER':
			include 'doc/transfer.php';
			break;

		case 'PASS':
			include 'doc/changepwd.php';
			break;

		case 'LANG':
			include 'doc/changelang.php';
			break;

		case 'HOME':
			include 'doc/home.php';
			break;
		
		default:
			# code...
			break;
	}

	// echo json_encode($data);
?>