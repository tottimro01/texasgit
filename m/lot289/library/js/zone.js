$(document).ready(function($) {
    $.ajax({
        url: 'function/get_lotto_zone.php',
        type: 'post',
        dataType: 'html',
        cache: false,
        beforeSend: activeLoadModal,
        data: {url: z_url}
    })
    .done(function(data,status,xhr) {
        $('#zone').html(data);
    })
    .fail(function() { })
    .always(function() {
        activeLoadModal(false);
    });
});

function countdown_time(key, time_id, now, end) {
    var date_now = new Date(now*1000);
    var date_end = new Date(end*1000);
    var time_left = (date_end - date_now)-1000;

    var countdown = setInterval(function(){
    	let seconds = Math.floor((time_left)/1000);
    	let minutes = Math.floor(seconds/60);
    	let hours = Math.floor(minutes/60);
    	let days = Math.floor(hours/24);
    	
    	hours = hours-(days*24);
    	minutes = minutes-(days*24*60)-(hours*60);
    	seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

    	let _d = days > 0 ? ConTo2Digit(days)+' '+lang_data["day"]+' ' : "";
    	let time = _d+ConTo2Digit(hours)+' : '+ConTo2Digit(minutes)+' : '+ConTo2Digit(seconds);
    	$('#'+time_id).html(time)
    	time_left = time_left - 1000;

    	if(time_left < 0) {
    	  	clearInterval(countdown);
    	  	$('#'+key).addClass('dis');
    	  	$('#'+key).removeAttr('onclick');
    	  	$('#'+time_id).html('<span style="color: #e01a1a;">'+lang_data["close_bet"]+'</span>')
    	}
    }, 1000);
}

function ConTo2Digit(val) {
  	val = ("0" + val).slice(-2);
  	return val;
}

function SelectLottoZone(zone, rob) {
	$('#fzone').val(zone);
	$('#frob').val(rob);
	$('#zform').submit();
}

function Select24HrZone(file) {
	$('#o_file').val(file);
	$('#_24form').submit();
}