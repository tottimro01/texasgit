<? require_once '../../inc/conn.php'; ?>
<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["menu_payrate"];?></div>
	<div class="lotto-info-table-wrapper">
		<div class="lotto-info-table">
			<table id="pt1">
				<tr>
					<th><?=$lang_data["type"];?></th>
					<th><?=$lang_data["pay"];?></th>
					<th><?=$lang_data["dis"];?></th>
				</tr>
			</table>
		</div>
		<div class="lotto-info-table">
			<table id="pt2">
				<tr>
					<th><?=$lang_data["type"];?></th>
					<th><?=$lang_data["pay_to_tor"];?></th>
					<th><?=$lang_data["win"];?></th>
				</tr>
			</table>
		</div>
	</div>
</div>	

<script>
$(document).ready(function($) {
	const requests = [['function/get_payrate.php', '#pt1'], ['function/get_payrate2.php', '#pt2']];
	getPayrate(requests).done(function(response) {
		activeLoadModal(false);
	});

	function getPayrate(requests) {
		activeLoadModal(true);
	    var count = requests.length;
	    var results = [];
	    var deferreds = [];
	    var all_done = $.Deferred();
	    
	    for(var i=0; i < requests.length; i++) {
	    	let elm = requests[i][1];
	        var deferred = 
	        $.ajax({
				url: requests[i][0],
				type: 'post',
				dataType: 'html',
				cache: false,
			})
			.done(function(data,status,xhr) {
				if($.trim(data).length > 0) {
					$(elm).append(data);
				}else {
					$(elm).hide();
				}
	            results.push(1);    
			})
			.fail(function() { 
	            results.push(0);    
			})
			.always(function() {
				count--;
	            if(count === 0) { all_done.resolve(results); }
			});
	        deferreds.push(deferred);
	    } 
	    return all_done.promise();
	}
});
</script>