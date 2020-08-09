
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />

        <title>Agent 88point.</title>

        <!-- <meta http-equiv="refresh" content = "10; {{ url('/logout"> -->
        <meta name="description" content="88point" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/font-awesome/4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../assets/fonts/fonts.googleapis.com.css" />
        <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="../assets/css/ace.min.css" />

        <style type="text/css">
            div#buttonHead a {
               color:#4e4e4e;
               text-decoration: none; 
               background-color: none;
            }
            div#buttonHead  a:hover  { 
                color:#337ab7;
            }

            table > thead > tr > th {
                text-align: center !important;
            }

            .cur {
                cursor: pointer;
            }

        </style>

        <!-- java scripts -->
        <script src="../assets/js/jquery.2.1.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $.getUrlParams = function (params){
                var sPageURL = window.location.search.substring(1);
                var sURLVariables = sPageURL.split('&');
                for (var i = 0; i < sURLVariables.length; i++)
                {
                    var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == params)
                    {
                        return sParameterName[1];
                    }
                }
            }
            $.fn.digits = function(){ 
                return this.each(function(){ 
                    
                    if(Number($(this).text().replace(/,/g, "")) < 0){
                        // $(this).addClass('text-danger');
                        $(this).css('color','#cc0000');
                    }
                    $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
                })
            }
            $.fn.load = function(st){ 
                if(st == 'show'){
                    return this.addClass('position-relative').append('<div class="widget-box-overlay"><i class="ace-icon loading-icon fa fa-spinner fa-spin fa-2x white"></i></div>');
                }else if(st == 'hide'){
                    return this.removeClass('position-relative').find('div.widget-box-overlay').remove();
                }
            }
            
        </script>
    </head>

    <body class="no-skin">
        <div class="main-container" id="main-container">
            <div class="main-content">
                <div class="page-content">


<style type="text/css">
    table{
        font-family: verdana,helvetica,arial,sans-serif;
        font-size: 12px;
        color:#292929;
    }
    .table>thead>tr {
        color: #292929;
    }
    tbody tr:hover,tr.alt:hover{
        background: #fff5a3 !important; 
    }

    tbody tr>td:hover,tr>td.alt:hover{
        background: #ffe757 !important;
    }
    .no-skin .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
        padding: 4px;
        vertical-align: middle;
        
    }

    .no-skin .widget-body .table thead tr {
        background: #87b87f;
    }

    .no-skin .table>thead>tr {
        color: #333;
        background: #d4c18a;
    }
    .no-skin .table>thead>tr>th {
        font-weight: 500;
        padding: 5px;
    }

    .no-skin .table-header {
        background-color: #87b87f;
        font-size: 12px;
    }

    .no-skin .table-bordered>thead>tr>th, .table-bordered>thead>tr>td {
        border-bottom-width: 1px;
    }
    .badge-primary {
        background-color: #b68700 !important;
    }
</style>
<div class="table-responsive" id="reloadBetList">
        <table id="tblBetList" class="table table-striped table-bordered table-hover" data-value="t4s3f554n4k4t4j4i5d2c4d2n4j464d494f4r5i5i5c2k2h2d4d4b223g2l4g4b45494n5s56494c2s2c2k5m5c4f4k4t4j4i5d2c4d2n4j464d494f4r5i5i5c2k2h2i484l474e49464h2y2d2z5s554a484h4g4n5h5a2n2a2p4m4g5i4w584c233c2t4h4a4i5j5n5g454b4f205">
        <thead>
            <th>ชื่อผู้ใช้</th>
            <th>Team</th>
            <th>Price</th>
            <th>Stake</th>
            <th>แบ่งหุ้น</th>
        </thead>
        <tbody>
            <td colspan="5"><center><strong>ไม่พบข้อมูล</strong></center></td>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="center"><strong>Total</strong>
                <td align="right"><strong><font id="sumAllBetMoney">0</font></strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    หน้า <span class="badge badge-primary" name="pageNum">0</span> || แสดง <span name="listCount">0</span> แถว                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-prev btn-sm" name="prevPage" disabled="" onclick="searchBetList(this);">
                            <i class="ace-icon fa fa-arrow-left"></i>ก่อนหน้า                        </button>
                        
                        <button type="button" class="btn btn-success btn-next btn-sm" disabled="" name="nextPage" onclick="searchBetList(this);">
                            ถัดไป <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="../assets/js/general.js"></script>
<script type="text/javascript">

    $.fn.digits = function(){ 
        return this.each(function(){ 
            if(Number($(this).text().replace(/,/g, "")) < 0){
                $(this).css('color','#cc0000');
            }
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        })
    }
    $(".digits").digits();

    

    $( document ).ready(function(){
        searchBetList();
    });

    function searchBetList(btnow){

        $('#reloadBetList').load('show');
        $.ajax({
            url: 'readDataBetList.php',
            data: { 

                param       : $("#tblBetList").data('value'),
                pageNum     : $("#tblBetList").data('pageNum'),
                btName      : $(btnow).attr('name')
             },
            type: 'get',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                
                if(response.status){

                    $("#tblBetList tbody").html(response.list);
                    $("#tblBetList").data('pageNum',response.optionPage.page);
                    $('span[name="pageNum"]').text(response.optionPage.page);
                    $('span[name="listCount"]').text(response.optionPage.listCount);
                    
                    if(response.optionPage.listCount == 50){
                        $('button[name="nextPage"]').attr('disabled',false);
                    }else{
                        $('button[name="nextPage"]').attr('disabled',true);
                    }

                    if(response.optionPage.page != 1){
                        $('button[name="prevPage"]').attr('disabled',false);
                    }else{
                        $('button[name="prevPage"]').attr('disabled',true);
                    }

                    var sumAllBetMoney = 0;

                    $("#tblBetList tbody tr").each(function() {

                        sumAllBetMoney += parseFloat(textToNum($(this).find(".bet_money").text()));

                    });
                    
                    $("#sumAllBetMoney").text(formatNumber(sumAllBetMoney,2,1));

                }else{
                    dialogError('data error');
                }
                $('#reloadBetList').load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });

    }
</script>


</div>  
            </div>            
        </div>
    </body>
    <script src="../assets/js/ace-elements.min.js"></script>
    <script src="../assets/js/ace.min.js"></script>
</html>
