<?
  $pageTitle = "ธนาคาร";
  $menuKey = "_bank";
  require 'header.php';
?>

<style>
	
	.bank_auto
	{
		margin: 0;
		margin-top: -8px;
	}


	#dynamic-table tr
	{
		height: 35px;
	}

	.page-item.active .page-link {
    	z-index: 1;
	    color: #fff;
	    background-color: #8c7531;
	    border-color: #8c7531;
	}

</style>

<div class="py-2">
    <div class="container container-alt">
        <form action="process/GetBillVAR.php" method="get" class="formGetVal" id="formGetVAR" data-onsuccess="GetBillVARCallback">
            <!-- <input type="hidden" name="sport" value="<?=$qSportId;?>" /> -->
        </form>
        <div>
            <table class="sport-match-header sport-match-table-sizer bill_var table-bordered" id="dynamic-table">
                <thead class="text-center small h3" >
                    <tr>
                        <th class="bd-m-1 h6 p-3 text-white bg-m-1">เอเย่นต์</th>
                        <th class="bd-m-1 h6 p-3 text-white bg-m-1">เลขบัญชี</th>
                        <th class="bd-m-1 h6 p-3 text-white bg-m-1">ชื่อบัญชี</th>
                        <th class="bd-m-1 h6 p-3 text-white bg-m-1">ธนาคาร</th>
                        <th class="bd-m-1 h6 p-3 text-white bg-m-1" width="30%">หมายเหตุ</th>
                        <th class="bd-m-1 h6 p-3 text-white bg-m-1">Auto</th>
                    </tr>
                </thead>
                <tbody>

                
                </tbody>
            </table>
        </div>
        <div id="bill_var_table"></div>
    
    </div>
</div>

<?
  #  include 'sport_result_tmpl.html';
    require 'footer.php';
?>

<script>
	
showLoader(false);
loadData()
function loadData()
{
  showLoader(true);
   var q = $("#shc").val();
    $.ajax({
        url: '/process/get_cashBankdata.php',
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
       $('#dynamic-table').DataTable({
          "pageLength": 50,
           "columnDefs": [
              { "width": "40%", "targets": 4 }
           ]
        })

       showLoader(false);

    });
    

}

 function set_bank_auto(e,_id)
 {

     var bank_auto = 0;
     if ($(e).is(':checked')) {
         bank_auto = 1;
     }

     $.ajax({
       url: '/process/set_bank_auto.php',
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