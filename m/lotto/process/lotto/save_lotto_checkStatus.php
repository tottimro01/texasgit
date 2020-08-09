<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
  header("Content-type: application/json");
  header("Content-type:text/html; charset=UTF-8");        
  header("Cache-Control: no-store, no-cache, must-revalidate");       
  header("Cache-Control: post-check=0, pre-check=0", false);     

  require_once '../../inc/lang.php';
  require_once '../../inc/rsc.php';
  require_once '../../inc/function.php';
  require_once '../../inc/conn.php';

  require_once '../../inc/function_array.php';
  require_once '../../inc/variable_lang.php';


   $fo=$json_dir."ip/".$_SESSION['m_id'].".php";
  require($fo);
  $token_ip = md5($_SERVER['SERVER_ADDR']);
  if($token_ip!=$m_ip){ 
    echo json_encode(array('status' => 0)); 
    exit(); 
  }


  $b_web_from="$check_url";

  $arr = array();
  $arr["res"]=1;

  if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  

    $result = array(
      'massage' => $lang_member[67], 
    );
    echo json_encode(array('status' => 0 , 'result' => $result)); 
    exit();
  }

  if( !strstr($_SERVER['HTTP_REFERER'],$check_url)){
    $result = array(
      'massage' => $lang_member[67], 
    );
    echo json_encode(array('status' => 0 , 'result' => $result)); 
    exit();
  }


  $fo=$json_dir."login/token_bet/".$_SESSION['m_id'].".php";
  if(!file_exists($fo)){

    $result = array(
      'massage' => $lang_member[67], 
    );
    echo json_encode(array('status' => 0 , 'result' => $result)); 
    exit();
  }

  // @require_once($fo);
  // if($_SESSION['bettoken']!=$bet_token){ 
  //   echo json_encode(array('status' => 0));  
  //   exit();
  // }

// ################OPEN BET maintenance 
// $url_file=$json_dir."json/maintenance.json"; 
// $mm_js=file_get_contents2($url_file);
// $jsmm = json_decode($mm_js, true);
// if($jsmm["open"]==0){

//    $result = array(
//       'massage' => "Maintenance", 
//     );
//     echo json_encode(array('status' => 0 , 'result' => $result)); 
//     exit();
// }
  

################OPEN BET LOTTO 
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
##################### รับสูงสุด
$quota_lot=@explode(',',$rec['lot_hun_over']);

if($rec["con_open_lotto_hun"]==0){
  $result = array(
      'massage' => $lang_member[317], 
  );
  echo json_encode(array('status' => 0 , 'result' => $result)); 
  exit();
}

######################ระงับ
if(intval($_SESSION['m1']['m_active'])!=1){ 
  $result = array(
      'massage' => $lang_member[555], 
  );
  echo json_encode(array('status' => 0 , 'result' => $result)); 
  exit();
}


###############ปิดไม่ให้เล่น
$exe1=@explode(",",$_SESSION['m1']['m_open']);
if(intval($exe1[9])!=1){ 
 
  $result = array(
      'massage' => "E21-".$lang_member[555], 
  );
  echo json_encode(array('status' => 0 , 'result' => $result)); 
  exit();

}

 
$rpay=array(); 
$rdis=array(); 
$rmyshare=array(); 
$rag=array(); 

# print_r($_SESSION['arid']);
########################Agent
foreach($_SESSION['arid'] as $rid){
  
  
  ######################ระงับ
  if(intval($_SESSION['ardata'][$rid]['r_active'])!=1)
  { 
     $result = array(
         'massage' => "E22-".$lang_member[555], 
     );
     echo json_encode(array('status' => 0 , 'result' => $result)); 
     exit();
  }
  
  if($_SESSION['m1']['m_lotto_setbet']==1){
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay1']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis1']); 
  }elseif($_SESSION['m1']['m_lotto_setbet']==2){
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay2']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis2']); 
  }else{
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay3']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis3']); 
  }

  
  $rag[]=$rid; 
  $rmyshare[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_myshare']); 
  $mshare=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_share']); 
  $last_rid=$rid; 

}


$mnummax=@explode(',',$_SESSION['m1']['m_lotto_nummax']); 
$mmax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
$mmin=@explode(',',$_SESSION['m1']['m_lotto_min']); 



if($_SESSION['m1']['m_lotto_setbet']==1){
     $mpay=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 
     $mdis=@explode(',',$_SESSION['m1']['m_lotto_dis1']); 
}elseif($_SESSION['m1']['m_lotto_setbet']==2){
     $mpay=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 
     $mdis=@explode(',',$_SESSION['m1']['m_lotto_dis2']); 
}else{
     $mpay=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 
     $mdis=@explode(',',$_SESSION['m1']['m_lotto_dis3']); 
}
  
$setbet=$_SESSION['m1']['m_lotto_setbet'];

#####################################################

$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);

if($re_ok['o_limit_time']<$time_stam){ 
   $result = array(
       'massage' => $lang_member[317], 
   );
   echo json_encode(array('status' => 0 , 'result' => $result)); 
   exit();
}


$view_date=date("d-m-Y",$re_ok['o_limit_time']);
$view_date_bingo=date("Y-m-d H:i:s",$re_ok['o_limit_time']);

$bill_cus_name = mysql_escape_mimic(trim($_POST['mname']));
$bill_no = trim($_POST['poy_num']);

$arr_socket = array();
$arr_in_socket = array();

$sql="select m_id,m_count,bonus_m_id,m_sport_print from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

if($re_m['m_id']==""){  exit();}
if($re_m['m_count']<=0){$re_m['m_count']=0;}
$re_m['m_count']=intval($re_m['m_count']);
$_SESSION['xcount']=$re_m['m_count'];

if($re_m['m_count']<=0){
  $result = array(
       'massage' => "<b class='cr'>$lang_member[633] : $re_m[m_count]</b>", 
   );
   echo json_encode(array('status' => 0 , 'result' => $result)); 
   exit();

}


$sql="INSERT IGNORE INTO bom_tb_lotto_bill_live (b_date,  b_timestam, b_datenow , m_id  ,b_ip ,ok_id  ,lot_zone,  lot_rob, b_date_bingo, r_agent_id, b_web_from,b_name,b_no , bonus_m_id, r_id, com_af, b_setbet
) values(
'$view_date','$time_stam',now(),'".$_SESSION['m_id']."','"._bIP()."','$re_ok[ok_id]','$zone','$rob' , '$view_date_bingo','$_SESSION[r_agent_id]' ,'$b_web_from', '$bill_cus_name', '$bill_no','$re_m[bonus_m_id]' , '".$_SESSION['cr_id']."' ,'$af_lotto','$setbet'
); ";
sql_query($sql);

$sql="select bill_id  from bom_tb_lotto_bill_live   where m_id='".$_SESSION['m_id']."' and lot_zone='$zone' and  lot_rob='$rob'  order by bill_id desc limit 1";
$reeb=sql_array($sql);

$_SESSION['count_sum3t']=0;
$_SESSION['count_sum']=0;
$_SESSION['count_dis']=0;

$_SESSION['count_dis1']=0;
$_SESSION['count_dis2']=0;
$_SESSION['count_dis3']=0;
$_SESSION['count_dis4']=0;
$_SESSION['count_dis5']=0;
$_SESSION['count_dis6']=0;
$_SESSION['count_dis7']=0;
$_SESSION['count_dis8']=0;

$count_num=array();
$error_id=array();
$_SESSION['error']=array();


$ar = $_REQUEST['lotto'];     
$ttlot = $_POST['tlot']; 

$emax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
$emin=@explode(',',$_SESSION['m1']['m_lotto_min']); 


?>