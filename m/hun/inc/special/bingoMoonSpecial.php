<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingo9Special.css?v=<?=time()?>">

<style>
	#bingo9data{
		border-collapse: separate;
		border-spacing: 0;
		border-bottom-left-radius: 8px;
		border-bottom-right-radius: 8px;
	}
</style>


<div id="showResuleBet" style="display: none;">
<div class="showResulrBody">
	<img id="closeResult" src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_close.png" alt="">
	<div id="Resultval">


	</div>
</div>
</div>

<div id="FullBody">


	<div id="FullBigotitle" class="garyGradient"> หวยรายวัน <div id="closetime">(ปิด <span></span>)</div> </div>
	<div id="mainFullContain" >
      <table width="101%" id="bingo9data" data-role="none" style="background: #e0e0e0;">
      	
      <tbody id="BetInputBody" >
      	<!-- <tr>
      		<td class='textTitle' style="margin-top: 5px; padding-left: 5px;" colspan="2">19 หาง</td>
      	</tr>
      	<tr>
      		<td colspan="2">
      			<div class="spacialGroup1">เลข  <input type="tel" data-role="none" class="bingoNumber"></div>
      			<div class="spacialGroup1">บน  <input type="tel" data-role="none" class="bingoPrice"></div>
      			<div class="spacialGroup1">ล่าง <input type="tel" data-role="none" class="bingoPrice"></div>
      		</td>
      	</tr>
      	<tr>
      		<td class='textTitle' style="margin-top: 5px;padding-left: 5px; width: 50%; border-right: solid 1px #c2c1c1;">เลขพี่</td>
      		<td class='textTitle' style="margin-top: 5px;padding-left: 5px; width: 50%;">เลขน้อง</td>
      	</tr>
      	<tr>
      		<td style=" border-right: solid 1px #c2c1c1;">
      			<div class="spacialGroup2">บน  <input type="tel" data-role="none" class="bingoPrice1"></div>
      			<div class="spacialGroup2">ล่าง <input type="tel" data-role="none" class="bingoPrice1"></div>
      		</td>
      		<td >
      			<div class="spacialGroup2">บน  <input type="tel" data-role="none" class="bingoPrice1"></div>
      			<div class="spacialGroup2">ล่าง <input type="tel" data-role="none" class="bingoPrice1"></div>
      		</td>
      	</tr>
    	<tr>
      		<td colspan="2" style="height: 60px" class='marginBotTable'>
      			
      		</td>
      	</tr> -->
      		
      	</tbody>
      	<tbody id="selectIinput" style="display: none" >
      <!-- 	<tr class='BetInput'>
      		<td><input type='checkbox' name='thing' value='valuable' data-role="none" id="thing"/><label for="thing"></label> 1i</td>
      		<td><input type='checkbox' name='thing' value='valuable' data-role="none" id="thing2"/><label for="thing2"></label>2i </td>
      		<td><input type='checkbox' name='thing' value='valuable' data-role="none" id="thing3"/><label for="thing3"></label> 3i</td>
      		<td><input type='checkbox' name='thing' value='valuable' data-role="none" id="thing4"/><label for="thing4"></label> 4i</td>
      	</tr> -->
      	 	
      	</tbody>
      	
      </table>

     

      <table width="100%" style="margin-top:5px; margin-bottom: 5px;">
      		<tr>
      		<td id="savebtn">บันทึกข้อมูล</td>
      		<td id="cancelbtn">ยกเลิก</td>
      	</tr>
      </table>
		

	</div>
</div>

<script>

var beti='x1';

/*iphone *********************************************/

 detechiphone();

  window.addEventListener("orientationchange", function() 
  {	
  	
  		 detechiphone();
  	
  	
  });
  
  function detechiphone()
  {

  	var deviceAgent = navigator.userAgent.toLowerCase();
	 var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
	 if (agentID) {
	 	$("#includePage1").css("-webkit-overflow-scrolling", "touch");

	 	var w = $( window ).width();
	   if(w<'375')
	   {
	   	setTimeout(function(){ 
	   		$(".marginBotTable").hide();
	   	}, 400);

	   }else if(w>='375' && w<'667')
	   {
	   	// alert('iphone 6 or +')
	   	 setTimeout(function(){ 
	   	 	$('.spacialGroup1').width('33.3%');
  			$('.bingoNumber').width('80%');
		    $('.bingoPrice').width('80%');
		    $('.bingoPrice1').width('70%');
	   	   
	        }, 400);
	   }else  if(w>='667'){

	   		 setTimeout(function(){ 
	   	 	$('.spacialGroup1').width('30%');
  			$('.bingoNumber').width('70%');
		    $('.bingoPrice').width('70%');
		    $('.bingoPrice1').width('60%');
	   	   	$('#bingo9data').width('99.9%');
	   	    $('#bingo9datafoot').width('99.9%');
	        }, 400);

	   }
	 } 

  }

  // var deviceAgent = navigator.userAgent.toLowerCase();
  // var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
  // if (agentID) {
  // 	$("#includePage1").css("-webkit-overflow-scrolling", "touch");
  // 	var w = $( window ).width();
  //   if(w<='414'&&w>='375')
  //   {
  //   	// alert('iphone 6 or +')
    	
  //   	 setTimeout(function(){ 
  //          $('.bingoNumber').width('80%');
  //          $('.bingoPrice').width('80%');
  //          $('.bingoPrice1').width('70%');
             
  //        }, 300);
  //   }

 
  // } 

   /*iphone *********************************************/

$(document).ready(function() { 

	setInterval(function(){ 
       // setmainFullContainHeight();
   }, 100);
	// getBingo9FullData();
	checkZoneOpen();
	appenTableInput();
	console.log(screen.orientation.type);

	// $(".bingoNumber").on("keypress", function(evt) {
 //  		var keycode = evt.charCode || evt.keyCode;
 //  		if (keycode == 46 || this.value.length==3) {
 //  		  return false;
 //  		}
 //  		$(this).closest('td').children('.spacialGroup1:eq( 1 )').children('input').focus();
	// });
	$(document).on('keyup','.bingoNumber',function(event){	

   		// skip for arrow keys
   		if(event.which >= 37 && event.which <= 40){
   		    event.preventDefault();
   		}
   		  
   		$(this).val(function(index, value) {
   		    return value
   		        .replace(/\D/g, '')
   		        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
   		    ;
   		});

   	 var deviceAgent = navigator.userAgent.toLowerCase();
	 var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
	 if (agentID) {

	 }else{
	 	$(this).closest('td').children('.spacialGroup1:eq( 1 )').children('input').focus();
	 } 
   		
	});

	
	// $(".bingoPrice").keyup(function(event) {
	$(document).on('keyup','.bingoPrice',function(event){	

		// var bingoNum = $(this).closest('tr').children('td:eq( 0 )').children('span').children('input').val().length;
		var bingoNum = $(this).closest('td').children('.spacialGroup1:eq( 0 )').children('input').val().length;
		var thisLength =$(this).length;
  		if(bingoNum==0)
  		{
  			$(this).val('');
  		}

  		if(thisLength==1&&$(this).val()=='0')
  		{
  		
  			$(this).val('');
  		}
   		// skip for arrow keys
   		if(event.which >= 37 && event.which <= 40){
   		    event.preventDefault();
   		}
   		  
   		$(this).val(function(index, value) {
   		    return value
   		        .replace(/\D/g, '')
   		        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
   		    ;
   		});
	});

	$(document).on('keyup','.bingoPrice1',function(event){	


		var thisLength =$(this).length;
  
  		if(thisLength==1&&$(this).val()=='0')
  		{
  		
  			$(this).val('');
  		}
   		// skip for arrow keys
   		if(event.which >= 37 && event.which <= 40){
   		    event.preventDefault();
   		}
   		  
   		$(this).val(function(index, value) {
   		    return value
   		        .replace(/\D/g, '')
   		        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
   		    ;
   		});
	});




});

setInterval(function(){
 
 checkZoneOpen(); 
}, 300);



// ตรวจสอบจำนวนของหมายเลขว่ามีกี่หลักเพื่อเปิดปิดช่องกรอกราคาต่างๆ
function checkBingLength(e)
{
	var aa= $(e).val();
	console.log(aa.length)
	// $(e).closest('tr').children('td:eq( 1 )').hide();
	if(aa.length==1)
	{
		$(e).closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 2 )').children('input').prop('readonly', true);
		$(e).closest('tr').children('td:eq( 3 )').children('input').prop('readonly', true);	

		$(e).closest('tr').children('td:eq( 2 )').children('input').val('');
		$(e).closest('tr').children('td:eq( 3 )').children('input').val('');

	}else if(aa.length==2)
	{

		$(e).closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 2 )').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 3 )').children('input').prop('readonly', true);

		$(e).closest('tr').children('td:eq( 3 )').children('input').val('');
		
	}else if(aa.length==3)
	{
		$(e).closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 2 )').children('input').prop('readonly', true);
		$(e).closest('tr').children('td:eq( 3)').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 1)').children('input').focus();

		$(e).closest('tr').children('td:eq( 2 )').children('input').val('');
	
	}else if(aa.length==0)
	{
		$(e).closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 2 )').children('input').prop('readonly', false);
		$(e).closest('tr').children('td:eq( 3 )').children('input').prop('readonly', false);

		$(e).closest('tr').children('td:eq( 1 )').children('input').val('');
		$(e).closest('tr').children('td:eq( 2 )').children('input').val('');
		$(e).closest('tr').children('td:eq( 3 )').children('input').val('');
	}
}


function showXiSelect()
{
	$('#BetInputBody').hide();
	$('#selectIinput').show();
}




var ZoneData1='';
$.post("data/getZoneClose.php",{"zone":"3"}).done(function(data){
		ZoneData1=data;
		console.log(ZoneData1)

	
		var timestamp =  data['o_limit_time']; // replace your timestamp
		var date = new Date(timestamp * 1000);
		var formattedDate = ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2);
		// console.log(formattedDate);
		$('#closetime').children('span').text(formattedDate);

});


function checkZoneOpen()
{
	timeMil =getTimpStampfnc();
	// console.log(timeMil);
	// timeMil = '1503392280';


	
		if(timeMil>ZoneData1['o_limit_time']) // big เปิดทั้งหมด
		{
			window.location = "http://m.lotzx.com/hun/index.php?p=bingo9Special&zone=1";
		}
		else if(timeMil>ZoneData1['o_limit_time_lang'])
		// else if(timeMil>'1503392270')
		{
			$('.numDown').prop('readonly', true);
		}
		
	

	// $.post("data/getZoneClose.php",{"zone":"1"}).done(function(data){
	
	// 	if(timeMil>data['o_limit_time']) // big เปิดทั้งหมด
	// 	{
	// 		window.location = "http://m.lotzx.com/hun/index.php?p=bingo9Bet&zone=1";
	// 	}else if(timeMil>data['o_limit_time_lang'])
	// 	{
	// 		$('.colId_2').prop('readonly', true);
	// 	}
		
	// });
}


// บันทึก 
$(document).on('click','#savebtn',function(){
	
	$( "#refaceIcon" ).trigger( "click" );
	save_lotBet();
	
	
});


function save_lotBet()
{
	var _mid='<?php echo $_SESSION["mid"]; ?>';
	var _bf = 'w1';
	var _txt='';

	var isbetNum =$('.spacialGroup1:eq(0)').children('input').val();
	
	var isbetprice_1 =$('.spacialGroup1:eq(1)').children('input').val(); //ราคาบน
	var isbetprice_2 =$('.spacialGroup1:eq(2)').children('input').val(); //ราคาล่าง
	var isbetprice_3 =$('.spacialGroup2:eq(0)').children('input').val();  //เลขพี่น้อง ราคาบน
	var isbetprice_4 =$('.spacialGroup2:eq(1)').children('input').val(); //เลขพี่น้อง ราคาล่าง
	var isbetprice_5 =$('.spacialGroup2:eq(2)').children('input').val(); // เลขเบิ้ล บน
	var isbetprice_6 =$('.spacialGroup2:eq(3)').children('input').val(); // เลขเบิ้ลล่าง

	if(beti=='')
	{
		alertDialog('แจ้งเตือน','กรุณาเลือกค่า I'+_txt+'');
	}else if(isbetNum==''&&isbetprice_1==''&&isbetprice_2==''&&isbetprice_3==''&&isbetprice_4==''&&isbetprice_5==''&&isbetprice_6=='')
	{
		alertDialog('แจ้งเตือน','รายการว่าง');
	}else if(isbetNum==''&&isbetprice_1!='')
	{
		alertDialog('แจ้งเตือน','กรอกเลข 19 หาง');
	
	}else if(isbetNum==''&&isbetprice_2!='')
	{
		alertDialog('แจ้งเตือน','กรอกเลข 19 หาง');
	
	}else if(isbetNum!=''&&isbetprice_1==''&&isbetprice_2=='')
	{
		alertDialog('แจ้งเตือน','กรอกยอดแทง 19 หาง');
	}	
	else{

		if(isbetprice_1==''){isbetprice_1='0';}
		if(isbetprice_2==''){isbetprice_2='0';}

		//เรียงข้อมูล input format ใหม่เพื่อส่งไปยัง server
		
		if(isbetNum!='')
		{
			_txt +='"'+isbetNum+'-0-13-'+isbetprice_1+'-'+isbetprice_2+'",';
		}	

		if(isbetprice_3!='')
		{
			_txt +='"0-0-15-'+isbetprice_3+'-0-0",';
		}

		if(isbetprice_4!='')
		{
			_txt +='"0-0-16-'+isbetprice_4+'-0-0",';
		}

		if(isbetprice_5!='')
		{
			_txt +='"0-0-17-'+isbetprice_5+'-0-0",';
		}

		if(isbetprice_6!='')
		{
			_txt +='"0-0-18-'+isbetprice_6+'-0-0",';
		}


		_txt = _txt.substring(0, _txt.length-1);
		_txt='('+_txt;
		_txt+=')';

		// console.log('_txt :'+_txt)
		// console.log('beti :'+beti)
		// console.log('_mid :'+_mid)


		$.post('data/save_lot.php', 
		 {
		        mid : _mid,
    	        txt : _txt,
    	        lat : '0.0',
    	        lon : '0.0',
    	        bf : _bf,
    	        lot_page : '4',
    	        uuid : '',
    	        set : beti,
    	        zone : '3'
		 })
		 .done(function(data, textStatus, xhr) 
		 {
		 	console.log(data)
		 	setResultval(data);	

		 		 $('#FullBody').hide();
				 $('#showResuleBet').show();
				 $('#includePage1').css('background-color', 'rgba(97, 97, 97, 0.7)');

		 	
		 });	

	}
}
function setResultval(data)
{
	clearInputValue();
	if(data['Status']=='1')
	{
		$('#Resultval').css('color','#026f02');
	}else if(data['Status']=='2')
	{
		$('#Resultval').css('color','#0000FF');
	}else if(data['Status']=='3')
	{
		$('#Resultval').css('color','#FF0000');
	}else if(data['Status']=='4')
	{
		$('#Resultval').css('color','#753a05');
	}

	$('#Resultval').text('');
	var msg = data['Msg'];
		msg = msg.replace(/\\n/g, '<br>');

	$('#Resultval').html(msg);
}



$(document).on('click','#closeResult',function(){
	 $('#showResuleBet').hide();
	 $('#FullBody').show();
	 detechiphone();
	 $('#includePage1').css('background-color', '#fff');

});





$("#cancelbtn").on('click',function(){
	
	
		confirmDialog('ยืนยันข้อมูล','ยืนยันการยกเลิก','clearInputValue');
	
	return false;
});

function clearInputValue()
{
	appenTableInput();
	$('.BetBtn').removeClass('readonly');
	beti='x1';
	$('.BetTitletext').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png');

	$('.Betfooter').children('td').children('.BetTitletext').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_off_koo.png');
	$('.Betfooter').children('td:eq(0)').children('.BetTitletext').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png');

	$('.Betfooter').children('td:eq(0)').children('.BetTitletext').attr('onclick','selectfootRow(this,\'1\');');
	$('.Betfooter').children('td:eq(3)').children('.BetTitletext').attr('onclick','selectfootRow(this,\'10\');');
	$('.Betfooter').children('td:eq(3)').children('.BetTitletext').attr('onclick','selectfootRow(this,\'20\');');
	$('.Betfooter').children('td:eq(3)').children('.BetTitletext').attr('onclick','selectfootRow(this,\'x\');');


}

function appenTableInput()
{

	var html='';  // ข้อมูลหลัง (input)
	var html2=''; // รายการเลือก xi
	var numi=0; //ใช้ใน xi 

	html +='<tr>'+
      		'<td class=\'textTitle\' style="margin-top: 5px; padding-left: 5px;" colspan="2">19 หาง</td>'+
      	'</tr>'+
      	'<tr>'+
      		'<td colspan="2">'+
      			'<div class="spacialGroup1">เลข  <input type="tel" data-role="none" maxlength="1" class="bingoNumber"></div>'+
      			'<div class="spacialGroup1">บน  <input type="tel" data-role="none" maxlength="12" class="bingoPrice"></div>'+
      			'<div class="spacialGroup1">ล่าง <input type="tel" data-role="none" maxlength="12" class="bingoPrice numDown"></div>'+
      		'</td>'+
      	'</tr>'+
      	'<tr>'+
      		'<td class=\'textTitle\' style="margin-top: 5px;padding-left: 5px; width: 50%; border-right: solid 1px #c2c1c1;">เลขพี่น้อง</td>'+
      		'<td class=\'textTitle\' style="margin-top: 5px;padding-left: 5px; width: 50%;">เลขเบิ้ล</td>'+
      	'</tr>'+
      	'<tr>'+
      		'<td style=" border-right: solid 1px #c2c1c1;">'+
      			'<div class="spacialGroup2">บน  <input type="tel" data-role="none" maxlength="12" class="bingoPrice1"></div>'+
      			'<div class="spacialGroup2">ล่าง <input type="tel" data-role="none" maxlength="12" class="bingoPrice1 numDown"></div>'+
      		'</td>'+
      		'<td >'+
      			'<div class="spacialGroup2">บน  <input type="tel" data-role="none" maxlength="12" class="bingoPrice1"></div>'+
      			'<div class="spacialGroup2">ล่าง <input type="tel" data-role="none" maxlength="12" class="bingoPrice1 numDown"></div>'+
      		'</td>'+
      	'</tr>'+
    	'<tr>'+
      		'<td colspan="2" style="height: 60px" class=\'marginBotTable\'>'+
      			
      		'</td>'+
      	'</tr>';

		

	$('#BetInputBody').text('');
	$('#BetInputBody').append(html);

	

	$('span').children('input').attr('readonly');
	$('.numDown').prop('readonly', true);


}

 /*set height size*/
	
 function setmainFullContainHeight()
 {
    var includeBodyH = $('#FullBody').height();
    var mainFull = includeBodyH-48;
     $('#mainFullContain').height(mainFull); 	
 } 



</script>