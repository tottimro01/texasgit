<?
require('inc/conn.php');
require('inc/function.php');

if(isset($_POST["tk_val"]) && $_POST["tk_val"]=="edit"){
	$arr = array();
	$tk_ar_bet = $_POST["bet"];
	$tk_ar_tk = $_POST["tk"];
	$tk_ar_ID = $_POST["ID"];
	$tk_ar_Name = $_POST["Name"];
	$tk_ar_Nick = $_POST["Nick"];
	$tk_ar_Ags = $_POST["Ags"];
	$tk_ar_SysT = $_POST["SysT"];
	$tk_id = $_POST["tk_id"];
	$sql=sql_query_sp("update bom_tb_ball_tk set tk_ar_bet = '$tk_ar_bet' , tk_ar_tk = '$tk_ar_tk' , tk_ar_ID = '$tk_ar_ID' , tk_ar_Name = '$tk_ar_Name' , tk_ar_Nick = '$tk_ar_Nick' , tk_ar_Ags = '$tk_ar_Ags' , tk_ar_SysT = '$tk_ar_SysT' where tk_id = '$tk_id'");
	if($sql){
		$arr["msg"] = "บันทึกข้อมูลสำเร็จ";
	}else{
		$arr["msg"] = "เกิดข้อผิดพลาด";
	}
	echo json_encode($arr);
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<style type="text/css">
.form-style-3{
	width: 450px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	float: left;
    padding-left: 10px;
}
.form-style-3 label{
	display:block;
	margin-bottom: 10px;
}
.form-style-3 label > span{
	float: left;
	width: 100px;
	color: #F072A9;
	font-weight: bold;
	font-size: 13px;
	text-shadow: 1px 1px 1px #fff;
}
.form-style-3 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;
	padding: 20px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}
.form-style-3 fieldset legend{
	color: #FFA0C9;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}
.form-style-3 textarea{
	width:250px;
	height:100px;
}
.form-style-3 input[type=text],
.form-style-3 input[type=date],
.form-style-3 input[type=datetime],
.form-style-3 input[type=number],
.form-style-3 input[type=search],
.form-style-3 input[type=time],
.form-style-3 input[type=url],
.form-style-3 input[type=email],
.form-style-3 select, 
.form-style-3 textarea{
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border: 1px solid #FFC2DC;
	outline: none;
	color: #F072A9;
	padding: 5px 8px 5px 8px;
	box-shadow: inset 1px 1px 4px #FFD5E7;
	-moz-box-shadow: inset 1px 1px 4px #FFD5E7;
	-webkit-box-shadow: inset 1px 1px 4px #FFD5E7;
	background: #FFEFF6;
	width:70%;
}
.form-style-3  input[type=submit],
.form-style-3  input[type=button]{
	background: #EB3B88;
	border: 1px solid #C94A81;
	padding: 5px 15px 5px 15px;
	color: #FFCBE2;
	box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
	border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;	
	font-weight: bold;
	cursor: pointer;
}
.required{
	color:red;
	font-weight:normal;
}
</style>
<script type="text/javascript">
	function set_data(e){

		$.ajax({
			type: "POST",
			url: "tk_form.php",
			data: new FormData( e ),
			processData: false,
			contentType: false,
			dataType:"json",
			cache: false, // Clear cache IE
			beforeSend: function(){
				$(".loader").show();
			},
			success: function(data){
				$(".loader").hide();
				alert(data.msg);
			}
		});
		return false;
	}
</script>
</head>
<body>
<?
$sql_tk = sql_query_sp("select * from bom_tb_ball_tk order by tk_id asc");
while($rs_tk=sql_fetch($sql_tk)){
?>
<div class="form-style-3">
	<form onsubmit="return set_data(this);">
		<input type="hidden" name="tk_id" value="<?=$rs_tk["tk_id"]?>" />
		<input type="hidden" name="tk_val" value="edit" />
		<fieldset>
			<legend><?=$rs_tk["tk_name"]?></legend>
			<label for="bet">
				<span>bet <span class="required">*</span></span>
				<input type="text" class="input-field" name="bet" value="<?=$rs_tk["tk_ar_bet"]?>" />
			</label>
			<label for="tk">
				<span>tk <span class="required">*</span></span>
				<input type="text" class="input-field" name="tk" value="<?=$rs_tk["tk_ar_tk"]?>" />
			</label>
			<label for="ID">
				<span>ID <span class="required">*</span></span>
				<input type="text" class="input-field" name="ID" value="<?=$rs_tk["tk_ar_ID"]?>" />
			</label>
			<label for="Name">
				<span>Name <span class="required">*</span></span>
				<input type="text" class="input-field" name="Name" value="<?=$rs_tk["tk_ar_Name"]?>" />
			</label>
			<label for="Nick">
				<span>Nick <span class="required">*</span></span>
				<input type="text" class="input-field" name="Nick" value="<?=$rs_tk["tk_ar_Nick"]?>" />
			</label>
			<label for="Ags">
				<span>Ags <span class="required">*</span></span>
				<input type="text" class="input-field" name="Ags" value="<?=$rs_tk["tk_ar_Ags"]?>" />
			</label>
			<label for="SysT">
				<span>SysT <span class="required">*</span></span>
				<input type="text" class="input-field" name="SysT" value="<?=$rs_tk["tk_ar_SysT"]?>" />
			</label>



				<input type="submit" value="บันทึก" />
		</fieldset>
	</form>
</div>
<? } ?>
</body>
</html>