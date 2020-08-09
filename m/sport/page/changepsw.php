
<div class="row">
	<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong><i class="fa fa-cog"></i> เปลี่ยนรหัสผ่าน</strong></h1>
    </div>

    <div class="panel-body">
<?
if($_GET["cmd"]=="changepsw" && $_GET["subcmd"]=="save"){
if($_POST["txtOldpsw"]=="" || $_POST["txtNewpsw"]=="" || $_POST["txtCnewpsw"]==""){ ?>
<div class="bs-example thaisan">
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><i class="fa fa-times-circle"></i> บันทึกไม่สำเร็จ!</strong> โปรดระบุข้อมูลให้ครบทุกช่อง
    </div>
</div>
<?
}elseif($_POST["txtOldpsw"]!=""){
$md5sha1 = md5(sha1($_POST["txtOldpsw"]));
$sql = sql_query("SELECT * FROM tb_user WHERE user_psw = '$md5sha1' AND user_name = '$_SESSION[user_name]'");
$row = mysql_num_rows($sql);
if($row==0){
?>
<div class="bs-example thaisan">
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><i class="fa fa-times-circle"></i> บันทึกไม่สำเร็จ!</strong> รหัสผ่านเดิมไม่ถูกต้อง
    </div>
</div>
<?
}elseif($_POST["txtNewpsw"]!=$_POST["txtCnewpsw"]){
?>
<div class="bs-example thaisan">
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><i class="fa fa-times-circle"></i> บันทึกไม่สำเร็จ!</strong> รหัสใหม่ไม่ตรงกัน
    </div>
</div>
<?
}else{
$md5sha1 = md5(sha1($_POST["txtCnewpsw"]));
$sql = sql_query("UPDATE tb_user SET user_psw = '$md5sha1' WHERE user_name = '$_SESSION[user_name]'");
?>
<div class="bs-example thaisan">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><i class="fa fa-check-circle"></i> บันทึกสำเร็จ!</strong>
    </div>
</div>
<?
}
}
}
?>
		<form name="changepsw" method="post" id="changepsw" action="main.php?cmd=changepsw&subcmd=save">
        
			<div class="input-group input-group-lg">
            	<span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" name="txtOldpsw" id="txtOldpsw" placeholder="รหัสผ่านเดิม">
                
          	</div>
            
            <div class="input-group input-group-lg" style="margin-top:10px">
            	<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
            	<input type="password" class="form-control" name="txtNewpsw" id="txtNewpsw" placeholder="รหัสผ่านใหม่">            
          	</div>
            
            <div class="input-group input-group-lg" style="margin-top:10px">
            	<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                <input type="password" class="form-control" name="txtCnewpsw" id="txtCnewpsw" placeholder="ยืนยันรหัสผ่านใหม่">
           	</div>
                     
            <span id="mySpanLogin" class="thaisan" style="padding:1px; font-size:10px"></span>
        
        	<button class="btn btn-lg btn-default btn-block thaisan" type="submit" style="margin-top:0px"><strong><i class="fa fa-floppy-o"></i> บันทึก</strong></button>

		</form>
	</div>
</div>
</div>

<br />