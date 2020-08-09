<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 


$lot_typeArry = $lot_type["th"][1];

 $sql = "SELECT `lot_over` FROM `bom_tb_config` WHERE  `con_id` = 1";

 $rs= sql_array($sql);
 $ex_over = explode(",", $rs['lot_over']);


?>


 <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        อัตรารับสูงสุด
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#"><i class="fa fa-bar-chart"></i> หวย</a></li>
        <li class="active">อัตรารับสูงสุด</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
        <div class="col-md-6">
          <div class="box">
            <form action="" id="maxReceive_form" method="post">
             <table class="table table-bordered">
               <thead>
                  <tr>
                      <th>รายการ</th>
                      <th>Max / Number</th>
                  </tr>
               </thead>  
               <tbody>  
                <?php 

                foreach ($lot_typeArry as $key => $value) {
                ?>
                <tr>
                  <td><?=$value;?></td>
                  <td>
                     <input type="text" id="tlot_max_<?=$key;?>" name="tlot_max_<?=$key;?>" class="text-max-receive input-num2digt" value="<?=$ex_over[$key];?>"> 
                  </td>
                </tr>

                <?php 
                  }
                 ?>
               </tbody>

               <tbody>
                   <tr>
                       <td colspan="2" align="center">
                            <button type="button" class="btn btn-primary btn-sm" onclick="submit_data()">
                               <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                               บันทึก 
                           </button>
                          
                       </td>
                   </tr>
               
               </tbody>
             </table>
             </form>
          </div>
        </div>
</div>

<script>
  
function submit_data( type ){

  var x = $("#maxReceive_form").serializeArray();
  $.ajax({
    url: 'inc/lottoMaxReceiveSave.php',
    type: 'POST',
    dataType: 'json',
    data: x,
  })
  .done(function(res) {
    console.log("success");

    if(res.status)
    {
      alert(res.msg);
      location.reload();

    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });



}


</script>




      


		



    </section>
    <!-- /.content -->