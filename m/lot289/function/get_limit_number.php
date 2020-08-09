<?
	session_start();
	header("Content-type: text/html");
	require '../../../inc/conn.php'; 
	require '../../../inc/function.php'; 
	require '../../../lang/'.$_COOKIE["lang"].'.php';
	require 'compress_page.php';

	$arr = array();
	$i=0;

	$sql = "select * from bom_tb_member where m_id='$_SESSION[mid]'";
	$re_m = sql_array($sql);

	$ex_rid=explode('*',$re_m[r_agent_id]);

	$url_file9="../../../json/lotto/limit.json";		
	$d_bet=file_get_contents2($url_file9);
	$k_bet = json_decode2($d_bet, true);

	for($xx=1;$xx<=count($lot_type["th"]);$xx++){
		$arr[$i]["lot_type"] = $lot_type["th"][$xx];
		$txt = "";
	
		if((count($k_bet[$xx]))>0){
			
			$arr2=array();
	            foreach($k_bet[$xx] as $num){
					$arr2[]=$num;
				}
	       
				$ex_num = array_unique($arr2);
				sort($ex_num);
			
			foreach($ex_num as $num1){
				$txt .=   "$num1 , ";
			}
		}
		$arr[$i]["lot_txt"] = $txt;
		$i++;
	}

	foreach ($arr as $key => $value) {
		if(!empty($value["lot_txt"])){
	?>
		<tr>
			<th><?=$value["lot_type"];?></th>
		</tr>
		<tr style="background-color: #fff;">
			<td style="color: #f00;"><?=$value["lot_txt"];?></td>
		</tr>
	<? } } ?>