<?
  session_start();
  require('inc/conn.php');
  require('inc/function.php');
  // require("lang/member_lang.php");
  require("lang/variable_lang.php");
  
  if($_SESSION['m_id']!=""){
    $timezone = $_POST['timezone'];
    $sql = "select * from bom_tb_member where m_id = '".$_SESSION['m_id']."'";
    $mem = sql_array($sql);
    if(array_key_exists(strtolower($timezone), $timezoneArr)){
      $sql = "update bom_tb_member set m_timezone = '$timezone' where m_id = '".$mem['m_id']."'";
      sql_query($sql);  
      $_SESSION['m_timezone'] = $timezone;    

      $tz = new DateTimeZone($timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code']);
      $timestamp = time();
      $dt = new DateTime();
      $dt->setTimezone($tz);
      $dt->setTimestamp($timestamp);
      $tsm = $dt->format('Y-m-d H:i:s');
      $response = array('status' => 1, 'msg' => "", 'timezone' => $timezone, 'timenow' => $tsm);
    }else{
      $response = array('status' => 3, 'msg' => $lang_member[68],);
    }
  }else{
    $response = array('status' => 2, 'msg' => $lang_member[68],);
  }
  echo json_encode($response);
?>