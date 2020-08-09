var matchesData = {};
$(document).ready(function($){
	var timeNow = serverTimeNow;
	setInterval(() => { timeNow.setSeconds(timeNow.getSeconds()+1) }, 1000);
  var chkbox_chkAllLeague = document.getElementById('switch-league-all');
  var sportLiveIndex = [1, 2, 3]; // live number
  var updateSportCount = 0;
  var onDragSportList = false;
  var expanseTeamsList = [];
  var leaguesData = [];
  var storeSelectedLeagueKey = 'selectedLeague_' + sportZone;
  var storeIgnoregMatchKey = 'ignoredMatch_' + sportZone;
  var socket = io.connect(nodejsIP, { secure: true });
  socket.on('datalist', function(data){
    var arr_data = JSON.parse(data);
    var newLeaguesData = normalizeLeaguesData(arr_data);
    CreateSportLeagueListMenu(newLeaguesData);
    var newSportMatchesData = normalizeMatchesData(arr_data);
    CreateSportTable(newSportMatchesData);
    if(updateSportCount == 0)
      showLoader(false);
    updateSportCount++;
  });

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
  }

  function CreateSportLeagueListMenu(arr){
    if(arr.length > 0){
      $(chkbox_chkAllLeague).removeAttr('disabled');
    }else{
      $(chkbox_chkAllLeague).attr('disabled', 'disabled');
      $(chkbox_chkAllLeague).prop('checked', false);
      $('.sport-league-box').remove();
      var selectedLeagues = getSelectedLeague();
      if(selectedLeagues.length > 0){
      	for(var i = 0; i < selectedLeagues.length; i++){
      		removeSportLeagueFromDisplay(selectedLeagues[i])
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
              // console.log('update list ' + val.league_name + ' (replace)');
            }else{
              $('#SportListContainer').append(html);
              // console.log('update list ' + val.league_name + ' (add new)');
            }
            li = document.getElementById('select-li-'+arr[i]['value'].league_id);
            let dg = $(li).find('.sportNavDraggable');
            $(dg).draggable(sportNavDraggableOptions);
            if(selectedLeagues.indexOf(arr[i]['value'].league_id.toString())!=-1){
              $(dg).draggable('disable');
            }
          }
        }

        let saved = $.cookie(storeSelectedLeagueKey);
        // if(updateSportCount == 0 && (typeof saved == 'undefined' || saved == '')){
        //   EnableSportLeague('all');
        // }
        
        let searchString = $.trim($('#inputSearchSportLeague').val());
        leaguesData = arr;
        if(searchString!="")
          onSearchLeagueList(searchString);
        
        removeMissingSelectedSport(arr);
        checkIsAllLeagueOnDisplay();
      }
    }
  }

  // var nnn = 0;
  var sportEmptyTmpl = $.templates('#sportEmpty_Tmpl'); // get match template
  $('#emptyWarning').html(sportEmptyTmpl);
  var matchRowTmpl = $.templates('#sportMatchTmpl_sp_' + sportPage); // get match template
  function CreateSportTable(arr){
    // if(nnn>0)
    //   return
    // nnn++
    if(Object.keys(arr).length == 0){
    	$('#emptyWarning').show();
    	return;
    }else{
    	$('#emptyWarning').hide();
    }

    if(JSON.stringify(arr) !== JSON.stringify(matchesData)){
      console.log(arr)
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
        
        var sortMatches = sortLeagueMatchesData(lVal.league_matches);

        let lgDisplayName = (lVal.league_name_th!='') ? lVal.league_name_th : lVal.league_name_en;
        if(lgDisplayName != $('.sport-league-head.'+lKey+' > span').text()){
          $('.sport-league-head.'+lKey+' > span').text(lgDisplayName);
          $('.sport-league-head.'+lKey+' > form').css('display', 'inline-block');
        	if(sortMatches[0][0].b_top > 59)
          	$('.sport-league-head.'+lKey+' > form select[name="league_num"]').val(0);
          else
          	$('.sport-league-head.'+lKey+' > form select[name="league_num"]').val(sortMatches[0][0].b_top);
        }
        
        let frag = document.createDocumentFragment();
        let wrapperData = {'sport': sportZone, 'sport_page': sportPage,}
        let wrapperTmpl = $.templates("#sportMatchTmpl_wrapper");
        let wrapperHtml = wrapperTmpl.render(wrapperData);
        frag.appendChild($.parseHTML($.trim(wrapperHtml))[0]);

        for(var x = 0; x < sortMatches.length; x++){
          let tb = document.createElement('tbody');
          tb.className = 'match_container ' + sortMatches[x][0].b_id;
          tb.id = 'matchContainer_' + sortMatches[x][0].b_id;

          for(var i = sortMatches[x].length - 1; i >= 0; i--){
            if(sortMatches[x][i].match_ignore){ tb.style.display = 'none'; }
            let playTime = new Date(sortMatches[x][i].b_date_play * 1000);
            let card_r = (sortMatches[x][i].card_r!==null && sortMatches[x][i].card_r!="") ? sortMatches[x][i].card_r.split(",") : [0,0];
            let card_y = (sortMatches[x][i].card_y!==null && sortMatches[x][i].card_y!="") ? sortMatches[x][i].card_y.split(",") : [0,0];
            let matchSum = calculateMatchSum();
            let matchTotal = calculateMatchTotal();
            let tmplData = {
              'sport_step': sportStep,
              'sport_page': sportPage,
              'match_order': sortMatches[x].length - i,
              'match_end': ((sortMatches[x][i].b_live == 4) || (sortMatches[x][i].b_live == 0 && playTime.getTime() < timeNow.getTime())) ? true : false,
              'match_1h_end': ((sortMatches[x][i].b_live == 4) || (sortMatches[x][i].b_live > 2) || (sortMatches[x][i].b_live == 0 && playTime.getTime() < timeNow.getTime())) ? true : false,
              'league_id': sortMatches[x][i].b_zone_id,
              'match_id': sortMatches[x][i].b_id,
              'match_add': sortMatches[x][i].b_add,
              'no_bet': sortMatches[x][i].no_bet,
              'manual': sortMatches[x][i].b_manual,
              'b_step': sortMatches[x][i].b_step,
              'match_market': sportLiveIndex.indexOf(sortMatches[x][i].b_live)!=-1 ? "live" : "today",
              'team_1_name': (sortMatches[x][i].b_name_1_th!='') ? sortMatches[x][i].b_name_1_th : sortMatches[x][i].b_name_1_en,
              'team_2_name': (sortMatches[x][i].b_name_2_th!='') ? sortMatches[x][i].b_name_2_th : sortMatches[x][i].b_name_2_en,
              'team_1_card_r': card_r[0],
              'team_1_card_y': card_y[0],
              'team_2_card_r': card_r[1],
              'team_2_card_y': card_y[1],
              'team_big': sortMatches[x][i].b_big,
              'live_text': sportLiveIndex.indexOf(sortMatches[x][i].b_live)!=-1 ? sortMatches[x][i].b_run_score_full :  "",
              'time_text': sportLiveIndex.indexOf(sortMatches[x][i].b_live)!=-1 ? sortMatches[x][i].b_live_string : (padNumber(playTime.getHours(), 2) + ":" + padNumber(playTime.getMinutes(), 2)),
              'score_full': sortMatches[x][i].b_run_score_full,
              'score_half': sortMatches[x][i].b_run_score_half,
              'run_score_full': sortMatches[x][i].b_run_score_full,
              'run_score_half': sortMatches[x][i].b_run_score_half,
              '_hdc': sortMatches[x][i].b_hdc,
              '_hdc_1': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_hdc_1 : sortMatches[x][i].b_hdc_step1),
              '_hdc_2': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_hdc_2 : sortMatches[x][i].b_hdc_step2),
              '_1h_hdc': sortMatches[x][i].b_1h_hdc,
              '_1h_hdc_1': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1h_hdc_1 : sortMatches[x][i].b_1h_hdc_step1),
              '_1h_hdc_2': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1h_hdc_2 : sortMatches[x][i].b_1h_hdc_step2),
              '_goal': sortMatches[x][i].b_goal,
              '_goal_1': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_goal_1 : sortMatches[x][i].b_goal_step1),
              '_goal_2': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_goal_2 : sortMatches[x][i].b_goal_step2),
              '_1h_goal': sortMatches[x][i].b_1h_goal,
              '_1h_goal_1': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1h_goal_1 : sortMatches[x][i].b_1h_goal_step1),
              '_1h_goal_2': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1h_goal_2 : sortMatches[x][i].b_1h_goal_step2),
              '_1x2_x': sortMatches[x][i].b_1x2_x,
              '_1x2_1': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1x2_1 : sortMatches[x][i].b_1x2_step1),
              '_1x2_2': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1x2_2 : sortMatches[x][i].b_1x2_step2),
              '_1h_1x2_x': sortMatches[x][i].b_1h_1x2_x,
              '_1h_1x2_1': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1h_1x2_1 : sortMatches[x][i].b_1h_1x2_step1),
              '_1h_1x2_2': formatNumberDecimalPlaces((!sportStep) ? sortMatches[x][i].b_1h_1x2_2 : sortMatches[x][i].b_1h_1x2_step2),
              '_odd': formatNumberDecimalPlaces(sortMatches[x][i].b_odd),
              '_even': formatNumberDecimalPlaces(sortMatches[x][i].b_even),
              '_1h_odd': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_odd),
              '_1h_even': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_even),
              '_percent_1': sortMatches[x][i].b_percent_1,
              '_percent_2': sortMatches[x][i].b_percent_2,
              '_percent_3': sortMatches[x][i].b_percent_3,
              '_1h_percent_1': sortMatches[x][i].b_1h_percent_1,
              '_1h_percent_2': sortMatches[x][i].b_1h_percent_2,
              '_1h_percent_3': sortMatches[x][i].b_1h_percent_3,
              '_m_sum_1': matchSum[0][0], /* -- */
              '_m_sum_2': matchSum[0][1], /* -- */
              '_m_sum_3': matchSum[0][2], /* -- */
              '_m_sum_4': matchSum[0][3], /* -- */
              '_m_1h_sum_1': matchSum[1][0], /* -- */
              '_m_1h_sum_2': matchSum[1][1], /* -- */
              '_m_1h_sum_3': matchSum[1][2], /* -- */
              '_m_1h_sum_4': matchSum[1][3], /* -- */
              '_m_total_1': matchTotal[0], /* -- */
              '_m_total_2': matchTotal[1], /* -- */
              '_m_1h_total_1': matchTotal[2], /* -- */
              '_m_1h_total_2': matchTotal[3], /* -- */
              '_bet_1': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_1),
              '_bet_2': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_2),
              '_bet_3': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_3),
              '_bet_4': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_4),
              '_bet_5': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_5),
              '_bet_6': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_6),
              '_bet_7': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_7),
              '_bet_8': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_8),
              '_bet_9': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_9),
              '_1h_bet_1': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_1),
              '_1h_bet_2': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_2),
              '_1h_bet_3': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_3),
              '_1h_bet_4': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_4),
              '_1h_bet_5': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_5),
              '_1h_bet_6': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_6),
              '_1h_bet_7': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_7),
              '_1h_bet_8': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_8),
              '_1h_bet_9': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_9),
              '_bet_total_1': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_1 + sortMatches[x][i].b_bet_2),
              '_bet_total_2': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_3 + sortMatches[x][i].b_bet_4),
              '_bet_total_3': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_5 + sortMatches[x][i].b_bet_6 + sortMatches[x][i].b_bet_7),
              '_bet_total_4': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_8 + sortMatches[x][i].b_bet_9),
              '_1h_bet_total_1': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_1 + sortMatches[x][i].b_1h_bet_2),
              '_1h_bet_total_2': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_3 + sortMatches[x][i].b_1h_bet_4),
              '_1h_bet_total_3': formatNumberDecimalPlaces(sortMatches[x][i].b_1h_bet_5 + sortMatches[x][i].b_1h_bet_6 + sortMatches[x][i].b_1h_bet_7),
              '_1h_bet_total_4': formatNumberDecimalPlaces(sortMatches[x][i].b_bet_8 + sortMatches[x][i].b_1h_bet_9),

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
    start: function(){ onDragSportList = true; },
    stop: function(){ onDragSportList = false; }
  };
  
  $('#sportContainer_body').sortable({
    axis: 'y',
    cursor: 'move',
    handle: '.sport-league-head',
    connectWith: '.sportNavDraggable',
    placeholder: 'sortableLeaguePlaceholder',
    start: function(e, ui){ ui.placeholder.height(ui.item.innerHeight()); }, 
    update: function(e, ui){ reorderSportLeagueTable(); }
  });

  $('#sportContainer_body').droppable({
    classes: {
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
      let data = { 'league_id': lId,};
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
      }
    }
  }

  function normalizeMatchesData(arr){
    var tmpData = {};
    var checkAllMatchInLeagueIgnore = {};
    var selectedLeagues = getSelectedLeague();
    var ignoredMatches = getIgnoreMatch();
    for(var i = arr.length - 1; i >= 0; i--){
      if(arr[i].b_zone != sportZone){ // check sport zone, hdc
        continue;
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
      if(checkAllMatchInLeagueIgnore[index] == Object.keys(val.league_matches).length){
        EnableSportLeague(index, false);
      }else{
      	
      }
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
    var sort = sortProperties(tmpSort, 'b_date_play', true); // Sort league by name
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
    var sort = sortProperties(tmpLeagueData, 'league_name', false); // Sort league by name
    return sort;
  }

  $(document).on('change', 'input[name="enableSportList"]', function(event){
    event.preventDefault();
    var val = $(this).val();
    EnableSportLeague(val, $(this).is(':checked'));
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
    if($('input[name="enableSportList"]').length == $('input[name="enableSportList"]:checked').length)
      $('input[name="enableSportListAll"]').prop('checked', true);
    else
      $('input[name="enableSportListAll"]').prop('checked', false);
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

  $(document).on('change', '#switch-league-all', function(event) {
    event.preventDefault();
    if($(this).is(':checked')){
      EnableSportLeague('all');
    }else{
      EnableSportLeague('none');
    }
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

  $(document).on('change', 'input[name="chk_time"], input[name="chk_no_bet"], input[name="chk_manual"], input[name="chk_b_step"], select[name="league_num"]', function(event){
  	event.preventDefault();
  	$(this.form).trigger('submit');
  });

  function calculateMatchTotal(){
  	return [1,2,3,4];
  } 
  function calculateMatchSum(){
  	return [[1,2,3,4],[1,2,3,4]];
  }
});

var editDialog = null;
function editMatchData(team, matchId, matchOrder, leagueId, half){
  var match = matchesData[leagueId].league_matches[matchId][matchesData[leagueId].league_matches[matchId].length - matchOrder];
  console.log(match)
  if(typeof match != 'undefined' && editDialog === null){
    let play_time = new Date(match.b_date_play * 1000);
    let formValue = {
      'half':  half,
      'trigger_team'  : team,
      'match_id': match.b_id,
      'match_add': match.b_add,
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
            console.log(res)
          })
          .fail(function(){
            console.log("error");
          })
          .always(function(){
            $($form).find('fieldset').removeAttr('disabled');
            // self.close();
          });
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

var sumDialog = null;
function showBetSummary(matchId, matchAdd, qType, half, num){
  sumDialog = $.dialog({
    title: " ",
    content: function(){
      var self = this;
      return $.ajax({
        url: 'process/matchSumTable.php',
        dataType: 'html',
        method: 'get',
        data: {'match_id': matchId, 'match_add': matchAdd, 'q_type': qType, 'half': half, 'num': num},
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