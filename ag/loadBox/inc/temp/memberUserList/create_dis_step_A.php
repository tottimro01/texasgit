<?php

if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

require('../../conn.php');
require('../../function.php');
require('../../ag_function.php');
require('../../../lang/ag_lang.php');
require('../../../lang/function_array.php'); 

$min = $_POST['data_min'];
$max = $_POST['data_max'];


$tstepdis = $_POST['r_sport_step_dis'];
$dis_max = $_POST['parent_r_sport_step_dis'];
$dis_min = $_POST['r_sport_step_dis_min_ary'];



for($i=$min; $i<=$max; $i++){
?>
<div class="form-group">
  <div class="col-xs-12 col-sm-4 col-md-12">
    <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="stepcom<?=$i;?>"><?=$lang_memberAgent[68];?> <?=$i;?> <?=$lang_memberAgent[69];?> :</label>
    <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="clearfix  input-group">

        <select class="form-control input-sm sl_step sl_com" id="stepcom<?=$i;?>" name="stepcom<?=$i;?>" data-index="<?=$i;?>"  onchange="changeLowerValue(this ,<?=$dis_max[$i];?>);">
          <?php 
              $dis_min[$i] = ($dis_min[$i] == "") ? 0 : $dis_min[$i]; 
              $dis_max[$i] = ($dis_max[$i] == "") ? 20 : $dis_max[$i]; 
              for($j = $dis_min[$i]; $j<=$dis_max[$i]; $j++)
              {
                if($j >= $dis_min[$i])
                {
                  $sl = ($tstepdis[$i] == $j) ? "selected" : "";
                  ?>
                    <option value="<?=$j;?>" <?=$sl;?> ><?=$j;?></option>
                  <?
                }
              }
           ?>
        </select>
        <span class="input-group-addon" id="k_stepcom<?=$i;?>" data-json="<?=$dis_max[$i];?>">%</span>
      </div>
    </div>
  </div>
</div>
  <?
}?>


