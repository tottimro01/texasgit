<?php			
	$arrItem = array();
			$arrItem["BillID"] = "0001";
			$arrItem["Msg"] = "3บน [ 123 ] =500 สำเร็จ\\n3ล่าง [ 123 ] =600 สำเร็จ\\n3โต๊ด [ 123 ] =700 สำเร็จ";	
			// $arrItem["Msg"] = "3\\u0e1a\\u0e19 [ 123 ] =500 \\u0e2a\\u0e33\\u0e40\\u0e23\\u0e47\\u0e08\\n3\\u0e25\\u0e48\\u0e32\\u0e07 [ 123 ] =600 \\u0e2a\\u0e33\\u0e40\\u0e23\\u0e47\\u0e08\\n3\\u0e42\\u0e15\\u0e4a\\u0e14 [ 123 ] =700 \\u0e2a\\u0e33\\u0e40\\u0e23\\u0e47\\u0e08";		
			$arrItem["Status"]= "1";
			$arrItem["Licen"]= "SC";	
			$arrItem["CloseBig"]= "123456789";	
			$arrItem["CloseSmall"]= "987654321";		
		
	echo json_encode($arrItem);
?>
