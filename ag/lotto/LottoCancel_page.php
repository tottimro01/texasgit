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
}
.title-style
{
	width: 100%;
	background-color: #438db9;
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

</style>



 <!-- <div class="row"> -->
 	
	<div class="col-md-12  top-title-style">
		<span class="rob_style">
			งวดวันที่ : 01-04-2019   
		</span>
		  
				<input type="text" name="q" id="search_input"  placeholder="search" autocomplete="off">
				<button type="button" name="search" id="search" class="btn btn-primary btn-sm" id="btnf" onclick="">
                          <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                           ค้นหา                                    
                </button>


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
		งวด : 01-04-2019 รายการยกเลิก
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



