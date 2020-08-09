<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 


require('conn.php');
require('function.php');
require('ag_function.php');
require('../lang/sa_lang.php');


if($_POST["deleted"] == "deleted")
{

  $tnumber = sql_escape_str($_POST["tnumber"]);
  $l_zone = sql_escape_str($_POST["l_zone"]);
  $l_rob = sql_escape_str($_POST["l_rob"]);
  $l_type = sql_escape_str($_POST["ttype"]);

 $sql = "DELETE FROM `bom_tb_1_sa` WHERE `play_number` = '$tnumber' and `lot_type` = $l_type";
$rs = sql_query_lot($sql);	  
  if($rs)
  {
    $data = array(
      'msg'     =>  "ลบสำเร็จ",
      'status'  =>  true,
      'sql' => $sql
    );
  }
  else
  {
    $data = array(
      'msg'     =>  "ผิดพลาด",
      'status'  =>  false,
      'sql' => $sql
    );
  }
  
  echo json_encode($data);

}else{

  if($_POST["tnumber"] !="")
  {

      $tnumber = sql_escape_str($_POST["tnumber"]);
      $l_zone = sql_escape_str($_POST["l_zone"]);
      $l_rob = sql_escape_str($_POST["l_rob"]);
      $l_type = sql_escape_str($_POST["ttype"]);
      $tsum = sql_escape_str($_POST["tsum"]);
      
      $l_zone = ($l_zone =="") ? 1 : $l_zone;
      $l_rob = ($l_rob =="") ? 0 : $l_rob;
      $tsum = ($tsum =="") ? 0 : $tsum;
      
      
	    if($l_type<88){
			
        $sql = "INSERT INTO `bom_tb_1_sa`(`play_number`, `lot_type`, `s_sum`, `s_lock`) VALUES ('$tnumber','$l_type',$tsum,0)";
		$rs = sql_query_lot($sql);
		
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=0  WHERE play_number = '$tnumber' and `lot_type` = $l_type";
		 $rs = sql_query_lot($sql);
		 
		if($tsum<10){
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=1 WHERE play_number = '$tnumber' and `lot_type` = $l_type";
		 $rs = sql_query_lot($sql);
		}
		
		
		}else{
			
			    if($l_type==88){
					
$num_up=array(substr($tnumber, -2,1),  substr($tnumber, -1,1));
sort($num_up);
#$tnumber=$num_up[0].$num_up[1];	
$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0];	

	foreach($arr_xnum as $newnum){
		
        $sql = "INSERT INTO `bom_tb_1_sa`(`play_number`, `lot_type`, `s_sum`, `s_lock`) VALUES ('$newnum','4',$tsum,0)";
		$rs = sql_query_lot($sql);
        $sql = "INSERT INTO `bom_tb_1_sa`(`play_number`, `lot_type`, `s_sum`, `s_lock`) VALUES ('$newnum','5',$tsum,0)";
		$rs = sql_query_lot($sql);
		
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=0  WHERE play_number = '$newnum' and `lot_type` = 4";
		 $rs = sql_query_lot($sql);
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=0  WHERE play_number = '$newnum' and `lot_type` = 5";
		 $rs = sql_query_lot($sql);
		 
		if($tsum<10){
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=1 WHERE play_number = '$newnum' and `lot_type` = 4";
		 $rs = sql_query_lot($sql);
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=1 WHERE play_number = '$newnum' and `lot_type` = 5";
		 $rs = sql_query_lot($sql);
		}
		
	}

					
				}elseif($l_type==99){
					
$num_up=array(substr($tnumber, -3,1), substr($tnumber, -2,1),  substr($tnumber, -1,1));
sort($num_up);
#$tnumber=$num_up[0].$num_up[1].$num_up[2];	

$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[2];	
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0].$num_up[2];	
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[0].$num_up[1];	

$l_type=1;

	foreach($arr_xnum as $newnum){
		
        $sql = "INSERT INTO `bom_tb_1_sa`(`play_number`, `lot_type`, `s_sum`, `s_lock`) VALUES ('$newnum','$l_type',$tsum,0)";
		$rs = sql_query_lot($sql);
		
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=0  WHERE play_number = '$newnum' and `lot_type` = $l_type";
		 $rs = sql_query_lot($sql);
		 
		if($tsum<10){
         $sql = "UPDATE `bom_tb_1_sa` SET  `s_sum`=$tsum,`s_lock`=1 WHERE play_number = '$newnum' and `lot_type` = $l_type";
		 $rs = sql_query_lot($sql);
		}
		
	}

					
					}
					

			
			
			
			}


      
      
  
      
      if($rs)
      {
        $data = array(
          'msg'     =>  "สำเร็จ",
          'status'  =>  true,
          // 'sql'  =>   $sql,
        );
      }
      else
      {
        $data = array(
          'msg'     =>  "ผิดพลาด",
          'status'  =>  false,
          // 'sql'  =>   $sql,
        );
      }

  }else{
      $data = array(
        'msg'     =>  "กรอกข้อมูลไม่ถูกต้อง",
        'status'  =>  false,
      );
  }

  echo json_encode($data);

} 


?>