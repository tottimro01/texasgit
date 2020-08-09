
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">  
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>



        <form action="index.php?cmd=listmedicine&subcmd=insertmedicine" method="post" enctype="multipart/form-data" id="insertmedicine">
        
        
          <div class="form-group">
            <label for="recipient-name" class="control-label thaisan">รูปภาพ</label>
            <input name="fileUpload" type="file" class="form-control" id="fileUpload" style="border:0px">                                        
          </div>
        
        
          <div class="form-group">
            <label for="recipient-name" class="control-label thaisan">ชื่อยา</label>
            <input type="text" class="form-control" name="txtMedname" id="txtMedname" placeholder="โปรดระบุ ?">                                      
          </div>      
          
          <!--<div class="form-group">
            <label for="recipient-name" class="control-label thaisan">การใช้งาน</label>
            <textarea class="form-control" name="txtMeduse" id="txtMeduse" placeholder="โปรดระบุ ?"></textarea>                                        
          </div>   --> 

          
          <div class="form-group">
            <label for="recipient-name" class="control-label thaisan">รายละเอียดยา/อื่นๆ</label>
            <textarea class="form-control" name="txtMeddetail" id="txtMeddetail" placeholder="โปรดระบุ ? ถ้าไม่มีข้อมูลให้ใส่ -"></textarea>  
		  </div>     
          
                    
          <div class="form-group">
            <label for="recipient-name" class="control-label thaisan">ราคา</label>
            <input type="text" class="form-control" name="txtMedprice" id="txtMedprice" onkeyup="dokeyup(this);" onchange="dokeyup(this);" onkeypress="checknumber()" placeholder="โปรดระบุ ? ถ้าไม่มีข้อมูลให้ใส่ 0"> 
          </div> 
          

          <!--<span id="mySpanInsertMed" class="thaisan" style="padding:10px;"></span>-->

      </div>
                <div class="modal-footer thaisan">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="reset" class="btn">ล้างข้อมูล</button>
                <button type="submit" class="btn" style="background-color:#fd4fa9; color:#FFFFFF">บันทึก</button>
              </div>
        </form>    


<script>
$(document).ready(function () {

    $('#insertmedicine').validate({
        rules: {
            txtMedname: {
                minlength: 3,
                required: true
            },
            txtMeddetail: {
                minlength: 1,
                required: true
            },
			txtMedprice: {
                minlength: 1,
                required: true
            }
        },
    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
        }
    });

});
</script>