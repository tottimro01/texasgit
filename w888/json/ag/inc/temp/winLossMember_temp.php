
<?php require('inc_head.php');?>

<div class="row">
    <div class="widget-box hidden-boder" id="reloadWinLoseMember">
        <div class="widget-header widget-header-blue widget-header-flat hidden ">
            <h4 class="widget-title lighter"><strong> <?=$lang_winLossMember[1];?> </strong></h4>
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
                                <label class="control-label col-xs-2 col-sm-2 col-md-1 no-padding-right" for="username"> <?=$lang_winLossMember[2];?> :</label>
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
                                    <input type="text" name="suser" id="suser" class="col-xs-12 col-sm-12 input-sm " placeholder="<?=$lang_winLossMember[3];?>">
                                </div>
                                <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username"><?=$lang_winLossMember[4];?> :</label>
                                <div class="col-xs-12 col-sm-2 col-md-2 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="perpage" name="perpapge">
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="2000">2000</option>
                                        <option value="3000">3000</option>
                                        <option value="4000">4000</option>
                                        <option value="5000">5000</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-2 mobile-padding">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_winLossMember[5];?>                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" id="filter_more">
                                        <span class="ace-icon fa fa-filter icon-on-right bigger-110"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mobile-mode">
                                <div class="col-xs-12 col-sm-12">
                                    <label style="margin-right: 10px;">
                                        <span class="lbl"> <?=$lang_winLossMember[6];?> : </span>
                                    </label>
                                    <label style="margin-right: 10px;">
                                        <input name="all" class="ace ace-checkbox-2" type="checkbox" checked="checked" onclick="checkAll('all');">
                                        <span class="lbl"> <?=$lang_winLossMember[7];?> </span>
                                    </label>

                                    <?php 
                                        foreach ($lang_g["list_winLoss"] as $key => $value) {
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
                                        <label style="margin-right: 10px;">
                                            <input type="radio" name="radio_group_type" value="u" checked="checked" class="ace">
                                            <span class="lbl"> <?=$lang_winLossMember[17];?> </span>
                                        </label>
                                        <label style="margin-right: 10px;">
                                            <input type="radio" name="radio_group_type" value="d" class="ace">
                                            <span class="lbl"> <?=$lang_winLossMember[18];?> </span>
                                        </label>
                                        <label style="margin-right: 10px;">
                                            <input type="radio" name="radio_group_type" value="g" class="ace">
                                            <span class="lbl"> <?=$lang_winLossMember[19];?> </span>
                                        </label>
                                        <label style="margin-right: 10px;">
                                            <span class="lbl text-default">(2019-04-01  <?=$lang_winLossMember[20];?> </span>
                                        </label>
                                        <label style="margin-right: 10px;">
                                            <span class="lbl text-default"> 2019-03-31  
                                                            <span class="text-primary">
                                                                <?=$lang_winLossMember[21];?> 
                                                            </span>
                                            </span>
                                        </label>                                                                                                                                      <label style="margin-right: 10px;">
                                            <span class="lbl text-default"> 2019-03-30  
                                                            <span class="text-primary">
                                                                <?=$lang_winLossMember[21];?> 
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
                            <?=$lang_winLossMember[22];?> <span id="duration_date"></span> 
                            <span id="winLoseMember_header"></span><span id="winLoseMember_header_game"></span>
                        </div>
                        <div class="table-responsive">
                            <table id="tb_winLoseMember" class="table table-striped table-bordered table-hover text-center">
                                
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row hidden" id="pagination">
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
                </div>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/css/daterangepicker.min.css">

<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js" async=""></script>
<script type="text/javascript" src="assets/js/moment.min.js" async=""></script>
<script type="text/javascript" src="assets/js/daterangepicker.min.js" async=""></script>

<script type="text/javascript">
    
    jQuery(function($) {

        $("#begin_date").datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'dd-mm-yyyy'
        }).datepicker("setDate", "0").on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            var maxDate = new Date(minDate.getFullYear(),minDate.getMonth(),minDate.getDate() +45);
            $('#end_date').datepicker('setStartDate',minDate);
            $('#end_date').datepicker('setEndDate', maxDate);
            $('#end_date').datepicker("setDate", minDate);
        }).datepicker('setEndDate', "0");
        
        $("#end_date").datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'dd-mm-yyyy'
        }).datepicker("setDate", "0").on('changeDate', function (selected) {

        }).datepicker('setEndDate', "0");
    });

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
            $.ajax({
                url: 'inc/temp/winLossMember/search_temp.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token      : $('input[name=_token]').val(),
                    begin       : $('#begin_date').val(),
                    end         : $('#end_date').val(),
                    sc          : ($('input[name="cb_sc"]').is(':checked'))? "sc" : "",
                    st          : ($('input[name="cb_st"]').is(':checked'))? "st" : "",
                    sp          : ($('input[name="cb_sp"]').is(':checked'))? "sp" : "",
                    gm          : ($('input[name="cb_gm"]').is(':checked'))? "gm" : "",
                    bx          : ($('input[name="cb_bx"]').is(':checked'))? "bx" : "",
                    lg          : ($('input[name="cb_lg"]').is(':checked'))? "lg" : "",
                    ls          : ($('input[name="cb_ls"]').is(':checked'))? "ls" : "",
                    cn          : ($('input[name="cb_cn"]').is(':checked'))? "cn" : "",
                    ll          : ($('input[name="cb_ll"]').is(':checked'))? "ll" : "",
                    uwinlose    : uID,
                    ulv         : uLv,
                    suser       : suser,
                    grouptype   : $('input[name=radio_group_type]:checked').val(),
                    userlist    : userlist,
                    page        : page,
                    perpage     : $('#perpage').val(),
                },
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
                                sunn += '|' + lv + '_' + uname[0];
                                tag_user += '<span class="label label-warning arrowed-right arrowed-in cur" onclick="getData(&quot;'+ uname[0] +'&quot;,&quot;'+ lv +'&quot;,&quot;'+sunn+'&quot;,'+page+',\'Inbar\');">'+
                                                '<i class="ace-icon fa fa-user bigger-120"></i> '+ uname[0] +
                                             '</span>';
                            }
                        }
                        ubill = lv + '_' + uname[0];
                    }
                    /* end title */

                    /* begin pagination */
                    var u_user = ubill.split('_');
                    var u_id   = u_user[1];
                    var u_lv   = u_user[0];
                    var u_list = sunn;
                    if(Number(response.result.rows) >= 50){
                        var pv   = page - 1;
                        var pn   = page +1;
                        if(pv < 1){
                            $('#btn_prev').addClass('hidden');
                            $('#btn_next').removeClass('hidden');
                        }else{
                            $('#btn_prev').removeClass('hidden');
                            $('#btn_next').removeClass('hidden');
                        }
                        $('#btn_prev').attr('onclick','getData("'+ u_id +'","'+ u_lv +'","'+ u_list +'",'+ pv +',\'Infoot\');');
                        $('#btn_next').attr('onclick','getData("'+ u_id +'","'+ u_lv +'","'+ u_list +'",'+ pn +',\'Infoot\');');
                        $('#pagination').removeClass('hidden');
                    }else{
                        var pv   = page - 1;
                        if(pv != 0){
                            $('#btn_prev').removeClass('hidden');
                        }else{
                            $('#btn_prev').addClass('hidden');
                        }
                        $('#pagination').removeClass('hidden');
                        $('#btn_prev').attr('onclick','getData("'+ u_id +'","'+ u_lv +'","'+ u_list +'",'+ pv +',\'Infoot\');');
                        $('#btn_next').addClass('hidden');
                    }
                    /* end pagination */

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
                        if(page > 1){
                            ii = Number($('#perpage').val()) * (Number(page) -1);
                        }
                        $.each(response.result.data,function(key,val){
                            col   = val.length; // จำนวน column ทั้งหมด
                            ii++;
                            switch (response.result.grouptype){

                                case 'u' :
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

                                break;

                                case 'd' :
                                    col_name = "วัน";
                                    tbody += '<tr>';
                                        $.each(val,function(k,v){
                                            if(k == 0){
                                                tbody += '<td class="text-center">'+ ii +'</td>';
                                                tbody += '<td class="text-left">'+ v +'</td>';
                                            }else{
                                                sum[k] = sum[k] + Number(v.replace(/,/g, ""));
                                                tbody += '<td class="text-right num">'+ Number(v).toFixed(2) +'</td>';
                                            }
                                        });
                                    tbody += '</tr>';
                                break;

                                case 'm' :
                                    col_name = "เดือน";
                                    tbody += '<tr>';
                                        $.each(val,function(k,v){
                                            if(k == 0){
                                                tbody += '<td class="text-center">'+ ii +'</td>';
                                                tbody += '<td class="text-left">'+ v +'</td>';
                                            }else{
                                                sum[k] = sum[k] + Number(v.replace(/,/g, ""));
                                                tbody += '<td class="text-right num">'+ Number(v).toFixed(2) +'</td>';
                                            }
                                        });
                                    tbody += '</tr>';
                                break;

                                case 'g' :
                                    col_name = "เกมส์";
                                    var game = {
                                        'sc' : 'ฟุตบอล',
                                        'st' : 'สเต็ป',
                                        'sp' : 'กีฬา',
                                        'bx' : 'มวยไทย',
                                        'gm' : 'เกมส์',
                                        'cn' : 'คาสิโน',
                                        'lg' : 'หวย',
                                        'ls' : 'หวยหุ้น',
                                        'll' : 'หวยชุด',
                                    }
                                    tbody += '<tr>';
                                        $.each(val,function(k,v){
                                            if(k == 0){
                                                tbody += '<td class="text-center">'+ ii +'</td>';
                                                if($('input[name=radio_group_type]:checked').val() == 'u'){
                                                    tbody += '<td class="text-left"><a href="#" onclick="getBill(&quot;'+ ubill +'&quot;,&quot;'+ v +'&quot;,50,1);">'+ game[v] +'</a></td>';
                                                }else{
                                                    tbody += '<td class="text-left">'+ game[v] +'</td>';
                                                }
                                            }else{
                                                sum[k] = sum[k] + Number(v.replace(/,/g, ""));
                                                tbody += '<td class="text-right num">'+ Number(v).toFixed(2) +'</td>';
                                            }
                                        });
                                    tbody += '</tr>';
                                break;
                            }
                        }); 

                        tfoot += '<tr><td colspan="2" class="text-strong"><?=$lang_winLossMember[33];?></td>';
                        for (var i = 1; i < sum.length; i++){
                            tfoot += '<td class="text-right text-strong fnum" >'+ Number(sum[i]).toFixed(2) +'</td>';
                        };
                        tfoot += '</tr>';
                        
                        if(tbody == ""){
                            tbody = '<tr>'+
                                        '<td colspan="'+ col +'" class="text-danger"> ไม่พบข้อมูล </td>'+
                                    '</tr>';
                        }
                        table = '<thead>'+
                                    '<tr>'+
                                        '<th rowspan="2">  <?=$lang_winLossMember[23];?> </th>'+
                                        // '<th rowspan="2"> '+ col_name +' </th>'+
                                        '<th rowspan="2"> <?=$lang_winLossMember[24];?> </th>'+
                                        '<th rowspan="2"> <?=$lang_winLossMember[25];?> </th>'+
                                        '<th rowspan="2"> <?=$lang_winLossMember[26];?> </th>'+
                                        '<th colspan="3"> <?=$lang_winLossMember[27];?> </th>'+
                                        '<th colspan="3"> <?=$lang_winLossMember[28];?> </th>'+
                                        '<th colspan="2"> <?=$lang_winLossMember[29];?> </th>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<th><?=$lang_winLossMember[31];?></th><th><?=$lang_winLossMember[32];?></th><th><?=$lang_winLossMember[33];?></th>'+
                                        '<th><?=$lang_winLossMember[31];?></th><th><?=$lang_winLossMember[32];?></th><th><?=$lang_winLossMember[33];?></th>'+
                                        '<th><?=$lang_winLossMember[32];?></th><th><?=$lang_winLossMember[33];?></th>'+
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
                            '<tr><td class="text-danger"> <?=$lang_winLossMember[30];?> </td></tr>'+
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
            url: 'inc/temp/winLossMember/getBill_temp.php',
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

            tag_game += '<span class="label label-success arrowed-right arrowed-in cur" onclick="getBill(&quot;'+ user +'&quot;,&quot;'+ game +'&quot;,50,1);">'+
                             game +'</span>';

            if(response.status){

                /* begin pagination */
                if(Number(response.rows) >= 50){
                    var pv   = Number(page) - 1;
                    var nv   = Number(no) - 50;
                    var pn   = Number(page) +1;
                    var nn   = Number(no) + 50;

                    if(nv < 1){
                        $('#btn_prev').addClass('hidden');
                        $('#btn_next').removeClass('hidden');
                    }else{
                        $('#btn_prev').removeClass('hidden');
                        $('#btn_next').removeClass('hidden');
                    }
                    $('#btn_prev').attr('onclick','getBill("'+ user +'","'+ game +'","'+ nv +'","'+ pv +'");');
                    $('#btn_next').attr('onclick','getBill("'+ user +'","'+ game +'","'+ nn +'","'+ pn +'");');
                    $('#pagination').removeClass('hidden');
                }else{
                    var pv   = Number(page) - 1;
                    var nv   = Number(no) - 50;
                    if(pv != 0){
                        $('#btn_prev').removeClass('hidden');
                    }
                    $('#pagination').removeClass('hidden');
                    $('#btn_prev').attr('onclick','getBill("'+ user +'","'+ game +'","'+ nv +'","'+ pv +'");');
                    $('#btn_next').addClass('hidden');
                }
                /* end pagination */

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