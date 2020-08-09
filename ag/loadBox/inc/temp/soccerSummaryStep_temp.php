<?php require('inc_head.php'); ?>

<div class="row">
    <br>
    <div class="col-xs-12 col-sm-6">
        <div class="widget-box" id="reloadST">
            <div class="widget-header">
                <h4 class="widget-title"><?=$lang_ag[120];?></h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="1 ace-icon fa bigger-125 fa-chevron-up"></i>
                    </a>
                </div>
                <div class="widget-toolbar">
                    <a href="#" id="reloadData">
                        <i class="ace-icon fa fa-refresh"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?=$lang_ag[177];?></th>
                                    <th><?=$lang_ag[735];?></th>
                                    <th><?=$lang_ag[197];?></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class="text-left"><strong><?=$lang_ag[737];?></strong></td>
                                    <td>
                                        <font id="total_cnt"> 0 </font>
                                    </td>
                                    <td class="text-right">
                                        <font id="total_mon">0.00</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong><?=$lang_ag[738];?></strong></td>
                                    <td>
                                        <font id="check_cnt">0</font>
                                    </td>
                                    <td class="text-right">
                                        <font id="check_mon"> 0.00</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong><?=$lang_ag[739];?></strong></td>
                                    <td>
                                        <font id="nocheck_cnt">0</font>
                                    </td>
                                    <td class="text-right">
                                        <font id="nocheck_mon">0.00<font>
                                    </font></font></td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong><?=$lang_ag[740];?></strong></td>
                                    <td></td>
                                    <td class="text-right">
                                        <font id="ncom">0.00</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong><?=$lang_ag[741];?></strong></td>
                                    <td></td>
                                    <td class="text-right">
                                        <font id="snet">0.00</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong><?=$lang_ag[742];?></strong></td>
                                    <td></td>
                                    <td class="text-right">
                                        <font id="snet2">0.00</font>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    getSoccerST();
    $('#reloadData').on('click',function(e){
        getSoccerST($('#opPdate').val());
    });

    function getSoccerST(){
        $('#reloadST').load('show');
        $.ajax({
            url: 'gSoccerSummaryStep.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                _token: $('input[name=_token]').val(),
            },
        })
        .done(function(response) {
            if(response.status){

                $("#total_cnt").text(response.result.bill_total_cnt);
                $("#total_mon").text(formatNumber(response.result.bill_total_mon,2,1));
                $("#check_cnt").text(response.result.bill_total_check_cnt);
                $("#check_mon").text(formatNumber(response.result.bill_total_check_mon,2,1));
                $("#nocheck_cnt").text(response.result.bill_total_nocheck_cnt);
                $("#nocheck_mon").text(formatNumber(response.result.bill_total_nocheck_mon,2,1));
                $("#ncom").text(formatNumber(response.result.ncom,2,1));
                $("#snet").text(formatNumber(response.result.snet,2,1));
                $("#snet2").text(formatNumber(response.result.snet2,2,1));
            }

        }).always(function(){

            $('#reloadST').load('hide');
            
        });
    }
</script>
