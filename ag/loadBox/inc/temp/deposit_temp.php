<?php require('inc_head.php');?>
<?
$view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
    $_POST['edate']=date("d-m-Y");
  }

  $ag_update = "update IGNORE `bom_tb_agent` SET `r_alert_in`= 0 where r_id = '".$_POST["session"]['r_id']."'"; 
  sql_query($ag_update);



?>
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
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[169];?></strong></h4>
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
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchDepositList(this);searchDepositListx(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span> <?=$lang_ag[236];?>                                    </button>
                                    <button type="button" disabled="" class="btn btn-sm btn-yellow">
                                        <div id="clock" class=""><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> 55 &nbsp;&nbsp;</div>
                                        <script type="text/javascript">
                                            function timeCountDownDeposit(){

                                                var fiveSeconds = new Date().getTime() + 59000;
                                                $('#clock').countdown(fiveSeconds, function(event) {
                                                var $this = $(this).html(event.strftime('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> %S &nbsp;&nbsp;'));

                                                    if(event.strftime('%S')==0){
                                                        searchDepositList('');
                                                        searchDepositListx('');
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
                                        <th class="text-center">No. </th>
                                        <th class="text-center"><?=$lang_ag[1885];?> <?=$lang_ag[178];?> </th>
                                        <th class="text-center">User </th>
                                        <th class="text-center"><?=$lang_ag[405];?> </th>
                                        <th class="text-center"><?=$lang_ag[423];?> </th>
                                        <th class="text-center"><?=$lang_ag[168];?> </th>
                                        <th class="text-center"><?=$lang_ag[1885];?> <?=$lang_ag[29];?> </th>
                                        <th class="text-center"><?=$lang_ag[1886];?> </th>
                                        <th class="text-center"><?=$lang_ag[184];?> </th>
                                        <th class="text-center"> </th>
                                        <th class="text-center"> </th>

                                        <!--<th class="text-center"><?=$lang_deposit[11];?> </th>
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
                                        <th class="text-center">List sms</th>-->
                                    </tr>
                                </thead>

                                <tbody><tr><td colspan="17"><center><?=$lang_ag[1];?></center></td></tr></tbody>
                                <tfoot>
                                   
                                </tfoot>
                            </table>

                            <table id="tbDepositLitsx" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No. </th>
                                        <th class="text-center"><?=$lang_ag[1885];?> <?=$lang_ag[178];?> </th>
                                        <th class="text-center">User </th>
                                        <th class="text-center"><?=$lang_ag[405];?> </th>
                                        <th class="text-center"><?=$lang_ag[423];?> </th>
                                        <th class="text-center"><?=$lang_ag[168];?> </th>
                                        <th class="text-center"><?=$lang_ag[1886];?> </th>
                                        <th class="text-center"><?=$lang_ag[184];?> </th>
                                        <th class="text-center"><?=$lang_ag[239];?> <?=$lang_ag[1887];?> </th>

                                        <!--<th class="text-center"><?=$lang_deposit[11];?> </th>
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
                                        <th class="text-center">List sms</th>-->
                                    </tr>
                                </thead>

                                <tbody><tr><td colspan="17"><center><?=$lang_ag[1];?></center></td></tr></tbody>
                                <tfoot>
                                    <tr style="background: #e6e6e6;">
                                        <td align="right" colspan="5"></td>
                                        <td align="center"><?=$lang_ag[197];?></td>
                                        <td align="center" id="f_quantity"><span> 0 </span></td>
                                        <td align="right" colspan="2"></td>
                                       
                                      </tr>
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
    jQuery(function($) {

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


    function set_list(ac,mid,tcount,id,bank,acp){
        $("#reloadDeposit").load('show');

        $.ajax({
            url: 'depositSet.php',
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

               searchDepositList();
               searchDepositListx();

                //$("#reloadDeposit").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
    function searchDepositList(btnow){

        //$("#reloadDeposit").load('show');
        timeCountDownDeposit();

        $.ajax({
            url: 'depositList.php',
            data: { 

                df    : $('input[name="sdate"]').val(),
                dt      : $('input[name="edate"]').val(),
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
                //$("#reloadDeposit").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });

    }

    function searchDepositListx(btnow){

        $("#reloadDeposit").load('show');

        $.ajax({
            url: 'depositListx.php',
            data: { 

                df    : $('input[name="sdate"]').val(),
                dt      : $('input[name="edate"]').val(),
                pageNum     : $("#tbDepositLitsx").data('pageNum'),
                btName      : $(btnow).attr('name')
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                if(response.status){

                    $("#tbDepositLitsx tbody").html(response.list);
                    $("#f_quantity").html(response.sum);
                    $("#tbDepositLitsx").data('pageNum',response.optionPage.page);
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
            message         = "<?=$lang_ag[8];?>";
            statusUpdate    = 'B';
        }else if(status == 'B'){
            message         = "<?=$lang_ag[9];?>";
            statusUpdate    = 'Y';
        }else if(status == 'C'){
            message         = "<?=$lang_ag[10];?>";
            statusUpdate    = 'C';
        }

        bootbox.dialog({
            message: '<h4>'+message+'</h4>',
            buttons: {
                confirm: {
                    label: "<?=$lang_ag[178];?>",
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
                    label: "<?=$lang_ag[256];?>",
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