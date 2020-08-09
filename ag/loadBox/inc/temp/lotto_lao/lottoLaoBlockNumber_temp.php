
<?php require('inc_head.php');?>
<link rel="stylesheet" href="<?=$main_url;?>/assets/css/lottoBlockNumber.css">
<div class="row">
    <div class="widget-box hidden-boder">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> Block Number Lotto Lao </strong></h4>
        </div>
        <div class="widget-body" id="blockNumber">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form class="form-horizontal" method="post">
                           <div class="form-group">
                                    
                                    <input type="hidden" value="3" name="l_zone">
                                    <input type="hidden" value="31" name="ttype">
                                    <label class="control-label text-left label-1" style="float: left;" for="username"><?=$lang_ag[227];?> :</label> 
                                    <span id="lot_num">
                                         
                                         <input name="tnumber" placeholder="<?=$lang_ag[227];?>" type="text" class="txt_back11n center" id="tnumber" size="8" maxlength="4" onkeydown="return numberonly(event,this)">
                                    </span>
                                   
                                    <input type="text" name="tsum" id="tsum" class="inputNumber input-box"  placeholder="<?=$lang_ag[182];?>" onkeydown="return numberonly(event,this)">

                                    <div class="col-xs-12 col-sm-3 col-md-3 mobile-padding input-box button-box" style="float: left;">
                                        <button type="button" class="btn btn-primary btn-sm" id="btn_save" onclick="submit_data('save')">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                            <?=$lang_ag[178];?>  
                                        </button>
                                    </div>
                            </div>
                        </form>
                        <div class="table-responsive col-xs-12 col-sm-12 col-md-8">
                            <table id="simple-table" class="table  table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th><center> <?=$lang_ag[183];?> </center></th>
                                        <th><center> <?=$lang_ag[205];?> </center></th>
                                        <th><center> <?=$lang_ag[184];?> </center></th>
                                        <th><center> <?=$lang_ag[273];?> </center></th>
                                        <th><center> <?=$lang_ag[185];?> </center></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
       
									   $sql = "SELECT * FROM `bom_tb_3_ag` WHERE  lot_rob='1' and lot_type = 31  and  `r_id` =  '".$_POST["session"]["r_id"]."' ";    
                                       $re = sql_query_lot($sql);
                                        $c = 0;
                                        while ($rs = sql_fetch_as($re)) {
                                          $c++;
                                          ?>
                                           <tr> 
                                                    <td align="center"><?=$rs["play_number"];?></td>
                                                    <td align="center"><?=$lotHun_typeArry[$rs["lot_type"]];?></td>
                                                    <td align="center">
                                                      <?php if($rs["s_lock"] == 1)
                                                      {
                                                        ?>
                                                          <span class="label label-danger"> <?=$lang_ag[142];?> </span> 
                                                        <?
                                                      } ?>
                                                    </td>
                                                    <td align="center"><?=$rs["s_sum"];?></td>
                                                    <td align="center">
                                                       <?=$rs["h_datetime"];?>
                                                    </td>
                                                    <td align="center">
                                                       <button type="button" class="btn btn-danger btn-sm" id="btn_del" onclick="delete_data(<?=$rs["play_number"];?>,<?=$rs["lot_type"];?>,3,1)">
                                                          <input type="hidden" id="status_del" name="status_del" value="">
                                                          <span class="ace-icon fa fa-trash icon-on-right bigger-110"></span>
                                                          <?=$lang_ag[180];?> 
                                                      </button>
                                                    </td>
                                            </tr>

                                          <?
                                         
                                        }

                                        if($c==0)
                                        {
                                          ?>
                                          <tr>
                                            <td colspan="100%" class="text-danger" style="text-align: center;"><?=$lang_ag[1];?></td>
                                          </tr>
                                          <?
                                        }
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=$main_url;?>/assets/js/main.js"></script>
<script src="<?=$main_url;?>/assets/js/lotto_fn.js"></script>
<script type="text/javascript">

     function _lot(type){

         $.ajax({
             url: '<?=$main_url;?>/inc/temp/lotto_lao/Lot_num_hit.php',
             type: 'POST',
             dataType: 'html',
             data: {"type":type},
         })
         .done(function(response) {

            // console.log(response);
         
            $("#lot_num").html(response);

         })
         .fail(function() {
             // console.log("error");
         })
         .always(function() {
             // console.log("complete");
         });
         
     }


    function getData(data){
        $('#lnum').val(data.lotto_number);
        $('#lcode').val(data.lotto_code);
        $('#status_del').val('deleted');
        $('#btn_del').removeAttr('disabled');
    }
    $("form").submit(function(){
        $("#blockNumber").load('show');
    });

    function submit_data( type ){

        var _value = $("#tnumber").val();
        var chk_l = $("#tnumber").attr("maxlength");


        if(parseInt(_value.length) !=  parseInt(chk_l) && $("#tnumber").is("input"))
        {
          
             $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> <?=$lang_ag[7];?> </h5>',
                    class_name: 'gritter-error'
                });
            return false;
        }
        
        var aData = {};
        var x = $("form").serializeArray();
        $.each(x, function(i, field){
            aData[ field.name ] = field.value;
        });

        aData[type] = type;

        $.post("lottoSetBlockNumberSave.php", aData, function( res ){
            var response = jQuery.parseJSON( res );
            if(response.status){
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
                getMenu('lottoLaoBlockNumber');
            }else{ 
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-error'
                });
            }
        });
        $.post("lottoLaoBlockNumber.php", aData, function( res ){
            
        });
    }

    function delete_data(num,type,zone,rob)
    {
      $.confirm({
          title: '',
          content: '<?=$lang_ag[2112];?>',
          buttons: {
              "<?=$lang_ag[16];?>": function () {
                 
                 $.ajax({
                   url: 'lottoSetBlockNumberSave.php',
                   type: 'POST',
                   dataType: 'json',
                   data: {tnumber:num,ttype:type,l_zone:zone,l_rob:rob,deleted:"deleted"},
                 })
                 .done(function(response) {
                   if(response.status){
                         $.gritter.add({
                             title: "",
                             text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                             class_name: 'gritter-success'                    
                         });
                         getMenu('lottoLaoBlockNumber');
                     }else{
                         $.gritter.add({
                             title: "",
                             text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                             class_name: 'gritter-error'
                         });
                     }
                 })
                 .fail(function() {
                   console.log("error");
                 })
                 .always(function() {
                   console.log("complete");
                 });

                 $.post("lottoLaoBlockNumber.php", {tnumber:num,ttype:type,l_zone:zone,l_rob:rob,deleted:"deleted"}, function( res ){
            
                 });

              },
              "<?=$lang_ag[256];?>": function () {
                  
              }
          }
      });

    }
</script>