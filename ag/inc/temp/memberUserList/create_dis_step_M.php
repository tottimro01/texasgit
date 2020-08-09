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

$rstepdis = $_POST['r_sport_step_dis'];
$tstepdis = $_POST['m_sport_step_dis'];
for($i=$min; $i<=$max; $i++){
?>
<div class="form-group">
  <div class="col-xs-12 col-sm-4 col-md-12">
    <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="stepcom<?=$i;?>"><?=$lang_ag[191];?> <?=$i;?> <?=$lang_ag[272];?> :</label>
    <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="clearfix  input-group">
        <select class="form-control input-sm sl_step sl_com" id="stepcom<?=$i;?>" name="stepcom<?=$i;?>" data-index="<?=$i;?>" onchange="changeLowerValue(this  ,<?=$rstepdis[$i];?>);">
          <?php 
              for($j = 0; $j<=$rstepdis[$i]; $j++)
              {
                $sl = ($tstepdis[$i] == $j) ? "selected" : "";
                ?>
                  <option value="<?=$j;?>" <?=$sl;?> ><?=$j;?></option>
                <?
              }
           ?>
        </select>
        <span class="input-group-addon" id="k_stepcom<?=$i;?>" data-json="20">%</span>
      </div>
    </div>
  </div>
</div>
  <?
}?>


