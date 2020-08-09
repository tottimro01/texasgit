$(document).ready(function($) {
	$('#form-login').on('submit', function(event) {
		event.preventDefault();
		let uname = $('#uname').val();
		let pass = $('#pwd').val();
		let divice = 'm';

		if($.trim(uname).length < 1 || $.trim(pass).length < 1) {
			activeMessageModal(true, lang_data["fail"], lang_data["alert_insert_login"], lang_data['ok']);
			return;
		}
		
		//remove @server from username
		if (uname.indexOf('@') > 0) {
			let uname_split = uname.split("@");
			uname = uname_split[0];
		}

		$.ajax({
			url: base_url + 'function/checkLogin.php',
			type: 'post',
			dataType: 'json',
			data: {Username: uname, Password: pass, Device: 'm', UID: '', UUID: ''},
			cache: false,
			beforeSend: activeLoadModal,
		})
		.always(function(data, status, xhr) {
			if(status == 'success') {
				// if(data["Status"] == '1' && data["rid1"]=='1') {
				if(data["Status"] == '1') {
					// console.log(data)
					window.location.replace(base_url);
				}else {
					activeLoadModal(false);
					activeMessageModal(true, lang_data["fail"], lang_data["user_incorrect"], lang_data['ok']);
				}
			}else {
				activeLoadModal(false);
				activeMessageModal(true, lang_data["fail"], lang_data["fail"], lang_data['ok']);
			}
		});
	});
});