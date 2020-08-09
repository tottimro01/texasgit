<?
$conn;
$hostname_conn = "localhost";


if($_SERVER['REMOTE_ADDR']=="127.0.0.1" or $_SERVER['REMOTE_ADDR']=="::1")
{
$hostserver="http://localhost:81/2016/lotzx.com/";
$database_conn = "lotto_lotzx";
$username_conn = "root";
$password_conn = "1234";

 $check_url="lotzx.com";
}else{
	
#	$hostname_conn = "202.162.78.37";
	    $hostserver="http://www.lotzx.com/";
$hostname_conn = "localhost";		
$username_conn = "lotzx_root";
$password_conn = "963214785";
$database_conn = "lotzx_db";
		
		 $check_url="lotzx.com";
}


function conn_db_func(){
	global $conn;
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

$conn = @mysql_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
@mysql_query("SET NAMES UTF8");


@mysql_select_db($database_conn)or die("No connect");
}
################################
###########ฟังก์ชันสำหรับปิดการเชื่อมต่อฐานข้อมูล
function close_db_func(){
	global $conn;
	 @mysql_close($conn);
}
###############################
######### mysql_db_query
function sql_query($sqlSelect){	
	global $database_conn;
	conn_db_func();		
	$result =  @mysql_db_query($database_conn, $sqlSelect);
	#echo $sqlSelect;
	close_db_func();		
	return $result;	}
	
###############################
######### sql_fetch
function sql_array($sqlSelect){	
	global $database_conn;
	conn_db_func();		
	$result =  @mysql_db_query($database_conn, $sqlSelect);
	$array= @sql_fetch($result); 
	close_db_func();		
	return $array;	}
	
###############################
######### mysql_num_rows
function sql_num($sqlSelect){	
	global $database_conn;
	conn_db_func();		
  
	$result = @mysql_db_query($database_conn, $sqlSelect);
	$num=@mysql_num_rows($result); 
	close_db_func();		
	return $num;	}
	
###############################
######### mysql_select_page
function sql_page($table,$id,$orderby,$Numpage){	
	global $database_conn;
   // global 
   $pg=$_GET[pg];
if(empty($pg)){$pg=1;}
				  
	conn_db_func();	
	$sql="select $id from $table";	
  
	$result =  @mysql_db_query($database_conn,$sql);
	 $num_rows= @mysql_num_rows($result);
	$totalpage= @ceil($num_rows/$Numpage);
	$goto=($pg-1)*$Numpage;	
	
$sql="select * from $table  order by $id $orderby LIMIT $goto,$Numpage";
#echo $sql;
$result =  @mysql_db_query($database_conn,$sql);
	close_db_func();	

	return array("page"=>$totalpage,"num"=>$num_rows,"re"=>$result);	
		}
		
		
		
function sql_page2($table, $where,$id,$orderby,$Numpage){	
	global $database_conn;
   // global 
   $table2=$table.'2';
   $pg=$_GET[pg];
if(empty($pg)){$pg=1;}
				  
	conn_db_func();	
	$sql="select $id from $table";	
  
	$result =  @mysql_db_query($database_conn,$sql);
	 $num_rows= @mysql_num_rows($result);
	$totalpage= @ceil($num_rows/$Numpage);
	$goto=($pg-1)*$Numpage;	
$sql="SELECT * FROM (select * from $table    UNION  select * from $table2) AS u  WHERE $where   order by $id $orderby LIMIT $goto,$Numpage";
//echo $sql;
$result =  @mysql_db_query($database_conn,$sql);
	close_db_func();	

	return array("page"=>$totalpage,"num"=>$num_rows,"re"=>$result);	
		}
	
		############## config
###############################
######### sql_fetch
function sql_fetch($result){	
	$rs = @mysql_fetch_assoc($result);
	//@mysql_free_result($result);
	return $rs;	
	}

###############################
######### mysql_free_result
function sql_free($result){	
	@mysql_free_result($result);
	}
		
?>
