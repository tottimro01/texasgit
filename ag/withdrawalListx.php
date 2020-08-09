<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('inc/conn.php');
  require('inc/function.php');
  require('lang/ag_lang.php');

    if($_POST[df]!=""){
  $edf=@explode('-',$_POST[df]);
  $edt=@explode('-',$_POST[dt]);
  }else{
  $edf=@explode('-',_bdate());
    $edt=@explode('-',_bdate());
    }  
  
   $dbg=mktime(0,0,0,$edf[1],$edf[0],$edf[2]);
    $xc1=date("d/m/Y",$dbg);
  $xc1a=date("Y-m-d H:i:s",$dbg);
  
  
    $dbt=mktime(23,59,59,$edt[1],$edt[0],$edt[2]);
    $xc2=date("d/m/Y",$dbt);
  $xc2a=date("Y-m-d H:i:s",$dbt);





	$m_b_pass=array();
	$m_b_bank=array();
	$m_b_code=array();
	$m_b_name=array();

	$m_user=array();
	$m_name=array();
	$m_count=array();
  $sql="select * from  bom_tb_member where  m_agent_id like '%*$_SESSION[r_id]*%'";
  $re=sql_query($sql);
  while($rs=sql_fetch($re)){
	$m_user[$rs[m_id]]=$rs[m_user];
	$m_name[$rs[m_id]]=$rs[m_name];
	$m_count[$rs[m_id]]=$rs[m_count];

	$m_phone[$rs[m_id]]=$rs[m_phone];

	$m_b_pass[$rs[m_id]]=$rs[m_b_pass];
	$m_b_bank[$rs[m_id]]=$rs[m_b_bank];
	$m_b_code[$rs[m_id]]=$rs[m_b_code];
	$m_b_name[$rs[m_id]]=$rs[m_b_name];
  }

  

  $list = "";
  $sql_list_tran = sql_query("select * from bom_tb_trans where t_date between '$xc1a' and '$xc2a' and r_id='".$_SESSION['r_id']."'  and  t_type=2   and  t_status!=3  order by t_id desc , t_status desc limit 1000");
  while($rs=sql_fetch($sql_list_tran)){
  	$ex=explode("@",$rs[t_note]);
  	if($rs[t_status]==1){ 
		$sum[]=-$rs[t_count];
	}
  	$list .= "<tr>
  				<td align=\"center\">".$rs[t_id]."</td>
  				<td align=\"center\">".$rs[t_date]."</td>
  				<td align=\"center\" ><a href=\"#\">".$m_user[$rs[m_id]]."</a></td>
  				<td align=\"center\" ><a href=\"#\">".$m_name[$rs[m_id]]."</a></td>
  				<td align=\"center\" >".$m_phone[$rs[m_id]]."</td>
  				<td align=\"center\" ><b class=\"cbu\">".number_format($m_count[$rs[m_id]],2)."</b> </td>
  				<td align=\"center\" >".$ab_bank[$rs[t_bank]]."<br><span class=\"cb\">".$ex[1]."</span><br><span class=\"cbu\">".$ex[2]."</span></td>
  				<td align=\"center\" class=\"cr bb\">".($rs[t_status]==1 ? _cbn(-$rs[t_count],2 ) : number_format(-$rs[t_count],2 ))."</td>
    			<td align=\"center\">".$ab_status[$rs[t_status]]."</td>
    			<td align=\"center\" >".$rs[t_date_accept]."</td>
  			  </tr>";
  }

  if($list ==""){
  	$list = "<tr><td colspan=\"17\"><center>$lang_ag[1]</center></td></tr>";
  }

	$optionPage["listCount"] = 0;
	$optionPage["page"] =1;

	$data = array(
		"list" => $list,
		"sum" => _cbn(@array_sum($sum),2),
		"optionPage" => $optionPage,
		"status" => true
	);


	echo json_encode($data);

 ?>	