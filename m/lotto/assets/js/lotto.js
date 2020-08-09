function CleanLottoNum(val){
	return val.replace(/[^0-9\.]/g, '');
}

function manageFormData(form){
	var lottype = form.dataset.lottype;
	var input_html = '<div id="hiddehForm">';

	if(lottype == 'extra'){ // พิเศษ
		var stype = $(form).find('input[name="select_s"]:checked').val();
		var txt = "";
		var txtr = [];
		switch (stype) {
			case "1":
				var row_length = 10;
				var pfIp = "s1_";
				for(var i=1; i<=row_length; i++)
				{
					var num = CleanLottoNum(form[pfIp+'num_'+i].value);
					var price = CleanLottoNum(form[pfIp+'price_'+i].value);
					if(num != "" && price != ""){
						txtr.push(num+"-"+price+"-12");
					}
				}
				break;
			case "2":
				var row_length = 10;
				var pfIp = "s2_";
				for(var i=1; i<=row_length; i++)
				{
					var num = CleanLottoNum(form[pfIp+'num_'+i].value);
					var price = CleanLottoNum(form[pfIp+'price_'+i].value);
					if(num != "" && price != ""){
						txtr.push(num+"-"+price+"-11");
					}
				}
				break;
			case "3":
				var row_length = 10;
				var pfIp = "s3_";
				for(var i=1; i<=row_length; i++)
				{
					var num = CleanLottoNum(form[pfIp+'num_'+i].value);
					var top = CleanLottoNum(form[pfIp+'top_'+i].value);
					var down = CleanLottoNum(form[pfIp+'down_'+i].value);
					if((num != "" && top != "") || (num != "" && down != "")){
						txtr.push(num+"-0-13-"+top+"-"+down);
					}
				}
				break;
			case "4":
				var n_type = "0";
				// 6 กลับ
				var n = $('#6turn_num').val();
				var t = $('#6turn_top').val();
				var d = $('#6turn_down').val();
				var f = $('#6turn_front').val();
					t = typeof t == 'undefined' ? "" : t;
					d = typeof d == 'undefined' ? "" : d;
					f = typeof f == 'undefined' ? "" : f;
				if(typeof n != 'undefined' && (n != "" && (t != "" || d != "" || f != ""))){
					txtr.push(n+"-0-14-"+t+"-"+d+"-"+f);
				}

				// เลขพี่น้อง
				var t = $('#nearby_top').val();
				var d = $('#nearby_down').val();

				if(typeof t != 'undefined' && t != ""){ // บน
					txtr.push("0-"+n_type+"-15-"+t+"-0-0");
				}

				if(typeof d != 'undefined' && d != ""){ // ล่าง
					txtr.push("0-"+n_type+"-16-"+d+"-0-0");
				}

				// เลขเบิ้ล
				var t = $('#double_top').val();
				var d = $('#double_down').val();

				if(typeof t != 'undefined' && t != ""){ // บน
					txtr.push("0-"+n_type+"-17-"+t+"-0-0");
				}

				if(typeof d != 'undefined' && d != ""){ // ล่าง
					txtr.push("0-"+n_type+"-18-"+d+"-0-0");
				}

				// 1 ตัวบน สูง ต่ำ
				var n = $('input[name="1fud"]:checked').val() == 1 ? "H" : "L";
				var m = $('#1fud_num').val();
				if(typeof m != 'undefined' && m != ""){
					txtr.push(n+"-"+m+"-5");
				}

				// 2 ตัวบน สูง ต่ำ
				var n = $('input[name="2fud"]:checked').val() == 1 ? "H" : "L";
				var m = $('#2fud_num').val();
				if(typeof m != 'undefined' && m != ""){
					txtr.push(n+"-"+m+"-6");
				}

				// 3 ตัวบน สูง ต่ำ
				var n = $('input[name="3fud"]:checked').val() == 1 ? "H" : "L";
				var m = $('#3fud_num').val();
				if(typeof m != 'undefined' && m != ""){
					txtr.push(n+"-"+m+"-7");
				}

				// 2 ตัวล่าง สูง ต่ำ
				var n = $('input[name="2dud"]:checked').val() == 1 ? "H" : "L";
				var m = $('#2dud_num').val();
				if(typeof m != 'undefined' && m != ""){
					txtr.push(n+"-"+m+"-8");
				}

				// คู่ คี่
				var n = $('input[name="oe"]:checked').val() == 1 ? "E" : "K";
				var m = $('#oe_num').val();
				if(typeof m != 'undefined' && m != ""){
					txtr.push(n+"-"+m+"-9");
				}

				// ปักหลัก หน่วย
				var v = $('select[id="digit_one"]').val();
				var m = $('#digit_one_num').val();
				if(typeof m != 'undefined' && v != -1 && m != ""){
					txtr.push(v+"-"+m+"-2");
				}

				// ปักหลัก สิบ
				var v = $('select[id="digit_two"]').val();
				var m = $('#digit_two_num').val();
				if(typeof m != 'undefined' && v != -1 && m != ""){
					txtr.push(v+"-"+m+"-3");
				}

				// ปักหลัก ร้อย
				var v = $('select[id="digit_three"]').val();
				var m = $('#digit_three_num').val();
				if(typeof m != 'undefined' && v != -1 && m != ""){
					txtr.push(v+"-"+m+"-4");
				}
				
				break;
			default:
				// statements_def
				break;
		}
		if(txtr.length == 0){
			errorDialog(LNG_ERROR, LNG_PLEASE_FILL_DATA);
			$(form).addClass('preventSubmit')
			return;
		}
		var txt = "(" + txtr.join(",") + ")";
		input_html +="<input type=\"hidden\" name=\"txt\" value=\""+txt+"\">";
	} 
	else if(lottype == 'laoset'){ //
		var chkEmpty = true;
		var row_length = form.totalRows.value;
		for(var i=1; i<=row_length; i++)
		{
			var num = CleanLottoNum(form['num_'+i].value);
			if(num != "")
			{
				chkEmpty = false;
				var val = num;
				input_html +="<input type=\"hidden\" name=\"lotto[]\" value=\""+val+"\">";
			}
		}
		if(chkEmpty == true){
			errorDialog(LNG_ERROR, LNG_PLEASE_FILL_DATA);
			$(form).addClass('preventSubmit')
			return;
		}
	}
	else // แทงด่วน
	{
		var pfIp = "";
		if(lottype == "t2"){
			pfIp = "2_";
		}else if(lottype == "t3"){
			pfIp = "front_";
		}
		var row_length = form.totalRows.value;
		chkEmpty = true;
		for(var i=1; i<=row_length; i++)
		{
			// console.log(pfIp+'num_'+i)
			var num = CleanLottoNum(form['num_'+i].value);
			var up = CleanLottoNum(form[pfIp+'up_'+i].value);
			var down = CleanLottoNum(form[pfIp+'down_'+i].value);
			var toot = CleanLottoNum(form[pfIp+'toot_'+i].value);

			if(num != "")
			{
				chkEmpty = false;
				var val = num+","+up+","+toot+","+down;
				input_html +="<input type=\"hidden\" name=\"lotto[]\" value=\""+val+"\">";
			}
		}
		if(chkEmpty == true){
			errorDialog(LNG_ERROR, LNG_PLEASE_FILL_DATA);
			$(form).addClass('preventSubmit')
			return;
		}
	}
	

	input_html+="</div>";
	$(form).find('fieldset').append(input_html);
}

function manageFormDataExtra(form){

}

function SaveLottoSuccess(form, data){
	// console.log(data);
	if(data.status == 1){
		ResetLottoForm(form);
	}else{
		var x = document.getElementById("tang_no_audio");
		if(!isPlaying(x) && GetIsMute() == 1){
 			x.play();
		}
	}

	data.output = "view";
	var tmplId = data.status == 1 ? "#tmpl_lotto_bill" : "#tmpl_lotto_bill_fail";
	var tmpl = $.templates(tmplId);
	var html = tmpl.render(data);
	$('#bill-view').html(html);
	$('#bill-view').show();

	data.output = "image";
	// tmpl = $.templates("#tmpl_lotto_bill");
	html = tmpl.render(data);
	$('#bill-image-template').html(html);
	$('#bill-image-template').show();

	html2canvas(document.getElementById('bill-image-template')).then(function(canvas){
		canvas.id = "bill-canvas";
		canvas.dataset.bid = data.result.bill_id;
		$('#bill-image').append(canvas);
		$('#bill-image-template').html("");
		$('#bill-image-template').hide();
	});
	// var queryParam = getQueryVariable('cmd');
	// OnSelectPage(queryParam);
}

function SaveLottoFail(form, error){
	// console.log(error);
	
}

function removeHiddenInput(form)
{
	$(form).find('fieldset').children('#hiddehForm').remove();
}

function ClearViewBill(){
	var v = document.getElementById('bill-view');
	v.style.display = "none"; 
	v.innerHTML = "";
	document.getElementById('bill-canvas').remove();
}

function DownloadBill(){
	var canvas = document.getElementById('bill-canvas');
	var bid = canvas.dataset.bid;
	var link = document.createElement('a');
	link.id = 'download-bill-link';
	link.download = bid+'.png';
	link.href = canvas.toDataURL();
	document.body.append(link);
	link.click();
	link.remove();
}

function ResetLottoForm(e){
	e.reset();
	var d = $(e).find('button:disabled.disable-by-chk-activator, button:disabled.disable-by-lotnum, button:disabled.disable-by-chk-turn, input:disabled.disable-by-chk-activator, input:disabled.disable-by-lotnum, input:disabled.disable-by-chk-turn');
	$(d).removeAttr('disabled');
}

$(document).on('click', '.btn-copy-num', function(event) {
	event.preventDefault();
	var ref = $(this).data('copy-num-ref');
	var inputVal = $('.copy-num-'+ref).first().val();
	if(inputVal != ""){
		$('.copy-num-'+ref).val(inputVal);
	}
});

$(document).on('click', '.btn-cross-num', function(event) {
	event.preventDefault();
	var ref = $(this).data('cross-num-ref');
	var inputSelector = '.cross-num-'+ref;
	var inputVal = $(inputSelector).first().val();
	if(inputVal != ""){
		var result = fnumcross(inputVal);
		var i = 0;
		$.each($(inputSelector), function(index, e) {
		 	$(e).val(result[i]);
		 	$(e).trigger('input');
		 	i++;
		});
	}
});

$(document).on('change', '.chk-activator', function(event) {
	event.preventDefault();
	var se = $(this).data('chk-selector');
	var tg = $(this).data('chk-target');
	var selector = (se=="id" ? '#' : '.')+tg;
	if($(this).is(':checked')){
		$(selector).removeAttr('disabled');
		$(selector).removeClass('disable-by-chk-activator');
		$(selector+'.disable-by-chk-turn').attr('disabled', 'disabled'); // ถ้าแถวไหนเช็คกลับ ให้ปิดต่อไป	
		$(selector+'.disable-by-lotnum').attr('disabled', 'disabled'); // ถ้าแถวไหนเช็คกลับ ให้ปิดต่อไป	
	}else{
		$(selector).attr('disabled', 'disabled');
		$(selector).addClass('disable-by-chk-activator');
		$('input'+selector).val('');
	}
});

$(document).on('change', '.chk-turn', function(event) {
	event.preventDefault();
	var tg = $(this).data('row-num');
	var selector = '.toot_'+tg+',.2_toot_'+tg+',.front_toot_'+tg;
	if($(this).is(':checked')){
		$(selector).attr('disabled', 'disabled');
		$(selector).addClass('disable-by-chk-turn');
		$('input'+selector).val('');
	}else{
		if(!$(selector).hasClass('disable-by-chk-activator') && !$(selector).hasClass('disable-by-lotnum')){ // ถ้าปิดคอลัมน์อยู่ก็ให้ปิดต่อไป
			$(selector).removeAttr('disabled');
		}
		$(selector).removeClass('disable-by-chk-turn');
	}
});

$(document).on('input', 'input.lotnum', function(event){
	event.preventDefault();
	var id = $(this).prop('id');
	var r = id.split("_");
	var ref = r[1];
	var val = $(this).val();
	var isDis = ($(this).data('disnum').toString() == "true");
	var lot = $(this).data('lot');
	if(isDis){
		var l = val.length;
		var strToot = 'input#toot_'+ref+',input#2_toot_'+ref+',input#front_toot_'+ref;
		var strDown = 'input#down_'+ref+',input#2_down_'+ref+',input#front_down_'+ref;
		if(!$(strToot).hasClass('disable-by-chk-activator') && !$(strToot).hasClass('disable-by-chk-turn')){
			$(strToot).removeAttr('disabled');
		}
		$(strToot).removeClass('disable-by-lotnum');

		if(!$(strDown).hasClass('disable-by-chk-activator') && !$(strDown).hasClass('disable-by-chk-turn')){
			$(strDown).removeAttr('disabled');
		}
		$(strDown).removeClass('disable-by-lotnum');
		
		if(lot == "front"){
			if(l > 0 && l <= 2){
				$(strToot).attr('disabled', 'disabled');
				$(strToot).addClass('disable-by-lotnum');
				$(strToot).val('');

				$(strDown).attr('disabled', 'disabled');
				$(strDown).addClass('disable-by-lotnum');
				$(strDown).val('');
			}
		}else{
			if(l > 0 && l <= 2){
				$(strToot).attr('disabled', 'disabled');
				$(strToot).addClass('disable-by-lotnum');
				$(strToot).val('');
			}else if(l >= 3){
				$(strDown).attr('disabled', 'disabled');
				$(strDown).addClass('disable-by-lotnum');
				$(strDown).val('');
			}
		}
	}
});

function fnumcross(fnum) {
    var org_vu  = [];  
    var u       = {};
    var a       = [];
    var txtv0   = fnum.substr(0,1);   
    var txtv1   = fnum.substr(1,1);
    var txtv2   = fnum.substr(2,1);
    var txtv3   = fnum.substr(3,1);
    var val = [];
    org_vu[0] = fnum;
    org_vu[1]    = txtv0+txtv1+txtv3+txtv2;
    org_vu[2]    = txtv0+txtv2+txtv1+txtv3;
    org_vu[3]    = txtv0+txtv2+txtv3+txtv1;
    org_vu[4]    = txtv0+txtv3+txtv1+txtv2;
    org_vu[5]    = txtv0+txtv3+txtv2+txtv1;
    
    org_vu[6]    = txtv1+txtv0+txtv2+txtv3;
    org_vu[7]    = txtv1+txtv0+txtv3+txtv2;
    org_vu[8]    = txtv1+txtv2+txtv0+txtv3;
    org_vu[9]    = txtv1+txtv2+txtv3+txtv0;
    org_vu[10]    = txtv1+txtv3+txtv0+txtv2;
	org_vu[11]    = txtv1+txtv3+txtv2+txtv0;
    
    org_vu[12]    = txtv2+txtv0+txtv1+txtv3;
    org_vu[13]    = txtv2+txtv0+txtv3+txtv1;
    org_vu[14]    = txtv2+txtv1+txtv0+txtv3;
    org_vu[15]    = txtv2+txtv1+txtv3+txtv0;
    org_vu[16]    = txtv2+txtv3+txtv0+txtv1;
	org_vu[17]    = txtv2+txtv3+txtv1+txtv0;
    
    org_vu[18]    = txtv3+txtv0+txtv1+txtv2;
    org_vu[19]    = txtv3+txtv0+txtv2+txtv1;
    org_vu[20]    = txtv3+txtv1+txtv0+txtv2;
    org_vu[21]    = txtv3+txtv1+txtv2+txtv0;
    org_vu[22]    = txtv3+txtv2+txtv0+txtv1;
	org_vu[23]    = txtv3+txtv2+txtv1+txtv0;

    
    for(var i = 0, l = org_vu.length; i < l; ++i){
        if(u.hasOwnProperty(org_vu[i])) {
          	continue;
        }
        a.push(org_vu[i]);
        u[org_vu[i]] = 1;
    }

    return a;
}

var isMute = GetIsMute(); // 0 = mute
function GetIsMute(){
	var m = $.cookie('m_lotto_mute');
    if(typeof m == 'undefined'){
        m = 1;
        SetIsMute(m);
    }
    return m;
}

function SetIsMute(val){
	var m = val == 1 ? 1 : 0;
    $.cookie('m_lotto_mute', m, { expires: 30, path: '/' });
    if(m == 0){
    	var x = document.getElementById("tang_no_audio");
    	x.currentTime = 0
		if(isPlaying(x)){
 			x.pause();
		}
    }
}

function SetIsMuteTrigger(e){
	var m = e.checked === true ? 1 : 0;
	SetIsMute(m);
}

function isPlaying(audelem) {
   return!audelem.paused;
}