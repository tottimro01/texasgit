
//you don't need this, just used for changing background
jQuery(function($) {
    $('#btn-login-dark').on('click', function(e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
    });
    $('#btn-login-light').on('click', function(e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
    });
    $('#btn-login-blur').on('click', function(e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');
        
        e.preventDefault();
    });
});

$('#fuelux-wizard-container')
    .ace_wizard({
        //step: 2 //optional argument. wizard will jump to step "2" at first
        //buttons: '.wizard-actions:eq(0)'
    })
    .on('actionclicked.fu.wizard' , function(e, info){
        // if(info.step == 1 && $validation) {
        //     if(!$('#validation-form').valid()) e.preventDefault();
        // }
    })
    .on('finished.fu.wizard', function(e) {
        bootbox.dialog({
            message: "Thank you! Your information was successfully saved!", 
            buttons: {
                "success" : {
                    "label" : "OK",
                    "className" : "btn-sm btn-primary"
                }
            }
        });
    }).on('stepclick.fu.wizard', function(e){
        //e.preventDefault();//this will prevent clicking and selecting steps
});


function rmClass(table,cs){
    $('#'+table +' tbody').find('tr').each(function(){
        $(this).removeClass(cs);
    });
}

$('.inputEngNum').on("keyup blur",function(event) { // input eng and number only 
    $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''));
});

$('.inputNumber').on("keyup blur",function(event) { // input number only
    $(this).val($(this).val().replace(/[^0-9]/g,''));
});

$('.maxLimit').on("keyup blur",function(event) { // input max value
    var id = $(this).attr('id');
    return $(this).each(function(){ 
        if(Number($(this).val().replace(/,/g, "")) > Number($('#k_'+id).data('json').toString().replace(/,/g, ""))){
            $(this).css('color','#cc0000');
            $(this).val($('#k_'+id).data('json'));
        }else{
            $(this).css('color','#858585');
        }
    });
});

$('.minLimit').on("blur",function(event) { // input min value
    var id = $(this).attr('id');
    var val = $('#k_'+id).data('json');
    return $(this).each(function(){ 
        if(Number($(this).val().replace(/,/g, "")) < Number($('#k_'+id).data('json').toString().replace(',', ""))){
            $(this).css('color','#cc0000');
            $(this).val($('#k_'+id).data('json'));
        }else{
            $(this).css('color','#858585');
        }
    });
});