if (typeof (gamehall) == "undefined") {
    gamehall = {}
}
(function() {
    var u = {};
    var i = {};
    var j = [];
    var x = [];
    var l = 0;
    var d = function(B) {
        JCache.get("#userBalance").html(CurrencyUtil.parseToAmountFormat(B.balance))
    };
    gamehall.init = function() {
        $j(window).resize(function() {
            //ResizeUtil.doResize()
        });
        JCache.get("#noshowalert").bind("click", g);
        JCache.get("#userBalance").bind("updateBalance", d);
        $j("#chipsSet").bind("click", function() {
            JCache.get("#transHistory").css("visibility", "hidden");
            JCache.get("#guideBac").css("display", "none");
            JCache.get("#guideDra").css("display", "none");
            JCache.get("#guideSic").css("display", "none");
            JCache.get("#guideFpc").css("display", "none");
            JCache.get("#gamehallPopupLimit").css("display", "none");
            q.setBetLimitSetting(PageConfig.userBetLimitID);
            JCache.get("#gamehallLimitChips").css("display", "")
        });
        JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off");
        JCache.get("#streamingAudio").bind("click", function() {
            if (PageConfig.enableMexicoWebHls == "1") {
                videoCanvas.changeStreamingAudio()
            } else {
                n()
            }
        });
        JCache.get("#resultSound").removeClass().addClass(PageConfig.resultSound == "1" ? "switch_on" : "switch_off");
        JCache.get("#resultSound").bind("click", function() {
            h()
        });
        JCache.get("#bettingSound").removeClass().addClass(PageConfig.bettingSound == "1" ? "switch_on" : "switch_off");
        JCache.get("#bettingSound").bind("click", function() {
            r()
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
                y()
            })
        }
        JCache.get("#backgroundMusic").removeClass().addClass(PageConfig.backgroundMusic == "1" ? "switch_on" : "switch_off");
        JCache.get("#backgroundMusic").bind("click", function() {
            c()
        });
        j = $j.parseJSON(PageConfig.speedTableIDs);
        x = $j.parseJSON(PageConfig.insuranceTableIDs);
        if (PageConfig.enableMexicoWebHls == "1") {
            w()
        } else {
            if (swfobject.getFlashPlayerVersion().major == 0) {
                return
            }
            var D = {
                quality: "high",
                bgcolor: "#000000",
                allowFullScreen: "true",
                allowscriptaccess: "sameDomain",
                wmode: "opaque"
            };
            var C = {
                id: "baccarat",
                name: "baccarat"
            };
            var B = {
                lang: "CN",
                user: "userUID",
                country: PageConfig.userCountry,
                turl: "/test/tokenService/createToken?testID=streaming",
                agentid: "xxx",
                table: PageConfig.dealerDomain == 0 ? "Inm" : "m8",
                mute: "1",
                volume: "5",
                line: "1"
            };
            swfobject.embedSWF(PageConfig.dealerDomain == 0 ? "/flash/Bavet.swf" : "/flash/Baccarat.swf", "baccarat", "391", "244", "18.3.0", "playerProductInstall.swf", B, D, C, function(E) {
                if (E.success) {
                    w()
                }
            })
        }
    }
    ;
    var n = function() {
        PageConfig.streamingAudio = PageConfig.streamingAudio == "1" ? "0" : "1";
        PlayerSettingUtil.changeStreamingAudio(PageConfig.streamingAudio);
        JCache.get("#streamingAudio").removeClass().addClass(PageConfig.streamingAudio == "1" ? "switch_on" : "switch_off")
    };
    var h = function() {
        PageConfig.resultSound = PageConfig.resultSound == "1" ? "0" : "1";
        PlayerSettingUtil.changeResultSound(PageConfig.resultSound);
        JCache.get("#resultSound").removeClass().addClass(PageConfig.resultSound == "1" ? "switch_on" : "switch_off")
    };
    var r = function() {
        PageConfig.bettingSound = PageConfig.bettingSound == "1" ? "0" : "1";
        PlayerSettingUtil.changeBettingSound(PageConfig.bettingSound);
        JCache.get("#bettingSound").removeClass().addClass(PageConfig.bettingSound == "1" ? "switch_on" : "switch_off")
    };
    var c = function() {
        PageConfig.backgroundMusic = PageConfig.backgroundMusic == "1" ? "0" : "1";
        PlayerSettingUtil.changeBackgroundMusic(PageConfig.backgroundMusic);
        JCache.get("#backgroundMusic").removeClass().addClass(PageConfig.backgroundMusic == "1" ? "switch_on" : "switch_off");
        JCache.get("#soundBackGroundMusic").prop("muted", PageConfig.backgroundMusic == "1" ? 0 : 1)
    };
    var A = function(M, H, F) {
        u[H] = {};
        u[H] = JCache.clone("#tempTableBox").removeAttr("id").css("display", "none");
        u[H].dealerDomain = M;
        u[H].tableSupportGame = F;
        u[H].tableSupportGameName = (F == TableSupportGameType.DragonTiger.value ? "dra" : "bac");
        u[H].tableID = H;
        u[H].origMaintenance = "";
        u[H].currMaintenance = "";
        u[H].currentShoe = -1;
        u[H].currentRound = -1;
        u[H].lastResultShoe = -1;
        u[H].lastResultRound = -1;
        u[H].stampTime = 0;
        u[H].origDealerID = "";
        u[H].currDealerID = "";
        u[H].bigShowX = 0;
        u[H].bigPosition = 0;
        u[H].latestBigStampTime = 0;
        u[H].baccaratRepaintTime = 0;
        u[H].domTableID = u[H].find("#tableID");
        u[H].domTableID.html(I18N.get("form.text.table") + H);
        u[H].shuffle = 0;
        u[H].domShuffle = u[H].find(".game_info");
        u[H].domDealerImage = u[H].find("#dealerImage");
        u[H].domDealerImage.prop("src", "/casino/sexy/images/player/dealer.jpg");
        if (PageConfig.userBetLimitID == 0) {} else {
            u[H].domDealerImage.bind("click", function() {
                z(H)
            })
        }
        u[H].domDealerID = u[H].find("#dealerID");
        u[H].domDealerID.html("");
        u[H].domRedirect = u[H].find("#redirect");
        if (PageConfig.userBetLimitID == 0) {} else {
            u[H].domRedirect.bind("click", function() {
                z(H)
            })
        }
        u[H].tableBetLimitID = "";
        u[H].domTableBetLimit = u[H].find("#tableBetLimit");
        u[H].domTableBetLimit.bind("click", a(H));
        u[H].domUlBetLimits = u[H].find("#betLimits");
        var D = $j(document.createDocumentFragment());
        var G = JCache.clone("#liCloseTemplate").removeAttr("id");
        G.bind("click", a(H));
        D.append(G);
        for (var L in i) {
            var B = JCache.clone("#liTemplate").removeAttr("id");
            var K = i[L].minBet;
            var N = i[L].maxBet;
            if (F == TableSupportGameType.SicBo.value || F == TableSupportGameType.FishPrawnCrab.value) {
                K = i[L].sicMinBet;
                N = i[L].sicMaxBet
            } else {
                if (F == TableSupportGameType.Roulette.value) {
                    K = i[L].rouMinBet;
                    N = i[L].rouMaxBet
                }
            }
            B.children().eq(0).html(CurrencyUtil.format(K) + "-" + CurrencyUtil.format(N));
            B.bind("click", b(H, L));
            D.append(B)
        }
        u[H].domUlBetLimits.append(D);
        u[H].domDivBigRoad = u[H].find("#divBigRoad");
        if (F == TableSupportGameType.Baccarat.value) {
            if (ArrayUtil.contains(j, H)) {
                u[H].domDivBigRoad.addClass("speed_mode")
            } else {
                if (ArrayUtil.contains(x, H)) {
                    u[H].domDivBigRoad.addClass("ins_mode")
                } else {
                    u[H].domDivBigRoad.addClass("")
                }
            }
        } else {
            if (F == TableSupportGameType.DragonTiger.value) {
                u[H].children().eq(1).addClass("dragon_tiger");
                u[H].domDivBigRoad.addClass("dragon_tiger")
            } else {
                if (F == TableSupportGameType.SicBo.value) {
                    u[H].domDivBigRoad.addClass("sicbo")
                } else {
                    if (F == TableSupportGameType.FishPrawnCrab.value) {
                        u[H].domDivBigRoad.addClass("sicbo")
                    } else {
                        if (F == TableSupportGameType.Roulette.value) {
                            u[H].domDivBigRoad.addClass("sicbo")
                        }
                    }
                }
            }
        }
        if (PageConfig.userBetLimitID == 0) {} else {
            u[H].domDivBigRoad.bind("click", function() {
                z(H)
            })
        }
        u[H].domDivRoadCon = u[H].domDivBigRoad.find(".road_con");
        u[H].domBigRoad = u[H].find("#bigRoad");
        u[H].domBigRoad.prop("id", "tableID" + H);
        var E = $j(document.createDocumentFragment());
        if (F == TableSupportGameType.Baccarat.value || F == TableSupportGameType.DragonTiger.value || F == TableSupportGameType.Roulette.value) {
            for (var I = 0; I < PageSetting.maxRoadHeight.value; I++) {
                var C = JCache.clone("#bigRoadTrTemplate").prop("id", "bigTr");
                for (var J = 0; J < PageSetting.maxRoadWidth.value; J++) {
                    C.append(JCache.clone("#bigRoadTdTemplate").prop("id", "bigRoadTd_" + J + "_" + I).bind("resultPaint", RoadHandler.paintMainRoad).bind("resultPaintRou", RoadHandler.paintRouRedBlacklRoad).bind("addGoodRoad", RoadHandler.paintGoodRoadAdd).bind("delGoodRoad", RoadHandler.paintGoodRoadDel))
                }
                E.append(C)
            }
        } else {
            for (var I = 0; I < 3; I++) {
                var C = JCache.clone("#bigRoadTrTemplate").prop("id", "bigTr");
                for (var J = 1; J <= PageSetting.maxRoadWidth.value; J++) {
                    C.append(JCache.clone("#sicBigRoadTdTemplate1").prop("id", "bigRoadTd_" + J + "_" + I))
                }
                E.append(C)
            }
            for (var I = 3; I < PageSetting.maxRoadHeight.value; I++) {
                var C = JCache.clone("#bigRoadTrTemplate").prop("id", "bigTr");
                for (var J = 1; J <= PageSetting.maxRoadWidth.value; J++) {
                    C.append(JCache.clone("#sicBigRoadTdTemplate2").prop("id", "bigRoadTd_" + J + "_" + I))
                }
                E.append(C)
            }
        }
        u[H].domBigRoad.append(E);
        u[H].bankerCounts = 0;
        u[H].domBankerCounts = u[H].find("#bankerCounts");
        u[H].domBankerCounts.html("0");
        u[H].playerCounts = 0;
        u[H].domPlayerCounts = u[H].find("#playerCounts");
        u[H].domPlayerCounts.html("0");
        u[H].tieCounts = 0;
        u[H].domTieCounts = u[H].find("#tieCounts");
        u[H].domTieCounts.html("0");
        u[H].domGoodRoad = u[H].find("#goodRoad");
        u[H].goodRoadType = null;
        u[H].prevGoodRoadJson = "";
        u[H].currGoodRoadJson = ""
    };
    var a = function(B) {
        return function() {
            e(B)
        }
    };
    var e = function(B) {
        if (u[B].domUlBetLimits.css("display") == "none") {
            u[B].domUlBetLimits.css("display", "inline")
        } else {
            u[B].domUlBetLimits.css("display", "none")
        }
    };
    var b = function(B, C) {
        return function() {
            var F = u[B].tableSupportGame;
            var E = i[C].minBet;
            var D = i[C].maxBet;
            if (F == TableSupportGameType.SicBo.value || F == TableSupportGameType.FishPrawnCrab.value) {
                E = i[C].sicMinBet;
                D = i[C].sicMaxBet
            } else {
                if (F == TableSupportGameType.Roulette.value) {
                    E = i[C].rouMinBet;
                    D = i[C].rouMaxBet
                }
            }
            u[B].tableBetLimitID = C;
            u[B].domTableBetLimit.html(I18N.get("form.text.limit") + " : " + CurrencyUtil.format(E) + "-" + CurrencyUtil.format(D));
            u[B].domRedirect.click()
        }
    };
    var f = function(G, C, J, H, B, D, E) {
        if (typeof C != "undefined" && C.length > 0 && C[0].stampTime > J && H >= D) {
            J = C[0].stampTime;
            var I = H - D + (B / E);
            I += 1;
            I = I * E;
            var F = "-=" + I + "px";
            u[G].domDivRoadCon.animate({
                left: F
            });
            u[G].latestBigStampTime = J;
            u[G].bigPosition = B - I
        }
    };
    var p = function(I, H, C, D) {
        var F = JCache.get(I);
        var B = $j(document.createDocumentFragment());
        F.empty();
        var G = false;
        if (C) {
            for (var E in u) {
                if (u[E].tableSupportGame == H.value && ArrayUtil.contains(j, Number(E)) && !ArrayUtil.contains(x, Number(E))) {
                    G = true;
                    B.append(u[E])
                }
            }
        } else {
            if (D) {
                for (var E in u) {
                    if (u[E].tableSupportGame == H.value && !ArrayUtil.contains(j, Number(E)) && ArrayUtil.contains(x, Number(E))) {
                        G = true;
                        B.append(u[E])
                    }
                }
            } else {
                for (var E in u) {
                    if (u[E].tableSupportGame == H.value && !ArrayUtil.contains(j, Number(E)) && !ArrayUtil.contains(x, Number(E))) {
                        G = true;
                        B.append(u[E])
                    }
                }
            }
        }
        F.append(B)
    };
    var k = function() {
        var F = 0
          , B = 0
          , H = 0
          , L = 0
          , D = 0
          , J = 0
          , E = 0
          , I = 0;
        for (var K in u) {
            if (u[K].currMaintenance == "0") {
                if (u[K].tableSupportGame === TableSupportGameType.Baccarat.value) {
                    if (ArrayUtil.contains(x, u[K].tableID)) {
                        L++
                    } else {
                        if (ArrayUtil.contains(j, u[K].tableID)) {
                            B++
                        } else {
                            F++
                        }
                    }
                } else {
                    if (u[K].tableSupportGame === TableSupportGameType.DragonTiger.value) {
                        D++
                    } else {
                        if (u[K].tableSupportGame === TableSupportGameType.SicBo.value) {
                            J++
                        } else {
                            if (u[K].tableSupportGame === TableSupportGameType.FishPrawnCrab.value) {
                                E++
                            } else {
                                if (u[K].tableSupportGame === TableSupportGameType.Roulette.value) {
                                    I++
                                } else {}
                            }
                        }
                    }
                }
            }
        }
        JCache.get("#bacTableTitle").css("display", "none");
        JCache.get("#bacTableSpdTitle").css("display", "none");
        JCache.get("#bacTableInsTitle").css("display", "none");
        JCache.get("#draTableTitle").css("display", "none");
        JCache.get("#sicTableTitle").css("display", "none");
        JCache.get("#fpcTableTitle").css("display", "none");
        JCache.get("#rouTableTitle").css("display", "none");
        var C = [];
        if (F > 0) {
            C.push("#bacTableTitle")
        }
        if (B > 0) {
            C.push("#bacTableSpdTitle")
        }
        if (L > 0) {
            C.push("#bacTableInsTitle")
        }
        if (D > 0) {
            C.push("#draTableTitle")
        }
        if (J > 0) {
            C.push("#sicTableTitle")
        }
        if (E > 0) {
            C.push("#fpcTableTitle")
        }
        if (I > 0) {
            C.push("#rouTableTitle")
        }
        for (var G = 0; G < C.length; G++) {
            JCache.get(C[G]).css("display", "")
        }
    };
    var z = function(B) {
        if (!u[B].tableBetLimitID || u[B].tableBetLimitID <= 0) {
            return
        }
        postAjax({
            url: "update/setUserBetLimitID.php",
            data: {
                domainType: PageConfig.dealerDomain,
                betLimitID: u[B].tableBetLimitID
            },
            success: function(C) {
                if ($j.isEmptyObject(C) || C.status != "200") {
                    return
                }
                var D = u[B].tableSupportGame;
                if (D == TableSupportGameType.Baccarat.value || D == TableSupportGameType.DragonTiger.value) {
                    location.href = PageConfig.playerSinglePage + "?dm=" + PageConfig.dealerDomain + "&t=" + B + "&title=" + PageConfig.title
                } else {
                    if (D == TableSupportGameType.SicBo.value || D == TableSupportGameType.FishPrawnCrab.value) {
                        location.href = PageConfig.playerSingleSicPage + "?dm=" + PageConfig.dealerDomain + "&t=" + B + "&title=" + PageConfig.title
                    } else {
                        if (D == TableSupportGameType.Roulette.value) {
                            location.href = PageConfig.playerSingleRouPage + "?dm=" + PageConfig.dealerDomain + "&t=" + B + "&title=" + PageConfig.title
                        }
                    }
                }
            }
        })
    };
    var w = function() {
        postAjax({
            url: "query/queryGameHallActiveBetLimit.php",
            data: {
                domainType: PageConfig.dealerDomain
            },
            success: function(B) {
                if (B == null || B.status != "200") {
                    return
                }
                var C = $j.parseJSON(B.message);
                if (!$j.isEmptyObject(C)) {
                    $j.each(C, function(D, E) {
                        i[E.id] = {};
                        i[E.id].id = E.id;
                        i[E.id].maxBet = E.maxBet;
                        i[E.id].minBet = E.minBet;
                        i[E.id].minChip = E.minChip;
                        i[E.id].sicMaxBet = E.sicMaxBet;
                        i[E.id].sicMinBet = E.sicMinBet;
                        i[E.id].sicMinChip = E.sicMinChip;
                        i[E.id].rouMaxBet = E.rouMaxBet;
                        i[E.id].rouMinBet = E.rouMinBet;
                        i[E.id].rouMinChip = E.rouMinChip
                    })
                }
                q.init();
                if (PageConfig.enableMexicoWebHls == "1") {
                    videoCanvas.init()
                }
                if (PageConfig.userBetLimitID == 0 || PageConfig.userChips == "") {
                    q.setBetLimitSetting(PageConfig.userBetLimitID);
                    JCache.get("#gamehallLimitChips").css("display", "");
                    JCache.get("#gameMode").unbind("click")
                } else {
                    s.setBetLimitSetting(PageConfig.userBetLimitID);
                    s.init();
                    JCache.get("#gamehallLimitChips").css("display", "none");
                    JCache.get("#gameMode").bind("click", function() {
                        s.showMultiPopupBetLimit()
                    });
                    t.check();
                    m.check();
                    o.check();
                    TaskExecuter.execute()
                }
            }
        })
    };
    var t = {
        cycleTime: 5,
        cycleTick: 0,
        execute: function() {
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryGameHallTableListInfo.php",
                    data: {
                        domainType: PageConfig.dealerDomain
                    },
                    success: function(E) {
                        if (E == null || E.status != "200") {
                            return
                        }
                        var H = false;
                        var G = false;
                        var B = false;
                        var D = false;
                        var F = false;
                        var C = false;
                        $j.each($j.parseJSON($j.parseJSON(E.message)), function(K, L) {
                            var O = L.tableSupportGame;
                            if (O == TableSupportGameType.Baccarat.value) {
                                if (typeof u[L.tableID] == "undefined") {
                                    G = true;
                                    A(PageConfig.dealerDomain, L.tableID, L.tableSupportGame)
                                }
                            } else {
                                if (O == TableSupportGameType.DragonTiger.value) {
                                    if (typeof u[L.tableID] == "undefined") {
                                        B = true;
                                        A(PageConfig.dealerDomain, L.tableID, L.tableSupportGame)
                                    }
                                } else {
                                    if (O == TableSupportGameType.SicBo.value) {
                                        if (typeof u[L.tableID] == "undefined") {
                                            D = true;
                                            A(PageConfig.dealerDomain, L.tableID, L.tableSupportGame)
                                        }
                                    } else {
                                        if (O == TableSupportGameType.FishPrawnCrab.value) {
                                            if (typeof u[L.tableID] == "undefined") {
                                                F = true;
                                                A(PageConfig.dealerDomain, L.tableID, L.tableSupportGame)
                                            }
                                        } else {
                                            if (O == TableSupportGameType.Roulette.value) {
                                                if (typeof u[L.tableID] == "undefined") {
                                                    C = true;
                                                    A(PageConfig.dealerDomain, L.tableID, L.tableSupportGame)
                                                }
                                            } else {
                                                return
                                            }
                                        }
                                    }
                                }
                            }
                            u[L.tableID].currMaintenance = L.maintenance ? "1" : "0";
                            if (u[L.tableID].origMaintenance != u[L.tableID].currMaintenance) {
                                u[L.tableID].origMaintenance = u[L.tableID].currMaintenance;
                                H = true;
                                if (u[L.tableID].origMaintenance == "0") {
                                    u[L.tableID].css("display", "")
                                } else {
                                    u[L.tableID].css("display", "none")
                                }
                            }
                            u[L.tableID].currentShoe = L.currentGameShoe;
                            u[L.tableID].currentRound = L.currentGameRound;
                            u[L.tableID].lastResultShoe = L.currentGameShoe;
                            u[L.tableID].currDealerID = L.dealerID;
                            if (u[L.tableID].origDealerID != u[L.tableID].currDealerID) {
                                u[L.tableID].origDealerID = u[L.tableID].currDealerID;
                                var N = "";
                                if (u[L.tableID].currDealerID) {
                                    N = u[L.tableID].currDealerID.split("/")[0];
                                    N = N ? N : ""
                                } else {
                                    N = "　"
                                }
                                u[L.tableID].domDealerImage.prop("src", "/casino/sexy/images/player/dealers/" + PageConfig.dealerDomain + "/" + N.trim().toUpperCase() + ".jpg");
                                u[L.tableID].domDealerID.html(N)
                            }
                            if (u[L.tableID].tableBetLimitID == "") {
                                if (typeof i[PageConfig.userBetLimitID] != "undefined") {
                                    var J = i[PageConfig.userBetLimitID].minBet;
                                    var I = i[PageConfig.userBetLimitID].maxBet;
                                    if (O == TableSupportGameType.SicBo.value || O == TableSupportGameType.FishPrawnCrab.value) {
                                        J = i[PageConfig.userBetLimitID].sicMinBet;
                                        I = i[PageConfig.userBetLimitID].sicMaxBet
                                    } else {
                                        if (O == TableSupportGameType.Roulette.value) {
                                            J = i[PageConfig.userBetLimitID].rouMinBet;
                                            I = i[PageConfig.userBetLimitID].rouMaxBet
                                        }
                                    }
                                    u[L.tableID].tableBetLimitID = PageConfig.userBetLimitID;
                                    u[L.tableID].domTableBetLimit.html(I18N.get("form.text.limit") + " : " + CurrencyUtil.format(J) + "-" + CurrencyUtil.format(I))
                                } else {
                                    for (var M in i) {
                                        var J = i[M].minBet;
                                        var I = i[M].maxBet;
                                        if (O == TableSupportGameType.SicBo.value || O == TableSupportGameType.FishPrawnCrab.value) {
                                            J = i[M].sicMinBet;
                                            I = i[M].sicMaxBet
                                        } else {
                                            if (O == TableSupportGameType.Roulette.value) {
                                                J = i[M].rouMinBet;
                                                I = i[M].rouMaxBet
                                            }
                                        }
                                        s.setBetLimitSetting(M);
                                        u[L.tableID].tableBetLimitID = M;
                                        u[L.tableID].domTableBetLimit.html(I18N.get("form.text.limit") + " : " + CurrencyUtil.format(J) + "-" + CurrencyUtil.format(I));
                                        break
                                    }
                                }
                            }
                        });
                        if (G) {
                            p("#bacTable", TableSupportGameType.Baccarat, false, false);
                            p("#bacTableSpd", TableSupportGameType.Baccarat, true, false);
                            p("#bacTableIns", TableSupportGameType.Baccarat, false, true)
                        }
                        if (B) {
                            p("#draTable", TableSupportGameType.DragonTiger, false, false)
                        }
                        if (D) {
                            p("#sicTable", TableSupportGameType.SicBo, false, false)
                        }
                        if (F) {
                            p("#fpcTable", TableSupportGameType.FishPrawnCrab, false, false)
                        }
                        if (C) {
                            p("#rouTable", TableSupportGameType.Roulette, false, false)
                        }
                        if (H) {
                            k()
                        }
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var B = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    B.check()
                }, 1000)
            }
        }
    };
    var m = {
        cycleTime: 3,
        cycleTick: 0,
        execute: function() {
            var D = l - PageSetting.queryGapTime.value;
            D = D < 0 ? 0 : D;
            var E = [];
            for (var C in u) {
                var B = {};
                B.domainType = u[C].dealerDomain;
                B.tableID = u[C].tableID;
                if (u[C].stampTime > PageSetting.queryGapTime.value) {
                    B.stampTime = u[C].stampTime - PageSetting.queryGapTime.value
                } else {
                    B.stampTime = u[C].stampTime
                }
                E.push(B)
            }
            try {
                postAjax({
                    url: "/casino/sexy/player/query/queryActiveTableResultTrend.php",
                    data: {
                        tableLists: JSON.stringify(E)
                    },
                    success: function(F) {
                        v(F)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var B = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    B.check()
                }, 1000)
            }
        }
    };
    var v = function(E) {
        var Q = E.message;
        var J = l;
		//console.log(E);
        $j.each(Q.countdown, function(R, S) {
            u[S.tableID].currentRound = S.currentRound
        });
        if (!$j.isEmptyObject(Q.bigRoad)) {
            for (var G = 0; G < Q.bigRoad.length; G++) {
                var N = Q.bigRoad[G];
                if ($j.isEmptyObject(N)) {
                    continue
                }
                if (u[N.tableID].bankerCounts != N.winnerCounts[0]) {
                    u[N.tableID].bankerCounts = N.winnerCounts[0];
                    u[N.tableID].domBankerCounts.html(N.winnerCounts[0])
                }
                if (u[N.tableID].playerCounts != N.winnerCounts[1]) {
                    u[N.tableID].playerCounts = N.winnerCounts[1];
                    u[N.tableID].domPlayerCounts.html(N.winnerCounts[1])
                }
                if (u[N.tableID].tieCounts != N.winnerCounts[2]) {
                    u[N.tableID].tieCounts = N.winnerCounts[2];
                    u[N.tableID].domTieCounts.html(N.winnerCounts[2])
                }
                if (u[N.tableID].shuffle != N.shuffle) {
                    u[N.tableID].shuffle = N.shuffle;
                    if (u[N.tableID].shuffle == 1) {
                        u[N.tableID].domShuffle.css("display", "")
                    } else {
                        u[N.tableID].domShuffle.css("display", "none")
                    }
                }
                var H = u[N.tableID].tableSupportGame;
                u[N.tableID].lastResultRound = N.gameRound;
                if (u[N.tableID].tableID != N.tableID || u[N.tableID].lastResultShoe != N.gameShoe || (N.repaintTime > u[N.tableID].baccaratRepaintTime)) {
                    JCache.get("#tableID" + N.tableID + " #bigTr > td").removeClass();
                    JCache.get("#tableID" + N.tableID + " #bigTr > td > div").css("display", "none").removeClass();
                    JCache.get("#tableID" + N.tableID + " #bigTr > td > p").css("display", "none");
                    if (u[N.tableID].bigPosition < 0) {
                        var K = "+=" + Math.abs(u[N.tableID].bigPosition) + "px";
                        u[N.tableID].domDivRoadCon.animate({
                            left: K
                        })
                    }
                    u[N.tableID].bigPosition = 0;
                    u[N.tableID].latestBigStampTime = 0;
                    u[N.tableID].baccaratRepaintTime = N.repaintTime;
                    u[N.tableID].bigShowX = 0;
                    u[N.tableID].goodRoadType = null;
                    u[N.tableID].prevGoodRoadJson = "";
                    u[N.tableID].currGoodRoadJson = "";
                    l = 0;
                    continue
                }
                if (typeof N.mainRoads != "undefined") {
                    for (var F = 0; F < N.mainRoads.length; F++) {
                        var L = N.mainRoads[F];
                        if (L.showX > u[N.tableID].bigShowX) {
                            u[N.tableID].bigShowX = L.showX
                        }
                        JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_" + L.showY).trigger("resultPaint", {
                            tieCount: L.tieCount,
                            results: L.resultMainRoad
                        });
                        J = Math.max(J, L.stampTime)
                    }
                    u[N.tableID].stampTime = J;
                    if (u[N.tableID].currentRound != u[N.tableID].lastResultRound) {
                        if (u[N.tableID].goodRoadType != N.goodRoadType) {
                            u[N.tableID].goodRoadType = N.goodRoadType;
                            var P = "";
                            var I = GoodRoadType.getInstance(u[N.tableID].goodRoadType);
                            if (I != null) {
                                if (I == GoodRoadType.Road_1 || I == GoodRoadType.Road_2) {
                                    if (N.currGoodRoadJson != "") {
                                        var O = $j.parseJSON($j.parseJSON(N.currGoodRoadJson));
                                        if (!$j.isEmptyObject(O)) {
                                            P = "(" + O.length + ")"
                                        }
                                    }
                                }
                                u[N.tableID].domGoodRoad.css("display", "");
                                u[N.tableID].domGoodRoad.removeClass().addClass(I.className).html(I18N.get("form.text.goodRoad." + u[N.tableID].tableSupportGameName + "." + I.value) + P)
                            } else {
                                u[N.tableID].domGoodRoad.css("display", "none");
                                u[N.tableID].domGoodRoad.removeClass().html("")
                            }
                        }
                        if (u[N.tableID].prevGoodRoadJson != N.prevGoodRoadJson) {
                            u[N.tableID].prevGoodRoadJson = N.prevGoodRoadJson;
                            if (u[N.tableID].prevGoodRoadJson != "") {
                                var B = $j.parseJSON($j.parseJSON(u[N.tableID].prevGoodRoadJson));
                                if (!$j.isEmptyObject(B)) {
                                    $j.each(B, function(S, R) {
                                        JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + R.road).trigger("delGoodRoad", {
                                            type: R.type
                                        })
                                    })
                                }
                            }
                        }
                        if (u[N.tableID].currGoodRoadJson != N.currGoodRoadJson) {
                            u[N.tableID].currGoodRoadJson = N.currGoodRoadJson;
                            if (u[N.tableID].currGoodRoadJson != "") {
                                var B = $j.parseJSON($j.parseJSON(u[N.tableID].currGoodRoadJson));
                                if (!$j.isEmptyObject(B)) {
                                    var I = GoodRoadType.getInstance(u[N.tableID].goodRoadType);
                                    if (I != null && (I == GoodRoadType.Road_1 || I == GoodRoadType.Road_2)) {
                                        u[N.tableID].domGoodRoad.css("display", "");
                                        u[N.tableID].domGoodRoad.removeClass().addClass(I.className).html(I18N.get("form.text.goodRoad." + u[N.tableID].tableSupportGameName + "." + I.value) + "(" + B.length + ")")
                                    }
                                    $j.each(B, function(S, R) {
                                        JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + R.road).trigger("addGoodRoad", {
                                            type: R.type
                                        })
                                    })
                                }
                            }
                        }
                    }
                    f(N.tableID, N.mainRoads, u[N.tableID].latestBigStampTime, u[N.tableID].bigShowX, u[N.tableID].bigPosition, 10, 18)
                }
            }
        }
        if (!$j.isEmptyObject(Q.sicBigRoad)) {
            for (var G = 0; G < Q.sicBigRoad.length; G++) {
                var N = Q.sicBigRoad[G];
                if ($j.isEmptyObject(N)) {
                    continue
                }
                if (u[N.tableID].bankerCounts != N.winCounts[0]) {
                    u[N.tableID].bankerCounts = N.winCounts[0];
                    u[N.tableID].domBankerCounts.html(N.winCounts[0])
                }
                if (u[N.tableID].playerCounts != N.winCounts[1]) {
                    u[N.tableID].playerCounts = N.winCounts[1];
                    u[N.tableID].domPlayerCounts.html(N.winCounts[1])
                }
                if (u[N.tableID].tieCounts != N.winCounts[2]) {
                    u[N.tableID].tieCounts = N.winCounts[2];
                    u[N.tableID].domTieCounts.html(N.winCounts[2])
                }
                u[N.tableID].lastResultRound = N.gameRound;
                if (u[N.tableID].tableID != N.tableID || u[N.tableID].lastResultShoe != N.gameShoe) {
                    JCache.get("#tableID" + N.tableID + " #bigTr:eq(0) > td").removeClass();
                    JCache.get("#tableID" + N.tableID + " #bigTr:eq(1) > td").removeClass();
                    JCache.get("#tableID" + N.tableID + " #bigTr:eq(2) > td").removeClass();
                    JCache.get("#tableID" + N.tableID + " #bigTr:eq(3) > td").removeClass().html("");
                    JCache.get("#tableID" + N.tableID + " #bigTr:eq(4) > td").removeClass().html("");
                    JCache.get("#tableID" + N.tableID + " #bigTr:eq(5) > td").removeClass().html("");
                    if (u[N.tableID].bigPosition < 0) {
                        var K = "+=" + Math.abs(u[N.tableID].bigPosition) + "px";
                        u[N.tableID].domDivRoadCon.animate({
                            left: K
                        })
                    }
                    u[N.tableID].bigPosition = 0;
                    u[N.tableID].latestBigStampTime = 0;
                    u[N.tableID].bigShowX = 0;
                    u[N.tableID].goodRoadType = null;
                    u[N.tableID].prevGoodRoadJson = "";
                    u[N.tableID].currGoodRoadJson = "";
                    l = 0;
                    continue
                }
                if (typeof N.markerRoads != "undefined") {
                    var D = u[N.tableID].tableSupportGame == TableSupportGameType.SicBo.value ? true : false;
                    var M = null;
                    if (D) {
                        M = TableSupportGameType.SicBo.gamehallClass
                    } else {
                        M = TableSupportGameType.FishPrawnCrab.gamehallClass
                    }
                    for (var F = 0; F < N.markerRoads.length; F++) {
                        var L = N.markerRoads[F];
                        if (L.showX > u[N.tableID].bigShowX) {
                            u[N.tableID].bigShowX = L.showX
                        }
                        for (var C = 0; C < 3; C++) {
                            JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_" + C).addClass(M[L.dices[C]])
                        }
                        if (L.bigSmall.toLowerCase() == "small") {
                            JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_3").addClass("dot-s-blue").html(I18N.get("form.text.road.word.small"))
                        } else {
                            if (L.bigSmall.toLowerCase() == "big") {
                                JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_3").addClass("dot-s-red").html(I18N.get("form.text.road.word.big"))
                            }
                        }
                        if (D) {
                            if (L.oddEven.toLowerCase() == "odd") {
                                JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_4").addClass("dot-s-blue").html(I18N.get("form.text.road.word.odd"))
                            } else {
                                if (L.oddEven.toLowerCase() == "even") {
                                    JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_4").addClass("dot-s-red").html(I18N.get("form.text.road.word.even"))
                                }
                            }
                            JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_5").addClass((L.totalValue <= 10 ? "dot-s-blue" : "dot-s-red")).html(L.totalValue)
                        } else {
                            JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_4").addClass((L.totalValue <= 10 ? "dot-s-blue" : "dot-s-red")).html(L.totalValue)
                        }
                        J = Math.max(J, L.stampTime)
                    }
                }
                u[N.tableID].stampTime = J;
                f(N.tableID, N.markerRoads, u[N.tableID].latestBigStampTime, u[N.tableID].bigShowX, u[N.tableID].bigPosition, 10, 18)
            }
        }
        if (!$j.isEmptyObject(Q.rouBigRoad)) {
            for (var G = 0; G < Q.rouBigRoad.length; G++) {
                var N = Q.rouBigRoad[G];
                if ($j.isEmptyObject(N)) {
                    continue
                }
                if (u[N.tableID].bankerCounts != N.winCounts[0]) {
                    u[N.tableID].bankerCounts = N.winCounts[0];
                    u[N.tableID].domBankerCounts.html(N.winCounts[0])
                }
                if (u[N.tableID].playerCounts != N.winCounts[1]) {
                    u[N.tableID].playerCounts = N.winCounts[1];
                    u[N.tableID].domPlayerCounts.html(N.winCounts[1])
                }
                if (u[N.tableID].tieCounts != N.winCounts[2]) {
                    u[N.tableID].tieCounts = N.winCounts[2];
                    u[N.tableID].domTieCounts.html(N.winCounts[2])
                }
                var H = u[N.tableID].tableSupportGame;
                u[N.tableID].lastResultRound = N.gameRound;
                if (u[N.tableID].tableID != N.tableID || u[N.tableID].lastResultShoe != N.gameShoe) {
                    JCache.get("#tableID" + N.tableID + " #bigTr > td").removeClass().html("");
                    if (u[N.tableID].bigPosition < 0) {
                        var K = "+=" + Math.abs(u[N.tableID].bigPosition) + "px";
                        u[N.tableID].domDivRoadCon.animate({
                            left: K
                        })
                    }
                    u[N.tableID].bigPosition = 0;
                    u[N.tableID].latestBigStampTime = 0;
                    u[N.tableID].bigShowX = 0;
                    u[N.tableID].goodRoadType = null;
                    u[N.tableID].prevGoodRoadJson = "";
                    u[N.tableID].currGoodRoadJson = "";
                    l = 0;
                    continue
                }
                if (typeof N.mainRoads != "undefined") {
                    for (var F = 0; F < N.mainRoads.length; F++) {
                        var L = N.mainRoads[F];
                        if (L.showX > u[N.tableID].bigShowX) {
                            u[N.tableID].bigShowX = L.showX
                        }
                        JCache.get("#tableID" + N.tableID + " #bigRoadTd_" + L.showX + "_" + L.showY).trigger("resultPaintRou", {
                            winBall: L.winBall,
                            results: L.redBlack,
                            gameType: TableSupportGameType.Roulette.value
                        });
                        J = Math.max(J, L.stampTime)
                    }
                }
                u[N.tableID].stampTime = l;
                f(N.tableID, N.mainRoads, u[N.tableID].latestBigStampTime, u[N.tableID].bigShowX, u[N.tableID].bigPosition, 10, 18)
            }
        }
        l = Math.max(l, J)
    };
    var q = {
        userBetLimitSetting: 0,
        userChipsSetting: [],
        init: function() {
            var I = this;
            var G = $j(document.createDocumentFragment());
            for (var L in i) {
                var B = JCache.clone("#betLimitTemplate").prop("id", "betLimitID" + L);
                B.data("betLimitID", L);
                B.bind("click", function() {
                    $j.each($j("#limitBox").children(), function(M, N) {
                        $j(this).removeClass("select")
                    });
                    $j(this).addClass("select");
                    I.defaultChipSetting($j(this).data("betLimitID"));
                    I.userBetLimitSetting = $j(this).data("betLimitID")
                });
                B.children().eq(1).text(CurrencyUtil.format(i[L].minBet) + "-" + CurrencyUtil.format(i[L].maxBet));
                G.append(B)
            }
            var E = JCache.get("#limitBox");
            E.empty();
            E.append(G);
            JCache.get("#submitBtn").bind("click", function() {
                if (I.userBetLimitSetting <= 0) {
                    JCache.get("#errorLimitChips").html(I18N.get("form.text.chips.selectChips1") + " " + I18N.get("form.text.limit"));
                    return
                }
                if (I.userChipsSetting.length != PageSetting.chipSettingLimit.value) {
                    JCache.get("#errorLimitChips").html(I18N.get("form.text.chips.selectChips1") + " " + PageSetting.chipSettingLimit.value + " " + I18N.get("form.text.chips.selectChips2"));
                    return
                }
                I.userChipsSetting.sort(function(R, Q) {
                    if (R.amount > Q.amount) {
                        return 1
                    }
                    if (R.amount < Q.amount) {
                        return -1
                    }
                    return 0
                });
                var M = [];
                var P = 0;
                for (var N in I.userChipsSetting) {
                    var O = I.userChipsSetting[N];
                    M[P++] = O.value
                }
                postAjax({
                    url: "/player/update/setUserDefaultSelect",
                    data: {
                        betLimitID: I.userBetLimitSetting,
                        chips: JSON.stringify(M)
                    },
                    success: function(Q) {
                        location.reload()
                    }
                })
            });
            JCache.get("#cancelBtn").bind("click", function() {
                JCache.get("#gamehallLimitChips").css("display", "none")
            });
            if (PageConfig.userSelectChips) {
                var J = [];
                var K = JSON.parse(PageConfig.userSelectChips);
                for (var H in K) {
                    var F = K[H];
                    var D = ChipType.getInstance(F);
                    var C = {};
                    C.value = D.value;
                    C.className = D.className;
                    if (F == ChipType.Chips_Custom.value) {
                        C.amount = parseInt(userCustomChip),
                        C.showAmount = showAmount,
                        C.lotWord = showAmount.length > 3 ? "lot_word" : ""
                    } else {
                        C.amount = D.amount;
                        C.showAmount = D.showAmount;
                        C.lotWord = D.lotWord
                    }
                    J[H] = C
                }
                J.sort(function(N, M) {
                    if (N.amount > M.amount) {
                        return 1
                    }
                    if (N.amount < M.amount) {
                        return -1
                    }
                    return 0
                });
                I.addDefaultUserChipSetting(J)
            }
        },
        defaultChipSetting: function(J) {
            var G = this;
            G.userChipsSetting = [];
            var C = 0;
            var I = CurrencyType.getInstance(PageConfig.currencyId);
            var F = $j(document.createDocumentFragment());
            for (var H in ChipType.getAllChipType()) {
                var B = ChipType.getInstance(H);
                if (B.amount >= I.minChip && B.amount <= I.maxChip) {
                    var L = JCache.clone("#templateLiChips");
                    var D = $j(L).children().eq(0).children().eq(0);
                    D.prop("id", B.value).prop("class", B.className).addClass(B.lotWord).data("amount", B.amount).html(B.showAmount);
                    if (B.amount >= i[J].minChip) {
                        ++C;
                        if (C <= PageSetting.chipSettingLimit.value) {
                            var E = {
                                value: B.value,
                                className: B.className,
                                amount: B.amount,
                                customAmount: MathUtil.decimal.divide(B.amount, I.unit),
                                showAmount: B.showAmount,
                                lotWord: B.lotWord,
                            };
                            G.addUserChipSetting(E, $j(L))
                        }
                    }
                    F.append(L)
                }
            }
            var K = JCache.get("#setChipsUl");
            K.empty();
            K.append(F);
            K.children().bind("click", function() {
                var N = $j(this).children().eq(0).children().eq(0).prop("id");
                var M = ChipType.getInstance(N);
                var O = {
                    value: M.value,
                    className: M.className,
                    amount: M.amount,
                    customAmount: MathUtil.decimal.divide(M.amount, I.unit),
                    showAmount: M.showAmount,
                    lotWord: M.lotWord,
                };
                G.addUserChipSetting(O, $j(this))
            })
        },
        addUserChipSetting: function(E, D) {
            var C = this;
            var B = C.userChipsSetting.map(function(F) {
                return F.className
            }).indexOf(E.className);
            if (B == -1) {
                if (C.userChipsSetting.length < PageSetting.chipSettingLimit.value) {
                    C.userChipsSetting.push(E);
                    D.addClass("select")
                }
            } else {
                C.userChipsSetting.splice(B, 1);
                D.removeClass("select")
            }
        },
        addDefaultUserChipSetting: function(C) {
            var D = this;
            var F = JCache.get("#chips").children();
            for (var B in C) {
                var E = C[B].value == ChipType.Chips_Custom.value ? "customChipShowAmount" : C[B].value;
                $j("p[id='" + E + "']").parent().parent().click();
                F.eq(B).removeClass().addClass(C[B].className + " " + C[B].lotWord).text(C[B].showAmount).unbind("click").bind("click", selectChipCallback(B));
                chips[B] = {
                    dom: F.eq(B),
                    className: C[B].className,
                    amount: C[B].amount,
                }
            }
        },
        setBetLimitSetting: function(D) {
            var B = this;
            if (D != 0) {
                if (typeof i[D] == "undefined") {
                    for (var C in i) {
                        D = C;
                        break
                    }
                }
                JCache.get("#betLimitID" + D).addClass("select");
                B.defaultChipSetting(D);
                B.userBetLimitSetting = D
            } else {
                for (var C in i) {
                    JCache.get("#betLimitID" + C).addClass("select");
                    B.defaultChipSetting(C);
                    B.userBetLimitSetting = C;
                    break
                }
            }
        }
    };
    var s = {
        userBetLimitSetting: 0,
        userDefaultBetLimitSetting: 0,
        init: function() {
            var D = this;
            var E = $j(document.createDocumentFragment());
            for (var F in i) {
                var B = JCache.clone("#betLimitTemplate").removeAttr("id");
                B.data("betLimitID", F);
                B.bind("click", function() {
                    $j.each($j("#popupLimitBox").children(), function(G, H) {
                        $j(this).removeClass("select")
                    });
                    $j(this).addClass("select");
                    D.userBetLimitSetting = $j(this).data("betLimitID")
                });
                B.children().eq(1).text(CurrencyUtil.format(i[F].minBet) + "-" + CurrencyUtil.format(i[F].maxBet));
                E.append(B)
            }
            var C = JCache.get("#popupLimitBox");
            C.empty();
            C.append(E);
            JCache.get("#popupCancelBtn").bind("click", function() {
                JCache.get("#gamehallPopupLimit").css("display", "none")
            });
            JCache.get("#popupSubmitBtn").bind("click", function() {
                if (D.userBetLimitSetting <= 0) {
                    JCache.get("#popupErrorLimit").html(I18N.get("form.text.chips.selectChips1") + " " + I18N.get("form.text.limit"));
                    return
                }
                postAjax({
                    url: "update/setUserBetLimitID.php",
                    data: {
                        betLimitID: D.userBetLimitSetting
                    },
                    success: function(G) {
                        location.href = PageConfig.playerMultiPage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
                    }
                })
            })
        },
        setBetLimitSetting: function(C) {
            var B = this;
            B.userDefaultBetLimitSetting = C
        },
        showMultiPopupBetLimit: function() {
            var C = this;
            if ($j("#popupLimitBox").children().length == 1) {
                C.userBetLimitSetting = $j("#popupLimitBox").children().eq(0).data("betLimitID");
                var B = $j.Event("click");
                JCache.get("#popupSubmitBtn").trigger(B);
                return
            }
            C.userBetLimitSetting = 0;
            $j.each($j("#popupLimitBox").children(), function(D, E) {
                if (C.userDefaultBetLimitSetting > 0 && $j(this).data("betLimitID") == C.userDefaultBetLimitSetting) {
                    $j(this).addClass("select");
                    C.userBetLimitSetting = C.userDefaultBetLimitSetting
                } else {
                    $j(this).removeClass("select")
                }
            });
            JCache.get("#popupErrorLimit").html("");
            JCache.get("#gamehallPopupLimit").css("display", "")
        }
    };
    var y = function() {
        if (BackGroundMusic.MusicPlayList.length == 1) {
            BackGroundMusic.MusicPlayList = ArrayUtil.shuffle(initialBackGroundMusics.slice(0))
        }
        JCache.get("#soundBackGroundMusic").children("source").eq(0).prop("src", BackGroundMusic.MusicPlayList.pop());
        JCache.get("#soundBackGroundMusic").trigger("load");
        JCache.get("#soundBackGroundMusic").trigger("play")
    };
    videoCanvas = {
        streamA: null,
        mapping: null,
        playerObj: null,
        playerTimerId: null,
        streamingPrefix: null,
        streamingSuffix: null,
        maxSeekSec: [6, 6, 6, 6],
        retry: 0,
        line: 0,
        ratio: 16 / 10,
        checkReadyStateID: null,
        tableId: "gameHall",
        preload: function() {
            this.playerObj = new HLSJSAPI.Class({
                disableSeek: true,
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
            this.play(this.line, this.tableId)
        },
        setEnableVideo: function() {},
        changeEnableVideo: function(B) {},
        play: function(C, D) {
            if (this.playerObj == null) {
                return
            }
            this.stop();
            var B = "https://" + this.streamingPrefix[C] + this.mapping[D][C] + this.streamingSuffix[C];
            this.load(B);
            this.checkReadyState();
            if (this.line == 1) {
                var E = this.playerObj;
                setTimeout(function() {
                    E.Pause();
                    setTimeout(function() {
                        E.Resume()
                    }, 1000)
                }, 1000)
            }
            this.streamA.send({
                project: "BACCARATMX",
                streamname: this.mapping[D][C],
                cdn: this.streamingPrefix[C],
                uid: PageConfig.userID,
                player: "WEB"
            })
        },
        load: function(B) {
            JCache.get("#changeLine").html(this.line + 1);
            this.playerObj.InitConnect("video", B, this.maxSeekSec[this.line]);
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
            this.line = this.line + 1;
            if (this.line >= this.streamingPrefix.length) {
                this.line = 0
            }
            this.play(this.line, this.tableId)
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
            var B = this.playerObj.Player.readyState;
            if (B >= 2) {
                return true
            }
            return false
        },
        resume: function() {
            JCache.get("#video").css("display", "");
            JCache.get("div.video_box").removeClass("no_video");
            JCache.get("#reloadVideo").css("display", "none");
            this.retry = 0;
            this.play(this.line, "gameHall")
        },
        check: function() {
            if (this.playerObj == null) {
                return
            }
            if (this.playerObj.errDetails != "") {
                JCache.get("#video").css("display", "none");
                if (this.retry < 5) {
                    this.retry++;
                    this.changeLine()
                } else {
                    JCache.get("div#loading").css("display", "none");
                    JCache.get("div.video_box").addClass("no_video");
                    JCache.get("#reloadVideo").css("display", "")
                }
            } else {
                if (!JCache.get("#video").is(":visible")) {
                    JCache.get("#video").css("display", "")
                }
            }
        }
    };
    var o = {
        cycleTime: 1,
        cycleTick: 0,
        execute: function() {
            try {
                postAjax({
                    url: "query/queryBalanceV2.php",
                    data: {
                        dm: PageConfig.dealerDomain
                    },
                    success: function(C) {
                        if (C == null || C.status != "200") {
                            return
                        }
                        if (C.systemMaintain == 1) {
                            location.href = PageConfig.playerMaintenancePage + "?dm=" + PageConfig.dealerDomain
                        }
                        var B = $j.Event("updateBalance");
                        B.balance = C.balance;
                        JCache.get("#userBalance").trigger(B)
                    }
                })
            } finally {
                this.check();
                TaskExecuter.execute()
            }
        },
        check: function() {
            var B = this;
            if (this.cycleTick == 0) {
                this.cycleTick = this.cycleTime;
                TaskExecuter.addTask(this)
            } else {
                if (this.cycleTick > 0) {
                    this.cycleTick--
                }
                setTimeout(function() {
                    B.check()
                }, 1000)
            }
        }
    };
    var g = function() {
        postAjax({
            url: "/player/update/disableBrowserAlertMessage",
            success: function(B) {
                if ($j.isEmptyObject(B) || B.status != "200") {
                    return
                }
            }
        });
        $j("div.top_message").fadeOut()
    }
}
)();
