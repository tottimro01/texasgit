<?php require('inc_head.php');?>

<style type="text/css">

    .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus
    {
       border-top: 2px solid #b68600;
    }
    tbody tr>td.tdNoHover:hover{
        background: #fff !important;
       /* padding-top: 10px;
        padding-left: 10px;*/
    }
    tbody tr>td.tdNoHover thead tr:hover{
        background: #8E8E8E !important;
    }
    @media (max-width: 990px) { 
        .form-group label{
          padding-top: 8px;
        }
    }
</style>
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
                        <form class="form-horizontal" id="frmSearchOutstanding">
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-1 control-label" style="width:70px"><strong><?=$lang_outStandingNew[1];?> : </strong></label>
                                <div class="col-xs-6 col-sm-2">
                                    <input type="text" id="search_input" name="q" placeholder="<?=$lang_outStandingNew[1];?>" value="" class="col-xs-12 col-sm-12">
                                    
                                </div>
                                <div class="col-xs-2 col-sm-2">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="loadData();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_outStandingNew[2];?>                                   </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tbOutstanding" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="22" class="cur">
                                            <div class="pull-left" id="headMemberList">
                                                <i class="ace-icon fa fa-users"></i>
                                                <strong><?=$lang_outStandingNew[3];?></strong> &nbsp;&nbsp;&nbsp;
                                                <span class="label label-yellow arrowed-right arrowed-in" onclick="searchDataByType();"><strong><?=$_POST["session"]["r_user"];?></strong></span>
                                            </div>
                                        </th>
                                    </tr>
                                                                    </thead>
                                <tbody><tr><td colspan="10"><center><strong><?=$lang_outStandingNew[4];?></strong></center></td></tr></tbody>
                                <tfoot>
                                    <tr id="tfSumall">
 
                                    </tr>
                                
                                </tfoot>
                            </table>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive" id="tb_stepDetail"></div>
<script type="text/javascript">

loadData();

function loadData()
{
    var q = $("#search_input").val();
    $("#reloadOutStanding").load('show');
    $.ajax({
		url: '<?=$main_url;?>/inc/temp/outStandingNewSearch_temp.php',
		type: 'POST',
		dataType: 'json',
		data: {q: q},
	})
    .done(function(response) {
        if(q!="")
        {
            $("#search_input").val(q);
        }
      
        $("#reloadOutStanding").load('hide');
        $("#tbOutstanding tbody").html(response.list);
        $("#tfSumall").html(response.footer);
       
    })
    .fail(function() {
		// console.log("error");
	})
	.always(function() {
		// console.log("complete");
	});
	
}


function searchDataByType(gametype,member,level,now){


    $("#reloadOutStanding").load('show');

    if($(now).attr('name') == 'nextPage' || $(now).attr('name') == 'prevPage'){
        gametype    = $("#tbOutstanding").data('dgametype');
        level       = $("#tbOutstanding").data('dlevel');
    }

    $.ajax({
        url: 'inc/temp/outStandingNewSearch_temp.php',
        data: { 

            _token      : $('input[name="_token"]').val(),
            member      : member,
            level       : level,
            gametype    : gametype,
            user        : $('#user').val(),
            pageNum     : $("#tbOutstanding").data('pageNum'),
            btName      : $(now).attr('name')
         },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            // console.log(response);
            
            if(response.status){

                $("#tbOutstanding tbody").html(response.list);
                $("#tfSumall").html(response.footer);


                
                $('#headMemberList span').each(function() {
                    var spanNow = $(this).data('value');
                    if(response.option){
                        if(spanNow >= response.option.level){
                            $(this).remove();
                        }
                    }
                });
                if(response.option.suser !=''){
                    $("#headMemberList span:last").after( response.option.headMemberList );
                }

                if(response.option.usertype =='M'){
                    $("#headLevel").hide();
                    $("#tfSumall").hide();
                    caltotalBill();
                }else{
                    $("#headLevel").show();
                    $("#tfSumall").show();
                }

                $("#tbOutstanding").data('dgametype',response.option.gametype);
                $("#tbOutstanding").data('dlevel',response.option.level);

                // page
                if(response.optionPage){

                    $("#tbOutstanding").data('pageNum',response.optionPage.page);
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
                    $("#tfOutstanding").show();
                }else{
                    $("#tfOutstanding").hide();
                }
                // end

                if(gametype == undefined && member == undefined && level == undefined){
                    $("#thShowType").text("ประเภทเกมส์");
                    $("#tfOutstanding").hide();
                }else{
                    $("#thShowType").text("ชื่อผู้ใช้");
                }

                $("#reloadOutStanding").load('hide');

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