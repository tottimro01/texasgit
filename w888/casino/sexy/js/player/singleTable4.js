if (typeof (singleTable4) == "undefined") {
    singleTable4 = {}
}
(function() {
    var br = new Array(1);
    var ab;
    var au = true;
    var p = false;
    var aH = new Map();
    var a9 = true;
    var a0 = {};
    var m = [];
    var U = [];
    var bq = new Array(6);
    var l = {};
    var j = 0;
    var bs = 0;
    var aj = [];
    var a4 = {
        quality: "high",
        bgcolor: "#000000",
        allowFullScreen: "true",
        allowscriptaccess: "sameDomain",
        wmode: "opaque"
    };
    var aL = {
        id: "baccarat",
        name: "baccarat"
    };
    singleTable4.init = function() {
        m = $j.parseJSON(PageConfig.speedTableIDs);
        U = $j.parseJSON(PageConfig.insuranceTableIDs);
        if (PageConfig.enableMexicoWebHls == "1") {
            av()
        } else {
            if (swfobject.getFlashPlayerVersion().major == 0) {
                return
            }
            ab = DealerDomainWebTableMapping.getInstance(PageConfig.dealerDomain);
            var bt = {
                lang: "EN",
                user: PageConfig.dealerDomain + "_" + PageConfig.userId,
                country: PageConfig.userCountry,
                turl: "/StreamingToken/createToken",
                agentid: PageConfig.cafeId,
                table: ab["" + PageConfig.currentSingleTableId],
                mute: "1",
                volume: "50",
                line: PageConfig.streamingLine[0]
            };
            swfobject.embedSWF(PageConfig.dealerDomain == 0 ? "/flash/Bavet.swf" : "/flash/Baccarat.swf", "baccarat", "1440", "900", "18.3.0", "playerProductInstall.swf", bt, a4, aL, function(bu) {
                if (bu.success) {
                    av()
                }
            })
        }
    }
    ;
    var av = function() {
        $j(window).resize(function() {
            ResizeUtil.doResize()
        });
        if (PageConfig.userBetLimitIDCache != null) {
            $j.each(PageConfig.userBetLimitIDCache, function(bA, bB) {
                aH.put(Number(bA), Number(bB))
            })
        }
        if (PageConfig.currentSingleTableId != -1) {
            JCache.get("#currentTableID").html(I18N.get("form.text.table") + " " + PageConfig.currentSingleTableId)
        }
        JCache.get("#userBalance").bind("updateBalance", bi);
        $j("#gameMode").bind("click", function() {
            location.href = PageConfig.playerMultiPage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
        });
        JCache.get("#currentBetBtnBac").removeClass("open close").addClass("open").bind("click", function() {
            if ($j(this).hasClass("open")) {
                $j(this).removeClass("open close").addClass("close");
                JCache.get("[name='currentBetTwoBac']").fadeIn();
                if (!br[0].enableInsurance) {
                    JCache.get("[name='currentBetTwoBac'] > td[id='bankerInsCurrentBetRate'], [name='currentBetTwoBac'] > [id='playerInsCurrentBetRate']").parent().css("display", "none")
                }
            } else {
                $j(this).removeClass("open close").addClass("open");
                JCache.get("[name='currentBetTwoBac']").fadeOut()
            }
            $j(this).focus()
        }).bind("blur", function() {
            $j(this).removeClass("open close").addClass("open");
            JCache.get("[name='currentBetTwoBac']").fadeOut()
        });
        $j("#tableListOpen").bind("click", function() {
            quickBetGoodRoad.tableListOpenToggleQuickBetClose();
            var bA = PageUtil.callGameTableListWebIframe("resize", {});
            if (bA != null) {
                if (PageConfig.addEventListenerReady == "0") {
                    if (bA.addEventListener) {
                        bA.addEventListener("blur", function() {
                            singleTable4.hideTableList()
                        }, false)
                    } else {
                        if (bA.attachEvent) {
                            bA.attachEvent("blur", function() {
                                singleTable4.hideTableList()
                            })
                        } else {
                            JCache.get("#gameTableList").bind("blur", function() {
                                singleTable4.hideTableList()
                            })
                        }
                    }
                    PageConfig.addEventListenerReady = "1"
                }
                JCache.get("#gameTableList").css("visibility", "visible").focus()
            }
        });
        $j("#phoenixInfoBoxShow").bind("click", function() {
            if (JCache.get("#phoenixInfoBox").is(":visible")) {
                JCache.get("#phoenixInfoBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeIn();
                JCache.get("#turtleInfoBox").fadeOut();
                JCache.get("#bonusInfoBox").fadeOut();
                JCache.get("#betLimitBox").fadeOut();
                JCache.get("#phoenixInfoBoxShow").focus()
            }
        }).bind("blur", function() {
            JCache.get("#phoenixInfoBox").fadeOut()
        });
        $j("#phoenixInfoBoxHide").bind("click", function() {
            JCache.get("#phoenixInfoBox").fadeOut()
        });
        $j("#turtleInfoBoxShow").bind("click", function() {
            if (JCache.get("#turtleInfoBox").is(":visible")) {
                JCache.get("#turtleInfoBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeOut();
                JCache.get("#turtleInfoBox").fadeIn();
                JCache.get("#bonusInfoBox").fadeOut();
                JCache.get("#betLimitBox").fadeOut();
                JCache.get("#turtleInfoBoxShow").focus()
            }
        }).bind("blur", function() {
            JCache.get("#turtleInfoBox").fadeOut()
        });
        $j("#turtleInfoBoxHide").bind("click", function() {
            JCache.get("#turtleInfoBox").fadeOut()
        });
        $j("#bankerBonusInfoBoxShow").bind("click", function() {
            if (JCache.get("#bonusInfoBox").is(":visible")) {
                JCache.get("#bonusInfoBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeOut();
                JCache.get("#turtleInfoBox").fadeOut();
                JCache.get("#bonusInfoBox").fadeIn();
                JCache.get("#betLimitBox").fadeOut();
                JCache.get("#bankerBonusInfoBoxShow").focus()
            }
        }).bind("blur", function() {
            JCache.get("#bonusInfoBox").fadeOut()
        });
        $j("#playerBonusInfoBoxShow").bind("click", function() {
            if (JCache.get("#bonusInfoBox").is(":visible")) {
                JCache.get("#bonusInfoBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeOut();
                JCache.get("#turtleInfoBox").fadeOut();
                JCache.get("#bonusInfoBox").fadeIn();
                JCache.get("#betLimitBox").fadeOut();
                JCache.get("#playerBonusInfoBoxShow").focus()
            }
        }).bind("blur", function() {
            JCache.get("#bonusInfoBox").fadeOut()
        });
        $j("#bonusInfoBoxHide").bind("click", function() {
            JCache.get("#bonusInfoBox").fadeOut()
        });
        $j("#bankerInsBoxShow").bind("click", function() {
            if (JCache.get("#bankerInsBox").is(":visible")) {
                JCache.get("#bankerInsBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeOut();
                JCache.get("#turtleInfoBox").fadeOut();
                JCache.get("#bonusInfoBox").fadeOut();
                JCache.get("#playerInsBox").fadeOut();
                JCache.get("#bankerInsBox").fadeIn();
                JCache.get("#betLimitBox").fadeOut();
                JCache.get("#bankerInsBoxShow").focus()
            }
        }).bind("blur", function() {
            JCache.get("#bankerInsBox").fadeOut()
        });
        $j("#playerInsBoxShow").bind("click", function() {
            if (JCache.get("#playerInsBox").is(":visible")) {
                JCache.get("#playerInsBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeOut();
                JCache.get("#turtleInfoBox").fadeOut();
                JCache.get("#bonusInfoBox").fadeOut();
                JCache.get("#playerInsBox").fadeIn();
                JCache.get("#bankerInsBox").fadeOut();
                JCache.get("#betLimitBox").fadeOut();
                JCache.get("#playerInsBoxShow").focus()
            }
        }).bind("blur", function() {
            JCache.get("#playerInsBox").fadeOut()
        });
        JCache.get("#betBoxPlayerIns, #betBoxBankerIns").bind("click", function() {
            if (!JCache.get("#insBetZone").is(":visible") && br[0].startInsurance) {
                JCache.get("#insBetZone").fadeIn()
            } else {
                br[0].closedOnce = true;
                JCache.get("#insBetZone").fadeOut()
            }
        });
        JCache.get("#closeInsBetZone").bind("click", function() {
            br[0].closedOnce = true;
            JCache.get("#insBetZone").fadeOut()
        });
        JCache.get("#insTotalBet .cancel").bind("click", function() {
            $j("#insBetZone .chips li").removeClass("now");
            JCache.get("#insBetAmount").val("");
            JCache.get("#insPayout").html("--");
            if (!JCache.get("#insBetConfirm").hasClass("no_work")) {
                JCache.get("#insBetConfirm").addClass("no_work");
                JCache.get("#insBetCancel").addClass("no_work")
            }
        });
        JCache.get("#insTotalBet .confirm").bind("click", C);
        JCache.get("#insBetAmount").change(function() {
            $j("#insChips li").removeClass("now");
            $j("#insPayout").html(CurrencyUtil.format(Number($j("#insBetAmount").val()) * Number($j("#insOdds").html())));
            br[0].insuranceChipBet = 0
        });
        JCache.get("#insBetAmount").bind("keyup", function() {
            var bB = $j(this);
            var bA = bB.val().replace(/,/g, "");
            if (bA > 0 && bA <= br[0].insBetLimit) {
                JCache.get("#insBetConfirm").removeClass("no_work");
                JCache.get("#insBetCancel").removeClass("no_work");
                $j("#insChips li").removeClass("now");
                JCache.get("#insPayout").html(CurrencyUtil.format(Number(bA) * Number($j("#insOdds").html())));
                br[0].insuranceChipBet = 0;
                bB.val(CurrencyUtil.format(StringUtil.replaceOnlyNumber(bA)))
            } else {
                JCache.get("#insBetConfirm").addClass("no_work");
                JCache.get("#insBetCancel").addClass("no_work");
                JCache.get("#insPayout").html("--");
                bB.val("")
            }
        });
        JCache.get("#insMsgAlert").bind("click", function() {
            if (JCache.get("#insMsgAlert").hasClass("type_check_off")) {
                JCache.get("#insMsgAlert").removeClass().addClass("type_check_on");
                ak(false)
            } else {
                JCache.get("#insMsgAlert").removeClass().addClass("type_check_off");
                ak(true)
            }
        });
        $j("#betLimitBoxShow").bind("click", function() {
            if (JCache.get("#betLimitBox").is(":visible")) {
                JCache.get("#betLimitBox").fadeOut()
            } else {
                JCache.get("#phoenixInfoBox").fadeOut();
                JCache.get("#turtleInfoBox").fadeOut();
                JCache.get("#bonusInfoBox").fadeOut();
                JCache.get("#betLimitBox").fadeIn();
                aY()
            }
        });
        $j("#betLimitBoxHide").bind("click", function() {
            JCache.get("#betLimitBox").fadeOut()
        });
        JCache.get("#soundWinner").prop("volume", 1);
        JCache.get("#soundWinner").bind("ended", function() {
            if (aT.length > 1 && aT[1] != "") {
                JCache.get("#soundWinner").children("source").eq(0).prop("src", aT[1]);
                JCache.get("#soundWinner").trigger("load");
                JCache.get("#soundWinner").trigger("play");
                aT.splice(1, 1)
            }
        });
        if (PageConfig.dealerDomain == 1 && PageConfig.enableBackgroundMusic == "1") {
            aj = BackGroundMusic.MusicPlayList.slice(0);
            BackGroundMusic.MusicPlayList = ArrayUtil.shuffle(BackGroundMusic.MusicPlayList);
            JCache.get("#soundBackGroundMusic").prop("muted", PageConfig.backgroundMusic == "1" ? 0 : 1);
            JCache.get("#soundBackGroundMusic").prop("volume", 1);
            JCache.get("#soundBackGroundMusic").children("source").eq(0).prop("src", BackGroundMusic.MusicPlayList.pop());
            JCache.get("#soundBackGroundMusic").trigger("load");
            JCache.get("#soundBackGroundMusic").trigger("play");
            JCache.get("#soundBackGroundMusic").bind("ended", function() {
                bm()
            })
        }
        JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
        JCache.get("#streamingAudio").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.changeStreamingAudio()
            } else {
                aq()
            }
        });
        JCache.get("#resultSound").removeClass().addClass(PageConfig.resultSound == "1" ? "switch_on" : "switch_off");
        JCache.get("#resultSound").bind("click", function() {
            R()
        });
        JCache.get("#bettingSound").removeClass().addClass(PageConfig.bettingSound == "1" ? "switch_on" : "switch_off");
        JCache.get("#bettingSound").bind("click", function() {
            ap()
        });
        JCache.get("#backgroundMusic").removeClass().addClass(PageConfig.backgroundMusic == "1" ? "switch_on" : "switch_off");
        JCache.get("#backgroundMusic").bind("click", function() {
            aV()
        });
        JCache.get("#refreshBtn").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.resume()
            } else {
                aR()
            }
        });
        JCache.get("#changeLine").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.changeLine()
            } else {
                f()
            }
        });
        br[0] = {};
        br[0].dealerEventStampTime = 0;
        br[0].maintenance = null;
        br[0].cancel = $j("#cancel").bind("click", aP());
        br[0].cancelNoWork = true;
        br[0].repeat = $j("#repeat").bind("click", H());
        br[0].repeatNoWork = true;
        br[0].confirm = $j("#confirm").bind("click", al(null));
        br[0].confirmNoWork = true;
        br[0].confirmReady = true;
        br[0].cancelLongHu = $j("#cancelLongHu").bind("click", Q());
        br[0].cancelLongHuNoWork = true;
        br[0].repeatLongHu = $j("#repeatLongHu").bind("click", W());
        br[0].repeatLongHuNoWork = true;
        br[0].confirmLongHu = $j("#confirmLongHu").bind("click", a6(null));
        br[0].confirmLongHuNoWork = true;
        br[0].confirmLongHuReady = true;
        br[0].betLimits = {};
        br[0].currentTable = {};
        br[0].currentTable.initCurrentTable = false;
        br[0].currentTable.initSwitchTable = false;
        br[0].currentTable.currentTableID = PageConfig.currentSingleTableId;
        br[0].currentTable.currentGameShoe = -1;
        br[0].currentTable.currentGameRound = -1;
        br[0].currentTable.dealerName = "";
        br[0].currentTable.newGameStart = false;
        br[0].currentTable.calcWinnerStake = false;
        br[0].currentTable.winnerAnimation = false;
        br[0].countdownObj = {};
        br[0].countdownObj.countdownTime = 30;
        br[0].countdownObj.waitingTime = 30;
        br[0].countdownObj.trigger = false;
        br[0].countdownObj.finish = false;
        br[0].countdownObj.needCountdown = true;
        br[0].enableInsurance = false;
        br[0].startInsurance = false;
        br[0].insuranceType = null;
        br[0].insuranceChipBet = 0;
        br[0].autoOpenInsuranceDialog = (PageConfig.autoOpenInsDialog == "1") ? true : false;
        br[0].closedOnce = false;
        br[0].generateStake = false;
        br[0].insBetLimit = 0;
        br[0].bankerIns = {};
        br[0].bankerIns.betBoxDom = $j("#betBoxBankerIns");
        br[0].bankerIns.drawChipsDom = $j("#drawChips_BankerIns");
        br[0].bankerIns.currentBetDom = $j("#bankerInsCurrentBet");
        br[0].bankerIns.betZoneTitle = I18N.get("form.text.ins.bankerBet");
        br[0].bankerIns.insMarkTitle = I18N.get("form.text.ins.banker");
        br[0].bankerIns.points = 0;
        br[0].bankerIns.odds1 = 0;
        br[0].bankerIns.odds2 = 0;
        br[0].playerIns = {};
        br[0].playerIns.betBoxDom = $j("#betBoxPlayerIns");
        br[0].playerIns.drawChipsDom = $j("#drawChips_PlayerIns");
        br[0].playerIns.currentBetDom = $j("#playerInsCurrentBet");
        br[0].playerIns.betZoneTitle = I18N.get("form.text.ins.playerBet");
        br[0].playerIns.insMarkTitle = I18N.get("form.text.ins.player");
        br[0].playerIns.points = 0;
        br[0].playerIns.odds1 = 0;
        br[0].playerIns.odds2 = 0;
        br[0].currentBetColumns = new Array(CurrentBetColumnType.getLength());
        for (var bu = 0, by = CurrentBetColumnType.getLength(); bu < by; bu++) {
            var bx = CurrentBetColumnType.getInstance(bu);
            br[0].currentBetColumns[bu] = {};
            br[0].currentBetColumns[bu].currentBet = -1;
            if (CurrentBetColumnType.Big == bx || CurrentBetColumnType.Small == bx || CurrentBetColumnType.Phoenix == bx || CurrentBetColumnType.Turtle == bx) {
                br[0].currentBetColumns[bu].maxBetRound = 0
            } else {
                br[0].currentBetColumns[bu].maxBetRound = 999
            }
            if (CurrentBetColumnType.PlayerInsurance1 == bx || CurrentBetColumnType.PlayerInsurance2 == bx) {
                br[0].currentBetColumns[bu].dom = br[0].playerIns.currentBetDom
            } else {
                if (CurrentBetColumnType.BankerInsurance1 == bx || CurrentBetColumnType.BankerInsurance2 == bx) {
                    br[0].currentBetColumns[bu].dom = br[0].bankerIns.currentBetDom
                } else {
                    br[0].currentBetColumns[bu].dom = $j("#" + bx.currentBetColumn)
                }
            }
            br[0].currentBetColumns[bu].rateDom = $j("#" + bx.currentBetRateColumn)
        }
        br[0].currentBetColumnsLongHu = new Array(CurrentBetColumnLongHuType.getLength());
        for (var bu = 0, by = CurrentBetColumnLongHuType.getLength(); bu < by; bu++) {
            var bx = CurrentBetColumnLongHuType.getInstance(bu);
            br[0].currentBetColumnsLongHu[bu] = {};
            br[0].currentBetColumnsLongHu[bu].currentBet = -1;
            br[0].currentBetColumnsLongHu[bu].maxBetRound = 999;
            br[0].currentBetColumnsLongHu[bu].dom = $j("#" + bx.currentBetColumn);
            br[0].currentBetColumnsLongHu[bu].rateDom = $j("#" + bx.currentBetRateColumn)
        }
        br[0].userTxns = new Array(CategoryType.getLength());
        for (var bu = 0, by = CategoryType.getLength(); bu < by; bu++) {
            var bz = CategoryType.getInstance(bu);
            var bt = DrawBetBoxType.getInstance(bu);
            br[0].userTxns[bu] = {};
            br[0].userTxns[bu].tableIdx = 0;
            br[0].userTxns[bu].stake = 0;
            br[0].userTxns[bu].origStake = 0;
            br[0].userTxns[bu].addStake = 0;
            br[0].userTxns[bu].repeatStake = 0;
            br[0].userTxns[bu].lastAddStake = 0;
            br[0].userTxns[bu].name = bt.name;
            br[0].userTxns[bu].minBet = 0;
            br[0].userTxns[bu].domMinBet = $j("#" + bz.minBet);
            br[0].userTxns[bu].maxBet = 0;
            br[0].userTxns[bu].domMaxBet = $j("#" + bz.maxBet);
            br[0].userTxns[bu].win = true;
            br[0].userTxns[bu].moveDealer = true;
            br[0].userTxns[bu].topWin = bt.topWin;
            br[0].userTxns[bu].leftWin = bt.leftWin;
            br[0].userTxns[bu].topLoss = bt.topLoss;
            br[0].userTxns[bu].leftLoss = bt.leftLoss;
            br[0].userTxns[bu].topOrig = bt.topOrig;
            br[0].userTxns[bu].leftOrig = bt.leftOrig;
            br[0].userTxns[bu].dom = $j("#" + bt.drawChips);
            br[0].userTxns[bu].domUl = br[0].userTxns[bu].dom.children().eq(0);
            br[0].userTxns[bu].redraw = true;
            br[0].userTxns[bu].betBoxIdx = bu;
            br[0].userTxns[bu].betBox = $j("#" + bt.betBox);
            br[0].userTxns[bu].betBox.bind("click", a3(bt.value))
        }
        br[0].userTxnsLongHu = new Array(LongHuCategoryType.getLength());
        for (var bu = 0, by = LongHuCategoryType.getLength(); bu < by; bu++) {
            var bz = LongHuCategoryType.getInstance(bu);
            var bt = DrawBetBoxLongHuType.getInstance(bu);
            br[0].userTxnsLongHu[bu] = {};
            br[0].userTxnsLongHu[bu].tableIdx = 0;
            br[0].userTxnsLongHu[bu].stake = 0;
            br[0].userTxnsLongHu[bu].origStake = 0;
            br[0].userTxnsLongHu[bu].addStake = 0;
            br[0].userTxnsLongHu[bu].repeatStake = 0;
            br[0].userTxnsLongHu[bu].lastAddStake = 0;
            br[0].userTxnsLongHu[bu].name = bt.name;
            br[0].userTxnsLongHu[bu].minBet = 0;
            br[0].userTxnsLongHu[bu].domMinBet = $j("#" + bz.minBet);
            br[0].userTxnsLongHu[bu].maxBet = 0;
            br[0].userTxnsLongHu[bu].domMaxBet = $j("#" + bz.maxBet);
            br[0].userTxnsLongHu[bu].win = true;
            br[0].userTxnsLongHu[bu].moveDealer = true;
            br[0].userTxnsLongHu[bu].topWin = bt.topWin;
            br[0].userTxnsLongHu[bu].leftWin = bt.leftWin;
            br[0].userTxnsLongHu[bu].topLoss = bt.topLoss;
            br[0].userTxnsLongHu[bu].leftLoss = bt.leftLoss;
            br[0].userTxnsLongHu[bu].topOrig = bt.topOrig;
            br[0].userTxnsLongHu[bu].leftOrig = bt.leftOrig;
            br[0].userTxnsLongHu[bu].dom = $j("#" + bt.drawChips);
            br[0].userTxnsLongHu[bu].domUl = br[0].userTxnsLongHu[bu].dom.children().eq(0);
            br[0].userTxnsLongHu[bu].redraw = true;
            br[0].userTxnsLongHu[bu].betBoxIdx = bu;
            br[0].userTxnsLongHu[bu].betBox = $j("#" + bt.betBox);
            br[0].userTxnsLongHu[bu].betBox.bind("click", bn(bt.value))
        }
        br[0].randomPayOdds = new Array(CurrentBetColumnType.getLength() - 1);
        for (var bu = 0, by = CurrentBetColumnType.getLength() - 1; bu < by; bu++) {
            var bw = CurrentBetColumnType.getInstance(bu);
            br[0].randomPayOdds[bu] = {};
            br[0].randomPayOdds[bu].odds = bw.fixOdds;
            br[0].randomPayOdds[bu].dom = $j("#" + bw.randomPayOdds)
        }
        br[0].randomPayOddsLongHu = new Array(CurrentBetColumnLongHuType.getLength() - 1);
        for (var bu = 0, by = CurrentBetColumnLongHuType.getLength() - 1; bu < by; bu++) {
            var bw = CurrentBetColumnLongHuType.getInstance(bu);
            br[0].randomPayOddsLongHu[bu] = {};
            br[0].randomPayOddsLongHu[bu].odds = bw.fixOdds;
            br[0].randomPayOddsLongHu[bu].dom = $j("#" + bw.randomPayOdds)
        }
        br[0].pokerCards = new Array(PokerCardIndexType.getLength());
        for (var bu = 0, by = PokerCardIndexType.getLength(); bu < by; bu++) {
            var bv = PokerCardIndexType.getInstance(bu);
            br[0].pokerCards[bu] = {};
            br[0].pokerCards[bu].unique = PokerCardType.NONE.value;
            br[0].pokerCards[bu].handValue = PokerCardType.NONE.handValue;
            br[0].pokerCards[bu].cardPoint = PokerCardType.NONE.cardPoint;
            br[0].pokerCards[bu].className = PokerCardType.NONE.className;
            br[0].pokerCards[bu].isBanker = bv.isBanker;
            br[0].pokerCards[bu].isPlayer = bv.isPlayer;
            br[0].pokerCards[bu].domCard = $j("#" + bv.domName);
            br[0].pokerCards[bu].domAnimeCard = $j("#" + bv.domAnime);
            br[0].pokerCards[bu].domHand = bv.isPlayer ? $j("#playerHandValue") : $j("#bankerHandValue");
            br[0].pokerCards[bu].change = false
        }
        br[0].winnerType = {};
        br[0].winnerType.value = GameWinnerType.EMPTY.value;
        br[0].winnerType.winnerPlayer = false;
        br[0].winnerType.winnerBanker = false;
        br[0].winnerType.displayCss = GameWinnerType.EMPTY.displayCss;
        aB.init();
        if (PageConfig.enableMexicoWebHls == "1") {
            videoCanvas.init()
        }
        am();
        aN()
    };
    var aN = function() {
        quickBetEvent.initTableItems(PageConfig.dealerDomain, PageConfig.currentSingleTableId);
        postAjax({
            url: "/casino/sexy/player/query/queryTableListInfoV2.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: br[0].currentTable.currentTableID
            },
            success: function(bu) {
                if (bu == null || jQuery.isEmptyObject(bu)) {
                    return
                }
                for (var bt = 0; bt < bu.message.length; bt++) {
                    var bv = bu.message[bt];
                    a0[bv.tableID] = {};
                    a0[bv.tableID].tableID = bv.tableID;
                    a0[bv.tableID].maintenance = false;
                    a0[bv.tableID].tableSupportGame = bv.tableSupportGame;
                    a0[bv.tableID].tableSupportGameName = (bv.tableSupportGame == TableSupportGameType.DragonTiger.value ? "dra" : "bac");
                    a0[bv.tableID].origDealerID = "";
                    a0[bv.tableID].currDealerID = ""
                }
                J();
                t.check();
                c.check();
                x.check();
                aW.check();
                if (typeof PageConfig.enableMexicoWebHls != "undefined" && PageConfig.enableMexicoWebHls == "1") {
                    a1.check()
                }
                TaskExecuter.execute()
            }
        })
    };
    var J = function() {
        postAjax({
            url: "/casino/sexy/player/query/queryActiveBetLimitV2.php",
            data: {
                domainType: PageConfig.dealerDomain
            },
            success: function(bt) {
                if (bt == null || $j.isEmptyObject(bt) || bt.status != "200") {
                    return
                }
                var bx = $j(document.createDocumentFragment());
                var bz = JCache.clone("#templateLiBetLimit");
                bx.append(bz);
                var bv = bt.message;
                for (var bu = 0; bu < bv.length; bu++) {
                    var bw = bv[bu];
                    br[0].betLimits[bw.id] = {};
                    br[0].betLimits[bw.id].id = bw.id;
                    br[0].betLimits[bw.id].dom = JCache.clone("#templateLi");
                    br[0].betLimits[bw.id].dom.bind("click", aX(bw.id));
                    br[0].betLimits[bw.id].dom.html(CurrencyUtil.format(bw.minBet) + "-" + CurrencyUtil.format(bw.maxBet));
                    bx.append(br[0].betLimits[bw.id].dom)
                }
                var bz = JCache.clone("#templateLiSubmit");
                bz.bind("click", function() {
                    u()
                });
                bx.append(bz);
                var by = JCache.get("#betLimitSet");
                by.empty();
                by.append(bx)
            }
        })
    };
    var ak = function(bt) {
        postAjax({
            url: "/player/update/setAutoOpenInsuranceDialog",
            data: {
                setting: (bt) ? 1 : 0
            },
            success: function(bu) {
                if (bu != null && bu.status == "200") {
                    br[0].autoOpenInsuranceDialog = bt
                }
            }
        })
    };
    var bi = function(bt) {
        if (j != bt.balance) {
            j = bt.balance;
            JCache.get("#userBalance").html(CurrencyUtil.parseToAmountFormat(bt.balance))
        }
    };
    var Y = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundBet").trigger("play")
        }
    };
    var G = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundButtonTap").trigger("play")
        }
    };
    var af = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundCashIn").trigger("play")
        }
    };
    var z = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundSwitchChips").trigger("play")
        }
    };
    var ai = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundNoMoreBet").trigger("play")
        }
    };
    var ao = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundPlaceYourBet").trigger("play")
        }
    };
    var aT = [];
    var A = function(bw, bv, bu) {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.resultSound == "1" && !au) {
            var bt = (PageConfig.isSafari == 1) ? ".m4a" : ".opus";
            aT = [];
            aT.push(bw + bt);
            aT.push(bv + bt);
            aT.push(bu + bt);
            JCache.get("#soundWinner").children("source").eq(0).prop("src", bw + bt);
            JCache.get("#soundWinner").trigger("load");
            JCache.get("#soundWinner").trigger("play")
        }
    };
    var a3 = function(bt) {
        return function() {
            ag(bt)
        }
    };
    var bn = function(bt) {
        return function() {
            bf(bt)
        }
    };
    var ag = function(bv) {
        if (!br[0].currentTable.newGameStart) {
            return
        }
        if (PageConfig.enableMexicoWebHls == "1" && !a9) {
            return
        }
        if (!l.amount) {
            v(I18N.get("msg.error.chips.selectChips"));
            return
        }
        if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bv].maxBetRound) {
            return
        }
        if (PageConfig.allowHedgeBetting == "false" && br[0].currentTable.newGameStart) {
            var bw = CategoryType.getInstance(bv);
            if (bw.hedges.length > 0) {
                for (var bu in bw.hedges) {
                    if (br[0].userTxns[bw.hedges[bu]].addStake > 0 || br[0].userTxns[bw.hedges[bu]].stake > 0) {
                        v(I18N.get("msg.error.betTxns.denyHedgeBetting"));
                        return
                    }
                }
            }
        }
        var bt = br[0].userTxns[bv].stake + br[0].userTxns[bv].addStake + l.amount;
        if (bt > br[0].userTxns[bv].maxBet) {
            v(I18N.get("msg.error.betTxns.maxBets") + CurrencyUtil.format(br[0].userTxns[bv].maxBet));
            return
        }
        if (bt < br[0].userTxns[bv].minBet) {
            if (bs + quickBetTxn.getUnconfirmSubmitStakeQuickBet() + MathUtil.decimal.subtract(br[0].userTxns[bv].minBet, br[0].userTxns[bv].stake) > j) {
                v(I18N.get("msg.error.info.insufficientBalance"));
                return
            }
            br[0].userTxns[bv].addStake = MathUtil.decimal.subtract(br[0].userTxns[bv].minBet, br[0].userTxns[bv].stake)
        } else {
            if (bs + quickBetTxn.getUnconfirmSubmitStakeQuickBet() + l.amount > j) {
                v(I18N.get("msg.error.info.insufficientBalance"));
                return
            }
            br[0].userTxns[bv].addStake += l.amount
        }
        br[0].userTxns[bv].redraw = true;
        aO();
        Y()
    };
    var bf = function(bv) {
        if (!br[0].currentTable.newGameStart) {
            return
        }
        if (PageConfig.enableMexicoWebHls == "1" && !a9) {
            return
        }
        if (!l.amount) {
            v(I18N.get("msg.error.chips.selectChips"));
            return
        }
        if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bv].maxBetRound) {
            return
        }
        if (PageConfig.allowHedgeBetting == "false" && br[0].currentTable.newGameStart) {
            var bw = LongHuCategoryType.getInstance(bv);
            if (bw.hedges.length > 0) {
                for (var bu in bw.hedges) {
                    if (br[0].userTxnsLongHu[bw.hedges[bu]].addStake > 0 || br[0].userTxnsLongHu[bw.hedges[bu]].stake > 0) {
                        v(I18N.get("msg.error.betTxns.denyHedgeBetting"));
                        return
                    }
                }
            }
        }
        var bt = br[0].userTxnsLongHu[bv].stake + br[0].userTxnsLongHu[bv].addStake + l.amount;
        if (bt > br[0].userTxnsLongHu[bv].maxBet) {
            v(I18N.get("msg.error.betTxns.maxBets") + CurrencyUtil.format(br[0].userTxnsLongHu[bv].maxBet));
            return
        }
        if (bt < br[0].userTxnsLongHu[bv].minBet) {
            if (bs + quickBetTxn.getUnconfirmSubmitStakeQuickBet() + MathUtil.decimal.subtract(br[0].userTxnsLongHu[bv].minBet, br[0].userTxnsLongHu[bv].stake) > j) {
                v(I18N.get("msg.error.info.insufficientBalance"));
                return
            }
            br[0].userTxnsLongHu[bv].addStake = MathUtil.decimal.subtract(br[0].userTxnsLongHu[bv].minBet, br[0].userTxnsLongHu[bv].stake)
        } else {
            if (bs + quickBetTxn.getUnconfirmSubmitStakeQuickBet() + l.amount > j) {
                v(I18N.get("msg.error.info.insufficientBalance"));
                return
            }
            br[0].userTxnsLongHu[bv].addStake += l.amount
        }
        br[0].userTxnsLongHu[bv].redraw = true;
        a2();
        Y()
    };
    var aP = function() {
        return function() {
            if (br[0].cancelNoWork == false && !p) {
                p = true;
                aS();
                G();
                p = false
            }
        }
    };
    var Q = function() {
        return function() {
            if (br[0].cancelLongHuNoWork == false && !p) {
                p = true;
                az();
                G();
                p = false
            }
        }
    };
    var aS = function() {
        for (var bt = 0, bu = br[0].userTxns.length; bt < bu; bt++) {
            if (br[0].userTxns[bt].addStake != 0) {
                br[0].userTxns[bt].addStake = 0;
                br[0].userTxns[bt].redraw = true
            }
        }
        aO()
    };
    var az = function() {
        for (var bt = 0, bu = br[0].userTxnsLongHu.length; bt < bu; bt++) {
            if (br[0].userTxnsLongHu[bt].addStake != 0) {
                br[0].userTxnsLongHu[bt].addStake = 0;
                br[0].userTxnsLongHu[bt].redraw = true
            }
        }
        a2()
    };
    var H = function() {
        return function() {
            if (br[0].repeatNoWork == false && !p) {
                p = true;
                O();
                G();
                p = false
            }
        }
    };
    var W = function() {
        return function() {
            if (br[0].repeatLongHuNoWork == false && !p) {
                p = true;
                P();
                G();
                p = false
            }
        }
    };
    var O = function() {
        if (!br[0].currentTable.newGameStart) {
            return
        }
        if (PageConfig.enableMexicoWebHls == "1" && !a9) {
            return
        }
        if (br[0].repeatNoWork) {
            return
        }
        var bt = 0;
        for (var bu = 0, bv = br[0].userTxns.length; bu < bv; bu++) {
            bt += br[0].userTxns[bu].repeatStake
        }
        if (bt + quickBetTxn.getUnconfirmSubmitStakeQuickBet() > j) {
            v(I18N.get("msg.error.info.insufficientBalance") + "<br />");
            return
        }
        var bw = "";
        for (var bu = 0, bv = br[0].userTxns.length; bu < bv; bu++) {
            if (bu < CategoryType.BankerInsurance1.value) {
                if (br[0].userTxns[bu].addStake > 0) {
                    br[0].userTxns[bu].addStake = 0;
                    br[0].userTxns[bu].redraw = true
                }
                if (br[0].userTxns[bu].repeatStake > 0) {
                    if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bu].maxBetRound) {} else {
                        if (br[0].userTxns[bu].repeatStake > br[0].userTxns[bu].maxBet) {
                            bw += I18N.get("msg.error.betTxns.maxBets") + CurrencyUtil.format(br[0].userTxns[bu].maxBet) + "<br />"
                        } else {
                            br[0].userTxns[bu].addStake = br[0].userTxns[bu].repeatStake;
                            br[0].userTxns[bu].redraw = true
                        }
                    }
                }
            }
        }
        if (bw) {
            v(bw)
        }
        aO()
    };
    var P = function() {
        if (!br[0].currentTable.newGameStart) {
            return
        }
        if (PageConfig.enableMexicoWebHls == "1" && !a9) {
            return
        }
        if (br[0].repeatLongHuNoWork) {
            return
        }
        var bt = 0;
        for (var bu = 0, bv = br[0].userTxnsLongHu.length; bu < bv; bu++) {
            bt += br[0].userTxnsLongHu[bu].repeatStake
        }
        if (bt + quickBetTxn.getUnconfirmSubmitStakeQuickBet() > j) {
            v(I18N.get("msg.error.info.insufficientBalance") + "<br />");
            return
        }
        var bw = "";
        for (var bu = 0, bv = br[0].userTxnsLongHu.length; bu < bv; bu++) {
            if (br[0].userTxnsLongHu[bu].addStake > 0) {
                br[0].userTxnsLongHu[bu].addStake = 0;
                br[0].userTxnsLongHu[bu].redraw = true
            }
            if (br[0].userTxnsLongHu[bu].repeatStake > 0) {
                if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bu].maxBetRound) {} else {
                    if (br[0].userTxnsLongHu[bu].repeatStake > br[0].userTxnsLongHu[bu].maxBet) {
                        bw += I18N.get("msg.error.betTxns.maxBets") + CurrencyUtil.format(br[0].userTxnsLongHu[bu].maxBet) + "<br />"
                    } else {
                        br[0].userTxnsLongHu[bu].addStake = br[0].userTxnsLongHu[bu].repeatStake;
                        br[0].userTxnsLongHu[bu].redraw = true
                    }
                }
            }
        }
        if (bw) {
            v(bw)
        }
        a2()
    };
    var L = function(bw) {
        var bt = [];
        if (typeof bw === "undefined" || bw == null) {
            for (var bu = 0, bv = br[0].userTxns.length; bu < bv; bu++) {
                bt[bu] = true
            }
        } else {
            for (var bu = 0, bv = br[0].userTxns.length; bu < bv; bu++) {
                bt[bu] = false
            }
            bt[bw] = true
        }
        return bt
    };
    var bb = function(bw) {
        var bt = [];
        if (typeof bw === "undefined" || bw == null) {
            for (var bu = 0, bv = br[0].userTxnsLongHu.length; bu < bv; bu++) {
                bt[bu] = true
            }
        } else {
            for (var bu = 0, bv = br[0].userTxnsLongHu.length; bu < bv; bu++) {
                bt[bu] = false
            }
            bt[bw] = true
        }
        return bt
    };
    var V = function(bt) {
        return function() {
            if (!p) {
                p = true;
                ae(L(bt), "S");
                G();
                p = false
            }
        }
    };
    var aF = function(bt) {
        return function() {
            if (!p) {
                p = true;
                bh(bb(bt), "S");
                G();
                p = false
            }
        }
    };
    var al = function(bt) {
        return function() {
            if (br[0].confirmNoWork == false && !p) {
                p = true;
                ae(L(bt), "A");
                G();
                p = false
            }
        }
    };
    var a6 = function(bt) {
        return function() {
            if (br[0].confirmLongHuNoWork == false && !p) {
                p = true;
                bh(bb(bt), "A");
                G();
                p = false
            }
        }
    };
    var aO = function() {
        for (var bz = 0, bv = br[0].userTxns.length; bz < bv; bz++) {
            var bB = br[0].userTxns[bz];
            if (bB.stake != bB.origStake || bB.redraw) {
                bB.origStake = bB.stake;
                bB.domUl.removeClass();
                var by = $j(document.createDocumentFragment());
                if (bB.stake > 0 && bB.addStake == 0) {
                    var bu = [];
                    E(ChipType.getLength() - 1, bB.stake, bu);
                    for (var bD = 0; bD < bu.length; bD++) {
                        by.append(bu[bD])
                    }
                    by.append(a(bB.stake))
                } else {
                    if (bB.stake == 0 && bB.addStake > 0) {
                        var bA = [];
                        E(ChipType.getLength() - 1, bB.addStake, bA);
                        bB.domUl.addClass("unconfirmed");
                        for (var bD = 0; bD < bA.length; bD++) {
                            by.append(bA[bD])
                        }
                        by.append(a(bB.addStake));
                        by.append(Z(bz))
                    } else {
                        if (bB.stake > 0 && bB.addStake > 0) {
                            var bu = [];
                            E(ChipType.getLength() - 1, bB.stake, bu);
                            bB.domUl.addClass("add");
                            for (var bD = 0; bD < bu.length; bD++) {
                                by.append(bu[bD])
                            }
                            by.append(an(bB.stake));
                            var bA = [];
                            var bC = $j(document.createDocumentFragment());
                            E(ChipType.getLength() - 1, bB.addStake, bA);
                            for (var bD = 0; bD < bA.length; bD++) {
                                bC.append(bA[bD])
                            }
                            bC.append(a(bB.addStake));
                            bC.append(Z(bz));
                            var bE = JCache.clone("#templateDiv");
                            bE.removeAttr("id").removeAttr("style");
                            bE.addClass("add_chips");
                            bE.append(bC);
                            by.append(bE)
                        }
                    }
                }
                bB.domUl.empty();
                bB.domUl.append(by);
                bB.redraw = false
            }
        }
        var bx = false;
        var bw = false;
        var bt = 0;
        for (var bz = 0, bv = br[0].userTxns.length; bz < bv; bz++) {
            var bB = br[0].userTxns[bz];
            if (bB.addStake > 0) {
                bx = true
            }
            if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bz].maxBetRound) {} else {
                if (bB.repeatStake > 0) {
                    bw = true
                }
            }
            bt += bB.addStake
        }
        bs = bt;
        if (br[0].currentTable.newGameStart) {
            if (bx == true) {
                if (br[0].cancelNoWork == true) {
                    br[0].cancelNoWork = false;
                    br[0].cancel.removeClass("no_work")
                }
                if (br[0].confirmNoWork == true) {
                    br[0].confirmNoWork = false;
                    br[0].confirm.removeClass("no_work")
                }
            } else {
                if (br[0].cancelNoWork == false) {
                    br[0].cancelNoWork = true;
                    br[0].cancel.addClass("no_work")
                }
                if (br[0].confirmNoWork == false) {
                    br[0].confirmNoWork = true;
                    br[0].confirm.addClass("no_work")
                }
            }
            if (bw == true) {
                if (br[0].repeatNoWork == true) {
                    br[0].repeatNoWork = false;
                    br[0].repeat.removeClass("no_work")
                }
            } else {
                if (br[0].repeatNoWork == false) {
                    br[0].repeatNoWork = true;
                    br[0].repeat.addClass("no_work")
                }
            }
        } else {
            if (br[0].cancelNoWork == false) {
                br[0].cancelNoWork = true;
                br[0].cancel.addClass("no_work")
            }
            if (br[0].confirmNoWork == false) {
                br[0].confirmNoWork = true;
                br[0].confirm.addClass("no_work")
            }
            if (br[0].repeatNoWork == false) {
                br[0].repeatNoWork = true;
                br[0].repeat.addClass("no_work")
            }
        }
    };
    var a2 = function() {
        for (var bz = 0, bv = br[0].userTxnsLongHu.length; bz < bv; bz++) {
            var bB = br[0].userTxnsLongHu[bz];
            if (bB.stake != bB.origStake || bB.redraw) {
                bB.origStake = bB.stake;
                bB.domUl.removeClass();
                var by = $j(document.createDocumentFragment());
                if (bB.stake > 0 && bB.addStake == 0) {
                    var bu = [];
                    E(ChipType.getLength() - 1, bB.stake, bu);
                    for (var bD = 0; bD < bu.length; bD++) {
                        by.append(bu[bD])
                    }
                    by.append(a(bB.stake))
                } else {
                    if (bB.stake == 0 && bB.addStake > 0) {
                        var bA = [];
                        E(ChipType.getLength() - 1, bB.addStake, bA);
                        bB.domUl.addClass("unconfirmed");
                        for (var bD = 0; bD < bA.length; bD++) {
                            by.append(bA[bD])
                        }
                        by.append(a(bB.addStake));
                        by.append(aA(bz))
                    } else {
                        if (bB.stake > 0 && bB.addStake > 0) {
                            var bu = [];
                            E(ChipType.getLength() - 1, bB.stake, bu);
                            bB.domUl.addClass("add");
                            for (var bD = 0; bD < bu.length; bD++) {
                                by.append(bu[bD])
                            }
                            by.append(an(bB.stake));
                            var bA = [];
                            var bC = $j(document.createDocumentFragment());
                            E(ChipType.getLength() - 1, bB.addStake, bA);
                            for (var bD = 0; bD < bA.length; bD++) {
                                bC.append(bA[bD])
                            }
                            bC.append(a(bB.addStake));
                            bC.append(aA(bz));
                            var bE = JCache.clone("#templateDiv");
                            bE.removeAttr("id").removeAttr("style");
                            bE.addClass("add_chips");
                            bE.append(bC);
                            by.append(bE)
                        }
                    }
                }
                bB.domUl.empty();
                bB.domUl.append(by);
                bB.redraw = false
            }
        }
        var bx = false;
        var bw = false;
        var bt = 0;
        for (var bz = 0, bv = br[0].userTxnsLongHu.length; bz < bv; bz++) {
            var bB = br[0].userTxnsLongHu[bz];
            if (bB.addStake > 0) {
                bx = true
            }
            if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bz].maxBetRound) {} else {
                if (bB.repeatStake > 0) {
                    bw = true
                }
            }
            bt += bB.addStake
        }
        bs = bt;
        if (br[0].currentTable.newGameStart) {
            if (bx == true) {
                if (br[0].cancelLongHuNoWork == true) {
                    br[0].cancelLongHuNoWork = false;
                    br[0].cancelLongHu.removeClass("no_work")
                }
                if (br[0].confirmLongHuNoWork == true) {
                    br[0].confirmLongHuNoWork = false;
                    br[0].confirmLongHu.removeClass("no_work")
                }
            } else {
                if (br[0].cancelLongHuNoWork == false) {
                    br[0].cancelLongHuNoWork = true;
                    br[0].cancelLongHu.addClass("no_work")
                }
                if (br[0].confirmLongHuNoWork == false) {
                    br[0].confirmLongHuNoWork = true;
                    br[0].confirmLongHu.addClass("no_work")
                }
            }
            if (bw == true) {
                if (br[0].repeatLongHuNoWork == true) {
                    br[0].repeatLongHuNoWork = false;
                    br[0].repeatLongHu.removeClass("no_work")
                }
            } else {
                if (br[0].repeatLongHuNoWork == false) {
                    br[0].repeatLongHuNoWork = true;
                    br[0].repeatLongHu.addClass("no_work")
                }
            }
        } else {
            if (br[0].cancelLongHuNoWork == false) {
                br[0].cancelLongHuNoWork = true;
                br[0].cancelLongHu.addClass("no_work")
            }
            if (br[0].confirmLongHuNoWork == false) {
                br[0].confirmLongHuNoWork = true;
                br[0].confirmLongHu.addClass("no_work")
            }
            if (br[0].repeatLongHuNoWork == false) {
                br[0].repeatLongHuNoWork = true;
                br[0].repeatLongHu.addClass("no_work")
            }
        }
    };
    var a = function(bu) {
        var bt = JCache.clone("#templateLi");
        bt.removeAttr("id").addClass("money").html(CurrencyUtil.showAmountByCurrency(bu, PageConfig.currencyId));
        return bt
    };
    var an = function(bu) {
        var bt = JCache.clone("#templateLi");
        bt.removeAttr("id").addClass("old_money").html(CurrencyUtil.showAmountByCurrency(bu, PageConfig.currencyId));
        return bt
    };
    var Z = function(bu) {
        var bt = JCache.clone("#templateLi");
        bt.removeAttr("id").addClass("check_btn").html("Confirm");
        bt.bind("click", V(bu));
        return bt
    };
    var aA = function(bu) {
        var bt = JCache.clone("#templateLi");
        bt.removeAttr("id").addClass("check_btn").html("Confirm");
        bt.bind("click", aF(bu));
        return bt
    };
    var E = function(bw, bt, bv) {
        if (bv.length >= 8 || bt < 1) {
            return bv
        }
        var bu = ChipType.getInstance(bw);
        var by = Math.floor(MathUtil.decimal.divide(bt, bu.amount));
        var bz = MathUtil.decimal.subtract(bt, MathUtil.decimal.multiply(by, bu.amount));
        for (var bx = 0; bx < by; bx++) {
            var bA = JCache.clone("#templateLi");
            bA.removeAttr("id");
            bA.addClass(bu.className);
            bv[bv.length] = bA;
            if (bv.length >= 8) {
                break
            }
        }
        E(bw - 1, bz, bv)
    };
    var ac;
    var h = function() {
        if (br[0].countdownObj.countdownTime > 0) {
            br[0].countdownObj.countdownTime = br[0].countdownObj.countdownTime - 1
        }
        if (br[0].countdownObj.countdownTime <= 0) {
            br[0].countdownObj.needCountdown = false;
            if (PageConfig.enableMexicoWebHls == "1") {
                b("0", false);
                if (PageConfig.eventStatus != DealerEventType.GP_BET_INSURANCE.value) {
                    F(I18N.get("form.text.noMorebet"));
                    ai();
                    b("0", true)
                }
                JCache.get("#gameInfoCard").slideDown()
            } else {
                if (PageConfig.eventStatus != DealerEventType.GP_BET_INSURANCE.value) {
                    F(I18N.get("form.text.noMorebet"));
                    ai()
                }
                b("0", false)
            }
            PageConfig.eventStatus = DealerEventType.GP_ONE_CARD_DRAWN.value
        } else {
            br[0].countdownObj.needCountdown = true
        }
        if (br[0].countdownObj.needCountdown) {
            if (br[0].countdownObj.countdownTime <= 5) {
                if (!br[0].countdownObj.finish) {
                    br[0].countdownObj.finish = true;
                    JCache.get("#countdownDL").addClass("finish")
                }
            } else {
                if (br[0].countdownObj.finish) {
                    br[0].countdownObj.finish = false;
                    JCache.get("#countdownDL").removeClass("finish")
                }
            }
            var bt = parseInt(br[0].countdownObj.countdownTime / br[0].countdownObj.waitingTime * 100);
            JCache.get("#countdown").html("<p>" + br[0].countdownObj.countdownTime + "</p><span>" + I18N.get("msg.info.sec") + "</span>");
            JCache.get("#countdownLength").css("width", bt >= 100 ? "100%" : bt + "%");
            if (ac) {
                clearTimeout(ac)
            }
            ac = setTimeout(function() {
                h()
            }, 1000)
        } else {
            JCache.get("#countdown").html("<p>0</p><span>" + I18N.get("msg.info.sec") + "</span>");
            JCache.get("#countdownLength").css("width", "0%")
        }
    };
    var y = function(bt) {
        br[0].countdownObj.trigger = false;
        br[0].countdownObj.countdownTime = 0;
        if (!br[0].countdownObj.finish) {
            br[0].countdownObj.finish = true;
            JCache.get("#countdownDL").addClass("finish")
        }
        if (bt) {
            JCache.get("#countdown").html("<p>" + bt + "</p><span>" + I18N.get("msg.info.sec") + "</span>")
        } else {
            JCache.get("#countdown").html("<p>" + bt + "</p><span></span>")
        }
        JCache.get("#countdownLength").css("width", "0%")
    };
    var aU;
    var w = function() {
        if (aU) {
            clearTimeout(aU)
        }
        aU = setTimeout(function() {
            aG()
        }, 3000)
    };
    var aG = function() {
        for (var bt = 0, bu = br[0].userTxns.length; bt < bu; bt++) {
            if (br[0].userTxns[bt].betBox.hasClass("win")) {
                br[0].userTxns[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxns[bt].dom.removeClass("win").addClass("no_win")
            }
        }
        for (var bt = 0, bu = br[0].userTxnsLongHu.length; bt < bu; bt++) {
            if (br[0].userTxnsLongHu[bt].betBox.hasClass("win")) {
                br[0].userTxnsLongHu[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxnsLongHu[bt].dom.removeClass("win").addClass("no_win")
            }
        }
    };
    var ah;
    var ad = function(bt) {
        JCache.get("#gameInfoWin > P").html(bt);
        JCache.get("#gameInfoWin").fadeIn();
        if (ah) {
            clearTimeout(ah)
        }
        ah = setTimeout(function() {
            g()
        }, 2000)
    };
    var g = function() {
        JCache.get("#gameInfoWin").fadeOut()
    };
    var B;
    var F = function(bt) {
        JCache.get("#gameInfo").html(bt);
        JCache.get("#gameInfo").fadeIn();
        if (B) {
            clearTimeout(B)
        }
        B = setTimeout(function() {
            a8()
        }, 2000)
    };
    var aK = function(bt) {
        JCache.get("#gameInfo").html(bt);
        JCache.get("#gameInfo").addClass("ins_info");
        JCache.get("#gameInfo").fadeIn()
    };
    var T = function(bt) {
        JCache.get("#gameInfo").html(bt);
        JCache.get("#gameInfo").fadeIn()
    };
    var a8 = function() {
        JCache.get("#gameInfo").fadeOut()
    };
    var N = function() {
        if (JCache.get("#gameInfo").hasClass("ins_info")) {
            JCache.get("#gameInfo").fadeOut();
            JCache.get("#gameInfo").removeClass("ins_info")
        }
    };
    var D;
    var ba = function(bt) {
        aD();
        JCache.get("#gameInfoSuccess").html(bt);
        JCache.get("#gameInfoSuccess").fadeIn();
        if (D) {
            clearTimeout(D)
        }
        D = setTimeout(function() {
            X()
        }, 2000)
    };
    var q = function(bt) {
        JCache.get("#gameInfoSuccess").addClass("ins");
        ba(bt)
    };
    var X = function() {
        JCache.get("#gameInfoSuccess").fadeOut()
    };
    var aZ;
    var v = function(bt) {
        X();
        JCache.get("#gameInfoUnsuccessful").html(bt);
        JCache.get("#gameInfoUnsuccessful").fadeIn();
        if (aZ) {
            clearTimeout(aZ)
        }
        aZ = setTimeout(function() {
            aD()
        }, 2000)
    };
    var ay = function(bt) {
        JCache.get("#gameInfoUnsuccessful").addClass("ins");
        v(bt)
    };
    var aD = function() {
        JCache.get("#gameInfoUnsuccessful").fadeOut()
    };
    var at;
    var I = -1;
    var r = function(bt) {
        if (bt == I) {
            return
        }
        if (bt < (PageSetting.alarmRoundIndex.value - 1)) {
            I = -1;
            return
        }
        I = bt;
        X();
        JCache.get("#gameInfoRed").html(I18N.get("form.text.noBetOver" + (bt - 1)));
        JCache.get("#gameInfoRed").css("display", "");
        if (at) {
            clearTimeout(at)
        }
        if (bt > PageSetting.alarmRoundIndex.value) {
            postAjax({
                url: "/player/update/sendNoBetRoundAlarm",
                data: {
                    domainType: PageConfig.dealerDomain,
                    tableID: br[0].currentTable.currentTableID,
                    gameShoe: br[0].currentTable.currentGameShoe,
                    gameRound: br[0].currentTable.currentGameRound,
                },
                success: function(bu) {}
            });
            at = setTimeout(function() {
                location = PageConfig.playerIndexPage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
            }, 2000)
        }
        at = setTimeout(function() {
            JCache.get("#gameInfoRed").fadeOut()
        }, 2500)
    };
    var aX = function(bt) {
        return function() {
            i(bt)
        }
    };
    var aY = function() {
        var bu = PageConfig.userBetLimitID;
        if (aH.containsKey(br[0].currentTable.currentTableID)) {
            bu = aH.get(br[0].currentTable.currentTableID)
        }
        for (var bt in br[0].betLimits) {
            if (br[0].betLimits[bt].id == bu) {
                br[0].betLimits[bt].dom.addClass("now");
                aJ(bt)
            } else {
                br[0].betLimits[bt].dom.removeClass("now")
            }
        }
    };
    var i = function(bt) {
        for (var bu in br[0].betLimits) {
            br[0].betLimits[bu].dom.removeClass("now")
        }
        br[0].betLimits[bt].dom.addClass("now");
        aJ(bt)
    };
    var u = function() {
        var bu = -1;
        for (var bt in br[0].betLimits) {
            if (br[0].betLimits[bt].dom.hasClass("now")) {
                bu = br[0].betLimits[bt].id;
                break
            }
        }
        if (bu != -1) {
            aH.put(br[0].currentTable.currentTableID, bu);
            PageUtil.callGameTableListWebIframe("syncTableBetLimitID", {
                tableID: br[0].currentTable.currentTableID,
                betLimitID: bu
            });
            BetLimitSettingUtil.setUserBetLimitIDCache({
                dealerDomain: PageConfig.dealerDomain,
                tableID: br[0].currentTable.currentTableID,
                betLimitID: bu
            });
            a5();
            JCache.get("#betLimitBox").fadeOut()
        }
    };
    var K = function(bt) {
        return function() {
            bl(bt);
            z()
        }
    };
    var bl = function(bu) {
        for (var bt = 0, bv = bq.length; bt < bv; bt++) {
            bq[bt].dom.removeClass("now");
            bq[bt].dom.unbind("click");
            bq[bt].dom.bind("click", K(bt))
        }
        bq[bu].dom.addClass("now");
        bq[bu].dom.unbind("click");
        l.className = bq[bu].className;
        l.amount = bq[bu].amount
    };
    var bj = function(bt) {
        return function() {
            aa(bt)
        }
    };
    var aa = function(bt) {
        bq[bt].dom.removeClass("now");
        bq[bt].dom.unbind("click");
        bq[bt].dom.bind("click", K(bt));
        l = {}
    };
    var bc = function(bt) {
        if (br[0].currentTable.currentTableID != bt) {
            if (PageConfig.enableMexicoWebHls == "1") {
                JCache.get("#video").css("display", "");
                JCache.get("div.video_box").removeClass("no_video");
                a8();
                bd(bt);
                br[0].currentTable.currentTableID = bt;
                br[0].currentTable.currentGameShoe = -1;
                br[0].currentTable.currentGameRound - -1;
                videoCanvas.setEnableVideo();
                a7(bt)
            } else {
                aE(0);
                bd(bt);
                br[0].currentTable.currentTableID = bt;
                br[0].currentTable.currentGameShoe = -1;
                br[0].currentTable.currentGameRound - -1
            }
            JCache.get("#currentTableID").html(I18N.get("form.text.table") + " " + br[0].currentTable.currentTableID)
        }
    };
    var a7 = function(bu) {
        if (bu != -1) {
            if (PageConfig.enableMexicoWebHls == "1") {
                br[0].currentTable.initCurrentTable = true;
                videoCanvas.play(0, bu)
            } else {
                var bt = swfobject.getObjectById("baccarat");
                if (bt != null && (typeof bt.changeChannel === "function")) {
                    br[0].currentTable.initCurrentTable = true;
                    bt.changeChannel(ab["" + bu]);
                    d()
                }
            }
        }
    };
    var bo = function() {
        var bt = swfobject.getObjectById("baccarat");
        if (bt != null && (typeof bt.doMute === "function")) {
            PageConfig.streamingAudio = "0";
            PlayerSettingUtil.changeStreamingAudio(PageConfig.streamingAudio);
            JCache.get("#streamingAudio").removeClass().addClass("switch_off");
            bt.doMute(1)
        }
    };
    var d = function() {
        var bt = swfobject.getObjectById("baccarat");
        if (bt != null && (typeof bt.doMute === "function")) {
            JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
            bt.doMute(PageConfig.streamingAudio == "1" ? 0 : 1)
        }
    };
    var aq = function() {
        var bt = swfobject.getObjectById("baccarat");
        if (bt != null && (typeof bt.doMute === "function")) {
            PageConfig.streamingAudio = PageConfig.streamingAudio == "1" ? "0" : "1";
            PlayerSettingUtil.changeStreamingAudio(PageConfig.streamingAudio);
            JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
            bt.doMute(PageConfig.streamingAudio == "1" ? 0 : 1)
        }
    };
    var R = function() {
        PageConfig.resultSound = PageConfig.resultSound == "1" ? "0" : "1";
        PlayerSettingUtil.changeResultSound(PageConfig.resultSound);
        JCache.get("#resultSound").removeClass().addClass(PageConfig.resultSound == "1" ? "switch_on" : "switch_off")
    };
    var ap = function() {
        PageConfig.bettingSound = PageConfig.bettingSound == "1" ? "0" : "1";
        PlayerSettingUtil.changeBettingSound(PageConfig.bettingSound);
        JCache.get("#bettingSound").removeClass().addClass(PageConfig.bettingSound == "1" ? "switch_on" : "switch_off")
    };
    var aV = function() {
        PageConfig.backgroundMusic = PageConfig.backgroundMusic == "1" ? "0" : "1";
        PlayerSettingUtil.changeBackgroundMusic(PageConfig.backgroundMusic);
        JCache.get("#backgroundMusic").removeClass().addClass(PageConfig.backgroundMusic == "1" ? "switch_on" : "switch_off");
        JCache.get("#soundBackGroundMusic").prop("muted", PageConfig.backgroundMusic == "1" ? 0 : 1)
    };
    var aR = function() {
        var bt = swfobject.getObjectById("baccarat");
        if (bt != null && (typeof bt.refresh === "function")) {
            bt.refresh()
        }
    };
    var f = function() {
        var bt = swfobject.getObjectById("baccarat");
        if (bt != null && (typeof bt.changeLine === "function")) {
            switch (PageConfig.streamingLine[0]) {
            case "1":
                PageConfig.streamingLine[0] = "2";
                break;
            case "2":
                PageConfig.streamingLine[0] = "3";
                break;
            case "3":
                PageConfig.streamingLine[0] = "1";
                break;
            default:
                PageConfig.streamingLine[0] = "1";
                break
            }
            JCache.get("#changeLine").html(PageConfig.streamingLine[0]);
            bt.changeLine(PageConfig.streamingLine[0], ab["" + br[0].currentTable.currentTableID])
        }
    };
    var ax = function(bt) {
        if (ArrayUtil.contains(U, bt)) {
            br[0].enableInsurance = true;
            JCache.get("#history").addClass("ins_mode");
            JCache.get(".box_con_all .up_set").append(JCache.get(".box_con_all #betBoxBankerPair"));
            JCache.get(".box_con_all .up_set").prepend(JCache.get(".box_con_all #betBoxPlayerPair"));
            JCache.get(".chips_con_all .up_set").append(JCache.get(".chips_con_all #drawChips_BankerPair"));
            JCache.get(".chips_con_all .up_set").prepend(JCache.get(".chips_con_all #drawChips_PlayerPair"));
            JCache.get(".ask_con_all .up_set").append(JCache.get(".ask_con_all .chips_player_pair"));
            JCache.get(".ask_con_all .up_set").prepend(JCache.get(".ask_con_all .chips_banker_pair"));
            JCache.get("section#betZoneChips, section#betZone").removeClass("bet_zone").addClass("bet_zone_ins");
            JCache.get("div#drawChips_PlayerPair, div#drawChips_BankerPair").css("top", "calc(50% - 40px/2)");
            if ($j(".box_con_all .down_set #betBoxPlayerIns").length == 0) {
                JCache.get(".box_con_all .down_set").append(JCache.get("div#betBoxBankerIns"));
                JCache.get(".box_con_all .down_set").prepend(JCache.get("div#betBoxPlayerIns"));
                JCache.get(".chips_con_all .down_set").append(JCache.get("div#drawChips_BankerIns"));
                JCache.get(".chips_con_all .down_set").prepend(JCache.get("div#drawChips_PlayerIns"));
                JCache.get("div#drawChips_PlayerIns, div#drawChips_BankerIns").removeAttr("name");
                JCache.get(".ask_con_all .down_set").append(JCache.get("#bankerInsInfo"));
                JCache.get(".ask_con_all .down_set").prepend(JCache.get("#playerInsInfo"))
            }
            JCache.get("div#betBoxPlayerIns, div#betBoxBankerIns, div#drawChips_PlayerIns, div#drawChips_BankerIns, #playerInsInfo, #bankerInsInfo").css("display", "")
        } else {
            br[0].enableInsurance = false;
            JCache.get("#history").removeClass("ins_mode");
            JCache.get("#templateInsBet").append(JCache.get("div#betBoxPlayerIns, div#betBoxBankerIns, div#drawChips_PlayerIns, div#drawChips_BankerIns, div#playerInsInfo, div#bankerInsInfo"));
            JCache.get("section#betZoneChips, section#betZone").removeClass("bet_zone_ins").addClass("bet_zone");
            JCache.get("div#drawChips_PlayerPair, div#drawChips_BankerPair").css("top", "0px");
            if ($j(".box_con_all > #betBoxPlayerPair").length == 0) {
                JCache.get(".box_con_all").prepend(JCache.get(".box_con_all .up_set #betBoxBankerPair"));
                JCache.get(".box_con_all").prepend(JCache.get(".box_con_all .up_set #betBoxPlayerPair"));
                JCache.get(".ask_con_all").prepend(JCache.get(".ask_con_all .up_set .chips_player_pair"));
                JCache.get(".ask_con_all").prepend(JCache.get(".ask_con_all .up_set .chips_banker_pair"));
                JCache.get("div#drawChips_PlayerIns, div#drawChips_BankerIns").attr("name", "betZoneBac");
                JCache.get(".chips_con_all").prepend(JCache.get(".chips_con_all .up_set #drawChips_BankerPair"));
                JCache.get(".chips_con_all").prepend(JCache.get(".chips_con_all .up_set #drawChips_PlayerPair"))
            }
            JCache.get("div#betBoxPlayerIns, div#betBoxBankerIns, div#drawChips_PlayerIns, div#drawChips_BankerIns, #playerInsInfo, #bankerInsInfo").css("display", "none")
        }
    };
    var aE = function(bt) {
        N();
        br[bt].closedOnce = false;
        br[bt].generateStake = false;
        br[bt].insuranceType = null;
        br[bt].insuranceChipBet = 0;
        br[bt].insBetLimit = 0;
        br[bt].bankerIns.points = 0;
        br[bt].playerIns.points = 0;
        br[bt].bankerIns.odds1 = 0;
        br[bt].bankerIns.odds2 = 0;
        br[bt].playerIns.odds1 = 0;
        br[bt].playerIns.odds2 = 0;
        JCache.get("section#infoZone").removeClass("ins");
        JCache.get("#insMark").html("");
        JCache.get("#insMark").css("display", "none");
        JCache.get("#insBetZone").removeClass("showIns");
        JCache.get("#insBetZone").fadeOut();
        JCache.get("#insBetAmount").val("");
        JCache.get("#insPayout,#insMyBet").html("--");
        JCache.get("#insChips li").removeClass("now");
        if (!JCache.get("#insBetConfirm").hasClass("no_work")) {
            JCache.get("#insBetConfirm").addClass("no_work");
            JCache.get("#insBetCancel").addClass("no_work")
        }
    };
    var bk = function(bt, by, bx) {
        var bz = by.tableCards;
        var bu = br[bt].bankerIns;
        var bw = br[bt].playerIns;
        if (br[0].autoOpenInsuranceDialog) {
            JCache.get("#insMsgAlert").removeClass().addClass("type_check_off")
        } else {
            JCache.get("#insMsgAlert").removeClass().addClass("type_check_on")
        }
        if (br[0].enableInsurance) {
            bu.points = MathUtil.decimal.add(PokerCardType.getInstance(bz[PokerCardIndexType.Banker1stCard.value]).handValue, PokerCardType.getInstance(bz[PokerCardIndexType.Banker2ndCard.value]).handValue) % 10;
            bw.points = MathUtil.decimal.add(PokerCardType.getInstance(bz[PokerCardIndexType.Player1stCard.value]).handValue, PokerCardType.getInstance(bz[PokerCardIndexType.Player2ndCard.value]).handValue) % 10;
            if (br[0].userTxns[CategoryType.BankerInsurance1.value].stake > 0) {
                bu.odds1 = OddsUtil.bankerInsurance1stOdds(bw.points, bu.points)
            }
            if (br[0].userTxns[CategoryType.PlayerInsurance1.value].stake > 0) {
                bw.odds1 = OddsUtil.playerInsurance1stOdds(bw.points, bu.points)
            }
            var bv = 0;
            if (bz[PokerCardIndexType.Player3rdCard.value] == PokerCardType.NONE.value) {
                bu.odds1 = OddsUtil.bankerInsurance1stOdds(bw.points, bu.points);
                bv = by.insuranceBetTime - parseInt((bx - by.insuranceStartTime1st) / 1000);
                if (PageConfig.enableMexicoWebHls == "1") {
                    bv = bv + PageConfig.hlsAdditionalBetTime
                }
                if (bv > 1) {
                    if (bu.odds1 > 0) {
                        JCache.get("#insMark").css("display", "").html(bu.insMarkTitle);
                        br[0].startInsurance = true;
                        if (br[0].userTxns[CategoryType.Banker.value].stake > 0) {
                            br[0].insuranceType = CategoryType.BankerInsurance1;
                            bg()
                        }
                    }
                    bw.odds1 = OddsUtil.playerInsurance1stOdds(bw.points, bu.points);
                    if (bw.odds1 > 0) {
                        JCache.get("#insMark").css("display", "").html(bw.insMarkTitle);
                        br[0].startInsurance = true;
                        if (br[0].userTxns[CategoryType.Player.value].stake > 0) {
                            br[0].insuranceType = CategoryType.PlayerInsurance1;
                            bg()
                        }
                    }
                    JCache.get("section#infoZone").addClass("ins");
                    br[0].countdownObj.countdownTime = bv;
                    br[0].countdownObj.trigger = true;
                    br[0].countdownObj.needCountdown = true;
                    h();
                    if (br[0].insuranceType == null) {
                        if (bw.odds1 > 0) {
                            aK(I18N.get("msg.info.betPlayerInsurance"))
                        } else {
                            aK(I18N.get("msg.info.betBankerInsurance"))
                        }
                    }
                }
            } else {
                bw.points = (PokerCardType.getInstance(bz[PokerCardIndexType.Player1stCard.value]).handValue + PokerCardType.getInstance(bz[PokerCardIndexType.Player2ndCard.value]).handValue + PokerCardType.getInstance(bz[PokerCardIndexType.Player3rdCard.value]).handValue) % 10;
                bu.odds2 = OddsUtil.bankerInsurance2ndOdds(bw.points, bu.points);
                bv = by.insuranceBetTime - parseInt((bx - by.insuranceStartTime2nd) / 1000);
                if (PageConfig.enableMexicoWebHls == "1") {
                    bv = bv + PageConfig.hlsAdditionalBetTime
                }
                if (bv > 1) {
                    if (bu.odds2 > 0) {
                        JCache.get("#insMark").css("display", "").html(bu.insMarkTitle);
                        br[0].startInsurance = true;
                        if (br[0].userTxns[CategoryType.Banker.value].stake > 0) {
                            br[0].insuranceType = CategoryType.BankerInsurance2;
                            bg()
                        }
                    }
                    bw.odds2 = OddsUtil.playerInsurance2ndOdds(bw.points, bu.points);
                    if (bw.odds2 > 0) {
                        JCache.get("#insMark").css("display", "").html(bw.insMarkTitle);
                        br[0].startInsurance = true;
                        if (br[0].userTxns[CategoryType.Player.value].stake > 0) {
                            br[0].insuranceType = CategoryType.PlayerInsurance2;
                            bg()
                        }
                    }
                    JCache.get("section#infoZone").addClass("ins");
                    br[0].countdownObj.countdownTime = bv;
                    br[0].countdownObj.trigger = true;
                    br[0].countdownObj.needCountdown = true;
                    h();
                    if (br[0].insuranceType == null) {
                        if (bw.odds2 > 0) {
                            aK(I18N.get("msg.info.betPlayerInsurance"))
                        } else {
                            aK(I18N.get("msg.info.betBankerInsurance"))
                        }
                    }
                }
            }
        }
    };
    var bg = function() {
        if (br[0].startInsurance) {
            JCache.get("#betZone").removeClass("stop_bet");
            JCache.get("#insBetZone").addClass("showIns");
            var bv = br[0].insuranceType;
            var bx, bw, bt;
            switch (bv) {
            case CategoryType.BankerInsurance1:
                aK(I18N.get("msg.info.betBankerInsurance"));
                JCache.get("#insBetZoneHint").html(I18N.get("form.text.ins.bankerBetAmount"));
                bw = br[0].bankerIns;
                bx = br[0].bankerIns.odds1;
                bt = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Banker.value].stake - MathUtil.decimal.multiply(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, bx), bx));
                JCache.get("#insMyBet").html(CurrencyUtil.format(br[0].userTxns[CategoryType.Banker.value].stake));
                break;
            case CategoryType.PlayerInsurance1:
                aK(I18N.get("msg.info.betPlayerInsurance"));
                JCache.get("#insBetZoneHint").html(I18N.get("form.text.ins.playerBetAmount"));
                bw = br[0].playerIns;
                bx = br[0].playerIns.odds1;
                bt = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Player.value].stake - MathUtil.decimal.multiply(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, bx), bx));
                JCache.get("#insMyBet").html(CurrencyUtil.format(br[0].userTxns[CategoryType.Player.value].stake));
                break;
            case CategoryType.BankerInsurance2:
                aK(I18N.get("msg.info.betBankerInsurance"));
                JCache.get("#insBetZoneHint").html(I18N.get("form.text.ins.bankerBetAmount"));
                bw = br[0].bankerIns;
                bx = br[0].bankerIns.odds2;
                var bu = br[0].userTxns[CategoryType.BankerInsurance1.value].stake - br[0].userTxns[CategoryType.PlayerInsurance2.value].stake;
                bt = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Banker.value].stake - MathUtil.decimal.multiply(bu, bw.odds1) - MathUtil.decimal.multiply(br[0].userTxns[CategoryType.BankerInsurance2.value].stake, bx), bx));
                JCache.get("#insMyBet").html(CurrencyUtil.format(br[0].userTxns[CategoryType.Banker.value].stake));
                break;
            case CategoryType.PlayerInsurance2:
                aK(I18N.get("msg.info.betPlayerInsurance"));
                JCache.get("#insBetZoneHint").html(I18N.get("form.text.ins.playerBetAmount"));
                bw = br[0].playerIns;
                bx = br[0].playerIns.odds2;
                var bu = br[0].userTxns[CategoryType.PlayerInsurance1.value].stake - br[0].userTxns[CategoryType.PlayerInsurance2.value].stake;
                bt = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Player.value].stake - MathUtil.decimal.multiply(bu, bw.odds1) - MathUtil.decimal.multiply(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake, bx), bx));
                JCache.get("#insMyBet").html(CurrencyUtil.format(br[0].userTxns[CategoryType.Player.value].stake));
                break;
            default:
                JCache.get("#insOdds, #insBetLimit, #insMyBet, #insBetZoneHint").html("");
                break
            }
            bw.betBoxDom.removeClass("no_win");
            bw.drawChipsDom.removeClass("no_win");
            JCache.get("#insBetZoneTitle").html(bw.betZoneTitle);
            JCache.get("#insOdds").html(bx);
            if (!br[0].generateStake) {
                o(bt, bx)
            }
            if (br[0].autoOpenInsuranceDialog && br[0].startInsurance && !br[0].closedOnce && bt > 0) {
                JCache.get("#insBetZone").fadeIn()
            }
        }
    };
    var o = function(bw, bC) {
        br[0].generateStake = true;
        var bz = $j(document.createDocumentFragment());
        if (bw > 0) {
            for (var bA = 0; bA < PageSetting.chipRatio.value.length; bA++) {
                var by = Math.floor(MathUtil.decimal.multiply(bw, PageSetting.chipRatio.value[bA]));
                var bx = CurrencyUtil.getFloorAmount(by);
                var bt = CurrencyUtil.showFloorAmount(by);
                var bv = JCache.clone("#templateInsChipLi");
                if (bt.length > 3) {
                    bv.prop("class", ChipType.getClassByValue(by) + " lot_word")
                } else {
                    bv.prop("class", ChipType.getClassByValue(by))
                }
                if (bA > 0) {
                    var bu = Math.floor(MathUtil.decimal.multiply(bw, PageSetting.chipRatio.value[bA - 1]));
                    if (bu > by && by > 0) {
                        bv.children("p").attr("value", bx);
                        bv.children("p").html(bt);
                        bz.prepend(bv)
                    }
                } else {
                    if (by > 0) {
                        bv.children("p").attr("value", bx);
                        bv.children("p").html(bt);
                        bz.prepend(bv)
                    }
                }
            }
            var bB = JCache.get("#insChips");
            bB.empty();
            bB.append(bz);
            $j("#insChips li").bind("click", function() {
                if ($j(this).hasClass("now")) {
                    $j(this).removeClass("now");
                    br[0].insuranceChipBet = "";
                    JCache.get("#insPayout").html("--");
                    JCache.get("#insBetConfirm").addClass("no_work");
                    JCache.get("#insBetCancel").addClass("no_work")
                } else {
                    var bD = Number($j(this).children("p").attr("value"));
                    if (bD > j) {
                        v(I18N.get("msg.error.info.insufficientBalance"));
                        return
                    }
                    $j("#insChips li").removeClass("now");
                    $j(this).addClass("now");
                    br[0].insuranceChipBet = bD;
                    JCache.get("#insBetAmount").val("");
                    JCache.get("#insPayout").html(CurrencyUtil.formatByCurrency(bD * bC, PageConfig.currencyId));
                    JCache.get("#insBetConfirm").removeClass("no_work");
                    JCache.get("#insBetCancel").removeClass("no_work")
                }
            })
        } else {
            var bB = JCache.get("#insChips");
            bB.empty()
        }
        br[0].insBetLimit = bw;
        JCache.get("#insBetLimit").html(CurrencyUtil.format(bw))
    };
    var bd = function(bt) {
        if (typeof a0[bt] == "undefined" || typeof a0[bt].tableSupportGame == "undefined") {
            return
        }
        JCache.get("#body").removeClass("speed_mode");
        JCache.get("#speedIcon").css("display", "none");
        if (a0[bt].tableSupportGame == TableSupportGameType.Baccarat.value) {
            if (ArrayUtil.contains(U, bt)) {
                JCache.get("#currentTableType").html(I18N.get("form.text.insBaccarat"));
                JCache.get("#betBoxBankerPair > h2").html(I18N.get("form.text.category.bankerPair4"));
                JCache.get("#betBoxPlayerPair > h2").html(I18N.get("form.text.category.playerPair4"))
            } else {
                JCache.get("#currentTableType").html(I18N.get("form.text.baccarat"));
                JCache.get("#betBoxBankerPair > h2").html(I18N.get("form.text.category.bankerPair1"));
                JCache.get("#betBoxPlayerPair > h2").html(I18N.get("form.text.category.playerPair1"))
            }
            JCache.get("#infoZone").removeClass("dragon_tiger");
            JCache.get("#currentBetBtnBac").css("display", "");
            JCache.get("[name='currentBetOneBac']").css("display", "");
            JCache.get("[name='currentBetTwoBac']").css("display", "none");
            JCache.get("[name='currentBetOneLongHu']").css("display", "none");
            JCache.get("#betLimitBox").removeClass("dragon_tiger");
            JCache.get("[name='betLimitBoxBac']").css("display", "");
            JCache.get("[name='betLimitBoxLongHu']").css("display", "none");
            JCache.get("[name='betLimitBoxBoth']").css("display", "");
            JCache.get("#infoLeft").removeClass("dragon_tiger");
            JCache.get("#betZoneChips").removeClass("dragon_tiger");
            JCache.get("#betZone").removeClass("dragon_tiger");
            JCache.get("div[name='betZoneBac']").css("display", "");
            JCache.get("div[name='betZoneLongHu']").css("display", "none");
            JCache.get("div[name='betZoneBoth']").css("display", "");
            ax(bt);
            JCache.get("#banker1stCardAnime").css("display", "");
            JCache.get("#banker2ndCardAnime").css("display", "");
            JCache.get("#banker3rdCardAnime").css("display", "none");
            JCache.get("#player1stCardAnime").css("display", "");
            JCache.get("#player2ndCardAnime").css("display", "");
            JCache.get("#player3rdCardAnime").css("display", "none");
            JCache.get("#playerHandValueTitle").html(I18N.get("form.text.category.player1"));
            JCache.get("#bankerHandValueTitle").html(I18N.get("form.text.category.banker1"));
            JCache.get("#functionZone").removeClass("dragon_tiger");
            JCache.get("#actionButtonBac").css("display", "");
            JCache.get("#actionButtonLongHu").css("display", "none");
            if (ArrayUtil.contains(m, bt)) {
                JCache.get("#body").addClass("speed_mode");
                JCache.get("#speedIcon").css("display", "")
            }
        } else {
            JCache.get("#currentTableType").html(I18N.get("form.text.dragonTiger"));
            JCache.get("#infoZone").addClass("dragon_tiger");
            JCache.get("#currentBetBtnBac").css("display", "none");
            JCache.get("[name='currentBetOneBac']").css("display", "none");
            JCache.get("[name='currentBetTwoBac']").css("display", "none");
            JCache.get("[name='currentBetOneLongHu']").css("display", "");
            JCache.get("#betLimitBox").addClass("dragon_tiger");
            JCache.get("[name='betLimitBoxBac']").css("display", "none");
            JCache.get("[name='betLimitBoxLongHu']").css("display", "");
            JCache.get("[name='betLimitBoxBoth']").css("display", "");
            JCache.get("#infoLeft").addClass("dragon_tiger");
            JCache.get("#betZoneChips").addClass("dragon_tiger");
            JCache.get("#betZone").addClass("dragon_tiger");
            JCache.get("div[name='betZoneBac']").css("display", "none");
            JCache.get("div[name='betZoneLongHu']").css("display", "");
            JCache.get("div[name='betZoneBoth']").css("display", "");
            JCache.get("#banker1stCardAnime").css("display", "");
            JCache.get("#banker2ndCardAnime").css("display", "none");
            JCache.get("#banker3rdCardAnime").css("display", "none");
            JCache.get("#player1stCardAnime").css("display", "");
            JCache.get("#player2ndCardAnime").css("display", "none");
            JCache.get("#player3rdCardAnime").css("display", "none");
            JCache.get("#playerHandValueTitle").html(I18N.get("form.text.category.dragon1"));
            JCache.get("#bankerHandValueTitle").html(I18N.get("form.text.category.tiger1"));
            JCache.get("#functionZone").addClass("dragon_tiger");
            JCache.get("#actionButtonBac").css("display", "none");
            JCache.get("#actionButtonLongHu").css("display", "")
        }
    };
    var k = function() {
        if (!br[0].currentTable.currentGameShoe || isNaN(br[0].currentTable.currentGameShoe)) {
            return
        }
        if (!br[0].currentTable.currentGameRound || isNaN(br[0].currentTable.currentGameRound)) {
            return
        }
        try {
            postAjax({
                url: "/casino/sexy/player/query/queryTransactions.php",
                data: {
                    domainType: PageConfig.dealerDomain,
                    tableID: br[0].currentTable.currentTableID,
                    gameShoe: br[0].currentTable.currentGameShoe,
                    gameRound: br[0].currentTable.currentGameRound
                },
                success: function(bt) {
                    bp(bt)
                }
            })
        } finally {}
    };
    var bp = function(bu) {
        if (bu == null) {
            return
        }
        if (bu.idleCount) {
            r(bu.idleCount)
        }
        for (var bv = 0, bz = br[0].userTxns.length; bv < bz; bv++) {
            br[0].userTxns[bv].stake = 0
        }
        for (var bv = 0, bz = br[0].userTxnsLongHu.length; bv < bz; bv++) {
            br[0].userTxnsLongHu[bv].stake = 0
        }
        var by = 0;
        var bx = bu.bacTxns;
        for (var bw in bx) {
            var bA = br[0].userTxns[CategoryType[bx[bw].category].value];
            bA.stake = MathUtil.decimal.add(bA.stake, bx[bw].stake);
            switch (CategoryType[bx[bw].category]) {
            case CategoryType.BankerInsurance2:
                br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, bx[bw].stake);
                break;
            case CategoryType.PlayerInsurance2:
                br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, bx[bw].stake);
                break;
            default:
                break
            }
            by = MathUtil.decimal.add(by, bx[bw].stake)
        }
        var bt = bu.longHuTxns;
        for (var bw in bt) {
            var bA = br[0].userTxnsLongHu[LongHuCategoryType[bt[bw].category].value];
            bA.stake = MathUtil.decimal.add(bA.stake, bt[bw].stake);
            by = MathUtil.decimal.add(by, bt[bw].stake)
        }
        JCache.get("#playerTotalCurrentBet").html(CurrencyUtil.format(by));
        aO();
        a2()
    };
    var aW = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            var bt = br[0].dealerEventStampTime - PageSetting.queryGapTime.value;
            bt = bt < 0 ? 0 : bt;
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryDealerEventV2.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        queryTableID: br[0].currentTable.currentTableID,
                        dealerEventStampTime: bt
                    },
                    success: function(bu) {
                        S(bu)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var bt = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    bt.check()
                }, 1000)
            }
        }
    };
    var S = function(bw) {
        if (bw == null || bw.status != "200") {
            return
        }
        if (!br[0].currentTable.initSwitchTable) {
            bd(br[0].currentTable.currentTableID);
            br[0].currentTable.initSwitchTable = true
        }
        if (!br[0].currentTable.initCurrentTable) {
            a7(br[0].currentTable.currentTableID)
        }
        var bB = $j.parseJSON(bw.message);
        if (typeof bB.deliverTime == "undefined") {
            return
        }
        if (br[0].currentTable.currentTableID != -1 && br[0].currentTable.currentTableID != bB.tableID) {
            return
        }
        if (typeof bw.delayTime != "undefined" && bw.delayTime != null) {
            PageConfig.eventDelayTime = bw.delayTime
        }
        bc(bB.tableID);
        var bx = document.getElementById("currentTableIframe");
        if (bx) {
            var bF = (bx.contentWindow || bx.contentDocument);
            if (bF != null && (typeof bF.currentTableInfo != "undefined") && (typeof bF.currentTableInfo.changeTableID === "function")) {
                bF.currentTableInfo.changeTableID(bB.tableID, a0[bB.tableID].tableSupportGame)
            }
        }
        if (br[0].currentTable.currentGameShoe != bB.gameShoe || br[0].currentTable.currentGameRound != bB.gameRound) {
            if (br[0].currentTable.currentGameShoe != -1 && br[0].currentTable.currentGameRound != -1) {
                for (var bA = 0, bu = br[0].userTxns.length; bA < bu; bA++) {
                    if (bA == CategoryType.BankerInsurance1.value || bA == CategoryType.BankerInsurance2.value || bA == CategoryType.PlayerInsurance1.value || bA == CategoryType.PlayerInsurance2.value) {
                        br[0].userTxns[bA].repeatStake = 0
                    } else {
                        br[0].userTxns[bA].repeatStake = br[0].userTxns[bA].lastAddStake
                    }
                    br[0].userTxns[bA].lastAddStake = 0;
                    br[0].userTxns[bA].stake = 0
                }
                aO();
                for (var bA = 0, bu = br[0].userTxnsLongHu.length; bA < bu; bA++) {
                    br[0].userTxnsLongHu[bA].repeatStake = br[0].userTxnsLongHu[bA].lastAddStake;
                    br[0].userTxnsLongHu[bA].lastAddStake = 0;
                    br[0].userTxnsLongHu[bA].stake = 0
                }
                a2()
            }
            br[0].currentTable.currentGameShoe = bB.gameShoe;
            br[0].currentTable.currentGameRound = bB.gameRound;
            JCache.get("#currentGA").html("GA" + br[0].currentTable.currentGameShoe + FormatUtil.padLeft(br[0].currentTable.currentGameRound, 4));
            JCache.get("#currentShoeRound").html(I18N.get("form.text.game") + " " + br[0].currentTable.currentGameShoe + " / " + br[0].currentTable.currentGameRound);
            k();
            a5();
            au = true
        }
        if (!br[0].currentTable.newGameStart) {
            for (var bA = 0, bu = br[0].randomPayOdds.length; bA < bu; bA++) {
                var by = CurrentBetColumnType.getInstance(bA);
                if (CurrentBetColumnType.BankerPair == by || CurrentBetColumnType.PlayerPair == by) {
                    if (!br[0].randomPayOdds[bA].odds || br[0].randomPayOdds[bA].odds != bB.randomPayOdds[by.value]) {
                        br[0].randomPayOdds[bA].odds = bB.randomPayOdds[by.value];
                        if (br[0].randomPayOdds[bA].odds <= 11) {
                            br[0].randomPayOdds[bA].odds = 11;
                            br[0].randomPayOdds[bA].dom.html("1:" + br[0].randomPayOdds[bA].odds);
                            br[0].randomPayOdds[bA].dom.removeClass("change_odds")
                        } else {
                            br[0].randomPayOdds[bA].dom.html("1:" + br[0].randomPayOdds[bA].odds);
                            br[0].randomPayOdds[bA].dom.addClass("change_odds")
                        }
                    }
                }
            }
        }
        var bC = DealerEventType.getInstanceByName(bB.eventType);
        switch (bC) {
        case DealerEventType.GP_NEW_GAME_START:
        case DealerEventType.GP_VOID_ROUND:
            break;
        default:
            if (PageConfig.enableMexicoWebHls == "1") {
                n(bB, bw.timestamp, PageConfig.eventDelayTime)
            } else {
                n(bB, bw.timestamp, PageSetting.flashDelayTime.value)
            }
            break
        }
        switch (bC) {
        case DealerEventType.GP_INIT:
            au = false;
            aE(0);
            b("0", true);
            JCache.get("#gameInfoCard").slideUp();
            break;
        case DealerEventType.GP_NEW_GAME_START:
            au = false;
            br[0].bankerIns.odds1 = 0;
            br[0].playerIns.odds1 = 0;
            br[0].bankerIns.odds2 = 0;
            br[0].playerIns.odds2 = 0;
            if (JCache.get("#gameInfoSuccess").hasClass("ins")) {
                JCache.get("#gameInfoSuccess").removeClass("ins")
            }
            if (JCache.get("#gameInfoUnsuccessful").hasClass("ins")) {
                JCache.get("#gameInfoUnsuccessful").removeClass("ins")
            }
            if (PageConfig.enableMexicoWebHls == "1") {
                if ((bw.timestamp - bB.deliverTime) < (PageConfig.eventDelayTime - 2000)) {
                    return
                }
                aO();
                a2()
            }
            aI();
            PageConfig.eventStatus = DealerEventType.GP_NEW_GAME_START.value;
            if (PageConfig.enableMexicoWebHls == "1") {
                var bE = PageConfig.hlsAdditionalBetTime + bB.iTime - parseInt((bw.timestamp - bB.roundStartTime) / 1000);
                if (bE != br[0].countdownObj.countdownTime && Math.abs(bE - br[0].countdownObj.countdownTime) != 1) {
                    br[0].countdownObj.countdownTime = bE
                }
            } else {
                var bE = bB.iTime - parseInt((bw.timestamp - bB.roundStartTime) / 1000);
                if (bE != br[0].countdownObj.countdownTime && Math.abs(bE - br[0].countdownObj.countdownTime) != 1) {
                    br[0].countdownObj.countdownTime = bE
                }
            }
            if (!br[0].countdownObj.trigger) {
                if (br[0].countdownObj.countdownTime > 0) {
                    F(I18N.get("form.text.startBet"));
                    setTimeout(function() {
                        ao()
                    }, 1500);
                    br[0].countdownObj.needCountdown = true
                }
                br[0].countdownObj.waitingTime = bB.iTime;
                br[0].countdownObj.trigger = true;
                h();
                PageConfig.eventStatus = DealerEventType.GP_BET_TIME.value
            }
            JCache.get("#gameInfoCard").slideUp();
            break;
        case DealerEventType.GP_NEXT_TARGET:
            au = false;
            if (PageConfig.enableMexicoWebHls == "1" && ((bw.timestamp - bB.deliverTime) < PageConfig.eventDelayTime)) {
                if (br[0].countdownObj.countdownTime <= 0) {
                    b("0", true);
                    JCache.get("#gameInfoCard").slideDown()
                }
                return
            }
            b("0", true);
            JCache.get("#gameInfoCard").slideDown();
            break;
        case DealerEventType.GP_ONE_CARD_DRAWN:
            au = false;
            if (PageConfig.enableMexicoWebHls == "1" && ((bw.timestamp - bB.deliverTime) < PageConfig.eventDelayTime)) {
                if (br[0].countdownObj.countdownTime <= 0) {
                    b("0", true);
                    JCache.get("#gameInfoCard").slideDown()
                }
                return
            }
            b("0", true);
            aE(0);
            JCache.get("#gameInfoCard").slideDown();
            break;
        case DealerEventType.GP_BET_INSURANCE:
            if (PageConfig.enableMexicoWebHls == "1" && ((bw.timestamp - bB.deliverTime) < PageConfig.eventDelayTime)) {
                return
            }
            br[0].startInsurance = true;
            if (br[0].enableInsurance == true) {
                bk(0, bB, bw.timestamp)
            }
            JCache.get("#gameInfoCard").slideDown();
            au = false;
            PageConfig.eventStatus = DealerEventType.GP_BET_INSURANCE.value;
            break;
        case DealerEventType.GP_WINNER:
            if (PageConfig.enableMexicoWebHls == "1") {
                var bD = false;
                var bv = 0;
                var bt = DealerDomainCardShowIndex.getInstance(PageConfig.dealerDomain).index;
                for (var bA = 0, bu = bt.length; bA < bu; bA++) {
                    if (br[0].pokerCards[bA].unique != bB.tableCards[bA]) {
                        bD = true;
                        break
                    }
                    if (bB.tableCardStampTimes[bA] != 0) {
                        bv = bB.tableCardStampTimes[bA]
                    }
                }
                if (bD) {
                    b("0", true);
                    return
                }
                if ((bw.timestamp - bv) < PageConfig.eventDelayTime + 1500) {
                    b("0", true);
                    return
                }
            } else {
                if ((bw.timestamp - bB.deliverTime) < (PageSetting.flashDelayTime.value - 1000)) {
                    return
                }
            }
            aE(0);
            be("0", bB);
            JCache.get("#gameInfoCard").slideDown();
            PageConfig.eventStatus = DealerEventType.GP_WINNER.value;
            break;
        case DealerEventType.GP_VOID_ROUND:
            v(I18N.get("msg.error.voidRound"));
            break;
        default:
            break
        }
        if (br[0].dealerEventStampTime == bB.deliverTime) {
            return
        }
        if (br[0].winnerType.value != bB.winner) {
            JCache.get("#gameWinnerType").fadeOut();
            JCache.get("#gameWinnerType").fadeIn();
            if (a0[bB.tableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                var bz = GameWinnerType.getInstance(DealerEventUtil.getWinnerBaccarat({
                    winner: bB.winner,
                    tableCards: bB.tableCards
                }));
                br[0].winnerType.value = bz.value;
                br[0].winnerType.displayCss = bz.displayCss;
                JCache.get("#gameWinnerType").removeClass().addClass(br[0].winnerType.displayCss);
                switch (bz) {
                case GameWinnerType.BANKER:
                    br[0].winnerType.winnerBanker = true;
                    JCache.get("#gameWinnerBanker").addClass("win");
                    JCache.get("#gameWinnerType").html(I18N.get("form.text.winner.banker"));
                    break;
                case GameWinnerType.PLAYER:
                    br[0].winnerType.winnerPlayer = true;
                    JCache.get("#gameWinnerPlayer").addClass("win");
                    JCache.get("#gameWinnerType").html(I18N.get("form.text.winner.player"));
                    break;
                case GameWinnerType.TIE:
                    JCache.get("#gameWinnerType").html(I18N.get("form.text.winner.tie"));
                    break;
                default:
                    JCache.get("#gameWinnerType").html("");
                    break
                }
            } else {
                var bz = GameWinnerLongHuType.getInstance(DealerEventUtil.getWinnerLongHu({
                    winner: bB.winner,
                    tableCards: bB.tableCards
                }));
                br[0].winnerType.value = bz.value;
                br[0].winnerType.displayCss = bz.displayCss;
                JCache.get("#gameWinnerType").removeClass().addClass(br[0].winnerType.displayCss);
                switch (bz) {
                case GameWinnerLongHuType.TIGER:
                    br[0].winnerType.winnerBanker = true;
                    JCache.get("#gameWinnerBanker").addClass("win");
                    JCache.get("#gameWinnerType").html(I18N.get("form.text.winner.tiger"));
                    break;
                case GameWinnerLongHuType.DRAGON:
                    br[0].winnerType.winnerPlayer = true;
                    JCache.get("#gameWinnerPlayer").addClass("win");
                    JCache.get("#gameWinnerType").html(I18N.get("form.text.winner.dragon"));
                    break;
                case GameWinnerLongHuType.TIE:
                    JCache.get("#gameWinnerType").html(I18N.get("form.text.winner.tie"));
                    break;
                default:
                    JCache.get("#gameWinnerType").html("");
                    break
                }
            }
            JCache.get("#gameWinnerType").fadeOut();
            JCache.get("#gameWinnerType").fadeIn()
        }
        br[0].dealerEventStampTime = Math.max(br[0].dealerEventStampTime, bB.deliverTime)
    };
    var n = function(bA, bz, bw) {
        var bt = DealerDomainCardShowIndex.getInstance(PageConfig.dealerDomain).index;
        for (var bv = 0, bu = bt.length; bv < bu; bv++) {
            var by = bt[bv];
            var bC = bA.tableCards[by];
            if (br[0].pokerCards[by].unique != bC) {
                if (by == PokerCardIndexType.Banker3rdCard.value) {
                    bw = bw - 1000;
                    br[0].pokerCards[PokerCardIndexType.Banker3rdCard.value].domAnimeCard.css("display", "")
                }
                if (by == PokerCardIndexType.Player3rdCard.value) {
                    bw = bw - 1000;
                    br[0].pokerCards[PokerCardIndexType.Player3rdCard.value].domAnimeCard.css("display", "")
                }
                if (PokerCardUtil.controlPokerCardOpen(by, bz, bA, bw)) {
                    break
                }
                if (by == PokerCardIndexType.Banker2ndCard.value) {
                    if (bA.tableCards[PokerCardIndexType.Player3rdCard.value] != PokerCardType.NONE.value) {
                        br[0].pokerCards[PokerCardIndexType.Player3rdCard.value].domAnimeCard.css("display", "")
                    } else {
                        if (bA.tableCards[PokerCardIndexType.Banker3rdCard.value] != PokerCardType.NONE.value) {
                            br[0].pokerCards[PokerCardIndexType.Banker3rdCard.value].domAnimeCard.css("display", "")
                        }
                    }
                } else {
                    if (by == PokerCardIndexType.Player3rdCard.value) {
                        if (bA.tableCards[PokerCardIndexType.Banker3rdCard.value] != PokerCardType.NONE.value) {
                            br[0].pokerCards[PokerCardIndexType.Banker3rdCard.value].domAnimeCard.css("display", "")
                        }
                    }
                }
                var bx = PokerCardType.getInstance(bC);
                br[0].pokerCards[by].unique = bx.value;
                br[0].pokerCards[by].handValue = bx.handValue;
                br[0].pokerCards[by].cardPoint = bx.cardPoint;
                br[0].pokerCards[by].className = bx.className;
                br[0].pokerCards[by].change = true
            }
        }
        for (var by = 0, bu = br[0].pokerCards.length; by < bu; by++) {
            if (br[0].pokerCards[by].change) {
                if (br[0].pokerCards[by].className != "open" && br[0].pokerCards[by].className != "none") {
                    if (PageConfig.isIE == "1") {
                        br[0].pokerCards[by].domAnimeCard.children().eq(1).css("backface-visibility", "visible")
                    } else {
                        br[0].pokerCards[by].domAnimeCard.addClass("flipped")
                    }
                }
                br[0].pokerCards[by].domCard.removeClass().addClass("back").addClass(br[0].pokerCards[by].className);
                var bB = br[0].pokerCards[by].domHand.html();
                if (a0[bA.tableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                    bB = Number(bB) + br[0].pokerCards[by].handValue;
                    bB = bB % 10
                } else {
                    bB = PokerCardUtil.getDragonTigerCardPoint(br[0].pokerCards[by].cardPoint)
                }
                br[0].pokerCards[by].domHand.html(bB);
                br[0].pokerCards[by].change = false
            }
        }
    };
    var c = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                if (!br[0].currentTable.currentGameShoe || isNaN(br[0].currentTable.currentGameShoe)) {
                    return
                }
                if (!br[0].currentTable.currentGameRound || isNaN(br[0].currentTable.currentGameRound)) {
                    return
                }
                postAjax({
                    url: "/casino/sexy/player/query/queryTableCurrentBet.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        tableID: br[0].currentTable.currentTableID,
                        gameShoe: br[0].currentTable.currentGameShoe,
                        gameRound: br[0].currentTable.currentGameRound
                    },
                    success: function(bt) {
                        aw(bt)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var bt = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    bt.check()
                }, 1000)
            }
        }
    };
    var aw = function(bw) {
        if (bw == null || $j.isEmptyObject(bw)) {
            return
        }
        var bA = bw.tableID;
        var bC = bw.currentBet;
        var bt = (PageConfig.dealerDomain == 0);
        if (!$j.isEmptyObject(bC)) {
            var bv = 0;
            var bz = CurrencyType.getInstance(PageConfig.currencyId);
            if (a0[bA].tableSupportGame == TableSupportGameType.Baccarat.value) {
                bv = MathUtil.decimal.multiply(bC[CurrentBetColumnType.Total.currentBetColumn], bz.fixRate);
                for (var by = 0, bu = br[0].currentBetColumns.length - 1; by < bu; by++) {
                    switch (by) {
                    case CurrentBetColumnType.BankerInsurance1.value:
                    case CurrentBetColumnType.BankerInsurance2.value:
                        var bB = MathUtil.decimal.add(MathUtil.decimal.multiply(bC.bankerInsurance1CurrentBet, bz.fixRate), MathUtil.decimal.multiply(bC.bankerInsurance2CurrentBet, bz.fixRate));
                        if (bB == 0) {
                            br[0].currentBetColumns[by].dom.html("0.0");
                            br[0].currentBetColumns[by].rateDom.html(bt ? "0" : "0%")
                        } else {
                            br[0].currentBetColumns[by].dom.html(CurrencyUtil.format(bB, 1));
                            br[0].currentBetColumns[by].rateDom.html(MathUtil.currentBetAmountShow(bB, bv, "%", bt))
                        }
                        break;
                    case CurrentBetColumnType.PlayerInsurance1.value:
                    case CurrentBetColumnType.PlayerInsurance2.value:
                        var bB = MathUtil.decimal.add(MathUtil.decimal.multiply(bC.playerInsurance1CurrentBet, bz.fixRate), MathUtil.decimal.multiply(bC.playerInsurance2CurrentBet, bz.fixRate));
                        if (bB == 0) {
                            br[0].currentBetColumns[by].dom.html("0.0");
                            br[0].currentBetColumns[by].rateDom.html(bt ? "0" : "0%")
                        } else {
                            br[0].currentBetColumns[by].dom.html(CurrencyUtil.format(bB, 1));
                            br[0].currentBetColumns[by].rateDom.html(MathUtil.currentBetAmountShow(bB, bv, "%", bt))
                        }
                        break;
                    default:
                        br[0].currentBetColumns[by].currentBet = MathUtil.decimal.multiply(bC[CurrentBetColumnType.getInstance(by).currentBetColumn], bz.fixRate);
                        if (br[0].currentBetColumns[by].currentBet == 0) {
                            br[0].currentBetColumns[by].dom.html("0.0");
                            br[0].currentBetColumns[by].rateDom.html(bt ? "0" : "0%")
                        } else {
                            br[0].currentBetColumns[by].dom.html(CurrencyUtil.format(br[0].currentBetColumns[by].currentBet, 1));
                            br[0].currentBetColumns[by].rateDom.html(MathUtil.currentBetAmountShow(br[0].currentBetColumns[by].currentBet, bv, "%", bt))
                        }
                        break
                    }
                }
            } else {
                bv = MathUtil.decimal.multiply(bC[CurrentBetColumnLongHuType.Total.currentBetColumn], bz.fixRate);
                for (var by = 0, bu = br[0].currentBetColumnsLongHu.length - 1; by < bu; by++) {
                    br[0].currentBetColumnsLongHu[by].currentBet = MathUtil.decimal.multiply(bC[CurrentBetColumnLongHuType.getInstance(by).currentBetColumn], bz.fixRate);
                    if (br[0].currentBetColumnsLongHu[by].currentBet == 0) {
                        br[0].currentBetColumnsLongHu[by].dom.html("0.0");
                        br[0].currentBetColumnsLongHu[by].rateDom.html(bt ? "0" : "0%")
                    } else {
                        br[0].currentBetColumnsLongHu[by].dom.html(CurrencyUtil.format(br[0].currentBetColumnsLongHu[by].currentBet, 1));
                        br[0].currentBetColumnsLongHu[by].rateDom.html(MathUtil.currentBetAmountShow(br[0].currentBetColumnsLongHu[by].currentBet, bv, "%", bt))
                    }
                }
            }
            br[0].currentBetColumns[CurrentBetColumnType.Total.value].rateDom.html(CurrencyUtil.format(bv, 1))
        }
        var bx = bw.maxBetRound;
        if (!$j.isEmptyObject(bx)) {
            for (var by = 0, bu = CurrentBetColumnType.getLength(); by < bu; by++) {
                var bC = CurrentBetColumnType.getInstance(by);
                if (CurrentBetColumnType.Big == bC || CurrentBetColumnType.Small == bC || CurrentBetColumnType.Phoenix == bC || CurrentBetColumnType.Turtle == bC) {
                    br[0].currentBetColumns[by].maxBetRound = bx[bC.maxBetRound]
                } else {
                    br[0].currentBetColumns[by].maxBetRound = 999
                }
            }
            for (var by = 0, bu = CurrentBetColumnLongHuType.getLength(); by < bu; by++) {
                br[0].currentBetColumnsLongHu[by].maxBetRound = 999
            }
        }
    };
    var aJ = function(bt) {
        postAjax({
            url: "/casino/sexy/player/query/queryBetLimitV2.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: br[0].currentTable.currentTableID,
                betLimitID: bt
            },
            success: function(bu) {
                if (bu == null || $j.isEmptyObject(bu)) {
                    return
                }
                if (bu.status != "200") {
                    if (a0[br[0].currentTable.currentTableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                        for (var bv = 0, bx = br[0].userTxns.length; bv < bx; bv++) {
                            br[0].userTxns[bv].domMaxBet.html("0");
                            br[0].userTxns[bv].domMinBet.html("0")
                        }
                    } else {
                        for (var bv = 0, bx = br[0].userTxnsLongHu.length; bv < bx; bv++) {
                            br[0].userTxnsLongHu[bv].domMaxBet.html("0");
                            br[0].userTxnsLongHu[bv].domMinBet.html("0")
                        }
                    }
                    return
                }
                var bw = bu.message;
                if (a0[br[0].currentTable.currentTableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                    for (var bv = 0, bx = br[0].userTxns.length; bv < bx; bv++) {
                        br[0].userTxns[bv].domMaxBet.html(CurrencyUtil.format(bw[CategoryType.getInstance(bv).maxBet]));
                        br[0].userTxns[bv].domMinBet.html(CurrencyUtil.format(bw[CategoryType.getInstance(bv).minBet]))
                    }
                } else {
                    for (var bv = 0, bx = br[0].userTxnsLongHu.length; bv < bx; bv++) {
                        br[0].userTxnsLongHu[bv].domMaxBet.html(CurrencyUtil.format(bw[LongHuCategoryType.getInstance(bv).maxBet]));
                        br[0].userTxnsLongHu[bv].domMinBet.html(CurrencyUtil.format(bw[LongHuCategoryType.getInstance(bv).minBet]))
                    }
                }
            }
        })
    };
    var a5 = function() {
        var bt = PageConfig.userBetLimitID;
        if (aH.containsKey(br[0].currentTable.currentTableID)) {
            bt = aH.get(br[0].currentTable.currentTableID)
        } else {
            aH.put(br[0].currentTable.currentTableID, bt)
        }
        postAjax({
            url: "/casino/sexy/player/query/queryBetLimitV2.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: br[0].currentTable.currentTableID,
                betLimitID: bt
            },
            success: function(bu) {
                if (bu == null || $j.isEmptyObject(bu)) {
                    return
                }
                if (bu.status != "200") {
                    if (a0[br[0].currentTable.currentTableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                        for (var bv = 0, bx = br[0].userTxns.length; bv < bx; bv++) {
                            br[0].userTxns[bv].maxBet = 0;
                            br[0].userTxns[bv].domMaxBet.html("0");
                            br[0].userTxns[bv].minBet = 0;
                            br[0].userTxns[bv].domMinBet.html("0")
                        }
                    } else {
                        for (var bv = 0, bx = br[0].userTxnsLongHu.length; bv < bx; bv++) {
                            br[0].userTxnsLongHu[bv].maxBet = 0;
                            br[0].userTxnsLongHu[bv].domMaxBet.html("0");
                            br[0].userTxnsLongHu[bv].minBet = 0;
                            br[0].userTxnsLongHu[bv].domMinBet.html("0")
                        }
                    }
                    JCache.get("#maxBet").html("0");
                    JCache.get("#minBet").html("0");
                    return
                }
                var bw = bu.message;
                for (var bv = 0, bx = br[0].userTxns.length; bv < bx; bv++) {
                    if (br[0].userTxns[bv].maxBet != bw[CategoryType.getInstance(bv).maxBet]) {
                        br[0].userTxns[bv].maxBet = bw[CategoryType.getInstance(bv).maxBet];
                        br[0].userTxns[bv].domMaxBet.html(CurrencyUtil.format(br[0].userTxns[bv].maxBet))
                    }
                    if (br[0].userTxns[bv].minBet != bw[CategoryType.getInstance(bv).minBet]) {
                        br[0].userTxns[bv].minBet = bw[CategoryType.getInstance(bv).minBet];
                        br[0].userTxns[bv].domMinBet.html(CurrencyUtil.format(br[0].userTxns[bv].minBet))
                    }
                }
                for (var bv = 0, bx = br[0].userTxnsLongHu.length; bv < bx; bv++) {
                    if (br[0].userTxnsLongHu[bv].maxBet != bw[LongHuCategoryType.getInstance(bv).maxBet]) {
                        br[0].userTxnsLongHu[bv].maxBet = bw[LongHuCategoryType.getInstance(bv).maxBet];
                        br[0].userTxnsLongHu[bv].domMaxBet.html(CurrencyUtil.format(br[0].userTxnsLongHu[bv].maxBet))
                    }
                    if (br[0].userTxnsLongHu[bv].minBet != bw[LongHuCategoryType.getInstance(bv).minBet]) {
                        br[0].userTxnsLongHu[bv].minBet = bw[LongHuCategoryType.getInstance(bv).minBet];
                        br[0].userTxnsLongHu[bv].domMinBet.html(CurrencyUtil.format(br[0].userTxnsLongHu[bv].minBet))
                    }
                }
                if (a0[br[0].currentTable.currentTableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                    JCache.get("#maxBet").html(CurrencyUtil.format(br[0].userTxns[CategoryType.Banker.value].maxBet));
                    JCache.get("#minBet").html(CurrencyUtil.format(br[0].userTxns[CategoryType.Banker.value].minBet))
                } else {
                    JCache.get("#maxBet").html(CurrencyUtil.format(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].maxBet));
                    JCache.get("#minBet").html(CurrencyUtil.format(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].minBet))
                }
            }
        })
    };
    var x = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryTableListInfoV2.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        tableID: br[0].currentTable.currentTableID
                    },
                    success: function(bD) {
                        if (bD == null || $j.isEmptyObject(bD)) {
                            return
                        }
                        var bt = [];
                        var bB = bD.currentSingleTableID;
                        for (var bz = 0; bz < bD.message.length; bz++) {
                            var bC = bD.message[bz];
                            if (typeof a0[bC.tableID] == "undefined" || typeof a0[bC.tableID].domRoadID == "undefined" || typeof a0[bC.tableID].domRoadID.prop("id") == "undefined") {
                                a0[bC.tableID].displayiFrame = "empty";
                                a0[bC.tableID].domRoadID = $j("#gameTableList").contents().find("#tableID" + bC.tableID);
                                a0[bC.tableID].domDealerID = a0[bC.tableID].domRoadID.find("#dealerID");
                                a0[bC.tableID].domDealerImage = a0[bC.tableID].domRoadID.find("#dealerImage")
                            } else {
                                a0[bC.tableID].currDealerID = bC.dealerID
                            }
                            if (bC.tableSupportGame == TableSupportGameType.Baccarat.value || bC.tableSupportGame == TableSupportGameType.DragonTiger.value || bC.tableSupportGame == TableSupportGameType.SicBo.value || bC.tableSupportGame == TableSupportGameType.FishPrawnCrab.value || bC.tableSupportGame == TableSupportGameType.Roulette.value) {
                                a0[bC.tableID].maintenance = bC.maintenance;
                                if (!a0[bC.tableID].maintenance) {
                                    bt.push(bC.tableID)
                                }
                                quickBetGoodRoad.goodRoadMaintenance(bB, bC.tableID, bC.maintenance)
                            } else {}
                        }
                        if (quickBetGoodRoad.checkInitGameTableListFinish()) {
                            var bx = bD.event;
                            for (var bz = 0, bu = bx.length; bz < bu; bz++) {
                                var bv = $j.parseJSON(bx[bz].content);
                                if (PageConfig.enableMexicoWebHls == "1") {
                                    quickBetEvent.queryDealerEventQuickBet(bv, bD.timestamp, PageConfig.eventDelayTime)
                                } else {
                                    quickBetEvent.queryDealerEventQuickBet(bv, bD.timestamp, PageSetting.flashDelayTime.value)
                                }
                            }
                        }
                        bt = ArrayUtil.distinct(bt);
                        for (var by in a0) {
                            if (ArrayUtil.contains(bt, parseInt(a0[by].tableID))) {
                                if (a0[by].displayiFrame != "" || a0[by].displayiFrame == "empty") {
                                    a0[by].displayiFrame = "";
                                    a0[by].domRoadID.css("display", "")
                                }
                                if (a0[by].origDealerID != a0[by].currDealerID) {
                                    a0[by].origDealerID = a0[by].currDealerID;
                                    var bw = "";
                                    if (a0[by].currDealerID) {
                                        bw = a0[by].currDealerID.split("/")[0];
                                        bw = bw ? bw : ""
                                    }
                                    a0[by].domDealerImage.prop("src", "/casino/sexy/images/player/dealers/" + PageConfig.dealerDomain + "/" + bw.trim().toUpperCase() + ".jpg");
                                    a0[by].domDealerID.html(bw)
                                }
                            } else {
                                if (a0[by].displayiFrame != "none" || a0[by].displayiFrame == "empty") {
                                    a0[by].displayiFrame = "none";
                                    a0[by].domRoadID.css("display", "none")
                                }
                            }
                        }
                        if (typeof bB != "undefined" && bB != -1) {
                            if (!a0[bB].maintenance) {
                                if (br[0].maintenance == true || br[0].maintenance == null) {
                                    br[0].maintenance = false;
                                    ar()
                                }
                            } else {
                                if (br[0].maintenance == false || br[0].maintenance == null) {
                                    br[0].maintenance = true;
                                    e()
                                }
                            }
                            if (bB != br[0].currentTable.currentTableID) {
                                chooseTableChannel(br[0].currentTable.currentTableID)
                            }
                            if (br[0].currentTable.dealerName != a0[bB].currDealerID) {
                                br[0].currentTable.dealerName = a0[bB].currDealerID;
                                var bw = "";
                                if (br[0].currentTable.dealerName) {
                                    bw = br[0].currentTable.dealerName.split("/")[0];
                                    bw = bw ? bw : ""
                                }
                                JCache.get("#dealerName").html(I18N.get("form.text.dealerName") + " : " + bw)
                            }
                            a0[bB].displayiFrame = "none";
                            a0[bB].domRoadID.css("display", "none")
                        } else {
                            for (var bA in a0) {
                                if (!a0[bA].maintenance) {
                                    chooseTableChannel(a0[bA].tableID);
                                    break
                                }
                            }
                        }
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var bt = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    bt.check()
                }, 1000)
            }
        }
    };
    var aM = function(bt) {
        return function() {
            if (!quickBetGoodRoad.checkChooseTableEnableClick(bt)) {
                return
            }
            chooseTableChannel(bt)
        }
    };
    chooseTableChannel = function(bu) {
        var bt = a0[bu].tableSupportGame;
        if (bt == TableSupportGameType.SicBo.value || bt == TableSupportGameType.FishPrawnCrab.value) {
            location.href = PageConfig.playerSingleSicPage + "?dm=" + PageConfig.dealerDomain + "&t=" + bu + "&title=" + PageConfig.title;
            return false
        }
        s();
        bc(bu);
        postAjax({
            url: "/casino/sexy/player/query/chooseSingleTableChannel.php",
            data: {
                queryTableID: bu
            },
            success: function(bv) {
                if (bv == null || bv.status != "200") {
                    return
                }
                a7(bu)
            }
        })
    }
    ;
    var e = function() {
        if (!JCache.get("#maintenanceDiv").is(":visible")) {
            bo();
            JCache.get("#maintenanceDiv").fadeIn()
        }
    };
    var ar = function() {
        if (JCache.get("#maintenanceDiv").is(":visible")) {
            JCache.get("#maintenanceDiv").fadeOut()
        }
    };
    var aI = function() {
        for (var bt = 0, bv = br[0].userTxns.length; bt < bv; bt++) {
            var bu = CurrentBetColumnType.getInstance(bt);
            if (CurrentBetColumnType.PlayerInsurance1 == bu || CurrentBetColumnType.BankerInsurance1 == bu || CurrentBetColumnType.PlayerInsurance2 == bu || CurrentBetColumnType.BankerInsurance2 == bu) {
                br[0].userTxns[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxns[bt].dom.removeClass("win").addClass("no_win")
            } else {
                if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bt].maxBetRound) {
                    br[0].userTxns[bt].betBox.removeClass("win").addClass("no_win");
                    br[0].userTxns[bt].dom.removeClass("win").addClass("no_win")
                } else {
                    br[0].userTxns[bt].betBox.removeClass("win no_win");
                    br[0].userTxns[bt].dom.removeClass("win no_win")
                }
            }
        }
        for (var bt = 0, bv = br[0].userTxnsLongHu.length; bt < bv; bt++) {
            if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bt].maxBetRound) {
                br[0].userTxnsLongHu[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxnsLongHu[bt].dom.removeClass("win").addClass("no_win")
            } else {
                br[0].userTxnsLongHu[bt].betBox.removeClass("win no_win");
                br[0].userTxnsLongHu[bt].dom.removeClass("win no_win")
            }
        }
        if (br[0].currentTable.newGameStart) {
            return
        }
        JCache.get("#betZone").removeClass("stop_bet");
        br[0].currentTable.newGameStart = true;
        br[0].currentTable.calcWinnerStake = false;
        br[0].currentTable.winnerAnimation = false;
        for (var bt = 0, bv = br[0].userTxns.length; bt < bv; bt++) {
            if (br[0].userTxns[bt].domUl.css("opacity") == 0) {
                br[0].userTxns[bt].domUl.css({
                    top: br[0].userTxns[bt].topOrig,
                    left: br[0].userTxns[bt].leftOrig,
                    opacity: 1
                })
            }
            br[0].userTxns[bt].win = true;
            br[0].userTxns[bt].moveDealer = true
        }
        for (var bt = 0, bv = br[0].userTxnsLongHu.length; bt < bv; bt++) {
            if (br[0].userTxnsLongHu[bt].domUl.css("opacity") == 0) {
                br[0].userTxnsLongHu[bt].domUl.css({
                    top: br[0].userTxnsLongHu[bt].topOrig,
                    left: br[0].userTxnsLongHu[bt].leftOrig,
                    opacity: 1
                })
            }
            br[0].userTxnsLongHu[bt].win = true;
            br[0].userTxnsLongHu[bt].moveDealer = true
        }
        for (var bt = 0, bv = br[0].pokerCards.length; bt < bv; bt++) {
            br[0].pokerCards[bt].unique = PokerCardType.NONE.value;
            br[0].pokerCards[bt].handValue = PokerCardType.NONE.handValue;
            br[0].pokerCards[bt].cardPoint = PokerCardType.NONE.cardPoint;
            br[0].pokerCards[bt].className = PokerCardType.NONE.className;
            br[0].pokerCards[bt].domAnimeCard.children().eq(1).css("backface-visibility", "hidden");
            br[0].pokerCards[bt].domHand.html(0);
            br[0].pokerCards[bt].domAnimeCard.removeClass();
            br[0].pokerCards[bt].change = false
        }
        JCache.get("#player3rdCardAnime").css("display", "none");
        JCache.get("#banker3rdCardAnime").css("display", "none")
    };
    var b = function(bw, bv) {
        JCache.get("#betZone").addClass("stop_bet");
        aE(0);
        a9 = bv;
        if (bv) {
            br[0].currentTable.newGameStart = false
        }
        br[0].currentTable.calcWinnerStake = false;
        br[0].currentTable.winnerAnimation = false;
        for (var bt = 0, bu = br[0].userTxns.length; bt < bu; bt++) {
            if (br[0].userTxns[bt].domUl.css("opacity") == 0) {
                br[0].userTxns[bt].domUl.css({
                    top: br[0].userTxns[bt].topOrig,
                    left: br[0].userTxns[bt].leftOrig,
                    opacity: 1
                })
            }
            br[0].userTxns[bt].win = true;
            br[0].userTxns[bt].moveDealer = true;
            br[0].userTxns[bt].repeatStake = 0;
            if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bt].maxBetRound) {
                br[0].userTxns[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxns[bt].dom.removeClass("win").addClass("no_win")
            } else {
                br[0].userTxns[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxns[bt].dom.removeClass("win").addClass("no_win")
            }
        }
        for (var bt = 0, bu = br[0].userTxnsLongHu.length; bt < bu; bt++) {
            if (br[0].userTxnsLongHu[bt].domUl.css("opacity") == 0) {
                br[0].userTxnsLongHu[bt].domUl.css({
                    top: br[0].userTxnsLongHu[bt].topOrig,
                    left: br[0].userTxnsLongHu[bt].leftOrig,
                    opacity: 1
                })
            }
            br[0].userTxnsLongHu[bt].win = true;
            br[0].userTxnsLongHu[bt].moveDealer = true;
            br[0].userTxnsLongHu[bt].repeatStake = 0;
            if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bt].maxBetRound) {
                br[0].userTxnsLongHu[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxnsLongHu[bt].dom.removeClass("win").addClass("no_win")
            } else {
                br[0].userTxnsLongHu[bt].betBox.removeClass("win").addClass("no_win");
                br[0].userTxnsLongHu[bt].dom.removeClass("win").addClass("no_win")
            }
        }
        aS();
        az();
        if (bv) {
            y(bw)
        }
        if (br[0].winnerType.winnerPlayer) {
            br[0].winnerType.winnerPlayer = false;
            JCache.get("#gameWinnerPlayer").removeClass("win")
        }
        if (br[0].winnerType.winnerBanker) {
            br[0].winnerType.winnerBanker = false;
            JCache.get("#gameWinnerBanker").removeClass("win")
        }
    };
    var be = function(bD, bF) {
        JCache.get("#betZone").addClass("stop_bet");
        br[0].currentTable.newGameStart = false;
        y(bD);
        if (!br[0].currentTable.calcWinnerStake) {
            br[0].currentTable.calcWinnerStake = true;
            var bB = true;
            var bC = 0;
            var bI = 0;
            if (a0[bF.tableID].tableSupportGame == TableSupportGameType.Baccarat.value) {
                var bA = SoundsType.getInstance(PageConfig.languageResourceKey);
                var bt = GameWinnerType.getInstance(DealerEventUtil.getWinnerBaccarat({
                    winner: bF.winner,
                    tableCards: bF.tableCards
                }));
                switch (bt) {
                case GameWinnerType.BANKER:
                    br[0].userTxns[CategoryType.Banker.value].win = false;
                    br[0].userTxns[CategoryType.Banker.value].moveDealer = false;
                    if (br[0].enableInsurance) {
                        var bv = bF.tableCards;
                        var bz = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Banker1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Banker2ndCard.value]).handValue) % 10;
                        var bE = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Player1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Player2ndCard.value]).handValue) % 10;
                        var bK = OddsUtil.playerInsurance1stOdds(bE, bz);
                        var bJ = OddsUtil.playerInsurance2ndOdds(MathUtil.decimal.add(bE, PokerCardType.getInstance(bv[PokerCardIndexType.Player3rdCard.value]).handValue) % 10, bz);
                        br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.subtract(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, br[0].userTxns[CategoryType.PlayerInsurance2.value].stake);
                        if (bK > 0) {
                            br[0].userTxns[CategoryType.PlayerInsurance1.value].win = false;
                            if (br[0].userTxns[CategoryType.PlayerInsurance1.value].stake > 0) {
                                bB = false;
                                br[0].userTxns[CategoryType.PlayerInsurance1.value].moveDealer = false;
                                br[0].userTxns[CategoryType.PlayerInsurance2.value].moveDealer = false;
                                bC = MathUtil.decimal.add(MathUtil.decimal.multiply(bK, br[0].userTxns[CategoryType.PlayerInsurance1.value].stake));
                                bI = MathUtil.decimal.add(bI, bC);
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, bI);
                                br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, bC)
                            }
                        }
                        if (bJ > 0) {
                            br[0].userTxns[CategoryType.PlayerInsurance1.value].win = false;
                            if (br[0].userTxns[CategoryType.PlayerInsurance2.value].stake > 0) {
                                bB = false;
                                br[0].userTxns[CategoryType.PlayerInsurance1.value].moveDealer = false;
                                br[0].userTxns[CategoryType.PlayerInsurance2.value].moveDealer = false;
                                bC = MathUtil.decimal.add(MathUtil.decimal.multiply(bJ, br[0].userTxns[CategoryType.PlayerInsurance2.value].stake));
                                bI = MathUtil.decimal.add(bI, bC);
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake, bI);
                                br[0].userTxns[CategoryType.PlayerInsurance2.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake, bC);
                                br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, br[0].userTxns[CategoryType.PlayerInsurance2.value].stake)
                            }
                        }
                    }
                    if (br[0].userTxns[CategoryType.Banker.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Banker.value].stake, br[0].randomPayOdds[CategoryType.Banker.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Banker.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Banker.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Banker.value].stake, bC)
                    }
                    var bG = Math.abs(bF.bankerHandValue - bF.playerHandValue);
                    if ((bF.bankerHandValue == 8 || bF.bankerHandValue == 9) && br[0].pokerCards[PokerCardIndexType.Banker3rdCard.value].unique == PokerCardType.NONE.value) {
                        br[0].userTxns[CategoryType.BankerBonus.value].win = false;
                        br[0].userTxns[CategoryType.BankerBonus.value].moveDealer = false;
                        if (br[0].userTxns[CategoryType.BankerBonus.value].stake > 0) {
                            bB = false;
                            bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.BankerBonus.value].stake, 1);
                            bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerBonus.value].stake, bI);
                            bI = MathUtil.decimal.add(bI, bC);
                            br[0].userTxns[CategoryType.BankerBonus.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerBonus.value].stake, bC)
                        }
                    } else {
                        if (bG >= 4) {
                            br[0].userTxns[CategoryType.BankerBonus.value].win = false;
                            br[0].userTxns[CategoryType.BankerBonus.value].moveDealer = false;
                            if (br[0].userTxns[CategoryType.BankerBonus.value].stake > 0) {
                                bB = false;
                                bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.BankerBonus.value].stake, OddsUtil.bounsOdds(bG));
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerBonus.value].stake, bI);
                                bI = MathUtil.decimal.add(bI, bC);
                                br[0].userTxns[CategoryType.BankerBonus.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerBonus.value].stake, bC)
                            }
                        }
                    }
                    A(bA["banker_has_" + bF.bankerHandValue], bA["player_has_" + bF.playerHandValue], bA[bt.lowName]);
                    break;
                case GameWinnerType.PLAYER:
                    br[0].userTxns[CategoryType.Player.value].win = false;
                    br[0].userTxns[CategoryType.Player.value].moveDealer = false;
                    if (br[0].enableInsurance) {
                        var bv = bF.tableCards;
                        var bz = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Banker1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Banker2ndCard.value]).handValue) % 10;
                        var bE = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Player1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Player2ndCard.value]).handValue) % 10;
                        var by = OddsUtil.bankerInsurance1stOdds(bE, bz);
                        var bw = OddsUtil.bankerInsurance2ndOdds(MathUtil.decimal.add(bE, PokerCardType.getInstance(bv[PokerCardIndexType.Player3rdCard.value]).handValue) % 10, bz);
                        br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.subtract(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, br[0].userTxns[CategoryType.BankerInsurance2.value].stake);
                        if (by > 0) {
                            br[0].userTxns[CategoryType.BankerInsurance1.value].win = false;
                            if (br[0].userTxns[CategoryType.BankerInsurance1.value].stake > 0) {
                                bB = false;
                                br[0].userTxns[CategoryType.BankerInsurance1.value].moveDealer = false;
                                br[0].userTxns[CategoryType.BankerInsurance2.value].moveDealer = false;
                                bC = MathUtil.decimal.add(MathUtil.decimal.multiply(by, br[0].userTxns[CategoryType.BankerInsurance1.value].stake));
                                bI = MathUtil.decimal.add(bI, bC);
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, bI);
                                br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, bC)
                            }
                        }
                        if (bw > 0) {
                            br[0].userTxns[CategoryType.BankerInsurance1.value].win = false;
                            if (br[0].userTxns[CategoryType.BankerInsurance2.value].stake > 0) {
                                bB = false;
                                br[0].userTxns[CategoryType.BankerInsurance1.value].moveDealer = false;
                                br[0].userTxns[CategoryType.BankerInsurance2.value].moveDealer = false;
                                bC = MathUtil.decimal.add(MathUtil.decimal.multiply(bw, br[0].userTxns[CategoryType.BankerInsurance2.value].stake));
                                bI = MathUtil.decimal.add(bI, bC);
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance2.value].stake, bI);
                                br[0].userTxns[CategoryType.BankerInsurance2.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance2.value].stake, bC);
                                br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, br[0].userTxns[CategoryType.BankerInsurance2.value].stake)
                            }
                        }
                    }
                    if (br[0].userTxns[CategoryType.Player.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Player.value].stake, br[0].randomPayOdds[CategoryType.Player.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Player.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Player.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Player.value].stake, bC)
                    }
                    var bG = Math.abs(bF.bankerHandValue - bF.playerHandValue);
                    if ((bF.playerHandValue == 8 || bF.playerHandValue == 9) && br[0].pokerCards[PokerCardIndexType.Player3rdCard.value].unique == PokerCardType.NONE.value) {
                        br[0].userTxns[CategoryType.PlayerBonus.value].win = false;
                        br[0].userTxns[CategoryType.PlayerBonus.value].moveDealer = false;
                        if (br[0].userTxns[CategoryType.PlayerBonus.value].stake > 0) {
                            bB = false;
                            bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.PlayerBonus.value].stake, 1);
                            bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerBonus.value].stake, bI);
                            bI = MathUtil.decimal.add(bI, bC);
                            br[0].userTxns[CategoryType.PlayerBonus.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerBonus.value].stake, bC)
                        }
                    } else {
                        if (bG >= 4) {
                            br[0].userTxns[CategoryType.PlayerBonus.value].win = false;
                            br[0].userTxns[CategoryType.PlayerBonus.value].moveDealer = false;
                            if (br[0].userTxns[CategoryType.PlayerBonus.value].stake > 0) {
                                bB = false;
                                bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.PlayerBonus.value].stake, OddsUtil.bounsOdds(bG));
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerBonus.value].stake, bI);
                                bI = MathUtil.decimal.add(bI, bC);
                                br[0].userTxns[CategoryType.PlayerBonus.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerBonus.value].stake, bC)
                            }
                        }
                    }
                    A(bA["banker_has_" + bF.bankerHandValue], bA["player_has_" + bF.playerHandValue], bA[bt.lowName]);
                    break;
                case GameWinnerType.TIE:
                    if (br[0].userTxns[CategoryType.Banker.value].stake > 0) {
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Banker.value].stake, bI)
                    }
                    if (br[0].userTxns[CategoryType.Player.value].stake > 0) {
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Player.value].stake, bI)
                    }
                    if (br[0].userTxns[CategoryType.Tie.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Tie.value].stake, br[0].randomPayOdds[CategoryType.Tie.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Tie.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Tie.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Tie.value].stake, bC)
                    }
                    if (br[0].enableInsurance && bF.bankerHandValue == 0 && bF.bankerHandValue == 0) {
                        var bv = bF.tableCards;
                        var bz = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Banker1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Banker2ndCard.value]).handValue) % 10;
                        var bE = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Player1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Player2ndCard.value]).handValue) % 10;
                        var by = OddsUtil.bankerInsurance1stOdds(bE, bz);
                        var bw = OddsUtil.bankerInsurance2ndOdds(MathUtil.decimal.add(bE, PokerCardType.getInstance(bv[PokerCardIndexType.Player3rdCard.value]).handValue) % 10, bz);
                        br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.subtract(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, br[0].userTxns[CategoryType.BankerInsurance2.value].stake);
                        if (by > 0) {
                            if (br[0].userTxns[CategoryType.BankerInsurance1.value].stake > 0) {
                                bI = MathUtil.decimal.add(bI, br[0].userTxns[CategoryType.BankerInsurance1.value].stake)
                            }
                        }
                        if (bw > 0) {
                            br[0].userTxns[CategoryType.BankerInsurance1.value].win = false;
                            if (br[0].userTxns[CategoryType.BankerInsurance2.value].stake > 0) {
                                bB = false;
                                bC = MathUtil.decimal.add(MathUtil.decimal.multiply(bw, br[0].userTxns[CategoryType.BankerInsurance2.value].stake));
                                bI = MathUtil.decimal.add(bI, bC);
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance2.value].stake, bI);
                                br[0].userTxns[CategoryType.BankerInsurance2.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance2.value].stake, bC);
                                br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, br[0].userTxns[CategoryType.BankerInsurance2.value].stake)
                            }
                        }
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, bI)
                    }
                    if (br[0].enableInsurance && bF.bankerHandValue == 9 && bF.bankerHandValue == 9) {
                        var bv = bF.tableCards;
                        var bz = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Banker1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Banker2ndCard.value]).handValue) % 10;
                        var bE = MathUtil.decimal.add(PokerCardType.getInstance(bv[PokerCardIndexType.Player1stCard.value]).handValue, PokerCardType.getInstance(bv[PokerCardIndexType.Player2ndCard.value]).handValue) % 10;
                        var bK = OddsUtil.playerInsurance1stOdds(bE, bz);
                        var bJ = OddsUtil.playerInsurance2ndOdds(MathUtil.decimal.add(bE, PokerCardType.getInstance(bv[PokerCardIndexType.Player3rdCard.value]).handValue) % 10, bz);
                        br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.subtract(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, br[0].userTxns[CategoryType.PlayerInsurance2.value].stake);
                        if (bK > 0) {
                            if (br[0].userTxns[CategoryType.PlayerInsurance1.value].stake > 0) {
                                bI = MathUtil.decimal.add(bI, br[0].userTxns[CategoryType.PlayerInsurance1.value].stake)
                            }
                        }
                        if (bJ > 0) {
                            br[0].userTxns[CategoryType.PlayerInsurance1.value].win = false;
                            if (br[0].userTxns[CategoryType.PlayerInsurance2.value].stake > 0) {
                                bB = false;
                                bC = MathUtil.decimal.add(MathUtil.decimal.multiply(bJ, br[0].userTxns[CategoryType.PlayerInsurance2.value].stake));
                                bI = MathUtil.decimal.add(bI, bC);
                                bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake, bI);
                                br[0].userTxns[CategoryType.PlayerInsurance2.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake, bC);
                                br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, br[0].userTxns[CategoryType.PlayerInsurance2.value].stake)
                            }
                        }
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, bI)
                    }
                    br[0].userTxns[CategoryType.Tie.value].win = false;
                    br[0].userTxns[CategoryType.Banker.value].moveDealer = false;
                    br[0].userTxns[CategoryType.Player.value].moveDealer = false;
                    br[0].userTxns[CategoryType.Tie.value].moveDealer = false;
                    br[0].userTxns[CategoryType.PlayerInsurance1.value].moveDealer = false;
                    br[0].userTxns[CategoryType.PlayerInsurance2.value].moveDealer = false;
                    br[0].userTxns[CategoryType.BankerInsurance1.value].moveDealer = false;
                    br[0].userTxns[CategoryType.BankerInsurance2.value].moveDealer = false;
                    if ((bF.bankerHandValue == 8 || bF.bankerHandValue == 9) && br[0].pokerCards[PokerCardIndexType.Banker3rdCard.value].unique == PokerCardType.NONE.value) {
                        if (br[0].userTxns[CategoryType.BankerBonus.value].stake > 0) {
                            bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerBonus.value].stake, bI)
                        }
                        br[0].userTxns[CategoryType.BankerBonus.value].moveDealer = false
                    }
                    if ((bF.playerHandValue == 8 || bF.playerHandValue == 9) && br[0].pokerCards[PokerCardIndexType.Player3rdCard.value].unique == PokerCardType.NONE.value) {
                        if (br[0].userTxns[CategoryType.PlayerBonus.value].stake > 0) {
                            bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerBonus.value].stake, bI)
                        }
                        br[0].userTxns[CategoryType.PlayerBonus.value].moveDealer = false
                    }
                    A(bA["banker_has_" + bF.bankerHandValue], bA["player_has_" + bF.playerHandValue], bA[bt.lowName]);
                    break;
                default:
                    break
                }
                var bL = GamePairStateType.getInstance(bF.pairState);
                switch (bL) {
                case GamePairStateType.BANKER:
                    br[0].userTxns[CategoryType.BankerPair.value].win = false;
                    br[0].userTxns[CategoryType.BankerPair.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.BankerPair.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.BankerPair.value].stake, br[0].randomPayOdds[CategoryType.BankerPair.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerPair.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.BankerPair.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerPair.value].stake, bC)
                    }
                    br[0].userTxns[CategoryType.Turtle.value].win = false;
                    br[0].userTxns[CategoryType.Turtle.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.Turtle.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Turtle.value].stake, br[0].randomPayOdds[CategoryType.Turtle.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Turtle.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Turtle.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Turtle.value].stake, bC)
                    }
                    break;
                case GamePairStateType.PLAYER:
                    br[0].userTxns[CategoryType.PlayerPair.value].win = false;
                    br[0].userTxns[CategoryType.PlayerPair.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.PlayerPair.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.PlayerPair.value].stake, br[0].randomPayOdds[CategoryType.PlayerPair.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerPair.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.PlayerPair.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerPair.value].stake, bC)
                    }
                    br[0].userTxns[CategoryType.Turtle.value].win = false;
                    br[0].userTxns[CategoryType.Turtle.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.Turtle.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Turtle.value].stake, br[0].randomPayOdds[CategoryType.Turtle.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Turtle.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Turtle.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Turtle.value].stake, bC)
                    }
                    break;
                case GamePairStateType.BOTH:
                    br[0].userTxns[CategoryType.BankerPair.value].win = false;
                    br[0].userTxns[CategoryType.BankerPair.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.BankerPair.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.BankerPair.value].stake, br[0].randomPayOdds[CategoryType.BankerPair.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerPair.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.BankerPair.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerPair.value].stake, bC)
                    }
                    br[0].userTxns[CategoryType.PlayerPair.value].win = false;
                    br[0].userTxns[CategoryType.PlayerPair.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.PlayerPair.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.PlayerPair.value].stake, br[0].randomPayOdds[CategoryType.PlayerPair.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerPair.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.PlayerPair.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerPair.value].stake, bC)
                    }
                    br[0].userTxns[CategoryType.Turtle.value].win = false;
                    br[0].userTxns[CategoryType.Turtle.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.Turtle.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Turtle.value].stake, br[0].randomPayOdds[CategoryType.Turtle.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Turtle.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Turtle.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Turtle.value].stake, bC)
                    }
                    break;
                default:
                    break
                }
                if ((br[0].pokerCards[PokerCardIndexType.Banker1stCard.value].className == br[0].pokerCards[PokerCardIndexType.Banker2ndCard.value].className) || (br[0].pokerCards[PokerCardIndexType.Player1stCard.value].className == br[0].pokerCards[PokerCardIndexType.Player2ndCard.value].className)) {
                    br[0].userTxns[CategoryType.Phoenix.value].win = false;
                    br[0].userTxns[CategoryType.Phoenix.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.Phoenix.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Phoenix.value].stake, br[0].randomPayOdds[CategoryType.Phoenix.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Phoenix.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Phoenix.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Phoenix.value].stake, bC)
                    }
                }
                if (br[0].pokerCards[PokerCardIndexType.Banker3rdCard.value].unique == PokerCardType.NONE.value && br[0].pokerCards[PokerCardIndexType.Player3rdCard.value].unique == PokerCardType.NONE.value) {
                    br[0].userTxns[CategoryType.Small.value].win = false;
                    br[0].userTxns[CategoryType.Small.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.Small.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Small.value].stake, br[0].randomPayOdds[CategoryType.Small.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Small.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Small.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Small.value].stake, bC)
                    }
                } else {
                    br[0].userTxns[CategoryType.Big.value].win = false;
                    br[0].userTxns[CategoryType.Big.value].moveDealer = false;
                    if (br[0].userTxns[CategoryType.Big.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxns[CategoryType.Big.value].stake, br[0].randomPayOdds[CategoryType.Big.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxns[CategoryType.Big.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxns[CategoryType.Big.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.Big.value].stake, bC)
                    }
                }
            } else {
                var bA = LongHuSoundsType.getInstance(PageConfig.languageResourceKey);
                var bt = GameWinnerLongHuType.getInstance(DealerEventUtil.getWinnerLongHu({
                    winner: bF.winner,
                    tableCards: bF.tableCards
                }));
                switch (bt) {
                case GameWinnerLongHuType.TIGER:
                    br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].win = false;
                    br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].moveDealer = false;
                    if (br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake, br[0].randomPayOddsLongHu[LongHuCategoryType.Tiger.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake = MathUtil.decimal.add(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake, bC)
                    }
                    A(bA["dragon_has_" + bF.playerHandValue], bA["tiger_has_" + bF.bankerHandValue], bA[bt.lowName]);
                    break;
                case GameWinnerLongHuType.DRAGON:
                    br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].win = false;
                    br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].moveDealer = false;
                    if (br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake, br[0].randomPayOddsLongHu[LongHuCategoryType.Dragon.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake = MathUtil.decimal.add(br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake, bC)
                    }
                    A(bA["dragon_has_" + bF.playerHandValue], bA["tiger_has_" + bF.bankerHandValue], bA[bt.lowName]);
                    break;
                case GameWinnerLongHuType.TIE:
                    if (br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake > 0) {
                        bI = MathUtil.decimal.add(MathUtil.decimal.divide(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake, 2), bI);
                        br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake = MathUtil.decimal.divide(br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].stake, 2)
                    }
                    if (br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake > 0) {
                        bI = MathUtil.decimal.add(MathUtil.decimal.divide(br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake, 2), bI);
                        br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake = MathUtil.decimal.divide(br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].stake, 2)
                    }
                    if (br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].stake > 0) {
                        bB = false;
                        bC = OddsUtil.CalcWinStake(br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].stake, br[0].randomPayOddsLongHu[LongHuCategoryType.Tie.value].odds);
                        bI = MathUtil.decimal.add(br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].stake, bI);
                        bI = MathUtil.decimal.add(bI, bC);
                        br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].stake = MathUtil.decimal.add(br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].stake, bC)
                    }
                    br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].win = false;
                    br[0].userTxnsLongHu[LongHuCategoryType.Tiger.value].moveDealer = false;
                    br[0].userTxnsLongHu[LongHuCategoryType.Dragon.value].moveDealer = false;
                    br[0].userTxnsLongHu[LongHuCategoryType.Tie.value].moveDealer = false;
                    A(bA["dragon_has_" + bF.playerHandValue], bA["tiger_has_" + bF.bankerHandValue], bA[bt.lowName]);
                    break;
                default:
                    break
                }
            }
            if (!bB && bI > 0) {
                ad(CurrencyUtil.format(bI, 2));
                af()
            }
            aS();
            az();
            for (var bx = 0, bu = br[0].userTxns.length; bx < bu; bx++) {
                if (br[0].userTxns[bx].domUl.css("opacity") == 1) {
                    if (br[0].userTxns[bx].moveDealer) {
                        br[0].userTxns[bx].domUl.css({
                            top: br[0].userTxns[bx].topWin,
                            left: br[0].userTxns[bx].leftWin
                        });
                        br[0].userTxns[bx].domUl.animate({
                            opacity: 0
                        }, 500)
                    } else {
                        br[0].userTxns[bx].domUl.css({
                            top: br[0].userTxns[bx].topLoss,
                            left: br[0].userTxns[bx].leftLoss
                        });
                        br[0].userTxns[bx].domUl.animate({
                            opacity: 0
                        }, 500)
                    }
                }
                if (br[0].userTxns[bx].win) {
                    br[0].userTxns[bx].betBox.removeClass("win").addClass("no_win");
                    br[0].userTxns[bx].dom.removeClass("win").addClass("no_win")
                } else {
                    if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bx].maxBetRound) {
                        br[0].userTxns[bx].betBox.removeClass("win").addClass("no_win");
                        br[0].userTxns[bx].dom.removeClass("win").addClass("no_win")
                    } else {
                        br[0].userTxns[bx].betBox.removeClass("no_win").addClass("win");
                        br[0].userTxns[bx].dom.removeClass("no_win").addClass("win")
                    }
                }
            }
            for (var bx = 0, bu = br[0].userTxnsLongHu.length; bx < bu; bx++) {
                if (br[0].userTxnsLongHu[bx].domUl.css("opacity") == 1) {
                    if (br[0].userTxnsLongHu[bx].moveDealer) {
                        br[0].userTxnsLongHu[bx].domUl.css({
                            top: br[0].userTxnsLongHu[bx].topWin,
                            left: br[0].userTxnsLongHu[bx].leftWin
                        });
                        br[0].userTxnsLongHu[bx].domUl.animate({
                            opacity: 0
                        }, 500)
                    } else {
                        br[0].userTxnsLongHu[bx].domUl.css({
                            top: br[0].userTxnsLongHu[bx].topLoss,
                            left: br[0].userTxnsLongHu[bx].leftLoss
                        });
                        br[0].userTxnsLongHu[bx].domUl.animate({
                            opacity: 0
                        }, 500)
                    }
                }
                if (br[0].userTxnsLongHu[bx].win) {
                    br[0].userTxnsLongHu[bx].betBox.removeClass("win").addClass("no_win");
                    br[0].userTxnsLongHu[bx].dom.removeClass("win").addClass("no_win")
                } else {
                    if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bx].maxBetRound) {
                        br[0].userTxnsLongHu[bx].betBox.removeClass("win").addClass("no_win");
                        br[0].userTxnsLongHu[bx].dom.removeClass("win").addClass("no_win")
                    } else {
                        br[0].userTxnsLongHu[bx].betBox.removeClass("no_win").addClass("win");
                        br[0].userTxnsLongHu[bx].dom.removeClass("no_win").addClass("win")
                    }
                }
            }
        }
        var bH = false;
        for (var bx = 0, bu = br[0].userTxns.length; bx < bu; bx++) {
            if (!br[0].userTxns[bx].win) {
                if (br[0].currentTable.currentGameRound > br[0].currentBetColumns[bx].maxBetRound) {
                    if (!bH && br[0].currentBetColumns[bx].maxBetRound <= 0) {
                        bH = true
                    }
                }
            }
        }
        for (var bx = 0, bu = br[0].userTxnsLongHu.length; bx < bu; bx++) {
            if (!br[0].userTxnsLongHu[bx].win) {
                if (br[0].currentTable.currentGameRound > br[0].currentBetColumnsLongHu[bx].maxBetRound) {
                    if (!bH && br[0].currentBetColumnsLongHu[bx].maxBetRound <= 0) {
                        bH = true
                    }
                }
            }
        }
        if (!bH && !br[0].currentTable.winnerAnimation && br[0].currentTable.calcWinnerStake) {
            br[0].currentTable.winnerAnimation = true;
            w()
        }
    };
    var s = function() {
        dealerEventStampTime = 0;
        b("", true);
        br[0].dealerEventStampTime = 0;
        br[0].currentTable.calcWinnerStake = false;
        br[0].currentTable.winnerAnimation = false;
        br[0].currentTable.dealerName = "";
        JCache.get("#dealerName").html("--");
        JCache.get("#currentGA").html("&nbsp;");
        JCache.get("#currentShoeRound").html("&nbsp;");
        JCache.get("#minBet").html("&nbsp;&nbsp;");
        JCache.get("#maxBet").html("&nbsp;&nbsp;");
        JCache.get("#goodRoad").removeClass().html("");
        JCache.get("#phoenixInfoBox").fadeOut();
        JCache.get("#turtleInfoBox").fadeOut();
        JCache.get("#bonusInfoBox").fadeOut();
        JCache.get("#betLimitBox").fadeOut();
        for (var bu = 0, bv = br[0].userTxns.length; bu < bv; bu++) {
            br[0].userTxns[bu].stake = 0;
            br[0].userTxns[bu].origStake = 0;
            br[0].userTxns[bu].addStake = 0;
            br[0].userTxns[bu].repeatStake = 0;
            br[0].userTxns[bu].lastAddStake = 0;
            br[0].userTxns[bu].minBet = 0;
            br[0].userTxns[bu].maxBet = 0;
            br[0].userTxns[bu].redraw = true;
            if (br[0].userTxns[bu].domUl.css("opacity") == 0) {
                br[0].userTxns[bu].domUl.css("top", br[0].userTxns[bu].topOrig);
                br[0].userTxns[bu].domUl.css("left", br[0].userTxns[bu].leftOrig);
                br[0].userTxns[bu].domUl.css("opacity", 1)
            }
            br[0].userTxns[bu].win = true;
            br[0].userTxns[bu].moveDealer = true;
            br[0].userTxns[bu].betBox.removeClass("win no_win").addClass("no_win");
            br[0].userTxns[bu].dom.removeClass("win no_win").addClass("no_win")
        }
        for (var bu = 0, bv = br[0].userTxnsLongHu.length; bu < bv; bu++) {
            br[0].userTxnsLongHu[bu].stake = 0;
            br[0].userTxnsLongHu[bu].origStake = 0;
            br[0].userTxnsLongHu[bu].addStake = 0;
            br[0].userTxnsLongHu[bu].repeatStake = 0;
            br[0].userTxnsLongHu[bu].lastAddStake = 0;
            br[0].userTxnsLongHu[bu].minBet = 0;
            br[0].userTxnsLongHu[bu].maxBet = 0;
            br[0].userTxnsLongHu[bu].redraw = true;
            if (br[0].userTxnsLongHu[bu].domUl.css("opacity") == 0) {
                br[0].userTxnsLongHu[bu].domUl.css("top", br[0].userTxnsLongHu[bu].topOrig);
                br[0].userTxnsLongHu[bu].domUl.css("left", br[0].userTxnsLongHu[bu].leftOrig);
                br[0].userTxnsLongHu[bu].domUl.css("opacity", 1)
            }
            br[0].userTxnsLongHu[bu].win = true;
            br[0].userTxnsLongHu[bu].moveDealer = true;
            br[0].userTxnsLongHu[bu].betBox.removeClass("win no_win").addClass("no_win");
            br[0].userTxnsLongHu[bu].dom.removeClass("win no_win").addClass("no_win")
        }
        var bt = (PageConfig.dealerDomain == 0);
        for (var bu = 0, bv = br[0].currentBetColumns.length - 1; bu < bv; bu++) {
            br[0].currentBetColumns[bu].currentBet = 0;
            br[0].currentBetColumns[bu].maxBetRound = 0;
            br[0].currentBetColumns[bu].dom.html("0.0");
            br[0].currentBetColumns[bu].rateDom.html(bt ? "0" : "0%")
        }
        for (var bu = 0, bv = br[0].currentBetColumnsLongHu.length - 1; bu < bv; bu++) {
            br[0].currentBetColumnsLongHu[bu].currentBet = 0;
            br[0].currentBetColumnsLongHu[bu].maxBetRound = 0;
            br[0].currentBetColumnsLongHu[bu].dom.html("0.0");
            br[0].currentBetColumnsLongHu[bu].rateDom.html(bt ? "0" : "0%")
        }
        br[0].currentBetColumns[CurrentBetColumnType.Total.value].rateDom.html("0");
        JCache.get("#playerTotalCurrentBet").html("0");
        br[0].randomPayOdds[CurrentBetColumnType.BankerPair.value].odds = "11";
        br[0].randomPayOdds[CurrentBetColumnType.PlayerPair.value].odds = "11";
        for (var bu = 0, bv = br[0].pokerCards.length; bu < bv; bu++) {
            br[0].pokerCards[bu].unique = PokerCardType.NONE.value;
            br[0].pokerCards[bu].handValue = PokerCardType.NONE.handValue;
            br[0].pokerCards[bu].cardPoint = PokerCardType.NONE.cardPoint;
            br[0].pokerCards[bu].className = PokerCardType.NONE.className;
            br[0].pokerCards[bu].domCard.removeClass().addClass(br[0].pokerCards[bu].className);
            br[0].pokerCards[bu].domHand.html(0);
            br[0].pokerCards[bu].change = false
        }
        br[0].winnerType.value = GameWinnerType.EMPTY.value;
        if (br[0].winnerType.winnerPlayer) {
            br[0].winnerType.winnerPlayer = false;
            JCache.get("#gameWinnerPlayer").removeClass("win")
        }
        if (br[0].winnerType.winnerBanker) {
            br[0].winnerType.winnerBanker = false;
            JCache.get("#gameWinnerBanker").removeClass("win")
        }
        br[0].winnerType.displayCss = GameWinnerType.EMPTY.displayCss;
        JCache.get("#gameWinnerType").removeClass().addClass(br[0].winnerType.displayCss).html("");
        for (var bu = 0; bu < br[0].pokerCards.length; bu++) {
            br[0].pokerCards[bu].domAnimeCard.removeClass();
            br[0].pokerCards[bu].domAnimeCard.children().eq(1).css("backface-visibility", "hidden")
        }
        if (ac) {
            clearTimeout(ac)
        }
        aO();
        a2()
    };
    var C = function() {
        if (JCache.get("#insBetConfirm").hasClass("no_work")) {
            return
        }
        if (!br[0].startInsurance) {
            ay(I18N.get("msg.error.bet.raceIsNotOpen"));
            return
        }
        var bt = 0;
        var bx = JCache.get("#insBetAmount").val().replace(/,/g, "").trim();
        if (bx != "" && !MathUtil.isInteger(bx)) {
            JCache.get("#insBetAmount").val("");
            ay(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
            return
        }
        if (bx != "" && br[0].insuranceChipBet > 0) {
            return
        } else {
            if (bx != "") {
                bt = Number(bx)
            } else {
                if (br[0].insuranceChipBet > 0) {
                    bt = br[0].insuranceChipBet
                } else {
                    return
                }
            }
        }
        JCache.get("#insBetAmount").val("");
        JCache.get("#insBetConfirm").addClass("no_work");
        JCache.get("#insBetCancel").addClass("no_work");
        br[0].insuranceChipBet = 0;
        var bu = Number(br[0].insBetLimit);
        if (Number(bt) > Number(bu)) {
            ay(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
            return
        }
        var bz = PageConfig.userBetLimitID;
        if (aH.containsKey(br[0].currentTable.currentTableID)) {
            bz = aH.get(br[0].currentTable.currentTableID)
        }
        var by = br[0].insuranceType;
        var bw = [];
        var bv = {};
        bv.categoryIdx = by.value;
        bv.categoryName = by.name;
        bv.stake = bt;
        bw[0] = bv;
        postAjax({
            url: "/casino/sexy/player/update/addMyTransaction.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: br[0].currentTable.currentTableID,
                gameShoe: br[0].currentTable.currentGameShoe,
                gameRound: br[0].currentTable.currentGameRound,
                data: JSON.stringify(bw),
                betLimitID: bz,
                f: "-1",
                c: "A"
            },
            success: function(bA) {
                aC(bA, bv, by, bt, br[0].currentTable.currentTableID);
                parent.leftx.get_credit();
            },
            error: function(bA) {
                ay(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"))
            },
            headers: {
                "Cache-Control": "no-store"
            }
        })
    };
    var ae = function(bC, by) {
        if (!br[0].confirmReady) {
            return
        }
        br[0].confirmReady = false;
        var bA = 0;
        var bu = [];
        var bw = "";
        for (var bz = 0, bt = bC.length; bz < bt; bz++) {
            if (bC[bz] && br[0].userTxns[bz].addStake > 0) {
                var bx = br[0].userTxns[bz].stake + br[0].userTxns[bz].addStake;
                if (bx < br[0].userTxns[bz].minBet) {
                    bw += I18N.get("msg.error.betTxns.minBets") + br[0].userTxns[bz].minBet + "<br />"
                } else {
                    var bv = {};
                    bv.categoryIdx = bz;
                    bv.categoryName = br[0].userTxns[bz].name;
                    bv.stake = br[0].userTxns[bz].addStake;
                    bu[bA++] = bv
                }
            }
        }
        if (bu.length == 0 && bw) {
            v(bw)
        }
        if (bu.length > 0) {
            var bB = PageConfig.userBetLimitID;
            if (aH.containsKey(br[0].currentTable.currentTableID)) {
                bB = aH.get(br[0].currentTable.currentTableID)
            }
            postAjax({
                url: "/casino/sexy/player/update/addMyTransaction.php",
                data: {
                    domainType: PageConfig.dealerDomain,
                    tableID: br[0].currentTable.currentTableID,
                    gameShoe: br[0].currentTable.currentGameShoe,
                    gameRound: br[0].currentTable.currentGameRound,
                    data: JSON.stringify(bu),
                    betLimitID: bB,
                    f: "-1",
                    c: by
                },
                success: function(bD) {
                    aQ(bD, br[0].currentTable.currentTableID);
                    parent.leftx.get_credit();
                },
                error: function(bD) {
                    v(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
                    br[0].confirmReady = true
                },
                headers: {
                    "Cache-Control": "no-store"
                }
            })
        } else {
            br[0].confirmReady = true
        }
    };
    var bh = function(bC, by) {
        if (!br[0].confirmLongHuReady) {
            return
        }
        br[0].confirmLongHuReady = false;
        var bA = 0;
        var bu = [];
        var bw = "";
        for (var bz = 0, bt = bC.length; bz < bt; bz++) {
            if (bC[bz] && br[0].userTxnsLongHu[bz].addStake > 0) {
                var bx = br[0].userTxnsLongHu[bz].stake + br[0].userTxnsLongHu[bz].addStake;
                if (bx < br[0].userTxnsLongHu[bz].minBet) {
                    bw += I18N.get("msg.error.betTxns.minBets") + br[0].userTxnsLongHu[bz].minBet + "<br />"
                } else {
                    var bv = {};
                    bv.categoryIdx = bz;
                    bv.categoryName = br[0].userTxnsLongHu[bz].name;
                    bv.stake = br[0].userTxnsLongHu[bz].addStake;
                    bu[bA++] = bv
                }
            }
        }
        if (bu.length == 0 && bw) {
            v(bw)
        }
        if (bu.length > 0) {
            var bB = PageConfig.userBetLimitID;
            if (aH.containsKey(br[0].currentTable.currentTableID)) {
                bB = aH.get(br[0].currentTable.currentTableID)
            }
            postAjax({
                url: "/casino/sexy/player/update/addLongHuTransaction.php",
                data: {
                    domainType: PageConfig.dealerDomain,
                    tableID: br[0].currentTable.currentTableID,
                    gameShoe: br[0].currentTable.currentGameShoe,
                    gameRound: br[0].currentTable.currentGameRound,
                    data: JSON.stringify(bu),
                    betLimitID: bB,
                    f: "-1",
                    c: by
                },
                success: function(bD) {
                    M(bD, br[0].currentTable.currentTableID);
                    parent.leftx.get_credit();
                },
                error: function(bD) {
                    v(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
                    br[0].confirmLongHuReady = true
                },
                headers: {
                    "Cache-Control": "no-store"
                }
            })
        } else {
            br[0].confirmLongHuReady = true
        }
    };
    var aQ = function(bw, bz) {
        if (bw == null || bw.status != 200) {
            if (bw != null && ("msg.error.info.insufficientBalance" == bw.message || "msg.error.bet.raceIsNotOpen" == bw.message || "msg.error.validation.betLimit.empty" == bw.message || "msg.error.info.reachMaxWinLimit" == bw.message) || "msg.error.connectionTimeout" == bw.message) {
                v(I18N.get(bw.message));
                br[0].confirmReady = true;
                return
            }
            v(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
            br[0].confirmReady = true;
            return
        }
        var bv = "";
        var bB = false;
        for (var by = 0, bu = br[0].userTxns.length; by < bu; by++) {
            br[0].userTxns[by].repeatStake = 0;
            br[0].userTxns[by].lastAddStake = br[0].userTxns[by].stake
        }
        var bx = $j.parseJSON(bw.message);
        var bt = $j.Event("updateBalance");
        bt.balance = bx.balance;
        JCache.get("#userBalance").trigger(bt);
        if (!$j.isEmptyObject(bx.txns) && bx.txns.length > 0) {
            $j.each(bx.txns, function(bC, bD) {
                if (bD.success) {
                    bB = true;
                    bv = I18N.get("msg.error.betTxns.betsPlacedSuccessfully");
                    br[0].userTxns[bD.categoryIdx].stake = bD.stake;
                    br[0].userTxns[bD.categoryIdx].addStake = 0;
                    br[0].userTxns[bD.categoryIdx].lastAddStake = br[0].userTxns[bD.categoryIdx].stake;
                    br[0].userTxns[bD.categoryIdx].redraw = true;
                    if (bD.categoryIdx == CategoryType.Banker.value || bD.categoryIdx == CategoryType.Player.value || bD.categoryIdx == CategoryType.Tie.value) {
                        quickBetTxn.addStakeSyncQuickBet(bz, bD.categoryIdx, bD.stake)
                    }
                } else {
                    if (!bB) {
                        bv = I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully")
                    }
                }
            });
            var bA = 0;
            for (var by = 0, bu = br[0].userTxns.length; by < bu; by++) {
                bA = MathUtil.decimal.add(bA, br[0].userTxns[by].stake)
            }
            JCache.get("#playerTotalCurrentBet").html(CurrencyUtil.format(bA));
            aO();
            quickBetTxn.redrawSetQuickBet(bz);
            if (bB) {
                ba(bv)
            } else {
                v(bv)
            }
        } else {
            v(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"))
        }
        br[0].confirmReady = true
    };
    var M = function(bw, bz) {
        if (bw == null || bw.status != 200) {
            if (bw != null && ("msg.error.info.insufficientBalance" == bw.message || "msg.error.bet.raceIsNotOpen" == bw.message || "msg.error.validation.betLimit.empty" == bw.message || "msg.error.info.reachMaxWinLimit" == bw.message || "msg.error.connectionTimeout" == bw.message)) {
                v(I18N.get(bw.message));
                br[0].confirmLongHuReady = true;
                return
            }
            v(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
            br[0].confirmLongHuReady = true;
            return
        }
        var bv = "";
        var bB = false;
        for (var by = 0, bu = br[0].userTxnsLongHu.length; by < bu; by++) {
            br[0].userTxnsLongHu[by].repeatStake = 0;
            br[0].userTxnsLongHu[by].lastAddStake = br[0].userTxnsLongHu[by].stake
        }
        var bx = $j.parseJSON(bw.message);
        var bt = $j.Event("updateBalance");
        bt.balance = bx.balance;
        JCache.get("#userBalance").trigger(bt);
        if (!$j.isEmptyObject(bx.txns) && bx.txns.length > 0) {
            $j.each(bx.txns, function(bC, bD) {
                if (bD.success) {
                    bB = true;
                    bv = I18N.get("msg.error.betTxns.betsPlacedSuccessfully");
                    br[0].userTxnsLongHu[bD.categoryIdx].stake = bD.stake;
                    br[0].userTxnsLongHu[bD.categoryIdx].addStake = 0;
                    br[0].userTxnsLongHu[bD.categoryIdx].lastAddStake = br[0].userTxnsLongHu[bD.categoryIdx].stake;
                    br[0].userTxnsLongHu[bD.categoryIdx].redraw = true;
                    if (bD.categoryIdx == LongHuCategoryType.Tiger.value || bD.categoryIdx == LongHuCategoryType.Dragon.value || bD.categoryIdx == LongHuCategoryType.Tie.value) {
                        quickBetTxn.addStakeSyncQuickBet(bz, bD.categoryIdx, bD.stake)
                    }
                } else {
                    if (!bB) {
                        bv = I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully")
                    }
                }
            });
            var bA = 0;
            for (var by = 0, bu = br[0].userTxnsLongHu.length; by < bu; by++) {
                bA = MathUtil.decimal.add(bA, br[0].userTxnsLongHu[by].stake)
            }
            JCache.get("#playerTotalCurrentBet").html(CurrencyUtil.format(bA));
            a2();
            quickBetTxn.redrawSetQuickBet(bz);
            if (bB) {
                ba(bv)
            } else {
                v(bv)
            }
        } else {
            v(idx, I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"))
        }
        br[0].confirmLongHuReady = true
    };
    var aC = function(bw, bv, bB, bu, bz) {
        if (bw.status == "200") {
            q(I18N.get("msg.error.betTxns.betsPlacedSuccessfully"));
            var bx, bD;
            switch (bB) {
            case CategoryType.BankerInsurance1:
                bx = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Banker.value].stake, br[0].bankerIns.odds1) - br[0].userTxns[CategoryType.BankerInsurance1.value].stake - bu);
                bD = br[0].bankerIns.odds1;
                break;
            case CategoryType.PlayerInsurance1:
                bx = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Player.value].stake, br[0].playerIns.odds1) - br[0].userTxns[CategoryType.PlayerInsurance1.value].stake - bu);
                bD = br[0].playerIns.odds1;
                break;
            case CategoryType.BankerInsurance2:
                var bC = br[0].userTxns[CategoryType.BankerInsurance1.value].stake - br[0].userTxns[CategoryType.BankerInsurance2.value].stake;
                bx = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Banker.value].stake - MathUtil.decimal.multiply(bC, br[0].bankerIns.odds1) - MathUtil.decimal.multiply(br[0].userTxns[CategoryType.BankerInsurance2.value].stake + bu, br[0].bankerIns.odds2), br[0].bankerIns.odds2));
                bD = br[0].bankerIns.odds2;
                break;
            case CategoryType.PlayerInsurance2:
                var bC = br[0].userTxns[CategoryType.PlayerInsurance1.value].stake - br[0].userTxns[CategoryType.PlayerInsurance2.value].stake;
                bx = Math.floor(MathUtil.decimal.divide(br[0].userTxns[CategoryType.Player.value].stake - MathUtil.decimal.multiply(bC, br[0].playerIns.odds1) - MathUtil.decimal.multiply(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake + bu, br[0].playerIns.odds2), br[0].playerIns.odds2));
                bD = br[0].playerIns.odds2;
                break;
            default:
                ay(I18N.get(bw.message));
                break
            }
            o(bx, bD);
            JCache.get("#insPayout").html("--");
            var bA = 0;
            for (var by = 0, bt = br[0].userTxns.length; by < bt; by++) {
                if (by == CategoryType.BankerInsurance2.value || by == CategoryType.PlayerInsurance2.value) {
                    continue
                }
                bA = MathUtil.decimal.add(bA, br[0].userTxns[by].stake)
            }
            JCache.get("#playerTotalCurrentBet").html(CurrencyUtil.format(MathUtil.decimal.add(bA, bu)));
            if (bB == CategoryType.BankerInsurance1 || bB == CategoryType.BankerInsurance2) {
                br[0].userTxns[CategoryType.BankerInsurance1.value].repeatStake = 0;
                br[0].userTxns[CategoryType.BankerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance1.value].stake, bv.stake);
                if (bB == CategoryType.BankerInsurance2) {
                    br[0].userTxns[CategoryType.BankerInsurance2.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.BankerInsurance2.value].stake, bv.stake)
                }
                br[0].userTxns[CategoryType.BankerInsurance1.value].lastAddStake = br[0].userTxns[bB.value].stake;
                br[0].userTxns[CategoryType.BankerInsurance1.value].redraw = true
            }
            if (bB == CategoryType.PlayerInsurance1 || bB == CategoryType.PlayerInsurance2) {
                br[0].userTxns[CategoryType.PlayerInsurance1.value].repeatStake = 0;
                br[0].userTxns[CategoryType.PlayerInsurance1.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance1.value].stake, bv.stake);
                if (bB == CategoryType.PlayerInsurance2) {
                    br[0].userTxns[CategoryType.PlayerInsurance2.value].stake = MathUtil.decimal.add(br[0].userTxns[CategoryType.PlayerInsurance2.value].stake, bv.stake)
                }
                br[0].userTxns[CategoryType.PlayerInsurance1.value].lastAddStake = br[0].userTxns[bB.value].stake;
                br[0].userTxns[CategoryType.PlayerInsurance1.value].redraw = true
            }
            aO()
        } else {
            ay(I18N.get(bw.message))
        }
    };
    var aB = {
        userChipsSetting: [],
        init: function() {
            var bC = this;
            var bE = CurrencyType.getInstance(PageConfig.currencyId);
            var bB = $j(document.createDocumentFragment());
            for (var bD in ChipType.getAllChipType()) {
                var bu = ChipType.getInstance(bD);
                if (bu.amount >= bE.minChip && bu.amount <= bE.maxChip) {
                    var by = JCache.clone("#templateLiChips");
                    var bw = $j(by).children().eq(0).children().eq(0);
                    bw.prop("id", bu.value).prop("class", bu.className).addClass(bu.lotWord).data("amount", bu.amount).html(bu.showAmount);
                    bB.append(by)
                }
            }
            var bF = JCache.get("#setChipsUl");
            bF.empty();
            bF.append(bB);
            if (CurrencyType.US == bE) {
                JCache.get("#chipsAmountUnit").css("display", "none")
            }
            JCache.get("#currencyTypeUnit").text(bE.unit);
            JCache.get("#chipsSetBtn").bind("click", function() {
                JCache.get("#setChips").fadeIn()
            });
            JCache.get("#chipsCancelBtn").bind("click", function() {
                JCache.get("#setChips").fadeOut()
            });
            JCache.get("#chipsSubmitBtn").bind("click", function() {
                if (bC.userChipsSetting.length != PageSetting.chipSettingLimit.value) {
                    v(I18N.get("form.text.chips.selectChips1") + " " + PageSetting.chipSettingLimit.value + " " + I18N.get("form.text.chips.selectChips2"));
                    return
                }
                var bI = bC.userChipsSetting.map(function(bR) {
                    return bR.className
                }).indexOf(ChipType.Chips_Custom.className);
                var bQ = PageConfig.userCustomChip;
                if (bI != -1) {
                    var bL = bC.userChipsSetting[bI];
                    var bN = bL.amount;
                    var bJ = bL.customAmount;
                    if (bE.minChip > bN || bE.maxChip < bN) {
                        v("[" + I18N.get("msg.error.chips.minChips") + "]:" + bE.minChip + ", [" + I18N.get("msg.error.chips.maxChips") + "]:" + bE.maxChip);
                        return
                    }
                    bQ = bJ;
                    PageConfig.userCustomChip = bN
                } else {
                    bQ = JCache.get("#customChipSetting").val()
                }
                bC.userChipsSetting.sort(function(bS, bR) {
                    if (bS.amount > bR.amount) {
                        return 1
                    }
                    if (bS.amount < bR.amount) {
                        return -1
                    }
                    return 0
                });
                var bK = [];
                var bP = JCache.get("#chips").children();
                var bM = 0;
                for (var bO in bC.userChipsSetting) {
                    var bH = bC.userChipsSetting[bO];
                    bP.eq(bO).removeClass().addClass(bH.className + " " + bH.lotWord).unbind("click").bind("click", K(bO));
                    bP.eq(bO).children().eq(0).text(bH.showAmount);
                    bq[bO] = {
                        dom: bP.eq(bO),
                        className: bH.className,
                        amount: bH.amount,
                    };
                    bK[bM++] = bH.value
                }
                l = {};
                JCache.get("#setChips").fadeOut();
                postAjax({
                    url: "/player/update/setUserChips",
                    data: {
                        chips: JSON.stringify(bK),
                        customChip: bQ
                    },
                    success: function(bR) {}
                });
                bl(1)
            });
            JCache.get("#setChipsUl").children().bind("click", function() {
                var bI = $j(this).children().eq(0).children().eq(0).prop("id");
                var bH = ChipType.getInstance(bI);
                var bJ = {
                    value: bH.value,
                    className: bH.className,
                    amount: bH.amount,
                    customAmount: MathUtil.decimal.divide(bH.amount, bE.unit),
                    showAmount: bH.showAmount,
                    lotWord: bH.lotWord,
                };
                bC.addUserChipSetting(bJ, $j(this))
            });
            JCache.get("#userChip").bind("click", function() {
                var bI = $j("#customChipSetting").val();
                var bJ = MathUtil.decimal.multiply(bI, bE.unit);
                if (!bJ) {
                    return
                }
                var bH = CurrencyUtil.showAmount(bJ);
                var bK = {
                    value: ChipType.Chips_Custom.value,
                    className: ChipType.Chips_Custom.className,
                    amount: bJ,
                    customAmount: bI,
                    showAmount: CurrencyUtil.showAmount(bJ),
                    lotWord: bH.length > 3 ? "lot_word" : ""
                };
                bC.addUserChipSetting(bK, JCache.get("#userSet"))
            });
            JCache.get("#customChipSetting").bind("keyup", function() {
                var bL = $j(this);
                bL.val(StringUtil.replaceOnlyNumber(bL.val()));
                var bK = MathUtil.decimal.multiply(bL.val(), bE.unit);
                var bI = bL.val();
                var bH = CurrencyUtil.showAmount(bK);
                if (bH.toString().length > 4) {
                    bL.val(bL.val().substr(0, bL.val().length - 1));
                    return
                } else {
                    if (bH.toString().length == 4) {
                        JCache.get("#customChipShowAmount").css("font-size", "20px")
                    } else {
                        JCache.get("#customChipShowAmount").css("font-size", "23px")
                    }
                }
                JCache.get("#customChipShowAmount").text(bH);
                var bJ = bC.userChipsSetting.map(function(bM) {
                    return bM.className
                }).indexOf(ChipType.Chips_Custom.className);
                if (bJ >= 0) {
                    bC.userChipsSetting[bJ].showAmount = bH;
                    bC.userChipsSetting[bJ].amount = bK;
                    bC.userChipsSetting[bJ].customAmount = bI;
                    bC.userChipsSetting[bJ].lotWord = bH.length > 3 ? "lot_word" : ""
                }
            });
            if (PageConfig.userSelectChips) {
                var bF = [];
                var bG = JSON.parse(PageConfig.userSelectChips);
                var bA = PageConfig.userCustomChip;
                if (bA == 0) {
                    bA = bE.minChip
                }
                var bz = CurrencyUtil.showAmount(bA);
                JCache.get("#customChipSetting").val(MathUtil.decimal.divide(bA, bE.unit));
                JCache.get("#customChipShowAmount").text(bz);
                for (var bx in bG) {
                    var bv = bG[bx];
                    var bu = ChipType.getInstance(bv);
                    var bt = {};
                    bt.value = bu.value;
                    bt.className = bu.className;
                    if (bv == ChipType.Chips_Custom.value) {
                        bt.amount = parseInt(bA),
                        bt.showAmount = bz,
                        bt.lotWord = bz.length > 3 ? "lot_word" : ""
                    } else {
                        bt.amount = bu.amount;
                        bt.showAmount = bu.showAmount;
                        bt.lotWord = bu.lotWord
                    }
                    bF[bx] = bt
                }
                bF.sort(function(bI, bH) {
                    if (bI.amount > bH.amount) {
                        return 1
                    }
                    if (bI.amount < bH.amount) {
                        return -1
                    }
                    return 0
                });
                this.addDefaultUserChipSetting(bF)
            }
        },
        addUserChipSetting: function(bv, bu) {
            var bt = this.userChipsSetting.map(function(bw) {
                return bw.className
            }).indexOf(bv.className);
            if (bt == -1) {
                if (this.userChipsSetting.length < PageSetting.chipSettingLimit.value) {
                    this.userChipsSetting.push(bv);
                    bu.addClass("select")
                }
            } else {
                this.userChipsSetting.splice(bt, 1);
                bu.removeClass("select")
            }
        },
        addDefaultUserChipSetting: function(bu) {
            var bw = JCache.get("#chips").children();
            for (var bt in bu) {
                var bv = bu[bt].value == ChipType.Chips_Custom.value ? "customChipShowAmount" : bu[bt].value;
                $j("p[id='" + bv + "']").parent().parent().click();
                bw.eq(bt).removeClass().addClass(bu[bt].className + " " + bu[bt].lotWord).unbind("click").bind("click", K(bt));
                bw.eq(bt).children().eq(0).text(bu[bt].showAmount);
                bq[bt] = {
                    dom: bw.eq(bt),
                    className: bu[bt].className,
                    amount: bu[bt].amount,
                }
            }
            l = {};
            if (bu.length >= 2) {
                bl(1)
            }
        }
    };
    var a1 = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            videoCanvas.check();
            this.check();
            TaskExecuter.execute()
        },
        check: function() {
            var bt = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    bt.check()
                }, 1000)
            }
        }
    };
    videoCanvas = {
        streamA: null,
        mapping: null,
        playerObj: null,
        streamingPrefix: null,
        streamingSuffix: null,
        maxSeekSec: [6, 6, 6, 6],
        retry: 0,
        line: 0,
        checkReadyStateID: null,
        preload: function() {
            this.playerObj = new HLSJSAPI.Class({
                seekType: "rate",
                maxBufferedChk: 10,
                maxReadyChk: 10,
                maxSeekSec: this.maxSeekSec[this.line],
                maxBufferOverChk: 2,
                maxCurrentChk: 2,
                defaultMuted: true,
                useNativePlayer: false
            })
        },
        init: function() {
            this.streamA = new StreamA();
            this.mapping = DealerDomainTableMapping.getInstance(PageConfig.dealerDomain);
            this.streamingPrefix = this.mapping.prefix;
            this.streamingSuffix = this.mapping.suffixWeb;
            this.line = this.getNewLine();
            this.play(this.line, PageConfig.currentSingleTableId)
        },
        setEnableVideo: function() {},
        changeEnableVideo: function(bt) {},
        play: function(bu, bv) {
            if (this.playerObj == null) {
                return
            }
            this.stop();
            var bt = "https://" + this.streamingPrefix[bu] + this.mapping["w" + bv][bu] + this.streamingSuffix[bu];
            this.load(bt);
            this.checkReadyState();
            if (this.line == 1) {
                var bw = this.playerObj;
                setTimeout(function() {
                    bw.Pause();
                    setTimeout(function() {
                        bw.Resume()
                    }, 1000)
                }, 1000)
            }
            this.streamA.send({
                project: "BACCARATMX",
                streamname: this.mapping["w" + bv][bu],
                cdn: this.streamingPrefix[bu],
                uid: PageConfig.userID,
                player: "WEB"
            });
            this.line = bu;
            JCache.get("#changeLine").html(this.line + 1)
        },
        load: function(bt) {
            this.playerObj.InitConnect("video", bt, this.maxSeekSec[this.line]);
            this.checkStreamingAudio()
        },
        stop: function() {
            this.streamA.stop()
        },
        changeStreamingAudioMute: function() {
            PageConfig.streamingAudio = "0";
            PlayerSettingUtil.changeStreamingAudio(PageConfig.streamingAudio);
            JCache.get("#streamingAudio").removeClass().addClass("switch_off");
            this.playerObj.Mute()
        },
        changeStreamingAudiounMute: function() {
            PageConfig.streamingAudio = "1";
            PlayerSettingUtil.changeStreamingAudio(PageConfig.streamingAudio);
            JCache.get("#streamingAudio").removeClass().addClass("switch_on");
            this.playerObj.unMute()
        },
        checkStreamingAudio: function() {
            if (PageConfig.streamingAudio == "1") {
                this.changeStreamingAudiounMute()
            } else {
                this.changeStreamingAudioMute()
            }
        },
        changeStreamingAudio: function() {
            if (PageConfig.streamingAudio == "1") {
                this.changeStreamingAudioMute()
            } else {
                this.changeStreamingAudiounMute()
            }
        },
        changeLine: function() {
            if (this.streamingPrefix.length == 1) {
                return
            }
            var bu = this.line;
            for (var bt = 0; bt < this.streamingPrefix.length; bt++) {
                bu = bu + 1;
                if (bu >= this.streamingPrefix.length) {
                    bu = 0
                }
                if (1 == PageConfig.lineStatusJson[bu]) {
                    break
                }
            }
            this.line = bu;
            this.play(this.line, br[0].currentTable.currentTableID)
        },
        getNewLine: function() {
            var bu = 0;
            for (var bt = 0; bt < this.streamingPrefix.length; bt++) {
                if (1 == PageConfig.lineStatusJson[bt]) {
                    bu = bt;
                    break
                }
            }
            return bu
        },
        currentLine: function() {
            return this.line
        },
        checkReadyState: function() {
            if (!this.streamAlive() && this.retry < 5) {
                JCache.get("#video").css("z-index", "-1");
                JCache.get("#loading").css("display", "");
                this.checkReadyStateID = setTimeout(function() {
                    videoCanvas.checkReadyState()
                }, 500)
            } else {
                JCache.get("#video").css("z-index", "");
                JCache.get("#loading").css("display", "none")
            }
        },
        streamAlive: function() {
            var bt = this.playerObj.Player.readyState;
            if (bt >= 2) {
                return true
            }
            return false
        },
        resume: function() {
            JCache.get("#video").css("display", "");
            JCache.get("div.video_box").removeClass("no_video");
            this.retry = 0;
            this.play(this.line, br[0].currentTable.currentTableID)
        },
        check: function() {
            if (this.playerObj == null) {
                return
            }
            if (0 == PageConfig.lineStatusJson[this.line]) {
                this.changeLine();
                return
            }
            if (this.playerObj.errDetails != "") {
                JCache.get("#video").css("display", "none");
                if (this.retry < 5) {
                    this.retry++;
                    this.changeLine()
                } else {
                    JCache.get("div#loading").css("display", "none");
                    JCache.get("div.video_box").addClass("no_video")
                }
            } else {
                if (!JCache.get("#video").is(":visible")) {
                    JCache.get("#video").css("display", "")
                }
            }
        }
    };
    var t = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryBalanceV3.php",
                    data: {
                        dm: PageConfig.dealerDomain
                    },
                    success: function(bu) {
                        if (bu == null || bu.status != "200") {
                            return
                        }
                        var bv = bu.message;
                        if (bu.systemMaintain == 1) {
                            location.href = PageConfig.playerMaintenancePage + "?dm=" + PageConfig.dealerDomain
                        }
                        var bt = $j.Event("updateBalance");
                        bt.balance = bu.balance;
                        JCache.get("#userBalance").trigger(bt);
                        if (PageConfig.lineStatus != bu.lineStatus) {
                            PageConfig.lineStatus = bu.lineStatus;
                            PageConfig.lineStatusJson = $j.parseJSON(bu.lineStatus)
                        }
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var bt = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    bt.check()
                }, 1000)
            }
        }
    };
    var am = function() {
        var bw = $j("#bigRoad");
        var bv = $j(document.createDocumentFragment());
        for (var bx = 0; bx < PageSetting.maxRoadHeight.value; bx++) {
            var bu = JCache.clone("#bigRoadTrTemplate").prop("id", "bigTr");
            for (var bt = 0; bt < PageSetting.maxRoadWidth.value; bt++) {
                bu.append(JCache.clone("#bigRoadTdTemplate").prop("id", "bigRoadTd_" + bt + "_" + bx))
            }
            bv.append(bu)
        }
        bw.append(bv)
    };
    var bm = function() {
        if (BackGroundMusic.MusicPlayList.length == 1) {
            BackGroundMusic.MusicPlayList = ArrayUtil.shuffle(aj.slice(0))
        }
        JCache.get("#soundBackGroundMusic").children("source").eq(0).prop("src", BackGroundMusic.MusicPlayList.pop());
        JCache.get("#soundBackGroundMusic").trigger("load");
        JCache.get("#soundBackGroundMusic").trigger("play")
    };
    singleTable4.chooseTableChannel = function(bt, bu) {
        aH.put(bt, bu);
        chooseTableChannel(bt)
    }
    ;
    singleTable4.hideTableList = function() {
        PageUtil.callGameTableListWebIframe("quickBetAllClose", {});
        JCache.get("#gameTableList").css("visibility", "hidden")
    }
    ;
    singleTable4.checkRoadGameRound = function(bt) {
        return quickBetGoodRoad.checkRoadGameRound(br[0].currentTable.currentGameRound, bt)
    }
    ;
    singleTable4.getInsuranceTableID = function() {
        return U
    }
    ;
    singleTable4.goodRoadHint = function(bu, bt) {
        if (bu != null) {
            JCache.get("#goodRoad").removeClass().addClass(bu.className).html(I18N.get("form.text.goodRoad." + a0[br[0].currentTable.currentTableID].tableSupportGameName + "." + bu.value) + bt)
        } else {
            JCache.get("#goodRoad").removeClass().html("")
        }
    }
    ;
    singleTable4.gameInfoMsgShuffle = function(bt) {
        if (bt == br[0].currentTable.currentTableID) {
            T(I18N.get("form.text.shuffling"))
        }
    }
    ;
    singleTable4.gameInfoMsgShuffleHide = function(bt) {
        if (bt == br[0].currentTable.currentTableID && !br[0].startInsurance) {
            a8()
        }
    }
    ;
    singleTable4.triggerMainRoad = function(bv, bw, bu, bt, bx) {
        quickBetGoodRoad.triggerMainRoad(bv, bw, bu, bt, bx)
    }
    ;
    singleTable4.triggerGoodRoadAdd = function(bv, bu, bt) {
        quickBetGoodRoad.triggerGoodRoadAdd(bv, bu, bt)
    }
    ;
    singleTable4.triggerGoodRoadDel = function(bv, bu, bt) {
        quickBetGoodRoad.triggerGoodRoadDel(bv, bu, bt)
    }
    ;
    singleTable4.triggerGoodRoadAllDel = function(bt) {
        quickBetGoodRoad.triggerGoodRoadAllDel(bt)
    }
    ;
    singleTable4.triggerMainRoadAnimeRight = function(bv, bu, bt) {
        quickBetGoodRoad.triggerMainRoadAnimeRight(bv, bu, bt)
    }
    ;
    singleTable4.triggerMainRoadAnimeLeft = function(bu, bt) {
        quickBetGoodRoad.triggerMainRoadAnimeLeft(bu, bt)
    }
    ;
    checkAddOrConfirmStake = function(bt) {
        var bv = PageConfig.userBetLimitID;
        if (aH.containsKey(bt)) {
            bv = aH.get(bt)
        }
        var bu = {};
        bu.amount = l.amount;
        bu.unconfirmSubmitStake = bs;
        bu.userBetLimitID = bv;
        return bu
    }
}
)();
