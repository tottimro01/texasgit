<?
session_start();
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../../inc/conn.php');
require('../../inc/function.php');
//include("../process/num_limit.php");  
$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../../lang/variable_lang.php");
require("../../lang/function_array.php");

$mid = $_GET["mid"];
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];
$arr = array();
$i=0;
/*
$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

$ex_rid=explode('*',$re_m[r_agent_id]);
if($zone==1){
	$url_file9="../json/lotto/limit.json";	
}else{
	$url_file9="../json/lotto/limit/limit_".$zone."_".$rob.".json";	
}
$d_bet=file_get_contents2($url_file9);
$k_bet = json_decode2($d_bet, true);*/

$k_bet=array();
$sql = sql_query_lot("select * from bom_tb_".$zone."_sa where   s_sum<10  and lot_rob='$rob' order by lot_type asc, play_number asc");
while($rs=sql_fetch($sql)){ 
	$k_bet[$rs['lot_type']][]=$rs['play_number'];
}


#print_r($k_bet);
/*
$url_file1="../json/lotto/limit_rid/".$ex_rid[1].".json";		
$d_bet1=file_get_contents2($url_file1);
$k_bet1 = json_decode2($d_bet1, true);

$url_file2="../json/lotto/limit_rid/".$ex_rid[2].".json";		
$d_bet2=file_get_contents2($url_file2);
$k_bet2 = json_decode2($d_bet2, true);

$url_file3="../json/lotto/limit_rid/".$ex_rid[3].".json";		
$d_bet3=file_get_contents2($url_file3);
$k_bet3 = json_decode2($d_bet3, true);

$url_file4="../json/lotto/limit_rid/".$ex_rid[4].".json";		
$d_bet4=file_get_contents2($url_file4);
$k_bet4 = json_decode2($d_bet4, true);
*/


//for($xx=1;$xx<=count($lot_type[$lang_post][$zone]);$xx++){
foreach ($lot_type[$lang_post][$zone] as $xx => $value){
	$arr[$i]["lot_type"] = $lot_type[$lang_post][$zone][$xx];
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


				  $arr[$i]["lot_txt"] = $txt;
	$i++;
	}
	
}
echo json_encode($arr);
?>