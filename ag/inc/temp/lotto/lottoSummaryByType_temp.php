<?php 
    require('inc_head.php');
?>
<?
$d= $_POST["d"];

if($_POST["d"] == "")
{
    $sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1   order by ok_id desc limit 1";
    $rs=sql_array($sql);
    $d= $rs['ok_date'];
}


$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1 and ok_date='$d'   order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];

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
                   <?=$lang_ag[148];?>                </h4>
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
<?
$ag_level=$_POST["session"]["r_level"];
$r_level=$_POST["session"]["r_level"]+1;
$r_id=$_POST["session"]["r_id"];

$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1 and ok_date='$d'   order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];


$sql="select 
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_agent_id like '%*$r_id*%'    and b_accept=1  ";
$re1=sql_array($sql);

$sql="select 
   sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
  sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_id = '$r_id'    and b_accept=1   ";
  $re2=sql_array($sql);
  
  $sum1=$re1['r1']+$re2['r1'];
  $sum2=$re1['r2']+$re2['r2'];
  $sum3=$sum1+$sum2;
?>                                        

         <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="text-center">                                                    
                                                    <select class="col-sm-12 input-sm" id="opPdate" onchange="set_date(); getLottoTypeData()">
<?
$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1   order by ok_id desc limit 30";
 $re=sql_query($sql);
while($rs=sql_fetch($re)){
?>
 <option<? if($d==$rs['ok_date']){ ?> selected="selected"<? } ?> value="<?=$rs['ok_date'];?>"><?=$rs['ok_date'];?></option>
<? }?>
                                                    </select> 
                                                    
                                                    
  
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?=$lang_ag[208];?></td>
                                                <td class="text-right num" id="sumBuy_sbt"><?=number_format($sum1,2);?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$lang_ag[210];?></td>
                                                <td class="text-right num" id="sumCom_sbt"><?=number_format($sum2,2);?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$lang_ag[212];?></td>
                                                <td class="text-right num" id="total_sbt"><?=number_format($sum3,2);?></td>
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
                                                    <?=$lang_ag[177];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                    <?=$lang_ag[255];?>                                             
                                                </th>
                                                 <th class="text-center">
                                                     <?=$lang_ag[190];?>                                       
                                                </th>
                                                <th class="text-center">
                                                    <?=$lang_ag[191];?>                                          
                                                </th>
                                                <th class="text-center">
                                                    <?=$lang_ag[195];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                    <?=$lang_ag[197];?>                                         
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
                                                        <option value="a"><?=$lang_ag[199];?></option>
                                                        <option value="" selected=""><?=$lang_ag[174];?></option>
                                                    </select>
                                                </th>
                                                <th colspan="4" align="center" id="showuser"><?=$lang_ag[214];?></th>
                                            </tr>

                                             <tr>
                                                <th class="text-center">
                                                    <?=$lang_ag[177];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                     User                                            
                                                </th>
                                                 <th class="text-center">
                                                      <?=$lang_ag[255];?>                                             
                                                </th>
                                                 <th class="text-center">
                                                    
                                                      <?=$lang_ag[190];?>                                                 
                                                </th>
                                                <th class="text-center">
                                                     <?=$lang_ag[191];?>                                                
                                                </th>
                                                <th class="text-center">
                                                     <?=$lang_ag[195];?>                                                
                                                </th>
                                                 <th class="text-center">
                                                      <?=$lang_ag[197];?>                                             
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

    function set_date()
    {
        var d = $('#opPdate').val();
        getMenu('lottoSummaryByType','?d='+d);
    }

    function load_table_lottype(response)
    {
        // *** 
       
        var  html = '';

            for(var i =0; i < response['val'].length; i++)
             {
                html +=  "<tr class='text-center'>"+
                             "<td class='text-center'> "+response['val'][i]['lottype']+" </td>"+
                             "<td class='text-right'>"+response['val'][i]['all_sum']+"</td>"+
                             "<td class='text-right'>"+response['val'][i]['all_r1']+"</td>"+
                             "<td class='text-right'>"+response['val'][i]['all_r2']+"</td>"+
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
                                "<td>"+response["val"][i]['sum']+"</td>"+
                                "<td>"+response["val"][i]['r1']+"</td>"+
                                "<td>"+response["val"][i]['r2']+"</td>"+ 
                                "<td>"+response["val"][i]['r3']+"</td>"+
                                "<td>"+response["val"][i]['total']+"</td>"+    
                        "</tr>";

             }  


         return html;         

    }

    
</script>
