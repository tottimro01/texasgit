<?php require('inc_head.php');?>
<style type="text/css">
    @media (max-width: 990px) { 
        .form-group div,label{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder position-relative" id="reloadDeposit">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_deposit[2];?></strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">

                <div class="row ">
                    <div class="col-xs-12 col-sm-12 widthTable">
                        
                        <form class="form-horizontal" id="frmSearchDeposit">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-1 control-label"><strong><?=$lang_deposit[3];?> : </strong></label>
                                <div class="col-xs-12 col-sm-3">
                                    <input type="text" id="username" name="username" placeholder="name" value="" class="col-xs-12 col-sm-12">
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="status" name="status">
                                        <option value="NB"><?=$lang_deposit[4];?></option>
                                        <option value="N"><?=$lang_deposit[5];?></option>
                                        <option value="B"><?=$lang_deposit[6];?></option>
                                        <option value="Y"><?=$lang_deposit[7];?></option>
                                        <option value="C">Reject</option>
                                        <option value="A"><?=$lang_deposit[9];?></option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchDepositList(this);">
                                        <?=$lang_deposit[10];?>                                    </button>
                                    <button type="button" disabled="" class="btn btn-sm btn-yellow">
                                        <div id="clock" class=""><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> 55 &nbsp;&nbsp;</div>
                                        <script type="text/javascript">
                                            function timeCountDownDeposit(){

                                                var fiveSeconds = new Date().getTime() + 59000;
                                                $('#clock').countdown(fiveSeconds, function(event) {
                                                var $this = $(this).html(event.strftime('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> %S &nbsp;&nbsp;'));

                                                    if(event.strftime('%S')==0){
                                                        searchDepositList('');
                                                        timeCountDownDeposit();
                                                    }

                                                });
                                            }
                                            timeCountDownDeposit();
                                        </script>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                        <div class="table-responsive">

                            <table id="tbDepositLits" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?=$lang_deposit[11];?> </th>
                                        <th class="text-center"><?=$lang_deposit[3];?></th>
                                        <th class="text-center"><?=$lang_deposit[12];?></th>
                                        <th class="text-center"><?=$lang_deposit[13];?></th>
                                        <th class="text-center"><?=$lang_deposit[14];?></th>
                                        <th class="text-center"><?=$lang_deposit[15];?></th>
                                        <th class="text-center"><?=$lang_deposit[16];?></th>
                                        <th class="text-center"><?=$lang_deposit[17];?></th>
                                        <th class="text-center"><?=$lang_deposit[18];?></th>
                                        <th class="text-center"><?=$lang_deposit[19];?></th>
                                        <th class="text-center"><?=$lang_deposit[20];?></th>
                                        <th class="text-center"><?=$lang_deposit[21];?></th>
                                        <th class="text-center"><?=$lang_deposit[22];?></th>
                                        <th class="text-center"><?=$lang_deposit[23];?></th>
                                        <th class="text-center">List sms</th>
                                    </tr>
                                </thead>

                                <tbody><tr><td colspan="17"><center><?=$lang_deposit[26];?></center></td></tr></tbody>
                                <tfoot>
                                   
                                </tfoot>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <div class="widget-box-overlay"><i class="ace-icon loading-icon fa fa-spinner fa-spin fa-2x white"></i></div></div>
    <div id="showModal"></div>
</div> 

<script type="text/javascript">

    function searchDepositList(btnow){

        $("#reloadDeposit").load('show');
        timeCountDownDeposit();

        $.ajax({
            url: 'depositList.php',
            data: { 

                username    : $('input[name="username"]').val(),
                status      : $('select[name="status"] option:selected').val(),
                pageNum     : $("#tbDepositLits").data('pageNum'),
                btName      : $(btnow).attr('name')
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                if(response.status){

                    $("#tbDepositLits tbody").html(response.list);
                    $("#tbDepositLits").data('pageNum',response.optionPage.page);
                    $('span[name="pageNum"]').text(response.optionPage.page);
                    $('span[name="listCount"]').text(response.optionPage.listCount);
                    
                    if(response.optionPage.listCount == 50){
                        $('button[name="nextPage"]').attr('disabled',false);
                    }else{
                        $('button[name="nextPage"]').attr('disabled',true);
                    }

                    if(response.optionPage.page != 1){
                        $('button[name="prevPage"]').attr('disabled',false);
                    }else{
                        $('button[name="prevPage"]').attr('disabled',true);
                    }

                }else{
                    dialogError('data error');
                }
                $("#reloadDeposit").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });

    }

    function depsitUpdateStatus(rowid,username,status){

        // console.log(rowid); return false;

        $(".bt"+rowid).prop("disabled",true);
        $("#search").prop("disabled",true);

        var message         = '';
        var statusUpdate    = '';

        if(status == 'N'){
            message         = "<?=$lang_message[8];?>";
            statusUpdate    = 'B';
        }else if(status == 'B'){
            message         = "<?=$lang_message[9];?>";
            statusUpdate    = 'Y';
        }else if(status == 'C'){
            message         = "<?=$lang_message[10];?>";
            statusUpdate    = 'C';
        }

        bootbox.dialog({
            message: '<h4>'+message+'</h4>',
            buttons: {
                confirm: {
                    label: "<?=$lang_deposit[24];?>",
                    className: "btn-primary btn-sm bt_confirm",
                    callback: function(result) {

                        $('.bt_confirm').prop("disabled",true);

                        if(result){

                            $(".bt"+rowid).prop("disabled",true);
                            $("#search").prop("disabled",true);

                            $.ajax({
                                url: 'deposit/updateStatus',
                                data: { 
                                     rowid: rowid,
                                     username : username,
                                     status : statusUpdate
                                 },
                                type: 'GET',
                                dataType: 'json',
                                success: function (response) {
                                    // console.log(response);

                                    if(response.status =='success'){
                                        dialogSuccess(response.msg);
                                        $("#search").prop("disabled",false);
                                        searchDepositList();
                                    }else{
                                        dialogError(response.msg);
                                        $(".bt"+rowid).prop("disabled",false);
                                        $("#search").prop("disabled",false);
                                    }
                                },
                                error: function (response) {
                                    console.log(response);
                                }
                            });
                        }
                    }
                },
                cancel: {
                    label: "<?=$lang_deposit[25];?>",
                    className: "btn-sm",
                    callback: function(result){
                        $(".bt"+rowid).prop("disabled",false);
                        $("#search").prop("disabled",false);
                    }
                }
            }
        });
    }

    function viewLogUser(user){

        $.ajax({
            url: 'memberUserList/viewLogUser',
            data: { 
                 user : user
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#showModal").html(response.temp);
                $("#viewLogModal").modal('show');

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function viewListsms(data){

        $.ajax({
            url: 'depositAuto/smsList',
            data: { 
                data : data,
            },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#showModal").html(response.data);
                $("#viewsmsList").modal('show');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function smsChoose(data){
        $("#viewsmsList").modal('hide');
        
        $.ajax({
            url: 'depositAuto/smsChoose',
            data: { 
                data : data,
            },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if(response.status){
                    dialogSuccess(response.msg);
                    searchDepositList();
                }else{
                    dialogError(response.msg);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    jQuery(function($) {
        $('#search').click();
    });

</script>