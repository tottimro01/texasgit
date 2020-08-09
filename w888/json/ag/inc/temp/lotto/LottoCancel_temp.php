<?php require('inc_head.php'); ?>
<style>
.top-title-style
{
	width: 100%;
	height: 45px;
	line-height: 45px;
	/* background-color: #d4c18a; */
	color: #333;
	text-align: left;
	padding-left: 20px;
}
.title-style
{
	width: 100%;
	/* background-color: #438db9; */
	color: #fff;
	text-align: center;
	padding: 15px 10px;

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
#search
{
	/*background-color: #2e8864!important;
    border-color: #287456;*/
}

#search:hover
{
	/*background-color: #287456!important;
    border-color: #0b5838;*/
}



#search_input
{
	height: 32px;
}

#btl_cancel
{
	float: right;
	margin-top: 6px;
	min-width: 100px;
	
}
.m_table
{
	width: 99.999%;
	margin-bottom: 10px;
	margin-top: 10px;

}
.m_table thead tr
{
	background: #d4c18a;
	text-align: center;
	height: 35px;
    color: #000;
}
.m_table tbody tr
{
	text-align: center;
	height: 26px;
}

.m_table tbody tr:nth-child(even)
{
	background: #fff;
}
.m_table tbody tr:nth-child(odd)
{
	background: #f9f9f9;
}


.m_table tfoot tr
{
	height: 25px;	
	background: #084c74;
    text-align: center;
    color: #fff;
}

.m_table tfoot tr td , .m_table tbody tr td
{
	border: 1px solid #ddd;
	padding-right: 5px;
	padding-left: 5px;
}



.table2-Title
{
		line-height: 40px;
		-webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    position: relative;
    min-height: 38px;
    background: #f7f7f7;
    background-image: -webkit-linear-gradient(top,#fff 0,#eee 100%);
    background-image: -o-linear-gradient(top,#fff 0,#eee 100%);
    background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffeeeeee', GradientType=0);
    /* color: #b68700; */
    border-bottom: 1px solid #DDD;
    padding-left: 12px;
    height: 40px;
    border: 1px solid #CCC;
}
    

@media only screen and (max-width: 750px)
{
	.top-title-style
	{
		display: table;
	}
	
	.m_table
	{
		width: 180%;
	}
}

@media only screen and (max-width: 530px)
{
	.rob_style
	{
		width: 100%;
		display: block;
	}

	#search
	{
		margin-left: 10px;
	}
}

@media only screen and (max-width: 400px)
{
	  
	#btl_cancel
    {
		display: block;
   	 	clear: both;
    	float: initial;
    	margin-bottom: 10px;
    	width: 100%;
    }
}

.cr {
	color: #FF0000;
}

.bb {
  font-weight: bold;
}

A:link, A:visited {
    color: #00f;
    text-decoration: none;
}
A:hover {
    color: #f63;
    text-decoration: none;
}
.m_table  td , .m_table  th
	{
		font-weight: 500;
	}
</style>



 <!-- <div class="row"> -->
 	
	<div class="col-md-12  top-title-style">
		<span class="rob_style">
			<?=$lang_lot[36];?> : 01-04-2019   
		</span>
		  		
				<input type="text" name="q" id="search_input"  placeholder="search"  value="<?=$_GET['q'];?>" autocomplete="off">
				<button type="button" name="search" id="search" class="btn btn-primary btn-sm" id="btnf" onclick="loadData();">
                          <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                           <?=$lang_lot[37];?>                                    
                </button>

                <button type="button" name="search" id="btl_cancel" class="btn btn-danger btn-sm" id="btnf" onclick="$('#form1').submit();">
                
                           <?=$lang_lot[47];?>                                    
                </button>
	</div>


	<div class="col-md-12">
	<div class="table-responsive">	

		<form action="" id="form1" onsubmit="calcel_all(); return false;">
			<input type="hidden" name="ac" value="can">	
	 		<table class="m_table" id="table1">
			 	<thead>
			 		<tr>
			 			<th><?=$lang_lot[48];?></th>
			 			<th><?=$lang_lot[39];?></th>
			 			<th><?=$lang_lot[16];?></th>
			 			<th><?=$lang_lot[25];?></th>
			 			<th><?=$lang_lot[33];?></th>
			 			<th><?=$lang_lot[49];?></th>
			 			<th><?=$lang_lot[17];?></th>
			 			<th><?=$lang_lot[18];?></th>
			 			<th><?=$lang_lot[28];?></th>
			 			<th><?=$lang_lot[50];?></th>
			 			<th><?=$lang_lot[51];?></th>

			 		</tr>
			 	</thead>
			 	<tbody>
			 			
					<tr height="25">
          				<td align="center">4303240</td>
          				<td align="center">01/04/2019 10:20:35</td>
          				<td>aaaa03</td>
          				<td align="center">3โต๊ด</td>
          				<td align="center">111</td>
          				<td align="right">10.00</td>
          				<td align="right">0.00</td>
          				<td align="right">-3.50</td>
          				<td align="right"><span class="cr bb">-3.50</span></td>
          				<td align="center" style="cursor: pointer;">			
							<a href="#" style="color:#d15b47;" onclick="cancel('4303240')"><?=$lang_lot[50];?></a>
						</td>
						<td align="center">
						<input type="checkbox" value="4303240" name="ckpro[]" class="chk_select">
						</td>
          			</tr>

					<tr height="25">
						<td align="center">4303239</td>
						<td align="center">01/04/2019 10:20:35</td>
						<td>aaaa03</td>
						<td align="center">3บน</td>
						<td align="center">111</td>
						<td align="right">10.00</td>
						<td align="right">0.00</td>
						<td align="right">-3.50</td>
						<td align="right"><span class="cr bb">-3.50</span></td>
						<td align="center" style="cursor: pointer;">
							<a href="#" style="color:#d15b47" onclick="cancel('4303239');"><?=$lang_lot[50];?></a>
						</td>
						<td align="center">
							<input type="checkbox" value="4303239" name="ckpro[]" class="chk_select">
						</td>
					</tr>

			 	</tbody>
			 </table>
			</form> 
		</div>	 
	</div>

	<div class="col-md-12">
	


	<div class="table2-Title">
		<?=$lang_lot[19];?> : 01-04-2019 <?=$lang_lot[54];?>
	</div>
	<div class="table-responsive">		
			 <table class="m_table bgtable txt_back11n" id="table2" style="margin-top: 0;">

			 	<thead>
			 		<tr>
			 			<th>No.</th>
			 			<th><?=$lang_lot[48];?></th>
			 			<th><?=$lang_lot[39];?></th>
			 			<th><?=$lang_lot[16];?></th>
			 			<th><?=$lang_lot[25];?></th>
			 			<th><?=$lang_lot[33];?></th>
			 			<th><?=$lang_lot[49];?></th>
			 			<th><?=$lang_lot[17];?></th>
			 			<th><?=$lang_lot[18];?></th>
			 			<th><?=$lang_lot[28];?></th>
			 			<th><?=$lang_lot[52];?></th>
			 			<th><?=$lang_lot[53];?></th>

			 		</tr>
			 	</thead>
			 	<tbody>
			 			
						<tr bgcolor="#ffffff" onmouseover="this.bgColor='#FFFF66'" onmouseout="this.bgColor='#ffffff'" height="25">
							<td align="center">1</td>
							<td align="center">4303227</td>
							<td align="center">26/03/2019 14:48:15</td>
							<td>aaaa03</td>
							<td align="center">3บน</td>
							<td align="center">111</td>
							<td align="right">10.00</td>
							<td align="right">0.00</td>
							<td align="right">-3.50</td>
							<td align="right">
								<span class="cr bb">-3.50</span>
							</td>
							<td align="center">a</td>
							<td align="center">2019-03-26 14:52:47</td>
						</tr>

						<tr bgcolor="#ffffff" onmouseover="this.bgColor='#FFFF66'" onmouseout="this.bgColor='#ffffff'" height="25">
							<td align="center">2</td>
							<td align="center">4303228</td>
							<td align="center">26/03/2019 14:52:10</td>
							<td>aaaa03</td>
							<td align="center">3บน</td>
							<td align="center">123</td>
							<td align="right">50.00</td>
							<td align="right">0.00</td>
							<td align="right">-17.50</td>
							<td align="right">
								<span class="cr bb">-17.50</span>
							</td>
							<td align="center">a</td>
							<td align="center">2019-03-26 14:52:47</td>
						</tr>

						<tr bgcolor="#ffffff" onmouseover="this.bgColor='#FFFF66'" onmouseout="this.bgColor='#ffffff'" height="25">
							<td align="center">3</td>
							<td align="center">4303229</td>
							<td align="center">26/03/2019 14:52:32</td>
							<td>aaaa03</td>
							<td align="center">2บน</td>
							<td align="center">50</td>
							<td align="right">111.10</td>
							<td align="right">0.00</td>
							<td align="right">-31.11</td>
							<td align="right">
								<span class="cr bb">-31.11</span>
							</td>
							<td align="center">a</td>
							<td align="center">2019-03-26 14:52:47</td>
						</tr>
			 	</tbody>
			</table>
		</div>	
	</div>

 <!-- </div> -->

 <script>
 	

function calcel_all()
{
	if(confirm('<?=$lang_message[10];?>'))
	{
		var data = $( "#form1" ).serializeArray();
		$.ajax({
			url: '<?=$main_url;?>/inc/temp/lotto/LottoCancel_submit.php',
			type: 'POST',
			dataType: 'json',
			data: data, 
		})
		.done(function(res) {
			if(res["status"] == true)
			{
				$.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+res.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
			}else{
				$.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+res.msg+'</h5>',
                    class_name: 'gritter-error'
                });
			} 

			loadData();
		});
		
	}
}



function cancel(pid)
{
	if(confirm('<?=$lang_message[10];?>'))
	{
		$.ajax({
			url: '<?=$main_url;?>/inc/temp/lotto/LottoCancel_submit.php',
			type: 'POST',
			dataType: 'json',
			data: {pid: pid , ac :"can_single"},
		})
		.done(function(res) {
			if(res["status"] == true)
			{
				$.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+res.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
			}else{
				$.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+res.msg+'</h5>',
                    class_name: 'gritter-error'
                });
			}

			loadData();
		});
		
	}
}


loadData();

function loadData()
{
	var q = $("#search_input").val();
	$('#pageContent').load('show');	
	$.ajax({
		url: '<?=$main_url;?>/inc/temp/lotto/LottoCancel_get_data.php',
		type: 'POST',
		dataType: 'json',
		data: {q: q},
	})
	.done(function(res) {

		if(q!=""){
			$("#search_input").val(q);
		}

		var l1 =  res["calcel_list"].length;
		var html1 = "";
		for(var i = 0; i< l1; i++)
		{
			html1 += "<tr height=\"25\">"+
						"<td align=\"center\">"+res["calcel_list"][i]["play_id"]+"</td>"+
						"<td align=\"center\">"+res["calcel_list"][i]["play_timestam"]+"</td>"+
						"<td>"+ res["calcel_list"][i]["m_user"]+"</td>"+
						"<td align=\"center\">"+res["calcel_list"][i]["lot_type"]+"</td>"+
						"<td align=\"center\">"+res["calcel_list"][i]["play_number"]+"</td>"+
						"<td align=\"right\">"+res["calcel_list"][i]["b_total"]+"</td>"+
						"<td align=\"right\">"+res["calcel_list"][i]["sum10a"]+"</td>"+
						"<td align=\"right\">"+res["calcel_list"][i]["sum11a"]+"</td>"+
						"<td align=\"right\">"+res["calcel_list"][i]["xm_sum3"]+"</td>"+
						"<td align=\"center\" style=\"cursor: pointer;\">"+	
						"<a href=\"#\" style=\"color:#d15b47;\" onclick=\"cancel('"+res["calcel_list"][i]["play_id"]+"')\"><?=$lang_lot[50];?></a>"+
					"</td>"+
					"<td align=\"center\">"+
					"<input type=\"checkbox\" value=\""+res["calcel_list"][i]["play_id"]+"\" name=\"ckpro[]\" class=\"chk_select\">"+
					"</td>"+
					"</tr>";

		}

		$("#table1 tbody").text('');
		$("#table1 tbody").html(html1);


		var l2 =  res["calceled_list"].length;
		var html2 = "";
		for(var i = 0; i< l2; i++)
		{
			html2 += "<tr bgcolor=\"#ffffff\" onmouseover=\"this.bgColor='#FFFF66'\" onmouseout=\"this.bgColor='#ffffff'\" height=\"25\">"+
						"<td align=\"center\">"+(i+1)+"</td>"+
						"<td align=\"center\">"+res["calceled_list"][i]["play_id"]+"</td>"+
						"<td align=\"center\">"+res["calceled_list"][i]["play_timestam"]+"</td>"+
						"<td>"+res["calceled_list"][i]["m_user"]+"</td>"+
						"<td align=\"center\">"+res["calceled_list"][i]["lot_type"]+"</td>"+
						"<td align=\"center\">"+res["calceled_list"][i]["play_number"]+"</td>"+
						"<td align=\"right\">"+res["calceled_list"][i]["b_total"]+"</td>"+
						"<td align=\"right\">"+res["calceled_list"][i]["sum10a"]+"</td>"+
						"<td align=\"right\">"+res["calceled_list"][i]["sum11a"]+"</td>"+
						"<td align=\"right\">"+res["calceled_list"][i]["xm_sum3"]+"</td>"+
						"<td align=\"center\">"+res["calceled_list"][i]["cancel_by"]+"</td>"+
						"<td align=\"center\">"+res["calceled_list"][i]["cancel_time"]+"</td>"+
					"</tr>";
		}

		$("#table2 tbody").text('');
		$("#table2 tbody").html(html2);

		$('#pageContent').load('hide');
	})
	.fail(function() {
		// console.log("error");
	})
	.always(function() {
		// console.log("complete");
	});
	


}

 </script>



