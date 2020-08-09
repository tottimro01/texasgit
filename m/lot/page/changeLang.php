
<div class="row">
	<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong><i class="fa fa-cog"></i> <!-- เปลี่ยนภาษา --><?=$lang_member[2345];?></strong></h1>
    </div>

    <div class="panel-body">

		<form name="changeLang" method="post" id="changepsw" action="main.php">
        
			<table width="100%" class="langTB">
                <tr>
                    <td width="80%"> 

                        <input type="radio" name="lang" value="th" <? if($_COOKIE[Language]=="th"){echo "checked";}?> > ไทย <br>
                    </td>
                    <td width="20%" style="float: right; margin-right: 25px;">
                        <img src="../img/ic_flag_th.png" alt="" width="40px" height="auto">
                    </td>
                </tr>
                 <tr>
                    <td width="80%"> 
                        <input type="radio" name="lang" value="en" <? if($_COOKIE[Language]=="en"){echo "checked";}?>> ENGLISH <br>
                    </td>
                    <td width="20%" style="float: right; margin-right: 25px;">
                        <img src="../img/ic_flag_en.png" alt="" width="40px" height="auto">
                    </td>
                </tr>
                <tr>
                    <td width="80%"> 
                        <input type="radio" name="lang" value="la" <? if($_COOKIE[Language]=="la"){echo "checked";}?>> ລາວ <br>
                    </td>
                    <td width="20%" style="float: right; margin-right: 25px;">
                        <img src="../img/ic_flag_la.png" alt="" width="40px" height="auto">
                    </td>
                </tr>
                 <tr>
                    <td width="80%"> 
                        <input type="radio" name="lang" value="mm" <? if($_COOKIE[Language]=="mm"){echo "checked";}?>> မြန်မာ <br>
                    </td>
                    <td width="20%" style="float: right; margin-right: 25px;">
                        <img src="../img/ic_flag_mm.png" alt="" width="40px" height="auto">
                    </td>
                </tr>


            </table>
                     
            
        
        	<button class="btn btn-lg btn-warning btn-block thaisan" type="submit" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> <!-- บันทึก --><?=$lang_member[121];?></strong></button>

		</form>
	</div>
</div>
</div>

<br />