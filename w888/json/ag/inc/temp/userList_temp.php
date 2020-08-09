<?php require('inc_head.php');?>
<style type="text/css">

div.widthTable
{
    width: 100%;
}

.editCreditBox
{
    /*float: right;
    width: 20px;
    margin-left: 10px;*/
}

  @media (max-width: 990px) { 
    .form-group div{
      padding-top: 5px;
    }
    .editCreditBox
    {
        float: none;
        width: 100%;
        margin-left: 0px;
    }
  }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="reloadUserList">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_userList[2];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload"> </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main padding-xs">
                <div class="row">
                    <div class="col-xs-12 widthTable">

                        <form class="form-horizontal" id="frmSearch">
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-1 no-padding-right" for="username"><strong><?=$lang_userList[3];?>:</strong></label>
                                <div class="col-xs-12 col-sm-3">
                                    <input type="text" id="username" name="username" value="" class="col-xs-12 col-sm-12" placeholder="username">
                                </div>

                               <!--  <div class="col-xs-4 col-sm-2">
                                    <select class="form-control input-sm col-xs-6 col-sm-6" id="futype" name="futype">
                                    	<option value="">รายชื่อ (ทั้งหมด)</option>
                                        <option value="M">สมาชิก</option>
                                        <option value="A">เอเย่นต์</option>
                                    </select>
                                </div> -->

                                <div class="col-xs-4 col-sm-2">
                                    <select class="form-control input-sm col-xs-6 col-sm-6" id="fuactive" name="fuactive">
                                       <option value="" selected=""><?=$lang_userList[4];?></option>
                                       <option value="1"><?=$lang_userList[5];?></option>
                                       <option value="0"><?=$lang_userList[6];?></option>
                                    </select>
                                </div>


                              <!--   <div class="col-xs-4 col-sm-2">
                                    <select class="form-control input-sm col-xs-6 col-sm-6" id="futype" name="futype">
                                        <option value="M">สมาชิก</option>
                                        <option value="A">เอเย่นต์</option>
                                    </select>
                                </div> -->
                                <div class="col-xs-4 col-sm-2">
                                    <select class="form-control input-sm col-xs-6 col-sm-6" id="list_sort" name="list_sort">
                                        <option value="1"><?=$lang_userList[9];?></option>
                                        <option value="2"><?=$lang_userList[10];?></option>
                                        <option value="3"><?=$lang_userList[11];?></option>
                                        <option value="4"><?=$lang_userList[12];?></option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-sm-2 xx">
                                    <button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="searchUserList(this);">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_userList[13];?>                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                     
                        <div class="table-responsive">
                            <table id="tbUserList" class="table table-bordered ">
                                <thead>
                                    <tr>
                                    <th class="center"><?=$lang_userList[14];?> </th>
                                    <th><?=$lang_userList[3];?></th>
                                    <th><?=$lang_userList[16];?></th>
                                    <th><?=$lang_userList[17];?></th>
                                    <th><?=$lang_userList[18];?></th>
                                    <th><?=$lang_userList[19];?></th>
                                    <th><?=$lang_userList[20];?></th>
                                    <th><?=$lang_userList[21];?> </th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="11">
                                            <div id="pagination">
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
    <div id="showModal"></div>
    <div id="test" data-member="" style="display: none;"></div>
</div>

<script src="../../assets/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
        });
    });
    function searchUserList(btnow,this_page=1){

      $('#pageContent').load('show');

      $rowPerPage = 30;

        $.ajax({
            url: 'memberUserList_all.php',
            data: { 
                fuser       : $('input[name="username"]').val(),
                fuactive    : $('select[name="fuactive"] option:selected').val(),
                futype      : $('select[name="futype"] option:selected').val(),
                list_sort   : $('select[name="list_sort"] option:selected').val(),
                thisPage    : this_page,
                rowPerPage  : $rowPerPage,
             
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                
                if(response.status){

                    var pagi_html = loadPagination(response.pagi_data);
                    $('#pagination').text('');
                    $('#pagination').html(pagi_html);

                    $("#tbUserList tbody").html(response.list);
                    $("#tbUserList thead").html(response.head);
                
                }else{
                    dialogError('data error');
                }
                $('#pageContent').load('hide');
            },
            error: function (response) {
                console.log(response);
            }
        });

    }

    function clickPage(page)
    {
            searchUserList('',page);
    }

    function roundnumber(rnum, rlength) { // Arguments: number to round, number of decimal places<br>// ทำตำแหน่งทศนิยมตามต้องการ
        rnum = rnum.toString();

        var exp = [];
        var lD = 0;

        exp = rnum.split('.');
        if(exp[1]){
            if(exp[1].length>rlength){
                lD = exp[1].length+1;
                exp[1] = exp[1]+'1';
            }
        }else{
            exp[1] = '00';
        }

        rnum = exp[0]+'.'+exp[1];

        var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
        return newnumber;
    }

    function changeStatus(id,ctype,now){

        $.ajax({
            url: 'memberUserList/changeStatus.php',
            data: { 
                id : id,
                ctype : ctype,
                cvalue : $(now).val()
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                if(response.status =='success'){
                    dialogSuccess(response.msg);
                     let thisPage = $("#pagi_nav").attr("data-page");
                     clickPage(thisPage)
                    // $("#search").click();
                }else{
                    dialogError(response.msg);
                }
            }
        });
    }

    function calCredit(type,e,max){

        var newCredit   = $("#credit").val();
        var val = $(e).val();
        val             = val.replace(/,/g, "");
        val = parseFloat(val) || 0.00;

        newCredit       = newCredit.replace(/,/g, "");

        if(type == 'i'){ // เพิ่ม
            newCredit = (parseFloat(newCredit) + parseFloat(val));

            if(parseFloat(val) > parseFloat(max))
            {
                newCredit += max;

                let credit = $('#credit').val().split(',').join(''); 
                newCredit = parseFloat(max) + parseFloat(credit);

                $(e).val(max)
            }

        }else{ // ลบ
            
            if(parseFloat(val) > parseFloat(max))
            {
                newCredit = (parseFloat(newCredit) - parseFloat(max));
                $(e).val(max);

            }else{

                newCredit = (parseFloat(newCredit) - parseFloat(val));
            }
     
        }

        $("#newCredit").val(formatNumber(newCredit,2,1));

    }

     function calCreditMax(e,max){

        var newCredit   = $("#credit").val();
      
        var val = $(e).val();
        val  = val.replace(/,/g, "");
     
        if(parseFloat(val) > parseFloat(max))
        {
            $(e).val(max);
        }
        
    }

    function editCredit(id,futype,oldCredit,edType){

        $.ajax({
            url: 'memberUserList/editCredit.php',
            data: { 
                id : id,
                oldCredit : oldCredit,
                edType : edType,
                futype : futype
             },
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                bootbox.dialog({
                    message:response.temp,
                    buttons:            
                    {
                        "OK" :
                        {
                            "label" : "<i class='ace-icon fa fa-check '></i> <?=$lang_userList[23];?>",
                            "className" : "btn-sm btn-primary",
                            "callback": function(e) {

                                if($("#newCredit").val() == ''){
                                    dialogError("<?=$lang_message[1];?>");
                                    return false;
                                }
                           
                                if(edType == "r")
                                {
                                    cradit_val = $('#reduceCredit').val();  
                                }else{
                                    cradit_val = $('#increaseCredit').val();
                                }

                                 if(cradit_val == '0.00'){
                                     dialogError("<?=$lang_message[7];?>");
                                     return false;
                                 }

                                $.ajax({
                                    url: 'memberUserList/changeCredit.php',
                                    data: { 
                                         id : id,
                                         futype : futype,
                                         edType : edType,
                                         cradit_val : cradit_val,
                                         creditold : oldCredit.split(',').join('') ,
                                         credit : $("#newCredit").val().split(',').join('') 
                                     },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (response) {
                                        if(response.status =='success'){
                                            dialogSuccess(response.msg);
                                            let thisPage = $("#pagi_nav").attr("data-page");
                                            clickPage(thisPage)                                            
                                        }else{
                                            dialogError(response.msg);
                                        }
                                    },
                                    error: function (response) {
                                        console.log(response);
                                    }
                                });
                            }
                        },
                        "NO" :
                        {
                            "label" : "<i class='ace-icon fa fa-close'></i> <?=$lang_userList[25];?>",
                            "className" : "btn-sm btn-danger"
                        }
                    }
                });

                if($( window ).width() > 990){
                    $('.modal-dialog').css('width','28%');
                }
                
            }
        });
    }

    function viewLogUser(user,id,futype){

        $.ajax({
            url: 'memberUserList/viewLogUser.php',
            data: {id: id ,futype:futype,user:user},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#showModal").html(response.temp);
                $("#viewLogModal").modal('show');
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
    
    function changePaswd(user,id,futype){

        $.ajax({
            url: 'memberUserList/editPassword/changePaswd.php',
            type: 'GET',
            dataType: 'json',
            data: {id: id ,futype:futype,user:user},
            success: function (response) {
                bootbox.dialog({
                    message:response.temp,
                    buttons:            
                    {
                        "OK" :
                        {
                            "label" : "<i class='fa fa-floppy-o'></i> <?=$lang_userList[22];?>",
                            "className" : "btn-sm btn-success",
                            "callback": function(e) {
                                $.ajax({
                                    url: 'memberUserList/changePassword.php',
                                    data: { 
                                        id : id,
                                        futype : futype,
                                        _token : $('input[name="_token"]').val(),
                                        oldpass: $('input[name="oldpass"]').val(),
                                        newpass: $('input[name="newpass"]').val()
                                     },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (response) {
                                        if(response.status =='success'){
                                            dialogSuccess(response.msg);
                                             let thisPage = $("#pagi_nav").attr("data-page");
                                            clickPage(thisPage)
                                            // $("#search").click();

                                        }else{
                                            dialogError(response.msg);
                                        }
                                    },
                                    error: function (response) {
                                        console.log(response);
                                    }
                                });
                            }
                        },
                        "NO" :
                        {
                            "label" : "<i class='ace-icon glyphicon glyphicon-log-in'></i> <?=$lang_userList[68];?>",
                            "className" : "btn-sm btn-primary"
                        }
                    }
                });
            }
        });

    }

    function copyUser(id,dtype){

        $.ajax({
            url: 'memberUserList/copyUser.php',
            data:{id:id,dtype:dtype},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                bootbox.dialog({
                    message:response.temp,
                    buttons:            
                    {
                        "OK" :
                        {
                            "label" : "<i class='fa fa-floppy-o'></i> <?=$lang_userList[24];?>",
                            "className" : "btn-sm btn-success",
                            "callback": function(e) {
                                 if(dtype == 'a')
                                 {
                                    url = 'inc/temp/memberUserList/saveCopyAgent_temp.php';
                                 }else{
                                    url = 'inc/temp/memberUserList/saveCopyUser_temp.php';
                                 }

                                $.ajax({
                                    url: url,
                                    data: { 
                                        futype : dtype,
                                        olduser_id : id,
                                        newuser: $('input[name="usernameCopy"]').val(),
                                        pass: $('input[name="password"]').val(),
                                        credit: $('input[name="credit"]').val(),
                                        name: $('input[name="name"]').val(),
                                        telephone: $('input[name="tel"]').val()
                                     },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (response) {
                                        if(response.status == true){
                                            dialogSuccess(response.msg);
                                            $("#search").click();
                                        }else{
                                            dialogError(response.msg);
                                        }
                                    },
                                    error: function (response) {
                                        console.log(response);
                                    }
                                });
                            }
                        },
                        "NO" :
                        {
                            "label" : "<i class='ace-icon glyphicon glyphicon-log-in'></i> <?=$lang_userList[68];?>",
                            "className" : "btn-sm btn-primary"
                        }
                    }
                });
            }
        });
    }

    jQuery(function($) {

        var page = "<?=$_POST['page'];?>";
        searchUserList('',page);    

        $( "#fuactive" ).change(function() {
            $("#search").click();
        });

        $( "#futype" ).change(function() {
            $("#search").click();
        });

    })

</script>
