<?php require('inc_head.php');?>

<?php 
  $view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
    $_POST['edate']=$view_date;
  }

  $_POST['id'] = ($_POST['id'] == "") ? $_POST['session']['r_id'] : $_POST['id'];
  $_POST['lv'] = ($_POST['lv'] == "") ? $_POST['session']['rlevel'] : $_POST['lv'];
  $ulv = intval($_POST['lv'])+1;

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
      <h4 class="widget-title lighter"><strong> <?=$lang_credit_history[2];?> </strong></h4>
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
                <label class="control-label col-xs-3 col-sm-1 no-padding-right" for="username"><?=$lang_credit_history[3];?> :</label>
                <div class="col-xs-9 col-sm-3">
                  <div class="input-group">
                    <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>                       
                <label class="control-label col-xs-3 col-sm-1 no-padding-right" for="username"><?=$lang_credit_history[4];?> :</label>
                <div class="col-xs-9 col-sm-3">
                  <div class="input-group">
                    <input class="form-control date-picker" id="edate" name="edate" type="text" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2">
                  <button type="button" class="btn btn-primary btn-sm" id="btn_search" onclick="loadCreditHistoryData();">
                  <span class="ace-icon fa fa-search icon-on-right bigger-110"></span><?=$lang_credit_history[5];?></button>

                  <a href="#" onclick="getMenu('credit_history','?id=3&lv=2&up_r_agent_id=*1*3*&sdate=29-07-2019&edate=29-07-2019');" type="button" id="back" class="btn btn-primary btn-sm">กลับ</a>
                </div>
              </div>
            </form>
            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-responsive">
              <table id="tbUserList" class="table table-bordered" style="width: 100%;">
                <thead>
                  <tr>
                    <th colspan="5" id="head_title" style="text-align: left !important; background: #f7f7f7; color: #b68700;"><?=$lang_credit_history[6];?> 2019-04-30 00:00 - 2019-04-30 23:59</th>
                  </tr> 
                  <tr>
                    <th></th>
                    <th>username</th>
                    <th><?=$lang_credit_history[7];?></th>
                    <th><?=$lang_credit_history[8];?></th>
             
                   <th></th>
                  </tr>
                </thead>
                <tbody>
               
                </tbody>
                <tfoot>
                  <tr style="background: #e6e6e6;">
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="center"><?=$lang_credit_history[22];?></td>
                    <td align="center" id="f_quantity"><span> 0 </span></td>
                    <td align="right"></td>
                   
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
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../../assets/js/main.js"></script>

<script type="text/javascript">    
  $(".digits").digits();
  jQuery(function($) {
    //datepicker plugin
    $('.date-picker').datepicker({
      autoclose: true,
      todayHighlight: true,
    }).next().on(ace.click_event, function(){
      $(this).prev().focus();
    });
   

    var parts_d ='<?=$_POST["sdate"]?>'.split(' ');
    var parts_e ='<?=$_POST["edate"]?>'.split(' ');

    $('#sdate').datepicker('setDate', parts_d[0]);
    $('#edate').datepicker('setDate', parts_e[0]);

    loadCreditHistoryData()
  });

  function loadCreditHistoryData(this_page=1)
  {
      $('#pageContent').load('show');

      var _d = $('#sdate').val();
      var _e = $('#edate').val();

      let rowPerPage = 30;
      var serializeFrm = $("#sch_form").serializeArray();
          serializeFrm.push(
            {name: 'id', value: '<?=$_POST["id"];?>'},
            {name: 'ulv', value: '<?=$ulv;?>'},
            {name: 'up_r_agent_id', value: '<?=$_POST["up_r_agent_id"];?>'},
          );

      $.ajax({
         url: 'inc/temp/credit_history_get_data.php',
        type: 'POST',
        dataType: 'json',
        data: serializeFrm,
      })
      .done(function(res) {

        $("#back").attr("onclick",res["back"])
       
        $("#tbUserList thead tr th#head_title").text('').append(res["head"]);
        loadTable(res["data"]);
        var data_size = Object.keys(res["data"]["agent_list"]).length;
        var pagi_html = _loadPagination(rowPerPage,this_page,data_size);
        $('#pagination').text('');
        $('#pagination').html(pagi_html); 
        setRowTable(this_page,rowPerPage)
        $('#pageContent').load('hide');
      }); 
  }

  function loadTable(res)
  {
      let html = "";
      let count_quantity = 0;
      let no = 1;
     $.each(res["agent_list"], function(i, item) {
         count_quantity += parseInt(item["quantity"].length);
         html+= "<tr id='row_"+no+"'>"+
                  "<td align=\"center\">"+no+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+
                    "<a href=\"#\" onclick=\"getMenu('credit_history','?id="+item["r_id"]+"&lv="+item["r_level"]+"&up_r_agent_id="+item["up_r_agent_id"]+"&sdate="+res["date"]["dsearch"]+"&edate="+res["date"]["esearch"]+"');\">"+
                      "<strong>"+item["r_user"]+"</strong>"+
                    "</a>"+
                  "</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["r_name"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\" class='cl' data-cl='"+item["quantity"].length+"'>"
                   +item["quantity"].length+
                  "</td>"+
                   "<td align=\"center\" style=\"vertical-align: middle;\" class='cl' data-cl='"+item["quantity"].length+"'>"+
                      "<a href=\"#\" onclick=\"getMenu('statement_member_detail','?id="+item["r_id"]+"&sdate="+res["date"]["dsearch"]+"&edate="+res["date"]["esearch"]+"');\">"+
                        "<strong> <?=$lang_credit_history[23];?> </strong>"+
                      "</a>"+
                    "</td>"+
                "</tr>";
          no++;      
     });

     if(html=="")
     {
       html+= "<tr>"+
                 "<td align=\"center\" class=\"text-danger\" colspan=\"100%\"> <?=$lang_message[1];?></td>"+
               "</tr>";
       $("#tbUserList tfoot").hide();         
     }

     $("#tbUserList tbody").text('').append(html);
     $("#tbUserList tfoot tr td#f_quantity").text('').append(count_quantity);
     $("#tbUserList tfoot tr td#f_quantity").attr("data-sum",count_quantity);

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
      let data_cl = $("#tbUserList tbody tr#row_"+i+" .cl").attr("data-cl");
      if (data_cl != null) {
        sum_cl_show +=  parseInt(data_cl);   
      }
    }

    let f_count = $("#tbUserList tfoot tr td#f_quantity").attr("data-sum");
    let f_sum = sum_cl_show+"("+f_count+")";

    $("#tbUserList tfoot tr td#f_quantity").text('');
    $("#tbUserList tfoot tr td#f_quantity").append(f_sum);

    $("#pagination .active").removeClass('active');
    $("#pagination #page_"+page+"").addClass('active');
  }

</script>