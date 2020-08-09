// $('.hamburger').on('click', function() {
// 	if($('.sidenav').width() <= 0) {
//     $('.sidenav').addClass('open');
//     $('.hamburger').addClass('change');
//     $('body').css('overflow-y', 'hidden');
//     $('#main').addClass('body-translate');
//   }else {
//     $('.sidenav').removeClass('open');
//     $('.hamburger').removeClass('change');
//     $('body').css('overflow-y', '');
//     $('#main').removeClass('body-translate');
//   }

// });

var openSlug = 0;
$('.hamburger').on('click', function() {
    if(openSlug == 0)
    {
        $('.sidenav').addClass('open1');
        $('#main').addClass('body-translate');
        $('.hamburger').addClass('change');
        $('body').css('overflow-y', 'hidden');
        $('.box-container').css('overflow', 'hidden');
        $('.overflow-data').css('overflow', 'hidden');
        
        openSlug =1;

    }else{
        $('.sidenav').removeClass('open1');
         $('.hamburger').removeClass('change');
         $('body').css('overflow', '');
         $('#main').removeClass('body-translate');
         $('.box-container').css('overflow', '');
          $('.overflow-data').css('overflow', '');
          openSlug =0;
    }
    

});




$( window ).on( "orientationchange", function( event ) {
   
});
