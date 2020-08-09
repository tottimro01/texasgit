<?
	session_start();
	header("Content-type: text/html");
	include 'inc/conn.php';
	include 'inc/function.php';
	require("lang/variable_lang.php");

	$_type = $_GET['type'];
	$cc=0;
	if($_type == 'transfer'){
		$sql_list_tran = sql_query("select * from bom_tb_trans where m_id='".$_SESSION['m_id']."' and t_type=1 order by t_id desc, t_status desc limit 100");
		while($rs=sql_fetch($sql_list_tran)){
			$cc++;
  			$last4digit = explode("=", $rs['t_note']);
?>
  		<tr class="tb_ball">
			<td align="center" ><?=$cc;?></td>
			<td align="center" ><?=$ab_bank[$rs['t_bank']];?></td>
			<td align="center" >******<?=$last4digit[1];?></td>
			<td align="center"><?=date('d-m-Y H:i:s', strtotime($rs['t_date']));?></td>
   			<td align="center"><?=number_format($rs['t_count'],2 );?></td>
    		<td align="center"><?=$ab_status[$rs['t_status']];?></td>
    	</tr>
<? 
		}
	}else if($_type == 'withdraw'){
		$sql_list_tran = sql_query("select * from bom_tb_trans where m_id='".$_SESSION['m_id']."'  and t_type=2 order by t_id desc , t_status desc limit 100");
		while($rs=sql_fetch($sql_list_tran)){
			$cc++;
			$ex=explode("@",$rs['t_note']);
?>
		<tr class="tb_ball">
			<td align="center" ><?=$cc;?></td>
			<td align="center" ><?=$ab_bank[$rs['t_bank']];?></td>
			<td align="center" >******<?=substr($ex[1], -4,4);?></td>
			<td align="center"><?=date('d-m-Y H:i:s', strtotime($rs['t_date']));?></td>
   			<td align="center"><?=number_format($rs['t_count'],2);?></td>
    		<td align="center"><?=$ab_status[$rs['t_status']];?></td>
    	</tr>
<?
		}
	}
?>