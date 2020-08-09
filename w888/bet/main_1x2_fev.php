<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<style>
body {
	margin:0px;
	padding:0px;
	background:#FFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.title_tb {
	height:0px;
}
title_tb td {
	height:0px;
	overflow:hidden;
}
.tdle {
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
	height:20px;
	border-top:1px solid #6694b8;
	border-bottom:1px solid #6694b8;
}
.td_1h {
	background:#EED4D4;
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
.tr_data {
	background:#B7FCBE;
}
.tr_data:hover {
	background:#E9FEEB;
}
.tr_data td {
	height:20px;
	padding:0px 2px;
}
.td_bg_white {
	background:#FFF !important;
}
.td_bg_yellow {
	background:#FFFCAD !important;
}
.red {
	color:#F00;
}
.blue {
	color:#00F;
}
.gray {
	color:#CCC;
}
.gray2 {
	color:#666;
}
.hand_hover {
	cursor:pointer;
}
.lk_hover:hover {
	text-decoration:underline;
}
.txt_none {
	width:95%;
	outline:none;
	border:none;
	background:none;
	font-size: 12px;
  	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.acenter {
	text-align:center;
}
.aright {
	text-align:right;
}

</style>
<script>
var refp;
$(document).ready(function() {
	get_table_data();
   $.ajaxSetup({ cache: false });
});
function get_table_data(){
	 $.post("table/table_1x2.php" , { "fev" : 1 },
		function(data){
			$("#tb_data").html(data);
			refp=setTimeout("ref_page()",1000);
	});	
}
function ref_page(){
	$.post( 'refresh_page/check_refresh.php?randval='+ Math.random(), { "fzone": 3}, function( data ) {
	  //console.log( data.f_refresh );
	  if(data.f_refresh==1){
		  clearTimeout(refp);
		 get_table_data();
	  }else{
	  	refp=setTimeout("ref_page()",1000);
	  }
	}, "json");
}
function edit_list(){
	parent.document.getElementById("frameset2").rows="24,*,120";  
	parent.footx.location.href="edit_list.php";
}
function open_1(id,ty){
	parent.document.getElementById("frameset2").rows="24,*,120";  
	parent.footx.location.href="open_1.php?id="+id+"&ty="+ty;
}
var c_percen = 1;
var c_ball = 1;
var c_L = 1;
var c_price = 1;
var c_score = 1;
function numberonly(event,el,ty_txt,ths,id){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			
	
	//console.log(keyCode);
	     
	//0-9 (numpad,keyboard)
	if(ty_txt=="%"){
		if(c_percen==1){
			$(el).val("");
			c_percen=0;
		}
	}else if(ty_txt=="ball"){
		if(c_ball==1){
			$(el).val("");
			c_ball=0;
		}
	}else if(ty_txt=="score"){
		if(c_score==1){
			$(el).val("");
			c_score=0;
		}
	}else if(ty_txt=="score_1h"){
		if(c_score_1h==1){
			$(el).val("");
			c_score_1h=0;
		}
	}else if(ty_txt=="score_ft"){
		if(c_score_ft==1){
			$(el).val("");
			c_score_ft=0;
		}
	}else if(ty_txt=="L"){
		if(c_L==1){
			$(el).val("");
			c_L=0;
		}
	}else if(ty_txt=="price"){
		if(c_price==1){
			$(el).val("");
			c_price=0;
		}
	}
	
	if(keyCode==13){ 
		if(ty_txt=="score"){
			set_score(ths,$(el).val(),id);
			c_score=1;
		}else if(ty_txt=="score_1h"){
			set_score_1h(ths,$(el).val(),id);
			c_score_1h=1;
		}else if(ty_txt=="score_ft"){
			set_score_ft(ths,$(el).val(),id);
			c_score_ft=1;
		}else if(ty_txt=="%"){
			set_percen(ths,$(el).val(),id);
			c_percen=1;
		}else if(ty_txt=="ball"){
			set_ball(ths,$(el).val(),id);
			c_ball=1;
		}else if(ty_txt=="L"){
			set_L(ths,$(el).val(),id);
			c_L=1;
		}else if(ty_txt=="price"){
			set_price(ths,$(el).val(),id);
			c_price=1;
		}
	}
	//alert(keyCode);
	if(ty_txt!="ball" && ty_txt!="price"){
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109){ return true; }
		//backspace,delete,left,right,home,end
		if (',8,46,37,39,36,35,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}else if(ty_txt=="price"){
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109){ return true; }
		//backspace,delete,left,right,home,end
		if (',8,46,37,39,36,35,190,110,189,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}else{
		//alert(keyCode);
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109){ return true; }
		if (',8,190,110,107,187,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}
}
function set_score(ty , val , id){
	$.post("ajax/set_score.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_percen(ty , val , id){
	$.post("ajax/set_percen.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_ball(ty , val , id){
	$.post("ajax/set_ball.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_L(ty , val , id){
	$.post("ajax/set_L.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_score_1h(ty , val , id){
	$.post("ajax/set_score_1h.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_score_ft(ty , val , id){
	$.post("ajax/set_score_ft.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_price(ty , val , id){
	$.post("ajax/set_price.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
			if(parseFloat(val)<0){
				$("#price"+ty+"_"+id).addClass("red");
			}else{
				$("#price"+ty+"_"+id).removeClass("red");
			}
	});	
}
function set_X(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_X.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function set_W(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_W_1x2.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function set_B(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_B_1x2.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function set_key(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_key_1x2.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function save_fev(e,val){
	$.post("ajax/set_fev.php" , { 'val': val },
		function(data){
			//save success;
			$(".fev_id_"+val).remove();
	});	
}
</script>
</head>

<body id="tb_data">

</body>
</html>