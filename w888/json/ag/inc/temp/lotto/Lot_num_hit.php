<?
  include('inc_head_bySession.php');
?>

<? if($_POST["type"]==1 or $_POST["type"]==2  or $_POST["type"]==3 or $_POST["type"]==14 or $_POST["type"]==15 or $_POST["type"]==16  or $_POST["type"]==17  or $_POST["type"]==20  or $_POST["type"]==66){?>
<input name="tnumber" placeholder="Number Block" type="text" class="txt_back11n center" placeholder="Number Block" id="tnumber" size="8" maxlength="3" onKeyDown="return numberonly(event,this)"/>
<? }elseif($_POST["type"]==4 or $_POST["type"]==5  or $_POST["type"]==13 or $_POST["type"]==18   or $_POST["type"]==24 or $_POST["type"]==55 ){?>
<input name="tnumber" placeholder="Number Block" type="text" class="txt_back11n center" placeholder="Number Block" id="tnumber" size="8" maxlength="2" onKeyDown="return numberonly(event,this)"/>
<? }elseif($_POST["type"]==6 or $_POST["type"]==7 or $_POST["type"]==19  or $_POST["type"]==21   or $_POST["type"]==22   or $_POST["type"]==23){?>
<input name="tnumber" placeholder="Number Block" type="text" class="txt_back11n center" placeholder="Number Block" id="tnumber" size="8" maxlength="1" onKeyDown="return numberonly(event,this)"/>
<? }elseif($_POST["type"]==8 or $_POST["type"]==9 or $_POST["type"]==10 or $_POST["type"]==11){?>
<select name="tnumber" class="input-sm" placeholder="Number Block" id="tnumber">
 <option value="H"><?=$lang_lot[63];?></option>
   <option value="L"><?=$lang_lot[64];?></option>
</select>
<? }elseif($_POST["type"]==12){?>
<select name="tnumber" class="input-sm" placeholder="Number Block" id="tnumber">
  <option value="E"><?=$lang_lot[65];?></option>
   <option value="K"><?=$lang_lot[66];?></option>
</select>
<? }?>

