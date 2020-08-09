 <?php session_start(); ?>
<!-- <?php echo $_SESSION["mid"]; ?> -->
<link rel="stylesheet"  href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/slideStyle.css?v=<?=time()?>">
<link rel="stylesheet"  href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet"  href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/list.css?v=<?=time()?>">
<div id="homeBody">
  <div id="homeTitle" class="garyGradient"> 
        <div id="ubHomeTitle">
               <div id="selectDate">
                <select class="garyGradient selectBoxStyle" id="DateselectBox" data-role="none" onchange="setSlecctDate($(this).val()); getBillData($(this).val()); getBillData9($(this).val());  getBillDataMch($(this).val());"></select> 
               </div>

              
        </div>   

        <div id="landscapeSelectDate"> 
          <select class="garyGradient selectBoxStyle" id="DateselectBoxL" data-role="none" onchange="setSlecctDate($(this).val()); getBillData($(this).val()); getBillData9($(this).val()); getBillDataMch($(this).val());"></select>  
        </div>
        
        <div class="SlidePagination">
            <div class="swiper-pagination" > </div>
        </div>
  </div>
 
 
     <!-- Swiper -->
    <div class="swiper-container maxHeight">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><? include("list/listBingoMoon.php"); ?></div>
            <div class="swiper-slide"><? include("list/listBingo9.php"); ?> </div>
            <div class="swiper-slide"><? include("list/listBingoMch.php"); ?></div>
        </div>
        <!-- Add Pagination -->
      
    </div>
  


</div>




    <!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });





$(document).ready(function() { 


/*iphone *********************************************/

  var deviceAgent = navigator.userAgent.toLowerCase();
  var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
  if (agentID) {
      if(navigator.userAgent.match('CriOS'))
      {
        /* chrome ios no pulldow reload*/
          window.addEventListener('load', function() {
          var preventPullToRefreshCheckbox = document.getElementById('preventPullToRefresh');

          var maybePreventPullToRefresh = false;
          var lastTouchY = 0;
          var touchstartHandler = function(e) {
            if (e.touches.length != 1) return;
            lastTouchY = e.touches[0].clientY;
            // Pull-to-refresh will only trigger if the scroll begins when the
            // document's Y offset is zero.
            maybePreventPullToRefresh = window.pageYOffset == 0;
                
          }

          var touchmoveHandler = function(e) {
            var touchY = e.touches[0].clientY;
            var touchYDelta = touchY - lastTouchY;
            lastTouchY = touchY;

            if (maybePreventPullToRefresh) {
              // To suppress pull-to-refresh it is sufficient to preventDefault the
              // first overscrolling touchmove.
              maybePreventPullToRefresh = false;
              if (touchYDelta > 0 || touchYDelta < 0) {
                e.preventDefault();
                return;
              }
            }
          }

          document.addEventListener('touchstart', touchstartHandler, {passive: false });
          document.addEventListener('touchmove', touchmoveHandler, {passive: false });
        });
      }
        checkIphoneHeight(); 
         $( window ).resize(function() {
            setTimeout(function(){ 
           
              if(window.orientation=='90')
              {
                 $('.swiper-container').css('height','250px');
              }else{
                checkIphoneHeight();
              }
                  setTextSlidePagination();
                  actPanginaText();
             }, 100);

         });


         function checkIphoneHeight()
         {
            if(window.innerHeight<='568')
            {
              $('.swiper-container').css('height','300px');
            }else if(window.innerHeight<='667')
            {
              $('.swiper-container').css('height','350px');
            }
            else if(window.innerHeight<='736')
            {
              $('.swiper-container').css('height','410px');
            }
         }
 
  } 
   /*iphone *********************************************/



   setInterval(function(){ 
       actPanginaText();
       setHeightSlide();
   }, 100);

  setTextSlidePagination();
  sethomeBodySize();
  


  // console.log(screen.orientation.type)
  var homeHeight = window.innerHeight;
  var homeWidth = window.innerWidth;




  

  $( window ).resize(function() {

     homeHeight = window.innerHeight;
     homeWidth = window.innerWidtht;
    sethomeBodySize();
    setHeightSlide();

  setTimeout(function(){ 
        setTextSlidePagination();
        actPanginaText();
   }, 100);


  });

     function sethomeBodySize()
    {
     // set width height home body กรอบนอก
     if(screen.orientation.type=='landscape-primary')
     {
       homeHeight -=90;
       $('#homeBody').height(homeHeight);
       // console.log(homeHeight)

     }else if(homeWidth<=320)
     {
       homeHeight -=90;
       $('#homeBody').height(homeHeight);
       // console.log(".."+homeHeight)

     }else{

       homeHeight -=120;
       $('#homeBody').height(homeHeight);
       // console.log(homeWidth)
       // console.log(homeHeight)
     }

   }

})

    //กำหนดข้อความให้ วงกลมเขียวๆ ของไสลด์
      function setTextSlidePagination()
      {
        var swtext = ["รายวัน", "ช่อง 9", "Moeny Channel"];

        $( ".swiper-pagination-bullet" ).wrap( "<div class='swiperBox'></div>" );

        for(var i = 0; i<3; i++)
        {
           $('.swiper-pagination-bullet:eq('+i+')').after().html('<div class="swiperPText">'+swtext[i]+'</div>');
        }
       
       // ย้าย element จากด้นในมาด้านนอก
        $('.swiperPText').each(function() {
          $(this).insertAfter($(this).parent());
        })

      }

       //กำหนดความสูงของ สไลด์
      function setHeightSlide()
      {
        var homeBodyH = $('#includePage1').height();
        var homeTitle = $('#homeTitle').height();
        var swiperpagination = $('.swiper-pagination').height();
        var selectDate =$('#selectDate').height();
        // console.log('homeBodyH '+homeBodyH)
        // console.log('homeTitle '+homeTitle)
        // console.log('swiperpagination '+swiperpagination)
        // console.log('selectDate '+selectDate)
        var listBoxData;


         var swiperwrapperHeight = homeTitle+swiperpagination;
        swiperwrapperHeight = homeBodyH-swiperwrapperHeight;
        if(screen.orientation.type!='landscape-primary')
        {
          // swiperwrapperHeight-=selectDate+8;
          swiperwrapperHeight+=40;
          listBoxData =65;
        }else{
          swiperwrapperHeight+=60;
          listBoxData=85;
        }
       
        $('.swiper-container').height(swiperwrapperHeight);  
        $('.listBoxData').height(swiperwrapperHeight-listBoxData);  
        
      }


// แสดงข้อมูล

// แสดงข้อมูล

$.get( "data/getDate.php",function( data ){
      loadDateShow(data);
      // loadBingo(""+data[0]['strDate']+"");

});   

function loadDateShow(data)
{
  var dataLength = data.length;
  
  for(var i=0; i<dataLength; i++)
  {
    var thDate = convertTHDate(data[i]['strDate']);
    $('#DateselectBox').append( '<option value="'+data[i]['strDate']+'">'+thDate+'</option>' );
    $('#DateselectBoxL').append( '<option value="'+data[i]['strDate']+'">'+thDate+'</option>' );
  }
}

function setSlecctDate(e)
{
  $('#DateselectBox').val(e);
  $('#DateselectBoxL').val(e);
}

</script>