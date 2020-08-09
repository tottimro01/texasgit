
<?php 

    require('inc_head.php');
	
  if($_POST['zone']==""){
    $zone=2;
  }else{
    $zone=$_POST['zone'];
  }

  if($_POST['rob']==""){
    $rob=1;
  }else{
    $rob=$_POST['rob'];
  }
?>


<link rel="stylesheet" href="<?=$main_url;?>/assets/css/lottoBlockNumber.css">

<div class="row">
    <div class="widget-box hidden-boder ">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> Block Number Lotto SET </strong></h4>
        </div>
        <div class="widget-body" id="blockNumber">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <?php 
                            $lot_zone = $lot_zone[$_POST["session"]["AGlang"]]["zone"];

                         ?>
                      

                         <form class="form-horizontal" method="post">
                            <div class="form-group">                               
                                    <label class="control-label text-left label-1"  style="float: left; min-width: 80px;" for="l_zone"><?=$lang_ag[1657];?> : </label>
                                    <select class="input-sm lot_sl" style="height:30px;" id="l_zone" name="l_zone" onchange="getMenu('lottoSetBlockNumber','?zone='+this.value+'&rob=<?=$rob?>');/*set_rob(this.value);*/">
                                        <?php foreach ($lot_zone as $key => $value) {
                                          if($key != 1)
                                          {
                                            ?>
                                               <option <? if($key==$zone){ ?>selected="selected"<? } ?> value="<?=$key;?>"> <?=$value;?></option>
                                            <?
                                          }  
                                        } ?>
                                    </select>

                                    <label class="control-label text-left label-1 rob" style="float: left; min-width: 80px;"><?=$lang_ag[1388];?> :</label>
                                    <select class="input-sm lot_sl rob" name="l_rob" id="l_rob" style="height:30px;" onchange="getMenu('lottoSetBlockNumber','?zone=<?=$zone?>&rob='+this.value);">
                                        
                                    </select>

                                    <label class="control-label text-left label-1" style="float: left; min-width: 80px;" for="username"><?=$lang_ag[205];?> :</label>
                                    <select class="input-sm lot_sl" name="ttype" id="ttype" style="height:30px;" onchange="_lot(this.value);">
                                        <?php foreach ($lotHun_typeArry as $key => $value) {
                                          if($key != 31)
                                          {
                                            ?>
                                               <option value="<?=$key;?>"> <?=$value;?></option>
                                            <?
                                           } 
                                        } ?>
                                    </select>  

                            </div>

                            <div class="form-group"> 

                                <label class="control-label text-left label-1" style="float: left; min-width: 80px;" for="username"><?=$lang_ag[227];?>  :</label>
                                <span id="lot_num">
                                     <input name="tnumber" placeholder="<?=$lang_ag[227];?>" type="text" class="txt_back11n center" id="tnumber" size="8" maxlength="3" onkeydown="return numberonly(event,this)">
                                </span>

                                <label class="control-label text-left label-1" style="float: left; min-width: 80px;" for="username"><?=$lang_ag[1657];?>  :</label>
                                
                                <input type="text" name="tsum" id="tsum" class="inputNumber input-box"  placeholder="<?=$lang_ag[182];?>" onkeydown="return numberonly(event,this)">
                                  

                                <div class="col-xs-12 col-sm-3 col-md-3 mobile-padding input-box button-box" style="float: left;">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_save" onclick="submit_data('save')">
                                    <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                        <?=$lang_ag[178];?>  
                                    </button>
                                    <!-- <button type="button" class="btn btn-danger btn-sm" disabled="disabled" id="btn_del" onclick="submit_data('deleted')">
                                        <input type="hidden" id="status_del" name="status_del" value="">
                                        <span class="ace-icon fa fa-trash icon-on-right bigger-110"></span>
                                        <?=$lang_lotHun[7];?> 
                                    </button> -->
                                </div>
                            </div>
                        </form>
                        
                        <div class="table-responsive col-xs-12 col-sm-12 col-md-8">
                            <table id="simple-table" class="table  table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th><center> <?=$lang_ag[1657];?> </center></th>
                                        <th><center> <?=$lang_ag[183];?> </center></th>
                                        <th><center> <?=$lang_ag[205];?> </center></th>
                                        <th><center> <?=$lang_ag[184];?> </center></th>
                                        <th><center> <?=$lang_ag[1658];?> </center></th>
                                        <th><center> <?=$lang_ag[185];?> </center></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                       # echo $sql = "SELECT * FROM `bom_tb_lotto_lock_rid` WHERE `lot_zone` != 1 and lot_type != 31 and r_id = '".$_POST["session"]["r_id"]."'";    
										$sql = "SELECT * FROM `bom_tb_".$zone."_ag` WHERE  lot_rob='$rob' and lot_type != 31  and  `r_id` =  '".$_POST["session"]["r_id"]."' ";    
                                        $re = sql_query_lot($sql);
                                        $c = 0;
                                        while ($rs = sql_fetch_as($re)) {
                                          $c++;
                                          ?>
                                           <tr> 
                                                    <td align="center">
                                                      <?php 

                                                        echo $lot_zone[$zone];
                                                          
                                                        if($lot_zone_bet[$zone] == 2 || $lot_zone_bet[$zone] == 4 )
                                                        {

                                                          echo " - ".$lang_lotHun['rob'][$lot_zone_bet[$zone]][$rs["lot_rob"]];
                                                        }else if($lot_zone_bet[$zone] == 11)
                                                        {
                                                          echo " - ".$lot_robmun[$rs["lot_rob"]];
                                                        } else if($lot_zone_bet[$zone] == 96)
                                                        {
                                                          echo  " - ".$rs["lot_rob"]."<br>";
                                                        }

                                                      
                                                          

                                                       ?>

                                                    </td>
                                                    <td align="center"><?=_dt($rs["play_number"]);?></td>
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
                                                       <button type="button" class="btn btn-danger btn-sm" id="btn_del" onclick="delete_data(<?=$rs["play_number"];?>,<?=$rs["lot_type"];?>,<?=$zone;?>,<?=$rob;?>)">
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

  set_rob(<?=$zone?>);

   function set_rob(zone)
   {
     var lot_zone_bet = <?=json_encode($lot_zone_bet);?>;
     var lang_rob = <?=json_encode($lang_lotHun['rob']);?>;
     var lot_robmun = <?=json_encode($lot_robmun);?>;
     var option = "";

     var rob_se = "<?=$rob?>";

     $(".rob").show(); 
     if(lot_zone_bet[zone] == 1)
     {
      $("#l_rob").text("");
      $(".rob").hide(); 
     }else if(lot_zone_bet[zone] == 2 || lot_zone_bet[zone] == 4)
     {
        $.each(lang_rob[lot_zone_bet[zone]],function(index, el) {
            option += "<option value=\""+index+"\" "+(rob_se==index ? 'selected="selected"':'')+">"+el+"</option>";
        });
     }else if(lot_zone_bet[zone] == 11)
     {
        $.each(lot_robmun,function(index, el) {
            option += "<option value=\""+index+"\" "+(rob_se==index ? 'selected="selected"':'')+">"+el+"</option>";
        });
     }else{
        for(var i=1; i<=96; i++)
        {
            option += "<option value=\""+i+"\" "+(rob_se==i ? 'selected="selected"':'')+">"+i+"</option>";
        }
     }
     $("#l_rob").text("").append(option);

   }


     function _lot(type){

         $.ajax({
             url: '<?=$main_url;?>/inc/temp/lotto_hun/Lot_num_hit.php',
             type: 'POST',
             dataType: 'html',
             data: {"type":type},
         })
         .done(function(response) {
            $("#lot_num").html(response);
            $("#tsum").val("");
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
                getMenu('lottoSetBlockNumber','?zone=<?=$zone?>&rob=<?=$rob?>');
            }else{
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-error'
                });
            }
        });

        $.post("lottoSetBlockNumber.php", aData, function( res ){
            
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
                         getMenu('lottoSetBlockNumber','?zone=<?=$zone?>&rob=<?=$rob?>');
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

                 $.post("lottoSetBlockNumber.php", {tnumber:num,ttype:type,l_zone:zone,l_rob:rob,deleted:"deleted"}, function( res ){
            
                 });

              },
              "<?=$lang_ag[256];?>": function () {
                  
              }
          }
      });

    }
</script>

