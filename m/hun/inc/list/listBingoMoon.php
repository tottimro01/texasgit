
<table width="100%" id="tableBingoMoon"> 
	<tr>
		<td>
			<div id="SwitchBillLayout">
      			<div class="boxRightContainer">
      			    <div class="billBtn1_moon billBtn1">ดูแบบรายบิล</div>
      			    <div class="billBtn2_moon billBtn2 billactive" onclick="MoonListactive(2);">ดูทั้งหมด</div>
      			  
      			</div>
 			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="listBoxData">
				<table id="showListTableMoon">
					<!-- <thead>
						<tr>
							<th width="16.66%" class="left">วัน-เวลา</th>
							<th width="16.66%">ประเภท</th>
							<th width="16.66%">เลข</th>
							<th width="16.66%">จำนวน</th>
							<th width="16.66%">ส่วนลด</th>
							<th class="right">สุทธิ</th>
						</tr>
						
					</thead>	
					<tbody>
						<tr>
							<td width="16.66%" class="left">
								<li>
									<div class="numberCircle">
										1
									</div>
									<div class="list-time">23.00</div>
									

								</li>
								<li style="text-align: right; color: #2d8831;">i1</li>
								<li class="td-li3">108-2560</li>
							</td>
							<td width="16.66%">3 บน </td>
							<td width="16.66%">999   </td>
							<td width="16.66%">200</td>
							<td width="16.66%">-10</td>
							<td class="right" >200  </td>
						</tr>

						<tr>
							<td width="16.66%" class="left">
								<li>
									<div class="numberCircle">
										1
									</div>
									<div class="list-time">23.00</div>
									

								</li>
								<li style="text-align: right; color: #2d8831;">i1</li>
								<li class="td-li3">108-2560</li>
							</td>
							<td width="16.66%">3 บน </td>
							<td width="16.66%">999   </td>
							<td width="16.66%">200</td>
							<td width="16.66%">-10</td>
							<td class="right" >200  </td>
						</tr>

						<tr>
							<td width="16.66%" class="left">
								<li>
									<div class="numberCircle">
										1
									</div>
									<div class="list-time">23.00</div>
									

								</li>
								<li style="text-align: right; color: #2d8831;">i1</li>
								<li class="td-li3">108-2560</li>
							</td>
							<td width="16.66%">3 บน </td>
							<td width="16.66%">999   </td>
							<td width="16.66%">200</td>
							<td width="16.66%">-10</td>
							<td class="right" >200  </td>
						</tr>

						<tr>
							<td width="16.66%" class="left">
								<li>
									<div class="numberCircle">
										1
									</div>
									<div class="list-time">23.00</div>
									

								</li>
								<li style="text-align: right; color: #2d8831;">i1</li>
								<li class="td-li3">108-2560</li>
							</td>
							<td width="16.66%">3 บน </td>
							<td width="16.66%">999   </td>
							<td width="16.66%">200</td>
							<td width="16.66%">-10</td>
							<td class="right" >200  </td>
						</tr>

						<tr>
							<td width="16.66%" class="left">
								<li>
									<div class="numberCircle">
										1
									</div>
									<div class="list-time">23.00</div>
									

								</li>
								<li style="text-align: right; color: #2d8831;">i1</li>
								<li class="td-li3">108-2560</li>
							</td>
							<td width="16.66%">3 บน </td>
							<td width="16.66%">999   </td>
							<td width="16.66%">200</td>
							<td width="16.66%">-10</td>
							<td class="right" >200  </td>
						</tr>

						<tr>
							<td width="16.66%" class="left">
								<li>
									<div class="numberCircle">
										1
									</div>
									<div class="list-time">23.00</div>
									

								</li>
								<li style="text-align: right; color: #2d8831;">i1</li>
								<li class="td-li3">108-2560</li>
							</td>
							<td width="16.66%">3 บน </td>
							<td width="16.66%">999   </td>
							<td width="16.66%">200</td>
							<td width="16.66%">-10</td>
							<td class="right" >200  </td>
						</tr>

					</tbody>

					<tfoot>
						<tr>
							<td colspan="3"  class="fleft garyGradient" style="text-align: right; padding-right: 20px;"> รวม </td>
							<td style="text-align: center;">9000</td>
							<td style="text-align: center;">900</td>
							<td style="text-align: center;" class="fright">9999</td>
						</tr>
					</tfoot> -->				
				</table>
			</div>
				
		</td>
	</tr>
</table>


<script>

//ค่าเร่มต้น
setDefult();
function setDefult()
{
	getBillData($('#DateselectBox').val());

	$('#tableBingoMoon .boxRightContainer div').removeClass('billactive');
	if(sessionStorage.getItem('listbingoMoon')==1)
	{
		$('#tableBingoMoon .boxRightContainer .billBtn2_moon').addClass('billactive');
		$('.billBtn1_moon').removeAttr('onclick');
		$('.billBtn2_moon').attr('onclick','MoonListactive(2);');

	}else{
		
		$('#tableBingoMoon .boxRightContainer .billBtn1_moon').addClass('billactive');
		$('.billBtn2_moon').removeAttr('onclick');
		$('.billBtn1_moon').attr('onclick','MoonListactive(1);');
	}
}
	
//ค่าเร่มต้น
	function MoonListactive(type)
	{
		
		$('#tableBingoMoon .boxRightContainer div').removeClass('billactive');
		if(type==2)
		{

			//ดูทั้งหมด
			$('#tableBingoMoon .boxRightContainer .billBtn1_moon').addClass('billactive');
			sessionStorage.setItem('listbingoMoon', '2');
			getBillData($('#DateselectBox').val());
			$('.billBtn2_moon').removeAttr('onclick');
			$('.billBtn1_moon').attr('onclick','MoonListactive(1);');

		}else{
			//ดูแบบรายการบิล
			$('#tableBingoMoon .boxRightContainer .billBtn2_moon').addClass('billactive');
			sessionStorage.setItem('listbingoMoon', '1');
			getBillData($('#DateselectBox').val());
			$('.billBtn1_moon').removeAttr('onclick');
			$('.billBtn2_moon').attr('onclick','MoonListactive(2);');
		}
	}

	function getBillData(date)
	{
		var listbingoMoonType = sessionStorage.getItem('listbingoMoon');
		// alert(listbingoMoonType)
		if(listbingoMoonType==1)
		{
			$('#loading').show();
			$.get( "data/getBill.php", { "d": ''+date+'' , "zone":"3","mid":"<?php echo $_SESSION["mid"]; ?>" },function(BillData)
			{
      				showBillData(BillData);
    		});

		}else{
			
			
			$('#loading').show();
			$.get( "data/getBillAll.php", { "d": ''+date+'' , "zone":"3","mid":"<?php echo $_SESSION["mid"]; ?>" },function(BillAllData)
			{
      				showBillAllData(BillAllData);
    		});
		}
	}


	function showBillData(BillData)
	{

		var htmlText=' ';
		var Ntb_total=0;
		var Ndis_total=0;
		var Nbonus_total=0;
		var Ntotal_total=0;


		$('#showListTableMoon').text('');
		htmlText +='<thead>'+
						'<tr>'+
							'<th width="20%" class="left">วัน-เวลา</th>'+
							'<th width="20%">ยอดซื้อ</th>'+
							'<th width="20%">ส่วนลด</th>'+
							'<th width="20%">ยอดที่ถูก</th>'+
							'<th width="20%" class="right">ยอดสุทธิ</th>'+
						'</tr>'+
					'</thead>';

		var billlength = BillData.length;	
		var billlength1 = billlength-1;
		for(var i = 0; i<billlength1;i++)
		{
				var Ndis = minusColor(BillData[i]['Ndis']);
				var Ntb = minusColor(BillData[i]['Ntb']);
				var Nbonus=minusColor(BillData[i]['Nbonus']);
				var Ntotal=minusColor(BillData[i]['Ntotal']);
				htmlText +=	'<tbody>'+
						'<tr>'+
							'<td width="20%" class="left">'+
								'<li>'+
									'<div class="numberCircle">'+
										+(i+1)+
									'</div>'+
									'<div class="list-time">'+BillData[i]['Ntime']+'</div>'+
								'</li>'+
								'<li style="text-align: right; color: #2d8831;">i'+BillData[i]['i']+'</li>'+
								'<li class="td-li3">'+BillData[i]['Ndate']+'</li>'+
							'</td>'+
							'<td width="20%">'+Ntb+'</td>'+
							'<td width="20%">'+Ndis+'</td>'+
							'<td width="20%">'+Nbonus+'</td>'+
							'<td class="right" >'+Ntotal+'  </td>'+
						'</tr>';

			
		}

		var lastCell = BillData.length-1;
	
		Ntb_total = BillData[lastCell]['Ntb'];
		Ndis_total = BillData[lastCell]['Ndis'];
		Nbonus_total = BillData[lastCell]['Nbonus'];
		Ntotal_total =	 BillData[lastCell]['Ntotal'];

		Ntb_total = minusColor(Ntb_total);
		Ndis_total = minusColor(Ndis_total);
		Nbonus_total = minusColor(Nbonus_total);
		Ntotal_total = minusColor(Ntotal_total);

		htmlText +='<tfoot>'+
						'<tr>'+
							'<td class="fleft garyGradient" style="text-align: right; padding-right: 20px;"> รวม </td>'+
							'<td style="text-align: center;">'+Ntb_total+'</td>'+
							'<td style="text-align: center;">'+Ndis_total+'</td>'+
							'<td style="text-align: center;">'+Nbonus_total+'</td>'+
							'<td style="text-align: center;" class="fright">'+Ntotal_total+'</td>'+
						'</tr>'+
					'</tfoot>';
		

		$('#showListTableMoon').append(htmlText);	
		$('#loading').hide();		
	}

	function showBillAllData(BillAllData)
	{

		var htmlText=' ';
		var Ntb_total=0;
		var Ndis_total=0;
		var Ntotal_total=0;


		$('#showListTableMoon').text('');
		htmlText +='<thead>'+
						'<tr>'+
							'<th width="16.66%" class="left">วัน-เวลา</th>'+
							'<th width="16.66%">ประเภท</th>'+
							'<th width="16.66%">เลข</th>'+
							'<th width="16.66%">จำนวน</th>'+
							'<th width="16.66%">ส่วนลด</th>'+
							'<th class="right">สุทธิ</th>'+
						'</tr>'+
					'</thead>';

		

		var billAllength = BillAllData.length;	
		var billAllength1 = billAllength-1;
		for(var i = 0; i<billAllength1;i++)
		{
			var Ndis = minusColor(BillAllData[i]['Ndis']);
			var Ntotal=minusColor(BillAllData[i]['Ntotal']);
			var Ntb=minusColor(BillAllData[i]['Ntb']);


			htmlText +='<tr>'+
							'<td width="16.66%" class="left">'+
								'<li>'+
									'<div class="numberCircle">'+
										+(i+1)+
									'</div>'+
									'<div class="list-time">'+BillAllData[i]['Ntime']+'</div>'+
								'</li>'+
								'<li style="text-align: right; color: #2d8831;">i'+BillAllData[i]['i']+'</li>'+
								'<li class="td-li3">'+BillAllData[i]['Ndate']+'</li>'+
							'</td>'+
							'<td width="16.66%">'+BillAllData[i]['Ntype']+'</td>'+
							'<td width="16.66%">'+BillAllData[i]['Nnum']+'</td>'+
							'<td width="16.66%">'+Ntb+'</td>'+
							'<td width="16.66%">'+Ndis+'</td>'+
							'<td class="right" >'+Ntotal+'</td>'+
						'</tr>';

		}



		Ntb_total = minusColor(BillAllData[billAllength1]['Ntb']);
		Ndis_total = minusColor(BillAllData[billAllength1]['Ndis']);
		Ntotal_total = minusColor(BillAllData[billAllength1]['Ntotal']);

		htmlText +='<tfoot>'+
						'<tr>'+
							'<td colspan="3"  class="fleft garyGradient" style="text-align: right; padding-right: 20px;"> รวม </td>'+
							'<td style="text-align: center;">'+Ntb_total+'</td>'+
							'<td style="text-align: center;">'+Ndis_total+'</td>'+
							'<td style="text-align: center;" class="fright">'+Ntotal_total+'</td>'+
						'</tr>'+
					'</tfoot>';

		$('#showListTableMoon').append(htmlText);
		$('#loading').hide();				
	}

</script>



 