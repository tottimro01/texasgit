
<?
require ("../inc/conn.php");
require ("../inc/function.php");
/*
function _bdate(){
	
$timezone=7;
$time_stam=mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"));


if((date("Hi")>=0000) and (date("Hi")<=1200)){
	$view_date=date("d-m-Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")-1,date("Y")));
	}else{$view_date=date("d-m-Y",$time_stam);}		

return $view_date;
	}
*/

	
	$txt="บอลยกเลิก ". _bdate()." # ";
	$sql="select * from bom_tb_ball_list where  	b_date='". _bdate()."' and b_active='1' and b_process='2' group by b_id  order by b_date_play asc";
	$re=sql_query($sql);
	
	while($rs=sql_fetch($re)){
		$txt.=date("H:i",$rs[b_date_play])." $rs[b_name_1] vs $rs[b_name_2] , ";
		}
$num=sql_num($sql);		
if($num>0){
$sql="update bom_tb_config set con_note ='$txt' where  con_id='1'";
sql_query($sql);
}
	


?><meta http-equiv="refresh" content="0;URL=<?=$_SERVER['HTTP_REFERER'];?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />