<script src="library/js/lotto_function.js?v=<?=$cache_v;?>"></script>
<script src="https://code.createjs.com/soundjs-0.6.2.min.js"></script>

<!-- เปิดรับแทงแล้ว Close Small -->
<?
$_SESSION["close_big"] = $_SESSION["zone_data"][2]["z_close"];
$_SESSION["close_small"] = $_SESSION["zone_data"][2]["z_close"];
	include 'function/lotto_function.php';
	
	if(isset($_GET["page"])) {

		$lot_available = true; //เปิด/ปิด ทั้งหมด
		$top_available = true; //เปิด/ปิด เลข บน
		$bottom_available = true; //เปิด/ปิด เลข ล่าง
		$tod_available = true; //เปิด/ปิด เลข โต๊ด

		switch ($_GET["page"]) {
			case 'quick':
				$lotpage = 1;
				$num_maxlength = 3;

				$lotto_type[0] = $lang_data["on"];
				$lotto_type[1] = $lang_data["down"];
				$lotto_type[2] = $lang_data["tod"];

				break;
			case 'three':
				$lotpage = 2;
				$num_maxlength = 3;

				$lotto_type[0] = $lang_data["first_on"];	
				$lotto_type[1] = $lang_data["first_down"];	
				$lotto_type[2] = $lang_data["first_tod"];	

				// เช็คเปิดขาย
				if(checkLottoClose(16) == false && checkLottoClose(17) == false && checkLottoClose(18) == false && checkLottoClose(19) == false && checkLottoClose(20) == false)
				{ $lot_available = false; }

				// เช็คเปิดขายบน
				if(checkLottoClose(16) == false && checkLottoClose(18) == false && checkLottoClose(19) == false)
				{ $top_available = false; }

				// เช็คเปิดขายล่าง
				if(checkLottoClose(17) == false)
				{ $bottom_available = false; }

				// เช็คเปิดขายโต๊ด
				if(checkLottoClose(20) == false)
				{ $tod_available = false; }

				break;
			case 'two':
				$lotpage = 3;
				$num_maxlength = 2;
				$lotto_type[0] = $lang_data["lot2on"];	
				$lotto_type[1] = $lang_data["lot2down"];	
				$lotto_type[2] = $lang_data["lot2tur_tod"];

				break;
			default:
				//ถ้า get page ไม่ตรงกับ quick, three, หรือ two ให้กลับหน้า index
				header("Location: ".$_SESSION["base_url"]."index.php");
				die();
				break;
		}
	}

	$lotto_rows = 20;


	if($isCloseBig == false && $lot_available == true && $_SESSION["zone_data"][2]["z_close"]>strtotime("now") && $_SESSION["zone_data"][2]["z_status"]==1){
	// if(true) {
?>

<div class="lotto-top-wrapper">
	<div class="lotto-top-row">
		<span class="lb-input"><?=$lang_data["name_poy"];?></span><input type="text" name="username_txt" id="username_txt" class="user-input" autocomplete="off">
		<span class="lb-input"><?=$lang_data["id_poy"];?></span><input type="tel" name="pollnum_txt" id="pollnum_txt" class="user-input" data-inputtype="lotnum" autocomplete="off">
	</div>
	<div class="lotto-top-row" style="padding-right: 4px; padding-left: 4px;">
		<div class="lotto-num">
			<div>
				<span><?=$lang_data["lesson"];?></span>
				<span style="color: #1565C0; font-weight: 600;">
					<?=$_SESSION["closeBig_date"][0]." ".$lang_data["months_s".intval($_SESSION["closeBig_date"][1])]." ".$_SESSION["closeBig_date"][2];?>
				</span>
			</div>
			<div>
				<span><?=$lang_data["close_lesson"];?></span>
				<span style="color: #E53935; font-weight: 600;">
					<?=$_SESSION["closeBig_time"][0].":".$_SESSION["closeBig_time"][1];?>
				</span>
			</div>
		</div>
		<div class="lotto-menu-group">
			<button class="lotto-btn lotto-volume"></button>
			<button class="lotto-btn lotto-refresh"></button>
			<button class="save-btn" id="save-btn" name="lotto"><?=$lang_data["save"];?></button>
		</div>
	</div>
</div>
<div class="lotto-bottom-wrapper">
	<div class="lotto-table-wrapper">
		<div class="lotto-table">
			<table>
				<tr>
					<th>
						<?if($_SESSION["zone"]==19){?>
						<a href=<?=$_SESSION["base_url"]."streaming.php";?> class="stream-btn">
							<img src="<?=$_SESSION['base_url'].'library/img/ico/ic_live_tv.png?v=1001';?>" alt="">
						</a>
						<?}?>
					</th>
					<th><button class="lotto-func-btn" data-row="lot-num"	 data-action="switch"	data-target="lot-num"><?=$lang_data["back"];?></button></th>
					<th>

					<? if($top_available == true) {?>
						<button class="lotto-func-btn" data-row="chk-top"	 data-action="copy"		data-target="top"><?=$lang_data["copy"];?></button>
					<? } else { ?>
						<button class="lotto-func-btn" disabled="disabled"><?=$lang_data["copy"];?></button>
					<? } ?>

					</th>
					<th>

					<? if($bottom_available == true) {?>
						<button class="lotto-func-btn" data-row="chk-bottom" data-action="copy"		data-target="bottom"><?=$lang_data["copy"];?></button>
					<? } else { ?>
						<button class="lotto-func-btn" disabled="disabled"><?=$lang_data["copy"];?></button>
					<? } ?>

					</th>
					<th>

					<? if($tod_available == true) {?>
						<button class="lotto-func-btn" data-row="chk-tod"	 data-action="copy"		data-target="tod"><?=$lang_data["copy"];?></button>
					<? } else { ?>
						<button class="lotto-func-btn" disabled="disabled"><?=$lang_data["copy"];?></button>
					<? } ?>

					</th>
				</tr>
				<tr>
					<td><div class="lotto-table-title"><?=$lang_data["back"];?></div></th>
					<td><div class="lotto-table-title"><?=$lang_data["num"];?></div></td>
					<td>
						<div class="lotto-table-title">
							<label class="chk-container">

							<? if($top_available == true) {?>
								<input type="checkbox" id="chk-top" checked="checked">
							<? } else { ?>
								<input type="checkbox" disabled="disabled">
							<? } ?>

								<span class="checkmark"></span>
							</label>
							<span><?=$lotto_type[0];?></span>
						</div>
					</td>
					<td>

						<div class="lotto-table-title">
							<label class="chk-container">

							<? if($bottom_available == true) {?>
								<input type="checkbox" id="chk-bottom" checked="checked">
							<? } else { ?>
								<input type="checkbox" disabled="disabled">
							<? } ?>

								<span class="checkmark"></span>
							</label>
							<span><?=$lotto_type[1];?></span>
						</div>
					</td>
					<td>
						<div class="lotto-table-title">
						<label class="chk-container">

						<? if($tod_available == true) {?>
							<input type="checkbox" id="chk-tod" checked="checked">
						<? } else { ?>
							<input type="checkbox" disabled="disabled">
						<? } ?>

							<span class="checkmark"></span>
						</label>
						<span><?=$lotto_type[2];?></span>
						</div>
					</td>
				</tr>
			</table>
		</div>
	
		<div class="lotto-table lotto-table-content">
			<table>
			<? for ($i=0; $i < $lotto_rows; $i++) {  ?>
					<tr class="lotto-form-row">
						<td>
							<div class="lotto-input-form" style="display: flex; align-items: center; padding-right: 4px;">
								<span class="form-num"><?=$i+1;?>.</span>
								<label class="chk-container" name="chk-switch" style="flex: 1;">
									<input type="checkbox" id=<?="chk-switch".$i;?> name=<?="chk-switch".$i;?> data-idx=<?=$i;?> disabled="disabled">
									<span class="checkmark disabled-checkmark"></span>
								</label>
							</div>
						</td>
						<td>
							<div class="lotto-input-form" style="display: flex;">
								<input type="tel" id=<?="lotto-num".$i;?> name=<?="lotto-num".$i;?> data-inputtype="lotnum" data-maxlength=<?=$num_maxlength;?> style="color: #f00;" data-target="lot-num" data-index=<?=$i;?>>=
							</div>
						</td>
						<td>
							<div class="lotto-input-form">

							<? if($top_available == true) {?>
								<input type="tel" id=<?="lotto_top".$i;?> name=<?="lotto_top".$i;?> data-inputtype="amount" data-row="chk-top" data-target="top" data-index=<?=$i;?>>
							<? }else { ?>
								<input type="tel" disabled="disabled">
							<? } ?>

							</div>
						</td>
						<td>
							<div class="lotto-input-form">

							<? if($bottom_available == true) {?>
								<input type="tel" id=<?="lotto_bottom".$i;?> name=<?="lotto_bottom".$i;?> data-inputtype="amount" data-row="chk-bottom" data-target="bottom" data-index=<?=$i;?>>
							<? }else { ?>
								<input type="tel" disabled="disabled">
							<? } ?>

							</div>
						</td>
						<td>
							<div class="lotto-input-form">

							<? if($tod_available == true) {?>
								<input type="tel" id=<?="lotto_tod".$i;?> name=<?="lotto_tod".$i;?> data-inputtype="amount" data-row="chk-tod" data-target="tod" data-index=<?=$i;?>>
							<? }else { ?>
								<input type="tel" disabled="disabled">
							<? } ?>

							</div>
						</td>
					</tr>
			<? } ?>
			</table>
		</div>
	</div>
</div>

<!-- ปิดรับแทงแล้ว Close Big -->
<? }else { ?><div class="closebig"><?=$lang_data["close_bet"];?></div><? } ?>
