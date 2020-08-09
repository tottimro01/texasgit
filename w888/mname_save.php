<?
  session_start();
  require('inc/conn.php');
  require('inc/function.php');
  require("lang/variable_lang.php");
  // require("lang/member_lang.php");
  if($_SESSION['m_id']!=""){
    $name = trim(htmlspecialchars(addslashes(strip_tags($_POST['mname']))));
    $sql = "select * from bom_tb_member where m_id = '".$_SESSION['m_id']."'";
    $mem = sql_array($sql);

    $sqlCheck = "select m_id, m_user_set from bom_tb_member where m_id != '".$_SESSION['m_id']."' and m_user_set = '$name'";
    $memCheck = sql_array($sqlCheck);

    if($mem['m_id']!="" && strlen($name) >= 5){
      if(is_null($memCheck)){
        if($mem['m_user_set']==""){
          $sql = "update bom_tb_member set m_user_set = '$name' where m_id = '".$mem['m_id']."'";
          $res = sql_query($sql);  
          $_SESSION['m_user_set'] = $name;    
          $response = array('status' => 1, 'msg' => "", 'mname' => $name,);
        }else{
          $response = array('status' => 1, 'msg' => "", 'mname' => $mem['m_user_set'],);
          $_SESSION['m_user_set'] = $mem['m_user_set'];
        }
      }else{
        $response = array('status' => 3, 'msg' => $lang_member[1906],);
      }
    }else{
      $response = array('status' => 3, 'msg' => $lang_member[68],);
    }
  }else{
    $response = array('status' => 2, 'msg' => $lang_member[68],);
  }
  echo json_encode($response);
?>