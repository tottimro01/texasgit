var textEscape = function(text) { return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&"); };

function padNumber(num, size){
    size = (size === void 0 || typeof size !== 'number') ? 2 : size;
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

function formatDecimalPlaces(num, places, roundIfZero){
    places = typeof places != 'number' ? 2 : places;
    roundIfZero = typeof roundIfZero != 'boolean' ? false : roundIfZero;
    if(!roundIfZero)
        return Number(num).toFixed(places);
    return +(Math.round(num + "e+2")  + "e-2");;
}

function sortProperties(obj, objKey, isNumericSort){ // DESC
    objKey = objKey || false;
    isNumericSort = isNumericSort || false; // by default text sort
    var sortable = [];
    for(var key in obj)
        if(obj.hasOwnProperty(key))
            sortable.push({"key": key, "value": obj[key]});
    if(isNumericSort)
        sortable.sort(function(a, b){
            if(objKey !== false)
                return a['value'][objKey]-b['value'][objKey];
            else
                return a['value']-b['value'];
        });
    else
        sortable.sort(function(a, b){
            if(objKey !== false)
                var x=a['value'][objKey].toLowerCase(), y=b['value'][objKey].toLowerCase();
            else
                var x=a['value'].toLowerCase(), y=b['value'].toLowerCase();
            return x<y ? -1 : x>y ? 1 : 0;
        });
    return sortable; // array in format [ [ key1, val1 ], [ key2, val2 ], ... ]
}

function sortPropertiesReverse(obj, objKey, isNumericSort){ // ASC
    var sortDESC = sortProperties(obj, objKey, isNumericSort);
    var sortable = [];
    for(var i = (sortDESC.length-1); i >= 0; i--){
        sortable.push(sortDESC[i]);
    }
    return sortable;
}


function showLoader(v){
    var l = document.getElementById('loader-wrapper');
    if(v)
        document.body.classList.add("onPageLoad");
    else
        document.body.classList.remove("onPageLoad");
}

function getQueryVariable(variable, decode){
    decode = (decode===undefined || typeof decode!=='boolean') ? false : decode;
    var query = window.location.search.substring(1);
    query = (decode===true) ? decodeURIComponent((query+'').replace(/\+/g, '%20')) : query;
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0]==variable){ return pair[1]; }
    }
    return false;
}

function createQueryVariable(key, value){
    key = encodeURI(key); value = encodeURI(value);
    var kvp = document.location.search.substr(1).split('&');  
    var i=kvp.length; var x; 
    while(i--){
        x = kvp[i].split('=');  
        if (x[0]==key){
            x[1] = value;
            kvp[i] = x.join('=');
            break;
        }
    }
    if(i<0) {kvp[kvp.length] = [key,value].join('=');}  
    var s = kvp.join('&'); 
    return s;
}

function GetBaseURL(){
    return [location.protocol, '//', location.host, location.pathname].join('');
}

function numberonly(event,el){
    var e=window.event?window.event:event;
    var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;              
    //0-9 (numpad,keyboard)
    if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
    //backspace,delete,left,right,home,end
    if (',8,46,37,39,36,35,9,'.indexOf(','+keyCode+',')!=-1){ return true; }          
    return false;
} 

function _w(url=null){
    if(url!=null){
        window.location.replace(url);
    }
}

function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
        val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}

// -------- Form

$(document).on('submit', 'form.formUpdateVal, form.formSubmitVal', function(event){
    event.preventDefault();
    var $form = this;
    var $formData = new FormData($form);
    var $dataType = (typeof $form.dataset.datatype == 'undefined' || $form.dataset.datatype == "") ? 'json' : $form.dataset.datatype;
    var $showLoader = ($form.dataset.loader == 'off') ? false : true;
    $.ajax({
        url: $form.action,
        type: $form.method,
        dataType: $dataType,
        data: $formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            if($showLoader)
                showLoader(true);
            $($form).find('fieldset').attr('disabled', 'disabled');
        }
    })
    .done(function(res, status, xhr){
        var fnstring = $form.dataset.onsuccess;
        if(typeof fnstring !== 'undefined' && fnstring != ""){
            var fns = fnstring.split(",");
            for(var i = 0; i < fns.length; i++){
                var fn = window[fns[i]];
                if (typeof fn === "function"){
                    fn.apply(null, [$form, res]);
                }
            }
        }
    })
    .fail(function(xhr, status, error){
        var fnstring = $form.dataset.onfail;
        if(typeof fnstring !== 'undefined' && fnstring != ""){
            var fns = fnstring.split(",");
            for(var i = 0; i < fns.length; i++){
                var fn = window[fns[i]];
                if (typeof fn === "function"){
                    fn.apply(null, [$form, error]);
                }
            }
        }
    })
    .always(function(){
        $($form).find('fieldset').removeAttr('disabled');
        if($showLoader)
            showLoader(false);
        // document.activeElement.blur();
    });
  });
  
  $(document).on('submit', 'form.formGetVal', function(event){
      event.preventDefault();
      var $form = this;
      var $formData = $($form).serialize();
      var $dataType = (typeof $form.dataset.datatype == 'undefined' || $form.dataset.datatype == "") ? 'json' : $form.dataset.datatype;
      var $showLoader = ($form.dataset.loader == 'off') ? false : true;
      $.ajax({
          url: $form.action,
          type: $form.method,
          dataType: $dataType,
          data: $formData,
          contentType: false,
          processData: false,
          beforeSend: function(){
              if($showLoader)
                  showLoader(true);
              $($form).find('fieldset').attr('disabled', 'disabled');
          }
      })
      .done(function(res, status, xhr){
          var fnstring = $form.dataset.onsuccess;
          if(typeof fnstring !== 'undefined' && fnstring != ""){
              var fns = fnstring.split(",");
              for(var i = 0; i < fns.length; i++){
                  var fn = window[fns[i]];
                  if (typeof fn === "function"){
                      fn.apply(null, [$form, res]);
                  }
              }
          }
      })
      .fail(function(xhr, status, error){
            var fnstring = $form.dataset.onfail;
            if(typeof fnstring !== 'undefined' && fnstring != ""){
                var fns = fnstring.split(",");
                for(var i = 0; i < fns.length; i++){
                    var fn = window[fns[i]];
                    if (typeof fn === "function"){
                        fn.apply(null, [$form, error]);
                    }
                }
            }
      })
      .always(function(){
          $($form).find('fieldset').removeAttr('disabled');
          if($showLoader)
              showLoader(false);
        // document.activeElement.blur();
      });
  });

  // filter input character
  $(document).on('input', 'input.inputFilter, textarea.inputFilter', function(event){ 
      event.preventDefault();
      let type = $(this).data('filter-type');
      let val = $(this).val(); 
      let commaSeparater = ($(this).data('filter-add-comma')=="false").toString() ? false : true;
      let min_val = ($(this).attr('min')!==undefined && $.isNumeric($(this).attr('min'))) ? parseInt($(this).attr('min')) : false;

      if(type=="tel") {
          val = val.replace(/[^0-9]/g, '');
          $(this).val(val); 
      }else if(type=="numeric") {
          val = $.trim(val);
          let preLenght = val.length;
          let pre = val.charAt(0)=="-" ? "-" : "";
          pre = (min_val!==false&&min_val>=0.00) ? "" : pre;
          val = val.replace(/[^0-9]/g, '');
          let position = this.selectionStart;
          val = pre+val;
          if(min_val!==false){
              if(parseInt(val) < min_val){ val = $(this).attr('min'); }
          }
          if(commaSeparater===true){
              val=commaSeparateNumber(val);
          }
          if(preLenght<val.length){
              position++;
          }else if(preLenght>val.length){
              if(val.length>0) {
                  position--;
              }	
          }
          $(this).val(val); 
          this.selectionEnd = position;
      }else if(type=="decimal"){
          val = $.trim(val);
          let preLenght = val.length;
          let pre = val.charAt(0)=="-" ? "-" : "";
          pre = (min_val!==false&&min_val>=0.00) ? "" : pre;
          val = val.replace(/[^0-9\.]/g, '');
          let position = this.selectionStart;
          if(min_val!==false) {
              if(parseFloat(val) < min_val){
                  val = $(this).attr('min');
              }
          }
      
          let tmp_val = val.split('.');
          if(tmp_val.length > 1){
              if(commaSeparater===true){
                  tmp_val[0] = commaSeparateNumber(tmp_val[0]);
              }
              val = tmp_val[0]+"."+tmp_val[1];
          }else{
              if(commaSeparater===true){
                  val = commaSeparateNumber(val);
              }
          }
      
          val = pre+val;
          if(preLenght<val.length){
            position++;
          }else if(preLenght>val.length){
            if(val.length>0) {
              position--;
            }	
          }
          $(this).val(val);
          this.selectionEnd = position;
      }
  });	

function errorDialog(title, content){
    title = (typeof title=='undefined'||title===null) ? "ผิดพลาด" : title;
    content = (typeof content=='undefined'||content===null) ? "เกิดข้อผิดพลาดขณะดำเนินการ กรุณาลองใหม่อีกครั้งภายหลัง" : content;
    $.alert({
        title: title,
        content: content,
        theme: 'oho',
        boxWidth: "25%",
        buttons: {
            ok: {
                text: "ปิด",
                btnClass: "oho-btn",
            }
        }
    });
}
    
// Setting sport filter
var sportFilterDialog = null;
// var sportFilter = getSportFilter();
// console.log(sportFilter)

function getSportFilter(){
    var defFilter = {
        b_live: -1,
    }

    var loaded = $.cookie('sportFilter');
    if(typeof loaded == 'undefined' || loaded == "")
        return defFilter;
    
    var rFilter = loaded.split(",");
    var filter = {
        b_live: rFilter[0],
    }
    return filter;
}

function setSportFilter(newFilter){
    // var filter = getSportFilter();
    // filter[k] = v;
    var rFilter = [];
    rFilter[0] = newFilter.b_live;
    rFilter = rFilter.join(",");
    $.cookie('sportFilter', rFilter);
}

$(document).on('click', '#sportFilterTrigger', function(event){
    event.preventDefault();
    let formTmpl = $.templates('#sportFilterForm_Tmpl');
    let formHtml = formTmpl.render(getSportFilter());
    sportFilterDialog = $.confirm({
        title: 'ตั้งค่า',
        content: formHtml,
        boxWidth: '30%',
        onContentReady: function(){
            let self = this;
            self.buttons.confirm.enable();
            self.buttons.cancel.enable();
    
            self.$content.find('form').on('submit', function(e){
                e.preventDefault();
                let $form = this;
                let m_b_live = $($form).find('input[name="m_b_live"]:checked').val();
                setSportFilter({
                    b_live: m_b_live,
                });
            });
        },
        onClose: function (){
            sportFilterDialog = null;
        },
        buttons: {
            confirm: {
                text: 'บันทึก',
                btnClass: 'oho-btn',
                isDisabled: true,
                action: function(){
                    var self = this;
                    self.$content.find('form').submit();
                    self.close();
                    return false;
                } 
            },
            cancel: {
                text: 'ยกเลิก',
                isDisabled: true,
                btnClass: 'oho-btn _close',
            },
        }
    });
});

function copyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    //
    // *** This styling is an extra step which is likely not required. ***
    //
    // Why is it here? To ensure:
    // 1. the element is able to have focus and selection.
    // 2. if element was to flash render it has minimal visual impact.
    // 3. less flakyness with selection and copying which **might** occur if
    //    the textarea element is not visible.
    //
    // The likelihood is the element won't even render, not even a
    // flash, so some of these are just precautions. However in
    // Internet Explorer the element is visible whilst the popup
    // box asking the user for permission for the web page to
    // copy to the clipboard.
    //
  
    // Place in top-left corner of screen regardless of scroll position.
    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;
  
    // Ensure it has a small width and height. Setting to 1px / 1em
    // doesn't work as this gives a negative w/h on some browsers.
    textArea.style.width = '2em';
    textArea.style.height = '2em';
  
    // We don't need padding, reducing the size if it does flash render.
    textArea.style.padding = 0;
  
    // Clean up any borders.
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';
  
    // Avoid flash of white box if rendered for any reason.
    textArea.style.background = 'transparent';
  
  
    textArea.value = text;
  
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
  
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
    //   console.log('Copying text command was ' + msg);
      var copyResult = true;
    } catch (err) {
    //   console.log('Oops, unable to copy');
      var copyResult = false;
    }
  
    document.body.removeChild(textArea);
    return copyResult;
  }

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "300",
    "timeOut": "1000",
    "extendedTimeOut": "300",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
  }

  function toastSaveSuccess(){
    toastr["success"]("บันทึกสำเร็จ!")
  }

  function toastSaveError(){
    toastr["error"]("เกิดข้อผิดพลาด!")
  }