<?
if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  
  require('../conn.php');
  require('../function.php');
  require('../ag_function.php');
  require('../../lang/ag_lang.php');
  require('../../lang/function_array.php');

$view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
    $_POST['edate']=date("d-m-Y");
  }
?>

<div class="page-content" id="pageContent" style=""><style type="text/css">
    @media (max-width: 990px) { 
        .pdTopButton{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="reloadReport">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_cashReport[2];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div> 
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 widthTable">
                        <form class="form-horizontal" id="frmSearch">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-1 control-label "><strong><?=$lang_ag[205];?> : </strong></label>
                                <div class="col-xs-6 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="stype" name="stype">
                                        <option value="1"><?=$lang_ag[603];?></option>
                                        <option value="2"><?=$lang_ag[601];?></option>
                                    </select>
                                </div> 
                                <div class="col-xs-6 col-sm-2">
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy" value="26-03-2019" >
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 pdTopButton">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchReport(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="table-header">
                            <?=$lang_ag[108];?> " <font color="black"><sapn class="showsdate"></sapn></font> "
                        </div>
                        <div class="table-responsive">
                            <table id="tbReport" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?=$lang_ag[238];?> </th>
                                        <th class="text-center"><?=$lang_ag[310];?></th>
                                        <th class="text-center" id="thWaitChecking"><?=$lang_ag[311];?></th>
                                        <th class="text-center" id="thWaitCredit"><?=$lang_ag[168];?></th>
                                        <th class="text-center"><?=$lang_ag[329];?></th> 
                                        <th class="text-center"><?=$lang_ag[4];?></th>
                                        <th class="text-center"><?=$lang_ag[383];?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td colspan="7"><center><strong> <?=$lang_ag[1];?> </strong></center></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" colspan="4" id="tfSumCredit"><strong><?=$lang_ag[212];?></strong></td>
                                        <td align="center" id="sumAmountw" class="bb">0.00</td>
                                        <td align="center" id="sumAmountf" class="cr bb">0.00</td>
                                        <td align="center" id="sumAmounts" class="cbu bb">0.00</td>
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

<!-- datepicker -->
<!-- <link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/daterangepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script> -->
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

        searchReport();
    });

    function searchReport(btnow){

        $("#reloadReport").load('show');

        

        $.ajax({
            url: 'cashReportList.php',
            data: { 
                stype       : $('select[name="stype"]').val(),
                df       : $('input[name="sdate"]').val()
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                if(response.status){
                    //console.log($('input[name="sdate"]').val());
                    //$(".showsdate").html($('input[name="sdate"]').val());

                    if($('select[name="stype"]').val() == '2'){
                        $("#thWaitChecking").show();
                        //$("#tfWaitChecking").hide();
                        //$("#tfWaitCredit").hide();
                        $("#tfSumCredit").attr("colspan" , "4");
                    }else{
                        $("#thWaitChecking").hide();
                        //$("#tfWaitChecking").show();
                        //$("#tfWaitCredit").show();
                        $("#tfSumCredit").attr("colspan" , "3");
                    }
                    
                    $("#tbReport tbody").html(response.list);
                    $('#sumAmountw').text(response.sumAmountw);
                    $('#sumAmountf').text(response.sumAmountf);
                    $('#sumAmounts').text(response.sumAmounts);
                    $('.showsdate').text(response.sdate);

                }else{
                    dialogError('data error');
                }
                $("#reloadReport").load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function reportDetail(accnumber,ststus){

        $.ajax({
            url: 'cashReportDetail',
            data: { 
                stype       : $('select[name="stype"]').val(),
                sdate       : $('input[name="sdate"]').val(),
                accnumber   : accnumber,
                status      : ststus
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#showModal").html(response.temp);
                $("#reportDetail").modal('show');

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

</script></div>