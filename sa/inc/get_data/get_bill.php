<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

	require('../conn.php');
	require('../function.php');
	require('../../lang/th.php');
	require('../../lang/function_th.php');


	$cc=1;
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

		$sql = "SELECT `m_id`,`m_name`,`m_user` FROM `bom_tb_member` ";
		$re = sql_query($sql);
		while($rs=sql_fetch($re)){
		 	$user[$rs['m_id']]['user'] = $rs['m_user'];
		}

	}else{

		$sql = "SELECT `r_id`,`r_name`,`r_user` FROM `bom_tb_agent` ";
		$re = sql_query($sql);
		while($rs=sql_fetch($re)){
		 	$user[$rs['r_id']]['user'] = $rs['r_user'];
		} 
	}

	// // ดึงตารางบอลตามวันที่
 //  $sql_ball_list = "SELECT * FROM `bom_tb_ball_list` where 1 $c_date";
 //  $re = sql_query_sp($sql_ball_list);
 //  $ball_list = array();
 //  while($rs=sql_fetch($re)){
 //  	$ball_list[$rs["b_id"]] = $rs;
 //  }



  if($_GET[mid]!=""){ $xmid="and m_id='$_GET[mid]'";}
	if($_GET[out]==1){ $b_out="and b_status=5 ";}
	if($_GET[bill]!=""){ $xbill=' and bill_id in ('.$_GET[bill].')';}

	$arr_payok=array();

	if($_GET[orderby]==1){  // ตามชนะ หรือ เวลา
			$sql_num = "SELECT count(bill_id) as num FROM `bom_tb_football_bill_live` where 1  and b_confirm != 1 $c_date   $type $bet  $shop  $qq   $xmid $xbill  $b_out";
			$sql_num_last = "SELECT count(bill_id) as num FROM `bom_tb_football_bill` where 1  and b_confirm != 1 $c_date   $type $bet  $shop  $qq   $xmid $xbill  $b_out";
	}else{
		  $sql_num = "SELECT count(bill_id) as num FROM `bom_tb_football_bill_live` where 1  and b_confirm != 1 $c_date   $type $bet  $shop  $qq   $xmid $xbill  $b_out";
		  $sql_num_last = "SELECT count(bill_id) as num FROM `bom_tb_football_bill` where 1  and b_confirm != 1 $c_date   $type $bet  $shop  $qq   $xmid $xbill  $b_out";
	}

	// แบ่งหน้า

  $num = sql_array($sql_num);
  $num_now_row =   intval($num['num']);

  $num_last = sql_array($sql_num_last);
  $num_last_row =   intval($num_last['num']);

  $num_row = $num_now_row + $num_last_row;

  $rowPerPage = $_GET["rowPerPage"];
  $page       = $_GET["this_page"];
  $start      = ($page-1)*$rowPerPage;

  // $pagi_data["sql"][sql_num] =  $sql_num;
  // $pagi_data["sql"][sql_num_last] =  $sql_num_last;
 
  $pagi_data["numrow"] =  $num_row;
  $pagi_data["num_now_row"] =  $num_now_row;
  $pagi_data["num_last_row"] =  $num_last_row;
  $pagi_data["rowPerPage"] =  $rowPerPage;
  $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
  $pagi_data["active_page"] = intval($page);
  $pagi_data["start_page"]  = $start; 

  if(($start+$rowPerPage) <= $num_now_row)
  {
  	include("_bill_now.php");
  }else{

  	include("_bill_now.php");
  	$c_page = intval($page) * $rowPerPage; 
  	$c_page = $c_page-$num_now_row;

  	if($c_page < $rowPerPage)
  	{
  		$start = 0 ;
  		$rowPerPage = $rowPerPage - $c_page+1;
  	}else{
  		$start = $c_page - $rowPerPage;
  	}

  	include("_bill_last.php");
  	// echo $start."<br>".$rowPerPage;
  }



  // แบ่งหน้า    


 ?>



	<script>
		var pagi_data = <?=json_encode($pagi_data);?>;  // ส่ง js array กลับไปยังไฟล์ทีเ่รียก
	</script>


