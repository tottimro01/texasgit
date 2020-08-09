<?/*
function bitlyShort ($login, $apiKey, $longUrl) {
 $json = file_get_contents("http://api.bit.ly/v3/shorten?login=". $login ."&apiKey=". $apiKey ."&longUrl=". urlencode($longUrl) ."&format=json");
 $decode = json_decode($json,true);
 return $decode['data']['url'];
}

$login = "jirayu";
$apiKey = "R_fe33ccbd7be867d77643c02c1c2034fd";
$longUrl = "http://jirayu.info";

echo bitlyShort($login, $apiKey, $longUrl);*/
?>


<!-- <form action="https://tinyurl.com/create.php" method="post" target="_blank">
<table align="center" cellpadding="5" bgcolor="#E7E7F7"><tr><td>
<b>Enter a long URL to make <a href="https://tinyurl.com">tiny</a>:</b><br/>
<input type="text" name="url" size="30"><input type="submit" name="submit" value="Make TinyURL!">
</td></tr></table>
</form>
 -->
<?php 

if(isset($_POST['url']))
{
	

	function tinyUrl_create($url)
	{
		return file_get_contents("https://tinyurl.com/api-create.php?url=".$url);
	}

	echo tinyUrl_create($_POST['url']);
}

 ?>


<form action="" method="post" target="_blank">
		<input type="text"name="url">
		<input type="submit" value="adg">
</form>
