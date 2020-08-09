<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
		
	require('../../conn.php');
	require('../../function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../../../lang/ag_lang.php');
	require('../../../lang/function_array.php');

	$arr = array();
	$have_live = 0;
	$y=0;
	$i=0;
	$arr["bill"] = "";

	foreach($_POST["Checkrow"] as &$value){

			$_GET[id]=$value;
			if($arr["bill"]==""){
				$arr["bill"] = "$value";
			}else{
				$arr["bill"] .= ",$value";
			}

			$y++;
			$rs_bill = sql_array("select * from bom_tb_football_bill_live where bill_id='$_GET[id]'");

			if($rs_bill["b_running"]>0 || $rs_bill["b_running_step"]>0)
			{
				$have_live = 1;
			}

			$sql="update IGNORE bom_tb_football_bill_live set b_confirm=0  where  bill_id='$_GET[id]'   and r_id='$_SESSION[rid]'";
			sql_query($sql);

			$sql="update IGNORE bom_tb_football_bill_play_live set b_confirm=0  where  bill_id='$_GET[id]'   and r_id='$_SESSION[rid]'";
			sql_query($sql);

			$ss=1;
			/*$sql="update IGNORE bom_tb_football_bill_live set b_accept=$ss  where b_accept=0 and m_accept=0 and  bill_id='$_GET[id]'   and r_id='$_SESSION[rid]'";
			sql_query($sql);
			$sql="update IGNORE bom_tb_football_bill_play_live set b_accept=$ss  where   b_accept=0 and  m_accept=0  and    bill_id='$_GET[id]'   and r_id='$_SESSION[rid]' ";
			sql_query($sql);

			$ss=3;
			$sm=1;
			$sql="update IGNORE bom_tb_football_bill_live set b_accept=$ss , m_accept=$sm             where b_accept=3  and    m_accept=0 and  bill_id='$_GET[id]'   and r_id='$_SESSION[rid]'";
			sql_query($sql);
			$sql="update IGNORE bom_tb_football_bill_play_live set b_accept=$ss  , m_accept=$sm , play_timestam='$time_stam'    where  b_accept=3 and   m_accept=0 and    bill_id='$_GET[id]'   and r_id='$_SESSION[rid]' ";
			sql_query($sql);*/

			$i++;
	}


	if($have_live==1){
		$arr["coundow"] = 1;
	}else{
		$arr["coundow"] = 0;
	}
		$arr["status"] = 1;
	echo json_encode($arr);

?>
