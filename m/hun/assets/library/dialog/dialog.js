var isModal = false;
var modal = $('#myModal');

function confirmDialog(title,text,fnc){

    $('#submitDialog').attr('onclick','SubmitModalPanel('+fnc+')');
    $('.modal-content p').text(title);
    $('.modal-content span').text(text);
    $('#myModal').css('display', 'block');
	   setModalVerticalPos();
    isModal = true;
}

function alertDialog(title,text){
  
    $("input, textarea").blur();   
    $('.modal-content p').text(title);
    $('.modal-content span').text(text);
    $('#myModal1').css('display', 'block');
     setModalAlertVerticalPos();
    isModal = true;
}

function SubmitModalPanel(_func){
    _func();
    CloseModalPanel();
}

function CloseModalPanel(){
    $('#myModal').css('display', 'none');
    $('#myModal1').css('display', 'none');
    isModal = false;
}

$(window).bind('resize', function (e)
{
	setTimeout(function(){
		setModalVerticalPos();
		setModalAlertVerticalPos();
	}, 300)
});

function setModalVerticalPos()
{
  var h = $(window).height();
  var modal =$('.modal-content').height();
  h = (h/2)-(modal/2)-20;
  $('#myModal').children('.modal-content').css('margin-top', h);
  $('#myModal1').children('.modal-content').css('margin-top', h);
  console.log($('.modal-content').height())
  console.log($(window).height())

}

function setModalAlertVerticalPos()
{
  var h = $(window).height();
  var modal =$('.modal-content').height();
  h = (h/2)-(modal/2)-100;
   	$('#myModal').children('.modal-content').css('margin-top', h);
  	$('#myModal1').children('.modal-content').css('margin-top', h);         
  console.log('h : '+h)
  console.log(' ss '+$('.modal-content').height())
  console.log('ss '+$(window).height())
}