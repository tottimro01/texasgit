function loadPagination(pagi_data)
{
    var max_page = 7; // Odd numbers only
    var show_page = Math.ceil(max_page/2)-1;
    
    var s_page = pagi_data["active_page"]-show_page;
    var e_page = pagi_data["active_page"]+show_page;

    if(s_page <= 0)
    {
      s_page = 1;
    }

    if(e_page > pagi_data["total_page"])
    {
      e_page = pagi_data["total_page"];
    }

     var pagi_html = "";
         pagi_html  =  "<nav aria-label='Page navigation' id='pagi_nav' data-page='"+pagi_data["active_page"]+"''>"+
                         "<ul class='pagination'>";

     if(pagi_data["total_page"] > 1)
    {             
             let Previous_page =  (pagi_data["active_page"]-1);
                 Previous_page = (Previous_page < 1) ? 1 : Previous_page;          
             pagi_html  += "<li class='page-item'>"+
                             "<a class='page-link' href='#' aria-label='Previous' onclick=\"clickPage('"+(Previous_page)+"');\">"+
                               "<span aria-hidden='true'>&laquo;</span>"+
                               "<span class='sr-only'>Previous</span>"+
                             "</a>"+
                           "</li>";
    } 

    if(s_page >= show_page-1)
    {
        pagi_html +=  "<li class='page-item'><a class='page-link' href='#' onclick=\"clickPage('1');\">1</a></li>"; 
        pagi_html +=  "<li class='page-item'><a class='page-link' href='#' > ... </a></li>"; 
    }

    
    for(let i = s_page; i <= e_page; i++)
    {
         let active = (i == pagi_data["active_page"]) ? "active" : "";
         pagi_html +=  "<li class='page-item "+active+"'><a class='page-link' href='#' onclick=\"clickPage('"+i+"');\">"+i+"</a></li>"; 
    }

    if(pagi_data["total_page"] > e_page)
    {
        pagi_html +=  "<li class='page-item'><a class='page-link' href='#' > ... </a></li>"; 
        pagi_html +=  "<li class='page-item'><a class='page-link' href='#' onclick=\"clickPage('"+pagi_data["total_page"]+"');\">"+pagi_data["total_page"]+"</a></li>"; 
    }

    if(pagi_data["total_page"] > 1)
    {    

             let Next_page =  (pagi_data["active_page"]+1);
                 Next_page = (Next_page > pagi_data["total_page"]) ? pagi_data["total_page"] : Next_page;                         
              pagi_html += "<li class='page-item'>"+
                             "<a class='page-link' href='#' aria-label='Next' onclick=\"clickPage('"+Next_page+"');\">"+
                               "<span aria-hidden='true'>&raquo;</span>"+
                               "<span class='sr-only'>Next</span>"+
                             "</a>"+
                           "</li>"+
                           "<li class='page-item'>"+
                                  "<input type='text' class='page-link input-num' style='width:50px;' id='page_sch' autocomplete=\"off\" onkeypress=\"return runScript(event,this,"+pagi_data['total_page']+")\">"+
                           "</li>";             
                         
    }  
                     
        pagi_html += "</ul>"+
                "</nav>";    

    
                     
    return pagi_html;
}

function runScript(event,e,total_page) {
    if (event.keyCode == 13) {
        var val = $(e).val();
            val = (val < 1 ) ? 1 : val;
            val = (val > total_page ) ? total_page : val;
        clickPage(val);
        return false;
    }
}

function errorAlert(msg)
{
  $.gritter.add({
          title: "",
          text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+msg+' </h5>',
          class_name: 'gritter-error'
      });
      
}

// function loadPagination(pagi_data)
// {
//     // console.log(pagi_data)

//      var pagi_html = "";
//         pagi_html  =  "<nav aria-label='Page navigation' id='pagi_nav' data-page='"+pagi_data["active_page"]+"''>"+
//                          "<ul class='pagination'>";

//      if(pagi_data["total_page"] > 1)
//     {             
//              let Previous_page =  (pagi_data["active_page"]-1);
//                  Previous_page = (Previous_page < 1) ? 1 : Previous_page;          
//              pagi_html  += "<li class='page-item'>"+
//                              "<a class='page-link' href='#' aria-label='Previous' onclick=\"clickPage('"+(Previous_page)+"');\">"+
//                                "<span aria-hidden='true'>&laquo;</span>"+
//                                "<span class='sr-only'>Previous</span>"+
//                              "</a>"+
//                            "</li>";
//     } 
    
//             for(let i = 1; i <= pagi_data["total_page"]; i++)
//             {
//                  let active = (i == pagi_data["active_page"]) ? "active" : "";
//                  pagi_html +=  "<li class='page-item "+active+"'><a class='page-link' href='#' onclick=\"clickPage('"+i+"');\">"+i+"</a></li>"; 
//             }

//     if(pagi_data["total_page"] > 1)
//     {    

//              let Next_page =  (pagi_data["active_page"]+1);
//                  Next_page = (Next_page > pagi_data["total_page"]) ? pagi_data["total_page"] : Next_page;                         
//               pagi_html += "<li class='page-item'>"+
//                              "<a class='page-link' href='#' aria-label='Next' onclick=\"clickPage('"+Next_page+"');\">"+
//                                "<span aria-hidden='true'>&raquo;</span>"+
//                                "<span class='sr-only'>Next</span>"+
//                              "</a>"+
//                            "</li>";
                         
//     }  
                     
//         pagi_html += "</ul>"+
//                 "</nav>";             
//     return pagi_html;
// }

 function goToByScroll(id){
          // Reove "link" from the ID
        id = id.replace("link", "");
          // Scroll
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
            'slow');
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



function changeUrlParam(newParam)  //เปลี่ยน url
{
  var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + newParam;
  window.history.pushState({path:newurl},'',newurl);
}

function getSearchParams(k){   // ดึง parameter ใน url
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}


function chkMinMax(e,min,max)
{
   var val = $(e).val();
       val  = val.replace(/,/g, "");

       // check max 
       if(parseFloat(val) > parseFloat(max))
       {
           $(e).val(toCommas(max));
       }else if(parseFloat(val) < parseFloat(min)) // check min 
       {
           $(e).val(toCommas(min));
       }else{
          $(e).val(toCommas(val));
       }
}


function toCommas(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}



// $('input.inputEngNum').keypress(function(e){
//   var regex = new RegExp("^[a-zA-Z0-9 ]+$");
//         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
//         if (regex.test(str)) {
//             return true;
//         }

//         e.preventDefault();
//         return false;

// }); 


$(document).on('keypress','input.inputEngNum',function(e){
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
})

$(document).on('input','.input-num',function(e){
    this.value = this.value.replace(/\D/g,'');
})


$(document).on('input','.input-num2digt',function(e){
   var _val = TrimComma(this.value);
   this.value = _val.match(/^\d+\.?\d{0,2}/);
})


// ฟั่งก์ชั่น แจ้งเตือน input ไม่ถูกต้อง ของ ace tab
function alertWrongInput(tab,id_iuput)
{
  //เปิด tab ที่กรอกข้อมูลผิดพลาด
  $("[data-toggle=tab]").eq(tab).trigger('click'); 
  //กระพริบ
  $("#"+id_iuput+"").addClass('warning-bg'); 
  //หน่วงเวลา เอากระพริบออก
  setTimeout(function(){  $("#"+id_iuput+"").removeClass('warning-bg'); }, 9000);
   
}



function addCommas(nStr){
  
  nStr =parseFloat(nStr).toFixed(2);
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1].substr(0,2) : '';

  if(x2==00)
  {
    x2='';
  }
  
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}
function TrimComma(currentTags) {  
  var currentTagTokens = currentTags.split(",");
  var existingTags = "";

  for ( var i = 0; i < currentTagTokens.length; i++ ) { 
    existingTags = existingTags + currentTagTokens[i];
  }
  return existingTags;
}


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

$("input[type='text']#credit").click(function () {
   $(this).select();
});
