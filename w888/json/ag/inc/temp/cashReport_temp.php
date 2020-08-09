<?php require('inc_head.php');?>
<div class="page-content" id="pageContent" style=""><style type="text/css">
    @media (max-width: 990px) { 
        .pdTopButton{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="reloadReport">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_cashReport[2];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 widthTable">
                        <form class="form-horizontal" id="frmSearch">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-1 control-label "><strong><?=$lang_cashReport[3];?> : </strong></label>
                                <div class="col-xs-6 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="stype" name="stype">
                                        <option value="D"><?=$lang_cashReport[4];?></option>
                                        <option value="W"><?=$lang_cashReport[5];?></option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-2">
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy" value="26-03-2019" readonly="readonly">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 pdTopButton">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchReport(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_cashReport[6];?>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="table-header">
                            Results for Report " <font color="black"><sapn class="showsdate">26-03-2019</sapn></font> "
                        </div>
                        <div class="table-responsive">
                            <table id="tbReport" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?=$lang_cashReport[7];?> </th>
                                        <th class="text-center"><?=$lang_cashReport[8];?></th>
                                        <th class="text-center"><?=$lang_cashReport[9];?></th>
                                        <th class="text-center"><?=$lang_cashReport[10];?></th>
                                        <th class="text-center" id="thWaitChecking"><?=$lang_cashReport[11];?></th>
                                        <th class="text-center" id="thWaitCredit"><?=$lang_cashReport[12];?></th>
                                        <th class="text-center"><?=$lang_cashReport[13];?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7"><center><strong> <?=$lang_message[1];?> </strong></center></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" colspan="4"><strong><?=$lang_cashReport[14];?></strong></td>
                                        <td align="center" id="tfWaitChecking"><strong>0.00</strong></td>
                                        <td align="center" id="tfWaitCredit"><strong>0.00</strong></td>
                                        <td align="right"><strong><font id="sumAmount">0.00</font></strong></td>
                                    </tr>
                                </tfoot>
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

<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/daterangepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script type="text/javascript">

    jQuery(function($) {
        //datepicker plugin
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
    });

    function searchReport(btnow){

        $("#reloadReport").load('show');

        

        $.ajax({
            url: 'cashReportList.php',
            data: { 
                stype       : $('select[name="stype"]').val(),
                sdate       : $('input[name="sdate"]').val()
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                if(response.status){

                    if($('select[name="stype"]').val() == 'W'){
                        $("#thWaitChecking").hide();
                        $("#thWaitCredit").hide();
                        $("#tfWaitChecking").hide();
                        $("#tfWaitCredit").hide();
                    }else{
                        $("#thWaitChecking").show();
                        $("#thWaitCredit").show();
                        $("#tfWaitChecking").show();
                        $("#tfWaitCredit").show();
                    }
                    
                    $("#tbReport tbody").html(response.list);
                    $('#sumAmount').text(response.sumAmount);
                    $('.showsdate').text(response.sdate);

                }else{
                    dialogError('data error');
                }
                $("#reloadReport").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function reportDetail(accnumber,ststus){

        $.ajax({
            url: 'cashReportDetail',
            data: { 
                stype       : $('select[name="stype"]').val(),
                sdate       : $('input[name="sdate"]').val(),
                accnumber   : accnumber,
                status      : ststus
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#showModal").html(response.temp);
                $("#reportDetail").modal('show');

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

</script></div>