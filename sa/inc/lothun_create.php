<?php 
  if($_GET['d'] ==""){
    $_GET['d'] = $view_date;
  }
  if($_GET['zone'] ==""){
    $_GET['zone'] = 2;
  }

  // SUBMIT Process
  if(isset($_POST['lothun_create'])){


    header("Location: main.php?p=".$_GET['p']."&g_p=".$_GET['g_p']."&d=".$_GET['d']);
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
    

     $xdate=date("d-m-Y",$new_time);
    
    $sql="update bom_tb_lotto_ok  set o_limit_time='$new_time',o_limit_time_lang='$new_time',   ok_date='$xdate'   where   ok_id='$_GET[id]' ";
    sql_query($sql);
 

  @header("Location: main.php?p=".$_GET['p']."&g_p=".$_GET['g_p']."&zone=".$_GET['zone']);
  exit();
    }

?>
 <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>สร้างงวด</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-line-chart"></i> หวยหุ้น</a></li>
    <li class="active"> สร้างงวด </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <form action="#" method="post">
        <div class="row">
          <div class="col-md-3">
              <label>ประเภท</label>
              <select class="form-control" onchange="_w('?p=lothun_create&g_p=lothun&zone='+this.value);">
              <?php 
                  foreach ($arr_zone as $x => $v) {
                    if($x!=1)
          {
              ?>
                  <option value="<?=$x;?>" <? if($_GET[zone]==$x){echo'selected';}?>><?=$v;?></option>
              <?
                 } }
              ?>
              </select>
          </div> 
          
        </div>
        <br>
        <div class="row">
        	<div class="col-md-3">
            <button type="submit" class="btn btn-default" name="lothun_create" style="white-space: inherit;"><span>สร้าง</span><span class="text-danger"> (* สร้างในกรณีที่ระบบไม่สร้างงวดให้อัตโนมัติ)</span></button>
          </div>
        </div>

        <? if($_GET[ac]=="edit"){
      $sql="select * from bom_tb_lotto_ok where ok_id='$_GET[id]' ";
      $re=sql_array($sql);
      ?>
      <br>
      <div class="row">
          <div class="col-md-3">

              <div class="form-inline">
              <div class="form-group">
                <label>งวด:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="tdate" id="tdate" value="<?=date("d-m-Y@",$re[o_limit_time]);?>0.0" autocomplete="off" />
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
        <? }?>



      </form>
    </div>
    <div>
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
        			<th class="text-center">เวลา</th>
        			<th class="text-center">รอบ</th>
        			<th class="text-center"></th>
        		</tr>
        	</thead>
        	<tbody>
             <?
 $x=1;
$re=sql_page("bom_tb_lotto_ok  where lot_zone= $_GET[zone]  ","ok_id","desc",120);
while($rs=sql_fetch($re[re])){
  
  if($rs[o_active]==0){
    $xbg='ff9595';
    }else{
    $xbg='ffffff';
      }
      
  if(date("H.i",$rs[o_limit_time])=="00.00"){
    $xbg='ff9595';
  }else{
    $xbg='ffffff';
    }
  ?> 
        		<tr class="text-center">
        			<td><?=$rs[ok_id]?></td>
        			<td><?=$rs[ok_date]?></td>
        			<td><?=date("H.i",$rs[o_limit_time])?></td>
        			<td><?=$rs[lot_rob]?></td>
        			<td><button class="btn btn-primary btn-sm" onClick="_w('?p=lothun_create&g_p=lothun&ac=edit&zone=<?=$_GET[zone]?>&id=<?=$rs[ok_id]?>');">แก้ไข</button></td>
        		</tr>

<? $x++;} ?>
        	</tbody>
        </table>
         <p><?=_page("$_GET[p]&g_p=$_GET[g_p]&zone=$_GET[zone]",$re[page]);?></p>
    </div>
  </div>
  </div>
</section>
<script>

</script>