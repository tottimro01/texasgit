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
  $edt=@explode('-',$_POST[df]);
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


    $list = "";

    $i=1;

    $sumw=array();
    $sumf=array();
    $sums=array();
  
  $sql_list_tran = sql_query("select * from bom_tb_trans where t_date between '$xc1a' and '$xc2a' and r_id='".$_SESSION['r_id']."'  and  t_type='".$_POST["stype"]."'  order by t_id asc");
  while($rs=sql_fetch($sql_list_tran)){
  	if($_POST["stype"]==1){
  		if($rs[t_status]==3){
  			$tw = $rs[t_count];
  			$tf = 0;
  			$ts = 0;
  		}else if($rs[t_status]==2){
  			$tw = 0;
  			$tf = $rs[t_count];
  			$ts = 0;
  		}else if($rs[t_status]==1){
  			$tw = 0;
  			$tf = 0;
  			$ts = $rs[t_count];
  		}

  		$sumw[]=$tw;
  		$sumf[]=$tf;
  		$sums[]=$ts;

  		$list .= "<tr>
  				<td align=\"center\">".$i."</td>
  				<td align=\"center\">".$rs[t_note]."</td>
  				<td align=\"center\" >".$ab_bank[$rs[t_bank]]."</td>
  				<td align=\"center\" class=\"bb\">".number_format($tw,2 )."</td>
  				<td align=\"center\" class=\"cr bb\">".number_format($tf,2 )."</td>
  				<td align=\"center\" class=\"cbu bb\">".number_format($ts,2 )."</td>
  			  </tr>";
  	}else{
  		$ex=explode("@",$rs[t_note]);

  		if($rs[t_status]==3){
  			$tw = $rs[t_count];
  			$tf = 0;
  			$ts = 0;
  		}else if($rs[t_status]==2){
  			$tw = 0;
  			$tf = $rs[t_count];
  			$ts = 0;
  		}else if($rs[t_status]==1){
  			$tw = 0;
  			$tf = 0;
  			$ts = $rs[t_count];
  		}

  		$sumw[]=$tw;
  		$sumf[]=$tf;
  		$sums[]=$ts;

  		$list .= "<tr>
  				<td align=\"center\">".$i."</td>
  				<td align=\"center\">".$ex[1]."</td>
  				<td align=\"center\" >".$ex[2]."</td>
  				<td align=\"center\" >".$ab_bank[$rs[t_bank]]."</td>
  				<td align=\"center\" class=\"bb\">".number_format(-$tw,2 )."</td>
  				<td align=\"center\" class=\"cr bb\">".number_format(-$tf,2 )."</td>
  				<td align=\"center\" class=\"cbu bb\">".number_format(-$ts,2 )."</td>
  			  </tr>";
  			  
  	}
  	$i++;
  }

  if($list ==""){
  	$list = "<tr><td colspan=\"17\"><center>$lang_ag[1]</center></td></tr>";
  }
if($_POST["stype"]==1){
	$data = array(
		"sdate" => $_POST[df],
		"list" => $list,
		"sumAmountw" => number_format(@array_sum($sumw),2),
		"sumAmountf" => number_format(@array_sum($sumf),2),
		"sumAmounts" => number_format(@array_sum($sums),2),
		"status" => true
	);
}else{

	$data = array(
		"sdate" => $_POST[df],
		"list" => $list,
		"sumAmountw" => number_format(-@array_sum($sumw),2),
		"sumAmountf" => number_format(-@array_sum($sumf),2),
		"sumAmounts" => number_format(-@array_sum($sums),2),
		"status" => true
	);

}

	echo json_encode($data);

 ?>	