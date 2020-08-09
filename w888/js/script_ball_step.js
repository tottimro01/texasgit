// JavaScript Document
var c=180;
var t;
var _c=15;
var _t;
function Today_Ball_List(){
	c=181;
	_c=15;
	clearTimeout(t);
	clearTimeout(_t);
	_timedCount();
	$(".img_ref_today").addClass('image');
	BallToday.location="data/sport_data.php?sc=fbs&t="+Math.random();
}
function ShowBetListStep(Nt){
	/*var lg;
	var leag;
	var tm1;
	var tm2;
	for(var i=0;i<Nt.length;i++){
		var p = 0;
		try
  {
			leag=th[Nt[i][0]][0];
			tm1=th[Nt[i][0]][1];		
			tm2=th[Nt[i][0]][2];		
			
  }catch(err){
	  		leag=Nt[i][4];
			tm1=Nt[i][5];
			tm2=Nt[i][6];
	 }
		Nt[i][44] = leag;
		Nt[i][45] = tm1;
		Nt[i][46] = tm2;
	}*/
	//Nt[0]=["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","","","0"];
	Nt2=Nt;
	if(Nt2.length>0){
		$("#t_ref_today").css('display' , 'block');
		load_today(view_ball , 1);
	}else{
		clearTimeout(_t);
		c=180;
		_c=15;
		$("#t_ref_today").css('display' , 'none');
		timedCount(0);
	}
}
function load_today(file_req , nload){
	var url;
	if(file_req==1){
		url = "inc/line_data.php?sc=fbs1l&t="+Math.random();
	}else if(file_req==2){
		url = "inc/line_data.php?sc=fbs2l&t="+Math.random();
	}else if(file_req==3){
		url = "inc/line_data.php?sc=fbsft&t="+Math.random();
	}else if(file_req==4){
		url = "inc/line_data.php?sc=fbs1h&t="+Math.random();
	}else if(file_req==5){
		url = "inc/line_data.php?sc=fbs1x2&t="+Math.random();
	}else if(file_req==6){
		url = "inc/line_data.php?sc=fbsoe&t="+Math.random();
	}
	$.ajax({
		type: "POST",
		url: url,
		data: { 'ball[]': Nt2 , 'ty': "today" , "tprice" : tprice },
		timeout: 15000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			if(nload==1){
				$(".img_ref_today").addClass('image');
			}
		},
		success: function(data){
			if(nload==1){
				clearTimeout(_t);
				$(".img_ref_today").removeClass('image');
				$("#t_ref_today span").html(c);
				if(file_req==6){
					timedCount(0);
				}else{
					timedCount(1);
				}
			}
			$("#main_today").html(data);
			$("#sele").css('display' , 'block');
		}
	});	
}
function _timedCount()
{
	//console.log(_c);
	_c=_c-1;
	if (_c <= 0){ 
		Today_Ball_List();
	}else{
    		_t=setTimeout("_timedCount()",1000);
	}
}
function timedCount(lv)
{
	c=c-1;
	$("#t_ref_today span").html(c);
	if (c <= 0){ 
		Today_Ball_List();
	}else{
		//var show_place=parseInt(document.getElementById('ref').innerHTML);
    		t=setTimeout("timedCount("+lv+")",1000);
	}
}