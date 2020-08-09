<?
	session_start();

    $head_title = $lang_member[2189];

    $dw = date("w", time());

	$token = md5(uniqid(rand(),1));
	$_SESSION['bettoken'] = $token;
	$fo = $json_dir."login/token_bet/".$_SESSION['m_id'].".php";
	write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 


	$rec = sql_array("select * from bom_tb_config where con_id = 1;");

	if($rec["con_open_lotto_hun"]==0){ 
	  	include 'sa_close.php'; 
	  	echo "ag close";
	  	exit(); 
	} 

	foreach($_SESSION['arid'] as $rid){
  		$r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
		if($r_open_page[9]==0){ 
		  	include 'ag_close.php'; 
		  	exit(); 
		} 
	}

	$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);
	if($m_open_page[9]==0){ 
	  	include 'ag_close.php'; 
	  	exit(); 
	}  

	if($_SESSION["zone_hun"]>1){
		$zone=$_SESSION["zone_hun"];
		$rob=$_SESSION["rob_hun"];
		if($rob=="" || $rob==0){
			$rob = 1;
		}
		$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
		$ok_data=sql_array($sql);
	}

	################Config Member
	$emax=@explode(',',$_SESSION['m1']['m_lotto_hun_max']); 
	$emin=@explode(',',$_SESSION['m1']['m_lotto_hun_min']); 
  	$eset=@explode(',',$_SESSION['m1']['m_lotto_hun_set_price']); 
 

    if($_SESSION['m1']['m_lotto_hun_setbet']==1){
		$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay1']); 	
	}elseif($_SESSION['m1']['m_lotto_hun_setbet']==2){
		$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay2']); 	
	}else{
		$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay3']); 	
	}

	// check time zone
	$tz = $timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code'];
	try {
	    $date = new DateTime("now", new DateTimeZone($tz));
	    $userDateTimeNow = strtotime($date->format('Y-m-d H:i:s'));
	}catch (Exception $e) {
	    echo $e->getMessage();
	    exit(1);
	}

	$_SESSION["zone_hun"] = 0;
	$_SESSION["rob_hun"] = 0;
	$_SESSION["name_hun"] = "";

	$tz = $timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code'];

    // if(isset($_POST['o_file'])){
	  
	  	$arr = array();
		$i=0;
		$arr[$i]["block_name"] = "<?=$lang_member[686]?>";
		$arr[$i]["block_list"] = array();
		$zone_i = 18;
		$rob_i = 1;
		for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

			$zone=$zone_i;
			$rob=$rob_i;
			$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
			$rs=sql_array($sql);
			
			// ปรับเวลาปิดรับ ตาม timezone ของ user
			$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
			$olt->setTimezone(new DateTimeZone($tz));
			$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

			$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_member[688]." ".$rob_i;
			$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
			$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
			$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
			$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
			$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
			$arr[$i]["block_list"][$y]["z_data"] = $rs;
			$rob_i++;
		}

		$lotzone_24  = json_encode($arr);
	  
    	
    
    // } else {

		  	$arr = array();
			// --------------------- query หวยไทย
		  	$arr_lotto = array();
			
			$arr_lotto["block_name"] = $lang_member[568];
			$arr_lotto["block_show"] = 1;
			$arr_lotto["block_list"] = array();
			$zone_i = 1;
			$rob_i = 1;
			for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
			
				$zone=$zone_i;
				$rob=$rob_i;
				$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
				$rs=sql_array($sql);
			
				// ปรับเวลาปิดรับ ตาม timezone ของ user
				$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
				$olt->setTimezone(new DateTimeZone($tz));
				$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

				$arr_lotto["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
				$arr_lotto["block_list"][$y]["z_status"] = $rs["o_status"];
				$arr_lotto["block_list"][$y]["z_close"] = $rs["o_limit_time"];
				$arr_lotto["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
				$arr_lotto["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
				$arr_lotto["block_list"][$y]["z_zone"] = $zone_i;
				$arr_lotto["block_list"][$y]["z_rob"] = $rob_i;
				$arr_lotto["block_list"][$y]["z_data"] = $rs;
			}

		// --------------------- end query หวยไทย

		$i=0;				
		$arr[$i]["block_name"] = $lang_g['lotZone'][2];
		$arr[$i]["block_show"] = 1;
		$arr[$i]["block_list"] = array();
		$zone_i = 2;
		$rob_i = 1;
		for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

			$zone=$zone_i;
			$rob=$rob_i;
			$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
			$rs=sql_array($sql);
			
			// ปรับเวลาปิดรับ ตาม timezone ของ user
			$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
			$olt->setTimezone(new DateTimeZone($tz));
			$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

			$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
			$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
			$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
			$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
			$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
			$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
			$arr[$i]["block_list"][$y]["z_data"] = $rs;
			$rob_i++;
		}
		
		$zone_i = 19;
		$rob_i = 1;
		for($yx=0;$yx<$lot_zone_nrob[$zone_i];$yx++){
			
			$zone=$zone_i;
			$rob=$rob_i;
			$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
			$rs=sql_array($sql);
			
			// ปรับเวลาปิดรับ ตาม timezone ของ user
			$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
			$olt->setTimezone(new DateTimeZone($tz));
			$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

			$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_member[643]." ".$lot_robmun[$rob_i];
			$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
			$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
			$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
			$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
			$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
			$arr[$i]["block_list"][$y]["z_data"] = $rs;
			$rob_i++;
			$y++;
		}

		$i=1;
		$arr[$i]["block_name"] = $lang_member[684];
		$arr[$i]["block_show"] = 1;
		$arr[$i]["block_list"] = array();
		$nr=0;
		for($x=3;$x<18;$x++){
			$zone_i = $x;
			$rob_i = 1;
			for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
				
				$zone=$zone_i;
				$rob=$rob_i;
				$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
				$rs=sql_array($sql);
				
				// ปรับเวลาปิดรับ ตาม timezone ของ user
				$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
				$olt->setTimezone(new DateTimeZone($tz));
				$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));
				

				$arr[$i]["block_list"][$nr]["z_name"] = $lang_g['lotZone'][$zone_i].($lot_zone_nrob[$zone_i] > 1 ? $lang_g['lotrob'][$rob_i] : '');
				$arr[$i]["block_list"][$nr]["z_status"] = $rs["o_status"];
				$arr[$i]["block_list"][$nr]["z_close"] = $rs["o_limit_time"];
				$arr[$i]["block_list"][$nr]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
				$arr[$i]["block_list"][$nr]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
				$arr[$i]["block_list"][$nr]["z_zone"] = $zone_i;
				$arr[$i]["block_list"][$nr]["z_rob"] = $rob_i;
				$arr[$i]["block_list"][$nr]["z_data"] = $rs;
				$rob_i++;
				$nr++;
			}
		}

		$lotzone = json_encode($arr);

    // }
			
		$lotzone_open = explode(",", $rec["con_open_lotto_hun_new"]);
        $lotzone = json_decode($lotzone,true);
        $lotzone_24 = json_decode($lotzone_24,true);

?>
<script>
	var CountdownLabels = {
		second 	: "<?=$lang_member[1598]?>",
		minute 	: "<?=$lang_member[554]?>",
		hour	: "<?=$lang_member[1437]?>",
		day 	: "<?=$lang_member[2129]?>",
		month 	: "<?=$lang_member[1120]?>",
		year 	: "<?=$lang_member[2128]?>"	
	};

	function countdown_time(key, time_id, now, end) {
		var date_now = new Date(now*1000);
		var date_end = new Date(end*1000);
		var time_left = (date_end - date_now)-1000;

		var countdown = setInterval(function(){
			let seconds = Math.floor((time_left)/1000);
			let minutes = Math.floor(seconds/60);
			let hours = Math.floor(minutes/60);
			let days = Math.floor(hours/24);
  
			hours = hours-(days*24);
			minutes = minutes-(days*24*60)-(hours*60);
			seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

			let _d = days > 0 ? ConTo2Digit(days)+' <?=$lang_member[2129];?> ' : "";
			let time = _d+ConTo2Digit(hours)+' : '+ConTo2Digit(minutes)+' : '+ConTo2Digit(seconds);
			$('#'+time_id).html(time)
			time_left = time_left - 1000;

  			if(time_left < 0) {
    			clearInterval(countdown);
				$('#'+key).addClass('dis');
				$('#'+key).removeAttr('onclick');
				$('#'+time_id).html('<span class="text-danger"><?=$lang_member[1435]?></span>');
				let parent = $('#'+key).parent('.hun-selector').parent('.col-6');
				if($(parent).hasClass('zone_18'))
				{
					let grandParent = $(parent).parent('.row');
					$(grandParent).append(parent);
				}
   			}
  		}, 1000);
	}

	function ConTo2Digit(val) {
	    val = ("0" + val).slice(-2);
	    return val;
	}

	function SelectLottoZone(zone, rob, name) {
		$('#zone_send').val(zone);
		$('#rob_send').val(rob);
		$('#name_send').val(name);
		$('#form_send').trigger('submit');
	}

	function SelectLottoZoneCallback(form, data){
		if(data.status == 1)
			// window.location = "index.php?cmd=t";
			OnSelectPage('t');
		else
			toastSaveError();
	}

	function Select24HrZone(isDisplay){
		if(isDisplay){
			$('#lot_container_24').show();
			$('#lot_container').hide();
		}else{
			$('#lot_container_24').hide();
			$('#lot_container').show();
		}
	}
</script>

<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>

				<div class="lotto-scroll-area">
					<div class="hun-container" id="lot_container">

				<div class="row no-gutters mb-3">
					<div class="text-center col-12 my-2"><h5><?=$lang_member[1113];?></h5></div>
					<div class="col-6"> <!-- เมนูหวยไทย  -->
						<? 	
							#แทรกหวยไทยไว้ด้านบนสุด # ใช้เขียนแบบนี้เพราะ ไม่ได้ query ใส่ array เหมือนหวยหุ้นอื่น 
			    			$sql = "SELECT n_note FROM bom_tb_news WHERE b_zone = 2 ORDER BY n_date DESC"; 
			  				$resNews = sql_array($sql);
			  				$lotNote = htmlspecialchars($resNews['n_note']);
			    		?>
			    			<div class="hun-selector">
			    		  		<div id="lotto_1_0" class="selector-wrapper rounded" onclick="SelectLottoZone(1, 0, '<?=$arr_lotto["block_name"];?>')">
									<div class="hun-header th">
			    		    			<h6 class="hun-name font-weight-bold"><?=$arr_lotto["block_name"];?></h6>
			    					</div>
			    		      		<hr>
			    		    		<div class="close-time-group">
			    		    		  	<p class="close-time small">
			    		    		  		<b><span><?=$arr_lotto['block_list'][0]["z_close_date"]." ".$arr_lotto['block_list'][0]["z_close_time"];?></span></b>
			    		    		  	</p>
			    		    		  	<p class="close-count">
			    		    		  		<span id="lotto_1_countdown_0">-- : --</span>
			    		    		  	</p> 
			    		    		</div>
			                 		<script>
			                 			countdown_time('lotto_1_0', 'lotto_1_countdown_0', '<?=$userDateTimeNow;?>', '<?=$arr_lotto['block_list'][0]["z_close"];?>');
			                 		</script> 
			    		    	</div>
			    		  	</div>
					</div>

					<div class="col-6">
					<? if($lotzone_open[18]=="1"){ ?> <!-- เมนูยี่กี่  -->
			          		<div class="hun-selector zone_<?=$key;?>">
			            		<div class="selector-wrapper rounded _24" onclick="Select24HrZone(true);">
									<div class="hun-header cn">
			              				<h6 class="hun-name font-weight-bold"><?=$lang_member[686]?></h6>
			          				</div>
			                		<hr>
			    		    		<div class="close-time-group">
			                  			<p class="close-time small">
			                  				<b><span><?=$lang_member[1431]?> 88 <?=$lang_member[643]?></span></b>
			                  			</p>
			                  			<p class="close-count">
			            				    <i class="fa fa-clock-o"></i>
			                  				<span><?=$lang_member[2278];?></span>
			                  			</p>
			              	 		</div>
			              		</div>
			            	</div>
			      	<? } ?>
					</div>
				</div>

				<? foreach($lotzone as $key => $value){ ?>

			    <div class="row no-gutters mb-3">
					<div class="text-center col-12 my-2"><h5><?=$value["block_name"];?></h5></div>
				<?
			    	foreach ($value["block_list"] as $k => $v) { 
			    		if($lotzone_open[$v["z_zone"]]!="1" && $v["z_zone"] != "1"){ 
			    			continue;
			    		}

			    		if($v["z_zone"] == 19) // ซ่อนหวยรายวัน
			    			continue;

			    ?>
			    	<div class="col-6">
			            <div class="hun-selector zone_<?=$v["z_zone"];?>">
			             	<div id="<?=$key.$v["z_zone"]."_".$v["z_zone"];?>"

			                <? if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){ ?> 
			                  onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>', '<?=$v["z_name"];?>');"
			                  class="selector-wrapper rounded dis" 
			                <? }else if($v["z_status"]==0){ ?>
			                  class="selector-wrapper rounded isClose" 
			                <? }else if($v["z_status"]==24){ ?>
			                  class="selector-wrapper rounded _24" 
			                  onclick="Select24HrZone(true);"
			                <? }else{?> 
			                  class="selector-wrapper rounded" 
			                  onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>', '<?=$v["z_name"];?>');"
			                <? }?> >
								<div class="hun-header <?=$arr_zone_contry[$v["z_zone"]];?>">
			            			<h6 class="hun-name font-weight-bold"><?=$v["z_name"];?></h6>
								</div>
			            		<hr>
			    				<div class="close-time-group">
			            			<? if($v["z_status"]==24){ ?> 
			            			    <p class="close-time">
			            			      	<b><?=$lang_member[1436]?> <?=$v["z_rob"];?> <?=$lang_member[643]?></b>
			            			    </p>
			            			<? }else{ ?>
			            			    <p class="close-time small">
			            			    	<b><?=$lang_member[1436]?> : </b>
			            			    	<span><?=$v["z_close_date"]." ".$v["z_close_time"];?></span>
			            			    </p>
			            			<? } ?>
			            				<p class="close-count">
			            				<? if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){ ?> 
			            				    <span class="text-danger"><?=$lang_member[1435]?></span>
			            				<? }else if($v["z_status"]==0){ ?> 
			            				    <span><?=$lang_member[1435]?></span>
			            				<? }else if($v["z_status"]==24){ ?> 
			            				    <i class="fa fa-clock-o"></i>
			            				    <span><?=$lang_member[2278];?></span>
			            				<? }else{ ?> 
			            				    <span id="<?=$key.$v["z_zone"]."_countdown_".$v["z_rob"];?>">
			            				      	-- : --
			            				       	<script>
			            				          	countdown_time('<?=$key.$v["z_zone"]."_".$v["z_rob"];?>', '<?=$key.$v["z_zone"]."_countdown_".$v["z_rob"];?>', '<?=$userDateTimeNow;?>', '<?=$v["z_close"];?>');
			            				        </script> 
			            				    </span> 
			            				<? } ?>
			            				</p>
			           			</div>
			        		</div>
			            </div>
			        </div>
			        <? } ?>
			    </div>
				<? } ?>
			</div>

			<div class="hun-container" id="lot_container_24" style="display: none;">
				<!-- รอบยี่กี่ -->

				<? foreach($lotzone_24 as $key => $value){ ?>

			    <div class="row no-gutters mb-3">
					<div class="text-center col-12 my-2 position-relative">
						<h5><?=$lang_member[686];?></h5>
						<button class="close-lotto-24" onclick="Select24HrZone(false);"></button>
					</div>
				<?
			    	// สำหรับยี่กี่ ดึงเอารอบที่ปิดแล้วออกมา แล้วใส่กลับเข้าไปต่อท้าย เพื่อให้อยู่ด้านล่าง
			    	$tmpLothunList = [];
			    	foreach ($value["block_list"] as $k => $v) { 
			    		if($v["z_zone"] == 18){
			    			if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){
			    				$tmpLothunList[] = $v;
			    				unset($value["block_list"][$k]);
			    			}
			    		}
					}
					$value["block_list"] = array_merge($value["block_list"], $tmpLothunList );
			    	// สำหรับยี่กี่ ดึงเอารอบที่ปิดแล้วออกมา แล้วใส่กลับเข้าไปต่อท้าย เพื่อให้อยู่ด้านล่าง

			    	foreach ($value["block_list"] as $k => $v) { 
			    		if($lotzone_open[$v["z_zone"]]!="1" && $v["z_zone"] != "1"){ 
			    			continue;
			    		}

			    		if($v["z_zone"] == 18 && $v["z_rob"] > 88){ // ยี่กี่ เอาแค่ 88 รอบ
			    			continue;
			    		}
			    ?>
			    	<div class="col-6 zone_18">
			            <div class="hun-selector zone_<?=$v["z_zone"];?>">
			             	<div id="<?=$key.$v["z_zone"]."_".$v["z_rob"];?>"

			                <? if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){ ?> 
			                  onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>', '<?=$v["z_name"];?>');"
			                  class="selector-wrapper rounded dis" 
			                <? }else if($v["z_status"]==0){ ?>
			                  class="selector-wrapper rounded isClose" 
			                <? }else if($v["z_status"]==24){ ?>
			                  class="selector-wrapper rounded _24" 
			                  onclick="Select24HrZone(true);"
			                <? }else{?> 
			                  class="selector-wrapper rounded" 
			                  onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>', '<?=$v["z_name"];?>');"
			                <? }?> >
								<div class="hun-header <?=$arr_zone_contry[$v["z_zone"]];?>">
			            			<h6 class="hun-name font-weight-bold"><?=$v["z_name"];?></h6>
								</div>
			            		<hr>
			    				<div class="close-time-group">
			            			<? if($v["z_status"]==24){ ?> 
			            			    <p class="close-time">
			            			      	<b><?=$lang_member[1436]?> <?=$v["z_rob"];?> <?=$lang_member[643]?></b>
			            			    </p>
			            			<? }else{ ?>
			            			    <p class="close-time small">
			            			    	<b><?=$lang_member[1436]?> : </b>
			            			    	<span><?=$v["z_close_date"]." ".$v["z_close_time"];?></span>
			            			    </p>
			            			<? } ?>
			            				<p class="close-count">
			            				<? if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){ ?> 
			            				    <span class="text-danger"><?=$lang_member[1435]?></span>
			            				<? }else if($v["z_status"]==0){ ?> 
			            				    <span><?=$lang_member[1435]?></span>
			            				<? }else if($v["z_status"]==24){ ?> 
			            				    <i class="fa fa-clock-o"></i>
			            				    <span><?=$lang_member[2278];?>/span>
			            				<? }else{ ?> 
			            				    <span id="<?=$key.$v["z_zone"]."_countdown_".$v["z_rob"];?>">
			            				      	-- : --
			            				       	<script>
			            				          	countdown_time('<?=$key.$v["z_zone"]."_".$v["z_rob"];?>', '<?=$key.$v["z_zone"]."_countdown_".$v["z_rob"];?>', '<?=$userDateTimeNow;?>', '<?=$v["z_close"];?>');
			            				        </script> 
			            				    </span> 
			            				<? } ?>
			            				</p>
			           			</div>
			        		</div>
			            </div>
			        </div>
			        <? } ?>
			    </div>
				<? } ?>

				<!-- รอบยี่กี่ -->
			</div>

				</div>

			</div>

  		</div>
	</div>
</div>

<form action="process/select_zone.php" method="post" id="form_send" class="auto-form" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onsuccess="SelectLottoZoneCallback" data-onfail="toastSaveError">
    <input type="hidden" id="zone_send" name="zone_send">
    <input type="hidden" id="rob_send" name="rob_send">
    <input type="hidden" id="name_send" name="name_send">
</form>