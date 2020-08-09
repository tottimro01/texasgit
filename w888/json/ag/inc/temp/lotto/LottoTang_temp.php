<?php require('inc_head.php');?>
<style>
	.cr
	{
		color: red;
		font-size: 16px;
	}
	

	#txt_mem
	{
		max-width: 200px;
		display: inline;
	}

	.head_table
	{
		margin-top: 20px;
	}

	.head_table tr 
	{
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
    color: #b68700;
    border-bottom: 1px solid #DDD;
    padding-left: 12px;
    		height: 40px;
    		    border: 1px solid #CCC;
	}
	

	.tang_table
	{
		margin-bottom: 30px;
	}

	.tang_table tr th
	{	
		text-align: center;
	}
	
	.tang_table  td , .tang_table  th
	{
		border: 1px solid #d3d3d3;
		padding: 0 6px;
		font-weight: 500;
	}

	.tang_table thead tr
	{
		background: #d4c18a;
		margin:10px 0;

	}

	.tang_table tbody tr
	{
		height: 35px;
	}

	.tang_table tfoot tr td
	{
		height: 50px;
		text-align: center;
		padding: 10px auto;
	}
	
	.bet_list
	{
		padding-top: 60px;
	}

	.f_col
	{
		width: 11%;
	}
	.o_cal
	{
		width: 29.2%;
	}

	@media only screen and (max-width: 750px)
	{
		.f_col
		{
			width: 15%;
		}
		.o_cal
		{
			width: 28.33%;
		}
	}

</style>

<div class="row">
	<div class="col-md-5 col-sm-12 col-xs-12">
	
		<form method="post" id="InputForm" name="InputForm">
			<div><h3 class="cr"><?=$lang_lot[56];?></h3>
			  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="head_table">
			    <thead><tr class="bghead rightbox">
			      <td height="20" align="center">

			      	<?php 
			      			$r_agent_id = $_POST["session"]["r_agent_id"].$_POST["session"]["r_id"]."*";

			      			$sql = "select * from bom_tb_member   where  m_agent_id = '$r_agent_id'";
			      			$re=sql_query($sql);
			      			

			      	 ?>
			      
			       <?=$lang_lot[16];?> : 
			        <select name="txt_mem" id="txt_mem" class="txt_back11n form-control sl-width input-sm sl_soccer date-sl">
			        <option value=""><?=$lang_lot[57];?></option>

			        <?php while($rs=sql_fetch($re)){

			        	?>
			        		<option value="<?=$rs["m_id"];?>"><?=$rs["m_user"];?> (<?=($rs["m_name"] == "") ? $lang_lot[67] : $rs["m_name"];?>) - <?=$lang_lot[58];?></option>
			        	<?

			        } ?>
			               			              
			               </select>
			      </td>
			    </tr>
			  </thead></table>
			</div>
	
			<table width="100%" border="0" cellspacing="1" cellpadding="0" class="bgtable txt_back11n tang_table">
	      	
	      		<thead>
	      			<tr class="bghead">
	        				<th class="f_col"  height="25" align="center"><?=$lang_lot[33];?></th>
	        				<th class="o_cal"  align="center"><?=$lang_lot[59];?></th>
	         				<th class="o_cal"  align="center"><?=$lang_lot[60];?></th>
	         				<th class="o_cal"  align="center"><?=$lang_lot[61];?></th>
	      			</tr>
	         	</thead>
	         	<tbody>
	
	         		<?php 
	         		$tab = 0;
	         			for($i=0; $i<=20;$i++)
	         			{
	         		 ?>
				   <tr bgcolor="#ffffff" onmouseover="this.bgColor='#FFFF66'" onmouseout="this.bgColor='#ffffff'">
							<td align="center" class="f_col">
								<input name="num0" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab?>" style="text-align:center; padding:2px 2px; box-sizing: border-box; width:100%;" maxlength="3" onKeyDown="return numberonly(event,this)">
							</td>
							<td align="center">

								<input name="col10" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab=$tab+1?>" style="text-align:center; 	padding:2px 2px; box-sizing: border-box; width:100%; " maxlength="6" onKeyDown="return numberonly(event,this)">
							</td>
							<td align="center">
							  	<input name="col20" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab=$tab+1?>" style="text-align:center; 	padding:2px 2px; box-sizing: border-box; width:100%;" maxlength="6" onKeyDown="return numberonly(event,this)">
							</td>
							<td align="center">
							  	<input name="col30" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab=$tab+1?>" style="text-align:center; 	padding:2px 2px; box-sizing: border-box; width:100%; " maxlength="6" onKeyDown="return numberonly(event,this)">
							 </td>
					 </tr>
					 <?php 
					 $tab=$tab+1;
					 	}
					  ?>
	                
	          </tbody>
	
	          <tfoot>
	          		<tr>
	          			<td colspan="100%" valign="middle">
	          				 <input type="hidden" id="cnt" name="cnt" value="79">
	                                <input type="hidden" id="maintype" name="maintype" value="number3">
	                                <button type="button" name="btsave" id="btsave" class="btn btn-primary btn-sm" onclick="save_lotto()">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                        <?=$lang_lot[5];?> 
                                    </button>

                                    <button type="reset" name="btreset" id="btreset" class="btn btn-danger btn-sm" onclick="clear_txt();">
                                         <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                         <?=$lang_lot[6];?>    
                                     </button>

	                            
	          			</td>
	          		</tr>
	
	          </tfoot>
	      </table>
		</form>
	
	   
	
	</div>
	
	<div class="col-md-5 bet_list">
	
	</div>
</div>

<script src="<?=$main_url;?>/assets/js/main.js"></script>
<script>
	

var submitting = false;
function save_lotto()
{
	if(submitting == false){
		submitting = true;

		$("#btsave").hide();
		$("#btreset").hide();

		var lotto = new Array();
		var nlot = 0;
		var alot = 0;

		for(var cc=0;cc<20;cc++){
			var num = $.trim($("#tab"+nlot).val());
			nlot=nlot+1;

			if($("#tab"+nlot).attr('disabled')){
				var l3up=  "";
			}else{
				var l3up=  $.trim($("#tab"+nlot).val());
			}
			nlot=nlot+1;
			if($("#tab"+nlot).attr('disabled')){
				var l3tod=  "";
			}else{
				var l3tod=  $.trim($("#tab"+nlot).val());
			}
			nlot=nlot+1;
			if($("#tab"+nlot).attr('disabled')){
				var l3down=  "";
			}else{
				var l3down=  $.trim($("#tab"+nlot).val());
			}
			nlot=nlot+1;
			if(num!="" && (l3up!="" || l3tod!="" || l3down!="")){
				if(num.length==3){
				lotto[alot] = num+","+l3up+","+l3tod+","+l3down;
					alot++;
				}else if(num.length==2){
				lotto[alot] = num+","+l3up+","+l3tod+","+l3down;
					alot++;
				}else if(num.length==1){
				lotto[alot] = num+","+l3up+",,"+l3down;
					alot++;
				}
			}

		}

		if(lotto.length<=0){
			$.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> <?=$lang_message[7];?> </h5>',
                    class_name: 'gritter-error'
                });

			$("#btsave").show();
			$("#btreset").show();
			submitting = false;
		}else{

			var rcc = true;
			if (rcc == true) {
				var mid = $("#txt_mem").val();
				if(mid != '')
				{
					$('#pageContent').load('show');	
					$.ajax({
						url: '<?=$main_url;?>/inc/temp/lotto/LottoTang_submit.php',
						type: 'POST',
						dataType: 'json',
						data: { "lotto": lotto , "tlot": 1 , "zone": 1 , "rob": 1 , "mid": mid },
					})
					.done(function(res) {

						if(res["status"] == true)
							{
								let _html = 	res["html_result"];			
								$(".bet_list").text('');	
								$(".bet_list").append(_html);	
								$("#InputForm").trigger("reset");	

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

						$('#pageContent').load('hide');

						clear_txt();
						$("#btsave").show();
						$("#btreset").show();
					});

				}else{
					$.gritter.add({
               		    title: "",
               		    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> <?=$lang_message[26];?> </h5>',
               		    class_name: 'gritter-error'
               		});

               		$("#btsave").show();
					$("#btreset").show();
				}
				
				submitting = false;

			}else{
				$("#btsave").removeAttr('disabled');
			}			
		}
	}
				
}


function clear_txt(){
	$("#InputForm").trigger("reset");
	$(".bet_list").text('');
}


</script>