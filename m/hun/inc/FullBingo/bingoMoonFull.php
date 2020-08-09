<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull2.css?v=<?=time()?>">
<div id="FullBody">
	<div id="FullBigotitle" class="garyGradient"> เลขเต็ม </div>
	<div id="mainFullContain">
		<!-- <div class="lot_typeTitle"> <span class="lot_type">3บน</span> </div>
		<div class="lot_body"> 
				<div class="lot_body_text">
					555
				</div>
		</div> -->
	</div>
</div>

<script>

$(document).ready(function() { 

	setInterval(function(){ 
       setmainFullContainHeight();
   }, 100);
	getBingoMoonFullData();
  console.log(screen.orientation.type); 
});
	
 // $( window ).resize(function() {

 //  	setmainFullContainHeight();

 //  });

 function getBingoMoonFullData()
 {
 	$.get( "data/getFull.php", {"zone":"3","mid":"<?php echo $_SESSION["mid"]; ?>" })
 	.done(function(Bingo9Full)
	{
    		showBillDataMoon(Bingo9Full);
    		
    });
 	
 }

  function showBillDataMoon(data)
  {
  	var htmlText="";
  	$('#mainFullContain').text(' ');
  	for(var i=0; i<data.length; i++)
  	{
  		var lot_txt= " ";
  		if(data[i]['lot_txt']=="")
  		{
  			lot_txt='';
  		}else{
  			lot_txt=data[i]['lot_txt'];
  		}
  	
  		htmlText +='<div class="lot_typeTitle">'+
  							'<span class="lot_type">'+
  									data[i]['lot_type']+
  							'</span> </div>'+
					'<div class="lot_body"> '+
						'<div class="lot_body_text">'+
							lot_txt+
						'</div>'+
					'</div>';
	}	
		$('#mainFullContain').append(htmlText);		
  }
	
 function setmainFullContainHeight()
 {
    var includeBodyH = $('#FullBody').height();
    var mainFull = includeBodyH-48;
     $('#mainFullContain').height(mainFull);  
 } 

</script>