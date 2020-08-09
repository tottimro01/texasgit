<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?

require('../inc/conn.php');
require('../inc/function.php');


######################################ลบเกิน 1 วัน

$sql="select m_id from bom_tb_member  where m_active=1 order by m_id asc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
$x_del=(60*60*6*1);	
$url_file="../json/sport/bet_wait/".$rs['m_id']."/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
$ct=@filemtime($file);
$nt=$time_stam-$ct;
if($nt>($x_del)){
	   @unlink($file); // delete file 
  }}}
  
$x_del=(60*60*24*1);
$url_file="../json/sport/bet_success/".$rs['m_id']."/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
$ct=@filemtime($file);
$nt=$time_stam-$ct;
if($nt>($x_del)){
	   @unlink($file); // delete file 
  }}}
  
  
	}



######################################ลบเกิน 3 วัน
$x_del=(60*60*24*2);
$time_stam_del=$time_stam-$x_del;
echo $sql="delete from  bom_tb_data_football_single   where    b_date_play<'$time_stam_del' ";
sql_query($sql);
$sql="delete from  bom_tb_data_football_sport   where    b_date_play<'$time_stam_del' ";
sql_query($sql);
$sql="delete from  bom_tb_data_football_step   where    b_date_play<'$time_stam_del' ";
sql_query($sql);
$sql="delete from  bom_tb_data_football_zone   where    z_date_play<'$time_stam_del' ";
sql_query($sql);
$sql="delete from  bom_tb_football_bill_name   where    b_date_play<'$time_stam_del' ";
sql_query($sql);


######################################ลบเกิน 180 วัน
$x_del=(60*60*24*180);
$files = glob('../json/sport/result/temp/*.json'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)){
#	 echo $file;
#	 echo'<br>';
	  $ct=filemtime($file);
#	  echo date("d-m-Y H:i:s",$ct);
#	  echo'<br>';
$nt=$time_stam-$ct;
#echo'<br>';
if($nt>($x_del)){
   @unlink($file); // delete file
}
  }
}



$files = glob('../json/sport/result/desc/*.json'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)){
#	 echo $file;
#	 echo'<br>';
	  $ct=filemtime($file);
#	  echo date("d-m-Y H:i:s",$ct);
#	  echo'<br>';
$nt=$time_stam-$ct;
#echo'<br>';
if($nt>($x_del)){
   @unlink($file); // delete file
}
  }
}



#####################################ภาษา
for($xz=1;$xz<=count($sport_type);$xz++){
	
$files = glob('../json/sport/lang/temp/'.$xz.'/*.json'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)){
#	 echo $file;
#	 echo'<br>';
	  $ct=filemtime($file);
#	  echo date("d-m-Y H:i:s",$ct);
#	  echo'<br>';
$nt=$time_stam-$ct;
#echo'<br>';
if($nt>($x_del)){
   @unlink($file); // delete file
}
  }
}

	
}

?>