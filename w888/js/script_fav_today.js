// JavaScript Document
var c=90;
var t;
var _c=15;
var _t;
function Today_Ball_List(){
	c=91;
	_c=15;
	clearTimeout(t);
	clearTimeout(_t);
	_timedCount();
	$(".img_ref_today").addClass('image');
	BallToday.location="data/sport_data.php?sc=at&t="+Math.random();
}
function ShowBetListToday(Nt){
	var lg;
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
		Nt[i][41] = leag;
		Nt[i][42] = tm1;
		Nt[i][43] = tm2;
	}
	Nt2=Nt;
	if(Nt2.length>0){
		$("#t_ref_today").css('display' , 'block');
		load_today(view_ball , 1);
	}else{
		clearTimeout(_t);
		c=90;
		_c=15;
		$("#t_ref_today").css('display' , 'none');
		timedCount(0);
	}
}
function load_today(file_req , nload){
	var url;
	if(file_req==1){
		url = "inc/fav_today_singleLine.php?t="+Math.random();
	}else if(file_req==2){
		url = "inc/fav_today_twoLine.php?t="+Math.random();
	}else if(file_req==3){
		url = "inc/fav_today_fullTime.php?t="+Math.random();
	}else if(file_req==4){
		url = "inc/fav_today_halfTime.php?t="+Math.random();
	}else if(file_req==5){
		url = "inc/fav_today_1x2.php?t="+Math.random();
	}else if(file_req==6){
		url = "inc/fav_today_kk.php?t="+Math.random();
	}
	$.ajax({
		type: "POST",
		url: url,
		data: { 'ball[]': Nt2 , 'ty': "today" , "tprice" : tprice , "ball_fav" : ball_fav },
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
		if((c==15 || c==30 || c==45 || c==60 || c==75) && lv == 1){ 
			Today_Ball_Refresh(); 
		}
	}
}

function Today_Ball_Refresh(){ 
	if(document.getElementById("main_today").innerHTML != ""){
		BallTodayRefresh.location ="data/sport_data.php?sc=atr&t="+Math.random();
	}	
}
function Tchang_valbg(id,idbet,val,haou,idrunning,valnew,idball,tim,ball,ty,bl){
	var oo=[];
	try
  {
	var le = th[idball][0];
	var tm1 = th[idball][1];
	var tm2 = th[idball][2];
	
  }catch(err){
	 	/*var le = "";
		var tm1 = "";
		var tm2 = "";*/
	 	var	le=Nt[i][4];
		var	tm1=Nt[i][5];		
		var	tm2=Nt[i][6];	
	 }
	
	for (var key in Nt2) {
		if(Nt2[key][0]==idball){
			oo = Nt2[key];
			var tor = oo[18];
			var play_date = oo[7];
			var score = oo[10]+"-"+oo[11];
			break;
		}
	}
	var dis_hdp = 0; 
	$("#"+id).html(_mix(valnew));
	
	if(parent.leftx.document.getElementById("pc_"+id)){
				parent.leftx.document.getElementById("pc_"+id).innerHTML = _mix(valnew);
				var nr = parent.leftx.document.getElementById("nr").value;
				var hdp_all = 0;
				for(var n=0;n<nr;n++){
					var hdp_r = $('.shdp'+n+' strong', parent.leftx.document).html();
					hdp_all = hdp_all+parseFloat(hdp_r);
				}
				$('.p_all', parent.leftx.document).html(parseFloat(hdp_all).toFixed(3));
				//parent.leftx.document.getElementById("ps_"+id).innerHTML = _mix(valnew);
				
				var bg2=_red(_mix(valnew)); 
				$('#pc_'+id, parent.leftx.document).attr("class" , bg2);
		}
	
	var bg=_red(_mix(valnew)); 
	$("#"+id).attr("class" , bg);
	//$("#"+id).attr("onclick" , "setshowprice('"+le+"','"+tm1+"','"+tm2+"','"+tor+"','"+ball+"',this.innerHTML,'T','','"+idrunning+"','"+ty+"','"+idball+"','"+tim+"','"+play_date+"','"+bl+"')");
	$("#"+id).attr("onclick" , "setshowprice('"+le+"','"+tm1+"','"+tm2+"','"+tor+"','"+ball+"',this.innerHTML,'T','',"+idrunning+","+ty+",'"+idball+"','"+tim+"','"+play_date+"' ,'"+bl+"')");
	
	
	if(valnew==""){ 
		$("#"+id).html(""); 
		$("#"+id).attr("onclick","");
	}
}