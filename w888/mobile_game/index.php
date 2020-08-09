<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
	echo'<script language="JavaScript">top.document.location="login.php";</script>';
	}

if($_GET["act"]=="logout"){
	@session_start(); 
	@session_destroy();
	@header('Location: login.php');
	exit();
}	
	include "../games/function.php";
	include "cache/cache.php";

	$lang = ($_SESSION['lang']=='' ? 'th' : $_SESSION['lang']);
	require("../lang/".$lang.".php");

	function createStatsTable($rows, $cols, $skey) {
		$str = "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"ball st_tb {$skey}_st\">";
		for ($i=0; $i < $rows; $i++) { 
		   $str.= "<tr>";
		     for ($j=0; $j < $cols; $j++) { 
		       $str.= "<td id=\"st_{$skey}_{$i}_{$j}\">-</td>";
		     }
		   $str.= "</tr>";
		 } 
		$str.= "</table>";
		 
		 return $str;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
	<meta charset="utf-8" />
	<title>Document</title>
	<link rel="stylesheet" href="css/menu.css?v=<?=$cache;?>">
	<link rel="stylesheet" href="../css/style.css?v=<?=$cache;?>">
	<link rel="stylesheet" href="css/style.css?v=<?=$cache;?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

</head>
<body>
	
	<div id="dialog_container">
		<!-- <div id="dialog_box">
			<div id="d_message">
				<p>ตรงกันข้ามกับความเชื่อที่นิยมกัน Lorem Ipsum ไม่ได้เป็นเพียงแค่ชุดตัวอักษรที่สุ่มขึ้นมามั่วๆ แต่หากมีที่มาจากวรรณกรรมละตินคลาสสิกชิ้นหนึ่งในยุค 45 ปีก่อนคริสตศักราช ทำให้มันมีอายุถึงกว่า 2000 ปีเลยทีเดียว</p>
			</div>
			<button id="d_button_ok" class="d_button"> ตกลง </button>
			<button id="dcf_button_ok" class="d_button"> ตกลง </button>
			<button id="dcf_button_can" class="d_button"> ยกเลิก </button>
		</div> -->
	</div>
	<!-- 	<div id="test"> click me !!  </div> -->
	<!-- Side navigation -->
	<?php 
		$active_menu = 'index';
		include "menu.php"; 
	?>
	
	<div class="box-container">

		<!-- <div id="logo">
	  		
	  	</div> -->

		<img src="img/line.png" class="line-img"  alt="">
			
		<div id="game-1" class="game">
			<!-- <div  class="button1" href="#"><span>Login</span></div> -->
			<!-- <div class="time_container">
				<div class="time_content">
					
				</div>
			</div> -->
					<div class="time hideTime" id="time2">
						<span></span> 
						<div class="result result-hilo">
							<img src="img/hilo/1.png" alt="">
							<img src="img/hilo/2.png" alt="">
							<img src="img/hilo/3.png" alt="">
						</div>
					</div>
			<div class="game_container">
					
					<table class="hilo_table">
						<tr>
							<td width="25%" onclick="_bet2('5_L')" class="hilo_5_L hilo_size"></td>
							<td width="50%" onclick="_bet2('11')" colspan="2" class="hilo_11 hilo_size">0</td>
							<td width="25%" onclick="_bet2('6_L')" class="hilo_6_L hilo_size"></td>	
						</tr>
						<tr>
							<td width="25%" onclick="_bet2('1')" class="hilo_1 hilo_size">0</td>	
							<td width="25%" onclick="_bet2('L')" class="hilo_L hilo_size">0</td>
							<td width="25%" onclick="_bet2('H')" class="hilo_H hilo_size">0</td>
							<td width="25%" onclick="_bet2('6')" class="hilo_6 hilo_size">0</td>		
						</tr>
						<tr>
							<td width="25%" onclick="_bet2('2')" class="hilo_2 hilo_size">0</td>
							<td width="25%" onclick="_bet2('3')" class="hilo_3 hilo_size">0</td>
							<td width="25%" onclick="_bet2('4')" class="hilo_4 hilo_size">0</td>		
							<td width="25%" onclick="_bet2('5')" class="hilo_5 hilo_size">0</td>		
						</tr>
					</table>
					
					<!-- <button class="howto"> วิธีการเล่น </button> -->
					<div class="stats_btn" onclick="$('#stats_hilo').slideToggle('fast'); stats_changeArrow(this)"> 
						สถิติ  <i class="fa fa-caret-down"></i>
					</div>
					<?
					  $_rows = 4;
  						$_cols = 10;
  						$_cellKey = "hilo";
					?>
					<div id="stats_hilo" class="stats_container" style="display: none;">
						 <h3 style="margin: 10px 0;">สถิติ</h3>
 						 <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
					</div>


						
			</div>


		
		</div>	

		<img src="img/line.png" class="line-img"  alt="">

		<div id="game-1" class="game">
					<div class="time hideTime"  id="time3">
						<span></span>
						<div class="result">
							<img src="img/fish/fish1.png" alt="">
							<img src="img/fish/fish4.png" alt="">
							<img src="img/fish/fish5.png" alt="">
						</div>
					</div>
			<div class="game_container">
					
					<table>
						<tr style="height: 90px;">
							<td onclick="_bet3(1)" class="fish1 fish_size">0</td>
							<td onclick="_bet3(2)" class="fish2 fish_size">0</td>
							<td onclick="_bet3(3)" class="fish3 fish_size">0</td>	
						</tr>
						<tr style="height: 90px;">
							<td onclick="_bet3(4)" class="fish4 fish_size">0</td>
							<td onclick="_bet3(5)" class="fish5 fish_size">0</td>
							<td onclick="_bet3(6)" class="fish6 fish_size">0</td>	
						</tr>
					</table>
					
					<!-- <button class="howto"> วิธีการเล่น </button> -->

					<div class="stats_btn" onclick="$('#stats_fish').slideToggle('fast'); stats_changeArrow(this)"> 
						สถิติ  <i class="fa fa-caret-down"></i>
					</div>
					<?
					  $_rows = 3;
					  $_cols = 10;
					  $_cellKey = "fish";
					?>
					<div id="stats_fish" class="stats_container" style="display: none;">
						 <h3 style="margin: 10px 0;">สถิติ</h3>
 						 <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
					</div>	
				</div>
		
		</div>

		<img src="img/line.png" class="line-img"  alt="">

		<div id="game-1" class="game">
					<div class="time hideTime"  id="time4">
						<span></span>
						<div class="result red-yellow">
							<img src="img/2hit/red.png" alt="">
						</div>
					</div>
			<div class="game_container">
					
					<table class="red-yellow">
						<tr>
							<td onclick="_bet4(1)" class="red red-yellow-size"></td>
							<td onclick="_bet4(2)" class="yellow red-yellow-size"></td>	
						</tr>
						<tr class="count_bet">
							<td width="50%" class="count_red"><span>0</span></td>
							<td width="50%" class="count_yellow"><span>0</span></td>	
						</tr>
					</table>
					
					<!-- <button class="howto"> วิธีการเล่น </button> -->
					<div class="stats_btn" onclick="$('#stats_2hit').slideToggle('fast'); stats_changeArrow(this)"> 
						สถิติ  <i class="fa fa-caret-down"></i>
					</div>

					<?
					  $_rows = 6;
					  $_cols = 10;
					  $_cellKey = "color";
					?>
					<div id="stats_2hit" class="stats_container" style="display: none;">
						 <h3 style="margin: 10px 0;">สถิติ</h3>
						 <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
					</div>		
				</div>
		
		</div>

		<img src="img/line.png" class="line-img"  alt="">

		<div id="game-1" class="game">
					<div class="time"  id="time5">
						<span></span>
					</div>
			<div class="game_container">
					
					<table>
						<tr style="height: 100px;">
							<td width="33.33%" onclick="_bet5(1)" class="dragon dragon-tiger-size"><div class="result" id="time5a"><img src="img/card/c5.jpg" alt=""></div></td>
							<td width="33.33%" onclick="_bet5(3)" class="draw dragon-tiger-size"></td>
							<td width="33.33%" onclick="_bet5(2)" class="tiger dragon-tiger-size"><div class="result" id="time5b"><img src="img/card/c5.jpg" alt=""></div></td>	
						</tr>
						<tr class="count_bet">
							<td class="count_dragon1"><span>0</span></td>
							<td class="count_dragon3"><span>0</span></td>
							<td class="count_dragon2"><span>0</span></td>	
						</tr>
						
					</table>
					
					<!-- <button class="howto"> วิธีการเล่น </button> -->
					<div class="stats_btn" onclick="$('#stats_dragon-tiger').slideToggle('fast'); stats_changeArrow(this)"> 
						สถิติ  <i class="fa fa-caret-down"></i>
					</div>

					<?
					  $_rows = 6;
					  $_cols = 10;
					  $_cellKey = "dt";
					?>	
					<div id="stats_dragon-tiger" class="stats_container" style="display: none;">
						<h3 style="margin: 10px 0;">สถิติ</h3>
						 <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
					</div>			
				</div>
		
		</div>
	
		<img src="img/line.png" class="line-img"  alt="">

			<div id="game-1" class="game last_g" style="margin-bottom:80px;">
					<div class="time"  id="time1">
						<span></span>
					</div>
			<div class="game_container">
					
					<table>
						<tr>
							<td width="33.33%"	onclick="_bet1(1)" class="bacarat1 bacarat-size"> 
								<div class="result" id="time1a">
									<!-- <img src="img/card/c5.jpg" class="bacara-rs1" alt="">
									<img src="img/card/c5.jpg" class="bacara-rs1" alt="">	 -->

									<!-- <img src="../img/bacarat/card/b10.jpg">
									<img src="../img/bacarat/card/b5.jpg"> -->

								</div>
							</td>
							<td width="33.33%"	onclick="_bet1(3)" class="bacarat2 bacarat-size"></td>
							<td width="33.33%"	onclick="_bet1(2)" class="bacarat3 bacarat-size">
								<div class="result" id="time1b">
									<!-- <img src="img/card/c5.jpg" class="bacara-rs1" alt="">
									<img src="img/card/c5.jpg" class="bacara-rs1" alt="">	 -->

									<!-- <img src="../img/bacarat/card/a3.jpg">
									<img src="../img/bacarat/card/d8.jpg"> -->
								</div>
							</td>	
						</tr>
						<tr class="count_bet">
							<td class="count_bacarat1"><span>0</span></td>
							<td class="count_bacarat3"><span>0</span></td>
							<td class="count_bacarat2"><span>0</span></td>	
						</tr>
					</table>
					
					<!-- <button class="howto"> วิธีการเล่น </button> -->
					<div class="stats_btn" onclick="$('#stats_bacarat').slideToggle('fast'); stats_changeArrow(this)"> 
						สถิติ  <i class="fa fa-caret-down"></i>
					</div>

					<?
					  $_rows = 6;
					  $_cols = 10;
					  $_cellKey = "bacara";
					?>
					<div id="stats_bacarat" class="stats_container" style="display: none;">
						<h3 style="margin: 10px 0;">สถิติ</h3>
						 <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
					</div>		
				</div>
		
		</div>

	</div>



		<div class="bot-Memu">
			<div class="top">
				<div id="credit">
					
					<div id="creditAttributes" data-m_currency="<?=$_SESSION['m_currency'];?>" data-mcredit="<?=number_format($_SESSION['m_count_de']);?>" style="display: none;" ></div>
					<label> <?=$lang_lot[122];?> :</label> <strong id="_name"><span><?=$_SESSION['m_user'];?></span></strong> 
					<a href="#" onClick=" parent.location.href='logout.php';" class="logout2" style="display: none;"><i class="fa fa-sign-out"></i>  ออกจากระบบ </a>
					<div class="credit_box">
					<label id="more_credit"> <?=$lang_menu[115];?> :</label> <strong id="_credit" > <!-- THB 9999 --> </strong> 
					<i class="fa fa-refresh " id="refresh_credit" style="font-size:13px"></i> 
					</div>
					
				</div>

				<div class="hideBtn">
					<i class="fa fa-sort-down" style="font-size:24px;display: none; margin-top:-2px;"></i>
					<i class="fa fa-sort-up" style="font-size:24px; margin-top:7px;  "></i>
				</div>
			</div>
			<div class="bet_info">
				<div class="left">
					<div id="betName">
						<span> <?=$lang_g['game'][1] ;?> </span> <br> <span> Bet ID : 1806131253</span>
					</div>	
					<table  cellspacing="0" class="bet_sl_table">
						<tr>
							<td width="70%">
								<div id="bet_select">
								<!-- <img src="img/1-08.png" class="hiloStyle" alt="">
								<img src="img/1-06.png" class="hiloStyle" alt="">
								<img src="img/1-07.png" class="hiloStyle" alt=""> -->
								</div>
							</td>
							<td width="30%">
								<div id="price">
									<span></span>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="background: #0f582b; height: 40px;">
								<div class="inpu_price">
									<span style="color: #fff;width: 30%;"><?=$lang_g['game'][2];?></span> <input type="number" name="bet_price" class="enNumberic" id="bet_price" onkeyup="_sumx(this);" style="width: 60%;">
								</div>
								
							</td>
						</tr>
					</table>
					<div class="button-box">
						<input type="button" class="btn-sty1" id="submit_bet" onclick="return false;" value="<?=$lang_g['ok'];?>">
						<input type="button" class="btn-sty1" onclick="clear_bet(); return false;" value="<?=$lang_m[17];?>">
					</div>
					

				</div>
				<div class="right">

					<div id="min-max">
						<table cellspacing="0">
							<tr>
								<td width="33.33%"><?=$lang_g['game'][3];?></td>
								<td width="33.33%"><?=$lang_g['game'][4];?></td>
								<td width="33.33%"><?=$lang_g['game'][5];?></td>
							</tr>
							<tr class="num">
								<!-- <td><?//=number_format($_SESSION[mxmax])?> ฿</td> -->
								<!-- <td><?//=number_format($_SESSION[mmin])?> ฿</td>
								<td><?//=number_format($_SESSION[mmax])?> ฿</td> -->
								<td width="33.33%" style="overflow-x: auto; white-space: nowrap;">0 ฿</td>
								<td width="33.33%">0 ฿</td>
								<td width="33.33%">0 ฿</td>
							</tr>
						</table>
					</div>	
										<div id="bet-list">
						<table cellspacing="0">
							<tr>
								<th width="40%"><?=$lang_x[25];?></th>
								<th width="30.5%"><?=$lang_m[16];?></th>
								<th width="30%"><?=$lang_m[27];?></th>
							</tr>
							<tr>
								<td colspan="100%" style="padding: 0; background-color: #fff;">
									<div class="ovf_betlist">								
									<table class="bet-list-2">
										
						<!-- 				<tr>
											<td width="40%">
												<div class="bet-list-img">
													<img src="img/fish/fish1.png" class="bet-fish" alt="">
													<img src="img/fish/fish4.png" class="bet-fish" alt="">
													<img src="img/fish/fish5.png" class="bet-fish" alt="">
												</div>
													

											</td>
											<td width="30%">10</td>
											<td width="30%">รอ</td>
										</tr>
										<tr>
											<td width="40%">
												<div class="bet-list-img">
													<img src="img/bacarat/banker2.jpg" class="bet-bacarat" class="" alt="">
												</div>
													

											</td>
											<td width="30%">10</td>
											<td width="30%">รอ</td>
										</tr>
										<tr>
											<td width="40%">
												<div class="bet-list-img">
													<img src="img/2hit/red.png" class="" alt="">
												</div>
													

											</td>
											<td width="30%">10</td>
											<td width="30%">รอ</td>
										</tr>

										<tr>
											<td width="40%">
												<div class="bet-list-img">
													<img src="img/dragon/1.png" class="dragon" alt="">
												</div>
													

											</td>
											<td width="30%">10</td>
											<td width="30%">รอ</td>
										</tr> -->

										<?php for($i=0;$i<= 1;$i++){?>
										<!-- <tr>
											<td width="40%">
												<div class="bet-list-img">
													<img src="img/1-08.png" class="hiloStyle" alt="">
													<img src="img/1-06.png" class="hiloStyle" alt="">
													<img src="img/1-07.png" class="hiloStyle" alt="">
												</div>
													

											</td>
											<td width="30%">10</td>
											<td width="30%">รอ</td>
										</tr> -->
										<?php }  ?>
									</table>
									</div>
								</td>
							</tr>
						</table>

					</div>
				</div>
				
				
					
				
			</div>	
			
			
			
		</div>
		
	
	</div>
	<span id="token"></span>
	
</body>
</html>
<script src="js/getBrowser.js"></script>
<script type="text/javascript" src="js/menu.js?v=<?=$time_stam;?>"></script>
<script type="text/javascript" src="js/main.js?v=<?=$time_stam;?>"></script>
<script type="text/javascript" src="js/game.js?v=<?=$time_stam;?>"></script> 

<script>

//////////////////////////// start ////////////////////////////

var lang=[];
	

	lang['game_zone']	 = <?=json_encode($lang_g['game_zone']);?>;
	lang['game']		 = <?=json_encode($lang_g['game']);?>;
	lang['game_Msg']	 = <?=json_encode($lang_g['game_Msg']);?>;
	lang[115] 			 =  "<?=$lang_menu[115];?>";
	lang[116] 			 =  "<?=$lang_menu[116];?>";
	lang[117] 			 =  "<?=$lang_menu[117];?>";

	set_jslang(lang)
	countTime();
	set_rob(); 
	set_credit();
	get_bet_list();
	count_bet();
<?php 
	$newAry['mid'] 					= $_SESSION[mid];
	$newAry['arr_bacarat_pay'] 		= $arr_bacarat_pay;
	$newAry['arr_color_pay']		= $arr_color_pay;
	$newAry['arr_dragon_pay'] 		= $arr_dragon_pay;
	$newAry['arr_fish_pay'] 		= $arr_fish_pay;
	$newAry['arr_hilo_pay'] 		= $arr_hilo_pay;
	$newAry['m_games_dis_member'] 	= array(0,0,0,0,0);
	$newAry['cache'] 	= $cache;	



 ?>

set_default(<?=json_encode($newAry);?>);
//////////////////////////////////////////////////////////////
</script>


<?php include 'footer.php'; ?>

