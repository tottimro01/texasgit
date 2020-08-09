<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
header("Content-Type: application/json");

if($_POST['lang']=="")
{
  $_SESSION['lang']="th";
}else{
  $_SESSION['lang']=$_POST['lang'];
}
require('../inc/conn.php');
require('../inc/function.php');
require("../lang/variable_lang.php");



    $mid = $_POST['mid'];
    $code4digit = $_POST['code4digit'];
    $amount = floatval(str_replace(",","",$_POST['amount']));
    $lang = $_POST['lang'];

    $sql = "SELECT * FROM `bom_tb_member` WHERE `m_id` = $mid";
    $re = sql_query($sql);
    $re_m = sql_fetch($re);

    $sql = "SELECT * FROM `bom_tb_agent` WHERE `r_id` = $re_m[r_id]";
    $re = sql_query($sql);
    $re_ag = sql_fetch($re);

    // $arr = array();
    // $arr["status"] = 1;//1 สำเร็จ 2 ผิดพลาด
    // $arr["msg"] = "แจ้งถอนสำเร็จ กรุณารอสักครู่";

    $arr = array();
    if($amount!="" and $code4digit!="" and $mid!=""){
      if(floatval($re_m['m_count'])>=$amount){
        if($re_m['m_b_pass']==$code4digit){

            if(floatval($amount) < floatval($re_ag[r_m_withdraw_min]))
            {
              $arr["status"] = 2;
              $arr["msg"] = $lang_member[1661]." ".$re_ag[r_m_withdraw_min]." ".$re_m[m_currency];
            }else if(floatval($amount) > floatval($re_ag[r_m_withdraw_max]))
            {
              $arr["status"] = 2;
              $arr["msg"] = $lang_member[1662]." ".$re_ag[r_m_withdraw_max]." ".$re_m[m_currency];
            }else{
                $sql="select * from bom_tb_trans where t_type=2 and m_id='".$mid."' and t_status=3";
                $num=sql_num($sql);
                if($num==0){
                    $txt="PASS:".$re_m['m_b_pass']."=".$code4digit."@".$re_m['m_b_code']."@".$re_m['m_b_name'];
                    $sql="INSERT IGNORE INTO bom_tb_trans (t_bank, t_note, t_date_bet ,t_date,t_count,t_type,m_id,r_id, t_ip,r_agent_id ) values ('".$re_m['m_b_bank']."', '$txt', now() ,now() , '".$amount."'  , 2 , '".$mid."' , '".$re_m['r_id']."','"._bIP()."','".$re_m['m_agent_id']."')";

                    $rs = sql_query($sql);
                    if($rs)
                    {
                      $ag_update = "UPDATE `bom_tb_agent` SET `r_alert_out`= r_alert_out+1 where r_id = '".$re_m[r_id]."'"; 
                      sql_query($ag_update);  

                      $mem_update = "UPDATE `bom_tb_member` SET `m_count`= m_count-$amount where m_id = '".$mid."'"; 
                      sql_query($mem_update);

                      $rs_tran=sql_array("select * from bom_tb_trans where t_type=2 and m_id='".$mid."' order by t_id desc limit 1");
                      $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '".$re_m['r_id']."'");

                      $log_sum=$re_m['m_count']-$amount;

                      ######################LOG ใหม่
                      $sql="INSERT IGNORE INTO bom_tb_all_payment (
                      bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
                      bap_before, bap_out ,bap_after,bap_comment,
                      bap_code,trans_id) values(
                      now(),'"._bIP()."', '2', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
                      '$re_m[m_count]' ,'-$amount','$log_sum','สมาชิกแจ้งถอนผ่านหน้าเว็บไซต์',
                      'MOT','$rs_tran[t_id]') ";
                      sql_query($sql);  
                      ######################LOG ใหม่ 


                      $arr["status"] = 1;
                      $arr["msg"] = $lang_member[629]; //"สำเร็จ";


                    }else{
                      $arr["status"] = 2;
                      $arr["msg"] = $lang_member[67]; //"ผิดพลาด";
                    }

                }else{
                  $arr["status"] = 2;
                  $arr["msg"] = $lang_member[962]; //"*กรุณารอ แจ้งได้ทีละครั้ง !";
                } 
            }
        }else{
          $arr["status"] = 2;
          $arr["msg"] = $lang_member[2341]; //รหัสถอนเงินไม่ถูกต้อง
        }

      }else{
        $arr["status"] = 2;
        $arr["msg"] = $lang_member[2340]; //"เครดิตคงเหลือไม่พอ";
      }

    }else{
      $arr["status"] = 2;
      $arr["msg"] = $lang_member[2338];  //กรอกข้อมูลไม่ถูกต้อง
    }

    
  echo json_encode($arr);

?>
