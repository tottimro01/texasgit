// Update the online status icon based on connectivity
window.addEventListener('online',  updateConnectionState);
window.addEventListener('offline', updateConnectionState);
updateConnectionState();

function updateConnectionState() {
	if(navigator.onLine)
	{
		$('#network-warning').css('display', '');
	}else {
		$('#network-warning').css('display', 'block');
	}
}

$(document).ready(function($) {
	$('.bet-result-modal').on('click','.bet-result-top, .bet-result-body, .bet-result-summary', function(event) {
		event.preventDefault();
		activeBetResultModal(false);

	});
	//close result modal
	$('.bet-result-modal').on('click', '.close-bet-result-modal', function(event) {
		event.preventDefault();
		activeBetResultModal(false);
	});

	//close playlist modal
	$('.playlist-modal').on('click', '.close-playlist-modal', function(event) {
		event.preventDefault();
		activePlaylistModal(false);
	});

	//save bill image
	// $(".bet-result-modal").on('click', '#btnSaveBill', function() { 
	// 	$('#invisible_form').submit();
	// });

	$('.close-warning').on('click', function(event) {
		event.preventDefault();
		$('.warning-modal').css('display', 'none');
	});

	$('.close-message, .message-button').on('click', function(event) {
		event.preventDefault();
		activeMessageModal(false);
	});

});

function activeMessageModal(_val, _title, _msg, _close_msg) {
	if(_val === true) {
		$('.message-modal').css('display', 'flex');
		$('.message-title').html(_title);
		$('.message-content').html(_msg);
		$('.message-button-wrapper .close').html(_close_msg);
		$('.message-button-wrapper a').remove();
	}else {
		$('.message-modal').css('display', '');
		$('.message-titlel').html('');
		$('.message-content').html('');
		$('.message-button').removeAttr('onclick');
		$('.message-button-wrapper .close').html('');
		$('.message-button-wrapper a').remove();
	}
}

function activeLoadModal(_val) {
	_val = _val === undefined ? true : _val;
	if(_val) {
		$('.load-modal').css('display', 'flex');
	}else {
		$('.load-modal').css('display', '');
	}
}

function activeBetResultModal(_val, _param, _status) {
	_val = _val === undefined ? true : _val;

	clearBetResultData();
	if(_val) {
		$('.bet-result-modal').attr('data-status', _param["Status"]);
		if(_status == 1) {
			$('.bet-result-top-section .info').html(_param["txtBillId"]);
    		$('.bet-result-top-section .lesson').html(_param["txtLastLot"]);
    		$('.bet-result-top-section .datetime').html(_param["txtDateTime"]);
    		
    		if(_param["UName"].length > 0 && _param["UBill"].length > 0) {
    			$('.bet-result-top-section .uname').html(_param["UName"] + "    " + _param["UBill"] + " ");  
    		}
		
    		$('.bet-result-top-section .branch').html(_param["txtBranch"]);
    		$('.bet-result-top-section .saler').html(_param["txtUser"]);
    		$('.bet-result-summary').html(_param["txtTotal"]);

    		$.each(_param["data"], function(index, val) {
            	$('<div/>', {
            	   name: this["status"],
            	   class: this["status"] == '1' ? 'success' : 'fail',
            	   html: this["txt"],
            	}).appendTo('.bet-result-modal .bet-result-list');
        	});
		}else {
    		$('.bet-result-top-section').css('display', 'none');

    		$.each(_param["Msg"], function(index, val) {
				$('<div/>', {
               		name: this["status"],
               		class: 'fail',
               		html: val,
            	}).appendTo('.bet-result-modal .bet-result-list');
			});
		}

		$('.bet-result-modal').css('display', 'block');
		if(_status == 1) {
			$('a#btnSaveBill').show();
        	$('#invisible_form').trigger('submit')
		}
        
	}else {
		$('.bet-result-modal').css('display', '');
		$('.bet-result-modal').removeAttr('data-status');
		clearBetResultForm();
	}
}

//Clear bet result data on page
function clearBetResultData() {
	$('.bet-result-top-section .info').html('');
    $('.bet-result-top-section .lesson').html('');
    $('.bet-result-top-section .datetime').html('');
    $('.bet-result-top-section .uname').html('');  
    $('.bet-result-top-section .branch').html('');
    $('.bet-result-top-section .saler').html('');
    $('.bet-result-list').html('');
    $('.bet-result-summary').html('');
    $('.bet-result-top-section').css('display', '');

    $('#m-bill').html('');
	$('#m-bill').css('display', '');
	$('a#btnSaveBill').attr('href', '#');
	$('a#btnSaveBill').removeAttr('download');
	$('a#btnSaveBill').hide();
	$('#bill-img img').attr("src",'');
}

//Clear bet result form data
function clearBetResultForm() {
	$('#bill_status').val('');
	$('#bill_bid').val('');
    $('#bill_info').val('');
    $('#bill_lesson').val('');
    $('#bill_datetime').val('');
    $('#bill_uname').val('');
    $('#bill_poy').val('');
    $('#bill_saler').val('');
    $('#bill_branch').val('');
    $('#bill_list').val('');
    $('#bill_total').val('');
    $('#bill_msg').val('');
}


function activePlaylistModal(_val, _bid, _data) {
	_val = _val === undefined ? true : _val;
	
	//Clear old data
	$('.playlist-title').html('');
	$('.playlist-table table').html('');

	if(_val) {
		
		$('.playlist-title').html(lang_data["detail_bill"] + ' ' + _bid);

		$('.playlist-table table').append('<tr><th>' + lang_data["num"] + '</th><th>' + lang_data["num"] + '</th><th>' + lang_data["price"] + '</th></tr>')
		$('.playlist-table table').append(_data);

		$('.playlist-modal').css('display', 'block');
	}else {
		$('.playlist-modal').css('display', '');
	}
}


