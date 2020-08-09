<?php require('inc_head.php');?>
<div class="page-content" id="pageContent" style=""><style type="text/css">
    @media (max-width: 990px) { 
        .form-group div,label{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder " id="reloadTransfer">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[29];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 widthTable">
                        <form class="form-horizontal" id="frmSearchDeposit">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-2 control-label no-padding-right" style="width:100px"><strong><?=$lang_ag[1396];?> : </strong></label>
                                <div class="col-xs-12 col-sm-3">
                                <input type="text" id="search_input" name="q" placeholder="<?=$lang_ag[1396];?>" value="" class="col-xs-12 col-sm-12">
                                  
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="utype" name="utype">
                                        <option value="M"><?=$lang_ag[189];?></option>
                                        <option value="A"><?=$lang_ag[455];?></option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="loadData();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>

                        <!-- div.table-responsive -->
                        <div class="table-responsive">
                            <table id="tbTransfer" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center"><?=$lang_ag[1396];?> </th>
                                        <th class="text-center" width="15%">
                                            <?=$lang_ag[1182];?><br>
                                            <font class="red">[25-03-2019]</font>
                                        </th>
                                        <th>
                                            <label>
                                                <input name="yesterdayAll" id="yesterdayAll" class="ace ace-checkbox-2" type="checkbox" onclick="allChecked(this,'chkboxYesterday');">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th class="text-center" width="15%">
                                            <?=$lang_ag[1184];?><br>
                                            <font class="red">[26-03-2019]</font>
                                        </th>
                                        <th>
                                            <label>
                                                <input name="todayAll" id="todayAll" class="ace ace-checkbox-2" type="checkbox" onclick="allChecked(this,'chkboxToday');">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th class="text-center"><?=$lang_ag[1185];?> </th>
                                        <th class="text-center"><?=$lang_ag[27];?> </th>
                                        <!-- <th class="text-center" >Bet Credit </th> -->
                                        <th class="text-center"> <?=$lang_ag[1138];?>  </th>
                                        <th class="text-center"> </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- <tr>
                                        <td colspan="2" class="text-center"> test </td>
                                        <td align="right" >0.00</td>
                                        <td class="text-center" >
                                            <label>
                                                <input name="yesterday" id="" class="ace ace-checkbox-2 chkboxYesterday" data-username="test"  data-tmoney="0.00" type="checkbox">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td align="right" >0.00</td>
                                        <td class="text-center" >
                                            <label>
                                                <input name="todaychkboxToday" id="" class="ace ace-checkbox-2 chkboxToday" data-username="test"  data-tmoney="0.00" type="checkbox">
                                                <span class="lbl"></span>
                                            </label>   
                                        </td>
                                        <td align="right" >0.00</td>
                                        <td align="right" >0.00</td>
                                        <td align="right" >0.00</td>
                                        <td align="right" >  
                                            <button type="button" class="btn btn-xs btn-primary" onclick="transferMoney(this,'','');">
                                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                                <span class="bigger-110"> <?=$lang_ag[29];?></span>
                                            </button> 
                                        </td>
                                    </tr> -->
                                </tbody>

                                <tfoot style="display:none;">
                                    <tr>
                                        <td colspan="2" align="center"><strong><?=$lang_ag[197];?></strong></td>
                                        <td align="right" class=""><strong><span id="sumYesterday">0.00</span></strong></td>
                                        <td></td>
                                        <td align="right" class=""><strong><span id="sumToday">0.00</span></strong></td>
                                        <td></td>
                                        <td align="right" class=""><strong><span id="sumCashBalance">0.00</span></strong></td>
                                        <td align="right" class=""><strong><span id="sumOutstanding">0.00</span></strong></td>
                                        <td align="right" class=""><strong><span id="sumGivenCredit">0.00</span></strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align=""></td>
                                        <td colspan="2" align="right">
                                            <button type="button" class="btn btn-xs btn-primary" onclick="transferMoney(this,'Y','All');">
                                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                                <span class="bigger-110"> <?=$lang_ag[29];?></span>
                                            </button>
                                        </td>
                                        <td colspan="2" align="right">
                                            <button type="button" class="btn btn-xs btn-primary" onclick="transferMoney(this,'T','All');">
                                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                                <span class="bigger-110"> <?=$lang_ag[29];?></span>
                                            </button>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                   
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

<script type="text/javascript">

loadData();

function loadData()
{
    var q = $("#search_input").val();
    $('#reloadTransfer').load('show');
    $.ajax({
        url: 'inc/temp/transferList_temp.php',
        type: 'POST',
        dataType: 'json',
        data: {q: q},
    })
    .done(function(response){
        if(q!="")
        {
            $("#search_input").val(q);
        }
        $("#reloadTransfer").load('hide');
        $("#tbTransfer tbody").html(response.list);
        $("#tbTransfer tfoot").show();

        $("#tbTransfer").data('pageNum',response.optionPage.page);
        $('span[name="pageNum"]').text(response.optionPage.page);
        $('span[name="listCount"]').text(response.optionPage.listCount);
    })
	.fail(function() {
		// console.log("error");
	})
	.always(function() {
		// console.log("complete");
	});
    
}

    // function searchTransfer(btnow){

    //     $('#reloadTransfer').load('show');
    //     $.ajax({
    //         url: 'inc/temp/transferList_temp.php',
    //         data: { 
    //             username    : $('input[name="username"]').val(),
    //             utype       : $('select[name="utype"] option:selected').val(),
    //             pageNum     : $("#tbTransfer").data('pageNum'),
    //             btName      : $(btnow).attr('name')
    //          },
    //         type: 'POST',
    //         dataType: 'json',
    //         success: function (response) {

    //             if(response.status){

    //                 $("#tbTransfer tbody").html(response.list);
    //                 $("#tbTransfer tfoot").show();

    //                 $("#tbTransfer").data('pageNum',response.optionPage.page);
    //                 $('span[name="pageNum"]').text(response.optionPage.page);
    //                 $('span[name="listCount"]').text(response.optionPage.listCount);
                    
    //                 if(response.optionPage.listCount == 50){
    //                     $('button[name="nextPage"]').attr('disabled',false);
    //                 }else{
    //                     $('button[name="nextPage"]').attr('disabled',true);
    //                 }

    //                 if(response.optionPage.page != 1){
    //                     $('button[name="prevPage"]').attr('disabled',false);
    //                 }else{
    //                     $('button[name="prevPage"]').attr('disabled',true);
    //                 }

    //                 calSumBalance();
    //                 $('#reloadTransfer').load('hide');
    //             }else{
    //                 dialogError('data error');
    //             }
                
    //         },
    //         error: function (response) {
    //             // console.log(response);
    //         }
    //     });

    // }

    function allChecked(now,classChk){

        var statusChk = now.checked;

        if(statusChk){

            $(now).closest("table").each(function() {
                $(this).find("input."+classChk).prop('checked', true);
            });
        }else{

            $(now).closest("table").each(function() {
                $(this).find("input."+classChk).prop('checked', false);
            });
        }

    }

    function calSumBalance(){

        var sumToday            = 0;
        var sumYesterday        = 0;
        var sumCashBalance      = 0;
        var sumOutstanding      = 0;
        var sumGivenCredit      = 0;

        $("#tbTransfer tbody tr").each(function() {

            
            // var dataValueToday      = $(this).find("input.chkboxToday").data('value');
            // var dataValueYesterday  = $(this).find("input.chkboxYesterday").data('value');

            sumToday        += parseFloat($(this).find(".today").data('value'));
            sumYesterday    += parseFloat($(this).find(".yesterday").data('value'));

            sumCashBalance += parseFloat($(this).find("td.cashBalance").data('value'));
            sumOutstanding += parseFloat($(this).find("td.outstanding").data('value'));
            sumGivenCredit += parseFloat($(this).find("td.givenCredit").data('value'));
            
            // if(dataValueToday){

            //     sumToday += parseFloat(dataValueToday.tmoney);
            // }

            // if(dataValueYesterday){

            //     sumYesterday += parseFloat(dataValueYesterday.tmoney);
            // }

        });


        $("#tbTransfer tfoot #sumToday").text(formatNumber(sumToday,2,1));
        $("#tbTransfer tfoot #sumYesterday").text(formatNumber(sumYesterday,2,1));
        $("#tbTransfer tfoot #sumCashBalance").text(formatNumber(sumCashBalance,2,1));
        $("#tbTransfer tfoot #sumOutstanding").text(formatNumber(sumOutstanding,2,1));
        $("#tbTransfer tfoot #sumGivenCredit").text(formatNumber(sumGivenCredit,2,1));

        if(sumToday < 0){ $("#tbTransfer tfoot #sumToday").css('color','#cc0000'); }
        if(sumYesterday < 0){ $("#tbTransfer tfoot #sumYesterday").css('color','#cc0000'); }
        if(sumCashBalance < 0){ $("#tbTransfer tfoot #sumCashBalance").css('color','#cc0000'); }
        if(sumOutstanding < 0){ $("#tbTransfer tfoot #sumOutstanding").css('color','#cc0000'); }
        if(sumGivenCredit < 0){ $("#tbTransfer tfoot #sumGivenCredit").css('color','#cc0000'); }


    }

    function transferMoney_byuser(now,id)
    {
        bootbox.dialog({
            message: '<h4><?=$lang_ag[12];?></h4>',
            buttons: {
                    confirm: {
                        label: "<?=$lang_ag[178];?>",
                        className: "btn-primary btn-sm",
                        callback: function(e) {
                            if(e){

                                var acType = "byUser"
                                $( "button" ).prop( "disabled", true);

                                $.ajax({
                                    url: 'transferMoney.php',
                                    data: { 
                                            acType : acType , 
                                            id : id ,  
                                            // data   : objInfo,
                                        },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (response) {
                                        // console.log(response);
                                        
                                        if(response.status == 'success'){

                                            dialogSuccess(response.msg);
                                            // $("#search").click();
                                            $( "button" ).prop( "disabled", false);

                                        }else{
                                            dialogError(response.msg);
                                            $( "button" ).prop( "disabled", false);
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
                    }
            }
        });
    }
    
    function transferMoney(now,type,statusSent){

        bootbox.dialog({
            message: '<h4><?=$lang_ag[12];?></h4>',
            buttons: {
                    confirm: {
                        label: "<?=$lang_ag[178];?>",
                        className: "btn-primary btn-sm",
                        callback: function(e) {
                            if(e){

                                if(statusSent == ''){

                                    var dataValue           = $(now).closest("tr").find('input[type="checkbox"]').data('value');
                                    var objInfo             = new Object();
                                    objInfo[0]              = new Object();
                                    objInfo[0]['username']  = dataValue.username;
                                    objInfo[0]['tmoney']    = dataValue.tmoney;
                                }else{

                                    var i           = 0;
                                    var objInfo     = new Object();
                                    var columFind   = '';

                                    if(type == 'Y'){
                                        columFind = 'chkboxYesterday';
                                    }else if(type =='T'){
                                        columFind = 'chkboxToday';
                                    }

                                    console.log('input[type="checkbox"]:checked.'+columFind)

                                    var id_list = [];   
                                    $("#tbTransfer").find('input[type="checkbox"]:checked.'+columFind).each(function() {

                                        // var dataValue               = $(this).data('value');
                                        
                                        // objInfo[i]                  = new Object();
                                        // objInfo[i]['username']      = dataValue.username;
                                        // objInfo[i]['tmoney']        = dataValue.tmoney;

                                        // console.log(i)

                                      
                                        id_list.push($(this).data('id'));    
                                        i++;       
                                    });
                                }

                                $( "button" ).prop( "disabled", true);
                                var acType = "byCHK"   
                                $.ajax({
                                    url: 'transferMoney.php',
                                    data: { 
                                            acType : acType ,    
                                            ttype       : type,
                                            id_list        : id_list,
                                        },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (response) {
                                        // console.log(response);
                                        
                                        if(response.status == 'success'){

                                            dialogSuccess(response.msg);
                                            $("#yesterdayAll").prop('checked',false);
                                            $("#todayAll").prop('checked',false);

                                            $("#search").click();
                                            $( "button" ).prop( "disabled", false);

                                        }else{
                                            dialogError(response.msg);
                                            $( "button" ).prop( "disabled", false);
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
                    }
            }
        });
        
    }

</script></div>