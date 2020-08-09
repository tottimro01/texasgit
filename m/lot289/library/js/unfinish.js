var timer = 10;
var onLoadData = true;
$(document).ready(function($) {

	$('#unfinish-list').on('change', 'input[type="checkbox"][name="check-all-unfinish"]', function(event) {
		event.preventDefault();
		let id = $(this).attr('data-billid')
		let checked = $(this).is(':checked');
		let single_checkbox = $('input[type="checkbox"][name="check-unfinish"][data-bid="' + id + '"]');
		if(checked) {
			$(single_checkbox).prop('checked', true);
		}else {
			$(single_checkbox).prop('checked', false);
		}
	});

	$('#unfinish-list').on('change', 'input[type="checkbox"][name="check-unfinish"]', function(event) {
		event.preventDefault();
		let id = $(this).attr('data-bid')
		let checked = $(this).is(':checked');
		let all_checkbox = $('input[type="checkbox"][name="check-all-unfinish"][data-billid="' + id + '"]');
		if(!checked) {
			$(all_checkbox).prop('checked', false);
		}
	});

	$('#unfinish-list').on('click', '.accept-pay-btn', function(event) {
		event.preventDefault();
		let bid = $(this).attr('data-bid');
		// console.log(bid)
		let _checkbox = $('input[type="checkbox"][name="check-unfinish"][data-bid="' + bid + '"]');
		let _chkList = '';
		$.each(_checkbox, function(index, val) {
			if($(_checkbox[index]).is(':checked')) {
				_chkList += $(_checkbox[index]).attr('data-cid') + ',';
			}
		});

		if($.trim(_chkList).length == 0) {
     		activeMessageModal(true, lang_data["fail"], lang_data["alert_input_data"], lang_data["ok"])
     		return;
  		}

  		//remove last comma 
  		_chkList = _chkList.replace(/\,$/, '');

		let _pname = $('table[data-billid="' + bid + '"]').attr('data-pname');
		let _pid = $('table[data-billid="' + bid + '"]').attr('data-pid');
		$.ajax({
			url: base_url + 'function/save_unfinish.php',
			type: 'POST',
			dataType: 'json',
			data: {pname: _pname, pid: _pid, chklist: _chkList},
  			beforeSend: activeLoadModal,
		})
		.always(function(data, status, xhr) {
			if(status == 'success') {
				clearBetResultForm();
     			//แทงสำเร็จ
     			if(data['Status'] == 1) {
     			       let param = {  "Status": data["Status"],
     			                  "Licen": data["Licen"],
     			                  "BillID": data["BillID"],
     			                  "LastLot": data["LastLot"],
     			                  "CloseBig": data["CloseBig"],
     			                  "CloseSmall": data["CloseSmall"],
     			                  "txtBillId": data["txtBillId"],
     			                  "txtLastLot": data["txtLastLot"],
     			                  "txtDateTime": data["txtDateTime"],
     			                  "txtBranch": data["txtBranch"],
     			                  "txtUser": data["txtUser"],
     			                  "txtTotal": data["txtTotal"],
     			                  "data": data["data"],
     			                  "Msg": data["Msg"],
     			                  "UName": _pname,
     			                  "UBill": _pid,
     			               }
		
     			   $('#bill_status').val(data["Status"]);
     			   $('#bill_bid').val(data["BillID"]);
     			   $('#bill_info').val(data["txtBillId"]);
     			   $('#bill_lesson').val(data["txtLastLot"]);
     			   $('#bill_datetime').val(data["txtDateTime"]);
     			   $('#bill_uname').val(_pname);
     			   $('#bill_poy').val(_pid);
     			   $('#bill_saler').val(data["txtUser"]);
     			   $('#bill_branch').val(data["txtBranch"]);
     			   $('#bill_list').val(JSON.stringify(data["data"]));
     			   $('#bill_total').val(data["txtTotal"]);
     			   $('#bill_msg').val(data["Msg"]);
		
     			   //open result modal
     			   activeBetResultModal(true, param, 1);
		
     			   //refresh lotto form
     			   $('.lotto-refresh').trigger('click');
     			   updateCredit();
     			}else {
		
     			   let param = {  "Status": data["Status"],
     			                  "Licen": data["Licen"],
     			                  "BillID": data["BillID"],
     			                  "LastLot": data["LastLot"],
     			                  "CloseBig": data["CloseBig"],
     			                  "CloseSmall": data["CloseSmall"],
     			                  "data": data["data"],
     			                  "Msg": data["Msg"].split('\n'),
     			               }
		
     			   $('#bill_status').val(data["Status"]);
     			   $('#bill_bid').val('');
     			   $('#bill_info').val('');
     			   $('#bill_lesson').val(data["txtLastLot"]);
     			   $('#bill_datetime').val('');
     			   $('#bill_uname').val('');
     			   $('#bill_poy').val('');
     			   $('#bill_saler').val('');
     			   $('#bill_branch').val('');
     			   $('#bill_list').val(JSON.stringify(data["data"]));
     			   $('#bill_total').val('');
     			   $('#bill_msg').val(data["Msg"]);

        			activeBetResultModal(true, param, 0);
       			
        			if($.cookie('sound') == 1) {
        			   createjs.Sound.play("x");
        			}
     			}

			}
		activeLoadModal(false)
		});
		
	});

	getUnfinishBetData();
	setInterval(function() {
		if(onLoadData === false) {
			if(timer < 0) {
				getUnfinishBetData();
				onLoadData = true;
			}else {
				$('#countdown-time').html(timer);
				timer -= 1;
			}
		}
	}, 1000)
});

function getUnfinishBetData() {
	$.ajax({
		url: 'function/unfinish.php',
		type: 'GET',
		dataType: 'html',
		beforeSend: activeLoadModal,
		timeout: 10000,
	})
	.always(function(data,status,xhr) {
		if(status == 'success'){
			$('#unfinish-list').html(data)
		}
		activeLoadModal(false);
		onLoadData = false;
		timer = 10;
	});
	
}