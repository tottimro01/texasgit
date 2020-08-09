<?php 

if($_POST["edType"] == "r")  // ลบ
{

	?>

			<br>
			<div class="widget-box">
			    <div class="widget-header ">
			        <h4 class="widget-title lighter"><strong> <font class="blue"> oho04 </font> </strong></h4>
			    </div>
			    <div class="widget-body">
			        <form class="form-horizontal" id="" action="" method="post">
			            <div class="widget-main">
			                <div class="row">
			                    <div class="col-xs-12 col-sm-12">
			                        <div class="col-xs-12 col-sm-12 form-group">
			                            <label class="col-xs-6 col-sm-6 control-label"><strong>เครดิต:&nbsp;</strong></label>
			                            <div class="col-xs-6 col-sm-6">
			                                <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="0.00" 			readonly="true">
			                            </div>
			                        </div>
			                    </div>
			                                        <div class="col-xs-12 col-sm-12">
			                        <div class="col-xs-12 col-sm-12 form-group">
			                            <label class="col-xs-6 col-sm-6 control-label"><strong>ลดเครดิต:&nbsp;</strong></label>
			                            <div class="col-xs-6 col-sm-6">
			                                <input type="text" id="reduceCredit" name="reduceCredit" class="col-xs-12 col-sm-12 numeric" value=			"" onkeyup="calCredit('r',this.value);">
			                            </div>
			                        </div>
			                    </div>
			                                        <div class="col-xs-12 col-sm-12">
			                        <div class="col-xs-12 col-sm-12 form-group">
			                            <label class="col-xs-6 col-sm-6 control-label"><strong>เครดิตใหม่:&nbsp;</strong></label>
			                            <div class="col-xs-6 col-sm-6">
			                                <input type="text" id="newCredit" name="newCredit" class="col-xs-12 col-sm-12 numeric" value="" 			readonly="true">
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </form>
			    </div>
			</div>
			
			<script type="text/javascript">
			  $('.numeric').autoNumeric();
			</script>

	<?

}else if($_POST["edType"] == "i")  // เพิ่ม
{
	?>

<br>
<div class="widget-box">
    <div class="widget-header ">
        <h4 class="widget-title lighter"><strong> <font class="blue"> oho04 </font> </strong></h4>
    </div>
    <div class="widget-body">
        <form class="form-horizontal" id="" action="" method="post">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12 form-group">
                            <label class="col-xs-6 col-sm-6 control-label"><strong>เครดิต:&nbsp;</strong></label>
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="0.00" readonly="true">
                            </div>
                        </div>
                    </div>
                                        <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12 form-group">
                            <label class="col-xs-6 col-sm-6 control-label"><strong>เพิ่มเครดิต:&nbsp;</strong></label>
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" id="increaseCredit" name="increaseCredit" class="col-xs-12 col-sm-12 numeric" value="" onkeyup="calCredit('i',this.value);">
                            </div>
                        </div>
                    </div>
                                        <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12 form-group">
                            <label class="col-xs-6 col-sm-6 control-label"><strong>เครดิตใหม่:&nbsp;</strong></label>
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" id="newCredit" name="newCredit" class="col-xs-12 col-sm-12 numeric" value="" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
  $('.numeric').autoNumeric();
</script>
	<?
}

 ?>