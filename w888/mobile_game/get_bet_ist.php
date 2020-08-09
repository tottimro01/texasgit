<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('../inc/conn.php');
require('../inc/function.php');
require('../games/function.php');
require('cache/cache.php');

$url_file="../games/json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
// $bet_id ='1806201132';

$sql="select * from bom_tb_games_bill_play_live where m_id='$_SESSION[mid]' and bet_id='{$bet_id}'  order by play_id desc limit 100";

$re=sql_query($sql);



echo ' <table class="bet-list-2">';
while($rs=sql_fetch($re)){
/*
	?>
		<script>
			console.log(<?=json_encode($rs);?>)
		</script>
	<?
*/

	if($rs[game_zone]==1)
	{
		$list_img = ($rs["play_bet"] == 1 ) ? 'red' : 'yellow'; 
		?>
			<tr>
					<td width="40%">
						<div class="bet-list-img">
							<img src="img/2hit/<?=$list_img;?>.png?v=<?=$cache;?>" class="" alt="">
						</div>
							

					</td>
					<td width="31%"><?=number_format($rs[b_total]);?></td>
					<td width="30%"><?=$games_type[$rs[play_status]];?></td>
			</tr>

		<?
	}else if($rs[game_zone]==2)
	{
		?>
			<tr>
					<td width="40%">
						<div class="bet-list-img">
							<img src="img/dragon/<?=$rs["play_bet"];?>.png?v=<?=$cache;?>" class="dragon" alt="">
						</div>
							

					</td>
					<td width="31%"><?=number_format($rs[b_total]);?></td>
					<td width="30%"><?=$games_type[$rs[play_status]];?></td>
			</tr> 
		<?
	}else if($rs[game_zone]==3)
	{
		if($rs["play_bet"] == 1 || $rs["play_bet"] == 2 || $rs["play_bet"] == 3 )
		{
		?>
			<tr>
					<td width="40%">
						<div class="bet-list-img">
							<img src="img/bacarat/bet_sl<?=$rs["play_bet"];?>.jpg?v=<?=$cache;?>" class="bet-bacarat" class="" alt="">
						</div>
							

					</td>
					<td width="31%"><?=number_format($rs[b_total]);?></td>
					<td width="30%"><?=$games_type[$rs[play_status]];?></td>
			</tr>
		<?
		}
		
	}else if($rs[game_zone]==4)
	{
		$ex=explode("," , $rs["play_bet"]);
		?>
			<tr>
					<td width="40%">
						<div class="bet-list-img">
							<?php 

								foreach ($ex as $key => $value) {
									?>
										<!-- <img src="img/fish/fish<?=$value;?>.png?v=<?=$cache;?>" class="bet-fish" alt=""> -->
										<img src="../img/hilo/25/hilo<?=$value?>.png" class="" alt="">
									<?
								}

							 ?>
						
						</div>
							

					</td>
					<td width="31%"><?=number_format($rs[b_total]);?></td>
					<td width="30%"><?=$games_type[$rs[play_status]];?></td>
			</tr>
		<?
		
	}else if($rs[game_zone]==5)
	{	
		$ex=explode("," , $rs["play_bet"]);
		?>
			<tr>
					<td width="40%">
						<div class="bet-list-img">
							<?php 

								foreach ($ex as $key => $value) {
									?>
										<img src="img/fish/fish<?=$value;?>.png?v=<?=$cache;?>" class="bet-fish" alt="">
									<?
								}

							 ?>
						
						</div>
							

					</td>
					<td width="31%"><?=number_format($rs[b_total]);?></td>
					<td width="30%"><?=$games_type[$rs[play_status]];?></td>
			</tr>
		<?
	}


}
echo '</table>';
 ?>


							 <!-- <table class="bet-list-2">			 -->
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
																		<!-- 	<tr><td width="40%"><div class="bet-list-img"><img src="img/2hit/red.png" class="" alt=""></div></td><td width="30%">10</td><td width="30%">รอ</td></tr></table> -->