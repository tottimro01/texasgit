<?
date_default_timezone_set("Asia/Bangkok");

	
	###########Price EU
 function peu($val)
{
	if($val!=""){
		
	if($val>=0.00){
       $val=1+$val;
		}else{
   $val=3+$val;
			}
			
	return round($val , 2);
	}
}

###########Price EU
 function pereu($val,$per )
{
	if($val!=""){
	 $val1=3-($val+($per/100));		
	 $val2=1+$val1;
	return round($val2 , 2);
	}
}

#################ถ่างค่าน้ำ
 function nam($val, $arr, $type)
{
	#$arr_nam=array("set_hdc"=>$res[set_hdc] , "set_goal"=>$res[set_goal] , "set_1x2"=>$res[set_1x2] , "set_oe"=>$res[set_oe] );
		if($val!=""){
	if($val>=0.00){
		if($type==1){
       $val=$val-(($arr[set_hdc])/100);
		}elseif($type==2){
			 $val=$val-(($arr[set_goal])/100);
		}elseif($type==3){
			 $val=$val-(($arr[set_1x2])/100);
		}elseif($type==4){
			 $val=$val-(($arr[set_oe])/100);
		}
		}else{
      $val=$val;
			}
			
	return round($val , 2);
		}
}

	#############หาเปอร์เซ็น ค่าถ่างน้ำ
	 function hapereu($p1,$p2 )
{
if( $p1!=""){
	
	 $val1=$p1+$p2;		
	 $val2=(4-$val1)*100;

	return ($val2 );
}	
}


			function _xtrim($data)
{
$data=str_replace('"','',$data);
    return _ytrim(trim($data));
}

		
		function _ytrim($data)
{
$data=str_replace("'","",$data);
    return trim($data);
}
		
?>
