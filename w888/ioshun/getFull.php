<?
session_start();
require('../inc/conn.php');
require('../inc/function.php');
//include("../process/num_limit.php");  
$mid = $_GET["mid"];
$arr = array();
$i=0;

$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

$ex_rid=explode('*',$re_m[r_agent_id]);

$url_file9="../json/lotto_hun/limit.json";		
$d_bet=file_get_contents2($url_file9);
$k_bet = json_decode2($d_bet, true);
#print_r($k_bet);
/*
$url_file1="../json/lotto_hun/limit_rid/".$ex_rid[1].".json";		
$d_bet1=file_get_contents2($url_file1);
$k_bet1 = json_decode2($d_bet1, true);

$url_file2="../json/lotto_hun/limit_rid/".$ex_rid[2].".json";		
$d_bet2=file_get_contents2($url_file2);
$k_bet2 = json_decode2($d_bet2, true);

$url_file3="../json/lotto_hun/limit_rid/".$ex_rid[3].".json";		
$d_bet3=file_get_contents2($url_file3);
$k_bet3 = json_decode2($d_bet3, true);

$url_file4="../json/lotto_hun/limit_rid/".$ex_rid[4].".json";		
$d_bet4=file_get_contents2($url_file4);
$k_bet4 = json_decode2($d_bet4, true);
*/


for($xx=1;$xx<=count($lot_type["th"]);$xx++){
	if(!in_array($lot_type["th"][$xx], $lot_type_not)){
	$arr[$i]["lot_type"] = $lot_type["th"][$xx];
	$txt = "";
	if((count($k_bet[$xx])+count($k_bet1[$xx])+count($k_bet2[$xx])+count($k_bet3[$xx])+count($k_bet4[$xx]) )>0){
		
		$arr2=array();
              foreach($k_bet[$xx] as $num){
				#echo   "$num , ";
				 $arr2[]=$num;
				  }
       
	   /*
	          foreach($k_bet1[$xx] as $num){
				 $arr2[]=$num;
				  }
              foreach($k_bet2[$xx] as $num){
				 $arr2[]=$num;
				  }
              foreach($k_bet3[$xx] as $num){
				 $arr2[]=$num;
				  }
              foreach($k_bet4[$xx] as $num){
				 $arr2[]=$num;
				  }
			*/	  
				 $ex_num = array_unique($arr2);
				 sort($ex_num);
		
		 foreach($ex_num as $num1){
				$txt .=   "$num1 , ";
				  }
		
		
		/*foreach($num_limit[$_GET[zone]][$_GET[rob]][$x] as $num){
			$txt .= "$num , ";
		}*/
	}
	$arr[$i]["lot_txt"] = $txt;
	$i++;
}
}
echo json_encode($arr);
?>