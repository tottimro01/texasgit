var matchesData = {};
$(document).ready(function($){
    var timeNow = serverTimeNow;
    setInterval(() => { timeNow.setSeconds(timeNow.getSeconds()+1) }, 1000);
    var qSportDate = (getQueryVariable('date')!==false) ? getQueryVariable('date') : bDate;
    var qSportDatepicker = document.getElementById('qSportDatepicker');
    $(qSportDatepicker).datepicker({
        showOn: "focus",
        maxDate: "0",
        minDate: "-10d",
        defaultDate: 0,
        dateFormat: "dd-mm-yy",
        onSelect: function(dateText){
            setQSportDate();
        },
        beforeShow: function(){
            setTimeout(function(){
                $('.ui-datepicker').css('z-index', 9);
            }, 0);
        }
    });
    $(qSportDatepicker).datepicker('setDate' , qSportDate);

    if(qSportDate == 0){
        qSportDate = padNumber(timeNow.getDate()) + "-" + padNumber(timeNow.getMonth()+1) + "-" + padNumber(timeNow.getFullYear());
    }
    var serverDate = [serverTimeNow.getDate(), serverTimeNow.getMonth()+1, serverTimeNow.getFullYear()].join("-");
    var isSelectPreviousDate = !(serverDate == qSportDate);
    // console.log(serverDate, qSportDate, isSelectPreviousDate)

    function setQSportDate(){
        var qDate = $(qSportDatepicker).datepicker('getDate');
        var dd = padNumber(qDate.getDate());
        var mm = padNumber(qDate.getMonth() + 1);
        var yyyy = qDate.getFullYear();
        var qDateFormatted = dd + '-' + mm + '-' + yyyy;
        if(qSportDate == qDateFormatted)
            return;
        qSportDate = qDateFormatted;
        var newQueryParam = GetBaseURL()+"?"+createQueryVariable('date', qDateFormatted);
        window.location.href = newQueryParam;
    }
    
    var updateViewLeagueXHR = null;
    var chkbox_chkAllLeague = document.getElementById('switch-league-all');
    var sportLiveIndex = [1, 2, 3]; // live number
    var updateSportCount = 0;
    var onDragSportList = false;
    var expanseTeamsList = [];
    var leaguesData = [];
    var storeSelectedLeagueKey = 'selectedLeague_' + sportZone;
    var storeIgnoregMatchKey = 'ignoredMatch_' + sportZone;

    var alreadyViewLeagueArr = [];
    var matchesData_forPreviousDate = [];
    if(!isSelectPreviousDate){
        var socket = io.connect(nodejsIP, { secure: true });
        socket.on('connect', function() {
            console.log('Connection success');
            showLoader(false);
        });
        socket.on('connect_error', function() {
            console.log('Connection failed');
            showLoader(false);
        });
        socket.on('reconnect_failed', function() {
            console.log('Reconnection failed');
            showLoader(false);
        });
        socket.emit('check_user_abc');
        // socket.emit('set_date', qSportDate);
        socket.on('datalist_abc', function(data){
            var arr_data = JSON.parse(data);
            loadSportCallback(arr_data);
            // setTimeout(function(){
            //     socket.emit('set_date', qSportDate);
            // }, 1000);
        });

        socket.on('dataABCViewLeague', function(data){
            var arr_data = JSON.parse(data);
            alreadyViewLeagueArr = [];
            for(var i = 0; i < arr_data.length; i++)
                alreadyViewLeagueArr.push(arr_data[i].vl_zone_id);
        });
    }else{
        getSportDataListByDate().then(function(res){
            matchesData_forPreviousDate = res;
            loadSportCallback(res);
        }, function(error){
        });
    }

    function loadSportCallback(arr_data){
        // console.log(arr_data)
        var newLeaguesData = normalizeLeaguesData(arr_data);
        CreateSportLeagueListMenu(newLeaguesData);
        var newSportMatchesData = normalizeMatchesData(arr_data);
        CreateSportTable(newSportMatchesData);
        if(updateSportCount == 0)
            showLoader(false);
        updateSportCount++;
    }

    function getSportDataListByDate(){
        $def = $.Deferred();
        $.ajax({
            type: "get",
            url: "process/SportData.php",
            data: {date: qSportDate, zone: sportZone},
            dataType: "json",
        })
        .done(function(res){
            if(res.status == 1)
                $def.resolve(res.result.data);
            else
                $def.reject(res.msg);
        })
        .fail(function(xhr, status, error){
            $def.reject('error');
        });
        return $def.promise();
    }
    
   

    var formSelectLeague = document.getElementById('FormSelectLeague');
    var formIgnoreMatch = document.getElementById('FormIgnoreMatch');
    loadSportToDisplay(); // load last selected leagues into DOM

    function loadSportToDisplay(){
        let headData = { 'sport': sportZone, 'sport_page': sportPage, 'sport_step': sportStep, };
        let headTmpl = $.templates('#sportMatchTmpl_head_sp_' + sportPage);
        let headHtml = headTmpl.render(headData);
        $('#sportContainer_head').html(headHtml);
          
        var savedIgnoredMatch = $.cookie(storeIgnoregMatchKey);
        if(typeof savedIgnoredMatch != 'undefined'){
            var r = savedIgnoredMatch.split("-");
            for(var i = 0; i < r.length; i++){
                let n = r[i].split(":");
                $(formIgnoreMatch).append('<input type="hidden" class="'+n[0]+'" name="ignoreMatches[]" value="'+n[0]+":"+n[1]+'" />');
            }
        }

        var savedLeague = $.cookie(storeSelectedLeagueKey);
        if(typeof savedLeague != 'undefined'){
            var r = savedLeague.split("-");
            for(var i = 0; i < r.length; i++){
                addSportLeagueToDisplay(r[i]);
            }
        }
        updateViewLeague();
    }

    function EnableSportLeague(leagueId, newState){
        var allChk = $('input[name="enableSportList"]'); 
        if(leagueId == 'all'){
            $.each(allChk, function(index, val){
                if(!$(this).is(':checked')){
                    $(this).prop('checked', true);
                    addSportLeagueToDisplay(this.value);
                }
            });
            $(chkbox_chkAllLeague).prop('checked', true);
        }else if(leagueId == 'none'){
            $.each(allChk, function(index, val){
                if($(this).is(':checked')){
                    $(this).prop('checked', false);
                    removeSportLeagueFromDisplay(this.value);
                }
            });
            $(chkbox_chkAllLeague).prop('checked', false);
        }else{
            if(typeof newState == 'boolean'){
                if(newState){
                    $('#switch-league-'+leagueId).prop(':checked', true);
                    addSportLeagueToDisplay(leagueId);
                }else{
                    $('#switch-league-'+leagueId).prop(':checked', false);
                    removeSportLeagueFromDisplay(leagueId);
                }
            }
        }
        checkIsAllLeagueOnDisplay();

        // ถ้าเลือกวันย้อนหลัง ให้ดึงข้อม฿ลที่มีอยู่แล้วมาใช้
        if(isSelectPreviousDate){
            loadSportCallback(matchesData_forPreviousDate);
        }
    }

    function CreateSportLeagueListMenu(arr){
        // console.log(arr)
        if(arr.length > 0){
            $(chkbox_chkAllLeague).removeAttr('disabled');
        }else{
            $(chkbox_chkAllLeague).attr('disabled', 'disabled');
            $(chkbox_chkAllLeague).prop('checked', false);
            $('.sport-league-box').remove();
            var selectedLeagues = getSelectedLeague();
            if(selectedLeagues.length > 0){
          	    for(var i = 0; i < selectedLeagues.length; i++){
                    removeSportLeagueFromDisplay(selectedLeagues[i]);
                    $('#select-li-'+selectedLeagues[i]).remove();
          	    }
            }
        }

        if(JSON.stringify(arr) !== JSON.stringify(leaguesData)){
            if(onDragSportList === false){
                var selectedLeagues = getSelectedLeague();
                var tmpl = $.templates('#sportListTmplNew');
                for(var i = 0; i < arr.length; i++){
                    if(typeof leaguesData[i] == 'undefined' || JSON.stringify(arr[i]['value']) !== JSON.stringify(leaguesData[i]['value'])){
                        let html = tmpl.render(arr[i]['value']);
                        let li = document.getElementById('select-li-'+arr[i]['value'].league_id);
                        if(li !== null){
                            $(li).replaceWith(html);
                        }else{
                            $('#SportListContainer').append(html);
                        }
                        li = document.getElementById('select-li-'+arr[i]['value'].league_id);
                        let dg = $(li).find('.sportNavDraggable');
                        $(dg).draggable(sportNavDraggableOptions);
                        if(selectedLeagues.indexOf(arr[i]['value'].league_id.toString())!=-1){
                            $(dg).draggable('disable');
                        }
                    }
                }

                // let saved = $.cookie(storeSelectedLeagueKey);
                let searchString = $.trim($('#inputSearchSportLeague').val());
                leaguesData = arr;
                if(searchString!="")
                    onSearchLeagueList(searchString);
                
                removeMissingSelectedSport(arr);
                checkIsAllLeagueOnDisplay();
                updateViewLeague()
            }
        }
    }

    var sportEmptyTmpl = $.templates('#sportEmpty_Tmpl'); // get match template
    $('#emptyWarning').html(sportEmptyTmpl);
    function displaySportEmpty(val){
        if(val === true){
            $('#emptyWarning').show();
        }else{
            $('#emptyWarning').hide();
        }
    }

    var matchRowTmpl = $.templates('#sportMatchTmpl_sp_' + sportPage); // get match template
    function CreateSportTable(arr){
        if(Object.keys(arr).length == 0){
            displaySportEmpty(true);
            return;
        }else{
            displaySportEmpty(false);
        }

        if(JSON.stringify(arr) !== JSON.stringify(matchesData)){
            var selectedLeagues = getSelectedLeague();
            $.each(arr, function(lKey, lVal){ // loop through leagues
                selectedLeagues = selectedLeagues.filter(function(e){ return e !== lKey.toString() });
                if(Object.keys(lVal).length == 0){ // 
                    $('#sportLeagueBox_' + lKey).hide();
                    return;
                }

                if(JSON.stringify(lVal) === JSON.stringify(matchesData[lKey]))
                    return;

                if($('.formUpdateVal.l-'+lKey+' > fieldset > input[type="text"]:focus').length > 0)
                    return;

                if($('#sportLeagueBox_' + lKey).not(':visible'))
                    $('#sportLeagueBox_' + lKey).show();

                let sm = sortLeagueMatchesData(lVal.league_matches);
                let lgDisplayName = (lVal.league_name_th!='') ? lVal.league_name_th : lVal.league_name_en;
                if(lgDisplayName != $('.sport-league-head.'+lKey+' > span.league-name-text').text()){
                    $('.sport-league-head.'+lKey).addClass('lg-loaded');
                    $('.sport-league-head.'+lKey+' > span.league-name-text').text(lgDisplayName);
                    // $('.sport-league-head.'+lKey+' > form').css('display', 'inline-block');
                    // if(sm[0][0].b_top > 59)
                  	//     $('.sport-league-head.'+lKey+' > form select[name="league_num"]').val(0);
                    // else
                  	//     $('.sport-league-head.'+lKey+' > form select[name="league_num"]').val(sm[0][0].b_top);
                }

                let frag = document.createDocumentFragment();
                let wrapperData = {'sport': sportZone, 'sport_page': sportPage,}
                let wrapperTmpl = $.templates("#sportMatchTmpl_wrapper");
                let wrapperHtml = wrapperTmpl.render(wrapperData);
                frag.appendChild($.parseHTML($.trim(wrapperHtml))[0]);

                for(var x = 0; x < sm.length; x++){
                    let tb = document.createElement('tbody');
                    tb.className = 'match_container ' + sm[x][0].b_id;
                    tb.id = 'matchContainer_' + sm[x][0].b_id;

                    for(var i = sm[x].length - 1; i >= 0; i--){
                        if(sm[x][i].match_ignore)
                            tb.style.display = 'none'; 
                        
                        let playTime = new Date(sm[x][i].b_date_play * 1000);
                        let card_r = (sm[x][i].card_r!==null && sm[x][i].card_r!="") ? sm[x][i].card_r.split(",") : [0,0];
                        let card_y = (sm[x][i].card_y!==null && sm[x][i].card_y!="") ? sm[x][i].card_y.split(",") : [0,0];
                        let tmplData = {
                            'sport_step': sportStep,
                            'sport_page': sportPage,
                            'match_order': sm[x].length - i,
                            'match_end': ((sm[x][i].b_live == 4) || (sm[x][i].b_live == 0 && playTime.getTime() < timeNow.getTime())) ? true : false,
                            'match_1h_end': ((sm[x][i].b_live == 4) || (sm[x][i].b_live > 2) || (sm[x][i].b_live == 0 && playTime.getTime() < timeNow.getTime())) ? true : false,
                            'display_1h_score': (sm[x][i].b_live >= 1),
                            'display_ft_score': (sm[x][i].b_live >= 1),
                            'league_id': sm[x][i].b_zone_id,
                            'match_id': sm[x][i].b_id,
                            'match_add': sm[x][i].b_add,
                            'no_bet': sm[x][i].no_bet,
                            'manual': sm[x][i].b_manual,
                            'b_step': sm[x][i].b_step,
                            'b_active': sm[x][i].b_active,
                            'match_market': sportLiveIndex.indexOf(sm[x][i].b_live)!=-1 ? "live" : "today",
                            'team_1_name': (sm[x][i].b_name_1_th!='') ? sm[x][i].b_name_1_th : sm[x][i].b_name_1_en,
                            'team_2_name': (sm[x][i].b_name_2_th!='') ? sm[x][i].b_name_2_th : sm[x][i].b_name_2_en,
                            'team_1_card_r': card_r[0],
                            'team_1_card_y': card_y[0],
                            'team_2_card_r': card_r[1],
                            'team_2_card_y': card_y[1],
                            'team_big': sm[x][i].b_big,
                            'live_text': sportLiveIndex.indexOf(sm[x][i].b_live)!=-1 ? sm[x][i].b_run_score_full :  "",
                            'time_text': sportLiveIndex.indexOf(sm[x][i].b_live)!=-1 ? sm[x][i].b_live_string : (padNumber(playTime.getHours(), 2) + ":" + padNumber(playTime.getMinutes(), 2)),
                            'score_full': sm[x][i].b_run_score_full,
                            'score_half': sm[x][i].b_run_score_half,
                            'run_score_full': sm[x][i].b_run_score_full,
                            'run_score_half': sm[x][i].b_run_score_half,
                            '_hdc': (!sportStep) ? sm[x][i].b_hdc : sm[x][i].b_hdc_step,
                            '_hdc_1': formatDecimalPlaces((!sportStep) ? sm[x][i].b_hdc_1 : sm[x][i].b_hdc_step1),
                            '_hdc_2': formatDecimalPlaces((!sportStep) ? sm[x][i].b_hdc_2 : sm[x][i].b_hdc_step2),
                            '_1h_hdc': (!sportStep) ? sm[x][i].b_1h_hdc : sm[x][i].b_1h_hdc_step,
                            '_1h_hdc_1': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_hdc_1 : sm[x][i].b_1h_hdc_step1),
                            '_1h_hdc_2': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_hdc_2 : sm[x][i].b_1h_hdc_step2),
                            '_goal': (!sportStep) ? sm[x][i].b_goal : sm[x][i].b_goal_step,
                            '_goal_1': formatDecimalPlaces((!sportStep) ? sm[x][i].b_goal_1 : sm[x][i].b_goal_step1),
                            '_goal_2': formatDecimalPlaces((!sportStep) ? sm[x][i].b_goal_2 : sm[x][i].b_goal_step2),
                            '_1h_goal': (!sportStep) ? sm[x][i].b_1h_goal : sm[x][i].b_1h_goal_step,
                            '_1h_goal_1': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_goal_1 : sm[x][i].b_1h_goal_step1),
                            '_1h_goal_2': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_goal_2 : sm[x][i].b_1h_goal_step2),
                            '_1x2_x': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1x2_x : sm[x][i].b_1x2_stepx),
                            '_1x2_1': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1x2_1 : sm[x][i].b_1x2_step1),
                            '_1x2_2': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1x2_2 : sm[x][i].b_1x2_step2),
                            '_1h_1x2_x': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_1x2_x : sm[x][i].b_1h_1x2_stepx),
                            '_1h_1x2_1': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_1x2_1 : sm[x][i].b_1h_1x2_step1),
                            '_1h_1x2_2': formatDecimalPlaces((!sportStep) ? sm[x][i].b_1h_1x2_2 : sm[x][i].b_1h_1x2_step2),
                            '_odd': formatDecimalPlaces(sm[x][i].b_odd),
                            '_even': formatDecimalPlaces(sm[x][i].b_even),
                            '_1h_odd': formatDecimalPlaces(sm[x][i].b_1h_odd),
                            '_1h_even': formatDecimalPlaces(sm[x][i].b_1h_even),
                            '_percent_1': sm[x][i].b_percent_1,
                            '_percent_2': sm[x][i].b_percent_2,
                            '_percent_3': sm[x][i].b_percent_3,
                            '_1h_percent_1': sm[x][i].b_1h_percent_1,
                            '_1h_percent_2': sm[x][i].b_1h_percent_2,
                            '_1h_percent_3': sm[x][i].b_1h_percent_3,
                            '_bet_1': formatDecimalPlaces(sm[x][i].b_bet_1, 1, true),
                            '_bet_2': formatDecimalPlaces(sm[x][i].b_bet_2, 1, true),
                            '_bet_3': formatDecimalPlaces(sm[x][i].b_bet_3, 1, true),
                            '_bet_4': formatDecimalPlaces(sm[x][i].b_bet_4, 1, true),
                            '_bet_5': formatDecimalPlaces(sm[x][i].b_bet_5, 1, true),
                            '_bet_6': formatDecimalPlaces(sm[x][i].b_bet_6, 1, true),
                            '_bet_7': formatDecimalPlaces(sm[x][i].b_bet_7, 1, true),
                            '_bet_8': formatDecimalPlaces(sm[x][i].b_bet_8, 1, true),
                            '_bet_9': formatDecimalPlaces(sm[x][i].b_bet_9, 1, true),
                            '_1h_bet_1': formatDecimalPlaces(sm[x][i].b_1h_bet_1, 1, true),
                            '_1h_bet_2': formatDecimalPlaces(sm[x][i].b_1h_bet_2, 1, true),
                            '_1h_bet_3': formatDecimalPlaces(sm[x][i].b_1h_bet_3, 1, true),
                            '_1h_bet_4': formatDecimalPlaces(sm[x][i].b_1h_bet_4, 1, true),
                            '_1h_bet_5': formatDecimalPlaces(sm[x][i].b_1h_bet_5, 1, true),
                            '_1h_bet_6': formatDecimalPlaces(sm[x][i].b_1h_bet_6, 1, true),
                            '_1h_bet_7': formatDecimalPlaces(sm[x][i].b_1h_bet_7, 1, true),
                            '_1h_bet_8': formatDecimalPlaces(sm[x][i].b_1h_bet_8, 1, true),
                            '_1h_bet_9': formatDecimalPlaces(sm[x][i].b_1h_bet_9, 1, true),
                            '_bet_total_1': formatDecimalPlaces(parseFloat(sm[x][i].b_bet_1) - parseFloat(sm[x][i].b_bet_2), 1, true),
                            '_bet_total_2': formatDecimalPlaces(parseFloat(sm[x][i].b_bet_3) - parseFloat(sm[x][i].b_bet_4), 1, true),
                            '_bet_total_3': formatDecimalPlaces(parseFloat(sm[x][i].b_bet_7) - parseFloat(sm[x][i].b_bet_9), 1, true),
                            '_bet_total_4': formatDecimalPlaces(parseFloat(sm[x][i].b_bet_5) - parseFloat(sm[x][i].b_bet_6), 1, true),
                            '_1h_bet_total_1': formatDecimalPlaces(parseFloat(sm[x][i].b_1h_bet_1) - parseFloat(sm[x][i].b_1h_bet_2), 1, true),
                            '_1h_bet_total_2': formatDecimalPlaces(parseFloat(sm[x][i].b_1h_bet_3) - parseFloat(sm[x][i].b_1h_bet_4), 1, true),
                            '_1h_bet_total_3': formatDecimalPlaces(parseFloat(sm[x][i].b_1h_bet_7) - parseFloat(sm[x][i].b_1h_bet_9), 1, true),
                            '_1h_bet_total_4': formatDecimalPlaces(parseFloat(sm[x][i].b_1h_bet_5) - parseFloat(sm[x][i].b_1h_bet_6), 1, true),
                            'hide_by_filter': sm[x][i].hide_by_filter,
                            'live_status': sm[x][i].b_live,
                        }
                        let html = $.parseHTML($.trim(matchRowTmpl.render(tmplData)))[0];
                        tb.appendChild(html);
                    }
                    frag.querySelector('table').appendChild(tb);
                }
                $('#SportLeagueBody_' + lKey).html(frag);
            });
            for(var i = 0; i < selectedLeagues.length; i++){ // remove missing league
                EnableSportLeague(selectedLeagues[i], false);
            }
            matchesData = arr;
        }
    }

    var sportNavDraggableOptions = { 
        revert: false, 
        cursor: "move", 
        cursorAt: { top: 0, left: 0 },
        connectToSortable: '#sportContainer_body',
        helper: function(){ return SportNavDraggableHTML(this.dataset); }, 
        start: function(){ 
        	onDragSportList = true; 
        	$('body').addClass('onDragSportItem');
        },
        stop: function(){ 
        	onDragSportList = false; 
        	$('body').removeClass('onDragSportItem');
        }
    };
  
    $('#sportContainer_body').sortable({
        axis: 'y',
        cursor: 'move',
        handle: '.sport-league-head',
        connectWith: '.sportNavDraggable',
        // placeholder: 'sortableLeaguePlaceholder',
        placeholder: 'ui-state-highlight',
        zIndex: 9,
        start: function(e, ui){ ui.placeholder.height(ui.item.innerHeight()); }, 
        update: function(e, ui){ reorderSportLeagueTable(); }
    });

    $('#sportContainer_body').droppable({
        classes:{
            'ui-droppable-active': 'ui-state-active',
            'ui-droppable-hover':  'ui-state-hover',
        },
        drop: function(event, ui){
            if(ui.draggable[0].classList.contains('SportNavOnDragItem')){
                $('#switch-league-' + ui.draggable[0].dataset.skey).prop('checked', true);
                checkIsAllLeagueOnDisplay();
                addSportLeagueToDisplay(ui.draggable[0].dataset.skey, 'drop');
            }
        },
    });

    function reorderSportLeagueTable(){
        $.each($('.sport-league-box'), function(index, val){
            let v = $(this).data('skey');
            $('input[name="leagues[]"][value="'+v+'"]').detach().appendTo(formSelectLeague);
        });
        saveSportToDisplay();
    }

    function SportNavDraggableHTML(edata){
        return [ '<div class="SportNavOnDragItem" id="sportLeagueBoxPlaceholder_'+edata.skey+'" data-skey="'+edata.skey+'" data-sname="'+edata.sname+'">', edata.sname, '</div>', ].join("");
    }

    function addSportLeagueToDisplay(lId, trigger){
        var selectedLeagues = getSelectedLeague();
        if(selectedLeagues.indexOf(lId) == -1){
            let tmpl = $.templates('#sportLeagueBoxTmpl');
            let data = { 'league_id': lId, };
            let html = tmpl.render(data);
          
            $(formSelectLeague).append('<input type="hidden" name="leagues[]" value="'+lId+'" />');
            $('input[name="checkSelectMatch"].checkSelectMatch.l-'+lId).removeAttr('disabled');
            $('input[name="checkSelectMatch"].checkSelectMatch.l-'+lId).prop('checked', true);
            if(trigger == 'drop'){
                setTimeout(() => { $('#sportLeagueBoxPlaceholder_' + lId).replaceWith(html); }, 10);
            }else{
                $('#sportContainer_body').append(html);
            }
            $('.sportNavDraggable.'+lId).draggable('disable');
        }
        $('.lg-view-'+lId).hide();
        alreadyViewLeagueArr.push(parseInt(lId));
        saveSportToDisplay();
    }

    function removeSportLeagueFromDisplay(lId){
        $('.sport-league-box.'+lId).remove();
        $('input[name="leagues[]"][value="'+lId+'"]').remove();
        $('input[name="ignoreMatches[]"].'+lId).remove();
        $('input[name="checkSelectMatch"].checkSelectMatch.l-'+lId).attr('disabled', 'disabled');
        $('input[name="checkSelectMatch"].checkSelectMatch.l-'+lId).prop('checked', false);
        $('.sportNavDraggable.'+lId).draggable('enable');
        saveSportToDisplay();
    }

    function saveSportToDisplay(){
        var selectedLeagues = getSelectedLeague();
        if(selectedLeagues.length > 0)
            $.cookie(storeSelectedLeagueKey, selectedLeagues.join("-"));
        else
            $.removeCookie(storeSelectedLeagueKey);
        
        var ignoredMatches = getIgnoreMatch(true);
        for(var i = 0; i < ignoredMatches.length; i++){ ignoredMatches[i] = ignoredMatches[i].join(":"); }
        if(ignoredMatches.length > 0)
            $.cookie(storeIgnoregMatchKey, ignoredMatches.join("-"));
        else
            $.removeCookie(storeIgnoregMatchKey);
    }

    function removeMissingSelectedSport(leaguesData){
        var leaguesId = []; 
        for(var x = 0; x < leaguesData.length; x++) leaguesId.push(leaguesData[x]['key'].toString());
        var selectedLeagues = getSelectedLeague();
        for(var i = 0; i < selectedLeagues.length; i++){
            if(leaguesId.indexOf(selectedLeagues[i]) == -1){
                removeSportLeagueFromDisplay(selectedLeagues[i]);
                $('#select-li-'+selectedLeagues[i]).remove();
            }
        }
    }

    function normalizeMatchesData(arr){
        var tmpData = {};
        var checkAllMatchInLeagueIgnore = {};
        var selectedLeagues = getSelectedLeague();
        var ignoredMatches = getIgnoreMatch();
        for(var i = arr.length - 1; i >= 0; i--){
            if(arr[i].b_zone != sportZone){ // check sport zone
                continue;
            }

            var sportFilter = getSportFilter();
            if(sportFilter.b_live != -1){
                if((sportFilter.b_live == 0 && arr[i].b_live != 0) ||
                (sportFilter.b_live == 1 && arr[i].b_live != 1 && arr[i].b_live != 2 && arr[i].b_live != 3) ||
                (sportFilter.b_live == 4 && arr[i].b_live != 4))
                    arr[i].hide_by_filter = true;
                else
                    arr[i].hide_by_filter = false;
            }else{
                arr[i].hide_by_filter = false;
            }

            if(typeof checkAllMatchInLeagueIgnore[arr[i].b_zone_id] == 'undefined'){
                checkAllMatchInLeagueIgnore[arr[i].b_zone_id] = 0;
            }
            if(selectedLeagues.indexOf(arr[i].b_zone_id.toString()) != -1){
                if(typeof tmpData[arr[i].b_zone_id] == 'undefined'){
                    tmpData[arr[i].b_zone_id] = { 
                        'league_id': arr[i].b_zone_id, 
                        'league_name': arr[i].b_zone_en, 
                        'league_name_en': arr[i].b_zone_en, 
                        'league_name_th': arr[i].b_zone_th,
                        'league_matches': {},
                    };
                }
            
                arr[i].match_ignore = ignoredMatches.indexOf(arr[i].b_id.toString())!=-1 ? true : false; // check is match hiding by user
                if(arr[i].match_ignore === true){
                    checkAllMatchInLeagueIgnore[arr[i].b_zone_id]++;
                }
                if(typeof tmpData[arr[i].b_zone_id].league_matches[arr[i].b_id] == 'undefined'){
                    tmpData[arr[i].b_zone_id].league_matches[arr[i].b_id] = [];
                }
                tmpData[arr[i].b_zone_id].league_matches[arr[i].b_id].push(arr[i]);
            }
        }
      
        $.each(tmpData, function(index, val){
            // ถ้าทุกแมทช์ในลีกถูกซ่อนโดยผู้ใช้ ทำการยกเลิกการเลือก
            if(checkAllMatchInLeagueIgnore[index] == Object.keys(val.league_matches).length)
                EnableSportLeague(index, false);
        });
        return tmpData;
    }

    function sortLeagueMatchesData(matches){
    	let tmpSort = [];
        $.each(matches, function(ii, vv) {
            tmpSort[vv[0].b_id] = {
            	'b_id': vv[0].b_id,
            	'b_date_play': vv[0].b_date_play,
            	'b_team_1': vv[0].b_name_1_en,
            }
        });
        var sort = sortProperties(tmpSort, 'b_date_play', true); // Sort
        var new_league_matches = [];
        for(var i = 0; i < sort.length; i++){
            new_league_matches.push(matches[sort[i].key]); 
        }
        return new_league_matches;
    }

    function normalizeLeaguesData(arr){
        var tmpLeagueData = {};
        var tmpLeagueId = [];
        var selectedLeagues = getSelectedLeague();
        var ignoredMatches = getIgnoreMatch();
        for(var i = arr.length - 1; i >= 0; i--){
            if(arr[i].b_zone != sportZone){ // check sport zone
              continue;
            }
            if(tmpLeagueId.indexOf(arr[i].b_zone_id) == -1){
                tmpLeagueData[arr[i].b_zone_id] = { 
                    'league_id': arr[i].b_zone_id, 
                    'league_name': (arr[i].b_zone_th!='') ? arr[i].b_zone_th : arr[i].b_zone_en, 
                    'league_name_en': arr[i].b_zone_en, 
                    'league_name_th': arr[i].b_zone_th,
                    'league_check': selectedLeagues.indexOf(arr[i].b_zone_id.toString())!=-1 ? true : false,
                    'league_expanse': expanseTeamsList.indexOf(arr[i].b_zone_id.toString())!=-1 ? true : false,
                    'league_view': (alreadyViewLeagueArr.indexOf(arr[i].b_zone_id) != -1 || isSelectPreviousDate) ? true : false,
                    'league_matches': {},
                };
                tmpLeagueId.push(arr[i].b_zone_id);
            }

            tmpLeagueData[arr[i].b_zone_id].league_matches[arr[i].b_id] = {
                'league_id': arr[i].b_zone_id,   
                'match_id': arr[i].b_id,
                'team_1_name': (arr[i].b_name_1_th!='') ? arr[i].b_name_1_th : arr[i].b_name_1_en,
                'team_2_name': (arr[i].b_name_2_th!='') ? arr[i].b_name_2_th : arr[i].b_name_2_en,
                'team_1_name_en': arr[i].b_name_1_en,
                'team_2_name_en': arr[i].b_name_2_en,
                'team_1_name_th': arr[i].b_name_1_th,
                'team_2_name_th': arr[i].b_name_2_th,
                'match_check_enable': tmpLeagueData[arr[i].b_zone_id].league_check,
                'match_ignore': (ignoredMatches.indexOf(arr[i].b_id.toString())!=-1 || selectedLeagues.indexOf(arr[i].b_zone_id.toString())==-1) ? true : false, // check is match hiding by user // only in selected league
            }
        }
        // var sort = sortProperties(tmpLeagueData, 'league_name', false); // Sort league by name
        var sort = sortProperties(tmpLeagueData, 'b_top', true); // Sort league by name
        return sort;
    }

    $(document).on('change', 'input[name="enableSportList"]', function(event){
        event.preventDefault();
        var val = $(this).val();
        EnableSportLeague(val, $(this).is(':checked'));
    });

    // remove league by click x on top right
    $(document).on('click', '.dismissLeagueBtn', function(event){
        event.preventDefault();
        EnableSportLeague($(this).data('league-id'), false);
    });

    // collapse league by click ^ on top right
    $(document).on('click', '.collapseLeagueBtn', function(event){
        event.preventDefault();
        $('.sport-league-box.' + $(this).data('league-id')).toggleClass('leagueCollapsed');
    });

    $(document).on('change', 'input[name="checkSelectMatch"]', function(event){ // แสดง / ซ่อนเฉพาะคู่แข่งขัน
        event.preventDefault();
        var val = $(this).val().split("-");
        if($(this).is(':checked'))
            OnEnableMatch(true, val[0], val[1]);
        else
            OnEnableMatch(false, val[0], val[1]);
    });

    //เลือกแสดง / ซ่อน คู่แข่งขัน
    function OnEnableMatch(enable, lId, mId){
        if(enable){
            $('input[name="ignoreMatches[]"][value="'+lId+':'+mId+'"]').remove();
            $('.match_container.'+mId).show();
        }else{
            var ignoredMatches = getIgnoreMatch();
            if(ignoredMatches.indexOf(mId) == -1){
                $(formIgnoreMatch).append('<input type="hidden" class="'+lId+'" name="ignoreMatches[]" value="'+lId+":"+mId+'" />');
            }
            $('.match_container.'+mId).hide();
            if($('input[name="checkSelectMatch"]:checked.checkSelectMatch.l-'+lId).length == 0)
                EnableSportLeague(lId, false);
        }
        saveSportToDisplay();
    }

    function checkIsAllLeagueOnDisplay(){
        if($('input[name="enableSportList"]').length == $('input[name="enableSportList"]:checked').length){
            $('input[name="enableSportListAll"]').prop('checked', true);
        }else{
            $('input[name="enableSportListAll"]').prop('checked', false);
            matchesData = {};
        }
    }

    $(document).on('change', 'input[name="toggleSportList"]', function(event){
        event.preventDefault();
        if($(this).is(':checked')){
            if(expanseTeamsList.indexOf($(this).val()) == -1){
                expanseTeamsList.push($(this).val());
            }
        }else{
            expanseTeamsList.splice(expanseTeamsList.indexOf($(this).val()));
        }
    });

    $(document).on('change', '#switch-league-all', function(event){
        event.preventDefault();
        if($(this).is(':checked'))
            EnableSportLeague('all');
        else
            EnableSportLeague('none');
    });

    // input search
    $(document).on('input', '#inputSearchSportLeague', function(event){
        event.preventDefault();
        onSearchLeagueList($(this).val());
    });

    function onSearchLeagueList(q){
        var filter = textEscape(q);
        $('#SportListContainer > li').each(function(){
            let leagueName = $(this).data('league-name');
            if(leagueName.search(new RegExp(filter, 'i')) >= 0)
                $(this).show();
            else
                $(this).hide();
        });
    }

    function getIgnoreMatch(includeLeagueId){
        var r = [];
        var s = $('input[name="ignoreMatches[]"]').map(function(){ return $(this).val(); }).get();
        for(var i = 0; i < s.length; i++){
            let v = s[i].split(":");
            if(includeLeagueId === true)
                r.push([v[0], v[1]]);
            else
                r.push(v[1]);
        }
        return r;
    }

    function getSelectedLeague(){
        return $('input[name="leagues[]"]').map(function(){ return $(this).val(); }).get();
    }

    $(document).on('change', 'input[name="chk_atv"], input[name="chk_no_bet"], input[name="chk_manual"], input[name="chk_b_step"], select[name="league_num"]', function(event){
    	event.preventDefault();
    	$(this.form).trigger('submit');
    });

    // Clear input value in sport table when user will edit value
    $(document).on('focus', '.formUpdateVal.sp_cell input[type="text"]', function(event){
        event.preventDefault();
        var v = this.value;
        this.dataset.tmpval = v;
        this.value = "";
    });  

    // Set new value to input in sport table or reset its value
    $(document).on('blur', '.formUpdateVal.sp_cell input[type="text"]', function(event){
        event.preventDefault();
        var v = this.dataset.tmpval;
        this.value = v;
    });

    function updateViewLeague(){
        if(isSelectPreviousDate)
            return;

        if(updateViewLeagueXHR !== null)
            updateViewLeagueXHR.abort();
      
        var selectedLeagues = getSelectedLeague();
        updateViewLeagueXHR = $.ajax({
            type: "post",
            url: "process/updateViewLeague.php",
            data: {curentView: selectedLeagues.join(","), date: qSportDate},
            dataType: "json",
        })
        .always(function(){
            updateViewLeagueXHR = null;
        });
    }

    // คัดลอกชื่อลีก
    $(document).on('dblclick', '.lg-loaded > .league-name-text', function(event){
        event.preventDefault();
        if(copyTextToClipboard(this.innerHTML)){
            toastr["success"]("คัดลอกสำเร็จ!");
        }else{
            toastr["error"]("เกิดข้อผิดพลาด!");
        }
    });

}); // end document ready

function resetSpCellInput(_form, _res){
    var e = $(_form).find('input[type="text"]').get(0);
    if(typeof _res.status != 'undefined' && _res.status == 1){
        $(e).data('tmpval', _res.result);
        toastr["success"]("บันทึกสำเร็จ!")
    }else{
        toastr["error"]("เกิดข้อผิดพลาด!")
    }
    var v = $(e).data('tmpval');
    // $(e).val(formatDecimalPlaces(v));
    $(e).attr('value', v);
    $(e).val(v);
}

var editDialog = null;
function editMatchData(matchId, matchOrder, leagueId, half){
    showLoader(true);
    var match = matchesData[leagueId].league_matches[matchId][matchesData[leagueId].league_matches[matchId].length - matchOrder];
    if(typeof match != 'undefined' && editDialog === null){
        let play_time = new Date(match.b_date_play * 1000);
        let formValue = {
            'half':  half,
            'match_id': match.b_id,
            'match_add': match.b_add,
            'team_big': match.b_big,
            'team_1_name_th': match.b_name_1_th,
            'team_1_name_en': match.b_name_1_en,
            'team_1_name_cn': match.b_name_1_cn,
            'team_2_name_th': match.b_name_2_th,
            'team_2_name_en': match.b_name_2_en,
            'team_2_name_cn': match.b_name_2_cn,
            'match_date': match.b_date,
            'match_time': padNumber(play_time.getHours(), 2) + ":" + padNumber(play_time.getMinutes(), 2),
            'league_name_th': match.b_zone_th,
            'league_name_en': match.b_zone_en,
            'league_name_cn': match.b_zone_cn,
            'tv_link': match.b_tv,
            'id_thscore': match.id_thscore,
        };

        let formTmpl = $.templates('#editMatchForm_Tmpl');
        let formHtml = formTmpl.render(formValue);

        editDialog = $.confirm({
            title: ' ',
            content: formHtml,
            boxWidth: '70%',
            onContentReady: function(){
                let self = this;
                self.buttons.confirm.enable();
                self.buttons.cancel.enable();

                self.$content.find('form').on('submit', function(e){
                    e.preventDefault();
                    showLoader(true);
                    let $form = this;
                    let $formData = new FormData($form);
                    $.ajax({
                        url: $form.action,
                        type: $form.method,
                        dataType: 'json',
                        data: $formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function(){
                            $($form).find('fieldset').attr('disabled', 'disabled');
                        }
                    })
                    .done(function(res){
                        if(res.status == 1){
                            self.$content.find('input[name="match_index"]').attr('value', res.result.b_id);
                            if(res.result.new_league !== null){
                                let nl = res.result.new_league;
                                allSportLeageData[sportZone][parseInt(nl.b_zone_id)] = {
                                    zone_id: nl.b_zone_id,
                                    zone_name: (nl.b_zone_th!="") ? nl.b_zone_th : nl.b_zone_en,
                                    zone_name_th: nl.b_zone_th,
                                    zone_name_en: nl.b_zone_en,
                                    zone_name_cn: nl.b_zone_cn,
                                };

                                let opt = document.createElement('OPTION');
                                opt.value = nl.b_zone_id;
                                opt.text = (nl.b_zone_th!="") ? nl.b_zone_th : nl.b_zone_en;
                                opt.dataset.zoneNameTh = nl.b_zone_th;
                                opt.dataset.zoneNameEn = nl.b_zone_en;
                                opt.dataset.zoneNameCn = nl.b_zone_cn;

                                $($leagueSelect).append(opt);
                                $($leagueSelect).val(nl.b_zone_id);
                            }
                        }else{
                            errorDialog(null, res.msg);
                        }
                    })
                    .fail(function(){
                        errorDialog();
                    })
                    .always(function(){
                        $($form).find('fieldset').removeAttr('disabled');
                        showLoader(false);
                    });
                });

                var $leagueSelect = self.$content.find('select[name="league_zone_id"]');
                createLeagueOptions(sportZone).then(function(fragRes){
                    showLoader(false);
                    $($leagueSelect).append(fragRes);
                    let firstOptVal = $($leagueSelect).find('option[value="'+leagueId+'"]').get(0);
                    if(typeof firstOptVal != 'undefined') // Auto select 1st league appear
                      $($leagueSelect).val(firstOptVal.value);
                    $($leagueSelect).trigger('change');
                }, function(){
                    showLoader(false);
                });

                $($leagueSelect).on('change', function(e){
                    e.preventDefault();
                    var val = $($leagueSelect).val();
                    var iLgTh = self.$content.find('input[name="league_th"]').get(0);
                    var iLgEn = self.$content.find('input[name="league_en"]').get(0);
                    var iLgCn = self.$content.find('input[name="league_cn"]').get(0);
                    if(val != "-1"){
                        let opt = $($leagueSelect).find('option[value="'+val+'"]').get(0);
                        $(iLgTh).attr('value', $(opt).data('zone-name-th'));
                        $(iLgEn).attr('value', $(opt).data('zone-name-en'));
                        $(iLgCn).attr('value', $(opt).data('zone-name-cn'));
                    }else{
                        $(iLgTh).attr('value', "");
                        $(iLgEn).attr('value', "");
                        $(iLgCn).attr('value', "");
                    }
                });
            },
            onClose: function (){
                editDialog = null;
            },
            buttons: {
                confirm: {
                    text: 'บันทึก',
                    btnClass: 'oho-btn',
                    isDisabled: true,
                    action: function(){
                        var self = this;
                        self.$content.find('form').submit();
                        return false;
                    } 
                },
                cancel: {
                    text: 'ยกเลิก',
                    isDisabled: true,
                    btnClass: 'oho-btn _close',
                },
            }
        });
    }
}

var createDialog = null;
function createMatchData(matchId, matchOrder, leagueId){
    showLoader(true);
    let play_time = new Date();
    let formValue = {
        'match_date': padNumber(play_time.getDate(), 2) + "-" + padNumber(play_time.getMonth()+1, 2) + "-" + padNumber(play_time.getFullYear(), 2),
        'match_time': padNumber(play_time.getHours(), 2) + ":" + padNumber(play_time.getMinutes(), 2),
        'max_play': '2,000',
        'match_id': (play_time.getTime()).toString().substring(0, 8),
        'sport_list': sportList,
        'page_sport_zone': sportZone,
    };

    var match = (typeof matchId=='undefined') ? null : 
    matchesData[leagueId].league_matches[matchId][matchesData[leagueId].league_matches[matchId].length - matchOrder];
    // console.log(match)

    let formTmpl = $.templates('#createMatchForm_Tmpl');
    let formHtml = formTmpl.render(formValue);

    createDialog = $.confirm({
        title: ' ',
        content: formHtml,
        boxWidth: '70%',
        onContentReady: function(){
            let self = this;
            self.buttons.confirm.enable();
            self.buttons.cancel.enable();

            self.$content.find('form').on('submit', function(e){
                e.preventDefault();
                showLoader(true);
                $sportSelect.removeAttr('disabled');
                let $form = this;
                let $formData = new FormData($form);
                $.ajax({
                    url: $form.action,
                    type: $form.method,
                    dataType: 'json',
                    data: $formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $($form).find('fieldset').attr('disabled', 'disabled');
                $sportSelect.attr('disabled', 'disabled');

                    }
                })
                .done(function(res){
                    if(res.status == 1){
                        if(res.result.new_league !== null){
                            let nl = res.result.new_league;
                            allSportLeageData[sportZone][parseInt(nl.b_zone_id)] = {
                                zone_id: nl.b_zone_id,
                                zone_name: (nl.b_zone_th!="") ? nl.b_zone_th : nl.b_zone_en,
                                zone_name_th: nl.b_zone_th,
                                zone_name_en: nl.b_zone_en,
                                zone_name_cn: nl.b_zone_cn,
                            };

                            let opt = document.createElement('OPTION');
                            opt.value = nl.b_zone_id;
                            opt.text = (nl.b_zone_th!="") ? nl.b_zone_th : nl.b_zone_en;
                            opt.dataset.zoneNameTh = nl.b_zone_th;
                            opt.dataset.zoneNameEn = nl.b_zone_en;
                            opt.dataset.zoneNameCn = nl.b_zone_cn;

                            $($leagueSelect).append(opt);
                            $($leagueSelect).val(nl.b_zone_id);
                        }
                    }else{
                        errorDialog(null, res.msg);
                    }
                })
                .fail(function(){
                    errorDialog();
                })
                .always(function(){
                    $($form).find('fieldset').removeAttr('disabled');
                    showLoader(false);
                });
            });

            var $sportSelect = self.$content.find('select[name="sport_type"]');
            var $leagueSelect = self.$content.find('select[name="league_zone_id"]');
            $($sportSelect).on('change', function(e){
                e.preventDefault();
                $($leagueSelect).find('option[value!="-1"]').remove();
                createLeagueOptions($($sportSelect).val()).then(function(fragRes){
                    showLoader(false);
                    $($leagueSelect).append(fragRes);
                    let firstOptVal = $($leagueSelect).find('option[value!="-1"]').get(0);
                    $($leagueSelect).trigger('change');
                    if(match !== null){
                        $leagueSelect.val(match.b_zone_id);
                        self.$content.find('input[name="league_th"]').attr('value', match.b_zone_th);
                        self.$content.find('input[name="league_en"]').attr('value', match.b_zone_en);
                        self.$content.find('input[name="league_cn"]').attr('value', match.b_zone_cn);
                    }
                }, function(){
                    showLoader(false);
                });
            });

            $($leagueSelect).on('change', function(e){
                e.preventDefault();
                var val = $($leagueSelect).val();
                var iLgTh = self.$content.find('input[name="league_th"]').get(0);
                var iLgEn = self.$content.find('input[name="league_en"]').get(0);
                var iLgCn = self.$content.find('input[name="league_cn"]').get(0);
                if(val != "-1"){
                    let opt = $($leagueSelect).find('option[value="'+val+'"]').get(0);
                    $(iLgTh).attr('value', $(opt).data('zone-name-th'));
                    $(iLgEn).attr('value', $(opt).data('zone-name-en'));
                    $(iLgCn).attr('value', $(opt).data('zone-name-cn'));
                }else{
                    $(iLgTh).attr('value', "");
                    $(iLgEn).attr('value', "");
                    $(iLgCn).attr('value', "");
                }
            });

            if(match !== null){
                let matchDate = new Date(match.b_date_play * 1000);
                // self.$content.find('input[name="team_big"][value="'+match.b_big+'"]').prop('checked', true);
                // self.$content.find('input[name="match_half"][value="'+match.b_hf+'"]').prop('checked', true);
                self.$content.find('input[name="match_id"]').attr('value', match.b_id);
                self.$content.find('input[name="team_1_th"]').attr('value', match.b_name_1_th);
                self.$content.find('input[name="team_1_en"]').attr('value', match.b_name_1_en);
                self.$content.find('input[name="team_1_cn"]').attr('value', match.b_name_1_cn);
                self.$content.find('input[name="team_2_th"]').attr('value', match.b_name_2_th);
                self.$content.find('input[name="team_2_en"]').attr('value', match.b_name_2_en);
                self.$content.find('input[name="team_2_cn"]').attr('value', match.b_name_2_cn);
                self.$content.find('input[name="date"]').attr('value', match.b_date);
                self.$content.find('input[name="time"]').attr('value', (padNumber(matchDate.getHours())+":"+padNumber(matchDate.getMinutes())));
                $sportSelect.attr('disabled', 'disabled');
                // $leagueSelect.attr('disabled', 'disabled');

            }
            self.$content.find('select[name="sport_type"]').trigger('change');
        },
        onClose: function (){
          createDialog = null;
        },
        buttons: {
            confirm: {
                text: 'บันทึก',
                btnClass: 'oho-btn',
                isDisabled: true,
                action: function(){
                    var self = this;
                    self.$content.find('form').submit();
                    return false;
                } 
            },
            cancel: {
                text: 'ยกเลิก',
                isDisabled: true,
                btnClass: 'oho-btn _close',
            },
        }
    });
}

function createLeagueOptions(sportId){
    var $def = $.Deferred();
    var frag = document.createDocumentFragment();
    getAllSportLeagueData().then(function(res){
        var leagueList = res[sportId]; // load new data
        var leagueListSort = sortProperties(leagueList, 'zone_name', false); // Sort league by name
        for (var i = 0; i < leagueListSort.length; i++) {
            let opt = document.createElement('OPTION');
            opt.value = leagueListSort[i].value.zone_id;
            opt.text = leagueListSort[i].value.zone_name;
            opt.dataset.zoneNameTh = leagueListSort[i].value.zone_name_th;
            opt.dataset.zoneNameEn = leagueListSort[i].value.zone_name_en;
            opt.dataset.zoneNameCn = leagueListSort[i].value.zone_name_cn;
            frag.appendChild(opt);
        }
        $def.resolve(frag);
    },
    function(){
        var leagueList = allSportLeageData[sportId]; // load fail use previously loaded data
        var leagueListSort = sortProperties(leagueList, 'zone_name', false); // Sort league by name
        for (var i = 0; i < leagueListSort.length; i++) {
            let opt = document.createElement('OPTION');
            opt.value = leagueListSort[i].value.zone_id;
            opt.text = leagueListSort[i].value.zone_name;
            opt.dataset.zoneNameTh = leagueListSort[i].value.zone_name_th;
            opt.dataset.zoneNameEn = leagueListSort[i].value.zone_name_en;
            opt.dataset.zoneNameCn = leagueListSort[i].value.zone_name_cn;
            frag.appendChild(opt);
        }
        $def.resolve(frag);
    });
    return $def.promise();
}

var sumDialog = null;
function showBetSummary(matchId, matchAdd, qType, half, p_type){
    sumDialog = $.dialog({
        title: " ",
        content: function(){
            var self = this;
            return $.ajax({
                url: 'process/matchSumTable.php',
                dataType: 'html',
                method: 'get',
                data: {'match_id': matchId, 'match_add': matchAdd, 'q_type': qType, 'half': half, 'p_type': p_type},
            }).done(function (response){
                self.setContent(response);
            }).fail(function(){
                self.setContent('Something went wrong.');
            });
        },
        boxWidth: '80%',
        onClose: function(){
            sumDialog = null;
        },
    });
}

var allSportLeageData = {};
getAllSportLeagueData();
function getAllSportLeagueData(){
    var $def = $.Deferred();
    if(Object.keys(allSportLeageData).length > 0){
        $def.resolve(allSportLeageData);
        return $def.promise();
    }
    $.ajax({
        type: "get",
        url: "process/SportLeagueList.php",
        data: "data",
        dataType: "json",
    })
    .done(function(res){
        if(res.status == 1){
            allSportLeageData = res.result;
        }
    })
    .always(function(){  
        $def.resolve(allSportLeageData);
    });
    return $def.promise();
}

