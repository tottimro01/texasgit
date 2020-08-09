var firstload = true;
$(function() {
	$("#datepicker").slideUp("0");
	$('#datepicker').datepicker({ 
 			onSelect: function(value, date) { 
    		$("#datepicker").slideUp("fast");
        $('#button-calendar .date-txt').html(convertDate(value));
        getBingo(1, value);
    	},
    	maxDate: 0,
    	defaultDate: 0,
    	dateFormat: "dd-mm-yy",
 	});
});

function convertDate(_date, _short) {
	_date = _date.split("-");	
	if(_short===true) {
		_date = _date[0] + " " + lang_data_month["short"][parseInt(_date[1])] + " " + _date[2];
	}else {
		_date = _date[0] + " " + lang_data_month["full"][parseInt(_date[1])] + " " + _date[2];
	}
	return _date;
}

function setCalendarButtonTxt(_d) {
  $('#button-calendar .date-txt').html(_d);
}

function getBingo(type, data) {
  let url = type===1 ? "function/get_bingo_by_date.php" : "function/get_bingo_by_type.php"; 
  $.ajax({
      url: url,
      type: 'POST',
      dataType: 'html',
      data: { param: data },
      cache: false,
      timeout: 30000,
      beforeSend: function() {
        activeLoadModal(true);
        $('#button-calendar').attr('disabled', 'disabled');
      },
    })
    .always(function(data, status, xhr) {
      if(status == 'success') {
        if(type===1) {
          $('#bingo-date').html("");
          $('#bingo-date').html(data);
        } else {
          $('#bingo-type').html("");
          $('#bingo-type').html(data);
        }
      }
      if(firstload===false) {
        activeLoadModal(false);
      }else {
        firstload = false;
      }
      $('#button-calendar').removeAttr('disabled');
    });
}