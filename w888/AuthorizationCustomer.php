<?php
  if($_GET['cust']=='minigame'){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mini-Lobby</title>

                <link href="SingleLobbyWebPortal/Content/mini_1_0_style.css?v=20181227_01" rel="stylesheet" />


    <script src="SingleLobbyWebPortal/bundles/modernizr.js?v=wBEWDufH_8Md-Pbioxomt90vm6tJN2Pyy9u9zHtWsPo1"></script>

    <script src="SingleLobbyWebPortal/bundles/jquery.js?v=FVs3ACwOLIVInrAl5sdzR2jrCDmVOWFbZMY6g6Q0ulE1"></script>

    <script src="SingleLobbyWebPortal/bundles/jqueryval.js?v=hEGG8cMxk9p0ncdRUOJ-CnKN7NezhnPnWIvn6REucZo1"></script>

    <script src="SingleLobbyWebPortal/bundles/jsonpath.js?v=Zmt3nfFATDXy5uVKlESx6yRJ2SNKUjMqIjf7KRzJBqs1"></script>


    <script>
        var CDNUrl = "/softcare";
        var CDNVer = "20181227_01";
        var MemberSiteVer = "1";
        var Platform = "M";
        var ExtendSession = "";
        var ExtendSessionUrl = "%2chttp%3a%2f%2fpmwl.mekon88.com%2fSingleLobbyWebPortal%2fCommon%2fExtendSession";
        var S = "4120";
        var sbData = "zfa3DWMG9j089OlQCDB8Na02UY5P3guw07%2bveNoUUES6u5qRUVZaw9ixYeezgs8IdbYLf2448qI9gtVPCvxC996JUuTDqbWQSIVfKFjfeJfXVASGO3N9eE7Qj4RdicOtjRC%2f8PgL3jMwWWDR7J8MnmLOJfSnlAbhtlSsBCfXRSpcJwgfQtBK3AGIXzY66jWW27%2bQe%2fC4a5eDk5PHV%2brwrqXqz0r%2fBpIs9Rubj3156aIa2TMNv06KBMEA%2f25sqokqyXDw%2fe%2byUGg%3d";
        var sbHost = "/";
        var Directory = "mekon88/SingleLobbyWebPortal";

        var sbCustID = "27071359";
        var TokenUrl = "/RngSingleLobbyHandler.php";
        var Lang = "en";

        var GroupNo = "";
        var SubGroupNo = "";
        var SearchCheck = false;;

        var GameListJson = "{&quot;TimeStamp&quot;:&quot;2019-03-08 00:55:08.111&quot;,&quot;Result&quot;:{&quot;ErrorCode&quot;:0,&quot;ErrorDescription&quot;:&quot;Success&quot;},&quot;Content&quot;:{&quot;DisplayGroups&quot;:[{&quot;GroupNo&quot;:&quot;Mini Games&quot;,&quot;GroupName&quot;:&quot;Mini Games&quot;,&quot;IconURL&quot;:&quot;&quot;,&quot;DispSeq&quot;:1.0,&quot;GameTypes&quot;:[{&quot;GameTypeNo&quot;:&quot;M0001&quot;,&quot;GameTypeName&quot;:&quot;(Mini) Baccarat&quot;,&quot;OrderValue&quot;:&quot;(Mini) Baccarat&quot;,&quot;VendorID&quot;:10,&quot;IsHotnNew&quot;:false,&quot;IsUpgrade&quot;:false,&quot;IsJackpot&quot;:false,&quot;IconURL&quot;:&quot;img/Mini/Normal/M0001.png&quot;,&quot;SIconURL&quot;:&quot;icon-sportBaccarat&quot;,&quot;GameURL&quot;:&quot;&quot;,&quot;DispSeq&quot;:1.0,&quot;Width&quot;:&quot;224&quot;,&quot;Height&quot;:&quot;280&quot;,&quot;Resize&quot;:&quot;False&quot;,&quot;Status&quot;:&quot;00&quot;,&quot;ClientType&quot;:&quot;H&quot;},{&quot;GameTypeNo&quot;:&quot;M0003&quot;,&quot;GameTypeName&quot;:&quot;(Mini) Blackjack&quot;,&quot;OrderValue&quot;:&quot;(Mini) Blackjack&quot;,&quot;VendorID&quot;:10,&quot;IsHotnNew&quot;:false,&quot;IsUpgrade&quot;:false,&quot;IsJackpot&quot;:false,&quot;IconURL&quot;:&quot;img/Mini/Normal/M0003.png&quot;,&quot;SIconURL&quot;:&quot;icon-sportBlackjack&quot;,&quot;GameURL&quot;:&quot;&quot;,&quot;DispSeq&quot;:2.0,&quot;Width&quot;:&quot;224&quot;,&quot;Height&quot;:&quot;280&quot;,&quot;Resize&quot;:&quot;False&quot;,&quot;Status&quot;:&quot;00&quot;,&quot;ClientType&quot;:&quot;H&quot;},{&quot;GameTypeNo&quot;:&quot;M0005&quot;,&quot;GameTypeName&quot;:&quot;(Mini) Sic Bo&quot;,&quot;OrderValue&quot;:&quot;(Mini) Sic Bo&quot;,&quot;VendorID&quot;:10,&quot;IsHotnNew&quot;:false,&quot;IsUpgrade&quot;:false,&quot;IsJackpot&quot;:false,&quot;IconURL&quot;:&quot;img/Mini/Normal/M0005.png&quot;,&quot;SIconURL&quot;:&quot;icon-sportSicbo&quot;,&quot;GameURL&quot;:&quot;&quot;,&quot;DispSeq&quot;:3.0,&quot;Width&quot;:&quot;224&quot;,&quot;Height&quot;:&quot;280&quot;,&quot;Resize&quot;:&quot;False&quot;,&quot;Status&quot;:&quot;00&quot;,&quot;ClientType&quot;:&quot;H&quot;}],&quot;SubDisplayGroups&quot;:[]}]}}";
        var objGameList = JSON.parse(GameListJson.replace(/&quot;/g, '"'));

        var ErrorMgs = "This service cannot be accessed because you have not activated Mini Games on your account.";

        var BrokenGameTitle = "Unfinished Games";
    </script>
</head>
<body>
<form action="/SingleLobbyWebPortal/Mini" method="post"><input name="__RequestVerificationToken" type="hidden" value="evN0mMOEwTEtHx7KCtiL0G1I-a0tBfE3l5M3s2j99nCDdMjq1TAgq4npwsjRVD4NznYhKa1nmpjjvdg3Tp9g2lPzJI9bR-Phb2Gr6rP64CM1" />        <div id="MiniMain" class="mini-game">
            <!-- Container -->
            <div class="mini-game-content">
                



<!DOCTYPE html>

<html>
<head>
    <title>Mini-Lobby</title>
</head>
<body>
    <div id="ListItem" class="mini-game-list">
    </div>
    <div class="mini-bg"></div>

    <script src="SingleLobbyWebPortal/bundles/MiniContainer.js?v=n1aTATx2CE0A_g-rOEr0gI8SZq4O6PobrO1YAUA3h-01"></script>


    
<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-PB6FH8"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
    (function () {
        function async_load() {
            (function (w, d, s, l, i) {
                w[l] = w[l] || []; w[l].push({
                    'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
                }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                '//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-WMW89X6');
        }
        if (window.attachEvent) {
            window.attachEvent('onload', async_load);
        } else {
            window.addEventListener('load', async_load);
        }
    })();

    function sendEventToGA(category, action, label, value) {
        dataLayer.push({
            "event": "GAevent"
            , "eventCategory": category
            , "eventAction": action
            , "eventLabel": label
            , "eventValue": value
        });
    }
</script>
<!-- End Google Tag Manager -->

</body>
</html>

            </div>
        </div>
        <div id="MiniMask" class="mini-mask"></div>
</form>
    <script src="SingleLobbyWebPortal/bundles/MiniLayout.js?v=bcmfZ6eGhSVKp0RVUZGk3ZzRjkAfZKCWfob6FKqbVr01"></script>

    <script>
        $(window).load(function(){
            SelGameList();
        });

        $(document).ready(function(){
            $(function(){
                var len = 14; // 超過18個字以"..."取代
                $(".mini-game-single p").each(function(i){
                    if($(this).text().length>len){
                        $(this).attr("title",$(this).text());
                        var text=$(this).text().substring(0,len-1)+"...";
                        $(this).text(text);
                    }
                });

                PostDataset("MiniLobby", "Mini Games", "", "102");
            });
        });

        var token_buffer = false;
        var token_fail = false;
        function SetTimeOut() {
            var Version = Math.floor(Math.random() * (100000 - 0));
            LastGetExtendSessionTime = $.now();

            if (ExtendSession !== "") {
                var ExtendSessionArray = ExtendSession.split(",");

                ExtendSessionArray.forEach(function (value, index, ar) {
                    var ExtUrl = value + '?v=' + Version;

                    if ($("#ExtendSession_" + index).length) {
                        $("#ExtendSession_" + index).attr("src", ExtUrl);
                    } else {
                        $("body").append("<img id='ExtendSession_'" + index + " hidden='hidden' style='visibility:hidden;' src='" + ExtUrl + "' />");
                    }
                });
            }

            if (token_fail === false) {
                $.post("../" + Directory + "/Common/SetTimeOut", { SBCustID: sbCustID }, function (data) {
                    if (data.strSetTimeOut !== "") {
                        var ErrCode = data.ErrorCode;
                        var ErrMessage = data.ErrorMessage;

                        if (ErrCode !== "" || ErrCode !== '') {
                            Error_Analytics(ErrCode);

                            location.href = "Account/MiniReLoad?ErrCode=" + ErrCode + "&ErrMessage=" + ErrMessage;
                            //if (token_buffer) {
                            //    token_fail = true;
                            //    location.href = "Account/MiniReLoad?ErrCode=" + ErrCode + "&ErrMessage=" + ErrMessage;
                            //} else {
                            //    token_buffer = true;
                            //}
                        } else {
                            //token_buffer = false;
                        }
                    } else {
                        location.href = "Account/MiniClosed";
                    }
                });
            }
        }

        var MyInterval = setInterval("SetTimeOut()", 600000);
    </script>
</body>
</html>

<?php
}else if($_GET['cust']=='superlive'){
?>
  <script>
    window.location.href='http://sl.gtorb.com/main.html?authorization=-qGK!IAAAANOerQVTAgfEpCigbzafEcrFvf5o1iwsQJIiInl6ArLl4QAAAAEdfzM0vCmgtzoxg-HgYcs_yHfD2HliLKhDdh3jGi03CfZ_QypIKNfjtAg7_keMtVltRp5lAgiMgnJ-8HI8wg-3SUrAH6Q9RvwshLpHCMYBEyE2oGPeOa-4kgpJavLQ3mqSDSgxOtz9CVxKX7K8jEsWuNufl481oYMTtsYQOFjcurSnxCVML4aKxdf2gJUVPd7BNVLVEgaHn0LrMMYqucwTnwLqSfLvufoOEjTD0G_1iSlbT-TSmN0bJb-3dLkEEtRZ79hBj99rpkSCoa2mz9P2OrMJuCdUgX_EBlF9DkdABg&action=M&siteID=4100200&lang=th&date=20190315&oddsTypeList=1,2,4&oddsType=4&matchID=29267575&timezone=GMT+8&redirectURL=http%3a%2f%2f451sf.mekon88.com%2fAuthorizationCustomer.ashx%3fcust%3dsuperlive%26matchid%3d29267575#/soccer/soccer2015/1903140750060100004';
  </script>
<?php } ?>