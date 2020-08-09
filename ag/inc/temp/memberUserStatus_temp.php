<?php require('inc_head.php');?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="row">
  <div class="widget-box hidden-boder" id="relodUStatus">
    <div class="widget-header widget-header-blue widget-header-flat hidden">
      <h4 class="widget-title lighter"><strong><?=$lang_ag[84];?></strong></h4>
      <div class="widget-toolbar hidden">
        <a href="#" data-action="reload">
          <i class="ace-icon fa fa-refresh"></i>
        </a>
      </div>
    </div>
   
    <div class="widget-body">
      <div class="widget-main">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <form class="form-horizontal" id="frmSearch" onsubmit="return false;">
              <div class="form-group">
                <label class="control-label col-xs-12 col-sm-1 no-padding-right" for="username"><strong><?=$lang_ag[1396];?>:</strong></label>
                <div class="col-xs-12 col-sm-2">
                  <input type="text" id="username" name="username" value="" class="col-xs-12 col-sm-12" placeholder="username">
                </div>
                <div class="col-xs-12 col-sm-1">
                  <select class="form-control input-sm col-xs-6 col-sm-6" id="fuactive" name="fuactive">
                    <option value="" selected=""><?=$lang_ag[452];?> </option>
                    <option value="1"><?=$lang_ag[454];?></option>
                    <option value="2"><?=$lang_ag[1654];?></option>
                    <option value="3"><?=$lang_ag[1395];?></option>
                  </select>
                </div>

                <div class="col-xs-12 col-sm-1">
                    <select class="form-control input-sm col-xs-6 col-sm-6" id="futype" name="futype">
                        <option value=""><?=$lang_ag[2319];?></option>
                        <option value="M"><?=$lang_ag[189];?></option>
                        <option value="A"><?=$lang_ag[455];?></option>
                    </select>
                </div>

                <div class="col-xs-12 col-sm-2">
                  <select class="form-control input-sm col-xs-6 col-sm-6" id="list_sort" name="list_sort">
                    <option value="1"><?=$lang_ag[456];?></option>
                    <option value="2"><?=$lang_ag[457];?></option>
                    <option value="3"><?=$lang_ag[456];?></option>
                    <option value="4"><?=$lang_ag[457];?></option>
                  </select>
                </div>
                <!-- จำนวนสูงสุดต่อหน้า -->
                <label class="control-label col-xs-6 col-sm-2 col-md-1 no-padding-right"><?=$lang_ag[1170];?> :</label>
                <div class="col-xs-6 col-sm-1 col-md-1 mobile-padding">
                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="perpage" name="perpapge">
                        <? foreach ($lengthMenu as $key => $value) { ?>
                            <option value="<?=$value;?>"><?=$value;?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-2">
                  <button type="button" name="search" id="search" class="btn btn-primary btn-sm btn-search" onclick="getUStatus(this);">
                    <span class="ace-icon fa fa-search icon-on-right bigger-110"></span><?=$lang_ag[236];?>
                  </button>
                </div>
              </div>
            </form>
            <div class="widget-body">
              <div class="widget-main">
                <div class="row">
                  <div class="col-xs-12 widthTable1">
                    <div class="table-responsive">
                      <table id="tb_userstatus" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th rowspan="3" class="center"><?=$lang_ag[238];?> </th>
                            <th rowspan="3" class="center"><?=$lang_ag[1390];?> </th>
                            <th rowspan="3"> <?=$lang_ag[1390];?> </th>
                            <th colspan="12"><center><?=$lang_ag[184];?></center></th>
                          </tr>
                          <tr>
                            <?php foreach ($lang_g["list_open"] as $key => $value) {
                                ?>
                                  <th>
                                    <span class="lbl"> <?=$value;?> </span>
                                  </th>
                                <?
                            } ?>

                         
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <td colspan="100%">
                              <div id="pagination">
                              </div>
                            </td>
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
        <hr>
      </div>
    </div>
  </div>
</div>

<script src="../../assets/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    getUStatus(1,1);
  });

  function ckEdit(id){

    if($('#'+id).is(':checked')) {
      $('.select_'+id).removeAttr('disabled');
      $('.chk_'+id).removeAttr('disabled');
    }else{
      $('.select_'+id).attr('disabled','disabled');
      $('.chk_'+id).attr('disabled','disabled');
    }
  }
  
  function getUStatus(btnow,this_page=1){
    $('#relodUStatus').load('show');
    var table = "";
    $rowPerPage = $("#perpage").val();

    $.ajax({
      url: 'memberUserStatus/search_all.php',
      type: 'POST',
      dataType: 'json',
      data: {
        fuser       : $('input[name="username"]').val(),
        fuactive    : $('select[name="fuactive"] option:selected').val(),
        futype      : $('select[name="futype"] option:selected').val(),
        list_sort   : $('select[name="list_sort"] option:selected').val(),
        thisPage    : this_page,
        rowPerPage  : $rowPerPage,
        pageNum     : $("#tb_userstatus").data('pageNum'),
        btName      : $(btnow).attr('name')
      },
      success: function (response) {
        // console.log(response);
                
        if(response.status){
          var pagi_html = loadPagination(response.pagi_data);
          $('#pagination').text('');
          $('#pagination').html(pagi_html);
          $("#tb_userstatus tbody").html(response.list);
          $("#tb_userstatus thead").html(response.head);
         
        }else{
          dialogError('data error');
        }
        $('#relodUStatus').load('hide');
      },
      error: function (response) {
        console.log(response);
      }
    })      
  }
    
  function clickPage(page){
    getUStatus('',page);
  }

  function genSl(return_value){
    var seY = "";
    var seN = "";

    if(return_value == 'N'){
      seN = "selected";
    }else if(return_value == 'Y'){
      seY = "selected";
    }

    var slOp  = '<option value="N" '+ seN +'> <?=$lang_ag[488];?> </option>'+
                '<option value="Y" '+ seY +'> <?=$lang_ag[491];?> </option>';
    return slOp;
  }


   function setCHK(game,user,id,futype,e){
    var title = game.split('_');
    var confirm = '<h5><?=$lang_ag[494];?></h5>';
    bootbox.dialog({
      size : '',
      message : confirm,
      buttons:            
      {
        "success" :
        {
          "label" : "<?=$lang_ag[178];?>",
          "className" : "btn-sm btn-success",
          "callback": function() {
            $('#relodUStatus').load('show');

            if ($(e).is(':checked')) {
              active = "Y";
            }else{
              active = "N";
            }
            $.ajax({
              url: 'memberUserStatus/save.php',
              type: 'POST',
              dataType: 'json',
              data: {
                _token   : $('input[name=_token]').val(),
                username : user,
                ctype    : game,
                id       : id,
                futype   : futype,
                active   : active,
                cvalue   : $('#'+user+'_'+game).val(),
              },
            })
            .done(function(response) {
              $('#relodUStatus').load('hide');
              if(response.status){
                dialogSuccess(response.msg);
              }else{
                dialogError(response.msg);
              }
            });
          }
        },
        "button" :
        {
          "label" : "<?=$lang_ag[256];?>",
          "className" : "btn-sm",
          "callback": function() {

              if ($(e).is(':checked')) {
                $(e).prop('checked',false);
              }else{
                $(e).prop('checked',true);
              }
          }
        }
      }
    });
  }

  jQuery(function($) {
    getUStatus();
    $( "#fuactive" ).change(function() {
      $("#search").click();
    });
    $( "#futype" ).change(function() {
      $("#search").click();
    });
    $( "#list_sort" ).change(function() {
        $("#search").click();
    });

  })
</script>
