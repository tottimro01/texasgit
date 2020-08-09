<div class="sidenav transition-anim">

	

		<div class="sidenav-uinfo-wrapper">
				<p style="text-align: center; font-size: 16px; font-weight: bold; padding-left: 10px;">ข้อมูลส่วนตัว</p>	
				<img src="img/icon_refresh_mem1.png?v=1001" alt="" id="refresh_uinfo" style="float: right;">
			
				<div id="user-credit" class="sidenav-uinfo" "="">
					<div class="title">เครดิตคงเหลือ </div>
					<div class="value" id="credit-val1">
						1,025,931.98 : 
						<div class="currency">บาท</div>
					</div>
					
				</div>
				<div id="user-play" class="sidenav-uinfo">
					<div class="title">รายการเล่นค้าง </div>
					<div class="value" id="credit-val2">
						1,025,931.98
						<div class="currency">บาท</div>
					</div>
				</div>
				<div id="user-get-credit" class="sidenav-uinfo">
					<div class="title">เครดิตที่ได้รับ </div>
					<div class="value" id="credit-val3">
						<!-- 1,025,931.98 --> <?=number_format($_SESSION['m_count_de']);?>
						<div class="currency"><?=$_SESSION['m_currency'];?></div>
					</div>
				</div>
			</div>

	  <ul style="margin-top: 7px;">
	    <li <?=($active_menu == 'index') ? 'class="active"' : '';?>>
	    	<a href="index.php"><i class="fa fa-home"></i>  &nbsp;	&nbsp;	
	    		<?=$lang_g['mobile_game_menu'][1];?>
	    		<i style="font-size:20px; float: right; line-height: 35px; padding-right: 10px;" class="fa">&#xf105;</i>
	    	</a>
	    </li>
	    <li <?=($active_menu == 'bet_list') ? 'class="active"' : '';?>>
	    	<a href="bet_list.php">
	    		<i class="fa fa-desktop"></i> 		&nbsp;&nbsp; 
	    		<?=$lang_top[12];?> 
	    		<i style="font-size:20px; float: right; line-height: 35px; padding-right: 10px;" class="fa">&#xf105;</i>
	    	</a>
	    </li>
	    <li <?=($active_menu == 'bet_result') ? 'class="active"' : '';?>>
	    	<a href="bet_result.php"><i class="fa fa-trophy"></i>  	&nbsp;	&nbsp;
	    		<?=$lang_lot[27];?> 
	    		<i style="font-size:20px; float: right; line-height: 35px; padding-right: 10px;" class="fa">&#xf105;</i>
	    	</a>
	    </li>
	    <li >
	    	<a href="#" onClick=" parent.location.href='logout.php';">	
	    		<i class="fa fa-mail-reply"></i>&nbsp;	&nbsp;  
	    		<?=$lang_top[15];?> 
	    		<i style="font-size:20px; float: right; line-height: 35px; padding-right: 10px;" class="fa">&#xf105;</i>
	    	</a>
	    </li>
	  </ul>

	  
	</div>
	
	<!-- Content -->
	<div id="main" class="main transition-anim">
	<div class="hamburger_case"> </div>	
	<div class="hamburger">
	  <div class="bar1 transition-anim"></div>
	  <div class="bar2 transition-anim"></div>
	  <div class="bar3 transition-anim"></div>
	</div>


<script>
	set_main_credit();
	function set_main_credit(){
		$('#refresh_uinfo').addClass('fa-spin')
		$.ajax({
			url: 'get_credit.php',
			type: 'POST',
			dataType: 'json',
		})
		.done(function(data) {
			// console.log(data)
			$('#credit-val1').text('')
			$('#credit-val1').append(data['cre1']+" <div class='currency'><?=$_SESSION['m_currency'];?></div>");
			$('#credit-val2').text('')
			$('#credit-val2').append(data['incre']+" <div class='currency'><?=$_SESSION['m_currency'];?></div>");
			$('#credit-val3').text('')
			$('#credit-val3').append("<?=number_format($_SESSION['m_count_de']);?> <div class='currency'><?=$_SESSION['m_currency'];?></div>");
			
			setTimeout(function(){ $('#refresh_uinfo').removeClass('fa-spin'); }, 300);
		})
	
		
	}

	$('#refresh_uinfo').on('click',function(){
	
		set_main_credit()
	});



</script>