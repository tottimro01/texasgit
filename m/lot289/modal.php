<? # LOADING MODAL ?>
<div class="load-modal">
	<div class="load-icon-wrapper">
		<div class="load-icon"></div>
	</div>
</div>

<? # PLAYLIST MODAL ?>
<div class="playlist-modal">
	<div class="playlist-wrapper">
		<div class="playlist-top">
			<div class="playlist-title" data-bid=""></div>
			<div class="close-playlist-modal">&#10005;</div>
		</div>
		<div class="playlist-body">
			<div class="playlist-table">
				<table></table>
			</div>
		</div>
	</div>
</div>

<? # WARNING MODAL ?>
<div class="warning-modal" id="network-warning">
	<div class="warning-wrapper">
		<p><span class="icon-wifi-off ico"></span><span><?=$lang_data["no_internet"];?></span></p>
		<span class="close-warning">&#10006;</span>
	</div>
</div>

<noscript>
	<?
		$ejs_url = "https://www.enable-javascript.com/";
		$ejs_lang = array('en', 'hr', 'de', 'nl', 'es', 'pt', 'it', 'no', 'ru', 'fr', 'cz', 'ja', 'ko', 'hu', 'th', 'ph', 'tr', 'id', 'sk', 'pl', 'ar', 'ur');
		if(in_array(strtolower($_COOKIE['lang']), $ejs_lang)) {
			$ejs_url = $ejs_url.strtolower($_COOKIE['lang'])."/";
		}
	?>
	<div class="warning-modal" style="display: block;">
		<div class="warning-wrapper">
			<a href="<?=$ejs_url;?>" target="_blank"><p><span class="icon-code ico"></span><span style="text-decoration: underline;"><?=$lang_data["noscript"];?></span></p></a>
		</div>
	</div>
</noscript>

<? # MESSAGE MODAL ?>
<div class="message-modal">
	<div class="message-dialog">
		<div style="display: flex;">
			<div class="message-title"></div>
			<div class="close-message">&#10006;</div>
		</div>
		<div class="message-content"></div>
		<div class="message-button-wrapper">
			<button class="message-button close"></button>
		</div>
	</div>
</div>

<? if($_GET["page"]=='quick' || $_GET["page"]=='three' || $_GET["page"]=='two' || $_GET["page"]=='special' || $_GET["page"]=='unfinish-bet'){ ?>

<? # BET RESULT MODAL ?>
<div class="bet-result-modal">
	<div class="bet-result-wrapper">
		<div class="bet-result-top">
			<div class="close-bet-result-modal">&#10005;</div>
			<div class="bet-result-top-section">
				<div class="bet-result-top-info info" style="font-weight: 600;"></div>
				<div class="bet-result-top-info lesson" style="font-weight: 600;"></div>
				<div class="bet-result-top-info datetime"></div>
				<div class="bet-result-top-info uname"></div>
			</div>
			<div class="bet-result-top-section">
				<div class="bet-result-top-info branch"></div>
				<div class="bet-result-top-info saler"></div>
			</div>
		</div>
		<div class="bet-result-body">
			<div class="bet-result-list"></div>
		</div>
		<div class="bet-result-summary"><!-- ยอดรวม --></div>
		<div class="bet-result-bottom">
			<a id="btnSaveBill" href="#">
				<span class="icon-download ico vtop"></span>	
				<span><?=$lang_data["save_bill"];?></span>
			</a>
		</div>
	</div>
	<form id="invisible_form" action="" method="post" hidden="true">
  		<input id="bill_status" name="bill_status" type="hidden" value="">
  		<input id="bill_bid" name="bill_bid" type="hidden" value="">
  		<input id="bill_info" name="bill_info" type="hidden" value="">
  		<input id="bill_lesson" name="bill_lesson" type="hidden" value="">
  		<input id="bill_datetime" name="bill_datetime" type="hidden" value="">
  		<input id="bill_uname" name="bill_uname" type="hidden" value="">
  		<input id="bill_poy" name="bill_poy" type="hidden" value="">
  		<input id="bill_saler" name="bill_saler" type="hidden" value="">
  		<input id="bill_branch" name="bill_branch" type="hidden" value="">
  		<input id="bill_list" name="bill_list" type="hidden" value="">
  		<input id="bill_total" name="bill_total" type="hidden" value="">
  		<input id="bill_msg" name="bill_msg" type="hidden" value="">
	</form>
</div>

<div id="bill-img" class="bill-img" style="display: none;"><img src="" alt=""></div>
<div id="m-bill" style="width: 100%;"></div>

<!-- <script src="library/html2canvas.min0.4.1.js?v=1001"></script> -->
<script src="library/html2canvas.min1.0.0-alpha12.js?v=1001"></script>
<link rel="stylesheet" href="library/css/bill-style.css?v=<?=$cache_v;?>">
<script>
$('#invisible_form').on('submit', function(event) {
	event.preventDefault();
	let fdata = new FormData(this);
	$.ajax({
		url: 'bill.php',
		type: 'POST',
		dataType: 'html',
		data: fdata,
		contentType: false,
		cache: false,
		processData: false,
	})
	.done(function(data) {
		$('#m-bill').css('display', 'block');
		$('#m-bill').html(data).promise().done(function(){
			let img_name = $('.bill-result-wrapper').attr('data-bid')+".png";
			// html2canvas($(".bill-result-wrapper"), {
	 	// 		onrendered: function(canvas) {
	 	// 			var url = canvas.toDataURL("image/png", 1.0);
	  //   		    $('#bill-img img').attr("src",url);
	 	// 			$('.bill-result-wrapper').css('display', 'none');
			// 		$('#m-bill').css('display', '');
	 	// 			$('a#btnSaveBill').attr('href', canvas.toDataURL());
	 	// 			$('a#btnSaveBill').attr('download', img_name);
	 	// 			autoSaveImage(canvas.toDataURL(), img_name);
 		// 		},
			// });
			let div = $(".bill-result-wrapper").get(0)
			html2canvas(div, { scale: 3, }).then(function(canvas) {
				var url = canvas.toDataURL("image/png", 1.0);
	    		$('#bill-img img').attr("src",url);
	 			$('.bill-result-wrapper').css('display', 'none');
				$('#m-bill').css('display', '');
	 			$('a#btnSaveBill').attr('href', canvas.toDataURL());
	 			$('a#btnSaveBill').attr('download', img_name);
	 			autoSaveImage(canvas.toDataURL("image/png", 1.0), img_name);
			});
		})
	})
	.fail(function() {})
	.always(function() {});
});

function autoSaveImage(uri, filename) {
	var link = document.createElement('a');
	if (typeof link.download === 'string') {
		link.href = uri;
		link.download = filename;
		document.body.appendChild(link); //Firefox requires the link to be in the body
		link.click();
		document.body.removeChild(link);
	}
}
</script>
<? } ?>
