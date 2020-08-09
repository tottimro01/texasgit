if(typeof(txnHistory)=="undefined"){txnHistory={}}(function(){var g=-1;var a={1:"Active",4:"OPCancel",8:"Settle",16:"Void"};var d=function(h){return h>=0?"":"negative"};var c=function(h){if(h==1){return a[1]}if(((h&4)==4)){return a[4]}if(((h&16)==16)){return a[16]}if(((h&8)==8)){return a[8]}return"Error"};var b=function(h){return function(){JCache.get("#txnCurrentGA").html("GA"+h.gameID);JCache.get("#txnPopResult").removeClass();JCache.get("#txnGameWinnerBac").css("display","none");JCache.get("#txnGameWinnerDra").css("display","none");JCache.get("#txnGameWinnerSic").css("display","none");JCache.get("#txnPlayer1stCard").removeClass();JCache.get("#txnPlayer2ndCard").removeClass();JCache.get("#txnPlayer3rdCard").removeClass();JCache.get("#txnBanker1stCard").removeClass();JCache.get("#txnBanker2ndCard").removeClass();JCache.get("#txnBanker3rdCard").removeClass();JCache.get("#txnDragon1stCard").removeClass();JCache.get("#txnTiger1stCard").removeClass();JCache.get("#txnGameWinnerBANKER").css("display","none");JCache.get("#txnGameWinnerPLAYER").css("display","none");JCache.get("#txnGameWinnerTIGER").css("display","none");JCache.get("#txnGameWinnerDRAGON").css("display","none");JCache.get("#txnGameWinnerTIE").css("display","none");JCache.get("#txnSicDice1").removeClass();JCache.get("#txnSicDice2").removeClass();JCache.get("#txnSicDice3").removeClass();if(h.gameType==GameType.Baccarat.value){JCache.get("#transHistoryVideoReplay").css("margin-left","-150px");JCache.get("#transHistoryVideoReplay").css("width","980px");JCache.get("#txnPopResult").addClass("popResult-poker");JCache.get("#txnPlayerHandValue").html(h.playerHandValue);JCache.get("#txnBankerHandValue").html(h.bankerHandValue);JCache.get("#txnPlayer1stCard").addClass(h.player1stCardType);JCache.get("#txnPlayer2ndCard").addClass(h.player2ndCardType);JCache.get("#txnPlayer3rdCard").addClass(h.player3rdCardType);JCache.get("#txnBanker1stCard").addClass(h.banker1stCardType);JCache.get("#txnBanker2ndCard").addClass(h.banker2ndCardType);JCache.get("#txnBanker3rdCard").addClass(h.banker3rdCardType);JCache.get("#txnGameWinnerBac").css("display","");JCache.get("#txnGameWinner"+GameWinnerType.getInstance(h.winner).name).css("display","")}else{if(h.gameType==GameType.DragonTiger.value){JCache.get("#transHistoryVideoReplay").css("margin-left","-150px");JCache.get("#transHistoryVideoReplay").css("width","980px");JCache.get("#txnPopResult").addClass("popResult-poker");JCache.get("#txnDragonHandValue").html(PokerCardUtil.getDragonTigerCardPoint(h.playerHandValue));JCache.get("#txnTigerHandValue").html(PokerCardUtil.getDragonTigerCardPoint(h.bankerHandValue));JCache.get("#txnDragon1stCard").addClass(h.player1stCardType);JCache.get("#txnTiger1stCard").addClass(h.banker1stCardType);JCache.get("#txnGameWinnerDra").css("display","");JCache.get("#txnGameWinner"+GameWinnerLongHuType.getInstance(h.winner).name).css("display","")}else{if(h.gameType==GameType.Sicbo.value){JCache.get("#transHistoryVideoReplay").css("width","850px");if(g==0){JCache.get("#transHistoryVideoReplay").css("margin-left","-115px")}else{JCache.get("#transHistoryVideoReplay").css("margin-left","-70px")}JCache.get("#txnPopResult").addClass("popResult-dice");JCache.get("#txnSicDiceTotal").html(h.dice1+h.dice2+h.dice3);if(h.dice1==h.dice2&&h.dice2==h.dice3){JCache.get("#txnSicDiceBigSmall").html(I18N.get("form.text.report.sicT"+h.dice1+h.dice2+h.dice3))}else{if((h.dice1+h.dice2+h.dice3)>10){JCache.get("#txnSicDiceBigSmall").html(I18N.get("form.text.report.sicBig"))}else{JCache.get("#txnSicDiceBigSmall").html(I18N.get("form.text.report.sicSmall"))}}if(g==0){JCache.get("#txnSicDice1").addClass("dice"+h.dice1+((h.dice1==1||h.dice1==4)?" red":" black"));JCache.get("#txnSicDice2").addClass("dice"+h.dice2+((h.dice2==1||h.dice2==4)?" red":" black"));JCache.get("#txnSicDice3").addClass("dice"+h.dice3+((h.dice3==1||h.dice3==4)?" red":" black"))}else{JCache.get("#txnSicDice1").addClass("dice"+h.dice1+" black");JCache.get("#txnSicDice2").addClass("dice"+h.dice2+" black");JCache.get("#txnSicDice3").addClass("dice"+h.dice3+" black")}JCache.get("#txnGameWinnerSic").css("display","")}else{if(h.gameType==GameType.FishPrawnCrab.value){JCache.get("#transHistoryVideoReplay").css("margin-left","-115px");JCache.get("#transHistoryVideoReplay").css("width","850px");JCache.get("#txnPopResult").addClass("popResult-dice");JCache.get("#txnSicDiceTotal").html(h.dice1+h.dice2+h.dice3);if(h.dice1==h.dice2&&h.dice2==h.dice3){JCache.get("#txnSicDiceBigSmall").html(I18N.get("form.text.report.fpcT"+h.dice1+h.dice2+h.dice3))}else{if((h.dice1+h.dice2+h.dice3)>10){JCache.get("#txnSicDiceBigSmall").html(I18N.get("form.text.report.sicBig"))}else{JCache.get("#txnSicDiceBigSmall").html(I18N.get("form.text.report.sicSmall"))}}JCache.get("#txnSicDice1").addClass("bauCua"+h.dice1);JCache.get("#txnSicDice2").addClass("bauCua"+h.dice2);JCache.get("#txnSicDice3").addClass("bauCua"+h.dice3);JCache.get("#txnGameWinnerSic").css("display","")}}}}JCache.get("#transHistoryVideo").css("display","flex");JCache.get("#transHistoryVideoReplayError").css("display","");if(h.replayer1!=""){JCache.get("#transHistoryVideoReplay").children("source").eq(0).prop("src",h.replayer1);JCache.get("#popResultVideoDIV").css("display","");if(typeof h.replayer2!="undefined"){JCache.get("#transHistoryVideoReplay").children("source").eq(1).prop("src",h.replayer2)}}else{JCache.get("#popResultVideoDIV").css("display","none")}JCache.get("#transHistoryVideoReplay").get(0).load();JCache.get("#transHistoryVideoReplayBtn").removeClass().addClass("btnResult-VideoStop")}};var f=function(){JCache.get("#transHistoryVideo").css("display","none");JCache.get("#queryType1").prop("disabled",true);JCache.get("#queryType2").prop("disabled",true);JCache.get("#queryType3").prop("disabled",true);JCache.get("#queryType4").prop("disabled",true);JCache.get("#search").prop("disabled",true);var m=JCache.get("#strDate").val().split("/");var u=JCache.get("#strHour").val();var t=JCache.get("#strMin").val();var q=JCache.get("#endDate").val().split("/");var n=JCache.get("#endHour").val();var p=JCache.get("#endMin").val();var r=new Date(m[2],m[1]-1,m[0],u,t,0).getTime();var v=new Date(q[2],q[1]-1,q[0],n,p,59).getTime()+999;if(r>v){var s=DateUtil.format(new Date(v),"dd/MM/yyyy hh:mm");var l=DateUtil.format(new Date(r),"dd/MM/yyyy hh:mm");var k=s.split(" ");var o=l.split(" ");JCache.get("#strDate").val(k[0]);JCache.get("#endDate").val(o[0]);var j=k[1].split(":");var h=o[1].split(":");JCache.get("#strHour").children().eq(j[0]).prop("selected",true);JCache.get("#endHour").children().eq(h[0]).prop("selected",true);JCache.get("#strMin").children().eq(j[1]).prop("selected",true);JCache.get("#endMin").children().eq(h[1]).prop("selected",true)}postAjax({url:"/player/query/queryTxnHistory",data:{dealerDomain:g,strDateTime:r,endDateTime:v},success:function(z){var y=$j(document.createDocumentFragment());var F=z.txnHistory;var N;if(!$j.isEmptyObject(F)){F.sort(function(Q,P){if(Q.betTime>P.betTime){return -1}if(Q.betTime<P.betTime){return 1}return 0});var M=new Map();$j.each(F,function(Q,S){var P;var R=DateUtil.format(new Date(S.roundStartTime),"dd/MM/yyyy")+"_"+S.tableID+"_"+S.gameShoe+"_"+S.gameRound+"_"+S.category;if(M.containsKey(R)){P=M.get(R)}else{P=[];M.put(R,P)}P.push(S)});var O=M.entrySet();for(var w in O){var B=O[w].key;var G=O[w].value;var A;var E=0;var H=0;var C=0;for(var I=0;I<G.length;I++){A=G[I];E+=G[I].stake;H+=G[I].profitLoss;C+=G[I].validBet}N=JCache.clone("#transTemplate").css("display","");var L="";if(c(A.status)==a[16]){L="del"}N.children().eq(0).text(A.id);N.children().eq(1).addClass(L).text(DateUtil.format(new Date(A.betTime),"dd/MM/yyyy hh:mm:ss"));N.children().eq(2).addClass(L).text(A.tableID);N.children().eq(4).addClass(L).text(A.gameShoe);N.children().eq(5).addClass(L).text(A.gameRound);var D;if(A.gameType==GameType.Baccarat.value){D=CategoryType[A.category];N.children().eq(3).addClass(L).text(I18N.get("form.text.baccarat"));N.children().eq(6).addClass(D.historyClass).addClass(L).text(I18N.get("form.text.report."+D.historyText))}else{if(A.gameType==GameType.DragonTiger.value){D=LongHuCategoryType[A.category];N.children().eq(3).addClass(L).text(I18N.get("form.text.dragonTiger"));N.children().eq(6).addClass(D.historyClass).addClass(L).text(I18N.get("form.text.report."+D.historyText))}else{if(A.gameType==GameType.Sicbo.value){D=SicCategoryType[A.category];N.children().eq(3).addClass(L).text(I18N.get("form.text.sicbo"));N.children().eq(6).addClass("bet").text(I18N.get("form.text.report.sic"+A.category))}else{if(A.gameType==GameType.FishPrawnCrab.value){D=SicCategoryType[A.category];N.children().eq(3).addClass(L).text(I18N.get("form.text.fishPrawnCrab"));if(A.category.startsWith("Pt")||A.category.startsWith("AnyTriple")||A.category.startsWith("Big")||A.category.startsWith("Small")){N.children().eq(6).addClass("bet").text(I18N.get("form.text.report.sic"+A.category))}else{N.children().eq(6).addClass("bet").text(I18N.get("form.text.report.fpc"+A.category))}}}}}switch(D){case CategoryType.BankerPair:case CategoryType.PlayerPair:if(A.odds>11){N.children().eq(6).append("<span>X"+A.odds+"</span>")}break;case CategoryType.BankerBonus:case CategoryType.PlayerBonus:if(A.odds>1){N.children().eq(6).append("<span>X"+A.odds+"</span>")}break;case CategoryType.BankerInsurance1:case CategoryType.BankerInsurance2:case CategoryType.PlayerInsurance1:case CategoryType.PlayerInsurance2:if(A.odds>0){N.children().eq(6).append("<span>X"+A.odds+"</span>")}break;default:}N.children().eq(7).addClass(L).text(CurrencyUtil.format(E));if(A.gameType==GameType.Baccarat.value||A.gameType==GameType.DragonTiger.value){if(A.winner){N.children().eq(8).addClass(L).text(CurrencyUtil.format(C,2));var J=H;N.children().eq(9).addClass(d(J)).addClass(L);if(J>=0){N.children().eq(9).text(CurrencyUtil.format(J,2))}else{N.children().eq(9).text("("+CurrencyUtil.format(Math.abs(J),2)+")")}if(A.gameType==GameType.Baccarat.value){N.children().eq(10).addClass(GameWinnerType.getInstance(A.winner).displayCssHistory).addClass(L).text(I18N.get("form.text.report."+GameWinnerType.getInstance(A.winner).displayTextHistory))}else{N.children().eq(10).addClass(GameWinnerLongHuType.getInstance(A.winner).displayCssHistory).addClass(L).text(I18N.get("form.text.report."+GameWinnerLongHuType.getInstance(A.winner).displayTextHistory))}N.children().eq(11).children().eq(0).css("color","#3B3BFF").unbind("click").bind("click",b({gameID:A.gameID,winner:A.winner,gameType:A.gameType,replayer1:A.replayer1,replayer2:A.replayer2,playerHandValue:A.playerHandValue,bankerHandValue:A.bankerHandValue,player1stCardType:A.player1stCardType,player2ndCardType:A.player2ndCardType,player3rdCardType:A.player3rdCardType,banker1stCardType:A.banker1stCardType,banker2ndCardType:A.banker2ndCardType,banker3rdCardType:A.banker3rdCardType})).prop("href","javascript:void(0)").addClass(L)}else{N.children().eq(8).addClass(L).text("-");N.children().eq(9).addClass(L).text("-");N.children().eq(10).addClass(L).text("-");N.children().eq(11).children().eq(0).css("display","none").addClass(L).text("-")}}else{if(A.gameType==GameType.Sicbo.value||A.gameType==GameType.FishPrawnCrab.value){if(A.dice1&&A.dice2&&A.dice3){N.children().eq(8).addClass(L).text(CurrencyUtil.format(C,2));var J=H;N.children().eq(9).addClass(d(J)).addClass(L);if(J>=0){N.children().eq(9).text(CurrencyUtil.format(J,2))}else{N.children().eq(9).text("("+CurrencyUtil.format(Math.abs(J),2)+")")}if(A.gameType==GameType.FishPrawnCrab.value){N.children().eq(10).addClass(L).text(I18N.get("form.text.report.fpcDice"+A.dice1)+" "+I18N.get("form.text.report.fpcDice"+A.dice2)+" "+I18N.get("form.text.report.fpcDice"+A.dice3))}else{N.children().eq(10).addClass(L).text(A.dice1+" "+A.dice2+" "+A.dice3)}N.children().eq(11).children().eq(0).css("color","#3B3BFF").unbind("click").bind("click",b({gameID:A.gameID,gameType:A.gameType,replayer1:A.replayer1,replayer2:A.replayer2,dice1:A.dice1,dice2:A.dice2,dice3:A.dice3})).prop("href","javascript:void(0)").addClass(L)}else{N.children().eq(8).addClass(L).text("-");N.children().eq(9).addClass(L).text("-");N.children().eq(10).addClass(L).text("-");N.children().eq(11).children().eq(0).css("display","none").addClass(L).text("-")}}}if(G.length>1){var K=JCache.clone("#txnMoreTemplate").prop("id","more");K.data("key",B).data("switch",0);K.bind("click",function(){if($j(this).data("switch")==0){$j(this).data("switch",1);$j(this).addClass("now");$j("tr[name='tr_"+$j(this).data("key")+"']").css("display","")}else{$j(this).data("switch",0);$j(this).removeClass("now");$j("tr[name='tr_"+$j(this).data("key")+"']").css("display","none")}JCache.get("#transHistoryList").getNiceScroll().resize()});N.children().eq(6).append(K)}y.append(N);if(G.length>1){for(var I=0;I<G.length;I++){N=JCache.clone("#transTemplate").css("display","none");N.attr("name","tr_"+B);N.addClass("layer2");var L="";if(c(A.status)==a[16]){L="del"}N.children().eq(0).text(G[I].id);N.children().eq(1).addClass(L).text(DateUtil.format(new Date(G[I].betTime),"dd/MM/yyyy hh:mm:ss"));N.children().eq(2).addClass(L);N.children().eq(3).addClass(L);N.children().eq(4).addClass(L);N.children().eq(5).addClass(L);N.children().eq(6).addClass(L);N.children().eq(7).addClass(L).text(CurrencyUtil.format(G[I].stake));N.children().eq(8).addClass(L);if(A.gameType==GameType.Baccarat.value||A.gameType==GameType.DragonTiger.value){N.children().eq(9).addClass(L);if(A.winner){var J=G[I].profitLoss;N.children().eq(9).addClass(d(J));if(J>=0){N.children().eq(9).text(CurrencyUtil.format(J,2))}else{N.children().eq(9).text("("+CurrencyUtil.format(Math.abs(J),2)+")")}}}else{if(A.gameType==GameType.Sicbo.value||A.gameType==GameType.FishPrawnCrab.value){N.children().eq(9).addClass(L);if(A.dice1&&A.dice2&&A.dice3){var J=G[I].profitLoss;N.children().eq(9).addClass(d(J));if(J>=0){N.children().eq(9).text(CurrencyUtil.format(J,2))}else{N.children().eq(9).text("("+CurrencyUtil.format(Math.abs(J),2)+")")}}}}N.children().eq(10).addClass(L);N.children().eq(11).children().eq(0).css("display","none");y.append(N)}}}}else{N=JCache.clone("#transTemplate").css("display","");N.children().eq(0).text("");N.children().eq(1).text("");N.children().eq(2).text("");N.children().eq(3).text("");N.children().eq(4).text("");N.children().eq(5).text(I18N.get("msg.info.nodata"));N.children().eq(6).text("");N.children().eq(7).text("");N.children().eq(8).text("");N.children().eq(9).text("");N.children().eq(10).text("");N.children().eq(11).children().eq(0).css("display","none").text("");y.append(N)}N=JCache.clone("#transTemplate").css("display","");N.children().eq(0).text(I18N.get("form.text.report.Total"));N.children().eq(1).text("");N.children().eq(2).text("");N.children().eq(3).text("");N.children().eq(4).text("");N.children().eq(5).text("");N.children().eq(6).text("");N.children().eq(7).text(CurrencyUtil.format(z.totalStake));N.children().eq(8).text(CurrencyUtil.format(z.totalValidTunrover,2));if(z.totalProfitLoss>=0){N.children().eq(9).addClass(d(z.totalProfitLoss)).text(CurrencyUtil.format(z.totalProfitLoss,2))}else{N.children().eq(9).addClass(d(z.totalProfitLoss)).text("("+CurrencyUtil.format(Math.abs(z.totalProfitLoss),2)+")")}N.children().eq(10).text("");N.children().eq(11).children().eq(0).css("display","none").text("");y.append(N);var x=JCache.get("#transHistoryTBody");x.empty();x.append(y);JCache.get("#transHistoryList").getNiceScroll().resize();JCache.get("#transHistoryList").scrollTop(0)},complete:function(w){JCache.get("#queryType1").prop("disabled",false);JCache.get("#queryType2").prop("disabled",false);JCache.get("#queryType3").prop("disabled",false);JCache.get("#queryType4").prop("disabled",false);JCache.get("#search").prop("disabled",false)}})};var e=function(){return function(){f()}};queryTxnHistoryByTypeCallback=function(h){return function(){var j=new Date();var k=new Date();switch(h){case 1:break;case 2:j.setDate(j.getDate()-1);k.setDate(k.getDate()-1);break;case 3:j.setDate(j.getDate()-j.getDay());k.setDate(k.getDate()-k.getDay()+6);break;case 4:j.setDate(j.getDate()-j.getDay()-7);k.setDate(k.getDate()-k.getDay()-1);break;default:break}JCache.get("#strDate").val(DateUtil.format(j,"dd/MM/yyyy"));JCache.get("#endDate").val(DateUtil.format(k,"dd/MM/yyyy"));JCache.get("#strHour").children().eq(0).prop("selected",true);JCache.get("#strMin").children().eq(0).prop("selected",true);JCache.get("#endHour").children().eq(23).prop("selected",true);JCache.get("#endMin").children().eq(59).prop("selected",true);f()}};txnHistory.init=function(h){g=h;JCache.get("#strDate").datepicker({dateFormat:"dd/mm/yy",minDate:"-6d",maxDate:"+0d"});JCache.get("#endDate").datepicker({dateFormat:"dd/mm/yy",minDate:"-6d",maxDate:"+0d"});var j=DateUtil.format(new Date(),"dd/MM/yyyy");JCache.get("#strDate").val(j);JCache.get("#endDate").val(j);for(i=0;i<=23;i++){var k=FormatUtil.padLeft(i,2);JCache.get("#strHour")[0][i]=new Option(k,k);JCache.get("#endHour")[0][i]=new Option(k,k)}JCache.get("#strHour").children().eq(0).prop("selected",true);JCache.get("#endHour").children().eq(23).prop("selected",true);for(i=0;i<=59;i++){var k=FormatUtil.padLeft(i,2);JCache.get("#strMin")[0][i]=new Option(k,k);JCache.get("#endMin")[0][i]=new Option(k,k)}JCache.get("#strMin").children().eq(0).prop("selected",true);JCache.get("#endMin").children().eq(59).prop("selected",true);JCache.get("#queryType1").bind("click",queryTxnHistoryByTypeCallback(1));JCache.get("#queryType2").bind("click",queryTxnHistoryByTypeCallback(2));JCache.get("#queryType3").bind("click",queryTxnHistoryByTypeCallback(3));JCache.get("#queryType4").bind("click",queryTxnHistoryByTypeCallback(4));JCache.get("#search").bind("click",e());JCache.get("#transHistoryHide").bind("click",function(){JCache.get("#transHistoryVideo").css("display","none");JCache.get("#transHistoryVideoReplay").get(0).pause();JCache.get("#transHistoryVideoReplay").get(0).currentTime=0;$j("iframe[name='transHistory']",window.parent.document).css("visibility","hidden")});JCache.get("#transHistoryVideoHide").bind("click",function(){JCache.get("#transHistoryVideo").css("display","none");JCache.get("#transHistoryVideoReplay").get(0).pause();JCache.get("#transHistoryVideoReplay").get(0).currentTime=0});JCache.get("#popResultVideoDIV").bind("mouseenter",function(){JCache.get("#transHistoryVideoReplayBtnDIV").slideDown()}).bind("mouseleave",function(){JCache.get("#transHistoryVideoReplayBtnDIV").slideUp()});JCache.get("#transHistoryVideoReplayBtnDIV").bind("click",function(){if(typeof JCache.get("#transHistoryVideoReplay").get(0).paused!="undefined"){if(JCache.get("#transHistoryVideoReplay").get(0).paused){JCache.get("#transHistoryVideoReplay").get(0).play();JCache.get("#transHistoryVideoReplayBtn").removeClass().addClass("btnResult-VideoStop")}else{JCache.get("#transHistoryVideoReplay").get(0).pause();JCache.get("#transHistoryVideoReplayBtn").removeClass().addClass("btnResult-VideoPlay")}}});JCache.get("#transHistoryVideoReplay").bind("play",function(){var l=this.duration;if(isNaN(l)||l<5){JCache.get("#transHistoryVideoReplayError").css("display","")}}).bind("click",function(){if(typeof this.paused!="undefined"){if(this.paused){this.play();JCache.get("#transHistoryVideoReplayBtn").removeClass().addClass("btnResult-VideoStop")}else{this.pause();JCache.get("#transHistoryVideoReplayBtn").removeClass().addClass("btnResult-VideoPlay")}}});JCache.get("#transHistoryVideoReplay").bind("canplay",function(){JCache.get("#transHistoryVideoReplayError").css("display","none")})};txnHistory.openAndQuery=function(){JCache.get("#queryType1").click()}})();