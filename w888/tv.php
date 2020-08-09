<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$rem['m_file']='http://150.107.30.71:1999/requiref/cth11/playlist.m3u8';
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>OPENBET</title>
<style type="text/css">
body{ 
background:url(img/tv.png) no-repeat;
}
</style>
</head>

<body>

<!------------OBJECT-------------->

<script src="tv/jwscript.js?x=1.4.48"></script>
<script>
	jwplayer.key = '65FhM7BdiMpzpZJn1yW+KBxXwba2FH8HUJ3xu4ubdBQ=';
	jwplayer.jwpsrv.setSampleFrequency(0.0001);
</script>
<div id="myElement_wrapper" style="position: relative; display: block;width:856px;height:480px;z-index:999;">
<object type="application/x-shockwave-flash" style="z-index:999;" data="tv/jwplayer.flash.swf" width="856px" height="480px" bgcolor="#000000" id="myElement" name="myElement" tabindex="0">
<param name="allowfullscreen" value="true">
<param name="allowscriptaccess" value="always">
<param name="seamlesstabbing" value="true">
<param name="wmode" value="opaque">
</object>
<div id="myElement_aspect" style="display: none;"></div>
<div id="myElement_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div>
</div>
<script type="text/javascript">
jwplayer('myElement').setup({
file: '<?=$rem['m_file'];?>?wmsAuthSign=<?=base64_encode("server_time=".date("n/d/Y H:i:s A")."&hash_value=DRdrZS3q52DA9nINJ1z9lw88==&validminutes=200&ip=182.185.202.18");?>',
width: 856,
height: 480,
autostart: 'true',
repeat: 'true'

});
</script>
</div>

</body>
</html>