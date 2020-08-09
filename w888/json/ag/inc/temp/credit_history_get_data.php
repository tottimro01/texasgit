<?php 
require('inc_head_bySession.php');


$view_date=_bdate();

if(empty($_POST["sdate"]) || empty($_POST["edate"]))
{
  $_d=$view_date;
  $_e=$view_date;
}else{
  $_d = $_POST["sdate"];
  $_e = $_POST["edate"];
}

$e1=explode("-",$_d);
  $dbg=mktime(9,0,0,$e1[1],$e1[0],$e1[2]);
$e2=explode("-",$_e);
  $dbe=mktime(8,59,59,$e2[1],$e2[0]+1,$e2[2]);

  $datediff = $dbe-$dbg;
  $num_date = floor($datediff / (60 * 60 * 24));
if($num_date>90){
  $_e = date("d-m-Y", strtotime("+90 day", $dbg));
}
$eshow=explode("-",$_d);
  $dbg_show=mktime(9,0,0,$e1[1],$e1[0],$e1[2]);
$e2show=explode("-",$_e);
  $dbe_show=mktime(8,59,59,$e2[1],$e2[0]+1,$e2[2]);

$dsearch = date("Y-m-d H:i:s" , $dbg_show);
$esearch = date("Y-m-d H:i:s" , $dbe_show);

$r_agent_id = ($_POST['up_r_agent_id'] == "") ? $_SESSION['r_agent_id'].$_SESSION['r_id']."*" : $_POST['up_r_agent_id'];
$lv = ($_POST['ulv'] == "") ? intval($_SESSION["uplevel"]) : $_POST['ulv'];
$r_id = $_POST['id'];


// ดึงข้อมูล agent ภายใต้
$sql_agent =  "select r_id , r_name , r_user , r_agent_id , r_level from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv";
$result_agent = sql_query($sql_agent);

$agent_list = array();
$up_r_agent_id  = array();
while($rs = sql_fetch_as($result_agent))
{
  $_up_r_agent_id = $rs['r_agent_id'].$rs['r_id']."*";
  $agent_list[$rs['r_id']] = $rs;
  $agent_list[$rs['r_id']]['quantity'] = [];
  $agent_list[$rs['r_id']]['change'] = number_format(0,2);
  $agent_list[$rs['r_id']]['up_r_agent_id'] = $_up_r_agent_id;
  $up_r_agent_id[] = $_up_r_agent_id;
}


// ดึงประวัติการเงิน 
$sql_payment = "select * from bom_tb_payment where `r_agent_id` IN ('".implode('\',\'', $up_r_agent_id)."')  and `m_id` IS NOT NULL and p_date between '$dsearch' and '$esearch'";
$result_payment = sql_query($sql_payment);

while($row = sql_fetch_as($result_payment))
{
  $ex_r_agent_id = explode("*", $row["r_agent_id"]);
  $_r_id = intval(end(array_filter($ex_r_agent_id)));
  $agent_list[$_r_id]["quantity"][]  = array(
    'p_id'    =>  $row["p_id"], 
    'p_date'  =>  $row["p_date"],
    'p_from'  =>  $row["p_from"],
    'p_bet'   =>  $row["p_bet"],
    'p_pay'   =>  $row["p_pay"],
    'p_type'  =>  $row["p_type"],
    'p_bank'  =>  $row["p_bank"],
    'm_id'    =>  $row["m_id"],
  );
}

$arry["head"]= $lang_credit_history[6]." {$_POST['sdate']} - {$_POST['edate']}";
$arry["data"]["date"]["dsearch"] = $_d;
$arry["data"]["date"]["esearch"] = $_e;
$arry["data"]["agent_list"] = $agent_list;

// ปุ่น ย้อนกลับ agent levet ก่อนหน้า
$r_agent_id_level = explode("*",$r_agent_id);
$r_agent_id_level = array_filter($r_agent_id_level);

$back_r_agent_id = "*";
$numItems  = count($r_agent_id_level);
$i = 0;
foreach ($r_agent_id_level as $key => $value) { 
  if($numItems > 1)
  {
    if(++$i != $numItems) {
      $back_r_agent_id .= $value."*";
    }
  }else{
     $back_r_agent_id .= $value."*";
  }   
}

$back_id = ($r_agent_id_level[($lv-2)] == null) ? $_SESSION['r_id'] : $r_agent_id_level[($lv-2)];
$back_lv = (($lv-2) == 0) ? 1 : ($lv-2);
$arry["back"] = "getMenu('credit_history','?id=".$back_id."&lv=".$back_lv."&up_r_agent_id=".$back_r_agent_id."&sdate=$_d&edate=$_e');";


echo json_encode($arry);


 ?>