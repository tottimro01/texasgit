<?php require('inc_head.php'); ?>

<?
$view_date=_bdate();
$d = ($_POST['getVal']['d'] == "") ? $view_date : $_POST['getVal']['d'];
?>

<link rel="stylesheet" href="assets/css/custom/sportBill_temp.css">
<div class="row">
    <div class="widget-box hidden-boder" id="reloadWinLoseByTeam">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[127];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <!-- <div class="col-xs-12"> -->
                        <!-- <div class="form-group"> -->
                                <form action="" id="mainForm" onsubmit="return false;">
                                <div class="col-xs-12 col-sm-4 col-md-2 mobile-padding">

                                       <!-- <input name="p" type="hidden" value="<?=$_GET[p];?>" /> -->
                                        <!-- <input name="b" type="hidden" value="<?=$_GET[b];?>" /> -->
                                        <!-- <input name="rob" type="hidden" value="<?=$_GET[rob];?>" /> -->
                                        <!-- <input name="mid" type="hidden" value="<?=$_GET[mid];?>" /> -->
                                        <!-- <input name="shop" type="hidden" value="<?=$_GET[shop];?>" /> -->
                                        <input name="view" type="hidden" value="1" />
                                   
                                       <div class="input-group">
                                         <input class="form-control date-picker" value="<?=$d;?>" id="d" name="d" type="text" data-date-format="dd-mm-yyyy" autocomplete="off">
                                         <span class="input-group-addon">
                                           <i class="fa fa-calendar bigger-110"></i>
                                         </span>
                                       </div>

                                        
                                     
                                </div>

                                <?php 
                                 $r_agent_id = $_POST["session"]["r_agent_id"].$_POST["session"]["r_id"]."*";
                                 $lv = intval($_POST["session"]["r_level"])+1;

                                 $sql = "SELECT * FROM `bom_tb_member` WHERE m_agent_id like '%$r_agent_id%' and m_level=$lv ";
                                 $re_agent = sql_query($sql);

                                ?>

                                <!-- <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username">จำนวนสูงสุดต่อหน้า :</label> -->
                                <div class="col-xs-12 col-sm-1 col-md-2 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="mid" name="mid">
                                            <option value=""><?=$lang_ag[1890];?></option>
                                           <? 
                                              foreach($re_agent as $value): 
                                              $slt = ($value['m_id'] == $_POST['getVal']['mid']) ? "selected = '' " : "";   
                                           ?>
                                                  <option value="<?=$value['m_id'];?>" <?=$slt;?> ><?=$value['m_user'];?>[ <?=$value['m_name'];?> ]</option>
                                            <? endforeach; ?>
                                    </select>
                                </div>

                                <!-- <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username">จำนวนสูงสุดต่อหน้า :</label> -->
                                <div class="col-xs-12 col-sm-1 col-md-2 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="b" name="b" value="<?=$_POST['getVal']['d'];?>">
                                            <option value="" selected="selected"><?=$lang_ag[735];?> <?=$lang_ag[174];?></option>
                                            <option value="1"><?=$lang_ag[735];?> <?=$lang_ag[1891];?></option>
                                            <option value="2"><?=$lang_ag[735];?> <?=$lang_ag[469];?></option>
                                    </select>
                                </div>


                                <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="orderby" name="orderby">
                                            <option value="1" <?=($_POST['getVal']['orderby']=="1") ? "selected = '' " : "";?>><?=$lang_ag[1892];?></option>
                                            <option value="2" <?=($_POST['getVal']['orderby']=="2") ? "selected = '' " : "";?>><?=$lang_ag[1893];?></option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2 mobile-padding">
                                    <input type="text" name="q" id="q" class="col-xs-12 col-sm-12 input-sm " placeholder="<?=$lang_ag[1404];?>..">
                                </div>

                                <label class="control-label col-xs-12 col-sm-2 col-md-1 no-padding-right" for="username"><?=$lang_ag[1170];?> :</label>
                                <div class="col-xs-12 col-sm-1 col-md-1 mobile-padding">
                                    <select class="form-control input-sm col-xs-4 col-sm-2 col-sm-4" id="perpage" name="perpapge">


                                            <option value="30" <?=($_POST['getVal']['perpapge']=="30") ? "selected = '' " : "";?> > 30 </option>
                                            <option value="50" <?=($_POST['getVal']['perpapge']=="50") ? "selected = '' " : "";?> > 50 </option>
                                            <option value="100" <?=($_POST['getVal']['perpapge']=="100") ? "selected = '' " : "";?> > 100 </option>
                                            <option value="500" <?=($_POST['getVal']['perpapge']=="500") ? "selected = '' " : "";?> > 500 </option>
                                            <option value="1000" <?=($_POST['getVal']['perpapge']=="1000") ? "selected = '' " : "";?> > 1000 </option>
                                            <option value="2000" <?=($_POST['getVal']['perpapge']=="2000") ? "selected = '' " : "";?> > 2000 </option>
                                            <option value="3000" <?=($_POST['getVal']['perpapge']=="3000") ? "selected = '' " : "";?> > 3000 </option>
                                            <option value="4000" <?=($_POST['getVal']['perpapge']=="4000") ? "selected = '' " : "";?> > 4000 </option>
                                            <option value="5000" <?=($_POST['getVal']['perpapge']=="5000") ? "selected = '' " : "";?> > 5000 </option>
                                    </select> 
                                </div>

                                </form>

                                <div class="col-xs-12 col-sm-4 col-md-12 mobile-padding">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search" onclick="get_data();">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        <?=$lang_ag[236];?>                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" id="filter_more">
                                        <span class="ace-icon fa fa-filter icon-on-right bigger-110"></span>
                                    </button>
                                </div>
                        <!-- </div> -->

                    <!-- </div> -->
                    <div class="col-xs-12">
                        <div class="table-responsive">
                           <form method="post" id="form_bill" action="<?=$main_url;?>/inc/temp/sport_bill/recive_bill.php">
                            <table id="tbSportBill" class="table table-striped table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th><strong><?=$lang_ag[254];?></strong></th>
                                        <th><strong><?=$lang_ag[189];?></strong></th>
                                        <th><strong><?=$lang_ag[1895];?></strong></th>
                                        <th><strong><?=$lang_ag[469];?></strong></th>
                                        <th><strong><?=$lang_ag[239];?></strong></th>
                                        <th><strong><?=$lang_ag[1406];?></strong></th>
                                        <th><strong><?=$lang_ag[191];?></strong></th>
                                        <th><strong><?=$lang_ag[1897];?></strong></th>
                                        <th><strong><?=$lang_ag[184];?></strong></th>
                                        <th><strong><?=$lang_ag[257];?></strong></th>
                                    </tr>
                                </thead>
                                <tbody id="loadData">   
                                    <tr>
                                        <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_ag[1];?></td>
                                    </tr>
                                </tbody>
                            </table>
                          </form>

                            <div id="pagination"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-7 col-xs-12">
                      </div> 
                      <div class="col-md-5 col-xs-12">
      
        <br>
            
          <table class="input-inline text-center" style="width: 100%;">
              <tbody>
                  <tr>
                      <td><?=$lang_ag[1658];?></td>
                      <td><input type="text" placeholder="0" class="temp-Input" id="quantity" name="numbill" value="0"></td>
                      <td class="hidden-xs"><?=$lang_ag[1898];?></td>
                  </tr>
                  <tr>
                      <td><?=$lang_ag[1406];?></td>
                      <td><input type="text" placeholder="0" class="temp-Input" id="totalPrice" value="0"></td>
                      <td class="hidden-xs"><?=$lang_ag[264];?></td>
                  </tr>
                  <tr>
                      <td><?=$lang_ag[191];?></td>
                      <td><input type="text" placeholder="0" class="temp-Input" id="totalDiscount" value="0"></td>
                      <td class="hidden-xs"><?=$lang_ag[264];?></td>
                  </tr>
                  <tr>
                      <td><?=$lang_ag[1897];?></td>
                      <td><input type="text" placeholder="0" class="temp-Input" id="totalPriceResult" value="0"></td>
                      <td class="hidden-xs"><?=$lang_ag[264];?></td>
                  </tr>
                  <tr>
                      <td>
                       
                      </td>
                      <td>
                         <button type="button" class="btn btn1 btn-info  print-button" id="pbtn" onclick="recive_bill2();">
                            <i class="fa fa-print" aria-hidden="true"></i> <?=$lang_ag[1899];?> &amp; <?=$lang_ag[502];?>
                          </button>
                      </td>
                      <td>
                      </td>
                  </tr>
            </tbody>
        </table>
          
          
          
        <br>
        <br>

      
      
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../../assets/js/main.js"></script>
<script type="text/javascript">    
    $(".digits").digits();

    jQuery(function($) {
        var d = new Date();
        strDate = d.getFullYear() + "/" + (d.getMonth()) + "/" + d.getDate();
        var sd = new Date(strDate)

          //datepicker plugin
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            startDate : sd,
            endDate  : d ,
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

         get_data();
    });


 

  function get_data(this_page=1)
  {
    var rowPerPage = $("#perpage").val();
    var d = $("#d").val();
    var q = $("#SearchUser").val();
    var b = $("#b").val();
    var shop = $("#shop").val();
    var orderby = $("#orderby").val();

    var data = $("#mainForm").serializeArray();
        data.push(
          {name: 'this_page', value: this_page},
          {name: 'rowPerPage', value: rowPerPage},
        );

    // let shop = $("#shop").val();
    if(shop == "")
    {
      $("#shop-title").text("<?=$lang_ag[1894];?>");
    }else{
      $("#shop-title").text("<?=$lang_ag[189];?>");
    }

    $.ajax({
      url: 'inc/temp/sport_bill/get_bill_ac.php',
      type: 'GET',
      dataType: 'html',
      data: data,
    })
    .done(function(res) {
        $("#loadData").text("").append(res);
        var pagi_html = loadPagination(pagi_data);
        $('#pagination').text('');
        $('#pagination').html(pagi_html);


    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

    $.ajax({
      url: 'inc/temp/sport_bill/get_bill_ac_total.php',
      type: 'GET',
      dataType: 'json',
      data: data,
    })
    .done(function(res) {
       $("#sum1").text("").append(res.sum1);
       $("#sum2").text("").append(res.sum2);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


  }

  function clickPage(page)
  {
    get_data(page);
  }

  function sportBillDetail(matchId,betType){

        $.ajax({
            url: 'sportBillDetail',
            data: { 
                 matchId : matchId
             },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                $(".trbill .divBill").slideUp();
                $(".trbill").hide();

                $("#div"+response.matchId).html(response.temp);
                $("#tr"+response.matchId).slideDown();
                $("#div"+response.matchId).slideDown();

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function closeTr(now){
        $(now).closest('tr').closest('table').closest('div').slideUp(function(){
            $(now).closest('tr').closest('table').closest('div').closest('tr').hide();
        });
    }



    function set_check(e){
      val_chk = "";
      $( ".chk_bill_send" ).each(function( index ) {
        //console.log( index + ": " + $( this ).val() );
        if($( this ).prop("checked")==true){
          if(val_chk==""){
            val_chk = $( this ).val();
          }else{
            val_chk = val_chk+","+$( this ).val();
          }
        }
      });
      calc_row_total(e);

    }
    

    var totalPrice=0;
    var totalDiscount=0;
    var totalPriceResult=0;
    var countChecked = 0;


    function calc_row_total(e)
    {
        var valuePrice = $(e).attr("data-price");
        valuePrice = TrimComma(valuePrice);
        valuePrice = parseInt(valuePrice);

        var valueDiscount = $(e).attr("data-discount");
        valueDiscount = TrimComma(valueDiscount);
        valueDiscount = parseInt(valueDiscount);  

        var valuePriceResult = $(e).attr("data-priceResult");
        valuePriceResult = TrimComma(valuePriceResult);
        valuePriceResult = parseInt(valuePriceResult);

        //var namRow =$(this).attr("name");


         // เวลากด check ใน mobile แล้ว กด - กำหนดค่าที่ check ให้ยังอยู่  
         $(e).attr('checked',true);
        
         if(e.checked) {
           totalPrice +=valuePrice;
           totalDiscount +=valueDiscount;
               totalPriceResult +=valuePriceResult;
               countChecked +=1;
             

            }else {

             totalPrice -=valuePrice;
           totalDiscount -=valueDiscount;
               totalPriceResult -=valuePriceResult;
               countChecked -=1;


            }

          var countChecked1 = addCommas(countChecked);
         $("#quantity").attr("value", countChecked1);

         var totalPrice1 = addCommas(totalPrice);
         $("#totalPrice").attr("value", totalPrice1);

         var totalDiscount1 = addCommas(totalDiscount);
         $("#totalDiscount").attr("value", totalDiscount1);

         var totalPriceResult1 = addCommas(totalPriceResult);
         $("#totalPriceResult").attr("value", totalPriceResult1);

         
         var a = $(e).attr("data-discount");
    }

function recive_bill2(){

  $.ajax({
        type: "POST",
        url: "inc/temp/sport_bill/update_recive.php",
        data: new FormData( document.getElementById("form_bill") ),
        processData: false,
        contentType: false,
        dataType:"json",
        cache: false, // Clear cache IE
        beforeSend: function(){
        },
        success: function(data){

          $("#send_pbill").val(data.bill);
          get_data();
          check_countdown(data.coundow);
          //$("#b_ac2").live("click");
          // _view_ac();

        }
      });
  // _view_ac();
}


function check_countdown(val){
  if(val==0){
          var w = window.open('<?=$main_url;?>inc/temp/sport_bill/recive_bill.php','Popup_Window','scrollbars=yes,resizable=yes,width=350,height=400');
          var myForm = document.getElementById("form_bill");
          myForm.target = 'Popup_Window';
          myForm.submit();
  }else{
    $("#pbtn").html("<?=$lang_ag[2092];?> : <span id=\"timer\"></span>");
    $("#pbtn").attr("disabled" , "disabled");
    document.getElementById('timer').innerHTML = 03 + ":" + 00;
    startTimer();
  }
}




</script>
