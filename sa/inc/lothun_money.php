<style>
	
th {
    text-align: center;
}

.xsboku
{
	height: 50px;
}

.cu
{
  background: #cbcbcb;
}

</style>

<?php 

if($_GET[zone]!=""){ $kzone="  and lot_zone='$_GET[zone]' ";}else{ $kzone="  and lot_zone='2' "; }
if($_GET[rob]!=""){ $krob="  and lot_rob='$_GET[rob]' ";}else{ $krob="  and lot_rob='1' "; }

?>

<section class="content-header">
  <h1>
    สรุปรวม
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-line-chart"></i> หวยหุ้น</a></li>
    <li class="active">สรุปรวม</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <form action="inc/lothun_print_bill_cut.php" id="main_form" target="_blank">
          <div class="row" style="padding: 10px;">
                <input type="hidden" name="d" value="<?=$view_date;?>">
                <input type="hidden" name="mcut" value="1">
                <input type="hidden" name="namecut" value="1">
               <div class="col-md-12">
                  <?php 
                     $lot_zone = $lot_zone[$_SESSION["AGlang"]]["zone"];
                   ?>
                  <label class="control-label text-left label-1"  style="min-width: 80px;" for="l_zone"> ประเภท : </label>
                   <select class="form-control sl-width input-sm" style="width: 150px; display: inline-block;" id="l_zone" name="zone" onchange="set_rob(this.value);">
                       <?php foreach ($lot_zone as $key => $value) {
                         if($key != 1)
                         {
                           ?>
                              <option value="<?=$key;?>"> <?=$value;?></option>
                           <?
                         }  
                       } ?>
                   </select>

                   <label class="control-label text-left label-1 rob" style="min-width: 80px;"> รอบ :</label>
                   <select class="form-control sl-width input-sm rob" name="rob" id="l_rob" style="width: 150px; display: inline-block;" onchange="load_tb();">
                       
                   </select>

                  <label class="control-label text-left label-1"  style="min-width: 80px;" for="d"> งวดวันที่ : </label>
                   <select class="form-control sl-width input-sm" name="d" id="d" style="width: 150px; display: inline-block;" onchange="load_tb();">
                     <?
                       $re=sql_query("select * from bom_tb_lotto_ok where 1  $kzone  $krob  order by  ok_id desc limit 12 ");
                       while($rs=sql_fetch($re)){
                       ?>    
                         <option value='<?=$rs["ok_date"]?>'  <? if($_GET[d]==$rs["ok_date"]){echo'selected';}?>><?=$rs["ok_date"]?></option>
                     <? } ?>
                   </select>


                 
                  ตัดส่ง : 
                  <select class="form-control sl-width input-sm" name="set" id="set" style="width: 150px; display: inline-block;" onchange="load_tb();">
                      <option value="" selected="">ยอดตามหุ้น</option>
                      <option value="1">ยอดทั้งหมด</option>
                  </select>

                  <select class="form-control sl-width input-sm" name="asc" id="asc" style="width: 150px;  display: inline-block;" onchange="load_tb();">
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
               foreach ($lotHun_typeArry as $key => $value) {
                ?>

               <div class="form-group col-md-3"  >
                   <label for="" style="min-width: 90px;"> <?=$value;?> </label>
                   <input name="tcut<?=$key;?>" type="text" class="text_lot" style="margin: 3px;" value="" maxlength="15" id="tcut<?=$key;?>">
               </div>

                <?
               }

             ?>

               <div class="form-group col-md-3">
                  <button type="button" class="btn btn-success btn-sm sBtForm" onclick="">
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

load_tb();

setInterval(function(){ load_tb(); }, 18000);

function load_tb()
{
  var data = $("#main_form").serializeArray();

  $.ajax({
    url: 'inc/lothun_money_ajax.php',
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


set_rob(2);

function set_rob(zone)
{
  var lot_zone_bet = <?=json_encode($lot_zone_bet);?>;
  var lang_rob = <?=json_encode($lot_rob);?>;
  var lot_robmun = <?=json_encode($lot_robmun);?>;
  var option = "";

  $(".rob").show(); 
  if(lot_zone_bet[zone] == 1)
  {
      $("#l_rob").text("");
      $(".rob").hide(); 
  }else if(lot_zone_bet[zone] == 2 || lot_zone_bet[zone] == 4)
  {
      $i = 0;
      $.each(lang_rob,function(index, el) {
        $i++;

        if($i <= lot_zone_bet[zone])
        {
          option += "<option value=\""+index+"\">"+el+"</option>";
        }

      });
  }else if(lot_zone_bet[zone] == 11)
  {
      $.each(lot_robmun,function(index, el) {
          option += "<option value=\""+index+"\">"+el+"</option>";
      });
  }else{
      for(var i=1; i<=96; i++)
      {
          option += "<option value=\""+i+"\">"+i+"</option>";
      }
  }
  $("#l_rob").text("").append(option);
  set_date();
  load_tb();
}


function set_date()
{
  var zone =  $("#l_zone").val();
  var rob  =  $("#l_rob").val();
  var d  =  $("#d").val();
  $.ajax({
    url: 'inc/lothun_getDate.php',
    type: 'GET',
    dataType: 'html',
    data: {zone: zone,rob: rob,d: d},
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