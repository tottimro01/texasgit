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
              <input type="hidden" name="zone" id="zone" value="<?=$_POST['zone'];?>">
              <div class="form-group">   
                 <div class="col-xs-12 col-sm-2">
                   <input type="text" name="q" id="search_input" placeholder="Search" value="" autocomplete="off">
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
                      <th align="center"><?php echo $lang_ag[241]; ?></th>
                      <th align="center"><?php echo $lang_ag[239]; ?></th>
                      <th align="center"><?php echo $lang_ag[1867]; ?> </th>
                      <th align="center"><?php echo $lang_ag[477]; ?>  </th>
                      <th align="center"><?php echo $lang_ag[1658]; ?></th>
                      <th align="center"><?php echo $lang_ag[429]; ?></th>
                      <th align="center"><?php echo $lang_ag[1675]; ?></th>
                     
                  </tr>
                </thead>
                <tbody>
               
                </tbody>

                <tfoot>
                  
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
         url: 'inc/temp/casinoSummary_get_data.php',
        type: 'POST',
        dataType: 'json',
        data: serializeFrm,
      })
      .done(function(res) {

        $("#tbUserList tbody").text('').append(res["data"]["data_table"]);
        $("#tbUserList tfoot").text('').append(res["data"]["data_footer"]);

        console.log(res["data"]["data_footer"])
        
        $('#pageContent').load('hide');
      }); 
  }


</script>