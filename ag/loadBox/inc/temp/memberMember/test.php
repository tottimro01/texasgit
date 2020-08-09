<?

$min = $_POST['data_min'];
$max = $_POST['data_max'];

for($i=$min; $i<=$max; $i++){

?>
<div class="col-xs-12 col-sm-4 col-md-4">
  <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="stepcom3">ส่วนลด <?=$i;?> คู่ :</label>
  <div class="col-xs-12 col-sm-6 col-md-8">
    <div class="clearfix  input-group">
      <select class="form-control input-sm sl_step" id="stepcom3" name="stepcom3" onclick="generateSL('10',this,true);">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
      <span class="input-group-addon" id="k_stepcom3" data-json="10">%</span>
    </div>
  </div>
</div>
  <?
}?>