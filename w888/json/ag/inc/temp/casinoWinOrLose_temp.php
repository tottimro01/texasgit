<?php require('inc_head.php'); ?>

<div class="row">
    <div class="widget-box hidden-boder" id="reloadWinLoseByTeam">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> <?=$lang_soccerWinOrLose[2];?> </strong></h4>
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
                        <form class="form-horizontal" id="soccerWinLoseByTeamForm">
                            <div class="form-group">                           
                                <label class="control-label col-xs-12 col-sm-1 no-padding-right" for="username"><?=$lang_soccerWinOrLose[3];?> :</label>
                                <div class="col-xs-8 col-sm-3">
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-2">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_soccerWinOrLose[4];?> 
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                        <div class="table-responsive">
                            <table id="tb_winLoseByTeam" class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th rowspan="2"><strong><?=$lang_soccerWinOrLose[5];?></strong></th>
                                        <th rowspan="2"><strong><?=$lang_soccerWinOrLose[6];?></strong></th>
                                        <th rowspan="2"><strong><?=$lang_soccerWinOrLose[7];?></strong></th>
                                        <th><strong><?=$lang_soccerWinOrLose[8];?></strong></th>
                                        <th><strong><?=$lang_soccerWinOrLose[9];?></strong></th>
                                        <th rowspan="2"><strong><?=$lang_soccerWinOrLose[10];?></strong></th>
                                        <th rowspan="2"><strong><?=$lang_soccerWinOrLose[11];?></strong></th>
                                    </tr>
                                    <tr>
                                        <th><strong><?=$lang_soccerWinOrLose[12];?></strong></th>
                                        <th><strong><?=$lang_soccerWinOrLose[12];?></strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="7" class="text-danger"><?=$lang_message[1];?></td></tr>
                                </tbody>
                                <tfoot>
                                    <tr><td colspan="2"><strong><?=$lang_soccerWinOrLose[11];?></strong></td>
                                    <td class="num text-right" id="km_total">0.00</td>
                                    <td class="num text-right" id="ft_total">0.00</td>
                                    <td class="num text-right" id="ht_total">0.00</td>
                                    <td class="num text-right" id="com_total">0.00</td>
                                    <td class="num text-right" id="total">0.00</td>
                                </tr></tfoot>
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
    $(".digits").digits();
    jQuery(function($) {

         //datepicker plugin

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        $(".date-picker").datepicker("setDate", new Date());

    });


    $('#btn_search').on('click',function(e){
        getWinLose();
    });

      function getWinLose(){
        $('#reloadWinLoseByTeam').load('show');
        var table = "";
        var total = {
            km : 0,
            fw : 0,
            hw : 0,
            cm : 0,
            tw : 0,
        }

        $.ajax({
            url: 'sCasinoWinOrLose.php',
            type: 'POST',
            dataType: 'json',
            data: {
                _token      : $('input[name=_token]').val(),
                sdate       : $('input[name=sdate]').val(),
            },

        }).done(function(response) {

            if(response.status){
                $.each(response.result,function(key,val){
                    table += '<tr>'+
                                '<td colspan="2" style="background-color:#FAFAFA;"><strong>'+ key +'</strong></td>'+
                                '<td colspan="5" style="background-color:#FAFAFA;"></td>'+
                             '</tr>';

                    $.each(val,function(k,v){
                        total.km = total.km + Number(v.keep_money);
                        total.fw = total.fw + Number(v.fwinloss);
                        total.hw = total.hw + Number(v.hwinloss);
                        total.cm = total.cm + Number(v.com_money);
                        total.tw = total.tw + Number(v.total_winloss);

                        table += '<tr onclick="getDetail(&quot;'+ v.params +'&quot;);" class="cur">'+
                                    '<td>'+ v.bet_team_home +'</td>'+
                                    '<td>'+ v.bet_team_away +'</td>'+
                                    '<td class="num text-right">'+ Number(v.keep_money * -1).toFixed(2) +'</td>'+
                                    '<td class="num text-right digits">'+ Number(v.fwinloss * -1).toFixed(2) +'</td>'+
                                    '<td class="num text-right digits">'+ Number(v.hwinloss * -1).toFixed(2) +'</td>'+
                                    '<td class="num text-right digits">'+ Number(v.com_money * -1).toFixed(2) +'</td>'+
                                    '<td class="num text-right digits">'+ Number(v.total_winloss * -1).toFixed(2) +'</td>'+
                                 '</tr>';

                    });
                });
            }else{
                table = '<tr>'+
                            '<td colspan="7" class="text-danger"> Not found data. </td>'+
                        '</tr>';

            }

            $('#km_total').text(total.km.toFixed(2));
            $('#ft_total').text(total.fw.toFixed(2));
            $('#ht_total').text(total.hw.toFixed(2));
            $('#com_total').text(total.cm.toFixed(2));
            $('#total').text(total.tw.toFixed(2));

        }).always(function(){

            $('#tb_winLoseByTeam tbody').html(table);
            $('td.num').digits();
            $('#reloadWinLoseByTeam').load('hide');

        });

    }



    function getDetail(param){

        var h = screen.height;
        var w = screen.width;

        var setting  = 'width='+screen.width;
            setting += ', height='+h;
            setting += ', top=0, left=0'
            setting += ', fullscreen=no'
            setting += ', scrollbars=1',
            setting += ', resizable=yes';
    
        newwin = window.open('casinoWinOrLoseDetail?params='+param,'winorlossteam', setting);        

        if (window.focus) {
            newwin.focus()
        }
        return false;

    }

</script>

