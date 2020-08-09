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

  @media (max-width: 414px) { 
     select.input-sm
     {
      width: auto!important;
     }
    }
</style>
<div class="row pdTop">
    <div class="col-xs-12">
        <div class="widget-box hidden-boder" id="reloadLottoLaoSBU">
            <div class="widget-header hidden">
                <h4 class="widget-title lighter">
                   <?=$lang_lotLao[14];?>                 </h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="1 ace-icon fa bigger-125 fa-chevron-up"></i>
                    </a>
                </div>ห
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

                        	<div class="col-sm-12 col-md-12 col-xs-12" style="margin-bottom: 5px;">
                                  <label for=""> <?=$lang_lotLao[15];?> : </label>
                                      <select class="input-sm" name="ttype" id="ttype" style="height:30px; width: 150px;" onchange="getRob(this);">
                                           <option value='' ><?=$lang_lotLao[1];?></option>
                                          <?php 
                                              foreach ($lot_zone[$_POST["session"]["AGlang"]]["zone"] as $key => $value) {
                                                ?>
                                                    <option value='<?=$key?>' ><?=$value;?></option>
                                                <?
                                              }
                                           ?>                                                                     
                                      </select>
                                   <div id="rob" style="display: none;">
                                      <label for=""> <?=$lang_lotLao[21];?> : </label>
                                        <select class="input-sm" name="ttype" id="trob" style="height:30px; width: 150px;" onchange="getLottoSetByMember($('#ttype').val(),$(this).val())">
                                         <option value=""> <?=$lang_lotLao[1];?> </option>                                                                       
                                        </select>
                                   </div>
                            </div> 

                            <div class="col-sm-6 col-md-6 col-xs-12">
                                 <div class="widget-box">
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="table-responsive">
                                                <table id="tb_lottoLaoMemberList" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="text-center">
                                                                <select class="col-sm-12 input-sm" id="opPdate" onchange="getLottoSetByMember($('#ttype').val(),$('#trob').val())">
                                                                
                                                                    <option value="2019-03-20">2019-03-20</option>
                                                                    <option value="2019-03-13">2019-03-13</option>
                                                                    <option value="2019-03-06">2019-03-06</option>
                                                                    <option value="2019-02-27">2019-02-27</option>
                                                                    <option value="2019-02-20">2019-02-20</option>
                                                                    <option value="2019-02-13">2019-02-13</option>
                                                                    <option value="2019-02-06">2019-02-06</option>
                                                                    <option value="2019-01-30">2019-01-30</option>
                                                                    <option value="2019-01-23">2019-01-23</option> 
                                                                </select>
                                                            </th>
                                                            <th colspan="5" class="text-center">
                                                                <?=$lang_lotLao[22] ;?>
                                                                <span class="pull-right cur" id="progress">
                                                                    <i class="ace-icon fa fa-refresh"></i>
                                                                </span>
                                                            </th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <th><?=$lang_lotLao[24];?></th>
                                                            <th><?=$lang_lotLao[25];?></th>
                                                            <th><?=$lang_lotLao[26];?></th>
                                                            <th><?=$lang_lotLao[30];?></th>
                                                            <th><?=$lang_lotLao[28];?></th>
                                                            <th><?=$lang_lotLao[29];?></th>
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
                            <div class="col-sm-6 col-md-6 col-xs-12">
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
                                                <table id="tb_lottoLaoDetail" class="table table-striped table-bordered table-hover text-center">
                                                    <thead>
                                                        <tr class="bghead">
                                                            <th colspan="3" align="center">
                                                                <span class="t_name"> <?=$lang_lotLao[23];?> : </span>   
                                                                <select class="txt_back11n  input-sm" id="_view" name="view">
                                                                    <option value="a"><?=$lang_lotLao[31];?></option>
                                                                    <option value="" selected=""><?=$lang_lotLao[1];?></option>
                                                             </select>
                                                            </th>
                                                            <th colspan="4" align="center" id="showuser"><?=$lang_lotLao[22];?></th>
                                                       </tr>
                                                       <tr>
                                                            <th class="text-center"> <?=$lang_lot[4];?>  </th>
                                                            <th class="text-center"> User </th>
                                                            <th class="text-center"> <?=$lang_lotLao[25];?> </th>
                                                            <th class="text-center"> <?=$lang_lotLao[26];?> </th>
                                                            <th class="text-center"> <?=$lang_lotLao[30];?> </th>
                                                            <th class="text-center"> <?=$lang_lotLao[28];?> </th>
                                                            <th class="text-center"> <?=$lang_lotLao[29];?> </th>
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
  function getLottoSetByMember(zone = '' , rob = '')
  {
    var d = $('#opPdate').val();
    $('#reloadLottoLaoSBU').load('show'); 
    $.ajax({  
        url: '<?=$main_url;?>/inc/temp/lotto_lao/lottoLaoSummaryByUser_GetList.php',
        type: 'POST',
        dataType: 'json',
        data: {d: d,zone:zone , rob : rob},
    })
    .done(function(response) {
        var html = loadMemberLise_table(response);
        $('#tb_lottoLaoMemberList tbody').text('');
        $('#tb_lottoLaoMemberList tbody').append(html);
        $('#tb_lottoLaoDetail tbody').text('');
        $('.t_name').text('<?=$lang_lotLao[23];?> :');
        $('#_view').attr("onchange","");
        $('#reloadLottoLaoSBU').load('hide');
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

                "<td class='text-right'>"+response['val'][i]['all_r1']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_r2']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_sum']+"</td>"+

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
                    "<td colspan=\"11\" class=\"text-center text-danger\"><?=$lang_message[1];?></td>"+
                "</tr>";
    }
    
    return html;  
  }

  function active_row(e)
  {
    $('#tb_lottoLaoMemberList tbody > tr').removeClass('info');
     $(e).closest('tr').addClass('info')
  }

  function getLottoDetails(zone,rob,mid,view)
  {
        var d = $('#opPdate').val();
        var pdate = $('#opPdate').val();
        $('#reloadLottoLaoSBU').load('show'); 
        $.ajax({
            url: '<?=$main_url;?>/inc/temp/lotto_lao/lottoLaoSummaryByUser_GetList_details.php',
            type: 'POST',
            dataType: 'json',
            data: {mid: mid , zone:zone ,rob:rob, d:d,view:view},
        })
        .done(function(response) {
        
            var html = load_table_Details(response);
            $('#tb_lottoLaoDetail tbody').text('');
            $('#tb_lottoLaoDetail tbody').append(html);
            $('.t_name').text(response['muser']+' :')

            var rob = ($('#trob').val() != '') ? $('#trob').val() :  "''"; 
            var zone = ($('#ttype').val() != '') ? $('#ttype').val() :  "''"; 
            $('#_view').attr("onchange","getLottoDetails("+zone+","+rob+","+mid+",$(this).val())");
            $('#reloadLottoLaoSBU').load('hide'); 
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
                "<td>"+response["val"][i]['r1']+"</td>"+
                "<td>"+response["val"][i]['r2']+"</td>"+ 
                "<td>"+response["val"][i]['sum']+"</td>"+
                "<td>"+response["val"][i]['r3']+"</td>"+
                "<td>"+response["val"][i]['total']+"</td>"+    
              "</tr>";
    }

    if(response['val'].length == 0){
        html = "<tr>"+
                    "<td colspan=\"11\" class=\"text-center text-danger\"><?=$lang_message[1];?></td>"+
                "</tr>";
    }

    return html;   
  }

  function getRob(e)
  {
      var variableAry = [];
          variableAry['lang_all'] = '<?=$lang_lotLao[1];?>';
          variableAry['rob']  = <?=json_encode($lang_lotrob);?>;
          variableAry['nrob'] = <?=json_encode($lot_zone_nrob);?>;
          variableAry['robmun'] = <?=json_encode($lot_robmun);?>;
          
      var zone = $(e).val();
      checknRob(zone,'',variableAry);

      getLottoSetByMember(zone);
     
  };

</script>
