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
<div class="row">
  <div>
    <div class="widget-box no-border" id="reloadLaoSBT">
      <div class="widget-header hidden">
        <h4 class="widget-title bigger lighter">ยอดซื้อตามประเภท</h4>
        <div class="widget-toolbar">
          <a href="#" data-action="collapse">
            <i class="1 ace-icon fa bigger-125 fa-chevron-up"></i>
          </a>
        </div>
        <div class="widget-toolbar hidden">
          <a href="#" data-action="reload">
            <i class="ace-icon fa fa-refresh"></i>
          </a>
        </div>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <form class="form-horizontal" method="get">
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
                        <select class="input-sm" name="ttype" id="trob" style="height:30px; width: 150px;" onchange="getLottoTypeData($('#ttype').val(),$(this).val())">
                         <option value=""> <?=$lang_lotLao[1];?> </option>                                                                       
                        </select>
                   </div>
              </div> 

              <div class="col-sm-3 col-xs-12">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th colspan="2" class="text-center">                                                    
                          <select class="col-sm-12 input-sm" id="opPdate" onchange="getLottoTypeData($('#ttype').val(),$('#trob').val())">
                            <option value="2019-03-16">2019-03-16</option>
                            <option value="2019-03-01">2019-03-01</option>
                            <option value="2019-02-16">2019-02-16</option>
                            <option value="2019-02-01">2019-02-01</option>
                            <option value="2019-01-17">2019-01-17</option>
                            <option value="2018-12-30">2018-12-30</option>
                            <option value="2018-12-16">2018-12-16</option>
                            <option value="2018-12-01">2018-12-01</option>
                            <option value="2018-11-16">2018-11-16</option>
                          </select> 
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?=$lang_lotLao[33];?></td>
                        <td class="text-right num" id="sumBuy_sbt">0.00</td>
                      </tr>
                      <tr>
                        <td><?=$lang_lotLao[34];?></td>
                        <td class="text-right num" id="sumCom_sbt">0.00</td>
                      </tr>
                      <tr>
                        <td><?=$lang_lotLao[30];?></td>
                        <td class="text-right num" id="total_sbt">0.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
              </div>
              <div class="col-sm-9 col-xs-12">
                <div class="table-responsive">
                  <table id="tb_lottoLaoSummaryByType" class="table table-striped table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <?=$lang_lotLao[4];?>                                                
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[25];?>                                                
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[26];?>                                               
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[30];?>                                              
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[28];?>                                               
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[29];?>                                            
                        </th>
                        <th class="text-center">
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive" id="listByType">
                  <table id="tb_ListByType" class="table table-striped table-bordered table-hover text-center" style="display: none;">
                    <thead>
                      <tr class="bghead">
                        <th colspan="3" align="center">
                          <span class="t_name"> <!-- 3บน --> : </span>   
                          <select class="txt_back11n  input-sm" id="_view" name="_view">
                            <option value="a"><?=$lang_lotLao[31];?></option>
                            <option value="" selected=""><?=$lang_lotLao[1];?></option>
                          </select>
                        </th>
                        <th colspan="4" align="center" id="showuser"><?=$lang_lotLao[22];?></th>
                      </tr>
                      <tr>
                        <th class="text-center">
                          <?=$lang_lotLao[4];?>                                                
                        </th>
                        <th class="text-center">
                          User                                            
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[25];?>                                                
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[26];?>                                               
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[30];?>                                              
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[28];?>                                               
                        </th>
                        <th class="text-center">
                          <?=$lang_lotLao[29];?>                                            
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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
  getLottoTypeData();

  function getLottoTypeData(zone = '' , rob = '')

  {

    var d = $('#opPdate').val();
    $('#reloadLaoSBT').load('show');  
    $.ajax({

      url: '<?=$main_url;?>/inc/temp/lotto_lao/lottoLaoSummaryByTypeGetLottype.php',

      type: 'POST',

      dataType: 'json',

      data: {d: d,zone:zone , rob : rob},

    })

    .done(function(response) {

      var html = load_table_lottype(response);

      $('#tb_lottoLaoSummaryByType tbody').text('');

      $('#tb_lottoLaoSummaryByType tbody').append(html);
      $('#reloadLaoSBT').load('hide');

      $('#tb_ListByType').hide(); 
      $('#tb_ListByType tbody').text('');

    })

    .fail(function() {})

    .always(function() {});  

  }

 function load_table_lottype(response)

  {
    var rob = ($('#trob').val() != '') ? $('#trob').val() :  "''"; 
    var zone = ($('#ttype').val() != '') ? $('#ttype').val() :  "''"; 

   
    var html = '';
  
    for(var i =0; i < response['val'].length; i++)

    {

      html += "<tr class='text-center'>"+

                "<td class='text-center'> "+response['val'][i]['lottype']+" </td>"+

                "<td class='text-right'>"+response['val'][i]['all_r1']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_r2']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_sum']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_r3']+"</td>"+

                "<td class='text-right'>"+response['val'][i]['all_total']+"</td>"+

                "<td width='5%' class='text-center'>"+

                  "<button type='button' class='btn btn-primary btn-sm' onclick=\"active_row(this); getLottoDetails("+zone+","+rob+",'"+response['val'][i]['key']+"','',1);\">"+

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
    $('#tb_lottoLaoSummaryByType tbody > tr').removeClass('info');
     $(e).closest('tr').addClass('info')
  }

  function getLottoDetails(zone,rob,type,view,slug)
  {
  
    var d = $('#opPdate').val();
    

    var pdate = $('#opPdate').val();

    $('#tb_ListByType').hide(); 

    if(pdate != '' && pdate != undefined){

      $('#reloadLaoSBT').load('show');  

      $.ajax({

        url: '<?=$main_url;?>/inc/temp/lotto_lao/lottoLaoSummaryByTypeGet.php',

        type: 'POST',

        dataType: 'json',

        data: {type: type , zone:zone ,rob:rob, d:d,view:view},

      })

      .done(function(response) {

        var html = load_table_Details(response);

        $('#tb_ListByType tbody').text('');

        $('#tb_ListByType tbody').append(html);

        $('.t_name').text(response['lottype']+' :')


    
        var rob = ($('#trob').val() != '') ? $('#trob').val() :  "''"; 
        var zone = ($('#ttype').val() != '') ? $('#ttype').val() :  "''"; 
        $('#_view').attr("onchange","getLottoDetails("+zone+","+rob+","+type+",$(this).val()),0");


        $('#reloadLaoSBT').load('hide');  

      });

      if(slug == 1){
           goToByScroll("listByType");
      } 
     
      $('#tb_ListByType').show();

    }else{

      $.gritter.add({

        title: "",

        text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> <?=$lang_message[2];?> </h5>',

        class_name: 'gritter-error'

      });

    }  

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

      getLottoTypeData(zone);
     

  };

</script>
