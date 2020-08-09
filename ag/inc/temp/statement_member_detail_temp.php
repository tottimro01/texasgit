<?php require('inc_head.php');?>
<?php 
  $view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
    $_POST['edate']=$view_date;
  }

  $_POST['id'] = ($_POST['id'] == "") ? $_POST['session']['r_id'] : $_POST['id'];
 ?>

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
      <h4 class="widget-title lighter"><strong> <?=$lang_ag[112];?> </strong></h4>
      <div class="widget-toolbar hidden">
        <a href="#" data-action="reload">
          <i class="ace-icon fa fa-refresh"></i>
        </a>
      </div>
    </div>

    <div class="widget-body">
      <div class="widget-main padding-xs">
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
                <label class="control-label col-xs-3 col-sm-1 no-padding-right" for="username"><?=$lang_ag[690];?> :</label>
                <div class="col-xs-9 col-sm-3">
                  <div class="input-group">
                    <input class="form-control date-picker" id="edate" name="edate" type="text" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2">
                  <button type="button" class="btn btn-primary btn-sm btn-search" id="btn_search" onclick="loadData();">
                  <span class="ace-icon fa fa-search icon-on-right bigger-110"></span><?=$lang_ag[236];?></button>
                  <a href="#" onclick="getMenu('credit_history','?sdate=<?=$_POST['sdate'];?>&edate=<?=$_POST['edate'];?>')" type="button" class="btn btn-primary btn-sm btn-search"><?=$lang_ag[716];?></a>
                </div>

                 <input type="hidden" name="id" value="<?=$_POST['id'];?>">
              </div>
            </form>
              
            <form class="form-horizontal" id="form1">
              <div class="form-group">                           
              </div>
              <input type="hidden" name="id" value="<?=$_POST['id'];?>">
              <input type="hidden" name="sdate" value="<?=$_POST['sdate'];?>">
              <input type="hidden" name="edate" value="<?=$_POST['edate'];?>">
            </form>
            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-responsive"> 
              <table id="tbUserList" class="table table-bordered">
                <thead>
                  <th colspan="12" style="text-align: left !important; background: #f7f7f7; color: #b68700;" id="head_title">
                  </th>
                  <tr>
                  <th rowspan="2">
                    <strong><?=$lang_ag[705];?></strong>
                  </th>
                  <th rowspan="2">
                    <strong><?=$lang_ag[239];?></strong>
                  </th>
                  <th rowspan="2">
                    <strong><?=$lang_ag[1396];?></strong>
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
                 
                </tbody>
                <tfoot>
                  <tr>
                    <td align="right" colspan="10"><?=$lang_ag[197];?></td>
                    <td id="f_change" align="right"><span>40,000.00</span></td>
                    <td></td>
                  </tr>
                  <tr>
                      
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

<!-- datepicker -->
<!-- <link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script> -->

<script src="../../assets/js/main.js"></script>

<script type="text/javascript">    
  $(".digits").digits();
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
    $('#edate').datepicker('setDate', parts_e[0]);

    loadData();
  });


  function loadData(this_page=1)
  {
    let rowPerPage = 30;
    var serializeFrm = $("#sch_form").serializeArray();
     // serializeFrm.push(
     //    {name: 'this_page', value: this_page},
     //    {name: 'rowPerPage', value: rowPerPage}
     //  );

    $.ajax({
      url: 'inc/temp/statement_member_detail_get_data.php',
      type: 'POST',
      dataType: 'json',
      data: serializeFrm,
    })
    .done(function(res) {

        $("#tbUserList thead tr th#head_title").text('').append(res["head"]);
        
        let html = "";
        let l = res["list"].length;

        // loadTable(res["list"]);
        loadTable(res);
        var data_size = $("#tbUserList tbody tr").length;
        var pagi_html = _loadPagination(rowPerPage,this_page,data_size);

        $("#tbUserList tfoot #f_change").text('').append(res["sum"]);
        $('#pagination').text('');
        $('#pagination').html(pagi_html); 
         setRowTable(this_page,rowPerPage)  
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  function loadTable(res)
  {
     let no = 0
     let html = "";
      $.each(res.list, function(i, item) {

        let user =(item.bap_by_type!=5) ?  res["agents_list"][item.change_by]["r_user"] : res["subagent_list"][item.change_by]["r_user"];
        no++;
        html+= "<tr id='row_"+no+"'>"+
                "<td align=\"center\">"+no+"</td>"+
                "<td align=\"center\">"+item.date+"</td>"+
                "<td align=\"center\">"+res["members_list"][item.mid]["m_user"]+"</td>"+
                "<td align=\"center\">"+item.type+"</td>"+
                "<td align=\"right\"><span>"+item["before_credit"]+"</span></td>"+
                "<td align=\"right\"><span>"+item["before_win_loss"]+"</span></td>"+
                "<td align=\"right\"><span>"+item["before_kang"]+"</span></td>"+
                "<td align=\"right\"><span>"+item["after_credit"]+"</span></td>"+
                "<td align=\"right\"><span>"+item["after_win_loss"]+"</span></td>"+
                "<td align=\"right\"><span>"+item["after_kang"]+"</span></td>"+
                "<td align=\"right\"><span>"+item["change"]+"</span></td>"+
                "<td align=\"center\" id=\"f_change\" style=\"vertical-align: initial;\"><strong>"+user+"</strong></td>"+
              "</tr>";

      });  

       $("#tbUserList tbody").text('').append(html);
  }
  

  function _loadPagination(rowPerPage,this_page,num_row)
  {

      let total_page = Math.ceil(num_row/rowPerPage);
          var pagi_html = "";
          pagi_html  =  "<nav aria-label='Page navigation' id='pagi_nav' data-page='"+this_page+"''>"+
                           "<ul class='pagination'>";

                        if(total_page > 1)
                        {             
                          let Previous_page =  (this_page-1);
                              Previous_page = (Previous_page < 1) ? 1 : Previous_page;          
                          pagi_html  += "<li class='page-item'>"+
                                          "<a class='page-link' href='#' aria-label='Previous' onclick=\"setRowTable('"+(Previous_page)+"','"+rowPerPage+"');\">"+
                                            "<span aria-hidden='true'>&laquo;</span>"+
                                            "<span class='sr-only'>Previous</span>"+
                                          "</a>"+
                                        "</li>";
                        } 

                         for(let i = 1; i <= total_page; i++)
                        {
                             let active = (i == this_page) ? "active" : "";
                             pagi_html +=  "<li class='page-item "+active+"' id=\"page_"+i+"\"><a class='page-link' href='#' onclick=\"setRowTable('"+i+"','"+rowPerPage+"');\">"+i+"</a></li>"; 
                        }

                        if(total_page > 1)
                        {    
                    
                          let Next_page =  (this_page+1);
                              Next_page = (Next_page > total_page) ? total_page : Next_page;                         
                           pagi_html += "<li class='page-item'>"+
                                          "<a class='page-link' href='#' aria-label='Next' onclick=\"setRowTable('"+Next_page+"','"+rowPerPage+"');\">"+
                                            "<span aria-hidden='true'>&raquo;</span>"+
                                            "<span class='sr-only'>Next</span>"+
                                          "</a>"+
                                        "</li>";         
                        }  
          
      return pagi_html;
  }

  function setRowTable(page,rowPerPage)
  {
    let start = parseInt((page-1)*rowPerPage);
    let end = parseInt(start)+parseInt(rowPerPage);
    $("#tbUserList tbody tr").hide();
    let sum_cl_show = 0;
    for(var i = start+1; i<=end; i++)
    {
      $("#tbUserList tbody tr#row_"+i+"").show();
    }

    $("#pagination .active").removeClass('active');
    $("#pagination #page_"+page+"").addClass('active');
  }

</script>