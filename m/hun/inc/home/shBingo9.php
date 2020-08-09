<div id="showBingoData">
	<div id="Bingo9">
	
	<table class="Bingodatatable" id="bet-evening" style="width: 100%;" cellspacing="0" cellpadding="0">
		<tr>
			<th style="text-align: center;" colspan="3" class="main-title"> เย็น </th>
		</tr>
		<tr>
			<th class="sub-title set-title" style="text-align: center; width: 30%;"> SET </th>
			<th class="sub-title boder-line" style="text-align: center; width: 35%;"> บน </th>
			<th class="sub-title boder-line" style="text-align: center;width: 35%;"> ล่าง </th>
		</tr>
		<tbody class="tbodyData">
			
		</tbody>
	</table>

	<table class="Bingodatatable" id="bet-afternoon" style="width: 100%;" cellspacing="0" cellpadding="0">
		<tr>
			<th style="text-align: center;" colspan="3" class="main-title"> บ่าย </th>
		</tr>
		<tr>
			<th class="sub-title set-title" style="text-align: center; width: 30%;"> SET </th>
			<th class="sub-title boder-line" style="text-align: center; width: 35%;"> บน </th>
			<th class="sub-title boder-line" style="text-align: center;width: 35%;"> ล่าง </th>
		</tr>
		<tbody class="tbodyData">
			
		</tbody>
	</table>

	<table class="Bingodatatable" id="bet-noon" style="width: 100%;" cellspacing="0" cellpadding="0">
		<tr>
			<th style="text-align: center;" colspan="3" class="main-title"> เที่ยง </th>
		</tr>
		<tr>
			<th class="sub-title set-title" style="text-align: center; width: 30%;"> SET </th>
			<th class="sub-title  boder-line" style="text-align: center; width: 35%;"> บน </th>
			<th class="sub-title  boder-line" style="text-align: center;width: 35%;"> ล่าง </th>
		</tr>
		<tbody class="tbodyData">
			
		</tbody>
	</table>

	<table class="Bingodatatable" id="bet-morning" style="width: 100%;" cellspacing="0" cellpadding="0">
		<tr>
			<th style="text-align: center;" colspan="3" class="main-title"> เช้า </th>
		</tr>
		<tr>
			<th class="sub-title set-title" style="text-align: center; width: 30%;"> SET </th>
			<th class="sub-title boder-line" style="text-align: center; width: 35%;"> บน </th>
			<th class="sub-title boder-line" style="text-align: center;width: 35%;"> ล่าง </th>
		</tr>
		<tbody class="tbodyData">
			
		</tbody>
	</table>
</div>


</div>
<script>
var Bingo9Data;
function _setBingo9Data(data)
{
	Bingo9Data = data;
	console.log('BingoMoonData')
	console.log(Bingo9Data)

	showBetData();

}

// showBetData function
function showBetData()
{
	var dlength = Bingo9Data.length;


// for---------------------
	for(var i =0; i<dlength; i++)
	{
		var tbId;
		if(i==0)
		{
			tbId="#bet-evening";
		}else if(i==1){
			tbId="#bet-afternoon";
		}
		else if(i==2){
			tbId="#bet-noon";
		}
		else if(i==3){
			tbId="#bet-morning";
		}

		$('#Bingo9').children(tbId).children('.tbodyData').text(' ')
		var htmlText=" ";

		if(Bingo9Data[i]['T9i1up']=='' || Bingo9Data[i]['T9i1down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti1']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i1up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i1down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i2up']=='' || Bingo9Data[i]['T9i2down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti2']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i2up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i2down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i3up']=='' || Bingo9Data[i]['T9i3down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti3']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i3up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i3down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i4up']=='' || Bingo9Data[i]['T9i4down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti4']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i4up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i4down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i5up']=='' || Bingo9Data[i]['T9i5down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti5']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i5up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i5down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i6up']=='' || Bingo9Data[i]['T9i6down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti6']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i6up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i6down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i7up']=='' || Bingo9Data[i]['T9i7down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti7']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i7up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i7down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i8up']=='' || Bingo9Data[i]['T9i8down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti8']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i8up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i8down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i9up']=='' || Bingo9Data[i]['T9i9down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti9']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i9up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i9down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i10up']=='' || Bingo9Data[i]['T9i10down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti10']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i10up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i10down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i11up']=='' || Bingo9Data[i]['T9i11down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti11']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i11up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i11down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i12up']=='' || Bingo9Data[i]['T9i12down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti12']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i12up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i12down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i13up']=='' || Bingo9Data[i]['T9i13down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti13']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i13up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i13down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i14up']=='' || Bingo9Data[i]['T9i14down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti14']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i14up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i14down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i15up']=='' || Bingo9Data[i]['T9i15down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti15']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i15up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i15down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i16up']=='' || Bingo9Data[i]['T9i16down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti16']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i16up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i16down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i17up']=='' || Bingo9Data[i]['T9i17down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti17']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i17up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i17down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i18up']=='' || Bingo9Data[i]['T9i18down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti18']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i18up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i18down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i19up']=='' || Bingo9Data[i]['T9i19down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti19']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i19up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i19down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['T9i20up']=='' || Bingo9Data[i]['T9i20down']=='' ){}else{
			htmlText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti20']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['T9i20up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['T9i20down']+"</td>"+
						"</tr>";	
		}



		$('#Bingo9').children(tbId).children('.tbodyData').append(htmlText);


	}
	// end for---------------------
	// showBetData function
	


}

</script>