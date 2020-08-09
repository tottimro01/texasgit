<?
$list_url = array();
$list_url[0] = "www.fifastep.com";
$list_url[1] = "www.stbbet.com";
$list_url[2] = "www.tangstep.com";
	
$purl = $_POST["url"];
	
$arr = array();

if (in_array($purl, $list_url)) {
    $arr["Status"] = "1";
}else{
	$arr["Status"] = "2";
}
	
echo json_encode($arr);
exit();
?>