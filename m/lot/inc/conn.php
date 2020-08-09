<?
	$conn;
	$hostname_conn = "localhost";

//echo $_SERVER['REMOTE_ADDR'];
if($_SERVER['REMOTE_ADDR']=="127.0.0.1" or $_SERVER['REMOTE_ADDR']=="::1")
{
	$hostserver="http://localhost";
	$database_conn = "lotto";
	$username_conn = "root";
	$password_conn = "root";
}
else{
	$hostserver="http://www.lotto17.us/";
	/*$hostname_conn = "202.162.78.142";
	$database_conn = "fatof_lotto";
	$username_conn = "c1cus";
	$password_conn = "963214785";*/
	$hostname_conn = "localhost";
	$username_conn = "admin_root";
	$password_conn = "963214785";
	$database_conn = "admin_lotto17";
	$check_url="m.lotto17.us";
    $x_process="http://m.lotto17.us/";
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
//echo $sql.'<br>';
$result =  @mysql_db_query($database_conn,$sql);
	close_db_func();	

	return array("page"=>$totalpage,"num"=>$num_rows,"re"=>$result);	
		}
	
	
######### mysql_select_page
function sql_page22($table,$id,$orderby,$Numpage){	
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
echo $sql.'<br>';
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
	
	
	
function DateTh($strDate){
		$strDay= date("j",strtotime($strDate));
		return "$strDay";
}

function DateThai($strDate){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
}

function DateThaiTime($strDate){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear $strHour:$strMinute น.";
}

function utf8_to_tis620($string) {
       $str = $string;
       $res = "";
       for ($i = 0; $i < strlen($str); $i++) {
         if (ord($str[$i]) == 224) {
           $unicode = ord($str[$i+2]) & 0x3F;
           $unicode |= (ord($str[$i+1]) & 0x3F) << 6;
           $unicode |= (ord($str[$i]) & 0x0F) << 12;
           $res .= chr($unicode-0x0E00+0xA0);
           $i += 2;
         } else {
           $res .= $str[$i];
         }
       }
       return $res;
}	

function substr_utf8( $str, $start_p , $len_p) {
       $str_post = "";
       if(strlen(utf8_to_tis620($str)) > $len_p)
       {
         $str_post = "...";
       }
       return preg_replace( '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start_p.'}'.
        '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len_p.'}).*#s',
        '$1' , $str ) . $str_post;
};	
	
function dateToTime($datetime){
     $exp = explode(" ",$datetime);
     $t = explode(":",$exp[1]);
     $d = explode("-",$exp[0]);
     $timestamp = mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);
     return $timestamp;
}

function randomToken($len) { 
	srand( date("s") ); 
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	$chars.= "1234567890"; 
	$chars.= "abcdefghijklmnopqrstuvwxyz"; 
	$ret_str = ""; 
	$num = strlen($chars); 
	for($i=0; $i < $len; $i++) { 
	$ret_str.= $chars[rand()%$num];
	} 
	return $ret_str; 
} 
$randompsw = randomToken(6);
?>
