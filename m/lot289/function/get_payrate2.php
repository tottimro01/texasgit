<?
	session_start();
	header("Content-type: application/json");
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
	
	if($re_m[m_lotto_convert]==1){
	  	?>
		<tr>
			<td><?=$lot_type["th"][4];?></td>
			<td><?=(round((1000/$empay[4]) - ( (1000/$empay[4])*($emdis[4]/100)) , 2));?> </td>
			<td><?="1,000";?> </td>
		</tr>
<?  } ?>