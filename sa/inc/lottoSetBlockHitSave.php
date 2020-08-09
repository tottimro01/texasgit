<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

require('conn.php');
require('function.php');
require('ag_function.php');
require('../lang/sa_lang.php');

$zone = sql_escape_str($_POST['l_zone']);
$rob = sql_escape_str($_POST['l_rob']);
$rob = ($rob =="") ? 1 : $rob;
$_rob = ($rob!="") ? "and lot_rob = '$rob'" : "";
$l_zone = sql_escape_str($_POST["l_zone"]);
$l_type = sql_escape_str($_POST["ttype"]);
$tnumber = sql_escape_str($_POST["tnumber"]);

if($zone != "")
{ 
  if($_POST["deleted"] == "deleted")
  {

   
    $tsum = sql_escape_str($_POST["tsum"]);

    $sql = "DELETE FROM `bom_tb_nothit` WHERE `nothit_num` = '$tnumber' and `lot_type` = $l_type and  `lot_zone` = $l_zone and  `lot_rob` = $rob  ";
    $rs = sql_query($sql);    
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
    exit();
    
  }else{


    if($_POST["tnumber"] !="")
    {
       $tsum = sql_escape_str($_POST["tsum"]);

      if($l_type<88){
        
        $sql = "INSERT INTO `bom_tb_nothit`(`nothit_num`, `lot_type`, `lot_zone`, `lot_rob`) VALUES ('$tnumber','$l_type',$l_zone,$rob)";
        $rs = sql_query($sql);

      }else{
        
          if($l_type==88){
          
            $num_up=array(substr($tnumber, -2,1),  substr($tnumber, -1,1));
            sort($num_up);
            #$tnumber=$num_up[0].$num_up[1];  
            $arr_xnum=array();
            $arr_xnum[]=$num_up[0].$num_up[1];  
            $arr_xnum[]=$num_up[1].$num_up[0];  

            foreach($arr_xnum as $newnum){
              
              $sql = "INSERT INTO `bom_tb_nothit`(`nothit_num`, `lot_type`, `lot_zone`, `lot_rob`) VALUES ('$newnum','4',$l_zone,$rob)";
              $rs = sql_query($sql);
              $sql = "INSERT INTO `bom_tb_nothit`(`nothit_num`, `lot_type`, `lot_zone`, `lot_rob`) VALUES ('$newnum','5',$l_zone,$rob)";
              $rs = sql_query($sql);
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
              
              $sql = "INSERT INTO `bom_tb_nothit`(`nothit_num`, `lot_type`, `lot_zone`, `lot_rob`) VALUES ('$newnum','$l_type',$l_zone,$rob)";
              $rs = sql_query($sql);
        
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

  } 

}else{

  $data = array(
      'msg'     =>  "ผิดพลาด",
      'status'  =>  false,
      'sql' => $sql
    );
} 

echo json_encode($data);

?>