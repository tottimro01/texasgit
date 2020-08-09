<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
}

require('inc/conn.php');
require('inc/function.php');
require('lang/ag_lang.php');



if($_POST["bt"] == "save")
{


  if($_POST["bank_account_number"] != "" && $_POST["bank_account_name"] != ""  && $_POST["bank_name_id"] != "")
  {

    $bank_name      = $_POST["bank_name_id"];
    $bank_cname     = $_POST["bank_account_name"];
    $bank_code      = $_POST["bank_account_number"];
    $bank_note      = $_POST["bank_account_note"];

    $sql="INSERT IGNORE INTO  bom_tb_bank (`bank_name`, `bank_cname`, `bank_code`,  `bank_note`, `r_id`) values ('$bank_name','$bank_cname','$bank_code','$bank_note','".$_SESSION["r_id"]."')";


    $rs = sql_query($sql);
    if($rs)
    {
      $data = array(
      'msg' => $lang_ag[5],
      'status' => true
      );
    }else{
      $data = array(
          'msg'     =>  $lang_ag[4],
          'status'  =>  false
        );
    }   

  }else{
    $data = array(
        'msg' => $lang_ag[7],
        'status' => false
      );
  } 


}
else if($_POST["bt"] == "edit")
{
  if($_POST["bank_account_number"] != "" && $_POST["bank_account_name"] != "" && $_POST["bank_name_id"] != "" && $_POST["bank_id"] != "")
  {

    $bank_id      = $_POST["bank_id"];
    $bank_name      = $_POST["bank_name_id"];
    $bank_cname     = $_POST["bank_account_name"];
    $bank_code      = $_POST["bank_account_number"];
    $bank_note      = $_POST["bank_account_note"];


    $sql = "update IGNORE `bom_tb_bank` SET `bank_name`= '$bank_name',`bank_cname`='$bank_cname ',`bank_code`='$bank_code',`bank_note`= '$bank_note' WHERE bank_id = '$bank_id'";

    $rs = sql_query($sql);
    if($rs)
    {
      $data = array(
      'msg' => $lang_ag[5],
      'status' => true
      );
    }else{
      $data = array(
          'msg'     =>  $lang_ag[4],
          'status'  =>  false
        );
    }   

  }else{

    $data = array(
        'msg' => $lang_ag[7],
        'status' => false
      );

  } 

}
else if($_POST["bt"] == "del")
{

  

  if($_POST["bank_id"] != "")
  {

    // $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
    // $lv = intval($_SESSION["r_level"])+1;

    // $sql="select m_id , bank_id from bom_tb_member   where  m_agent_id = '$r_agent_id' and bank_id IN (".implode(',',$bank_id_array).")";  

    // $data = array(
    //   'msg' => $lang_ag[6],
    //   'status' => true
    // );
    $bank_id = trim($_POST["bank_id"]);

    $setNull = sql_query("UPDATE bom_tb_member SET bank_id = NULL WHERE bank_id = $bank_id"); 
    $rs = sql_query("delete from bom_tb_bank where bank_id = '$bank_id'");
    
    if($rs)
    {
      $data = array(
        'msg' => $lang_ag[6],
        'status' => true
      );
    }else{
      $data = array(
          'msg'     =>  $lang_ag[4],
          'status'  =>  false
        );
    }

    
  }else{
    $data = array(
        'msg' => $lang_ag[7],
        'status' => false
      );
  } 
    

}else{

  $data = array(
    'msg' => $lang_ag[7],
    'status' => false
  );
}



echo json_encode($data);



 ?>