<?
require('../inc/conn.php');
require('../inc/function.php');
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login :: ADMIN</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
</head>

<body>
<?


if(isset($_POST["b_up"])){
$xpass=trim($_POST["tpass"]);
$mpass=md5($xpass);
   sql_query("update  bom_tb_member set  m_pass='$mpass'  where r_agent_id like '%*400*%' ");
   sql_query("update  bom_tb_member set  m_pass='$mpass'  where r_agent_id like '%*401*%' ");
   echo"<h2>เปลี่ยน สำเร็จ : $xpass</h2>";
}

?>
<form action="" method="post">
<table width="300" border="0">
  <tr>
    <td width="58">รหัสผ่าน</td>
    <td width="132">
      <input type="text" name="tpass" id="tpass" value="<?=$_POST["tpass"];?>"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="b_up" id="b_up" value="บันทึก" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>ตั้งรหัสผ่านใหม่ mbbn , mbbx</td>
  </tr>
</table>


<hr>
<?
if(isset($_POST["b_add"])){
$mcount=trim(str_replace(',','',$_POST["tmon"]));
sql_query("update  bom_tb_member set  m_count='$mcount'  where m_id='$_POST[tuser]' ");
echo"<h2>เติม สำเร็จ </h2>";
}
?>
<table width="300" border="0">
<tr>
    <td width="58">User</td>
    <td width="132">
                    <select name="tuser" id="tuser" >
               <option value=''>เลือก User</option>

  <?
$re=sql_query("select * from bom_tb_member where 	(r_agent_id like '%*400*%' or r_agent_id like '%*401*%') order by m_user asc");
while($rs=sql_fetch($re)){
  ?>    
  <option value='<?=$rs["m_id"]?>'  <? if($rs["m_id"]==$_POST["tuser"]){echo'selected';}?>><?=$rs["m_user"]?> [<?=$rs["m_name"]?>]</option>
                <? } ?>
</select>

</td>
  </tr>
  <tr>
    <td width="58">เครดิต</td>
    <td width="132">
      <input name="tmon" type="text" id="tmon" value="<?=$_POST["tmon"];?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="b_add" id="b_add" value="เติม" /></td>
  </tr>

</table>
</form>
</body>

</html>

