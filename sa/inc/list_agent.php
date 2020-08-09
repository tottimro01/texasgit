<div class="modal fade" id="modal-addCredit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มเครดิต</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                      <label for="username">เครดิต</label>
                      <input type="text" class="form-control numeric input-num2digt" id="credit_i" value="0.00" name="credit" placeholder="เครดิต" disabled="">
                    </div>
                  </div>

                  <div class="col-md-12">
                   <div class="form-group">
                      <label for="username">เพิ่มเครดิต</label>
                      <input type="text" class="form-control numeric input-num2digt" id="increaseCredit" value="0.00" name="increaseCredit" placeholder="เพิ่มเครดิต">
                    </div>
                  </div>

                  <div class="col-md-12">
                   <div class="form-group">
                      <label for="username">เครดิตใหม่</label>
                      <input type="text" class="form-control numeric input-num2digt" id="newCredit_i" value="0.00" name="newCredit" placeholder="เครดิต" disabled="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" style="min-width: 100px; margin: 0 5px;" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" id="increase_btn" style="min-width: 100px; margin: 0 5px;">เพิ่ม</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-removeCredit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ลบเครดิต</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                      <label for="username">เครดิต</label>
                      <input type="text" class="form-control numeric input-num2digt" id="credit_r" value="0.00" name="credit" placeholder="เครดิต" disabled="">
                    </div>
                  </div>

                  <div class="col-md-12">
                   <div class="form-group">
                      <label for="username">ลดเครดิต</label>
                      <input type="text" class="form-control numeric input-num2digt" id="reduceCredit" value="0.00" name="reduceCredit" placeholder="เพิ่มเครดิต" onkeyup="calCredit('r',this,0)">
                      <span class="text-danger label-sm span_block" id="maxCredit" data-json="500,000">(<= 500,000) </span>
                    </div>
                  </div>

                  <div class="col-md-12">
                   <div class="form-group">
                      <label for="username">เครดิตใหม่</label>
                      <input type="text" class="form-control numeric input-num2digt" id="newCredit_r" value="0.00" name="newCredit" placeholder="เครดิต" disabled="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" style="min-width: 100px; margin: 0 5px;" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" id="reduce_btn" style="min-width: 100px; margin: 0 5px;">ลบ</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>


 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        รายการตัวแทน
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">รายการตัวแทน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-solid">
        <div class="box-header with-border">
              <i class="fa fa-list-ul"></i>
              <h3 class="box-title">รายการตัวแทน</h3>
        </div>
        <div class="box-body table-responsive">
              <table class="table table-bordered table-hover" id="table_data">
                <thead>
                  <tr>
                    <th class="vaign_m">ลำดับ</th>
                    <th class="vaign_m">สกุลเงิน</th>
                    <th class="vaign_m">ชื่อผู้ใช้</th>
                    <th class="vaign_m">สถานะ</th>
                    <th class="vaign_m">ยกเลิกบิล</th>
                    <th class="vaign_m">เครดิต</th>
                    <th class="vaign_m">เครดิตที่เปิดให้สมาชิกทั้งหมด</th>
                    <th class="vaign_m">เครดิตคงเหลือ</th>
                    <th class="vaign_m">การจัดการ</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                    $lv = 1;
                    $sql = "SELECT * FROM `bom_tb_agent` WHERE 1 and r_level = $lv";
                    $re=sql_query($sql);

                    $c = 0;
                    while($rs=sql_fetch($re)){
                      $c++;
                 
                    if($rs["r_active"]  == 1)
                    {
                        $active1 = "selected";
                        $active2 = "";
                    }else{
                        $active1 = "";
                        $active2 = "selected";
                    }


                $load_session = $_SESSION;
                $r_id = $rs["r_id"];
                $ag_level = $rs["r_level"];
                include "get_balance.php";  

                ?>
                  <tr>
                    <td class="vaign_m"> <?=$c;?> </td>
                    <td class="vaign_m"> <?=$rs['r_currency'];?> </td>
                    <td class="vaign_m"> <i class="fa fa-user-secret"></i> <?=$rs['r_user'];?> [ <?=$rs['r_name'];?> ]</td>
                    <td class="vaign_m">
                        <select class="form-control" onchange="changeStatus('<?=$rs['r_id'];?>','S','A',this);">
                          <option value="1" <?=($rs["r_active"] == 1) ? "selected" : ""; ?> >เปิดใช้งาน</option>
                          <option value="0" <?=($rs["r_active"] == 0) ? "selected" : ""; ?>>ระงับ</option>


                        </select>
                    </td>
                    <td class="vaign_m">
                        <select class="form-control" onchange="changeStatus('<?=$rs['r_id'];?>','B','A',this);">
                          <option value="1" <?=($rs["r_sport_delete_bill"] == 1) ? "selected" : ""; ?> >เปิดใช้งาน</option>
                          <option value="0" <?=($rs["r_sport_delete_bill"] == 0) ? "selected" : ""; ?> >ระงับ</option>
                        </select>
                    </td>
                    <td class="vaign_m" style="vertical-align:middle; text-align: center; min-width: 75px;">
                         <?=number_format($rs["r_count"],2);?>
                      <div class="editCreditBox">
                        <span class="label label-sm label-info" data-toggle="modal" data-target="#modal-addCredit" style="cursor:pointer; margin:0 5px;" onclick="editCredit('<?=$rs['r_id'];?>','A','<?=$rs['r_count'];?>','i');"> 
                          <i class="fa fa-plus" aria-hidden="true"></i> 
                        </span> 
                        <span class="label label-sm label-info" data-toggle="modal" data-target="#modal-removeCredit" style="cursor:pointer; margin:0 5px;" onclick="editCredit('<?=$rs['r_id'];?>','A','<?=$rs['r_count'];?>','r');"> 
                          <i class="fa fa-minus" aria-hidden="true"></i> 
                        </span>
                      </div>
                    </td>
                    <td class="vaign_m"> <?=_cbp($x_count_total,2);?> </td>
                    <td class="vaign_m"> <?=_cbp($x_count3,2);?> </td>
                    <td class="vaign_m">
                        <center>
                            <a href="?p=edit_agent&g_p=list_agent&id=<?=$rs['r_id'];?>">
                                <button class="btn btn-block btn-default" style="padding:2px 5px;">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> รายละเอียด
                                </button>
                            </a>
                        </center>
                    </td>
                  </tr>

                  <?php 
                    }

                      if($c == 0)
                      {
                    ?>
                        <tr>
                          <td colspan="100%" align="center"> ไม่พบข้อมูล </td>
                        </tr>
                    <?
                      }

                   ?>
                </tbody>
              </table>
        </div>

      </div>  
    



    </section>
    <!-- /.content -->

    <script>

      $('#table_data').DataTable({
            "pageLength": 50});

       function changeStatus(id,acType,ctype,now){
          $.ajax({
              url: 'inc/changeStatus.php',
              data: { 
                  id : id,
                  ctype : ctype,
                  acType : acType,
                  cvalue : $(now).val(),
               },
              type: 'POST',
              dataType: 'json',
              success: function (res) {

                  if(res.status){
                      alert(res.msg)
                      // if(res.msg)
                      // {
                      //   location.reload(true);
                      // }
                  }else{
                       alert(res.msg)
                  }
              }
          });
      }


      function editCredit(id,futype,oldCredit,edType)
      {

          $.ajax({
            url: '/inc/editCredit_A.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                id : id,
                oldCredit : oldCredit,
                edType : edType,
                futype : futype
             },
          })
          .done(function(res) {

            if(edType == "r")
            {
              // newCredit_r
              $("#modal-removeCredit input").val("0.00");
              $("#modal-removeCredit #credit_r").val(local2ddigits(parseFloat(res.r_count))); 
              $("#modal-removeCredit #newCredit_r").val(local2ddigits(parseFloat(res.r_count))); 
              $("#modal-removeCredit #maxCredit").text("( <= "+local2ddigits(res.x_count)+")"); 
              $("#modal-removeCredit #maxCredit").attr("data-json",res.x_count.toFixed(2))
              $("#modal-removeCredit #reduceCredit").attr("onkeyup","calCredit('r',this,"+res.x_count.toFixed(2)+")")
              $("#modal-removeCredit #reduce_btn").attr("onclick","changeCredit('"+id+"','r')"); 

               
            }else{
              $("#modal-addCredit input").val("0.00");
              $("#modal-addCredit #credit_i").val(local2ddigits(parseFloat(res.r_count))); 
              $("#modal-addCredit #increaseCredit").attr("onkeyup","calCredit('i',this,100000000)")
              $("#modal-addCredit #increase_btn").attr("onclick","changeCredit('"+id+"','i')"); 
            }

          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
      }

function changeCredit(id,edType){


  if(edType == "r")
  {
    var cradit_val = $("#reduceCredit").val().split(',').join('') 
    var credit = $("#newCredit_r").val().split(',').join('') 
  }else if(edType == "i")
  {
    var cradit_val = $("#increaseCredit").val().split(',').join('') 
    var credit = $("#newCredit_i").val().split(',').join('') 
  }else{
    return false;
  }

  $.ajax({
    url: '/inc/changeCredit.php',
    type: 'POST',
    dataType: 'json',
    data: {
      id : id,
      futype : "A",
      edType : edType,
      cradit_val : cradit_val,
      credit : credit
    },
  })
  .done(function(res) {
    alert(res.msg)
    if(res.msg)
    {
      location.reload(true);
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}




    function calCredit(type,e,max){

      var val = $(e).val();
          val = val.replace(/,/g, "");
          val = parseFloat(val) || 0.00;

      if(type == 'i'){// เพิ่ม
        let newCredit   = $("#credit_i").val();
        newCredit       = newCredit.replace(/,/g, "");
        newCredit = (parseFloat(newCredit) + parseFloat(val));
        if(parseFloat(val) > parseFloat(max))
        {
            newCredit += max;
            let credit = $('#credit_i').val().split(',').join(''); 
            newCredit = parseFloat(max) + parseFloat(credit);
            $(e).val(max)
        }
        newCredit = local2ddigits(newCredit);
        $("#newCredit_i").val(newCredit);

      }else{// ลบ
         let newCredit   = $("#credit_r").val();
         newCredit       = newCredit.replace(/,/g, "");
        if(parseFloat(val) > parseFloat(max))
        {
            newCredit = (parseFloat(newCredit) - parseFloat(max));
            $(e).val(max);
        }else{
            newCredit = (parseFloat(newCredit) - parseFloat(val));
        }
            newCredit = local2ddigits(newCredit);
            $("#newCredit_r").val(newCredit);
        }
    }

    </script>

   