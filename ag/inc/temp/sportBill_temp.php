<?php require('inc_head.php'); ?>

<?
$view_date=_bdate();
$d = ($_POST['getVal']['d'] == "") ? $view_date : $_POST['getVal']['d'];



if($_POST['getVal']["page"] == "")
{
  $_POST['getVal']["page"] = 1;
}



?>

<link rel="stylesheet" href="assets/css/custom/sportBill_temp.css">
<div class="row">
    <div class="widget-box hidden-boder" id="reloadWinLoseByTeam">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[127];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <!-- <div class="col-xs-12"> -->
                        <!-- <div class="form-group"> -->
                                <form action="" id="mainForm" onsubmit="return false;">
                                <div class="col-xs-12 col-sm-4 col-md-2 mobile-padding">

                                       <!-- <input name="p" type="hidden" value="<?=$_GET[p];?>" /> -->
                                        <!-- <input name="b" type="hidden" value="<?=$_GET[b];?>" /> -->
                                        <!-- <input name="rob" type="hidden" value="<?=$_GET[rob];?>" /> -->
                                        <!-- <input name="mid" type="hidden" value="<?=$_GET[mid];?>" /> -->
                                        <!-- <input name="shop" type="hidden" value="<?=$_GET[shop];?>" /> -->
                                        <input name="view" type="hidden" value="1" />
                                   
                                       <div class="input-group">
                                         <input class="form-control date-picker" value="<?=$d;?>" id="d" name="d" type="text" data-date-format="dd-mm-yyyy" autocomplete="off">
                                         <span class="input-group-addon">
                                           <i class="fa fa-calendar bigger-110"></i>
                                         </span>
                                       </div>

                                        
                                     
                                </div>

                                <?php 
                                 $r_agent_id = $_POST["session"]["r_agent_id"].$_POST["session"]["r_id"]."*";
                                 $lv = intval($_POST["session"]["r_level"])+1;

                                 $sql = "SELECT * FROM `bom_tb_member` WHERE m_agent_id like '%$r_agent_id%' and m_level=$lv ";
                                 $re_agent = sql_query($sql);

                                ?>

                                <!-- <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username">จำนวนสูงสุดต่อหน้า :</label> -->
                                <div class="col-xs-12 col-sm-1 col-md-2 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="mid" name="mid">
                                            <option value=""><?=$lang_ag[1890];?></option>
                                           <? 
                                              foreach($re_agent as $value): 
                                              $slt = ($value['m_id'] == $_POST['getVal']['mid']) ? "selected = '' " : "";   
                                           ?>
                                                  <option value="<?=$value['m_id'];?>" <?=$slt;?> ><?=$value['m_user'];?>[ <?=$value['m_name'];?> ]</option>
                                            <? endforeach; ?>
                                    </select>
                                </div>

                                <!-- <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username">จำนวนสูงสุดต่อหน้า :</label> -->
                                <div class="col-xs-12 col-sm-1 col-md-2 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="b" name="b" value="<?=$_POST['getVal']['d'];?>">
                                            <option value="" selected="selected"><?=$lang_ag[735];?> <?=$lang_ag[174];?></option>
                                            <option value="1"><?=$lang_ag[735];?> <?=$lang_ag[1891];?></option>
                                            <option value="2"><?=$lang_ag[735];?> <?=$lang_ag[469];?></option>
                                    </select>
                                </div>


                                <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="orderby" name="orderby">
                                            <option value="1" <?=($_POST['getVal']['orderby']=="1") ? "selected = '' " : "";?> ><?=$lang_ag[1892];?></option>
                                            <option value="2" <?=($_POST['getVal']['orderby']=="2") ? "selected = '' " : "";?>><?=$lang_ag[1893];?></option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2 mobile-padding">
                                    <input type="text" name="q" id="q" class="col-xs-12 col-sm-12 input-sm " placeholder="<?=$lang_ag[1404];?>..">
                                </div>

                                <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username"><?=$lang_ag[1170];?> :</label>
                                <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="perpage" name="perpapge">


                                            <option value="30" <?=($_POST['getVal']['perpapge']=="30") ? "selected = '' " : "";?> > 30 </option>
                                            <option value="50" <?=($_POST['getVal']['perpapge']=="50") ? "selected = '' " : "";?> > 50 </option>
                                            <option value="100" <?=($_POST['getVal']['perpapge']=="100") ? "selected = '' " : "";?> > 100 </option>
                                            <option value="500" <?=($_POST['getVal']['perpapge']=="500") ? "selected = '' " : "";?> > 500 </option>
                                            <option value="1000" <?=($_POST['getVal']['perpapge']=="1000") ? "selected = '' " : "";?> > 1000 </option>
                                            <option value="2000" <?=($_POST['getVal']['perpapge']=="2000") ? "selected = '' " : "";?> > 2000 </option>
                                            <option value="3000" <?=($_POST['getVal']['perpapge']=="3000") ? "selected = '' " : "";?> > 3000 </option>
                                            <option value="4000" <?=($_POST['getVal']['perpapge']=="4000") ? "selected = '' " : "";?> > 4000 </option>
                                            <option value="5000" <?=($_POST['getVal']['perpapge']=="5000") ? "selected = '' " : "";?> > 5000 </option>
                                    </select> 
                                </div>

                                </form>

                                <div class="col-xs-12 col-sm-4 col-md-12 mobile-padding">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search" onclick="get_data();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" id="filter_more">
                                        <span class="ace-icon fa fa-filter icon-on-right bigger-110"></span>
                                    </button>
                                </div>
                        <!-- </div> -->

                    <!-- </div> -->
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="tbSportBill" class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th><strong><?=$lang_ag[254];?></strong></th>
                                        <th><strong><?=$lang_ag[189];?></strong></th>
                                        <th><strong><?=$lang_ag[1895];?></strong></th>
                                        <th><strong><?=$lang_ag[1406];?></strong></th>
                                        <th><strong><?=$lang_ag[239];?></strong></th>
                                        <th><strong><?=$lang_ag[184];?></strong></th>
                                        <th><strong><?=$lang_ag[1896];?></strong></th>
                                        <th><strong><?=$lang_ag[180];?></strong></th>
                                    </tr>
                                </thead>
                                <tbody id="loadData">   
                                    <tr>
                                        <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_ag[1];?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="3"><strong><?=$lang_ag[197];?></strong></td>
                                    <td class="num text-center" id="sum1"><strong>0.00</strong></td>
                                    <td colspan="2"></td>
                                    <td class="num text-center" id="sum2"><strong>0.00</strong></td>
                                    <td colspan="2"></td>

                                </tr></tfoot>
                            </table>

                            <div id="pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../../assets/js/main.js"></script>
<script type="text/javascript">    
    $(".digits").digits();

    jQuery(function($) {
        var d = new Date();
        strDate = d.getFullYear() + "/" + (d.getMonth()) + "/" + d.getDate();
        var sd = new Date(strDate)

        console.log(sd)

          //datepicker plugin
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            // startDate : sd,
            endDate  : d ,
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
    });


  get_data(<?= $_POST['getVal']["page"];?>);

  function get_data(this_page=1)
  {
    var rowPerPage = $("#perpage").val();
    var d = $("#d").val();
    var q = $("#SearchUser").val();
    var b = $("#b").val();
    var shop = $("#shop").val();
    var orderby = $("#orderby").val();

    // var new_url = "?p=bill&groupP=bill&d="+d+"&b="+b+"&q="+q+"&bmem=1&shop="+shop+"&orderby="+orderby+"";

    // changeUrlParam(new_url);

    var data = $("#mainForm").serializeArray();
        data.push(
          {name: 'this_page', value: this_page},
          {name: 'rowPerPage', value: rowPerPage},
        );

    // let shop = $("#shop").val();
    if(shop == "")
    {
      $("#shop-title").text("ตัวแทน");
    }else{
      $("#shop-title").text("สมาชิก");
    }

    $.ajax({
      url: 'inc/temp/sport_bill/get_bill.php',
      type: 'GET',
      dataType: 'html',
      data: data,
    })
    .done(function(res) {
        $("#loadData").text("").append(res);
        var pagi_html = loadPagination(pagi_data);
        $('#pagination').text('');
        $('#pagination').html(pagi_html);

        // console.log(pagi_data)


    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

    $.ajax({
      url: 'inc/temp/sport_bill/get_bill_total.php',
      type: 'GET',
      dataType: 'json',
      data: data,
    })
    .done(function(res) {
       $("#sum1").text("").append(res.sum1);
       $("#sum2").text("").append(res.sum2);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


  }

  function clickPage(page)
  {
    get_data(page);
  }


  function bill_action(data,msg)
  {

    if(confirm(msg))
    {
      $.ajax({
         url: 'inc/temp/sport_bill/bill_action.php',
         type: 'GET',
         dataType: 'json',
         data: data,
       })
       .done(function(res) {
 

          // alert(res.update.mag)
          if(res.update.status)
          {
            getMenu('sportBill','?d='+res.get.d+'&mid='+res.get.mid+'&b='+res.get.b+'&q='+res.get.q+'&orderby='+res.get.orderby+'&ac='+res.get.ac+'&page='+res.get.page+'&perpapge='+res.get.perpapge+' ');
          }


          


       })
       .fail(function() {
         console.log("error");
       })
       .always(function() {
         console.log("complete");
       });
    }

  }


    function sportBillDetail(matchId,betType){

        $.ajax({
            url: 'sportBillDetail',
            data: { 
                 matchId : matchId
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                $(".trbill .divBill").slideUp();
                $(".trbill").hide();

                $("#div"+response.matchId).html(response.temp);
                $("#tr"+response.matchId).slideDown();
                $("#div"+response.matchId).slideDown();

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function closeTr(now){
        $(now).closest('tr').closest('table').closest('div').slideUp(function(){
            $(now).closest('tr').closest('table').closest('div').closest('tr').hide();
        });
    }
    

</script>
