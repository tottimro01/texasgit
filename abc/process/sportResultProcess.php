<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $sdate = $_POST['date'];
  $szone = $_POST['sport'];
   $late_result = trim($_POST['late_result']);
   
   if($late_result!="" and $_POST['process']=="8888"){
	######################บอลเลื่อน
	
  $datenew=date("d-m-Y");
	
        $sql="update bom_tb_ball_list set  b_date ='$datenew' where b_id='$late_result'; ";
		sql_query_sp($sql);
		
$sql="select * from bom_tb_football_bill_play_live where b_id='$late_result'  ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
     $sql="update bom_tb_football_bill_live set b_date ='$datenew'  where 	bill_id='$rs[bill_id]'  ;";
	sql_query($sql);
     $sql="update  bom_tb_football_bill_play_live set b_date ='$datenew'   where 	bill_id='$rs[bill_id]'  ;";
	sql_query($sql);	
	
}
		
		
	   
   }elseif($_POST['process']=="1234"){
  
       # $sql="update bom_tb_ball_list set  b_process_ft ='0' , b_process_1h='0' where  b_date ='$sdate'; ";
	   $sql="delete from  bom_tb_ball_process  where  b_date ='$sdate'; ";
		sql_query_sp2($sql);
		
  
     }elseif($_POST['process']=="789"){
  
  $url=$process_sc."sport_process/process.php?d=".$sdate;
  file_get_contents2($url);
  
   }

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  if($sdate == "" || $szone == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 500');
    echo json_encode($res);
    die();
  }

  $res = array('status' => 1,);
  echo json_encode($res);
?>