<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>BET :: LOGIN</title>
<link rel="stylesheet" href="css/reset.css">
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel="stylesheet" href="css/style.css">
<style>

</style>
</head>

<body>
<br><br>
<!-- Mixins--> 
<!-- Pen Title-->
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">เข้าสู่ระบบ</h1>
    <form autocomplete="off" action="index.php" method="post">
      <div class="input-container">
        <input name="txt_user" required="required" id="txt_user" autocomplete="off"/>
        <label for="Usernuserame">ชื่อผู้ใช้</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="txt_pass" required="required" id="txt_pass" autocomplete="off"/>
        <label for="pass">รหัสผ่าน</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>ตกลง</span></button>
      </div>
    </form>
  </div>
  
</div>
</body>
</html>
