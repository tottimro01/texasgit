
<style>
	
.top-title-style
{
	width: 100%;
	height: 38px;
	line-height: 38px;
	background-color: #d4c18a;
	color: #333;
	text-align: center;
}
.title-style
{
	width: 100%;
	height: 38px;
	line-height: 38px;
	background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
    background-repeat: repeat-x;
	color: #333;
	text-align: center;
	    border-top: 1px solid #c5c5c5;

}

.m_table
{
	width: 100%;
	margin-bottom: 10px;

}
.m_table thead tr
{
	background: #b59a48;
	text-align: center;
	height: 25px;
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
    background: #909090;
    text-align: center;
    color: #333;
    background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
    background-repeat: repeat-x;
        border-bottom: 0.5px solid #c5c5c5;
}

/*.m_table tbody tr:nth-child(even):hover , .m_table tbody tr:nth-child(even) td:hover{
    background: #fafafa  !important;
}

.m_table tbody tr:nth-child(odd):hover , .m_table tbody tr:nth-child(odd) td:hover{
    background: #dee3ea  !important;
}*/



.normal-box{
	
	height: auto;
	padding: 5px;
}

.extra-box
{
		padding: 5px;
		height: auto;
}
.box-color{
	background-color: #EFF3F8;
}



</style>

<div class="row">
<div class="col-md-9">
	<div class="top-title-style">
		เลขทั่วไป
	</div>
	<div class="normal-box box-color">
		
		<div class="row">
				
				
			<?php 
					$normal_list = array('3บน','3โต๊ด','2บน','2ล่าง');
					$extra_list = array('วิ่งบน','วิ่งล่าง','ปักหลักหน่วย');

					foreach ($normal_list as $key => $value) {
					
			 ?>
						<div class="col-md-3">
								<div class="title-style">
										<?=$value;?>
								</div>
								
								<table class="m_table">
									<thead>
										<tr>
											<th>เลข</th>
											<th>ยอด</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>152</td>
											<td> 50 </td>
										</tr>
										<tr>
											<td>153</td>
											<td> 50 </td>
										</tr>
										<tr>
											<td>154</td>
											<td> 50 </td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td>รวม</td>
											<td>150</td>	
										</tr>
									</tfoot>
								</table>
						</div>
					<?
		}
		?>
				
		</div>
		

	</div>
</div>
<div class="col-md-3" >
	<div class="top-title-style">
		เลขพิเศษ
	</div>
	<div class="extra-box box-color">
		<div class="row">
		<?php 
					
					foreach ($extra_list as $key => $value) {
					
			 ?>
						<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="title-style">
										<?=$value;?>
								</div>
								
								<table class="m_table">
									<thead>
										<tr>
											<th>เลข</th>
											<th>ยอด</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>152</td>
											<td> 50 </td>
										</tr>
										<tr>
											<td>153</td>
											<td> 50 </td>
										</tr>
										<tr>
											<td>154</td>
											<td> 50 </td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td>รวม</td>
											<td>150</td>	
										</tr>
									</tfoot>
								</table>
						</div>
			<?}?>
		</div>
	</div>
</div>
</div>