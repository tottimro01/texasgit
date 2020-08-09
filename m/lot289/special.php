<script src="library/jquery.touchSwipe.js?v=1001"></script>
<script src="library/js/carousel.js?v=<?=$cache_v;?>"></script>
<script src="library/js/lotto_function.js?v=<?=$cache_v;?>"></script>
<script src="https://code.createjs.com/soundjs-0.6.2.min.js"></script>

<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["page_spec"]." ".$_SESSION["zone_name"];?></div>
	<? 
		include 'function/lotto_function.php';

		$type = 'special';
		$lotpage = '4';

		$_3in5_available = true;
		$_3in4_available = true;
		$_6sw_available = true;

		if(checkLottoClose(15) == false) 
		{ $_3in5_available = false; }

		if(checkLottoClose(14) == false) 
		{ $_3in4_available = false; }

		if(checkLottoClose())
		{ $_6sw_available = false; }

		//CLOSR BIG
		if($isCloseBig == false && $_SESSION["zone_data"][2]["z_close"]>strtotime("now") && $_SESSION["zone_data"][2]["z_status"]==1) {
		// if(true) {
	?>
	<div class="lotto-top-wrapper">
		<div id="lotto-type" hidden="true" data-lotto-type=<?=$type;?> data-type="-1"></div>
		<div class="lotto-top-row">
			<span class="lb-input"><?=$lang_data["name_poy"];?></span><input type="text" name="username_txt" id="username_txt" class="user-input" autocomplete="off">
			<span class="lb-input"><?=$lang_data["id_poy"];?></span><input type="tel" name="pollnum_txt" id="pollnum_txt" class="user-input"  data-inputtype="lotnum" autocomplete="off">
		</div>
		<div class="lotto-top-row" style="padding-right: 4px; padding-left: 4px;">
			<div class="lotto-num">
				<!-- <div><span><?=$lang_data["lesson"];?></span><span style="color: #1565C0; font-weight: 600;"><?=$_SESSION["closeBig_date"];?></span></div>
				<div><span><?=$lang_data["close_lesson"];?></span><span style="color: #E53935; font-weight: 600;"><?=$_SESSION["closeBig_time"];?></span></div> -->
				<div>
					<span><?=$lang_data["lesson"];?></span>
					<span style="color: #1565C0; font-weight: 600;">
						<?=$_SESSION["closeBig_date"][0]." ".$lang_data["months_s".$_SESSION["closeBig_date"][1]]." ".$_SESSION["closeBig_date"][2];?>
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
				<button class="save-btn" id="save-btn" name="lotto-special"><?=$lang_data["save"];?></button>
			</div>
		</div>
		<div class="lotto-top-row">
			<div class="radio-indicator items-indicator"	data-type="3in5">
				<span class="radio-indicator-select" name="radio"><div></div></span>
				<span class="radio-indicator-text" name="text"><?=$lang_data["lot3in5"];?></span>
			</div>
			<div class="radio-indicator items-indicator"	data-type="3in4">
				<span class="radio-indicator-select" name="radio"><div ></div></span>
				<span class="radio-indicator-text" name="text"><?=$lang_data["lot3in4"];?></span>
			</div>
			<div class="radio-indicator items-indicator"	data-type="19">
				<span class="radio-indicator-select" name="radio"><div ></div></span>
				<span class="radio-indicator-text" name="text"><?=$lang_data["lot19hang"];?></span>
			</div>
			<div class="radio-indicator items-indicator"	data-type="others">
				<span class="radio-indicator-select" name="radio"><div ></div></span>
				<span class="radio-indicator-text" name="text"><?=$lang_data["more"];?></span>
			</div>
		</div>
	</div>

	<div class="lotto-bottom-wrapper carousel">
		<div class="carousel-items">
			<div class="lotto-table-wrapper">
				
				<? if(checkLottoClose(15) == true){ ?>

				<div class="lotto-table">
					<table>
						<tr>
							<th style="width: 30px;"></th>
							<th style="width: 50%;"></th>
							<th style="width: 50%;">
								<button class="lotto-func-btn" data-action="copy" data-target="3in5"><?=$lang_data["copy"];?></button>
							</th>
						</tr>
						<tr>
							<td style="width: 50%;" colspan="2"><div class="lotto-table-title"><?=$lang_data["num"];?></div></td>
							<td style="width: 50%;"><div class="lotto-table-title"><?=$lang_data["price"];?></div></td>
						</tr>
					</table>
				</div>
		
				<!-- 3 ใน 5 ////////////////////////////////////////////////////////////// -->
				<div class="lotto-table lotto-table-content">
					<table>
					<?
						$rows3in5 = 10;
						for ($i=0; $i < $rows3in5; $i++) { 
					?>
							<tr>
								<td style="width: 30px; font-size: 12px; color: #8b8b8b; padding-left: 4px;"><?=$i+1;?>.</td>
								<td style="width: 50%;">
									<div class="lotto-input-form">
										<input type="tel" id=<?="3in5num".$i;?>  maxlength="5" data-inputtype="lotnum">
									</div>
								</td>
								<td style="width: 50%;">
									<div class="lotto-input-form">
										<input type="tel" id=<?="3in5amount".$i;?>  maxlength="10" data-inputtype="amount"  data-target="3in5" data-index=<?=$i;?>>
									</div>
								</td>
							</tr>
					<? } ?>
					</table>
				</div>
				
				<!-- ปิด 3 ใน 5 -->
				<? }else { ?>
					<div class="closebig"><?=$lang_data["close_bet"];?></div>
				<? } ?>

			</div>
		</div>

		<div class="carousel-items">
			<div class="lotto-table-wrapper">

				<? if(checkLottoClose(14) == true){ ?>

				<div class="lotto-table">
					<table>
						<tr>
							<th style="width: 30px;"></th>
							<th style="width: 50%;"></th>
							<th style="width: 50%;">
								<button class="lotto-func-btn" data-action="copy" data-target="3in4"><?=$lang_data["copy"];?></button>
							</th>
						</tr>
						<tr>
							<td style="width: 50%;" colspan="2"><div class="lotto-table-title"><?=$lang_data["num"];?></div></td>
							<td style="width: 50%;"><div class="lotto-table-title"><?=$lang_data["price"];?></div></td>
						</tr>
					</table>
				</div>
		
				<!-- 3 ใน 4 ////////////////////////////////////////////////////////////// -->
				<div class="lotto-table lotto-table-content">
					<table>
					<?
						$rows3in4 = 10;
						for ($i=0; $i < $rows3in4; $i++) { 
					?>
							<tr>
								<td style="width: 30px; font-size: 12px; color: #8b8b8b; padding-left: 4px;"><?=$i+1;?>.</td>
								<td style="width: 50%;">
									<div class="lotto-input-form">
										<input type="tel" id=<?="3in4num".$i;?>  maxlength="4" data-inputtype="lotnum">
									</div>
								</td>
								<td style="width: 50%;">
									<div class="lotto-input-form">
										<input type="tel" id=<?="3in4amount".$i;?>  maxlength="10" data-inputtype="amount" data-target="3in4" data-index=<?=$i;?>>
									</div>
								</td>
							</tr>
					<? } ?>
					</table>
				</div>

				<!-- ปิด 3 ใน 4 -->
				<? }else { ?>
					<div class="closebig"><?=$lang_data["close_bet"];?></div>
				<? } ?>

			</div>
		</div>

		<div class="carousel-items">
			<div class="lotto-table-wrapper">
				<div class="lotto-table">
					<table>
						<tr>
							<th style="width: 30px;"></th>
							<th style="width: 20%;"></th>
							<th style="width: 40%;"><button class="lotto-func-btn" data-action="copy" data-target="19top"><?=$lang_data["copy"];?></button></th>
							<th style="width: 40%;"><button class="lotto-func-btn" data-action="copy" data-target="19bottom"><?=$lang_data["copy"];?></button></th>
						</tr>
						<tr>
							<td style="width: 20%;" colspan="2"><div class="lotto-table-title"><?=$lang_data["num"];?></div></td>
							<td style="width: 40%;"><div class="lotto-table-title"><?=$lang_data["price"];?></div></td>
							<td style="width: 40%;"><div class="lotto-table-title"><?=$lang_data["price"];?></div></td>
						</tr>
					</table>
				</div>
		
				<!-- 19 หาง ////////////////////////////////////////////////////////////// -->
				<div class="lotto-table lotto-table-content">
					<table>
					<?
						$rows19 = 10;
						for ($i=0; $i < $rows19; $i++) { 
					?>
							<tr>
								<td style="width: 30px; font-size: 12px; color: #8b8b8b; padding-left: 4px;"><?=$i+1;?>.</td>
								<td style="width: 20%;">
									<div class="lotto-input-form"><input type="tel" id=<?="19num".$i;?> maxlength="1" data-inputtype="lotnum"></div>
								</td>
								<td style="width: 40%;">
									<div class="lotto-input-form"><input type="tel" id=<?="19topamount".$i;?> maxlength="10" data-target="19top" data-index=<?=$i;?> data-inputtype="amount"></div>
								</td>
								<td style="width: 40%;">
									<div class="lotto-input-form"><input type="tel" id=<?="19bottomamount".$i;?> maxlength="10" data-target="19bottom" data-index=<?=$i;?> data-inputtype="amount"></div>
								</td>
							</tr>
					<? } ?>
					</table>
				</div>
			</div>
		</div>

		<!-- อื่นๆ ////////////////////////////////////////////////////////////// -->
		<div class="carousel-items">
			<div class="lotto-table-wrapper">
				<div class="lotto-table lotto-table-content">
					<table>

					<? if(checkLottoClose(16) == true || checkLottoClose(1) == true || checkLottoClose(2) == true){ ?>
						<!-- 6 กลับ ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["back6"];?></div></td>
						</tr>
						<tr>
							<td class="mid-text"><?=$lang_data["num"];?></td>
							<td class="mid-text"><?=$lang_data["on"];?></td>
							<td class="mid-text"><?=$lang_data["down"];?></td>
							<td class="mid-text"><?=$lang_data["first"];?></td>
						</tr>
						<tr>
							<td>
								<div class="lotto-input-form">
									<input type="tel" id="6switchnum" maxlength="3" data-inputtype="lotnum">
								</div>
							</td>
							<td>
								<div class="lotto-input-form">
									<?if(checkLottoClose(1) == true){?>
										<input type="tel" id="6switchtop" maxlength="10" data-inputtype="amount">
									<?}else{?>
										<input type="tel" disabled="disabled">
									<?}?>
								</div>
							</td>
							<td>
								<div class="lotto-input-form">
									<? if($isCloseSmall == false && checkLottoClose(2) == true) { ?>
										<input type="tel" id="6switchbottom" maxlength="10" data-inputtype="amount">
									<? }else { ?>
										<input type="tel" disabled="disabled">
									<? } ?>
								</div>
							</td>
							<td>
								<div class="lotto-input-form">
									<?if(checkLottoClose(16) == true){?>
										<input type="tel" id="6switchfront" maxlength="10" data-inputtype="amount">
									<?}else{?>
										<input type="tel" disabled="disabled">
									<?}?>
								</div>
							</td>
						</tr>
					<? } ?>

						<!-- เลขพี่น้อง - เลขเบิ้ล ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="2"><div class="lotto-table-title"><?=$lang_data["pi_nong"];?></div></td>
							<td colspan="2"><div class="lotto-table-title"><?=$lang_data["ww"];?></div></td>
						</tr>
						<tr>
							<td class="mid-text"><?=$lang_data["on"];?></td>
							<td class="mid-text"><?=$lang_data["down"];?></td>
							<td class="mid-text"><?=$lang_data["on"];?></td>
							<td class="mid-text"><?=$lang_data["down"];?></td>
						</tr>
						<tr>
							<td>
								<div class="lotto-input-form"><input type="tel" id="siblingtop" maxlength="10" data-inputtype="amount"></div>
							</td>
							<td>
								<div class="lotto-input-form">
									<? if($isCloseSmall == false) { ?>
										<input type="tel" id="siblingbottom" maxlength="10" data-inputtype="amount">
									<? } else { ?>
										<input type="tel" disabled="disabled">
									<? } ?>
								</div>
							</td>
							<td>
								<div class="lotto-input-form"><input type="tel" id="doubletop" maxlength="10" data-inputtype="amount"></div>
							</td>
							<td>
								<div class="lotto-input-form">
									<? if($isCloseSmall == false) { ?>
										<input type="tel" id="doublebottom" maxlength="10" data-inputtype="amount">
									<? } else { ?>
										<input type="tel" disabled="disabled">
									<? } ?>
								</div>
							</td>
						</tr>

					<? if(checkLottoClose(8) == true){ ?>
						<!-- 1 ตัวบน สูง-ต่ำ ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["on1_high_low"];?></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="radio-lotto" style="display: flex;" id="lot_1topHL" data-select="0">
									<div class="radio-lotto-option-wrapper" data-option="H"	data-idx="0">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["high"];?></span>
									</div>
									<div class="radio-lotto-option-wrapper" data-option="L"	data-idx="1">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["low"];?></span>
									</div>
									<div class="lotto-input-form"><input type="tel" id="1topHL" maxlength="10" data-inputtype="amount"></div>
								</div>
							</td>	
						</tr>
					<? } ?>

					<? if(checkLottoClose(9) == true){ ?>
						<!-- 2 ตัวบน สูง-ต่ำ ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["on2_high_low"];?></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="radio-lotto" style="display: flex;" id="lot_2topHL" data-select="0">
									<div class="radio-lotto-option-wrapper" data-option="H" data-idx="0">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["high"];?></span>
									</div>
									<div class="radio-lotto-option-wrapper" data-option="L" data-idx="1">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["low"];?></span>
									</div>
									<div class="lotto-input-form"><input type="tel" id="2topHL" maxlength="10" data-inputtype="amount"></div>
								</div>
							</td>
						</tr>
					<? } ?>

					<? if(checkLottoClose(10) == true){ ?>
						<!-- 3 ตัวบน สูง-ต่ำ ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["on3_high_low"];?></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="radio-lotto" style="display: flex;" id="lot_3topHL" data-select="0">
									<div class="radio-lotto-option-wrapper" data-option="H" data-idx="0">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["high"];?></span>
									</div>
									<div class="radio-lotto-option-wrapper" data-option="L" data-idx="1">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["low"];?></span>
									</div>
									<div class="lotto-input-form"><input type="tel" id="3topHL" maxlength="10" data-inputtype="amount"></div>
								</div>
							</td>
						</tr>
					<? } ?>

					<? if(checkLottoClose(11) == true && $isCloseSmall == false){ ?>
						<!-- 2 ตัวล่าง สูง-ต่ำ ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["down2_high_low"];?></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="radio-lotto" style="display: flex;" id="lot_2bottomHL" data-select="0">
									<div class="radio-lotto-option-wrapper" data-option="H" data-idx="0">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["high"];?></span>
									</div>
									<div class="radio-lotto-option-wrapper" data-option="L" data-idx="1">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["low"];?></span>
									</div>
									<div class="lotto-input-form"><input type="tel" id="2bottomHL" maxlength="10" data-inputtype="amount"></div>
								</div>
							</td>
						</tr>
					<? } ?>
					
					<? if(checkLottoClose(12) == true){ ?>
						<!-- คี่-คู่ ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["odd_even"];?></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="radio-lotto" style="display: flex;" id="lot_oe" data-select="0">
									<div class="radio-lotto-option-wrapper"  data-option="E" data-idx="0">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["odd"];?></span>
									</div>
									<div class="radio-lotto-option-wrapper"  data-option="K" data-idx="1">
										<span class="radio-lotto-option">
											<div></div>
										</span>
										<span class="radio-lotto-option-text"><?=$lang_data["even"];?></span>
									</div>
									<div class="lotto-input-form"><input type="tel" id="oe" maxlength="10" data-inputtype="amount"></div>
								</div>
							</td>
						</tr>
					<? } ?>

					<? if(checkLottoClose(24) == true){ ?>
						<!-- 2 โต๊ด ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["lot2tod"];?></div></td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="lotto-input-form"><input type="tel" id="2todnum" maxlength="2" data-inputtype="lotnum"></div>
							</td>
							<td colspan="2">
								<div class="lotto-input-form"><input type="tel" id="2todamount" maxlength="10" data-inputtype="amount"></div>
							</td>
						</tr>
					<? } ?>
					
					<? if(checkLottoClose(21) != false || checkLottoClose(22) != false || checkLottoClose(23) != false){ ?>
						<!-- เลชปักหลัก ////////////////////////////////////////////////////////////// -->
						<tr>
							<td colspan="4"><div class="lotto-table-title"><?=$lang_data["puk_luk"];?></div></td>
						</tr>
					<? if(checkLottoClose(21) == true){ ?>

						<tr>
							<td>
								<div class="digit-title"><?=$lang_data["luk_unit"];?></div> 
							</td>
							<td>
								<select id="digits-ones-select" class="digit-num_select">
									<option value="-">--</option>
									<? for ($i=0; $i < 10; $i++) { ?>
									<option value=<?=$i;?>><?=$i;?></option>
									<? } ?>
								</select>
							</td>
							<td colspan="2">
								<div class="lotto-input-form"><input type="tel" id="num-digit-ones" maxlength="10" data-inputtype="amount"></div>
							</td>
						</tr>
					<? } ?>
					<? if(checkLottoClose(22) == true){ ?>
						<tr>
							<td>
								<div class="digit-title"><?=$lang_data["luk_10"];?></div> 
							</td>
							<td>
								<select id="digits-tens-select" class="digit-num_select">
									<option value="-">--</option>
									<? for ($i=0; $i < 10; $i++) { ?>
									<option value=<?=$i;?>><?=$i;?></option>
									<? } ?>
								</select>
							</td>
							<td  colspan="2">
								<div class="lotto-input-form"><input type="tel" id="num-digit-tens" maxlength="10" data-inputtype="amount"></div>
							</td>
						</tr>
					<? } ?>
					<? if(checkLottoClose(23) == true){ ?>
						<tr>
							<td>
								<div class="digit-title"><?=$lang_data["luk_100"];?></div> 
							</td>
							<td>
								<select id="digits-hundreds-select" class="digit-num_select">
									<option value="-">--</option>
									<? for ($i=0; $i < 10; $i++) { ?>
									<option value=<?=$i;?>><?=$i;?></option>
									<? } ?>
								</select>
							</td>
							<td colspan="2">
								<div class="lotto-input-form"><input type="tel" id="num-digit-hundreds" maxlength="10" data-inputtype="amount"></div>
								</div>
							</td>
						</tr>
					<? } } ?>
					</table>
				</div>
			</div>
		</div>
	</div>

	<? }else { ?>
		<div class="closebig"><?=$lang_data["close_bet"];?></div>
	<? } ?>
</div>