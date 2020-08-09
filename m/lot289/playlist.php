<!-- <script src="library/jquery.touchSwipe.js"></script> -->
<script src="library/js/carousel.js?v=<?=$cache_v;?>"></script>
<script src="library/js/playlist-result.js?v=<?=time();?>"></script>

<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["list_play"]." ".$_SESSION["zone_name"];?></div>
	<div class="lotto-top-wrapper">
		<div class="radio-wrapper">
			<select id="sdate" name="select-date" class="select-date">
				<?
					/*$data = file_get_contents($_SESSION["url"].'getDate.php');
					$data = json_decode($data,true);*/
					
				
					$arr = array();
					$i=0;
					$sql=sql_query("select * from bom_tb_lotto_ok where lot_zone = '".$_SESSION["zone"]."' and lot_rob = '".$_SESSION["rob"]."' group by ok_date order by o_limit_time desc limit 50");
					while($rs=sql_fetch($sql)){
						$arr[$i]["strDate"] = $rs["ok_date"];
						$i++;
					}
				
					$datax = json_encode($arr);
					$data = json_decode($datax, true);
			
					foreach ($data as $key => $value) {
				?>
					<option value=<?=$value["strDate"]?>><?=convertDate($value["strDate"]);?></option>
				<? } ?>
			</select>
			<div class="radio-indicator items-indicator">
				<span class="radio-indicator-select" name="radio"><div></div></span>
				<span class="radio-indicator-text" name="text"><?=$lang_data["list_bill"];?></span>
			</div>
			<div class="radio-indicator items-indicator">
				<span class="radio-indicator-select" name="radio"><div ></div></span>
				<span class="radio-indicator-text" name="text"><?=$lang_data["list_bill_all"];?></span>
			</div>
		</div>
		<div class="lotto-top-row" style="/*padding: 2px 4px;*/">
			<form action="" id="search-form" style="padding: 0; margin: 0; display: flex; width: 100%;">
				<label for="username_txt" class="lb-input" style="/*line-height: 30px;*/"><?=$lang_data["name_poy"];?></label>
				<input type="text" name="username_txt" id="username_txt" class="user-input" style="/*height: 30px;*/">
				<label for="pollnum_txt" class="lb-input" style="/*line-height: 30px;*/"><?=$lang_data["id_poy"];?></label>
				<input type="tel" name="pollnum_txt" id="pollnum_txt" class="user-input" style="/*height: 30px;*/">
				<input type="submit" name="btn-search" id="btn-search" value="ค้นหา" class="save-btn" style="/*font-size: 14px; font-weight: 600;*/ height: 34px;">
			</form>
		</div>
	</div>
		
		<div class="lotto-bottom-wrapper carousel">
			<!-- min ditails -->
			<div class="carousel-items swiper">
				<div class="lotto-table-wrapper">

					<!-- table header -->
					<div class="bill-table">
						<table>
							<tr>
								<th><?=$lang_data["date_time"];?></th>
								<th><?=$lang_data["yod_buy"];?></th>
								<th><?=$lang_data["dis"];?></th>
								<th><?=$lang_data["yod_win"];?></th>
								<th><?=$lang_data["yod_total"];?></th>
							</tr>
						</table>
					</div>

					<!-- table content -->
					<div id="bill-min" class="bill-table bill-table-content"> </div>

				</div>
				
			</div>

			<!-- full ditails -->
			<div class="carousel-items swiper">
				<div class="lotto-table-wrapper">

					<!-- table header -->
					<div class="bill-table">
						<table>
							<tr>
								<th><?=$lang_data["date_time"];?></th>
								<th><?=$lang_data["type"];?></th>
								<th><?=$lang_data["num"];?></th>
								<th><?=$lang_data["amount"];?></th>
								<th><?=$lang_data["dis"];?></th>
								<th><?=$lang_data["net"];?></th>
							</tr>
						</table>
					</div>

					<!-- table content -->
					<div id="bill-full" class="bill-table bill-table-content">
					</div>
				</div>
			</div>
		</div>
</div>
