<?
	session_start();
	header("Content-type: text/html");
	$cmd = $_GET['cmd'];

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';


    $mid = $_SESSION['m_id'];
	$old_password = md5($_POST["old_password"]);
	$new_password = md5($_POST["new_password"]);
	$con_password = md5($_POST["con_password"]);


	$sql = "SELECT * FROM `bom_tb_member` WHERE m_id = '$mid'";
	$re=sql_array($sql);

	$array_list = array();
	if(empty($_POST["old_password"]) || empty($_POST["new_password"]) || empty($_POST["con_password"]))
	{
		$array_list = array(
			'msg' => $lang_member[2236], 
			'status' => 2, 
		);
	}
	else if($new_password != $con_password)
	{
		$array_list = array(
			'msg' => $lang_member[1048], 
			'status' => 2, 
		);
	}else if($old_password != $re['m_pass']) 
	{
		$array_list = array(
			'msg' => $lang_member[2237], 
			'status' => 2, 
		);
	}else{

		$sql="update bom_tb_member set m_pass='$new_password' where m_id = '$mid'";
		$re=sql_array($sql);

		$array_list = array(
			'msg' => $lang_member[629], 
			'status' => 1, 
		);
	}

	echo json_encode($array_list);


 ?>