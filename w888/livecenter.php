<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: Live Center :::</TITLE>
    
    <style type="text/css">
    
    body { margin:0px; padding: 0px; }
    html{ overflow:hidden; }
    </style>

</head>
<body style="margin-left:0; margin-right:0; margin-top:0;">
<div>
<iframe id="_iLiveCenter" name="_iLiveCenter" src="http://ls.betradar.com/ls/livescore/?/i1328/<?=$_SESSION['lang'];?>/page/sportcenter16_responsive#matchid_m<?=$_GET['bid'];?>" frameBorder="0" width="1070" scrolling="yes" height="600"></iframe>
<span id="lblFeedback"></span>
</div>
</body>
</html>



<?
/*
$data=file_get_contents2("http://ls.betradar.com/ls/feeds/?/m8bet/th/Europe:Berlin/gismo/match_timelinedelta/6725590");	
$sport = json_decode2($data, true);
#print_r($sport[doc][0][data][match][ptime]);
#echo'<hr>';
print_r($sport[doc][0][data][match]);
#echo'<hr>';
#print_r($sport[doc][0][data][match][periods]);
echo'<hr>';
echo ((time()-($sport[doc][0][data][match][ptime])   )/60)+45;
echo'<hr>';
print_r($sport[doc][0][data][match][result]);
*/
/*
	$data=file_get_contents2("http://ls.1win88.com/index.aspx?clientid=0&flag=lc&language=th&clientmatchid=13d92f7e-a2c7-485b-b8fc-b1c1e93b3727");	
	echo $data2=str_replace(array('คำเตือน: โปรดทราบว่าข้อมูลที่เรามีให้ในหน้านี้เพื่อใช้เป็นข้อมูลอ้างอิงเท่านั้น เราจะไม่รับผิดชอบในความผิดพลาดใด ๆ หรือข้อผิดพลาดในหน้านี้'),array('คำเตือน: โปรดทราบว่าข้อมูลที่เรามีให้ในหน้านี้เพื่อใช้เป็นข้อมูลอ้างอิงเท่านั้น OPENBET จะไม่รับผิดชอบในความผิดพลาดใด ๆ หรือข้อผิดพลาดในหน้านี้'),$data);
	*/
?>