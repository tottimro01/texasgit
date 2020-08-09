<?
	$lang = $_GET['Lang'];
    require("admin_lang/export/lang_member_".$lang.".php");
	// include 'lang/home_lang.php';
?>
<div id='EventsPop' class='EventsPop contentArea'>
	<ul id='EventList' class='list' onMouseOver='EventStop(event);' onMouseOut='EventStart(event);'>
		<li><img src="login/mbc/common/images/beforeLogin/slot88_<?=$lang?>.jpg?v=20190822" /></li>
		<li id="event1" class="current" onclick="EventOpen(event, 'event1');">
			<div class="title" style="padding-bottom: 0; min-height: inherit;"><?=$lang_member[2316];?></div>
			<div class="txt"> <?=$lang_member[2317];?><br /> </div>
			<!-- <div id="EventBack" style="display:block" class="back" onclick="EventClose(event);">Back</div> -->
		</li>
	</ul>
</div>