<?php require('inc_head.php'); ?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="row">
    <div class="widget-box hidden-boder " id="reloadRobot">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_robot[2];?> </strong></h4>
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
                                <div class="col-xs-4 col-sm-1" style="width:100px">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="vtype" name="vtype" width="20">
                                        <option value="T"><?=$lang_robot[3];?></option>
                                        <option value="L"><?=$lang_robot[4];?></option>
                                        <option value="A"><?=$lang_robot[5];?></option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-sm-1" style="width:120px">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="vmoney" name="vmoney">
                                        <option value="0"> &gt; 0 </option>
                                        <option value="999"> &gt; 999 </option>
                                        <option value="4999"> &gt; 4,999 </option>
                                        <option value="9999"> &gt; 9,999 </option>
                                        <option value="19999"> &gt; 19,999 </option>
                                        <option value="49999"> &gt; 49,999 </option>
                                        <option value="99999"> &gt; 99,999 </option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="vdate" name="vdate">
                                            <option value="2019-03-25"> 2019-03-25 </option>
                                            <option value="2019-03-24"> 2019-03-24 </option>
                                            <option value="2019-03-23"> 2019-03-23 </option>
                                            <option value="2019-03-22"> 2019-03-22 </option>
                                            <option value="2019-03-21"> 2019-03-21 </option>
                                            <option value="2019-03-20"> 2019-03-20 </option>
                                            <option value="2019-03-19"> 2019-03-19 </option>
                                            <option value="2019-03-18"> 2019-03-18 </option>
                                            <option value="2019-03-17"> 2019-03-17 </option>
                                            <option value="2019-03-16"> 2019-03-16 </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <input type="text" id="vip" name="vip" placeholder="IP" value="" class="col-xs-12 col-sm-12">
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <input type="text" id="vuser" name="vuser" placeholder="ชื่อผู้ใช้" value="" class="col-xs-12 col-sm-12">
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="sort" name="sort">
                                        <option value=""> <?=$lang_robot[5];?> </option>
                                        <option value="1"> <?=$lang_robot[6];?> </option>
                                        <option value="2"> <?=$lang_robot[7];?> </option>
                                        <option value="3"> <?=$lang_robot[8];?> </option>
                                        <option value="4"> <?=$lang_robot[9];?> </option>
                                    </select>
                                </div>
                                <div class="col-xs-9 col-sm-1">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchRobot(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_robot[10];?>                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>

                        <div class="table-responsive">
                            <table id="tbRobot" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bet ID </th>
                                        <th class="text-center"><?=$lang_robot[11];?> </th>
                                        <th class="text-center"><?=$lang_robot[12];?> </th>
                                        <th class="text-center"><?=$lang_robot[13];?> </th>
                                        <th class="text-center"><?=$lang_robot[14];?> </th>
                                        <th class="text-center">HF </th>
                                        <th class="text-center"><?=$lang_robot[15];?> </th>
                                        <th class="text-center">Bet </th>                           
                                        <th class="text-center">Bet Money </th>                     
                                        <th class="text-center">Ball </th>
                                        <th class="text-center"><?=$lang_robot[16];?> </th>
                                        <th class="text-center">Diff </th>
                                        <th class="text-center">Bet Time </th>
                                        <th class="text-center">Bet IP </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_message[1];?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="16">
                                          
                                        </td>
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

<script type="text/javascript">

    function searchRobot(btnow){

        $("#reloadRobot").load('show');

        $.ajax({
            url: 'rRobot.php',
            data: { 
                vtype       : $('select[name="vtype"] option:selected').val(),
                vmoneys     : $('select[name="vmoney"] option:selected').val(),
                vdates      : $('select[name="vdate"] option:selected').val(),
                vip         : $('input[name="vip"]').val(),
                vusers      : $('input[name="vuser"]').val(),
                vsort       : $('select[name="sort"] option:selected').val(),
                pageNum     : $("#tbRobot").data('pageNum'),
                btName      : $(btnow).attr('name')
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {

                if(response.status){

                    $("#tbRobot tbody").html(response.list);

                    $("#tbRobot").data('pageNum',response.optionPage.page);
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
                $("#reloadRobot").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function getDetailRobot(betid,betball,selectprice,maxdiff,betdate){

        $.ajax({
            url: 'robot/detail',
            data: {
                betid       : betid,
                betball     : betball,
                selectprice : selectprice,
                maxdiff     : maxdiff,
                betdate     : betdate
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if(response.status){
                    $("#showModal").html(response.temp);
                    $("#showDetailRobot").modal('show');
                }else{
                    dialogError('data error');
                }                
            },
            error: function (response) {
                console.log(response);
            }
        });

    }

    jQuery(function($) {


    });

</script>

