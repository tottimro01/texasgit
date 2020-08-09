$(document).on('submit', 'form.auto-form', function(event){
    event.preventDefault();
    var $form = this; 
    $($form).removeClass('preventSubmit');
    FormApplyCallback($form, $form.dataset.onbegin, null);
    var $formData = ($form.method.toLowerCase() == 'get') ? $($form).serialize() : new FormData($form);
    var $dataType = (typeof $form.dataset.datatype == 'undefined' || $form.dataset.datatype.toString() == '') ? 'json' : $form.dataset.datatype;
    var $cache = (typeof $form.dataset.cache == 'undefined' || $form.dataset.cache.toString() != 'true') ? false : true;

    if(!$($form).hasClass('preventSubmit')){
        $.ajax({
            url: $form.action,
            type: $form.method,
            dataType: $dataType,
            data: $formData,
            contentType: false,
            processData: false,
            cache: $cache,
            beforeSend: function(){
                $($form).find('fieldset').attr('disabled', 'disabled');
                FormApplyCallback($form, $form.dataset.oninit, null);
            }
        })
        .done(function(res, status, xhr){
            FormApplyCallback($form, $form.dataset.onsuccess, res);
        })
        .fail(function(xhr, status, error){
            FormApplyCallback($form, $form.dataset.onfail, error);
        })
        .always(function(inf){
            $($form).find('fieldset').removeAttr('disabled');
            FormApplyCallback($form, $form.dataset.oncomplete, null);
        });
    }
    
});

function FormApplyCallback($form, $callback, $response){
    if(typeof $callback !== 'undefined' && $callback != ''){
        var fns = $callback.split(',');
        for(var i = 0; i < fns.length; i++){
            var fn = window[fns[i]];
            if(typeof fn === 'function'){
                fn.apply(null, [$form, $response]);
            }else{
                console.warn('Function name "' + fns[i] + '"" is not defined!');
            }
        }
    }
}

function exampleCallback(form, data){
    console.log(form, data);
}