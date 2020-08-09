<?php require('inc_head.php');?>

<style>
	.top-title-style{
		width: 100%;
		height: 38px;
		line-height: 38px;
		background-color: #d4c18a;
		color: #333;
		text-align: center;
	}

	.title-style{
		width: 100%;
		height: 38px;
		line-height: 38px;
		background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
		background-repeat: repeat-x;
		filter: 
		color: #b68700;
		text-align: center;
		border-top: 1px solid #c5c5c5;
	}
	
	.m_table{
		width: 100%;
		margin-bottom: 10px;
	}

	.m_table thead tr{
		text-align: center;
		height: 25px;
		background: #b59a48;
		color: #333;
	}
	
	.m_table tbody tr{
		text-align: center;
		height: 26px;
	}
	
	.m_table tbody tr:nth-child(even){
		background: #ffffff;
	}

	.m_table tbody tr:nth-child(odd){
		background: #f9f9f9;
	}
	
	.m_table td , .m_table th{
		font-weight: 500;
	}

	.m_table tfoot tr{
		height: 25px;
		background: #909090;
		text-align: center;
		color: #333;
		background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
		background-repeat: repeat-x;
		border-bottom: 0.5px solid #c5c5c5;
	}
		
	.normal-box{
		height: auto;
		padding: 5px;
	}
	
	.extra-box{
		padding: 5px;
		height: auto;
	}

	.box-color{
		background-color: #EFF3F8;
	}
</style>

<div class="row">
	<div class="col-md-9">
		<div class="top-title-style"><?=$lang_lot[31];?></div>
		<div class="normal-box box-color">
			<div class="row">
			<?php 
				$normal_list = array('3บน','3ล่าง','3โต๊ด','2บน','2ล่าง'); // เลขทั่วไป
				$extra_list = array('วิ่งบน','วิ่งล่าง','ปักหลักหน่วย'); // เลขพิเศษ
				foreach($normal_list as $key => $value){
			?>
				<div class="col-md-3">
					<div class="title-style"><?=$value;?></div>
					<table class="m_table">
						<thead>
							<tr>
								<th><?=$lang_lot[33];?></th>
								<th><?=$lang_lot[34];?></th>
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
								<td><?=$lang_lot[21];?></td>
								<td>150</td>	
							</tr>
						</tfoot>
					</table>
				</div>
			<? } ?>
			</div>
		</div>
	</div>
<div class="col-md-3" >
	<div class="top-title-style">
		<?=$lang_lot[32];?>
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
											<th><?=$lang_lot[33];?></th>
											<th><?=$lang_lot[34];?></th>
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
											<td><?=$lang_lot[21];?></td>
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