<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/getZone.css?v=<?=time()?>">
<div class="zoneContainer">
	<!-- <?php echo $_SESSION["pageIncZone"]; ?> -->

	<?php 
		//เลขเต็ม
		if($_SESSION["pageIncZone"]=="getFull")
		{
			$box1Link = $_SESSION["includeUrl"]."/index.php?p=bingoMoonFull"; 
			$box2Link = $_SESSION["includeUrl"]."/index.php?p=bingo9Full"; 
			$box3Link = $_SESSION["includeUrl"]."/index.php?p=bingoMchFull"; 
		}else if($_SESSION["pageIncZone"]=="bet") //เลขเต็ม
		{
			$box1Link = $_SESSION["includeUrl"]."/index.php?p=bingoMoonBet&zone=3"; 
			$box2Link = $_SESSION["includeUrl"]."/index.php?p=bingo9Bet&zone=1"; 
			$box3Link = $_SESSION["includeUrl"]."/index.php?p=bingoMchBet&zone=2"; 
		}else if($_SESSION["pageIncZone"]=="special") //เลขเต็ม
		{
			$box1Link = $_SESSION["includeUrl"]."/index.php?p=bingoMoonSpecial&zone=3"; 
			$box2Link = $_SESSION["includeUrl"]."/index.php?p=bingo9Special&zone=1"; 
			$box3Link = $_SESSION["includeUrl"]."/index.php?p=bingoMchSpecial&zone=2"; 
		}

	 ?>

	<div id="box1" style="width: 40%; display: inline-block; margin-left: 5%; margin-right: 5%; margin-top: 15px;">
		<a href="<? echo $box1Link; ?>" data-ajax="false">
			<div class="zoneTile"> <span style='color:#333'>???? </span></div>
			<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/img_default_zone.png"  style="width:100%;" alt="">
		</a>
		
	</div>
	<div id="box2" style="width: 40%; display: inline-block; margin-left: 5%; margin-top: 15px;">
		<a href="<? echo $box2Link; ?>" data-ajax="false">
			<div class="zoneTile"> <span style='color:#333'>???? </span> </div>
			<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/img_default_zone.png"  style="width:100%;" alt="">
		</a>
	</div>
	<div id="box3" style="width: 40%; display: inline-block; margin-left: 5%; margin-top: 15px;">
		<a href="<? echo $box3Link; ?>" data-ajax="false">
			<div class="zoneTile"> <span style='color:#333'>???? </span> </div>
			<img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/img_default_zone.png"  style="width:100%;" alt="">
		</a>
	</div>
	

</div>



<script>
$(document).ready(function(){
console.log(screen.orientation.type);
});
$('#loading').show();	

$.get( "<?php echo $_SESSION["includeUrl"]; ?>/data/getZone.php").done(function( data ){
      
      console.log(data)
      $('#box1 a').html('<div class="zoneTile">'+data[0]['lot_name']+'</div> <img src="'+data[0]['lot_pic']+'" style="width:100%;">');
      $('#box2 a').html('<div class="zoneTile">'+data[1]['lot_name']+'</div> <img src="'+data[1]['lot_pic']+'" style="width:100%;">');
      $('#box3 a').html('<div class="zoneTile">'+data[2]['lot_name']+'</div> <img src="'+data[2]['lot_pic']+'" style="width:100%;">');

      $('#loading').hide(); 

}); 


</script>