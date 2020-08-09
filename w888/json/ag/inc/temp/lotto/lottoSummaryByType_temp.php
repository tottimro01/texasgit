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
<div class="row">
    <div>
        <div class="widget-box no-border" id="reloadSBT">
            <div class="widget-header hidden">
                <h4 class="widget-title bigger lighter">
                   <?=$lang_lot[24];?>                </h4>
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
                            
                            <div class="col-sm-3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="text-center">                                                    
                                                    <select class="col-sm-12 input-sm" id="opPdate" onchange="getLottoTypeData()">
                                                    <!-- <select class="col-sm-12 input-sm" id="opPdate" onchange="getLottoTypeData()"> -->
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
                                                <td><?=$lang_lot[26];?></td>
                                                <td class="text-right num" id="sumBuy_sbt">0.00</td>
                                            </tr>
                                            <tr>
                                                <td><?=$lang_lot[27];?></td>
                                                <td class="text-right num" id="sumCom_sbt">0.00</td>
                                            </tr>
                                            <tr>
                                                <td><?=$lang_lot[28];?></td>
                                                <td class="text-right num" id="total_sbt">0.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                               
                            </div>
                            <div class="col-sm-9">

                                <div class="table-responsive">
                                    <table id="tb_lottoType" class="table table-striped table-bordered table-hover text-center">
                                        <thead>
                                             <tr>
                                                <th class="text-center">
                                                    <?=$lang_lot[4];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                     <?=$lang_lot[17];?>                                                
                                                </th>
                                                <th class="text-center">
                                                    <?=$lang_lot[18];?>                                          
                                                </th>
                                                 <th class="text-center">
                                                    <?=$lang_lot[49];?>                                          
                                                </th>
                                                <th class="text-center">
                                                    <?=$lang_lot[20];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                    <?=$lang_lot[21];?>                                         
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
                                                    <span class="t_name"> 3บน : </span>   
                                                    <!-- <select class="txt_back11n  input-sm" id="flag" name="flag"  onchange="getLottoDetailsType()"> -->
                                                    <select class="txt_back11n  input-sm" id="_view" name="view" onchange="">
                                                        <option value="a"><?=$lang_lot[22];?></option>
                                                        <option value="" selected=""><?=$lang_lot[23];?></option>
                                                    </select>
                                                </th>
                                                <th colspan="4" align="center" id="showuser"><?=$lang_lot[29];?></th>
                                            </tr>

                                             <tr>
                                                <th class="text-center">
                                                    <?=$lang_lot[4];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                     User                                            
                                                </th>
                                                 <th class="text-center">
                                                     <?=$lang_lot[17];?>                                                
                                                </th>
                                                <th class="text-center">
                                                     <?=$lang_lot[18];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                     <?=$lang_lot[49];?>                                               
                                                </th>
                                                <th class="text-center">
                                                     <?=$lang_lot[20];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                      <?=$lang_lot[21];?>                                             
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
    function getLottoTypeData()
    {
        var d = $('#opPdate').val();
        
        // ***
        $('#reloadSBT').load('show');  

        $.ajax({
            url: '<?=$main_url;?>/inc/temp/lotto/lottoSummaryByTypeGetLottype.php',
            type: 'POST',
            dataType: 'json',
            data: {
                d: d,
            },
        })
        .done(function(response) {
            var html = load_table_lottype(response);
            $('#tb_lottoType tbody').text('');
            $('#tb_lottoType tbody').append(html);

            // ***
            $('#reloadSBT').load('hide');
            $('#tb_ListByType').hide(); 
            $('#tb_ListByType tbody').text('');
            
        })
        .fail(function() {})
        .always(function() {});
    }


    function load_table_lottype(response)
    {
        // *** 
       
        var  html = '';

            for(var i =0; i < response['val'].length; i++)
             {
                html +=  "<tr class='text-center'>"+
                             "<td class='text-center'> "+response['val'][i]['lottype']+" </td>"+
                             "<td class='text-right'>"+response['val'][i]['all_r1']+"</td>"+
                             "<td class='text-right'>"+response['val'][i]['all_r2']+"</td>"+
                             "<td class='text-right'>"+response['val'][i]['all_sum']+"</td>"+
                             "<td class='text-right'>"+response['val'][i]['all_r3']+"</td>"+
                             "<td class='text-right'>"+response['val'][i]['all_total']+"</td>"+
                             "<td width='5%' class='text-center'>"+
                                 "<button type='button' class='btn btn-primary btn-sm' onclick=\"active_row(this); getLottoDetails('"+response['val'][i]['key']+"','',1);\">"+
                                     "<span class='ace-icon fa fa-search icon-on-right bigger-110'></span>"+
                                 "</button>"+
                            " </td>"+
                         "</tr>";

             } 

             return html;   

               
    }

    // ***
    function active_row(e)
    {
        $('#tb_lottoType tbody > tr').removeClass('info');
        $(e).closest('tr').addClass('info')
    }

    function getLottoDetails(type,view,slug)
    {


        var d = $('#opPdate').val();
        var pdate = $('#opPdate').val();
        $('#tb_ListByType').hide(); 
        if(d != '' && d != undefined){
       
            $('#reloadSBT').load('show');  
            $.ajax({
                url: '<?=$main_url;?>/inc/temp/lotto/lottoSummaryByTypeGet.php',
                type: 'POST',
                dataType: 'json',
                data: {type: type , d:d,view:view},

            })
            .done(function(response) {
                
                var html = load_table_Details(response);
                $('#tb_ListByType tbody').text('');
                $('#tb_ListByType tbody').append(html);
                $('.t_name').text(response['type']+' :')
                $('#_view').attr("onchange","getLottoDetails("+type+",$(this).val()),0");
                $('#reloadSBT').load('hide');  

            });

            // ***
            if(slug == 1){
                goToByScroll("listByType");
            } 
            $('#tb_ListByType').show();

        }else{
            $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> <?=$lang_message[2];?> </h5>', //เลือกวันที่
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


         return html;         

    }

    
</script>
