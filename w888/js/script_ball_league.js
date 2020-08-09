// JavaScript Document
var sl = 0;
function show_league(){
	if(sl==0){
		$("#sele").addClass("ac_legue");	
		$( "#box_league").slideDown( "fast", function() {
			// Animation complete.
			$("#sele img").css('display' , 'block');	
			get_league();
		});
		sl = 1;
	}else{
		$("#sele").removeClass("ac_legue");	
		$("#sele img").css('display' , 'none');	
		$( "#box_league").slideUp( "fast", function() {
			// Animation complete.
			$("#tb_legue").html("<tr><td><img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'></td></tr>");
		});
		sl = 0;
	}
}

function get_league(){
	$.ajax({
		type: "POST",
		url: "inc/get_league.php",
		data: { "sport": sport_t },
		timeout: 5000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			//$("#tb_legue").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
		},
		success: function(data){
			$("#tb_legue").html(data);
		},error: function (error) {
			get_league();
		}
	});	
}
function save_leage(){	 
	var league_cnt = document.getElementById('cntall').value;
	var y = 0;
	var i = 0;
	var se = [];
	while(i<league_cnt){
		var nm = "ck["+i+"]";
		var ch = document.getElementById(nm).checked;
		//alert(ch)
		if(ch==true){
			se[i] = document.getElementById(nm).value;
		}
		i++;	
		y++;		
	}
	//console.log(se);
	lle(se);
}
function lle(ll2){
	//console.log(Nl2);
	$.post("save_leage.php" , { 'le[]': ll2 , "sport": sport_t },
		function(data){
			//window.location.href='index.php';
			
			show_league();
			load_league();
	});		
}
function c_all(obj) { 
	var rows=document.getElementById("cntall").value; 
	for (i=0;i<rows;i++){ 
		document.getElementById("ck["+i+"]").checked = obj.checked;
	}
}