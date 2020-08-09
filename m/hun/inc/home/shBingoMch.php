<div id="showBingoData">
	<div id="BingoMch">
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


var BingoMchData;
function _setBingoMchData(data)
{
	BingoMchData = data;
	console.log('BingoMchData')
	showBetData1();

}

// showBetData function
function showBetData1()
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

		$('#BingoMch').children(tbId).children('.tbodyData').text(' ')
		var htmlMchText=" ";

		if(Bingo9Data[i]['TMCi1up']=='' || Bingo9Data[i]['TMCi1down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti1']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi1up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi1down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi2up']=='' || Bingo9Data[i]['TMCi2down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti2']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi2up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi2down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi3up']=='' || Bingo9Data[i]['TMCi3down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti3']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi3up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi3down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi4up']=='' || Bingo9Data[i]['TMCi4down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti4']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi4up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi4down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi5up']=='' || Bingo9Data[i]['TMCi5down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti5']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi5up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi5down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi6up']=='' || Bingo9Data[i]['TMCi6down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti6']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi6up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi6down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi7up']=='' || Bingo9Data[i]['TMCi7down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti7']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi7up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi7down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi8up']=='' || Bingo9Data[i]['TMCi8down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti8']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi8up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi8down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi9up']=='' || Bingo9Data[i]['TMCi9down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti9']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi9up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi9down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi10up']=='' || Bingo9Data[i]['TMCi10down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti10']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi10up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi10down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi11up']=='' || Bingo9Data[i]['TMCi11down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti11']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi11up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi11down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi12up']=='' || Bingo9Data[i]['TMCi12down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti12']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi12up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi12down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi13up']=='' || Bingo9Data[i]['TMCi13down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti13']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi13up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi13down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi14up']=='' || Bingo9Data[i]['TMCi14down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti14']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi14up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi14down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi15up']=='' || Bingo9Data[i]['TMCi15down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti15']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi15up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi15down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi16up']=='' || Bingo9Data[i]['TMCi16down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti16']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi16up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi16down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi17up']=='' || Bingo9Data[i]['TMCi17down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti17']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi17up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi17down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi18up']=='' || Bingo9Data[i]['TMCi18down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti18']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi18up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi18down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi19up']=='' || Bingo9Data[i]['TMCi19down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti19']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi19up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi19down']+"</td>"+
						"</tr>";	
		}
		if(Bingo9Data[i]['TMCi20up']=='' || Bingo9Data[i]['TMCi20down']=='' ){}else{
			htmlMchText +="<tr>"+ 
							"<td class='set-title'>"+Bingo9Data[i]['Ti20']+"</td>"+
							"<td class='boder-line green-color'>"+Bingo9Data[i]['TMCi20up']+"</td>"+
							"<td class='boder-line red-color'>"+Bingo9Data[i]['TMCi20down']+"</td>"+
						"</tr>";	
		}



		$('#BingoMch').children(tbId).children('.tbodyData').append(htmlMchText);


	}
	// end for---------------------
	// showBetData function
	


}
	 

</script>