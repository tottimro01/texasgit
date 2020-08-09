
<?php 



if($_GET[zone]!=""){ $kzone="  and lot_zone='$_GET[zone]' ";}else{ $kzone="  and lot_zone='2' "; }
if($_GET[rob]!=""){ $krob="  and lot_rob='$_GET[rob]' ";}else{ $krob="  and lot_rob='1' "; }

?>
<!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
    ปิดรับเลข
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-line-chart"></i> หวยหุ้น</a></li>
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
                    <div class="row setBlockRow" style="padding: 10px;">

                         <?php 
                            $lot_zone = $lot_zone["th"]["zone"];
                         ?>

                         <div class="mb-4 col-sm-4 col-xs-12 ">
                            <label class="control-label text-left label-1" style="float: left; width: 80px;" for="username"> หมวด : </label>
                            <select class="form-control lot_sl" style="width: calc(100% - 80px);" id="l_zone" name="l_zone" onchange="set_type(this.value); set_rob(this.value); loadTableBytype()">
                                <?php foreach ($lot_zone as $key => $value) {
                                  if($key != 1)
                                  {
                                    ?>
                                       <option value="<?=$key;?>"> <?=$value;?></option>
                                    <?
                                  }  
                                } ?>
                            </select>

                         </div>

                         <div class="mb-4 col-sm-4 col-xs-12 rob">
                            <label class="control-label text-left label-1" style="float: left; width: 80px;" for="username"> รอบ : </label>
                            <select class="form-control lot_sl" style="width: calc(100% - 80px);" name="l_rob" id="l_rob"  onchange="loadTableBytype()">
                               
                            </select>
                         </div>

                        
                    </div>
                    <div class="row">
                         <div class="mb-3 col-sm-3 col-xs-12 ">
                          <div style="width: 100%;">
                            <label class="control-label text-left label-1" style="float: left; width: 80px;" for="username">  </label>
                            <div id="lot_num" style="float: left; width: calc(100% - 80px); padding-left: 10px;">
                              <input type="text" name="tnumber" placeholder="เลข" id="tnumber" maxlength="2" class="form-control input-num" value="">
                            </div>
                           </div> 
                         </div>
                         <div class="mb-3 col-sm-3 col-xs-12 ">
                            <input type="text" name="tsum" placeholder="จำนวนเงินที่รับ , 0=เต็ม" id="tsum" class="form-control input-num2digt" value="">
                         </div>

                          <div class="mb-3 col-sm-3 col-xs-12 ">
                            <label class="control-label text-left label-1" style="float: left; width: 80px;" for="username"> ประเภท : </label>
                            <select class="form-control lot_sl" style="width: calc(100% - 80px);" name="ttype" id="ttype"   onchange="_lot(this.value);">
                              <option value="88"> 2บน+ล่าง+กลับ </option>
                              <option value="99"> 3ตัว+6กลับ</option>
                                <?php 
                                  foreach ($lotHun_typeArry as $key => $value) {
                                    if($key != 31)
                                    {
                                      ?>
                                         <option value="<?=$key;?>"> <?=$value;?></option>
                                      <?
                                     } 
                                  }
                                ?>
                            </select>
                         </div>

                         <div class="mb-3 col-sm-3 col-xs-12 ">
                              <button type="button" class="btn btn-primary btn-sm" onclick="submit_data()">
                                 <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                 บันทึก 
                              </button>
                         </div>


                        
                    </div> 
          </form>
        </div>
        <div class="box-body no-padding table-responsive">

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



           <!--  <table class="table table-bordered">
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

var lotHun_typeArry = <?=json_encode($lotHun_typeArry);?>;
set_rob(2);


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
    url: 'inc/lottoSetBlockNumberSave.php',
    type: 'POST',
    dataType: 'json',
    data: data,
  })
  .done(function(res) {
 

     if(!res.status)
     {
      alert(res.msg)
     }else{
       loadTableBytype();
     }
 
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

function set_type(zone)
{
  var _option = "<option value=\"88\"> 2บน+ล่าง+กลับ </option>"+
                "<option value=\"99\"> 3ตัว+6กลับ</option>";
  if(zone == 3)
  {
    $.each(lotHun_typeArry,function(index, el) {
      _option += "<option value=\""+index+"\"> "+el+" </option>"
    });
  }else{
    $.each(lotHun_typeArry,function(index, el) {
       if(index!=31)
       {
          _option += "<option value=\""+index+"\"> "+el+" </option>";
       } 
      
    });
  }

  $("#ttype").text("").append(_option);
  
}

function delete_data(num,type,rob)
{
	var zone = $("#l_zone").val();
  $.confirm({
      title: '',
      content: 'คุณต้องการลบข้อมูลนี้หรือไม่',
      buttons: {
          ยืนยัน: function () {
             
             $.ajax({
               url: 'inc/lottoSetBlockNumberSave.php',
               type: 'POST',
               dataType: 'json',
               data: {tnumber:num,ttype:type,deleted:"deleted" ,l_zone:zone,l_rob:rob},
             })
             .done(function(res) {

                 
                loadTableBytype();
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

}



function get_data(type="")
{

  var data = $("#main_form").serializeArray();
      data.push({name: 'type', value: type});
   $("input#tnumber").val("");
   // $("input#tsum").val("");  
  $.ajax({
    url: 'inc/lottoSetBlockNumber_get_Data.php',
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
             	"<button type='button' class='btn btn-danger btn-sm' id='btn_del' onclick=\"delete_data('"+res["list"][i]["_play_number"]+"',"+res["list"][i]["_lot_type"]+","+res["list"][i]["lot_rob"]+")\">"+
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