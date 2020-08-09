<?php require('inc_head.php'); ?>

<div class="row">
    <div class="widget-box hidden-boder bgWeb" id="reloadSTL">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> Summary Today - Live </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 widthTable"> 
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                        <div class="table-responsive">
                            <table id="tbSummary" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="center">
                                            <center><?=$lang_soccerSummaryToday[3];?></center>
                                            <button class="btn btn-minier btn-grey" onclick="reSerchSummary();">
                                                <div id="clock" class=""><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> 55 &nbsp;&nbsp;</div>
                                            </button>
                                            <script type="text/javascript">
                                                function timeCountDownSummary(){
                                                    var fiveSeconds = new Date().getTime() + 59000;
                                                    $('#clock').countdown(fiveSeconds, function(event) {
                                                    var $this = $(this).html(event.strftime('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> %S &nbsp;&nbsp;'));

                                                        if(event.strftime('%S')==0){
                                                            searchSummaryTodayLive();
                                                            timeCountDownSummary();
                                                        }
                                                    });

                                                }
                                                timeCountDownSummary();
                                            </script>
                                        </th>
                                        <th rowspan="2"><center><?=$lang_soccerSummaryToday[4];?></center></th>
                                        <th colspan="2"><center><?=$lang_soccerSummaryToday[5];?></center></th>
                                        <th colspan="2"><center><?=$lang_soccerSummaryToday[6];?></center></th>
                                    </tr>
                                    <tr>
                                        <th><center><?=$lang_soccerSummaryToday[7];?></center></th>
                                        <th><center><?=$lang_soccerSummaryToday[8];?></center></th>
                                        <th><center><?=$lang_soccerSummaryToday[7];?></center></th>
                                        <th><center><?=$lang_soccerSummaryToday[8];?></center></th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
</div>

<div id="showModal"></div>
<script type="text/javascript">

    function nFormatSoccer(num){
        num = num.toString();
        var re = /(-?\d+)(\d{3})/;
        while (re.test(num)){
            num = num.replace(re, "$1,$2");
        }
        return num;
    }

    $(".digits1").each(function() {
        var valNum = textToNum($(this).text());
        if(valNum < 0){
            $(this).text(nFormatSoccer(Math.abs(valNum)));
        }

    });

    jQuery(function($) {
        searchSummaryTodayLive();
    });

    function reSerchSummary(){
        timeCountDownSummary();
        searchSummaryTodayLive();
    }

    function searchSummaryTodayLive(){
        $("#reloadSTL").load('show');
        $.ajax({
            url: 'gCasinoSummaryToday.php',
            data: { 
                    _token : $('input[name="_token"]').val()

             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if(response.status){
                    $("#tbSummary tbody").html(response.list);
                }else{
                    dialogError('data error');
                }
                $("#reloadSTL").load('hide');
            },

            error: function (response) {
                console.log(response);
            }
        });
    }



    function hideScore(){
        $(".footer").hide();
        $("#showScore").html('');
    }



    function showScore(now,bettype,hf){
        var dataVal = $(now).closest('tr').data('value');
        $("#reloadSTL").load('show');
        if($(now).text() ==''){
            $("#reloadSTL").load('hide');
            return false;
        }

        $.ajax({
            url: 'casinoSummaryToday/scoreWinloss.php',
            data: { 
                    _token : $('input[name="_token"]').val(),
                    bettype : bettype,
                    hf      : hf,
                    league  : dataVal.league,
                    thome   : dataVal.thome,
                    taway   : dataVal.taway,
                    bill_type : dataVal.bill_type,
                    uscore    : dataVal.score,
                    matchid : dataVal.matchid
             },

            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                if(response.status){
                    $(".footer").show();
                    $("#showScore").html(response.list).show();
                    $("#reloadSTL").load('hide');
                }else{
                    dialogError('data error');
                }
            },
            error: function (response) {
                console.log(response);
            }

        });

    }


    function showBetList(now){

        var dataVal = $(now).closest('td').data('value');
        var param = '';
        param += "bettype="+dataVal.bettype;
        param += "&hf="+dataVal.hf;
        param += "&bill_type="+dataVal.bill_type;
        param += "&uscore="+dataVal.uscore;
        param += "&matchid="+dataVal.matchid;
        var viewportwidth = document.documentElement.clientWidth;
        var setting  = 'width=600';
            setting += ', height=900';
            setting += ', top=0, left=0'
            setting += ', fullscreen=no'
            setting += ', scrollbars=1',
            setting += ',left='+(viewportwidth-300),
            setting += ', resizable=yes';

        newwin = window.open('casinoSummaryToday/betList.php?'+param,'winorlossteam', setting);
        if (window.focus) {
            newwin.focus()
        }
        return false;
    }

</script>

