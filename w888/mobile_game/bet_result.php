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
	require('../inc/conn.php');
	require('../inc/function.php');
	$lang = ($_SESSION['lang']=='' ? 'th' : $_SESSION['lang']);
	require("../lang/".$lang.".php");

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
	<link rel="stylesheet" href="css/bet_list.css?v=<?=$cache;?>">
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
		$active_menu = 'bet_result';
		include "menu.php"; 
	?>

	<div class="box-container">
	<form action="" id='submit_bet' method="get" style="text-align: right;">
			
					<select name="zone" style="height: 21px; padding-left: 5px; background: #fff; border-radius: 1px;" onchange="$('#submit_bet').submit()">
						<option value=""> <!-- ทั้งหมด --><?=$lang_lot[39];?> </option>
						<?php 
								foreach ($lang_g['game_zone'] as $key => $value) {
									?>
									 <option value="<?=$key;?>" <?=($_GET[zone] == $key ) ? 'selected = \'selected\'' :''; ?> > <?=$value;?> </option>
									<?
								}
						 ?>
					</select> 	
					<input type="text" name="q" id="q" value='<?=$_GET[q];?>' autocomplete="off" placeholder="<?=$lang_m[24];?>..."> 
				</form>
		<div class="t_head" style="margin-top: 10px;"> 
			<span style="float: left; margin-left: 15px; padding-top: 10px;"><!-- ผลรางวัล --><?=$lang_lot[27];?></span> 
			<span style="float: right; margin-right: 15px; padding-top: 3px;">
				
			</span> 
		</div>

		
		<div class="overflow-data">
		<table class="main_table main_table2">
			<thead>
				<tr>
					<td width="25%" align="center" height="25"><!-- วันที่ --><?=$lang_m[23];?></td>
   					<td width="25%" align="center">Bet ID</td>
   					<td width="25%" align="center"><!-- เกมส์ --><?=$lang_top[3];?></td>
   					<td width="25%" align="center"><!-- ผล --><?=$lang_lot[27];?></td>
				</tr>
			</thead>
			<tbody>
				<?php 
					 if($_GET[zone]!=""){
					 	$_GET[zone] = mysql_escape_mimic($_GET[zone]);
	  				 	$qs="and game_zone='$_GET[zone]' ";
	  				 }

	  				 if($_GET[q]!=""){
						$_GET[q] = mysql_escape_mimic($_GET[q]);
							  $qq=" and bet_id like '%$_GET[q]%' ";
	 				 }
		 			$sql="select * from bom_tb_games_bet where 1 $qq $qs order by bet_id desc limit 50";
		 		
					$re=sql_query($sql);
					$i =0;
					while($rs=sql_fetch($re)){
						$i++;
						$ex=explode("," , $rs["bet_win"]);
						$exw=explode("," , $rs["bet_win_score"]);
						if($rs[game_zone]==1)
						{
							?>
								<tr>
									<td align="center"><?=$rs[b_date];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center"><img src="../img/2hit/30/<?=$ex[1]?>.png" height="30"></td>
   									
								</tr>
							<?

						}else if($rs[game_zone]==2)
						{
							?>
								<tr>
									<td align="center"><?=$rs[b_date];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center">
										<img src="../img/bacarat/35/<?=$ex[1]?>.jpg?v=1" height="35">
										 -vs- 
										<img src="../img/bacarat/35/<?=$ex[2]?>.jpg?v=1" height="35">&nbsp;
   										<? if($exw[1]>$exw[2])
   										 	{
   										?>
  												<img src="../img/red.png?v=1" height="25">
  										<? }elseif($exw[1]<$exw[2])
  											{
  										?>
  												<img src="../img/yellow.png?v=1" height="25">
  										<? }else{
  										?>
  												<img src="../img/green.png?v=1" height="25">
  										<? }?>
  										</td>
   									
								</tr>
							<?
						}else if($rs[game_zone]==3)
						{
							?>
								<tr>
									<td align="center"><?=$rs[b_date];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center">
										 <img src="../img/bacarat/35/<?=$ex[1]?>.jpg?v=1" height="35">
										 <img src="../img/bacarat/35/<?=$ex[2]?>.jpg?v=1" height="35">
    									  <p style="margin: 2px;">-VS-</p> 
    									 <img src="../img/bacarat/35/<?=$ex[3]?>.jpg?v=1" height="35">
    									 <img src="../img/bacarat/35/<?=$ex[4]?>.jpg?v=1" height="35">

									</td>
   									
								</tr>
							<?
						}else if($rs[game_zone]==4)
						{
							
							?>
								<tr>
									<td align="center"><?=$rs[b_date];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center">
										<img src="../img/hilo/shilo<?=$ex[1]?>.png" height="22"> 
										<img src="../img/hilo/shilo<?=$ex[2]?>.png" height="22"> 
										<img src="../img/hilo/shilo<?=$ex[3]?>.png" height="22">
									</td>
   									
								</tr>
							<?

						}else if($rs[game_zone]==5)
						{
							
							?>
								<tr>
									<td align="center"><?=$rs[b_date];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center">
										<img src="../img/fish/30/<?=$ex[1]?>.png" height="22"> 
										<img src="../img/fish/30/<?=$ex[2]?>.png" height="22"> 
										<img src="../img/fish/30/<?=$ex[3]?>.png" height="22">
									</td>
   									
								</tr>
							<?

						}
					}	

					if($i <= 0)
					{
						?>
						<tr>
							<td colspan="100%"> ไม่มีข้อมูล </td>
						</tr>
						<?
					}

	 			?>
					<!-- <tr>
						<td>2018-07-16 11:24:41</td>
						<td>1807161124</td>
						<td></td>
						<td>4660</td>
						<td>ดราก้อน-ไทเกอร์</td>
						<td></td>
						<td>20</td>
						<td>เสีย</td>
					</tr> -->
				
			</tbody>
		</table>
		</div>

	
		
	</div>

	<span id="token"></span>
	
</body>
</html>
<script src="js/getBrowser.js"></script>
<script type="text/javascript" src="js/menu.js?v=<?=$time_stam;?>"></script>
<script type="text/javascript" src="js/main.js?v=<?=$time_stam;?>"></script>

<?php include 'footer.php'; ?>

<script>
	$(document).keypress(function(e) {
	if ($("#q").is(":focus")) {
	 	if(e.which == 13) {
        	// $('#submit_bet').click();
        	// alert()

    	}
	} 
});
</script>
