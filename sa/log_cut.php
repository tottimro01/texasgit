<? ob_start();
if (!isset($_SESSION)) {
  session_start();
} ?>
<meta charset="utf-8">
<?
require('inc/conn.php');
require('inc/function.php');

if ($_GET[nclick] <= 1 || $_GET[nclick] == "") {
  echo '<script>alert("ข้อมูลไม่ถูกต้อง");</script>';
  exit();
}


$nfile = md5($_GET[billid] . "_" . $_GET[dtype]);
$nwfile = "json_log/" . $nfile . ".json";
$arr_setting = json_read($nwfile);
$nclick = $_GET[nclick] - $arr_setting["click"];
if ($nclick == 1) {
  echo '<script>alert("มีการทำรายการเรียบร้อยแล้ว");</script>';
} else {
  ########################ถอน
  $_GET[sum] = (str_replace(",", "", $_GET[sum]));
  if ($_GET[sum] < 0) {
    $_GET[sum] = 0;
  }

  $sql = "select m_count ,m_id,r_id,m_agent_id  from bom_tb_member where   m_id='$_GET[mid]'";
  $re = sql_array($sql);

  if ($re[m_count] < $_GET[sum]) {
    echo '<script>alert("ยอดเครดิตคงเหลือไม่เพียงพอ");</script>';
  } else {
    $sql_num_error = sql_num("select * from bom_tb_all_payment where bill_id = '$_GET[billid]' and bap_in = '$_GET[sum]'");
    if ($sql_num_error > 1) {

      $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$re[r_id]'");
      #######################################################LOG  
      $log_sum=$re[m_count]-$_GET[sum];
      ######################LOG ใหม่
      $sql="INSERT IGNORE INTO bom_tb_all_payment (
      bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
      bap_before, bap_out ,bap_after,bap_comment,
      bill_id,bap_play_type,
      bap_code,bap_by_type,bap_by_id) values(
      now(),'"._bIP()."', '12', '$re[m_id]','$re[r_id]','$re[m_agent_id]','$rs_ag[r_agent_id]',
      '$re[m_count]' ,'$_GET[sum]','$log_sum','ระบบถอนเงินจากรายการซ้ำ',
      '$_GET[billid]' , 1 , 
      'AOT',4,'$_SESSION[aid]') ";
      sql_query($sql);  
      ######################LOG ใหม่ 




      $sql = "update bom_tb_member set m_count=m_count-$_GET[sum]  where  m_id='$re[m_id]'";
      $sup = sql_query($sql);
      if ($sup) {

        ############################บัญชี
        /*$sql = "select * from bom_tb_member where m_id='$_GET[mid]' ";
        $rec = sql_array($sql);

        $mtxt = "ถอนเงิน";
        $q_count = $_GET[sum];
        $sum_count = $rec[m_count];
        #$typeby=1;#ฝาก
        $typeby = 2; #ถอน
        $bill = $_GET[billid];
        echo $sql = "insert into bom_tb_all_payment (d_date	,bill_id	,m_id	,d_out	,d_sum, d_by,d_txt,r_id) values (now(),'$bill','$rec[m_id]','$q_count','$sum_count','$typeby','$mtxt','77777');";
        sql_query($sql);*/
        ############################บัญชี

        $arr_wfile = array();
        $arr_wfile["billid"] = $bill;
        $arr_wfile["sum"] = $q_count;
        $arr_wfile["m_count"] = $sum_count;
        $arr_wfile["mtxt"] = $mtxt;
        $arr_wfile["dtype"] = $_GET[dtype];
        $arr_wfile["click"] = $arr_setting["click"] + 1;

        echo "<br>เขียนไฟล์ " . $nwfile . "<br>";
        $txt11 = json_encode($arr_wfile);
        echo $sw = write($nwfile, $txt11, "w+");
      }
    } else {
      echo "ssssss";
    }
  }
}
?>