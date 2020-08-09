$(document).ready(function($) {
	//update user credit on click
	$('.sidenav').on('click', '.sidenav-top-menu img', function(event) {
		event.preventDefault();
		updateCredit();
	});

	var OnKeyboard = false;
	$('input').focus(function(event) { OnKeyboard = true; });    
	
	$('input').blur(function(event) { OnKeyboard = false; }); 

	$(window).on('resize', function(event) {
  		event.preventDefault();
  		if(!OnKeyboard) {
  			let initialHeight = $('body').height();//gives current height in pixels! We save it for later comparisons
  			let topMenuHeight = $('#top-menu').height();
  			let bottomMenuHeight = $('#bottom-menu').height();
  			let unfinisLinkHeight =  $('#unfinish-link').length > 0 ? $('#unfinish-link').height() + 4 : 0;
  			$('#lotto-content').css('height', initialHeight - (topMenuHeight + bottomMenuHeight + unfinisLinkHeight));
  		}
	});

	// setInterval(updateLogin, 10000);
	$(window).on('orientationchange', function(event) {
  		$('input').blur();
	});

	$(document).on('click', '.main-cover', function(event) {
		event.preventDefault();
		openSideNav('.hamburger');
	});

	//Change password
	$('#changepass-form').on('submit', function(event) {
		event.preventDefault();

		let _oldPass = $.trim($('#txt_old_pwd').val());
		let _newPass = $.trim($('#txt_new_pwd').val());
		let _conPass = $.trim($('#txt_con_pwd').val());

		if(_oldPass.length == 0 || _newPass.length == 0 || _conPass.length == 0) {
			activeMessageModal(true, lang_data["fail"], lang_data["enter_data_all"], lang_data["ok"]);
			return;
		}

		let _url = base_url + 'function/ChangePass.php'
		$.ajax({
			url: _url,
			type: 'POST',
			dataType: 'json',
			data: {pass: _newPass, cpass: _conPass, opass: _oldPass},
			beforeSend: activeLoadModal,
		})
		.always(function(data, status, xhr) {
			if(status == 'success') {
				if(data['Status'] == '1') {
					$('input[type="password"]').val('');
					activeMessageModal(true, lang_data["success"], lang_data["change_success"], lang_data["ok"]);

				}else if(data['Status'] == '0') {
					activeMessageModal(true, lang_data["fail"], data['Msg'], lang_data["ok"]);
				}
			}
			activeLoadModal(false);
		});		
	});

	$(window).trigger('resize');
});

var isSessionExpire = false;
function updateLogin() {
	if(!isSessionExpire) {
		$.ajax({
			url: base_url + 'function/updateLogin.php',
			type: 'GET',
			dataType: 'json',
			timeout: 10000,
		})
		.always(function(data,status,xhr) {
			if(status == 'success') {
				if(data["Status"] == '0') {
					alert("Session expire!");
					isSessionExpire = true;
					window.location.href = base_url + 'function/checkLogout.php';
				}
			}
		});
	}
}

function openSideNav(_element) {
	_active = $(_element).attr('data-active');
	if(_active == "y") {
		// $('body').css('overflowX', 'hidden');
		$('#side-menu').addClass('sidenav-transform');
 		$('#main').addClass('main-content-transform');
		$(_element).attr('data-active', 'n');
		$('.hamburger').addClass('change');
		setTimeout(function() {
 			$('#main').addClass('main-cover');
 		}, 500);
	}else if(_active == "n") {
		// $('body').css('overflowX', '');
		$('#side-menu').removeClass('sidenav-transform');
 		$('#main').removeClass('main-content-transform');
		$(_element).attr('data-active', 'y');
		$('.hamburger').removeClass('change');
 		$('#main').removeClass('main-cover');
	}
}

function checkLogout() {
	activeMessageModal(true, lang_data["menu_logout"], lang_data["Confirm_logout"], lang_data["cancel"]);
	$('<a/>', {
         href: 	base_url + "function/checkLogout.php",
         class: 'message-button logout',
         text:  lang_data["ok"],
     }).appendTo('.message-button-wrapper');
}

function updateCredit() {
	let _img = $('.sidenav-top-menu img');
	let ajaxTime = 0;

	$.ajax({
		url: base_url + 'function/update_user_data.php',
		type: 'POST',
		dataType: 'json',
		timeout: 10000,
		beforeSend: function() {
			$(_img).addClass('spin');
			ajaxTime = new Date().getTime();
		}
	})
	.always(function(data, status, xhr) {
		if(status == 'success') {
			$('#user-credit').children('div[name="value"]').html($.number(data["MemberCradit"],2));
			$('#user-play').children('div[name="value"]').html($.number(data["MemberCraditOld"],2));
			$('#user-get-credit').children('div[name="value"]').html($.number(data["MemberCraditAcp"],2));
		}
		
		// delay stop spinning refresh icon for smooth animation
		let responseTime = new Date().getTime() - ajaxTime;
		let remainTime = responseTime%1000;
		let delayTime = 0;
		if(remainTime!=0) {
			delayTime = 1000 - remainTime;
		}
		setTimeout(function(){ $(_img).removeClass('spin'); }, delayTime);
	});
}

//ดึงค่า GET จาก url
function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}

function setLang(lg) {
	$.cookie("lang", lg, { expires : 365, path: "/", });
	window.location.reload();
}

function closeWelcomeAlert(){
	$('.walcome-alert-wrapper').remove();
}