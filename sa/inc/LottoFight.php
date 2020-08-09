<style>
  
.ff_ss {
    background: #D9D9FF;
    margin: 2px;
    padding: 2px;
    float: left;
    width: 100px;
    border: 1px solid #999;
}


@media (max-width:767px) 
{
  label,select
  {
    width: 100%!important;
  }
  select
  {
    margin-bottom: 10px;
  }
}
</style>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ตั้งสู้
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#"><i class="fa fa-bar-chart"></i> หวย</a></li>
        <li class="active">ตั้งสู้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
            <div class="col-md-12">
              <div class="box">
                <form action="inc/lothun_print_bill_cut.php" id="main_form" target="_blank">
                  <div class="row" style="padding: 10px;">
                        
                       <div class="col-md-12">

                          <label class="control-label text-left label-1"  style="min-width: 80px;" for="d"> งวดวันที่ : </label>
                          <select class="form-control sl-width input-sm" name="d" id="d" style="width: 150px; display: inline-block;" onchange="load_tb();">
                            <?
                              $re=sql_query("select * from bom_tb_lotto_ok where 1  $kzone  $krob  order by  ok_id desc limit 12 ");
                              while($rs=sql_fetch($re)){
                              ?>    
                                <option value='<?=$rs["ok_date"]?>'  <? if($_GET[d]==$rs["ok_date"]){echo'selected';}?>><?=$rs["ok_date"]?></option>
                            <? } ?>
                          </select>

                          

                          <select class="form-control sl-width input-sm" name="asc" id="asc" style="width: 150px;  display: inline-block;" onchange="load_tb();">
                              <option value="" selected="">เรียงตามยอด</option>
                              <option value="1">เรียงตามเลข</option>
                          </select>

                          <select class="form-control sl-width input-sm" name="z" id="z" style="width: 150px; display: inline-block;" onchange="load_tb();">
                              <option value="" selected="">บน</option>
                              <option value="1">หน้าบน</option>
                              <option value="2">2ล่าง</option>
                              <option value="3">3ล่าง</option>
                      
                          </select>

                          <input type="button" id="btn_refresh" value="รีเฟรช" class="button" onclick="load_tb();">

                       </div>
                  </div> 
                </form>
                  <div class="row" style="padding: 10px;">
                     <!--  <div class="col-md-12">
                          <hr style="border-top: 1px solid #d3d3d3;">
                          <div class="mainbox" id="mbox">กำลังโหลด...</div>
                      </div> -->

                      <div class="col-md-8">
                          <label class="control-label text-left label-1"  style="min-width: 80px;"> รายการตั้งสู้ : </label>
                          <hr style="border-top: 1px solid #d3d3d3;">
                          <div class="mainbox table-responsive" id="mbox1"></div>
                      </div>

                      <div class="col-md-4">
                          <label class="control-label text-left label-1"  style="min-width: 80px;"> เลขอันตราย : </label>
                          <hr style="border-top: 1px solid #d3d3d3;">
                          <div class="mainbox table-responsive" id="mbox2"></div>
                      </div>

                     <!--  <div class="col-md-3">
                          <label class="control-label text-left label-1"  style="min-width: 80px;"> ผลรางวัล : </label>
                          <hr style="border-top: 1px solid #d3d3d3;">
                          <div class="mainbox" id="mbox3"></div>
                      </div> -->
                  </div> 

              </div>
            </div>
          </div>  
		



    </section>
    <!-- /.content -->

<script>
      

set_date();
load_tb();
function load_tb()
{
  var data = $("#main_form").serializeArray();
      data.push({name: 'b', value: '1'});

  $.ajax({
    url: 'inc/lottoFight_ajax1.php',
    type: 'GET',
    dataType: 'html',
    data: data,
  })
  .done(function(res) {
    $("#mbox1").text('').append(res);
    // _pre_view3();
  });

}

function _pre_view2(num,sum){
  var data = $("#main_form").serializeArray();
      data.push(
        {name: 'b', value: '1'},
        {name: 'num', value: num},
        {name: 'sum', value: sum},
      );

  $.ajax({
    url: 'inc/lottoFight_ajax2.php',
    type: 'GET',
    dataType: 'html',
    data: data,
  })
  .done(function(res) {
    $("#mbox2").text('').append(res);
  });
}


// function _pre_view3(){
//   var data = $("#main_form").serializeArray();
//       data.push(
//         {name: 'b', value: '1'},
//       );

//   $.ajax({
//     url: 'inc/lottoFight_ajax3.php',
//     type: 'GET',
//     dataType: 'html',
//     data: data,
//   })
//   .done(function(res) {
//     $("#mbox3").text('').append(res);
//   });
// }


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