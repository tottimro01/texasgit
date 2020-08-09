if (typeof (singleSicTable) == "undefined") {
    singleSicTable = {}
}
(function() {
    var r = false;
    var aE = false;
    var ac;
    var aB = new Map();
    var bb = new Array(1);
    var aV = {};
    var aI = {};
    var ba = new Array(6);
    var p = {};
    var aW = [];
    var n = 0;
    var bc = 0;
    var a2 = true;
    var aH = 0;
    var aj = 0;
    var N = "";
    var l = [];
    var u = [];
    var a = 0;
    var am = 0;
    var ax = 0;
    var I = 0;
    var X = 0;
    var ar = 0;
    var bd = 0;
    var aY = {
        quality: "high",
        bgcolor: "#000000",
        allowFullScreen: "true",
        allowscriptaccess: "sameDomain",
        wmode: "opaque"
    };
    var aD = {
        id: "video",
        name: "video"
    };
    singleSicTable.init = function() {
        if (PageConfig.enableMexicoWebHls == "1") {
            au()
        } else {
            if (swfobject.getFlashPlayerVersion().major == 0) {
                return
            }
            ac = DealerDomainWebTableMapping.getInstance(PageConfig.dealerDomain);
            var be = {
                lang: "EN",
                user: PageConfig.dealerDomain + "_" + PageConfig.userId,
                country: PageConfig.userCountry,
                turl: "/StreamingToken/createToken",
                agentid: PageConfig.cafeId,
                table: ac["" + PageConfig.currentSingleTableId],
                mute: "1",
                volume: "50",
                scale: "1",
                line: PageConfig.streamingLine[0]
            };
            swfobject.embedSWF(PageConfig.dealerDomain == 0 ? "/flash/Bavet.swf" : "/flash/Baccarat.swf", "video", "680", "351", "18.3.0", "playerProductInstall.swf", be, aY, aD, function(bf) {
                if (bf.success) {
                    au()
                }
            })
        }
    }
    ;
    var au = function() {
        $j(window).resize(function() {
            ResizeUtil.doResize()
        });
        if (PageConfig.userBetLimitIDCache != null) {
            $j.each(PageConfig.userBetLimitIDCache, function(be, bf) {
                aB.put(Number(be), Number(bf))
            })
        }
        bb[0] = {};
        bb[0].dealerEventStampTime = 0;
        bb[0].maintenance = null;
        bb[0].cancel = $j("#cancel").bind("click", aJ());
        bb[0].cancelNoWork = true;
        bb[0].repeat = $j("#repeat").bind("click", M());
        bb[0].repeatNoWork = true;
        bb[0].confirm = $j("#confirm").bind("click", al(null));
        bb[0].confirmNoWork = true;
        bb[0].confirmReady = true;
        bb[0].currentTable = {};
        bb[0].currentTable.initCurrentTable = false;
        bb[0].currentTable.currentTableID = PageConfig.currentSingleTableId;
        bb[0].currentTable.currentGameShoe = -1;
        bb[0].currentTable.currentGameRound = -1;
        bb[0].currentTable.dealerName = "";
        bb[0].currentTable.newGameStart = false;
        bb[0].currentTable.calcWinnerStake = false;
        bb[0].currentTable.winnerAnimation = false;
        bb[0].countdownObj = {};
        bb[0].countdownObj.initCountdownTime = 40;
        bb[0].countdownObj.countdownTime = 40;
        bb[0].countdownObj.trigger = false;
        bb[0].countdownObj.needCountdown = true;
        bb[0].betLimits = {};
        ay.init();
        if (PageConfig.enableMexicoWebHls == "1") {
            videoCanvas.init()
        }
        aF();
        JCache.get("#userBalance").bind("updateBalance", a8);
        JCache.get("#gameMode").bind("click", function() {
            location.href = PageConfig.playerMultiPage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
        });
        $j("#roadSelect li").bind("click", function() {
            var bf = $j(this).prop("id").replace("Li", "CurrentTable");
            var bh = "";
            var bj = $j("#roadZone table");
            for (var bg = 0, bi = bj.length; bg < bi; bg++) {
                var be = bj[bg].id;
                bh = be.replace("CurrentTable", "Li");
                JCache.get("#" + bh).removeClass("now");
                JCache.get("#" + be).css("display", "none");
                if (bf == be) {
                    N = bh.replace("Li", "Position");
                    JCache.get("#" + bh).addClass("now");
                    JCache.get("#" + be).css("display", "block")
                }
            }
        });
        JCache.get("#currentBetBtnBac").removeClass("open close").addClass("open").bind("click", function() {
            if ($j(this).hasClass("open")) {
                $j(this).removeClass("open close").addClass("close");
                JCache.get("[name='currentBetTwoBac']").fadeIn()
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
            var be = PageUtil.callGameTableListWebIframe("resize", {});
            if (be != null) {
                if (PageConfig.addEventListenerReady == "0") {
                    if (be.addEventListener) {
                        be.addEventListener("blur", function() {
                            singleSicTable.hideTableList()
                        }, false)
                    } else {
                        if (be.attachEvent) {
                            be.attachEvent("blur", function() {
                                singleSicTable.hideTableList()
                            })
                        } else {
                            JCache.get("#gameTableList").bind("blur", function() {
                                singleSicTable.hideTableList()
                            })
                        }
                    }
                    PageConfig.addEventListenerReady = "1"
                }
                JCache.get("#gameTableList").css("visibility", "visible").focus()
            }
        });
        $j("#betRange").bind("click", function() {
            if (JCache.get("#betLimitBox").is(":visible")) {
                JCache.get("#betLimitBox").fadeOut()
            } else {
                JCache.get("#betLimitBox").fadeIn();
                aU()
            }
        });
        $j("#closeLimit").bind("click", function() {
            JCache.get("#betLimitBox").fadeOut()
        });
        $j("#zoomVideo").bind("click", function() {
            var be = $j(this).text();
            if (be == undefined || be == "") {
                be = bb[0].currentTable.currentTableID.toString()
            }
            if (StringUtil.startsWith(be, "z")) {
                be = be.substring(1);
                $j(this).removeClass("btnVideoZoomClose")
            } else {
                be = "z" + be;
                $j(this).addClass("btnVideoZoomClose")
            }
            $j(this).text(be);
            a1(be)
        });
        if (PageConfig.dealerDomain == 1 && PageConfig.enableBackgroundMusic == "1") {
            initialBackGroundMusics = BackGroundMusic.MusicPlayList.slice(0);
            BackGroundMusic.MusicPlayList = ArrayUtil.shuffle(BackGroundMusic.MusicPlayList);
            JCache.get("#soundBackGroundMusic").prop("muted", PageConfig.backgroundMusic == "1" ? 0 : 1);
            JCache.get("#soundBackGroundMusic").prop("volume", 1);
            JCache.get("#soundBackGroundMusic").children("source").eq(0).prop("src", BackGroundMusic.MusicPlayList.pop());
            JCache.get("#soundBackGroundMusic").trigger("load");
            JCache.get("#soundBackGroundMusic").trigger("play");
            JCache.get("#soundBackGroundMusic").bind("ended", function() {
                playEndedHandler()
            })
        }
        JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
        JCache.get("#streamingAudio").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.changeStreamingAudio()
            } else {
                ap()
            }
        });
        JCache.get("#resultSound").removeClass().addClass(PageConfig.resultSound == "1" ? "switch_on" : "switch_off");
        JCache.get("#resultSound").bind("click", function() {
            U()
        });
        JCache.get("#bettingSound").removeClass().addClass(PageConfig.bettingSound == "1" ? "switch_on" : "switch_off");
        JCache.get("#bettingSound").bind("click", function() {
            ao()
        });
        JCache.get("#backgroundMusic").removeClass().addClass(PageConfig.backgroundMusic == "1" ? "switch_on" : "switch_off");
        JCache.get("#backgroundMusic").bind("click", function() {
            aN()
        });
        JCache.get("#refreshBtn").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.resume()
            } else {
                aK()
            }
        });
        JCache.get("#changeLine").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.changeLine()
            } else {
                i()
            }
        })
    };
    var aF = function() {
        quickBetEvent.initTableItems(PageConfig.dealerDomain, PageConfig.currentSingleTableId);
        C();
        postAjax({
            url: "/casino/sexy/player/query/queryTableListInfoV2.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: bb[0].currentTable.currentTableID
            },
            success: function(bf) {
                if (bf == null || jQuery.isEmptyObject(bf)) {
                    return
                }
                for (var be = 0; be < bf.message.length; be++) {
                    var bg = bf.message[be];
                    aV[bg.tableID] = {};
                    aV[bg.tableID].tableID = bg.tableID;
                    aV[bg.tableID].maintenance = false;
                    aV[bg.tableID].tableSupportGame = bg.tableSupportGame;
                    aV[bg.tableID].origDealerID = "";
                    aV[bg.tableID].currDealerID = bg.dealerID
                }
                at();
                P();
                a7.check();
                v.check();
                b.check();
                y.check();
                aP.check();
                TaskExecuter.execute()
            }
        })
    };
    var P = function() {
        postAjax({
            url: "/casino/sexy/player/query/querySicActiveBetLimit.php",
            data: {
                domainType: PageConfig.dealerDomain
            },
            success: function(bi) {
                if (bi == null || bi.status != "200") {
                    return
                }
                var bh = $j(document.createDocumentFragment());
                var bj = JCache.clone("#templateLiBetLimit").prop("id", "");
                bh.append(bj);
                var bl = $j.parseJSON(bi.message);
                if (!$j.isEmptyObject(bl)) {
                    for (var bk = 0, bf = bl.length; bk < bf; bk++) {
                        var bm = bl[bk];
                        var be = bm.id;
                        bb[0].betLimits[be] = {};
                        bb[0].betLimits[be].id = be;
                        bb[0].betLimits[be].dom = JCache.clone("#templateLi").prop("id", "limitRange_" + be);
                        bb[0].betLimits[be].dom.bind("click", aR(be));
                        bb[0].betLimits[be].dom.html(CurrencyUtil.format(bm.minBet) + "-" + CurrencyUtil.format(bm.maxBet));
                        bh.append(bb[0].betLimits[be].dom)
                    }
                }
                var bj = JCache.clone("#templateLiSubmit").prop("id", "limitSubmit");
                bj.bind("click", function() {
                    x()
                });
                bh.append(bj);
                var bg = JCache.get("#betLimitSet");
                bg.empty();
                bg.append(bh)
            }
        })
    };
    var C = function() {
        var bu = $j("#bigRoad");
        var bi = $j(document.createDocumentFragment());
        for (var bp = 0; bp < PageSetting.maxRoadHeight.value; bp++) {
            var bf = JCache.clone("#bigRoadTrTemplate").prop("id", "bigTr");
            for (var bq = 0; bq < PageSetting.maxRoadWidth.value; bq++) {
                bf.append(JCache.clone("#bigRoadTdTemplate").prop("id", "bigRoadTd_" + bq + "_" + bp))
            }
            bi.append(bf)
        }
        bu.append(bi);
        var br = $j("#oddEvenRoadCurrentTable");
        var bm = $j(document.createDocumentFragment());
        var bs = $j("#bigSmallRoadCurrentTable");
        var bt = $j(document.createDocumentFragment());
        var bl = $j("#sumRoadCurrentTable");
        var bn = $j(document.createDocumentFragment());
        var be = $j("#diceRoadCurrentTable");
        var bk = $j(document.createDocumentFragment());
        for (var bp = 0; bp < PageSetting.maxRoadHeight.value; bp++) {
            var bh = JCache.clone("#roadTrTemplate").prop("id", "oddEvenRoadTr_" + bp);
            var bj = JCache.clone("#roadTrTemplate").prop("id", "bigSmallRoadTr_" + bp);
            var bo = JCache.clone("#roadTrTemplate").prop("id", "sumRoadTr_" + bp);
            var bg = JCache.clone("#roadTrTemplate").prop("id", "diceRoadTr_" + bp);
            for (var bq = 0; bq < PageSetting.maxRoadWidth.value; bq++) {
                bh.append(JCache.clone("#roadTdTemplate").prop("id", "oddEvenRoadTd_" + bq + "_" + bp).bind("resultPaint", RoadHandler.paintSicboOddEvenRoad));
                bj.append(JCache.clone("#roadTdTemplate").prop("id", "bigSmallRoadTd_" + bq + "_" + bp).bind("resultPaint", RoadHandler.paintSicboBigSmallRoad));
                bo.append(JCache.clone("#roadTdTemplate").prop("id", "sumRoadTd_" + bq + "_" + bp).bind("resultPaint", RoadHandler.paintSicboSumRoad));
                bg.append(JCache.clone("#roadTdTemplate").prop("id", "diceRoadTd_" + bq + "_" + bp).bind("resultPaint", RoadHandler.paintSicboDiceRoad))
            }
            bm.append(bh);
            bt.append(bj);
            bn.append(bo);
            bk.append(bg)
        }
        br.append(bm);
        bs.append(bt);
        bl.append(bn);
        be.append(bk);
        l.oddEvenRoadPosition = 0;
        l.bigSmallRoadPosition = 0;
        l.sumRoadPosition = 0;
        l.diceRoadPosition = 0;
        u.oddEvenRoadStampTime = 0;
        u.bigSmallRoadStampTime = 0;
        u.sumRoadStampTime = 0;
        u.diceRoadStampTime = 0;
        JCache.get("#roadRight").bind("click", function(bx, bw, bv) {
            bw = (bw == undefined) ? PageSetting.movePx.value : bw;
            bv = (bv == undefined) ? N : bv;
            if (l[bv] - bw > -2500) {
                $j("#" + bv + "Div").animate({
                    left: "-=" + bw + "px"
                });
                l[bv] = l[bv] - bw
            }
        });
        JCache.get("#roadLeft").bind("click", function(bw) {
            if (l[N] < 0) {
                var bv = (l[N] + PageSetting.movePx.value > 0) ? -1 * l[N] : PageSetting.movePx.value;
                $j("#" + N + "Div").animate({
                    left: "+=" + bv + "px"
                });
                l[N] = l[N] + bv
            }
        })
    };
    var at = function() {
        var bi = bb[0].currentTable.currentTableID;
        if (aV[bi].tableSupportGame == TableSupportGameType.SicBo.value) {
            aW = TableSupportGameType.SicBo.photoClass;
            JCache.get("#mainCSS").prop("href", "../CSS/sic_bo-web/sic_bo-web.css");
            JCache.get("#gameTitle").children().eq(0).text(I18N.get("form.text.sicbo"));
            JCache.get("#gameTitle").children().eq(1).text(I18N.get("form.text.table") + " " + bi);
            JCache.get("#warnOddEven").css("display", "");
            JCache.get("#BetOdd").css("display", "");
            JCache.get("#BetEven").css("display", "");
            JCache.get("#OddCurrentBet").css("display", "");
            JCache.get("#EvenCurrentBet").css("display", "");
            JCache.get("#oddEvenRoadLi").css("display", "");
            JCache.get("#bigSmallRoadLi").css("display", "");
            JCache.get("#sumRoadLi").css("display", "");
            JCache.get("#diceRoadLi").css("display", "");
            JCache.get("#range_title_oddEven").css("display", "");
            JCache.get("#range_oddEven").css("display", "");
            JCache.get("#oddEvenRoadLi").click()
        } else {
            if (aV[bi].tableSupportGame == TableSupportGameType.FishPrawnCrab.value) {
                aW = TableSupportGameType.FishPrawnCrab.photoClass;
                JCache.get("#mainCSS").prop("href", "/CSS/fish_prawn_crab-web/fish_prawn_crab-web.css");
                JCache.get("#gameTitle").children().eq(0).text(I18N.get("form.text.fishPrawnCrab"));
                JCache.get("#gameTitle").children().eq(1).text(I18N.get("form.text.table") + " " + bi);
                JCache.get("#warnOddEven").css("display", "none");
                JCache.get("#BetOdd").css("display", "none");
                JCache.get("#BetEven").css("display", "none");
                JCache.get("#OddCurrentBet").css("display", "none");
                JCache.get("#EvenCurrentBet").css("display", "none");
                JCache.get("#oddEvenRoadLi").css("display", "none");
                JCache.get("#bigSmallRoadLi").css("display", "");
                JCache.get("#sumRoadLi").css("display", "");
                JCache.get("#diceRoadLi").css("display", "");
                JCache.get("#range_title_oddEven").css("display", "none");
                JCache.get("#range_oddEven").css("display", "none");
                JCache.get("#bigSmallRoadLi").click()
            }
        }
        bb[0].userTxns = new Array(SicCategoryType.getLength());
        for (var bg = 0, bj = SicCategoryType.getLength(); bg < bj; bg++) {
            var bk = SicCategoryType.getInstance(bg);
            var bf = SicDrawBetBoxType.getInstance(bg);
            bb[0].userTxns[bg] = {};
            bb[0].userTxns[bg].redraw = true;
            bb[0].userTxns[bg].tableIdx = 0;
            bb[0].userTxns[bg].stake = 0;
            bb[0].userTxns[bg].origStake = 0;
            bb[0].userTxns[bg].addStake = 0;
            bb[0].userTxns[bg].repeatStake = 0;
            bb[0].userTxns[bg].lastAddStake = 0;
            bb[0].userTxns[bg].name = bk.name;
            bb[0].userTxns[bg].minBet = 0;
            bb[0].userTxns[bg].maxBet = 0;
            bb[0].userTxns[bg].betBox = $j("#" + bf.betBox);
            bb[0].userTxns[bg].betBoxUl = $j("#chip" + bf.betBox);
            bb[0].userTxns[bg].betBoxUl.empty();
            if (typeof (bf.diceDisplay.length) != "undefined") {
                for (var bh = 0, be = bf.diceDisplay.length; bh < be; bh++) {
                    if (be > 1) {
                        $j("#" + bf.betBox).children().eq(0).children().eq(bh).removeClass().addClass(aW[bf.diceDisplay[bh]])
                    } else {
                        $j("#" + bf.betBox).children().eq(0).removeClass().addClass(aW[bf.diceDisplay[bh]])
                    }
                }
            }
            JCache.get("#" + bf.betBox).removeClass("openZone")
        }
        JCache.get("#betDice").removeClass("modeOpen");
        JCache.get("#playerTotalCurrentBet").html(0)
    };
    var a8 = function(be) {
        if (n != be.balance) {
            n = be.balance;
            JCache.get("#userBalance").html(CurrencyUtil.parseToAmountFormat(be.balance, PageConfig.currencyName))
        }
    };
    var aa = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundBet").trigger("play")
        }
    };
    var L = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundButtonTap").trigger("play")
        }
    };
    var ah = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundCashIn").trigger("play")
        }
    };
    var B = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundSwitchChips").trigger("play")
        }
    };
    var ak = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundNoMoreBet").trigger("play")
        }
    };
    var an = function() {
        if (PageConfig.enableSoundEffect == "1" && PageConfig.bettingSound == "1") {
            JCache.get("#soundPlaceYourBet").trigger("play")
        }
    };
    chooseTableChannel = function(bf) {
        var be = aV[bf].tableSupportGame;
        if (be == TableSupportGameType.Baccarat.value || be == TableSupportGameType.DragonTiger.value) {
            location.href = PageConfig.playerSinglePage + "?dm=" + PageConfig.dealerDomain + "&t=" + bf + "&title=" + PageConfig.title;
            return false
        }
        a4(bf);
        postAjax({
            url: "/player/query/chooseSingleTableChannel",
            data: {
                queryTableID: bf
            },
            success: function(bg) {
                if (bg == null || bg.status != "200") {
                    return
                }
                a1(bf)
            }
        })
    }
    ;
    var e = function() {
        if (!JCache.get("#maintenanceDiv").is(":visible")) {
            JCache.get("#maintenanceDiv").fadeIn()
        }
    };
    var aq = function() {
        if (JCache.get("#maintenanceDiv").is(":visible")) {
            JCache.get("#maintenanceDiv").fadeOut()
        }
    };
    var aR = function(be) {
        return function() {
            k(be)
        }
    };
    var aU = function() {
        var bf = PageConfig.userBetLimitID;
        if (aB.containsKey(bb[0].currentTable.currentTableID)) {
            bf = aB.get(bb[0].currentTable.currentTableID)
        }
        for (var be in bb[0].betLimits) {
            if (bb[0].betLimits[be].id == bf) {
                bb[0].betLimits[be].dom.addClass("now");
                aC(be)
            } else {
                bb[0].betLimits[be].dom.removeClass("now")
            }
        }
    };
    var k = function(be) {
        for (var bf in bb[0].betLimits) {
            bb[0].betLimits[bf].dom.removeClass("now")
        }
        bb[0].betLimits[be].dom.addClass("now");
        aC(be)
    };
    var x = function() {
        var bf = -1;
        for (var be in bb[0].betLimits) {
            if (bb[0].betLimits[be].dom.hasClass("now")) {
                bf = bb[0].betLimits[be].id;
                break
            }
        }
        if (bf != -1) {
            aB.put(bb[0].currentTable.currentTableID, bf);
            PageUtil.callGameTableListWebIframe("syncTableBetLimitID", {
                tableID: bb[0].currentTable.currentTableID,
                betLimitID: bf
            });
            BetLimitSettingUtil.setUserBetLimitIDCache({
                dealerDomain: PageConfig.dealerDomain,
                tableID: bb[0].currentTable.currentTableID,
                betLimitID: bf
            });
            aZ();
            JCache.get("#betLimitBox").fadeOut()
        }
    };
    var K = function(bh, be, bg) {
        if (bg.length >= 8 || be < 1) {
            return bg
        }
        var bf = ChipType.getInstance(bh);
        var bj = Math.floor(MathUtil.decimal.divide(be, bf.amount));
        var bk = MathUtil.decimal.subtract(be, MathUtil.decimal.multiply(bj, bf.amount));
        for (var bi = 0; bi < bj; bi++) {
            var bl = JCache.clone("#tempDivChips");
            bl.removeAttr("id").addClass(bf.sicWebClassName.replace("chips2d", "chips3d"));
            bg[bg.length] = bl;
            if (bg.length >= 8) {
                break
            }
        }
        K(bh - 1, bk, bg)
    };
    var m = function(bf, bh) {
        var be = JCache.clone("#tempDivChips");
        var bg = "amount";
        if (bh) {
            bg = "amountBeen"
        }
        be.removeAttr("id").addClass(bg).html(CurrencyUtil.showAmountByCurrency(bf, PageConfig.currencyId));
        return be
    };
    var z = function(bf) {
        var be = JCache.clone("#tempDivChips");
        be.removeAttr("id").addClass("btnCheck");
        be.bind("click", Y(bf));
        return be
    };
    var aG = function() {
        for (var bk = 0, bg = bb[0].userTxns.length; bk < bg; bk++) {
            var bm = bb[0].userTxns[bk];
            if (bm.stake != bm.origStake || bm.redraw) {
                bm.origStake = bm.stake;
                bm.betBoxUl.removeClass().addClass("chips3dArea-in");
                var bj = $j(document.createDocumentFragment());
                if (bm.stake > 0 && bm.addStake == 0) {
                    var bf = [];
                    K(ChipType.getLength() - 1, bm.stake, bf);
                    for (var bo = 0; bo < bf.length; bo++) {
                        bj.append(bf[bo])
                    }
                    bj.append(m(bm.stake, false))
                } else {
                    if (bm.stake == 0 && bm.addStake > 0) {
                        var bl = [];
                        K(ChipType.getLength() - 1, bm.addStake, bl);
                        bm.betBoxUl.addClass("modeChecking");
                        for (var bo = 0; bo < bl.length; bo++) {
                            bj.append(bl[bo])
                        }
                        bj.append(m(bm.addStake, false));
                        bj.append(z(bk))
                    } else {
                        if (bm.stake > 0 && bm.addStake > 0) {
                            var bf = [];
                            K(ChipType.getLength() - 1, bm.stake, bf);
                            bm.betBoxUl.addClass("modeAddChips");
                            for (var bo = 0; bo < bf.length; bo++) {
                                bj.append(bf[bo])
                            }
                            bj.append(m(bm.stake, true));
                            var bl = [];
                            var bn = $j(document.createDocumentFragment());
                            K(ChipType.getLength() - 1, bm.addStake, bl);
                            for (var bo = 0; bo < bl.length; bo++) {
                                bn.append(bl[bo])
                            }
                            bn.append(m(bm.addStake, false));
                            bn.append(z(bk));
                            var bp = JCache.clone("#tempDivChips");
                            bp.removeAttr("id").addClass("addChipsBox");
                            bp.append(bn);
                            bj.append(bp)
                        }
                    }
                }
                bm.betBoxUl.empty();
                bm.betBoxUl.append(bj);
                bm.redraw = false
            }
        }
        var bi = false;
        var bh = false;
        var be = 0;
        for (var bk = 0, bg = bb[0].userTxns.length; bk < bg; bk++) {
            var bm = bb[0].userTxns[bk];
            if (bm.addStake > 0) {
                bi = true
            }
            if (bm.repeatStake > 0) {
                bh = true
            }
            be += bm.addStake
        }
        bc = be;
        if (bb[0].currentTable.newGameStart) {
            if (bi == true) {
                if (bb[0].cancelNoWork == true) {
                    bb[0].cancelNoWork = false;
                    bb[0].cancel.removeClass("noWork")
                }
                if (bb[0].confirmNoWork == true) {
                    bb[0].confirmNoWork = false;
                    bb[0].confirm.removeClass("noWork")
                }
            } else {
                if (bb[0].cancelNoWork == false) {
                    bb[0].cancelNoWork = true;
                    bb[0].cancel.addClass("noWork")
                }
                if (bb[0].confirmNoWork == false) {
                    bb[0].confirmNoWork = true;
                    bb[0].confirm.addClass("noWork")
                }
            }
            if (bh == true) {
                if (bb[0].repeatNoWork == true) {
                    bb[0].repeatNoWork = false;
                    bb[0].repeat.removeClass("noWork")
                }
            } else {
                if (bb[0].repeatNoWork == false) {
                    bb[0].repeatNoWork = true;
                    bb[0].repeat.addClass("noWork")
                }
            }
        } else {
            if (bb[0].cancelNoWork == false) {
                bb[0].cancelNoWork = true;
                bb[0].cancel.addClass("noWork")
            }
            if (bb[0].confirmNoWork == false) {
                bb[0].confirmNoWork = true;
                bb[0].confirm.addClass("noWork")
            }
            if (bb[0].repeatNoWork == false) {
                bb[0].repeatNoWork = true;
                bb[0].repeat.addClass("noWork")
            }
        }
    };
    var ay = {
        userChipsSetting: [],
        init: function() {
            var bn = this;
            var bp = CurrencyType.getInstance(PageConfig.currencyId);
            var bm = $j(document.createDocumentFragment());
            for (var bo in ChipType.getAllChipType()) {
                var bf = ChipType.getInstance(bo);
                if (bf.amount >= bp.minChip && bf.amount <= bp.maxChip) {
                    var bj = JCache.clone("#templateLiChips").prop("id", bf.name);
                    var bh = $j(bj).children().eq(0).children().eq(0);
                    bh.prop("id", "chipType_" + bf.value).prop("class", bf.sicWebClassName).data("amount", bf.amount).html(bf.showAmount);
                    bm.append(bj)
                }
            }
            var bq = JCache.get("#setChipsUl");
            bq.empty();
            bq.append(bm);
            if (CurrencyType.US == bp) {
                JCache.get("#chipsAmountUnit").css("display", "none")
            }
            JCache.get("#currencyTypeUnit").text(bp.unit);
            JCache.get("#chipsSetBtn").bind("click", function() {
                JCache.get("#setChips").css("display", "flex")
            });
            JCache.get("#chipsCancelBtn").bind("click", function() {
                JCache.get("#setChips").css("display", "none");
                JCache.get("#gameArea").css("display", "flex")
            });
            JCache.get("#chipsSubmitBtn").bind("click", function() {
                if (bn.userChipsSetting.length != PageSetting.chipSettingLimit.value) {
                    aS(I18N.get("form.text.chips.selectChips1") + " " + PageSetting.chipSettingLimit.value + " " + I18N.get("form.text.chips.selectChips2"));
                    return
                }
                var bt = bn.userChipsSetting.map(function(bC) {
                    return bC.className
                }).indexOf(ChipType.Chips_Custom.sicWebClassName);
                var bB = PageConfig.userCustomChip;
                if (bt != -1) {
                    var bw = bn.userChipsSetting[bt];
                    var by = bw.amount;
                    var bu = bw.customAmount;
                    if (bp.minChip > by || bp.maxChip < by) {
                        aS("[" + I18N.get("msg.error.chips.minChips") + "]:" + bp.minChip + ", [" + I18N.get("msg.error.chips.maxChips") + "]:" + bp.maxChip);
                        return
                    }
                    bB = bu;
                    PageConfig.userCustomChip = by
                } else {
                    bB = JCache.get("#customChipSetting").val()
                }
                bn.userChipsSetting.sort(function(bD, bC) {
                    if (bD.amount > bC.amount) {
                        return 1
                    }
                    if (bD.amount < bC.amount) {
                        return -1
                    }
                    return 0
                });
                var bv = [];
                var bA = JCache.get("#chips").children();
                var bx = 0;
                for (var bz in bn.userChipsSetting) {
                    var bs = bn.userChipsSetting[bz];
                    bA.eq(bz).unbind("click").bind("click", Q(bz));
                    bA.eq(bz).children().removeClass().addClass(bs.className).text(bs.showAmount);
                    ba[bz] = {
                        dom: bA.eq(bz),
                        className: bs.className,
                        amount: bs.amount,
                    };
                    bv[bx++] = bs.value
                }
                p = {};
                JCache.get("#setChips").css("display", "none");
                postAjax({
                    url: "/player/update/setUserChips",
                    data: {
                        chips: JSON.stringify(bv),
                        customChip: bB
                    },
                    success: function(bC) {}
                });
                a9(1);
                JCache.get("#chipsCancelBtn").click()
            });
            JCache.get("#setChipsUl").children().bind("click", function() {
                var bt = $j(this).children().children().prop("id");
                var bs = ChipType.getInstance(bt.replace("chipType_", ""));
                var bu = {
                    value: bs.value,
                    className: bs.sicWebClassName,
                    amount: bs.amount,
                    customAmount: MathUtil.decimal.divide(bs.amount, bp.unit),
                    showAmount: bs.showAmount,
                };
                bn.addUserChipSetting(bu, $j(this))
            });
            JCache.get("#userChip").bind("click", function() {
                var bt = $j("#customChipSetting").val();
                var bu = MathUtil.decimal.multiply(bt, bp.unit);
                if (!bu) {
                    return
                }
                var bs = CurrencyUtil.showAmount(bu);
                var bv = {
                    value: ChipType.Chips_Custom.value,
                    className: ChipType.Chips_Custom.sicWebClassName,
                    amount: bu,
                    customAmount: bt,
                    showAmount: CurrencyUtil.showAmount(bu),
                };
                bn.addUserChipSetting(bv, JCache.get("#userSet"))
            });
            JCache.get("#customChipSetting").bind("keyup", function() {
                var bw = $j(this);
                bw.val(StringUtil.replaceOnlyNumber(bw.val()));
                var bv = MathUtil.decimal.multiply(bw.val(), bp.unit);
                var bt = bw.val();
                var bs = CurrencyUtil.showAmount(bv);
                if (bs.toString().length > 4) {
                    bw.val(bw.val().substr(0, bw.val().length - 1));
                    return
                }
                JCache.get("#customChipShowAmount").text(bs);
                var bu = bn.userChipsSetting.map(function(bx) {
                    return bx.className
                }).indexOf(ChipType.Chips_Custom.sicWebClassName);
                if (bu >= 0) {
                    bn.userChipsSetting[bu].showAmount = bs;
                    bn.userChipsSetting[bu].amount = bv;
                    bn.userChipsSetting[bu].customAmount = bt
                }
            });
            if (PageConfig.userSelectChips) {
                var bq = [];
                var br = JSON.parse(PageConfig.userSelectChips);
                var bl = PageConfig.userCustomChip;
                if (bl == 0) {
                    bl = bp.minChip
                }
                var bk = CurrencyUtil.showAmount(bl);
                JCache.get("#customChipSetting").val(MathUtil.decimal.divide(bl, bp.unit));
                JCache.get("#customChipShowAmount").text(bk);
                for (var bi in br) {
                    var bg = br[bi];
                    var bf = ChipType.getInstance(bg);
                    var be = {};
                    be.value = bf.value;
                    be.className = bf.sicWebClassName;
                    if (bg == ChipType.Chips_Custom.value) {
                        be.amount = parseInt(bl);
                        be.showAmount = bk
                    } else {
                        be.amount = bf.amount;
                        be.showAmount = bf.showAmount
                    }
                    bq[bi] = be
                }
                bq.sort(function(bt, bs) {
                    if (bt.amount > bs.amount) {
                        return 1
                    }
                    if (bt.amount < bs.amount) {
                        return -1
                    }
                    return 0
                });
                this.addDefaultUserChipSetting(bq)
            }
        },
        addUserChipSetting: function(bg, bf) {
            var be = this.userChipsSetting.map(function(bh) {
                return bh.className
            }).indexOf(bg.className);
            if (be == -1) {
                if (this.userChipsSetting.length < PageSetting.chipSettingLimit.value) {
                    this.userChipsSetting.push(bg);
                    bf.addClass("select")
                }
            } else {
                this.userChipsSetting.splice(be, 1);
                bf.removeClass("select")
            }
        },
        addDefaultUserChipSetting: function(bf) {
            var bh = JCache.get("#chips").children();
            for (var be in bf) {
                var bg = "";
                if (bf[be].value != ChipType.Chips_Custom.value) {
                    bg = "chipType_" + bf[be].value;
                    $j("p[id=" + bg + "]").parent().parent().click()
                } else {
                    bg = "customChipShowAmount";
                    $j("p[id=" + bg + "]").parent().click()
                }
                bh.eq(be).unbind("click").bind("click", Q(be));
                bh.eq(be).children().removeClass().addClass(bf[be].className).text(bf[be].showAmount);
                ba[be] = {
                    dom: bh.eq(be),
                    className: bf[be].className,
                    amount: bf[be].amount,
                }
            }
            p = {};
            if (bf.length >= 2) {
                a9(1)
            }
        }
    };
    var Q = function(be) {
        return function() {
            a9(be);
            B()
        }
    };
    var a9 = function(bf) {
        for (var be = 0, bg = ba.length; be < bg; be++) {
            ba[be].dom.children().removeClass("now");
            ba[be].dom.unbind("click");
            ba[be].dom.bind("click", Q(be))
        }
        ba[bf].dom.children().addClass("now");
        ba[bf].dom.unbind("click");
        p.className = ba[bf].className;
        p.amount = ba[bf].amount
    };
    var ad;
    var j = function() {
        if (bb[0].countdownObj.countdownTime > 0) {
            bb[0].countdownObj.countdownTime = bb[0].countdownObj.countdownTime - 1
        }
        if (bb[0].countdownObj.countdownTime <= 0) {
            bb[0].countdownObj.needCountdown = false;
            if (!JCache.get("#betDice").hasClass("modeOpen")) {
                JCache.get("#betDice").addClass("modeOpen")
            }
            if (PageConfig.enableMexicoWebHls == "1") {
                J(I18N.get("form.text.noMorebet"));
                ak();
                c("0", true);
                JCache.get("#gameInfoCard").slideDown()
            } else {
                J(I18N.get("form.text.noMorebet"));
                ak();
                c("0", false)
            }
        } else {
            bb[0].countdownObj.needCountdown = true
        }
        if (bb[0].countdownObj.needCountdown) {
            if (JCache.get("#betDice").hasClass("modeOpen")) {
                JCache.get("#betDice").removeClass("modeOpen")
            }
            if (bb[0].countdownObj.countdownTime <= 5) {
                if (!bb[0].countdownObj.finish) {
                    bb[0].countdownObj.finish = true;
                    JCache.get("#countdownDL").addClass("finish")
                }
            } else {
                if (bb[0].countdownObj.finish) {
                    bb[0].countdownObj.finish = false;
                    JCache.get("#countdownDL").removeClass("finish")
                }
            }
            var be = parseInt(bb[0].countdownObj.countdownTime / bb[0].countdownObj.waitingTime * 100);
            JCache.get("#countdown").html("<p>" + bb[0].countdownObj.countdownTime + "</p><span>" + I18N.get("msg.info.sec") + "</span>");
            JCache.get("#countdownLength").css("width", be >= 100 ? "100%" : be + "%");
            ad = setTimeout(function() {
                j()
            }, 1000)
        } else {
            JCache.get("#countdown").html("<p>0</p><span>" + I18N.get("msg.info.sec") + "</span>");
            JCache.get("#countdownLength").css("width", "0%")
        }
    };
    var A = function(be) {
        bb[0].countdownObj.trigger = false;
        bb[0].countdownObj.countdownTime = 0;
        if (!bb[0].countdownObj.finish) {
            bb[0].countdownObj.finish = true;
            JCache.get("#countdownDL").addClass("finish")
        }
        if (be) {
            JCache.get("#countdown").html("<p>" + be + "</p><span>" + I18N.get("msg.info.sec") + "</span>")
        } else {
            JCache.get("#countdown").html("<p>" + be + "</p><span></span>")
        }
        JCache.get("#countdownLength").css("width", "0%")
    };
    var Y = function(be) {
        return function() {
            if (!r) {
                r = true;
                ag(R(be), "S");
                L();
                r = false
            }
        }
    };
    var al = function(be) {
        return function() {
            ag(R(be), "A");
            L()
        }
    };
    var R = function(bh) {
        var be = [];
        if (typeof bh === "undefined" || bh == null) {
            for (var bf = 0, bg = bb[0].userTxns.length; bf < bg; bf++) {
                be[bf] = true
            }
        } else {
            for (var bf = 0, bg = bb[0].userTxns.length; bf < bg; bf++) {
                be[bf] = false
            }
            be[bh] = true
        }
        return be
    };
    var ag = function(bn, bj) {
        if (!bb[0].confirmReady) {
            return
        }
        bb[0].confirmReady = false;
        var bl = 0;
        var bf = [];
        var bh = "";
        for (var bk = 0, be = bn.length; bk < be; bk++) {
            if (bn[bk] && bb[0].userTxns[bk].addStake > 0) {
                var bi = bb[0].userTxns[bk].stake + bb[0].userTxns[bk].addStake;
                if (bi < bb[0].userTxns[bk].minBet) {
                    bh += I18N.get("msg.error.betTxns.minBets") + bb[0].userTxns[bk].minBet + "<br />"
                } else {
                    var bg = {};
                    bg.categoryIdx = bk;
                    bg.categoryName = bb[0].userTxns[bk].name;
                    bg.stake = bb[0].userTxns[bk].addStake;
                    bf[bl++] = bg
                }
            }
        }
        if (bf.length == 0 && bh) {
            w(bh)
        }
        if (bf.length > 0) {
            var bm = PageConfig.userBetLimitID;
            if (aB.containsKey(bb[0].currentTable.currentTableID)) {
                bm = aB.get(bb[0].currentTable.currentTableID)
            }
            postAjax({
                url: "/casino/sexy/player/update/addSicTransaction.php",
                data: {
                    domainType: PageConfig.dealerDomain,
                    tableID: bb[0].currentTable.currentTableID,
                    gameShoe: bb[0].currentTable.currentGameShoe,
                    gameRound: bb[0].currentTable.currentGameRound,
                    data: JSON.stringify(bf),
                    betLimitID: bm,
                    f: "-1",
                    c: bj
                },
                success: function(bo) {
                    aL(bo);
                    parent.leftx.get_credit();
                },
                error: function(bo) {
                    w(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
                    bb[0].confirmReady = true
                },
                headers: {
                    "Cache-Control": "no-store"
                }
            })
        } else {
            bb[0].confirmReady = true
        }
    };
    var aL = function(bh) {
        if (bh == null || bh.status != 200) {
            bb[0].confirmReady = true;
            if (bh != null && ("msg.error.info.insufficientBalance" == bh.message || "msg.error.bet.raceIsNotOpen" == bh.message || "msg.error.validation.betLimit.empty" == bh.message || "msg.error.info.reachMaxWinLimit" == bh.message || "msg.error.connectionTimeout" == bh.message)) {
                w(I18N.get(bh.message));
                return
            }
            w(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"));
            return
        }
        var bg = "";
        var bl = false;
        for (var bj = 0, bf = bb[0].userTxns.length; bj < bf; bj++) {
            bb[0].userTxns[bj].repeatStake = 0;
            bb[0].userTxns[bj].lastAddStake = bb[0].userTxns[bj].stake
        }
        var bi = $j.parseJSON(bh.message);
        var be = $j.Event("updateBalance");
        be.balance = bi.balance;
        JCache.get("#userBalance").trigger(be);
        if (!$j.isEmptyObject(bi.txns) && bi.txns.length > 0) {
            for (var bj = 0, bf = bi.txns.length; bj < bf; bj++) {
                var bm = bi.txns[bj];
                if (bm.success) {
                    bl = true;
                    bg = I18N.get("msg.error.betTxns.betsPlacedSuccessfully");
                    bb[0].userTxns[bm.categoryIdx].stake = bm.stake;
                    bb[0].userTxns[bm.categoryIdx].addStake = 0;
                    bb[0].userTxns[bm.categoryIdx].lastAddStake = bb[0].userTxns[bm.categoryIdx].stake;
                    bb[0].userTxns[bm.categoryIdx].redraw = true
                } else {
                    if (!bl) {
                        bg = I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully")
                    }
                }
            }
            var bk = 0;
            for (var bj = 0, bf = bb[0].userTxns.length; bj < bf; bj++) {
                bk = MathUtil.decimal.add(bk, bb[0].userTxns[bj].stake)
            }
            JCache.get("#playerTotalCurrentBet").html(CurrencyUtil.format(bk));
            aG();
            if (bl) {
                a3(bg)
            } else {
                w(bg)
            }
        } else {
            w(I18N.get("msg.error.betTxns.betsPlacedUnsuccessfully"))
        }
        bb[0].confirmReady = true
    };
    var M = function() {
        return function() {
            S();
            L()
        }
    };
    var S = function() {
        if (bb[0].currentTable.newGameStart == false) {
            return
        }
        if (PageConfig.enableMexicoWebHls == "1" && !a2) {
            return
        }
        var be = 0;
        for (var bf = 0, bg = bb[0].userTxns.length; bf < bg; bf++) {
            be += bb[0].userTxns[bf].repeatStake
        }
        if (be > n) {
            w(I18N.get("msg.error.info.insufficientBalance") + "<br />");
            return
        }
        var bh = "";
        for (var bf = 0, bg = bb[0].userTxns.length; bf < bg; bf++) {
            if (bb[0].userTxns[bf].addStake > 0) {
                bb[0].userTxns[bf].addStake = 0;
                bb[0].userTxns[bf].redraw = true
            }
            if (bb[0].userTxns[bf].repeatStake > 0) {
                if (bb[0].userTxns[bf].repeatStake > bb[0].userTxns[bf].maxBet) {
                    bh += I18N.get("msg.error.betTxns.maxBets") + bb[0].userTxns[bf].maxBet + "<br />"
                } else {
                    bb[0].userTxns[bf].addStake = bb[0].userTxns[bf].repeatStake;
                    bb[0].userTxns[bf].redraw = true
                }
            }
        }
        if (bh) {
            w(bh)
        }
        aG()
    };
    var aJ = function() {
        return function() {
            aM();
            L()
        }
    };
    var aM = function() {
        for (var be = 0, bf = bb[0].userTxns.length; be < bf; be++) {
            if (bb[0].userTxns[be].addStake != 0) {
                bb[0].userTxns[be].addStake = 0;
                bb[0].userTxns[be].redraw = true
            }
        }
        aG()
    };
    var d = function() {
        var be = swfobject.getObjectById("video");
        if (be != null && (typeof be.doMute === "function")) {
            JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
            be.doMute(PageConfig.streamingAudio == "1" ? 0 : 1)
        }
    };
    var ap = function() {
        var be = swfobject.getObjectById("video");
        if (be != null && (typeof be.doMute === "function")) {
            PageConfig.streamingAudio = PageConfig.streamingAudio == "1" ? "0" : "1";
            PlayerSettingUtil.changeStreamingAudio(PageConfig.streamingAudio);
            JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
            be.doMute(PageConfig.streamingAudio == "1" ? 0 : 1)
        }
    };
    var U = function() {
        PageConfig.resultSound = PageConfig.resultSound == "1" ? "0" : "1";
        PlayerSettingUtil.changeResultSound(PageConfig.resultSound);
        JCache.get("#resultSound").removeClass().addClass(PageConfig.resultSound == "1" ? "switch_on" : "switch_off")
    };
    var ao = function() {
        PageConfig.bettingSound = PageConfig.bettingSound == "1" ? "0" : "1";
        PlayerSettingUtil.changeBettingSound(PageConfig.bettingSound);
        JCache.get("#bettingSound").removeClass().addClass(PageConfig.bettingSound == "1" ? "switch_on" : "switch_off")
    };
    var aN = function() {
        PageConfig.backgroundMusic = PageConfig.backgroundMusic == "1" ? "0" : "1";
        PlayerSettingUtil.changeBackgroundMusic(PageConfig.backgroundMusic);
        JCache.get("#backgroundMusic").removeClass().addClass(PageConfig.backgroundMusic == "1" ? "switch_on" : "switch_off");
        JCache.get("#soundBackGroundMusic").prop("muted", PageConfig.backgroundMusic == "1" ? 0 : 1)
    };
    var aK = function() {
        var be = swfobject.getObjectById("video");
        if (be != null && (typeof be.refresh === "function")) {
            be.refresh()
        }
    };
    var i = function() {
        var be = swfobject.getObjectById("video");
        if (be != null && (typeof be.changeLine === "function")) {
            var bf = JCache.get("#zoomVideo").text();
            if (bf == undefined || bf == "") {
                bf = bb[0].currentTable.currentTableID.toString()
            }
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
            be.changeLine(PageConfig.streamingLine[0], ac[bf])
        }
    };
    var a4 = function(be) {
        if (bb[0].currentTable.currentTableID != be) {
            a5(be);
            bb[0].currentTable.currentTableID = be;
            bb[0].currentTable.currentGameShoe = -1;
            bb[0].currentTable.currentGameRound - -1;
            at()
        }
    };
    var a1 = function(bf) {
        if (bf != -1) {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.play(0, bf)
            } else {
                var be = swfobject.getObjectById("video");
                if (be != null && (typeof be.changeChannel === "function")) {
                    be.changeChannel(ac["" + bf])
                }
            }
        }
    };
    var a5 = function(bg) {
        if (typeof aV[bg] == "undefined" || typeof aV[bg].tableSupportGame == "undefined") {
            return
        }
        for (var bf = 0, bh = SicDrawBetBoxType.getLength(); bf < bh; bf++) {
            var be = SicDrawBetBoxType.getInstance(bf);
            bb[0].userTxns[bf].betBox = $j("#" + be.betBox);
            bb[0].userTxns[bf].betBox.unbind("click").bind("click", aX(be.value))
        }
        JCache.get("#zoomVideo").text(bg.toString());
        q();
        g();
        c("0", true);
        bb[0].dealerEventStampTime = 0;
        if (ad) {
            clearTimeout(ad)
        }
    };
    var aX = function(be) {
        return function() {
            af(be)
        }
    };
    var af = function(bg) {
        if (!bb[0].currentTable.newGameStart) {
            return
        }
        if (PageConfig.enableMexicoWebHls == "1" && !a2) {
            return
        }
        if (!p.amount) {
            w(I18N.get("msg.error.chips.selectChips"));
            return
        }
        if (PageConfig.allowHedgeBetting == "false" && bb[0].currentTable.newGameStart) {
            var bh = SicCategoryType.getInstance(bg);
            if (bh.hedges.length > 0) {
                for (var bf in bh.hedges) {
                    if (bb[0].userTxns[bh.hedges[bf]].addStake > 0 || bb[0].userTxns[bh.hedges[bf]].stake > 0) {
                        w(I18N.get("msg.error.betTxns.denyHedgeBetting"));
                        return
                    }
                }
            }
        }
        var be = bb[0].userTxns[bg].stake + bb[0].userTxns[bg].addStake + p.amount;
        if (be > bb[0].userTxns[bg].maxBet) {
            w(I18N.get("msg.error.betTxns.maxBets") + CurrencyUtil.format(bb[0].userTxns[bg].maxBet));
            return
        }
        if (be < bb[0].userTxns[bg].minBet) {
            if (bc + quickBetTxn.getUnconfirmSubmitStakeQuickBet() + MathUtil.decimal.subtract(bb[0].userTxns[bg].minBet, bb[0].userTxns[bg].stake) > n) {
                w(I18N.get("msg.error.info.insufficientBalance"));
                return
            }
            bb[0].userTxns[bg].addStake = MathUtil.decimal.subtract(bb[0].userTxns[bg].minBet, bb[0].userTxns[bg].stake)
        } else {
            if (bc + quickBetTxn.getUnconfirmSubmitStakeQuickBet() + p.amount > n) {
                w(I18N.get("msg.error.info.insufficientBalance"));
                return
            }
            bb[0].userTxns[bg].addStake += p.amount
        }
        bb[0].userTxns[bg].redraw = true;
        aG();
        aa()
    };
    var V = function(bf) {
        if (bf == null || bf.status != "200") {
            return
        }
        if (!bb[0].currentTable.initCurrentTable) {
            a5(bb[0].currentTable.currentTableID);
            bb[0].currentTable.initCurrentTable = true
        }
        var bk = $j.parseJSON(bf.message);
        if (typeof bk.deliverTime == "undefined") {
            return
        }
        if (bb[0].currentTable.currentTableID != -1 && bb[0].currentTable.currentTableID != bk.tableID) {
            return
        }
        if (typeof bf.delayTime != "undefined" && bf.delayTime != null) {
            PageConfig.eventDelayTime = bf.delayTime
        }
        a4(bk.tableID);
        if (bb[0].currentTable.currentGameShoe != bk.gameShoe || bb[0].currentTable.currentGameRound != bk.gameRound) {
            if (bb[0].currentTable.currentGameShoe != -1 && bb[0].currentTable.currentGameRound != -1) {
                for (var bh = 0, bj = bb[0].userTxns.length; bh < bj; bh++) {
                    bb[0].userTxns[bh].repeatStake = bb[0].userTxns[bh].lastAddStake;
                    bb[0].userTxns[bh].lastAddStake = 0;
                    bb[0].userTxns[bh].stake = 0
                }
                aG()
            }
            bb[0].currentTable.currentGameShoe = bk.gameShoe;
            bb[0].currentTable.currentGameRound = bk.gameRound;
            JCache.get("#currentShoeRound").html(I18N.get("form.text.game") + " " + bb[0].currentTable.currentGameShoe + " / " + bb[0].currentTable.currentGameRound);
            o();
            aZ()
        }
        var be = DealerEventType.getInstanceByName(bk.eventType);
        switch (be) {
        case DealerEventType.GP_INIT:
            c("0", true);
            break;
        case DealerEventType.GP_NEW_GAME_START:
            q();
            if (PageConfig.enableMexicoWebHls == "1") {
                if ((bf.timestamp - bk.deliverTime) < (PageConfig.eventDelayTime - 2000)) {
                    return
                }
                aG()
            }
            for (var bh = 0, bj = SicDrawBetBoxType.getLength(); bh < bj; bh++) {
                var bg = SicDrawBetBoxType.getInstance(bh);
                JCache.get("#" + bg.betBox).removeClass("openZone")
            }
            if (JCache.get("#betDice").hasClass("modeOpen")) {
                JCache.get("#betDice").removeClass("modeOpen")
            }
            if (PageConfig.enableMexicoWebHls == "1") {
                var bi = PageConfig.hlsAdditionalBetTime + bk.iTime - parseInt((bf.timestamp - bk.roundStartTime) / 1000);
                if (bi != bb[0].countdownObj.countdownTime && Math.abs(bi - bb[0].countdownObj.countdownTime) != 1) {
                    bb[0].countdownObj.countdownTime = bi
                }
            } else {
                var bi = bk.iTime - parseInt((bf.timestamp - bk.roundStartTime) / 1000);
                if (bi != bb[0].countdownObj.countdownTime && Math.abs(bi - bb[0].countdownObj.countdownTime) != 1) {
                    bb[0].countdownObj.countdownTime = bi
                }
            }
            if (bb[0].countdownObj.countdownTime > 0) {
                bb[0].currentTable.newGameStart = true
            }
            if (!bb[0].countdownObj.trigger) {
                if (bb[0].countdownObj.countdownTime > 0) {
                    J(I18N.get("form.text.startBet"));
                    setTimeout(function() {
                        an()
                    }, 1500);
                    bb[0].countdownObj.needCountdown = true
                }
                bb[0].countdownObj.waitingTime = bk.iTime;
                bb[0].countdownObj.trigger = true;
                j();
                PageConfig.eventStatus = DealerEventType.GP_BET_TIME.value
            }
            break;
        case DealerEventType.GP_WINNER:
            if (PageConfig.enableMexicoWebHls == "1") {
                if ((bf.timestamp - bk.deliverTime) < (PageConfig.eventDelayTime - 2000)) {
                    c("0", true);
                    return
                }
            } else {
                if ((bf.timestamp - bk.deliverTime) < (PageSetting.flashDelayTime.value - 1000)) {
                    return
                }
            }
            if (!JCache.get("#betDice").hasClass("modeOpen")) {
                JCache.get("#betDice").addClass("modeOpen")
            }
            a6("0", bk);
            PageConfig.eventStatus = DealerEventType.GP_WINNER.value;
            break;
        case DealerEventType.GP_VOID_ROUND:
            w(I18N.get("msg.error.voidRound"));
            break;
        default:
            break
        }
        if (bb[0].dealerEventStampTime == bk.deliverTime) {
            return
        }
        bb[0].dealerEventStampTime = Math.max(bb[0].dealerEventStampTime, bk.deliverTime)
    };
    var c = function(bf, be) {
        bb[0].currentTable.newGameStart = false;
        bb[0].currentTable.calcWinnerStake = false;
        bb[0].currentTable.winnerAnimation = false;
        aM();
        if (be) {
            A(bf)
        }
    };
    var a6 = function(bl, bo) {
        bb[0].currentTable.newGameStart = false;
        A(bl);
        if (!bb[0].currentTable.calcWinnerStake) {
            bb[0].currentTable.calcWinnerStake = true;
            var be = true;
            var bm = 0;
            var br = 0;
            var bt = 0;
            var bp = bo.tableCards.filter(function(bv) {
                return bv != 255
            });
            var bg = parseInt(bp[0]) + parseInt(bp[1]) + parseInt(bp[2]);
            var bu = F(bp, bg);
            var bj = "&nbsp;";
            var bi = "&nbsp;";
            for (var bn = 0, bf = bu.length; bn < bf; bn++) {
                var bs = bu[bn];
                if (bs > 0) {
                    var bk = SicDrawBetBoxType.getInstance(bn);
                    JCache.get("#" + bk.betBox).addClass("openZone");
                    if (bk == SicDrawBetBoxType.Big) {
                        bj = I18N.get("form.text.sicCategory.big")
                    } else {
                        if (bk == SicDrawBetBoxType.Small) {
                            bj = I18N.get("form.text.sicCategory.small")
                        } else {
                            if (bk == SicDrawBetBoxType.Odd) {
                                bi = I18N.get("form.text.sicCategory.odd")
                            } else {
                                if (bk == SicDrawBetBoxType.Even) {
                                    bi = I18N.get("form.text.sicCategory.even")
                                }
                            }
                        }
                    }
                }
                var bh = bb[0].userTxns[bn].stake;
                if (bh > 0) {
                    var bq = bh * bs;
                    if (bq > 0) {
                        bt += (bq + bh)
                    }
                }
            }
            t(bp, bg, bj, bi);
            if (bt > 0) {
                ae(CurrencyUtil.format(bt, 2));
                ah()
            }
        }
    };
    var F = function(bj, bf) {
        var bk = Array.from(bj);
        var bo = new Array();
        for (var bi = 0, bg = SicCategoryType.getLength(); bi < bg; bi++) {
            bo[bi] = -1
        }
        const be = function(bp, bq) {
            return bp.reduce(function(br, bs) {
                return (bs == bq ? (br + 1) : (br + 0))
            }, 0)
        };
        var bn = [0, 1, 2, 3, 4, 5, 6];
        var bl = false;
        for (var bi = 0, bg = bn.length; bi < bg; bi++) {
            if (bn[bi] == 0) {
                continue
            }
            bn[bi] = be(bk, bi);
            switch (bn[bi]) {
            case 3:
                bl = true;
                bo[SicCategoryType.AnyTriple.value] = SicCategoryType.AnyTriple.fixOdds;
                switch (bi) {
                case 1:
                    bo[SicCategoryType.T111.value] = SicCategoryType.T111.fixOdds;
                    bo[SicCategoryType.D11.value] = SicCategoryType.D11.fixOdds;
                    bo[SicCategoryType.S1.value] = 3;
                    break;
                case 2:
                    bo[SicCategoryType.T222.value] = SicCategoryType.T222.fixOdds;
                    bo[SicCategoryType.D22.value] = SicCategoryType.D22.fixOdds;
                    bo[SicCategoryType.Pt6.value] = SicCategoryType.Pt6.fixOdds;
                    bo[SicCategoryType.S2.value] = 3;
                    break;
                case 3:
                    bo[SicCategoryType.T333.value] = SicCategoryType.T333.fixOdds;
                    bo[SicCategoryType.D33.value] = SicCategoryType.D33.fixOdds;
                    bo[SicCategoryType.Pt9.value] = SicCategoryType.Pt9.fixOdds;
                    bo[SicCategoryType.S3.value] = 3;
                    break;
                case 4:
                    bo[SicCategoryType.T444.value] = SicCategoryType.T444.fixOdds;
                    bo[SicCategoryType.D44.value] = SicCategoryType.D44.fixOdds;
                    bo[SicCategoryType.Pt12.value] = SicCategoryType.Pt12.fixOdds;
                    bo[SicCategoryType.S4.value] = 3;
                    break;
                case 5:
                    bo[SicCategoryType.T555.value] = SicCategoryType.T555.fixOdds;
                    bo[SicCategoryType.D55.value] = SicCategoryType.D55.fixOdds;
                    bo[SicCategoryType.Pt15.value] = SicCategoryType.Pt15.fixOdds;
                    bo[SicCategoryType.S5.value] = 3;
                    break;
                case 6:
                    bo[SicCategoryType.T666.value] = SicCategoryType.T666.fixOdds;
                    bo[SicCategoryType.D66.value] = SicCategoryType.D66.fixOdds;
                    bo[SicCategoryType.S6.value] = 3;
                    break;
                default:
                    break
                }
                break;
            case 2:
                switch (bi) {
                case 1:
                    bo[SicCategoryType.D11.value] = SicCategoryType.D11.fixOdds;
                    bo[SicCategoryType.S1.value] = 2;
                    break;
                case 2:
                    bo[SicCategoryType.D22.value] = SicCategoryType.D22.fixOdds;
                    bo[SicCategoryType.S2.value] = 2;
                    break;
                case 3:
                    bo[SicCategoryType.D33.value] = SicCategoryType.D33.fixOdds;
                    bo[SicCategoryType.S3.value] = 2;
                    break;
                case 4:
                    bo[SicCategoryType.D44.value] = SicCategoryType.D44.fixOdds;
                    bo[SicCategoryType.S4.value] = 2;
                    break;
                case 5:
                    bo[SicCategoryType.D55.value] = SicCategoryType.D55.fixOdds;
                    bo[SicCategoryType.S5.value] = 2;
                    break;
                case 6:
                    bo[SicCategoryType.D66.value] = SicCategoryType.D66.fixOdds;
                    bo[SicCategoryType.S6.value] = 2;
                    break;
                default:
                    break
                }
                break;
            case 1:
                switch (bi) {
                case 1:
                    bo[SicCategoryType.S1.value] = 1;
                    break;
                case 2:
                    bo[SicCategoryType.S2.value] = 1;
                    break;
                case 3:
                    bo[SicCategoryType.S3.value] = 1;
                    break;
                case 4:
                    bo[SicCategoryType.S4.value] = 1;
                    break;
                case 5:
                    bo[SicCategoryType.S5.value] = 1;
                    break;
                case 6:
                    bo[SicCategoryType.S6.value] = 1;
                    break;
                default:
                    break
                }
                break;
            default:
                break
            }
        }
        if (bl) {
            return bo
        }
        var bm = new Array();
        var bh = 0;
        bk.sort().forEach(function(bp) {
            if (!ArrayUtil.contains(bm, bp)) {
                bm[bh] = bp;
                bh++
            }
        });
        if (bm.length == 2) {
            aw(bo, bm[0], bm[1])
        } else {
            if (bm.length == 3) {
                aw(bo, bm[0], bm[1]);
                aw(bo, bm[0], bm[2]);
                aw(bo, bm[1], bm[2])
            }
        }
        if (bf % 2 == 0) {
            bo[SicCategoryType.Even.value] = SicCategoryType.Even.fixOdds
        } else {
            bo[SicCategoryType.Odd.value] = SicCategoryType.Odd.fixOdds
        }
        switch (bf) {
        case 4:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt4.value] = SicCategoryType.Pt4.fixOdds;
            break;
        case 5:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt5.value] = SicCategoryType.Pt5.fixOdds;
            break;
        case 6:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt6.value] = SicCategoryType.Pt6.fixOdds;
            break;
        case 7:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt7.value] = SicCategoryType.Pt7.fixOdds;
            break;
        case 8:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt8.value] = SicCategoryType.Pt8.fixOdds;
            break;
        case 9:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt9.value] = SicCategoryType.Pt9.fixOdds;
            break;
        case 10:
            bo[SicCategoryType.Small.value] = SicCategoryType.Small.fixOdds;
            bo[SicCategoryType.Pt10.value] = SicCategoryType.Pt10.fixOdds;
            break;
        case 11:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt11.value] = SicCategoryType.Pt11.fixOdds;
            break;
        case 12:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt12.value] = SicCategoryType.Pt12.fixOdds;
            break;
        case 13:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt13.value] = SicCategoryType.Pt13.fixOdds;
            break;
        case 14:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt14.value] = SicCategoryType.Pt14.fixOdds;
            break;
        case 15:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt15.value] = SicCategoryType.Pt15.fixOdds;
            break;
        case 16:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt16.value] = SicCategoryType.Pt16.fixOdds;
            break;
        case 17:
            bo[SicCategoryType.Big.value] = SicCategoryType.Big.fixOdds;
            bo[SicCategoryType.Pt17.value] = SicCategoryType.Pt17.fixOdds;
            break;
        default:
            break
        }
        return bo
    };
    var aw = function(be, bg, bf) {
        switch (bg) {
        case 1:
            switch (bf) {
            case 2:
                be[SicCategoryType.Td12.value] = SicCategoryType.Td12.fixOdds;
                break;
            case 3:
                be[SicCategoryType.Td13.value] = SicCategoryType.Td13.fixOdds;
                break;
            case 4:
                be[SicCategoryType.Td14.value] = SicCategoryType.Td14.fixOdds;
                break;
            case 5:
                be[SicCategoryType.Td15.value] = SicCategoryType.Td15.fixOdds;
                break;
            case 6:
                be[SicCategoryType.Td16.value] = SicCategoryType.Td16.fixOdds;
                break;
            default:
                break
            }
            break;
        case 2:
            switch (bf) {
            case 3:
                be[SicCategoryType.Td23.value] = SicCategoryType.Td23.fixOdds;
                break;
            case 4:
                be[SicCategoryType.Td24.value] = SicCategoryType.Td24.fixOdds;
                break;
            case 5:
                be[SicCategoryType.Td25.value] = SicCategoryType.Td25.fixOdds;
                break;
            case 6:
                be[SicCategoryType.Td26.value] = SicCategoryType.Td26.fixOdds;
                break;
            default:
                break
            }
            break;
        case 3:
            switch (bf) {
            case 4:
                be[SicCategoryType.Td34.value] = SicCategoryType.Td34.fixOdds;
                break;
            case 5:
                be[SicCategoryType.Td35.value] = SicCategoryType.Td35.fixOdds;
                break;
            case 6:
                be[SicCategoryType.Td36.value] = SicCategoryType.Td36.fixOdds;
                break;
            default:
                break
            }
            break;
        case 4:
            switch (bf) {
            case 5:
                be[SicCategoryType.Td45.value] = SicCategoryType.Td45.fixOdds;
                break;
            case 6:
                be[SicCategoryType.Td46.value] = SicCategoryType.Td46.fixOdds;
                break;
            default:
                break
            }
            break;
        case 5:
            switch (bf) {
            case 6:
                be[SicCategoryType.Td56.value] = SicCategoryType.Td56.fixOdds;
                break;
            default:
                break
            }
            break
        }
    };
    var ai;
    var ae = function(be) {
        JCache.get("#gameInfoWin > div > p").html(be);
        JCache.get("#gameInfoWin").css("display", "flex");
        if (ai) {
            clearTimeout(ai)
        }
        ai = setTimeout(function() {
            h()
        }, 3000)
    };
    var h = function() {
        JCache.get("#gameInfoWin").css("display", "none")
    };
    var D;
    var J = function(be) {
        JCache.get("#gameInfo > div > p").html(be);
        JCache.get("#gameInfo").css("display", "flex");
        if (D) {
            clearTimeout(D)
        }
        D = setTimeout(function() {
            a0()
        }, 2000)
    };
    var a0 = function() {
        JCache.get("#gameInfo").css("display", "none")
    };
    var G;
    var a3 = function(be) {
        az();
        JCache.get("#gameInfoSuccess > div > p").html(be);
        JCache.get("#gameInfoSuccess").css("display", "flex");
        if (G) {
            clearTimeout(G)
        }
        G = setTimeout(function() {
            Z()
        }, 2000)
    };
    var Z = function() {
        JCache.get("#gameInfoSuccess").css("display", "none")
    };
    var aT;
    var w = function(be) {
        Z();
        JCache.get("#gameInfoUnsuccessful > div > p").html(be);
        JCache.get("#gameInfoUnsuccessful").css("display", "flex");
        if (aT) {
            clearTimeout(aT)
        }
        aT = setTimeout(function() {
            az()
        }, 2000)
    };
    var az = function() {
        JCache.get("#gameInfoUnsuccessful").css("display", "none")
    };
    var H;
    var O = -1;
    var s = function(bf) {
        if (bf == O) {
            return
        }
        if (bf < (PageSetting.alarmRoundIndex.value - 1)) {
            O = -1;
            return
        }
        O = bf;
        Z();
        W();
        var be = "";
        if (JCache.get("#setChips").css("display") != "none") {
            be = "#chipIdleRed"
        } else {
            be = "#gameInfoRed"
        }
        JCache.get(be + " > div > p").html(I18N.get("form.text.noBetOver" + (bf - 1)));
        JCache.get(be).css("display", "flex");
        if (H) {
            clearTimeout(H)
        }
        if (bf > PageSetting.alarmRoundIndex.value) {
            postAjax({
                url: "/player/update/sendNoBetRoundAlarm",
                data: {
                    domainType: PageConfig.dealerDomain,
                    tableID: bb[0].currentTable.currentTableID,
                    gameShoe: bb[0].currentTable.currentGameShoe,
                    gameRound: bb[0].currentTable.currentGameRound,
                },
                success: function(bg) {}
            });
            H = setTimeout(function() {
                location = PageConfig.playerIndexPage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
            }, 2000)
        }
        H = setTimeout(function() {
            JCache.get(be).css("display", "none")
        }, 2500)
    };
    var aO;
    var aS = function(be) {
        JCache.get("#chipInfoRed > div > p").html(be);
        JCache.get("#chipInfoRed").css("display", "flex");
        if (aO) {
            clearTimeout(aO)
        }
        aO = setTimeout(function() {
            W()
        }, 2000)
    };
    var W = function() {
        JCache.get("#chipInfoRed").css("display", "none")
    };
    var t = function(bf, be, bh, bi) {
        if (typeof bf == "undefined") {
            return
        }
        if (bd != bb[0].currentTable.currentGameRound) {
            return
        }
        JCache.get("#warnBigSmall").html(bh);
        JCache.get("#warnOddEven").html(bi);
        if (bf != "" && bf.length == 3) {
            var bg = JCache.get("#lastResult li");
            bg.eq(0).prop("class", aW[bf[0]]);
            bg.eq(1).prop("class", aW[bf[1]]);
            bg.eq(2).prop("class", aW[bf[2]]);
            JCache.get("#totalPoint").html(be)
        }
    };
    var q = function() {
        var be = JCache.get("#lastResult").find("li");
        be.eq(0).prop("class", aW[0]);
        be.eq(1).prop("class", aW[0]);
        be.eq(2).prop("class", aW[0]);
        JCache.get("#warnBigSmall").html("&nbsp;");
        JCache.get("#warnOddEven").html("&nbsp;");
        JCache.get("#totalPoint").html("")
    };
    var ab = function(bn) {
        var bi = bn.results;
        var bp = bn.gameRound;
        var bo = -1;
        var be = aV[bn.tableID].tableSupportGame == TableSupportGameType.SicBo.value ? true : false;
        var bj = JCache.get("#historyZone");
        for (var bm = 0, bf = bi.length; bm < bf; bm++) {
            if (bm == 0) {
                bo = bi.length
            }
            var bh = bi[bm];
            var bg = bh.dices.split("#");
            var bl = "&nbsp;";
            var bk = "&nbsp;";
            if (!(bg[0] == bg[1] && bg[1] == bg[2])) {
                if ("Big" == bh.bigSmallType) {
                    bl = I18N.get("form.text.sicCategory.big")
                } else {
                    bl = I18N.get("form.text.sicCategory.small")
                }
                if ("Even" == bh.oddEvenType) {
                    bk = I18N.get("form.text.sicCategory.even")
                } else {
                    bk = I18N.get("form.text.sicCategory.odd")
                }
            }
            bj.children().eq(bm).css("display", "flex");
            JCache.get("#historyRound" + bo).html(bh.gameRound);
            JCache.get("#historyDices" + bo).children().eq(0).removeClass().addClass(aW[bg[0]]);
            JCache.get("#historyDices" + bo).children().eq(1).removeClass().addClass(aW[bg[1]]);
            JCache.get("#historyDices" + bo).children().eq(2).removeClass().addClass(aW[bg[2]]);
            JCache.get("#historyPoint" + bo).text(bh.totalPoint);
            JCache.get("#historyType" + bo).children().eq(0).html(bl);
            JCache.get("#historyType" + bo).children().eq(1).html(bk);
            if (be) {
                JCache.get("#historyType" + bo).children().eq(1).css("display", "block")
            } else {
                JCache.get("#historyType" + bo).children().eq(1).css("display", "none")
            }
            bo--
        }
    };
    var g = function() {
        var be = JCache.get("#historyZone");
        for (var bf = 1; bf < 6; bf++) {
            be.children().eq(bf - 1).css("display", "none");
            JCache.get("#historyRound" + bf).text("");
            JCache.get("#historyDices" + bf).children().eq(0).removeClass();
            JCache.get("#historyDices" + bf).children().eq(1).removeClass();
            JCache.get("#historyDices" + bf).children().eq(2).removeClass();
            JCache.get("#historyPoint" + bf).text("");
            JCache.get("#historyType" + bf).children().eq(0).text("");
            JCache.get("#historyType" + bf).children().eq(1).text("")
        }
    };
    var E = function(bm) {
        var bk = $j.parseJSON(bm.message);
        if ($j.isEmptyObject(bk)) {
            return
        }
        var be = aH;
        var bi = bk.markerRoads;
        if (X != bk.tableID || ar != bk.gameShoe || bk.repaintTime > aj) {
            X = bk.tableID;
            ar = bk.gameShoe;
            aH = 0;
            aj = bk.repaintTime;
            JCache.get("#oddEvenRoadCurrentTable tr > td").removeClass("textBoldBlue textBoldRed textBoldGreen");
            JCache.get("#bigSmallRoadCurrentTable tr > td").removeClass("textBoldBlue textBoldRed textBoldGreen");
            JCache.get("#sumRoadCurrentTable tr > td").removeClass("textBlue-S");
            JCache.get("#diceRoadCurrentTable tr > td").removeClass("textBlue-XS");
            ax = (bk.markerRoads.length > 0) ? bk.markerRoads[0].showX : 0;
            I = ax;
            am = (bk.bigSmallRoads.length > 0) ? bk.bigSmallRoads[0].showX : 0;
            a = (bk.oddEvenRoads.length > 0) ? bk.oddEvenRoads[0].showX : 0;
            if (l.oddEvenRoadPosition < 0) {
                $j("#oddEvenRoadPositionDiv").animate({
                    left: "+=" + Math.abs(l.oddEvenRoadPosition) + "px"
                });
                l.oddEvenRoadPosition = 0
            }
            if (l.bigSmallRoadPosition < 0) {
                $j("#bigSmallRoadPositionDiv").animate({
                    left: "+=" + Math.abs(l.bigSmallRoadPosition) + "px"
                });
                l.bigSmallRoadPosition = 0
            }
            if (l.sumRoadPosition < 0) {
                $j("#sumRoadPositionDiv").animate({
                    left: "+=" + Math.abs(l.sumRoadPosition) + "px"
                });
                l.sumRoadPosition = 0
            }
            if (l.diceRoadPosition < 0) {
                $j("#diceRoadPositionDiv").animate({
                    left: "+=" + Math.abs(l.diceRoadPosition) + "px"
                });
                l.diceRoadPosition = 0
            }
            u.oddEvenRoadStampTime = 0;
            u.bigSmallRoadStampTime = 0;
            u.sumRoadStampTime = 0;
            u.diceRoadStampTime = 0;
            f(bk);
            return
        }
        if (bd != bb[0].currentTable.currentGameRound) {
            bd = bb[0].currentTable.currentGameRound;
            ab(bk)
        }
        for (var bj = 0, bf = bi.length; bj < bf; bj++) {
            var bl = bi[bj];
            ax = (bl.showX > ax) ? bl.showX : ax;
            I = (bl.showX > I) ? bl.showX : I;
            JCache.get("#sumRoadTd_" + bl.showX + "_" + bl.showY).trigger("resultPaint", {
                results: bl.totalValue
            });
            JCache.get("#diceRoadTd_" + bl.showX + "_" + bl.showY).trigger("resultPaint", {
                results: bl.dices
            })
        }
        var bg = bk.bigSmallRoads;
        for (var bj = 0, bf = bg.length; bj < bf; bj++) {
            var bl = bg[bj];
            am = (bl.showX > am) ? bl.showX : am;
            JCache.get("#bigSmallRoadTd_" + bl.showX + "_" + bl.showY).trigger("resultPaint", {
                results: bl.bigSmall
            })
        }
        var bh = bk.oddEvenRoads;
        for (var bj = 0, bf = bh.length; bj < bf; bj++) {
            var bl = bh[bj];
            a = (bl.showX > a) ? bl.showX : a;
            JCache.get("#oddEvenRoadTd_" + bl.showX + "_" + bl.showY).trigger("resultPaint", {
                results: bl.oddEven
            });
            aH = Math.max(aH, bl.stampTime)
        }
        aH = Math.max(aH, be);
        f(bk)
    };
    var f = function(be) {
        u.oddEvenRoadStampTime = T(be.oddEvenRoads, u.oddEvenRoadStampTime, a, "oddEvenRoadPosition");
        u.bigSmallRoadStampTime = T(be.bigSmallRoads, u.bigSmallRoadStampTime, am, "bigSmallRoadPosition");
        u.sumRoadStampTime = T(be.markerRoads, u.sumRoadStampTime, ax, "sumRoadPosition");
        u.diceRoadStampTime = T(be.markerRoads, u.diceRoadStampTime, I, "diceRoadPosition")
    };
    var aQ = 25;
    var aA = 22.7;
    var T = function(be, bg, bi, bf) {
        if (be.length > 0 && be[0].stampTime > bg && bi >= aQ) {
            var bh = bi - aQ + (l[bf] / aA);
            bh += 1;
            bh = bh * aA;
            JCache.get("#roadRight").trigger("click", [bh, bf]);
            return be[0].stampTime
        }
        return bg
    };
    var aC = function(be) {
        postAjax({
            url: "/casino/sexy/player/query/.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: bb[0].currentTable.currentTableID,
                betLimitID: be
            },
            success: function(bf) {
                if (bf == null) {
                    return
                }
                if (bf.status != "200") {
                    for (var bg = 0, bj = bb[0].userTxns.length; bg < bj; bg++) {
                        var bk = SicCategoryType.getInstance(bg);
                        var bh = "#range_" + bk.maxBet.replace("MaxBet", "");
                        JCache.get(bh).text("0-0")
                    }
                    return
                }
                var bi = $j.parseJSON(bf.message);
                for (var bg = 0, bj = SicCategoryType.getLength(); bg < bj; bg++) {
                    var bk = SicCategoryType.getInstance(bg);
                    var bh = "#range_" + bk.maxBet.replace("MaxBet", "");
                    JCache.get(bh).text(CurrencyUtil.format(bi[bk.minBet]) + " - " + CurrencyUtil.format(bi[bk.maxBet]))
                }
            }
        })
    };
    var aZ = function() {
        var be = PageConfig.userBetLimitID;
        if (aB.containsKey(bb[0].currentTable.currentTableID)) {
            be = aB.get(bb[0].currentTable.currentTableID)
        } else {
            aB.put(bb[0].currentTable.currentTableID, be)
        }
        postAjax({
            url: "/casino/sexy/player/query/querySicBetLimit.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: bb[0].currentTable.currentTableID,
                betLimitID: be
            },
            success: function(bf) {
                if (bf == null) {
                    return
                }
                if (bf.status != "200") {
                    for (var bg = 0, bj = bb[0].userTxns.length; bg < bj; bg++) {
                        bb[0].userTxns[bg].maxBet = 0;
                        bb[0].userTxns[bg].minBet = 0;
                        JCache.get("#betRange").text("0-0")
                    }
                    return
                }
                var bi = $j.parseJSON(bf.message);
                JCache.get("#betRange").text(CurrencyUtil.showAmount(bi.minBet) + "-" + CurrencyUtil.showAmount(bi.maxBet));
                for (var bg = 0, bj = SicCategoryType.getLength(); bg < bj; bg++) {
                    var bk = SicCategoryType.getInstance(bg);
                    var bh = "#range_" + bk.maxBet.replace("MaxBet", "");
                    JCache.get(bh).text(CurrencyUtil.format(bi[bk.minBet]) + " - " + CurrencyUtil.format(bi[bk.maxBet]));
                    if (bb[0].userTxns[bg].maxBet != bi[bk.maxBet]) {
                        bb[0].userTxns[bg].maxBet = bi[bk.maxBet]
                    }
                    if (bb[0].userTxns[bg].minBet != bi[bk.minBet]) {
                        bb[0].userTxns[bg].minBet = bi[bk.minBet]
                    }
                }
            }
        })
    };
    var o = function() {
        if (!bb[0].currentTable.currentGameShoe || isNaN(bb[0].currentTable.currentGameShoe)) {
            return
        }
        if (!bb[0].currentTable.currentGameRound || isNaN(bb[0].currentTable.currentGameRound)) {
            return
        }
        postAjax({
            url: "/casino/sexy/player/query/querySicTransactions.php",
            data: {
                domainType: PageConfig.dealerDomain,
                tableID: bb[0].currentTable.currentTableID,
                gameShoe: bb[0].currentTable.currentGameShoe,
                gameRound: bb[0].currentTable.currentGameRound
            },
            success: function(be) {
                if (be == null) {
                    return
                }
                if (be.idleCount) {
                    s(be.idleCount)
                }
                for (var bf = 0, bi = bb[0].userTxns.length; bf < bi; bf++) {
                    bb[0].userTxns[bf].stake = 0
                }
                var bh = 0;
                var bk = be.sicTxns;
                for (var bg in bk) {
                    var bj = bb[0].userTxns[SicCategoryType[bk[bg].category].value];
                    bj.stake = MathUtil.decimal.add(bj.stake, bk[bg].stake);
                    bh = MathUtil.decimal.add(bh, bk[bg].stake)
                }
                JCache.get("#playerTotalCurrentBet").html(CurrencyUtil.format(bh));
                aG()
            },
            error: function(bg, be, bf) {
                Trace.log(bg.status);
                Trace.log(bf);
                return
            }
        })
    };
    var y = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryTableListInfoV2.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        tableID: bb[0].currentTable.currentTableID
                    },
                    success: function(bo) {
                        if (bo == null || jQuery.isEmptyObject(bo)) {
                            return
                        }
                        var be = [];
                        var bm = bo.currentSingleTableID;
                        for (var bj = 0; bj < bo.message.length; bj++) {
                            var bn = bo.message[bj];
                            var bg = TableSupportGameType.getInstance(bn.tableSupportGame).isMax;
                            if (bg) {
                                return
                            }
                            if (typeof aV[bn.tableID] == "undefined" || typeof aV[bn.tableID].domRoadID == "undefined" || typeof aV[bn.tableID].domRoadID.prop("id") == "undefined") {
                                aV[bn.tableID].displayiFrame = "empty";
                                aV[bn.tableID].domRoadID = $j("#gameTableList").contents().find("#tableID" + bn.tableID);
                                aV[bn.tableID].domDealerID = aV[bn.tableID].domRoadID.find("#dealerID");
                                aV[bn.tableID].domDealerImage = aV[bn.tableID].domRoadID.find("#dealerImage")
                            } else {
                                aV[bn.tableID].currDealerID = bn.dealerID
                            }
                            if (bn.tableSupportGame == TableSupportGameType.Baccarat.value || bn.tableSupportGame == TableSupportGameType.DragonTiger.value || bn.tableSupportGame == TableSupportGameType.SicBo.value || bn.tableSupportGame == TableSupportGameType.FishPrawnCrab.value) {
                                aV[bn.tableID].maintenance = bn.maintenance;
                                if (!aV[bn.tableID].maintenance) {
                                    be.push(bn.tableID)
                                }
                                quickBetGoodRoad.goodRoadMaintenance(bm, bn.tableID, bn.maintenance)
                            } else {}
                        }
                        if (quickBetGoodRoad.checkInitGameTableListFinish()) {
                            var bi = bo.event;
                            for (var bj = 0, bf = bi.length; bj < bf; bj++) {
                                quickBetEvent.queryDealerEventQuickBet($j.parseJSON(bi[bj].content), bo.timestamp, PageSetting.flashDelayTime.value)
                            }
                        }
                        be = ArrayUtil.distinct(be);
                        for (var bk in aV) {
                            if (ArrayUtil.contains(be, parseInt(bk))) {
                                if (aV[bk].displayiFrame != "" || aV[bk].displayiFrame == "empty") {
                                    aV[bk].displayiFrame = "";
                                    aV[bk].domRoadID.css("display", "")
                                }
                                if (aV[bk].origDealerID != aV[bk].currDealerID) {
                                    aV[bk].origDealerID = aV[bk].currDealerID;
                                    var bh = "　";
                                    if (aV[bk].currDealerID) {
                                        bh = aV[bk].currDealerID.split("/")[0];
                                        bh = bh ? bh : "　"
                                    }
                                    aV[bk].domDealerImage.prop("src", "/images/player/dealers/" + PageConfig.dealerDomain + "/" + bh.trim().toUpperCase() + ".jpg");
                                    aV[bk].domDealerID.html(bh)
                                }
                            } else {
                                if (aV[bk].displayiFrame != "none" || aV[bk].displayiFrame == "empty") {
                                    aV[bk].displayiFrame = "none";
                                    aV[bk].domRoadID.css("display", "none")
                                }
                            }
                        }
                        if (typeof bm != "undefined" && bm != -1) {
                            if (!aV[bm].maintenance) {
                                if (bb[0].maintenance == true || bb[0].maintenance == null) {
                                    bb[0].maintenance = false;
                                    aq()
                                }
                            } else {
                                if (bb[0].maintenance == false || bb[0].maintenance == null) {
                                    bb[0].maintenance = true;
                                    e()
                                }
                            }
                            if (bm != bb[0].currentTable.currentTableID) {
                                chooseTableChannel(bb[0].currentTable.currentTableID, aV[bb[0].currentTable.currentTableID].tableSupportGame)
                            }
                            aV[bm].displayiFrame = "none";
                            aV[bm].domRoadID.css("display", "none");
                            if (JCache.get("#currentDealerID").text() != aV[bm].currDealerID) {
                                JCache.get("#currentDealerID").text(aV[bm].currDealerID)
                            }
                        } else {
                            for (var bl in aV) {
                                if (aV[bl].maintenance == "0") {
                                    chooseTableChannel(aV[bl].tableID, aV[bl].tableSupportGame);
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
            var be = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    be.check()
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
            var be = JCache.get("#video-canvas-box");
            var bf = JCache.get("#video");
            var bg = be.width() * 1.4;
            bf.css("width", bg);
            bf.css("height", (be.height() * 1.35));
            bf.css("margin-top", "calc(55% - " + (bg - 100) + "px/2)");
            bf.css("margin-left", "calc(50% - " + (bg + 10) + "px/2)");
            this.play(this.line, PageConfig.currentSingleTableId)
        },
        setEnableVideo: function() {},
        changeEnableVideo: function(be) {},
        play: function(bf, bg) {
            if (this.playerObj == null) {
                return
            }
            this.stop();
            var be = "https://" + this.streamingPrefix[bf] + this.mapping["w" + bg][bf] + this.streamingSuffix[bf];
            this.load(be);
            this.checkReadyState();
            if (this.line == 1) {
                var bh = this.playerObj;
                setTimeout(function() {
                    bh.Pause();
                    setTimeout(function() {
                        bh.Resume()
                    }, 1000)
                }, 1000)
            }
            this.streamA.send({
                project: "BACCARATMX",
                streamname: this.mapping["w" + bg][bf],
                cdn: this.streamingPrefix[bf],
                uid: PageConfig.userID,
                player: "WEB"
            });
            this.line = bf;
            JCache.get("#changeLine").html(this.line + 1)
        },
        load: function(be) {
            this.playerObj.InitConnect("video", be, this.maxSeekSec[this.line]);
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
            var bf = this.line;
            for (var be = 0; be < this.streamingPrefix.length; be++) {
                bf = bf + 1;
                if (bf >= this.streamingPrefix.length) {
                    bf = 0
                }
                if (1 == PageConfig.lineStatusJson[bf]) {
                    break
                }
            }
            this.line = bf;
            this.play(this.line, bb[0].currentTable.currentTableID)
        },
        getNewLine: function() {
            var bf = 0;
            for (var be = 0; be < this.streamingPrefix.length; be++) {
                if (1 == PageConfig.lineStatusJson[be]) {
                    bf = be;
                    break
                }
            }
            return bf
        },
        currentLine: function() {
            return this.line
        },
        checkReadyState: function() {
            if (!this.streamAlive() && this.retry < 5) {
                JCache.get("#video").css("z-index", "-1");
                JCache.get("#video").css("display", "none");
                JCache.get("#loading").css("display", "");
                this.checkReadyStateID = setTimeout(function() {
                    videoCanvas.checkReadyState()
                }, 500)
            } else {
                JCache.get("#video").css("z-index", "");
                JCache.get("#video").css("display", "");
                JCache.get("#loading").css("display", "none")
            }
        },
        streamAlive: function() {
            var be = this.playerObj.Player.readyState;
            if (be >= 2) {
                return true
            }
            return false
        },
        resume: function() {
            JCache.get("#video").css("display", "");
            JCache.get("div.video_box").removeClass("no_video");
            this.retry = 0;
            this.play(this.line, bb[0].currentTable.currentTableID)
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
    var v = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryBalanceV2.php",
                    data: {
                        dm: PageConfig.dealerDomain
                    },
                    success: function(bf) {
                        if (bf == null || bf.status != "200") {
                            return
                        }
                        if (bf.systemMaintain == 1) {
                            location.href = PageConfig.playerMaintenancePage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
                        }
                        var be = $j.Event("updateBalance");
                        be.balance = bf.balance;
                        JCache.get("#userBalance").trigger(be)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var be = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    be.check()
                }, 1000)
            }
        }
    };
    var a7 = {
        cycleTime: 2,
        cycleTick: 0,
        execute: function() {
            var bf = aH - PageSetting.queryGapTime.value;
            bf = bf < 0 ? 0 : bf;
            var be = aj;
            be = be < 0 ? 0 : be;
            try {
                postAjax({
                    url: "/casino/sexy/player/query/querySicResultTrend.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        tableID: bb[0].currentTable.currentTableID,
                        queryResultTrendStampTime: bf,
                        queryRepaintStampTime: be
                    },
                    success: function(bg) {
                        if (bg == null || bg.status != "200") {
                            return
                        }
                        E(bg)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var be = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    be.check()
                }, 1000)
            }
        }
    };
    var aP = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            var be = bb[0].dealerEventStampTime - PageSetting.queryGapTime.value;
            be = be < 0 ? 0 : be;
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryDealerEvent.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        queryTableID: bb[0].currentTable.currentTableID,
                        dealerEventStampTime: be
                    },
                    success: function(bf) {
                        V(bf)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var be = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    be.check()
                }, 1000)
            }
        }
    };
    var b = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                if (!bb[0].currentTable.currentGameShoe || isNaN(bb[0].currentTable.currentGameShoe)) {
                    return
                }
                if (!bb[0].currentTable.currentGameRound || isNaN(bb[0].currentTable.currentGameRound)) {
                    return
                }
                postAjax({
                    url: "/casino/sexy/player/query/queryTableCurrentBet.php",
                    data: {
                        domainType: PageConfig.dealerDomain,
                        tableID: bb[0].currentTable.currentTableID,
                        gameShoe: bb[0].currentTable.currentGameShoe,
                        gameRound: bb[0].currentTable.currentGameRound
                    },
                    success: function(be) {
                        av(be)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var be = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    be.check()
                }, 1000)
            }
        }
    };
    var av = function(bh) {
        if (bh == null || $j.isEmptyObject(bh)) {
            return
        }
        var bm = bh.tableID;
        var bp = bh.currentBet;
        var be = (PageConfig.dealerDomain == 0);
        if (!$j.isEmptyObject(bp)) {
            var bk = CurrencyType.getInstance(PageConfig.currencyId);
            var bg = MathUtil.decimal.multiply(bp.totalCurrentBet, bk.fixRate);
            var bn = 0;
            for (var bj = 0, bf = SicCategoryType.getLength(); bj < bf; bj++) {
                var bo = SicCategoryType.getInstance(bj);
                var bl = bo.name + "CurrentBet";
                var bi = MathUtil.decimal.multiply(bp[bl], bk.fixRate);
                if (StringUtil.startsWith(bo.name, "Any") || (StringUtil.startsWith(bo.name, "T") && !StringUtil.startsWith(bo.name, "Td"))) {
                    bn += bi
                }
                JCache.get("#" + bl).find("dd").eq(0).html(MathUtil.currentBetAmountShow(bi, bg, "%", be))
            }
            JCache.get("#TripleCurrentBet").find("dd").eq(0).html(MathUtil.currentBetAmountShow(bn, bg, "%", be))
        }
    };
    singleSicTable.chooseTableChannel = function(be, bf) {
        aB.put(be, bf);
        chooseTableChannel(be)
    }
    ;
    singleSicTable.hideTableList = function() {
        PageUtil.callGameTableListWebIframe("quickBetAllClose", {});
        JCache.get("#gameTableList").css("visibility", "hidden")
    }
    ;
    singleSicTable.checkRoadGameRound = function(be) {
        return quickBetGoodRoad.checkRoadGameRound(bb[0].currentTable.currentGameRound, be)
    }
    ;
    singleSicTable.triggerMainRoad = function(bg, bh, bf, be, bi) {
        quickBetGoodRoad.triggerMainRoad(bg, bh, bf, be, bi)
    }
    ;
    singleSicTable.triggerGoodRoadAdd = function(bg, bf, be) {
        quickBetGoodRoad.triggerGoodRoadAdd(bg, bf, be)
    }
    ;
    singleSicTable.triggerGoodRoadDel = function(bg, bf, be) {
        quickBetGoodRoad.triggerGoodRoadDel(bg, bf, be)
    }
    ;
    singleSicTable.triggerGoodRoadAllDel = function(be) {
        quickBetGoodRoad.triggerGoodRoadAllDel(be)
    }
    ;
    singleSicTable.triggerMainRoadAnimeRight = function(bg, bf, be) {
        quickBetGoodRoad.triggerMainRoadAnimeRight(bg, bf, be)
    }
    ;
    singleSicTable.triggerMainRoadAnimeLeft = function(bf, be) {
        quickBetGoodRoad.triggerMainRoadAnimeLeft(bf, be)
    }
    ;
    checkAddOrConfirmStake = function(be) {
        var bg = PageConfig.userBetLimitID;
        if (aB.containsKey(be)) {
            bg = aB.get(be)
        }
        var bf = {};
        bf.amount = p.amount;
        bf.unconfirmSubmitStake = bc;
        bf.userBetLimitID = bg;
        return bf
    }
}
)();
