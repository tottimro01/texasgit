<?php require('inc_head.php');?>

<div id="showModal"><style type="text/css">
    @media (min-width: 992px) {
        #divViewLog{
          width:60%;
        }
    }
    .datepicker{
        z-index: 9999 !important;
    }
    #sdate{
        height: 31px;
    }
    .modal-backdrop{
        position: fixed;
    }
</style>
<div class="modal fade in" id="viewLogModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;"><div class="modal-backdrop fade in" style="height: 800px;"></div>
     <div class="modal-dialog" role="document" id="divViewLog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel"><strong> <?=$lang_ag[1186];?> <?=$_POST["session"]["AGlang"]; ?> <font style="color:#c90000" id="numrows"> (0)</font></strong> </h4>
               </div>
               <div class="modal-body">
                   <div class="row">
                       <div class="col-xs-12" style="margin-bottom: 5px;">
                            <div class="form-group">
                               <label class="control-label col-xs-2 col-sm-1 " for="username" style="margin-top: 5px;"><strong><?=$lang_ag[1401];?>:</strong></label>
                               <div class="col-xs-6 col-sm-3">
                                   <div class="input-group">
                                       <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy" value="03-04-2019" readonly="readonly">
                                       <span class="input-group-addon">
                                           <i class="fa fa-calendar bigger-110"></i>
                                       </span>
                                   </div>
                               </div>
                               <div class="col-xs-3 col-sm-2">
                                   <button type="button" class="btn btn-primary btn-sm" name="search" onclick="searchPersonalData(this);">
                                       <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                       <?=$lang_ag[236];?>                                   </button>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tb_personal" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?=$lang_ag[238];?></th>
                                    <th><?=$lang_ag[30];?></th>
                                </tr>
                            </thead>
                            <tbody>
                                                                    <tr><td colspan="2"><center><strong> <?=$lang_ag[1];?> </strong></center></td></tr>
                                                            </tbody>
                            <tfoot>
                               
                            </tfoot>
                        </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?></button>
               </div>
          </div>
     </div>
</div>
<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<script src="assets/js/bootstrap-datepicker.min.js"></script>
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
    $("#tb_personal").data('pageNum',1);
    function searchPersonalData(now){

        $.ajax({
            url: 'getDataPersonal',
            data: {
                sdate       : $('input[name="sdate"]').val(),
                pageNum     : $("#tb_personal").data('pageNum'),
                btName      : $(now).attr('name')
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                var htmltbody = '';
                var num = (response.optionPage.page == '1')? '0' : ((response.optionPage.page * 30) - 30);
                if(response.data.length > 0){
                    $.each(response.data, function( key, value ) {
                        var keynum = parseFloat(key+1)+parseFloat(num);
                        htmltbody += '<tr><td align="center">'+keynum+'</td><td>'+value+'</td></tr>';
                    });
                }else{
                    htmltbody = '<tr><td colspan="2"><center><strong> ไม่พบข้อมูล </strong></center></td></tr>';
                }
                $("#tb_personal tbody").html(htmltbody);
                $("#numrows").text("("+response.optionPage.listCount+")");

                // page
                if(response.optionPage){

                    $("#tb_personal").data('pageNum',response.optionPage.page);
                    $('#tb_personal span[name="pageNum"]').text(response.optionPage.page);
                    $('#tb_personal span[name="listCount"]').text(response.optionPage.listCount);
                    
                    if(response.optionPage.listCount == 30){
                        $('#tb_personal button[name="nextPage"]').attr('disabled',false);
                    }else{
                        $('#tb_personal button[name="nextPage"]').attr('disabled',true);
                    }

                    if(response.optionPage.page != 1){
                        $('#tb_personal button[name="prevPage"]').attr('disabled',false);
                    }else{
                        $('#tb_personal button[name="prevPage"]').attr('disabled',true);
                    }
                    
                }
                // end

            }
        });
    }
</script></div>