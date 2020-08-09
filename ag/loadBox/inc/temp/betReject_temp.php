<?php require('inc_head.php'); ?>

<?
$view_date=_bdate();
$d = ($_POST['getVal']['d'] == "") ? $view_date : $_POST['getVal']['d'];
?>

<link rel="stylesheet" href="assets/css/custom/betReject_temp.css">
<div class="row">
    <div class="widget-box hidden-boder" id="reloadBetReject">
        <div class="widget-header hidden">
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload" id="reloadBetReject1">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main ">
                <div class="row">
                    <div class="col-xs-12 ">
                        <form class="form-horizontal" id="mainForm">
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-2">
                                    <div class="input-group">
                                        <input name="view" type="hidden" value="1" />
                                        <input class="form-control date-picker" id="d" name="d" type="text" data-date-format="dd-mm-yyyy"  value="<?=$d;?>" onchange="clearSearch();">
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

                                <div class="col-xs-12 col-sm-1">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchBetReject();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tbBetReject" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[254];?> </th>   
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[189];?> </th>    
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[1895];?> </th>       
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[1406];?> </th>  
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[239];?> </th>    
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[184];?> </th>
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[1896];?> </th>  
                                        <th rowspan='2' class='text-strong'> <?=$lang_ag[180];?> </th> 
                                    </tr>
                                </thead>
                                <tbody id="loadData"> 
                                    <tr>
                                        <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_ag[1];?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div id="pagination"></div>
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?> </button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive" id="tb_stepDetail"></div>

<!-- datepicker -->

<script src="../../assets/js/main.js"></script>
<script type="text/javascript">

    jQuery(function($) {
        var d = new Date();
        strDate = d.getFullYear() + "/" + (d.getMonth()) + "/" + d.getDate();
        var sd = new Date(strDate)

          //datepicker plugin
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            startDate : sd,
            endDate  : d ,
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
    });

    function clearSearch(){
        $('#suser option').remove();
        $('#stype option[value=""]').prop('selected',true);
    }


    function searchBetReject(this_page=1){

        $("#reloadBetReject").load('show');

         var rowPerPage = $("#perpage").val();
             rowPerPage = 1 ;
         var d = $("#d").val();
         var q = $("#SearchUser").val();
         var b = $("#b").val();
         var shop = $("#shop").val();
         var orderby = $("#orderby").val();

        var data = $("#mainForm").serializeArray();
        data.push(
          {name: 'this_page', value: this_page},
          {name: 'rowPerPage', value: rowPerPage},
        );

        $.ajax({
          url: 'rBetReject.php',
          type: 'GET',
          dataType: 'html',
          data: data,
        })
        .done(function(res) {
            $("#loadData").text("").append(res);
            $("#reloadBetReject").load('hide');     
            var pagi_html = loadPagination(pagi_data);
            $('#pagination').text('');
            $('#pagination').html(pagi_html);
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
      searchBetReject(page);
    }

</script>
</div>