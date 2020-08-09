<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$file_get = "";
if($_GET["q"]=="2"){
	$file_get = "_qq_file2";
}else if($_GET["q"]=="3"){
	if($_GET["t"]=="1"){
		$file_get = "_qq_file3_1";
	}else if($_GET["t"]=="2"){
		$file_get = "_qq_file3_2";
	}else if($_GET["t"]=="3"){
		$file_get = "_qq_file3_3";
	}else if($_GET["t"]=="4"){
		$file_get = "_qq_file3_4";
	}else if($_GET["t"]=="5"){
		$file_get = "_qq_file3_5";
	}
}else if($_GET["q"]=="4"){
	if($_GET["t"]=="1"){
		$file_get = "_qq_file4_1";
	}else if($_GET["t"]=="2"){
		$file_get = "_qq_file4_2";
	}else if($_GET["t"]=="3"){
		$file_get = "_qq_file4_3";
	}else if($_GET["t"]=="4"){
		$file_get = "_qq_file4_4";
	}else if($_GET["t"]=="5"){
		$file_get = "_qq_file4_5";
	}
}else{
	$file_get = "_qq_file";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>EXPORT :: DATA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="plugins/font-awesome.min.css"/>
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">

<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script> 
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
     .loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: rgba(0,0,0,0.5);
		display:none;
	}
	.loader>.fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #fff;
    font-size: 30px;
}
</style>
</head>
<body>
<div class="loader"><i class="fa fa-refresh fa-spin"></i></div>
<div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
	      	<br>
	      	<div class="span9">
            <!-- Single button -->
            


<div class="row">
<div class="span12">
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=1'"<? if($_GET["q"]=="" || $_GET["q"]=="1"){ ?> disabled<? } ?>>HOTLINE88</button>
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=2'"<? if($_GET["q"]=="2"){ ?> disabled<? } ?>>FIFA555</button>
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=3&t=1'"<? if($_GET["q"]=="3" && $_GET["t"]=="1"){ ?> disabled<? } ?>>MAXBET มวย</button>
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=3&t=2'"<? if($_GET["q"]=="3" && $_GET["t"]=="2"){ ?> disabled<? } ?>>MAXBET HDC</button>
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=3&t=3'"<? if($_GET["q"]=="3" && $_GET["t"]=="3"){ ?> disabled<? } ?>>MAXBET 1X2</button>
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=3&t=4'"<? if($_GET["q"]=="3" && $_GET["t"]=="4"){ ?> disabled<? } ?>>MAXBET Odd/Even</button>
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=3&t=5'"<? if($_GET["q"]=="3" && $_GET["t"]=="5"){ ?> disabled<? } ?>>MAXBET Mix</button>
</div>
</div>
<br>
<div class="row">
<div class="span12">
<button type="button" class="btn btn-warning" onClick="window.location.href='index.php?q=4&t=1'"<? if($_GET["q"]=="4" && $_GET["t"]=="1"){ ?> disabled<? } ?>>TEK789 HDC</button>
</div>
</div>
<br>
            <form role="form" onSubmit="return qq_file(this);" enctype="multipart/form-data" method="post"  id="form-qq" name="form-qq" >
            <div class="form-group">
              <textarea name="txt_qq" rows="20" class="form-control" id="txt_qq" style="width:100%;" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          <button type="reset" class="btn btn-danger">ยกเลิก</button>
            </form>
            </div>
            <div class="span6" id="result_qq">
            
            </div>
            </div>
    
    
    </div>
    </div>
    </div>
<script>
function qq_file(e){
	set_html(e, "inc/<?=$file_get?>.php" , "#result_qq");
    //$('#form-qq').trigger('reset');
	return false;
}
function set_html(set_data , set_url , element){
  $.ajax({
        type: "POST",
        url: set_url,
        data: new FormData( set_data ),
		processData: false,
        contentType: false,
        cache: false, // Clear cache IE
        beforeSend: function(){
          $(".loader").show();
        },
        success: function(data){
          $(".loader").hide();
          $(element).html(data);
        }
      });
}
function set_html_call(set_id , set_url , element , callback){
  $.ajax({
        type: "POST",
        url: set_url,
        data: set_id,
        cache: false, // Clear cache IE
        beforeSend: function(){
          $(".loader").show();
        },
        success: function(data){
          $(".loader").hide();
          $(element).html(data);
          callback();
        }
      });
}
</script>
</body>
</html>

