<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="template/sportsbook/public/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="template/sportsbook/public/css/button.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="popWTableArea">
    <div id="League_Header">
        <div class="popWCheckAll">
            <input id="chkLFAll" name="LF" type="checkbox" value="0" onclick="checkAll();" />ตรวจสอบทั้งหมด	
	<span style="display: " ><input id="chkSave" name="chkSave" type="checkbox" value="0" /> Remember My League</span>
            <div class="popWCheckBtn">
                <a href="#" name="Submit" class="button mark" onclick="go();"><span>ไป</span></a>
                <a href="#" name="cancel" class="button" onclick="PopLauncher.close();"><span>ยกเลิก</span></a> 
           </div>
        </div>
    </div>
	<div id="SelectLeagueArea"></div>
    <div id="League_Footer">
        <div class="popWCheckAll">
            <div class="popWCheckBtn">
                <a href="#" name="Submit" class="button mark" onclick="go();"><span>ไป</span></a>
                <a href="#" name="cancel" class="button" onclick="PopLauncher.close();"><span>ยกเลิก</span></a> 				
            </div>
        </div>
    </div>
</div>
<span id="tmplEnd"></span>
</body>
</html>
