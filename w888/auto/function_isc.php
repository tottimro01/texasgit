<?
date_default_timezone_set("Asia/Bangkok");
$time_zone=0;
$time_stam=mktime(date("H")+$time_zone,date("i"),date("s"),date("m"),date("d"),date("Y"));


function dd($eng , $lao ){
	$eng=trim($eng);
	$lao=trim($lao);
	
	if($lao!=""){return $lao;}
	else{return $eng;}
	}
	
	function _in_ar($txt , $array){
	$txt=trim(strtoupper($txt));
	if($txt==""){return 0;}
	foreach($array as $check){
		if($check!=""){
			if(strstr($txt, $check )){
				return 0;
				}
			}
		}
	return 1;
	}
		

?>