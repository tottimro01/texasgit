<?php require('inc_head.php'); ?>

<style>
.top-title-style
{
	width: 100%;
	height: 45px;
	line-height: 45px;
	/* background-color: #ffeba9; */
	color: #333;
	text-align: left;
	padding-left: 20px;
}
.title-style
{
	width: 100%;
	/* background-color: #c5b581; */
	color: #000;
	text-align: center;
	padding: 15px 10px;
	display: inline-block;

}

.date-sl
{
	max-width: 200px;
	display: initial;
}

#forms
{
	text-align: left;
}

.m_table
{
	width: 99.9999%;
	margin-bottom: 10px;
	margin-top: 10px;

}
.m_table thead tr
{
	background: #d4c18a;
	text-align: center;
	height: 35px;
	color: #000;
	font-weight: 500;
}
.m_table tbody tr
{
	text-align: center;
	height: 26px;
}
.m_table  td , .m_table  th
	{
		font-weight: 500;
	}
.m_table tbody tr:nth-child(even)
{
	/* background: #fafafa; */
}
.m_table tbody tr:nth-child(odd)
{
	/* background: #dee3ea; */
}


.m_table tfoot tr
{
	height: 25px;	
	/* background: #084c74; */
    text-align: right;
    color: #000;
}

.m_table tfoot tr td , .m_table tbody tr td
{
	
	border: 1px solid #ddd;
}
.m_table tfoot tr td {
	padding: 4px;
}

/* .m_table tbody tr:nth-child(even):hover , .m_table tbody tr:nth-child(even) td:hover{
    background: #fafafa  !important;
}

.m_table tbody tr:nth-child(odd):hover , .m_table tbody tr:nth-child(odd) td:hover{
    background: #dee3ea  !important;
} */


@media only screen and (max-width: 750px)
{

	.chk_group
	{
		    width: 30%;
   			box-sizing: border-box;
	}

	#search
	{
		display: block;
		float: left;
		margin-top: 10px;
		width: 100%;
	}
	.m_table
	{
		width: 150%;
	}
}

@media only screen and (max-width: 365px)
{

	.chk_group
	{
		    width: 40%;
   			box-sizing: border-box;
	}

}


</style>



 <!-- <div class="row"> -->
 	
	<div class="col-md-12  top-title-style">
		<?=$lang_ag[234];?> :
		

		<select class="txt_back11n form-control sl-width input-sm sl_soccer date-sl" id="date_sl">
     
					<?
$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1   order by ok_id desc limit 30";
 $re=sql_query($sql);
while($rs=sql_fetch($re)){
?>
 <option value="<?=$rs['ok_date'];?>"><?=$rs['ok_date'];?></option>
<? }?>
                </select>

                <span class="fa fa-refresh icon-on-right bigger-110" id="btn_refresh" style="float: right;margin-top: 17px; padding: 0 5px; cursor: pointer;"></span>

	</div>
	<div class="col-md-12  title-style">
		<div class="form-inline pull-left">
			
			 <form onsubmit="return false" enctype="multipart/form-data" method="post" id="forms" name="forms">
					
			 	
			 	<?
			 		foreach ($lot_typeArry as $key => $value) {
			 			?>
			 			
			 					 <label class="inline chk_group">
              					    <input type="checkbox" class="ace" name="x_<?=$key+1;?>" type="checkbox" value="<?=$key+1;?>" checked="checked">
              					    <span class="lbl"> <?=$value;?> </span>
              					</label> &nbsp;
              				
			 			<?
			 		}
			 	?>

				<button type="button" name="search" id="search" class="btn btn-primary btn-sm" id="btnf" onclick="loadData()">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
			 </form>			
              
           </div>
	</div>

	<div class="col-md-12">
		<div class="table-responsive">
	 		<table class="m_table table-bordered table-hover text-center">
			 	<thead>
			 		<tr>
			 			<th><?=$lang_ag[238];?></th>
			 			<th><?=$lang_ag[239];?></th>
			 			<th><?=$lang_ag[205];?></th>
			 			<th><?=$lang_ag[241];?></th>
			 			<th><?=$lang_ag[242];?></th>
			 			<th><?=$lang_ag[243];?></th>
			 			<th><?=$lang_ag[190];?></th>
			 			<th><?=$lang_ag[244];?></th>
			 			<th><?=$lang_ag[246];?></th>
			 			<th><?=$lang_ag[248];?></th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 			<tr>
			 				<td colspan="100%" class="text-danger"> <?=$lang_ag[1];?> </td>
			 			</tr>

			 	</tbody>
			 	<tfoot>
			 			<tr>
			 				<td></td>
			 				<td></td>
			 				<td></td>
			 				<td style="text-align: center;"> <?=$lang_ag[197];?> </td>
			 				<td>0</td>
			 				<td>0</td>
			 				<td>0</td>
			 				<td>0</td>
			 				<td>0</td>
			 				<td>0</td>
			 			</tr>	

			 	</tfoot>
			 	
			 </table>
		</div>
	</div>
 <!-- </div> -->


<script src="../../assets/js/main.js"></script>
<script>
	loadData()
function loadData()
{
	var date = $("#date_sl").val();
	var serializeFrm = $("#forms").serializeArray();
        serializeFrm.push({name: 'date', value: date});

        
        $('#pageContent').load('show'); 
        $.ajax({
        	 url: '<?=$main_url;?>/inc/temp/lotto/ForecastListLotto_get_data.php',
            type: 'POST',
            dataType: 'json',
        	data: serializeFrm,
        })
        .done(function(res) {

        	var html =  "<tr>"+
			 				"<td colspan=\100%\" class=\"text-danger\"> <?=$lang_ag[1];?> </td>"+
			 			"</tr>";
        	
        	$('#m_table').text('');
        	$('#m_table').append(html);
        	$('#pageContent').load('hide'); 
        });
        
}	


</script>
