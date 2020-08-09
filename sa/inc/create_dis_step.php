
<?php 

$min = $_POST['data_min'];
$max = $_POST['data_max'];

for($i=$min; $i<=$max; $i++){
  ?>
    <div class="form-group col-sm-12 col-md-12">
       <label for="step_min_pair">สว่นลด <?=$i;?> คู่</label>
         <select class="form-control sl_step sl_com" id="stepcom<?=$i;?>" name="stepcom<?=$i;?>" data-index="<?=$i;?>" onchange="changeLowerValue(this);">
           <?php
               for($l=0;$l<=100;$l++)
               {
                 ?>
                   <option value="<?php echo $l; ?>"> <?php echo $l; ?></option>
                 <?php
               }
     
            ?>
         </select>
     </div>

  <?
}
 ?>




