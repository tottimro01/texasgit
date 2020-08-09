
<style>
	.cr
	{
		color: red;
		font-size: 18px;
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
		    background: #aa944b;
    		height: 40px;
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
	}

/*	.tang_table  td.f_col , .tang_table  th.f_col
	{
		padding: 0 5px;
	}*/

	.tang_table thead tr
	{
		background: #e5e5e5;
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
	<div class="col-md-7">
	
		<form method="post" id="InputForm" name="InputForm">
			<div><h3 class="cr">*คำเตือน : แทงหน้านี้หุ้นส่วน จะเข้าคุณ 100% คนเดียว</h3>
			  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="head_table">
			    <thead><tr class="bghead rightbox">
			      <td height="20" align="center">
			      
			       สมาชิก : 
			        <select name="txt_mem" id="txt_mem" class="txt_back11n form-control sl-width input-sm sl_soccer date-sl">
			        <option value="">เลือกสมาชิก</option>
			                 <option value="3334">oho04 (ตึ๋ง) - บาท</option>
			                 <option value="3335">oho03 (ดรีม) - บาท</option>
			                 <option value="3336">oho02 (บอม) - บาท</option>
			              
			               </select>
			      </td>
			    </tr>
			  </thead></table>
			</div>
	
			<table width="100%" border="0" cellspacing="1" cellpadding="0" class="bgtable txt_back11n tang_table">
	      	
	      		<thead>
	      			<tr class="bghead">
	        				<th class="f_col"  height="25" align="center">เลข</th>
	        				<th class="o_cal"  align="center">บน</th>
	         				<th class="o_cal"  align="center">โต๊ด</th>
	         				<th class="o_cal"  align="center">ล่าง</th>
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
								<input name="num0" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab?>" style="text-align:center; padding:2px 2px; box-sizing: border-box; width:100%;" maxlength="3" onkeydown="">
							</td>
							<td align="center">

								<input name="col10" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab=$tab+1?>" style="text-align:center; 	padding:2px 2px; box-sizing: border-box; width:100%; " maxlength="6" onkeydown="">
							</td>
							<td align="center">
							  	<input name="col20" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab=$tab+1?>" style="text-align:center; 	padding:2px 2px; box-sizing: border-box; width:100%;" maxlength="6" onkeydown="">
							</td>
							<td align="center">
							  	<input name="col30" type="text" class="txt_back11n center txt_vtang numeric" id="tab<?=$tab=$tab+1?>" style="text-align:center; 	padding:2px 2px; box-sizing: border-box; width:100%; " maxlength="6" onkeydown="">
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
                                                    บันทึก 
                                                </button>

                                    <button type="reset" name="btreset" id="btreset" class="btn btn-danger btn-sm" onclick="clear_txt();">
                                                    <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                                    ล้างค่า                                                </button>

	                            
	          			</td>
	          		</tr>
	
	          </tfoot>
	      </table>
		</form>
	
	   
	
	</div>
	
	<div class="col-md-5 bet_list">
		<!-- <div style="padding:10px;" id="statussave">
			<b>สมาชิก : aaaa03 [BOM3]</b><br>
			<span class="cb">3บน <b>[ 123 ]</b> = 50 สำเร็จ </span><br>
			<span class="cb">3โต๊ด <b>[ 123 ]</b> = 50 สำเร็จ </span><br>
			<span class="cb">3ล่าง <b>[ 123 ]</b> = 25 สำเร็จ </span><br><br>
			<span style="color:red; font-size:18px;"><b>รวม = 125 บาท</b></span>
		</div> -->
	</div>
</div>

<script>
	

function clear_txt(){
	$("#InputForm").trigger("reset");
	$(".bet_list").text('');	

}


function save_lotto()
{
		
		let _html = 	'<div style="padding:10px;" id="statussave">'+
							'<b>สมาชิก : aaaa03 [BOM3]</b><br>'+
							'<span class="cb">3บน <b>[ 123 ]</b> = 50 สำเร็จ </span><br>'+
							'<span class="cb">3โต๊ด <b>[ 123 ]</b> = 50 สำเร็จ </span><br>'+
							'<span class="cb">3ล่าง <b>[ 123 ]</b> = 25 สำเร็จ </span><br><br>'+
							'<span style="color:red; font-size:18px;"><b>รวม = 125 บาท</b></span>'+
						'</div>';

		$(".bet_list").text('');	
		// $(".bet_list").append(_html);	

		$("#InputForm").trigger("reset");	

}


</script>