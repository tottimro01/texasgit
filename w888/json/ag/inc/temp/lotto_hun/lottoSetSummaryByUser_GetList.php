<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 	

	require('inc_head_bySession.php');

	$zone = $_POST["zone"];
	$d 	  = $_POST["d"];
	$rob  = $_POST["rob"];

	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
    $sql="select * from bom_tb_member   where  m_agent_id = '$r_agent_id'";   

    $re=sql_query($sql);

    $data = [];
    $data["val"] = [];
    while($rs=sql_fetch($re)){
    		$data["val"][] = array(
    			"mid" => $rs["m_id"],
    			"muser" => $rs["m_user"],
    			"all_r1" => "0.00 ",
          		"all_r2" => "0.00 ",
          		"all_sum" => "0.00  ",
          		"all_r3" => "0.00 ",
          		"all_total" => _cbn(0,2),
    		 );	
    }

    echo json_encode($data);



 ?>


