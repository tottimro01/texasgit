<style>
	
th {
    text-align: center;
}

.xsboku
{
	height: 50px;
}


</style>
<section class="content-header">
  <h1>
    สรุปรวม
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-bar-chart"></i> หวย</a></li>
    <li class="active">สรุปรวม</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <form action="inc/lotto_print_bill_cut.php" id="main_form" target="_blank">
          <div class="row" style="padding: 10px;">

              <!--<input type="hidden" name="d" value="<?=$view_date;?>">
              <input type="hidden" name="mcut" value="1">
              <input type="hidden" name="namecut" value="1">-->

               <div class="col-md-12">
                 <label class="control-label text-left label-1"  style="min-width: 80px;" for="d"> งวดวันที่ : </label>
                          <select class="form-control sl-width input-sm mb-1" name="d" id="d" style="width: 150px; display: inline-block;" onchange="load_tb();">
                           
                          </select>

                         

                  
                  <label class="control-label text-left label-1"  style="min-width: 80px;" for="d"> ตัดส่ง :  </label>
                  <select class="form-control sl-width input-sm mb-1" name="mcut" id="set" style="width: 150px; display: inline-block;" onchange="load_tb();">
                      <option value="" selected="">ยอดตามหุ้น</option>
                      <option value="1">ยอดทั้งหมด</option>
                  </select>

                  <select class="form-control sl-width input-sm mb-1" name="namecut" id="asc" style="width: 150px;  display: inline-block;" onchange="load_tb();">
                      <option value="" selected="">เรียงตามยอด</option>
                      <option value="1">เรียงตามเลข</option>
                  </select>

                   <button type="button" class="btn btn-primary btn-sm " onclick="$('#main_form').submit();" style="margin-left: 5px;">
                           พิมพ์/ตัดส่ง
                   </button>

                   <button type="button" id="btn_refresh"  class="btn btn-sm btn-default" onclick="load_tb();" style="margin-left: 5px;">
                               รีเฟรช
                  </button>

                  <select class="form-control sl-width input-sm mb-1" name="mset" id="set_type" style="width: 150px; display: inline-block; margin-left: 5px;" onchange="load_tb();">
                      <option value="" selected="">ทั้งหมด</option>
                      <option value="1">แบบ A</option>
                      <option value="2">แบบ B</option>
                      <option value="3">แบบ C</option>
                  </select>
                 
                 <!-- <hr style="border-top: 1px solid #d3d3d3;"> -->
               </div>
               <?php /* ?>
             <?php 
               foreach ($lot_typeArry as $key => $value) {
                ?>

               <div class="form-group col-md-3"  >
                   <label for="" style="min-width: 90px;"> <?=$value;?> </label>
                   <input name="tcut<?=$key;?>" type="text" class="text_lot" style="margin: 3px;" value="" maxlength="15" id="tcut<?=$key;?>">
               </div>

                <?
               }

             ?>

               <div class="form-group col-md-3">
                  <button type="button" class="btn btn-success btn-sm sBtForm" onclick="send_cut();">
                           ตัดส่ง
                   </button>

                   <button type="button" class="btn btn-primary btn-sm " onclick="$('#main_form').submit();">
                           พิมพ์/ตัดส่ง
                   </button>
               </div> */?>
          </div> 
        </form>
          <div class="row" style="padding: 10px;">
              <div class="col-md-12">
                  <hr style="border-top: 1px solid #d3d3d3;">
                  <div class="mainbox table-responsive" id="mbox">กำลังโหลด...</div>
              </div>
          </div> 

      </div>
    </div>
  </div>  
</section>
<!-- /.content -->


<script>
set_date();
load_tb();

setInterval(function(){ load_tb(); }, 18000);

function load_tb()
{
  var data = $("#main_form").serializeArray();

  $.ajax({
    url: 'inc/lotto_money_ajax.php',
    type: 'GET',
    dataType: 'html',
    data: data,
  })
  .done(function(res) {
    console.log("success");
    $("#mbox").text("").append(res)
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}

function send_cut()
{
  var data = $("#main_form").serializeArray();

  $.ajax({
    url: 'inc/ajax_lotto_cut.php',
    type: 'GET',
    dataType: "json",
    data: data,
  })
  .done(function(res) {
    alert("ตัดส่งแล้ว");
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}


function set_date()
{
  var d  =  $("#d").val();
  $.ajax({
    url: 'inc/lotto_getDate.php',
    type: 'GET',
    dataType: 'html',
    data: {d: d},
  })
  .done(function(res) {
    console.log("success");
    $("#d").text('').append(res);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  }); 
}

</script>