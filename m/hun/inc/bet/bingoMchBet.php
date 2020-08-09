<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingo9Bet.css?v=<?=time()?>">


<div id="showResuleBet" style="display: none;">
<div class="showResulrBody">
	<img id="closeResult" src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_close.png" alt="">
	<div id="Resultval">


	</div>
</div>
</div>

<div id="FullBody">


	<div id="FullBigotitle" class="garyGradient"> หวยหุ้น Moeny <div id="closetime">(ปิด <span></span>)</div> </div>
	<div id="mainFullContain" style="background: #e0e0e0;">
      <table width="100%" id="bingo9data" data-role="none">
      	<tr>
      		<td><div id='BtncolId_0' class="BetBtn">กลับ</div></td>
      		<td><div id='BtncolId_1' class="BetBtn">คัดลอก</div></td>
      		<td><div id='BtncolId_2' class="BetBtn">คัดลอก</div></td>
      		<td><div id='BtncolId_3' class="BetBtn">คัดลอก</div></td>
      	</tr>
      	<tr id='BetCellTitle'>
      		<td class="leftTitle"> เลข</td>
      		<td class="centerTitle">
      				<div class="BetTitletext" data-colId="colId_1" onclick="selectRow(this,'1');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png" alt="">
      					บน
      				</div>
      		</td>
      		<td class="centerTitle">
      				<div class="BetTitletext" data-colId="colId_2" onclick="selectRow(this,'1');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png" alt="">
      					ล่าง
      				</div>
      		</td>
      		<td class="rightTitle">
      				<div class="BetTitletext" data-colId="colId_3" onclick="selectRow(this,'1');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png" alt="">
      					โต๊ด
      				</div>
      		</td>
      	</tr>

      	<tbody id="BetInputBody" >
     <!--  	<tr class='BetInput'>
      		<td><span><input type="number"></span><span>=</span> </td>
      		<td><input type="number"></td>
      		<td><input type="number"></td>
      		<td><input type="number"></td>
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

      <table width="100%"  id="bingo9datafoot" cellpadding="0" cellspacing="0">
      	<tfoot>
      		<tr class='Betfooter'>
      			<td class='fleft'> 
      				<div class="BetTitletext selectI" data-colId="colId_1" onclick="selectfootRow(this,'1');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png" alt="">
      					1i
      				</div> 
      			</td>
      			<td>
      				<div class="BetTitletext selectI" data-colId="colId_1" onclick="selectfootRow(this,'10');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_off_koo.png" alt="">
      					10i
      				</div> 
      			</td>
      			<td>
      				<div class="BetTitletext selectI" data-colId="colId_1" onclick="selectfootRow(this,'20');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_off_koo.png" alt="">
      					20i
      				</div> 
      			</td>
      			<td  class='fright'>
      				<div class="BetTitletext selectI" data-colId="colId_1" onclick="selectfootRow(this,'x');">
					<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_off_koo.png" alt="">
      					xi
      				</div> 
      			</td>
      		</tr>
      	</tfoot>
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
$(document).ready(function() { 

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
	   		
	   	}, 300);

	   }else if(w>='375' && w<'667')
	   {
	   	// alert('iphone 6 or +')
	   	 setTimeout(function(){ 
           $('.bingoPrice').width('75%');
             
         }, 300);
	   }else  if(w>='667'){

	   		 setTimeout(function(){ 	
	   	 	 $('.bingoPrice').width('75%');
	        }, 300);

	   }
	 } 

  }

   /*iphone *********************************************/


	
	// setInterval(function(){ 
 //       setmainFullContainHeight();
 //   }, 100);
	// getBingo9FullData();
	checkZoneOpen();
	appenTableInput();
	console.log(screen.orientation.type);

	$(".bingoNumber").on("keypress", function(evt) {
  		var keycode = evt.charCode || evt.keyCode;
  		if (keycode == 46 || this.value.length==3) {
  		  return false;
  		}
	});


	
	// $(".bingoPrice").keyup(function(event) {
	$(document).on('keyup','.bingoPrice',function(event){	

		var bingoNum = $(this).closest('tr').children('td:eq( 0 )').children('span').children('input').val().length;
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




// เปิดปิดแถวแต่ละแถว
function selectRow(e,cerrentTepe,colId)
{
	var colId ='.'+$(e).attr('data-colId');
	var BtncolId ="#Btn"+$(e).attr('data-colId');
	if(cerrentTepe=='1')
	{
		$(e).children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_off_koo.png');
		$(e).attr('onclick','selectRow(this,\'2\');');
		$(colId).val('')
		$(colId).prop('readonly', true);
		
		$(BtncolId).addClass('readonly');


	}else if(cerrentTepe=='2')
	{
		$(e).children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png');
		$(e).attr('onclick','selectRow(this,\'1\');');

		$(colId).prop('readonly', false);
		$(BtncolId).removeClass('readonly');
		var trLength = $('#BetInputBody').find('tr').length;
		for(var j =0; j<trLength;j++)
		{
			var cell1Value = $(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 0 )').children('span').children('input').val();
			console.log(cell1Value)
			if(cell1Value.length==1)
			{
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', true);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 3 )').children('input').prop('readonly', true);	
		
			}else if(cell1Value.length==2)
			{
		
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 3 )').children('input').prop('readonly', true);
			}else if(cell1Value.length==3)
			{
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', true);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 3)').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 1)').children('input').focus();
			}else if(cell1Value.length==0)
			{
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', false);
				$(''+colId+':eq( '+j+' )').closest('tr').children('td:eq( 3 )').children('input').prop('readonly', false);
			}


		}
	

		

	}
	
}

//เลือกค่า i ตรง footertable
function selectfootRow(e,selI)
{
	$('.selectI').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_off_koo.png');
	$(e).children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_on_koo.png');

	if(selI==1)
	{
		beti ='x1';
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('checked', false);
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('disabled', true);
		$('#selectIinput').children('tr').children('td').children('#x1').prop('checked', true);

	}else if(selI==10)
	{
		beti ='x1,x2,x3,x4,x5,x6,x7,x8,x9,x10';
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('checked', false);
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('disabled', true);
		for(var i=1; i<=10;i++)
		{
			$('#selectIinput').children('tr').children('td').children('#x'+i).prop('checked', true);
		}
		
	}else if(selI==20)
	{
		beti ='x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20';
		selectIinput
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('checked', true);
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('disabled', true);

	}else if(selI=='x')
	{
		$('#selectIinput').children('tr').children('td').children('input:checkbox').prop('disabled', false);
		showXiSelect();
	}
	console.log(beti);
}

function showXiSelect()
{
	$('#BetInputBody').hide();
	$('#selectIinput').show();
}

$(document).on('click','#btnSelectI',function(){
	$('#BetInputBody').show();
	$('#selectIinput').hide();

	beti='';
	for(var i=1; i<=20;i++)
	{
		if($('#selectIinput').children('tr').children('td').children('#x'+i).is(':checked'))
		{
			beti+=$('#selectIinput').children('tr').children('td').children('#x'+i).attr('id')+',';
		}
		
	}

	//ตัด comma ตัวสุดท้ายออก
	beti = beti.substring(0, beti.length-1);
	console.log(beti)
});



var ZoneData1='';
$.post("data/getZoneClose.php",{"zone":"2"}).done(function(data){
		ZoneData1=data;
		// console.log(ZoneData1)

	
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
			window.location = "http://m.lotzx.com/hun/index.php?p=bingoMchBet&zone=2";
		}
		else if(timeMil>ZoneData1['o_limit_time_lang'])
		// else if(timeMil>'1503392270')
		{
			$('.colId_2').prop('readonly', true);
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
	var betLength = $('#BetInputBody').children('tr').length;
	var _mid='<?php echo $_SESSION["mid"]; ?>';
	var _bf = 'w1';
	var _txt='';


	
	var isInputNullSts=true; // เช็ค input ราคา
	for(var i=0; i<6;i++)
	{
		var _txt1 = $('#BetInputBody').children('tr:eq( '+i+' )').children('td:eq( 0 )').children('span').children('input').val();
		if(_txt1!='')
		{
			_txt+=_txt1;
			_txt+='-';
			var price1 = $('#BetInputBody').children('tr:eq( '+i+' )').children('td:eq( 1 )').children('input').val();
			price1=price1.replace(/,/g , "");
			_txt+= price1;
			_txt+='-';
			var price2=$('#BetInputBody').children('tr:eq( '+i+' )').children('td:eq( 3 )').children('input').val();
			price2=price2.replace(/,/g , "");
			_txt+=price2;
			_txt+='-';
			var price3=$('#BetInputBody').children('tr:eq( '+i+' )').children('td:eq( 2 )').children('input').val();
			price3=price3.replace(/,/g , "");
			_txt+=price3;
			_txt+=',';
		
			
		}
		
	}
	_txt = _txt.substring(0, _txt.length-1);
	var checkNullPrice = _txt;
	_txt='('+_txt;
	_txt+=')';

	// checkNullPrice ='111-111-111-,222-111-111-';
	
	var splitPriceArray = checkNullPrice.split(","); //แยกข้อมูลทั้งหมดเป็นอาร์เรย์
	var splitPriceArrayl=splitPriceArray.length;
	console.log(checkNullPrice);

	for(var i=0; i<splitPriceArrayl;i++)
	{
		
		var splitPriceArrayl2 = splitPriceArray[i].split("-"); //แยกข้อมูลเป็นอาเรย์ในแต่ละแถว

		if(splitPriceArrayl2[0]=='')
		{
			isInputNullSts=false;
		}else if(splitPriceArrayl2[1]==''&&splitPriceArrayl2[2]==''&&splitPriceArrayl2[3]=='')
		{
			isInputNullSts=false;
		}
		
	}

	
	if(beti=='')
	{
		alertDialog('แจ้งเตือน','กรุณาเลือกค่า I'+_txt+'');
	}else if(isInputNullSts==false)
	{
		alertDialog('แจ้งเตือน','กรอกข้อมูล');
	}else{

		$.post('data/save_lot.php', 
		 {
		        mid : _mid,
    	        txt : _txt,
    	        lat : '0.0',
    	        lon : '0.0',
    	        bf : _bf,
    	        lot_page : '3',
    	        uuid : '',
    	        set : beti,
    	        zone : '2'
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


//สลับเลข
$(document).on('click','#BtncolId_0',function(){

	var value='';
	var chengeNumberText=[];
	value =$('.bingoNumber:eq( 0 )').val().trim();

	var v0 = value.slice(0,1);
	var v1 = value.slice(1,2);
	var v2 = value.slice(2,3);


//เชค เลขตองเลขเบิ้ล
	if(value.length=='1')
	{
		return;
	}else if(value.length=='2')
	{
		if(v0==v1)
		{
			return;
		}
	}
	else if(value.length=='3')
	{
		if(v0==v1 && v0==v2)
		{
			return;
		}
	}

	chengeNumberText.push(v0+v1+v2);
	chengeNumberText.push(v0+v2+v1);
	chengeNumberText.push(v1+v2+v0);
	chengeNumberText.push(v1+v0+v2);
	chengeNumberText.push(v2+v0+v1);
	chengeNumberText.push(v2+v1+v0);

	var unique = chengeNumberText.filter(function(elem, index, self) {
    return index == self.indexOf(elem);
	})

	// $('.bingoNumber').val('');
	$('#BetInputBody').children('tr').children('td').children('input').prop('readonly', false);
	for(var i=0; i<unique.length; i++)
	{
		console.log(unique[i])
		$('.bingoNumber:eq( '+i+' )').val(unique[i]);
		if(unique[i].length==1)
		{
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', true);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 3 )').children('input').prop('readonly', true);	
	
		}else if(unique[i].length==2)
		{
	
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 3 )').children('input').prop('readonly', true);
		}else if(unique[i].length==3)
		{
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', true);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 3)').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 1)').children('input').focus();
		}else if(unique[i].length==0)
		{
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 1 )').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 2 )').children('input').prop('readonly', false);
			$('.bingoNumber:eq( '+i+' )').closest('tr').children('td:eq( 3 )').children('input').prop('readonly', false);
		}
	}

});
 
$(document).on('click','#BtncolId_1',function(){

	if($(this).hasClass('readonly'))
	{
		return;
	}else{

		var col1Value  = $('.BetInput:eq( 0 )').children('td:eq( 1 )').children('.colId_1').val(); //ข้อมูลของแถวแรกที่จะคัดรอก
		if(col1Value!='')
		{
			$('.colId_1').val(col1Value);
			$('input[readonly]').val('');
		}
	
	}
});

$(document).on('click','#BtncolId_2',function(){

	if($(this).hasClass('readonly'))
	{
		return;
	}else{

		var col2Value  = $('.BetInput:eq( 0 )').children('td:eq( 2 )').children('.colId_2').val(); //ข้อมูลของแถวแรกที่จะคัดรอก
		if(col2Value!='')
		{
			$('.colId_2').val(col2Value);
			$('input[readonly]').val('');
		}
	
	}
})

$(document).on('click','#BtncolId_3',function(){

	if($(this).hasClass('readonly'))
	{
		return;
	}else{

		var col3Value  = $('.BetInput:eq( 0 )').children('td:eq( 3 )').children('.colId_3').val(); //ข้อมูลของแถวแรกที่จะคัดรอก
		if(col3Value!='')
		{
			$('.colId_3').val(col3Value);
			$('input[readonly]').val('');


		}
	
	}
})

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

	var html='';
	var html2='';
	var numi=0;

		for( var i=0;i<6;i++)
		{
			html += '<tr class=\'BetInput\'>'+
      		'<td><span><input type="tel"  class="rowId_'+i+' colId_0 bingoNumber" maxlength="3" onkeyup="checkBingLength(this)"></span><span>=</span> </td>'+
      		'<td><input type="tel" maxlength="12" class="rowId_'+i+' colId_1 bingoPrice"></td>'+
      		'<td><input type="tel" maxlength="12" class="rowId_'+i+' colId_2 bingoPrice"></td>'+
      		'<td><input type="tel" maxlength="12" class="rowId_'+i+' colId_3 bingoPrice" ></td>'+
      		'</tr>';

      		if(i<5)
      		{
      			html2 +='<tr class=\'BetInput\'>';

      				for(var j=0; j<4; j++)
      				{
      					numi++;
      					html2 +='<td>'+
      							'<input type=\'checkbox\' name=\'thing\' value=\'valuable\' data-role="none" id="x'+numi+'"/><label for="x'+numi+'"></label><div class=\'Itext\'>'+
      							(numi)+'i </div>'+

      					'</td>';
      				}

      			html2 +='<tr>';
      	
      		}else{
      			html2 +='<tr class=\'BetInput\'>';

      			html2 +='<td colspan="3">'+
      					'</td>'+
      					'<td>'+
      						'<div id="btnSelectI"> ตกลง </div>'+
      					'</td>';

      			html2 +='<tr>';

      		}
      	
		}

	$('#BetInputBody').text('');
	$('#BetInputBody').append(html);

	$('#selectIinput').text('');
	$('#selectIinput').append(html2);

	$('span').children('input').attr('readonly');
	$('#selectIinput').children('tr').children('td').children('#x1').prop('checked', true);



}

 /*set height size*/
	
 // function setmainFullContainHeight()
 // {
 //    var includeBodyH = $('#FullBody').height();
 //    var mainFull = includeBodyH-48;
 //     $('#mainFullContain').height(mainFull); 	
 // } 



</script>