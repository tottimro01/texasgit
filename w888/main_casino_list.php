<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
require("lang/variable_lang.php");

$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_casino"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[12]==0){ 
    include 'ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[12]==0){ 
  include 'ag_close.php'; 
  exit(); 
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$lang_member[38];?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
	<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

	<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
	<script src="js/jquery-1.9.1.min.js?v=2019"></script>
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
	}
}
function addCommas(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1].substr(0,2) : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function TrimComma(currentTags) {  
	var currentTagTokens = currentTags.split(",");
	var existingTags = "";

	for ( var i = 0; i < currentTagTokens.length; i++ ) { 
		existingTags = existingTags + currentTagTokens[i];
	}
	return existingTags;
}
</script>
</head>
<body>

<style>
	.cil11 {
    margin: 15px 15px 15px 0px;
}
	.cil12 {
    margin: 15px 0px 15px 15px;
}

.casino_img_list .btn-popup {
    position: absolute;
    z-index: 999;
    bottom: 5px;
    right: 5px;
    width: 360px;
    height: 75px;
    cursor: pointer;
    border-radius: 5px;
}
.casino_img_list .btn-popup strong {
    font-size: 13px;
    line-height: 32px;
    text-shadow: 1px 1px #6d1208;
    /* padding-left: 32px; */
    right: 30px;
    position: absolute;
    bottom: 0px;
}
/*#main_left
{
    margin: 0 auto;
    text-align: center;
    background-color: #f5f1e5;
}
.casino_img_group
{
	height: auto;
    display: inline-table;
    padding: 0px;
}	
.casino_img_list
{
	width: 370px;
	float: left;
	box-sizing: border-box;
    padding: 0px;
    position: relative;
}
.casino_img_list img
{
	width: 100%;
    border: 1px solid #e8cc78;
    box-shadow: 0px 2px 3px 1px #1212125c;
}

.casino_img_list .btn-popup
{
	position: absolute;
    z-index: 999;
    bottom: 5px;
    right: 5px;
    width: 110px;
    height: 33px;
    cursor: pointer;
    border-radius: 5px;

}

.casino_img_list .btn-popup.list5
{
	position: absolute;
    z-index: 999;
    bottom: 5px;
    right: 5px;
    width: 217px;
    height: 62px;
    cursor: pointer;
    border-radius: 5px;
}

.casino_img_list .btn-popup
{
	background-image: url(img/casino/Botton_F.png);
    background-size: cover;
    background-repeat: no-repeat;
    transition-duration: .5s;
}



.casino_img_list .btn-popup:hover
{
	background-image: url(img/casino/Botton_B.png);
	transition-duration: .5s;

}

.casino_img_list .btn-popup strong
{
	font-size: 12px;
    line-height: 32px;
    padding-left: 32px;
}

.casino_img_list .btn-popup.list5 strong
{
	font-size: 28px;
    line-height: 60px;
    padding-left: 65px;
}
.cil1{
	margin: 15px 15px 15px 0px;
}
.cil2{
	margin: 15px 0px 15px 15px;
}
.cil3{
	margin: 15px 15px 15px 0px;
}
.cil4{
	margin: 15px 0px 15px 15px;
}*/
 
</style>
<div id="main_left">	
	<?
    	include 'mname_tmpl.php'; 
    	include 'mtimezone_tmpl.php';
	?>

	<div id="title_page">
	  <div id="ic_title">&gt;</div>
	  <span id="stitle"><?=$lang_member[958];?></span>
	  
	</div>


	<div class="casino_img_group">

	<!--	<div class="casino_img_list" style="width: 100%; margin: 0px 0px 15px 0px;">
						<div>
							<img src="img/casino/B005.jpg?v=1" alt="">
						</div>	
					
						<div class="btn-popup list5" onclick="window.location.href='casino/sexy/player/gamehall.php?dm=1&amp;title=1'"> <strong><?=$lang_member[2335];?></strong>  </div> 
			

					</div> -->

		<?php 

			for($i=1;$i<=2;$i++)
			{
				?>
					<div class="casino_img_list cil<?=$i?>">
						<div>
							<img src="img/casino/B00<?=$i;?>.jpg?v=4" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=<?=$i;?>','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>
				<?
			}
			?>
					

			<?

		?>

	</div>	
	<div id="title_page">
	  <div id="ic_title">&gt;</div>
	  <span id="stitle"><?=$lang_member[2342];?></span>
	  
	</div>
	<div class="casino_img_group">
					<div class="casino_img_list cil11">
						<div>
							<img src="img/casino/B011.jpg?v=3" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=11','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>

					<div class="casino_img_list cil11">
						<div>
							<img src="img/casino/B013.png?v=4" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=13','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>

					<div class="casino_img_list cil11">
						<div>
							<img src="img/casino/B014.png?v=4" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=14','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>

					<div class="casino_img_list cil11">
						<div>
							<img src="img/casino/B015.png?v=4" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=15','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>

					<div class="casino_img_list cil11">
						<div>
							<img src="img/casino/B016.png?v=4" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=16','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>


					<!--<div class="casino_img_list cil12">
						<div>
							<img src="img/casino/B012.jpg?v=3" alt="">
						</div>

						<div class="btn-popup" onclick="window.open('casino_popup.php?id=12','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');"> <strong><?=$lang_member[2335];?></strong> </div>
					</div>-->
				</div>
</div>
</body>
</html>