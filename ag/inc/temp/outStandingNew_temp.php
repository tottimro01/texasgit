<?php require('inc_head.php');?>

<link rel="stylesheet" href="assets/css/custom/outStandingNew_temp.css">
<div class="row">
    <div class="widget-box hidden-boder" id="reloadOutStanding">
        <div class="widget-header hidden">
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload" id="reloadOutstanding">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main ">
                <div class="row">
                    <div class="col-xs-12 ">
                        <form class="form-horizontal" id="frmSearchOutstanding" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-xs-6 col-sm-2">
                                    <input type="text" id="search_input" name="q" placeholder="<?=$lang_ag[1396];?>" value="" class="col-xs-12 col-sm-12">
                                    
                                </div>
                                 <!-- <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username"><?=$lang_ag[1170];?> :</label> -->
                                <!-- <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="perpage" name="perpapge">
                                        <? foreach ($lengthMenu as $key => $value) { ?>
                                            <option value="<?=$value;?>"><?=$value;?></option>
                                        <? } ?>
                                    </select>
                                </div> -->

                                <div class="col-xs-2 col-sm-2">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="loadData();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                   </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tbOutstanding" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="100%" class="cur">
                                            <div class="pull-left" id="headMemberList">
                                                <i class="ace-icon fa fa-users"></i>
                                                <strong><?=$lang_ag[1157];?></strong> &nbsp;&nbsp;&nbsp;
                                                
                                                <span id="panel" style="font-size: 0;">
                                                    <span class="label label-yellow arrowed-right" id="first_panal" onclick="loadData();">
                                                        <strong> 
                                                            <?=$lang_ag[205];?> 
                                                        </strong>
                                                    </span>
                                                </span>

                                               
                                            </div>
                                        </th>
                                    </tr>
                                    
                                </thead>
                                <thead id="append_head">
                                    <tr>
                                      <th rowspan="2" width="10%"><?=$lang_ag[1396];?></th>
                                      <th rowspan="2" width="10%"><?=$lang_ag[255];?></th>
                                      <th colspan="3" width="30%"><?=$lang_ag[189];?></th>
                                      <th colspan="3" width="30%"><?=$lang_ag[455];?></th>
                                      <th rowspan="2" width="10%"><?=$lang_ag[1415];?></th>
                                    </tr>
                                    <tr>
                                      <th><?=$lang_ag[214];?></th>
                                      <th><?=$lang_ag[191];?></th>
                                      <th><?=$lang_ag[197];?></th>
                                      <th><?=$lang_ag[214];?></th>
                                      <th><?=$lang_ag[191];?></th>
                                      <th><?=$lang_ag[197];?></th>
                                    </tr>
                                </thead>
                                <tbody><tr><td colspan="10"><center><strong><?=$lang_ag[1];?></strong></center></td></tr></tbody>
                                <tfoot>
                                    <tr id="tfSumall">
 
                                    </tr>
                                
                                </tfoot>
                            </table>

                            <br>
                            <div id="pagination" data-activePage="1">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="stepDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:50%">
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
<div class="table-responsive" id="tb_stepDetail"></div>
<script src="../../assets/js/main.js"></script>
<script type="text/javascript">

loadData();

// function loadData()
// {
//     var q = $("#search_input").val();
//     $("#reloadOutStanding").load('show');
//     $.ajax({
// 		url: '<?=$main_url;?>/inc/temp/outStandingNewSearch_temp.php',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: {q: q},
// 	})
//     .done(function(response) {
//         if(q!="")
//         {
//             $("#search_input").val(q);
//         }
      
//         $("#reloadOutStanding").load('hide');
//         $("#tbOutstanding tbody").html(response.list);
//         $("#append_head").html(response.header);
//         $("#tfSumall").html(response.footer);
       
//     })
//     .fail(function() {
// 		// console.log("error");
// 	})
// 	.always(function() {
// 		// console.log("complete");
// 	});
	
// }

var page_level = "";
var page_gametype = "";
var page_id = "";
var page_user_type = "A";

function loadData(gametype,_id,level,user_type = "A",page,now){

    // var rowPerPage = $("#perpage").val();
    if(page == undefined || page == ''){
        page = 1;
    }

    $("#reloadOutStanding").load('show');

    if($(now).attr('name') == 'nextPage' || $(now).attr('name') == 'prevPage'){
        gametype    = $("#tbOutstanding").data('dgametype');
        level       = $("#tbOutstanding").data('dlevel');
    }

    var q = $("#search_input").val();

    $.ajax({
        url: 'inc/temp/outStandingNewSearch_temp.php',
        data: { 

            _token      : $('input[name="_token"]').val(),
            _id         : _id,
            level       : level,
            q           : q,
            gametype    : gametype,
            user        : $('#user').val(),
            pageNum     : $("#tbOutstanding").data('pageNum'),
            btName      : $(now).attr('name'),
            page        : page,
            rowPerPage  : 2000,
            user_type   : user_type
         },
        type: 'POST',
        dataType: 'json',
        success: function (response) {

            if(response.status){

                $("#tbOutstanding tbody").html(response.list);
                $("#tfSumall").html(response.footer);

                $('#headMemberList span#panel span').each(function() {
                    var spanNow = $(this).data('value');
                    if(response.option){
                        if(spanNow >= response.option.level){
                            $(this).remove();
                        }
                    }
                });
                
                if(typeof response.option.gametype_name != "undefined")
                {
                    $("#first_panal").text("").append(response.option.gametype_name);
                }

                $('#headMemberList span#panel').append(response.option.headMemberList);
                $('#search').attr("onclick",response.option.q_fn)


                page_user_type = response.option.usertype;
                if(response.option.usertype == "M")
                {
                    $("#append_head").hide();
                }else{
                    $("#append_head").show();
                }
                
                if(gametype == undefined && _id == undefined && level == undefined){
                    $("#thShowType").text("<?=$lang_ag[1414];?>");
                    $("#tfOutstanding").hide();
                }else{
                    $("#thShowType").text("<?=$lang_ag[1396];?>");
                }

                $('#sum_panal').text("").append(addCommas(response.option.sum));
                $("#reloadOutStanding").load('hide');

                if(gametype !== undefined)  // ถ้าไม่เท่ากับ หน้า  gametype 
                {
                     page_level = response.option._lv;
                     page_gametype = response.option.gametype;
                     page_id = response.option._id;

                    // var pagi_html = loadPagination(response.pagi_data);
                    // $('#pagination').text('');
                    // $('#pagination').html(pagi_html);
                    // $('#pagination').attr("data-activePage",response.pagi_data.active_page);
                    // $('#pagination').show();
                }else{
                    $('#pagination').text('');
                }



            }else{
                $("#tbOutstanding tbody").html(response.list);
                $("#reloadOutStanding").load('hide');
            }
            
        },
        error: function (response) {
            console.log(response);
        }
    });
}


function clickPage(page)
{
    loadData(page_gametype,page_id,page_level,page_user_type,page);
}

function getStepDetail(bet_id){

    $.ajax({
        url: 'winLossMember/stepDetail',
        data: { 
             bet_id : bet_id
         },
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // console.log(response);
            if(response.status){
                $("#tb_stepDetail").html(response.result);
                $("#stepDetail").modal('show');
            }
            $('span.num').digits();
        }
    });
}

function caltotalBill(){


        var sumAllSoccerStake = 0;

        if($("#tbSoccer tbody tr").html != undefined){

            $("#tbSoccer tbody tr").each(function() {

                sumAllSoccerStake += parseFloat(textToNum($(this).find("#soccerStake").text()));

            });

            $("#totalSoccerStake").text(formatNumber(sumAllSoccerStake,2,1));
        }

        var sumAllStepStake = 0;

        if($("#tbStep tbody tr").html != undefined){

            $("#tbStep tbody tr").each(function() {

                sumAllStepStake += parseFloat(textToNum($(this).find("#stepStake").text()));

            });
        
            $("#totalStepStake").text(formatNumber(sumAllStepStake,2,1));
        }

        var sumAllSportStake = 0;

        if($("#tbSport tbody tr").html != undefined){

            $("#tbSport tbody tr").each(function() {

                sumAllSportStake += parseFloat(textToNum($(this).find("#sportStake").text()));

            });
            
            $("#totalSportStake").text(formatNumber(sumAllSportStake,2,1));
        }

        var sumAllGameStake = 0;

        if($("#tbGame tbody tr").html != undefined){

            $("#tbGame tbody tr").each(function() {

                sumAllGameStake += parseFloat(textToNum($(this).find("#gameStake").text()));

            });
            
            $("#totalGameStake").text(formatNumber(sumAllGameStake,2,1));
        }


        var sumAllLotteryStake = 0;

        if($("#tbLottery tbody tr").html != undefined){

            $("#tbLottery tbody tr").each(function() {

                sumAllLotteryStake += parseFloat(textToNum($(this).find("#lotteryStake").text()));

            });
            
            $("#totalLotteryStake").text(formatNumber(sumAllLotteryStake,2,1));
        }

        var sumAllCasinoStake = 0;

        if($("#tbCasino tbody tr").html != undefined){

            $("#tbCasino tbody tr").each(function() {

                sumAllCasinoStake += parseFloat(textToNum($(this).find("#casinoStake").text()));

            });
            
            $("#totalCasinoStake").text(formatNumber(sumAllCasinoStake,2,1));
        }


}

</script></div>