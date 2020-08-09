<?php 


function sql_query_return_id($sqlSelect){	

	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 #@mysqli_query("SET NAMES UTF8");
 mysqli_set_charset($conn, "utf8");

 $result['rs'] = @mysqli_query($conn, $sqlSelect);
 $result['last'] = @mysqli_insert_id($conn);
 // $result =  @mysqli_query($conn, $sqlSelect);

@mysqli_close($conn);
	 
return $result;	
}

###############################
function sql_array_as($sqlSelect){	
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 mysqli_set_charset($conn, "utf8");
 
	$result =  @mysqli_query($conn, $sqlSelect);
	$array= @mysqli_fetch_assoc($result); 
	
	@mysqli_close($conn);
	
	return $array;	
	}

###############################


 ?>