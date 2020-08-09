<?
#require('../../../inc/function.php');

$url_file9="../../../json/lotto/limit.json";		
$d_bet=file_get_contents2($url_file9);
$k_bet = json_decode2($d_bet, true);
#print_r($k_bet);
/*
$url_file1="../../../json/lotto/limit_rid/".$_SESSION['crid1'].".json";		
$d_bet1=file_get_contents2($url_file1);
$k_bet1 = json_decode2($d_bet1, true);

$url_file2="../../../json/lotto/limit_rid/".$_SESSION['crid2'].".json";		
$d_bet2=file_get_contents2($url_file2);
$k_bet2 = json_decode2($d_bet2, true);

$url_file3="../../../json/lotto/limit_rid/".$_SESSION['crid3'].".json";		
$d_bet3=file_get_contents2($url_file3);
$k_bet3 = json_decode2($d_bet3, true);

$url_file4="../../../json/lotto/limit_rid/".$_SESSION['crid4'].".json";		
$d_bet4=file_get_contents2($url_file4);
$k_bet4 = json_decode2($d_bet4, true);
*/
?>
<?
#require('../../../inc/function.php');
#include("../process/num_limit.php");  
?>
<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong><!-- เลขเต็ม --><?=$lang_member[414];?></strong></h1>
    </div>
    <div class="panel-body">
      <div class="row">


     <? 
			  for($xx=1;$xx<=count($lot_type["th"]);$xx++){
			#	  if((count($k_bet[$xx])+count($k_bet1[$xx])+count($k_bet2[$xx])+count($k_bet3[$xx])+count($k_bet4[$xx]) )>0){
				 if((count($k_bet[$xx]))>0){
				  ?>
				        <div class="col-xs-12 thaisan" style="background-color:#666666;font-size:16px;padding-top:10px; padding-bottom:10px;"><?=$lot_type["th"][$xx];?></div>
                       <div class="col-xs-12" style="font-size:16px;padding-top:10px; padding-bottom:10px;">   
        
   <?
			  $arr=array();
              foreach($k_bet[$xx] as $num){
				#echo   "$num , ";
				 $arr[]=$num;
				  }
        /*      foreach($k_bet1[$xx] as $num){
				 $arr[]=$num;
				  }
              foreach($k_bet2[$xx] as $num){
				 $arr[]=$num;
				  }
              foreach($k_bet3[$xx] as $num){
				 $arr[]=$num;
				  }
              foreach($k_bet4[$xx] as $num){
				 $arr[]=$num;
				  }
			*/	  
				 $ex_num = array_unique($arr);
				 sort($ex_num);
              foreach($ex_num as $num1){
			#	echo   "$num1 , ";
			echo'<span class="label label-danger" style="font-weight:bold; font-size:16px">'.$num1.'</span> ';
				  }
			  ?>
              
        	  </div>
   <? } 	}  ?>



      </div>      
      </form>
    </div>
  </div>
</div>
<br />
