<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

    $arr = array();
    $zone = $_SESSION['zone_hun'];

	$sql = "SELECT * FROM bom_tb_news WHERE b_zone = $zone ORDER BY n_date DESC"; 
	$resNews = sql_query($sql);

	while ($news = sql_fetch($resNews)){
		if($lage=="th"){
			$news["n_note"] = $news["n_note_th"];
		}else if($lage=="cn"){
			$news["n_note"] = $news["n_note_cn"];
		}else{
			$news["n_note"] = $news["n_note_en"];
		}
	
		if($news["n_note"]==""){
			$news["n_note"] = $news["n_note_en"];
		}
		
		$arr[] = $news;
	}

	echo json_encode($arr);
?>