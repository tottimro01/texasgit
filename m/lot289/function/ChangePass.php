<?
	session_start();
	header("Content-type: application/json");
	require('../../../inc/conn.php');
	require('../../../inc/function.php');
	if(isset($_POST["pass"]) && !empty($_POST["pass"]) && isset($_POST["cpass"]) && !empty($_POST["cpass"]) && isset($_POST["opass"]) && !empty($_POST["opass"])) {
		include 'function.php'; 
		include 'checkLang.php';
		//check password empty
		if(strlen($_POST["pass"]) == 0 || strlen($_POST["cpass"]) == 0 || strlen($_POST["opass"]) == 0) {
			$result = array('Status' => '0', 'Msg' => $lang_data["enter_data_all"]);
			$result = json_encode($result);
			echo $result;
			die();
		}

		//check old password
		if(!password_verify($_POST["opass"], $_SESSION["p"])) {
			$result = array('Status' => '0', 'Msg' => $lang_data["old_pass_invalid"]);
			$result = json_encode($result);
			echo $result;
			die();
		}

		//check confirm password
		if($_POST["pass"] != $_POST["cpass"]) {
			$result = array('Status' => '0', 'Msg' => $lang_data["confirm_pass"]);
			$result = json_encode($result);
			echo $result;
			die();
		}

		/*$postdata = 
		http_build_query(
    		array(
        		'mid' => $_SESSION["mid"],
        		'sPassword' => $_POST["pass"],
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
		$result = file_get_contents($_SESSION["url"].'changePass.php', false, $context);
		$r_en = json_decode($result, true);*/
		
		
		
		$mid = $_SESSION["mid"];
		$strPassword = md5($_POST["pass"]);
		$arr = array();


		$sql="update bom_tb_member set m_pass='$strPassword' where m_id = '$mid'";
		$re=sql_array($sql);

		$arr["Status"] = "1";
		$arr["Licen"] = "SC";
		
		$result = json_encode($arr);
		$r_en = json_decode($result, true);
		
		
		
		if($r_en["Status"] == '1') {
			$_SESSION["p"] = hpwd($_POST["pass"]);
		}
	}else {
		$result = array('Status' => '0', 'Msg' => 'Error');
		$result = json_encode($result);
	}

	echo $result;
	die();
?>