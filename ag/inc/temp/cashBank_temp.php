<?php require('inc_head.php');?>
<link rel="stylesheet" href="assets/css/custom/cashBank_temp.css?v1">
<div class="row pdTop">
    <div class="widget-body" id="loadBank">
        <div class="widget-main">

            <div class="row">
                <div class="col-xs-12 widthTable">
                    
                    <form class="form-horizontal" id="frnAddBank" action="" method="post">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-2 control-label "><strong> <?=$lang_ag[310];?> : </strong></label>
                            <div class="col-xs-12 col-sm-2">
                                <input type="hidden" name="bank_id" id="bank_id" value="">
                                <input type="text" id="bank_account_number" name="bank_account_number" placeholder="number" class="col-xs-12 col-sm-12" maxlength="10" minlength="10" data-validation="number length" data-validation-error-msg-number="value number" data-validation-length="10" data-validation-error-msg-length="value length 10" onKeyDown="return numberonly(event,this)">
                            </div>
                            <label class="col-xs-12 col-sm-2 control-label "><strong> <?=$lang_ag[311];?> : </strong></label>
                            <div class="col-xs-12 col-sm-2">
                                <input type="text" id="bank_account_name" name="bank_account_name" placeholder="name" class="col-xs-12 col-sm-12">
                            </div>
                            <label class="col-xs-12 col-sm-2 control-label "><strong> <?=$lang_ag[313];?> : </strong></label>
                            <div class="col-xs-12 col-sm-2">
                                <input type="text" id="bank_account_branch" name="bank_account_note" placeholder="note" class="col-xs-12 col-sm-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 col-sm-2 control-label "><strong> <?=$lang_ag[168];?> : </strong></label>
                            <div class="col-xs-12 col-sm-2">
                                <select class="form-control col-xs-12 col-sm-6" id="bank_name_id" name="bank_name_id">
                                     <option value=""><?=$lang_ag[1389];?></option>
                                    <?php 
                                            foreach ($arr_bank as $key => $value) {
                                                ?>
                                                    <option value="<?=$key;?>"><?=$value;?></option>
                                                <?
                                            }
                                     ?>
                                 </select>
                            </div>

                            <!-- <div class="form-group"> -->
                              <!--    <label class="col-xs-4 col-sm-2 control-label "><strong> <?=$lang_ag[318];?> : </strong></label>
                                 <div class="col-xs-12 col-sm-2">
                                     <select class="form-control col-xs-12 col-sm-6" id="bank_province" name="bank_province">   
                                         <option value=""><?=$lang_ag[320];?></option>
                                         <?php 

                                                 foreach ($arr_province as $key => $value) {
                                                     ?>
                                                         <option value="<?=$key;?>"><?=$value;?></option>
                                                     <?
                                                 }
                                          ?>
                                     </select>
                                     
                                 </div> -->
                            

                               <!--  <div class="col-xs-12 col-sm-3 btn-box">
                                    <label style="margin-top:5px;">&nbsp;&nbsp;
                                        <input name="flag_deposit" id="flag_deposit" class="ace ace-switch ace-switch-6" type="checkbox" value="Y">
                                        <span class="lbl">&nbsp;&nbsp;<?=$lang_ag[603];?></span>
                                    </label>
                                    <label>
                                        <input name="flag_withdrawal" id="flag_withdrawal" class="ace ace-switch ace-switch-6" type="checkbox" value="Y">
                                        <span class="lbl">&nbsp;&nbsp;<?=$lang_ag[601];?></span>
                                    </label>
                                </div> -->
                            <!-- </div> -->
                            <div class="btn-box col-xs-12 col-sm-12" style="margin-top:5px;" >
                                <button type="button" name="btSave"  id="btSave" value="save" class="btn btn-minier btn-success" onclick="cashBankSave('save');">
                                    <i class="ace-icon fa fa-floppy-o bigger-150"></i>
                                    <?=$lang_ag[178];?>                                </button>
                                <button class="btn btn-minier btn-danger" type="button" name="btDel" value="del" onclick="cashBankSave('del');">
                                    <i class="ace-icon fa fa-trash-o bigger-150"></i>
                                    <?=$lang_ag[180];?>                                </button>
                                <button class="btn btn-minier btn-primary" type="button" name="btDel" value="refresh" onclick="getMenu('cashBank');">
                                    <i class="ace-icon fa fa-refresh bigger-150"></i>
                                    <?=$lang_ag[316];?>                                </button>    
                            </div>
                        </div>
                    </form>

                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                   
                    <div class="table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center"><?=$lang_ag[310];?> </th>
                                    <th><?=$lang_ag[311];?></th>
                                    <th><?=$lang_ag[168];?></th>
                                    <!-- <th><?=$lang_ag[318];?></th> -->
                                   <!--  <th><?=$lang_ag[603];?></th>
                                    <th><?=$lang_ag[601];?></th> -->
                                    <th><?=$lang_ag[313];?></th>
                                    <th><?=$lang_ag[1658];?></th>
                                    <th> <?=$lang_ag[1665];?> </th>
                                    <th> Auto </th>
                                </tr>
                            </thead>

                            <tbody class="main_table">
                                <tr onclick="editBank(this);" class="cur">
                                            <td align="center" id="tdBank_account_number">123456789</td>
                                            <td align="center" id="tdBank_account_name">ดรีม</td>
                                            <td align="center" id="tdBank_en">Bangkok Bank</td>
                                            <td align="center" id="tdFlag_deposit">Y</td>
                                            <td align="center" id="tdFlag_withdrawal">Y</td>
                                            <td align="center" id="tdBank_account_branch">กรุงเทพมหานคร</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

            <hr>
        </div>
    </div>
    <div id="showModal"></div>
</div>

<script src="../../assets/js/main.js"></script>
<script type="text/javascript">

    loadData()
    function loadData()
    {
        $('#pageContent').load('show'); 
        $.ajax({
            url: '<?=$main_url;?>/inc/temp/cashBank_get_data.php',
            type: 'POST',
            dataType: 'json',
            // data: {param1: 'value1'},
        })
        .done(function(res) {

            var html = "";
            var l = 0;
            $.each(res.list, function( index, value ) {
                var is_chk = (value["bank_auto"] == 1) ? "checked" : "";
                var count_bank = (res["count_bank"][value["bank_id"]] === undefined) ? 0 : res["count_bank"][value["bank_id"]].length; 
                html += "<tr onclick=\"editBank(this,"+value["bank_id"]+");\" class=\"cur\">"+
                            "<td align=\"center\" id=\"tdBank_account_number\">"+value["bank_code"]+"</td>"+
                            "<td align=\"center\" id=\"tdBank_account_name\">"+value["bank_cname"]+"</td>"+
                            "<td align=\"center\" id=\"tdBank_en\">"+value["bank_name"]+"</td>"+
                            // "<td align=\"center\" id=\"tdBank_province\">"+value["bank_province_name"]+"</td>"+
                            
                            "<td align=\"center\" id=\"tdBank_account_branch\">"+value["bank_note"]+"</td>"+
                            "<td align=\"center\" id=\"\"> "+count_bank+" </td>"+
                            "<td align=\"center\" id=\"\">"+  
                                   " <button class='btn btn-white' style='padding:2px 5px;' onclick=\"viewUserSelectBank("+value["bank_id"]+");\">"+
                                   "  <i class='fa fa-search-plus' aria-hidden='true'></i> <?=$lang_ag[189];?> </button> "+
                             "</td>"+
                            "<td align=\"center\" id=\"\"> "+
                                    "<div class=\"ace-settings-item center chk-g\">"+
                                            "<input type=\"checkbox\" class=\"ace ace-checkbox-2 \" "+is_chk+" disabled=\"disabled\" >"+
                                            "<label class=\"lbl\" for=\"ace-settings-navbar\"></label>"+
                                    "</div>"+
                            "</td>"+
                        "</tr>";
                        l++;

            });


            if(l == 0)
            {
                 html += "<tr class=\"cur\">"+
                            "<td align=\"center\" colspan=\"100%\"><?=$lang_ag[1];?></td>"+
                        "</tr>";
            }  

           $('#dynamic-table tbody.main_table').text('');
           $('#dynamic-table tbody.main_table').append(html);
           $('#pageContent').load('hide'); 

        });
        

    }


    function viewUserSelectBank(bank_id,reload = false)
    {
         $.ajax({
            url: 'inc/temp/viewUserSelectBank.php',
            data: {bank_id: bank_id},
            type: 'POST',
            dataType: 'html',
            success: function (response) {
                $("#showModal").html(response);
                $("#viewLogModal").modal('show');
            },
            error: function (response) {
                console.log(response);
            }
       });
    }

    function cashBankSave(type){

        // console.log($("#bank_account_number").val().length)

        if($("#bank_account_number").val().length != 10)
        {
          errorAlert('<?=$lang_ag[1668];?>');
          return false;
        }


        $("#loadBank").load('show');
        $("#bank_account_number").blur();

        if($(".help-block").text() == ''){
            $("#loadBank").load('show');
        }

       

        var serializeFrm = $("form").serializeArray();
        serializeFrm.push({name: 'bt', value: type});

        $.ajax({
            url: path_host+'cashBankSave.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#loadBank").load('hide');
                
                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });
                    getMenu('cashBank');
                }else{
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-error'
                    });
                }
                
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function editBank(now,id){

        $('#bank_id').val(id);
        $('#bank_account_number').val($(now).find('#tdBank_account_number').text());
        $('#bank_account_name').val($(now).find('#tdBank_account_name').text());
        $('#bank_account_branch').val($(now).find('#tdBank_account_branch').text());

        $('#bank_name_id').find('option:selected').attr('selected', false);
        $('#bank_name_id option:contains("'+$(now).find('#tdBank_en').text()+'")').attr('selected', 'selected');

        // $('#bank_province').find('option:selected').attr('selected', false);
        $('#bank_province option:contains("'+$(now).find('#tdBank_province').text()+'")').attr('selected', 'selected');

        // $('#flag_deposit').prop("checked",($(now).find('#tdFlag_deposit').text()=='Y')? true : false);
        // $('#flag_withdrawal').prop("checked",($(now).find('#tdFlag_withdrawal').text()=='Y')? true : false);


        

        $("#btSave").attr('onclick','cashBankSave(\'edit\');');

    }

    $("#loadBank").load('hide');




function select_user(e){    
        var id =  $(e).attr("data-id");
        var bank_id =  $(e).attr("data-bank-id");
        var active =  "";

        if($(e).is(':checked')) {
            active = "Y";
        } else {
            active = "N";
        }

        var confirm = '<h5><?=$lang_ag[2163];?></h5>';
         bootbox.dialog({
           size : '',
           message : confirm,
           buttons:            
           {
             "success" :
             {
               "label" : "<?=$lang_ag[178];?>",
               "className" : "btn-sm btn-success",
               "callback": function()
               {
                  $.ajax({
                       url: 'inc/temp/viewUserSelectBank_save.php',
                       data: {id: id , bank_id: bank_id , active: active},
                       type: 'POST',
                       dataType: 'json',
                       success: function (response) {

                          if(response.status){
                            dialogSuccess(response.msg);
                          }else{
                            dialogError(response.msg);
                          }

                          loadData();
                          viewUserSelectBank(bank_id)

                          if ($(e).closest('tr').hasClass('bg_red')) {
                             $(e).closest('tr').removeClass('bg_red')
                          }else{
                            $(e).closest('tr').addClass('bg_red')
                          }
                         
                       },
                       error: function (response) {
                           console.log(response);
                       }
                  });

               }
             },
             "button" :
             {
               "label" : "<?=$lang_ag[256];?>",
               "className" : "btn-sm",
               "callback": function()
               {
                  if($(e).is(':checked')) {
                      $(e).prop('checked',false);
                  } else {
                      $(e).prop('checked',true);
                  }
               }
             }
           }
         });

        
}

</script>