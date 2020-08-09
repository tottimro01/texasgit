var bIsAppleMobile = fnIsAppleMobile();


jQuery(document).ready(function($) {

	setStartScreen();
});

$( window ).on( "orientationchange", function( event ) {
	
	// if(window.matchMedia("(orientation: portrait)").matches)
	// {
	// 	// setTimeout(function(){ $('.hamburger').click(); }, 300);
		
	// 	$('.sidenav').removeClass('open');
 //  		$('.hamburger').removeClass('change');
 //  		$('body').css('overflow-y', '');
 //  		$('#main').removeClass('body-translate');
	// }
	$('.sidenav').removeClass('open');
  		// $('.hamburger').removeClass('change');
  		// $('body').css('overflow-y', '');
  		// $('#main').removeClass('body-translate');	
	set_orientationchange();
});

function fnIsAppleMobile() 
{
    if (navigator && navigator.userAgent && navigator.userAgent != null) 
    {
        var strUserAgent = navigator.userAgent.toLowerCase();
        var arrMatches = strUserAgent.match(/(iphone|ipod|ipad)/);
        if (arrMatches != null) 
             return true;
    } // End if (navigator && navigator.userAgent) 

    return false;
} // End Function fnIsAppleMobile




function getBrowserName() {
    var name = "Unknown";
    if($.browser.name.indexOf("MSIE")!=-1){
        name = "MSIE";
    }
    else if($.browser.name.indexOf("Firefox")!=-1){
        name = "Firefox";
    }
    else if($.browser.name.indexOf("Opera")!=-1){
        name = "Opera";
    }
    else if($.browser.name.indexOf("Chrome") != -1){
        name = "Chrome";
    }
     else if($.browser.name.indexOf("CriOS") != -1){
        name = "CriOS";
    }
    else if($.browser.name.indexOf("Safari")!=-1){
        name = "Safari";
    }
    // if(navigator.userAgent.indexOf("MSIE")!=-1){
    //     name = "MSIE";
    // }
    // else if(navigator.userAgent.indexOf("Firefox")!=-1){
    //     name = "Firefox";
    // }
    // else if(navigator.userAgent.indexOf("Opera")!=-1){
    //     name = "Opera";
    // }
    // else if(navigator.userAgent.indexOf("Chrome") != -1){
    //     name = "Chrome";
    // }
    //  else if(navigator.userAgent.indexOf("CriOS") != -1){
    //     name = "CriOS";
    // }
    // else if(navigator.userAgent.indexOf("Safari")!=-1){
    //     name = "Safari";
    // }
    return name;   
}


function setStartScreen()
{
	var browser_name = getBrowserName();
	if(bIsAppleMobile)  // is ios 
	{
		
		if(browser_name == "Safari")
		{
			if(navigator.userAgent.indexOf("CriOS") != -1){
				if(window.matchMedia("(orientation: portrait)").matches)
				{
					$('.box-container').css('height','100vh');
					$('#dialog_container').css('height','100vh');
				}else{
					$('.bot-Memu').css('height','calc(96vh)');
					$('.ovf_betlist').css('height','50px');
				}	
  			 	
  			}else{
  				$('.box-container').css('height','90vh');
  			}
			
			// alert(browser_name)
		}else{
			$('.box-container').css('height','100vh');
			$('#dialog_container').css('height','100vh');

		}	
	}else{ // not ios

		if(browser_name == "Chrome")
		{
			
			if(window.matchMedia("(orientation: portrait)").matches)
			{
				$('#dialog_container').css('height','calc(100vh - 60px)');
				$('.box-container').css('height','calc(100vh - 74px)');
				$('.bot-Memu').css('height','');	
				
			}else{
				$('.box-container').css('height','calc(100vh - 60px)');
				$('.bot-Memu').css('height','calc(100vh - 74px)');
				// $('#dialog_container').css('height','calc(100vh - 55px)');
				$('#dialog_container').css('height','100vh');
			}
		}else if(browser_name == "Opera")
		{	
			if(window.matchMedia("(orientation: landscape)").matches)
			{
				$('.ovf_betlist').css('height','70px');
				$('.bot-Memu').css('height','calc(100vh - 74px)');
			}
		}	


		
	}

}



function set_orientationchange()
{
	$("#bet_price").blur();
	// $('#dialog_box #d_button_ok').click();
	$('.bot-Memu').css('height','');
	var browser_name = getBrowserName();
	if(bIsAppleMobile)  // is ios
	{

		if(navigator.userAgent.indexOf("CriOS") != -1){
				if(window.matchMedia("(orientation: portrait)").matches)
				{
					$('.box-container').css('height','100vh');
					$('#dialog_container').css('height','100vh');
				}else{
					$('.bot-Memu').css('height','calc(96vh)');
					// $('.ovf_betlist').css('height','50px');
					$('.ovf_betlist').css('height','');
					$('.ovf_betlist').css('overflow','');
				}	
  			 	
  		}else{
  				$('.box-container').css('height','90vh');
  		}

		// if(browser_name == "Safari" && window.matchMedia("(orientation: portrait)").matches)
		// {
		// 	$('.box-container').css('height','90vh');
		// }else{
		// 	$('.box-container').css('height','100vh');
		// 	$('#dialog_container').css('height','100vh');

		// }

	}else{ //not ios

		if(window.matchMedia("(orientation: portrait)").matches)
		{
			if(browser_name == "Chrome")
			{
				$('.box-container').css('height','calc(100vh - 60px)');
				$('.bot-Memu').css('height','calc(100vh - 74px)');
				$('#dialog_container').css('height','calc(100vh - 55px)');
				// $('#dialog_container').css('height','calc(100vh - 74px)');
				// $('#dialog_container').css('height','calc(100vh - 55px)');

			}else if(browser_name == "Opera")
			{	
				$('.ovf_betlist').css('height','');
				$('.bot-Memu').css('height','');

			}else{
					$('.box-container').css('height','');
			}	

		}else{

			if(browser_name == "Chrome")
			{
				$('#dialog_container').css('height','calc(100vh - 55px)');
				// $('#dialog_container').css('height','100vh');
				// $('#dialog_container').css('height','calc(100vh - 55px)');
				// $('#dialog_container').css('height','100vh');
			}


			
		}
	
	}

	$('.box-container').css('padding-bottom','');
	$('.fa-sort-down').hide();
	$('.fa-sort-up').show();
	slug = 0;
}



var slug=0;
// $(document).on('click','.hideBtn',function(){
$('.hideBtn').on('click', function() {
	if(slug==0)
	{
		$('.fa-sort-down').show();
		$('.fa-sort-up').hide();
		slug = 1;
		$('.bot-Memu').css('height','200px');
		$('.box-container').css('padding-bottom','200px');
		// $('.box-container').css('margin-bottom','200px');


	}else{
		$('.fa-sort-down').hide();
		$('.fa-sort-up').show();
		$('.bot-Memu').css('height','');
		$('.box-container').css('padding-bottom','');
		
		slug = 0;
	}
	
})





$(document).on('input','.enNumberic',function(event){ 

   // var val=$(this).val();
   // val = val.replace(/[^a-zA-Z0-9)]/g, '');
   // $(this).val(val);
    // this.value = this.value.replace(/[^0-9]/g, '');
      $(this).val(function(index, value) {
        return value
        .replace(/\D/g, "")
        // .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        ;
      });
});



  

function _alert(_text)
{
	var html = '<div id="dialog_box">'+
				'<div id="d_message">'+
				'<p>'+_text+'</p>'+
				'</div>'+
				'<button id="d_button_ok" class="d_button"> ตกลง </button>'+
				'</div>';

	$('#dialog_container').text('');
	$('#dialog_container').html(html);				
	$('#dialog_container').show();
	$('#dialog_box #d_button_ok').show();

	$('#dialog_box #d_button_ok').on('click', function() {
		$('#dialog_box #d_message p').text('');
		$('#dialog_container').hide();
		$('#dialog_box #d_button_ok').hide();
	});


}



function _confirm(_text , yesCallback, noCallback)
{
	
	var html = '<div id="dialog_box">'+
				'<div id="d_message">'+
				'<p>'+_text+'</p>'+
				'</div>'+
				'<button id="dcf_button_ok" class="d_button"> ตกลง </button>'+
				'<button id="dcf_button_can" class="d_button"> ยกเลิก </button>'+
				'</div>';
				
	$('#dialog_container').text('');
	$('#dialog_container').append(html);	
	$('#dialog_container').show();		
	$('#dialog_box #d_message p').text('');
	$('#dialog_box #d_message p').text(_text);
	$('#dialog_box #dcf_button_ok').show();
	$('#dialog_box #dcf_button_can').show();

	$('#dcf_button_ok').click(function(e) {
		$('#dialog_container').hide();
		$('#dialog_box #d_message p').text('');
		$('#dialog_box #dcf_button_ok').hide();
		$('#dialog_box #dcf_button_can').hide();
        yesCallback();
    });
    $('#dcf_button_can').click(function(e) {
    	$('#dialog_container').hide();
    	$('#dialog_box #d_message p').text('');
		$('#dialog_box #dcf_button_ok').hide();
		$('#dialog_box #dcf_button_can').hide();
       noCallback();

    });


}

$('#test').on('click', function() {  // วิธีการใช้ _confirm
	_confirm('Are you sure you want to do this?',
 		function() {
 		    alert(1)
 		},
 		function() {
 		    alert(2)
 		}
	);
});


