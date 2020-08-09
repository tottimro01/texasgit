$(function(){
    var formGetLeagueOrder = document.getElementById('formGetLeagueOrder');
    var formUpdateLeagueOrder = document.getElementById('formUpdateLeagueOrder');
    var LeagueOrderReference = {
        count: 0, list: [],
    };
    function IsValidOrder(){
        for(var i = 0; i < LeagueOrderReference.count; i++){
            if(LeagueOrderReference.list[i].zone_top != i+1)
                return false;
        }
        return true;
    }

    $(formGetLeagueOrder).on('submit', function(event){
        event.preventDefault();
        loadLeagueData().then(function(res){
            loadLeagueDataCallback(res);
        });
    });
    $(formGetLeagueOrder).submit();

    function loadLeagueData(){
        var $def = $.Deferred();
        var fdata = $(formGetLeagueOrder).serialize();
        showLoader(true);
        $.ajax({
            type: formGetLeagueOrder.method,
            url: formGetLeagueOrder.action,
            data: fdata,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(response, status, xhr){
            $def.resolve(response);
        })
        .fail(function(xhr, status, error){
            $def.reject(error);
        })
        .always(function(){
            showLoader(false);
        });
        return $def.promise();
    }

    function loadLeagueDataCallback(result){
        if(result.status == 1){
            var res = sortProperties(result.result, 'zone_top', true);
            LeagueOrderReference = {
                count: res.length,
                list: [],
            };
            for(var i = 0; i < res.length; i++){
                let d = {
                    zone_id: res[i].value.zone_id,
                    zone_top: res[i].value.zone_top,
                    zone_name: res[i].value.zone_name,
                };
                LeagueOrderReference.list.push(d);
            }
            generateLeagueOrderHTML();
            generateLeagueOrderInput();
        }
    }

    function generateLeagueOrderHTML(){
        var data = {league: LeagueOrderReference.list};
        var tmpl = $.templates("#leagueOrderBoxTmpl");
        var html = tmpl.render(data);
        $('#league_order').html(html);
        sortableLeague();
    }

    function generateLeagueOrderInput(){
        $(formUpdateLeagueOrder).find('input.lo').remove();
        var fieldset = $(formUpdateLeagueOrder).find('fieldset');
        var frag = document.createDocumentFragment();
        var data = LeagueOrderReference.list;
        for(var i = 0; i < data.length; i++){
            var input = document.createElement('input');
            input.type = 'hidden';
            input.value = data[i].zone_id+'_'+data[i].zone_top;
            input.name = 'league_order[]';
            input.className = 'lo';
            input.dataset.lname = data[i].zone_name;
            frag.appendChild(input);
        }
        if(IsValidOrder() && data.length > 0){
            $(fieldset).removeAttr('disabled');
        }else{
            $(fieldset).attr('disabled', 'disabled');
        }
        $(fieldset).find('.input-group').html(frag);
    }

    function sortableLeague(){
        if(typeof $('#league_order').sortable('instance') != 'undefined')
            $('#league_order').sortable('destroy'); 

        var duplicateCheck = checkHasDuplicateLeague();
        var overLengthCheck = checkOverLengthLeagueOrder();
        // console.log(overLengthCheck)
        if(duplicateCheck.IsDusplicate || overLengthCheck.IsOverLength){ 
            if(duplicateCheck.IsDusplicate){
                for(var i = 0; i < duplicateCheck.DuplicateList.length; i++){
                    let btn = document.createElement('button');
                    btn.className = 'btn btn-sm btn-warning click-move-down py-0';
                    // ถ้าลำดับ ไม่อยู่ในขอบเขต เช่น มี 10 ลีก แต่ลำดับเป็น 20 ให้เป็นไอคอน ^
                    if(overLengthCheck.OverLengthList.indexOf(duplicateCheck.DuplicateList[i]) != -1)
                        btn.innerHTML = '<i class="fas fa-angle-double-up"></i>';
                    else
                        btn.innerHTML = '<i class="fas fa-angle-double-down"></i>';
                    btn.dataset.zone_top = duplicateCheck.DuplicateList[i];
                    $('.sport-order-list.odr-'+duplicateCheck.DuplicateList[i]).find('.ctrl-cell').append(btn);
                    $('.sport-order-list.odr-'+duplicateCheck.DuplicateList[i]).addClass('border border-warning invalid-league-order');
                }
            }

            if(overLengthCheck.IsOverLength){
                for(var j = 0; j < overLengthCheck.OverLengthList.length; j++){
                    // ถ้าอยู่ในรายการซ้ำด้วย ไม่ต้องเพิ่มปุ่มอีกครั้ง
                    if(duplicateCheck.DuplicateList.indexOf(overLengthCheck.OverLengthList[j]) != -1)
                        continue;

                    let btn = document.createElement('button');
                    btn.className = 'btn btn-sm btn-warning click-move-down py-0';
                    btn.innerHTML = '<i class="fas fa-angle-double-up"></i>';
                    btn.dataset.zone_top = overLengthCheck.OverLengthList[j];
                    $('.sport-order-list.odr-'+overLengthCheck.OverLengthList[j]).find('.ctrl-cell').append(btn);
                    $('.sport-order-list.odr-'+overLengthCheck.OverLengthList[j]).addClass('border border-warning invalid-league-order');
                }
            }
            return;
        }

        $('#league_order').sortable({
            axis: 'y',
            cursor: 'move',
            placeholder: 'ui-state-highlight',
            zIndex: 9,
            start: function(e, ui){ ui.placeholder.height(ui.item.innerHeight()); }, 
            update: function(e, ui){ OnSortSportLeagueOrder(); }
        }); 
    }

    function OnSortSportLeagueOrder(){
        LeagueOrderReference.list = [];
        $.each($('.sport-order-list'), function(index, value){ 
            let d = {
               zone_id: value.dataset.id,
               zone_top: index+1,
               zone_name: value.dataset.name,
            };
            LeagueOrderReference.list.push(d);
        });
        if(IsValidOrder()){
            generateLeagueOrderInput();
            generateLeagueOrderHTML();
        }
    }

    function checkHasDuplicateLeague(){
        var tmp = [];
        var isDuplicate = false;
        var duplicateList = [];
        for(var i = 0; i < LeagueOrderReference.list.length; i++){
            if(tmp.indexOf(LeagueOrderReference.list[i].zone_top) != -1){
                isDuplicate = true;
                if(duplicateList.indexOf(LeagueOrderReference.list[i].zone_top) == -1)
                    duplicateList.push(LeagueOrderReference.list[i].zone_top);
            }
            tmp.push(LeagueOrderReference.list[i].zone_top);
        }
        return {
            IsDusplicate: isDuplicate,
            DuplicateList: duplicateList,
        }
    }

    function checkOverLengthLeagueOrder(){
        var isOverLength = false;
        var overLengthList = [];
        for(var i = 0; i < LeagueOrderReference.list.length; i++){
            if(LeagueOrderReference.list[i].zone_top > LeagueOrderReference.count){
                isOverLength = true;
                if(overLengthList.indexOf(LeagueOrderReference.list[i].zone_top) == -1)
                    overLengthList.push(LeagueOrderReference.list[i].zone_top);
            }
        }
        return {
            IsOverLength: isOverLength,
            OverLengthList: overLengthList,
        }
    }

    $(document).on('click', '.click-move-down', function(event){
        event.preventDefault();
        var $self = this;
        var form = $($self).siblings('form')[0];
        var zoneId = form.zone_id.value;
        var zoneTop = form.zone_top.value;
        SortInvalidLeagueOrder(zoneId, zoneTop)
        // var idx = -1;
        // var offset =  zoneTop > LeagueOrderReference.count ? 1 : 1;
        // for(var i = 0; i < LeagueOrderReference.count; i++){
        //     if(LeagueOrderReference.list[i].zone_id == zoneId){
        //         idx = i;
        //         break;
        //     }
        // }
        // var tmp = LeagueOrderReference.list[idx];
        // LeagueOrderReference.list.splice(idx, 1); // remove list from array
        // LeagueOrderReference.count -= 1;

        // // หาลำดับลีกที่เป็นไปได้ ที่ว่างอยู่
        // for(var j = LeagueOrderReference.count+1; j > 0; j--){
        //     let chkOrderAvailiable = $.grep(LeagueOrderReference.list, function(obj){return obj.zone_top == j;})[0];
        //     if(typeof chkOrderAvailiable == 'undefined'){
        //         tmp.zone_top = j;
        //         break;
        //     }
        // }

        // // หาตำแหน่งของ array ที่จะใส่ค่ากลับเข้าไป
        // var indexToReInsert = 0;
        // for(var k = LeagueOrderReference.count-1; k >= 0; k--){
        //     if(parseInt(LeagueOrderReference.list[k].zone_top) < tmp.zone_top){
        //         indexToReInsert = k+offset;
        //         break;
        //     }
        // }

        // LeagueOrderReference.list.splice(indexToReInsert, 0, tmp); // add list back to array
        // LeagueOrderReference.count += 1;
        console.log(LeagueOrderReference)
        generateLeagueOrderHTML();
        generateLeagueOrderInput();
    });

    function SortInvalidLeagueOrder(zoneId, zoneTop){
        var idx = -1;
        var offset =  zoneTop > LeagueOrderReference.count ? 1 : 1;
        for(var i = 0; i < LeagueOrderReference.count; i++){
            if(LeagueOrderReference.list[i].zone_id == zoneId){
                idx = i;
                break;
            }
        }
        var tmp = LeagueOrderReference.list[idx];
        LeagueOrderReference.list.splice(idx, 1); // remove list from array
        LeagueOrderReference.count -= 1;

        // หาลำดับลีกที่เป็นไปได้ ที่ว่างอยู่
        for(var j = LeagueOrderReference.count+1; j > 0; j--){
            let chkOrderAvailiable = $.grep(LeagueOrderReference.list, function(obj){return obj.zone_top == j;})[0];
            if(typeof chkOrderAvailiable == 'undefined'){
                tmp.zone_top = j;
                break;
            }
        }

        // หาตำแหน่งของ array ที่จะใส่ค่ากลับเข้าไป
        var indexToReInsert = 0;
        for(var k = LeagueOrderReference.count-1; k >= 0; k--){
            if(parseInt(LeagueOrderReference.list[k].zone_top) < tmp.zone_top){
                indexToReInsert = k+offset;
                break;
            }
        }

        LeagueOrderReference.list.splice(indexToReInsert, 0, tmp); // add list back to array
        LeagueOrderReference.count += 1;
    }

    $(document).on('click', '#btn-reload', function(event){
        $(formGetLeagueOrder).submit();
    });

    $(document).on('click', '#btn-auto-sort', function(event){
        $.each($('.invalid-league-order'), function(i, e){ 
            let f = $(e).find('form.ctrl-form')[0];
            let zoneId = f.zone_id.value;
            let zoneTop = f.zone_top.value;
            SortInvalidLeagueOrder(zoneId, zoneTop);
        });
        generateLeagueOrderHTML();
        generateLeagueOrderInput();
    });
});

function updateLeagueOrderCallback(form, res){
    //console.log(res)
}