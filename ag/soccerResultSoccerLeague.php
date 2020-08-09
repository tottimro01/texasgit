<?php 


// 	$SoccerLeague[0]["lkey"] =  "*ENGLISH PREMIER LEAGUE";
// 	$SoccerLeague[0]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก";
// 	$SoccerLeague[1]["lkey"] =  "*ENGLISH PREMIER LEAGUE - CORNERS";
// 	$SoccerLeague[1]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก - เตะมุม";
// 	$SoccerLeague[2]["lkey"] =  "*ENGLISH PREMIER LEAGUE - Injury time awarded at end of 1st half";
// 	$SoccerLeague[2]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก - ทดเวลาบาดเจ็บครึ่งแรก";
// 	$SoccerLeague[3]["lkey"] =  "*ENGLISH PREMIER LEAGUE - Injury time awarded at end of 2nd half";
// 	$SoccerLeague[3]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก - ทดเวลาบาดเจ็บครึ่งหลัง";
// 	$SoccerLeague[4]["lkey"] =  "*ENGLISH PREMIER LEAGUE - SPECIFIC 15 MINS";
// 	$SoccerLeague[4]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก - เฉพาะ 15 นาที";
// 	$SoccerLeague[5]["lkey"] =  "*ENGLISH PREMIER LEAGUE - TOTAL GOALS MINUTES";
// 	$SoccerLeague[5]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก - ผลรวมเวลาที่ได้ประตู";
// 	$SoccerLeague[6]["lkey"] =  "*ENGLISH PREMIER LEAGUE - WHICH TEAM TO KICK OFF";
// 	$SoccerLeague[6]["lcap"] =  "อังกฤษ พรีเมียร์ ลีก - ทีมไหนเขี่ยบอลเริ่มเกม";


// $data = array(
//     'status' => true,
//     'result' => $SoccerLeague,
// );


// echo json_encode($data);

 ?>

<?php 
  require('lang/ag_lang.php');
  include "inc/conn.php";
  include "inc/function.php";

  $res = array();
  $sdate = $_GET['sdate'];
  $szone = $_GET['sport'];
  $sql="select * from bom_tb_ball_list where b_add=1 and b_date='".$sdate."' and  b_zone='$szone'  and b_score_half!='' group by  b_zone_en order by  b_asc asc";
  $re=sql_query_sp($sql);
  while($rs=sql_fetch($re)){
  	$res[] = array(
  	  'lkey' => $rs["b_zone_en"],
  	  'lcap' => $rs["b_zone_th"],
  	);
  }
  $data = array(
    'status' => true,
    'result' => $res,
  );
  echo json_encode($data);
?>