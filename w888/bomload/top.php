<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');


#for($xx=1;$xx<=count($lot_type["th"]);$xx++){
$url_file="../json/lotto/lock/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	   @unlink($file); // delete file 
  }}
#  }#for($xx=1;$xx<=count($lot_type["th"]);$xx++){
	  
	  
################Config Admin
$url_file="../json/config/admin/LottoMaxReceive.json";	
$lot_js=file_get_contents2($url_file);
$hover = json_decode2($lot_js, true);


#print_r($hover);
$sql="select * from bom_tb_lotto_bill_play   where b_date='01-03-2016'";		
$re=sql_query($sql);
while($recan=sql_fetch($re)){

           $exr=explode('*',$recan[r_agent_id]);	
           $q_num=$recan[play_number];
		   $type_lot=$recan[lot_type];
###################################
			$url_file_0="../json/lotto/lock/".$type_lot."_".$q_num.".json";
			$sumck0=jrlot($url_file_0);
			###########################ยังไม่มี
			if($sumck0==""){
			jwlot($url_file_0,($hover[$type_lot]));		
			$sumck0=jrlot($url_file_0);
				}
			jwlot($url_file_0,($sumck0-$recan[b_total]));	
			
			
			$url_file_1="../json/lotto/lock/".$type_lot."_".$q_num."_".$exr[1].".json";
			$sumck1=jrlot($url_file_1);
			###########################ยังไม่มี
			if($sumck1==""){
			jwlot($url_file_1,($hover[$type_lot]));		
			$sumck1=jrlot($url_file_1);
				}
			jwlot($url_file_1,($sumck1-$recan[b_total]));	
			
			
			$url_file_2="../json/lotto/lock/".$type_lot."_".$q_num."_".$exr[2].".json";
			$sumck2=jrlot($url_file_2);
						###########################ยังไม่มี
			if($sumck2==""){
			jwlot($url_file_2,($hover[$type_lot]));		
			$sumck2=jrlot($url_file_2);
				}
			jwlot($url_file_2,($sumck2-$recan[b_total]));	
			
			
			$url_file_3="../json/lotto/lock/".$type_lot."_".$q_num."_".$exr[3].".json";
			$sumck3=jrlot($url_file_3);
						###########################ยังไม่มี
			if($sumck3==""){
			jwlot($url_file_3,($hover[$type_lot]));		
			$sumck3=jrlot($url_file_3);
				}
			jwlot($url_file_3,($sumck3-$recan[b_total]));	
			
			
			$url_file_4="../json/lotto/lock/".$type_lot."_".$q_num."_".$exr[4].".json";
			$sumck4=jrlot($url_file_4);
									###########################ยังไม่มี
			if($sumck4==""){
			jwlot($url_file_4,($hover[$type_lot]));		
			$sumck4=jrlot($url_file_4);
				}
			jwlot($url_file_4,($sumck4-$recan[b_total]));	
			
			
	echo'<hr>';		
}
?>