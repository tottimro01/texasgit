<?
if($_GET["lang"]==""){
	$lang = "en";
}else{
	$lang = $_GET["lang"];
}
require 'inc/function.php';
require("admin_lang/export/lang_member_".$lang.".php");
$cache_v = '00004';
?>
<!DOCTYPE html>
<html lang="<?=$lang;?>">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Download <?=$app_name;?> page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image"  content="http://w1.wan1991.com/img/logo_white2.png?v=<?=$cache_v;?>" />
	<title><?=$app_title;?></title>

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>

    <link rel="stylesheet" href="lib/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/fontawesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400&amp;display=swap" rel="stylesheet">

    <style>
    	.main-bg
    	{
    	background: rgb(254,238,237);
    background: -moz-linear-gradient(0deg, rgba(254,238,237,1) 0%, rgba(254,209,206,1) 100%);
    background: -webkit-linear-gradient(0deg, rgba(254,238,237,1) 0%, rgba(254,209,206,1) 100%);
    background: linear-gradient(0deg, rgba(254,238,237,1) 0%, rgba(254,209,206,1) 100%);
    }

    body {
    background: rgb(255,255,255);
    background: -moz-linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(254,238,237,1) 50%, rgba(255,255,255,1) 100%);
    background: -webkit-linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(254,238,237,1) 50%, rgba(255,255,255,1) 100%);
    background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(254,238,237,1) 50%, rgba(255,255,255,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff",endColorstr="#ffffff",GradientType=1);
}

.c-black
{
	color: #545454;
}


    </style>
</head>
<body class="dl">
	<div class="pt-3 main-bg topbar-bg">
	    <div class="container">
	    	<div class="row">
	    		<div class="mx-auto col-md-8 col-lg-6">
	    			<div class="position-relative">
	    			  	<div class="" style="width: 130px;">
	    			  	  	<img src="img/logo_white2.png?v=<?=$cache_v;?>" class="img-logo w-100">
	    			  	</div>
	
	    			  	<a href="login_m.php" class="c-black position-absolute font-kanit font-weight-light" style="top: 4px; right: 0;">
	    			  	  	<i class="fas fa-sign-in-alt mr-1"></i><span><?=$lang_member[2151];?></span>
	    			  	</a>
	    			</div>
	    		</div>
	    	</div>
	  	</div>
	</div>

	
	<div class="container">
      	<div class="row">
    		<div class="mx-auto col-md-8 col-lg-6">
    			<div style="margin-top: -80px;">
    			  	<div>
    			  	  	<h3 class="mb-3 font-kanit text-center font-weight-normal c-black"><?=$lang_member[2153];?></h3>
    			  	  	<div>

    			  	  		<div class="bg-white p-3 floatBox mb-3 shadow-sm">
    			  			  	<div>
    			  			  		<div class="row">
    			  			  			<div class="col-4">
    			  			  				<div class="dl-icon bg-light rounded-circle mx-auto mb-1">
												<img src="images/download/icon_m1.png?v=<?=$cache_v;?>" alt="" class="w-100">
    										</div>
    										<h6 class="text-center mb-0"><?=$lang_member[35];?></h6>
    			  			  			</div>
    			  			  			<div class="col-8 p-0">
    			  			  				<div class="justify-content-sm-end align-items-center d-flex h-100">
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fab fa-apple mr-1"></i><span>IOS</span>
    			  			  					</a>
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fab fa-android mr-1"></i><span>Android</span>
    			  			  					</a>
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fas fa-desktop mr-1"></i><span>Desktop</span>
    			  			  					</a>
    			  			  				</div>
    			  			  			</div>
    			  			  		</div>
    			  			  	</div>
    			  			</div> 

    			  			<div class="bg-white p-3 floatBox mb-3 shadow-sm">
    			  			  	<div>
    			  			  		<div class="row">
    			  			  			<div class="col-4">
    			  			  				<div class="dl-icon bg-light rounded-circle mx-auto mb-1">
												<img src="images/download/icon_m2.png?v=<?=$cache_v;?>" alt="" class="w-100">
    										</div>
    										<h6 class="text-center mb-0"><?=$lang_member[36];?></h6>
    			  			  			</div>
    			  			  			<div class="col-8 p-0">
    			  			  				<div class="justify-content-sm-end align-items-center d-flex h-100">
    			  			  					<!-- <a href="itms-services://?action=download-manifest&url=https://www.appkub.com/ios/OHO88.plist" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
                                                    <i class="fab fa-apple mr-1"></i><span>IOS</span>
                                                </a> -->
    			  			  					<!-- <a href="https://play.google.com/store/apps/details?id=mvk.oho.tehigs" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
                                                    <i class="fab fa-android mr-1"></i><span>Android</span>
                                                </a> -->
                                                <a href="javascript:void(0)" onclick="startMyApp()" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
                                                    <i class="fab fa-apple mr-1"></i><span>IOS</span>
                                                </a>
                                                <a href="javascript:void(0)" onclick="startMyAppA()" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
                                                    <i class="fab fa-android mr-1"></i><span>Android</span>
                                                </a>
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fas fa-desktop mr-1"></i><span>Desktop</span>
    			  			  					</a>
    			  			  				</div>
    			  			  			</div>
    			  			  		</div>
    			  			  	</div>
    			  			</div>

    			  			<div class="bg-white p-3 floatBox mb-3 shadow-sm">
    			  			  	<div>
    			  			  		<div class="row">
    			  			  			<div class="col-4">
    			  			  				<div class="dl-icon bg-light rounded-circle mx-auto mb-1">
												<img src="images/download/icon_m3.png?v=<?=$cache_v;?>" alt="" class="w-100">
    										</div>
    										<h6 class="text-center mb-0"><?=$lang_member[38];?></h6>
    			  			  			</div>
    			  			  			<div class="col-8 p-0">
    			  			  				<div class="justify-content-sm-end align-items-center d-flex h-100">
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fab fa-apple mr-1"></i><span>IOS</span>
    			  			  					</a>
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fab fa-android mr-1"></i><span>Android</span>
    			  			  					</a>
    			  			  					<a href="#" target="_blank" class="btn btn-outline-secondary btn-sm justify-content-end rounded-pill small--1 mr-1">
    			  			  						<i class="fas fa-desktop mr-1"></i><span>Desktop</span>
    			  			  					</a>
    			  			  				</div>
    			  			  			</div>
    			  			  		</div>
    			  			  	</div>
    			  			</div>
    			  			 
    			  	  	</div>
    			  	  	 
    			  	</div>
    			</div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
    function startMyApp()
    {
        document.location = 'OHO88://?';
        setTimeout( function()
        {
            if( confirm( '<?=$lang_member[2318];?>'))
            {
                document.location = 'itms-services://?action=download-manifest&url=https://www.appkub.com/ios/OHO88.plist';
            }
        }, 300);
    }

    function startMyAppA()
    {
        document.location = 'intent:///#Intent;scheme=OHO88;package=mvk.oho.tehigs;end';
    }
    </script>
</body>
</html>