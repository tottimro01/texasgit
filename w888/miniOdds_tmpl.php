<div> 
    <script id="minioddstmpl" type="text/x-jquery-tmpl">
<ul>
{{each(i,Sport) data}}
      <li><a id="miniodds_${Sport.SportID}" title="${Sport.SportName}" class="navon">${Sport.SportName}</a> 
    <!-- Begin -- Open Mini Odds Content -->
    <div class="miniContent">
  {{each(j,Match) Sport.matchs}}          
          <table width="100%" cellspacing="0" cellpadding="0" border="0" class="oddsTable">
            <tbody>
              <tr>
                <td class="tabtitle" colspan="2">{{if Match.Bettype==1}}FT. HDP{{/if}}{{if Match.Bettype==20}}ทายผลผู้ชนะหรือทีมที่ชนะ{{/if}}{{if Match.Bettype==501}}Match Winner{{/if}}</td>
              </tr>
                <tr>
                <td class="miniLeague" colspan="2"><div class="text-ellipsis" title="${Match.League}">${Match.League}</div></td>
              </tr>

              <tr class="{{if Match.IsLive==1}}liveligh{{else}}bgcpe{{/if}}">
                <td colspan="2" class="miniTeamClass" >
                   <table width="100%" cellspacing="0" cellpadding="0" border="0">
                     <tr>
                      <td width="33%"><div name="teamName" style="height:35px;width:90px"><span class="{{if Match.Fav=='h'}}FavTeamClass{{else}}UdrDogTeamClass{{/if}}" style="text-overflow: ellipsis" title="${Match.HName}" >${Match.HName}</span></div></td>                      
                      {{if Match.IsLive==1}}           
                          {{if Sport.SportID ==1 || Sport.SportID ==8 || Sport.SportID ==2 || Sport.SportID ==6 || Sport.SportID ==3 || Sport.SportID ==4 ||Sport.SportID ==9 || Sport.SportID ==5 || Sport.SportID ==28 || Sport.SportID ==26 || Sport.SportID ==7 || Sport.SportID ==27 || Sport.SportID ==50}}
                               {{if Sport.SportID ==2 || Sport.SportID ==6}}
                                    <td class="liveodds" width="33%">
                                    {{if Match.TSuspend==1}}                         
                                        <div class="HalfTime">T.Out</div>                                    
                                    {{/if}}     
                                   <div class="{{if Match.IsHT}}HalfTime{{else}}FavTeamClass{{/if}}">{{html Match.Time}}</div></td>
                               {{/if}}
                               
                               {{if Sport.SportID ==3 || Sport.SportID ==4 || Sport.SportID ==28 || Sport.SportID ==26 || Sport.SportID ==27 || Sport.SportID ==50}}
                                    
                                    {{if Match.TSuspend==1}}               
                                        <td class="liveodds" width="33%">          
                                        <div class="HalfTime">T.Out</div>   
                                    {{else}}              
                                        <td class="liveodds{{if Match['Scorechg']}} Odds_Upd{{/if}}" width="33%">               
                                        <div> ${Match.ScoreH}-${Match.ScoreA}</div>                                                      
                                    {{/if}}     
                                   <div class="{{if Match.IsHT}}HalfTime{{else}}FavTeamClass{{/if}}">{{html Match.Time}}</div></td>
                               {{/if}}     
                               
                               {{if Sport.SportID ==9 || Sport.SportID ==5}}
                                    <td class="liveodds" width="33%">
                                    {{if Match.TSuspend==1}}                         
                                        <span class="iconInfo rain"></span>                                                                           
                                    {{/if}}     
                                   <div class="{{if Match.IsHT}}HalfTime{{else}}FavTeamClass{{/if}}">{{html Match.Time}}</div></td>
                               {{/if}}                                                           
                               {{if Sport.SportID ==1}}
                                    <td class="liveodds{{if Match['Scorechg']}} Odds_Upd{{/if}}" width="33%">
                                    <div> ${Match.ScoreH}-${Match.ScoreA}</div>
                                    {{if Match.TSuspend==1}}                         
                                        <div class="IsLive" title="In Running">IR</div>   
                                    {{else}}                             
                                        <div class="{{if Match.IsHT}}HalfTime{{else}}FavTeamClass{{/if}}">{{html Match.Time}}</div></td>                                                      
                                    {{/if}}     
                                                                  
                               {{/if}}
                               {{if Sport.SportID ==8}}
                                    <td class="liveodds{{if Match['Scorechg']}} Odds_Upd{{/if}}" width="33%">
                                    {{if Match.TSuspend==1}}                         
                                        <span class="iconInfo rain"></span>  
                                    {{/if}}                             
                                    <div> ${Match.ScoreH}-${Match.ScoreA}</div>
                               {{/if}}
                                
                                {{if Sport.SportID ==7}}
                                    <td class="liveodds{{if Match['Scorechg']}} Odds_Upd{{/if}}" width="33%">
                                    {{if Match.TSuspend==1}}                         
                                        <span class="iconInfo break"></span>  
                                    {{/if}}
                                    <div class="{{if Match.IsHT}}HalfTime{{else}}FavTeamClass{{/if}}">{{html Match.Time}}</div></td>
                               {{/if}}

                          {{else}}                          
                              
                              {{if Sport.HideScore==0}}
                                 <td class="liveodds{{if Match['Scorechg']}} Odds_Upd{{/if}}" width="33%">
                                 <div> ${Match.ScoreH}-${Match.ScoreA}</div>
                              {{else}}
                                 <td class="liveodds" width="33%">    
                              {{/if}}
                              <div class="{{if Match.IsHT}}HalfTime{{else}}FavTeamClass{{/if}}">{{html Match.Time}}</div></td>
                          {{/if}}                         
                          
                      {{else}}
                      <td class="liveodds" width="33%"> 
                        {{html Match.Time}}
                        
                      {{/if}}                     
                      </td>                        
                      <td width="33%"><div name="teamName" style="height:35px;width:90px"><span class="{{if Match.Fav=='a'}}FavTeamClass{{else}}UdrDogTeamClass{{/if}}"  style="text-overflow: ellipsis" title="${Match.AName}">${Match.AName}</span></div></td>
                    </tr>
                  </table></td>
              </tr>
            </tbody>
            <tbody>
              <tr align="center">
                <th width="50%" nowrap="nowrap" class="even{{if Match['Hdpchg']}} Odds_Upd{{/if}}">{{if Match.Fav=='h'}}-{{/if}}{{if Match.Fav=='a'}}+{{/if}}${Match.Hdp}</th>
                <th width="50%" nowrap="nowrap" class="even{{if Match['Hdpchg']}} Odds_Upd{{/if}}">{{if Match.Fav=='a'}}-{{/if}}{{if Match.Fav=='h'}}+{{/if}}${Match.Hdp}</th>
              </tr>
              <tr align="center" class="{{if Match.IsLive==1}}liveligh{{else}}bgcpe{{/if}}" >
                <td {{if Match.OddsH!=""}}onClick="javascript:fFrame.topFrame.miniOddsObj.clickOdds('${Match.Oddsid}','h','${Match.OddsH}')" style="cursor: pointer;"{{/if}} onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='';" class="nbsp{{if Match.Ischg}} Odds_Upd{{/if}}" ><span class="{{if parseFloat(Match.OddsH) <0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}">${Match.OddsH}</span></td>
                <td {{if Match.OddsA!=""}}onClick="javascript:fFrame.topFrame.miniOddsObj.clickOdds('${Match.Oddsid}','a','${Match.OddsA}')" style="cursor: pointer;"{{/if}} onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='';" class="nbsp{{if Match.Ischg}} Odds_Upd{{/if}}" ><span class="{{if parseFloat(Match.OddsA) <0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}">${Match.OddsA}</span></td>
              </tr>
            </tbody>
          </table>
{{/each}}
        </div>
        <!-- End -- Open Mini Odds Content --> 
      </li>
{{/each}}      
{{if data.length ==0}}
   <li>ไม่มีการแข่งขันหรือเกมในขณะนี้ กรุณาเข้าชมการแข่งกีฬาหรือเกมอื่น ๆ แล้วกลับมาใหม่ภายหลัง</li>
{{/if}}

    </ul>

    </script> 
    <script id="LiveStreamingtmpl" type="text/x-jquery-tmpl">
    {{each(i,Sport) data}}  
        <li>
        <a id="livestreaming_${Sport.SportID}" title="${Sport.SportName}" class="navon">${Sport.SportName}</a>
        <!-- Begin -- Open livestreaming Content -->
        <div class="LiveTVContent">
            {{each(j,Match) Sport.matchs}}
            <div class="LiveTVList">
            <table id="LiveTV_${Sport.SportID}" class="oddsTable">
                <tr>
                    <td><span class="icon-live-tv"></span>
                         <div class="selebox">            
                    <ul class="cm-nav">
                      <li><a href="javascript:fFrame.openSingleStreaming('${Match.Matchid}',0);">Open in new window</a></li>
                        {{if fFrame.LastSelectedMenu == 0}}
                        {{if Sport.SportID==1}}<li><a style="cursor: pointer;" onClick="javascript:openStreamingMiddle(event,'${Match.Matchid}')">{{/if}}
                        {{if Sport.SportID==1}}Float above odds table</a></li>{{/if}}{{/if}}
                    </ul></div>
                    </td>
                    <td><div title="${Match.HName}">
                                ${Match.HName}</div>
                            <div title="${Match.AName}">
                                ${Match.AName}</div>
                    </td>
                    <td valign="top">
                        <span>${Match.Time}</span>
                    </td>
                </tr>
            </table>
            </div>
            {{/each}}
        </div>
        <!-- End -- Open livestreaming Content -->
    </li>
    {{/each}} {{if data.length ==0}}
    <li>ไม่มีการแข่งขันหรือเกมในขณะนี้ กรุณาเข้าชมการแข่งกีฬาหรือเกมอื่น ๆ แล้วกลับมาใหม่ภายหลัง</li>
    {{/if}}
    </script> 
    <script id="minioddsDiv" type="text/x-jquery-tmpl">
    <div id="Miniodds" class="sidebar">
    <div id="SmallLiveInfo" style="display: none;" class="smallLiveInfo">
        <div class="title">
            <span title="Match Information">
                <div class="icon-arrow"></div>
                Match Information
                <a class="btnIcon right" title="ปิด" onclick="javascript:CloseSmallLiveInfo();"><span class="icon-close"></span></a>
            </span>
        </div>
        <div  class="loadiframe container" ><iframe id="SmallLiveInfoFrame" src="" height="277" scrolling="no" frameborder="0"></iframe></div>
    </div>
   
    <div id="MiniOddsNews" class="newsGaming" style="display:block">
     <div id="gamingtitle" class="gaming container">      
      <div class="promotion-banner">
        <div id="promotionBannerTitle" class="title">New Products<div class="popWClose" title="Close" onclick="$('#gamingtitle').hide();"></div></div>
        
        <ul>
            <li>
                <div class="main-banner">
                    <div id="slides">
                        <a href="javascript:parent.topFrame.ShowNumberGame(164);"><img src='template/maxbet/th/images/product/pm_happy5.jpg' /></a>
<a href="javascript:parent.leftFrame.SwitchMenuType(0,'','43','T');"><img src='template/maxbet/th/images/product/pm_eSports5.jpg' /></a>
<img src='template/maxbet/th/images/product/pm_GDMobile.jpg' />
<a href="javascript:parent.topFrame.OpenCasino();"><img src='template/maxbet/th/images/product/pm_PPNewGame.jpg' /></a>
<img src='template/maxbet/th/images/product/pm_minigame.jpg' />
<a href="javascript:parent.topFrame.ShowNumberGame();"><img src='template/maxbet/th/images/product/pm_DJChannel2.jpg' /></a>
<a href="javascript:parent.leftFrame.SwitchMenuType(0,'','193','T');"><img src='template/maxbet/th/images/product/pm_vsBaskball.jpg' /></a>
<a href="javascript:parent.topFrame.OpenCasino();"><img src='template/maxbet/th/images/product/ad_NewTableCasino.jpg' /></a>
<!--<img src='template/maxbet/th' />-->

                        <a href="#" class="slidesjs-previous slidesjs-navigation"><img src="template/maxbet/public/images/layout/l_icon.png"></a>
                        <a href="#" class="slidesjs-next slidesjs-navigation"><img src="template/maxbet/public/images/layout/r_icon.png"></a>                
                    </div>
                </div>
            </li>
            <li>
                <div class="gaming-content bingo">
                    <dl>
                        <dt class="title"></dt>
                        <dt class="text01"></dt>
                        <dt class="text02"></dt>
                        <dt class="btn"><a href="javascript:parent.topFrame.openCasinoBingoFromMini();">Play Now</a></dt>
                    </dl> 
                </div>
            </li>
            <li>
                <div class="gaming-content casino">
                    <dl>
                        <dt class="title"></dt>
                        <dt class="text01"></dt>
                        <dt class="text02"></dt>
                        <dt class="btn"><a href="javascript:parent.topFrame.OpenCasino();">Play Now</a></dt>
                    </dl>
                </div>
            </li>
            <li>
                <div class="gaming-content liveCasino">
                    <dl>
                        <dt class="title"></dt>
                        <dt class="text01"></dt>
                        <dt class="text02"></dt>
                        <dt class="btn"><a href="javascript:parent.topFrame.OpenLiveCasinoWindowFromMini();">Play Now</a></dt>
                    </dl>
                </div>
            </li>
            <li>
                <div class="gaming-content numberGame">
                    <dl>
                        <dt class="title"></dt>
                        <dt class="text01"></dt>
                        <dt class="text02"></dt>
                        <dt class="btn"><a href="javascript:parent.topFrame.openNumberGmeFromMini();">Play Now</a></dt>
                    </dl>
                </div>
            </li>
            <li>
                <div class="gaming-content miniGame">
                    <dl>
                        <dt class="title"></dt>
                        <dt class="text01"></dt>
                        <dt class="text02"></dt>
                        <dt class="btn"><a href="javascript:parent.leftFrame.OpenMiniGame();">Play Now</a></dt>
                    </dl>
                </div>
            </li>
        </ul>
      </div>
     </div>
    </div>
    <!----<div id="LiveScoreBar" class="liveScore-bet__panel" style="display: none;">
        <div class="title" onclick="javascript:fFrame.mainFrame.ShowLiveScore();">คะแนนสด</div>
    </div>-->
    <div id="livetv" class="LiveTV">
        <div class="title">
                <span title="Showing Now">Showing Now</span>
            </div>
        <div id="livestreamingCcontainer" class="LiveTV container ScrollbarContent" data-mcs-theme="dark">
                            <ul id="streamingarray">
                            </ul>                
                </div>
    </div>
    
    
        <div id="cbswitch" class="jackpots open">
            <div class="title" onclick="switchCB();" title="Jackpot">Jackpot
                <div id="CBarrow" class="arrow"><i class="icon-arrow_fixed"></i><i class="icon-arrow_fixed_up"></i></div>
            </div>      
            <div class="container">
                <!-- 中獎資訊 -->       
                <div id="JackpotWinDiv" class="casino-jackpot-win">
                    <div class="casino-jackpot-win__info">
                        <div class="casino-jackpot-win__id">
                            <span id="JackpotWinUserName" class="casino-jackpot-win__text">*********</span>
                        </div>
                        <div class="casino-jackpot-win__title">
                            <img src="template/maxbet/th/images/CasinoJackpot/win-title.png">
                        </div>
                        <div class="casino-jackpot-win__time">
                            <span id="JackpotWinWinTime" class="casino-jackpot-win__text">*********</span>
                        </div>
                        <div class="casino-jackpot-win__money">
                            <span id="JackpotWinWinMoney" class="casino-jackpot-win__text">*********</span>
                        </div>
                        <img src="template/maxbet/public/images/CasinoJackpot/win-panel.png">
                    </div>                    
                    <div class="casino-jackpot-win__game">
                        <span id="JackpotWinWinGame" class="casino-jackpot-win__text">********</span>
                    </div>
                    <img src="template/maxbet/public/images/CasinoJackpot/win-bg.gif">
                </div>
                
                <!-- swiper -->
                <div id="JackpotSwiperContainer" class="swiper-container">            
                    <div id="JackpotArrowLeft" class="swiper-arrow-left ">
                        <div class="arrow-left ">
                            <i class="icon-arrow_fixed"></i>
                        </div>
                    </div>
                    <div id="JackpotArrowRight" class="swiper-arrow-right">
                        <div class="arrow-right">
                            <i class="icon-arrow_fixed"></i>
                        </div>
                    </div>  
                    <div id="tmpWrapper" class="swiper-wrapper">
                        
                        <div id="tmpSwiper" class="swiper-slide">
                            <!-- casino-jackpot pool-1 -->
                            <div class="casino-jackpot casino-jackpot_pool-1">
                                <a class="casino-jackpot__banner" href="#" title="Play Now">
                                    <img src="template/maxbet/th/images/CasinoJackpot/GodOfWealth-1.jpg">
                                </a>
                                <div class="casino-jackpot__pools">
                                    <ul class="casino-jackpot__list">
                                        <li class="casino-jackpot__row">
                                            <div class="casino-jackpot__col">
                                                <span class="casino-jackpot__text"></span>
                                            </div>
                                            <div class="casino-jackpot__col">
                                                <span class="casino-jackpot__money"></span>
                                            </div>
                                        </li>                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
    <div class="title">
    <span title="Mini Odds">
      Mini Odds
      <a id="btnMiniOddsRefresh" class="btnIcon right" title="รีเฟรช" onclick="fFrame.topFrame.miniOddsObj.Refresh();">
         <span class="icon-refresh"></span>
      </a>
    </span>
    </div>
    <div id="minioddCcontainer" class="miniodds container"></div>
    <div id="fixed_slide" class="fixed_slide" style="display: ;">
    <div class="slide_header" onClick="javascript:fFrame.mainFrame.CrossSellingRun();">
        <div class="slide_header_left">
            <img src="template/maxbet/public/images/fixed_bar/sevenbar.png">
            <h2>Come Play Our Exciting Games</h2>
        </div>
        <div class="slide_header_right">
            <div id="CSarrow" class="arrow">
                <i class="icon-arrow_fixed"></i>
                <i class="icon-arrow_fixed_up"></i>
            </div>
        </div>
        <div class="clearfix"></div>        
    </div>
    <div class="slide_box">
        <div id="swiper-container1" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCasino();">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Lobby.png">
                            </div>
                            <p>More Games</p>
                        </a>
                    </div>
                    <!--<div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('R0001',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/R0001_up.png">
                            </div>
                            <p>888 Dragons™</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('R0015',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/R0015_up.png">
                            </div>
                            <p>Blackjack</p>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('R0003',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/R0003_up.png">
                            </div>
                            <p>Lucky New Year</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('R0006',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/R0006_up.png">
                            </div>
                            <p>Sic Bo</p>
                        </a>
                    </div>-->
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('PP', 'vs1dragon8',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/PragmaticPlay/PP-888Dragons.png">
                            </div>
                            <p>888 Dragons™</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'R0003',960,720);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/R0003.png">
                            </div>
                            <p>Blackjack</p>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('PP', 'vs25newyear',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/PragmaticPlay/PP-LuckyNewYear.png">
                            </div>
                            <p>Lucky New Year</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'R0011',960,720);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/R0011.png">
                            </div>
                            <p>Sic Bo</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'S0001',960,540);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/S0001.png">
                            </div>
                            <p>Jungle Wild</p>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('PP', 'vs50amt',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/PragmaticPlay/PP-Aladdin'sTreasure.png">
                            </div>
                            <p>Aladdin's Treasure</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'R0001',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/R0001.png">
                            </div>
                            <p>Baccarat</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'S0004',960,540);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/S0004.png">
                            </div>
                            <p>God of Prosperity</p>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'R0006',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/R0006.png">
                            </div>
                            <p>Casino Hold'em</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('VB', 'gods-of-fortune',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/VB/VB-GodsOfFortune.png">
                            </div>
                            <p>Gods of Fortune</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('PP', 'vs20godiva',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/PragmaticPlay/PP-LadyGodiva.png">
                            </div>
                            <p>Lady Godiva</p>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('PP', 'vs20egypt',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/PragmaticPlay/PP-TalesOfEgypt.png">
                            </div>
                            <p>Tales of Egypt</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('OneRNG', 'R0010',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/Casino/R0010.png">
                            </div>
                            <p>Roulette Pro</p>
                        </a>
                    </div>
                    <div class="image_row ">
                        <a href="javascript:fFrame.topFrame.OpenCrossSellingOneRNGGame('VB', 'lucky-dragons',1024,768);">
                            <div class="black-div">
                                <div class="black_mask"></div>
                                <div class="try_btn">Play Now</div>
                                <img src="template/maxbet/public/images/fixed_bar/VB/VB-LuckyDragons.png">
                            </div>
                            <p>Lucky Dragons</p>
                        </a>
                    </div>
                    <!--<div class="image_row">
            <a href="javascript:fFrame.topFrame.OpenLiveCasinoWindow();">
                <div class="black-div">
                    <div class="black_mask"></div>
                    <div class="try_btn">Play Now</div>
                    <img src="template/maxbet/public/images/fixed_bar/LiveCasino.png">
                </div>
                <p>คาสิโน ออนไลน์</p>
            </a>
        </div>  -->
                </div>
            </div>
        </div>
        <div class="arrow-left">
            <i class="icon-arrow_fixed"></i>
        </div>
        <div class="arrow-right">
            <i class="icon-arrow_fixed"></i>
        </div>
    </div>
    </script>
    <script id="ColossusBetPopup" type="text/x-jquery-tmpl">
    <div id="ColossusBetPopup" style=" position: fixed;z-index: 1">
        <span></span>
    <div style="display: inline; width: 615px; position: absolute; visibility: visible; z-index: 100; top: 50px; left: 50px;">
        <div class="popupW">
    <div class="popupWTitle" > 
    <span>
      <div class="popWIcon"></div>
      <div class="popWTitleContain">Note</div>
      <div id="ColossusBetPopupClose" class="popWClose" title="Close"></div>
    </span> 
    </div>
    <div class="popWContain">
      <div class="popWTableArea jackpot">
        <h1>Please read the information below for claim your prize.</h1>
        <ol>
          <li>Please note that in order for us to secure your prize when claiming it, we would ask you to provide your login password at the time when the bet ticket was placed.</li>
          <li>Please also provide your email and cell-phone number when claiming your prize, Customer Support will contact you shortly after.</li>
        </ol>
        <div class="popWBlueArea">
          <label>
          <div class="inputTitle" title="มือถือ">มือถือ</div>
          <div class="inputContent">
            <div id="SelectMobileCountry_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('SelectMobileCountry',event);return false;" onclick="onClickSelecter('SelectMobileCountry');return false;" class="button select">
<input type="hidden" name="SelectMobileCountry" id="SelectMobileCountry" value="" />
<span  id="SelectMobileCountry_Txt" title=''></span>
<ul id="SelectMobileCountry_menu" class="submenu">
<li  title='Algeria(+213)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'213',false);">Algeria(+213)</li>
<li  title='Angola(+244)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'244',false);">Angola(+244)</li>
<li  title='Argentina(+54)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'54',false);">Argentina(+54)</li>
<li  title='Bahrain(+973)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'973',false);">Bahrain(+973)</li>
<li  title='Bangladesh(+880)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'880',false);">Bangladesh(+880)</li>
<li  title='Belarus(+375)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'375',false);">Belarus(+375)</li>
<li  title='Belgium(+32)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'32',false);">Belgium(+32)</li>
<li  title='Belize(+501)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'501',false);">Belize(+501)</li>
<li  title='Benin(+229)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'229',false);">Benin(+229)</li>
<li  title='Bolivia(+591)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'591',false);">Bolivia(+591)</li>
<li  title='Brunei(+673)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'673',false);">Brunei(+673)</li>
<li  title='Burkina Faso(+226)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'226',false);">Burkina Faso(+226)</li>
<li  title='Burundi(+257)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'257',false);">Burundi(+257)</li>
<li  title='Cambodia(+855)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'855',false);">Cambodia(+855)</li>
<li  title='Cameroon(+237)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'237',false);">Cameroon(+237)</li>
<li  title='Canada(+1)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'1',false);">Canada(+1)</li>
<li  title='Cape Verde(+238)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'238',false);">Cape Verde(+238)</li>
<li  title='Central African Republic(+236)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'236',false);">Central African Republic(+236)</li>
<li  title='Chad(+235)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'235',false);">Chad(+235)</li>
<li  title='Chile(+56)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'56',false);">Chile(+56)</li>
<li  title='Colombia(+57)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'57',false);">Colombia(+57)</li>
<li  title='Comoros(+269)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'269',false);">Comoros(+269)</li>
<li  title='Cook Islands(+682)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'682',false);">Cook Islands(+682)</li>
<li  title='Costa Rica(+506)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'506',false);">Costa Rica(+506)</li>
<li  title='Cuba(+53)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'53',false);">Cuba(+53)</li>
<li  title='Curacao(+599)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'599',false);">Curacao(+599)</li>
<li  title='Djibouti(+253)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'253',false);">Djibouti(+253)</li>
<li  title='East Timor(+670)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'670',false);">East Timor(+670)</li>
<li  title='Ecuador(+593)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'593',false);">Ecuador(+593)</li>
<li  title='Egypt(+20)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'20',false);">Egypt(+20)</li>
<li  title='El Salvador(+503)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'503',false);">El Salvador(+503)</li>
<li  title='Equatorial Guinea(+240)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'240',false);">Equatorial Guinea(+240)</li>
<li  title='Eritrea(+291)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'291',false);">Eritrea(+291)</li>
<li  title='Ethiopia(+251)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'251',false);">Ethiopia(+251)</li>
<li  title='Falkland Islands(+500)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'500',false);">Falkland Islands(+500)</li>
<li  title='Fiji(+679)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'679',false);">Fiji(+679)</li>
<li  title='French Polynesia(+689)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'689',false);">French Polynesia(+689)</li>
<li  title='Gabon(+241)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'241',false);">Gabon(+241)</li>
<li  title='Gambia(+220)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'220',false);">Gambia(+220)</li>
<li  title='Ghana(+233)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'233',false);">Ghana(+233)</li>
<li  title='Guatemala(+502)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'502',false);">Guatemala(+502)</li>
<li  title='Guinea(+224)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'224',false);">Guinea(+224)</li>
<li  title='Guinea-Bissau(+245)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'245',false);">Guinea-Bissau(+245)</li>
<li  title='Guyana(+592)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'592',false);">Guyana(+592)</li>
<li  title='Haiti(+509)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'509',false);">Haiti(+509)</li>
<li  title='Honduras(+504)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'504',false);">Honduras(+504)</li>
<li  title='Iceland(+354)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'354',false);">Iceland(+354)</li>
<li  title='India(+91)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'91',false);">India(+91)</li>
<li  title='Indonesia(+62)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'62',false);">Indonesia(+62)</li>
<li  title='Iran(+98)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'98',false);">Iran(+98)</li>
<li  title='Iraq(+964)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'964',false);">Iraq(+964)</li>
<li  title='Ireland(+353)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'353',false);">Ireland(+353)</li>
<li  title='Israel(+972)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'972',false);">Israel(+972)</li>
<li  title='Italy(+39)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'39',false);">Italy(+39)</li>
<li  title='Ivory Coast(+225)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'225',false);">Ivory Coast(+225)</li>
<li  title='Japan(+81)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'81',false);">Japan(+81)</li>
<li  title='Jordan(+962)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'962',false);">Jordan(+962)</li>
<li  title='Kenya(+254)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'254',false);">Kenya(+254)</li>
<li  title='Kiribati(+686)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'686',false);">Kiribati(+686)</li>
<li  title='Kuwait(+965)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'965',false);">Kuwait(+965)</li>
<li  title='Kyrgyzstan(+996)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'996',false);">Kyrgyzstan(+996)</li>
<li  title='Laos(+856)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'856',false);">Laos(+856)</li>
<li  title='Lebanon(+961)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'961',false);">Lebanon(+961)</li>
<li  title='Lesotho(+266)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'266',false);">Lesotho(+266)</li>
<li  title='Liberia(+231)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'231',false);">Liberia(+231)</li>
<li  title='Libya(+218)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'218',false);">Libya(+218)</li>
<li  title='Macao(+853)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'853',false);">Macao(+853)</li>
<li  title='Madagascar(+261)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'261',false);">Madagascar(+261)</li>
<li  title='Malawi(+265)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'265',false);">Malawi(+265)</li>
<li  title='Malaysia(+60)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'60',false);">Malaysia(+60)</li>
<li  title='Maldives(+960)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'960',false);">Maldives(+960)</li>
<li  title='Mali(+223)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'223',false);">Mali(+223)</li>
<li  title='Marshall Islands(+692)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'692',false);">Marshall Islands(+692)</li>
<li  title='Mauritania(+222)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'222',false);">Mauritania(+222)</li>
<li  title='Mauritius(+230)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'230',false);">Mauritius(+230)</li>
<li  title='Mexico(+52)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'52',false);">Mexico(+52)</li>
<li  title='Mongolia(+976)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'976',false);">Mongolia(+976)</li>
<li  title='Morocco(+212)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'212',false);">Morocco(+212)</li>
<li  title='Mozambique(+258)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'258',false);">Mozambique(+258)</li>
<li  title='Myanmar(+95)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'95',false);">Myanmar(+95)</li>
<li  title='Namibia(+264)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'264',false);">Namibia(+264)</li>
<li  title='Nauru(+674)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'674',false);">Nauru(+674)</li>
<li  title='Nepal(+977)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'977',false);">Nepal(+977)</li>
<li  title='New Caledonia(+687)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'687',false);">New Caledonia(+687)</li>
<li  title='New Zealand(+64)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'64',false);">New Zealand(+64)</li>
<li  title='Nicaragua(+505)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'505',false);">Nicaragua(+505)</li>
<li  title='Niger(+227)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'227',false);">Niger(+227)</li>
<li  title='Nigeria(+234)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'234',false);">Nigeria(+234)</li>
<li  title='Niue(+683)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'683',false);">Niue(+683)</li>
<li  title='North Korea(+850)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'850',false);">North Korea(+850)</li>
<li  title='Oman(+968)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'968',false);">Oman(+968)</li>
<li  title='Pakistan(+92)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'92',false);">Pakistan(+92)</li>
<li  title='Palau(+680)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'680',false);">Palau(+680)</li>
<li  title='Palestine(+970)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'970',false);">Palestine(+970)</li>
<li  title='Panama(+507)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'507',false);">Panama(+507)</li>
<li  title='Papua New Guinea(+675)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'675',false);">Papua New Guinea(+675)</li>
<li  title='Paraguay(+595)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'595',false);">Paraguay(+595)</li>
<li  title='Peru(+51)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'51',false);">Peru(+51)</li>
<li  title='Qatar(+974)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'974',false);">Qatar(+974)</li>
<li  title='Republic of the Congo(+242)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'242',false);">Republic of the Congo(+242)</li>
<li  title='Reunion(+262)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'262',false);">Reunion(+262)</li>
<li  title='Rwanda(+250)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'250',false);">Rwanda(+250)</li>
<li  title='Saint Barthelemy(+590)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'590',false);">Saint Barthelemy(+590)</li>
<li  title='Saint Helena(+290)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'290',false);">Saint Helena(+290)</li>
<li  title='Samoa(+685)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'685',false);">Samoa(+685)</li>
<li  title='Saudi Arabia(+966)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'966',false);">Saudi Arabia(+966)</li>
<li  title='Senegal(+221)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'221',false);">Senegal(+221)</li>
<li  title='Seychelles(+248)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'248',false);">Seychelles(+248)</li>
<li  title='Sierra Leone(+232)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'232',false);">Sierra Leone(+232)</li>
<li  title='Solomon Islands(+677)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'677',false);">Solomon Islands(+677)</li>
<li  title='Somalia(+252)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'252',false);">Somalia(+252)</li>
<li  title='South Africa(+27)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'27',false);">South Africa(+27)</li>
<li  title='South Korea(+82)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'82',false);">South Korea(+82)</li>
<li  title='South Sudan(+211)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'211',false);">South Sudan(+211)</li>
<li  title='Sri Lanka(+94)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'94',false);">Sri Lanka(+94)</li>
<li  title='Sudan(+249)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'249',false);">Sudan(+249)</li>
<li  title='Suriname(+597)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'597',false);">Suriname(+597)</li>
<li  title='Swaziland(+268)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'268',false);">Swaziland(+268)</li>
<li  title='Syria(+963)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'963',false);">Syria(+963)</li>
<li  title='Tajikistan(+992)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'992',false);">Tajikistan(+992)</li>
<li  title='Tanzania(+255)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'255',false);">Tanzania(+255)</li>
<li  title='Thailand(+66)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'66',false);">Thailand(+66)</li>
<li  title='Togo(+228)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'228',false);">Togo(+228)</li>
<li  title='Tokelau(+690)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'690',false);">Tokelau(+690)</li>
<li  title='Tonga(+676)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'676',false);">Tonga(+676)</li>
<li  title='Tunisia(+216)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'216',false);">Tunisia(+216)</li>
<li  title='Turkmenistan(+993)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'993',false);">Turkmenistan(+993)</li>
<li  title='Tuvalu(+688)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'688',false);">Tuvalu(+688)</li>
<li  title='Uganda(+256)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'256',false);">Uganda(+256)</li>
<li  title='United Arab Emirates(+971)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'971',false);">United Arab Emirates(+971)</li>
<li  title='Uruguay(+598)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'598',false);">Uruguay(+598)</li>
<li  title='Uzbekistan(+998)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'998',false);">Uzbekistan(+998)</li>
<li  title='Vanuatu(+678)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'678',false);">Vanuatu(+678)</li>
<li  title='Venezuela(+58)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'58',false);">Venezuela(+58)</li>
<li  title='Wallis and Futuna(+681)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'681',false);">Wallis and Futuna(+681)</li>
<li  title='Yemen(+967)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'967',false);">Yemen(+967)</li>
<li  title='Zambia(+260)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'260',false);">Zambia(+260)</li>
<li  title='Zimbabwe(+263)' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('SelectMobileCountry',this,'263',false);">Zimbabwe(+263)</li>
</ul>
</div>

          </div>
          </label>
           <label>
            <div class="inputTitle"></div>
            <div class="inputContent">
              <input id="Mobile" name="Mobile" value="" />
              <div class="color01" id="MobileAlert" style="display: none;">มือถือ is in wrong format. Please check.</div>
            </div>
            </label>
            <label>
          <div class="inputTitle" title="อีเมลล์แอดเดรส">อีเมลล์แอดเดรส</div>
          <div class="inputContent">
            <input id="Email" name="Email" value="" />
            <div class="color01" id="EmailAlert" style="display: none;">อีเมลล์แอดเดรส is in wrong format. Please check.</div>
          </div>
          </label>
          <div class="btnArea"><a id="ColossusBetPopupConfirm" href="#" class="button mark"><span>ตกลง</span></a></div>
        </div>
        <div class="checkbox"><input id="cbColossusBetPopup" name="cbColossusBetPopup" type="checkbox" onclick="return;">Do not show this message again</div>
      </div>
    </div>
  </div>
    </div>
    </script>
    <script id="SiteTransitionTip" type="text/x-jquery-tmpl">
    <div id="SiteTransitionTip" class="site-transiton">
        <div class="site-transiton__item">
            <span class="icon-switch"></span>
        </div>
        <div class="site-transiton__item">
            <strong>Switching to new version</strong>
            <span class="preloader-dots"></span>
            <p>Please wait for a moment</p>
        </div>
    </div>
    </script>
    <script id="SwitchNewVersionTip" type="text/x-jquery-tmpl">
    <div id="SwitchNewVersionTip" class="SwitchVer">
        <div class="tips">
            <div class="content info">
                <p>Click to try out the new version NOW!</p>
            </div>
        </div>
    </div>
    </script>
    <script id="PromoNewVersionPopup" type="text/x-jquery-tmpl">
    <style type="text/css">
    .promoNewVersion{
        position: fixed;
        width: 100%;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: 999999;
    }

    .promoNewVersion .content{
        font-family: Tahoma, "Microsoft YaHei", "Microsoft JhengHei";
        font-size: 12px;
        width: 492px;
        padding: 5px;
        border: 3px solid #fff;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
        text-align: center;
        position: absolute;
        top: 230px;
        margin-top: -220px;
        left: 145px;
    }

    .promoNewVersion .close{
        background: url(template/maxbet/public/images/layout/icon_UI01.png) 132px -18px;
        position: absolute;
        right: -10px;
        top: -10px;
        width: 16px;
        height: 16px;
        border-radius: 16px;
        border: 3px solid #fff;
        background-color: #ccc;
        color: #fff;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .promoNewVersion .close:hover{
        background-color: #666;
    }

    .promoNewVersion h1.title{
        color: #f27321;
        margin-top: 0;
    }

    .promoNewVersion ul{
        list-style: none;
        text-align: left;
        margin-left: 5.3em;
    }

    .promoNewVersion li{
        background: url(template/maxbet/public/images/layout/welcom-icon.png) left top no-repeat;
        padding: 0 10px 6px 30px;
        font-size: 16px;
    }

    .promoNewVersion .btnAera{
        padding: 0 10px;
    }

    .promoNewVersion .btnAera > div{
        padding: 8px;
        cursor: pointer;
    }
    .promoNewVersion .btnAera > div:hover{
        opacity: .8;
    }
    .promoNewVersion .btnAera > div.btn{
        display: inline-block;
        color: #fff;
        font-size: 1.5em;
        box-sizing: border-box;
        border-radius: 3px;
        width: 72%;
        background-color: #7490c3;
    }

    .promoNewVersion .btnAera > div.second{
        width: 25%;
        background-color: #b1b1b1;
        margin-left: 1%;
    }
    .promoNewVersion .btnAera > div.third{
        color: #bebebe;
        text-align: right;
        padding: 4px 8px 2px;
        text-decoration: underline;
    }
    </style>    
    <div id="PromoNewVersionPopup" class="promoNewVersion">
      <div class="content">
        <div class="close" title=ปิด onClick="javascript:HidePromoPage(true);"></div>
        <img src="template/maxbet/public/images/layout/welcom.png">
        <h1 class="title">Introducing New Version</h1>
        <ul>
            <li>Instant Odds Updates using Push Technology</li>
            <li>Quick Bet</li>
            <li>Responsive Web Design</li>
        </ul>
        <div class="btnAera">
            <div class="btn" onClick="javascript:HidePromoPage(false);javascript:fFrame.leftFrame.checkBrowserVer();">TRY NOW</div>
            <div class="btn second" onClick="javascript:HidePromoPage(true);">Later</div>
            <div class="third" id="poptoms2_DoNotShowAgain" onclick="javascript:PromoDoNotShowAgain();">Do not show again</div>
        </div>
      </div>
    </div>
    </script>
</div>
