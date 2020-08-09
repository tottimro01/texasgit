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
		$active_menu = 'bet_list';
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
			<span style="float: left; margin-left: 15px; padding-top: 10px;"><!-- รายการเล่น --> <?=$lang_top[12];?></span> 
			<span style="float: right; margin-right: 15px; padding-top: 3px;">
				<!-- <form action="" id='submit_bet' method="get">
				<input type="text" name="q" id="q" value='<?=$_GET[q];?>' autocomplete="off" placeholder="<?=$lang_m[24];?>..."> 
				</form> -->
			</span> 
		</div>

		
		<div class="overflow-data">
		<table class="main_table">
			<thead>
				<tr>
					<th width="15%"><!-- วันที่-เวลา --><?=$lang_lot[20];?></th>
					<th width="15%">Bet ID</th>
					<th width="20%">Play ID</th>
					<th width="10%"><!-- เกมส์ --><?=$lang_top[3];?></th>
					<th width="15%"><!-- เลือก --><?=$lang_x[25];?></th>
					<th width="10%"><!-- เดิมพัน --><?=$lang_m[16];?></th>
					<th width="10%"><!-- สถานะ --><?=$lang_m[27];?></th>
					<th width="10%"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if($_GET[q]!=""){
						$_GET[q] = mysql_escape_mimic($_GET[q]);
							  $qq=" and bet_id like '%$_GET[q]%' ";
	 				 }
  					if($_GET[d]!=""){
  						$_GET[d] = mysql_escape_mimic($_GET[d]);
	 					 $dd=" and b_date like '$_GET[d]' ";
	 				 }

	 				 if($_GET[zone]!=""){
	 				 	$_GET[zone] = mysql_escape_mimic($_GET[zone]);
	  				 	$qs=" and game_zone=$_GET[zone] ";
	  				 }


					$sql="select *  from bom_tb_games_bill_play   where  1 and m_id='$_SESSION[mid]' $qq $qs $dd order by play_id desc";

				
		 			$num_row = sql_num($sql);

		 			if(isset($_GET['thisPage'])){
		 				$this_page = $_GET['thisPage'];
		 			}else{
		 				$this_page   = 1;
		 			}

		 			$row_perpage = 20;
		 			$total_page  = ceil($num_row / $row_perpage);
		 			$start = ($this_page-1)*$row_perpage;
		 			$pagination_num = 5;

		 			$sql="select *  from bom_tb_games_bill_play   where  1 and m_id='$_SESSION[mid]' $qq $qs $dd order by play_id desc limit $start , $row_perpage";
					$re=sql_query($sql);
					$i =0;
					while($rs=sql_fetch($re)){
						$i++;
						$win=explode(',',$rs[bet_win]);
						if($rs[game_zone]==1)
						{
							?>
								<tr>
									<td align="center"><?=$rs[play_datenow];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center">
										<?php 
											if($win[1]!=""){
												?>
													<img src="../img/2hit/30/<?=$win[1]?>.png" height="30">
												<?
											}else{
												?>
													<span class="cbu">คืนทุน/ไม่มีผลคำนวณ</span>
												<?
											}

										 ?>

									</td>
									<td align="center"><?=$rs[play_id];?></td>
       								<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center"><img src="../img/2hit/30/<?=$rs["play_bet"]?>.png" height="30"></td>
    								<td align="center"><?=number_format($rs[b_total]);?></td>
    								<td align="center"><?=$games_type[$rs[play_status]];?></td>
								</tr>
							<?

						}else if($rs[game_zone]==2)
						{
							?>
								<tr>
									<td align="center"><?=$rs[play_datenow];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center">
										<? if($win[1]!="" and $win[2]!="")
											{
										?>
												<img src="../img/bacarat/35/<?=$win[1];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
												<b>-VS-</b>
										 		<img src="../img/bacarat/35/<?=$win[2];?>.jpg"  style="border: 1px solid #999; vertical-align: middle;"  /> 
										<? }else{ 
												?>
													<span class="cbu">คืนทุน/ไม่มีผลคำนวณ</span>
												<? 
											}
										 ?>
									</td>
									<td align="center"><?=$rs[play_id];?></td>
       								<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center"><img src="../img/dragon/22/<?=$rs["play_bet"]?>.png?v=1" height="22"></td>
    								<td align="center"><?=number_format($rs[b_total]);?></td>
    								<td align="center"><?=$games_type[$rs[play_status]];?></td>
								</tr>
							<?
						}else if($rs[game_zone]==3)
						{
							?>
								<tr>
									<td align="center"><?=$rs[play_datenow];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center">
										<? if($win[1]!="" and $win[2]!="" and $win[3]!="" and $win[4]!="")
											{
										?>
													<strong>P :</strong> 
													<img src="../img/bacarat/35/<?=$win[1];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  
													<img src="../img/bacarat/35/<?=$win[2];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
   													<p style="margin: 2px;">-VS-</p> 
   													<strong>B :</strong> 
  													<img src="../img/bacarat/35/<?=$win[3];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  
  													<img src="../img/bacarat/35/<?=$win[4];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
										<? }else{ 
												?>
													<span class="cbu">คืนทุน/ไม่มีผลคำนวณ</span>
												<? 
											}
										 ?>
									</td>
									<td align="center"><?=$rs[play_id];?></td>
       								<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center" ><img src="../img/bacarat/b22/b<?=$rs[play_bet]?>.png" height="22"></td>
    								<td align="center"><?=number_format($rs[b_total]);?></td>
    								<td align="center"><?=$games_type[$rs[play_status]];?></td>
								</tr>
							<?
						}else if($rs[game_zone]==4)
						{
							$ex=explode("," , $rs["play_bet"]);
							?>
								<tr>
									<td align="center"><?=$rs[play_datenow];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center">
										<? if($win[1]!="" and $win[2]!="" and $win[3]!="")
											{
										?>
													<img src="../img/hilo/25/hilo<?=$win[1]?>.png" height="22">
													<img src="../img/hilo/25/hilo<?=$win[2]?>.png" height="22">
													<img src="../img/hilo/25/hilo<?=$win[3]?>.png" height="22">
										<? }else{ 
												?>
													<span class="cbu">คืนทุน/ไม่มีผลคำนวณ</span>
												<? 
											}
										 ?>
									</td>
									<td align="center"><?=$rs[play_id];?></td>
       								<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center"><? foreach ($ex as &$value) { ?><img src="../img/hilo/25/hilo<?=$value?>.png" height="22"><? } ?></td>
    								<td align="center"><?=number_format($rs[b_total]);?></td>
    								<td align="center"><?=$games_type[$rs[play_status]];?></td>
								</tr>
							<?

						}else if($rs[game_zone]==5)
						{
							$ex=explode("," , $rs["play_bet"]);
							?>
								<tr>
									<td align="center"><?=$rs[play_datenow];?></td>
									<td align="center"><?=$rs[bet_id];?></td>
									<td align="center">
										<? if($win[1]!="" and $win[2]!="" and $win[3]!="")
											{
										?>
													<img src="../img/fish/25/<?=$win[1]?>.png" height="22">
													<img src="../img/fish/25/<?=$win[2]?>.png" height="22">
													<img src="../img/fish/25/<?=$win[3]?>.png" height="22">
										<? }else{ 
												?>
													<span class="cbu">คืนทุน/ไม่มีผลคำนวณ</span>
												<? 
											}
										 ?>
									</td>
									<td align="center"><?=$rs[play_id];?></td>
       								<td align="center"><?=$game_zone[$rs[game_zone]];?></td>
									<td align="center"><? foreach ($ex as &$value) { ?><img src="../img/fish/25/<?=$value?>.png" height="22"><? } ?></td>
    								<td align="center"><?=number_format($rs[b_total]);?></td>
    								<td align="center"><?=$games_type[$rs[play_status]];?></td>
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

		
		<div class="pagination">
			<ul>
				<?php 
					$_page= floor($pagination_num/2);
					$start_page = $this_page - $_page;
					$end_page   = $this_page + $_page;
					$class_pre  = '';
					if($start_page <= 0)
					{
						$end_page += ($start_page*-1);
						$end_page = ($end_page >= $total_page) ? $total_page : $end_page;
						$start_page = 1;	
						$class_pre = "class='hidden'";

					}

					if($end_page >= $total_page)
					{
						$start_page -= ($end_page-$total_page);
						$start_page = ($start_page <= 0) ? 1 : $start_page;
						$end_page = $total_page;

						$class_next = "class='hidden'";

					}

					if($start_page  == 1)
					{
						$class_pre = "class='hidden'";
					}

				 ?>
				<li <?=$class_pre;?>> <a href="?thisPage=1&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>"><!-- &laquo; -->1</a> </li>
				<li <?=$class_pre;?>>
					<?
						 $previous = ($this_page -1 <= 0) ? 1 : $this_page-1;
					 ?>
					<a href="?thisPage=<?=$previous;?>&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>">&lsaquo;</a>  
				</li>
				<li <?=$class_pre;?>>
					<a href="?thisPage=<?=$previous;?>&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>"  >..</a>  
				</li>
				<?php 
					if($total_page > 1)
					{
						for($i = $start_page; $i<=$end_page; $i++)
						{
							$active = ($this_page == $i) ? 'class="active"' : '';
							?>
								<li <?=$active;?> > <a href="?thisPage=<?=$i;?>&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>"><?=$i;?></a> </li>
							<?
						}
					}	
				 ?>
				<li <?=$class_next;?>> 
					<?
						 $next = ($this_page+1 >= $total_page) ? $total_page : $this_page+1;
					 ?>
					<a href="?thisPage=<?=$next;?>&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>">..</a>
				</li>
				<li <?=$class_next;?>> 
					<a href="?thisPage=<?=$next;?>&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>">&rsaquo;</a>
				</li>
				<li <?=$class_next;?>> <a href="?thisPage=<?=$total_page;?>&zone=<?=$_GET[zone];?>&q=<?=$_GET[q];?>"><!-- &raquo; --><?=$total_page;?></a>  </li>
			</ul>
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
