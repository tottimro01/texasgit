
<?php 

$min = $_POST['data_min'];
$max = $_POST['data_max'];

$tstepdis = $_POST['dis'];


$dis_min = $_POST['r_sport_step_dis_min_ary'];


for($i=$min; $i<=$max; $i++){
  ?>
    <div class="form-group col-sm-12 col-md-12">
       <label for="step_min_pair">สว่นลด <?=$i;?> คู่</label>
         <select class="form-control sl_step sl_com" id="stepcom<?=$i;?>" name="stepcom<?=$i;?>" data-index="<?=$i;?>" onchange="changeLowerValue(this);">
           <?php

              $dis_min[$i] = ($dis_min[$i] == "") ? 0 : $dis_min[$i]; 
               for($l=intval($dis_min[$i]);$l<=100;$l++)
               {
                  $sl = ($tstepdis[$i] == $l) ? "selected" : "";
                 ?>
                   <option value="<?php echo $l; ?>" <?=$sl;?> > <?php echo $l; ?> </option>
                 <?php
               }
     
            ?>
         </select>
     </div>

  <?
}
 ?>





