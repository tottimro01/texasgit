
 	 function actPanginaText()
 	{
 		$('.swiperBox').css('color','#333');
 		$('.swiper-pagination-bullet-active').closest('.swiperBox').css('color','#1aaf00');
 	}


   function getTimpStampfnc() {
    
    var a = '1503392280';
    return a;
    // return new Date/1000 | 0;

   }



 	function convertTHDate(date)
 	{
 		var sptData = date.split("-");
 		var d = sptData[0];
 		var m = sptData[1];
 		var y = sptData[2];

 		var newM;
 		var newY = parseInt(y)+543;
 		switch(m) 
 		{
   		case "01":
   		    newM = "มกราคม";
   		    break;

   		case "02":
   		    newM = "กุมภาพันธ์ ";
   		    break;

   		case "03":
   		    newM = "มีนาคม ";
   		    break; 
   		case "04":
   		    newM = "เมษายน ";
   		    break;

   		case "05":
   		    newM = "พฤษภาคม ";
   		    break;

   		case "06":
   		    newM = "มิถุนายน ";
   		    break;  
   		case "07":
   		    newM = "กรกฎาคม ";
   		    break;

   		case "08":
   		    newM = "สิงหาคม ";
   		    break;

   		case "09":
   		    newM = "กันยายน ";
   		    break; 
   		case "10":
   		    newM = "ตุลาคม ";
   		    break;

   		case "11":
   		    newM = "พฤศจิกายน ";
   		    break;

   		case "12":
   		    newM = "ธันวาคม ";
   		    break;  

   		

   		default:
        newM = "????";
		}

		var date = d+' '+newM+' '+newY.toString();
		return date;
 		
 	}


function minusColor(num)
{
   num = parseInt(num);

   if(num<0)
   {
      num="<span style='color:red;'>"+num.toLocaleString();+"<span>";
   }else{

       num="<span style=''>"+num.toLocaleString();+"<span>";
   }
   return num;
}


