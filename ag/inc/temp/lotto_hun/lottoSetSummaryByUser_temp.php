<?php
  require('inc_head.php');
?>

<style>

  .btn-sm, .btn-group-sm>.btn {

    border-width: 4px;

    font-size: 13px;

    padding: 1px 6px;

    line-height: 1.38;

  }

  .btn {

    font-size: 10px;

  }

  #rob
  {
    display: inline-block;
  }
  
  #rob label
  {
    padding-left: 15px;
  }

  select.input-sm
  {
    margin-bottom: 5px;
  }
</style>

<div class="row pdTop">
    <div class="col-xs-12">
        <div class="widget-box hidden-boder" id="reloadLottoSetSBU">
            <div class="widget-header hidden">
                <h4 class="widget-title lighter">
                   <?=$lang_ag[145];?>                 </h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="1 ace-icon fa bigger-125 fa-chevron-up"></i>
                    </a>
                </div>
                <div class="widget-toolbar">
                    <a href="#" data-action="reload">
                        <i class="ace-icon fa fa-refresh"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class=" col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 5px;">
                                  <?php 
                                     $lot_zone = $lot_zone[$_POST["session"]["AGlang"]]["zone"];
                                  ?>
                                  <label for=""> <?=$lang_ag[205];?> : </label>
                                      <select class="input-sm" name="ttype" id="ttype" style="height:30px; width: 150px;" onchange="set_date(); getRob(this); ">
                                           <option value='' ><?=$lang_ag[174];?></option>
                                          <?php foreach ($lot_zone as $key => $value) {
                                             if($key != 1)
                                             {
                                               ?>
                                                  <option value="<?=$key;?>"> <?=$value;?></option>
                                               <?
                                             }  
                                           } ?>                                                                     
                                      </select>
                                   <div id="rob" style="display: none;">
                                      <label for=""> <?=$lang_ag[1388];?> : </label>
                                        <select class="input-sm" name="ttype" id="trob" style="height:30px; width: 150px;" onchange=" set_date(); getLottoSetByMember($('#ttype').val(),$(this).val());">
                                         <option value=""> <?=$lang_ag[174];?> </option>                                                                       
                                        </select>
                                   </div>
                            </div> 

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                 <div class="widget-box">
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="table-responsive">
                                                <table id="tb_lottoSetMemberList" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="text-center">
                                                             <select class="col-sm-12 input-sm" id="opPdate" onchange="getLottoSetByMember($('#ttype').val(),$('#trob').val());">
                                                                </select>                                                                                                                                                                                         
                                                            </th>
                                                            <th colspan="5" class="text-center">
                                                                <?=$lang_ag[214];?>
                                                                <span class="pull-right cur" id="progress">
                                                                    <i class="ace-icon fa fa-refresh"></i>
                                                                </span>
                                                            </th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <th><?=$lang_ag[189];?></th>
                                                            <th><?=$lang_ag[212];?></th>
                                                            <th><?=$lang_ag[190];?></th>
                                                            <th><?=$lang_ag[191];?></th>
                                                            <th><?=$lang_ag[195];?></th>
                                                            <th><?=$lang_ag[197];?></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
 
                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="widget-box" id="reloadUserDetail">
                                    <div class="widget-header hidden">
                                        <h5 class="widget-title bigger lighter">
                                            <i class="ace-icon fa fa-user"></i>
                                            <span id="title_user"></span>
                                        </h5>
                                        <div class="widget-toolbar">
                                            <a href="#" data-action="reload" class="hidden">
                                                <i class="ace-icon fa fa-refresh"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="table-responsive">
                                                <table id="tb_lottoSetDetail" class="table table-striped table-bordered table-hover text-center">
                                                    <thead>
                                                        <tr class="bghead">
                                                            <th colspan="3" align="center">
                                                                <span class="t_name"> <?=$lang_ag[188];?> : </span>   
                                                                <select class="txt_back11n  input-sm" id="_view" name="view"  onchange="getLottoSetByMember($('#ttype').val(),$('#trob').val())">
                                                                    <option value="a"><?=$lang_ag[199];?></option>
                                                                    <option value="" selected=""><?=$lang_ag[174];?></option>
                                                             </select>
                                                            </th>
                                                            <th colspan="4" align="center" id="showuser"><?=$lang_ag[214];?></th>
                                                       </tr>
                                                       <tr>
                                                            <th class="text-center"> <?=$lang_ag[177];?>  </th>
                                                            <th class="text-center"> <?=$lang_ag[1396];?> </th>
                                                            <th class="text-center"> <?=$lang_ag[212];?> </th>
                                                            <th class="text-center"> <?=$lang_ag[190];?> </th>
                                                            <th class="text-center"> <?=$lang_ag[191];?> </th>
                                                            <th class="text-center"> <?=$lang_ag[195];?> </th>
                                                            <th class="text-center"> <?=$lang_ag[197];?> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=$main_url;?>/assets/js/main.js"></script>
<script src="<?=$main_url;?>/assets/js/lotto_fn.js"></script>
<script type="text/javascript">


 getLottoSetByMember();
 set_date();
  function getLottoSetByMember(zone = '' , rob = '')
  {
  	 
    var d = $('#opPdate').val();
    var _view = $('#_view').val(); 	  
       

    $('#reloadLottoSetSBU').load('show'); 
    $.ajax({  
        url: '<?=$main_url;?>/inc/temp/lotto_hun/lottoSetSummaryByUser_GetList.php',
        type: 'POST',
        dataType: 'json',
        data: {d: d,zone:zone , rob : rob, view : _view},
    })
    .done(function(response) {
        var html = loadMemberLise_table(response);
        $('#tb_lottoSetMemberList tbody').text('');
        $('#tb_lottoSetMemberList tbody').append(html);
        $('#tb_lottoSetDetail tbody').text('');
        $('.t_name').text('<?=$lang_ag[188];?> :');
        // $('#_view').attr("onchange","");
        $('#reloadLottoSetSBU').load('hide');

    });
  }  


  function loadMemberLise_table(response)
  {
     var rob = ($('#trob').val() != '') ? $('#trob').val() :  "''"; 
     var zone = ($('#ttype').val() != '') ? $('#ttype').val() :  "''"; 
     var html = "";
    for(var i =0; i < response['val'].length; i++)
    {
            html += "<tr class='text-center'>"+

                "<td class='text-center'> "+response['val'][i]['muser']+" </td>"+

                "<td class='text-right'>"+response['val'][i]['all_sum']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_r1']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_r2']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_r3']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_total']+"</td>"+

                "<td width='5%' class='text-center'>"+

                  "<button type='button' class='btn btn-primary btn-sm' onclick=\"active_row(this); getLottoDetails("+zone+","+rob+",'"+response['val'][i]['mid']+"','');\">"+

                  "<span class='ace-icon fa fa-search icon-on-right bigger-110'></span>"+

                  "</button>"+

                "</td>"+

              "</tr>";
    }

     if(response['val'].length == 0){
        html = "<tr>"+
                    "<td colspan=\"11\" class=\"text-center text-danger\"><?=$lang_ag[1];?></td>"+
                "</tr>";
    }
    
    return html;  
  }

  function active_row(e)
  {
    $('#tb_lottoSetMemberList tbody > tr').removeClass('info');
     $(e).closest('tr').addClass('info')
  }

  function getLottoDetails(zone,rob,mid,view)
  {
        var d = $('#opPdate').val();
        var pdate = $('#opPdate').val();
        var _view = $('#_view').val(); 	

        $('#reloadLottoSetSBU').load('show'); 
        $.ajax({
            url: '<?=$main_url;?>/inc/temp/lotto_hun/lottoSetSummaryByUser_GetList_details.php',
            type: 'POST',
            dataType: 'json',
            data: {mid: mid , zone:zone ,rob:rob, d:d,view:_view},
        })
        .done(function(response) {
        
            var html = load_table_Details(response);
            $('#tb_lottoSetDetail tbody').text('');
            $('#tb_lottoSetDetail tbody').append(html);
            $('.t_name').text(response['muser']+' :')

            var rob = ($('#trob').val() != '') ? $('#trob').val() :  "''"; 
            var zone = ($('#ttype').val() != '') ? $('#ttype').val() :  "''"; 
            $('#_view').attr("onchange","getLottoDetails("+zone+","+rob+","+mid+",$(this).val())");
            $('#reloadLottoSetSBU').load('hide'); 
        });
        
  }

  function load_table_Details(response)
  {
    let html =  '';
    for(var i =0; i < response['val'].length; i++)
    {
        html += "<tr>"+
                "<td>"+response["val"][i]['number']+"</td>"+
                "<td>"+response["val"][i]['user']+"</td>"+ 
                "<td>"+response["val"][i]['sum']+"</td>"+
                "<td>"+response["val"][i]['r1']+"</td>"+
                "<td>"+response["val"][i]['r2']+"</td>"+ 
                "<td>"+response["val"][i]['r3']+"</td>"+
                "<td>"+response["val"][i]['total']+"</td>"+    
              "</tr>";
    }

    if(response['val'].length == 0){
        html = "<tr>"+
                    "<td colspan=\"11\" class=\"text-center text-danger\"><?=$lang_ag[1];?></td>"+
                "</tr>";
    }

    return html;   
  }

  function getRob(e)
  {
      var variableAry = [];
          variableAry['lang_all'] = '<?=$lang_ag[174];?>';
          variableAry['rob']  = <?=json_encode($lang_lotrob);?>;
          variableAry['nrob'] = <?=json_encode($lot_zone_nrob);?>;
          variableAry['robmun'] = <?=json_encode($lot_robmun);?>;
          
      var zone = $(e).val();
      checknRob(zone,'',variableAry);

      getLottoSetByMember(zone);
     
  };



function set_date()
{
  var zone =  $("#ttype").val();
  var rob  =  $("#trob").val();
  var d  =  $("#d").val();
  $.ajax({
    url: '<?=$main_url;?>/inc/temp/lotto_hun/lothun_getDate.php',
    type: 'GET',
    dataType: 'html',
    data: {zone: zone,rob: rob,d: d},
  })
  .done(function(res) {
    console.log("success");
    $("#opPdate").text('').append(res);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}
</script>
