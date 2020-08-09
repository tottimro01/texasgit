<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/subpassPage.css?v=<?=time()?>">

<div id="FullscreenContianer" style="display: none;">

<div id="inputsubpassBox">
	<input type="tel" id="suppassCf" data-role="none">
  	<button id="addok"> ตกลง </button>	
</div>
</div>


<script>


	var screenH =$(window).height();
	$('#FullscreenContianer').css('height',screenH+'px');
	$('#FullscreenContianer').css('zIndex', '100');


	if(localStorage.getItem("switchRadioNum")=='1')
	{
		if(localStorage.getItem("openSubpassPage")!='2')
		{
			$('#FullscreenContianer').show();
		}
		
	}else if(localStorage.getItem("switchRadioNum")=='2')
	{
		$('#FullscreenContianer').hide();
	}

	$(document).on('click','#addok',function(){

		
		var suppassCf = $('#suppassCf').val();
		if(suppassCf==localStorage.getItem("subpassword"))
		{
			localStorage.setItem("openSubpassPage", '2');
			$('#FullscreenContianer').hide();
		}

		// alert(localStorage.getItem("subpassword"))
	})

</script>