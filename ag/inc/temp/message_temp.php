<?php require('inc_head.php');?>

<div class="page-content" id="pageContent" style=""><style type="text/css">
    @media (max-width: 990px) { 
        .pdButton{
          padding-top: 5px;
        }
    }
</style>

<div class="row">
    <div class="widget-box hidden-boder">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[30];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload" id="relodUKeep"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 widthTable">
                        <form class="form-horizontal" id="frmSearchMessage">
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-1 "><strong> <?=$lang_ag[1401];?> :</strong></label>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="input-daterange input-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                            <input class="input-sm form-control date-picker" name="dateBegin" id="dateBegin" type="text" value="<?=date('d-m-Y');?>" data-date-format="dd-mm-yyyy" readonly="readonly">
                                        </div>
                                        <span class="input-group-addon">
                                            <i class="fa fa-exchange"></i>
                                        </span>
                                        <input class="input-sm form-control date-picker" name="dateEnd" id="dateEnd" type="text" value="<?=date('d-m-Y');?>" data-date-format="dd-mm-yyyy" readonly="readonly">    
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 pdButton">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchMessage(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                        <div class="table-responsive">
                            <table id="tbMessage" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?=$lang_ag[238];?> </th>
                                        <th class="text-center"><?=$lang_ag[1401];?></th>
                                        <th class="text-center"><?=$lang_ag[30];?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="center"><?=$lang_ag[1];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="pagination"></div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../../assets/js/main.js"></script>
<script type="text/javascript">
    function searchMessage(btnow,this_page=1){
        $("#relodUKeep").click();
        var rowPerPage = 20;
        $.ajax({
            url: 'inc/temp/messageList_temp.php',
            data: { 
                dateBegin   : $('input[name="dateBegin"]').val(),
                dateEnd     : $('input[name="dateEnd"]').val(),
                rowPerPage  : rowPerPage,
                thisPage    : this_page,
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
               if(response.status){
                    $("#tbMessage tbody").html(response.list);
                     var pagi_html = loadPagination(response.pagi_data);
                     $('#pagination').text('');
                     $('#pagination').html(pagi_html);
                }else{
                    dialogError('data error');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
     function clickPage(page)
    {
            searchMessage("",page);
    }
    jQuery(function($) {
        //datepicker plugin
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            // startDate: '2016-06-01',
            // endDate: '2016-06-13'
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose:true});
    });
</script></div>