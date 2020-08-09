<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull2.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
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
	getBingo9FullData();
  console.log(screen.orientation.type); 
  // $('#mainFullContain').css('overflowY', 'auto!important'); 
  // $("#mainFullContain").css("-webkit-overflow-scrolling", "touch");

});
	
 // $( window ).resize(function() {

 //  	setmainFullContainHeight();

 //  });

 function getBingo9FullData()
 {
 	$.get( "data/getFull.php", {"zone":"1","mid":"<?php echo $_SESSION["mid"]; ?>" })
 	.done(function(Bingo9Full)
	{
    		showBillData9(Bingo9Full);
    		
    });
 	
 }

  function showBillData9(data)
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