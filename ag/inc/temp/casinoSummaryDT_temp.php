<?php require('inc_head.php');?>

<?php 
  $view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
  }

  $arr_member = array();
  $sql=sql_query("select * from bom_tb_member where r_id = '".$_POST["session"]["r_id"]."' order by m_user asc");
  while($rs=sql_fetch($sql)){
    $arr_member[] = $rs;
  }

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
              <input type="hidden" name="perpapge" id="perpage" value="30">
              <div class="form-group">   
                <label class="col-xs-12 col-sm-1 control-label "><strong><?=$lang_ag[1679];?> : </strong></label>
                                <div class="col-xs-12 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" id="stype" name="stype" onchange="loadCreditHistoryData();">
                                        <option value="">-- <?=$lang_ag[257];?> --</option>
                                        <? foreach ($arr_member as $key => $value) { ?>
                                        <option value="<?=$value["m_id"]?>"><?=$value["m_user"]?></option>
                                      <? } ?>
                                    </select>
                                </div>                        
                <label class="control-label col-xs-3 col-sm-1 no-padding-right" for="username"><?=$lang_ag[1401];?> :</label>
                <div class="col-xs-12 col-sm-3">
                  <div class="input-group">
                    <input class="form-control date-picker" id="sdate" name="sdate" type="text" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>  

                <label class="control-label col-xs-12 col-sm-2 col-md-2 no-padding-right" for="username"><?=$lang_ag[1170];?> :</label>
                <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="perpage" name="rowPerPage">
                        <? foreach ($lengthMenu as $key => $value) { ?>
                            <option value="<?=$value;?>"><?=$value;?></option>
                        <? } ?>
                    </select>
                </div>

                <div class="col-xs-12 col-sm-2">
                  <button type="button" class="btn btn-primary btn-sm btn-search" id="btn_search" onclick="loadCreditHistoryData();">
                  <span class="ace-icon fa fa-search icon-on-right bigger-110"></span><?=$lang_ag[236];?></button>
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
                    <th><?=$lang_ag[1673];?>.</th>
                    <th><?=$lang_ag[1674];?></th>
                    <th><?=$lang_ag[205];?></th>
                    <th><?=$lang_ag[1658];?></th>
                    <th><?=$lang_ag[2079];?></th>
                    <th><?=$lang_ag[1676];?></th>
                    <th><?=$lang_ag[1677];?></th>
                    <th><?=$lang_ag[1986];?></th>
                    <th><?=$lang_ag[1987];?></th>
                    <th><?=$lang_ag[1678];?></th>
                    <th><?=$lang_ag[1988];?></th>
                  </tr>
                </thead>
                <tbody>
               
                </tbody>
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

    loadCreditHistoryData()
  });

  function loadCreditHistoryData(this_page=1)
  {
      $('#pageContent').load('show');

      var _d = $('#sdate').val();
      var _e = $('#edate').val();

      var serializeFrm = $("#sch_form").serializeArray();
       serializeFrm.push(
            {name: 'thisPage', value: this_page}
          );

      $.ajax({
         url: 'inc/temp/casinoSummaryDT_get_data.php',
        type: 'POST',
        dataType: 'json',
        data: serializeFrm,
      })
      .done(function(res) {

        var data_size = Object.keys(res["data"]["agent_list"]).length;
        var pagi_html = loadPagination(res.data.pagi_data);
       
        loadTable(res["data"] , data_size);
        $('#pagination').text('');
        $('#pagination').html(pagi_html); 
        $('#pageContent').load('hide');
      }); 
  }

  function loadTable(res , num_d)
  {
      let html = "";
      let no = 1;
     $.each(res["agent_list"], function(i, item) {
          html+= "<tr id='row_"+no+"'>"+
                  "<td align=\"center\">"+no+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["bet_id"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_type"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_amount"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\" class=\""+item["b_status_color"]+"\">"+item["b_status"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_total"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["play_dis"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_creidt_start"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_creidt_end"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_time_start"]+"</td>"+
                  "<td align=\"center\" style=\"vertical-align: middle;\">"+item["b_time_end"]+"</td>"+
                "</tr>";
          no++;      
     });

     if(num_d==0)
     {
       html+= "<tr>"+
                 "<td align=\"center\" class=\"text-danger\" colspan=\"100%\"> <?=$lang_ag[1];?></td>"+
               "</tr>";        
     }

     $("#tbUserList tbody").text('').append(html);

  }

  function clickPage(page)
  {
          loadCreditHistoryData(page);
  }

  // function _loadPagination(rowPerPage,this_page,num_row)
  // {

  //     let total_page = Math.ceil(num_row/rowPerPage);
  //         var pagi_html = "";
  //         pagi_html  =  "<nav aria-label='Page navigation' id='pagi_nav' data-page='"+this_page+"''>"+
  //                          "<ul class='pagination'>";

  //                       if(total_page > 1)
  //                       {             
  //                         let Previous_page =  (this_page-1);
  //                             Previous_page = (Previous_page < 1) ? 1 : Previous_page;          
  //                         pagi_html  += "<li class='page-item'>"+
  //                                         "<a class='page-link' href='#' aria-label='Previous' onclick=\"setRowTable('"+(Previous_page)+"','"+rowPerPage+"','"+num_row+"');\">"+
  //                                           "<span aria-hidden='true'>&laquo;</span>"+
  //                                           "<span class='sr-only'>Previous</span>"+
  //                                         "</a>"+
  //                                       "</li>";
  //                       } 

  //                        for(let i = 1; i <= total_page; i++)
  //                       {
  //                            let active = (i == this_page) ? "active" : "";
  //                            pagi_html +=  "<li class='page-item "+active+"' id=\"page_"+i+"\"><a class='page-link' href='#' onclick=\"setRowTable('"+i+"','"+rowPerPage+"','"+num_row+"');\">"+i+"</a></li>"; 
  //                       }

  //                       if(total_page > 1)
  //                       {    
                    
  //                         let Next_page =  (this_page+1);
  //                             Next_page = (Next_page > total_page) ? total_page : Next_page;                         
  //                          pagi_html += "<li class='page-item'>"+
  //                                         "<a class='page-link' href='#' aria-label='Next' onclick=\"setRowTable('"+Next_page+"','"+rowPerPage+"','"+num_row+"');\">"+
  //                                           "<span aria-hidden='true'>&raquo;</span>"+
  //                                           "<span class='sr-only'>Next</span>"+
  //                                         "</a>"+
  //                                       "</li>";
                                             
  //                       }  
          
  //     return pagi_html;
  // }

  // function setRowTable(page,rowPerPage , num_d)
  // {
  //   if(num_d>0)
  //    {
  //     let start = parseInt((page-1)*rowPerPage);
  //     let end = parseInt(start)+parseInt(rowPerPage);
  //     $("#tbUserList tbody tr").hide();
  //     let sum_cl_show = 0;
  //     for(var i = start+1; i<=end; i++)
  //     {
  //       $("#tbUserList tbody tr#row_"+i+"").show();
  //       let data_cl = $("#tbUserList tbody tr#row_"+i+" .cl").attr("data-cl");
  //       if (data_cl != null) {
  //         sum_cl_show +=  parseInt(data_cl);   
  //       }
  //     }

  //     let f_count = $("#tbUserList tfoot tr td#f_quantity").attr("data-sum");
  //     let f_sum = sum_cl_show+"("+f_count+")";

  //     $("#tbUserList tfoot tr td#f_quantity").text('');
  //     $("#tbUserList tfoot tr td#f_quantity").append(f_sum);

  //     $("#pagination .active").removeClass('active');
  //     $("#pagination #page_"+page+"").addClass('active');
  //   }
  // }

</script>