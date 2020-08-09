<?php	
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../inc/function.php');

	$arr = array();	
		$i = 0;
		foreach($m_lang as $key => $value){
		$arr[$i]["title"] = $value;
		$arr[$i]["keys"] = $arr_lang[$key];
		$arr[$i]["file"] = "lang_use.php?lang=".$arr_lang[$key];
		$arr[$i]["files"] = "lang_app/lang_use.php?lang=".$arr_lang[$key];
		$arr[$i]["url"] = "http://app.wan1991.com/lotto/imglang/ic_flag_".$arr_lang[$key].".png?v=1";
		$i++;
		}
		/*
		//=====================================================
		$i = 1;
		$arr[$i]["title"] = "ລາວ";
		$arr[$i]["keys"] = "la";
		$arr[$i]["file"] = "la.php";
		$arr[$i]["url"] = "https://www.lotzx.com/ios/imglang/ic_flag_lao.png";
		
		//=====================================================
		$i = 2;
		$arr[$i]["title"] = "English";
		$arr[$i]["keys"] = "en";
		$arr[$i]["file"] = "en.php";
		$arr[$i]["url"] = "https://www.lotzx.com/ios/imglang/ic_flag_en.png";

		$i = 3;
		$arr[$i]["title"] = "Myanmar";
		$arr[$i]["keys"] = "mm";
		$arr[$i]["file"] = "mm.php";
		$arr[$i]["url"] = "https://www.lotzx.com/ios/imglang/ic_flag_my.png";
	  */
  
	echo json_encode($arr);

?>