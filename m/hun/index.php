<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
if($_SESSION[LoginStatus]==""){@header('Location: login.php');exit();}

if($_GET["p"]=="logout")
	{
		@session_start(); 
		@session_destroy();
		@header('Location: login.php');
		exit();


	}

	if($_GET["p"]=="home")
	{
		$PageCall = "inc/home.php";

	}
	else if($_GET["p"]=="bet")
	{
		$PageCall = "inc/selectBetZone.php";
		$_SESSION["pageIncZone"] = "bet";
	}
	else if($_GET["p"]=="bingoMchBet")
	{
		$PageCall = "inc/bet/checkZoneOpen.php";
	}
	else if($_GET["p"]=="bingo9Bet")
	{
		$PageCall = "inc/bet/checkZoneOpen.php";
	}
	else if($_GET["p"]=="bingoMoonBet")
	{
		$PageCall = "inc/bet/checkZoneOpen.php";
	}
	else if($_GET["p"]=="bingo9BetOpen")
	{
		$PageCall = "inc/bet/bingo9Bet.php";
	}
	else if($_GET["p"]=="bingoMchBetOpen")
	{
		$PageCall = "inc/bet/bingoMchBet.php";
	}
	else if($_GET["p"]=="bingoMoonBetOpen")
	{
		$PageCall = "inc/bet/bingoMoonBet.php";
	}
	else if($_GET["p"]=="special")
	{
		$PageCall = "inc/selectBetZone.php";
		$_SESSION["pageIncZone"] = "special";
	}
	else if($_GET["p"]=="bingoMoonSpecial")
	{
		$PageCall = "inc/special/checkZoneOpen.php";
	}
	else if($_GET["p"]=="bingo9Special")
	{
		$PageCall = "inc/special/checkZoneOpen.php";
	}
	else if($_GET["p"]=="bingoMchSpecial")
	{
		$PageCall = "inc/special/checkZoneOpen.php";
	}
	else if($_GET["p"]=="bingo9SpecialOpen")
	{
		$PageCall = "inc/special/bingo9Special.php";
	}
	else if($_GET["p"]=="bingoMchSpecialOpen")
	{
		$PageCall = "inc/special/bingoMchSpecial.php";
	}
	else if($_GET["p"]=="bingoMoonSpecialOpen")
	{
		$PageCall = "inc/special/bingoMoonSpecial.php";
	}
	else if($_GET["p"]=="list")
	{
		$PageCall = "inc/list.php";
	}
	else if($_GET["p"]=="getFull")
	{
		$PageCall = "inc/selectBetZone.php";
		$_SESSION["pageIncZone"] = "getFull";
	}else if($_GET["p"]=="bingoMoonFull")
	{
		$PageCall = "inc/FullBingo/bingoMoonFull.php";
	}
	else if($_GET["p"]=="bingo9Full")
	{
		$PageCall = "inc/FullBingo/bingo9Full.php";
	}
	else if($_GET["p"]=="bingoMchFull")
	{
		$PageCall = "inc/FullBingo/bingoMchFull.php";
	}else if($_GET["p"]=="pay")
	{
		$PageCall = "inc/pay.php";
	}else if($_GET["p"]=="news")
	{
		$PageCall = "inc/news.php";
	}else if($_GET["p"]=="changePassword")
	{
		$PageCall = "inc/changePassword.php";
	}
	else if($_GET["p"]=="protect")
	{
		$PageCall = "inc/protect.php";
	}
	
	
	


	echo $_SESSION["loginStatus"];
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta name="viewport" content="width=device-width, user-scalable=0">

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/style.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/menu.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/dist/css/swiper.min.css">


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/dist/js/swiper.min.js"></script>

<link rel="stylesheet" href="assets/library/dialog/dialog-style.css?v=<?=time()?>">
<script src="assets/library/dialog/dialog.js?v=<?=time()?>"></script>


<!-- livestreem -->

 <link rel="stylesheet" href="//yandex.st/highlightjs/8.0/styles/default.min.css">
  <script src="//yandex.st/highlightjs/8.0/highlight.min.js"></script>
  <script>
      hljs.initHighlightingOnLoad();
      $(function () {
           $('#player_selector select').change(function(){
               $('#player_selector').submit();
           });
      });
  </script>
<!-- livestreem -->

</head>
<body>
<div id="top"></div>
<? include("assets/library/dialog/dialog-body.php"); ?>
<? //include("inc/subpassPage.php"); ?>
<img id="loading" src="assets/library/img/iconloading.png">

<div id="mySidenav" class="sidenav">
 
 <? include("menu.php"); ?>

</div>

<div id="boddyContent">
<div id="main">
	<a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=home" data-ajax="false"  ><div id="home"><img src="assets/library/img/imghome1.png" id="homeIcon"></div></a>
	<div id="uName"> <?php echo $_SESSION["Name"]; ?> </div> <!-- ชื่อผู้ใช้ -->
	<div id="openNav" style="float: right;" onclick="openNav()"><img src="assets/library/img/listmain.png" id="openIcon"	> </div>
</div>

 <!-- <input type="text"> -->

<div id="includePage1"> <!-- link a include  -->
	<? include($PageCall); ?>
</div>

<!-- เมนู ด้านล่าง  -->
<div id="bottomMenu">
		
		<a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=bet" data-ajax="false"">
		<div id="Menu1" <? if($_GET['p']=="bet"||$_GET['p']=="bingoMoonBetOpen"||$_GET['p']=="bingo9BetOpen"||$_GET['p']=="bingoMchBetOpen" ||$_GET['p']=="bingo9Bet" ||$_GET['p']=="bingoMchBet" ||$_GET['p']=="bingoMoonBet"){echo "class=\"active\""; }?> > 

			<?php 
				if($_GET['p']=="bet"||$_GET['p']=="bingoMoonBetOpen"||$_GET['p']=="bingo9BetOpen"||$_GET['p']=="bingoMchBetOpen" ||$_GET['p']=="bingo9Bet" ||$_GET['p']=="bingoMchBet" ||$_GET['p']=="bingoMoonBet"){
					$imgurl = "lotthree.png";
				}else{
					$imgurl = "lotthree_w.png";
				}

			 ?>
			<img  src="assets/library/img/<?=$imgurl;?>">
			<div class="text">แทงด่วน</div>
		</div>
		</a>
		
		<a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=special" data-ajax="false"">
		<div id="Menu2"  <? if($_GET['p']=="special" || $_GET['p']=="bingo9SpecialOpen" || $_GET['p']=="bingoMoonSpecialOpen" || $_GET['p']=="bingoMchSpecialOpen" || $_GET['p']=="bingoMoonSpecial" || $_GET['p']=="bingoMchSpecial" || $_GET['p']=="bingo9Special"){echo "class=\"active\""; }?>>
			<?php 
				if($_GET['p']=="special" || $_GET['p']=="bingo9SpecialOpen" || $_GET['p']=="bingoMoonSpecialOpen" || $_GET['p']=="bingoMchSpecialOpen" || $_GET['p']=="bingoMoonSpecial" || $_GET['p']=="bingoMchSpecial" || $_GET['p']=="bingo9Special"){
					$imgurl = "lotspe.png";
				}else{
					$imgurl = "lotspe_w.png";
				}
				
			 ?>
			<img  src="assets/library/img/<?=$imgurl;?>">
			 
			 <div class="text">พิเศษ</div>
		</div>
		</a>
		<a href="<?php echo $_SESSION["includeUrl"]; ?>/index.php?p=list" data-ajax="false"">
		<div id="Menu3"  <? if($_GET['p']=="list"){echo "class=\"active\""; }?>> 
			<?php 
				if($_GET['p']=="list"){
					$imgurl = "lotlistplay.png";
				}else{
					$imgurl = "lotlistplay_w.png";
				}

			 ?>
			<img  src="assets/library/img/<?=$imgurl;?>">
			<div class="text">รายการ</div>
		</div>
		</a>
		
</div>
</div>
</body>
</html>

<script src="assets/library/js/mobileKeybord.js?v=<?=time()?>"></script>
<script src="assets/library/js/main.js?v=<?=time()?>"></script>


<script>

/*list.php start session*/
sessionStorage.setItem('listbingoMoon', '1');
sessionStorage.setItem('listbingo9', '1');
sessionStorage.setItem('listbingoMch', '1');


function includePage(linkPage)
{
	$("#includePage1").text('');
	$("#includePage").load("inc/"+linkPage+".php",{type:1});
}

$(document).on("click", "a", function(evt) 
{
	$("#includePage").text('');

});


// top menu slide
function openNav() {
	var wSceen = window.innerWidth;
	$('#refaceIcon').show();
	if(wSceen >= 500)
	{
		document.getElementById("mySidenav").style.width = "87%";
		document.getElementById("openIcon").style.marginRight = "0";
		$('#openNav').css("margin-left","-5px").css('float','left');
	}else {
	
		document.getElementById("mySidenav").style.width = "80%";
		document.getElementById("openIcon").style.marginRight = "0";
		$('#openNav').css("margin-left","20px").css('float','left');
	}
    
    document.getElementById("main").style.marginRight = "0";
    
    $('#home').hide();
    $('#uName').hide();
    
    
    
}

function closeNav() {
	$('#refaceIcon').hide();
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
    document.getElementById("openIcon").style.marginRight = "10px";
    $('#home').show();
    $('#uName').show();
    $('#openNav').css("margin-left","0").css('float','right');
}
// end top menu slide



$("#boddyContent,#mySidenav").on("swiperight",function(){
  closeNav(); 
}); 






</script>


