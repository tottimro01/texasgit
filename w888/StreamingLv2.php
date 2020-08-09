
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<!--<meta http-equiv="X-UA-Compatible" content="IE=9" />-->
<link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/menu.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/global.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/button.css" rel="stylesheet" type="text/css" />    
<link href="template/maxbet/public/css/TVstreaming.css" rel="stylesheet" type="text/css" />



 



<script type="text/javascript">
    function OnLoad() {
        parent.CurrentHorseChannelID = '0';
        if ('0' == '') {
            parent.isHorseStreaming = false;
            //parent.document.getElementById("FrameValidation").height=430;
            //parent.document.getElementById('ChannelCrl').style.display='none';
        }
        else {
            parent.isHorseStreaming = true;
            //parent.document.getElementById("FrameValidation").height=416;
            //parent.document.getElementById('ChannelCrl').style.display='block';
            //parent.setHorseChannel('{{horseChannel}}');
        }
    }
    function SelectNGStreaming(type) {

        document.getElementById("TurboNumberGameTitle").className = "ng-streaming__title-1";
        document.getElementById("TurboNumberGameLv").style.display = 'none';
        document.getElementById("NumberGameTitle").className = "ng-streaming__title-2";
        document.getElementById("NumberGameLv").style.display = 'none';

        if (type == "tn") {
            document.getElementById("TurboNumberGameTitle").className = "ng-streaming__title-1 ng-selected";
            document.getElementById("TurboNumberGameLv").style.display = 'block';
        }
        else {
            document.getElementById("NumberGameTitle").className = "ng-streaming__title-2 ng-selected";
            document.getElementById("NumberGameLv").style.display = 'block';
        }

    }
</script>
</head>
<body onload="OnLoad()">
<div class="manbox">
	<div class="TVTilte">
		
		<div id="DisplayTitle" style="display: block">
			<span id="Sporttype" class="TVType">เทนนิส</span>
			<span id="ShowTime" class="TVInfo" style="display: none">04/05 10:15AM</span>
			<span class="TVTeam" style="background-color:;display:none;"><img src="template/maxbet/public/images/TV/clothingSmall.png" /></span>
			<span class="TVInfo">Feliciano Lopez (ESP)</span>
			<span class="TVInfo">v</span>
			<span class="TVTeam" style="background-color:;display:none"><img src="template/maxbet/public/images/TV/clothingSmall.png" /></span>
			<span class="TVInfo">Dominik Koepfer (GER)</span>
		</div>
		
		


	</div>
    <div class="leftBoxbody">
       <div class="streamingAllBG">
            
            
            
            
                
            
            
            

            
                        <iframe	src="http://dge.imggaming.com/api/v1/streaming/events/109461/player?operatorId=43&auth=f0c9845874e4b71c0f07dffb0e93dcd5&timestamp=1554436768904"	style="border:none;padding:0;margin:0;height:402px;width:100%;padding-top:10px;"  frameborder='0' scrolling="no"></iframe>
                        <script type="text/javascript">
                            parent.document.getElementById("FrameValidation").width = 680;
                            parent.document.getElementById("FrameValidation").height = 452;
                            parent.document.getElementById("StreamingSrc").value = "8";
                            parent.AdjustSize(parent.document.getElementById('containerhead').style.display != "block");
                            parent.ga('send', 'event', 'Streaming', 'play', '8');
                        </script>
            
            

            
			
        </div>
    </div> 
</div>
   
</body>
</html>
