<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $pass = $_POST['password'];
  $new_pass = $_POST['new_password'];
  $con_pass = $_POST['con_password'];
  
  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  $sql = "SELECT a_pass FROM bom_tb_admin WHERE a_id = '{$_SESSION['aid']}'";
  $admin = sql_array($sql);

  if($pass != "" && $new_pass != "" && $con_pass != ""){
    if($admin != null && $admin['a_pass']==$pass){
      if($new_pass == $con_pass){
        $sql = "UPDATE bom_tb_admin SET a_pass = '$new_pass' WHERE a_id = '{$_SESSION['aid']}'";
        $up = sql_query($sql);  
        $res = array('status' => 1, 'msg' => 'เปลี่ยนรหัสผ่านสำเร็จ',);
      }else{
        $res = array('status' => 0, 'msg' => 'รหัสผ่านไม่ตรงกัน');
      }
    }else{
      $res = array('status' => 0, 'msg' => 'รหัสผ่านไม่ถูกต้อง',);
    }
  }else{
    $res = array('status' => 0, 'msg' => 'กรุณากรอกข้อมูลให้ครบ',);
  }
  

  echo json_encode($res)
?>