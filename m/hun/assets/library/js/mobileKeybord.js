$(document).ready(function(){

	$('body').height($(window).height());


	var isChangeOrientation = false;
	var _originalSize = $(window).width() + $(window).height();

	includePage1Height();

	// setTimeout(function(){
	// 		includePage1Height();	
	// }, 500);


window.addEventListener("orientationchange", function() 
{	
	
  		$('input,textarea').blur();
  		isChangeOrientation = true;
	

});


$( window ).resize(function() {
	// alert()
		if( isChangeOrientation == true)
		{
			setTimeout(function(){
			$('input,textarea').blur();
			$('body').height($(window).height());
			includePage1Height();
			isChangeOrientation = false;
			_originalSize= $(window).width() + $(window).height();
		}, 300);
			
		}
		console.log('****************************');
		console.log('ce_originalSize' +($(window).width() + $(window).height()))
		console.log('_originalSize '+_originalSize);
		if($(window).width() + $(window).height() != _originalSize)
		{
			$('#bottomMenu').hide();
		
		}else{
			$('#bottomMenu').show();
		}
});
// }).resize();


$(window).on('beforeunload', function(){

    $('input,textarea').blur();
    
});

function includePage1Height()
{
	$('#bottomMenu').show();
	var mainTitleHeight,bottomMenuHeight,windowH,incH;

	 	mainTitleHeight = $('#main').outerHeight();
	 	bottomMenuHeight = $('#bottomMenu').outerHeight();
	 	windowH = $(window).height();
	 	incH = windowH-(mainTitleHeight+bottomMenuHeight);
 	  	console.log('mainTitleHeight'+mainTitleHeight)
 	  	console.log('bottomMenuHeight'+bottomMenuHeight)
 	  	console.log('windowH'+windowH)
 	  	console.log('incH'+incH)
 	  	// $('#includePage1').height(incH);
			
}


});