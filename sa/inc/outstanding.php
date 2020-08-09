
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    ยอดเล่นค้าง
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-file-text"></i> บิล</a></li>
    <li class="active">ยอดเล่นค้าง</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">      
    <div class="box-header">
      <h3 class="box-title">รายการยอดเล่นค้าง</h3>
      
      <?php if($lv > 1){ ?>
      <button type="button" class="btn btn-block btn-primary pull-right" style="width: 120px;" onclick="javascript:history.go(-1)">
        <i class="fa fa-chevron-left" style="font-size: 14px; margin-right: 10px;"></i> ย้อนกลับ
      </button>
      <?php } ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table class="table table-bordered table-hover">

        <thead>
          <tr>
            <th class="vaign_m" rowspan="2" width="10%">ชื่อผู้ใช้</th>
            <th class="vaign_m" rowspan="2" width="10%">ยอดเล่น</th>
            <th class="vaign_m" colspan="3" width="35%">สมาชิก</th>
            <th class="vaign_m" colspan="3" width="35%">เอเย่น</th>
            <th class="vaign_m" rowspan="2" width="20%">เว็บไซต์</th>
          </tr>

          <tr>
            <th class="vaign_m">ได้-เสีย</th>
            <th class="vaign_m">ส่วนลด</th>
            <th class="vaign_m">รวม</th>
            <th class="vaign_m">ได้-เสีย</th>
            <th class="vaign_m">ส่วนลด</th>
            <th class="vaign_m" style="border-right-width:1px;">รวม</th>
          </tr>
        </thead>
        <tbody>

        <?php 

          

$mem_share=" (  b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
		
            foreach ($bet_type as $key => $value) {
              include "outstanding/outstanding_byType_".$key.".php";   
            }
			
			
	$sum1=_cbn(@array_sum($xsum1),2);
	$sum2=_cbn(@array_sum($xsum2),2);
	$sum3=_cbn(@array_sum($xsum3),2);
	$sum4=_cbn(@array_sum($xsum4),2);
	$sum5=_cbn(@array_sum($xsum5),2);
	$sum6=_cbn(@array_sum($xsum6),2);
	$sum7=_cbn(@array_sum($xsum7),2);
	$sum8=_cbn(@array_sum($xsum8),2);

      
        ?>
        </tbody>
        <tfoot>
          <tr class="col_footer">
              <td class="vaign_m">รวม</td>
              <td class="aign_r"><?=$sum1;?></td>
              <td class="aign_r"><?=$sum2;?></td>
              <td class="aign_r"><?=$sum3;?></td>
              <td class="aign_r"><?=$sum4;?></td>
              <td class="aign_r"><?=$sum5;?></td>
              <td class="aign_r"><?=$sum6;?></td>
              <td class="aign_r"><?=$sum7;?></td>
              <td class="aign_r"><?=$sum8;?></td>
          </tr>
        </tfoot>
      </table>


      </div>
            <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
