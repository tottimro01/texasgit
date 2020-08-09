<div id="userData">
 	<div id="refaceIcon" style="display: none; cursor: pointer;" onclick='refaceCradit()'>
 		<img src="http://m.lotzx.com/hun/assets/library/img/icon_refresh_mem.png" style="width: 28px; height: 28px; float: right;">
 	</div>
 	<div id="userDataTitle">ข้อมูลส่วนตัว</div>
 	<table width="100%" style="font-size: 14px;">
 		<tr>
 			<td style="float: left;">เครดิตคงเหลือ</td>
 			<td id='MemberCradit' style="margin-right: 15px; text-align: right; color: #1149ff;"><?php echo $_SESSION["MemberCradit"]; ?></td>
 			<td style="float: right;">บาท</td>
 		</tr>
 		<tr>
 			<td style="float: left;">รายการเล่นค้าง</td>
 			<td id='MemberCraditOld' style="margin-right: 15px; text-align: right; color: #ff0000;"><?php echo $_SESSION["MemberCraditOld"]; ?></td>
 			<td style="float: right;">บาท</td>
 		</tr>
 		<tr>
 			<td style="float: left;">เครดิตที่ได้รับ</td>
 			<td id='MemberCraditAcp' style="margin-right: 15px; text-align: right; color: #77ff08;"><?php echo $_SESSION["MemberCraditAcp"]; ?></td>
 			<td style="float: right;">บาท</td>
 		</tr>
 	</table>
 </div>

 <div id="linkMenu">
  <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=pay" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">อัตราจ่าย</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a>
   <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=getFull" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">เลขเต็ม</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a>
   <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=home" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">ผลหวย</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a>
  <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=news" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">ข่าวสาร</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a>
   <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=changePassword" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">เปลี่ยนรหัสผ่าน</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a>
  <!--  <a href="#"> 
	 <div style="text-align: left; display: inline; width: 50%;">เครื่องพิมพ์</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a> -->
<!--     <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=protect" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">ทดสอบวีดีโอ</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a> -->
   <a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=logout" data-ajax="false"> 
	 <div style="text-align: left; display: inline; width: 50%;">ออกจากระบบ</div>
	 <div style="float: right; display: inline; "><img src="http://m.lotzx.com/hun/assets/library/img/iconnextmenu.png" style="width: 20px; height: 20px;"> </div>
  </a>
  </div>


  <script>

   function refaceCradit()
      {
         $('#refaceIcon').children('img').addClass('greenloading');

            $.post('data/getCradit.php',{mid:<?php echo $_SESSION["mid"]; ?>}).done(function(data){

              console.log(data);
              $('#refaceIcon').children('img').removeClass('greenloading');
              // $('#MemberCradit').text('fff');
              // $('#MemberCraditOld').text('fffff');
              // $('#MemberCraditAcp').text('ff');
              $('#MemberCradit').text(data['MemberCradit']);
              $('#MemberCraditOld').text(data['MemberCraditOld']);
              $('#MemberCraditAcp').text(data['MemberCraditAcp']);

            });
      }
    
  

  </script>