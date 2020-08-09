
<?php require('inc_head.php');?>

<div class="row">
    <div class="widget-box hidden-boder" id="reloadWinLoseMember">
        <div class="widget-header widget-header-blue widget-header-flat hidden ">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[28];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <form class="form-horizontal" id="winOrLossAnalysis" method="get">
                            <div class="form-group">
                                <label class="control-label col-xs-2 col-sm-2 col-md-1 no-padding-right" for="username"> <?=$lang_ag[1401];?> :</label>
                                <div class="col-xs-10 col-sm-4 col-md-4 mobile-padding">
                                    <div class="input-daterange input-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                            <input class="input-sm form-control date-picker" id="begin_date" type="text" data-date-format="dd-mm-yyyy" onfocus="this.blur()">
                                        </div>
                                        <span class="input-group-addon">
                                            <i class="fa fa-exchange"></i>
                                        </span>
                                        <input class="input-sm form-control date-picker" id="end_date" type="text" data-date-format="dd-mm-yyyy" onfocus="this.blur()">   
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 mobile-padding">
                                    <input type="text" name="suser" id="suser" class="col-xs-12 col-sm-12 input-sm " placeholder="<?=$lang_ag[1404];?>">
                                </div>
                                <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username"><?=$lang_ag[1170];?> :</label>
                                <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="rowPerPage" name="rowPerPage">
                                        <? foreach ($lengthMenu as $key => $value) { ?>
                                            <option value="<?=$value;?>"><?=$value;?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-2 mobile-padding">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" id="filter_more">
                                        <span class="ace-icon fa fa-filter icon-on-right bigger-110"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mobile-mode">
                                <div class="col-xs-12 col-sm-12">
                                    <label style="margin-right: 10px;">
                                        <span class="lbl"> <?=$lang_ag[1414];?> : </span>
                                    </label>
                                    <label style="margin-right: 10px;">
                                        <input name="all" class="ace ace-checkbox-2" type="checkbox" checked="checked" onclick="checkAll('all');">
                                        <span class="lbl"> <?=$lang_ag[174];?> </span>
                                    </label>

                                    <?php 
                                        foreach ($lang_g["bet_type"] as $key => $value) {
                                          ?>
                                            <label style="margin-right: 10px;">
                                                <input name="cb_<?=$key;?>" class="ace ace-checkbox-2 chkGame" type="checkbox" checked="checked" onclick="checkAll();">
                                                <span class="lbl"> <?=$value;?> </span>
                                            </label>
                                          <?
                                        }

                                     ?>

                                </div><i class="far fa-boxing-glove"></i>
                            </div>
                            <div class="form-group mobile-mode">
                                <div class="col-xs-12 col-sm-12 control-group inline">
                                    <div class="radio">
                                        <label style="margin-right: 10px; display: none;">
                                            <input type="radio" name="radio_group_type" value="u" checked="checked" class="ace">
                                            <span class="lbl"> <?=$lang_ag[1404];?> </span>
                                        </label>
                                        <label style="margin-right: 10px; display: none;">
                                            <input type="radio" name="radio_group_type" value="d" class="ace">
                                            <span class="lbl"> <?=$lang_ag[1653];?> </span>
                                        </label>
                                        <label style="margin-right: 10px; display: none;">
                                            <input type="radio" name="radio_group_type" value="g" class="ace">
                                            <span class="lbl"> <?=$lang_ag[1414];?> </span>
                                        </label>
                                        <label style="margin-right: 10px;">

                                            <span class="lbl text-default">(<?=date("Y-m-d", strtotime('now'));?>  
                                            <span class="text-primary">
<?
$r_id=$_POST["session"]["r_id"];

$d1a=date("d-m-Y", strtotime('now'));
$d1b=date("Y-m-d", strtotime('now'));

$sql="select  count( b_sum ) as btotal  from bom_tb_football_bill_live where r_agent_id like '%*$r_id*%'  and b_accept=1  and b_status=5   and  b_date = '$d1a' limit 1 ";
$rs1=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_lotto_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1  and b_status=5   and  b_date = '$d1a'  limit 1 ";
$rs2=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_games_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1   and  play_datenow like '$d1b%'  limit 1 ";
$rs3=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_casino_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1   and  play_datenow like '$d1b%'  limit 1 ";
$rs4=sql_array($sql);
$sum_a=$rs1['btotal']+$rs2['btotal']+$rs3['btotal']+$rs4['btotal'];
if($sum_a>0){
	echo $lang_ag[1177];
}else{
   echo $lang_ag[1178];
	}

?>
</span>
                     </span>
                                        </label>
                                        <label style="margin-right: 10px;">
                                            <span class="lbl text-default"> <?=date("Y-m-d", strtotime('-1 day'));?>  
                                                            <span class="text-primary">
<?


$d1a=date("d-m-Y", strtotime('-1 day'));
$d1b=date("Y-m-d", strtotime('-1 day'));

$sql="select  count( b_sum ) as btotal  from bom_tb_football_bill_live where r_agent_id like '%*$r_id*%'  and b_accept=1  and b_status=5   and  b_date = '$d1a' limit 1 ";
$rs1=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_lotto_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1  and b_status=5   and  b_date = '$d1a'  limit 1 ";
$rs2=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_games_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1   and  play_datenow like '$d1b%'  limit 1 ";
$rs3=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_casino_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1   and  play_datenow like '$d1b%'  limit 1 ";
$rs4=sql_array($sql);
$sum_a=$rs1['btotal']+$rs2['btotal']+$rs3['btotal']+$rs4['btotal'];
if($sum_a>0){
	echo $lang_ag[1177];
}else{
   echo $lang_ag[1178];
	}

?>
                                                            </span>
                                            </span>
                                        </label>                                                                                                                                      <label style="margin-right: 10px;">
                                            <span class="lbl text-default"> <?=date("Y-m-d", strtotime('-2 day'));?>  
                                                            <span class="text-primary">
<?


$d1a=date("d-m-Y", strtotime('-2 day'));
$d1b=date("Y-m-d", strtotime('-2 day'));

$sql="select  count( b_sum ) as btotal  from bom_tb_football_bill_live where r_agent_id like '%*$r_id*%'  and b_accept=1  and b_status=5   and  b_date = '$d1a' limit 1 ";
$rs1=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_lotto_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1  and b_status=5   and  b_date = '$d1a'  limit 1 ";
$rs2=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_games_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1   and  play_datenow like '$d1b%'  limit 1 ";
$rs3=sql_array($sql);
$sql="select  count( b_total ) as btotal  from bom_tb_casino_bill_play_live where r_agent_id like '%*$r_id*%'  and b_accept=1   and  play_datenow like '$d1b%'  limit 1 ";
$rs4=sql_array($sql);
$sum_a=$rs1['btotal']+$rs2['btotal']+$rs3['btotal']+$rs4['btotal'];
if($sum_a>0){
	echo $lang_ag[1177];
}else{
   echo $lang_ag[1178];
	}

?>
                                                            </span>)
                                            </span>
                                        </label>
                                        <button type="button" class="btn btn-success btn-sm pull-right hidden" id="btn_export">
                                            <span class="ace-icon fa fa-download icon-on-right bigger-110"></span>
                                            <input type="hidden" id="tokenV">
                                            <input type="hidden" id="tokenT">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-header">
                            <?=$lang_ag[429];?> <span id="duration_date"></span> 
                            <span id="winLoseMember_header"></span><span id="winLoseMember_header_game"></span>
                        </div>
                        <div class="table-responsive">
                            <table id="tb_winLoseMember" class="table table-striped table-bordered table-hover text-center">
                                
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                 <div id="pagination" data-activePage="1">
                </div>

               <!--  <div class="row hidden" id="pagination">
                    <div class="col-xs-12">
                        <button class="btn btn-xs btn-light hidden" id="btn_prev">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            <span class="bigger-110">ก่อนหน้า</span>
                        </button>
                        <button class="btn btn-xs btn-success pull-right" id="btn_next">
                            <span class="bigger-110">ถัดไป</span>
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="stepDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-responsive" id="tb_stepDetail">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?></button>
            </div>
        </div>
    </div>
</div>
<!-- datepicker -->
<!-- <link rel="stylesheet" href="assets/css/datepicker.min.css"> -->
<!-- <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css"> -->
<!-- <link rel="stylesheet" href="assets/css/daterangepicker.min.css"> -->

<!-- <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js" async=""></script> -->
<script type="text/javascript" src="assets/js/moment.min.js" async=""></script>
<!-- <script type="text/javascript" src="assets/js/daterangepicker.min.js" async=""></script> -->

<link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../../assets/js/main.js"></script>
<script type="text/javascript">
    
    jQuery(function($) {



  $( "#begin_date,#end_date" ).datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
  })
  $( "#begin_date,#end_date" ).datepicker('setDate', "0");
  $( "#begin_date,#end_date" ).datepicker('setEndDate', "0");

        // $("#begin_date").datepicker({
        //     autoclose: true,
        //     todayHighlight: true,
        //     dateFormat: 'dd-mm-yyyy'
        // }).datepicker("setDate", "0").on('changeDate', function (selected) {
        //     var minDate = new Date(selected.date.valueOf());
        //     var maxDate = new Date(minDate.getFullYear(),minDate.getMonth(),minDate.getDate() +45);
        //     // $('#end_date').datepicker('setStartDate',minDate);
        //     // $('#end_date').datepicker('setEndDate', maxDate);
        //     // $('#end_date').datepicker("setDate", minDate);
        // }).datepicker('setEndDate', "0");
        
        // $("#end_date").datepicker({
        //     autoclose: true,
        //     todayHighlight: true,
        //     dateFormat: 'dd-mm-yyyy'
        // }).datepicker("setDate", "0").on('changeDate', function (selected) {

        // }).datepicker('setEndDate', "0");
    

        $('#btn_search').click();
    });

     var bet_type = <?=json_encode($lang_g["bet_type"]);?>;

    $('#btn_search').on('click',function(){
        
        var last_bill = $('#winLoseMember_header_game span:last-child').text();
        var last_user = $('#winLoseMember_header span:last-child').text();
        var suser     = $('#suser').val();
        var getUl     = $('#winLoseMember_header span:last-child').attr('onclick');
        var userlist  = "";
        if(getUl != undefined && getUl != ''){
            var split = getUl.split(',');
        }
        
        if (last_bill != '' && suser == ''){
            $('#winLoseMember_header_game span:last-child').click();
        }else if(last_user != ''  && suser == ''){
            $('#winLoseMember_header span:last-child').click();
        }else{
            if(last_user != ''){
                getData($.trim(last_user),split[1].replace(/(["])/g, ""),split[2].replace(/(["])/g, ""),1);
            }else{
                getData();
            }
        }
        $('#btn_export').addClass('hidden');
    });




    $('#filter_more').on('click',function(){
        $('.mobile-mode').toggle('fade');
    });
    
    function parseDMY(value) {
        var date = value.split("-");
        var check = false;
        var d = parseInt(date[0], 10),
            m = parseInt(date[1], 10),
            y = parseInt(date[2], 10);

        return new Date(y, m - 1, d);
    }
    function getData(uID,uLv,userlist,page,action){

        var rowPerPage = $("#rowPerPage").val();
        var suser = $('#suser').val();

        if(action == 'Inbar'){
            suser = "";
        }

        if(action == 'Intable'){
            suser = "";
        }

        if(action == 'Infoot'){
            suser = "";
        }

       
        if(page == undefined || page == '' && suser != undefined || suser != ''){
            page = 1;

        }

        var page = $('#pagination').attr("data-activePage");

        var tag_user = "";
        var table    = "";
        var duration_date = "";

        if($('#begin_date').val() == undefined || $('#begin_date').val() == '' || isNaN(parseDMY($('#begin_date').val()).getDate())){
            $('#begin_date').css({"box-shadow":"0 0 5px #DE5E47 ","margin":"5px 1px 3px 0px;","border":"1px solid #DE5E47 "}).click();
            return false;
        }else if($('#end_date').val() == undefined || $('#end_date').val() == '' || isNaN(parseDMY($('#end_date').val()).getDate())){
            $('#end_date').css({"box-shadow":"0 0 5px #DE5E47 ","margin":"5px 1px 3px 0px;","border":"1px solid #DE5E47 "}).click();
            return false;
        }else{

            $('#reloadWinLoseMember').load('show');

            duration_date = '( '+$('#begin_date').val()+' to '+$('#end_date').val()+' )';

            $('#begin_date').removeAttr("style");
            $('#end_date').removeAttr("style");

            let data = {};
            $.each(bet_type,function(index, el) {
                    data[index] = ($('input[name="cb_'+index+'"]').is(':checked'))? index : "";
            });

            data["_token"] = $('input[name=_token]').val();
            data["begin"] = $('#begin_date').val();
            data["end"] = $('#end_date').val();
            data["uwinlose"] = uID;
            data["ulv"] = uLv;
            data["suser"] = suser;
            data["grouptype"] = $('input[name=radio_group_type]:checked').val();
            data["userlist"] = userlist;
            data["page"] = page;
            data["rowPerPage"] = rowPerPage;
            // data["perpage"] = $('#rowPerPage').val();


            $.ajax({
                url: 'inc/temp/winLossMember/search_temp.php',
                type: 'POST',
                dataType: 'json',
                data: data,
            })
            .done(function(response) {
                var tbody    = "";
                var tfoot    = "";
                var sum      = [];
                var sunn     = '';
                var ubill    = '';
                if(response.status){

                    $('#tokenV').val(response.tokenV);
                    $('#tokenT').val(response.tokenT);
                    /* begin title */
                    var ag   = response.result.userlist.split('|');
                    var lv   = '';
                    
                    for (var i = 0; i <= (ag.length -1);i++){
                        var user  = ag[i].split('_');
                        var uname = user[1].split('^');

                        if(i == 0){
                            lv = user[0];
                            sunn += lv + '_' + uname[0];
                            tag_user += '<span class="label label-warning arrowed-right cur" style="margin-left: 10px;" onclick="getData(&quot;'+ uname[0] +'&quot;,&quot;'+ lv +'&quot;,'+'&quot;&quot;'+','+page+',\'Inbar\');">'+
                                            '<i class="ace-icon fa fa-user bigger-120"></i> '+ uname[0] + 
                                         '</span>';
                        }else{
                            if(uname[0]){
                                lv   = Number(lv) + 1;
                                sunn += '|' + lv + '_' +uname[0]+"^"+uname[1]+"^"+uname[2];
                                tag_user += '<span class="label label-warning arrowed-right arrowed-in cur" onclick="getData(&quot;'+ uname[0] +'&quot;,&quot;'+ lv +'&quot;,&quot;'+sunn+'&quot;,'+page+',\'Inbar\');">'+
                                                '<i class="ace-icon fa fa-user bigger-120"></i> '+ uname[0] +
                                             '</span>';
                            }
                        }
                        ubill = lv + '_' + uname[0];
                    }
                    /* end title */

                    if(response.result.data){
                        if(response.exp){
                            $('#btn_export').removeClass('hidden');
                        }
                        
                        var col   = 0;
                        
                        $.each(response.result.data[0],function(k,v){
                            sum[k] = 0;
                        }); // ประกาศตัวแปร sum ตามข้อมูล
                        lv    = Number(lv) + 1;
                        var col_name = '';
                        var ii = 0;
                        if(page > 1 ){
                            // ii = Number($('#perpage').val()) * (Number(page) -1);
                             ii =  Number(rowPerPage) * (Number(page) -1);  
                        }

                        if(response.result.grouptype == 'g')
                        {
                            ii = 0;
                        }


                        $.each(response.result.data,function(key,val){
                            col   = val.length; // จำนวน column ทั้งหมด
                            ii++;

                            console.log(response.result.pagi_data);
                            switch (response.result.listtype){

                                case 'userList' :
                                    col_name = "ชื่อผู้ใช้";
                                    tbody += '<tr>';
                                        $.each(val,function(k,v){
                                            var ulist =  response.result.userlist + '|' + lv +'_'+ v;
                                            var obj_name = '';
                                            var utype = '';
                                            page = 1;
                                            if(k == 0){
                                                obj_name = v.split('^');
                                                if(obj_name[1] == undefined || obj_name[1] == ""){
                                                    obj_name[1] = ""; 
                                                }else{
                                                    obj_name[1] = "("+ obj_name[1] +")";
                                                }
                                                if(obj_name[2] == 'A'){
                                                    utype = '<i class="btn btn-grey btn-minier"> @ </i> ';
                                                }else{
                                                    utype = '<i class="btn btn-grey btn-minier"> M </i> ';
                                                }
                                                tbody += '<td class="text-center">'+ ii +'</td>';
                                                tbody += '<td class="text-left"><a href="#" onclick="getData(&quot;'+ obj_name[0] +'&quot;,&quot;'+ lv +'&quot;,&quot;'+ ulist +'&quot;,'+page+',\'Intable\');">'+ utype + obj_name[0] +' '+ obj_name[1] +'</a></td>';
                                            }else{
                                                sum[k] = sum[k] + Number(v.replace(/,/g, ""));
                                                tbody  += '<td class="text-right num">'+ Number(v).toFixed(2) +'</td>';
                                            }
                                        });
                                    tbody += '</tr>';

                                    var pagi_html = loadPagination(response.result.pagi_data);
                                    $('#pagination').text('');
                                    $('#pagination').html(pagi_html);
                                    $('#pagination').attr("data-activePage",response.result.pagi_data.active_page);
                                    $('#pagination').show();

                                break;

                                case 'gameList' :
                                    col_name = "เกมส์";
                                    tbody += '<tr>';
                                        $.each(val,function(k,v){
                                            if(k == 0){
                                                tbody += '<td class="text-center">'+ ii +'</td>'+
                                                         '<td class="text-left"><a href="#" onclick="getBill(&quot;'+ ubill +'&quot;,&quot;'+ v +'&quot;,50,1);">'+ bet_type[v]+'</a></td>';

                                            }else{
                                                sum[k] = sum[k] + Number(v.replace(/,/g, ""));
                                                tbody += '<td class="text-right num">'+ Number(v).toFixed(2) +'</td>';
                                            }
                                        });
                                    tbody += '</tr>';
                                    $('#pagination').attr("data-activePage",1);
                                    $('#pagination').hide();
                                break;
                            }
                        }); 

                        

                        tfoot += '<tr><td colspan="2" class="text-strong"><?=$lang_ag[197];?></td>';
                        for (var i = 1; i < sum.length; i++){
                            tfoot += '<td class="text-right text-strong fnum" >'+ Number(sum[i]).toFixed(2) +'</td>';
                        };
                        tfoot += '</tr>';
                        
                        if(tbody == ""){
                            tbody = '<tr>'+
                                        '<td colspan="'+ col +'" class="text-danger"> <?=$lang_ag[1];?> </td>'+
                                    '</tr>';
                        }
                        table = '<thead>'+
                                    '<tr>'+
                                        '<th rowspan="2">  <?=$lang_ag[238];?> </th>'+
                                        // '<th rowspan="2"> '+ col_name +' </th>'+
                                        '<th rowspan="2"> <?=$lang_ag[1396];?> </th>'+
                                        '<th rowspan="2"> <?=$lang_ag[255];?> </th>'+
                                        '<th rowspan="2"> <?=$lang_ag[1402];?> </th>'+
                                        '<th colspan="3"> <?=$lang_ag[189];?> </th>'+
                                        '<th colspan="3"> <?=$lang_ag[455];?> </th>'+
                                        '<th colspan="2"> <?=$lang_ag[1415];?> </th>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<th><?=$lang_ag[429];?></th><th><?=$lang_ag[210];?></th><th><?=$lang_ag[197];?></th>'+
                                        '<th><?=$lang_ag[429];?></th><th><?=$lang_ag[210];?></th><th><?=$lang_ag[197];?></th>'+
                                        '<th><?=$lang_ag[210];?></th><th><?=$lang_ag[197];?></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'+ tbody +'</tbody>'+
                                '<tfoot>'+ tfoot +'</tfoot>';
                    }
                
                }else{
                    $('#pagination').addClass('hidden');
                }
            }).always(function(){
                if(table == ""){
                    table = '<tbody>'+
                            '<tr><td class="text-danger"> <?=$lang_ag[1];?> </td></tr>'+
                            '</tbody>';
                }
                $('#tb_winLoseMember').html(table);
                $('#winLoseMember_header').html(tag_user);
                $('#winLoseMember_header_game').html('');
                $('td.num,span.num').digits();
                $('td.fnum').digits();
                $('#reloadWinLoseMember').load('hide');
                $("#duration_date").html(duration_date);
            });
        }
    }

    function clickPage(page)
    {
         $('#pagination').attr("data-activePage",page);
         $('#btn_search').click();
    }

    function checkAll(type){
        if(type == 'all'){
            $(".chkGame").prop('checked', $('input[name="all"]').prop("checked"));
        }else{
            var chk = true;
            $('.chkGame').each(function(){
                if(!$(this).prop('checked')){
                    chk = false;
                }
            });
            $('input[name="all"]').prop("checked",chk);
        }
    }


    function getBill(user,game,no,page){
        $('#reloadWinLoseMember').load('show');

        var table    = "";
        var u        = user.split('_');
        var tag_game = "";
        if(page == undefined || page == ''){
            page = 1;
        }
        $.ajax({
            url: 'inc/temp/winLossMember/getWinlossM_Bill_temp.php',
            type: 'GET',
            dataType: 'json',
            data: {
                begin       : $('#begin_date').val(),
                end         : $('#end_date').val(),
                muser       : u[1],
                mlevel      : u[0],
                page        : page,
                no          : no,
                game        : game.toLowerCase(),

            },
        }).done(function(response) {
            var col     = 6;

            tag_game += '<span class="label label-success arrowed-right arrowed-in cur" onclick="getBill(&quot;'+ user +'&quot;,&quot;'+ game +'&quot;,50,1);">'+bet_type[game] +'</span>';

            if(response.status){
                table = response.result;
            }else{
                
                $('#pagination').addClass('hidden');
            }

        }).always(function(){
            if(table == ""){
                table = '<tbody>'+
                        '<tr><td class="text-danger"> ไม่พบข้อมูล </td></tr>'+
                        '</tbody>';
            }
            $('#tb_winLoseMember').html(table);
            $('#winLoseMember_header_game').html(tag_game);
            $('td.num,span.num').digits();
            $('#reloadWinLoseMember').load('hide');
        });
    }

    function getStepDetail(bet_id){

        $.ajax({
            url: 'inc/temp/winLossMember/stepDetail_temp.php',
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

    $('#btn_export').on('click',function(){
        
        var tokenV = $('#tokenV').val();
        var tokenT = $('#tokenT').val();

        window.location = 'winLossMember/export?tokenV='+tokenV+'&tokenT='+tokenT;
    });
</script>

@endsection
</div>