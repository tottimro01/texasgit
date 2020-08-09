<?php require('inc_head.php');?>
<div class="page-content" id="pageContent" style=""><style type="text/css">
    @media (max-width: 990px) { 
        .form-group div,label{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="reloadWithdrawal">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_withdrawal[2];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 widthTable">
                        <form class="form-horizontal" id="frmSearch">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-1 control-label"><strong><?=$lang_withdrawal[3];?>  : </strong></label>
                                <div class="col-xs-12 col-sm-3">
                                    <input type="text" id="username" name="username" placeholder="name" value="" class="col-xs-12 col-sm-12">
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="status" name="status">
                                        <option value="NB"><?=$lang_withdrawal[4];?> </option>
                                        <option value="N"><?=$lang_withdrawal[5];?> </option>
                                        <option value="B"><?=$lang_withdrawal[6];?> </option>
                                        <option value="Y"><?=$lang_withdrawal[7];?> </option>
                                        <option value="C"><?=$lang_withdrawal[8];?> </option>
                                        <option value="A"><?=$lang_withdrawal[9];?> </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchWithdrawalList(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_withdrawal[10];?> 
                                    </button>
                                    <button type="button" disabled="" class="btn btn-sm btn-yellow">
                                        <div id="clock" class=""><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> 54 &nbsp;&nbsp;</div>
                                        <script type="text/javascript">
                                          
                                            function timeCountDownWithdrawal(){

                                                var fiveSeconds = new Date().getTime() + 59000;
                                                $('#clock').countdown(fiveSeconds, function(event) {
                                                var $this = $(this).html(event.strftime('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> %S &nbsp;&nbsp;'));

                                                    if(event.strftime('%S')==0){
                                                        searchWithdrawalList('');
                                                        timeCountDownWithdrawal();
                                                    }

                                                });
                                            }
                                            timeCountDownWithdrawal();
                                        </script>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                      
                        <div class="table-responsive">
                            <table id="tbWithdrawalList" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?=$lang_withdrawal[11];?>  </th>
                                        <th class="text-center"><?=$lang_withdrawal[12];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[21];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[13];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[14];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[15];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[16];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[17];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[18];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[19];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[20];?> </th>
                                    </tr>
                                </thead>
                                <tbody><tr><td colspan="11"><center><?=$lang_message[1];?></center></td></tr></tbody>
                                <tfoot>
                                   
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div id="showModal"></div>
</div>
<script type="text/javascript">

    function searchWithdrawalList(btnow){

        $("#reloadWithdrawal").load('show');
        timeCountDownWithdrawal();

        $.ajax({
            url: 'withdrawalList.php',
            data: {
                username    : $('input[name="username"]').val(),
                status      : $('select[name="status"] option:selected').val(),
                pageNum     : $("#tbWithdrawalList").data('pageNum'),
                btName      : $(btnow).attr('name')
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                if(response.status){

                    $("#tbWithdrawalList tbody").html(response.list);
                    $("#tbWithdrawalList").data('pageNum',response.optionPage.page);
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
                $("#reloadWithdrawal").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });

    }
    
    function withdrawalUpdateStatus(rowid,username,status){

        // console.log(rowid); return false;

        $(".bt"+rowid).prop("disabled",true);
        $("#search").prop("disabled",true);

        var message         = '';
        var statusUpdate    = '';
        var inpAccNumber    = "<input type='text' id='accountNum' class='numeric'>";

        if(status == 'N'){
            message         = "<?=$lang_message[8];?> ";
            statusUpdate    = 'B';
        }else if(status == 'B'){
            message         = "<?=$lang_message[9];?>  "+inpAccNumber;
            statusUpdate    = 'Y';
        }else if(status == 'C'){
            message         = "<?=$lang_message[10];?> ";
            statusUpdate    = 'C';
        }

        bootbox.dialog({
            message: message,
            buttons: {
                confirm: {
                    label: "<?=$lang_withdrawal[23];?> ",
                    className: "btn-primary btn-sm bt_confirm",
                    callback: function(result) {

                        $('.bt_confirm').prop("disabled",true);
                        
                        var statusChk   = 0;
                        var accountNum  = $("#accountNum").val();

                        if(status == 'B'){
                            var patt            =   /^[0-9.]*$/i;
                            if(!patt.test( $("#accountNum").val() ) || $("#accountNum").val() == '' || $("#accountNum").val().length < 8){
                                statusChk = 1;
                                dialogError("<?=$lang_message[11];?> ");
                                $(".bt"+rowid).prop("disabled",false);
                                $("#search").prop("disabled",false);
                            }
                        }
                        
                        if(result && statusChk == 0){

                            if(status == 'B'){
                                bootbox.dialog({
                                    message: "<?=$lang_message[12];?> ",
                                    buttons: {
                                        confirm: {
                                            label: "<?=$lang_withdrawal[23];?> ",
                                            className: "btn-primary btn-sm bt_confirmB",
                                            callback: function(result) {

                                                $(".bt"+rowid).prop("disabled",true);
                                                $("#search").prop("disabled",true);
                                                $('.bt_confirmB').prop("disabled",true);
                                                
                                                $.ajax({
                                                    url: 'withdrawal/updateStatus',
                                                    data: { 
                                                         rowid: rowid,
                                                         username : username,
                                                         status : statusUpdate,
                                                         accnumber:accountNum
                                                     },
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success: function (response) {
                                                        // console.log(response);

                                                        if(response.status =='success'){
                                                            dialogSuccess(response.msg);
                                                            $("#search").prop("disabled",false);
                                                            searchWithdrawalList();
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
                                        },
                                        cancel: {
                                            label: "<?=$lang_withdrawal[24];?> ",
                                            className: "btn-sm",
                                            callback: function(result){
                                                $(".bt"+rowid).prop("disabled",false);
                                                $("#search").prop("disabled",false);
                                            }
                                        }
                                    }
                                });
                            }else{

                                $(".bt"+rowid).prop("disabled",true);
                                $("#search").prop("disabled",true);

                                $.ajax({
                                    url: 'withdrawal/updateStatus',
                                    data: { 
                                         rowid: rowid,
                                         username : username,
                                         status : statusUpdate,
                                         accnumber:$("#accountNum").val()
                                     },
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (response) {
                                        // console.log(response);

                                        if(response.status =='success'){
                                            dialogSuccess(response.msg);
                                            $("#search").prop("disabled",false);
                                            searchWithdrawalList();
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
                    }
                },
                cancel: {
                    label: "<?=$lang_withdrawal[24];?> ",
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
    
    jQuery(function($) {
        $('#search').click();
    });

</script>