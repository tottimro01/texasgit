<div id="showBingoData">
<div id="BingoMoon">
	<table class="Bingodatatable" style="width: 100%;" cellspacing="0" cellpadding="0">
		<tr class="moonTitle">
			<th class="sub-title" style="text-align: center; width: 30%; border-top-left-radius: 5px; background-color: #6e6e70;"> เวลา </th>
			<th class="sub-title" style="text-align: center; width: 35%; background-color: #6e6e70;"> 3 ตัว </th>
			<th class="sub-title" style="text-align: center;width: 35%; border-top-right-radius: 5px; background-color: #6e6e70;"> 2 ตัว </th>
		</tr>
		<tbody class="tbodyDataBingoMoon">
			
		</tbody>
	</table>

	
</div>


</div>

<script>


var BingoMoonData;
function _setBingoMoonData(data)
{
	BingoMoonData = data;
	console.log(BingoMoonData);
	showBetData2();
}

// showBetData function
function showBetData2()
{
	var dlength = BingoMoonData.length;
	console.log('dlength '+dlength)

	$('.tbodyDataBingoMoon').text(' ');
	// var htmlText=" ";
// for---------------------
	for(var i =0; i<dlength; i++)
	{
		if(BingoMoonData[i]['Time']=='' || BingoMoonData[i]['Win3']=='' || BingoMoonData[i]['Win2']==''){}else{
			
			$('.tbodyDataBingoMoon').append(
		      "<tr>"+ 
					"<td class='boder-line gray-color'>"+BingoMoonData[i]['Time']+"</td>"+
					"<td class='boder-line blue-color'>"+BingoMoonData[i]['Win3']+"</td>"+
					"<td class='boder-line green-color'>"+BingoMoonData[i]['Win2']+"</td>"+
				"</tr>"                  

		      );
			
		}

		
	}

	// end for---------------------
	// showBetData function
	



}	 

</script>