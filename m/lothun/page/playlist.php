<?
#require('../../../inc/function.php');
/*
$url_file1="../../../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$ok_date=$date_bet[0];
*/
#print_r($date_bet);
if($_GET[lotto_date]==""){
	$view_date=$re_ok[ok_date];
}else{
	$view_date=$_GET[lotto_date];
}
?>

    	<select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)" class="form-control thaisan" style="background-color:goldenrod;color: #6A4806; height:37px; font-size:15px; margin-top:15px">
        <?
			$url_file9="../../../json/lotto_hun/date.json";		
			$d_bet=file_get_contents2($url_file9);
			$k_bet = json_decode2($d_bet, true);
			foreach($k_bet  as $date ){
		?>
        	<option value="main.php?cmd=playlist&lotto_date=<?=$date?>" <? if($date==$view_date){ ?>selected<? } ?>><?=$date?></option>
		<? } ?>
     	</select>
<ul class="nav nav-tabs">
  <li class="active"><button data-toggle="tab" href="#list" class="btn btn-warning btn-block thaisan" type="button">ดูแบบรายบิล</button></li>
  <li><button data-toggle="tab" href="#totallist" class="btn btn-warning btn-block thaisan" type="button">ดูแบบทั้งหมด</button></li>
</ul>

<div class="tab-content">
  <div id="list" class="tab-pane fade in active" style="color:#333333">
    <div class="table-responsive">
      
        

<link href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css?v=001" rel="stylesheet" type="text/css" />
<script src="../dist/js/jquery.dataTables.js?v=001"></script>
<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js?v=001"></script>
<br />


<table class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:#333333; font-size:10px">
        <thead style="background-color:goldenrod; color: #6A4806" class="thaisan">
            <tr>	
                    <th style="white-space:nowrap"><center>วัน-เวลา</center></th>
                    <th style="white-space:nowrap"><center>ยอดซื้อ</center></th>
                    <th style="white-space:nowrap"><center>ส่วนลด</center></th>
                    <th style="white-space:nowrap"><center>ยอดที่ถูก</center></th>
                    <th style="white-space:nowrap"><center>ยอดสุทธิ</center></th>
                </tr>
        </thead>
        
        <tbody>
       <?
	   $sum1=array();
		$sum2=array();
		$sum3=array();
		$sum4=array();

     $sql="select * from bom_tb_lotto_hun_bill where b_date='$view_date' and  m_id='$_SESSION[mid]' and b_total>0   and b_accept=1   order by bill_id desc";
		$re=sql_query($sql);
		while($rs_bill=sql_fetch($re)){
			$sum1[]=-$rs_bill["b_total"];
			$sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
			$sum3[]=$rs_bill["b_bonus"];
			$sum4[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
	   ?>
                <tr onClick="show_detail(<?=$rs_bill["bill_id"];?>);">
                    <td style="white-space:nowrap"><?=$rs_bill["b_datenow"];?></td>
                    <td align="center" style="color:<?=_red(-$rs_bill["b_total"])?>;"><?=number_format(-$rs_bill["b_total"]);?></td>
                    <td align="center" style="color:<?=_red($rs_bill["b_total"]-$rs_bill["b_pay"])?>;"><?=number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);?></td>
                    <td align="center" style="color:<?=_red($rs_bill[b_bonus])?>;"><?= number_format($rs_bill[b_bonus]);?></td>
                    <td align="center" style="color:<?=_red((-$rs_bill["b_pay"])+$rs_bill["b_bonus"])?>;"><?=number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);?></td>
                </tr>
      <? } ?>
      
        </tbody>
        	<tbody>
            	<tr>
                    <td align="center" class="thaisan"><strong>รวม</strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum1))?>;"><strong><?=number_format(@array_sum($sum1));?></strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum2))?>;"><strong><?=number_format(@array_sum($sum2));?></strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum3))?>;"><strong><?=number_format(@array_sum($sum3));?></strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum4))?>;"><strong><?=number_format(@array_sum($sum4));?></strong></td>
                </tr>
            </tbody>
    </table>
        </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <div id="totallist" class="tab-pane fade" style="color:#333333">
        <div class="table-responsive">
        <br />

<table class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:#333333; font-size:10px">
        <thead style="background-color:goldenrod; color: #6A4806" class="thaisan">
            <tr>	
            		<!--<th style="white-space:nowrap"><center>ลำดับ</center></th>-->
                    <th style="white-space:nowrap"><center>วัน-เวลา</center></th>
                    <th style="white-space:nowrap"><center>SET</center></th>
                    <th style="white-space:nowrap"><center>ประเภท</center></th>
                    <th style="white-space:nowrap"><center>เลข</center></th>
                    <th style="white-space:nowrap"><center>จำนวน</center></th>
                    <th style="white-space:nowrap"><center>ส่วนลด</center></th>
                    <th style="white-space:nowrap"><center>ยอดสุทธิ</center></th>
                </tr>
        </thead>
        <?
        $sql="select * from bom_tb_lotto_hun_bill_play where b_date='$view_date' and  m_id='$_SESSION[mid]'   and b_accept=1  order by play_id desc ";
		$re=sql_query($sql);
		$x=1;
		$sum1=array();
		$sum2=array();
		$sum3=array();
		 while($rs_bill=sql_fetch($re)){

$ex_loti = explode("," , $rs_bill["lot_i"]);
  foreach ($ex_loti as &$value) {
    $value = substr($value , 1);
if($value==""){
      continue;
    }
			 $sum1[]=-$rs_bill["b_total"];
			$sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
			$sum3[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
		?>
        <tbody>
                <tr>
               
                    <td style="white-space:nowrap"><?=$rs_bill["play_datenow"];?></td>
                    <td align="center" style="white-space:nowrap">i<?=$value?></td>
                    <td align="center" style="white-space:nowrap"><?=$lot_type["th"][$rs_bill[lot_type]];?></td>
                    <td align="center" style="white-space:nowrap"><?=_dt($rs_bill["play_number"]);?></td>
                    <td align="center" style="color:<?=_red(-$rs_bill["b_total"])?>;"><?=number_format(-$rs_bill["b_total"]);?></td>
                    <td align="center" style="color:<?=_red($rs_bill["b_total"]-$rs_bill["b_pay"])?>;"><?=number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);?></td>
                    <td align="center" style="color:<?=_red((-$rs_bill["b_pay"])+$rs_bill["b_bonus"])?>;"><?=number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);?></td>
                </tr>
        <? $i++; ?>
        <? } } ?> 
        </tbody>
        	<tbody>
            	<tr>
                    <td colspan="4" align="center" class="thaisan"><strong>รวม</strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum1))?>;"><strong><?=number_format(@array_sum($sum1));?></strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum2))?>;"><strong><?=number_format(@array_sum($sum2));?></strong></td>
                    <td align="center" style="color:<?=_red(@array_sum($sum3))?>;"><strong><?=number_format(@array_sum($sum3));?></strong></td>
                </tr>
            </tbody>
        </table>  
        </div>
  </div>
</div>


<div class="modal" id="billdetail" tabindex="-1" role="dialog" aria-labelledby="billdetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-height:80vh; overflow-y:scroll;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:goldenrod">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <input name="txt_bid" type="hidden" class="form-control" id="txt_bid" placeholder="">
                <h4 class="modal-title thaisan" id="billdetailLabel">รายละเอียดบิล</h4>
            </div>
               <div class="modal-body" style="color:#333333">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:#333333; font-size:10px" id="tb_bill_d">
        <thead style="background-color:goldenrod; color: #6A4806" class="thaisan">
            <tr>	
            <th style="white-space:nowrap" data-class="text-center"><center>SET</center></th>
                    <th style="white-space:nowrap" data-class="text-center"><center>ประเภท</center></th>
                    <th style="white-space:nowrap" data-class="text-center"><center>เลข</center></th>
                    <th style="white-space:nowrap" data-class="text-center"><center>ราคา</center></th>
                </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="3" style="text-align:right">รวม:</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
      </div> 
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
/*        "order": [[ 0, "asc" ]]*/
    } );
} );
$(document).ready(function() {
    $('#examples').DataTable( {
/*        "order": [[ 0, "asc" ]]*/
    } );
	
	$("#tb_bill_d").DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": false,
			"ajax": {
            "url": "../inc/_bill_detail.php",
            "data": function ( d ) {
                d.bid = $('#txt_bid').val();
            }
        },
		"autoWidth": true,
		"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                /* Append the grade to the default row class name */
                if ( aData[3] < 0){
                    $('td:eq(3)', nRow).html( "<span style='color:red;'>" + $('td:eq(3)', nRow).html() + "</span>" );
                } else {
                   //set to red
                }
                // do the same for td[2]
                return nRow;
            },
		"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api.column( 3 ).data().reduce( function (a, b) {
				return intVal(a) + intVal(b);
			} ,0);
 
            // Total over this page
            pageTotal = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
				return intVal(a) + intVal(b);
			}, 0 );
 
            // Update footer
			if(pageTotal<0){
				$( api.column( 3 ).footer() ).html("<span style='color:red;'>"+addCommas(pageTotal)+"</span>");
			}else{
				$( api.column( 3 ).footer() ).html(addCommas(pageTotal));
			}
        }
		});
	
	
} );
function show_detail(bid){
	$('#txt_bid').val(bid);
	$('#tb_bill_d').dataTable()._fnAjaxUpdate();
	$("#billdetailLabel").html("รายละเอียดบิล "+bid);
	$("#billdetail").modal('toggle');
}
</script>
<br />

<br />
