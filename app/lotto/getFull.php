<?
session_start();
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');
require('../inc/function.php');
//include("../process/num_limit.php");  
$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");

$mid = $_GET["mid"];
if($_GET['zone']==""){$_GET['zone']=1;}
if($_GET['rob']==""){$_GET['rob']=1;}
$zone=$_GET['zone'];
$rob=$_GET['rob'];
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