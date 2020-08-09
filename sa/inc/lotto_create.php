<?php 
  if($_GET['d'] ==""){
    $_GET['d'] = $view_date;
  }

  if(isset($_POST[b_up])){
    $_POST[tdate]=trim($_POST[tdate]);
    $_POST[tdate2]=trim($_POST[tdate2]);
    
    $ex=explode("@",$_POST[tdate]);
    $xdate=$ex[0];
    $xtime=$ex[1];
    $ex1=explode("-",$xdate);
    $ex2=explode(".",$xtime);
    
    $new_time=mktime($ex2[0],$ex2[1],0,$ex1[1],$ex1[0],$ex1[2]);
    
    $ex3=explode(".",$_POST[tdate2]);
    $new_time2=mktime($ex3[0],$ex3[1],0,$ex1[1],$ex1[0],$ex1[2]);
     $xdate=date("d-m-Y",$new_time);
    
    $sql="update bom_tb_lotto_ok  set o_limit_time='$new_time',o_limit_time_lang='$new_time2',  ok_date='$xdate'   where   ok_id='$_GET[id]' ";
    sql_query($sql);
    
    $sql="update bom_tb_lotto_bill  set   b_date='$xdate'   where   ok_id='$_GET[id]' ";
    sql_query($sql);
    $sql="update bom_tb_lotto_bill_play  set  b_date='$xdate'   where   ok_id='$_GET[id]' ";
    sql_query($sql);

    @header('Location: main.php?p=lotto_create&g_p=lotto');
    exit();
  }


?>
 <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>สร้างงวด</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-bar-chart"></i> หวย</a></li>
    <li class="active"> สร้างงวด </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">


<? if($_GET[ac]=="edit"){
      $sql="select * from bom_tb_lotto_ok where   lot_zone = 1 and lot_rob = 1 and  ok_id='$_GET[id]' ";
      $re=sql_array($sql);
      ?>


      <form action="" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="form-inline">
              <div class="form-group">
                <label>งวด:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="tdate" id="tdate" value="<?=date("d-m-Y@H.i",$re[o_limit_time]);?>" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <label>&nbsp;&nbsp;ล่าง:</label>
                <div class="input-group date">
                  <input type="text" class="form-control pull-right" name="tdate2" id="tdate2" value="<?=date("H.i",$re[o_limit_time_lang]);?>" autocomplete="off" />
                </div>
                 
              </div>
            </div>
            <br>
            <div class="form-inline">
              <div class="form-group">
                <button type="submit" class="btn btn-default" name="b_up" value="บันทึกแก้ไข"><span>บันทึกแก้ไข</span></button>
              </div>
            </div>
          </div> 
        </div>
      </form>
      <? }else{?>

        <?
        $sql="select ok_id from bom_tb_lotto_ok where  lot_zone = 1 and lot_rob = 1 and  o_active=0; ";
    $reok=sql_array($sql);
    if($reok[ok_id]==""){
    ?>
               <input type="text" size="15" id="tdate" name="tdate" value='<?=date("d-m-Y");?>@15.20' class="txt_back11n"  style="text-align:center; background-color:#FFFF00;">
        &nbsp;&nbsp; ล่าง<input type="text" size="5" id="tdate2" name="tdate2" value='15.20' class="txt_back11n"  style="text-align:center; background-color:#FFFF00;">
        <input name="b_add" type="submit" class="txt_back11n" id="b_add"  value="สร้างงวดใหม่" >


<form action="#" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="form-inline">
              <div class="form-group">
                <label>งวด:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="d" id="d" value="<?=$_GET['d'];?>" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <select class="form-control">
                  <? for ($i=0; $i < 24; $i++) { ?>
                  <option value="<?=$i;?>"><?=sprintf("%02d",$i).":00";?></option>
                  <? } ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-inline">
              <div class="form-group">
                <label>ล่าง:</label>
                <select class="form-control">
                  <? for ($i=0; $i < 24; $i++) { ?>
                  <option value="<?=$i;?>"><?=sprintf("%02d",$i).":00";?></option>
                  <? } ?>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default" name="lotto_create"><span>สร้างงวด</span></button>
              </div>
            </div>
          </div> 
        </div>
      </form>


        <? }else{?>
        <span class="cr">มีหวยรอออกผลแล้ว</span>
         <? }?>
        <? }?>


      
    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered">
        	<colgroup>
        		<col width="22%" />
        		<col width="22%" />
        		<col width="22%" />
        		<col width="22%" />
        		<col width="12%" />
        	</colgroup>
        	<thead>
        		<tr class="bg-blue-gradient">
        			<th class="text-center">No.</th>
        			<th class="text-center">วันที่</th>
        			<th class="text-center">ปิดรับ</th>
        			<th class="text-center">ปิดรับ ล่าง</th>
        			<th class="text-center"></th>
        		</tr>
        	</thead>
        	<tbody>

            <?
 $x=1;
$re=sql_page("bom_tb_lotto_ok  where lot_zone=1  ","ok_id","desc",50);
while($rs=sql_fetch($re[re])){
  
  if($rs[o_active]==0){
    $xbg='ff9595';
    }else{
    $xbg='ffffff';
      }
  ?> 

        		<tr class="text-center" bgcolor='#<?=$xbg;?>'>
        			<td><?=$rs[ok_id]?></td>
        			<td><?=$rs[ok_date]?></td>
        			<td><?=date("H.i",$rs[o_limit_time])?></td>
        			<td><?=date("H.i",$rs[o_limit_time_lang])?></td>
        			<td><? if($x==1){?><button class="btn btn-primary btn-sm" onClick="_w('?p=lotto_create&g_p=lotto&ac=edit&id=<?=$rs[ok_id]?>');">แก้ไข</button><? }?></td>
        		</tr>

<? $x++;} ?>

        		
        	</tbody>
        </table>
    </div>
  </div>
</section>
<script>
  $(".datepicker").datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    endDate: new Date(),
  });
</script>