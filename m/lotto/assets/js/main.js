$(document).ready(function($) {
	var queryParam = getQueryVariable('cmd')===false ? 'result' : getQueryVariable('cmd');
	OnSelectPage(queryParam);
	UpdateUserCredit();
});

function OnSelectPage(_cmd){
	$('#side-nav-toggle').prop('checked', false);
	$('#side-nav-toggle').trigger('change');

	var cmdForm = document.getElementById('FormQueryPage');
	cmdForm.cmd.value = _cmd;
	$(cmdForm).trigger('submit');	
}

function renderPageContent(form, data){
	$('#content').html(data);
	var active = form.cmd.value;
	$('.i-nav.active').removeClass('active');
	$('.i-nav.'+active).addClass('active');
	console.log(active)
	window.history.pushState(active, 'SC', '/lotto/index.php?cmd='+active);
}

function UpdateUserCredit(){
	if(!$('body').hasClass('onUpdateCredit')){
		$('#form_credit').trigger('submit');
	}
}
function UpdateUserCreditCallback(form, data){
	$('#betcre').html(data.betcre);
	$('#cre').html(data.cre);
	$('#wincre').html(data.wincre);
	$('.txt-currency').html(data.currency);
}

function UpdateUserCreditBegin(){
	$('body').addClass('onUpdateCredit');
}

function UpdateUserCreditEnd(){
	$('body').removeClass('onUpdateCredit');
}