

<? if($_POST["type"]==1 or $_POST["type"]==2  or $_POST["type"]==3 or $_POST["type"]==14 or $_POST["type"]==15 or $_POST["type"]==16  or $_POST["type"]==17  or $_POST["type"]==20  or $_POST["type"]==66 or $_POST["type"]==99){?>
<input name="tnumber" placeholder="เลข" type="text" class="txt_back11n center form-control input-num" placeholder="เลข" id="tnumber" size="8" maxlength="3" onKeyDown="return numberonly(event,this)"/>
<? }elseif($_POST["type"]==4 or $_POST["type"]==5  or $_POST["type"]==13 or $_POST["type"]==18   or $_POST["type"]==24 or $_POST["type"]==55 or $_POST["type"]==88){?>
<input name="tnumber" placeholder="เลข" type="text" class="txt_back11n center form-control input-num" placeholder="เลข" id="tnumber" size="8" maxlength="2" onKeyDown="return numberonly(event,this)"/>
<? }elseif($_POST["type"]==6 or $_POST["type"]==7 or $_POST["type"]==19  or $_POST["type"]==21   or $_POST["type"]==22   or $_POST["type"]==23){?>
<input name="tnumber" placeholder="เลข" type="text" class="txt_back11n center form-control input-num" placeholder="เลข" id="tnumber" size="8" maxlength="1" onKeyDown="return numberonly(event,this)"/>
<? }elseif($_POST["type"]==8 or $_POST["type"]==9 or $_POST["type"]==10 or $_POST["type"]==11){?>
<select name="tnumber" class="form-control inputNumber" placeholder="เลข" id="tnumber">
 <option value="H">สูง</option>
   <option value="L">ต่ำ</option>
</select>
<? }elseif($_POST["type"]==12){?>
<select name="tnumber" class="form-control inputNumber" placeholder="เลข" id="tnumber">
  <option value="E">คี่</option>
   <option value="K">คู่</option>
</select>

<? }else if($_POST[type]==26 || $_POST[type]==27 || $_POST[type]==25 || $_POST[type]==31){
	?>
		<input name="tnumber" placeholder="เลข" type="text" class="txt_back11n center form-control input-num" placeholder="เลข" id="tnumber" size="8" maxlength="4" onKeyDown="return numberonly(event,this)"/>
	<?
} ?>

