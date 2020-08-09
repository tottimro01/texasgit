<? 


$data2=str_replace(array('th[',']=[','] = [') ,array('"','",','",') , $data);
$data3=str_replace('var th=[];','', $data2);
$data4 = explode('];' , $data3);




foreach($data4 as $data5){
	
$xx = explode(',' , $data5);

$pid=_xtrim($xx[0]);
if($pid!=""){
$zone=_xtrim($xx[1]);
$zone=str_replace('*' ,'' , $zone);
$name1=_xtrim($xx[2]);
$name2=_xtrim($xx[3]);
if($name1!=""){
   $sql = "update bom_tb_lang_team set ".$lang."='$name1' maxbet_id='$pid'  where   (en=".$lang."  and maxbet_id='$pid' ) or ( ".$lang."=''  and maxbet_id='$pid')";
  sql_query($sql);
 # echo $sql."<hr>";
}
 if($name2!=""){
   $sql = "update bom_tb_lang_team set ".$lang."='$name2' maxbet_id='$pid'    where   (en=".$lang."  and maxbet_id='$pid' ) or ( ".$lang."=''  and maxbet_id='$pid')";
  sql_query($sql);
#  echo $sql."<hr>";
 }
if($zone!=""){
   $sql = "update bom_tb_lang_zone set ".$lang."='$zone' maxbet_id='$pid'    where    (en=".$lang."  and maxbet_id='$pid' ) or ( ".$lang."=''  and maxbet_id='$pid')";
  sql_query($sql);
# echo $sql."<hr>"; 
}
}
}#foreach($t4 as $mnn){
?>