<?
include "../inc/conn.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script>
function SwitchTophideshow(file_go)
{  
	//parent.document.getElementById("frameset1").rows=parent.document.getElementById("frameset1").rows=="25,125,24,*,200" ? "25,125,24,*,0":"25,125,24,*,200";  
	parent.document.getElementById("frameset2").rows="24,*,250";  
	parent.footx.location.href=file_go;
}
function open_dialog(page,di){
	//var page = file_msg;
	  var IEWidth =  880 ;
	  var IEHeight = 535 ;
	  var NNWidth =  880 ;
	  var NNHeight = 535 ;
	  var MyBrowser = navigator.appName;
	 
	  if (MyBrowser == "Netscape") {
	  var myWinWidth = (window.screen.width/2) - (NNWidth/2);
	  var myWinHeight = (window.screen.height/2) - ((NNHeight/2) + 50);
	
	  var myWin = window.open(page,"MainWin"+di,"width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }else {
	  var myWinWidth = (window.screen.width/2) - (IEWidth/2);
	  var myWinHeight = (window.screen.height/2) - ((IEHeight/2) + 50);
	
	  var myWin = window.open(page,"MainWin"+di,"width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }
	  myWin.focus();

}
function pop_up(file_go){
	if(file_go!=""){
		open_dialog(file_go,"2");
	}
	$("#menu_list").val("");
}
var pg = 1;
function goPage(val){
	if(pg==1){
		goPage_football(val);
	}else{
		goPage_fev(val);
	}
}
function goPage_football(page){
	pg = 1;
	if(page==1){
		parent.titlex.location.href='title.php'; 
		parent.mainx.location.href='main.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}else if(page==2){
		parent.titlex.location.href='title_half.php'; 
		parent.mainx.location.href='main_half.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}else if(page==3){
		parent.titlex.location.href='title_1x2.php'; 
		parent.mainx.location.href='main_1x2.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}else if(page==4){
		parent.titlex.location.href='title_kk.php'; 
		parent.mainx.location.href='main_kk.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}
}
function goPage_fev(page){
	pg = 2;
	if(page==1){
		parent.titlex.location.href='title.php'; 
		parent.mainx.location.href='main_fev.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}else if(page==2){
		parent.titlex.location.href='title_half.php'; 
		parent.mainx.location.href='main_half_fev.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}else if(page==3){
		parent.titlex.location.href='title_1x2.php'; 
		parent.mainx.location.href='main_1x2_fev.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}else if(page==4){
		parent.titlex.location.href='title_kk.php'; 
		parent.mainx.location.href='main_kk_fev.php?d='+$('#tsd').val()+'-'+$('#tsm').val()+'-<?=date("Y")?>';
	}
}
function sport_type(val){
	if(val=="1_1"){
		$("#se_rob").css("display" , "block");	
	}else{
	$("#se_rob").css("display" , "none");	
	}
}
</script>
<style>
body {
	margin: 0px;
	padding: 0px;
	background: #ECE9D8;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
#list_btn {
	list-style: none;
	margin: 0px;
	padding: 0px;
}
#list_btn li {
	list-style:none;
	display:inline-block;
}
#list_btn li button {
	background: #C8C4BC;
	height: 20px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="25">
  <tr>
    <td width="60%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="8%" align="right"><strong>วันที่ :&nbsp;</strong></td>
          <td width="5%"><select id="tsd">
          <? for($day=1;$day<=31;$day++){ ?>
              <option value="<?=sprintf("%02d",$day)?>"<? if($day==date("d")){ ?> selected<? } ?>><?=sprintf("%02d",$day)?></option>
              <? } ?>
            </select></td>
          <td width="5%"><select id="tsm">
          <? for($mount=1;$mount<=12;$mount++){ ?>
              <option value="<?=sprintf("%02d",$mount)?>"<? if($mount==date("m")){ ?> selected<? } ?>><?=sprintf("%02d",$mount)?></option>
              <? } ?>
            </select></td>
          <td width="2%">&nbsp;</td>
          <td width="40%"><ul id="list_btn">
              <li>
                <button onClick="goPage_football($('#gopage').val());">ทำงาน</button>
              </li>
              <li>
                <button onClick="parent.titlex.location.href='title_live.php'; parent.mainx.location.href='main_live.php';">Live</button>
              </li>
              <li>
                <button onClick="SwitchTophideshow('add_list.php');">เพิ่มคู่</button>
              </li>
              <!--<li>
                <button onClick="parent.leftx.location.href='drop_list.php';">ลงของ</button>
              </li>-->
              <li>
                <button onClick="parent.leftx.location.href='text_run.php';">ตัววิ่ง</button>
              </li>
              <li>
                <button onClick="parent.titlex.location.href='title_mem.php'; parent.mainx.location.href='main_mem.php';">สมาชิก</button>
              </li>
              <li>
                <button onClick="goPage_fev($('#gopage').val());">ชื่นชอบ</button>
              </li>
              <li>
                <button onClick="parent.titlex.location.href='title_live.php'; parent.mainx.location.href='main_live.php?fev=1';">ชื่นชอบ Live</button>
              </li>
            </ul></td>
            <td><select onChange="sport_type(this.value);">
              <option value="1">บอลสด</option>
              <option value="1_1">บอลชุด</option>
              <option value="2">มวยไทย</option>
              <option value="3">บาสเกตบอล</option>
              <option value="">อเมริกันฟุตบอล</option>
              <option value="">เบสบอล</option>
              <option value="">ฮอกกี้</option>
              <option value="">เทนนิส</option>
              <option value="">วอลเลย์บอล</option>
              <option value="">แบดมินตัน</option>
              <option value="">สนุกเกอร์</option>
            </select></td>
            <td><select onChange="goPage(this.value);" id="gopage">
              <option value="1">เต็มเวลา</option>
              <option value="3">1x2</option>
              <option value="4">คี่คู่</option>
            </select></td>
            <td><select id="se_rob" style="display:none;" onChange="parent.mainx.location.href='main.php?rob='+this.value;">
            <option value="">--เลือกรอบ--</option>
            <? for($r=1;$r<=12;$r++){ ?>
              <option value="<?=$r?>">รอบที่ <?=$r?></option>
              <? } ?>
            </select></td>
        </tr>
      </table></td>
    <td width="40%">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%"><select onChange="pop_up(this.value);" id="menu_list">
              <option value="">-----เลือกรายการ-----</option>
              <option value="">--------------------------</option>
              <option value="frameLeague.php">จัดลีก / ชื่อทีม</option>
              <option value="z_league.php?st=1">เรียงเลขลำดับลีก</option>
              <option value="z_team.php">ดึงคู่แข่งขันบอล</option>
              <option value="z_team_muy.php">ดึงคู่แข่งขันมวยไทย</option>
              <option value="z_team_bas.php">ดึงคู่แข่งขันบาส</option>
              <option value="z_team_aball.php">ดึงคู่แข่งขันอเมริกันฟุตบอล</option>
              <option value="z_team_besball.php">ดึงคู่แข่งขันเบสบอล</option>
              <option value="z_team_hocky.php">ดึงคู่แข่งขันฮอกกี้</option>
              <option value="z_team_tennis.php">ดึงคู่แข่งขันเทนนิส</option>
              <option value="z_team_volley.php">ดึงคู่แข่งขันวอลเลย์บอล</option>
              <option value="z_team_bat.php">ดึงคู่แข่งขันแบดมินตัน</option>
              <option value="z_team_motor.php">ดึงคู่แข่งขันสนุกเกอร์</option>
              <option value="message.php">จัดการข้อความ</option>
              <option value="">--------------------------</option>
              <option value="score.php">บันทึกผลการแข่งขัน</option>
              <option value="betedit.php">ดูรายการแก้ไข/ยกเลิก</option>
              <!--<option value="block.php">แพ้ชนะตามคู่แข่งขัน</option>-->
              <!--<option value="block.php">แพ้ชนะตามสมาชิก</option>-->
              <option value="memx.php">แพ้ชนะตามสมาชิกย้อนหลัง</option>
              <!--<option value="block.php">โอนเงิน</option>-->
              <option value="">--------------------------</option>
              <option value="online.php">On-line</option>
              <option value="user.php">User</option>
            </select></td>
    <td width="20%"><div style="width:100px; background:#F00; color:#FFF; height:20px; text-align:center; line-height:20px;" onClick="open_dialog('robot.php' , '1')">Robot = 2</div></td>
    <td width="20%" align="center"><img src="img/sound_off.png" height="20" onClick="if(this.src=='<?=$hostserver?>bet/img/sound_off.png'){this.src='img/sound_on.png'}else{ this.src='img/sound_off.png' }" style="cursor:pointer;"></td>
    <td width="20%" align="right"><img src="img/stats.png" height="20"></td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>