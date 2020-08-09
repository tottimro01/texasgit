<?php require('inc_head.php');?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>

<div class="row">
  <div class="widget-box hidden-boder" id="relodUKeep">
    <div class="widget-header widget-header-blue widget-header-flat hidden">
      <h4 class="widget-title lighter"><strong><?=$lang_memberUserKeep[2];?></strong></h4>
      <div class="widget-toolbar hidden">
        <a href="#" data-action="reload">
          <i class="ace-icon fa fa-refresh"></i>
        </a>
      </div>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <div class="row">
          <div class="col-xs-12">
         
            <form class="form-horizontal" id="frmSearch">
              <div class="form-group">
                <label class="control-label col-xs-12 col-sm-1 no-padding-right" for="username"><strong><?=$lang_memberUserKeep[3];?>:</strong></label>
                <div class="col-xs-12 col-sm-3">
                  <input type="text" id="username" name="username" value="" class="col-xs-12 col-sm-12" placeholder="username">
                </div>
                <div class="col-xs-4 col-sm-2">
                  <select class="form-control input-sm col-xs-6 col-sm-6" id="fuactive" name="fuactive">
                    <option value="" selected=""><?=$lang_memberUserKeep[4];?></option>
                    <option value="1"><?=$lang_memberUserKeep[5];?></option>
                    <option value="0"><?=$lang_memberUserKeep[6];?></option>
                  </select>
                </div>
          
                <div class="col-xs-4 col-sm-2">
                  <select class="form-control input-sm col-xs-6 col-sm-6" id="list_sort" name="list_sort">
                    <option value="1"><?=$lang_memberUserKeep[9];?></option>
                    <option value="2"><?=$lang_memberUserKeep[10];?></option>
                    <option value="3"><?=$lang_memberUserKeep[11];?></option>
                    <option value="4"><?=$lang_memberUserKeep[12];?></option>
                  </select>
                </div>
                <div class="col-xs-4 col-sm-2 xx">
                  <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="getUKeep(this);">
                    <span class="ace-icon fa fa-search icon-on-right bigger-110"></span><?=$lang_memberUserKeep[13];?>
                  </button>
                </div>
              </div>
            </form>
            <div class="widget-box ">
              <div class="widget-body">
                <div class="widget-main no-padding">
                  <div class="table-responsive">
                    <!-- <t>  </t> -->
                    <table id="tb_userkeep" class="table table-striped table-bordered table-hover">
                      <thead>
                       
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <td colspan="14">
                            <div id="pagination"></div>
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
    </div>
  </div>
</div>

<script src="../../assets/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    getUKeep(1,1);
  });

  function genSL(sv,s,set,tag){
    var select = document.getElementById(tag.id);
    if(select.length == 1){
      select.remove(select.selectedIndex);
      var limit = Number(sv) - Number(s);
      // for(var i = limit ; i >= 0; i--){
      for(var i = sv ; i >= s; i--){  
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        if(i == Number(set)){
          opt.defaultSelected  = true;
        }
        select.appendChild(opt);
      }
    }
  }

  function ckGames(id){
    if($('#cka_'+id).is(':checked')) {
      $('.ck_'+id).removeAttr('disabled');
      $('.ck_'+id).removeClass('btn-light');
    }else{
      $('.ck_'+id).attr('disabled','disabled');
      $('.ck_'+id).addClass('btn-light');
    }
  }

  function ckEdit(sl_id,id){
    if($('#'+sl_id).is(':checked')) {
      $('.select_'+sl_id).removeAttr('disabled');
      // $('.select_'+sl_id).click();
    }else{
      $('.select_'+sl_id).attr('disabled','disabled');
    }


    if($('#'+sl_id).is(':checked')) {
      $.ajax({
        url: 'inc/temp/memberUserKeep_get_under_share.php',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(res) {

        $.each(res['min_share'], function( index, value ) {            
            let sl_val = $("#"+sl_id+"_setup_"+index+"").val()
            $("#"+sl_id+"_setup_"+index+"").attr('onclick','genSL('+res["max_share"][index]+','+value+','+sl_val+',this)')
        });
        $('.select_'+sl_id).click();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }

  }

  $('#btn_search').on('click',function(e){
    getUKeep(1,1);
  });

    
  function getUKeep(btnow,this_page=1){
    $('#relodUKeep').load('show');
    var table = "";
    $rowPerPage = 30;

    $.ajax({
      url: 'memberUserKeep/search_all.php',
      type: 'POST',
      dataType: 'json',
      data: {
        fuser       : $('input[name="username"]').val(),
        fuactive    : $('select[name="fuactive"] option:selected').val(),
        futype      : $('select[name="futype"] option:selected').val(),
        list_sort   : $('select[name="list_sort"] option:selected').val(),
        thisPage    : this_page,
        rowPerPage  : $rowPerPage,
        pageNum     : $("#tb_userkeep").data('pageNum'),
        btName      : $(btnow).attr('name')
      },
      success: function (response) {
        if(response.status){
          var pagi_html = loadPagination(response.pagi_data);
          $('#pagination').text('');
          $('#pagination').html(pagi_html);
          $("#tb_userkeep tbody").html(response.list);
          $("#tb_userkeep thead").html(response.head);
        }else{
          dialogError('data error');
        }
          $('#relodUKeep').load('hide');
      },
      error: function (response) {
        console.log(response);
      },
    })  
  }

  function clickPage(page){
    getUKeep('',page);
  }

  function setSl(game,user,id,futype){
    var title = game.split('_');
    if(title[0]=='allbet'){ title[0] = 'Cock Fight'; }
    var confirm = '<h5><?=$lang_memberUserKeep[21];?> <strong>'+ title[0] +'</strong> = <strong>'+ $('#'+user+'_'+game).val() +'</strong> ?</h5>';
    bootbox.dialog({
      size : '',
      message : confirm,
      buttons: 
      {
        "success" :
        {
          "label" : "<?=$lang_memberUserKeep[22];?>",
          "className" : "btn-sm btn-success",
          "callback": function() {
            $('#relodUKeep').load('show');
            $.ajax({
              url: 'memberUserKeep/save.php',
              type: 'POST',
              dataType: 'json',
              data: {
                _token   : $('input[name=_token]').val(),
                username : user,
                ctype    : game,
                id       : id,
                futype   : futype,
                cvalue   : $('#'+user+'_'+game).val(),
              },
            })
            .done(function(response) {
              $('#relodUKeep').load('hide');
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
          "label" : "<?=$lang_memberUserKeep[23];?>",
          "className" : "btn-sm"
        }
      }
    });
  }

  function setAllSl(game,value){
    var confirm = '';
    var val     = '';
    var name = '';
    if(game=='allbet_setup'){ name = 'Cock Fight'; }
    if(value == 'min'){
      // confirm = '<h5>Please confirm change percent <strong>'+ game +'</strong> to <strong> 0% </strong> ?</h5>';
      val     = 0;
      confirm = '<h5><?=$lang_memberUserKeep[21];?> <strong>' + name +'</strong> = <strong> <?=$lang_memberUserKeep[24];?> </strong> ?</h5>';
    }else if(value == 'max'){
      // confirm = '<h5>Please confirm change percent <strong>'+ game +'</strong> to <strong> max receive </strong> ?</h5>';
      val     = 100;
      confirm = '<h5><?=$lang_memberUserKeep[21];?> <strong>' + name +'</strong> = <strong> <?=$lang_memberUserKeep[25];?> </strong> ?</h5>';
    }
    bootbox.dialog({
      size : '',
      message : confirm,
      buttons:            
      {
        "success" :
        {
          "label" : "<?=$lang_memberUserKeep[22];?>",
          "className" : "btn-sm btn-success",
          "callback": function() {
            $('#relodUKeep').load('show');
            $.ajax({
              url: 'memberUserKeep/save_min_max.php',
              type: 'POST',
              dataType: 'json',
              data: {
                _token   : $('input[name=_token]').val(),
                username : '',
                utype    : $('select[name=futype]').val(),
                ctype    : game,
                cvalue   : value,
                id   : <?=$_POST["session"]["r_id"];?>,
              },
            })
            .done(function(response) {
              $('#relodUKeep').load('hide');
              if(response.status){
                // alert(response.msg);
                dialogSuccess(response.msg);
                getUKeep(1,1);
              }else{
                dialogError(response.msg);
              }
            });
          }
        },
        "button" :
        {
          "label" : "<?=$lang_memberUserKeep[23];?>",
          "className" : "btn-sm"
        }
      }
    });
  }

  jQuery(function($) {
    getUKeep();
    $( "#fuactive" ).change(function() {
      $("#search").click();
    });
    $( "#futype" ).change(function() {
      $("#search").click();
    });
  })
  
</script>
