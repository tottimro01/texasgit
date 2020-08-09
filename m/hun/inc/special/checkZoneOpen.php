<style>
	#closeBet p
	{
		color:red;
		font-size: 40px;
		font-weight: bold;
		text-align: center;
		padding-top: 40%;
	}
	
	@media all and (orientation: landscape) 
	{
		#closeBet p
		{
			padding-top: 5%;
		}
		/* @media (min-device-width:0px) and (max-device-width:568px)
   		{
   			#closeBet p
			{
				color:green;
				padding-top: 0%;
			}
   		}*/
	}	


		
</style>
<div id="closeBet">
	
</div>
<script>

$(document).ready(function() { 
	checkZoneOpen();
});

setInterval(function(){
 
 checkZoneOpen(); 
}, 1000);

var timeMil=0;
var zone = '<?php echo $_GET['zone']; ?>';

function checkZoneOpen()
{
	
	timeMil =getTimpStampfnc();
	// console.log(timeMil);
	// timeMil = '1503392280';

	$.post("data/getZoneClose.php",{"zone":"<?php echo $_GET['zone']; ?>"}).done(function(data){
		// $('#1').text('big '+data['o_limit_time']);
		// $('#2').text(' small '+data['o_limit_time_lang']);
		// $('#4').text(timeMil);
		if(timeMil<=data['o_limit_time']) // big เปิดทั้งหมด
		{
			if(zone=='1')
			{
				
				window.location = "http://m.lotzx.com/hun/index.php?p=bingo9SpecialOpen";	
			}else if(zone=='2')
			{
				
				window.location = "http://m.lotzx.com/hun/index.php?p=bingoMchSpecialOpen";	
			}
			else if(zone=='3')
			{
				
				window.location = "http://m.lotzx.com/hun/index.php?p=bingoMoonSpecialOpen";	
			}
		}else
		{
			$('#closeBet').text('');
			$('#closeBet').html('<p> ปิดรับแทงแล้ว </p>')
		}
		
	});
}


</script>