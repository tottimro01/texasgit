<?php require('inc_head.php');?>
<?
$view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
    $_POST['edate']=date("d-m-Y");
  }

    $ag_update = "update IGNORE `bom_tb_agent` SET `r_alert_out`= 0 where r_id = '".$_POST["session"]['r_id']."'"; 
    sql_query($ag_update);

?>
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
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[170];?> </strong></h4>
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
                                <label class="control-label col-xs-3 col-sm-1 no-padding-right" for="username"><?=$lang_ag[687];?> :</label>
                <div class="col-xs-9 col-sm-3">
                  <div class="input-group">
                    <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>                       
                <label class="control-label col-xs-3 col-sm-1 no-padding-right" for="username"><?=$lang_ag[690];?> :</label>
                <div class="col-xs-9 col-sm-3">
                  <div class="input-group">
                    <input class="form-control date-picker" id="edate" name="edate" type="text" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchWithdrawalList(this);searchWithdrawalListx(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?> 
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
                                                        searchWithdrawalListx('');
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
                                        <th class="text-center" >No.</th>
                                        <th class="text-center" ><?=$lang_ag[1885];?> <?=$lang_ag[178];?></th>
                                        <th class="text-center" ><?=$lang_ag[1396];?></th>
                                        <th class="text-center" ><?=$lang_ag[405];?></th>
                                        <th class="text-center" ><?=$lang_ag[423];?></th>
                                        <th class="text-center" ><?=$lang_ag[168];?></th>
                                        <th class="text-center" ><?=$lang_ag[1888];?></th>
                                        <th class="text-center" ><?=$lang_ag[184];?></th>
                                        <th class="text-center" >&nbsp;</th>
                                        <th class="text-center" >&nbsp;</th>
                                        <!--<th class="text-center"><?=$lang_withdrawal[11];?>  </th>
                                        <th class="text-center"><?=$lang_withdrawal[12];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[21];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[13];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[14];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[15];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[16];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[17];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[18];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[19];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[20];?> </th>-->
                                    </tr>
                                </thead>
                                <tbody><tr><td colspan="11"><center><?=$lang_ag[1];?></center></td></tr></tbody>
                                <tfoot>
                                   
                                </tfoot>
                            </table>
                            
                            </div>
                             <div class="table-responsive">

                            <table id="tbWithdrawalListx" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" >No.</th>
                                        <th class="text-center" ><?=$lang_ag[1885];?> <?=$lang_ag[178];?></th>
                                        <th class="text-center" ><?=$lang_ag[1396];?></th>
                                        <th class="text-center" ><?=$lang_ag[405];?></th>
                                        <th class="text-center" ><?=$lang_ag[1889];?></th>
                                        <th class="text-center" ><?=$lang_ag[423];?></th>
                                        <th class="text-center" ><?=$lang_ag[168];?></th>
                                        <th class="text-center" ><?=$lang_ag[1888];?></th>
                                        <th class="text-center" ><?=$lang_ag[184];?></th>
                                        <th class="text-center" ><?=$lang_ag[239];?> <?=$lang_ag[1887];?></th>
                                        <!--<th class="text-center"><?=$lang_withdrawal[11];?>  </th>
                                        <th class="text-center"><?=$lang_withdrawal[12];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[21];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[13];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[14];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[15];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[16];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[17];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[18];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[19];?> </th>
                                        <th class="text-center"><?=$lang_withdrawal[20];?> </th>-->
                                    </tr>
                                </thead>
                                <tbody><tr><td colspan="11"><center><?=$lang_ag[1];?></center></td></tr></tbody>
                                <tfoot>
                                   <tr style="background: #e6e6e6;">
                                        <td align="right" colspan="6"></td>
                                        <td align="center"><?=$lang_ag[197];?></td>
                                        <td align="center" id="f_quantity"><span> 0 </span></td>
                                        <td align="right" colspan="2"></td>
                                       
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
    <div id="showModal"></div>
</div>
<script type="text/javascript">

    jQuery(function($) {
        //datepicker plugin
        $( ".date-picker" ).datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy',
        })
        $( ".date-picker" ).datepicker('setDate', "0");
        $( ".date-picker" ).datepicker('setEndDate', "0");
       

        var parts_d ='<?=$_POST["sdate"]?>'.split(' ');
        var parts_e ='<?=$_POST["edate"]?>'.split(' ');

        $('#sdate').datepicker('setDate', parts_d[0]);
        $('#edate').datepicker('setDate', parts_e[0]);

      });



    function set_list(e,ac,mid,tcount,id,bank,acp){
        $("#reloadWithdrawal").load('show');
         $(e).attr("disabled", "true");
        $.ajax({
            url: 'withdrawalSet.php',
            data: { 

                ac    : ac,
                mid   : mid,
                tcount     : tcount,
                id      : id,
                bank      : bank,
                acp      : acp
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
               $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
               $(e).removeAttr('disabled');
               searchWithdrawalList();
               searchWithdrawalListx();
                //$("#reloadDeposit").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function searchWithdrawalList(btnow){

        timeCountDownWithdrawal();

        $.ajax({
            url: 'withdrawalList.php',
            data: {
                df    : $('input[name="sdate"]').val(),
                dt      : $('input[name="edate"]').val(),
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
            },
            error: function (response) {
                console.log(response);
            }
        });

    }

    function searchWithdrawalListx(btnow){

        $("#reloadWithdrawal").load('show');

        $.ajax({
            url: 'withdrawalListx.php',
            data: {
                df    : $('input[name="sdate"]').val(),
                dt      : $('input[name="edate"]').val(),
                pageNum     : $("#tbWithdrawalListx").data('pageNum'),
                btName      : $(btnow).attr('name')
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                if(response.status){

                    $("#tbWithdrawalListx tbody").html(response.list);
                    $("#f_quantity").html(response.sum);
                    $("#tbWithdrawalListx").data('pageNum',response.optionPage.page);
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
            message         = "<?=$lang_ag[8];?> ";
            statusUpdate    = 'B';
        }else if(status == 'B'){
            message         = "<?=$lang_ag[9];?>  "+inpAccNumber;
            statusUpdate    = 'Y';
        }else if(status == 'C'){
            message         = "<?=$lang_ag[10];?> ";
            statusUpdate    = 'C';
        }

        bootbox.dialog({
            message: message,
            buttons: {
                confirm: {
                    label: "<?=$lang_ag[178];?> ",
                    className: "btn-primary btn-sm bt_confirm",
                    callback: function(result) {

                        $('.bt_confirm').prop("disabled",true);
                        
                        var statusChk   = 0;
                        var accountNum  = $("#accountNum").val();

                        if(status == 'B'){
                            var patt            =   /^[0-9.]*$/i;
                            if(!patt.test( $("#accountNum").val() ) || $("#accountNum").val() == '' || $("#accountNum").val().length < 8){
                                statusChk = 1;
                                dialogError("<?=$lang_ag[11];?> ");
                                $(".bt"+rowid).prop("disabled",false);
                                $("#search").prop("disabled",false);
                            }
                        }
                        
                        if(result && statusChk == 0){

                            if(status == 'B'){
                                bootbox.dialog({
                                    message: "<?=$lang_ag[12];?> ",
                                    buttons: {
                                        confirm: {
                                            label: "<?=$lang_ag[178];?> ",
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
                                            label: "<?=$lang_ag[256];?> ",
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
                    label: "<?=$lang_ag[256];?> ",
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