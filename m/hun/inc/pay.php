<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/bingofull.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="<?php echo $_SESSION["includeUrl"]; ?>/assets/library/css/pay.css?v=<?=time()?>">

<div id="FullBody">
	<div id="FullBigotitle" class="garyGradient"> อัตราจ่าย </div>
	<div id="mainFullContain">
      <table id="payDataTable" cellspacing="0" cellpadding="0">
        <tr>
          <th style="width:40px;">ประเภท</th>
          <th style="width:30px;">จ่าย</th>
          <th style="width:30px;">ส่วนลด</th>
        </tr>
        <tbody id='showPay'>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
            
      </table>


	
	</div>
</div>

<script>

$(document).ready(function() { 

	setInterval(function(){ 
       setmainFullContainHeight();
   }, 100);
	// getBingo9FullData();
  console.log(screen.orientation.type); 
});



 getPayData();  
 function getPayData()
 {
  $('#loading').show();

     $.get( "data/getPay.php")
     .done(function(data)
     {
           console.log(data)
           showPayData(data)
           $('#loading').hide();
     });
  
 }

 function showPayData(data)
 {
  var Length = data.length;
  var html='';

    for(var i=0; i<Length;i++)
    {
      var modI =i%2;
      var bgColor;
      if(modI=='1')
      {
         bgColor = '#cfcfcf';
      }else{
        bgColor = '#fff';
      }
      
      html+='<tr style="background-color:'+bgColor+'">'+
            '<td>'+data[i]['lotType']+'</td>'+
            '<td>'+data[i]['lotPay']+'</td>'+
            '<td>'+data[i]['lotDis']+'</td>'+
            '</tr>';
    }
    $('#showPay').text('');
    $('#showPay').append(html);

    
 }

function setmainFullContainHeight()
 {
 
    var includeBodyH = $('#FullBody').outerHeight();
    var FullBigotitle = $('#FullBigotitle').outerHeight();
    $("#FullBody").css("background-color", "#e0e0e0");
    var mainFull = includeBodyH-FullBigotitle-10;
     $('#mainFullContain').height(mainFull);  
     console.log('includeBodyH : '+includeBodyH)
    $('#mainFullContain').css('overflowY', 'auto'); 
    $('#mainFullContain').css("-webkit-overflow-scrolling", "touch");

 } 

</script>