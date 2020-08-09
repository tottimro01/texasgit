<?php	
	
    $zone = $_GET['zone'];	
	$arrItem = array();	
	
	for ($x = 0; $x < 21; $x++) {
		$arrItem[$x]["Nid"] = "0001".$x;		
		$arrItem[$x]["Ndate"] = ($x + 1)."08-2560";	
		$arrItem[$x]["Ntime"] = "23.00";	
		$arrItem[$x]["Nstatus"] = "1";
		
		if($zone == "3"){
			$arrItem[$x]["i"] = 1;	
		}else{
			$arrItem[$x]["i"] = $x + 1;	
		}

		if($x == 20){
			$arrItem[$x]["Ntb"] = "9000";	
			$arrItem[$x]["Ndis"] = "-900";	
			$arrItem[$x]["Nbonus"] = "90000";	
			$arrItem[$x]["Ntotal"] = "99999";
		}else{
			$arrItem[$x]["Ntb"] = "20".$x;	
			$arrItem[$x]["Ndis"] = "-1".$x;	
			$arrItem[$x]["Nbonus"] = "200".$x;	
			$arrItem[$x]["Ntotal"] = "200".$x;	
		}
				
		
	} 	
	echo json_encode($arrItem);
?>