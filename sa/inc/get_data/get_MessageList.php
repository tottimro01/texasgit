<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

	require('../conn.php');
	require('../function.php');
	require('../../lang/th.php');
	require('../../lang/function_th.php');
	
 		
	if($_GET[q]!=""){$qq=" where (n_note_en like '%$_GET[q]%' )";}
	$sql = "SELECT * FROM `bom_tb_news` $qq  ORDER BY `n_id` DESC";
	$re = sql_query($sql);

	$item = array();
	$i = 0;
	while($rs = sql_fetch_as($re)){
		$item_zone = "";
		$item_del = "";
		if($i == 0)
		{
			$item_del = "<a href=\"?p=MessageList&g_p=MessageList&amp;ac=del&amp;id=".$rs["n_id"]."\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";               
		}
		$item[$i]['n_id'] = $rs["n_id"];
		$item[$i]['n_date'] = $rs["n_date"];
		$item[$i]['n_note_en'] = $rs["n_note_en"];
		$item[$i]['n_note_th'] = $rs["n_note_th"];
		$item[$i]['n_note_cn'] = $rs["n_note_cn"];
		$item[$i]['n_zone'] = $rs["b_zone"];
		$item[$i]['n_zone_text'] = $m_news[$rs["b_zone"]];
		$item[$i]['n_sport'] = $rs["b_sport"];
		$item[$i]['n_sport_text'] =  ($rs["b_zone"]==1) ? " ".$arr_sp_zone[$rs["b_sport"]] : "";
		$item[$i]['n_type'] =  $n_news[$rs['n_type']];
		$item[$i]['n_del'] = $item_del;
    $i++;
	}

	echo json_encode($item);


 ?>