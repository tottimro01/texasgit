<?php require('inc_head.php');?>
<style type="text/css">
  @media (max-width: 990px) {
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="row">
  <div class="widget-box hidden-boder" id="">
    <div class="widget-header widget-header-blue widget-header-flat hidden">
      <h4 class="widget-title lighter"><strong> <?=$lang_ag[115];?> </strong></h4>
      <div class="widget-toolbar hidden">
        <a href="#" data-action="reload">
          <i class="ace-icon fa fa-refresh"></i>
        </a>
      </div>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <div class="row">
          <div class="col-xs-12 widthTable">
            <form class="form-horizontal" id="sch_form">
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
                <label class="col-xs-4 col-sm-2" role="checkbox" aria-checked="mixed" class="el-checkbox" aria-controls="undefined" style="float: left; margin: 0px 10px;">
                  <span aria-checked="mixed" class="el-checkbox__input is-indeterminate">
                  <span class="el-checkbox__inner"></span>
                  <input type="checkbox" aria-hidden="true" class="el-checkbox__original" value=""></span>
                  <span class="el-checkbox__label"><strong><?=$lang_ag[719];?></strong></span>
                </label>
                <label class="col-xs-4 col-sm-2" role="checkbox" aria-checked="mixed" class="el-checkbox" aria-controls="undefined" style="float: left; margin: 0px 10px;">
                  <span aria-checked="mixed" class="el-checkbox__input is-indeterminate">
                  <span class="el-checkbox__inner"></span>
                  <input type="checkbox" aria-hidden="true" class="el-checkbox__original" value="New Credit"></span>
                  <span class="el-checkbox__label">New Credit</span>
                </label>
                <label class="col-xs-4 col-sm-2" role="checkbox" aria-checked="mixed" class="el-checkbox" aria-controls="undefined" style="float: left; margin: 0px 10px;">
                  <span aria-checked="mixed" class="el-checkbox__input is-indeterminate">
                  <span class="el-checkbox__inner"></span>
                  <input type="checkbox" aria-hidden="true" class="el-checkbox__original" value="Credit"></span>
                  <span class="el-checkbox__label">Credit</span>
                </label>
                <label class="col-xs-5 col-sm-2" role="checkbox" aria-checked="mixed" class="el-checkbox" aria-controls="undefined" style="float: left; margin: 0px 10px;">
                  <span aria-checked="mixed" class="el-checkbox__input is-indeterminate">
                  <span class="el-checkbox__inner"></span>
                  <input type="checkbox" aria-hidden="true" class="el-checkbox__original" value="Full Transfer"></span>
                  <span class="el-checkbox__label">Full Transfer</span>
                </label>
                <label class="col-xs-5 col-sm-2" role="checkbox" aria-checked="mixed" class="el-checkbox" aria-controls="undefined" style="float: left; margin: 0px 10px;">
                  <span aria-checked="mixed" class="el-checkbox__input is-indeterminate">
                  <span class="el-checkbox__inner"></span>
                  <input type="checkbox" aria-hidden="true" class="el-checkbox__original" value="Partial Transfer"></span>
                  <span class="el-checkbox__label">Partial Transfer</span>
                </label>             
                <div class="col-xs-12 col-sm-2">
                  <button type="button" class="btn btn-primary btn-sm" id="btn_search" onclick="getData();">
                  <span class="ace-icon fa fa-search icon-on-right bigger-110"></span><?=$lang_ag[236];?></button>
                </div>
              </div>
            </form>

            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-responsive">
              <table id="tbUserList" class="table table-bordered" style="width: 850px;">
                <thead>
                  <th colspan="12" style="text-align: left !important; background: #f7f7f7; color: #b68700;">
                    <?=$lang_ag[112];?> OHO <?=$lang_ag[239];?> 2019-04-30 00:00:00 - 2019-04-30 23:59:59
                  </th>
                  <tr>
                  <th rowspan="2">
                    <strong><?=$lang_ag[705];?></strong>
                  </th>
                  <th rowspan="2">
                    <strong><?=$lang_ag[239];?></strong>
                  </th>
                  <th rowspan="2">
                    <strong>username</strong>
                  </th>
                  <th rowspan="2">
                    <strong><?=$lang_ag[205];?></strong>
                  </th>
                    <th colspan="3">
                      <strong><?=$lang_ag[710];?></strong>
                    </th>
                    <th colspan="3">
                      <strong><?=$lang_ag[712];?></strong>
                    </th>
                    <th rowspan="2">
                      <strong><?=$lang_ag[698];?></strong>
                    </th>
                    <th rowspan="2">
                      <strong><?=$lang_ag[714];?></strong>
                    </th>
                  </tr>
                  <tr>
                    <th><?=$lang_ag[423];?></th>
                    <th><?=$lang_ag[214];?></th>
                    <th><?=$lang_ag[715];?></th>
                    <th><?=$lang_ag[423];?></th>
                    <th><?=$lang_ag[214];?></th>
                    <th><?=$lang_ag[715];?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td align="center">2019-04-30 10:51:50</td>
                    <td>OHO</td>
                    <td align="center">New Credit</td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>40,000.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>40,000.00</span></td>
                    <td align="center" style="vertical-align: initial;"><strong>OHO</strong></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td align="center">2019-04-30 10:59:03</td>
                    <td>OHO</td>
                    <td align="center">Credit</td>
                    <td align="right"><span>40,000.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>40,000.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="right"><span>0.00</span></td>
                    <td align="center" style="vertical-align: initial;"><strong>OHO</strong></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td><?=$lang_ag[197];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><span>40,000.00</span></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div id="pagination"></div> 
           
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
    
        // $('.date-picker').datepicker({
    //   autoclose: true,
    //   todayHighlight: true,
    // }).next().on(ace.click_event, function(){
    //   $(this).prev().focus();
    // });
    // $(".date-picker").datepicker("setDate", new Date());


    $( ".date-picker" ).datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    })
    $( ".date-picker" ).datepicker('setDate', "0");
    $( ".date-picker" ).datepicker('setEndDate', "0");

    getData();
  });


  function getData(this_page=1){
    let rowPerPage = 1;
    var serializeFrm = $("#sch_form").serializeArray();
    serializeFrm.push(
      {name: 'this_page', value: this_page},
      {name: 'rowPerPage', value: rowPerPage}
    );
    $.ajax({
      url: 'inc/temp/statement_daily_get_data.php',
      type: 'POST',
      dataType: 'json',
      data: serializeFrm,
    })
    .done(function(response) {
      $("#tbUserList thead tr th#head_title").text('').append(response["head"]);
      $("#tbUserList tfoot tr td#f_quantity").text('').append(response["footers"]["f_quantity"]);
      $("#tbUserList tfoot tr td#f_change").text('').append(response["footers"]["f_change"]);

      let html = "";
        let l = response["list"].length;

        let no = response.pagi_data.rowPerPage*(this_page-1);

        for(let i=0; i<=(l-1); i++)
        {
          no++;
          html += "<tr>"+
                "<td>"+no+"</td>"+
                "<td class='text-center'>"+response["list"][i]["time"]+"</td>"+
                "<td>"+response['list'][i]['user']+"</td>"+
                "<td class='text-center'>"+response['list'][i]['category']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['credit_before']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['lose_before']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['stale_before']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['credit_after']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['lose_after']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['stale_after']+"</td>"+
                "<td class='text-right'>"+response['list'][i]['change']+"</td>"+
                "<td class='text-center'>"+response['list'][i]['by']+"</td>"+
              "</tr>";
        }

        $("#tbUserList tbody").text('').append(html);

        var pagi_html = loadPagination(response.pagi_data);
        $('#pagination').text('');
        $('#pagination').html(pagi_html);

    })
  }
  function clickPage(page)
  {
    getData(page);
  }
</script>