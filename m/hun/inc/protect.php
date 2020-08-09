<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/protect.css?v=<?=time()?>">
<div id="FullBody">
  <div id="title"> ป้องกัน </div>


<div class="boxContainer">
	<div class="OpenContainer" id='OpenContainer1'>
		 <img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_redio_u.png" alt="" onclick="switchRadio('1')">
		 <div class="text">เปิด</div>
	</div>
	<div class="OpenContainer"  id='OpenContainer2'>
		 <img src="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_redio_u.png" alt="" onclick="switchRadio('2')">
		<div class="text">ปืด</div>
	</div>
</div> 

<div id="inputSubpass" style="display: none;">
	<input type="tel" id="suppassText" data-role="none">
    <button id="addBtn"> บันทึก </button>
</div>
<!-- http://202.162.78.180:81/live/xxx/index.m3u8 -->
 <video id="vdoplayer" class="native" controls width="100%" height="200px" preload="metadata" webkit-playsinline="true" playsinline="true">
      <!-- <source type="application/x-mpegURL" src="http://61.91.12.34:1935/live/smil:tv5adaptive.smil/playlist.m3u8"> -->
      <source type="application/x-mpegURL" src="http://202.162.78.180:81/live/xxx/index.m3u8">
      <source type="application/x-mpegURL">
      <source type="video/x-flv" src="mp4:stsp">
  </video>


</div>

<script>

checkSubpassRemove();


$(document).ready(function() { 

	setInterval(function(){ 
       setmainFullContainHeight();
   }, 100);
	// getBingo9FullData();

});

 function setmainFullContainHeight()
 {
    var includeBodyH = $('#FullBody').height();
    var mainFull = includeBodyH-48;
     $('#mainFullContain').height(mainFull);  
 } 



var a='';
$(document).on('click','#addBtn',function(){ //เมื่อกดบันทึก

  var Subpass=$('#suppassText').val();
  localStorage.setItem("subpassword", Subpass);
  alertDialog('','บันทึกสำเร็จ');

});



function checkSubpassRemove()
{
	 var mid="<?php echo $_SESSION["mid"] ?>"
 	 localStorage.setItem("mid", mid);
  	// localStorage.setItem("mid", '2');


	if(localStorage.getItem("switchRadioNum")==null)
	{
		switchRadio('2');
	}else if(localStorage.getItem("switchRadioNum")=='1')
	{
		switchRadio('1');
	}else if(localStorage.getItem("switchRadioNum")=='2')
	{
		switchRadio('2');
	}
 	var sessionMid = "<?php echo $_SESSION["mid"] ?>";
 	var localMid = localStorage.getItem("mid");
 	if(sessionMid!=localMid) //กรณั login user อื่น ให้ reset ค่าทั้งหมด
 	{
 		// alert('remove')
 		localStorage.removeItem("subpassword");
 		localStorage.removeItem("mid");
 		localStorage.removeItem("switchRadioNum");
 		$('#suppassText').val('');
 		switchRadio('2');
 	}else
 	{
 		// alert('suc')
 	}
 	$('#suppassText').val(localStorage.getItem("subpassword"));
 	// console.log('local-subpassword :'+localStorage.getItem("subpassword"))
 	// console.log('local-mid : '+localStorage.getItem("mid"))
}



function switchRadio(number)
{
	if(number=='1')
	{
		$('#OpenContainer1').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_redio_active.png')
		$('#OpenContainer2').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_redio_u.png')
		localStorage.setItem("switchRadioNum", '1');
		// console.log('switchRadioNum : '+localStorage.getItem("switchRadioNum"))
		$('#inputSubpass').show(); // แสดง input box
		$('#suppassText').val(localStorage.getItem("subpassword")); // กำหนดค่าเริ่มต้นเดิมให้ input

	}else{
		$('#OpenContainer2').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_redio_active.png')
		$('#OpenContainer1').children('img').attr('src','<?php echo $_SESSION["includeUrl"]; ?>/assets/library/img/icon_redio_u.png')
		localStorage.setItem("switchRadioNum", '2');
		// console.log('switchRadioNum : '+localStorage.getItem("switchRadioNum"))
		$('#inputSubpass').hide();
	}
}
</script>