<script src="library/jquery-ui/jquery-ui.min.js?v=<?=$cache_v;?>"></script>
<link rel="stylesheet" href="library/jquery-ui/jquery-ui.min.css?v=<?=$cache_v;?>">
<script src="library/js/carousel.js?v=<?=$cache_v;?>"></script>
<script src="library/js/result.js?v=<?=$cache_v;?>"></script>
<? session_start(); ?>
<style>
	.ui-widget.ui-widget-content {
		margin: 0 auto;
    	width: 100%;
    	max-width: 400px;
	}

	.ui-state-highlight, 
	.ui-widget-content .ui-state-highlight, 
	.ui-widget-header .ui-state-highlight {
	   	border: 1px solid #4496e4;
   		background: #ffffff;
   		color: #454545;
	}

	.ui-state-active, 
	.ui-widget-content .ui-state-active, 
	.ui-widget-header .ui-state-active, 
	a.ui-button:active, 
	.ui-button:active, 
	.ui-button.ui-state-active:hover {
		border: 1px solid #fff!important;
   		background: #fff!important;
   		color: #0091ea!important;
	}

	.ui-state-default, 
	.ui-widget-content .ui-state-default, 
	.ui-widget-header .ui-state-default, 
	.ui-button, 
	html .ui-button.ui-state-disabled:hover, 
	html .ui-button.ui-state-disabled:active {
		line-height: 26px;
	}
</style>
<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["menu_win"];?></div>
	<div class="lotto-top-wrapper" style="margin: 0 auto;">
		<div class="lotto-table-wrapper">
			<div class="radio-wrapper">
				<div class="radio-indicator items-indicator">
					<span class="radio-indicator-select" name="radio"><div></div></span>
					<span class="radio-indicator-text" name="text"><?=$lang_data["win_day"];?></span>
				</div>
				<div class="radio-indicator items-indicator">
					<span class="radio-indicator-select" name="radio"><div ></div></span>
					<span class="radio-indicator-text" name="text"><?=$lang_data["win_type"];?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="lotto-info-table-wrapper carousel" >
		<!-- select by date -->
		<div class="carousel-items swiper" style="display: flex; flex-direction: column;">
			<div class="calendar-wrapper">
				<button id="button-calendar" class="button-calendar" onclick="$('#datepicker').slideToggle('fast');">
					<span class="ico">
						<img src='<?=$_SESSION["base_url"]."library/img/ico/ic_calendar.png?v=1001";?>' alt="">
					</span>
					<span class="date-txt">----</span>
				</button>
				<div id="datepicker"></div>
			</div>	
			<div class="bill-table-content">
				<div id="bingo-date" class="result-table-wrapper"></div>
			</div>	
		</div>

		<!-- select by type -->
		<div class="carousel-items swiper">
			<div class="lotto-table-wrapper">
				<div class="radio-wrapper lotto-top-wrapper" style="padding-top: 0;">
					<?
						/*$req_url = $_SESSION["url"].'getListLot.php?lang='.$_COOKIE["lang"];
						$data = file_get_contents($req_url);
						$data = json_decode($data,true);*/
					
					
					$lang_post           = trim($_COOKIE["lang"]);
					if($lang_post==""){
						$lang_post = "th";
					}
					require("../../lang/".$lang_post.".php");
						//$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 group by ok_date order by o_limit_time desc limit 1");

						$arr["ListLot"] = array();
						$zi = 0;
						foreach($arr_zone as $zkey => $zvalue){
							$nz = $lot_zone_bet[$zkey];
							if($nz<=1){
								$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey];
								$arr["ListLot"][$zi]["z_zone"] = $zkey;
								$arr["ListLot"][$zi]["z_rob"] = 1;
								$zi++;
							}else{
								for($zr=1;$zr<=$nz;$zr++){
									if($zkey==18){
										$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey]." ".$lang_g['_rob']." ".$zr;
									}else if($zkey==19){
										$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey]." ".$lang_m[40]." ".$lot_robmun[$zr];
									}else{
										$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey].$lot_rob[$zr];
									}
									$arr["ListLot"][$zi]["z_zone"] = $zkey;
									$arr["ListLot"][$zi]["z_rob"] = $zr;
									$zi++;
								}
							}
						}

						$arr["Status"] = "1";
						$arr["Licen"] = "SC";
					
					$datax = json_encode($arr);
					$data = json_decode($datax, true);
					
					?>
					<select id="stype" name="select-type" class="select-date" onchange="getBingo(2, $(this).val());">
					<? foreach ($data["ListLot"] as $key => $value) { ?>
						<option value="<?=$value[z_zone].",".$value[z_rob];?>"><?=$value["z_name"];?></option>
					<? } ?>
					</select>
				</div>
				<div class="bill-table-content">
					<div id="bingo-type" class="result-table-wrapper"></div>	
				</div>
			</div>
		</div>
	</div>
</div>
<? $_today = date("d")."-".date("m")."-".date("Y"); ?>

<script>
	$(document).ready(function($) {
		$('#button-calendar .date-txt').html(convertDate('<?=$_today;?>'));
		getBingo(1, '<?=$_today;?>');
		getBingo(2, '1,1');
	});

/* Thai initialisation for the jQuery UI date picker plugin. */
/* Written by pipo (pipo@sixhead.com). */
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {
		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.th = {
	closeText: "Close",
	prevText: "&#xAB;&#xA0;Previous",
	nextText: "Next&#xA0;&#xBB;",
	currentText: "Today",
	monthNames: [ lang_data_month["full"]["1"],lang_data_month["full"]["2"],lang_data_month["full"]["2"],lang_data_month["full"]["4"],lang_data_month["full"]["5"],lang_data_month["full"]["6"],lang_data_month["full"]["7"],lang_data_month["full"]["8"],lang_data_month["full"]["9"],lang_data_month["full"]["10"],lang_data_month["full"]["11"],lang_data_month["full"]["12"] ],

	monthNamesShort: [ lang_data_month["short"]["1"],lang_data_month["short"]["2"],lang_data_month["short"]["2"],lang_data_month["short"]["4"],lang_data_month["short"]["5"],lang_data_month["short"]["6"],lang_data_month["short"]["7"],lang_data_month["short"]["8"],lang_data_month["short"]["9"],lang_data_month["short"]["10"],lang_data_month["short"]["11"],lang_data_month["short"]["12"] ],

	dayNames: [ lang_data_day["1"],lang_data_day["2"],lang_data_day["3"],lang_data_day["4"],lang_data_day["5"],lang_data_day["6"],lang_data_day["7"] ],
	dayNamesShort: [ lang_data_day["1"],lang_data_day["2"],lang_data_day["3"],lang_data_day["4"],lang_data_day["5"],lang_data_day["6"],lang_data_day["7"] ],
	dayNamesMin: [ lang_data_day["1"],lang_data_day["2"],lang_data_day["3"],lang_data_day["4"],lang_data_day["5"],lang_data_day["6"],lang_data_day["7"] ],
	weekHeader: "Wk",
	dateFormat: "dd/mm/yy",
	firstDay: 0,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "" };
	datepicker.setDefaults( datepicker.regional.th );

	return datepicker.regional.th;
}));
</script>
