<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 


// $lot_typeArry = $lot_type["th"][1];

?>

<!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
    ปิดรับเลข
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-bar-chart"></i> หวย</a></li>
    <li class="active">ปิดรับเลข</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
<div class="row">
   <div class="col-md-12">
     <div class="box">
        <div class="box-header"> 
          <form action="inc/lothun_print_bill_cut.php" id="main_form" target="_blank">
                    <div class="row" style="padding: 10px;">

                         <div class="mb-3 col-sm-3 col-xs-12 mb-1" id="lot_num">
                         
                            <input type="text" name="tnumber" placeholder="เลข" id="tnumber" maxlength="2" class="form-control input-num" value="">
                         </div>
                         <div class="mb-3 col-sm-3 col-xs-12 mb-1">
                            <input type="text" name="tsum" placeholder="จำนวนเงินที่รับ , 0=เต็ม" id="tsum" class="form-control input-num2digt" value="">
                         </div>
                          
                         <div class="mb-3 col-sm-3 col-xs-12 mb-1">
                            <label class="control-label text-left label-1" style="float: left; width: 80px;" for="username"> ประเภท : </label>
                            <select class="form-control sl-width " name="ttype" id="ttype" style="width: calc(100% - 80px);"  onchange="_lot(this.value);">
                              <option value="88"> 2บน+ล่าง+กลับ </option>
                              <option value="99"> 3ตัว+6กลับ</option>
                                <?php foreach ($lot_typeArry as $key => $value) {
                                    ?>
                                       <option value="<?=$key;?>"> <?=$value;?></option>
                                    <?
                                } ?>
                               
                            </select>
                         </div>

                         <div class="mb-3 col-sm-3 col-xs-12 mb-1">
                              <button type="button" class="btn btn-primary btn-sm wm-100" onclick="submit_data()">
                                 <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                 บันทึก 
                              </button>
                         </div>
                    </div> 
          </form>
        </div>
        <div class="box-body no-padding table-responsive responsive-width">

          <?php 
       
            // $lot_show in function.php
            foreach ($lot_show as $key => $value) {
              ?>
                  <div class="lot-table">
                       <table class="table table-bordered">
                        <thead>
                           <tr>
                               <th class="vaign_m" >ตัวเลข</th>
                               <th class="vaign_m" >ประเภท</th>
                               <th class="vaign_m" >สถานะ</th>
                               <th class="vaign_m" >จำนวน</th>
                               <th></th>
                           </tr>
                        </thead> 
                        <tbody id="loadTable_<?=$value;?>">
                          
                        </tbody>
                      </table>
                    
                  </div>
              <?
            }

            ?>
             <div class="lot-table">
                       <table class="table table-bordered">
                        <thead>
                           <tr>
                               <th class="vaign_m" >ตัวเลข</th>
                               <th class="vaign_m" >ประเภท</th>
                               <th class="vaign_m" >สถานะ</th>
                               <th class="vaign_m" >จำนวน</th>
                               <th></th>
                           </tr>
                        </thead> 
                        <tbody id="loadTable_another">
                          
                        </tbody>
                      </table>
                    
              </div>
            <?


           ?>
          <!--   <table class="table table-bordered">
              <thead>
                 <tr>
                     <th class="vaign_m" >ตัวเลข</th>
                     <th class="vaign_m" >ประเภท</th>
                     <th class="vaign_m" >สถานะ</th>
                     <th class="vaign_m" >จำนวน</th>
                     <th></th>
                 </tr>
              </thead> 
              <tbody id="loadTable">
                
              </tbody>
            </table> -->
        </div>
      
     </div>
   </div>
</div>
</section>
  <!-- /.content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>

 // get_data();
 loadTableBytype()
function loadTableBytype()
{
  var lot_show = <?=json_encode($lot_show);?>;
  $.each(lot_show,function(index,value){
      get_data(value);
  });

  get_data("another");


}

function submit_data( type ){

  var _value = $("#tnumber").val();
  var chk_l = $("#tnumber").attr("maxlength");


  if(parseInt(_value.length) !=  parseInt(chk_l) && $("#tnumber").is("input"))
  {
    
     alert("จำนวนเลขไม่ถูกต้อง");
      return false;
  }


  var data = $("#main_form").serializeArray();
  $.ajax({
    url: 'inc/lottoBlockNumberSave.php',
    type: 'POST',
    dataType: 'json',
    data: data,
  })
  .done(function(res) {
    console.log("success");

      // alert(res.msg);
      loadTableBytype();
      // location.reload();

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

function delete_data(num,type)
{
  $.confirm({
      title: '',
      content: 'คุณต้องการลบข้อมูลนี้หรือไม่',
      buttons: {
          ยืนยัน: function () {
             
             $.ajax({
               url: 'inc/lottoBlockNumberSave.php',
               type: 'POST',
               dataType: 'json',
               data: {tnumber:num,ttype:type,deleted:"deleted"},
             })
             .done(function(res) {
               
                 loadTableBytype();

                 // if(!res.status)
                 // {
                 //  alert(res.msg);
                 // }
               
             })
             .fail(function() {
               console.log("error");
             })
             .always(function() {
               console.log("complete");
             });

          },
          ยกเลิก: function () {
              
          }
      }
  });

}

function _lot(type){

    $.ajax({
        url: 'inc/lot_num_hit.php',
        type: 'POST',
        dataType: 'html',
        data: {"type":type},
    })
    .done(function(response) {

       // console.log(response);
    
       $("#lot_num").html(response);
       $("#tsum").val("");
       
    })
    .fail(function() {
        // console.log("error");
    })
    .always(function() {
        // console.log("complete");
    });
    
}


function get_data(type="")
{

  var data = $("#main_form").serializeArray();
      data.push({name: 'type', value: type});
   $("input#tnumber").val("");
   // $("input#tsum").val("");  
  $.ajax({
    url: 'inc/lottoBlockNumber_get_Data.php',
    type: 'POST',
    dataType: 'json',
    data: data,
  })
  .done(function(res) {
    
    var html = "";
    var l = res["list"].length;

    for(var i=0; i < l; i++)
    {
      html+="<tr>"+
             "<td class=\"vaign_m\">"+res["list"][i]["play_number"]+"</td>"+
             "<td class=\"vaign_m\">"+res["list"][i]["lot_type"]+"</td>"+
             "<td class=\"vaign_m\">"+res["list"][i]["s_status"]+"</td>"+
             "<td class=\"vaign_m\">"+res["list"][i]["s_sum"]+"</td>"+
             "<td class=\"vaign_m\">"+
              "<button type='button' class='btn btn-danger btn-sm' id='btn_del' onclick=\"delete_data('"+res["list"][i]["_play_number"]+"',"+res["list"][i]["_lot_type"]+")\">"+
          "<input type='hidden' id='status_del' name='status_del' value=''>"+
          "<span class='ace-icon fa fa-trash icon-on-right bigger-110'></span>"+
            "ลบ"
        "</button>"+
             "</td>"+
            "</tr>"; 
    }

    $("#loadTable_"+type).text("").append(html);

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}

</script>