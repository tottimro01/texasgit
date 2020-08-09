<?php require('inc_head.php'); ?>

<link rel="stylesheet" href="assets/css/custom/casinobetReject_temp.css">
<div class="row">
    <div class="widget-box hidden-boder" id="reloadBetReject">
        <div class="widget-header hidden">
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload" id="reloadBetReject1">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main ">
                <div class="row">
                    <div class="col-xs-12 ">
                        <form class="form-horizontal" id="frmSearchOutstanding">
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-1 control-label"><strong><?=$lang_ag[205];?> : </strong></label>
                                <div class="col-xs-9 col-sm-2">
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy" value="25-03-2019" readonly="readonly" onchange="clearSearch();">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-xs-3 col-sm-1 control-label" ><strong><?=$lang_ag[205];?> : </strong></label>
                                <div class="col-xs-9 col-sm-2" style="">
                                    <select class="form-control col-xs-6 col-sm-6 input-sm" id="stype" name="stype" onchange="getUserBetReject(this);">
                                        <option value=""><?=$lang_ag[756];?></option>
                                        <option value="sc"><?=$lang_ag[2142];?></option>
                                        <option value="sp"><?=$lang_ag[117];?></option>
                                        <option value="st"><?=$lang_ag[469];?></option>
                                    </select>
                                </div>
                                <label class="col-xs-3 col-sm-1 control-label" ><strong><?=$lang_ag[1404];?> : </strong></label>
                                <div class="col-xs-3 col-sm-2">
                                    <select class="form-control col-xs-6 col-sm-6 input-sm" id="suser" name="suser">
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-2">
                                    <input type="text" id="suser1" name="suser1" value="" class="col-xs-12 col-sm-12" placeholder="username">
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchBetReject();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tbBetReject" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-strong" style="text-align: left !important;"> <?=$lang_ag[236];?>  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_ag[1];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="stepDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:50%">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-responsive" id="tb_stepDetail">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?> </button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive" id="tb_stepDetail"></div>

<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/daterangepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
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
        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose:true});
    });

    function clearSearch(){
        $('#suser option').remove();
        $('#stype option[value=""]').prop('selected',true);
    }

    function getUserBetReject(now){

        $("#reloadBetReject").load('show');

        $.ajax({
            url: 'getUserBetReject.php',
            data: { 

                stype       : now.value,
                sdate       : $('#sdate').val()
             },
            type: 'GET',
            dataType: 'json',
            success: function (res) {  console.log(res);
                // var aRes = jQuery.parseJSON( res );  console.log(aRes);
                $('#suser option').remove();
                if ($.isArray(res) ) {
                    $.each(res, function (i, item) {
                        console.log(item);
                        $('#suser').append($('<option>', { 
                            value: item[0],
                            text : item[0]+" ("+item[1]+")"
                        }));
                    });
                }
                $("#reloadBetReject").load('hide');
            }
        });

    }

    function searchBetReject(){

        $("#reloadBetReject").load('show');

        $.ajax({
            url: 'rBetReject.php',
            data: { 

                _token      : $('input[name="_token"]').val(),
                stype       : $('select[name="stype"] option:selected').val(),
                suser       : $('select[name="suser"] option:selected').val(),
                suser1      : $('#suser1').val(),
                sdate       : $('#sdate').val()
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {

                if(response.status){

                    $("#tbBetReject tbody").html(response.list);
                    $("#tbBetReject thead").html(response.head);

                }

                $("#reloadBetReject").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function getStepDetail(bet_id){
        $.ajax({
            url: 'winLossMember/stepDetail',
            data: { 
                 bet_id : bet_id
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if(response.status){
                    $("#tb_stepDetail").html(response.result);
                    $("#stepDetail").modal('show');
                }
                $('span.num').digits();
            }
        });
    }

</script>
</div>