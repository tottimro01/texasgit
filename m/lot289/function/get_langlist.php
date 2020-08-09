<?
	session_start();
	header("Content-type: text/html");

	require('../../../inc/conn.php');
	require('../../../inc/function.php');


	require 'compress_page.php';
	
	/*$url = $_SESSION["url"].'listlang.php';
	$data = file_get_contents($url);
	$data = json_decode($data,true);*/




	$arr = array();	
		$i = 0;
		foreach($m_lang as $key => $value){
		$arr[$i]["title"] = $value;
		$arr[$i]["keys"] = $arr_lang[$key];
		$arr[$i]["file"] = $arr_lang[$key].".php";
		$arr[$i]["files"] = "lang_app/".$arr_lang[$key].".php";
		$arr[$i]["url"] = "https://www.lotzx.com/ios/imglang/ic_flag_".$arr_lang[$key].".png";
		$i++;
		}
	
  
	$datax = json_encode($arr);
	$data = json_decode($datax, true);


	
	foreach ($data as $key => $value) {
		?>
		<a href="javascript:void(0);" class="lang_wrapper" onclick="setLang('<?=$value["keys"];?>');">
			<img src=<?=$value["url"];?> alt="">
			<div><?=$value["title"];?></div>
		<? if($_COOKIE["lang"] == $value["keys"]){ ?>
				<img src="library/img/ico/ic_menu_check.png?v1001" alt="" class="lang-check">
		<? } ?>
		</a>
<? } ?>

