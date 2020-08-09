<?
  session_start();
    require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';
  // require("lang/member_lang.php");
  if($_SESSION['m_id']!=""){
    $bank = $_POST['tbank'];
    $name = trim(htmlspecialchars(addslashes(strip_tags($_POST['tbankname']))));
    $num = $_POST['tbanknum'];
    $code = $_POST['tbankcode'];

    if($bank != "" && $name != "" && $num != "" && strlen($code) == 4){
      $sql = "update bom_tb_member set m_b_bank = $bank, m_b_code = '$num', m_b_pass = '$code', m_b_name = '$name' where m_id = '".$_SESSION['m_id']."'";
          $res = sql_query($sql);  

          $_SESSION['m1']['m_b_bank'] = $bank;
          $_SESSION['m1']['m_b_name'] = $name;
          $_SESSION['m1']['m_b_code'] = $num;
      $response = array('status' => 1, 'msg' => 'Successfully',);

    } else{
      $response = array('status' => 2, 'msg' => $lang_member[68],);
    }
  }else{
    $response = array('status' => 2, 'msg' => $lang_member[68],);
  }

  echo json_encode($response);
?>