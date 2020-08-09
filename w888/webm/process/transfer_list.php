<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

	$mid = $_SESSION["m_id"];
	$zone=$_SESSION['zone_hun'];
	$rob=$_SESSION['rob_hun'];
	
	$arr = array();
  $arr['transfer'] = array();
  $arr['withdraw'] = array();
    $cc = 0;
    $sql_list_tran = sql_query("select * from bom_tb_trans where m_id='".$mid."' and t_type=1 order by t_id desc, t_status desc limit 100");
    while($rs=sql_fetch($sql_list_tran)){
      $cc++;
      $last4digit = explode("=", $rs['t_note']);
      $arr['transfer'][] = array(
        'no' => $cc,
        'bank' => $ab_bank[$rs['t_bank']],
        'bank_num' => "******".$last4digit[1],
        'date' => date('d/m/Y', strtotime($rs['t_date'])),
        'time' => date('H:i:s', strtotime($rs['t_date'])),
        'amount' => number_format($rs['t_count'],2),
        'status_txt' => $ab_status[$rs['t_status']],
        'status' => $rs['t_status'],
      );
    }

    $cc = 0;
    $sql_list_tran = sql_query("select * from bom_tb_trans where m_id='".$mid."'  and t_type=2 order by t_id desc , t_status desc limit 100");
    while($rs=sql_fetch($sql_list_tran)){
      $cc++;
      $ex=explode("@",$rs['t_note']);
      $arr['withdraw'][] = array(
        'no' => $cc,
        'bank' => $ab_bank[$rs['t_bank']],
        'bank_num' => "******".substr($ex[1], -4,4),
        'date' => date('d/m/Y', strtotime($rs['t_date'])),
        'time' => date('H:i:s', strtotime($rs['t_date'])),
        'amount' => number_format($rs['t_count'],2),
        'status_txt' => $ab_status[$rs['t_status']],
        'status' => $rs['t_status'],
      );
    }

    echo json_encode($arr);

?>