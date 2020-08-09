<?
	session_start();
	header("Content-type: text/html");
	require '../../../inc/conn.php'; 
	require '../../../inc/function.php'; 
	require '../../../lang/'.$_COOKIE["lang"].'.php';
	require 'compress_page.php';
	
	$sql = "select * from bom_tb_member where m_id='$_SESSION[mid]'";
	$re_m = sql_array($sql);

	$url_file="../../../json/config/member/LottoConfig_".$_SESSION["mid"].".json";	
	$lot6_js=file_get_contents2($url_file);
	$lot_m = json_decode2($lot6_js, true);

	$empay=@explode(',',$lot_m['m_lotto_pay_member']); 
	$emdis=@explode(',',$lot_m['m_lotto_dis_member']); 

	for($x=1;$x<=count($lot_type["th"]);$x++){
		if($empay[$x]>0){ 
		?>
			<tr>
				<td><?=$lot_type["th"][$x];?></td>
				<td><?=$empay[$x];?></td>
				<td><?=$emdis[$x];?></td>
			</tr>
		<?
		} 
	}
?>