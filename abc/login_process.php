<?
  session_start();
  require_once('inc/conn.php');
  require_once('inc/function.php');

  $l_user=trim(strtolower($_REQUEST['l_user']));
  $l_pass=trim($_REQUEST['l_pass']);
  $sql = "select * from bom_tb_admin where (a_user='".$l_user."' and a_pass='".$l_pass."')";
  $re = sql_array($sql);

  if($re['a_id']!=""){
    ##################################
    $_SESSION['aid']=$re['a_id'];
    $_SESSION['auser']=$re['a_name'];
    $_SESSION['alevel']=$re['a_level'];
    $token=date("Y-m-d H:i:s");
    $_SESSION['a_token']=$token;

    $sql="update bom_tb_admin set a_login=now(), a_token='$token' where a_id='{$_SESSION['aid']}'";
    sql_query($sql);

    if($re['a_level']==1){
      $_SESSION['bdate2']=_bdate2();
      $sql="select sum(
      ROUND (b_total)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)            
      ) as xtotal
      from bom_tb_football_bill where   b_numstep=1 and b_date='".$_SESSION['bdate2']."'   and b_accept=1  ";
      # $rew1=sql_array($sql);
      $_SESSION['total1']=$rew1['xtotal'];

      $sql="select sum(
      ROUND(  (b_total)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)            
      ) as xtotal
      from bom_tb_football_bill where   b_numstep>=2 and b_date='".$_SESSION['bdate2']."'    and b_accept=1 ";
      # $rew2=sql_array($sql);
      $_SESSION['total2']=$rew2['xtotal'];
    
      $sql="select sum(
      ROUND(  (br_pay_1 - br_bonus_1)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)            
      ) as xtotal
      from bom_tb_football_bill where   b_status!=5 and b_date='".$_SESSION['bdate2']."'    and b_accept=1 ";
      # $rew3=sql_array($sql);
      $_SESSION['total3']=$rew3['xtotal'];
    
      $sql="select sum(
      ROUND(  (b_total)*(( 100-((b_share)+(br_share_7)+(br_share_6)+(br_share_5)+(br_share_4)+(br_share_3)+(br_share_2)+(br_share_1)))/100) ,2)    
      ) as xtotal
      from bom_tb_football_bill where   b_status=5 and b_date='".$_SESSION['bdate2']."'   and b_accept=1  ";
      # $rew4=sql_array($sql);
      $_SESSION['total4']=$rew4['xtotal'];
    }

  $sql=" update bom_tb_admin set a_on='1' where a_id='{$_SESSION['aid']}' ; ";
  sql_query($sql);
  header("Location: index.php");
  exit();
}else{
  $_SESSION['bocklogin']=$_SESSION['bocklogin']+1;
  header("Location: login.php?result=invalid");
  exit();
}