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


	//เช็คหัว ว่าผิดรับบิลมั้ย
 $r_agent_id_level = explode("*", $_SESSION['r_agent_id'].$_SESSION['rid']."*");
 $sql = "select r_id, r_sport_delete_bill from bom_tb_agent where r_id in (".implode(",",array_filter($r_agent_id_level)).")";
 $re_delete_bin = sql_query($sql);
 $is_delete_bin = true;
	while($rs = sql_fetch($re_delete_bin)){
	   if($rs['r_sport_delete_bill'] == 0)
	   {
	   		$is_delete_bin = false;
	   }
	}


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
	$sql = "SELECT `m_id`,`m_name`,`m_user` FROM `bom_tb_member` ";
		$re = sql_query($sql);
		while($rs=sql_fetch($re)){
		 	$user[$rs['m_id']]['user'] = $rs['m_user'];
		}

	

  if($_GET[mid]!=""){ $xmid="and m_id='$_GET[mid]'";}
	if($_GET[out]==1){ $b_out="and b_status=5 ";}
	if($_GET[bill]!=""){ $xbill=' and bill_id in ('.$_GET[bill].')';}

	$arr_payok=array();

	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";

	if($_GET[orderby]==1){  // ตามชนะ หรือ เวลา
			$sql_num = "SELECT count(bill_id) as num FROM `bom_tb_football_bill_live` where b_confirm != 1 $c_date  and r_agent_id = '$r_agent_id' $type $bet  $shop  $qq   $xmid $xbill  $b_out";
			$sql_num_last = "SELECT count(bill_id) as num FROM `bom_tb_football_bill` where b_confirm != 1 $c_date  and r_agent_id = '$r_agent_id' $type $bet  $shop  $qq   $xmid $xbill  $b_out";
	}else{
		  $sql_num = "SELECT count(bill_id) as num FROM `bom_tb_football_bill_live` where b_confirm != 1 $c_date  and r_agent_id = '$r_agent_id'  $type $bet  $shop  $qq   $xmid $xbill  $b_out";
		  $sql_num_last = "SELECT count(bill_id) as num FROM `bom_tb_football_bill` where b_confirm != 1 $c_date  and r_agent_id = '$r_agent_id'  $type $bet  $shop  $qq   $xmid $xbill  $b_out";
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

  if($count == 0)
		{
			?>
			<tr>
				<td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_ag[1];?></td>
			</tr>
			<?
		}
	
 ?>



	<script>
		var pagi_data = <?=json_encode($pagi_data);?>;  // ส่ง js array กลับไปยังไฟล์ทีเ่รียก
		var sql ="'<?=$sql_num;?>'";

	</script>


