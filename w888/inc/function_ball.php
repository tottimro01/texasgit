<?php
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
function _chdc($hdc1 , $hdc2 , $big){
	
	if($big=="a"){$big=2;}
	else{$big=1;}

	if($hdc1>0.000 and $hdc2>0.000){
		$type="B1";
	 if($hdc1>=0.900 and $hdc2>=0.900){ $h1=1.90;  $h2=1.90; if($big==1){$pp=2;}else{$pp=2;} }
	 elseif($hdc1>0.990){ $h1=2.00;  $h2=1.80;   if($big==1){$pp=1;}else{$pp=4;}}
	 elseif($hdc1>0.950){ $h1=2.00;  $h2=1.80;   if($big==1){$pp=1;}else{$pp=4;} }
	 elseif($hdc1>=0.900){ $h1=1.90;  $h2=1.90;  if($big==1){$pp=2;}else{$pp=2;} }
	  elseif($hdc1>0.850){ $h1=1.80;  $h2=2.00; if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>=0.800){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>0.750){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>=0.700){ $h1=1.72;  $h2=2.11;   if($big==1){$pp=3;}else{$pp=3;} }
	  else{$h1='';  $h2='';  $pp=0; }
		  
		
	}elseif($hdc1>$hdc2){
		$type="B2";
	 if($hdc1<=0.650){ $h1=1.60;  $h2=2.20; $pp=0;}
     elseif($hdc1<=0.750){ $h1=1.72;  $h2=2.11;  if($big==1){$pp=3;}else{$pp=3;}}
	elseif($hdc1<=0.850){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	elseif($hdc1<=0.950){ $h1=1.90;  $h2=1.90;  if($big==1){$pp=2;}else{$pp=2;}}
	elseif($hdc1<=0.999){ $h1=2.00;  $h2=1.80;  if($big==1){$pp=1;}else{$pp=4;}}
	else{ $h1=1.80;  $h2=2.00;  if($big==1){$pp=1;}else{$pp=4;} }
		}else{
		$type="B3";
	 if($hdc2<=0.650){ $h2=1.60;  $h1=2.20; $pp=0;}
     elseif($hdc2<=0.750){ $h2=1.72;  $h1=2.11;  if($big==1){$pp=3;}else{$pp=3;}}
	elseif($hdc2<=0.850){ $h2=1.80;  $h1=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	elseif($hdc2<=0.950){ $h2=1.90;  $h1=1.90;  if($big==1){$pp=2;}else{$pp=2;}}
	elseif($hdc2<=0.999){ $h2=2.00;  $h1=1.80;  if($big==1){$pp=1;}else{$pp=4;}}
	else{ $h2=1.80;  $h1=2.00;  if($big==1){$pp=1;}else{$pp=4;} }
			}

	
	return array("hdc1"=>number_format($h1,2), "hdc2"=>number_format( $h2,2) ,"play"=>$pp, "type"=>$type, "ohdc1"=>$hdc1, "ohdc2"=>$hdc2);
	//return array(number_format($h1,2),number_format( $h2,2) ,$pp, $type, $hdc1, $hdc2);
	}
	function _mix($hdc){
		return number_format($hdc,3);
	}
	function _red($hdc){
	if($hdc<-0.000){
		echo "red";
	}else{
		echo "black";
	}
}
function price_ball($val , $t){
	if($val!=""){
		if($t==1){
			return my($val);	
		}else if($t==2){
			return hk($val);	
		}else if($t==3){
			return eu($val);	
		}
	}else{
		return "";	
	}
}
function my($val){
	return $val;	
}
function hk($val){
	if($val<0){
		return (1+($val))+1;
	}else{
		return $val;	
	}
}
function eu($val){
	if($val<0){
		return (1+($val))+2;
	}else{
		return $val+1;	
	}
}
function _cg($val)
{

	if ($val == "0.0" ) {
		if($_SESSION["lang"]=="en"){
        return $val;
		}else{
		return "เสมอ";
			}
    }elseif ($val == "0+0.5" or $val == "0-0.5" ) {
		if($_SESSION["lang"]=="en"){
        return "0+½";
		}else{
		return "ปป.";
			}
    }elseif ($val == "0.5") {
        return "½";
    } elseif ($val == "0.5+1" or $val == "0.5-1") {
        return "½+1";
    } elseif ($val == "1+1.5" or $val == "1-1.5" ) {
        return "1+1½";
    } elseif ($val == "1.5") {
        return "1½";
    } elseif ($val == "1.5+2" or $val == "1.5-2") {
        return "1½+2";
    } elseif ($val == "2+2.5" or $val == "2-2.5") {
        return "2+2½";
    } elseif ($val == "2.5") {
        return "2½";
    } elseif ($val == "2.5+3" or $val == "2.5-3" ) {
        return "2½+3";
    } elseif ($val == "3+3.5" or $val == "3-3.5") {
        return "3+3½";
    } elseif ($val == "3.5") {
        return "3½";
    } elseif ($val == "3.5+4" or $val == "3.5-4") {
        return "3½+4";
    } elseif ($val == "4.5") {
        return "4½";
    } elseif ($val == "4.5+5" or $val == "4.5-5") {
        return "4½+5";
    } elseif ($val == "5+5.5" or $val == "5-5.5" ) {
        return "5+5½";
    } elseif ($val == "5.5") {
        return "5½";
    } elseif ($val == "5.5+6" or $val == "5.5-6") {
        return "5½+6";
    } elseif ($val == "6+6.5" or $val == "6-6.5") {
        return "6+6½";
    } elseif ($val == "6.5") {
        return "6½";
    } elseif ($val == "6.5+7" or $val == "6.5-7") {
        return "6½+7";
    } elseif ($val == "7+7.5" or $val == "7-7.5" ) {
        return "7+7½";
    } elseif ($val == "7.5") {
        return "7½";
    } elseif ($val == "7.5+8" or $val == "7.5-8") {
        return "7½+8";
    } elseif ($val == "8+8.5" or $val == "8-8.5"  ) {
        return "8+8½";
    } elseif ($val == "8.5") {
        return "8½";
    } elseif ($val == "8.5+9" or $val == "8.5-9") {
        return "8½+9";
    } elseif ($val == "9+9.5" or $val == "9-9.5") {
        return "9+9½";
    } elseif ($val == "9.5") {
        return "9½";
    } elseif ($val == "9.5+10" or $val == "9.5-10") {
        return "9½+10";
    } elseif ($val == "10+10.5" or  $val == "10-10.5") {
        return "10+10½";
    } else {
        return $val;
    }
}
?>