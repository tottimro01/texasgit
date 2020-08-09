<?
include "inc_head_bySession.php";

/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/



if($_GET['rob']==""){
	$_GET['rob']=1;
	}
$zone=$_GET['zone'];
$rob=$_GET['rob'];
$date=$_GET['d'];
 $sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' and ok_date='$date' order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];
$o_active=$re_ok['o_active'];
if($o_active==0){
	$tb="bom_tb_lotto_bill_play_live";
	}else{
	$tb="bom_tb_lotto_bill_play";	
		}

 
$mo_array=array();
$num_array=array();

/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
if($_GET['z']==""){
$sql="select 
   *,  
 (
   	   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
 from $tb  where b_accept=1 and ok_id= '$ok_id'   and (lot_type=1 or lot_type=3  or lot_type=4  or lot_type=5    or lot_type=6    or lot_type=7    or lot_type=21  or lot_type=22  or lot_type=23 ) ";
$limit=999;
$king="%03d";

}elseif($_GET['z']==1){
	
$sql="select 
   *,  
 (
   	   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
 from $tb  where b_accept=1 and ok_id= '$ok_id'   and (lot_type=25 or lot_type=26 ) ";
$limit=9999;
$king="%04d";
	
	
}elseif($_GET['z']==2){
$sql="select 
   *,   
 (
   	   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
 from $tb  where b_accept=1 and ok_id= '$ok_id'   and (lot_type=31 ) ";
$limit=9999;
$king="%04d";

	}


$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
		$sum10a=($rs['r1']);
	
	if($rs['lot_type']==1){
		$arr_cc[$rs['play_number']][]=$sum10a*$rs['play_br_pay_1'];
	}elseif($rs['lot_type']==2){
		$arr_cc[$rs['play_number']][]=$sum10a*$rs['play_br_pay_1'];
		
	}elseif($rs['lot_type']==3){
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
		
		
		}elseif($rs['lot_type']==4){
			for($n=0;$n<=9;$n++){
				$arr_cc[sprintf("%03d" ,$n.$rs['play_number'])][]=$sum10a*$rs['play_br_pay_1'];
			}
			}elseif($rs['lot_type']==5){
					$arr_cc[$rs['play_number']][]=$sum10a*$rs['play_br_pay_1'];
				}elseif($rs['lot_type']==6){
							
$number=$rs['play_number'];
for($x1=0;$x1<=9;$x1++){
for($x2=0;$x2<=9;$x2++){
	for($x3=0;$x3<=9;$x3++){
		if($x1==$number or $x2==$number or $x3==$number){
		$num_new=$x1.$x2.$x3;
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
		#echo"$num<br>";	
		}}}}
		
			}elseif($rs['lot_type']==7){
							
$number=$rs['play_number'];
for($x1=0;$x1<=9;$x1++){
for($x2=0;$x2<=9;$x2++){
	for($x3=0;$x3<=9;$x3++){
		if($x1==$number or $x2==$number or $x3==$number){
		$num_new=$x1.$x2.$x3;
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
		#echo"$num<br>";	
		}}}}
		
		
					}elseif($rs['lot_type']==8){
							
  $num_ok=array();
		if($rs['play_number']=="H"){
		#$num_up=array('50' , '51' , '52' , '53' , '54' , '55' , '56' , '57' , '58' , '59' , '60' , '61' , '62' , '63' , '64' , '65' , '66' , '67' , '68' , '69' , '70' , '71' , '72' , '73' , '74' , '75' , '76' , '77' , '78' , '79' , '80' , '81' , '82' , '83' , '84' , '85' , '86' , '87' , '88' , '89' , '90' , '91' , '92' , '93' , '94' , '95' , '96' , '97' , '98' , '99');
					for($x0=0;$x0<=9;$x0++){
					for($x1=0;$x1<=9;$x1++){
		for($x2=5;$x2<=9;$x2++){
		$num_ok[]=sprintf("%03d" ,$x0.$x1.$x2);
       }}}
		}else{
		#$num_up=array('00' , '01' , '02' , '03' , '04' , '05' , '06' , '07' , '08' , '09' , '10' , '11' , '12' , '13' , '14' , '15' , '16' , '17' , '18' , '19' , '20' , '21' , '22' , '23' , '24' , '25' , '26' , '27' , '28' , '29' , '30' , '31' , '32' , '33' , '34' , '35' , '36' , '37' , '38' , '39' , '40' , '41' , '42' , '43' , '44' , '45' , '46' , '47' , '48' , '49');	
			for($x0=0;$x0<=9;$x0++){
					for($x1=0;$x1<=9;$x1++){
	for($x2=0;$x2<=4;$x2++){
		$num_ok[]=sprintf("%03d" ,$x0.$x1.$x2);
       }}}
			}


		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
				

			
		
		
		}elseif($rs['lot_type']==9){
	    $num_ok=array();
		if($rs['play_number']=="H"){
		#$num_up=array('50' , '51' , '52' , '53' , '54' , '55' , '56' , '57' , '58' , '59' , '60' , '61' , '62' , '63' , '64' , '65' , '66' , '67' , '68' , '69' , '70' , '71' , '72' , '73' , '74' , '75' , '76' , '77' , '78' , '79' , '80' , '81' , '82' , '83' , '84' , '85' , '86' , '87' , '88' , '89' , '90' , '91' , '92' , '93' , '94' , '95' , '96' , '97' , '98' , '99');
			for($x1=0;$x1<=9;$x1++){
		for($x2=50;$x2<=99;$x2++){
		$num_ok[]=sprintf("%03d" ,$x1.$x2);
       }}
		}else{
		#$num_up=array('00' , '01' , '02' , '03' , '04' , '05' , '06' , '07' , '08' , '09' , '10' , '11' , '12' , '13' , '14' , '15' , '16' , '17' , '18' , '19' , '20' , '21' , '22' , '23' , '24' , '25' , '26' , '27' , '28' , '29' , '30' , '31' , '32' , '33' , '34' , '35' , '36' , '37' , '38' , '39' , '40' , '41' , '42' , '43' , '44' , '45' , '46' , '47' , '48' , '49');	
			for($x1=0;$x1<=9;$x1++){
	for($x2=0;$x2<=49;$x2++){
		$num_ok[]=sprintf("%03d" ,$x1.$x2);
       }}
			}


		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
				

			
			
	
	
			}elseif($rs['lot_type']==10){
	    $num_ok=array();
		if($rs['play_number']=="H"){
		#$num_up=array('50' , '51' , '52' , '53' , '54' , '55' , '56' , '57' , '58' , '59' , '60' , '61' , '62' , '63' , '64' , '65' , '66' , '67' , '68' , '69' , '70' , '71' , '72' , '73' , '74' , '75' , '76' , '77' , '78' , '79' , '80' , '81' , '82' , '83' , '84' , '85' , '86' , '87' , '88' , '89' , '90' , '91' , '92' , '93' , '94' , '95' , '96' , '97' , '98' , '99');
		for($x2=500;$x2<=999;$x2++){
		$num_ok[]=sprintf("%03d" ,$x2);
       }
		}else{
		#$num_up=array('00' , '01' , '02' , '03' , '04' , '05' , '06' , '07' , '08' , '09' , '10' , '11' , '12' , '13' , '14' , '15' , '16' , '17' , '18' , '19' , '20' , '21' , '22' , '23' , '24' , '25' , '26' , '27' , '28' , '29' , '30' , '31' , '32' , '33' , '34' , '35' , '36' , '37' , '38' , '39' , '40' , '41' , '42' , '43' , '44' , '45' , '46' , '47' , '48' , '49');	
	for($x2=0;$x2<=499;$x2++){
		$num_ok[]=sprintf("%03d" ,$x2);
       }
			}


		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
			
			
			
				
		}elseif($rs['lot_type']==11){
	    $num_ok=array();
		if($rs['play_number']=="H"){
		#$num_up=array('50' , '51' , '52' , '53' , '54' , '55' , '56' , '57' , '58' , '59' , '60' , '61' , '62' , '63' , '64' , '65' , '66' , '67' , '68' , '69' , '70' , '71' , '72' , '73' , '74' , '75' , '76' , '77' , '78' , '79' , '80' , '81' , '82' , '83' , '84' , '85' , '86' , '87' , '88' , '89' , '90' , '91' , '92' , '93' , '94' , '95' , '96' , '97' , '98' , '99');
		for($x2=50;$x2<=99;$x2++){
		$num_ok[]=sprintf("%02d" ,$x2);
       }
		}else{
		#$num_up=array('00' , '01' , '02' , '03' , '04' , '05' , '06' , '07' , '08' , '09' , '10' , '11' , '12' , '13' , '14' , '15' , '16' , '17' , '18' , '19' , '20' , '21' , '22' , '23' , '24' , '25' , '26' , '27' , '28' , '29' , '30' , '31' , '32' , '33' , '34' , '35' , '36' , '37' , '38' , '39' , '40' , '41' , '42' , '43' , '44' , '45' , '46' , '47' , '48' , '49');	
	for($x2=0;$x2<=49;$x2++){
		$num_ok[]=sprintf("%02d" ,$x2);
       }
			}


		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
				

			
			
			}elseif($rs['lot_type']==12){
	    $num_ok=array();
		if($rs['play_number']=="E"){
		$num_up=array('01' , '03' , '05' , '07' , '09' , '11' , '13' , '15' , '17' , '19' , '21' , '23' , '25' , '27' , '29' , '31' , '33' , '35' , '37' , '39' , '41' , '43' , '45' , '47' , '49' , '51' , '53' , '55' , '57' , '59' , '61' , '63' , '65' , '67' , '69' , '71' , '73' , '75' , '77' , '79' , '81' , '83' , '85' , '87' , '89' , '91' , '93' , '95' , '97');
		}else{
		$num_up=array('00' , '02' , '04' , '06' , '08' , '10' , '12' , '14' , '16' , '18' , '20' , '22' , '24' , '26' , '28' , '30' , '32' , '34' , '36' , '38' , '40' , '42' , '44' , '46' , '48' , '50' , '52' , '54' , '56' , '58' , '60' , '62' , '64' , '66' , '68' , '70' , '72' , '74' , '76' , '78' , '80' , '82' , '84' , '86' , '88' , '90' , '92' , '94' , '96' , '98');	
			}
		for($x1=0;$x1<=9;$x1++){
			for($x2=0;$x2<count($num_up);$x2++){
		$num_ok[]=$x1.$num_up[$x2];
 }}
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
				
				
	
			}elseif($rs['lot_type']==13){
						
          $num_ok=array();
		$num_up=array(substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		for($n=0;$n<=9;$n++){
		$num_ok[]=$num_up[0].$num_up[1].$n;
		$num_ok[]=$num_up[0].$n.$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$n;
		$num_ok[]=$num_up[1].$n.$num_up[0];
		$num_ok[]=$n.$num_up[1].$num_up[0];
		$num_ok[]=$n.$num_up[0].$num_up[1];
			}#for($n=0;$n<=9;$n++){
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}	#	foreach($num_ok as $num_new){	
		

	}elseif($rs['lot_type']==14){
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
			
			
			
				}elseif($rs['lot_type']==15){
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
	#	$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
			
		
/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
			}elseif($rs['lot_type']==16){
		$arr_cc[$rs['play_number']][]=$sum10a*$rs['play_br_pay_1'];
		
			}elseif($rs['lot_type']==17){
		$arr_cc[$rs['play_number']][]=$sum10a*$rs['play_br_pay_1'];
		
		
				}elseif($rs['lot_type']==18){
			for($n=0;$n<=9;$n++){
				$arr_cc[sprintf("%03d" ,$n.$rs['play_number'])][]=$sum10a*$rs['play_br_pay_1'];
			}
				}elseif($rs['lot_type']==19){
							
$number=$rs['play_number'];
for($x1=0;$x1<=9;$x1++){
for($x2=0;$x2<=9;$x2++){
	for($x3=0;$x3<=9;$x3++){
		if($x1==$number or $x2==$number or $x3==$number){
		$num_new=$x1.$x2.$x3;
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
		#echo"$num<br>";	
		}}}}
		
		}elseif($rs['lot_type']==20){
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
		
		
		
/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
			}elseif($rs['lot_type']==21){
						
          $num_ok=array();
		for($n=0;$n<=9;$n++){
			for($n1=0;$n1<=9;$n1++){
		$num_ok[]=$n1.$n.$rs['play_number'];
		$num_ok[]=$n.$n1.$rs['play_number'];
			}#for($n1=0;$n1<=9;$n1++){
			}#for($n=0;$n<=9;$n++){
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";

			}	#	foreach($num_ok as $num_new){	
			
			
					}elseif($rs['lot_type']==22){
						
          $num_ok=array();
		for($n=0;$n<=9;$n++){
			for($n1=0;$n1<=9;$n1++){
		$num_ok[]=$n1.$rs['play_number'].$n;
		$num_ok[]=$n.$rs['play_number'].$n1;
			}#for($n1=0;$n1<=9;$n1++){
			}#for($n=0;$n<=9;$n++){
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}	#	foreach($num_ok as $num_new){	
			
			}elseif($rs['lot_type']==23){
						
          $num_ok=array();
		for($n=0;$n<=9;$n++){
			for($n1=0;$n1<=9;$n1++){
		$num_ok[]=$rs['play_number'].$n1.$n;
		$num_ok[]=$rs['play_number'].$n.$n1;
			}#for($n1=0;$n1<=9;$n1++){
			}#for($n=0;$n<=9;$n++){
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}	#	foreach($num_ok as $num_new){	
			
						
			}elseif($rs['lot_type']==25){
		$arr_cc[$rs['play_number']][]=$sum10a*$rs['play_br_pay_1'];
			}elseif($rs['lot_type']==26){
	    $num_ok=array();
		$num_up=array(substr($rs['play_number'], -4,1), substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[1].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[1].$num_up[2];
		
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[0].$num_up[2];
		
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[0].$num_up[1];
		
		$num_ok[]=$num_up[3].$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[0].$num_up[1];
		
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}
			}elseif($rs['lot_type']==31){
				
	/*
########################เลขชุด
$lang_g["settext"][3] ="ถูก 4 ตัวตรง รับเงิน : 100,000";
$lang_g["settext"][4] ="ถูก 4 ตัวโต๊ด รับเงิน : 4,500";
$lang_g["settext"][5] ="ถูก 3 ตัวตรง(หลัง) รับเงิน : 40,000";
$lang_g["settext"][6] ="ถูก 3 ตัวหน้าตรง รับเงิน : 2,000";
$lang_g["settext"][7] ="ถูก 3 ตัวโต๊ด(หลัง) รับเงิน : 3,500";
$lang_g["settext"][8] ="ถูก 2 ตัวหน้า(2ล่าง) รับเงิน : 1,500";
$lang_g["settext"][9] ="ถูก 2 ตัวตรง รับเงิน : 1,500";
*/
		##########จ่ายหวยลาวชุด
$arr_num=array();
$txt_set=json_decode($rs['play_set_pay'], true);	
$exwin_r1=@explode(",",$txt_set['r1']);

#4ตรง
$arr_cc[$rs['play_number']][]=$exwin_r1[1];
$arr_num[]=$rs['play_number'];
#4โต๊ด
        $num_ok=array();
		$num_up=array(substr($rs['play_number'], -4,1), substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[1].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[1].$num_up[2];
		
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[0].$num_up[2];
		
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[0].$num_up[1];
		
		$num_ok[]=$num_up[3].$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[0].$num_up[1];
		
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
			if (!in_array($num_new , $arr_num)) {
		$arr_num[]=$num_new;
		$arr_cc[$num_new][]=$exwin_r1[2];
			}
			}
	####3ท้าย		
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
	for($x1=0;$x1<=9;$x1++){
		foreach($num_ok as $num_new){
		if (!in_array($num_new , $arr_num)) {
		$arr_num[]=$x1.$num_new;
       $arr_cc[$x1.$num_new][]=$exwin_r1[3];
			}
		}
	}
	
####3หน้า	
	$num_ok=array();
		$num_up=array(substr($rs['play_number'], -4,1), substr($rs['play_number'], -3,1),  substr($rs['play_number'], -2,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
	for($x1=0;$x1<=9;$x1++){
		foreach($num_ok as $num_new){
		if (!in_array($num_new , $arr_num)) {
		$arr_num[]=$num_new.$x1;
       $arr_cc[$num_new.$x1][]=$exwin_r1[4];
			}
		}
	}
	
	####3โต๊ดท้าย		
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -3,1), substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1];
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
	for($x1=0;$x1<=9;$x1++){
		foreach($num_ok as $num_new){
		if (!in_array($num_new , $arr_num)) {
		$arr_num[]=$x1.$num_new;
       $arr_cc[$x1.$num_new][]=$exwin_r1[5];
			}
		}
	}

	/*
########################เลขชุด
$lang_g["settext"][3] ="ถูก 4 ตัวตรง รับเงิน : 100,000";
$lang_g["settext"][4] ="ถูก 4 ตัวโต๊ด รับเงิน : 4,500";
$lang_g["settext"][5] ="ถูก 3 ตัวตรง(หลัง) รับเงิน : 40,000";
$lang_g["settext"][6] ="ถูก 3 ตัวหน้าตรง รับเงิน : 2,000";
$lang_g["settext"][7] ="ถูก 3 ตัวโต๊ด(หลัง) รับเงิน : 3,500";
$lang_g["settext"][8] ="ถูก 2 ตัวหน้า(2ล่าง) รับเงิน : 1,500";
$lang_g["settext"][9] ="ถูก 2 ตัวตรง รับเงิน : 1,500";
*/
	####2หน้า	
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -4,1), substr($rs['play_number'], -3,1));
		$num_ok[]=$num_up[0].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0];
		$num_ok = array_unique( $num_ok );

	for($x1=0;$x1<=9;$x1++){
			for($x2=0;$x2<=9;$x2++){
		foreach($num_ok as $num_new){
		if (!in_array($num_new , $arr_num)) {
		$arr_num[]=$num_new.$x1.$x2;
       $arr_cc[$num_new.$x1.$x2][]=$exwin_r1[6];
		}
			}
			}
	}
	
	####2ท้าย
		$num_ok=array();
		$num_up=array(substr($rs['play_number'], -2,1), substr($rs['play_number'], -1,1));
		$num_ok[]=$num_up[0].$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0];
		$num_ok = array_unique( $num_ok );

	for($x1=0;$x1<=9;$x1++){
			for($x2=0;$x2<=9;$x2++){
		foreach($num_ok as $num_new){
		if (!in_array($num_new , $arr_num)) {
		$arr_num[]=$x1.$x2.$num_new;
       $arr_cc[$x1.$x2.$num_new][]=$exwin_r1[7];
		}
			}
			}
	}
	

			}
			/*elseif($rs['lot_type']==24){
						
          $num_ok=array();
		$num_up=array(substr($rs['play_number'], -2,1),  substr($rs['play_number'], -1,1));
		for($n=0;$n<=9;$n++){
		$num_ok[]=$num_up[0].$num_up[1].$n;
		$num_ok[]=$num_up[0].$n.$num_up[1];
		$num_ok[]=$num_up[1].$num_up[0].$n;
		$num_ok[]=$num_up[1].$n.$num_up[0];
		$num_ok[]=$n.$num_up[1].$num_up[0];
		$num_ok[]=$n.$num_up[0].$num_up[1];
			}#for($n=0;$n<=9;$n++){
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){
		$arr_cc[$num_new][]=$sum10a*$rs['play_br_pay_1'];
	#	echo"$num_new<hr>";
			}	#	foreach($num_ok as $num_new){	
			
		}#	}elseif($rs['lot_type']==24){
			*/
}


?>

<div id="mbox">
<?
$asum=array();

for($x=0;$x<=$limit; $x++){
	$sum=@array_sum($arr_cc[(sprintf($king ,$x))]);

if($sum>0){
$num=sprintf($king ,$x);

$asum['sum'][$num]=$sum;
#$asum[num][$sum]=$num;
#echo sprintf($king ,$x)."= ".number_format($sum)."<br>";
	}
 }
 #arsort()
#ksort()
#krsort() 
#sort ()
#rsort()
#uasort 
#uksort 
#usort 
#echo count($asum[sum]);
if(count($asum['sum'])>0){
	
if($_GET['s']==""){
arsort($asum['sum'] );###มาก หา น้อย	
}

//print_r($asum[sum]); 
#echo"<hr>";
$_SESSION['arr_num_danger'] = array();
$fi = 0;
foreach(array_keys($asum['sum']) as $key){
	if($fi<10){
		$bg = "style='background: #FFCBA2;'";	
		$_SESSION['arr_num_danger'][$fi]["num"] = $key;
   		$_SESSION['arr_num_danger'][$fi]["sum"] = $asum['sum'][$key];
	}else{
		$bg = "";
	}
  echo '<div class="ff_ss cu" onclick="_pre_view2(\''.($key).'\' , \''.($asum['sum'][$key]).'\');" '.$bg.'><b class="cbu">'.$key."</b> = ".number_format($asum['sum'][$key])."</div>";
   
   $fi++;
}
}
 ?>
</div>