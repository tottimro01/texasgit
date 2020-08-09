



<?php 

$list = 		"<tr>                
					<td colspan='6' bgcolor='#F0F0F0'>&nbsp;&nbsp;<strong>อินเตอร์เนชั่นแนล ฟุตบอล แชมเปี้ยนชิพ (จีน)</strong></td>
				</tr>                อินเตอร์เนชั่นแนล ฟุตบอล แชมเปี้ยนชิพ (จีน)        
				<tr data-value='{'league':'อินเตอร์เนชั่นแนล ฟุตบอล แชมเปี้ยนชิพ (จีน)','thome':'จีน','taway':'อุซเบกิสถาน ','bill_type':'T','score':'0:0','matchid':'29578787'}'> 	  <td align='center'> 14:30 </td> 
					<td align='left'>    
							<font>จีน</font> <strong>-vs-</strong> <font color='#cc0000' >อุซเบกิสถาน  </font> 
					</td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'HDP','F');\"></td>
					<td align='right' class='digits1 cur' style='color:#cc0000' onclick=\"showScore(this,'OU','F');\">-2,610</td> 
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'HDP','H');\"></td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'OU','H');\"></td>
				</tr>
				<tr> 
					<td colspan='6' bgcolor='#F0F0F0'>&nbsp;&nbsp;<strong>ยูฟ่า ยูโร 2020 รอบคัดเลือก</strong></td>
				</tr>                
					ยูฟ่า ยูโร 2020 รอบคัดเลือก        
				<tr data-value='{'league':'ยูฟ่า ยูโร 2020 รอบคัดเลือก','thome':'มอนเตเนโกร','taway':'อังกฤษ','bill_type':'T','score':'0:0','matchid':'29550658'}'>            
					<td align='center'> 02:45 </td>
					<td align='left'> 
						<font>มอนเตเนโกร</font> <strong>-vs-</strong> <font color='#cc0000' >อังกฤษ </font>
					</td>
					<td align='right' class='digits1 cur' style='color:#cc0000' onclick=\"showScore(this,'HDP','F');\">87</td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'OU','F');\"></td> 
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'HDP','H');\"></td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'OU','H');\"></td> 
				</tr> 
				<script type='text/javascript'> 
		
				function nFormatSoccer(num){  
					 num = num.toString();        
					 var re = /(-?\d+)(\d{3})/;        
					 while (re.test(num)){            
					 	num = num.replace(re, '$1,$2');        
					 	}       
					  return num;    
				}    // $('.digits').digits();
		        $('.digits1').each(function() {
		        	var valNum = textToNum($(this).text()); 
		        	if(valNum < 0){ $(this).text(nFormatSoccer(Math.abs(valNum)));        
		        	}    
		        });
		        </script>";

$data = array(
    'status' => true,
    'list' => $list,
);


echo json_encode($data);

 ?>