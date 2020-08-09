<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/changePassword.css?v=<?=time()?>">
<div id="FullBody">
	<div id="mainFullContain">
  <div id="FullBigotitle"> เปลี่ยนรหัสผ่าน </div>

  <form id="changePassForm" data-ajax="false" method="post">
      <table id="changPtable" cellspacing="0" cellpadding="0" data-role="none">
          <tbody>
            <tr>
                <td>
                    <input type="password" class="cPassInput" name='oldPass' id="oldPass" placeholder="รหัสผ่านเดิม" data-role="none" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" class="cPassInput" name='newPass' id="newPass" placeholder="รหัสผ่านใหม่" data-role="none" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" class="cPassInput" name='cPass' id="cPass" placeholder="ยืนยันรหัสผ่าน" data-role="none" required>
                </td>
            </tr>
            
          </tbody>
              
      </table>
       <input type="submit" class="input-button" id="input-button" value="บันทึก" name="submit" data-role="none">
    </form>

	
	</div>
</div>

<script>

/*iphone *********************************************/

  detechiphone();

  window.addEventListener("orientationchange", function() 
  {	
  		 detechiphone();
  });
  
  function detechiphone()
  {

  	 var deviceAgent = navigator.userAgent.toLowerCase();
	 var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
	 if (agentID) {
	 	$("#includePage1").css("-webkit-overflow-scrolling", "touch");

	 	var w = $( window ).width();
	   if(w<'375')
	   {
	   	setTimeout(function(){ 
	   		$('.cPassInput').width('90%');
	   	}, 300);

	   }else if(w>='375' && w<'667')
	   {
	   	// alert('iphone 6 or +')
	   	 setTimeout(function(){ 

	   	 	$('.cPassInput').width('92%');
	   	   
	        }, 300);
	   }else  if(w>='667'){

	   		 setTimeout(function(){ 	
	   	 		$('.cPassInput').width('92%');
	        }, 300);

	   }
	 } 

  }

   /*iphone *********************************************/



$(document).ready(function() { 
  
	setInterval(function(){ 
       setmainFullContainHeight();
   }, 100);
	console.log(screen.orientation.type); 
  // $("#mainFullContain").css("-webkit-overflow-scrolling", "touch");
  // $('#mainFullContain').css('overflowY', 'auto'); 
});


$("#changePassForm").on('submit',function(){
	
	var compareStatus=comparePassword();
	
	if(compareStatus==1)
	{
		confirmDialog('ยืนยันข้อมูล','ต้องการเปลี่ยนรหัสผ่านหรือไม่','checkPassword');
	}

	return false;
});

function checkPassword()
{
	var newPass =$('#newPass').val();
	$.post("data/changePass.php",{"mid":"<?php echo $_SESSION["mid"]; ?>","sPassword":newPass})
    		.done(function(data){
    		if(data['Status']=="1")
    			{
    				window.location.replace("http://m.lotzx.com/hun/index.php?p=logout");
    			}
    		})
}

function comparePassword()
{

  var oldPassword = "<?php echo $_SESSION["password"];?>";
  var oldPass =$('#oldPass').val();
  var newPass =$('#newPass').val();
  var cPass =$('#cPass').val();
  var compareStatus;
	if(oldPassword!=oldPass)
	{
		// alert('รหัสผ่านเดิมไม่ถูกต้อง');

		// alertDialog('ผิดพลาด','รหัสผ่านเดิมไม่ถูกต้อง');
		$('#oldPass').val('');
		$('#newPass').val('');
		$('#cPass').val('');
		// $('#oldPass').focus();

     setTimeout(function(){ 
       alertDialog('แจ้งเตือน','รหัสผ่านเดิมไม่ถูกต้อง');
     }, 500);

		compareStatus=0;
	}else if(newPass!=cPass)
	{
		// alert('รหัสผ่านใหม่ไม่ตรงกัน');
		// alertDialog('ผิดพลาด','รหัสผ่านใหม่ไม่ตรงกัน');
		$('#newPass').val('');
		$('#cPass').val('');
		// $('#newPass').focus();
     setTimeout(function(){ 
      alertDialog('แจ้งเตือน','รหัสผ่านใหม่ไม่ตรงกัน');
      
     }, 500);
		compareStatus=0;
	}else{
		compareStatus=1;
	}

	return compareStatus;

}

	
 function setmainFullContainHeight()
 {
    var includeBodyH = $('#FullBody').height();
    var mainFull = includeBodyH;
     $('#mainFullContain').height(mainFull);  
 } 

$("#login-form").submit(function(event) 
{
  comparePassword();

}); 


</script>