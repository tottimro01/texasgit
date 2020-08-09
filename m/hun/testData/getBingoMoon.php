<?php			
	$arrItem = array();
	for ($x = 0; $x < 20; $x++) {
		if($x % 3 == 0){
			$arrItem[$x]["Time"] = "10.00";
			$arrItem[$x]["Win3"] = "888";		
			$arrItem[$x]["Win2"]= "88";	
		}else{
			$arrItem[$x]["Time"] = "11.00";
			$arrItem[$x]["Win3"] = "999";		
			$arrItem[$x]["Win2"]= "99";	
		}		
		
				
		} 	
	echo json_encode($arrItem);
?>