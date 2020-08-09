<style>
.top-title-style
{
	width: 100%;
	height: 45px;
	line-height: 45px;
	background-color: #d4c18a;
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
/*#search
{
	background-color: #2e8864!important;
    border-color: #287456;
}

#search:hover
{
	background-color: #287456!important;
    border-color: #0b5838;
}*/

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
	background: #b68700;
	text-align: center;
	height: 35px;
    color: #fff;
}
.m_table tbody tr
{
	text-align: center;
	height: 26px;
}

.m_table tbody tr:nth-child(even)
{
	background: #fafafa;
}
.m_table tbody tr:nth-child(odd)
{
	background: #dee3ea;
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
	border: 1px solid #fefefe73;
}


.m_table tbody tr:nth-child(even):hover , .m_table tbody tr:nth-child(even) td:hover{
    background: #fafafa  !important;
}

.m_table tbody tr:nth-child(odd):hover , .m_table tbody tr:nth-child(odd) td:hover{
    background: #dee3ea  !important;
}

.table2-Title
{
	width: 100%;
    text-align: left;
    padding-left: 15px;
    border-bottom: 1px solid #ffffff70;
    background: #aa944b;
    color: #fff;
    height: 35px;
    line-height: 35px;
    margin-top: 15px;
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

@media (min-width:721px) and (max-width:1140px)
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
}

@media (min-width:0px) and (max-width:720px)
{
	.top-title-style {
		    height: auto;
	}
	
	.m_table
	{
		width: 180%;
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
}

</style>


<?php 

	$lot_zone["th"]= array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หุ้นเกาหลี",15=>"หุ้นใต้หวัน",16=>"หุ้นจีน",17=>"หุ้นอินเดีย",18=>"จับยี่กี",19=>"หวยรายวัน"); 



	$lang_g['lotrob'] = array(1 => "เช้า", 2 => "เที่ยง" , 3 => "บ่าย" , 4 => "เย็น");
	$lot_zone_nrob= array(1 =>1,2 =>4,3 =>1 ,4=>1,5=>1,6=>2,7=>2,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1,15=>1,16=>2,17=>1,18=>96,19=>11);

	$lot_robmun= array(1 =>"12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00"); 

 ?>
 <!-- <div class="row"> -->
 	
	<div class="col-md-12  top-title-style">

			
			<div class="zoneGroup">

				<div class="text">
					ประเภท 
				</div>
				<select class="txt_back11n form-control sl-width input-sm sl_soccer l_zone" id="l_zone" name="zone" onchange="getRob(this)">
     
					 <?php 
					 		foreach ($lot_zone["th"] as $key => $value) {

					 			if($key != 1)
					 			{
					 				?>
					 					<option value="<?=$key;?>"><?=$value;?></option>	
					 				<?
					 			}
					 		}
					  ?>

				</select>
				
			</div>

			<div class="robGroup">

				<div class="text">
					รอบ 
				</div>
				<select class="txt_back11n form-control sl-width input-sm sl_soccer l_rob" id="l_rob" name="rob" onchange="getRob(this)">
     
					 <?php 
					 		foreach ($lang_g['lotrob'] as $key => $value) {
					 			?>
					 				<option value="<?=$key;?>"><?=$value;?></option>	
					 			<?
					 		}
					  ?>

				</select>
				
			</div>

					 
				<div class="rob_style">
					งวดวันที่ :  26-03-2019
				</div>

				<div class="search_group">
					<input type="text" name="q" id="search_input"  placeholder="search" autocomplete="off">
					<button type="button" name="search" id="search" class="btn btn-primary btn-sm" id="btnf" onclick="">
                	          <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                	           ค้นหา                                    
                	</button>
				</div>	
		  
				


                <button type="button" name="search" id="btl_cancel" class="btn btn-danger btn-sm" id="btnf" onclick="">
                
                           ยกเลิกที่เลือก                                    
                </button>
	</div>


	<div class="col-md-12">
	<div class="table-responsive">	
	 		<table class="m_table bgtable txt_back11n" id="table1">
			 	<thead>
			 		<tr>
			 			<th>รหัสบิล</th>
			 			<th>เวลา</th>
			 			<th>เมมเบอร์</th>
			 			<th>ประเภท</th>
			 			<th>เลข</th>
			 			<th>ยอดเล่น</th>
			 			<th>ถือสู้</th>
			 			<th>ส่วนลด</th>
			 			<th>ยอดสุทธิ</th>
			 			<th>ยกเลิก</th>
			 			<th>เลือก</th>

			 		</tr>
			 	</thead>
			 	<tbody>
			 			<tr>
			 				<td colspan="100%" class="text-danger"> ไม่พบข้อมูล </td>
			 			</tr>

			 	</tbody>
			 </table>
		</div>	 
	</div>

	<div class="col-md-12">
	


	<div class="table2-Title">
		งวด :  26-03-2019 รายการยกเลิก
	</div>
	<div class="table-responsive">		
			 <table class="m_table bgtable txt_back11n" style="margin-top: 0;">

			 	<thead>
			 		<tr>
			 			<th>รหัสบิล</th>
			 			<th>เวลา</th>
			 			<th>เมมเบอร์</th>
			 			<th>ประเภท</th>
			 			<th>เลข</th>
			 			<th>ยอดเล่น</th>
			 			<th>ถือสู้</th>
			 			<th>ส่วนลด</th>
			 			<th>ยอดสุทธิ</th>
			 			<th>ยกเลิก</th>
			 			<th>เลือก</th>

			 		</tr>
			 	</thead>
			 	<tbody>
			 			<tr>
			 				<td colspan="100%" class="text-danger"> ไม่พบข้อมูล </td>
			 			</tr>

			 	</tbody>
			</table>
		</div>	
	</div>

 <!-- </div> -->



<script>
	
function getRob(e)
{

	var zone = $(e).val();
	var robData = <?=json_encode($lang_g['lotrob']);?>;
	var lot_zone_nrob = <?=json_encode($lot_zone_nrob);?>;
	var lot_robmun = <?=json_encode($lot_robmun);?>;

	// console.log(robData)
	// console.log(lot_zone_nrob)
	// console.log('lot_zone_nrob '+lot_zone_nrob[zone])

	// console.log(zone)



	if(lot_zone_nrob[zone] == 1 || lot_zone_nrob[zone]  == "")
	{
		 $('.robGroup').hide();
	
	}else if(lot_zone_nrob[zone] == 4 || lot_zone_nrob[zone] == 2)
	{
		$('.robGroup').children('select').text('');
		let html = "";
		for(var i = 1; i<= lot_zone_nrob[zone]; i++)
        {
        	html += "<option value='"+i+"'>"+robData[i]+"</option>";
        }

         $('.robGroup').children('select').append(html)
         $('.robGroup').show();
	}else if(lot_zone_nrob[zone] == 96)
	{
		$('.robGroup').children('select').text('');
		let html = "";
		for(var i = 1; i<= lot_zone_nrob[zone]; i++)
        {
        	html += "<option value='"+i+"'>"+i+"</option>";
        }

         $('.robGroup').children('select').append(html)
         $('.robGroup').show();

	}else if(lot_zone_nrob[zone] == 11)
	{
		$('.robGroup').children('select').text('');
		let html = "";
		for(var i = 1; i<= Object.keys(lot_robmun).length ; i++)
        {
        	html += "<option value='"+i+"'>"+lot_robmun[i]+"</option>";
        }

         $('.robGroup').children('select').append(html)
         $('.robGroup').show();
	}

}


</script>