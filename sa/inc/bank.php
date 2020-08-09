<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?


include('inc_head.php');

?>


 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ธนาคาร
        <small></small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">

    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการธนาคาร</h3>
            <div class="box-body table-responsive">
              <table id="dynamic-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">เอเย่นต์</th>
                  <th class="text-center">เลขบัญชี</th>
                  <th class="text-center">ชื่อบัญชี</th>
                  <th class="text-center">ธนาคาร</th>
                  <th class="text-center">หมายเหตุ</th>
                  <th class="text-center">Auto</th>
                </tr>
                </thead>
                <tbody>

                
                </tbody>
               
              </table>
            </div>
           
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

    </div>


    </section>
    <!-- /.content -->

    <script>
      
    loadData()
    function loadData()
    {
       var q = $("#shc").val();
        $.ajax({
            url: '<?=$main_url;?>/inc/get_data/get_cashBankdata.php',
            type: 'POST',
            dataType: 'json',
            data: {q: q},
        })
        .done(function(res) {

            var html = "";
            var l = 0;
            $.each(res.list, function( index, value ) {
                 
                var is_chk = (value["bank_auto"] == 1) ? "checked" : "";
                    
                var count_bank = (res["count_bank"][value["bank_id"]] === undefined) ? 0 : res["count_bank"][value["bank_id"]].length; 
                html += "<tr class=\"cur\">"+
                            "<td align=\"center\" id=\"\"> "+value["agent_user"]+" </td>"+
                            "<td align=\"center\" id=\"tdBank_account_number\">"+value["bank_code"]+"</td>"+
                            "<td align=\"center\" id=\"tdBank_account_name\">"+value["bank_cname"]+"</td>"+
                            "<td align=\"center\" id=\"tdBank_en\">"+value["bank_name"]+"</td>"+
                            "<td align=\"center\" id=\"tdBank_account_branch\">"+value["bank_note"]+"</td>"+
                             "<td align=\"center\" id=\"\"> <input type=\"checkbox\" class=\"form-check-input bank_auto\" "+is_chk+" onchange=\"set_bank_auto(this,'"+value["bank_id"]+"')\" style='cursor:pointer;'> </td>"+
                        "</tr>";
                        l++;

                       

            });


           $('#dynamic-table tbody').text('');
           $('#dynamic-table tbody').append(html);
           $('#dynamic-table').DataTable({"pageLength": 50})

        });
        

    }

    function set_bank_auto(e,_id)
    {

        var bank_auto = 0;
        if ($(e).is(':checked')) {
            bank_auto = 1;
        }

        $.ajax({
          url: '<?=$main_url;?>/inc/get_data/set_bank_auto.php',
          type: 'POST',
          dataType: 'json',
          data: {bank_id: _id,bank_auto:bank_auto},
        })
        .done(function(res) {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
    }



    </script>