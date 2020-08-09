<?php require('inc_head.php');?>
<style>
.top-title-style
{
	width: 100%;
	height: 45px;
	line-height: 45px;
	/*background-color: #d4c18a;*/
	color: #333;
	text-align: left;
	padding-left: 20px;
	display: block;
}
.title-style
{
	width: 100%;
	background-color: #438db9;
	color: #fff;
	text-align: center;
	padding: 15px 10px;


}

.zoneGroup , .robGroup
{
	min-width: 300px;
	width: 20%;
	display: inline-block;
}

.zoneGroup .text , .robGroup .text
{

	width: 50px;
	float: left;
}

.zoneGroup select , .robGroup select
{	
	    width: calc(100% - 70px);
	    margin-top: 8px;
}

.rob_style
{
	margin-right: 15px;
    display: inline-block;
}

.search_group
{
	margin-right: 15px;
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

.m_table td, .m_table th {
    font-weight: 500;
}
/*.m_table tbody tr:nth-child(even):hover , .m_table tbody tr:nth-child(even) td:hover{
    background: #fafafa  !important;
}

.m_table tbody tr:nth-child(odd):hover , .m_table tbody tr:nth-child(odd) td:hover{
    background: #dee3ea  !important;
}
*/
.table2-Title
{
	/*width: 100%;
    text-align: left;
    padding-left: 15px;
    border-bottom: 1px solid #ffffff70;
    background: #aa944b;
    color: #fff;
    height: 35px;
    */
	line-height: 40px;
    margin-top: 15px;
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
   /* color: #b68700;*/
    color: #333;
    border-bottom: 1px solid #DDD;
    padding-left: 12px;
    height: 40px;
    border: 1px solid #CCC;
}
    

@media (min-width:1141px) and (max-width:1380px)
{
	.zoneGroup, .robGroup {
	   min-width: auto;
	    width: 20%;
	    display: inline-block;
	}

	.zoneGroup select, .robGroup select
	{
		   width: calc(100% - 70px);
	}
}

@media (min-width:751px) and (max-width:1140px)
{
	.zoneGroup, .robGroup {
	   min-width: 200px;
	    width: 20%;
	    display: inline-block;
	}
	.top-title-style
	{
		height: auto;
	}

	.robGroup
	{
		width: 70%;
	}

	.robGroup select {
    	width: calc(100% - 70px);
    	max-width: 200px;
    	margin-top: 8px;
	}
	#btl_cancel
	{
		margin-top: 7px;
	}
	.search_group
	{
		margin-right: 16px;
	}
}

@media (min-width:0px) and (max-width:750px)
{
	.top-title-style {
		    height: auto;
	}
	
	.m_table
	{
		width: 180%;
	}

	.top-title-style
	{
		line-height: 35px;
	}

	/*.zoneGroup, .robGroup {
	   min-width: auto;
	    width: 30%;
	    display: inline-block;
	}*/
}

@media only screen and (max-width: 642px)
{

	#search
	{
		margin-left: 10px;
	}

	.zoneGroup, .robGroup {
	   min-width: auto;
	    width: 48%;
	    display: inline-block;
	}
}

@media only screen and (max-width: 575px)
{
	  
	#btl_cancel
    {
		display: block;
   	 	clear: both;
    	float: initial;
    	margin-bottom: 10px;
    	width: 100%;
    }

    .top-title-style {
    	height: auto;
   		padding-bottom: 10px;
	}
	.zoneGroup, .robGroup
	{
		width: 100%;
	}
	.rob_style
	{
		width: 100%;
	}
	.search_group
	{
		width: 100%;
	}
	#search_input
	{
		width: 70%;
	}
	#search
	{
		float: right;
		margin-top: 7px;
	}
}

@media only screen and (max-width: 326px)
{
	#search_input
	{
		width: 100%;
	}

	#search {
  		float: left;
  		margin-top: 7px;
  		margin: 0;
  		width: 100%;
	}
}



</style>

 <!-- <div class="row"> -->


 	
	<div class="col-md-12  top-title-style">

			
			<div class="zoneGroup">

				<div class="text">
					<?=$lang_ag[205];?> 
				</div>

				<select class="txt_back11n form-control sl-width input-sm sl_soccer l_zone" name="ttype" id="zone" onchange="getRob($(this).val());">
                           <!-- <option value='' ><?=$lang_lotHun[1];?></option> -->
                          <?php 
                              foreach ($lot_zone[$_POST["session"]["AGlang"]]["zone"] as $key => $value) {
                              	if($key==1){ continue; }
                                ?>
                                    <option value='<?=$key?>' ><?=$value;?></option>
                                <?
                              }
                           ?>                                                                     
                </select>
				
			</div>



			<div class="robGroup" id="rob" style="display: none;">

				<div class="text">
					<?=$lang_ag[1388];?> 
				</div>
				<select class="input-sm" name="ttype" id="trob" onchange="loadData();">
                         <option value=""> <?=$lang_ag[174];?> </option>                                                                       
               </select>
				
			</div>

					 
				<div class="rob_style">
					<?=$lang_ag[234];?> : <span id="lot_date"></span> 
				</div>

				<div class="search_group">
					<input type="text" name="q" id="search_input"  placeholder="search" autocomplete="off">
					<button type="button" name="search" id="search" class="btn btn-primary btn-sm" id="btnf" onclick="loadData();">
                	          <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                	           <?=$lang_ag[236];?>                                    
                	</button>
				</div>	

                <button type="button" name="search" id="btl_cancel" class="btn btn-danger btn-sm" id="btnf" onclick="$('#form1').submit();">
                           <?=$lang_ag[253];?>                                    
                </button>
	</div>


	<div class="col-md-12">
	<div class="table-responsive">
		<form action="" id="form1" onsubmit="calcel_all(); return false;">	
			<input type="hidden" name="ac" value="can">	
	 		<table class="m_table bgtable txt_back11n" id="table1">
			 	<thead>
			 		<tr>
			 			<th><?=$lang_ag[205];?></th>
			 			<th><?=$lang_ag[254];?></th>
			 			<th><?=$lang_ag[239];?></th>
			 			<th><?=$lang_ag[189];?></th>
			 			<th><?=$lang_ag[205];?></th>
			 			<th><?=$lang_ag[227];?></th>
			 			<th><?=$lang_ag[255];?></th>
			 			<th><?=$lang_ag[190];?></th>
			 			<th><?=$lang_ag[191];?></th>
			 			<th><?=$lang_ag[212];?></th>
			 			<th><?=$lang_ag[256];?></th>
			 			<th><?=$lang_ag[257];?></th>

			 		</tr>
			 	</thead>
			 	<tbody>
			 			


			 	</tbody>
			 </table>
			</form>
		</div>	 
	</div>

	<div class="col-md-12">
	


	<div class="table2-Title">
		<?=$lang_ag[192];?> : <span id="lot_date_1"></span>  <?=$lang_ag[260];?>
	</div>
	<div class="table-responsive">		
			 <table class="m_table bgtable txt_back11n" style="margin-top: 0;" id="table2">

			 	<thead>
			 
			 		<tr>
              			<th width="3%" align="center">No.</th>
               			<th width="5%" align="center"><?=$lang_ag[205];?></th>
              			<th width="10%" align="center"><?=$lang_ag[254];?></th>
              			<th width="11%" align="center"><?=$lang_ag[239];?></th>
           				<th width="9%" align="center"><?=$lang_ag[189];?></th>
           				<th width="5%" align="center"><?=$lang_ag[205];?></th>
           				<th width="5%" align="center"><?=$lang_ag[227];?></th>
           				<th width="7%" align="center"><?=$lang_ag[255];?></th>
           				<th width="7%" align="center"><?=$lang_ag[190];?></th>
           				<th width="7%" align="center"><?=$lang_ag[191];?></th>
           				<th width="7%" align="center"><?=$lang_ag[212];?></th>  
             			<th width="9%" align="center"><?=$lang_ag[258];?></th>
						<th width="13%" align="center"><?=$lang_ag[259];?></th>
          			</tr>


			 	</thead>
			 	<tbody>
			 		
              
         
                  

			 	</tbody>
			</table>
		</div>	
	</div>

 <!-- </div> -->


<script src="<?=$main_url;?>/assets/js/main.js"></script>
<script src="<?=$main_url;?>/assets/js/lotto_fn.js"></script>
<script>



jQuery(document).ready(function($) {
	getRob(2);
});

 var variableAry = [];
     variableAry['lang_all'] = '<?=$lang_ag[174];?>';
     variableAry['rob']  = <?=json_encode($lang_lotrob);?>;
     variableAry['nrob'] = <?=json_encode($lot_zone_nrob);?>;
     variableAry['robmun'] = <?=json_encode($lot_robmun);?>;
        


function getRob(zone)
{
    checknRob(zone,'',variableAry);
    loadData();
};	




function calcel_all()
{
	if(confirm('<?=$lang_ag[10];?>'))
	{

		var zone = $('#zone').val();
		var rob = $('#trob').val();
		var data = $( "#form1" ).serializeArray();
		data.push(
			{name: 'zone', value: zone},
			{name: 'rob', value: rob}
		);

		$.ajax({
			url: '<?=$main_url;?>/inc/temp/lotto_hun/LottoSetCancel_submit.php',
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
	if(confirm('<?=$lang_ag[10];?>'))
	{
		var zone = $('#zone').val();
		var rob = $('#trob').val();

		$.ajax({
			url: '<?=$main_url;?>/inc/temp/lotto_hun/LottoSetCancel_submit.php',
			type: 'POST',
			dataType: 'json',
			data: {pid: pid , ac :"can_single",zone:zone,rob,rob},
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

// loadData();

function set_btn(res){
	return "<a href=\"#\" style=\"color:#d15b47;\" onclick=\"cancel('"+res["play_id"]+"')\"><?=$lang_lot[50];?></a>";
}
function set_chk(res){
	return "<input type=\"checkbox\" value=\""+res["play_id"]+"\" name=\"ckpro[]\" class=\"chk_select\">";
}

function loadData()
{
	var q = $("#search_input").val();
	var lzone = $("#zone").val();
	var lrob = $("#trob").val();
	$('#pageContent').load('show');	
	$.ajax({
		url: '<?=$main_url;?>/inc/temp/lotto_hun/LottoSetCancel_get_data.php',
		type: 'POST',
		dataType: 'json',
		data: {q: q , lzone: lzone , lrob: lrob},
	})
	.done(function(res) {

		$("#lot_date").text(res.lot_date);
		$("#lot_date_1").text(res.lot_date);

		if(q!=""){
			$("#search_input").val(q);
		}

		var l1 =  res["calcel_list"].length;
		var html1 = "";

		var get_rob = get_nRob(lzone,lrob,variableAry);

		for(var i = 0; i< l1; i++)
		{

			html1 += "<tr bgcolor=\"#ffffff\" onmouseover=\"this.bgColor='#FFFF66'\" onmouseout=\"this.bgColor='#ffffff'\" height=\"25\">"+
   						    "<td align=\"center\">"+res["calcel_list"][i]["lot_zone"]+get_rob+"</td>"+
   						    "<td align=\"center\">"+res["calcel_list"][i]["play_id"]+"</td>"+
   						    "<td align=\"center\">"+res["calcel_list"][i]["play_timestam"]+"</td>"+
   						    "<td>"+res["calcel_list"][i]["m_user"]+"</td>"+
   						    "<td align=\"center\">"+res["calcel_list"][i]["lot_type"]+"</td>"+
   						    "<td align=\"center\">"+res["calcel_list"][i]["play_number"]+"</td>"+
   						    "<td align=\"right\">"+res["calcel_list"][i]["b_total"]+"</td>"+
   						    "<td align=\"right\">"+res["calcel_list"][i]["sum10a"]+"</td>"+
   						    "<td align=\"right\">"+res["calcel_list"][i]["sum11a"]+"</td>"+
   						    "<td align=\"right\">"+res["calcel_list"][i]["xm_sum3"]+"</td>"+
   						    "<td align=\"center\" style=\"cursor: pointer;\">"+set_btn(res["calcel_list"][i])+
							"</td>"+
   						    "<td align=\"center\">"+set_chk(res["calcel_list"][i])+
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
        			   "<td align=\"center\">"+res["calceled_list"][i]["lot_zone"]+get_rob+"</td>"+
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