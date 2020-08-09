$(document).ready(function($) {
  //setup carousel
  let carousel_width = $('.carousel').width();
  let threshold_width = carousel_width / 2;

  let items = $('.carousel .carousel-items');
  let items_count = items.length;
  $(items[0]).addClass('items-active');

  let items_indicator = $('.items-indicator');
  setIndicator(0);

  $.each(items, function(index, val) {
    $(this).attr('data-items-index', index);
    $(items_indicator[index]).attr('data-id', index);
  });

  for(var i=1; i < items_count; i++) {
    $(items[i]).addClass('items-right');
  }

  let item_active = null;
  let nextIdx = null;
  let next_item = null;
  $(".swiper").swipe({
    swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection)
    {
      //Here we can check the:
      //phase : 'start', 'move', 'end', 'cancel'
      //direction : 'left', 'right', 'up', 'down'
      //distance : Distance finger is from initial touch point in px
      //duration : Length of swipe in MS
      //fingerCount : the number of fingers used

      if (phase == "start") 
      {
        $('.carousel-items').css('transition', 'all 0ms');
        item_active = $('.items-active');
      }

      //swiping
      if (phase == "move") 
      {
        if(direction == 'right' || direction == 'left') {

          let active_id = parseInt($(item_active[0]).attr('data-items-index'));
          nextIdx = direction == "right" ? (active_id - 1) : (active_id + 1);
          
          if(nextIdx > (items_count - 1))
            nextIdx = items_count - 1;

          if(nextIdx < 0)
            nextIdx = 0; 
    
          next_item =  $('.carousel-items[data-items-index="'+nextIdx+'"]');

          if(direction == 'right') {
            if(item_active[0] !== next_item[0]){
              $(item_active[0]).css('transform', 'translate3d('+(distance)+'px,0,0');
              $(next_item[0]).css('transform', 'translate3d('+ (distance - carousel_width) +'px,0,0');
            }
          }
          else if(direction == 'left') {
            if(item_active[0] !== next_item[0]){
              $(item_active[0]).css('transform', 'translate3d('+ (-distance) +'px,0,0');
              $(next_item[0]).css('transform', 'translate3d('+ (carousel_width - distance) +'px,0,0');              
            }
          }
        } 
      }

      //swipe cancel
      if (phase=="cancel") 
      {
        $(item_active[0]).css('transform', '');

        if(next_item !== null)
          $(next_item[0]).css('transform', '');
      }

      //swipe end
      if (phase=="end")
      {
        if(direction == "right") {
          $(item_active[0]).css('transform', '');
          $(item_active[0]).removeClass('items-active');
  
          if(!$(item_active[0]).hasClass('items-right'))
            $(item_active[0]).addClass('items-right')
  
        }else if(direction == "left") {
          $(item_active[0]).css('transform', '');
          $(item_active[0]).removeClass('items-active');
  
          if(!$(item_active[0]).hasClass('items-left'))
            $(item_active[0]).addClass('items-left')
        } 
        
        if(next_item !== null) {
          $(next_item[0]).css('transform', '');
          $(next_item[0]).removeClass('items-left');
          $(next_item[0]).removeClass('items-right');
          $(next_item[0]).addClass('items-active');
          setIndicator($(next_item[0]).attr('data-items-index'));

          let _type = $(items_indicator[$(next_item[0]).attr('data-items-index')]).attr('data-type');
          if(_type !== undefined)
          {
            $('#lotto-type').attr('data-type', _type);
          }
        }
      }

      //swipe end or calcel
      if (phase=="cancel" || phase=="end") {
        $('.carousel-items').css('transition', '');
          item_active = null;
          nextIdx = null;
          next_item = null;
          } 
      },
    threshold: threshold_width,
    maxTimeThreshold: 5000,
    fingers:'all',
    allowPageScroll: 'vertical',
  });

  function setIndicator(_index) {
    $(items_indicator).children('*[name="radio"]').removeClass('radio-indicator-select-active');
    $(items_indicator).children('*[name="text"]').removeClass('radio-indicator-text-active');

    $(items_indicator[_index]).children('*[name="radio"]').addClass('radio-indicator-select-active');
    $(items_indicator[_index]).children('*[name="text"]').addClass('radio-indicator-text-active');
  }

  $('.items-indicator').on('click', function(event) {
    event.preventDefault();

    var _id = parseInt($(this).attr('data-id'));
    setIndicator(_id);

    $.each(items, function(index, val) {
      $(this).removeClass('items-active');
      if(parseInt($(this).attr('data-items-index')) < _id)
      {
        $(this).removeClass('items-right');
        $(this).addClass('items-left');
      }

      else if(parseInt($(this).attr('data-items-index')) > _id)
      {
        $(this).removeClass('items-left');
        $(this).addClass('items-right');
      }

      else if (parseInt($(this).attr('data-items-index')) == _id) {
        $(this).removeClass('items-right');
        $(this).removeClass('items-left');
        $(this).addClass('items-active');
      }
    });
  });
}); 