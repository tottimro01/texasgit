<?
	session_start();
	require('inc/conn.php');
	// require("lang/member_lang.php");
  require("lang/variable_lang.php");

	header("Content-type: application/json");
	$res = array('status' => 0, 'msg' => $lang_member[57]);
	if(isset($_POST["link_name"]) && !empty($_POST["link_name"])) {
		$_name = trim($_POST["link_name"]);

		$validate = true;
		if(strlen($_name) < 5) { 
			$validate = false; 
			//$res = array('status' => 3, 'msg' => $lang_x[33]);
			$res = array('status' => 3, 'msg' => "ชื่อแนะนำต้องมีความยาวไม่น้อยกว่า 5 ตัวอักษร");
		}

		if (preg_match('/[^A-Za-z0-9.-]/', $_name)) {
		  	$validate = false; 
			$res = array('status' => 3, 'msg' => $lang_member[1085]);
		}
		
		if(sql_num("select * from bom_tb_member where m_user_set = '$_name' and m_id <> '".$_SESSION['m_id']."'")>0){
			$validate = false; 
			$res = array('status' => 3, 'msg' => $lang_member[1086]);
		}


		if ($validate===true) {
			$sql = "update bom_tb_member set m_user_set = '$_name' where m_id = '".$_SESSION['m_id']."' ";
			if(sql_query($sql)===true) {
				$res = array('status' => 1, 'msg' => $lang_x[31]);
			} else {
				$res = array('status' => 2, 'msg' => $lang_member[57]);
			}
		} 
	}

	echo json_encode($res);
?>