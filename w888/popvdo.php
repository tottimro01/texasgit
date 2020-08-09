<? //if($_SESSION["crid1"]==1){ 

$url_file2="json/news/lotto.json";	
$ok_js2=file_get_contents2($url_file2);
$ok_bet2 = json_decode2($ok_js2, true);
	

/*$d_now_lotmoon = date("d-m-Y");
	
	
$rs_now_lotmoon = sql_array("SELECT * FROM `bom_tb_lotto_ok` WHERE `lot_zone` = 19 and `o_number` = '' and `ok_date` = '$d_now_lotmoon' order by lot_rob asc limit 1");*/
	
?>
<link rel="stylesheet" href="js/videojs/video-js.min.css">    
<script src="js/videojs/video.min.js"></script>
<!-- <script src="js/videojs/videojs-flash.min.js"></script> -->
<script src="js/videojs/videojs-contrib-hls.min.js"></script>
<style>
.video-js .vjs-fullscreen-control{
    margin-left: auto;
}
</style>
<style>
.fancybox-title-float-wrap {
    position: absolute;
    top: 0;
    right: 50%;
    margin-top: -35px;
    z-index: 8050;
    text-align: center;
}
</style>
<a id="various1" href="#inline1" title="หวยรายวันกำลังออกผล" style="display: none;">Inline</a>
    <script type="text/javascript">
		<? foreach($lot_robmun as $key_pop => $val_pop){ 
				$file_pop = "json/lotto/ok/ok_19_".$key_pop.".json";
				$arr_pop = json_read($file_pop);
	
				
	
				$time_end[$key_pop] = strtotime($arr_pop[0]["ok_date"]." ".$val_pop)-time();
	
				if($_SESSION["show_pop"][$key_pop]==""){
					$_SESSION["show_pop"][$key_pop] = 1;
				}
	
				if($time_end[$key_pop]<=-60){
					$_SESSION["show_pop"][$key_pop] = 2;
				}
	
		?>
		var show_pop_v_<?=$key_pop?> = <?=$_SESSION["show_pop"][$key_pop]?>;
		var countDownDate_pop<?=$key_pop?> = <?=$time_end[$key_pop]?>;
		
		
		<? } ?>
		
		

		var x_pop1 = setInterval(function() {
			<? foreach($lot_robmun as $key_pop => $val_pop){ ?>
			if(countDownDate_pop<?=$key_pop?>>-60){
				countDownDate_pop<?=$key_pop?> = countDownDate_pop<?=$key_pop?>-1;
			}
			if(show_pop_v_<?=$key_pop?>==1 && countDownDate_pop<?=$key_pop?><15){
				
				$("#various1").fancybox({
						  afterShow: function() {
							  set_session_pop(<?=$key_pop?>);
							  next_rob_moon = <?=$key_pop+1?>;
							  next_name_moon = "<?=$lot_zone["th"][19]." รอบ ".$lot_robmun[$key_pop+1]?>";
							},
						   beforeLoad: function() {
							this.title = "<?=$lot_zone["th"][19]."รอบ ".$lot_robmun[$key_pop]?> กำลังออกผล";
						   },
						helpers : {
							title : {
								
								position : 'top'
							}
						}
					  }).trigger('click');
				show_pop_v_<?=$key_pop?> = 2;
			}
			
			
			<? } ?>
			
			//console.log(countDownDate_pop1 , countDownDate_pop2 , countDownDate_pop3 , countDownDate_pop4 , countDownDate_pop5 , countDownDate_pop6 , countDownDate_pop7 , countDownDate_pop8 , countDownDate_pop9 , countDownDate_pop10 , countDownDate_pop11);
			/*if(show_pop_v==0 && (countDownDate_pop1==10 || countDownDate_pop2==10 || countDownDate_pop3==10 || countDownDate_pop4==10 || countDownDate_pop5==10 || countDownDate_pop6==10 || countDownDate_pop7==10 || countDownDate_pop8==10 || countDownDate_pop9==10 || countDownDate_pop10==10 || countDownDate_pop11==10)){
				$("#various1").fancybox({
						  afterClose: function() {
							  show_pop_v = 0;
							}
					  }).trigger('click');
				show_pop_v = 1;
			}*/
			
			
		}, 1000);
		
		var next_rob_moon = 0;
		var next_name_moon = "";

    $(document).ready(function() {
		/*$("#various1").fancybox({
						  afterShow: function() {
							  next_rob_moon = 12;
							  next_name_moon = "หวยรายวัน รอบ 17:00";
							},
						   beforeLoad: function() {
							this.title = "หวยรายวันรอบ 17.00 กำลังออกผล";
						   },
						helpers : {
							title : {
								
								position : 'top'
							}
						}
					  }).trigger('click');*/
		
     });
		function set_session_pop(val){
			$.ajax({
				type: "POST",
				url: "set_popvdo.php",
				data: { "ke": val},
				dataType:"json",
				cache: false,	// Clear cache IE
				beforeSend: function(){
					
				},
				success: function(data){
				}
			});
		}
		function go_hunmoon(){
			if(next_rob_moon>0 && next_rob_moon<12){
			parent.topx.goMain3('main_lothun.php?tlot=2ud&zone_send=19&rob_send='+next_rob_moon+'&name_send='+next_name_moon,'#chun_link','<?=$lang_member[36];?> : <?=$ok_bet2[0]['n_note'];?>','message_lotto.php'); 
				parent.leftx.location.href="left_hun.php"; 
			}else{
				alert("หวยรายวันออกผลครบทุกรอบแล้ววันนี้ รอบพรุ่งนี้จะเริ่มเวลา 11.00 น.");
			}
		}
    </script>

    	<div style="display: none;">
		<div id="inline1" style="width:400px;height:350px;overflow:auto;">
            <div style="width: 400px; height: 50px; background: black; cursor: pointer;" onClick="go_hunmoon();">
            <img src="img/banner2.gif" /></div>
            <?
            $w="400";
            $h="300";
            #$url="rtmp://202.162.78.180/live/xxx";
            // include 'lothun/streaming.php';
            ?>

<div  class="video-js-box hu-css">
<video id="stream_vdo" class="video-js " style="width:<?=$w;?>px; height:<?=$h;?>px;">
    <!-- <source src="<?=$streaming;?>" type="rtmp/mp4" /> -->
    <source src="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8"
     type="application/x-mpegURL" />

</video>
<script>
    var player = videojs('stream_vdo', {
        // techOrder: ["flash"],
        controls: true,
        preload: "auto",
        controlBar: {
            progressControl: false,
            currentTimeDisplay: false,
            timeDivider: false,
            durationDisplay: false,
            remainingTimeDisplay: false,
            pictureInPictureToggle: false,
        },
    });
    player.ready(function(){
    // var videojsPromise = player.play();
    //     if (videojsPromise !== undefined) {
    //         videojsPromise.then(function() {
    //             // Autoplay started!
    //         }).catch(function(error) {
    //             console.log(error)
    //             // Autoplay was prevented.
    //         });
    //     }
    });
</script>
</div>	
			<!-- <script src="js/jwscript.js?x=1.4.48"></script> -->
			<!-- <script>
				jwplayer.key = '65FhM7BdiMpzpZJn1yW+KBxXwba2FH8HUJ3xu4ubdBQ=';
				jwplayer.jwpsrv.setSampleFrequency(0.0001);
			</script> -->
			<!-- <center>
			<div id="myElement_wrapper" style="position: relative; display: block;width:400px;height:300px;z-index:999; margin-top:0px; background-color: black;">
			<object type="application/x-shockwave-flash" style="z-index:999;" data="js/jwplayer.flash.swf" width="400px" height="300px" bgcolor="#000000" id="myElement_pop" name="myElement_pop" tabindex="0">
			<param name="allowfullscreen" value="true">
			<param name="allowscriptaccess" value="always">
			<param name="seamlesstabbing" value="true">
			<param name="wmode" value="opaque">
			</object>
			<div id="myElement_aspect" style="display: none;"></div>
			<div id="myElement_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div>
			</div>
			</center> -->
			<!-- <script type="text/javascript">
			jwplayer('myElement_pop').setup({
			file: 'rtmp://202.162.78.181/live/myd',
			 controls : true,
			width: "400",
			height: "300",
			repeat: 'true',
				autostart: 'true'
			});

			</script> -->
		</div>
	</div>
<?// } ?>