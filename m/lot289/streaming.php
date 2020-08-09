<?
	session_start();
	if(!isset($_SESSION["login"]) || $_SESSION["login"] != '1' || $_SESSION["zone"]!=19) {
		header("Location: ".$_SESSION["base_url"]."login.php"); 
		die();
	}
?>

<!DOCTYPE html>
<html lang="<?=$_COOKIE['lang'];?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>:: OHO 99 ::</title>
	<link rel="stylesheet" href="library/css/style.css?v=<?=$cache_v;?>" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<style>
		body {	background-color: #000000;	}
	</style>
</head>
<body>
	<?	if(isset($_SESSION["streaming"]) || !empty($_SESSION["streaming"]) || $_SESSION["zone"]==19) {	?>
		<video width="100%" height="100%" controls autoplay playsinline>
    		<source src="<?=$_SESSION["streaming"];?>" type="application/x-mpegURL">
		</video>
	<? } ?>
</body>
</html>