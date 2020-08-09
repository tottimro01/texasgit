<?
  session_start();

  $sportId = $_POST['sport'];
  $writeDb = $_POST['writedb'];
  $market = $_POST['market'];
  $pagename = $_POST['pagename'];
  $selleague = $_POST['selleague'];

  if($writeDb==1){ // บันทึกลีกที่เลือก
    $savedSelectLeagueArray = (isset($_SESSION['selectleague'][$sportId][$pagename][$market]) && $_SESSION['selectleague'][$sportId][$pagename][$market]!="") ? explode(",",  $_SESSION['selectleague'][$sportId][$pagename][$market]) : array();
    $leagueArray = explode(",", $selleague);

    foreach ($leagueArray as $kl => $vl) {
      if(!in_array($vl, $savedSelectLeagueArray)){
        $savedSelectLeagueArray[] = $vl;
      }
    }
    $_SESSION['selectleague'][$sportId][$pagename][$market] = implode(",", $savedSelectLeagueArray);
    if($market=="t"){ // ถ้าเลือก market = t ให้กำหนดค่าเลือกลีก market l ด้วย เพราะอยู่หน้าเดียวกัน
      $_SESSION['selectleague'][$sportId][$pagename]["l"] = $_SESSION['selectleague'][$sportId][$pagename][$market];
    }
  }else{ // ลบบันทึกลีกที่เลือก
    unset($_SESSION['selectleague'][$sportId][$pagename][$market]);
    if($market=="t"){ // ถ้าเลือก market = t ให้ลบค่าเลือกลีก market l ด้วย เพราะอยู่หน้าเดียวกัน
      unset($_SESSION['selectleague'][$sportId][$pagename]["l"]);
    }
  }
?>
OK