<?
	session_start();
	header("Content-type: text/html");
	$cmd = $_GET['cmd'];

	require_once '../inc/lang.php';

    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

    if($_SESSION['m_id']==""){
    	?>
    	<script>
    		window.location.href = "logout.php";
    	</script>
    	<?
    	die();
    }
    if($_SESSION["zone_hun"] == ""){ // zone ค่าเริ่มต้น
		$_SESSION["zone_hun"] = 1;
	}

	if($_SESSION["rob_hun"] == "" || $_SESSION["rob_hun"] == 0){
		$_SESSION["rob_hun"] = 1;
	}

	$mid = $_SESSION["m_id"];
	$zone = $_SESSION["zone_hun"];
	$rob = $_SESSION["rob_hun"];

	$rec = sql_array("select * from bom_tb_config where con_id = 1;");
	
    	$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
		$ok_data=sql_array($sql);
		$time_end = $ok_data["o_limit_time"];

    $lottoCmd = array("t", "t2", "t3", "s", "laoset");
    if(in_array($cmd, $lottoCmd)){
    	if($rec["con_open_lotto_hun"]==0){ 
  			include("../lotto_doc/close_sa.php"); 
  			exit(); 
		}

		foreach($_SESSION['arid'] as $rid){
  			$r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  			if($r_open_page[9]==0){ 
    			include("../lotto_doc/close_ag.php");  
    			exit(); 
  			} 
		}

		$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);
		if($m_open_page[9]==0){ 
  			include("../lotto_doc/close_ag.php");
  			exit(); 
		}

		$lotzone_open = explode(",", $rec["con_open_lotto_hun_new"]);
	
		// if($time_end<$time_stam || $lotzone_open[$_SESSION["zone_hun"]]!="1"){
		// if($_SESSION["zone_hun"]!=1){
			if($time_end<$time_stam || $lotzone_open[$_SESSION["zone_hun"]]!="1"){
				include("../lotto_doc/close_time.php");
  				exit(); 
			} 
		// }
    }
    
	include ("../lotto_doc/$cmd.php");
?>
<script>
	<?if($zone == 3){?>
		$('#fm-laoset').show();
		$('#fm-t3').hide();
	<?}else{?>
		$('#fm-laoset').hide();
		$('#fm-t3').show();
	<?}?>
	if(typeof cInterval != 'undefined' && cInterval != null){
		clearInterval(cInterval); //  ล้าง interval นับถอยหลังหน้าแทงทุกครั้งที่โหลดหน้าใหม่
	}
</script>
<?
	if(in_array($cmd, $lottoCmd)){
		if($time_end>=$time_stam){
?>
			<script>
				//  interval นับถอยหลังหน้าแทงทุกครั้งที่โหลดหน้าใหม่
				var LottoTimeRemain = <?=$time_end-$time_stam;?>;
				var cInterval = setInterval(countdownLottoInPage, 1000);
				function countdownLottoInPage(){
					LottoTimeRemain--;
					if(LottoTimeRemain <= 0){
						clearInterval(cInterval);
						cInterval = null;
						window.location.reload();
					}
				}
			</script>
<?
		}
	}
?>