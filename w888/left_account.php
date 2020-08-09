<div id="box_user">
  <div id="buser">
  	<div>
  	<?=$lang_member[71];?> : <strong><?=$_SESSION['m_user'];?></strong>
  	</div>
  	<div style="margin-top: 6px;">
		<?=$lang_member[93];?>: 
  		<?if($_SESSION['m_user_set']!=""){?>
  			<strong>
            <span id="txt_nickname" class="member_nickname"><?=$_SESSION['m_user_set'];?></span>
  			</strong>
            <?}else{?>
			<strong>
            <span id="txt_nickname" class="member_nickname"><?=$lang_member[98];?></span>
			</strong>
            <?}?>
  	</div>
  	<span class="ref_user" onClick="get_credit();"><!-- <img src="img/icon3.png" height="15"> --></span></div>
    <div id="bcredit" style="font-size:11px !important;">
  <?=$lang_member[95];?><span style="float:right;"><strong style="color:#203A79;" id="res_cre"></strong></span>
   <br>
  <?=$lang_member[53];?><span style="float:right;"><strong style="color:#203A79;" id="res_incre"></strong></span>
  <br>
  <?=$lang_member[94];?><span style="float:right;"><strong style="color:#203A79;" id="res_bal"></strong></span>
  <br>
  <?=$lang_member[97];?><span style="float:right;"><strong style="color:#203A79;"><?=$_SESSION['m_currency'];?> <?=number_format($_SESSION['m_count_de'],2);?></strong></span>
  </div>
</div>
<script>
  get_credit();
  function get_credit(){
    var loadinHtml = "<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>";
  $.ajax({
    type: "POST",
    url: "inc/get_credit.php",
    dataType:"json",
    cache: false, // Clear cache IE
    beforeSend: function(){
      $("#res_cre").html(loadinHtml);
      $("#res_incre").html(loadinHtml);
      $("#res_bal").html(loadinHtml);
    },
    success: function(data){
      $("#res_cre").html(data.cre);
      $("#res_incre").html(data.incre);
      $("#res_bal").html(data.wincre);
    }
  }); 
}
</script>