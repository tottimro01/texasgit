<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php

require('../inc/conn.php');
require('../inc/function.php');

//require("../lang/member_lang.php");


$tuser = trim($_REQUEST['tuser']);    
$tpass = trim($_REQUEST['tpass']);    
$tpassc = trim($_REQUEST['tpassc']);    
$tphone = trim($_REQUEST['tphone']);    
$tbank = trim($_REQUEST['tbank']);    
$tbcode = trim($_REQUEST['tbcode']);    
// $tbname = trim($_REQUEST['tbname']);    
// $tbpass = trim($_REQUEST['tbpass']); 
$tbname = null;     
$tbpass = null;    

$rid = trim($_REQUEST['rid']);    
$fby = trim($_REQUEST['fby']);    


if($tpass!=$tpassc){
  $alert='<span class="cr">E1-ยืนยันรหัสผ่านไม่ตรงกัน</span>';
}else{
  $sql="select * from  bom_tb_member where     (m_phone='$tphone' or m_b_code='$tbcode' or m_user = '$tuser')";
  $rex=sql_array($sql);

  if($rex[m_id]!=""){
    $alert='<span class="cr">มีผู้ใช้งานนี้แล้วในระบบ</span>';
  }else{
    $rs_mem_use = sql_array("select * from  bom_tb_member where m_id = '$fby'");
    $sql="select * from  bom_tb_agent where     r_id='$rid' and r_id = '$rs_mem_use[r_id]'";
    $rer=sql_array($sql);

    $smsto=$tphone;
    $text="www.wan1991.com User:$tphone     Pass:$tpass";
    $tpass = md5($tpass);

    if($rer["r_id"]!=""){

      $rs_banks = sql_query("select * from bom_tb_bank where r_id = '$rer[r_id]' order by bank_id asc");
      $rs_1st_bank = null;
      $rs_main_bank = null;
      $rs_main2_bank = null;
      $rs_same_bank = null;
      $ii = 0;
      while ($bnk = sql_fetch($rs_banks)) {
        if($bnk['bank_name'] == 1 && $rs_main_bank === null){   
          $rs_main_bank = $bnk;
        }else if($bnk['bank_name'] == 2 && $rs_main2_bank === null){     
          $rs_same_bank = $bnk;
        }else if($bnk['bank_name'] == $tbank && $rs_same_bank === null){     
          $rs_same_bank = $bnk;
        }
        if($ii == 0){
           $rs_1st_bank = $bnk;
        }
        $ii++;
      }


      if($ii > 0){
        if($rs_main_bank !== null){
          $ag_bank_id = $rs_main_bank['bank_id']; // ถ้า ag มีกสิกร ให้ผูกกับกสิกร
          $ag_bank = $rs_main_bank;
        }
        else if($rs_main2_bank !== null){
          $ag_bank_id = $rs_main2_bank['bank_id']; // ถ้า ag ไม่มีกสิกร แต่ไทยพาณิชย์ ให้ผูกไทยพาณิชย์
          $ag_bank = $rs_same_bank;
        }
        else if($rs_same_bank !== null){
          $ag_bank_id = $rs_same_bank['bank_id']; // ถ้า ag ไม่มีกสิกร แต่มีบัญชีธนาคารเดียวกับลูกค้า
          $ag_bank = $rs_same_bank;
        }
        else{ 
          $ag_bank_id = $rs_1st_bank['bank_id'];  // ถ้า ag ไม่มีกสิกร หรือบัญชีธนาคารเดียวกับลูกค้า ให้ผูกกับบัญชีแรกที่ ag มี
          $ag_bank = $rs_1st_bank;
        }
      }else{
        $ag_bank_id = 0;
      }

      $m_b_type = 0;
      if($ag_bank_id != 0){
        if(($tbank == 1 && $ag_bank['bank_name'] == 1) || ($tbank == 1 && $ag_bank['bank_name'] == 2) || ($tbank == 2 && $ag_bank['bank_name'] == 1)){
          if($ag_bank['bank_auto'] == 1){
            $m_b_type = 2;
          } else{
            $m_b_type = 1;
          }
        } else {
          $m_b_type = 1;
        }
      }

      // $rs_bank = sql_array("select * from bom_tb_bank where bank_name = '$tbank' and r_id = '$rer[r_id]' order by bank_id desc limit 1");

      // if($rs_bank[bank_id]==""){
      //   $rs_bank = sql_array("select * from bom_tb_bank where bank_name = '1' and r_id = '$rer[r_id]' order by bank_id desc limit 1");

      //   if($rs_bank[bank_id]==""){
      //     $rs_bank = sql_array("select * from bom_tb_bank where r_id = '$rer[r_id]' order by bank_id desc limit 1");
      //   }
      

      $sql="INSERT IGNORE INTO bom_tb_member (m_name,	m_phone,	m_user,	m_pass,	m_regis, m_count	,m_count_de ,m_b_pass	,m_b_bank,	m_b_code	,m_b_name  ,bank_id ,m_agent_id ,m_ref ,bonus_m_id , m_open , m_currency , m_confirm , m_sport_confirm_bill , m_sport_line , m_sport_print , m_level , m_active , m_active_bet  , m_type ,r_id

      ,m_sport_share,m_sport_myshare,	m_sport_force , m_sport_share_live , m_sport_myshare_live , m_sport_force_live , m_sport_dis , m_sport_max , m_sport_min , m_sport_over , m_nam , m_sport_nam_tor , m_sport_nam_rong , m_sport_nam_tor_live , m_sport_nam_rong_live , m_sport_step2 , m_sport_step_over , m_sport_step_max , m_sport_step_min , m_sport_step_day , m_sport_step_paymax , m_sport_step_dis , m_sport_delete_bill , m_sport_message_bin

      , m_games_share , m_games_myshare , m_games_force , m_games_dis , m_games_max , m_games_min , m_games_over 

      , m_lotto_del , m_lotto_convert , m_lotto_nummax , m_lotto_max , m_lotto_min , m_lotto_over,m_lotto_share,m_lotto_force,	m_lotto_myshare , m_lotto_open , m_lotto_pay1 , m_lotto_dis1 , m_lotto_pay2 , m_lotto_dis2 , m_lotto_pay3 , m_lotto_dis3 ,m_lotto_setbet

      , m_lotto_hun_nummax , m_lotto_hun_max , m_lotto_hun_min , m_lotto_hun_over , m_lotto_hun_share , m_lotto_hun_force , m_lotto_hun_myshare , m_lotto_hun_open , m_lotto_hun_pay1 , m_lotto_hun_dis1 , m_lotto_hun_pay2 , m_lotto_hun_dis2 , m_lotto_hun_pay3 , m_lotto_hun_dis3 ,m_lotto_hun_setbet

      ,m_lotto_hun_set_share,m_lotto_hun_set_myshare,m_lotto_hun_set_force,m_lotto_hun_set_pay,m_lotto_hun_set_price

      ,m_casino_max,m_casino_min,m_casino_over,m_casino_dis,m_casino_share,m_casino_force, m_casino_myshare ,m_casino_open, m_b_type )
      values
      ('$tphone','$tphone','$tuser','$tpass',now(),'0','0','$tbpass','$tbank','$tbcode','$tbname' ,'$ag_bank_id','$rs_mem_use[m_agent_id]', '$_SESSION[HTTP_REFERER]','$fby' , '$rs_mem_use[m_open]' , '$rs_mem_use[m_currency]' , '$rs_mem_use[m_confirm]' , '$rs_mem_use[m_sport_confirm_bill]' , '$rs_mem_use[m_sport_line]' , '$rs_mem_use[m_sport_print]' , '$rs_mem_use[m_level]' , '$rs_mem_use[m_active]' , '$rs_mem_use[m_active_bet]'  , '$rs_mem_use[m_type]'  , '$rs_mem_use[r_id]'

      , '$rs_mem_use[m_sport_share]' , '$rs_mem_use[m_sport_myshare]' , '$rs_mem_use[m_sport_force]' , '$rs_mem_use[m_sport_share_live]' , '$rs_mem_use[m_sport_myshare_live]' , '$rs_mem_use[m_sport_force_live]' , '$rs_mem_use[m_sport_dis]' , '$rs_mem_use[m_sport_max]' , '$rs_mem_use[m_sport_min]' , '$rs_mem_use[m_sport_over]' , '$rs_mem_use[m_nam]' , '$rs_mem_use[m_sport_nam_tor]' , '$rs_mem_use[m_sport_nam_rong]' , '$rs_mem_use[m_sport_nam_tor_live]' , '$rs_mem_use[m_sport_nam_rong_live]' , '$rs_mem_use[m_sport_step2]' , '$rs_mem_use[m_sport_step_over]' , '$rs_mem_use[m_sport_step_max]' , '$rs_mem_use[m_sport_step_min]' , '$rs_mem_use[m_sport_step_day]' , '$rs_mem_use[m_sport_step_paymax]' , '$rs_mem_use[m_sport_step_dis]' , '$rs_mem_use[m_sport_delete_bill]' , '$rs_mem_use[m_sport_message_bin]' 

      , '$rs_mem_use[m_games_share]' , '$rs_mem_use[m_games_myshare]' , '$rs_mem_use[m_games_force]' , '$rs_mem_use[m_games_dis]' , '$rs_mem_use[m_games_max]' , '$rs_mem_use[m_games_min]' , '$rs_mem_use[m_games_over]' , '$rs_mem_use[m_lotto_del]' , '$rs_mem_use[m_lotto_convert]' , '$rs_mem_use[m_lotto_nummax]' , '$rs_mem_use[m_lotto_max]' , '$rs_mem_use[m_lotto_min]' , '$rs_mem_use[m_lotto_over]' , '$rs_mem_use[m_lotto_share]' , '$rs_mem_use[m_lotto_force]' , '$rs_mem_use[m_lotto_myshare]' , 'open,1,0,0' , '$rs_mem_use[m_lotto_pay1]' , '$rs_mem_use[m_lotto_dis1]' , '$rs_mem_use[m_lotto_pay2]' , '$rs_mem_use[m_lotto_dis2]' , '$rs_mem_use[m_lotto_pay3]' , '$rs_mem_use[m_lotto_dis3]' ,1

      , '$rs_mem_use[m_lotto_hun_nummax]' , '$rs_mem_use[m_lotto_hun_max]' , '$rs_mem_use[m_lotto_hun_min]' , '$rs_mem_use[m_lotto_hun_over]' , '$rs_mem_use[m_lotto_hun_share]' , '$rs_mem_use[m_lotto_hun_force]' , '$rs_mem_use[m_lotto_hun_myshare]' , 'open,1,0,0' , '$rs_mem_use[m_lotto_hun_pay1]' , '$rs_mem_use[m_lotto_hun_dis1]' , '$rs_mem_use[m_lotto_hun_pay2]' , '$rs_mem_use[m_lotto_hun_dis2]' , '$rs_mem_use[m_lotto_hun_pay3]' , '$rs_mem_use[m_lotto_hun_dis3]' ,1

      , '$rs_mem_use[m_lotto_hun_set_share]' , '$rs_mem_use[m_lotto_hun_set_myshare]' , '$rs_mem_use[m_lotto_hun_set_force]' , '$rs_mem_use[m_lotto_hun_set_pay]' , '$rs_mem_use[m_lotto_hun_set_price]' 

      , '$rs_mem_use[m_casino_max]' , '$rs_mem_use[m_casino_min]' , '$rs_mem_use[m_casino_over]' , '$rs_mem_use[m_casino_dis]' , '$rs_mem_use[m_casino_share]' , '$rs_mem_use[m_casino_force]' , '$rs_mem_use[m_casino_myshare]' , '$rs_mem_use[m_casino_open]', '$m_b_type' )";

      sql_query($sql);

      $_SESSION[ac_ok]='บันทึกสำเร็จ';
      $_SESSION['HTTP_REFERER'] = "";	
		 /*echo"<script language='JavaScript'>
         top.document.location='http://www.ohoking.com/checky_login.php?u=".$tuser."&toke=".($tpass)."';
      </script>";*/


      $ref = ($_SESSION["ref"] != "") ? $_SESSION["ref"] : 'http://www.wan1991.com';
      echo"<script language='JavaScript'>

            $.confirm({
                title: '',
                content: 'สมัครสมาชิกสำเร็จ',
                buttons: {
                    ok: {
                        btnClass: 'btn-green',
                        action: function(){    
                             top.document.location='".$ref."';   
                        }
                    }
                },
            });

         
      </script>";

    }else{

    }
  }
}

// echo "$alert";
if($alert != "")
{
  echo"<script language='JavaScript'>

            $.confirm({
                title: '',
                content: '".$alert."',
                buttons: {
                    ok: {
                       text: 'ตกลง',
                        btnClass: 'btn-red',
                        action: function(){    
                            
                        }
                    }
                },
            });
         
    </script>";
}


?><br>

<link rel="stylesheet" href="regis.css">
<!-- <input name="b_login" type="button" value="สมัครสมาชิก" class="bt" id="b_login" onclick="ConfirmRegis();"/> -->
<button name="b_login" id="b_login" class="bt red-bt" onclick="request_user();">สมัครสมาชิก</button>