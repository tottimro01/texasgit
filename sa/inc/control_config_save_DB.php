<?
  ob_start(); if (!isset($_SESSION)) { session_start(); }
  if($_SESSION["AGlang"]=="")
  {
    $_SESSION["AGlang"]="th";
  }
  require('conn.php');
  require('function.php');
  require('ag_function.php');
  require('../lang/sa_lang.php');
  //require('../../lang/function_array.php');
  require('../lang/function_th_new.php');

  $con_note = $_POST['con_note'];
  $con_open_lotto_hun_new = $_POST['con_open_lotto_hun_new'];
  $con_time_games = $_POST['con_time_games'];
  $con_id_games = $_POST['con_id_games'];
  $con_ser_note = $_POST['con_ser_note'];
  $con_end = $_POST['con_end'];
  $con_service = $_POST['con_service'];
  $con_open_lotto = $_POST['con_open_lotto'];
  $con_open_lotto_hun = $_POST['con_open_lotto_hun'];
  $con_open_sport = $_POST['con_open_sport'];
  $con_open_casino = $_POST['con_open_casino'];
  $con_open_games = $_POST['con_open_games'];
  $con_open_tranfer = $_POST['con_open_tranfer'];
  $con_open_af = $_POST['con_open_af'];
  $con_live = $_POST['con_live'];
  $casino_serv1 = $_POST['casino_serv1'];
  $casino_serv2 = $_POST['casino_serv2'];
  $casino_serv3 = $_POST['casino_serv3'];
  $casino_serv4 = $_POST['casino_serv4'];



  $_con_open_lotto_hun_new = "open,x";

  foreach ($lot_zone["th"]["zone"] as $key => $value) {
    if($key <= 1)
    {
      continue;
    }

    $val = (isset($_POST['_con_open_lotto_hun_new_'.$key])) ? 1 : 0;
    
    $_con_open_lotto_hun_new .= ",".$val;
  }


  $sql = "UPDATE `bom_tb_config` SET 
  `con_note`= '".$con_note."', 
  `con_open_lotto_hun_new`= '".$_con_open_lotto_hun_new."',
  `con_time_games`= '".$con_time_games."',
  `con_id_games`= '".$con_id_games."',
  `con_ser_note`= '".$con_ser_note."',
  `con_end`= '".$con_end."',
  `con_service`= '".$con_service."',
  `con_open_lotto`= '".$con_open_lotto."',
  `con_open_lotto_hun`= '".$con_open_lotto_hun."',
  `con_open_sport`= '".$con_open_sport."',
  `con_open_casino`= '".$con_open_casino."',
  `con_open_games`= '".$con_open_games."',
  `con_open_tranfer`= '".$con_open_tranfer."',
  `con_open_af`= '".$con_open_af."',
  `con_live`= '".$con_live."' , 
  `casino_serv1`= '".$casino_serv1."',
  `casino_serv2`= '".$casino_serv2."',
  `casino_serv3`= '".$casino_serv3."',
  `casino_serv4`= '".$casino_serv4."' WHERE `con_id` = 1";

  $rs = sql_query($sql);
  if($rs)
  {
    $jst_sport=array();
    $jst_sport["open"]=$con_open_sport;
    $txt_sport=json_encode($jst_sport);
    $url_file_sport=$json_path."json/sport.json";    
    write($url_file_sport ,$txt_sport,"w+"); 

    $jst_lotto=array();
    $jst_lotto["open"]=$con_open_lotto;
    $txt_lotto=json_encode($jst_lotto);
    $url_file_lotto=$json_path."json/lotto.json";    
    write($url_file_lotto ,$txt_lotto,"w+"); 

    $jst_lotto_hun=array();
    $jst_lotto_hun["open"]=$con_open_lotto_hun;
    $txt_lotto_hun=json_encode($jst_sport);
    $url_file_lotto_hun=$json_path."json/lotto_hun.json";    
    write($url_file_lotto_hun ,$txt_lotto_hun,"w+"); 

    $jst_casino=array();
    $jst_casino["open"]=$con_open_casino;
    $txt_casino=json_encode($jst_casino);
    $url_file_casino=$json_path."json/casino.json";    
    write($url_file_casino ,$txt_casino,"w+"); 

    $jst_games=array();
    $jst_games["open"]=$con_open_games;
    $txt_games=json_encode($jst_games);
    $url_file_games=$json_path."json/games.json";    
    write($url_file_games ,$txt_games,"w+"); 

    $jst_tranfer=array();
    $jst_tranfer["open"]=$con_open_tranfer;
    $txt_tranfer=json_encode($jst_tranfer);
    $url_file_tranfer=$json_path."json/tranfer.json";    
    write($url_file_tranfer ,$txt_tranfer,"w+"); 

    $jst_af=array();
    $jst_af["open"]=$con_open_af;
    $txt_af=json_encode($jst_af);
    $url_file_af=$json_path."json/af.json";    
    write($url_file_af ,$txt_af,"w+"); 

    $data = array(
      'msg'     =>  "สำเร็จ",
      'status'  =>  true,
      'sss' => $_con_open_lotto_hun_new
    );
  }
  else
  {
    $data = array(
      'msg'     =>  "ผิดพลาด",
      'status'  =>  false
    );
  }
  echo json_encode($data);

?>