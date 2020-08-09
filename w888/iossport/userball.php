<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$_SESSION["m_level"] = 3;
$_SESSION["nam"][0] = "1,1";
$_SESSION["nam"][1] = "";
$_SESSION["nam"][2] = "";
$_SESSION["nam"][3] = "";
$_SESSION["nam"][4] = "";
$_SESSION["nam"][5] = "";
$_SESSION["nam"][6] = "";
$_SESSION["nam"][7] = "7,7";
$_SESSION["m_price_type"] = 3;


$arr = json_decode($_POST["dataJSON_".$_SESSION["m_price_type"]], true);

$arr_json = array();
$arr_json["zone"] = $arr["zone"];
$table_json = array();
$data = array();
foreach ($arr["table_data"] as $key => $value) {
	$data[$key] = array();
	foreach ($value as $key2 => $value2) {
		

		$_mtr1 = _mtr( $_SESSION["m_level"] ,$value2["_mtr1"][0],$value2["_mtr1"][1],$value2["_mtr1"][2],$_SESSION["nam"]);
		$_mtr1_2 = _mtr( $_SESSION["m_level"] ,$value2["_mtr1_2"][0],$value2["_mtr1_2"][1],$value2["_mtr1_2"][2],$_SESSION["nam"]);
		$_mtr2 = _mtr( $_SESSION["m_level"] ,$value2["_mtr2"][0],$value2["_mtr2"][1],$value2["_mtr2"][2],$_SESSION["nam"]);
		$_mtr2_2 = _mtr( $_SESSION["m_level"] ,$value2["_mtr2_2"][0],$value2["_mtr2_2"][1],$value2["_mtr2_2"][2],$_SESSION["nam"]);
		$_mtr3 = _mtr( $_SESSION["m_level"] ,$value2["_mtr3"][0],$value2["_mtr3"][1],$value2["_mtr3"][2],$_SESSION["nam"]);
		$_mtr4 = _mtr( $_SESSION["m_level"] ,$value2["_mtr4"][0],$value2["_mtr4"][1],$value2["_mtr4"][2],$_SESSION["nam"]);

		$value2["_mtr1"] = ($_mtr1 != "" ? $_mtr1 : "");
		$value2["_mtr1_2"] = ($_mtr1_2 != "" ? $_mtr1_2 : "");
		$value2["_mtr2"] = ($_mtr2 != "" ? $_mtr2 : "");
		$value2["_mtr2_2"] = ($_mtr1 != "" ? $_mtr2_2 : "");
		$value2["_mtr3"] = ($_mtr1 != "" ? $_mtr3 : "");
		$value2["_mtr4"] = ($_mtr1 != "" ? $_mtr4 : "");

		$data[$key][$key2] = $value2;

	}
}
$table_json = $data;
$arr_json["table_data"] = $table_json;

echo json_encode($arr_json);




 function _mtr($level , $val ,$type ,$big,$tnam)
{
	$n1=$tnam[0];
	$n2=$tnam[1];
	$n3=$tnam[2];
	$n4=$tnam[3];
	$n5=$tnam[4];
	$n6=$tnam[5];
	$n7=$tnam[6];
	$nm=$tnam[7];
	
	
$exn1=@explode(",",$n1);
$exn2=@explode(",",$n2);
$exn3=@explode(",",$n3);
$exn4=@explode(",",$n4);
$exn5=@explode(",",$n5);
$exn6=@explode(",",$n6);
$exn7=@explode(",",$n7);
#$exn8=@explode(",",$arnam8);
$mxn=@explode(",",$nm);

	
#$ex=@explode(',',$nam);
if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	if($level==2){
		$val2=$val-($mxn[0]/100);
	}elseif($level==3){
		$val2=$val-(($mxn[0]+$exn1[0])/100);
			}elseif($level==4){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0])/100);
			}elseif($level==5){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0])/100);
			}elseif($level==6){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0])/100);
			}elseif($level==7){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0])/100);
			}elseif($level==8){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$exn6[0])/100);
			}elseif($level==9){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$exn6[0]+$exn7[0])/100);
		
		}

	}else{


	if($level==2){
		$val2=$val-($mxn[1]/100);
	}elseif($level==3){
		$val2=$val-(($mxn[1]+$exn1[1])/100);
			}elseif($level==4){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1])/100);
			}elseif($level==5){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1])/100);
			}elseif($level==6){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1])/100);
			}elseif($level==7){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1])/100);
			}elseif($level==8){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$exn6[1])/100);
			}elseif($level==9){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$exn6[1]+$exn7[1])/100);
		
		}

		
	}

	return _no0($val2);
}
	function _no0($val){
		if($val>0){return  number_format($val, 2, '.', '');}
		}	
?>