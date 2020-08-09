// JScript 檔
function ping(url,callBack,async) 
{
    var requestTime;
     
  /*  function appendHttpPrefix(url){
  //保證url帶http://
        var strReg="^((https|http)?://){1}";
        var re=new RegExp(strReg); 
        return re.test(url)?url:"http://"+url;
    }*/
     
 $.ajax({
  url: url,
  type: "GET",
  dataType: "jsonp", //設成jsonp來解決cross-domain requests的問題
  timeout: 5000, //超過5秒沒回應就timeout
  cache: false, //不保留cache 
  async:async,  
  beforeSend: function(){
   requestTime = new Date().getTime();
  }, 
  complete: function(jqXHR, textStatus){
   var responseTime = new Date().getTime();
   var ackTime = responseTime - requestTime;         
   var status;
    
   //因為dataType用jsonp格式，但是Server端未針對這部份進行處理，所以執行成功時
   //必定會發生"parsererror"(因為回傳的資料格式不為JavaScript，所以會"parsererror")。
   //此時將需將status手動改回"success"
   if(textStatus == "parsererror"){
    status = "success";
   }
   else{
    status = textStatus;
   }
    
   callBack({ 
      url: url,
      ackTime: ackTime,
      status: status
     });
  } 
 }); 
};