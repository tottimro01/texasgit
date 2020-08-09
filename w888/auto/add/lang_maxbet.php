<? 


$data2=str_replace(array('Nt[',']=[','] = [') ,array('"','",','",') , $data);
$data4 = explode('];' , $data2);




foreach($data4 as $data5){
	
$xx = explode(',' , $data5);

$pid=_xtrim($xx[2]);
$add=_xtrim($xx[4]);

if($pid!="" and $add==1){
	
#	print_r($xx);
	
$zone=_xtrim($xx[6]);

					if($zone!=""){
					$zone_n = _xtrim($xx[6]);
						}else{
					$zone = $zone_n;		
							}

$zone=str_replace('*' ,'' , $zone);

$name1=_xtrim($xx[7]);
$name2=_xtrim($xx[8]);
if($name1!=""){
   $sql = "update bom_tb_lang_team set ".$lang."='$name1' maxbet_id='$pid'  where   (en=".$lang."  and maxbet_id='$pid' ) or ( ".$lang."=''  and maxbet_id='$pid')";
 sql_query($sql);
# echo $sql."<hr>";
}
if($name2!=""){
   $sql = "update bom_tb_lang_team set ".$lang."='$name2' maxbet_id='$pid'    where   (en=".$lang."  and maxbet_id='$pid' ) or ( ".$lang."=''  and maxbet_id='$pid')";
 sql_query($sql);
#   echo $sql."<hr>";
}
if($zone!=""){
   $sql = "update bom_tb_lang_zone set ".$lang."='$zone' maxbet_id='$pid'    where    (en=".$lang."  and maxbet_id='$pid' ) or ( ".$lang."=''  and maxbet_id='$pid')";
  sql_query($sql);
 #echo $sql."<hr>"; 
}
  
}
}#foreach($t4 as $mnn){
?>