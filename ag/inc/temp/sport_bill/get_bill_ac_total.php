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


	$c_date=" and b_date='$_GET[d]'";

	if($_GET[q]!=""){
		$qq="and (bill_id like '$_GET[q]' )";
		$c_date=" ";
	}

	#if($_GET[type]!=""){ $type="and b_rob='$_GET[rob]'";}
	if($_GET[b]!=""){ 
		if($_GET[b]==1){
		 	 $bet="and b_numstep='$_GET[b]'";   
		  }else{
			 $bet="and b_numstep>='$_GET[b]'";   
		 }
	}

	$user = array();
	if($_GET[shop]!=""){ 
		$shop="and r_agent_id like '%*$_GET[shop]*%'";
	}


  	if($_GET[mid]!=""){ $xmid="and m_id='$_GET[mid]'";}
	if($_GET[out]==1){ $b_out="and b_status=5 ";}
	if($_GET[bill]!=""){ $xbill=' and bill_id in ('.$_GET[bill].')';}


	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";

// 	$sql="select sum(b_total) as total,
//  sum(
// case when  	br_pay_1 > 0 then b_total-br_pay_1
// else  0  end			
// 	) as dis
// ,sum(br_bonus_1) as bonus
//  from bom_tb_football_bill where  	 b_confirm = 1  $c_date and r_agent_id = '$r_agent_id'  $type $bet  $shop  $qq   $xmid $xbill  $b_out";
// 	$ree1=sql_array($sql);

	$sql1 = $sql;
	
		$sql="select sum(b_total) as total,
 sum(
case when  	br_pay_1 > 0 then b_total-br_pay_1
else  0  end			
	) as dis
,sum(br_bonus_1) as bonus
 from bom_tb_football_bill_live where  	 b_confirm = 1  $c_date and r_agent_id = '$r_agent_id'  $type $bet  $shop  $qq   $xmid $xbill  $b_out";

 		$ree2=sql_array($sql);

 			// echo number_format($ree1[total]+$ree2[total]);

 			// echo number_format($ree1[bonus]+$ree2[bonus]);

 			$array_item = array();

 			$array_item['sum1'] = 	number_format($ree1[total]+$ree2[total]);
 			$array_item['sum2'] = 	number_format($ree1[bonus]+$ree2[bonus]);

 		echo json_encode($array_item);


 ?>