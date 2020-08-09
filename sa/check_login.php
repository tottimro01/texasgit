<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');



if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}
if($_SESSION[bocklogin]>=5){
      echo"<script language='JavaScript'> top.document.location='block_login.html';</script>";
     exit();
}

$ar_user = $_REQUEST['cuser'];    
$ar_pass = $_REQUEST['cpass'];    
$_POST[l_user]=trim(strtolower($ar_user));
$_POST[l_pass]=trim($ar_pass);

  $sql="select * from bom_tb_admin where (a_user='$_POST[l_user]' and a_pass='$_POST[l_pass]')";
  $re=sql_array($sql);

if($re[a_id]!=""){

  ##################################
  @session_start();
  $_SESSION[aid]=$re[a_id];
  $_SESSION[auser]=$re[a_name];
  $_SESSION[alevel]=$re[a_level];
  $token=date("Y-m-d H:i:s");
  $_SESSION[a_token]=$token;

  $fo="json/login/aid_".$_SESSION["aid"].".php";
  @unlink($fo);
  write($fo,'<? $a_token="'.$token.'"; ?>',"w+"); 

  $sql="update bom_tb_admin set a_login=now(), a_token='$token' where a_id='$_SESSION[aid]'";
  sql_query($sql);

  if($re[a_level]==1){
      $_SESSION[bdate2]=_bdate2();
      $sql="select  sum(
        ROUND(  (b_total)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)            
        ) as xtotal
       from bom_tb_football_bill where   b_numstep=1 and b_date='".$_SESSION[bdate2]."'   and b_accept=1  ";
      $rew1=sql_array($sql);
      $_SESSION[total1]=$rew1[xtotal];


  
      $sql="select  sum(
        ROUND(  (b_total)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)            
        ) as xtotal
        from bom_tb_football_bill where   b_numstep>=2 and b_date='".$_SESSION[bdate2]."'    and b_accept=1 ";
      $rew2=sql_array($sql);
      $_SESSION[total2]=$rew2[xtotal];
  
      $sql="select  sum(
        ROUND(  (br_pay_1 - br_bonus_1)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)) as xtotal from bom_tb_football_bill where   b_status!=5 and b_date='".$_SESSION[bdate2]."'    and b_accept=1 ";
      $rew3=sql_array($sql);
      $_SESSION[total3]=$rew3[xtotal];
  
      $sql="select  sum(
        ROUND(  (b_total)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)    
      ) as xtotal from bom_tb_football_bill where   b_status=5 and b_date='".$_SESSION[bdate2]."'   and b_accept=1  ";
      $rew4=sql_array($sql);
      $_SESSION[total4]=$rew4[xtotal];
  
}



echo"<script language='JavaScript'> top.document.location='main.php';</script>";
exit();

}else{
  $alert='<span class="cr">E2-ชื่อเข้าใช้งานหรือรหัสผ่านผิด</span>';
  $_SESSION[bocklogin]=$_SESSION[bocklogin]+1;
  $_SESSION[bocklogin] = 0;
}

echo "$alert";

?>