<?
	$txt_top = "<script>\nvar b=[];\nparent.closeLoading();\n";
	$txt_bottom = "\n</script>";
	
	$txt_hdc = $txt_top;
	$txt_1x2 = $txt_top;
	$i=0;
	$sql_write = sql_query("select * from bom_tb_data_sport_today order by b_asc asc , b_date_play asc");
	while($rs_write=sql_fetch($sql_write)){
		$txt_hdc .= "b[$i]=['".$rs_write["b_id"]."','10033','".$rs_write["b_zone_id"]."','126','69','<img src=\"images/flag/38.gif\" width=\"20\" height=\"20\" />&nbsp;".$rs_write["b_zone"]."','".$rs_write["b_name_1"]."','".$rs_write["b_name_2"]."','".date("Y-m-d" , $rs_write["b_date_play"])."','".date("H:i:s" , $rs_write["b_date_play"])."','<img src=\"images/balllive.gif\"> ".date("H:i" , $rs_write["b_date_play"])."','','','1','2','0','','0','".$rs_write["b_hdc"]."','".$rs_write["b_hdc_1"]."','".$rs_write["b_hdc_2"]."','MV8wXzAuMjVfMA==','".$rs_write["b_goal"]."','".$rs_write["b_goal_1"]."','".$rs_write["b_goal_2"]."','Ml8wXzIuNTBfMA==','".$rs_write["b_1h_hdc"]."','".$rs_write["b_1h_hdc_1"]."','".$rs_write["b_1h_hdc_2"]."','MV8wXzAuMDBfMQ==','".$rs_write["b_1h_goal"]."','".$rs_write["b_1h_goal_1"]."','".$rs_write["b_1h_goal_2"]."','Ml8wXzEuMDBfMQ==','".$rs_write["b_1x2_1"]."','".$rs_write["b_1x2_draw"]."','".$rs_write["b_1x2_2"]."','M18wXzBfMA==','".$rs_write["b_1h_1x2_1"]."','".$rs_write["b_1h_1x2_draw"]."','".$rs_write["b_1h_1x2_2"]."','M18wXzBfMQ==','".$rs_write["b_odd"]."','".$rs_write["b_even"]."','NF8wXzBfMA==','660485'];\n";
		$txt_1x2 .= "b[$i]=['".$rs_write["b_id"]."','10033','".$rs_write["b_zone_id"]."','126','69','<img src=\"images/flag/38.gif\" width=\"20\" height=\"20\" />&nbsp;".$rs_write["b_zone"]."','".$rs_write["b_name_1"]."','".$rs_write["b_name_2"]."','".date("Y-m-d" , $rs_write["b_date_play"])."','".date("H:i:s" , $rs_write["b_date_play"])."','<img src=\"images/balllive.gif\"> 22:59','','','1','2','0','','0','".$rs_write["b_hdc"]."','".$rs_write["b_hdc_1"]."','".$rs_write["b_hdc_2"]."','MV8wXzAuMjVfMA==','".$rs_write["b_goal"]."','".$rs_write["b_goal_1"]."','".$rs_write["b_goal_2"]."','Ml8wXzIuNTBfMA==','".$rs_write["b_1h_hdc"]."','".$rs_write["b_1h_hdc_1"]."','".$rs_write["b_1h_hdc_2"]."','MV8wXzAuMDBfMQ==','".$rs_write["b_1h_goal"]."','".$rs_write["b_1h_goal_1"]."','".$rs_write["b_1h_goal_2"]."','Ml8wXzEuMDBfMQ==','".$rs_write["b_1x2_1"]."','".$rs_write["b_1x2_draw"]."','".$rs_write["b_1x2_2"]."','M18wXzBfMA==','".$rs_write["b_1h_1x2_1"]."','".$rs_write["b_1h_1x2_draw"]."','".$rs_write["b_1h_1x2_2"]."','M18wXzBfMQ==','".$rs_write["b_odd"]."','".$rs_write["b_even"]."','NF8wXzBfMA==','660485'];\n";
		$i++;
	}
	$txt_hdc .= "parent.ShowMPListFull(b,$i,".time().",2);";
	$txt_1x2 .= "parent.ShowMPListFull(b,$i,".time().",4);";
	$txt_hdc .= $txt_bottom;
	$txt_1x2 .= $txt_bottom;
	
	//echo $txt_hdc;
	
	$fo="../write/hdc.php";
	@unlink($fo);
	write($fo,$txt_hdc,"w+"); 
	$fo2="../write/1x2.php";
	@unlink($fo2);
	write($fo2,$txt_1x2,"w+"); 
	
function write($path, $content, $mode="w+"){
	@unlink($path);
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}
?>