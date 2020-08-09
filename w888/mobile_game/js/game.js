var _bet_id;
var _mid;
var min_bet_ary;
var max_bet_ary;
var this_bet; 
var bet_stack = 0;
var bet_stackAry = [];
var _pay = 0;
var is_timeOut_bet1; 
var is_timeOut_bet2;
var is_timeOut_bet3;
var is_timeOut_bet4;
var is_timeOut_bet5;

var _arr_bacarat_pay;
var _arr_color_pay;
var _arr_dragon_pay;
var _arr_fish_pay;
var _arr_hilo_pay;
var _m_games_dis_member;
var _incre;
var _cre;
var _cache;
var _get_bet_list_slug;

var disable_countFake = false;

var lang;

function set_jslang(_lang)
{
	 lang = _lang;
}

function countTime()
{
	var refreshId = setInterval(function() {
	 
	  	$.post("mobile_time.php", {"games":1 },
				  function(data){
					$('#betName span:eq( 1 )').html(data['bet_id']);

					$("#time1 span").html(data['time1']);
					$("#time2 span").html(data['time2']);
					$("#time3 span").html(data['time3']);
					$("#time4 span").html(data['time4']);
					$("#time5 span").html(data['time5']);

					$("#time5a").show();
					$("#time5b").show();
					$("#time5a").html(data['time5a']);
					$("#time5b").html(data['time5b']);
					
					$("#time1a").show();
					$("#time1b").show();
					$("#time1a").html(data['time1a']+' '+data['time1b']);
					$("#time1b").html(data['time1c']+' '+data['time1d']);

					if(data['time1'] > 88){clear_bet_list()}
					if(data['time2'] > 88){clear_bet_list()}
					if(data['time3'] > 88){clear_bet_list()}
					if(data['time4'] > 88){clear_bet_list()}
					if(data['time5'] > 88){clear_bet_list()}

				
					if(data['time1'] >= 80 && data['time1'] <= 90){ getStats_hilo(); }	
					if(data['time2'] >= 80 && data['time2'] <= 90){ getStats_fish(); }	
					if(data['time3'] >= 80 && data['time3'] <= 90){ getStats_2hit(); }	
					if(data['time4'] >= 80 && data['time4'] <= 90){ getStats_dragon(); }	
					if(data['time5'] >= 80 && data['time5'] <= 90){ getStats_bacarat(); }	

					





	  				if(typeof data['time1'] === 'string' || data['time1'] <= 0){is_timeOut_bet1 = true;  clear_bet();}else{is_timeOut_bet1 = false;}
	  				if(typeof data['time2'] === 'string' || data['time2'] <= 0){is_timeOut_bet2 = true;  clear_bet();}else{is_timeOut_bet2 = false;}
	  				if(typeof data['time3'] === 'string' || data['time3'] <= 0){is_timeOut_bet3 = true;  clear_bet();}else{is_timeOut_bet3 = false;}
	  				if(typeof data['time4'] === 'string' || data['time4'] <= 0){is_timeOut_bet4 = true;  clear_bet();}else{is_timeOut_bet4 = false;}
	  				if(typeof data['time5'] === 'string' || data['time5'] <= 0){is_timeOut_bet5 = true;  clear_bet();}else{is_timeOut_bet5 = false;}
	  				
	  				if(this_bet == 1 && is_timeOut_bet1 == true){clear_bet(); slug = 1; triggerBotMenu();}
	  				if(this_bet == 2 && is_timeOut_bet2 == true){clear_bet(); slug = 1; triggerBotMenu();}
	  				if(this_bet == 3 && is_timeOut_bet3 == true){clear_bet(); slug = 1; triggerBotMenu();}
	  				if(this_bet == 4 && is_timeOut_bet4 == true){clear_bet(); slug = 1; triggerBotMenu();}
	  				if(this_bet == 5 && is_timeOut_bet5 == true){clear_bet(); slug = 1; triggerBotMenu();}

	  				if(data['announced']==0){ // เริ่มรอบใหม่
	  					// clear_bet_list(); clear_bet();
	  					$('#bet_price').removeAttr('readonly');
	  				}else if(data['announced']==1){ // หมดเวลา
	  					clear_bet();
	  					$('#bet_price').attr('readonly', 'readonly');
	  				} else if(data['announced']==2){ // หมดเวลา
	  					get_bet_list(1);
	  					$('#bet_price').attr('readonly', 'readonly');
	  					set_credit();

	  				} 

				  }, "json");	  

   }, 1000);
$.ajaxSetup({ cache: false });
}



$('#refresh_credit').on('click',function(){
	$('#refresh_credit').addClass('fa-spin')
	set_credit()
})
// $('#more_credit').on('click',function(){
// 	var m_currency = $('#creditAttributes').attr('data-m_currency');
// 	var mcredit = $('#creditAttributes').attr('data-mcredit');
// 	_alert(lang[115]+" : "+_cre+" <br> "+lang[116]+" : "+_incre+" <br> "+lang[117]+" : "+m_currency+mcredit)
// })


function stats_changeArrow(e)
{
	if($(e).children('i').hasClass("fa-caret-down")) {

	    $(e).children('i').removeClass("fa-caret-down");
	    $(e).children('i').addClass("fa-caret-up");

	}else if($(e).children('i').hasClass("fa-caret-up")) {
		
	    $(e).children('i').removeClass("fa-caret-up");
	    $(e).children('i').addClass("fa-caret-down");
	}
}

function set_credit(){
	set_main_credit();
	// $('#refresh_credit').addClass('fa-spin')
	$.ajax({
		url: 'get_credit.php',
		type: 'POST',
		dataType: 'json',
	})
	.done(function(data) {
		$('#_credit').text('');
		$('#_credit').text(data['cre']);
		_incre = data['incre'];
		_cre   = data['cre'];
		setTimeout(function(){ $('#refresh_credit').removeClass('fa-spin'); }, 300);
	})

	
}


function set_default(ary)
{
	_arr_bacarat_pay 	= ary['arr_bacarat_pay'];
	_arr_color_pay		= ary['arr_color_pay'];
	_arr_dragon_pay		= ary['arr_dragon_pay'];
	_arr_fish_pay		= ary['arr_fish_pay'];
	_arr_hilo_pay		= ary['arr_hilo_pay'];
	_m_games_dis_member	= ary['m_games_dis_member'];
	_cache				= ary['cache'];
	_mid 				= ary['mid'];

	$.ajax({
		url: '../json/config/member/LottoConfig_'+_mid+'.json',
		dataType: 'json',
		async:false,	
	})
	.done(function(data) {
		min_bet_ary = data['m_min'].split(',');
		max_bet_ary = data['m_max'].split(',');
	});
	
	
}




function showBetResult()  // แสดงผล
{
	$('.hideTime span').hide();
	$('.result').show();
}


function get_rob()
{
	id= 1806141556;
	return id;
}

function set_rob()
{
	var bet_id = get_rob();
	$('#betName span:eq( 1 )').text('');
	$('#betName span:eq( 1 )').append('BET ID : '+bet_id+'');
	
}

function triggerBotMenu()
{
	if(slug == 0) //ถ้า bot menu ปิดอยู่ 
	{
		$('.hideBtn').click();
	}
}

function show_betSl(_type,betHtml,g_name,g_pay)
{
	if(_type != '3' && _type != '2')
	{
		$('#bet_select').text('');
	}
	$('#bet_select').append(betHtml);
	$('#betName span:eq( 0 )').text('');
	$('#betName span:eq( 0 )').append(g_name);
	$('#price span').text('');
	$('#price span').append('@'+g_pay+'');

	$('tr.num').children('td:eq(1)').text('');
	$('tr.num').children('td:eq(1)').text(''+parseInt(min_bet_ary[this_bet]).toLocaleString()+' ฿');
	$('tr.num').children('td:eq(2)').text('');
	$('tr.num').children('td:eq(2)').text(''+parseInt(max_bet_ary[this_bet]).toLocaleString()+' ฿');

}

function get_bet_list( _frist = 0)  
{
		if(_frist == 0){_get_bet_list_slug = true;}
		if(_get_bet_list_slug == false){return false}
	
		$.ajax({
			url: 'get_bet_ist.php',
			type: 'POST',
			dataType: 'html',
			// data: {type_list: _type},
		})
		.done(function(data) {
			$('.bet-list-2').text('');
			$('.bet-list-2').append(data);	
		});

		if(_frist == 1){_get_bet_list_slug = false;}
}

function clear_bet(){
	// $('.hideBtn').click();
	$('#bet_select').text('');
	$('#betName span:eq( 0 )').text('');
	$('#betName span:eq( 0 )').append(lang['game'][1]);
	$('#price span').text('#.##');
	$('#bet_price').val('');
	$('tr.num').children('td:eq(0)').text('');
	$('tr.num').children('td:eq(0)').text('0 ฿');
	$('tr.num').children('td:eq(1)').text('');
	$('tr.num').children('td:eq(1)').text('0 ฿');
	$('tr.num').children('td:eq(2)').text('');
	$('tr.num').children('td:eq(2)').text('0 ฿');
	 bet_stack = 0;
	 bet_stackAry = [];
	 $("#bet_price").blur();
	 _pay = 0;
}

function clear_bet_list(){
	$('.bet-list-2').text('');	

}

$('#submit_bet').on('click', function() {
	$("#bet_price").blur();

	if(this_bet == 1 && is_timeOut_bet1 == true){return false;}
	if(this_bet == 2 && is_timeOut_bet2 == true){return false;}
	if(this_bet == 3 && is_timeOut_bet3 == true){return false;}
	if(this_bet == 4 && is_timeOut_bet4 == true){return false;}
	if(this_bet == 5 && is_timeOut_bet5 == true){return false;}



	var price =  $('#bet_price').val();
	if(bet_stackAry == '')
	{
		_alert(lang['game_Msg'][1]) //กรุณาเลือกเดิมพัน
	}
	else if(price == ''  )
	{
		_alert(lang['game_Msg'][2]) //กรุณากรอกราคา
	}else if(price < parseInt(min_bet_ary[this_bet]) )
	{
		_alert(lang['game_Msg'][3]+' '+parseInt(min_bet_ary[this_bet]).toLocaleString())  //ราคาต่ำสุด
	}else if(price > parseInt(max_bet_ary[this_bet]) )
	{
		_alert(lang['game_Msg'][4]+' '+parseInt(max_bet_ary[this_bet]).toLocaleString()) //ราคาสูงสุด
	}else{


									

		var bet = price;
		var l = bet_stackAry.length;
		var type = '';
		
			$.each(bet_stackAry, function( k, v ) {
			  type += v+',';
			});
			type = type.substring(0,type.length - 1)
		

		if(this_bet == 1){ var _url_save = 'save/bacarat/save_ok.php'; }
		if(this_bet == 2){ var _url_save = 'save/hilo/save_ok.php'; }
		if(this_bet == 3){ var _url_save = 'save/fish/save_ok.php'; }
		if(this_bet == 4){ var _url_save = 'save/2hit/save_ok.php'; }
		if(this_bet == 5){ var _url_save = 'save/dragon/save_ok.php'; }


		$.ajax({
			url: _url_save,
			type: 'POST',
			dataType: 'html',
			data: {bet: bet , type : type},
			async: false,
		})
		.done(function(data) {

			if(data != 'success')
			{
				_alert(data);
			}
		
		});

		get_bet_list();
		clear_bet();	
		set_credit();
	
	}	
})

$(document).keypress(function(e) {
	if (bet_stackAry != '' && $("#bet_price").is(":focus")) {
	 	if(e.which == 13) {
        	$('#submit_bet').click();

    	}
	} 
});


function _sumx(e)
{

	if(_pay > 0)
	{
		var val = $(e).val();
			val=val.replace(/,/g, '');
			if(val==''){val = 0;}
		var _rs = parseFloat(val) * parseFloat(_pay);
		_rs = _rs.toFixed();

		var number = parseInt(_rs);
		$('tr.num').children('td:eq(0)').text('');
		$('tr.num').children('td:eq(0)').html('<span> <span>'+number.toLocaleString()+' ฿</span></span>');
		
	}

}
    

function count_bet()
{

	setInterval(function(){ 
		get_count_bet();
	}, 1000);

}

function get_count_bet()
{
	$.ajax({
			url: 'get_count_bet.php',
			dataType: 'json',
			// async : false,
		})
		.done(function(data) {
			
			set_count_bet(data);
		});
		$.ajaxSetup({ cache: false });
}

function set_count_bet(data)
{
	//  bacarat   bet1
	var set_bacarat_zero = (is_timeOut_bet1 == true) ? 0 : 1;
	$('td.count_bacarat1 span').text('');
	$('td.count_bacarat1 span').text((parseInt(data['bacarat_count'][0]['1'])+parseInt(data['bacarat_count_fake'][0]['1'])) *set_bacarat_zero);
	$('td.count_bacarat2 span').text('');
	$('td.count_bacarat2 span').text((parseInt(data['bacarat_count'][0]['2'])+parseInt(data['bacarat_count_fake'][0]['2'])) *set_bacarat_zero);
	$('td.count_bacarat3 span').text('');
	$('td.count_bacarat3 span').text((parseInt(data['bacarat_count'][0]['2'])+parseInt(data['bacarat_count_fake'][0]['3'])) *set_bacarat_zero);

	//hilo bet 2
	var set_hilo_zero = (is_timeOut_bet2 == true) ? 0 : 1;
	$('td.hilo_1').text('');
	$('td.hilo_1').text((parseInt(data['hilo'][0]['1'])+parseInt(data['hilo_fake'][0]['1'])) *set_hilo_zero);
	$('td.hilo_2').text('');
	$('td.hilo_2').text((parseInt(data['hilo'][0]['2'])+parseInt(data['hilo_fake'][0]['2'])) *set_hilo_zero);
	$('td.hilo_3').text('');
	$('td.hilo_3').text((parseInt(data['hilo'][0]['3'])+parseInt(data['hilo_fake'][0]['3'])) *set_hilo_zero);
	$('td.hilo_4').text('');
	$('td.hilo_4').text((parseInt(data['hilo'][0]['4'])+parseInt(data['hilo_fake'][0]['4'])) *set_hilo_zero);
	$('td.hilo_5').text('');
	$('td.hilo_5').text((parseInt(data['hilo'][0]['5'])+parseInt(data['hilo_fake'][0]['5'])) *set_hilo_zero);
	$('td.hilo_6').text('');
	$('td.hilo_6').text((parseInt(data['hilo'][0]['6'])+parseInt(data['hilo_fake'][0]['6'])) *set_hilo_zero);
	$('td.hilo_L').text('');
	$('td.hilo_L').text((parseInt(data['hilo'][0]['7'])+parseInt(data['hilo_fake'][0]['7'])) *set_hilo_zero);
	$('td.hilo_H').text('');
	$('td.hilo_H').text((parseInt(data['hilo'][0]['8'])+parseInt(data['hilo_fake'][0]['8'])) *set_hilo_zero);
	$('td.hilo_11').text('');
	$('td.hilo_11').text((parseInt(data['hilo'][0]['9'])+parseInt(data['hilo_fake'][0]['9'])) *set_hilo_zero);


	//fish bet 3
	var set_fish_zero = (is_timeOut_bet3 == true) ? 0 : 1;
	$('td.fish1').text('');
	$('td.fish1').text((parseInt(data['fish'][0]['1'])+parseInt(data['fish_fake'][0]['1'])) *set_fish_zero);
	$('td.fish2').text('');
	$('td.fish2').text((parseInt(data['fish'][0]['2'])+parseInt(data['fish_fake'][0]['2'])) *set_fish_zero);
	$('td.fish3').text('');
	$('td.fish3').text((parseInt(data['fish'][0]['3'])+parseInt(data['fish_fake'][0]['3'])) *set_fish_zero);
	$('td.fish4').text('');
	$('td.fish4').text((parseInt(data['fish'][0]['4'])+parseInt(data['fish_fake'][0]['4'])) *set_fish_zero);
	$('td.fish5').text('');
	$('td.fish5').text((parseInt(data['fish'][0]['5'])+parseInt(data['fish_fake'][0]['5'])) *set_fish_zero);
	$('td.fish6').text('');
	$('td.fish6').text((parseInt(data['fish'][0]['6'])+parseInt(data['fish_fake'][0]['6'])) *set_fish_zero);

	//2hit bet 4
	var set_2hitzero = (is_timeOut_bet4 == true) ? 0 : 1;
	$('td.count_red span').text('');
	$('td.count_red span').text((parseInt(data['2hit'][0]['1'])+parseInt(data['2hit_fake'][0]['1'])) *set_2hitzero);
	$('td.count_yellow span').text('');
	$('td.count_yellow span').text((parseInt(data['2hit'][0]['2'])+parseInt(data['2hit_fake'][0]['2'])) *set_2hitzero);

	//dragon bet5
	var set_dragon_zero = (is_timeOut_bet5 == true) ? 0 : 1;
	$('td.count_dragon1 span').text('');
	$('td.count_dragon1 span').text((parseInt(data['dragon'][0]['1'])+parseInt(data['dragon_fake'][0]['1'])) *set_dragon_zero);
	$('td.count_dragon2 span').text('');
	$('td.count_dragon2 span').text((parseInt(data['dragon'][0]['2'])+parseInt(data['dragon_fake'][0]['2'])) *set_dragon_zero);
	$('td.count_dragon3 span').text('');
	$('td.count_dragon3 span').text((parseInt(data['dragon'][0]['3'])+parseInt(data['dragon_fake'][0]['3'])) *set_dragon_zero);
}




function _bet1(val)
{
	if(is_timeOut_bet1 == true)
	{
		return false;
	}
	bet_stack = 0;
	this_bet = 1;
	bet_stackAry = [];
	bet_stackAry.push(val);
	var html = '<img src="img/bacarat/bet_sl'+val+'.jpg?v='+_cache+'"  alt="" style="width:55px; height:25px;">';
	var g_Name = lang['game_zone'][3]; //"บาคาร่า";
	$('tr.num').children('td:eq(0)').text('');
	$('tr.num').children('td:eq(0)').text('0 ฿');
	$('#bet_price').val('');
	var get_pay = _arr_bacarat_pay;
	var pay = get_pay[val]+(_m_games_dis_member[this_bet-1]/100); 
	show_betSl(this_bet,html,g_Name,pay.toString());	
	triggerBotMenu();
	_pay = pay;	   
}

function _bet2(val)
{
	if(is_timeOut_bet2 == true)
	{
		return false;
	}
	if(this_bet != 2){bet_stackAry = [];}
	var is_valInAry = bet_stackAry.indexOf(val);

	if(is_valInAry != -1 && bet_stack !=3) // ถ้า != -1 หมายถึง มีข้อมูล val ที่ผู้ใช้เลือกใน array แล้ว (ซ้ำ) 
	{
		return false;
	}

	
	if(this_bet != 2 || bet_stack >= 3){bet_stack = 0; bet_stackAry = []; $('#bet_select').text('');}
	this_bet = 2;
	if(val == '5_L')
	{
		bet_stack = 3; 
		var html = '<img src="img/hilo/5.png?v='+_cache+'"  class="hiloStyle" alt="" style="width:25px; height:25px; margin:0 1px;">'+
					'<img src="img/hilo/L.png?v='+_cache+'" class="hiloStyle" alt="" style="width:25px; height:25px; margin:0 1px;">';

		if(bet_stack >= 3){bet_stack = 3; bet_stackAry = []; $('#bet_select').text('');}
			val = val.split("_"); 
			bet_stackAry.push(val[0]);
			bet_stackAry.push(val[1]);
	}else if(val == '6_L')
	{
		bet_stack = 3; 
		var html = '<img src="img/hilo/6.png?v='+_cache+'"  class="hiloStyle" alt="" style="width:25px; height:25px; margin:0 1px;">'+
				   '<img src="img/hilo/L.png?v='+_cache+'" class="hiloStyle" alt="" style="width:25px; height:25px; margin:0 1px;">';

		if(bet_stack >= 3){bet_stack = 3; bet_stackAry = []; $('#bet_select').text('');}
		val = val.split("_"); 
		bet_stackAry.push(val[0]);
		bet_stackAry.push(val[1]);

	}else if(val == '11')
	{
		bet_stack = 3; 
		var html = '<img src="img/hilo/11.png?v='+_cache+'"  class="hiloStyle" alt="" style="width:60px; height:25px; margin:0 1px; border-radius: 0px">';
		if(bet_stack >= 3){bet_stack = 3; bet_stackAry = []; $('#bet_select').text('');}
	   	bet_stackAry.push(val);

	}else {
		if(val == 'L' || val == 'H')
		{
			bet_stack += 2
			if(bet_stack > 3){bet_stack = 2; bet_stackAry = []; $('#bet_select').text('');}
		}else{
			bet_stack++; 
		}
		var html = '<img src="img/hilo/'+val+'.png?v='+_cache+'"  class="hiloStyle" alt="" style="width:25px; height:25px; margin:0 1px;">';
		bet_stackAry.push(val);

	}	

	$('tr.num').children('td:eq(0)').text('');
	$('tr.num').children('td:eq(0)').text('0 ฿');
	$('#bet_price').val('');

	var g_Name  	= lang['game_zone'][4]; //"ไฮโล"
	var l_ary   	=  bet_stackAry.length;
	var Key_index 	= 1;
	if(l_ary == 1)
	{
		if(val == 11)
		{
			Key_index = 5;

		}else{
			Key_index = 1;
		}	

	}else if(l_ary == 2)
	{
		var L = bet_stackAry.indexOf("L");
		var H = bet_stackAry.indexOf("H");
		
		if(L >= 0 || H >=0)
		{
			Key_index = 2;
		}else{
			Key_index = 3;
		}
	}else if(l_ary == 3)
	{
		Key_index = 4;
	}

	var get_pay = _arr_hilo_pay;
	var pay = get_pay[Key_index]+(_m_games_dis_member[this_bet-1]/100); 
	
	show_betSl(this_bet,html,g_Name,pay.toString());	
	triggerBotMenu();	
	_pay = pay;   
}


function _bet3(val)
{
	if(is_timeOut_bet3 == true){return false;}
	if(this_bet != 3){bet_stackAry = [];}

	var is_valInAry = bet_stackAry.indexOf(val);	
	if(is_valInAry != -1 && bet_stack !=3) // ถ้า != -1 หมายถึง มีข้อมูล val ที่ผู้ใช้เลือกใน array แล้ว (ซ้ำ) 
	{

		return false;
	}

	if(this_bet != 3 || bet_stack >= 3){bet_stack = 0; bet_stackAry = []; $('#bet_select').text(''); }

	this_bet = 3;
	bet_stack++;
	bet_stackAry.push(val);
	var html = '<img src="img/fish/fish'+val+'.png?v='+_cache+'"  alt="" style="width:25px; height:25px; margin:0 1px;">';
	var g_Name = lang['game_zone'][5]; //"น้ำเต้าปูปลา";
	$('tr.num').children('td:eq(0)').text('');
	$('tr.num').children('td:eq(0)').text('0 ฿');
	$('#bet_price').val('');

	var get_pay = _arr_fish_pay;
	var pay = get_pay[bet_stack]+(_m_games_dis_member[this_bet-1]/100); 
	
	show_betSl(this_bet,html,g_Name,pay);	
	triggerBotMenu();	
	_pay = pay;   

}

function _bet4(val)
{
	if(is_timeOut_bet4 == true)
	{
		return false;
	}

	bet_stack = 0;
	this_bet = 4;
	bet_stackAry = [];
	bet_stackAry.push(val);
	var img = (val == 1) ? 'red' : 'yellow';
	var html = '<img src="img/2hit/'+img+'.png?v='+_cache+'"  alt="">';
	var g_Name = lang['game_zone'][1]; //"2ฮิต";
	$('tr.num').children('td:eq(0)').text('');
	$('tr.num').children('td:eq(0)').text('0 ฿');
	$('#bet_price').val('');

	var get_pay = _arr_color_pay;
	var pay = get_pay[val]+(_m_games_dis_member[this_bet-1]/100); 
	
	show_betSl(this_bet,html,g_Name,pay);	
	triggerBotMenu();
	_pay = pay;	   
}

function _bet5(val)
{
	if(is_timeOut_bet5 == true)
	{
		return false;
	}
	bet_stack = 0;
	this_bet = 5;
	bet_stackAry = [];
	bet_stackAry.push(val);
	var html = '<img src="img/dragon/'+val+'.png?v='+_cache+'"  alt="" style="width:20px; height:25px;">';
	var g_Name = lang['game_zone'][2]; //"เสือมังกร";
	$('tr.num').children('td:eq(0)').text('');
	$('tr.num').children('td:eq(0)').text('0 ฿');
	$('#bet_price').val('');
	var get_pay = _arr_dragon_pay;
	var pay = get_pay[val]+(_m_games_dis_member[this_bet-1]/100); 
	
	show_betSl(this_bet,html,g_Name,pay);	
	triggerBotMenu();	 
	_pay = pay;  
}

getStats_hilo();
getStats_fish();
getStats_2hit();
getStats_dragon();
getStats_bacarat();

function getStats_hilo() {
	// hilo game
	$.ajax({
		url: '../games/json/hilo_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// clear result
		for (var x = 0; x < 4; x++) {
			for (var y = 0; y < 10; y++) {
				$("#st_hilo_"+x+"_"+y).html("");
			}
		}

		for (var i = 0; i < data.length; i++) {
			let res1 = data[i]["b1"]===null ? "" : resultHTML("hilo", data[i]["b1"]);
			let res2 = data[i]["b2"]===null ? "" : resultHTML("hilo", data[i]["b2"]);
			let res3 = data[i]["b3"]===null ? "" : resultHTML("hilo", data[i]["b3"]);

			if(data[i]["win"]!==null) {
				if(parseInt(data[i]["win"])>11) {
					var resWin = "H";
				} else if(parseInt(data[i]["win"])<11) { 
					var resWin = "L";
				} else if(parseInt(data[i]["win"])==11) {
					var resWin = "11";
				}
				resWin = resultHTML("hilo", resWin);
			} else {
				var resWin = "";
			}

			$("#st_hilo_0_"+i).html(res1);
			$("#st_hilo_1_"+i).html(res2);
			$("#st_hilo_2_"+i).html(res3);
			$("#st_hilo_3_"+i).html(resWin);
			
		}
	});
}

function getStats_fish() {
	// fish game
	$.ajax({
		url: '../games/json/fish_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data);
		for (var i = 0; i < data.length; i++) {
			let res1 = data[i]["b1"]===null ? "" : resultHTML("fish", data[i]["b1"]);
			let res2 = data[i]["b2"]===null ? "" : resultHTML("fish", data[i]["b2"]);
			let res3 = data[i]["b3"]===null ? "" : resultHTML("fish", data[i]["b3"]);
			
			$("#st_fish_0_"+i).html(res1);
			$("#st_fish_1_"+i).html(res2);
			$("#st_fish_2_"+i).html(res3);
		}
	});
}

function getStats_2hit() {
	// 2hit game
	$.ajax({
		url: '../games/json/2hit_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		let _row = 6;
		let _col = 10;
		let current_row = 1;
		let current_col = (_col);
		let prevRes = 0;
		let runOut = false;
		// clear result
		for (var x = 0; x < _row; x++) {
			for (var y = 0; y < _col; y++) {
				$("#st_color_"+x+"_"+y).html("");
			}
		}

		let z = []; // array result
		let zg = -1; // index to group result
		// z[zg] = [];
		for (var i = (data.length-1); i > 0; i--) {
			let res = data[i]["win"];
			if(res!==null) {
				if(res!=prevRes) {
					zg++;
					z[zg] = [];
				}
				z[zg].push(res);
				prevRes = res;
			}
			
	
		}

		let count_col = _col;
		for (var k = 0; k < z.length; k++) {
			let iCol = Math.ceil(z[k].length/_row);
			count_col -= iCol;
			current_col = count_col;
			current_row = 0;
			for (var l = 0; l < z[k].length; l++) {
				let resWin = resultHTML("color", z[k][l]);
				$("#st_color_"+current_row+"_"+current_col).html(resWin);
				current_row++;
				if(current_row>=_row){
					current_row=0;
					current_col++;
				}
			}
			if(count_col<0) { break; }
		}

		
	});

}

function getStats_dragon() {
	// dragon game
	$.ajax({
		url: '../games/json/dragon_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		let _row = 6;
		let _col = 10;
		let current_row = 1;
		let current_col = (_col);
		let prevRes = 0;
		let runOut = false;
		// clear result
		for (var x = 0; x < _row; x++) {
			for (var y = 0; y < _col; y++) {
				$("#st_dt_"+x+"_"+y).html("");
			}
		}

		let z = []; // array result
		let zg = -1; // index to group result
		for (var i = (data.length-1); i > 0; i--) {
			let res = data[i]["win"];
			if(res!==null) {
				if(res!=prevRes) {
					zg++;
					z[zg] = [];
				}
				z[zg].push(res);
				prevRes = res;
			}
			
		}

		let count_col = _col;
		for (var k = 0; k < z.length; k++) {
			let iCol = Math.ceil(z[k].length/_row);
			count_col -= iCol;
			current_col = count_col;
			current_row = 0;
			for (var l = 0; l < z[k].length; l++) {
				let resWin = resultHTML("dragon", z[k][l]);
				$("#st_dt_"+current_row+"_"+current_col).html(resWin);
				current_row++;
				if(current_row>=_row){
					current_row=0;
					current_col++;
				}
			}
			if(count_col<0) { break; }
		}

	
	});
}

function getStats_bacarat() {
   // bacarat game
	$.ajax({
		url: '../games/json/bacarat_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		let _row = 6;
		let _col = 10;
		let current_row = 1;
		let current_col = (_col);
		let prevRes = 0;
		let runOut = false;
		// clear result
		for (var x = 0; x < _row; x++) {
			for (var y = 0; y < _col; y++) {
				$("#st_bacara_"+x+"_"+y).html("");
			}
		}

		let z = []; // array result
		let zg = -1; // index to group result
		for (var i = (data.length-1); i > 0; i--) {
			let res = data[i]["win"];
			if(res!==null) {
				if(res!=prevRes) {
					zg++;
					z[zg] = [];
				}
				z[zg].push(res);
				prevRes = res;
			}
			
		}

		let count_col = _col;
		for (var k = 0; k < z.length; k++) {
			let iCol = Math.ceil(z[k].length/_row);
			count_col -= iCol;
			current_col = count_col;
			current_row = 0;
			for (var l = 0; l < z[k].length; l++) {
				let resWin = resultHTML("bacarat", z[k][l]);
				$("#st_bacara_"+current_row+"_"+current_col).html(resWin);
				current_row++;
				if(current_row>=_row){
					current_row=0;
					current_col++;
				}
			}
			if(count_col<0) { break; }
		}
		
	});
}



function resultHTML(g, r) {
	let h = "";
	switch (g) {
		case "fish":
			h = r+".png"
			h = "<img src=\"../games/img/fish/" + h + "\" class=\"stats_res\">";
			break;
		case "hilo":
			h = "hilo" + r + ".png"
			h = "<img src=\"../games/img/hilo/" + h + "\" class=\"stats_res\">";
			break;
		case "bacarat":
			if(r==1) {
				h = "<span class=\"stats_res _blue\">P</span>";
			} else if(r==2) {
				h = "<span class=\"stats_res _red\">B</span>";
			} else if(r==3) {
				h = "<span class=\"stats_res _green\">D</span>";
			}
			break;
		case "dragon":
			h = r+".jpg"
			h = "<img src=\"../games/img/dragon/" + h + "\" class=\"stats_res\">";
			break;
		case "color":
			h = r+".png"
			h = "<img src=\"../games/img/2hit/" + h + "\" class=\"stats_res\">";
			break;
		default:
			// statements_def
			break;
	}

	return h;
}


