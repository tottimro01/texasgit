
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
                                    

                                    <label class="control-label text-left label-1" style="float: left;" for="username">Number Block :</label>
                                    <span id="lot_num">
                                         
                                         <input name="tnumber" placeholder="Number Block" type="text" class="txt_back11n center" id="tnumber" size="8" maxlength="3" onkeydown="return numberonly(event,this)">
                                    </span>
                                   
                                    <input type="text" name="tsum" id="tsum" class="inputNumber input-box"  placeholder="<?=$lang_lotHun[9];?>" onkeydown="return numberonly(event,this)">

                                    <select class="input-sm" name="ttype" id="ttype" style="height:30px;" onchange="_lot(this.value);">
                                        
                                        <?php foreach ($lot_typeArry as $key => $value) {
                                            ?>
                                               <option value="<?=$key;?>"> <?=$value;?></option>
                                            <?
                                        } ?>
                                       
                                    </select>

                                    <div class="col-xs-12 col-sm-3 col-md-3 mobile-padding input-box button-box" style="float: left;">
                                        <button type="button" class="btn btn-primary btn-sm" id="btn_save" onclick="submit_data('save')">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                            <?=$lang_lotLao[5];?>  
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" disabled="disabled" id="btn_del" onclick="submit_data('deleted')">
                                            <input type="hidden" id="status_del" name="status_del" value="">
                                            <span class="ace-icon fa fa-trash icon-on-right bigger-110"></span>
                                            <?=$lang_lotLao[7];?> 
                                        </button>
                                    </div>
                            </div>
                        </form>
                        <div class="table-responsive col-xs-12 col-sm-12 col-md-8">
                            <table id="simple-table" class="table  table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th><center> <?=$lang_lotLao[10];?> </center></th>
                                        <th><center> <?=$lang_lotLao[11];?> </center></th>
                                        <th><center> <?=$lang_lotLao[12];?> </center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" style="background-color:#FAFAFA;"><strong> 3 ตัวบน</strong></td>
                                        </tr>
                                        <tr class="cur" onclick="getData({&quot;lotto_code&quot;:&quot;la3nb&quot;,&quot;lotto_number&quot;:&quot;231&quot;,&quot;lotto_maxreceive&quot;:&quot;0&quot;,&quot;input_datetime&quot;:&quot;2019-03-26 10:58:53&quot;} );">
                                        <td align="center">231</td>
                                        <td align="center">
                                            <span class="label label-danger"> <?=$lang_lotLao[13];?> </span>   
                                        </td>
                                        <td align="center">2019-03-26 10:58:53</td>
                                    </tr>
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
        var aData = {};
        var x = $("form").serializeArray();
        $.each(x, function(i, field){
            aData[ field.name ] = field.value;
        });

        aData[type] = type;

        $.post("lottoLaoBlockNumberSave.php", aData, function( res ){
            var response = jQuery.parseJSON( res );
            if(response.status_flag){
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
    }
</script>