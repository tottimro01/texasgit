<?php

require('conn_dd.php');

###############################
function sql_query($sqlSelect){	

	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 mysqli_set_charset($conn, "utf8");


 $result =  @mysqli_query($conn, $sqlSelect);

@mysqli_close($conn);
	 
return $result;	
}
	
###############################
function sql_array($sqlSelect){	
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 mysqli_set_charset($conn, "utf8");
 
	$result =  @mysqli_query($conn, $sqlSelect);
	$array= @mysqli_fetch_array($result); 
	
	@mysqli_close($conn);
	
	return $array;	
	}
	
###############################
function sql_num($sqlSelect){	

	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 mysqli_set_charset($conn, "utf8");
 
  
	$result = @mysqli_query($conn, $sqlSelect);
	$num=@mysqli_num_rows($result); 
	@mysqli_close($conn);
	return $num;	}
	
###############################
function sql_page($table,$id,$orderby,$Numpage){	

   $pg=$_GET[pg];
if(empty($pg)){$pg=1;}
				  
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 mysqli_set_charset($conn, "utf8");
 
	$sql="select $id from $table";	
  
	$result =  @mysqli_query($conn,$sql);
	 $num_rows= @mysqli_num_rows($result);
	$totalpage= @ceil($num_rows/$Numpage);
	$goto=($pg-1)*$Numpage;	
	
$sql="select * from $table  order by $id $orderby LIMIT $goto,$Numpage";
$result =  @mysqli_query($conn,$sql);
@mysqli_close($conn);

	return array("page"=>$totalpage,"num"=>$num_rows,"re"=>$result);	
		}
	

###############################
function sql_fetch($result){	
	$rs = @mysqli_fetch_array($result);
	return $rs;	
	}
function sql_fetch_as($result){	
	$rs = @mysqli_fetch_assoc($result);
	return $rs;	
	}

###############################
function sql_free($result){	
	@mysqli_free_result($result);
	}	


	##################################Sport#############################
	###############################
function sql_query_sp($sqlSelect){	

	global $hostname_conn2;
	global $username_conn2;
	global $password_conn2;
	global $database_conn2;

 $conn2 = @mysqli_connect($hostname_conn2, $username_conn2, $password_conn2, $database_conn2)or die("No connect");
 mysqli_set_charset($conn2, "utf8");


 $result =  @mysqli_query($conn2, $sqlSelect);

@mysqli_close($conn2);
	 
return $result;	
}
	
###############################
function sql_array_sp($sqlSelect){	
	global $hostname_conn2;
	global $username_conn2;
	global $password_conn2;
	global $database_conn2;

 $conn2 = @mysqli_connect($hostname_conn2, $username_conn2, $password_conn2, $database_conn2)or die("No connect");
 mysqli_set_charset($conn2, "utf8");
 
	$result =  @mysqli_query($conn2, $sqlSelect);
	$array= @mysqli_fetch_array($result); 
	
	@mysqli_close($conn2);
	
	return $array;	
	}
	
###############################
function sql_num_sp($sqlSelect){	

	global $hostname_conn2;
	global $username_conn2;
	global $password_conn2;
	global $database_conn2;

 $conn2 = @mysqli_connect($hostname_conn2, $username_conn2, $password_conn2, $database_conn2)or die("No connect");
 mysqli_set_charset($conn2, "utf8");
 
  
	$result = @mysqli_query($conn2, $sqlSelect);
	$num=@mysqli_num_rows($result); 
	@mysqli_close($conn2);
	return $num;	}
	

	
##################################LOTTO#############################
	###############################
function sql_query_lot($sqlSelect){	

	global $hostname_conn3;
	global $username_conn3;
	global $password_conn3;
	global $database_conn3;

 $conn3 = @mysqli_connect($hostname_conn3, $username_conn3, $password_conn3, $database_conn3)or die("No connect");
 mysqli_set_charset($conn3, "utf8");


 $result =  @mysqli_query($conn3, $sqlSelect);

@mysqli_close($conn3);
	 
return $result;	
}
	
###############################
function sql_array_lot($sqlSelect){	
	global $hostname_conn3;
	global $username_conn3;
	global $password_conn3;
	global $database_conn3;

 $conn3 = @mysqli_connect($hostname_conn3, $username_conn3, $password_conn3, $database_conn3)or die("No connect");
 mysqli_set_charset($conn3, "utf8");
 
	$result =  @mysqli_query($conn3, $sqlSelect);
	$array= @mysqli_fetch_array($result); 
	
	@mysqli_close($conn3);
	
	return $array;	
	}
	
###############################
function sql_num_lot($sqlSelect){	

	global $hostname_conn3;
	global $username_conn3;
	global $password_conn3;
	global $database_conn3;

 $conn3 = @mysqli_connect($hostname_conn3, $username_conn3, $password_conn3, $database_conn3)or die("No connect");
 mysqli_set_charset($conn3, "utf8");
 
  
	$result = @mysqli_query($conn3, $sqlSelect);
	$num=@mysqli_num_rows($result); 
	@mysqli_close($conn3);
	return $num;	}
	

?>