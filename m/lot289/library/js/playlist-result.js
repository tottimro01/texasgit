$(document).ready(function($) {
	const requests = [['normal', '#bill-min'], ['full', '#bill-full']];

	$('#bill-min').on('click', 'tr', function(event) {
		event.preventDefault();
		let bid = $(this).attr('data-billid');
		if(bid === undefined){return;}

		$.ajax({
			url: 'function/bill_data.php',
			type: 'POST',
			dataType: 'html',
			data: {billid: bid, type: "billDetails" },
			cache: false,
			timeout: 30000,
			beforeSend: activeLoadModal,
		})
		.always(function(data, status, xhr) {
			if(status == 'success') {
				activePlaylistModal(true, bid, data)
			}
			activeLoadModal(false);
		});
	});

  	$('#search-form').on('submit', function(event) {
  		event.preventDefault();
  		let _date = $('#sdate').val();
		let _pname = $.trim($('#username_txt').val());
		let _pid = $.trim($('#pollnum_txt').val());

		getBillDate(_date, _pname, _pid, requests).done(function(response) {
			activeLoadModal(false);
		});
  	});

	$('#sdate').on('change', function(event) {
		event.preventDefault();
		let _date = $('#sdate').val();
		let _pname = '';
		let _pid = '';

		getBillDate(_date, _pname, _pid, requests).done(function(response) {
			activeLoadModal(false);
		});
	});	

	function getBillDate(_date, _pname, _pid, requests) {
		activeLoadModal(true);
	    var count = requests.length;
	    var results = [];
	    var deferreds = [];
	    var all_done = $.Deferred();
	    
	    for(var i=0; i < requests.length; i++) {
	    	let elm = requests[i][1];
	        var deferred = 
	        $.ajax({
				url: 'function/bill_data.php',
				type: 'post',
				dataType: 'html',
				cache: false,
				data: {date: _date, pname: _pname, pid: _pid, type: requests[i][0] },
			})
			.done(function(data,status,xhr) {
				$(elm).html(data);
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
	// function loadNormalDetailsBill(_date, _pname, _pid) {
	// 	$.ajax({
	// 		url: 'function/bill_data.php',
	// 		type: 'POST',
	// 		dataType: 'html',
	// 		data: {date: _date, pname: _pname, pid: _pid, type: "normal" },
	// 		cache: false,
	// 		timeout: 30000,
	// 		beforeSend: activeLoadModal,
	// 	})
	// 	.always(function(data, status, xhr) {
	// 		if(status == 'success') {
	// 			$('#bill-min').html(data);
	// 			loadFullDetailsBill(_date, _pname, _pid);
	// 		}else {
	// 			activeLoadModal(false);
	// 		}
	// 	});
	// }

	// function loadFullDetailsBill(_date, _pname, _pid) {
	// 	$.ajax({
	// 		url: 'function/bill_data.php',
	// 		type: 'POST',
	// 		dataType: 'html',
	// 		data: {date: _date, pname: _pname, pid: _pid, type: "full"},
	// 		cache: false,
	// 		timeout: 30000,
	// 		beforeSend: activeLoadModal,
	// 	})
	// 	.always(function(data, status, xhr) {
	// 		if(status == 'success') {
	// 			$('#bill-full').html(data);
	// 		}
	// 		activeLoadModal(false);
	// 	});
	// }

	$('#sdate').trigger('change');	
});