<?php require('inc_head.php'); ?>

<style type="text/css">
    #tbSportBill tbody tr.trbill:hover,tr.alt:hover{
        background: transparent !important;
    }
    #tbSportBill tbody tr.trbill>td:hover,tr>td.alt:hover{
        background: #a0a0a0 !important;
    }
    #tbSportBill tfoot tr{
        background: #e6e6e6;
    }
    #tbSportBillDetail thead tr:hover,tr.alt:hover,#tbSportBillDetail thead tr{
        background: #e6e3e3  !important;
        color:#000;
    }
    #tbSportBillDetail tfoot tr{
        background: #e6e6e6;
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="reloadWinLoseByTeam">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> <?=$lang_sportBill[2];?> </strong></h4>
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
                        <div class="table-responsive">
                            <table id="tbSportBill" class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th><strong><?=$lang_sportBill[3];?></strong></th>
                                        <th><strong><?=$lang_sportBill[4];?></strong></th>
                                        <th><strong><?=$lang_sportBill[5];?></strong></th>
                                        <th><strong><?=$lang_sportBill[6];?></strong></th>
                                        <th><strong><?=$lang_sportBill[7];?></strong></th>
                                        <th><strong><?=$lang_sportBill[8];?></strong></th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    <tr>
                                        <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_message[1];?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr><td colspan="3"><strong><?=$lang_sportBill[9];?></strong></td>
                                    <td class="num text-right" id="km_total"><strong>0.00</strong></td>
                                    <td class="num text-right" id="ft_total"><strong>0.00</strong></td>
                                    <td></td>
                                </tr></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    function sportBillDetail(matchId,betType){

        $.ajax({
            url: 'sportBillDetail',
            data: { 
                 matchId : matchId
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                $(".trbill .divBill").slideUp();
                $(".trbill").hide();

                $("#div"+response.matchId).html(response.temp);
                $("#tr"+response.matchId).slideDown();
                $("#div"+response.matchId).slideDown();

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function closeTr(now){
        $(now).closest('tr').closest('table').closest('div').slideUp(function(){
            $(now).closest('tr').closest('table').closest('div').closest('tr').hide();
        });
    }
    

</script>
