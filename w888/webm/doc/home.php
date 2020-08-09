<div class="banner">
    <div id="banner" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#banner" data-slide-to="0" class="active"></li>
            <li data-target="#banner" data-slide-to="1"></li>
            <li data-target="#banner" data-slide-to="2"></li>
            <li data-target="#banner" data-slide-to="3"></li>
            <li data-target="#banner" data-slide-to="4"></li>
        </ul>
        <div class="carousel-inner" style="display:block; width:100%; text-align: center;">
            <div class="carousel-item active">
                <img src="Images/MainSmart/pic/banner/banner01.png" width="100%" height="auto" alt="">
            </div>
            <div class="carousel-item">
                <img src="Images/MainSmart/pic/banner/banner02.png" width="100%" height="auto" alt="">  
            </div>
            <div class="carousel-item">
                <img src="Images/MainSmart/pic/banner/banner03.png" width="100%" height="auto" alt="">  
            </div>
            <div class="carousel-item">
                <img src="Images/MainSmart/pic/banner/banner04.png" width="100%" height="auto" alt="">  
            </div>
            <div class="carousel-item">
                <img src="Images/MainSmart/pic/banner/banner05.png" width="100%" height="auto" alt="">  
            </div>
        </div>
        <a class="carousel-control-prev" href="#banner" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#banner" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

<div class="content">
    <div class="inner-wrapper d-inline-block">
        <div class="banner-large" style="background-image: url(Images/MainSmart/pic/block/Sport.png); background-size: cover; background-repeat:no-repeat;" onclick="GoToMain('sport')"><div class="c_title"><?=$lang_member[2384];?></div></div>
    </div>
    <div class="inner-wrapper d-inline-block">
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/Lotto.png); background-size: cover; background-repeat:no-repeat;" onclick="GoToMain('lotto')">
            <div class="c_title"><?=$lang_member[1173];?></div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/LottoSet.png); background-size: cover; background-repeat:no-repeat;" onclick="GoToMain('lothun')">
            <div class="c_title"><?=$lang_member[48];?></div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/Games.png); background-size: cover; background-repeat:no-repeat;" onclick="GoToMain('games')">
            <div class="c_title"><?=$lang_member[37];?></div>
        </div>
    </div>
    <div class="inner-wrapper d-inline-block">
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/SA.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('sa')">
            <div class="c_title">SA Gaming</div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/Sexy.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('sexy')">
            <div class="c_title">Sexy Baccarat</div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/Joker.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('joker')"><div class="c_title">Joker gaming</div></div>
    </div>
    <div class="inner-wrapper d-inline-block">
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/PGslot.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('pgslot')">
            <div class="c_title">PG Slot</div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/918kiss.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('918kiss')">
            <div class="c_title">918 Kiss</div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/Red365.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('red365')">
            <div class="c_title">Red 365</div>
        </div>
    </div>
    <div class="inner-wrapper d-inline-block">
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/Epic.png); background-size: cover; background-repeat:no-repeat;" onclick="OpenCasion('epic')">
            <div class="c_title">Epic</div>
        </div>
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/block/ToPC.png); background-size: cover; background-repeat:no-repeat;" onclick="window.location.href='http://w888.texasbetx.com'">
            <div class="c_title">Go to PC</div>
        </div>
        <div class="banner-mini"></div>
    </div>
   <!--  <div class="inner-wrapper" style="display:inline-block;">
        <div class="banner-mini" style="background-image: url(Images/MainSmart/pic/tag-slotto.png?modified=20200211); background-size: cover; background-repeat:no-repeat;" onclick="PopupCenter('http://igtx.time399.com/tx4.aspx?game=41&accid=3279166&sid=l1npj3rwc5h0cj5crc3udpyd&lang=th-TH&home=5&ct=16&cc=THB','FT_IGTX',817,550);"><div class="c_title">Joker gaming</div></div>
        <div class="banner-mini"></div>
        <div class="banner-mini"></div>
        
    </div> -->
</div>
<script>
    function GoToMain(p){
        window.location.href = "http://w888.texasbetx.com/?p=" + p;
    }

    function OpenCasion(p){
    	switch (p) {
    		case 'sa':
    			var cid = 1;
    			break;
    		case 'sexy':
    			var cid = 2;
    			break;
    		case 'joker':
    			var cid = 11;
    			break;
    		case 'pgslot':
    			var cid = 13;
    			break;
    		case '918kiss':
    			var cid = 14;
    			break;
    		case 'red365':
    			var cid = 15;
    			break;
    		case 'epic':
    			var cid = 16;
    			break;
    		default:
    			// statements_def
    			break;
    	}
    	window.open('http://w888.texasbetx.com/casino_popup.php?id='+cid,'Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');
    }
</script>