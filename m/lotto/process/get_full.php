<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

	$mid = $_SESSION["m_id"];
	$zone=$_SESSION['zone_hun'];
	$rob=$_SESSION['rob_hun'];
	
	$arr = array();
	$i=0;

if($zone==1){
	$dd_rob=" ";
	}else{
	$dd_rob=" and lot_rob='$rob'";	
		}
		
		
$k_bet=array();
$sql = sql_query_lot("select * from bom_tb_".$zone."_sa where   s_sum<10 $dd_rob  order by lot_type asc, play_number asc");
while($rs=sql_fetch($sql)){ 
	$k_bet[$rs['lot_type']][]=$rs['play_number'];
}




foreach ($lot_type[$lang_post][$zone] as $xx => $value){
	
	if((count($k_bet[$xx]))>0){
		$arr[$i]["lot_type"] = $lot_type[$lang_post][$zone][$xx];
	$txt = "";
		
		$arr2=array();
              foreach($k_bet[$xx] as $num){
				 $arr2[]=$num;
				  }
				 $ex_num = array_unique($arr2);
				 sort($ex_num);
		
		 foreach($ex_num as $num1){
				$txt .=   "$num1 , ";
				  }


				  $arr[$i]["lot_txt"] = $txt;
	$i++;
	}
	
}
echo json_encode($arr);
?>