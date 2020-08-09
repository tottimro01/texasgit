<?php require('inc_head.php'); ?>

<div class="page-content" id="pageContent" style=""><style type="text/css">
    @media (max-width: 990px) { 
        .pdDivBt{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="reloadResult">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[119];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 widthTable">
                        <form class="form-horizontal" method="">
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-1 control-label no-padding-right" for=""><?=$lang_ag[117];?> :</label>
                                <div class="col-xs-4 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="slSport" onchange="getLeague();">
                                        <? foreach ($sport_type as $key => $value) { ?>
                                        <option value="<?=$key;?>" <?if($key==6){?>selected="selected"<?}?>><?=$value;?></option>                                            
                                        <? } ?>
                                       <!--  <option value="sc" selected="selected"><?=$lang_soccerResultSoccer[16];?></option>                                            
                                        <option value="bk"><?=$lang_soccerResultSoccer[17];?></option>                                            
                                        <option value="af"><?=$lang_soccerResultSoccer[18];?></option>                                            
                                        <option value="tn"><?=$lang_soccerResultSoccer[19];?></option>                                            
                                        <option value="ic"><?=$lang_soccerResultSoccer[20];?></option>                                            
                                        <option value="bb"><?=$lang_soccerResultSoccer[21];?></option>                                            
                                        <option value="vb"><?=$lang_soccerResultSoccer[22];?></option>                                            
                                        <option value="bt"><?=$lang_soccerResultSoccer[23];?></option>                                            
                                        <option value="my"><?=$lang_soccerResultSoccer[24];?></option>       -->                                      
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-8">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="slLeague" onchange="getMatch();">
                                        <option value="" selected=""><?=$lang_ag[785];?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-2 col-sm-1 no-padding-right" for="username"><?=$lang_ag[1401];?> :</label>
                                <div class="col-xs-10 col-sm-3">
                                    <div class="input-group">
                                        <input class="form-control date-picker " id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 pdDivBt">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                    <button type="button" class="btn btn-info btn-sm" id="btn_today">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[1405];?>                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" id="btn_yesterday">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[787];?>                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                        <div class="table-responsive">
                            <table id="tb_result" class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        // setTimeout(function(){
             //datepicker plugin
            $('#sdate').datepicker({
                autoclose: true,
                todayHighlight: true,
            }).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });
            $("#sdate").datepicker("setDate", new Date());
        getLeague();
        // }, 500);
    });

    $('#btn_search').on('click',function(){
        getLeague();
    });

    $('#btn_today').on('click',function(){
        var today = moment().format('DD-MM-YYYY')
        getLeague(today);
        $("#sdate").datepicker("setDate", today);
    });

    $('#btn_yesterday').on('click',function(){
        var yesterday = moment().add(-1, 'days').format('DD-MM-YYYY');
        getLeague(yesterday);
        $("#sdate").datepicker("setDate", yesterday);
    });

    function getLeague(sdate){
        var slLeague = "";
        $.ajax({
            url: 'soccerResultSoccerLeague.php',
            type: 'GET',
            dataType: 'json',
            data: {
                sdate : (sdate)? sdate : $('input[name="sdate"]').val(),
                sport : $('#slSport').val(),
            },
        })
        .done(function(response) {
            slLeague += '<option value="" selected="selected">ทุกลีค</option>';
            if(response.status){
                $.each(response.result,function(key,val){
                    if(val.lcap){
                        slLeague += '<option value="'+ val.lkey +'" >'+ val.lcap +'</option>';
                    }else{
                        slLeague += '<option value="'+ val.lkey +'" >'+ val.lkey +'</option>';
                    }
                });
            }
        })
        .always(function() {
            $('#slLeague').html(slLeague);
            getMatch(sdate);
        });
    }

    function getMatch(sdate){
        $('#reloadResult').load('show');
        var thead = "";
        var tbody = "";
        var sports = $('#slSport').val()
        $.ajax({
            url: 'gSoccerResultSoccer.php',
            type: 'POST',
            dataType: 'json',
            data: {
                _token    : $('input[name=_token]').val(),
                sdate     : (sdate)? sdate : $('input[name=sdate]').val(),
                sport     : sports,
                league    : $('#slLeague').val(),
            },
        })
        .done(function(response) {
            $.each(response.thead,function(key,val){
                thead += '<th>'+ val +'</th>';
            });
            if(response.status){
                
                $.each(response.result,function(key,val){
                    tbody += '<tr>'+
                                '<td colspan="'+ response.thead.length +'" class="text-success text-left"><strong>'+ val[0].re_league +'</strong></td>'+
                             '</tr>';

                             var win = "";
                            $.each(val,function(k,v){
                                win = v.fn_score.split('-');
                               
                                win = checkWin(win[0],win[1]);
                                tbody += '<tr>'+
                                            '<td>'+ v.kickoff_time +'</td>'+
                                            '<td class="text-left">'+
                                                // '<span class="'+ win.win1 +'">'+ v.team_home +'</span> -vs- '+
                                                // '<span class="'+ win.win2 +'">'+ v.team_away +'</span></td>'+
                                                '<span>'+ v.team_home +'</span> -vs- '+
                                                '<span>'+ v.team_away +'</span></td>'+
                                            '<td>'+ v.fh_score +'</td>'+
                                            '<td>'+ v.fn_score +'</td>'+
                                         '</tr>';
                            });

                    // switch (sports){
                    //     case 'sc' : 
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = v.fn_score.split('-');
                               
                    //             win = checkWin(win[0],win[1]);
                    //             tbody += '<tr>'+
                    //                         '<td>'+ v.kickoff_time +'</td>'+
                    //                         '<td class="text-left">'+
                    //                             '<span class="'+ win.win1 +'">'+ v.team_home +'</span> -vs- '+
                    //                             '<span class="'+ win.win2 +'">'+ v.team_away +'</span></td>'+
                    //                         '<td>'+ v.fh_score +'</td>'+
                    //                         '<td>'+ v.fn_score +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;
                    //     case 'bk' : 
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = checkWin(v.h_score2,v.a_score2);
                    //             tbody += '<tr>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.kickoff_time +'</td>'+
                    //                         '<td class="text-left '+ win.win1 +'">'+ v.team_home +'</td>'+
                    //                         '<td>'+ v.hs1 +'</td>'+
                    //                         '<td>'+ v.hs2 +'</td>'+
                    //                         '<td>'+ v.hs3 +'</td>'+
                    //                         '<td>'+ v.hs4 +'</td>'+
                    //                         '<td>'+ v.hs5 +'</td>'+
                    //                         '<td>'+ v.h_score1 +'</td>'+
                    //                         '<td>'+ v.h_score2 +'</td>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_status +'</td>'+
                    //                      '</tr>'+
                    //                      '<tr>'+
                    //                         '<td class="text-left '+ win.win2 +'">'+ v.team_away +'</td>'+
                    //                         '<td>'+ v.as1 +'</td>'+
                    //                         '<td>'+ v.as2 +'</td>'+
                    //                         '<td>'+ v.as3 +'</td>'+
                    //                         '<td>'+ v.as4 +'</td>'+
                    //                         '<td>'+ v.as5 +'</td>'+
                    //                         '<td>'+ v.a_score1 +'</td>'+
                    //                         '<td>'+ v.a_score2 +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;
                    //     case 'af' : 
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = checkWin(v.h_score2,v.a_score2);
                    //             tbody += '<tr>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.kickoff_time +'</td>'+
                    //                         '<td class="text-left '+ win.win1 +'">'+ v.team_home +'</td>'+
                    //                         '<td>'+ v.hs1 +'</td>'+
                    //                         '<td>'+ v.hs2 +'</td>'+
                    //                         '<td>'+ v.hs3 +'</td>'+
                    //                         '<td>'+ v.hs4 +'</td>'+
                    //                         '<td>'+ v.hs5 +'</td>'+
                    //                         '<td>'+ v.h_score1 +'</td>'+
                    //                         '<td>'+ v.h_score2 +'</td>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_status +'</td>'+
                    //                      '</tr>'+
                    //                      '<tr>'+
                    //                         '<td class="text-left '+ win.win2 +'">'+ v.team_away +'</td>'+
                    //                         '<td>'+ v.as1 +'</td>'+
                    //                         '<td>'+ v.as2 +'</td>'+
                    //                         '<td>'+ v.as3 +'</td>'+
                    //                         '<td>'+ v.as4 +'</td>'+
                    //                         '<td>'+ v.as5 +'</td>'+
                    //                         '<td>'+ v.a_score1 +'</td>'+
                    //                         '<td>'+ v.a_score2 +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;
                    //     case 'tn' : 
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = checkWin(v.h_score2,v.a_score2);
                    //             tbody += '<tr>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.kickoff_time +'</td>'+
                    //                         '<td class="text-left '+ win.win1 +'">'+ v.team_home +'</td>'+
                    //                         '<td>'+ v.hs1 +'</td>'+
                    //                         '<td>'+ v.hs2 +'</td>'+
                    //                         '<td>'+ v.hs3 +'</td>'+
                    //                         '<td>'+ v.hs4 +'</td>'+
                    //                         '<td>'+ v.hs5 +'</td>'+
                    //                         '<td>'+ v.h_score1 +'</td>'+
                    //                         '<td>'+ v.h_score2 +'</td>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_status +'</td>'+
                    //                      '</tr>'+
                    //                      '<tr>'+
                    //                         '<td class="text-left '+ win.win2 +'">'+ v.team_away +'</td>'+
                    //                         '<td>'+ v.as1 +'</td>'+
                    //                         '<td>'+ v.as2 +'</td>'+
                    //                         '<td>'+ v.as3 +'</td>'+
                    //                         '<td>'+ v.as4 +'</td>'+
                    //                         '<td>'+ v.as5 +'</td>'+
                    //                         '<td>'+ v.a_score1 +'</td>'+
                    //                         '<td>'+ v.a_score2 +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;
                    //     case 'ic':
                    //     break;
                    //     case 'bb' : 
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = checkWin(v.h_score2,v.a_score2);
                    //             tbody += '<tr>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.kickoff_time +'</td>'+
                    //                         '<td class="text-left '+ win.win1 +'">'+ v.team_home +'</td>'+
                    //                         '<td>'+ v.hs1 +'</td>'+
                    //                         '<td>'+ v.hs2 +'</td>'+
                    //                         '<td>'+ v.hs3 +'</td>'+
                    //                         '<td>'+ v.hs4 +'</td>'+
                    //                         '<td>'+ v.hs5 +'</td>'+
                    //                         '<td>'+ v.hs6 +'</td>'+
                    //                         '<td>'+ v.hs7 +'</td>'+
                    //                         '<td>'+ v.hs8 +'</td>'+
                    //                         '<td>'+ v.hs9 +'</td>'+
                    //                         '<td>'+ v.hsei +'</td>'+
                    //                         '<td>'+ v.h_score2 +'</td>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_status +'</td>'+
                    //                      '</tr>'+
                    //                      '<tr>'+
                    //                         '<td class="text-left '+ win.win2 +'">'+ v.team_away +'</td>'+
                    //                         '<td>'+ v.as1 +'</td>'+
                    //                         '<td>'+ v.as2 +'</td>'+
                    //                         '<td>'+ v.as3 +'</td>'+
                    //                         '<td>'+ v.as4 +'</td>'+
                    //                         '<td>'+ v.as5 +'</td>'+
                    //                         '<td>'+ v.as6 +'</td>'+
                    //                         '<td>'+ v.as7 +'</td>'+
                    //                         '<td>'+ v.as8 +'</td>'+
                    //                         '<td>'+ v.as9 +'</td>'+
                    //                         '<td>'+ v.asei +'</td>'+
                    //                         '<td>'+ v.a_score2 +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;
                    //     case 'vb':
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = checkWin(v.h_score2,v.a_score2);
                    //             tbody += '<tr>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.kickoff_time +'</td>'+
                    //                         '<td class="text-left '+ win.win1 +'">'+ v.team_home +'</td>'+
                    //                         '<td>'+ v.hs1 +'</td>'+
                    //                         '<td>'+ v.hs2 +'</td>'+
                    //                         '<td>'+ v.hs3 +'</td>'+
                    //                         '<td>'+ v.hs4 +'</td>'+
                    //                         '<td>'+ v.hs5 +'</td>'+
                    //                         '<td>'+ v.h_score1 +'</td>'+
                    //                         '<td>'+ v.h_score2 +'</td>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_status +'</td>'+
                    //                      '</tr>'+
                    //                      '<tr>'+
                    //                         '<td class="text-left '+ win.win2 +'">'+ v.team_away +'</td>'+
                    //                         '<td>'+ v.as1 +'</td>'+
                    //                         '<td>'+ v.as2 +'</td>'+
                    //                         '<td>'+ v.as3 +'</td>'+
                    //                         '<td>'+ v.as4 +'</td>'+
                    //                         '<td>'+ v.as5 +'</td>'+
                    //                         '<td>'+ v.a_score1 +'</td>'+
                    //                         '<td>'+ v.a_score2 +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;
                    //     case 'my':
                    //         var win = "";
                    //         $.each(val,function(k,v){
                    //             win = checkWin(v.h_score2,v.a_score2);
                    //             tbody += '<tr>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_start +'</td>'+
                    //                         '<td class="text-left '+ win.win1 +'" style="color:red;">'+ v.en_red +'</td>'+
                    //                         '<td>'+ v.re_red_wl +'</td>'+
                    //                         '<td rowspan="2" class="text-middle">'+ v.re_status +'</td>'+
                    //                      '</tr>'+
                    //                      '<tr>'+
                    //                         '<td class="text-left '+ win.win2 +'" style="color:blue;">'+ v.en_blue +'</td>'+
                    //                         '<td>'+ v.re_blue_wl +'</td>'+
                    //                      '</tr>';
                    //         });
                    //     break;

                    //     case 'bt':
                    //     break;
                        
                    // }
                   
                });

            }else{
                tbody = '<tr>'+
                            '<td colspan="20" class="text-danger"> <?=$lang_message[1];?> </td>'+
                        '</tr>';
            }
        })
        .always(function() {
            $('#tb_result thead tr').html(thead);
            $('#tb_result tbody').html(tbody);
            $('#reloadResult').load('hide');
        });

        function checkWin(sc1,sc2){
            var result = {
                win1 : '',
                win2 : '',
            }
            if(Number(sc1) > Number(sc2)) {
                result.win1 = "text-strong text-primary";
                result.win2 = "";
            }else if(Number(sc1) < Number(sc2)){
                result.win1 = "";
                result.win2 = "text-strong text-primary"; 
            }else{
                result.win1 = "";
                result.win2 = ""; 
            }

            return result;
        }
    }
</script></div>