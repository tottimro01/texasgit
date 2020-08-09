<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 	

  require('inc_head_bySession.php');

	$zone = $_POST["zone"];
	$d 	  = $_POST["d"];
	$rob  = $_POST["rob"];
  $mid  = $_POST["mid"];

	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";


  $sql="select * from bom_tb_member   where  m_agent_id = '$r_agent_id' and m_id = ".$mid."";   
  $rs = sql_array($sql);

  
  $data = [];
  $data["val"] = [];
  for ($i=0; $i <= 5; $i++)
  {
  $data["val"][] = array(
         "mid" => $rs["m_id"],
         "muser" => $rs["m_user"],
         "number" => "123 : [".$lotHun_typeArry[1]."]",
         "user" => "aaaa03",
         "r1" => "0.00",
         "r2" => "0.00",
         "sum" => "0.00",
         "r3" => "0.00",
         "total" => _cbn(0.00,2),
        ); 
}

$data["muser"] = $rs["m_user"]; 
$data["mid"] =   $rs["m_id"]; 

echo json_encode($data);



 ?>


